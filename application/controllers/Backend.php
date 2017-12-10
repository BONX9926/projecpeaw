<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {
	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('layouts/navbar');
		$this->load->view('backend/index');
		$this->load->view('layouts/footer');
	}
}
