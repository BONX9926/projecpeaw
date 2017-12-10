<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {
	public function index()
	{
		$this->load->view('layouts_backend/header');
		$this->load->view('layouts_backend/backend_index_v');
	}
}
