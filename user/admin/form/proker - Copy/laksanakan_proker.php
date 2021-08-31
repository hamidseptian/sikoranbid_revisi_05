<?php 
include "../../../../assets/koneksi.php";

$id_proker=$_GET['id_proker'];
$menu=$_GET['menu'];
	$q1=mysqli_query($conn, "UPDATE proker set 
		 status='7'
		 where id_proker = '$id_proker'
		")or die(mysqli_error()); 

		

?>

	<script type="text/javascript">
		alert('Data proker berhasil diperbaharui');
		window.location.href="../../?a=proker"

	</script>
