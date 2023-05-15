<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ss_model extends CI_Model
{
    public function get_ss($id_acn)
    {
        return $this->db->from('t_ss')->where('id_acn', $id_acn)->order_by('no_ss', 'ASC')->get();
    }
    public function select_ss($kd_ss)
    {
        return $this->db->from('t_ss')->where('kd_ss', $kd_ss)->limit(1)->get();
    }
    public function max_height($id_acn)
    {
        return $this->db->select('max(height) as max_h')->from('t_ss')
            ->where('id_acn', $id_acn)->get()->row_array()['max_h'];
    }
}
