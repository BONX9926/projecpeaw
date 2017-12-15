<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	public function index()
	{
		$data['status_bin'] = $this->status_bin();
		$data['rows'] = $this->order_buy();
		$this->load->view('backend/order/order_v', $data);
	}

	public function order_buy(){
		$this->db->select('
			bin.bin_id, 
			bin.ref_u_id, 
			bin.created_at, 
			bin.pay_status, 
			bin.active, 
			ref_status_bin, 
			users.u_id, 
			users.u_name, 
			users.u_phone
		');
		$this->db->from('bin');
		$this->db->join('users', 'users.u_id = bin.ref_u_id');
		$this->db->order_by('bin.created_at', 'DESC');
		// $this->db->join('status_bin', 'status_bin.id = bin.ref_status_bin');
		$this->db->where('active', '1');
		$query = $this->db->get();

		if($query){
			$res = $query->result();
		}else{
			$res = [];
		}

		return $res;
	}

	public function status_bin(){
		$this->db->select('*');
		$this->db->from('status_bin');
		$query = $this->db->get();
		
		if($query){
			$res = $query->result();
		}else{
			$res = [];
		}
		return $res;
	}

	public function update_status_bin($bin_id, $status){
		$data = array(
			'ref_status_bin' => $status
		);
		$this->db->where('bin_id', $bin_id);
		$update = $this->db->update('bin', $data);
		$res = array();
		if ($update) {
			$res['status'] = true; 
			$res['message'] = 'เปลี่ยนสถานะบิลเรียบร้อยแล้ว'; 
		}else{
			$res['status'] = false; 
			$res['message'] = 'ไม่สามารถเปลี่ยนได้ กรุณาลองอีกครั้ง'; 
		}

		echo json_encode($res);
	}

	public function del_bin($bin_id){
		$data = array(
			'active' => '0'
		);
		$this->db->where('bin_id', $bin_id);
		$update = $this->db->update('bin', $data);
		$res = array();
		if ($update) {
			$res['status'] = true; 
			$res['message'] = 'ลบบิลเรียบร้อยแล้ว'; 
			$res['id'] = $bin_id; 
		}else{
			$res['status'] = false; 
			$res['message'] = 'ไม่สามารถลบบิล กรุณาลองอีกครั้ง'; 
		}

		echo json_encode($res);
	}
	
}
