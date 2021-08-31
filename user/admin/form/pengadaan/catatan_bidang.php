
<?php 
include "../../../../assets/koneksi.php";
$id=$_POST['id'];
$id_proker=$_POST['id_proker'];
$id_bidang=$_POST['id_bidang'];
$keterangan=$_POST['keterangan'];
$menu=$_POST['menu'];
if ($id_bidang==1) {
	$target = 'catatan_kp';
}else{
	$target = 'catatan_bidang_terlibat';
}
	
	$q1=mysqli_query($conn, "UPDATE detail_proker set $target='$keterangan' where id_detail_proker='$id'"); 
	// header('location:../../?a=detail_proker&id='.$id_proker.'&menu='.$menu);
?>

	<script type="text/javascript">
		alert('Komentar ditambahkan');
		window.location.href="../../?a=detail_proker&id=<?php echo $id_proker ?>&menu=<?php echo $menu ?>"

	</script>d