<?php 
// $this->load->view('pegawai/header'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	<style> 
			table{
			border-collapse: collapse;
			width: 70%;
			margin: 0 auto;
			}
			table th {
				border:1px solid #000;
				padding: 3px;
				font-weight:bold;
				text-align: center;
			}
			table td{
				border:1px solid #000;
				padding: 3px;
				vertical-align: top;
			}
	
	</style>
</head>

<body>
	<!-- <p style="text-align: center">Tabel Pegawai</p> -->
	<table align="center">
	<tr align="center">
			<td style="border : 0px" ><img src="../images/asus-rog-logo-black-background_0.png" width="125" height="125"></td>
		<td colspan="2" align="center" style="border : 0px">
			<p>
			<h3>	Toko Pakaian FirWirVick</h3>
			<h5>LEMBAGA Usaha INDONESIA</h5>	
			JL.SENGGANI NO.26 KELURAHAN JATIMULYO KECAMATAN LOWOKWARU
			</p>
		</td>
		<td style="border : 0px" ><img src="../images/Indonesia.png" width="125" height="125"></td>

	</tr>
	<tr align="center">
		<td style="border : 0px" colspan="4"><hr size="5" style="background-color: black">
		</td>
		<tr>
			<td style="border : 0px" colspan="4" align="center"><b>DATA Item</b> </td>
		</tr>
	</tr>
		<tr>
			<th>Nama</th>
			<th>ukuran</th>
			<th>merk</th>
			<th>tipe</th>
			<th>harga</th>

		</tr>
		<?php $no=0; foreach ($item as $key ) {
	$no++;
	?>
	<tr align="center">
		<td><?php echo $key['nama'] ?></td>
		<td><?php echo $key['ukuran'] ?></td>
		
		<td><?php echo $key['nama_merk'] ?></td>
		<td><?php echo $key['tipe'] ?></td>
		<td><?php echo "RP. ".$key['harga'] ?></td>
		
	</tr>
	<?php }?>
	</table>
		<p style="text-align: center"><a href="<?php echo base_url()?>index.php/cetak/cetakpdf">Cetak PDF</a></p>
</body>
</html>