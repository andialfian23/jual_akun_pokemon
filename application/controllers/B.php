<?php defined('BASEPATH') or exit('No direct script access allowed');

class B extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != true) {
			redirect(base_url("A/blocked"));
		}
		if ($this->session->userdata('lvl') != '1') {
			redirect(base_url("A/blocked"));
		}
		$this->db->query('delete from t_client where on_process="1" and datediff(now(),dt_purchased) > 1');
		$this->db->query('update t_account set status="1" where status="2" and purchased="0"');
		$this->load->helpers('radhs_helper');
		$this->load->model('account_model');
		$this->load->model('client_model');
	}
	public function index()
	{
		if ($this->agent->is_browser()) {
			$agent = $this->agent->browser() . ' ' . $this->agent->version();
		} else if ($this->agent->is_mobile()) {
			$agent = $this->agent->mobile();
		} else {
			$agent = 'Data user gagal di dapatkan';
		}

		$data['title'] 		= "Dashboard";
		$data['browser'] 	= $agent;
		$data['so'] 		= $this->agent->platform();
		$data['ip'] 		= $this->input->ip_address();
		$data['jml_account'] = $this->account_model->list_account()->num_rows();
		$data['acn'] 		 = $this->account_model->new_account();
		$data['view'] = '_adm/dashboard';
		$this->load->view("_bahan_backend/index", $data);
	}
	//profill
	public function profile()
	{
		if ($this->agent->is_browser()) {
			$agent = $this->agent->browser() . ' ' . $this->agent->version();
		} else if ($this->agent->is_mobile()) {
			$agent = $this->agent->mobile();
		} else {
			$agent = 'Unknown';
		}
		$data['title'] = "My Profile";

		$data['admin'] 	= $_SESSION['set_id'];
		$data['so'] 	= $this->agent->platform();
		$data['ip'] 	= $this->input->ip_address();
		$data['login'] 	= $this->mydb->last_login();
		$data['browser'] = $agent;
		$data['contact'] = $this->mydb->contact_us()->row();

		$data['view'] = '_adm/profile';
		$this->load->view("_bahan_backend/index", $data);
	}
	// EDIT
	public function change_contact_us()
	{
		rules_contact_us();
		if ($this->form_validation->run() == false) {
			$data['title'] 	=  "Change Contact Us";
			$data['contact'] = $this->mydb->contact_us()->row();
			$data['view'] 	= '_adm/change_contact_us';
			$this->load->view("_bahan_backend/index", $data);
		} else {
			$where = array('kd_cu' => 1);
			$data = [
				'gmail' => $this->input->post('gmail', true),
				'pw_gmail' => $this->input->post('pw_gmail', true),
				'paypal' => $this->input->post('paypal', true),
				'ebay' => $this->input->post('ebay', true),
				'g2g' => $this->input->post('g2g', true),
				'discord' => $this->input->post('discord', true),
				'fb' => $this->input->post('fb', true),
				'instagram' => $this->input->post('ins', true)
			];
			$this->mydb->update_dt($where, $data, 't_contact_us');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update <b>Contact</b> Success!!!</div>');
			redirect(base_url("B/profile"));
		}
	}
	public function change_username()
	{
		rules_username();
		if ($this->form_validation->run() == false) {
			$data['title'] =  "Change Username Admin";
			$data['view']  = '_adm/change_username';
			$this->load->view("_bahan_backend/index", $data);
		} else {
			$old = $this->input->post('username1', true);
			$new = htmlspecialchars($this->input->post('username2', true));
			$pass = htmlspecialchars($this->input->post('password', true));
			$un = $this->session->userdata('set_id');
			if ($old != $un) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Current Username is wrong!!</div>');
			} else {
				if ($new == $old) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Username cannot be the same as Current Username!!</div>');
				} else {
					$cek_un = $this->mydb->get_admin($new);
					if ($cek_un->num_rows() > 0) {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Username</b> has been used!!!</div>');
					} else {
						$data = $this->mydb->auth_adm($un);
						if (password_verify($pass, $data['pw'])) {
							$update = array('un' => $new);
							$where1 = array('un' => $data['un'], 'pw' => $data['pw']);
							$where2 = array('un' => $data['un']);
							$this->mydb->update_dt($where1, $update, 't_door');
							$this->mydb->update_dt($where2, $update, 't_history');
							$this->session->set_userdata('set_id', $new);
							$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update <b>Username</b> Success!!!</div>');
							redirect(base_url("B/profile"));
						} else {
							$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password is Wrong!!!!</div>');
						}
					}
				}
			}
			redirect(base_url("B/change_username"));
		}
	}
	public function change_password()
	{
		rules_password();
		if ($this->form_validation->run() == false) {
			$data['title'] = "Change Password Admin";
			$data['view'] = '_adm/change_password';
			$this->load->view("_bahan_backend/index", $data);
		} else {
			$current = htmlspecialchars($this->input->post('password'));
			$new = htmlspecialchars($this->input->post('password1'));
			$un = $this->session->userdata('set_id');
			$data = $this->mydb->get_admin($un)->row_array();
			if (!password_verify($current, $data['pw'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!!</div>');
				redirect(base_url('B/change_password'));
			} else {
				if ($current == $new) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Password cannot be the same as current password!!</div>');
					redirect(base_url('B/change_password'));
				} else {
					$password_hash = password_hash($new, PASSWORD_DEFAULT);
					$this->db->set('pw', $password_hash);
					$this->db->where('un', $un);
					$this->db->update('t_door');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed!!</div>');
					redirect(base_url('B/profile'));
				}
			}
		}
	}
	//PROCESS
	public function change_gmail()
	{
		$gmail = $this->input->post('gmail', true);
		//create token
		$token = base64_encode(random_bytes(32));
		$data = [
			'email' => $gmail,
			'token' => $token,
			'date_created' => time()
		];
		$this->db->insert('t_token', $data);

		$this->_setEmail($gmail, $token);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Check Email ' . $gmail . ' for confirm change Admin Email!!</div>');
		redirect(base_url('B/profile'));
	}
	private function _setEmail($gmail, $token)
	{
		$contact = $this->mydb->contact_us()->row_array();
		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_user' => $contact['gmail'],          // Email contact us
			'smtp_pass'   => $contact['pw_gmail'],      // Password contact us
			'smtp_crypto' => 'ssl',
			'smtp_port'   => 465,
			'crlf'    => "\r\n",
			'newline' => "\r\n"
		];
		$this->load->library('email', $config);
		$this->email->from($contact['email'], 'pokego');
		$this->email->to($gmail);
		$this->email->subject('Change Admin Email');
		$this->email->message("Click this link to confirm of change Admin Email : <a href='" . base_url('B/confirm_email?email=' . $gmail . '&token=' . urlencode($token)) . "'>Confirm</a>");

		if ($this->email->send()) {
			return true;
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Send Email has been <b>Failed</b></div>');
			redirect(base_url("B/profile"));
		}
	}
	public function confirm_email()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$user = $this->db->get_where('t_token', ['email' => $email])->row_array();
		if ($user) {
			$user_token = $this->db->get_where('t_token', ['token' => $token])->row_array();
			if ($user_token) {
				if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
					//change admin
					$set = array('email', $email);
					$where1 = array('lvl', '1');
					$this->mydb->update_dt($where1, $set, 't_door');
					//del token
					$where2 = ['token' => $token];
					$this->mydb->del($where2, 't_token');
					//alert success
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Change Admin Email has been success</div>');
					redirect(base_url('B/profile'));
				} else {
					$this->mydb->del(['email' => $email, 'token' => $token], 't_token');
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token expired</div>');
					redirect(base_url('A'));
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Change Admin Email failed! Wrong token!</div>');
				redirect(base_url('A'));
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Change Admin Email failed! Wrong email!</div>');
			redirect(base_url("B"));
		}
	}
	//histori login
	public function history_login()
	{
		$data['title'] 	= "History Login";
		$data['login'] 	= $this->mydb->history_login();
		$data['view'] = '_adm/history_login';
		$this->load->view("_bahan_backend/index", $data);
	}
}
