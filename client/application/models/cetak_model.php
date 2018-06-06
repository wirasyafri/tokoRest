<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cetak_model extends CI_Model {

	public function view()
	{
		$this->db->select("id,Nama,Nip,DATE_FORMAT(Tanggal,'%d-%m-%Y')as Tanggal,Alamat");
		$query=$this->db->get('pegawai');
		$query->result();
	}
// public function view_row()
// 	{
// 		$this->db->select("id,Nama,Nip,DATE_FORMAT(Tanggal,'%d-%m-%Y')as Tanggal,Alamat");
// 		$query=$this->db->get('pegawai');
// 	return 	$query->result();
// 	}
	public function view_row()
	{
		$query = $this->db->query("
			SELECT `item`.id_item, `item`.nama,`ukuran`.ukuran,`merk`.nama_merk,`tipe`.tipe,`jenis_kelamin`.jenis_kelamin,`item`.harga
			FROM `item` 
JOIN `ukuran`   	    on `item`.id_ukuran       = `ukuran`.id_ukuran 
join `merk`   		    on `item`.id_merk         = `merk`.id_merk 
join `tipe`    			on `item`.id_tipe         = `tipe`.id_tipe 
join `jenis_kelamin` 	on `item`.id_jeniskelamin = `jenis_kelamin`.`id_jeniskelamin` 
where `item`.id_item != 1 order by `item`.nama
");
		return $query->result_array();
	}
}

/* End of file cetak_model.php */
/* Location: ./application/controllers/cetak_model.php */