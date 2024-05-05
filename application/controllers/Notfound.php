<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound extends CI_Controller {

	/**
	 * Controller class constructor
	 *
	 */
	public function __construct()
	{
		parent::__construct();
		//if(!$this->session->username && $this->uri->segment(2)!='login' && $this->uri->segment(2)!='gologin') {
			//redirect('/home/login', 'refresh');
		//}
	}

	/**
	 * Default route for Home controller
	 * internal instance redirect to 'search' method
	 *
	 */
	public function index()
	{
		//$this->detail();
        $data['title'] = '404 Not Found';
        $this->load->view('404',$data);
	}




}






