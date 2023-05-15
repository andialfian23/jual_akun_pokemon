<?php

function rules_input()
{
	$ieu = get_instance();
	$ieu->form_validation->set_rules('title', 'Title', 'required|trim', ['required' => 'Bagian ini tidak boleh kosong']);
	$ieu->form_validation->set_rules('lvl', 'Level', 'required|trim|integer', [
		'required' => 'Bagian ini tidak boleh kosong', 'integer' => 'Bagian ini harus berupa bilangan Integer'
	]);
	$ieu->form_validation->set_rules('coin', 'Pokecoins', 'required|trim|integer', [
		'required' => 'Bagian ini tidak boleh kosong', 'integer' => 'Bagian ini harus berupa bilangan integer'
	]);
	$ieu->form_validation->set_rules('sd', 'Stardust', 'required|trim|integer', [
		'required' => 'Bagian ini tidak boleh kosong', 'integer' => 'Bagian ini harus berupa bilangan Integer'
	]);
	$ieu->form_validation->set_rules('sdt', 'Start Date', 'required|trim', ['required' => 'Bagian ini tidak boleh kosong']);
	$ieu->form_validation->set_rules('item', 'Item', 'required|trim', ['required' => 'Bagian ini tidak boleh kosong']);
	$ieu->form_validation->set_rules('login', 'Login', 'required|trim', ['required' => 'Bagian ini tidak boleh kosong']);
	$ieu->form_validation->set_rules('price', 'Price', 'required|trim', ['required' => 'Bagian ini tidak boleh kosong']);

	$ieu->form_validation->set_rules('p_shi', 'Pokemon Shiny', 'required|trim|integer', [
		'required' => 'Bagian ini tidak boleh kosong', 'integer' => 'Bagian ini harus berupa bilangan Integer'
	]);
	$ieu->form_validation->set_rules('p_leg', 'Pokemon Legendary', 'required|trim|integer', [
		'required' => 'Bagian ini tidak boleh kosong', 'integer' => 'Bagian ini harus berupa bilangan Integer'
	]);
	$ieu->form_validation->set_rules('p_myt', 'Pokemon Mytical', 'required|trim|integer', [
		'required' => 'Bagian ini tidak boleh kosong', 'integer' => 'Bagian ini harus berupa bilangan Integer'
	]);
	$ieu->form_validation->set_rules('p_shi_b', 'Pokemon Shiny Baby', 'required|trim|integer', [
		'required' => 'Bagian ini tidak boleh kosong', 'integer' => 'Bagian ini harus berupa bilangan Integer'
	]);
	$ieu->form_validation->set_rules('p_iv', 'Pokemon with IV 100', 'required|trim|integer', [
		'required' => 'Bagian ini tidak boleh kosong', 'integer' => 'Bagian ini harus berupa bilangan Integer'
	]);
	$ieu->form_validation->set_rules('p_3k', 'Pokemon With 3K+', 'required|trim|integer', [
		'required' => 'Bagian ini tidak boleh kosong', 'integer' => 'Bagian ini harus berupa bilangan Integer'
	]);
	$ieu->form_validation->set_rules('pokemon', 'Pokemon Bag', 'required|trim', ['required' => 'Bagian ini tidak boleh kosong']);
}
function rules_contact_us()
{
	$ieu = get_instance();
	$ieu->form_validation->set_rules('gmail', 'Gmail', 'required|trim|valid_email|is_unique[t_door.email]', ['is_unique' => 'This email has already registered!']);
	$ieu->form_validation->set_rules('pw_gmail', 'Password Gmail', 'required|trim');
	$ieu->form_validation->set_rules('paypal', 'Paypal', 'required|trim|valid_email');
	$ieu->form_validation->set_rules('ebay', 'ebay', 'required|trim');
	$ieu->form_validation->set_rules('g2g', 'G2g', 'required|trim');
	$ieu->form_validation->set_rules('discord', 'Discord', 'required|trim');
	$ieu->form_validation->set_rules('fb', 'Facebook', 'required|trim');
	$ieu->form_validation->set_rules('ins', 'Instagram', 'required|trim');
}
function rules_username()
{
	$ieu = get_instance();
	$ieu->form_validation->set_rules('username1', 'Old Username', 'required|trim');
	$ieu->form_validation->set_rules('username2', 'New Username', 'required|trim');
	$ieu->form_validation->set_rules('password', 'Password', 'required|trim');
}
function rules_password()
{
	$ieu = get_instance();
	$ieu->form_validation->set_rules('password', 'Current Password', 'required|trim');
	$ieu->form_validation->set_rules('password1', 'New Password', 'required|trim|min_length[6]');
	$ieu->form_validation->set_rules('password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[password1]');
}
function rules_email()
{
	$ieu = get_instance();
	$ieu->form_validation->set_rules('email', 'Email', 'trim|valid_email');
}

function tanggal($date)
{
	$BulanIndo = array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Des");

	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	$tgl   = substr($date, 8, 2);

	$result = $tgl . " " . $BulanIndo[(int)$bulan - 1] . " " . $tahun;
	return ($result);
}

function pagination($total, $site_url, $limit)
{
	$ieu = get_instance();
	$config['base_url'] = $site_url; //site url
	$config['total_rows'] = $total; //total row
	$config['per_page'] = $limit;  //show record per halaman
	$choice = $config["total_rows"] / $config["per_page"];
	$config["num_links"] = floor($choice);
	$config['first_link']        = 'First';
	$config['last_link']        = 'Last';
	$config['next_link']        = 'Next';
	$config['prev_link']        = 'Previous';
	$config['cur_tag_open']     = '<li class="page-item active bg-dark"><span class="page-link">';
	$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	$ieu->pagination->initialize($config);

	return $ieu->pagination->create_links();
}

function sorting_by($type = 'new')
{
	if ($type == "title_a_z") {
		$data['order'] = "title ASC";
		$data['title'] = "Title A to Z";
	} else if ($type == "title_z_a") {
		$data['order'] = "title DESC";
		$data['title'] = "Title Z to A";
	} else if ($type == "level_low_to_high") {
		$data['order'] = "level ASC";
		$data['title'] = "Level Low to High";
	} else if ($type == "level_high_to_low") {
		$data['order'] = "level DESC";
		$data['title'] = "Level High to Low";
	} else if ($type == "price_low_to_high") {
		$data['order'] = "price ASC";
		$data['title'] = "Price Low to High";
	} else if ($type == "price_high_to_low") {
		$data['order'] = "price DESC";
		$data['title'] = "Price High to Low";
	} else if ($type == "p_shiny") {
		$data['order'] = "p_shiny DESC";
		$data['title'] = "Shiny Pokemon";
	} else if ($type == "p_legendary") {
		$data['order'] = "p_legendary DESC";
		$data['title'] = "Legendary Pokemon";
	} else if ($type == "old") {
		$data['order'] = "id_acn ASC";
		$data['title'] = "Old to New";
	} else {
		$data['order'] = "id_acn DESC";
		$data['title'] = "New Account Release";
	}
	return $data;
}
