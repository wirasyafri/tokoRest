<?php
	Class Tipe extends CI_Controller{
		var $API="";

		function __construct(){
			parent::__construct();
			$this->API="http://localhost/tokotb/server/index.php";
			$this->load->library('session');
			$this->load->library('curl');
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->model("Data");
		}

		
		function index(){
			$data['datatipe']=json_decode($this->curl->simple_get($this->API.'/tipe'));
			$dataa['tipe_array']=$this->Data->gettipe();
			$this->load->view('b/indextipe',$dataa);
		}

		
		function create(){
			if(isset($_POST['submit'])){
				$data = array(
				// 'id_tipe' => $this->input->post('id_tipe'),
				'tipe' => $this->input->post('tipe'));
				$insert = $this->curl->simple_post($this->API.'/tipe',$data,array(CURLOPT_BUFFERSIZE =>10));
				if($insert){
					$this->session->set_flashdata('hasil','Insert Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Insert Data Gagal');
				}
				redirect('tipe');
			}else{
				$this->load->view('b/tambahtipe');
			}
		}

		
		function edit(){
			if(isset($_POST['submit'])){
				$data = array(
				'id_tipe' => $this->input->post('id_tipe'),
				'tipe' => $this->input->post('tipe'));
				$update = $this->curl->simple_put($this->API.'/tipe',$data,array(CURLOPT_BUFFERSIZE =>10));
				if($update){
					$this->session->set_flashdata('hasil','Update Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','UpdateData Gagal');
				}
				redirect('tipe','refresh');
			}else{
				$params = array('id_tipe'=> $this->uri->segment(3));
				$data['datatipe'] = json_decode($this->curl->simple_get($this->API.'/tipe',$params));
				$this->load->view('b/edittipe',$data);
			}
		}

		
		function delete($id){
			if(empty($id)){
				rediret('tipe');
			}else{
				$delete = $this->curl->simple_delete($this->API.'/tipe',array('id_tipe'=>$id), array(CURLOPT_BUFFERSIZE => 10));
				if($delete){
					$this->session->set_flashdata('hasil','Delete Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Delete Data Gagal');
				}
				redirect('tipe');
			}
		}
	}
?>