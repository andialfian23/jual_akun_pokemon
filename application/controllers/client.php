<?php defined('BASEPATH') or exit('No direct script access allowed');

class client extends CI_Controller
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
    {   //list akun dipesan client
        $data['title']  = "List Account On Process";
        $data['client'] = $this->client_model->list_client();
        $data['view']   = 'client/list_on_process';
        $this->load->view("_bahan_backend/index", $data);
    }
    public function list_purchased()
    {    //list akun terjual
        $data['title']      = "List Account Purchased";
        $data['purchased']  = $this->client_model->list_purchased();
        $data['view']       = 'client/list_purchased';
        $this->load->view("_bahan_backend/index", $data);
    }
    function status_purchase($no_process = null, $id_acn = null)
    {
        $this->_setEmail($no_process);
        //UPDATE ON_PROCESS = 1 TO 0
        $time   = date('Y-m-d H:i:s');
        $set1   = ['on_process' => '0', 'dt_purchased' => $time];
        $where1 = ['no_process' => $no_process];
        $this->mydb->update_dt($where1, $set1, 't_client');

        //UPDATE ACCOUNT TO DISABLED (2)
        $set2   = ['status' => '2'];
        $where2 = ['id_acn' => $id_acn];
        $this->mydb->update_dt($where2, $set2, 't_account');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><b>Account</b> has been <b>purchased</b></div>');
        redirect(base_url("client/list_purchased"));
    }
    function cancel_purchase($no_process = null, $id_acn = null)
    {
        $where = ['no_process' => $no_process];
        $this->mydb->del($where, 't_client');
        //UPDATE
        $set = ['status' => '1'];
        $this->mydb->updat_dt(['id_acn' => $id_acn], $set, 't_account');
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"><b>Purchased</b> has been <b>cancel</b></div>');
        redirect(base_url("account/detail_account/" . $id_acn));
    }
    public function _setEmail($no_process)
    {
        $contact = $this->contact_model->get_contact();
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
        $client = $this->client_model->get_client($no_process)->row_array();
        $this->email->from($contact['email'], 'pokego');
        $this->email->to($client['email_cl']);
        $this->email->subject('Purchase Account');
        $this->email->message("<h6>Thank you for your purchase</h6>");

        if ($this->email->send()) {
            return true;
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Send Email has been <b>Failed</b></div>');
            redirect(base_url("client/list_purchased"));
        }
    }
}
