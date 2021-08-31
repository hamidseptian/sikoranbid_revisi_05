<?php 
@$menu = $_GET['a'];
if ($menu=='') {
  include "form/dashboard/dashboard.php";
  // echo "Segera Aktif";
}
else if ($menu=='pengumpulan') {
  include "form/pengumpulan/index.php";
}
else if ($menu=='edit_pengumpulan') {
  include "form/pengumpulan/edit_pengumpulan.php";
}
else if ($menu=='laporan_pengumpulan') {
  include "form/pengumpulan/laporan_pengumpulan.php";
}
else if ($menu=='edit-akun') {
  include "form/dashboard/edit_akun.php";
}
else if ($menu=='pengadaan') {
  include "form/pengadaan/index.php";
}
else if ($menu=='peminjaman') {
  include "form/peminjaman/index.php";
}
else if ($menu=='detail_peminjaman') {
  include "form/peminjaman/detail_peminjaman.php";
}
else if ($menu=='sarana_prasarana') {
  include "form/sarana_prasarana/index.php";
}
else if ($menu=='sarana_prasarana') {
  include "form/sarana_prasarana/index.php";
}
else if ($menu=='kotak_infaq') {
  include "form/kotak_infaq/index.php";
}
else if ($menu=='petugas_pengumpul') {
  include "form/petugas_pengumpul/index.php";
}
else if ($menu=='muzaki') {
  include "form/muzaki/index.php";
}
else if ($menu=='chat_personal') {
  include "form/chat_personal/index.php";
}
else if ($menu=='detail_chat_personal') {
  include "form/chat_personal/detail_chat_personal.php";
}
else if ($menu=='chat_group') {
  include "form/chat_group/detail_chat_group.php";
}
else if ($menu=='sdm') {
  include "form/sdm/index.php";
}
else if ($menu=='donasi_muzaki') {
  include "form/muzaki/donasi_muzaki.php";
}
else if ($menu=='edit_muzaki') {
  include "form/muzaki/edit_muzaki.php";
}
else if ($menu=='edit_petugas_pengumpul') {
  include "form/petugas_pengumpul/edit_petugas_pengumpul.php";
}
else if ($menu=='proker') {
  include "form/proker/index.php";
}
else if ($menu=='laporan_proker') {
  include "form/proker/laporan_proker.php";
}
else if ($menu=='laporan_pendistribusian') {
  include "form/proker/laporan_pendistribusian.php";
}
else if ($menu=='laporan_peminjaman') {
  include "form/peminjaman/laporan_peminjaman.php";
}
else if ($menu=='notifikasi') {
  include "form/notifikasi/index.php";
}
else if ($menu=='keuangan') {
  include "form/keuangan/index.php";
}
else if ($menu=='laporan_keuangan') {
  include "form/keuangan/laporan_keuangan.php";
}
else if ($menu=='laporan_pengeluaran') {
  include "form/keuangan/laporan_pengeluaran.php";
}
else if ($menu=='user') {
  include "form/user/index.php";
}
else if ($menu=='tambah_proker') {
  include "form/proker/tambah_proker.php";
}
else if ($menu=='tambah_pengadaan') {
  include "form/pengadaan/tambah_pengadaan.php";
}
else if ($menu=='edit_pengadaan') {
  include "form/pengadaan/edit_pengadaan.php";
}
else if ($menu=='detail_pengadaan') {
  include "form/pengadaan/detail_pengadaan.php";
}
else if ($menu=='detail_proker') {
  include "form/proker/detail_proker.php";
}
else if ($menu=='edit_proker') {
  include "form/proker/edit_proker.php";
}
else if ($menu=='edit_user') {
  include "form/user/edit_user.php";
}
else if ($menu=='edit_kotak_infaq') {
  include "form/kotak_infaq/edit_kotak_infaq.php";
}

else if ($menu=='edit_bidang') {
  include "form/bidang/edit_bidang.php";
}
else if ($menu=='edit_sarana_prasarana') {
  include "form/sarana_prasarana/edit_sarana_prasarana.php";
}

//no fitur
else{
	echo "Fitur ini belum tersedia";
}
 ?>

