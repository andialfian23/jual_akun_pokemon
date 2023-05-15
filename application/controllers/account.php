<?php defined('BASEPATH') or exit('No direct script access allowed');

class account extends CI_Controller
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
        $this->load->model('ss_model');
    }
    public function index()
    {
        $data['title']  = "List Account";
        $data['acn']    = $this->account_model->list_account();
        $data['view']   = 'account/list_account';
        $this->load->view("_bahan_backend/index", $data);
    }
    public function detail_account($id = null)
    {
        if ($id == null) {
            redirect(base_url("A/blocked"));
        }
        $data['account']   = $this->account_model->get_account($id)->row();
        $data['title']  = 'Detail Account';
        $data['ss']     = $this->ss_model->get_ss($id);
        $data['view']   = 'account/detail_account';
        $this->load->view("_bahan_backend/index", $data);
    }
    // ADD
    public function add_account()
    {
        rules_input();
        if ($this->form_validation->run() == false) {
            $data['title']  = "Add Account";
            $data['view']   = 'account/add_account';
            $this->load->view("_bahan_backend/index", $data);
        } else {
            $this->_p_add_account();
        }
    }
    private function _p_add_account()
    {
        $nama_file  = date("YmdHis");
        $folder     = './img/';
        //proses upload 
        $proses = $this->mydb->uploadImage('ss', $nama_file, $folder);
        if ($proses) {
            $ss = $this->upload->data('file_name');
            $image_height = $this->upload->data('image_height');
            $id = date('YmdHisa');
            $id_acn = md5($id);
            $data1 = [
                'id_acn' => $id,
                'title' => $this->input->post('title', true),
                'team' => $this->input->post('name', true),
                'level' => $this->input->post('lvl', true),
                'pokecoins' => $this->input->post('coin', true),
                'star_dust' => $this->input->post('sd', true),
                'start_date' => $this->input->post('sdt', true),
                'item' => $this->input->post('item', true),
                'login' => $this->input->post('login', true),
                'price' => $this->input->post('price', true),
                'p_shiny' => $this->input->post('p_shi', true),
                'p_legendary' => $this->input->post('p_leg', true),
                'p_mythical' => $this->input->post('p_myt', true),
                'p_shiny_baby' => $this->input->post('p_shi_b', true),
                'p_iv100' => $this->input->post('p_iv', true),
                'p_3k' => $this->input->post('p_3k', true),
                'pokemon' => $this->input->post('pokemon', true),
                'ss' => $ss,
                'status' => 1,
                'code' => sha1($id_acn)
            ];
            $this->mydb->input_dt($data1, 't_account');
            $data2 = array('id_acn' => $id, 'ss' => $ss, 'no_ss' => 1, 'height' => $image_height);
            $this->mydb->input_dt($data2, 't_ss');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Account has been saved!!!</div>');
            redirect(base_url("account/detail_account/" . $id));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            redirect(base_url("account/add_account"));
        }
    }
    // EDIT
    public function edit_account($id = null)
    {
        $account = $this->account_model->get_account($id)->row();
        rules_input();
        if ($this->form_validation->run() == false) {
            $data['title']  = "Edit Account";
            $data['account'] = $account;
            $data['view']   = 'account/edit_account';
            $this->load->view("_bahan_backend/index", $data);
        } else {
            $this->_p_edit_account();
        }
    }
    private function _p_edit_account()
    {
        $id = $this->uri->segment(3);
        $title = $this->input->post('title', true);
        $data = [
            'title' => $title,
            'team' => $this->input->post('name', true),
            'level' => $this->input->post('lvl', true),
            'pokecoins' => $this->input->post('coin', true),
            'star_dust' => $this->input->post('sd', true),
            'start_date' => $this->input->post('sdt', true),
            'item' => $this->input->post('item', true),
            'login' => $this->input->post('login', true),
            'price' => $this->input->post('price', true),
            'p_shiny' => $this->input->post('p_shi', true),
            'p_legendary' => $this->input->post('p_leg', true),
            'p_mythical' => $this->input->post('p_myt', true),
            'p_shiny_baby' => $this->input->post('p_shi_b', true),
            'p_iv100' => $this->input->post('p_iv', true),
            'p_3k' => $this->input->post('p_3k', true),
            'pokemon' => $this->input->post('pokemon', true)
        ];
        $where = array('id_acn' => $id);
        $this->mydb->update_dt($where, $data, 't_account');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Updated <b>' . $title . '</b> Success!!!</div>');
        redirect(base_url("account/detail_account/" . $id));
    }
    //PROCESS
    function status_account($st = null, $kd = null)
    {
        if (($st == null) && ($kd == null)) {
            redirect(base_url("A/blocked"));
        }
        if ($st == "1") {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><b>Account</b> successfully <b>Activated</b>!!!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Account</b> successfully <b>Deactivated</b>!!!</div>');
        }
        $data = array('status' => $st);
        $where = array('id_acn' => $kd);
        $this->mydb->update_dt($where, $data, 't_account');
        redirect(base_url("account/detail_account/" . $kd));
    }
    //DELETE
    function del($id_acn = null)
    {
        if ($id_acn == null) {
            redirect(base_url("A/blocked"));
        }
        // DELETE FILE SS
        $account = $this->account_model->get_account($id_acn)->row();
        unlink('./img/' . $account->ss);
        $ss = $this->ss_model->get_ss($id_acn)->result();
        foreach ($ss as $t) {
            unlink('./img/' . $t->ss);
        }
        // DELETE DATA
        $where = ['id_acn' => $id_acn];
        $this->mydb->del($where, 't_account');
        $this->mydb->del($where, 't_ss');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><b>Account</b> Successfully <b>Deleted</b></div>');
        redirect(base_url("account"));
    }
    // SS
    function add_picture($id_acn = null)
    {
        if ($id_acn == null) {
            redirect(base_url("A/blocked"));
        }
        $nama_file  = date("YmdHis");
        $folder     = './img/';
        //proses upload 
        $proses = $this->mydb->uploadImage('ss', $nama_file, $folder);
        if ($proses) {
            $ss = $this->upload->data('file_name');
            $image_height = $this->upload->data('image_height');
            // print_r(json_encode($this->upload->data()));
            $no_ss      = date('YmdHisa');
            $data_ss = [
                'id_acn' => $id_acn, 'ss' => $ss, 'no_ss' => $no_ss, 'height' => $image_height
            ];
            $this->mydb->input_dt($data_ss, 't_ss');

            $account = $this->account_model->get_account($id_acn)->row_array();
            if ($account['ss'] == '' || $account['ss'] == ' ' || $account['ss'] == null) {
                $set_account    = array('ss' => $ss);
                $where_account  = array('id_acn' => $id_acn);
                $this->mydb->update_dt($where_account, $set_account, 't_account');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Add Picture Success!!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
        }
        redirect(base_url("account/detail_account/" . $id_acn));
    }
    function del_ss($kd_ss = null)
    {
        $ss = $this->ss_model->select_ss($kd_ss)->row_array();

        $account = $this->account_model->get_ss($ss['ss']);
        if ($account->num_rows() > 0) {
            $account = $account->row_array();
            $set = array('ss' => ' ', 'status' => '0');
            $where = array('id_acn' => $account['id_acn']);
            $this->mydb->update_dt($where, $set, 't_account');
        }
        //HAPUS FILE SS
        unlink('./img/' . $ss['ss']);
        $this->mydb->del(['kd_ss' => $kd_ss], 't_ss');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><b>Picture</b> Successfully <b>Deleted</b></div>');
        redirect(base_url("account/detail_account/" . $ss['id_acn']));
    }
}
