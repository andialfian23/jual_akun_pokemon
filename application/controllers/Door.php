<?php defined('BASEPATH') or exit('No direct script access allowed');

class Door extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->query('delete from t_client where on_process="1" and datediff(now(),dt_purchased) > 1');
	}
	public function index()
	{
		if ($this->session->userdata('masuk') == true) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You has been login!</div>');
			redirect(base_url("B"));
		}
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = "Door Admin";
			$data['view'] = 'sign_in';
			$this->load->view("_auth/index", $data);
		} else {
			$this->_login();
		}
	}
	private function _login()
	{
		$username = htmlspecialchars($this->input->post('username', true));
		$password = htmlspecialchars($this->input->post('password', true));
		$user = $this->mydb->get_admin($username)->row_array();
		//jika usernya ada
		if ($user) {
			if (password_verify($password, $user['pw'])) {
				$data = [
					'name' 	=> $user['name'],
					'email' => $user['email'],
					'masuk' => true,
					'set_id' => $user['un'],
					'lvl' 	=> $user['lvl']
				];
				$this->session->set_userdata($data);
				if ($this->agent->is_browser()) {
					$browser = $this->agent->browser() . ' ' . $this->agent->version();
				} else if ($this->agent->is_mobile()) {
					$browser = $this->agent->mobile();
				} else {
					$browser = 'Nothing data';
				}

				//INPUT HISTORY LOGIN USER
				date_default_timezone_set('Asia/Jakarta');
				$time = date('Y-m-d H:i:s');
				$so = $this->agent->platform();
				$ip = $this->input->ip_address();
				$data = array('ip_address' => $ip, 'browser' => $browser, 'platform' => $so, 'dt' => $time, 'un' => $data['set_id']);
				$this->mydb->input_dt($data, 't_history');

				redirect(base_url('B'));
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!!</div>');
				redirect(base_url('Door'));
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Username!!</div>');
			redirect(base_url('Door'));
		}
	}
	// public function registration(){
	// if($this->session->userdata('masuk')){
	// $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">You has been login!</div>');
	// redirect(base_url("B"));
	// }

	// $this->form_validation->set_rules('name','Name','required|trim');
	// $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[t_door.email]',
	// array('is_unique' => 'This email has already registered!'));
	// $this->form_validation->set_rules('username','Username','required|trim');
	// $this->form_validation->set_rules('password1','Password','required|trim|min_length[6]',
	// ['min_length' => "Password too short!"]);
	// $this->form_validation->set_rules('password2','Password','required|trim|min_length[6]|matches[password1]',
	// array('matches' => "Password don't match!",'min_length' => "Password too short!"));

	// if($this->form_validation->run()==false){
	// $data['title'] = "Registration";

	// $data['view'] = 'register';
	// $this->load->view("_auth/index", $data);
	// }else{
	// $email = $this->input->post('email',true);
	// $data = [
	// 'name' => htmlspecialchars($this->input->post('name',true)),
	// 'un' => htmlspecialchars($this->input->post('username',true)),
	// 'email' => $email,
	// 'pw' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
	// 'lvl' => 1 //,
	// 'is_active' => 0,
	// 'date_created' => time()
	// ];
	// $token = base64_encode(random_bytes(32));
	// $user_token = [
	// 'email' => $email,
	// 'token' => $token,
	// 'date_created' => time()
	// ];
	// $this->db->insert('t_door',$data);
	// $this->db->insert('t_token',$user_token);
	// $this->_setEmail($token,'verify');
	// $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
	// Congratulation! your account has been created. Please activate your login</div>');
	// redirect('Door');
	// }
	// }
	public function logout()
	{
		$this->session->unset_userdata('set_id');
		$this->session->unset_userdata('lvl');
		$this->session->unset_userdata('masuk');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('email');
		redirect(base_url());
	}
}
