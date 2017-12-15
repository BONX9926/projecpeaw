<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct() {
        parent::__construct();

		// $session = $this->session->userdata('sessed_in');
		// var_dump($session);die();
    }
	public function from_register()
	{
        $this->load->view('layouts/header');
		$this->load->view('layouts/navbar');
		$this->load->view('user/register_v');
		$this->load->view('layouts/footer');
    }
    public function from_login(){
		if ($session = $this->session->userdata('sessed_in') == null) {
			$this->load->view('layouts/header');
			$this->load->view('layouts/navbar');
			$this->load->view('user/login_v');
			$this->load->view('layouts/footer');
		}else{
			// $session = $this->session->userdata('sessed_in');
			// var_dump($session);
			redirect('/');
		}
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
		if($input){
			$res = $this->check_login($input['email'], $input['password']);
			if($res['status']){
	
				$this->session->set_userdata('sessed_in', $res['session']);
				$this->session->set_userdata('bag', $res['bag']);
	
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
		}else{
			redirect('/');
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
				$res['bag'] = array();

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
		$this->session->unset_userdata('sessed_in');
		$this->session->unset_userdata('bag');
		redirect('/');
	}

	public function user_all()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('u_type', 'u');
		$this->db->order_by('created_at','desc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$res = $query->result();
		}else{
			$res = null;
		}

		return $res;

	}

	public function get_user()
	{
		$data['rows'] = $this->user_all();
		$this->load->view('backend/users/users_v', $data);
	}

	public function cancel_bin(){
		$this->session->unset_userdata('bag');
		$this->session->set_userdata('bag');
		redirect('/');
	}

	public function data_buy(){
		if($this->session->userdata('sessed_in') != ''){

			$this->load->view('layouts/header');
			$this->load->view('layouts/navbar');
			$this->load->view('user/data_buy_v');
		}else{
			redirect('/');
		}
	}

	public function pagePayment()
	{
		$session = $this->session->userdata('sessed_in');
		$this->db->select('*');
		$this->db->from('bin');
		$this->db->where('pay_status', '0');
		$this->db->where('ref_u_id', $session[0]['u_id']);
		$query = $this->db->get();
		if ($query) {
			$data['rows'] = $query->result();
		}else{
			$data['rows'] = [];
		}
		$this->load->view('user/payment', $data);
	}

	public function pageHistoryBuy()
	{
		$session = $this->session->userdata('sessed_in');

		$this->db->select('*');
		$this->db->from('bin');
		$this->db->where('pay_status', 1*1);
		$this->db->where('ref_status_bin', 2*1);
		$this->db->where('ref_u_id', $session[0]['u_id']);
		$this->db->order_by('created_at', 'DESC');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			// echo '<pre>';
			$bin =$query->result_array();
			foreach ($bin as $key => $value) {
				// print_r($value['bin_id']);
					$this->db->select('*');
					$this->db->from('order');
					$this->db->join('products', 'order.ref_pro_id = products.pro_id');
					$this->db->where('order.ref_bin', $value['bin_id']*1);
					$query2 = $this->db->get();

					if ($query2->num_rows() > 0) {
						$items = $query2->result_array();
						// print_r($items);
						foreach ($items as $k => $v) {
							$list[] = $v['pro_name']." จำนวน ".$v['num']." ชิ้น ราคา ".$v['price']." บาท<br>";
							$total[] = $v['price']*$v['num'];
						}
						// var_dump($list);
						$data[] = array(
							'bin_id' => $value['bin_id'],
							'list' 	 => $list,
							'created_at' => $value['created_at'],
							'total' => array_sum($total)
						);

						
					}else{
						$data['rows'] = [];
					}
				}
			$data['rows'] = $data;
		}else{
			$data['rows'] = [];
		}

		$this->load->view('user/history_buy', $data);
	}

	public function payment()
	{
		$session = $this->session->userdata('sessed_in');

		$input = $this->input->post();
        $return = array();
        $path_img = "assets/img/payments/";
        $namefile = date('yymmdd').$_FILES["img"]["name"];
        $date = date('y-m-d H:i:s');
		if($_FILES['img']['size'] > 0 ) {
            if(move_uploaded_file($_FILES["img"]["tmp_name"],$path_img.$namefile)) {
                $status_bin = array(
                    'pay_status' => '1'
				);
				
                $this->db->where('bin_id', $input['bin_id']);
                $update = $this->db->update('bin', $status_bin);
                if ($update) {
					$payment = array(
						'ref_u_id' 	 => $session[0]['u_id'],
						'file' 		 => $namefile,
						'ref_bin_id' => $input['bin_id'],
						'created_at' => $date
					);

					$insert = $this->db->insert('payment', $payment);
					if ($insert) {
						$return['status'] = true;
						$return['message'] = "แจ้งชำระเรียบร้อยแล้ว";
					}else{
						$return['status'] = false;
						$return['message'] = "ไม่สามารถแจ้งชำระได้!!";
						unlink($path_img.$namefile);
					}
                } else {
                    $return['status'] = false;
                    $return['message'] = "ไม่สามารถแก้ไขข้อมูลได้ กรุณาลองใหม่!!";
                    unlink($path_img.$namefile);
                }
            } else {
                $return['status'] = false;
                $return['message'] = "Upload Fail!!";
            }
		} else {
			$return['status'] = false;
			$return['message'] = "กรุณาอัพโหลดไฟล์ Payment";
        }
        echo json_encode($return);
	}


}
