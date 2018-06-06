<?php
defined('BASEPATH') Or exit('No direct script access allowed');

class pembelian extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form','html');
		$this->load->model('Data');
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
		$session_data =$this->session->userdata('logged_in');
		$nama['username']=$session_data['username'];
		$data['biodata_array']=$this->Data->getBiodataQueryArray($nama['username']);
		// $data['wisata_array']=$this->wisata->getWisataQueryArray();
		$data['item_array']=$this->Data->getdatacus($nama['username']);
			// $this->load->view('pegawai/tampil_pegawai_view',$data,$nama['username']);
		$this->load->view('a/indexm',$data,$nama['username']);
	}
	public function toko(){
		// $data['wisata_array']=$this->wisata->getWisataQueryArray();
		$data['item_array']=$this->Data->getitem();
		// $this->load->view('pegawai/tampil_toko',$data);
		$this->load->view('a/toko',$data);
	}
	
	public function delete($id){
		$this->Data->delete($id);
		$this->load->view('pegawai/hapus_pegawai_sukses');
		}
	public function Update($id){
		
		$session_data =$this->session->userdata('logged_in');
			$nama=$session_data['username'];
			// $data=$session_data['uang'];
			// $a=$this->Pegawai_model->getharga($id);
			// $harga['harga']=$this->Data->getharga($id);
			// $test['biodata_array']=$this->Data->getBiodataQueryArray($nama);
			$customer['customer_array']=$this->Data->getCustomerQueryArray($nama);
			$this->Data->UpdateById($id,$nama,$customer);
			$item['dataitem']=$this->Data->getitemid($id);
			$this->Data->InsertDataPembelian($id,$nama,$item);
			$this->load->view('pembelian/edit_customer_sukses');
		// }
		// }
	}
}
