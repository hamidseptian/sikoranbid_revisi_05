
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id_pengadaan'];

$tgls = date('Y-m-d');
$jams = date('H:i');

	$status=$_POST['keputusan'];
	$nama_bidang=$_POST['nama_bidang'];
	$item=$_POST['item'];
	$menu=$_POST['menu'];
	$qty=$_POST['qty'];
	$harga=$_POST['harga'];
	$bidang_pengusul=$_POST['bidang_pengusul'];
	$catatan=nl2br($_POST['komentar']);

$alert = "Keputusan disimpan";







	$ekstensi_diperbolehkan	= array('pdf','PDF','jpg','jpeg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];
			$namabaru = date('ymdhis').$nama;
 
if ($status==4) {
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
					move_uploaded_file($file_tmp, '../../form/pengadaan/file/kwitansi/'.$namabaru);
						$q1=mysqli_query($conn, "UPDATE pengadaan set status='$status', komentar_bendahara='$catatan' where id_pengadaan='$id'") or die(mysqli_error()); 
					$q2=mysqli_query($conn, "INSERT into pengeluaran set 
						 tanggal='$tgls', 
						keterangan='Pengadaan $item oleh $nama_bidang',
						qty='$qty',
						biaya ='$harga'
						") or die(mysqli_error()); 

	
?>

	<script type="text/javascript">
		alert('Data pengadaan berhasil disimpan');
		window.location.href="../../?a=pengadaan"

	</script>
<?php }else{?>
	<script type="text/javascript">
		alert('Data pengadaan gagal disimpan. Harap pilih extensi file (.pdf) dengan benar');
		window.location.href="../../?a=pengadaan"

	</script>
	<?php }
}
else{
	$q1=mysqli_query($conn, "UPDATE pengadaan set status='$status', komentar_bendahara='$catatan' where id_pengadaan='$id'") or die(mysqli_error()); 

	 ?>
<script type="text/javascript">
		alert('Data pengadaan berhasil disimpan');
		window.location.href="../../?a=pengadaan"

	</script>
	 <?php } ?>