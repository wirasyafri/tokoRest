<?php
	Class Jenis_kelamin extends CI_Controller{
		var $API="";

		function __construct(){
			parent::__construct();
			$this->API="http://localhost/tokotb/server/index.php";
			$this->load->library('session');
			$this->load->library('curl');
			$this->load->helper('form');
			$this->load->helper('url');
		}

		
		function index(){
			$data['datajeniskelamin']=json_decode($this->curl->simple_get($this->API.'/jenis_kelamin'));
			$this->load->view('jenis_kelamin/list',$data);
		}

		
		function create(){
			if(isset($_POST['submit'])){
				$data = array(
				'id_jeniskelamin' => $this->input->post('id_jeniskelamin'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'));
				$insert = $this->curl->simple_post($this->API.'/jenis_kelamin',$data,array(CURLOPT_BUFFERSIZE =>10));
				if($insert){
					$this->session->set_flashdata('hasil','Insert Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Insert Data Gagal');
				}
				redirect('jenis_kelamin');
			}else{
				$this->load->view('jenis_kelamin/create');
			}
		}

		
		function edit(){
			if(isset($_POST['submit'])){
				$data = array(
				'id_jeniskelamin' => $this->input->post('id_jeniskelamin'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'));
				$update = $this->curl->simple_put($this->API.'/jenis_kelamin',$data,array(CURLOPT_BUFFERSIZE =>10));
				if($update){
					$this->session->set_flashdata('hasil','Update Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','UpdateData Gagal');
				}
				redirect('jenis_kelamin','refresh');
			}else{
				$params = array('id_jeniskelamin'=> $this->uri->segment(3));
				$data['datajeniskelamin'] = json_decode($this->curl->simple_get($this->API.'/jenis_kelamin',$params));
				$this->load->view('jenis_kelamin/edit',$data);
			}
		}

		
		function delete($id){
			if(empty($id)){
				rediret('jenis_kelamin');
			}else{
				$delete = $this->curl->simple_delete($this->API.'/jenis_kelamin',array('id_jeniskelamin'=>$id), array(CURLOPT_BUFFERSIZE => 10));
				if($delete){
					$this->session->set_flashdata('hasil','Delete Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Delete Data Gagal');
				}
				redirect('jenis_kelamin');
			}
		}
	}
?>