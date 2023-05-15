<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mydb extends CI_Model
{
	//insert,update,delete
	function input_dt($data, $table)
	{
		$this->db->insert($table, $data);
	}
	function update_dt($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	function del($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	//Auth
	function get_admin($username = null)
	{
		if ($username == null) {
			return $this->db->limit(1)->get('t_door');
		} else {
			return $this->db->get_where('t_door', ['un' => $username]);
		}
	}
	function contact_us()
	{
		return $this->db->get_where("t_contact_us", ['kd_cu' => '1']);
	}
	//UPLOAD & RESIZE IMAGE
	public function uploadImage($fieldname, $filename, $folder, $ext_to_lower = true)
	{
		$config = [
			'upload_path' => $folder,
			'file_name' => $filename,
			'allowed_types' => 'jpg|png|jpeg',
			'max_size' => 8048,
			'overwrite' => true,    //menindih file yg sudah di upload dgn yg baru
			'file_ext_tolower' => $ext_to_lower,
		];
		$this->load->library('upload', $config);
		if ($this->upload->do_upload($fieldname)) {
			return $this->upload->data();
		} else {
			// $this->form_validation->add_to_error_array($fieldname, $this->upload->display_errors('', ''));
			return false;
		}
	}
	//history login
	function history_login()
	{
		return $this->db->order_by('dt', 'DESC')->get('t_history')->result();
	}
	function last_login()
	{
		return $this->db->order_by('dt', 'DESC')->limit(6)->get('t_history')->result();
	}
}
