<?php defined('BASEPATH') or exit('No direct script access allowed');

class A extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->query('delete from t_client where on_process="1" and  datediff(now(),dt_purchased) > 1');
		$this->db->query('update t_account set status="1" where status="2" and purchased="0"');
		$this->load->helpers('radhs_helper');
		$this->load->model('account_model');
		$this->load->model('client_model');
		$this->load->model('ss_model');
	}
	public function index()
	{
		rules_email();
		if ($this->form_validation->run() == false) {
			$data['title'] = "Home";
			$data['acn'] = $this->account_model->new_account();
			$data['views'] = 'dashboard';
			$this->load->view("_bahan_frontend/index", $data);
		} else {
			$this->_process_buy();
		}
	}
	//LIST ACCOUNT
	public function accounts($sort = 'new', $page = 0)
	{
		rules_email();
		if ($this->form_validation->run() == false) {
			$per_page 	= 6;
			$order_by 	= sorting_by($sort);
			$site_url 	= site_url('A/accounts/' . $sort);
			$account 	= $this->account_model->active($order_by['order'], $per_page, $page);
			$total 		= $account['num_rows'];
			$data['title'] 		= $order_by['title'];
			$data['account'] 	= $account['result'];
			$data['pagination'] = pagination($total, $site_url, $per_page);
			$data['views'] 		= 'list_accounts';
			$this->load->view("_bahan_frontend/index", $data);
		} else {
			$this->_process_buy();
		}
	}
	//SEARCH
	public function search_accounts($page = 0)
	{
		$keyword = urldecode(htmlspecialchars($this->input->get('find')));
		if (!isset($keyword) || $keyword == '') {
			if ($this->session->userdata('search')) {
				$keyword = $this->session->userdata('search');
			} else {
				redirect('A');
			}
		} else {
			$this->session->set_userdata('search', $keyword);
		}
		rules_email();
		if ($this->form_validation->run() == false) {
			$limit 	= 6;
			$search_account = $this->account_model->search($keyword, $limit, $page);
			$jml = $search_account['num_rows'];
			if ($jml > 0) {
				$site_url 	= site_url('A/search_accounts/');
				$data['keyword'] = $keyword;
				$data['data'] 	= $search_account['result'];
				$data['pagination'] = pagination($jml, $site_url, $limit);;
				$data['title'] = "Search result for : " . $keyword;
				$data['views'] = 'search_account';
			} else {
				$data['title'] = $keyword . ' not Found';
				$data['views'] = 'search_not_found';
			}
			$this->load->view("_bahan_frontend/index", $data);
		} else {
			$this->_process_buy();
		}
	}
	//DETAIL
	public function detail_account($id_acn = null)
	{
		if ($id_acn == null) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Account not found</b>!!!</div>');
			redirect(base_url('A/accounts'));
		}
		$account = $this->account_model->get_account($id_acn)->row();
		if ($account->status != '0') {
			rules_email();
			if ($this->form_validation->run() == false) {
				$data['account'] = $account;
				$data['title'] 	= $account->title;
				$data['ss'] 	= $this->ss_model->get_ss($id_acn);
				$data['views'] = 'detail_account';
				$this->load->view("_bahan_frontend/index", $data);
			} else {
				$this->_process_buy();
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Account not found</b>!!!</div>');
			redirect(base_url("A/blocked"));
		}
	}
	//PROCESS BUY
	private function _process_buy()
	{
		$email	= $this->input->post('email', true);
		$id_acn	= $this->input->post('id_acn', true);
		$admin  	= $this->mydb->get_admin()->row_array();
		$contact_us = $this->mydb->contact_us()->row_array();
		$account 	= $this->account_model->get_account($id_acn)->row_array();

		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_user' => $contact_us['gmail'],  // Email gmail
			'smtp_pass'   => $contact_us['pw_gmail'],  // Password gmail
			'smtp_crypto' => 'ssl',
			'smtp_port'   => 465,
			'crlf'    => "\r\n",
			'newline' => "\r\n"
		];
		$this->load->library('email', $config);
		$this->email->from('pokego@epizy.com', 'Pokego.epizy'); // Email sistem
		$this->email->to($email); //Email pembeli
		$this->email->subject('Purchase Account');
		$this->email->message("<p>Dear, Buyer <br>
					Did you buy this Account : <br>
					<table border='0'>
						<tr> <td>ID</td><td>: <a href='" . base_url("A/detail_account/" . $account['id_acn']) . "'>" . $account['id_acn'] . "</a></td> </tr>
						<tr> <td>Title</td><td>: " . $account['title'] . "</td> </tr>
						<tr> <td>Team</td><td>: " . $account['team'] . "</td> </tr>
						<tr> <td>Level</td><td>: " . $account['level'] . "</td> </tr>
						<tr> <td>Pokecoins</td><td>: " . $account['pocecoins'] . "</td> </tr>
						<tr> <td>Pokemon Bag</td><td>: " . $account['pokemon'] . "</td> </tr>
						<tr> <td>Stardust</td><td>: " . $account['star_dust'] . "</td> </tr>
						<tr> <td>Start Date</td><td>: " . $account['start_date'] . "</td> </tr>
						<tr> <td>Price</td><td>: $" . $account['price'] . "</td> </tr>
					</table>
					<p>If you don't buy this account, <a href='" . base_url("A/cancel_purchase/") . $account['code'] . "'>Click here to cancel</a><br>
					For the payment process send to paypal email : " . $contact_us['paypal'] . "<br>
					And reply to this message by sending a photo / picture of proof of payment <br>
					We will send the account information that has been purchased to this Email address.<br>
				</p>
				");
		if ($this->email->send()) {
			$this->load->library('email', $config);
			$this->email->from('pokego@epizy.com', 'pokego.epizy'); // Email sistem
			$this->email->to($admin['email']); // // Email admin
			$this->email->subject('Purchase Account');
			$this->email->message("<h3>" . $email . "</h3>
				<hr> 
					<table border='0'>
						<tr> <td>ID</td><td>: " . $account['id_acn'] . "</td> </tr>
						<tr> <td>Title</td><td>: " . $account['title'] . "</td> </tr>
						<tr> <td>Team</td><td>: " . $account['team'] . "</td> </tr>
						<tr> <td>Level</td><td>: " . $account['level'] . "</td> </tr>
						<tr> <td>Pokecoins</td><td>: " . $account['pokecoins'] . "</td> </tr>
						<tr> <td>Item</td><td>: " . $account['item'] . "</td> </tr>
						<tr> <td>Login Method</td><td>: " . $account['login'] . "</td> </tr>
						<tr> <td>Pokemon Shiny</td><td>: " . $account['p_shiny'] . "</td> </tr>
						<tr> <td>Pokemon Legendary</td><td>: " . $account['p_legendary'] . "</td> </tr>
						<tr> <td>Pokemon Mythical</td><td>: " . $account['p_mythical'] . "</td> </tr>
						<tr> <td>Pokemon Shiny Baby</td><td>: " . $account['p_shiny_baby'] . "</td> </tr>
						<tr> <td>Pokemon with IV 100</td><td>: " . $account['p_iv100'] . "</td> </tr>
						<tr> <td>Pokemon with 3K+ CP</td><td>: " . $account['p_3k'] . "</td> </tr>
						<tr> <td>Pokemon Bag</td><td>: " . $account['pokemon'] . "</td> </tr>
						<tr> <td>Stardust</td><td>: " . $account['star_dust'] . "</td> </tr>
						<tr> <td>Start Date</td><td>: " . $account['start_date'] . "</td> </tr>
						<tr> <td>Price</td><td>: $" . $account['price'] . "</td> </tr>
					</table>
					<hr>
					<a href='" . base_url("Door") . "'>Login for confirm</a>
				");
			if ($this->email->send()) {
				$time = date('Y-m-d H:i:s');
				//INPUT T_CLIENT DENGAN STATUS ON_PROCESS (1)
				$data = array('id_acn' => $id_acn, 'email_cl' => $email, 'dt_purchased' => $time, 'cancel_code' => $account['code']);
				$this->mydb->input_dt($data, 't_client');
				//UPDATE STATUS ACCOUNT JADI DISABLE (2)
				$set = ['status' => '2'];
				$this->mydb->update_dt(['id_acn' => $id_acn], $set, 't_account');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><b>Check your email for the next process!!!</b></div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Email Address not found</b> Enter your email correctly!!!</div>');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Email Address not found</b> Enter your email correctly!!!</div>');
		}
		redirect(base_url("A/detail_account/" . $id_acn));
	}
	// CANCEL PURCHASE
	function cancel_purchase($kd = null)
	{
		if ($kd == null) {
			redirect(base_url("A/blocked"));
		}
		$client = $this->client_model->search_client($kd);
		if ($client->num_rows() > 0) {
			$id_acn = $client->row_array()['id_acn'];
			//UPDATE
			$set = ['status' => '1'];
			$this->mydb->updat_dt(['id_acn' => $id_acn], $set, 't_account');
			//DELETE
			$this->mydb->del(['cancel_code' => $kd], 't_client');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Account Purchase has been cancel</div>');
			redirect(base_url("A/detail_account/" . $id_acn));
		} else {
			redirect(base_url("A/blocked"));
		}
	}
	// BLOCK 
	public function blocked()
	{
		$data['title'] = "Acces Blocked";
		$data['views'] = 'blocked';
		$this->load->view("_bahan_frontend/index", $data);
	}
}
