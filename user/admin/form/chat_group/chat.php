<?php 
include "../../../../assets/koneksi.php";

session_start();

$saya = $_SESSION['bidang'];
@$penerima = $_GET['penerima'];

$q1=mysqli_query($conn, "SELECT * from chat_group cg left join bidang b 
	on cg.pengirim = b.id_bidang
		")or die(mysqli_error()); 
while ($d = mysqli_fetch_array($q1)) { 
	if ($d['pengirim']==$saya) {
		$float = 'right';
		$border_radius = ' 10px 10px 0px 10px ';
	}else{
		$float = 'left';
		$border_radius = ' 10px 10px 10px 1px ';
	}?>

<div style="border:solid; border-width: 1px ; border-radius: <?php echo $border_radius ?>;float : <?php echo $float ?>; margin: 10px; padding: 5px">
	<p style="text-align: <?php echo $float ?>"><?php echo $d['chat'] ?></p>
	<small><?php echo $d['tgl'].' | '.$d['jam'] ?> <br><?php echo $d['nama_bidang']?></small>
</div>
<div style="clear:both"></div>


<?php } ?>
