<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function register()
	{
        $this->load->view('layouts/header');
		$this->load->view('layouts/navbar');
		$this->load->view('user/register_v');
		$this->load->view('layouts/footer');
    }
    public function login(){
        $this->load->view('layouts/header');
		$this->load->view('layouts/navbar');
		$this->load->view('user/login_v');
		$this->load->view('layouts/footer');
    }
}
