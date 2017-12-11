<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {
	public function index()
	{
		$this->load->view('backend/index');
		// $this->load->view('layouts/script_backend');
	}


}
