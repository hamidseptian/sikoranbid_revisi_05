<?php 
include "../../../../assets/koneksi.php";

session_start();

$tgl = $_POST['tgl'];
$jam = $_POST['jam'];
$jenis = $_POST['jenis'];
$ket = $_POST['ket'];
$nama_pendonasi = $_POST['nama'];
$alamat = $_POST['alamat'];
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
		 nama='$nama_pendonasi',
		 alamat='$alamat',
		keterangan='$ket',
		jumlah='$jumlah',
		file='$namabaru',
		status='0',
		tgl_infaq='$tgl',
		jam_infaq ='$jam'
		
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data pengumpulan berhasil disimpan');
		window.location.href="../../?a=pengumpulan"

	</script>
<?php }else{ ?>
	<script type="text/javascript">
		alert('Data pengumpulan gagal disimpan\nharap pilih file gambar dengan benar');
		window.location.href="../../?a=pengumpulan"

	</script>
<?php } ?>