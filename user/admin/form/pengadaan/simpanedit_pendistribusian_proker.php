<?php 
include "../../../../assets/koneksi.php";

$id_proker=$_POST['id_proker'];
$id_detail_proker=$_POST['id_detail_proker'];
$bidang_terlibat=$_POST['bidang_terlibat'];
$keterangan=nl2br($_POST['keterangan']);
$qty=$_POST['qty'];
$biaya=$_POST['biaya'];
$sarana_prasarana=$_POST['sarana_prasarana'];
$menu=$_POST['menu'];
$bidang_pengusul=$_POST['bidang_pengusul'];
$qty_sapras=$_POST['qty_sapras'];

if ($bidang_terlibat==6) {
	$id_data_support = $sarana_prasarana;
}else{
	$id_data_support = "";

}


$cek = $q1=mysqli_query($conn, "SELECT * from pendistribusian_proker where id_detail_proker='$id_detail_proker'")or die(mysqli_error()); 
$j_cek = mysqli_num_rows($cek);

if ($j_cek>0) {
	$q1=mysqli_query($conn, "UPDATE pendistribusian_proker set 
		   
		   id_bidang_terlibat='$bidang_terlibat',
		   keterangan_pendistribusian='$keterangan',
		   biaya_satuan='$biaya',
		   id_data_support ='$id_data_support',
		   qty_sapras='$qty_sapras'
		   where id_detail_proker='$id_detail_proker'
		")or die(mysqli_error()); 
	 
}else{
		$q1=mysqli_query($conn, "INSERT into pendistribusian_proker set 
		   id_detail_proker='$id_detail_proker',
		   id_bidang_terlibat='$bidang_terlibat',
		   keterangan_pendistribusian='$keterangan',
		   biaya_satuan='$biaya',
		   id_data_support ='$id_data_support',
		   qty_sapras='$qty_sapras'
		")or die(mysqli_error());
}
	$q1=mysqli_query($conn, "UPDATE detail_proker set 
		status='1'
		where   id_detail_proker='$id_detail_proker'

		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data detail proker berhasil disimpan');
		window.location.href="../../?a=detail_proker&id=<?php echo $id_proker ?>&menu=<?php echo $menu ?>&bidang_pengusul=<?php echo $bidang_pengusul ?>"

	</script>
