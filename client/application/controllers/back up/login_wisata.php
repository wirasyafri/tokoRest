<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_wisata extends CI_Controller {
public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('user');
	
	}
	
	public function index()
	{
		$this->load->view('login/login_wisata_view');
	}

	public function cekLogin(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required|callback_cekDb');
		if($this->form_validation->run()==FALSE){
			$this->load->view('login/login_wisata_view');
		} else {
			redirect('tugasp3/datatable_ajax','refresh');
		}
	}
	public function login($username,$password){
		$this->db->select('id,username,password');
		$this->db->from('user');
		$this->db->where('username');
		$this->db->where('password',MD5($password));
		$query =$this->db->get();
		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	}

	public function cekDb($password){
		$this->load->model('user');
		$username = $this->input->post('username');
		$result = $this->user->login($username,$password);
		if($result){
			$sess_array = array();
			foreach ($result as $row){
				$sess_array = array(
'id'=>$row->id,
'username'=>$row->username
					);
				$this->session->set_userdata('logged_in',$sess_array);
			}
			return true;
		}else{
			$this->form_validation->set_message('cekDb',"Login Gagal Username dan password tidak valid");
			return false;
		}
	}
	public function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('Login_wisata','refresh');
	}
	public function register(){
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');

if($this->form_validation->run()==FALSE){
			$this->load->view('login/registrasi_wisata');
					}else{
			$this->user->register();
				redirect('tugasp3/datatable_ajax','refresh');
		}

	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
 ?>