<?php 
include "../../../../assets/koneksi.php";

session_start();

$pengirim = $_POST['pengirim'];
$penerima = $_POST['penerima'];
$pesan = $_POST['pesan'];
$tgl = date('Y-m-d');		
$jam = date('h:i');		
	$q1=mysqli_query($conn, "INSERT into chat_personal set 
		
		 pengirim='$pengirim',
		penerima='$penerima',
		chat='$pesan',
		status='D',
		tgl = '$tgl',
		jam = '$jam'
		
		")or die(mysqli_error()); 
?>
