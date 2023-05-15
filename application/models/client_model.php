<?php
defined('BASEPATH') or exit('No direct script access allowed');

class client_model extends CI_Model
{
    public function get_client($kd)
    {
        return $this->db->from('t_client')->where('no_process', $kd)->limit(1)->get();
    }
    public function search_client($kd)
    {
        return $this->db->from('t_client')->where('on_process', '1')->where('cancel_code', $kd)->limit(1);
    }
    function list_client()
    {
        return $this->db->where('on_process', '1')->order_by('no_process', 'DESC')->get('t_client');
    }
    function list_purchased()
    {
        return $this->db->where('on_process', '0')->order_by('no_process', 'DESC')->get('t_client')->result();
    }
}
