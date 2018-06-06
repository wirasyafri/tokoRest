<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require APPPATH .'/libraries/REST_Controller.php';
	use Restserver\Libraries\REST_Controller;

	class Customer extends REST_Controller{

		function __construct($config = 'rest'){
			parent::__construct($config);
			$this->load->database();
		}

		function index_get(){
			$id = $this->get('id_customer');
			if($id ==''){
				$customer = $this->db->get('customer')->result();
			}else{
				$this->db->where('id_customer',$id);
				$customer = $this->db->get('customer')->result();
			}
			$this->response($customer,200);
		}

		function index_post(){
			$data = array(
				'id_customer' => $this->post('id_customer'),
				'nama_customer' => $this->post('nama_customer'),
				'no_telpn' => $this->post('no_telpn'),
				'alamat' => $this->post('alamat'));
			$insert = $this->db->insert('customer',$data);
			if($insert){
				$this->response($data,200);
			}else{
				$this->response(array('status'=>'fail',502));
			}
		}

		function index_put(){
			$id = $this->put('id_customer');
			$data = array(
				'id_customer' => $this->put('id_customer'),
				'customer' => $this->put('customer'));
			$this->db->where('id_customer',$id);
			$update = $this->db->update('customer',$data);
			if($update){
				$this->response($data,200);
			}else{
				$this->response(array('status'=>'fail',502));
			}
		}

		function index_delete(){
			$id = $this->delete('id_customer');
			$this->db->where('id_customer',$id);
			$delete = $this->db->delete('customer');
			if($delete){
				$this->response(array('status'=>'success'),201);
			}else{
				$this->response(array('status'=>'fail',502));
			}
		}
	}
?>