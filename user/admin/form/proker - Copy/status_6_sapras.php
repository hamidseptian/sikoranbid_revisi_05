
<?php 
include "../../../../assets/koneksi.php";
$id=$_POST['id'];
$id_proker=$_POST['id_proker'];
$menu=$_POST['menu'];
$dipinjamkan=$_POST['dipinjamkan'];
$tersedia=$_POST['tersedia'];
$id_sapras=$_POST['id_sapras'];
$tgls = date('Y-m-d');
if ($dipinjamkan > $tersedia) {
	$alert = "Tidak bisa meminjamkan barang \nBarang tersedia : ".$tersedia;
	# code...
}else{

	$q1=mysqli_query($conn, "UPDATE detail_proker set status=1 where id_detail_proker='$id'") or die(mysqli_error()); 
	$i_pengeluaran = mysqli_query($conn, "INSERT into peminjaman set 
		id_detail_proker='$id',
		id_sapras='$id_sapras',
		dipinjamkan='$dipinjamkan',
		tgl_peminjaman='$tgls',
		status='0'");
	$alert = "Barang dipinjamkan";
}

?>

	<script type="text/javascript">
		alert('<?php echo $alert ?>');
		window.location.href="../../?a=detail_proker&id=<?php echo $id_proker ?>&menu=<?php echo $menu ?>";

	</script>