<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('user');
	
	}
	
	public function index()
	{
		$this->load->view('login/login_view');
	}

	public function cekLogin(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required|callback_cekDb');
		if($this->form_validation->run()==FALSE){
			$this->load->view('login/login_view');
		} else {
			// redirect('pembelian','refresh');
			$session_data =$this->session->userdata('logged_in');
				$data['username']=$session_data['username'];
				// $data['uang']=$session_data['uang'];
			if ($data['username']!="admin"){
redirect('pembelian','refresh');
			}
			else{
redirect('admin','refresh');
			}
		}
	}
	public function login($username,$password){
		$this->db->select('id,username,password');
		$this->db->from('customer');
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
'username'=>$row->username,
'password'=>$row->password,
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
		redirect('login','refresh');
	}
	public function register(){
		$this->form_validation->set_rules('username','Username','trim|required|is_unique[customer	.username]');
		$this->form_validation->set_rules('password','Password','trim|required');

if($this->form_validation->run()==FALSE){
			$this->load->view('login/registrasi');
					}else{
			$this->user->register();
				redirect('login','refresh');
		}

	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
 ?>