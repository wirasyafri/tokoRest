<?php
	Class Ukuran extends CI_Controller{
		var $API="";

		function __construct(){
			parent::__construct();
			$this->API="http://localhost/tokotb/server/index.php";
			$this->load->library('session');
			$this->load->library('curl');
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->model('Data');
		}

		
		function index(){
			$data['dataukuran']=json_decode($this->curl->simple_get($this->API.'/ukuran'));
			$dataa['ukuran_array']=$this->Data->getukuran();
			$this->load->view('b/indexukuran',$dataa);
		}

		
		function create(){
			if(isset($_POST['submit'])){
				$data = array(
				// 'id_ukuran' => $this->input->post('id_ukuran'),
				'ukuran' => $this->input->post('ukuran'));
				$insert = $this->curl->simple_post($this->API.'/ukuran',$data,array(CURLOPT_BUFFERSIZE =>10));
				if($insert){
					$this->session->set_flashdata('hasil','Insert Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Insert Data Gagal');
				}
				redirect('ukuran');
			}else{
				$this->load->view('b/tambahukuran');
			}
		}

		
		function edit(){
			if(isset($_POST['submit'])){
				$data = array(
				'id_ukuran' => $this->input->post('id_ukuran'),
				'ukuran' => $this->input->post('ukuran'));
				$update = $this->curl->simple_put($this->API.'/ukuran',$data,array(CURLOPT_BUFFERSIZE =>10));
				if($update){
					$this->session->set_flashdata('hasil','Update Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','UpdateData Gagal');
				}
				// var_dump($data);
				redirect('ukuran','refresh');
			}else{
				$params = array('id_ukuran'=> $this->uri->segment(3));
				$data['dataukuran'] = json_decode($this->curl->simple_get($this->API.'/ukuran',$params));
				$this->load->view('b/editukuran',$data);
			}
		}

		
		function delete($id){
			if(empty($id)){
				rediret('ukuran');
			}else{
				$delete = $this->curl->simple_delete($this->API.'/ukuran',array('id_ukuran'=>$id), array(CURLOPT_BUFFERSIZE => 10));
				if($delete){
					$this->session->set_flashdata('hasil','Delete Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Delete Data Gagal');
				}
				redirect('ukuran');
			}
		}
	}
?>