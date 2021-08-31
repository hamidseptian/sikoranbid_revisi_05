<?php 
include "../../../../assets/koneksi.php";

$id_proker = $_GET['id_proker'];
$menu = $_GET['menu'];
$laporan = $_POST['laporan'];
$evaluasi = $_POST['evaluasi'];
			$ekstensi_diperbolehkan	= array('pdf','PDF');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];
			$namabaru = date('ymdhis').$nama;
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
					move_uploaded_file($file_tmp, '../../form/proker/file/'.$namabaru);


			
	$q1=mysqli_query($conn, "INSERT into laporan_proker set 
		id_proker='$id_proker',
		laporan='$laporan',
		evaluasi='$evaluasi',
		file='$namabaru'
		")or die(mysqli_error()); 
	$q2 = mysqli_query($conn, "UPDATE proker set status=12 where id_proker='$id_proker'");
?>

	<script type="text/javascript">
		alert('Proker Berakhir');
		window.location.href="../../?a=proker"

	</script>
<?php }else{ ?>
	<script type="text/javascript">
		alert('Data proker gagal disimpan\nharap pilih file dengan benar\nFile diperbolehkan adalah pdf');
		window.location.href="../../?a=detail_proker&id=<?php echo $id_proker ?>&menu=<?php echo $menu ?>"

	</script>
<?php } ?>