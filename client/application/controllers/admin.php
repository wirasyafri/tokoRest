<?php
defined('BASEPATH') Or exit('No direct script access allowed');

class admin extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/tokotb/server/index.php";
		$this->load->helper('url','form');
		$this->load->model('Data');
		$this->load->model('wisata');
		$this->load->library('form_validation');
		$this->load->library('curl');
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
			$data['dataukuran']=json_decode($this->curl->simple_get($this->API.'/ukuran'));
			$session_data =$this->session->userdata('logged_in');
				$nama['username']=$session_data['username'];
		
		$dataa['item_array']=$this->Data->getriwayat();

		// $this->load->view('admin/game', $data, FALSE);}
		$this->load->view('b/index', $dataa, FALSE);}
	

	public function Createukuran(){
		if(isset($_POST['submit'])){
				$data = array(
				'id_ukuran' => $this->input->post('id_ukuran'),
				'ukuran' => $this->input->post('ukuran'));
				$insert = $this->curl->simple_post($this->API.'/ukuran',$data,array(CURLOPT_BUFFERSIZE =>10));
				if($insert){
					$this->session->set_flashdata('hasil','Insert Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Insert Data Gagal');
				}
				redirect('ukuran');
			}else{
				$this->load->view('ukuran/create');
			}
	}
}
