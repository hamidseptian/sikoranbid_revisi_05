<?php 
include "../../../../assets/koneksi.php";

session_start();

$id = $_POST['id'];
$tgl = $_POST['tgl'];
$jam = $_POST['jam'];
$jenis = $_POST['jenis'];
$keterangan = $_POST['keterangan'];
$jumlah = $_POST['jumlah'];

			$ekstensi_diperbolehkan	= array('png','jpg','PNG','JPG','JPEG');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];
			$namabaru = date('ymdhis').$nama;
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
					move_uploaded_file($file_tmp, '../../form/pengumpulan/gambar/'.$namabaru);


			
	$q1=mysqli_query($conn, "INSERT into pengumpulan set 
		
		jenis='$jenis',
		keterangan='$keterangan',
		jumlah='$jumlah',
		file='$namabaru',
		status='0',
		tgl_infaq='$tgl',
		jam_infaq ='$jam',
		id_muzaki='$id'
		
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data pengumpulan berhasil disimpan');
		window.location.href="../../?a=donasi_muzaki"

	</script>
<?php }else{ ?>
	<script type="text/javascript">
		alert('Data pengumpulan gagal disimpan\nharap pilih file gambar dengan benar');
		window.location.href="../../?a=donasi_muzaki"

	</script>
<?php } ?>