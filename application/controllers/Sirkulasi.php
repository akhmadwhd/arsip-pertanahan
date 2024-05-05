<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Sirkulasi extends CI_Controller
{

	private $data_per_page = 50;

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->tipe == 'admin') {
			redirect('/home/login', 'refresh');
		}
	}

	public function index()
	{
		$this->datalist();
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

	protected function src()
	{
		// simple search
		$katakunci = $this->__sanitizeString($this->input->get('katakunci'));

		$w = array();
		if ($katakunci) {
			// simple search
			$w[] = " s.noarsip like '%" . $katakunci . "%'";
			$w[] = " username_peminjam like '%" . $katakunci . "%'";
			$w[] = " keperluan like '%" . $katakunci . "%'";
		}

		$sql = "SELECT s.*, u.username, a.noarsip,
		  (IF(CURDATE()>s.tgl_haruskembali, 'Terlambat', 'Dipinjam')) AS status 
		  FROM sirkulasi AS s 
          JOIN data_arsip AS a ON a.noarsip=s.noarsip
          LEFT JOIN master_user AS u ON s.username_peminjam=u.username";
		// die($sql);
		// row count
		$sql_row = "SELECT COUNT(*) AS total FROM sirkulasi AS s LEFT JOIN master_user AS u ON s.username_peminjam=u.username";
		// die($sql);

		if ($katakunci) {
			$sql .= " WHERE" . implode(" OR ", $w);
			$sql_row .= " WHERE" . implode(" OR ", $w);
		}
		return array($sql, $sql_row);
	}

	public function datalist($offset = 0)
	{
		$qs = $this->src();
		$sql = $qs[0];
		$sql2 = $qs[1];

		/* berdasarkan username */
		if ($this->session->tipe == "admin") {
			$sql .= " LIMIT $this->data_per_page ";
		} else if ($this->session->tipe == "user") {
			$sql .= " and s.username_peminjam='" . $_SESSION['username'] . "' LIMIT $this->data_per_page ";
		} else {
		}
		$data['current_page'] = 1;
		if ($offset >= $this->data_per_page) {
			$data['current_page'] = floor(($offset + $this->data_per_page) / $this->data_per_page);
		}

		if ($offset > 0) $sql .= "OFFSET $offset";
		$hsl = $this->db->query($sql);
		$data['data'] = $hsl->result_array();
		//$this->session->set_flashdata('zz', $q);
		$jmldata = $this->db->query($sql2)->row();
		$data['jml'] = $jmldata->total;

		$this->load->library('pagination');
		$config['base_url'] = site_url('/sirkulasi/datalist');
		$config['reuse_query_string'] = true;
		$config['total_rows'] = $data['jml'];
		$config['per_page'] = $this->data_per_page;
		$config['num_tag_open'] = '<li class="page-item page-link">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="javascript: void(0)" disabled>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li class="page-item page-link">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="page-item page-link">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li class="page-item page-link">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item page-link">';
		$config['last_tag_close'] = '</li>';
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$this->pagination->initialize($config);
		$data['pages'] = $this->pagination->create_links();

		$data["title"] = "Peminjaman";

		$this->__output('sirkulasi/main', $data);
	}

	private function __output($nview, $data = null)
	{
		if ($this->session->tipe == 'admin') {
			$data['admin'] = true;
		}
		$data['set'] = $this->crud->get('pengaturan', array('id_pengaturan' => '1'))->row();
		$this->load->view('header', $data);
		$this->load->view($nview, $data);
		$this->load->view('footer');
	}

	public function entri()
	{
		$data["title"] = "Tambah Data Peminjaman";
		$date = new DateTime();
		$data['now'] = $date->format('Y-m-d');
		$q1 = "select distinct noarsip,nama_dokumen from data_arsip order by noarsip asc";
		$data['data_arsip'] = $this->db->query($q1)->result_array();
		$q2 = "select username,nama from master_user order by username asc";
		$data['data_user'] = $this->db->query($q2)->result_array();

		$this->__output('sirkulasi/entri', $data);
	}

	public function gentr()
	{
		$date = new DateTime();
		$now = $date->format('Y-m-d H:i:s');
		$noarsip = $this->__sanitizeString($this->input->post('noarsip'));
		$q = sprintf("SELECT id FROM data_arsip WHERE noarsip=%d", $noarsip);
		$idarsip = $this->db->query($q)->row_array()['id'];
		if (!empty($idarsip)) {
			$username_peminjam = $this->__sanitizeString($this->input->post('username_peminjam'));
			$keperluan = $this->__sanitizeString($this->input->post('keperluan'));
			$tgl_pinjam = $this->__sanitizeString($this->input->post('tgl_pinjam'));
			$tgl_haruskembali = $this->__sanitizeString($this->input->post('tgl_haruskembali'));
			$tgl_transaksi = $now;

			$q = "INSERT INTO sirkulasi VALUES (NULL, '$noarsip','$username_peminjam','$keperluan','$tgl_pinjam','$tgl_haruskembali', NULL, NOW());";
			//echo $q; die();
			$hsl = $this->db->query($q);
			//var_dump($row);
			$this->session->set_flashdata('success', "Data berhasil disimpan");
			redirect('/sirkulasi', 'refresh');
		} else {
			$this->session->set_flashdata('error', "Data Arsip tidak Ada");
			redirect('/sirkulasi/entr');
		}
	}

	public function vedit($id)
	{
		if ($id != "") {
			$q = "select * from sirkulasi where id=$id";
			$hsl = $this->db->query($q);
			$row = $hsl->row_array();
			$previous = "";
			if (isset($_SERVER['HTTP_REFERER'])) {
				$previous = $_SERVER['HTTP_REFERER'];
				$row['previous'] = $previous;
			}
			$row["title"] = "Update Data Peminjaman";
			$q1 = "select distinct noarsip,nama_dokumen from data_arsip order by noarsip asc";
			$row['data_arsip'] = $this->db->query($q1)->result_array();
			$q2 = "select username,nama from master_user order by username asc";
			$row['data_user'] = $this->db->query($q2)->result_array();
			if (count($row) > 0) {
				$this->__output('sirkulasi/edit', $row);
			} else {
				redirect('/sirkulasi', 'refresh');
			}
		} else {
			redirect('/sirkulasi', 'refresh');
		}
	}

	public function update()
	{
		$id = $this->__sanitizeString($this->input->post('id'));
		$noarsip = $this->__sanitizeString($this->input->post('noarsip'));
		$username_peminjam = $this->__sanitizeString($this->input->post('username_peminjam'));
		$keperluan = $this->__sanitizeString($this->input->post('keperluan'));
		$tgl_pinjam = $this->__sanitizeString($this->input->post('tgl_pinjam'));
		$tgl_haruskembali = $this->__sanitizeString($this->input->post('tgl_haruskembali'));
		$previous = "";
		if (isset($_SERVER['HTTP_REFERER'])) {
			$previous = $_SERVER['HTTP_REFERER'];
			$row['previous'] = $previous;
		}
		if (isset($_POST)) {
			$q = "update sirkulasi set noarsip='$noarsip',username_peminjam='$username_peminjam',keperluan='$keperluan',tgl_pinjam='$tgl_pinjam',tgl_haruskembali='$tgl_haruskembali' where id=$id";
			$hsl = $this->db->query($q);
		}
		$this->session->set_flashdata('success', "Data berhasil disimpan");
		redirect('/sirkulasi', 'refresh');
		/* if($previous=="") {
			redirect('/sirkulasi', 'refresh');
		}else {
			header('Location: ' . $previous);
		} */
	}

	public function del()
	{
		$id = trim($this->input->post('id'));
		$q = "delete from sirkulasi where id=?";
		$hsl = $this->db->query($q, array($id));
	}

	public function kembalikan()
	{
		$id = trim($this->input->post('id'));
		$q = "update sirkulasi set tgl_pengembalian=now() where id=?";
		$hsl = $this->db->query($q, array($id));
	}

	public function xhr_arsip()
	{
		$keywords = $this->input->get();
		$data = array();
		$keywords = $this->__sanitizeString($keywords['q']);
		if (!$keywords) {
			header('Content-Type: application/json');
			exit('[]');
		}

		$this->db->select('noarsip,nama_dokumen,kode,nobox');
		$this->db->like('noarsip', $keywords, 'after');
		$this->db->or_like('kode', $keywords, 'after');
		$this->db->limit(10);
		$hsl = $this->db->get('data_arsip')->result();
		foreach ($hsl as $r) {
			$data[] = array(
				'id' => $r->noarsip, 'text' => $r->noarsip . ' - ' . $r->nama_dokumen
			);
		}
		header('Content-Type: application/json');
		echo json_encode(array("results" => $data));
		exit();
	}

	public function xhr_user($keywords = '')
	{
		$keywords = $this->input->get();
		$data = array();
		$keywords = $this->__sanitizeString($keywords['q']);
		if (!$keywords) {
			header('Content-Type: application/json');
			exit('[]');
		}

		$this->db->select('nama,username,id,tipe,akses_klas');
		$this->db->like('username', $keywords, 'after');
		$this->db->limit(10);
		$hsl = $this->db->get('master_user')->result();
		foreach ($hsl as $r) {
			$data[] = array(
				'id' => $r->username, 'text' => $r->username . ' - ' . $r->nama
			);
		}
		header('Content-Type: application/json');
		echo json_encode(array("results" => $data));
		exit();
	}
}
