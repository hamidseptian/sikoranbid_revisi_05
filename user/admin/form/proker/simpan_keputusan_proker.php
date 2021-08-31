
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id_proker'];

$tgls = date('Y-m-d');
$jams = date('H:i');

	$status=$_POST['keputusan'];
	$menu=$_POST['menu'];
	$bidang_pengusul=$_POST['bidang_pengusul'];
	$catatan=nl2br($_POST['komentar']);
	$q1=mysqli_query($conn, "UPDATE proker set status='$status' where id_proker='$id'") or die(mysqli_error()); 
	$q_p=mysqli_query($conn, "SELECT * from proker where id_proker='$id'") or die(mysqli_error()); 
	$d_p = mysqli_fetch_array($q_p);
	if ($d_p['status']=='6') {
		$q3=mysqli_query($conn, "UPDATE detail_proker set status='1' where id_proker='$id' and status in('2')") or die(mysqli_error()); 
	}
	$q2 =mysqli_query($conn, "INSERT into komentar_proker set 
		id_proker='$id', status='$status', catatan='$catatan', tgl='$tgls', jam='$jams'
		") or die(mysqli_error());

	
$alert = "Keputusan disimpan";

?>

	<script type="text/javascript">
		alert('<?php echo $alert ?>');
		window.location.href="../../?a=detail_proker&id=<?php echo $id ?>&menu=<?php echo $menu ?>&bidang_pengusul=<?php echo $bidang_pengusul ?>"

	</script>