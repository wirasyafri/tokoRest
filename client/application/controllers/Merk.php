<?php
	Class Merk extends CI_Controller{
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

		//Menampilkan data buku
		function index(){
			$data['datamerk']=json_decode($this->curl->simple_get($this->API.'/merk'));
			$dataa['merk_array']=$this->Data->getmerk();
			$this->load->view('b/indexmerk',$dataa);
		}

		//insert data buku
		function create(){
			if(isset($_POST['submit'])){
				$data = array(
				// 'id_merk' => $this->input->post('id_merk'),
				'nama_merk' => $this->input->post('nama_merk'));
				$insert = $this->curl->simple_post($this->API.'/merk',$data,array(CURLOPT_BUFFERSIZE =>10));
				if($insert){
					$this->session->set_flashdata('hasil','Insert Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Insert Data Gagal');
				}
				redirect('merk');
			}else{
				$this->load->view('b/tambahmerk');
			}
		}

		//edit data buku
		function edit(){
			if(isset($_POST['submit'])){
				$data = array(
				'id_merk' => $this->input->post('id_merk'),
				'nama_merk' => $this->input->post('nama_merk'));
				$update = $this->curl->simple_put($this->API.'/merk',$data,array(CURLOPT_BUFFERSIZE =>10));
				if($update){
					$this->session->set_flashdata('hasil','Update Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','UpdateData Gagal');
				}
				redirect('merk','refresh');
			}else{
				$params = array('id_merk'=> $this->uri->segment(3));
				$data['datamerk'] = json_decode($this->curl->simple_get($this->API.'/merk',$params));
				$this->load->view('b/editmerk',$data);
			}
		}

		//delete data buku
		function delete($id){
			if(empty($id)){
				rediret('merk');
			}else{
				$delete = $this->curl->simple_delete($this->API.'/merk',array('id_merk'=>$id), array(CURLOPT_BUFFERSIZE => 10));
				if($delete){
					$this->session->set_flashdata('hasil','Delete Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Delete Data Gagal');
				}
				redirect('merk');
			}
		}
	}
?>