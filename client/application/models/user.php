<?php 
defined('BASEPATH') Or exit ('No direct script access allowed');

class user extends CI_Model
{
public function __construct()
{
	parent::__construct();
	//Do your magic here
}
//return array
	public function login($username,$password){
		// $this->db->select('id,username,password,status');
		$this->db->select('id,username,password');
		$this->db->from('customer');
		$coba='(password != "")';
		$this->db->where('username',$username);

		$this->db->where('password',MD5($password));
		// $this->db->where($coba);
		$query =$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function register(){
		$object = array (
		'username'  =>$this->input->post('username'),
		'password'  =>md5($this->input->post('password')),
		'item1' 	=> 1,
		'item2' 	=> 1,
		'item3' 	=> 1,
		'alamat'  =>$this->input->post('alamat'),
		'telp'  =>$this->input->post('telp'),
		);
	$this->db->insert('customer',$object);

	}
}
 ?>