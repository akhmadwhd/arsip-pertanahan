<?php 

class Admin_model extends CI_Model {

    public function count_dataarsip()
	{
		return $this->db->count_all('data_arsip');
    }

    public function count_sirkulasi()
	{
		return $this->db->count_all('sirkulasi');
    }

    public function count_user()
	{
		return $this->db->count_all('master_user');
    }
    
}