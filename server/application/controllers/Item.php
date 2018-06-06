<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require APPPATH .'/libraries/REST_Controller.php';
	use Restserver\Libraries\REST_Controller;

	class Item extends REST_Controller{

		function __construct($config = 'rest'){
			parent::__construct($config);
			$this->load->database();
		}

		function index_get(){
			$id = $this->get('id_item');
			if($id ==''){
				$merk = $this->db->get('item')->result();
			}else{
				$this->db->where('id_item',$id);
				$merk = $this->db->get('item')->result();
			}
			$this->response($merk,200);
		}

		function index_post(){
			$data = array(
				// 'id_item' => $this->input->post('id_item'),
				'nama' => $this->input->post('nama'),
				'id_ukuran' => $this->input->post('id_ukuran'),
				'id_jeniskelamin' => $this->input->post('id_jeniskelamin'),
				'id_tipe' => $this->input->post('id_tipe'),
				'id_merk' => $this->input->post('id_merk'),
				'harga' => $this->input->post('harga')
				);
			$insert = $this->db->insert('item',$data);
			if($insert){
				$this->response($data,200);
			}else{
				$this->response(array('status'=>'fail',502));
			}
		}

		function index_put(){
			$id = $this->put('id_item');
			$data = array(
				// 'id_item' => $this->input->post('id_item'),
				'nama' => $this->input->post('nama'),
				'id_ukuran' => $this->input->post('id_ukuran'),
				'id_jeniskelamin' => $this->input->post('id_jeniskelamin'),
				'id_tipe' => $this->input->post('id_tipe'),
				'id_merk' => $this->input->post('id_merk'),
				'harga' => $this->input->post('harga')
				);
			$this->db->where('id_item',$id);
			$update = $this->db->update('item',$data);
			if($update){
				$this->response($data,200);
			}else{
				$this->response(array('status'=>'fail',502));
			}
		}

		function index_delete(){
			$id = $this->delete('id_item');
			$this->db->where('id_item',$id);
			$delete = $this->db->delete('item');
			if($delete){
				$this->response(array('status'=>'success'),201);
			}else{
				$this->response(array('status'=>'fail',502));
			}
		}
	}
?>