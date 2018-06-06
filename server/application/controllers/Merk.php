<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require APPPATH .'/libraries/REST_Controller.php';
	use Restserver\Libraries\REST_Controller;

	class Merk extends REST_Controller{

		function __construct($config = 'rest'){
			parent::__construct($config);
			$this->load->database();
		}

		function index_get(){
			$id = $this->get('id_merk');
			if($id ==''){
				$merk = $this->db->get('merk')->result();
			}else{
				$this->db->where('id_merk',$id);
				$merk = $this->db->get('merk')->result();
			}
			$this->response($merk,200);
		}

		function index_post(){
			$data = array(
				// 'id_merk' => $this->post('id_merk'),
				'nama_merk' => $this->post('nama_merk'));
			$insert = $this->db->insert('merk',$data);
			if($insert){
				$this->response($data,200);
			}else{
				$this->response(array('status'=>'fail',502));
			}
		}

		function index_put(){
			$id = $this->put('id_merk');
			$data = array(
				'id_merk' => $this->put('id_merk'),
				'nama_merk' => $this->put('nama_merk'));
			$this->db->where('id_merk',$id);
			$update = $this->db->update('merk',$data);
			if($update){
				$this->response($data,200);
			}else{
				$this->response(array('status'=>'fail',502));
			}
		}

		function index_delete(){
			$id = $this->delete('id_merk');
			$this->db->where('id_merk',$id);
			$delete = $this->db->delete('merk');
			if($delete){
				$this->response(array('status'=>'success'),201);
			}else{
				$this->response(array('status'=>'fail',502));
			}
		}
	}
?>