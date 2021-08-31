<?php 
include "../../../../assets/koneksi.php";

$id_proker=$_POST['id_proker'];
$id_detail_proker=$_POST['id_detail_proker'];
$keputusan=$_POST['keputusan'];

$catatan=nl2br($_POST['catatan']);
// $qty=$_POST['qty'];
$menu=$_POST['menu'];
$bidang_pengusul=$_POST['bidang_pengusul'];
$bidang_terlibat=$_POST['bidang_terlibat'];
$tgls=date('Y-m-d');
if ($bidang_terlibat==3 || $bidang_terlibat==6) {
	$disetujui =$_POST['disetujui'];
	if ($bidang_terlibat==6) {

		$cek_pendistribusian = mysqli_query($conn, "SELECT * from pendistribusian_proker where id_detail_proker='$id_detail_proker'")or die(mysqli_error());
		$d_cek_pendistribusian = mysqli_fetch_array($cek_pendistribusian);
		$id_sapras = $d_cek_pendistribusian['id_data_support'];
		$q_peminjaman = mysqli_query($conn, "INSERT INTO peminjaman set
			id_sapras='$id_sapras',
			id_detail_proker='$id_detail_proker',
			dipinjamkan='$disetujui',
			tgl_peminjaman='$tgls',
			status ='0'
			")or die(mysqli_error());
	}
}else{
	$disetujui ='';

}


$ekstensi_diperbolehkan	= array('jpg','JPG','jpeg','png','pdf');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];
			$namabaru = date('ymdhis').$nama;
 	
	$file_support = $namabaru ;
if ($nama =='') {
	$q1=mysqli_query($conn, "UPDATE pendistribusian_proker set 
		   disetujui = '$disetujui',
		   catatan_bidang='$catatan'
		   where id_detail_proker='$id_detail_proker'
		")or die(mysqli_error()); 
	$q1=mysqli_query($conn, "UPDATE detail_proker set 
		status='$keputusan'
		where   id_detail_proker='$id_detail_proker'

		")or die(mysqli_error()); 

	$qdp=mysqli_query($conn, "SELECT * from detail_proker
		where   id_detail_proker='$id_detail_proker'
		")or die(mysqli_error()); 
	$ddp = mysqli_fetch_array($qdp);
	$tgls = date('Y-m-d');
	$qty = $ddp['qty'];
	$item = $ddp['item'];
	$q1=mysqli_query($conn, "INSERT INTO pengeluaran set 
		id_detail_proker='$id_detail_proker',
		tanggal='$tgls',
		keterangan='Pembayaran $item',
		biaya='$disetujui'

		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data detail proker berhasil disimpan');
		window.location.href="../../?a=detail_proker&id=<?php echo $id_proker ?>&menu=<?php echo $menu ?>&bidang_pengusul=<?php echo $bidang_pengusul ?>"

	</script>
<?php }else{
			if(in_array($ekstensi, $ekstensi_diperbolehkan) == true){
					move_uploaded_file($file_tmp, '../../form/proker/file/acc_distribusi/'.$namabaru);
	$q1=mysqli_query($conn, "UPDATE pendistribusian_proker set 
		   disetujui = '$disetujui',
		   file_support='$file_support',
		   catatan_bidang='$catatan'
		   where id_detail_proker='$id_detail_proker'
		")or die(mysqli_error()); 
	$q1=mysqli_query($conn, "UPDATE detail_proker set 
		status='$keputusan'
		where   id_detail_proker='$id_detail_proker'

		")or die(mysqli_error()); 
	$qdp=mysqli_query($conn, "SELECT * from detail_proker
		where   id_detail_proker='$id_detail_proker'
		")or die(mysqli_error()); 
	$ddp = mysqli_fetch_array($qdp);
	$tgls = date('Y-m-d');
	$qty = $ddp['qty'];
	$item = $ddp['item'];
	$q1=mysqli_query($conn, "INSERT INTO pengeluaran set 
		id_detail_proker='$id_detail_proker',
		tanggal='$tgls',
		keterangan='Pembayaran $item',
		biaya='$disetujui'

		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data detail proker berhasil disimpan');
		window.location.href="../../?a=detail_proker&id=<?php echo $id_proker ?>&menu=<?php echo $menu ?>&bidang_pengusul=<?php echo $bidang_pengusul ?>"

	</script>
<?php }else{ ?>
	<script type="text/javascript">
		alert('Data proker gagal disimpan\nharap pilih file dengan benar\nFile diperbolehkan adalah pdf');
		window.location.href="../../?a=detail_proker&id=<?php echo $id_proker ?>&menu=<?php echo $menu ?>&bidang_pengusul=<?php echo $bidang_pengusul ?>"
		

	</script>
<?php } 
} ?>