
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];
$id_proker=$_GET['id_proker'];
$menu=$_GET['menu'];
$qty=$_GET['qty'];
$biaya=$_GET['biaya'];
$keterangan=$_GET['keterangan'];
$tgls=date('Y-m-d');
$total = $qty * $biaya;
	
$qpemasukan = mysqli_query($conn, "SELECT sum(jumlah) as totalmasuk from pengumpulan where status=1 ") or die(mysqli_error());
$d_pemasukan = mysqli_fetch_array($qpemasukan);
$totalpemasukan = $d_pemasukan['totalmasuk'];
$qpengeluaran = mysqli_query($conn, "SELECT sum(qty*biaya) as totalkeluar from pengeluaran") or die(mysqli_error());
$d_pengeluaran = mysqli_fetch_array($qpengeluaran);
$totalpengeluaran = $d_pengeluaran['totalkeluar'];
$sisa = $totalpemasukan - $totalpengeluaran;

if ($total > $sisa) {
	$alert = "Kas tidak cukup \nSisa kas adalah ".$sisa;
	# code...
}else{

	$q1=mysqli_query($conn, "UPDATE detail_proker set status=1 where id_detail_proker='$id'") or die(mysqli_error()); 
	$i_pengeluaran = mysqli_query($conn, "INSERT into pengeluaran set 
		id_detail_proker='$id',
		qty='$qty',
		biaya='$biaya',
		keterangan='$keterangan',
		tanggal='$tgls'") or die(mysqli_error());
	$alert = "Data dimasukkan ke kas keluar";
}

?>

	<script type="text/javascript">
		alert('<?php echo $alert ?>');
		window.location.href="../../?a=detail_proker&id=<?php echo $id_proker ?>&menu=<?php echo $menu ?>";

	</script>