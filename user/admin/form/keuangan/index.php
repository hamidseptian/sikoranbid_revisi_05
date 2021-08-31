<?php 
  $q1=mysqli_query($conn, "SELECT * from pengumpulan where status='1' order by id_pengumpulan desc")or die(mysqli_error());
  $q2=mysqli_query($conn, "SELECT * from pengeluaran order by id_pengeluaran desc")or die(mysqli_error());
$no=1;
 ?>


<div class="box-header with-border">
  <h3 class="box-title">Data Keuangan</h3>
</div>





<form action="form/muzaki/simpan_muzaki.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="masuk">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data Kas Masuk </h4>
              </div>
              <div class="modal-body">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Tab 1</a></li>
              <li><a href="#tab_2" data-toggle="tab">Tab 2</a></li>
              <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <b>How to use:</b>

                 <table class="table table-striped table-bordered" id="example1" width="100%">
                    <thead>
                      <tr>
                        <td>No</td>
                        <td>Jenis Sumbangan</td>
                        <td>Keterangan</td>
                        <td>Jumlah</td>
                        <td>Waktu Menyumbang</td>
                        <td>Status</td>
                      </tr>
                    </thead>
                  <?php 
                  $totalmasuk  = 0 ;
                  $status = ['Pengecekan','Disetujui','Ditolak'];
                  while ($d1=mysqli_fetch_array($q1)) { 
                    $totalmasuk +=$d1['jumlah'];
                    ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                   
                  
                    
                    <td><?php echo $d1['jenis'] ?></td>
                    <td><?php echo $d1['keterangan'] ?></td>
                    <td><?php echo number_format($d1['jumlah']) ?></td>
                    <td><?php echo $d1['tgl_infaq'].'<br>'.$d1['jam_infaq'] ?></td>
                
                    <td><?php echo $status[$d1['status']] ?></td>

                   
                  </tr>
                  <?php } ?>
                 
                </table>
                <div class="alert alert-info">
                  Total : <?php echo number_format($totalmasuk)?>
                </div>
               
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                The European languages are members of the same family. Their separate existence is a myth.
                For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                in their grammar, their pronunciation and their most common words. Everyone realizes why a
                new common language would be desirable: one could refuse to pay expensive translators. To
                achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                words. If several languages coalesce, the grammar of the resulting language is more simple
                and regular than that of the individual languages.
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->

            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>



<form action="form/muzaki/simpan_muzaki.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="keluar">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data Kas Keluar </h4>
              </div>
              <div class="modal-body">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Tab 1</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <b>How to use:</b>

                 <table class="table table-striped table-bordered" id="example2" width="100%">
                    <thead>
                      <tr>
                        <td>No</td>
                        <td>Tanggal</td>
                        <td>Keterangan</td>
                        <td>Qty</td>
                        <td>Biaya</td>
                        <td>Total</td>
                      </tr>
                    </thead>
                  <?php 
                  $totalkeluar  = 0 ;
                  $no2=1;
                  while ($d2=mysqli_fetch_array($q2)) { 
                    $total = $d2['qty'] * $d2['biaya'];
                    $totalkeluar +=$total;
                    ?>
                  <tr>
                    <td><?php echo $no2++ ?></td>
                   
                    <td><?php echo $d2['tanggal'] ?></td>
                    <td><?php echo $d2['keterangan'] ?></td>
                    <td><?php echo $d2['qty'] ?></td>
                    <td><?php echo number_format($d2['biaya']) ?></td>
                    <td><?php echo number_format($total) ?></td>
                

                   
                  </tr>
                  <?php } ?>
                 
                </table>
                <div class="alert alert-info">
                  Total : <?php echo number_format($totalkeluar)?>
                </div>
               
              </div>
            </div>
          </div>

            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>




<div class="row">
        <div class="col-lg-4 col-xs-12">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>Kas Masuk</p>
              <h3><?php echo number_format($totalmasuk)?></h3>
            </div>
            <a href="#" data-toggle="modal" data-target="#masuk" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-12">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>Kas Keluar</p>
              <h3><?php echo number_format($totalkeluar) ?></h3>
            </div>
            <a href="#" data-toggle="modal" data-target="#keluar" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-12">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>Sisa Kas</p>
              <h3><?php echo number_format($totalmasuk - $totalkeluar) ?></h3>
            </div>
            <a href="#" data-toggle="modal" data-target="#addballroom" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>




