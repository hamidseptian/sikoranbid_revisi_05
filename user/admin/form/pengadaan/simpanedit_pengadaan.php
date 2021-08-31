<?php 
session_start();
include "../../../../assets/koneksi.php";

$id=$_POST['id'];
$qty=$_POST['qty'];
$bidang=$_SESSION['bidang'];
$nama_pengadaan=$_POST['nama_pengadaan'];
$harga=$_POST['harga'];
$status=0;
$jenis=$_POST['jenis'];
$ket=nl2br($_POST['ket']);
$tgls = date('Y-m-d');
$jams = date('H:i');



			$ekstensi_diperbolehkan	= array('pdf','PDF');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];
			$namabaru = date('ymdhis').$nama;
if ($nama=='') { 
	$q1=mysqli_query($conn, "UPDATE pengadaan set 
		   item='$nama_pengadaan',
		  keterangan='$ket',
		  harga_satuan='$harga',
		  qty='$qty',
		  jenis='$jenis',
		  status ='$status'
		  where id_pengadaan = '$id'
		")or die(mysqli_error()); 
		?>
	<script type="text/javascript">
		alert('Data pengadaan berhasil diperbaharui');
		window.location.href="../../?a=pengadaan";

	</script>
<?php } else{
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
					move_uploaded_file($file_tmp, '../../form/pengadaan/file/proposal/'.$namabaru);
	$q1=mysqli_query($conn, "UPDATE pengadaan set 
		   item='$nama_pengadaan',
		  keterangan='$ket',
		  harga_satuan='$harga',
		  qty='$qty',
		  jenis='$jenis',
		  file='$namabaru',
		  status ='$status'
		  where id_pengadaan = '$id'
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data pengadaan berhasil diperbaharui');
		window.location.href="../../?a=pengadaan"

	</script>
<?php }else{?>
	<script type="text/javascript">
		alert('Data pengadaan gagal diperbaharui. Harap pilih extensi file (.pdf) dengan benar');
		window.location.href="../../?a=pengadaan"

	</script>
	<?php } 
}?>