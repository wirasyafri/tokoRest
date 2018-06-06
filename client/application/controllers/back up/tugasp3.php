<?php
defined('BASEPATH') Or exit('No direct script access allowed');

class tugasp3 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('wisata');
		$this->load->library('form_validation');
		//$this->load->helper('url');
		//$this->load->library('input');
			if($this->session->userdata('logged_in')){
			$session_data =$this->session->userdata('logged_in');
			$data['username']=$session_data['username'];
		}else{
			redirect('login_wisata','refresh');
		}
	}
	public function index(){
		$this->load->view('tugasp3/home');
	}
	public function about(){
		$this->load->view('tugasp3/about');
	}
	public function contact(){
		$this->load->view('tugasp3/contact');
	}
	public function wisata(){
		$data['biodata_array']=$this->wisata->getWisataQueryArray();
		$this->load->view('tugasp3/wisata',$data);
	}
	public function tambahWisata(){
		$this->load->helper('url','form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama','Nama','trim|required');
		//$this->form_validation->set_rules('gambar','Gambar','trim|required');
		$this->form_validation->set_rules('alamat','Alamat','trim|required');
		$this->form_validation->set_rules('deskripsi','Deskripsi','trim|required');
		//$this->form_validation->set_rules('Alamat','Alamat','trim|required');

		//load model
		$this->load->model('wisata');

		if($this->form_validation->run()==FALSE){
			$this->load->view('tugasp3/twisata');
		}
		else{
				$config['upload_path'] = './assets/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '1000000000';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload()){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('tugasp3/twisata',$error);
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
			$this->wisata->insertWisata();
			$this->load->view('tugasp3/twisata_sukses');
		}
		
	}}
	public function Update($id){
		
		$this->form_validation->set_rules('nama','Nama','trim|required');
		//$this->form_validation->set_rules('gambar','Gambar','trim|required');
		$this->form_validation->set_rules('alamat','Alamat','trim|required');
		$this->form_validation->set_rules('deskripsi','Deskripsi','trim|required');
		//load model
//		$this->load->model('Pegawai_model');
		$data['wisata']=$this->wisata->getWisata($id);
		if($this->form_validation->run()==FALSE){
			$this->load->view('tugasp3/ewisata',$data);
		}
		else{
			$config['upload_path'] = './assets/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '1000000000';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload()){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('tugasp3/twisata',$error);
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
			$this->wisata->UpdateById($id);
			$this->load->view('tugasp3/ewisata_sukses');
		}
		
	}}
	public function delete($id){
		$this->wisata->delete($id);
		$this->load->view('tugasp3/hwisata_sukses');
		

	}
	public function websiteku(){
		$this->load->view('tugasp3/websiteku');
	}
	public function datatable(){
	$data['wisata_array']=$this->wisata->getWisataQueryArray();

		$this->load->view('tugasp3/wisata_datatable',$data);
	}

	public function datatable_ajax(){
		$this->load->view('tugasp3/wisata_datatable_ajax');
	}
	public function data_server(){
		$this->load->library('Datatables');
		$this->datatables
		->select('id,nama,alamat,deskripsi,foto')
		->from('pariwisata');
		echo $this->datatables->generate();
	}
}
