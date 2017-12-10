<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function from_register()
	{
        $this->load->view('layouts/header');
		$this->load->view('layouts/navbar');
		$this->load->view('user/register_v');
		$this->load->view('layouts/footer');
    }
    public function from_login(){
        $this->load->view('layouts/header');
		$this->load->view('layouts/navbar');
		$this->load->view('user/login_v');
		$this->load->view('layouts/footer');
	}
	
	public function register()
	{
		$input = $this->input->post();
		$name = $input['name'];
		$phone = $input['phone'];
		$email = $input['email'];
		$pass = sha1(md5(sha1($input['password'])));
		$datetime = date('y-m-d H:i:s');
		$data = array(
			'u_name' 	 => $name,
			'u_phone' 	 => $phone,
			'u_email' 	 => $email,
			'u_pass' 	 => $pass,
			'created_at' => $datetime,
			'updated_at' => $datetime,
		);

		$booleen = $this->add_member($data);

		if ($booleen) {
			$this->load->view('layouts/header');
			$this->load->view('layouts/navbar');
			$this->load->view('user/add_success');
			$this->load->view('layouts/footer');
		}else{
			$this->load->view('layouts/header');
			$this->load->view('layouts/navbar');
			$this->load->view('user/add_fail');
			$this->load->view('layouts/footer');
		}
		

	}

	public function login()
	{
		$input = $this->input->post();
		$res = $this->check_login($input['email'], $input['password']);
		if($res['status']){
			$this->session->set_userdata('sessed_in',$res['session']);
			$this->load->view('layouts/header');
			$this->load->view('layouts/navbar');
			$this->load->view('index');
			$this->load->view('layouts/footer');
		}else{
			$this->load->view('layouts/header');
			$this->load->view('layouts/navbar');
			$this->load->view('login_fail_v');
			$this->load->view('layouts/footer');
		}
		
	}

	public function add_member($data)
	{
		$insert = $this->db->insert('users', $data);
		if($insert){
			$res = true;
		}else{
			$res = false;
		}

		return $res;
	}

	public function check_login($email, $pass)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('u_email', $email);
		$this->db->where('u_pass', sha1(md5(sha1($pass))));
		$this->db->limit('1');
		$query = $this->db->get();

		if ($query) {
			if ($query->num_rows() == 1) {
				$res['status']  = true;
				$res['message'] = 'เข้าสู่ระบบสำเร็จ';
				$res['session'] = $query->result_array();

			}else{
				$res['status']  = false;
				$res['message'] = 'กรุณาตรวจสอบ username และ password';
			}
		}else{
			$res['status']  = false;
			$res['message'] = 'ไม่สามารถเข้าสู่ระบบได้';
		}

		return $res;
	}

	public function logout()
	{
		//dev by miniball
		$this->session->unset_userdata('sessed_in');
		redirect('/');
	}
}
