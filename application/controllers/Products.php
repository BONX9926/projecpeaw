<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	public function index()
	{
        $data['pro_type'] = $this->pro_type();
        $data['btnColor'] = array('btn btn-primary', 'btn btn-secondary', 'btn btn-success', 'btn btn-danger', 'btn btn-warning', 'btn btn-info', 'btn btn-default');
		$this->load->view('backend/products/products_all_v', $data);
    }

    public function pro_type()
    {
        $this->db->select('*');
        $this->db->from('product_type');
        $query = $this->db->get();

        if ($query) {
            $res = $query->result();
        }else{
            $res = null;
        }
        return $res;
    }

    public function product_ba1($type)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('active', '1');
        $this->db->where('pro_type', $type);
        $query = $this->db->get();

        if ($query) {
            $res = $query->result();
        }else{
            $res = null;
        }

        return $res;
    }

    public function pageBakery($type)
    {   
        $data['rows'] = $this->product_ba1($type);
        $data['pro_type'] = $this->pro_type();
        $this->load->view('backend/products/bakery_v', $data);
    }

    public function up_st_best($pro_id, $val)
    {
        $data = array(
            'best_seller' => $val
        );

        $this->db->where('pro_id', $pro_id);
        $query = $this->db->update('products', $data);
        $return = array();

        if($query){
            $return['status'] = true;
            $return['message'] = "แก้ไขมูลเรียบร้อย";
        }else{
            $return['status'] = false;
        }

        echo json_encode($return);
    }
    public function pro($pro_type)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('pro_type', $pro_type);
        $query = $this->db->get();

        if ($query) {
            $data['rows'] = $query->result();
        }else{
            $data['rows'] = null;
        }

        $this->load->view('layouts/header');
		$this->load->view('layouts/navbar');
        $this->load->view('products/bakery_v', $data);
        $this->load->view('layouts/footer');
    }
    public function best_seller()
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('best_seller', '1');
        $query = $this->db->get();

        if ($query) {
            $data['rows'] = $query->result();
        }else{
            $data['rows'] = null;
        }
        $this->load->view('backend/bestseller/bestseller_v', $data);
    }

}
