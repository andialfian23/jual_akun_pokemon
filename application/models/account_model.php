<?php
defined('BASEPATH') or exit('No direct script access allowed');

class account_model extends CI_Model
{
    public function get_account($id)
    {
        return $this->db->get_where('t_account', ['id_acn' => $id]);
    }
    public function get_ss($ss)
    {
        return $this->db->get_where('t_account', ['ss' => $ss]);
    }
    // ALL ACCOUNT
    function list_account()
    {
        return $this->db->order_by('id_acn', 'DESC')->get('t_account');
    }
    // DASHBOARD
    public function new_account() // show new 6 account (status != 0 ) 
    {
        return $this->db->where('status!=', '0')->where('purchased', '0')
            ->order_by('id_acn', 'DESC')->limit(6)->get('t_account')->result();
    }
    // ACTIVE (1) && DISABLE (2)
    function active($sort, $limit, $start)
    {
        $data['result'] = $this->db->query("select * from t_account where status!='0' and purchased='0' 
                        order by " . $sort . " LIMIT " . $start . "," . $limit);
        $data['num_rows'] = $this->db->where('status!=', '0')->where('purchased', '0')->get('t_account')->num_rows();
        return $data;
    }
    //SEARCH
    public function search($keyword, $limit, $start)
    {
        $data['result'] = $this->db->where('status', '1')->where('purchased', '0')
            ->like('team', $keyword)->or_like('title', $keyword)
            ->order_by('id_acn', 'DESC')->limit($limit, $start)->get('t_account');
        $data['num_rows'] = $this->db->where('status', '1')->where('purchased', '0')
            ->like('team', $keyword)->or_like('title', $keyword)
            ->order_by('id_acn', 'DESC')->get('t_account')->num_rows();
        return $data;
    }
}
