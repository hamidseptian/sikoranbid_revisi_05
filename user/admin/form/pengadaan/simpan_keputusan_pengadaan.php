
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id_pengadaan'];

$tgls = date('Y-m-d');
$jams = date('H:i');

	$status=$_POST['keputusan'];
	$menu=$_POST['menu'];
	$bidang_pengusul=$_POST['bidang_pengusul'];
	$catatan=nl2br($_POST['komentar']);
	$q1=mysqli_query($conn, "UPDATE pengadaan set status='$status', komentar_kp='$catatan' where id_pengadaan='$id'") or die(mysqli_error()); 

$alert = "Keputusan disimpan";

?>

	<script type="text/javascript">
		alert('<?php echo $alert ?>');
		window.location.href="../../?a=detail_pengadaan&id=<?php echo $id ?>&menu=<?php echo $menu ?>&bidang_pengusul=<?php echo $bidang_pengusul ?>"

	</script>