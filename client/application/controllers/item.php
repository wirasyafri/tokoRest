<?php
	Class item extends CI_Controller{
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
			$session_data =$this->session->userdata('logged_in');
				$nama['username']=$session_data['username'];
			$data['dataukuran']=json_decode($this->curl->simple_get($this->API.'/Item'));
			$dataa['item_array']=$this->Data->getitem();
			$this->load->view('b/indexitem',$dataa);
		}

		
		function create(){
			if(isset($_POST['submit'])){
				$data = array(
				// 'id_item' => $this->input->post('id_item'),
				'nama' => $this->input->post('nama'),
				'id_ukuran' => $this->input->post('id_ukuran'),
				'id_jeniskelamin' => $this->input->post('id_jeniskelamin'),
				'id_tipe' => $this->input->post('id_tipe'),
				'id_merk' => $this->input->post('id_merk'),
				'harga' => $this->input->post('harga')
				);
				$insert = $this->curl->simple_post($this->API.'/Item',$data,array(CURLOPT_BUFFERSIZE =>10));
				if($insert){
					$this->session->set_flashdata('hasil','Insert Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Insert Data Gagal');
				}
				redirect('item');
			}else{
				$data['list_tipe']=json_decode($this->curl->simple_get($this->API.'/tipe'));
				$data['list_merk']=json_decode($this->curl->simple_get($this->API.'/merk'));
				$data['list_ukuran']=json_decode($this->curl->simple_get($this->API.'/ukuran'));
				$data['list_kelamin']=json_decode($this->curl->simple_get($this->API.'/jenis_kelamin'));

				$this->load->view('b/tambahitem',$data);
			}
		}

		
		function edit(){
			if(isset($_POST['submit'])){
				$data = array(
				'id_item' => $this->input->post('id_item'),
				'nama' => $this->input->post('nama'),
				'id_ukuran' => $this->input->post('id_ukuran'),
				'id_jeniskelamin' => $this->input->post('id_jeniskelamin'),
				'id_tipe' => $this->input->post('id_tipe'),
				'id_merk' => $this->input->post('id_merk'),
				'harga' => $this->input->post('harga')
				);
				$update = $this->curl->simple_put($this->API.'/item',$data,array(CURLOPT_BUFFERSIZE =>10));
				if($update){
					$this->session->set_flashdata('hasil','Update Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','UpdateData Gagal');
				}
				redirect('admin','refresh');
			}else{
				$session_data =$this->session->userdata('logged_in');

				$nama['username']=$session_data['username'];
				$params = array('id_item'=> $this->uri->segment(3));
				$id = $this->uri->segment(3);
				$data['dataitem'] = json_decode($this->curl->simple_get($this->API.'/item',$params));
				$data['list_tipe']=json_decode($this->curl->simple_get($this->API.'/tipe'));
				$data['list_merk']=json_decode($this->curl->simple_get($this->API.'/merk'));
				$data['list_ukuran']=json_decode($this->curl->simple_get($this->API.'/ukuran'));
				$data['list_kelamin']=json_decode($this->curl->simple_get($this->API.'/jenis_kelamin'));
				$data['item_array']=$this->Data->getitemcus($id);
				// $data['item_array']="test";
				$this->load->view('b/edititem',$data);
			}
		}

		
		function delete($id){
			if(empty($id)){
				rediret('admin');
			}else{
				$delete = $this->curl->simple_delete($this->API.'/item',array('id_item'=>$id), array(CURLOPT_BUFFERSIZE => 10));
				if($delete){
					$this->session->set_flashdata('hasil','Delete Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Delete Data Gagal');
				}
				redirect('admin');
			}
		}
	}
?>