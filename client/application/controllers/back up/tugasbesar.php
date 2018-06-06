<?php
defined('BASEPATH') Or exit('No direct script access allowed');

class tugasbesar extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('Pegawai_model');
		$this->load->model('wisata');
		$this->load->library('form_validation');
		//$this->load->helper('url');
		//$this->load->library('input');
			if($this->session->userdata('logged_in')){
			$session_data =$this->session->userdata('logged_in');
			$data['username']=$session_data['username'];
		}else{
			redirect('login','refresh');
		}
	}
	
	public function index(){
		// $this->load->helper('url','form');
		// $this->load->library('form_validation');
		// $this->load->model('Pegawai_model');
			$session_data =$this->session->userdata('logged_in');
				$nama['username']=$session_data['username'];
		$data['biodata_array']=$this->Pegawai_model->getBiodataQueryArray($nama['username']);

		$this->load->view('tbesar/tampil_pegawai_view',$data,$nama['username']);
	}
	public function toko(){
		// $this->load->helper('url','form');
		// $this->load->library('form_validation');
		// $this->load->model('Pegawai_model');
		$data['wisata_array']=$this->wisata->getWisataQueryArray();

		$this->load->view('tbesar/tampil_toko',$data);
	}
	public function Create(){
		// $this->load->helper('url','form');
		// $this->load->library('form_validation');

		$this->form_validation->set_rules('nama','Nama','trim|required');
		$this->form_validation->set_rules('Nip','Nip','trim|required');
		$this->form_validation->set_rules('Tanggal','Tanggal','trim|required');
		$this->form_validation->set_rules('Alamat','Alamat','trim|required');

		//load model
		$this->load->model('Pegawai_model');

		if($this->form_validation->run()==FALSE){
			$this->load->view('tbesar/tambah_pegawai_view');
		}
		else{
			// shortcut untuk code dibawah ini adlah "upload" kemudian tekan enter
			$config['upload_path'] = './assets/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '1000000000';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload()){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('tambah_pegawai_view',$error);
			}
			else{
				$image_data = $this->upload->data();
						$configer = 
						array (
		'image_library' => 'gd2',
		'source_image' => $image_data['full_path'],
		'maintain_ratio' => TRUE,
		'width'    => 250,
		'height'   => 400,
						)
						;	
						

		$this->load->library('image_lib', $config); 
			$this->image_lib->clear();
			$this->image_lib->initialize($configer);
			$this->image_lib->resize();
			$this->Pegawai_model->insertPegawai();
			$this->load->view('tbesar/tambah_pegawai_sukses');
			}
			
		}
	}

	public function Update($id){
		
// 		$this->form_validation->set_rules('nama','Nama','trim|required');
// 		$this->form_validation->set_rules('Nip','Nip','trim|required');
// 		$this->form_validation->set_rules('Tanggal','Tanggal','trim|required');
// 		$this->form_validation->set_rules('Alamat','Alamat','trim|required');

// 		//load model
// //		$this->load->model('Pegawai_model');
// 		$data['pegawai']=$this->Pegawai_model->getPegawai($id);
// 		if($this->form_validation->run()==FALSE){
// 			$this->load->view('pegawai/edit_pegawai_view',$data);
// 		}
// 		else{
// 			$config['upload_path'] = './assets/uploads/';
// 			$config['allowed_types'] = 'gif|jpg|png';
// 			$config['max_size']  = '1000000000';
// 			$config['max_width']  = '10240';
// 			$config['max_height']  = '7680';
			
// 			$this->load->library('upload', $config);
			
// 			if ( ! $this->upload->do_upload()){
// 				$error = array('error' => $this->upload->display_errors());
// 				$this->load->view('tambah_pegawai_view',$error);
// 			}
// 			else{
// 				$image_data = $this->upload->data();
// 						$configer = 
// 						array (
// 		'image_library' => 'gd2',
// 		'source_image' => $image_data['full_path'],
// 		'maintain_ratio' => TRUE,
// 		'width'    => 250,
// 		'height'   => 400,
// 						)
// 						;
// 						$this->load->library('image_lib', $config); 
// 			$this->image_lib->clear();
// 			$this->image_lib->initialize($configer);
// 			$this->image_lib->resize();
			$this->Pegawai_model->UpdateById($id);
			$this->load->view('tbesar/edit_pegawai_sukses');
		}
	// 	}
	// }
	public function delete($id){
		$this->Pegawai_model->delete($id);
		$this->load->view('tbesar/hapus_pegawai_sukses');
		

	}
	public function datatable(){
	$data['biodata_array']=$this->Pegawai_model->getBiodataQueryArray();

		$this->load->view('tbesar/pegawai_datatable',$data);
	}
	
	// public function Update(){
	// 	$this->load->view('contact');
	// }
	// public function Delete(){
	// 	$this->load->view('contact');
	// }
	public function datatable_ajax(){
		$this->load->view('tbesar/pegawai_datatable_ajax');
	}
	public function data_server(){
		$this->load->library('Datatables');
		$this->datatables
		->select('id,Nama,Nip,Tanggal,Alamat,foto')
		->from('pegawai');
		echo $this->datatables->generate();
	}
}
