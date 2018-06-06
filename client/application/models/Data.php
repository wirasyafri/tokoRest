<?php 
defined('BASEPATH') Or exit ('No direct script access allowed');

class Data extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
public function gettipe(){
		$query = $this->db->query("
			SELECT * FROM `tipe` 
");
		return $query->result_array();
	}
public function getmerk(){
		$query = $this->db->query("
			SELECT * FROM `merk` 
");
		return $query->result_array();
	}	
public function getukuran(){
		$query = $this->db->query("
			SELECT * FROM `ukuran` 
");
		return $query->result_array();
	}		
public function getriwayat(){
		$query = $this->db->query("SELECT * from riwayat ");
		return $query->result_array();
	}

	public function getitem(){
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
		public function getitemid($id){
		$query = $this->db->query("
			SELECT `item`.id_item, `item`.nama,`ukuran`.ukuran,`merk`.nama_merk,`tipe`.tipe,`jenis_kelamin`.jenis_kelamin,`item`.harga
			FROM `item` 
JOIN `ukuran`   	    on `item`.id_ukuran       = `ukuran`.id_ukuran 
join `merk`   		    on `item`.id_merk         = `merk`.id_merk 
join `tipe`    			on `item`.id_tipe         = `tipe`.id_tipe 
join `jenis_kelamin` 	on `item`.id_jeniskelamin = `jenis_kelamin`.`id_jeniskelamin` 
where `item`.id_item = '$id'
");
		return $query->result_array();
	}
public function getitemcus($nama){
		$query = $this->db->query("
			SELECT `item`.id_item, `item`.nama,`ukuran`.ukuran,`merk`.nama_merk,`tipe`.tipe,`jenis_kelamin`.jenis_kelamin
			FROM `item` 
JOIN `ukuran`   	    on `item`.id_ukuran       = `ukuran`.id_ukuran 
join `merk`   		    on `item`.id_merk         = `merk`.id_merk 
join `tipe`    			on `item`.id_tipe         = `tipe`.id_tipe 
join `jenis_kelamin` 	on `item`.id_jeniskelamin = `jenis_kelamin`.`id_jeniskelamin` 
where `item`.id_item = '$nama' 
");
		return $query->result_array();
	}
	public function getdatacus($nama){
		$query = $this->db->query("SELECT `customer`.username,`a`.nama as `item1`,`b`.nama as `item2`,`c`.nama as `item3`  FROM `customer` 
JOIN `item` as `a` ON `customer`.`item1`=`a`.`id_item` 
JOIN `item` as `b` ON `customer`.`item2`=`b`.`id_item` 
JOIN `item` as `c` ON `customer`.`item3`=`c`.`id_item`
where `customer`.username = '$nama'
 ");
		return $query->result_array();
	}

	public function getBiodataQueryArray($nama){
		$query = $this->db->query("SELECT * from customer where username ='$nama'");
		return $query->result_array();
	}

	public function getCustomerQueryArray($nama){
		$query = $this->db->query("SELECT * from customer where username ='$nama'");
		return $query->result_array();
	}

	public function InsertDataPembelian($id,$nama,$item){
		// var_dump(last_query());
		
		$itemnya=$item['dataitem'];
		foreach ($itemnya as $key ) {
			$a=$key['harga'];
			$namabarang=$key['nama'];
		}
		$data = array(
   'nama' => $nama,
   'barang' => $namabarang,
   'harga' => $a,
);
	$this->db->insert('riwayat',$data);

	}
	
	public function UpdateById($id,$nama,$customer){
	
	$customer_array=$customer['customer_array'];
	foreach ($customer_array as $key) {
				?> <?php 
				if($key['item1']=="1")
					{ ?>
						 <?php $data = array
						 ('item1'=>($id));
					}
				elseif ($key['item1']!="1" && $key['item2']=="1" && $id!=$key['item1']) 
					{ ?>			
						
						<?php 
						$data = array
							(
							
							'item2'=>($id));
							}
					 
				elseif (($key['item1']!="1" && $key['item2']!="1"&& $key['item3']=="1" && $id!=$key['item1'] )||($key['item1']!="1" && $key['item2']!="1"&& $key['item3']=="1" && $id!=$key['item2'] ) ) 
					{ ?>
						
						<?php 
						$data = array
							(
							
							'item3'=>($id));
							}
				else
					{ ?>
						
						<?php 
					redirect('pembelian','refresh');
					 
				 }

					?> <?php }
		$this->db->where('username',$nama);
		$this->db->update('customer',$data);
		// print_r($this->db->last_query());
	}
	

	public function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('game');
		

	}
}
 ?>