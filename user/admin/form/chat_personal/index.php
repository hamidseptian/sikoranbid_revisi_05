<?php $q_bidang = mysqli_query($conn, "SELECT * from bidang where id_bidang !='$bidang'") 
 ?>


<div class="box-header with-border">
  <h3 class="box-title">Chat Antar Bidang</h3>

  <div class="box-tools pull-right">
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#addballroom">Daftar Bidang</a>
  </div>
</div>

<form action="form/pengumpulan/simpan_pengumpulan.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="addballroom">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Chat ke Bidang</h4>
              </div>
              <div class="modal-body">
                 
              <table id="example1" class="table" width="100%">
                <thead>
                  <tr>
                    <td>Pilih Bidang</td>
                  </tr>
                </thead>
                <tbody>
                  <?php $jenis = ['Infaq / Sedekah','Zakat','Dana Lainnya'];
                  while ($d_bidang = mysqli_fetch_array($q_bidang)) { ?>
                    <tr>
                      <td><a href="?a=detail_chat_personal&id=<?php echo $d_bidang['id_bidang'] ?>"><?php echo $d_bidang['nama_bidang'] ?></a></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Data Pengumpulan</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>



<hr>
<?php
$saya = $_SESSION['bidang'];
$q1=mysqli_query($conn, "SELECT distinct b.id_bidang,  b.nama_bidang from chat_personal cp left join bidang b on cp.penerima = b.id_bidang or cp.pengirim=b.id_bidang where (pengirim='$saya' or penerima='$saya') and b.id_bidang !='$saya'
  group by penerima, pengirim
    ")or die(mysqli_error()); 
  $no=1;
 ?>

 <table id="example2" class="table" width="100%">
                <thead>
                  <tr>
                    <td>Pilih Bidang</td>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  while ($d1 = mysqli_fetch_array($q1)) { ?>
                    <tr>
                      <td><a href="?a=detail_chat_personal&id=<?php echo $d1['id_bidang'] ?>"><?php echo $d1['nama_bidang'] ?></a></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
