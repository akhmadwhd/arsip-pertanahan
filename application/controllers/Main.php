<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
	/**
	 * Controller class constructor
	 *
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
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
		$this->load->view('footer', $data);
	}

	/**
	 * Default route for Home controller
	 * internal instance redirect to 'search' method
	 *
	 */
	public function index()
	{
		//$this->search();
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
		if ($this->session->tipe == "admin" || $this->session->tipe == "operator") {
			$data['countArsip'] = $this->db->query("SELECT COUNT(id) as jumlah FROM data_arsip")->first_row();
			$data['countSirkulasi'] = $this->db->query("SELECT COUNT(id) as jumlah FROM sirkulasi")->first_row();
			$data['countUser'] = $this->db->query("SELECT COUNT(id) as jumlah FROM master_user")->first_row();
		} else {
			$data['countArsip'] = $this->db->query("SELECT COUNT(id) as jumlah FROM data_arsip where username='" . $_SESSION['username'] . "'")->first_row();
			$data['countSirkulasi'] = $this->db->query("SELECT COUNT(id) as jumlah FROM sirkulasi where username_peminjam='" . $_SESSION['username'] . "'")->first_row();
		}
		$data["title"] = "Dashboard";

		//Mulai Chart.js

		if ($this->session->tipe == "admin" || $this->session->tipe == "operator") {
			$query_chart1 =  $this->db->query("SELECT COUNT(id) as count,MONTHNAME(tgl_input) as month_name FROM data_arsip WHERE YEAR(tgl_input) = '" . date('Y') . "' GROUP BY YEAR(tgl_input),MONTH(tgl_input)");
		} else {
			$query_chart1 =  $this->db->query("SELECT COUNT(id) as count,MONTHNAME(tgl_input) as month_name FROM data_arsip WHERE YEAR(tgl_input) = '" . date('Y') . "' and username='" . $_SESSION['username'] . "' GROUP BY YEAR(tgl_input),MONTH(tgl_input)");
		}

		$result1 = $query_chart1->result();
		$chart1 = [];

		foreach ($result1 as $row) {
			$chart1['label'][] = $row->month_name;
			$chart1['data'][] = (int) $row->count;
		}
		$data['chart1_data'] = json_encode($chart1);

		if ($this->session->tipe == "admin" || $this->session->tipe == "operator") {
			$query_chart2 =  $this->db->query("SELECT COUNT(d.lokasi) as count,l.nama_lokasi as lokasi FROM master_lokasi l left outer join data_arsip d on d.lokasi=l.id group by l.nama_lokasi");
		} else {
			$query_chart2 =  $this->db->query("SELECT COUNT(d.lokasi) as count,l.nama_lokasi as lokasi FROM master_lokasi l left outer join data_arsip d on d.lokasi=l.id where d.username='" . $_SESSION['username'] . "' group by l.nama_lokasi");
		}

		$result2 = $query_chart2->result();
		$chart2 = [];

		foreach ($result2 as $row) {
			$chart2['label'][] = $row->lokasi;
			$chart2['data'][] = (int) $row->count;
		}
		$data['chart2_data'] = json_encode($chart2);
		
		$query_chart3 =  $this->db->query("SELECT COUNT(id) as count,MONTHNAME(tgl_input) as month_name FROM data_arsip WHERE YEAR(tgl_input) = '" . date('Y') . "' GROUP BY YEAR(tgl_input),MONTH(tgl_input)");

		$result3 = $query_chart3->result();
		$chart3 = [];

		foreach ($result3 as $row) {
			$chart3['label'][] = $row->month_name;
			$chart3['data'][] = (int) $row->count;
		}
		$data['chart3_data'] = json_encode($chart3);
		//akhir Chart.js

		$this->__output('main', $data);
	}
}
