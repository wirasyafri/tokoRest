<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require APPPATH .'/libraries/REST_Controller.php';
	use Restserver\Libraries\REST_Controller;

	class Tipe extends REST_Controller{

		function __construct($config = 'rest'){
			parent::__construct($config);
			$this->load->database();
		}

		function index_get(){
			$id = $this->get('id_tipe');
			if($id ==''){
				$tipe = $this->db->get('tipe')->result_array();
			}else{
				$this->db->where('id_tipe',$id);
				$tipe = $this->db->get('tipe')->result_array();
			}
			$this->response($tipe,200);
		}

		function index_post(){
			$data = array(
				// 'id_tipe' => $this->post('id_tipe'),
				'tipe' => $this->post('tipe'));
			$insert = $this->db->insert('tipe',$data);
			if($insert){
				$this->response($data,200);
			}else{
				$this->response(array('status'=>'fail',502));
			}
		}

		function index_put(){
			$id = $this->put('id_tipe');
			$data = array(
				'id_tipe' => $this->put('id_tipe'),
				'tipe' => $this->put('tipe'));
			$this->db->where('id_tipe',$id);
			$update = $this->db->update('tipe',$data);
			if($update){
				$this->response($data,200);
			}else{
				$this->response(array('status'=>'fail',502));
			}
		}

		function index_delete(){
			$id = $this->delete('id_tipe');
			$this->db->where('id_tipe',$id);
			$delete = $this->db->delete('tipe');
			if($delete){
				$this->response(array('status'=>'success'),201);
			}else{
				$this->response(array('status'=>'fail',502));
			}
		}
	}
?>