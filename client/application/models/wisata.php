<?php 
defined('BASEPATH') Or exit ('No direct script access allowed');

class wisata extends CI_Model
{
		public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function getWisataQueryArray(){
		$query = $this->db->query("SELECT * from item");
		return $query->result_array();
	}
	
}
 ?>