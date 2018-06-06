<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require APPPATH .'/libraries/REST_Controller.php';
	use Restserver\Libraries\REST_Controller;

	class Jenis_kelamin extends REST_Controller{

		function __construct($config = 'rest'){
			parent::__construct($config);
			$this->load->database();
		}

		function index_get(){
			$id = $this->get('id_jeniskelamin');
			if($id ==''){
				$jenis_kelamin = $this->db->get('jenis_kelamin')->result();
			}else{
				$this->db->where('id_jeniskelamin',$id);
				$jenis_kelamin = $this->db->get('jenis_kelamin')->result();
			}
			$this->response($jenis_kelamin,200);
		}

		function index_post(){
			$data = array(
				'id_jeniskelamin' => $this->post('id_jeniskelamin'),
				'jenis_kelamin' => $this->post('jenis_kelamin'));
			$insert = $this->db->insert('jenis_kelamin',$data);
			if($insert){
				$this->response($data,200);
			}else{
				$this->response(array('status'=>'fail',502));
			}
		}

		function index_put(){
			$id = $this->put('id_jeniskelamin');
			$data = array(
				'id_jeniskelamin' => $this->put('id_jeniskelamin'),
				'jenis_kelamin' => $this->put('jenis_kelamin'));
			$this->db->where('id_jeniskelamin',$id);
			$update = $this->db->update('jenis_kelamin',$data);
			if($update){
				$this->response($data,200);
			}else{
				$this->response(array('status'=>'fail',502));
			}
		}

		function index_delete(){
			$id = $this->delete('id_jeniskelamin');
			$this->db->where('id_jeniskelamin',$id);
			$delete = $this->db->delete('jenis_kelamin');
			if($delete){
				$this->response(array('status'=>'success'),201);
			}else{
				$this->response(array('status'=>'fail',502));
			}
		}
	}
?>