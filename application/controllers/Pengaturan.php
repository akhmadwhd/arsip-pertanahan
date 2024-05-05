<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{

	/**
	 * Controller class constructor 
	 *
	 */
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->username && $this->uri->segment(2) != 'login' && $this->uri->segment(2) != 'gologin') {
			redirect('/home/login', 'refresh');
		}
	}

	/**
	 * Method to output complete page with header and footer
	 *
	 */
	protected function __output($nview, $data = null)
	{

		$data['set'] = $this->crud->get('pengaturan', array('id_pengaturan' => '1'))->row();

		$this->load->view('header', $data);
		$this->load->view($nview, $data);
		$this->load->view('footer');
	}

	/**
	 * Method to sanitize input data
	 *
	 * @return String
	 *
	 */
	protected function __sanitizeString($str)
	{
		// return filter_var($this->__sanitizeString( $str),FILTER_SANITIZE_STRING);
		//return $this->db->escape($this->__sanitizeString( $str));
		//return $this->db->escape(filter_var($str,FILTER_SANITIZE_STRING));
		return html_purify($str);
	}

	/**
	 * Default 
	 *
	 */
	public function index()
	{
		if ($_SESSION['tipe'] !== 'admin') {
			$this->session->set_flashdata('error', 'Url Hanya untuk Admin');
			redirect('/home', 'refresh');
		}

		$katakunci = $this->__sanitizeString($this->input->get('katakunci'));

		$q = "SELECT * FROM pengaturan ";
		if ($katakunci) {
			$q .= ' WHERE site_title LIKE \'%' . $katakunci . '%\' OR site_nama LIKE \'%' . $katakunci . '%\' ';
		}
		$q .= " ORDER BY id_pengaturan ASC";
		$hsl = $this->db->query($q);
		$data['setting'] = $hsl->row();
		$data["title"] = "Pengaturan";
		$this->__output('pengaturan', $data);
	}

	public function edit()
	{

		$site_title = $this->__sanitizeString($this->input->post('site_title'));
		$site_nama = $this->__sanitizeString($this->input->post('site_nama'));
		$id = $this->__sanitizeString($this->input->post('id'));

		$config['upload_path'] = 'assets/images/';
		$config['allowed_types'] = 'jpg';
		$config['encrypt_name'] = true;
		$config['overwrite'] = true;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('background')) {
			$datafile = $this->upload->data();
			//$file = $datafile['full_path'];
			$file = $datafile['file_name'];
		} else {
			echo $this->upload->display_errors();
		}

		$q = sprintf("UPDATE pengaturan SET site_title='%s'", $site_title);
		$q .= sprintf(", site_nama='%s'", $site_nama);
		$q .= sprintf(", site_background='%s'", $file);
		$q .= sprintf(" WHERE id_pengaturan=%d", $id);
		$hsl = $this->db->query($q);
		if ($hsl) {
			$this->session->set_flashdata('success', "Pengaturan berhasil disimpan");
			redirect('/pengaturan', 'refresh');
		} else {
			$this->session->set_flashdata('error', 'Error pengaturan');
			redirect('/pengaturan', 'refresh');
		}
	}

	/**
	 * Default 
	 *
	 */
	public function profil()
	{
		$q = "SELECT * FROM master_user WHERE username='" . $_SESSION['username'] . "'";
		$hsl = $this->db->query($q);
		$data['user'] = $hsl->row();
		$data["title"] = "Profil";
		$this->__output('profil', $data);
	}

	/**
	 * Update user data and respond in JSON format
	 *
	 */
	public function save_profil()
	{
		$password_str = $this->input->post('password');
		$conf_password_str = $this->input->post('conf_password');
		if ($password_str !== $conf_password_str) {
			$this->session->set_flashdata('error', 'Konfirmasi password yang ada masukkan tidak sama');
			redirect('/pengaturan/profil', '');
		} else {
			$username = $this->__sanitizeString($this->input->post('username'));
			$password = "";
			if ($this->input->post('password') != "") {
				$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
			}

			$id = $this->__sanitizeString($this->input->post('id'));
			$q = sprintf("UPDATE master_user SET username='%s'", $username);
			if ($password != "") {
				$q .= sprintf(",password='%s'", $password);
			}

			$q .= sprintf("WHERE id=%d", $id);
			$hsl = $this->db->query($q);
			if ($hsl) {
				$this->session->set_flashdata('success', "Pengaturan profil disimpan");
				redirect('/pengaturan/profil', 'refresh');
			} else {
				$this->session->set_flashdata('error', 'Error pengaturan profil');
				redirect('/pengaturan/profil', 'refresh');
			}
		}
	}
}
