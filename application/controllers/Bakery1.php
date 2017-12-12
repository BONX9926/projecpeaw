<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bakery1 extends CI_Controller {

    public function page_add()
    {
        $this->load->view('backend/products/bakery1/ba1Add_v');
    }

    public function page_edit($pro_id)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('pro_id', $pro_id);
        $this->db->where('active', '1');
        $this->db->where('pro_type', '1');
        $query = $this->db->get();

        if ($query) {
            $data['rows'] = $query->result();
        }else{
            $data['rows'] = null;
        }

        $this->load->view('backend/products/bakery1/ba1Edit_v', $data);
    }

    public function add()
    {
        $input = $this->input->post();
        $return = array();
        $path_img = "assets/img/products/";
        $namefile = date('yymmdd').$_FILES["pro_pic"]["name"];
        $date = date('y-m-d H:i:s');
		if($_FILES['pro_pic']['size'] > 0 ) {
            if(move_uploaded_file($_FILES["pro_pic"]["tmp_name"],$path_img.$namefile)) {
                $products = array(
                    'pro_name'   => $input['pro_name'],
                    'pro_price'  => $input['pro_price'],
                    'pro_detail' => $input['pro_detail'],
                    'pro_detail' => $input['pro_detail'],
                    'pro_pic'    => $namefile,
                    'pro_type'   => '1',
                    'created_at' => $date,
                    'updated_at' => $date
                );
                $insert = $this->db->insert('products', $products);
                if ($insert) {
                    $return['status'] = true;
                    $return['message'] = "เพิ่มข้อมูลเรียบร้อยแล้ว";
                } else {
                    $return['status'] = false;
                    $return['message'] = "ไม่สามารถเพิ่มข้อมูลได้ กรุณาลองใหม่!!";
                    unlink($path_img.$namefile);
                }
            } else {
                $return['status'] = false;
                $return['message'] = "Upload Fail!!";
            }
		} else {
            $products = array(
                'pro_name'   => $input['pro_name'],
                'pro_price'  => $input['pro_price'],
                'pro_detail' => $input['pro_detail'],
                'pro_detail' => $input['pro_detail'],
                'pro_type'   => '1',
                'created_at' => $date,
                'updated_at' => $date
            );

            $insert = $this->db->insert('products', $products);

            if ($insert) {
                $return['status'] = true;
                $return['message'] = "เพิ่มข้อมูลเรียบร้อยแล้ว";
            } else {
                $return['status'] = false;
                $return['message'] = "ไม่สามารถเพิ่มข้อมูลได้ กรุณาลองใหม่!!";
            }
        }
        echo json_encode($return);
    }

    public function update()
    {
        $input = $this->input->post();
        $return = array();
        $path_img = "assets/img/products/";
        $namefile = date('yymmdd').$_FILES["pro_pic"]["name"];
        $date = date('y-m-d H:i:s');
		if($_FILES['pro_pic']['size'] > 0 ) {
            if(move_uploaded_file($_FILES["pro_pic"]["tmp_name"],$path_img.$namefile)) {
                $products = array(
                    'pro_name'   => $input['pro_name'],
                    'pro_price'  => $input['pro_price'],
                    'pro_detail' => $input['pro_detail'],
                    'pro_detail' => $input['pro_detail'],
                    'pro_pic'    => $namefile,
                    'updated_at' => $date
                );
                $this->db->where('pro_id', $input['pro_id']);
                $update = $this->db->update('products', $products);
                if ($update) {
                    $return['status'] = true;
                    $return['message'] = "แก้ไขข้อมูลเรียบร้อยแล้ว";
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
            $products = array(
                'pro_name'   => $input['pro_name'],
                'pro_price'  => $input['pro_price'],
                'pro_detail' => $input['pro_detail'],
                'pro_detail' => $input['pro_detail'],
                'updated_at' => $date
            );
            $this->db->where('pro_id',  $input['pro_id']);
            $update = $this->db->update('products', $products);

            if ($update) {
                $return['status'] = true;
                $return['message'] = "แก้ไขข้อมูลเรียบร้อยแล้ว";
            } else {
                $return['status'] = false;
                $return['message'] = "ไม่สามารถแก้ไขข้อมูลได้ กรุณาลองใหม่!!";
            }
        }
        echo json_encode($return);
    }

    public function del($pro_id)
    {
        $data = array(
            'active' => '0',
            'deldated_at' => date('y-m-d H:i:s')
        );

        $this->db->where('pro_id', $pro_id);
        $update = $this->db->update('products', $data);
        $return = array();

        if ($update) {
            $return['status'] = true;
            $return['message'] = "ลบข้อมูลเรียบร้อย";
            $return['id'] = $pro_id;
        }else{
            $return['status'] = false;
            $return['message'] = "ไม่สามารถลบข้อมูลได้!!";
        }

        echo json_encode($return);
    }


}
