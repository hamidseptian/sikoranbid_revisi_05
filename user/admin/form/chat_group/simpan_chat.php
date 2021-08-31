<?php 
include "../../../../assets/koneksi.php";

session_start();

$pengirim = $_POST['pengirim'];
$pesan = $_POST['pesan'];
$tgl = date('Y-m-d');		
$jam = date('h:i');		
	$q1=mysqli_query($conn, "INSERT into chat_group set 
		
		 pengirim='$pengirim',
		chat='$pesan',
		status='D',
		tgl = '$tgl',
		jam = '$jam'
		
		")or die(mysqli_error()); 
?>
