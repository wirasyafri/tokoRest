<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require APPPATH .'/libraries/REST_Controller.php';
	use Restserver\Libraries\REST_Controller;

	class Ukuran extends REST_Controller{

		function __construct($config = 'rest'){
			parent::__construct($config);
			$this->load->database();
		}

		function index_get(){
			$id = $this->get('id_ukuran');
			if($id ==''){
				$ukuran = $this->db->get('ukuran')->result();
			}else{
				$this->db->where('id_ukuran',$id);
				$ukuran = $this->db->get('ukuran')->result();
			}
			$this->response($ukuran,200);
		}

		function index_post(){
			$data = array(
				// 'id_ukuran' => $this->post('id_ukuran'),
				'ukuran' => $this->post('ukuran'));
			$insert = $this->db->insert('ukuran',$data);
			if($insert){
				$this->response($data,200);
			}else{
				$this->response(array('status'=>'fail',502));
			}
		}

		function index_put(){
			$id = $this->put('id_ukuran');
			$data = array(
				'id_ukuran' => $this->put('id_ukuran'),
				'ukuran' => $this->put('ukuran'));
			$this->db->where('id_ukuran',$id);
			$update = $this->db->update('ukuran',$data);
			if($update){
				$this->response($data,200);
			}else{
				$this->response(array('status'=>'fail',502));
			}
		}

		function index_delete(){
			$id = $this->delete('id_ukuran');
			$this->db->where('id_ukuran',$id);
			$delete = $this->db->delete('ukuran');
			if($delete){
				$this->response(array('status'=>'success'),201);
			}else{
				$this->response(array('status'=>'fail',502));
			}
		}
	}
?>