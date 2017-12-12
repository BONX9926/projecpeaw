<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	public function index()
	{
		$this->load->view('backend/products/products_all_v');
    }

    public function product_ba1()
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('active', '1');
        $this->db->where('pro_type', '1');
        $query = $this->db->get();

        if ($query) {
            $res = $query->result();
        }else{
            $res = null;
        }

        return $res;
    }

    public function pageBakery1()
    {   
        $data['rows'] = $this->product_ba1();
        $this->load->view('backend/products/bakery1/bakery1_v', $data);
    }
    public function pageBakery2()
    {
        $this->load->view('backend/products/bakery2/bakery2_v');
    }
    public function pageBakery3()
    {
        $this->load->view('backend/products/bakery3/bakery3_v');
    }
    public function pageBakery4()
    {
        $this->load->view('backend/products/bakery4/bakery4_v');
    }
    public function pageBakery5()
    {
        $this->load->view('backend/products/bakery5/bakery5_v');
    }
    public function pageBakery6()
    {
        $this->load->view('backend/products/bakery6/bakery6_v');
    }
    public function pageBakery7()
    {
        $this->load->view('backend/products/bakery7/bakery7_v');
    }

}
