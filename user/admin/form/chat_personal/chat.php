<?php 
include "../../../../assets/koneksi.php";

session_start();

$saya = $_SESSION['bidang'];
@$penerima = $_GET['penerima'];

$q1=mysqli_query($conn, "SELECT * from chat_personal where (pengirim='$saya' and  penerima='$penerima') or (pengirim='$penerima' and  penerima='$saya')
		
		")or die(mysqli_error()); 
while ($d = mysqli_fetch_array($q1)) { 
	if ($d['pengirim']==$saya) {
		$float = 'right';
	}else{
		$float = 'left';
	}?>

<div style="border:solid;float : <?php echo $float ?>; margin: 10px; padding: 5px">
	<p style="text-align: <?php echo $float ?>"><?php echo $d['chat'] ?></p>
	<small><?php echo $d['tgl'].' | '.$d['jam'] ?></small>
</div>
<div style="clear:both"></div>


<?php } ?>
