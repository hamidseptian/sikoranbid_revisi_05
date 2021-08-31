<?php 
include "../../../../assets/koneksi.php";

$bidang=$_POST['bidang'];
$nama_proker=$_POST['nama_proker'];
$kategori=$_POST['kategori'];
$status=$_POST['status'];
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
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
					move_uploaded_file($file_tmp, '../../form/proker/file/proposal/'.$namabaru);
	$q1=mysqli_query($conn, "INSERT into proker set 
		
		
		  
		  id_bidang='$bidang',
		 kategori='$kategori',
		 nama_proker='$nama_proker',
		 keterangan='$ket',
		 status ='$status',
		 tgl='$tgls',
		 jam='$jams',
		 proposal='$namabaru'
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data proker berhasil disimpan');
		window.location.href="../../?a=proker"

	</script>
<?php }else{?>
	<script type="text/javascript">
		alert('Data proker gagal disimpan. Harap pilih extensi file (.pdf) dengan benar');
		window.location.href="../../?a=proker"

	</script>
	<?php } ?>