<div class="box-header with-border">
  <h3 class="box-title">Data Donasi Muzaki <br>Bulan <?php echo $namabulan[date('m')].' '.date('Y') ?></h3>

  <div class="box-tools pull-right">
    <!-- <a href="" class="btn btn-default btn-sm"  target="_blank">Print Data Paket</a> -->
    <a href="?a=muzaki" class="btn btn-info btn-sm">Kembali</a>
    
  </div>
</div>

<hr>


        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Data Muzaki</a></li>
              <li><a href="#tab_2" data-toggle="tab">Donasi Muzaki Yang Sudah Diterima Dan Diverivikasi</a></li>
              <li><a href="#tab_3" data-toggle="tab">Semua Data Donasi Muzaki</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">

                 
                <?php 
                  $q1=mysqli_query($conn, "SELECT * from muzaki
                    ");
                  $no=1;
                 ?>

                 <table class="table table-striped table-bordered" id="example1">
                    <thead>
                      <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Alamat</td>
                        <td>No HP</td>
                        <td>Option</td>
                      </tr>
                    </thead>
                  <?php 
                  $tahun = date('Y');
                  $bulan = date('m');
                  $total_terkumpul = 0 ;
                  while ($d1=mysqli_fetch_array($q1)) { 
                    $id_muzaki = $d1['id_muzaki'];
                    $q_donasi = mysqli_query($conn, "SELECT * from pengumpulan where id_muzaki='$id_muzaki' and month(tgl_infaq)='$bulan' and year(tgl_infaq)='$tahun'");
                    $j_donasi = mysqli_num_rows($q_donasi);
                    $d_donasi = mysqli_fetch_array($q_donasi);
                    $terkumpul = $d_donasi['jumlah'];
                    $total_terkumpul +=$terkumpul;
                    ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                   
                  
                    
                    <td><?php echo $d1['nama'] ?></td>
                    <td><?php echo $d1['alamat'] ?></td>
                    <td><?php echo $d1['nohp'] ?></td>

                    <td>
                      <a href="#" class="btn btn-info btn-xs"  data-toggle="modal" data-target="#donasi_muzaki_<?php echo $d1['id_muzaki'] ?>">Terima Donasi</a>  
                     
                    </td>




                <div class="modal fade" id="donasi_muzaki_<?php echo $d1['id_muzaki'] ?>">
                <form action="form/muzaki/simpan_donasi.php" method="post" enctype="multipart/form-data">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Terima Donasi Bulanan Muzaki</h4>
                              </div>
                              <div class="modal-body">
                                  
                              <div class="form-group">
                                  <input type="hidden" name="id" class="form-control" readonly value="<?php echo $d1['id_muzaki'] ?>">
                              </div> 
                               <div class="form-group">
                                  <label>Tanggal</label>
                                  <input type="date" name="tgl" class="form-control" required value="<?php echo date('Y-m-d') ?>">
                              </div> 
                              <div class="form-group">
                                  <label>Jam</label>
                                  <input type="time" name="jam" class="form-control" required value="<?php echo date('h:i') ?>">
                              </div> 
                              <div class="form-group">
                                  <label>Jenis Sumbangan</label>
                                  <select name="jenis" class="form-control">
                                    
                                  <?php $jenis = ['Infaq / Sedekah','Zakat','Dana Lainnya'];
                                  foreach ($jenis as $k => $v) { ?>
                                    <option value="<?php echo $v ?>"><?php echo $v ?></option>
                                  <?php } ?>
                                  </select>
                              </div> 
                              <div class="form-group">
                                  <label>Keterangan</label>
                                  <textarea class="form-control" name="keterangan">Donasi dari Muzaki <?php echo "\n".$d1['nama'] ?> </textarea>
                              </div> 
                              <div class="form-group">
                                  <label>Jumlah Donasi</label>
                                  <input type="number" name="jumlah" class="form-control">
                              </div> 
                              <div class="form-group">
                                  <label>File Kwitansi</label>
                                  <input type="file" name="file" class="form-control" required>
                              </div> 
                             </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan Data Muzaki</button>
                               
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                </form>
                        </div>
                  </tr>
                  <?php } ?>
                </table>
               
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                 <table class="table table-striped table-bordered" id="example2" width="100%">
                    <thead>
                      <tr>
                        <td>No</td>
                        <td>Jenis Sumbangan</td>
                        <td>MuzaKI</td>
                        <td>Jumlah</td>
                        <td>Waktu Menyumbang</td>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                  $status = ['Pengecekan','Disetujui','Ditolak'];
                  $no1=1;
                  $totaldonasi=0;
                  $q1 = mysqli_query($conn, "SELECT * from pengumpulan p join muzaki m on p.id_muzaki = m.id_muzaki where p.id_muzaki !=''  and p.status=1");
                  while ($d1=mysqli_fetch_array($q1)) { 
                    $totaldonasi +=$d1['jumlah'];
                    ?>
                  <tr>
                    <td><?php echo $no1++ ?></td>
                   
                  
                    
                    <td><?php echo $d1['jenis'] ?></td>
                    <td><?php echo $d1['nama'] ?></td>
                    <td><?php echo number_format($d1['jumlah']) ?></td>
                    <td><?php echo $d1['tgl_infaq'].'<br>'.$d1['jam_infaq'] ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="3">Total</td>
                    <td colspan="2"><?php echo number_format($totaldonasi) ?></td>
                  </tr>
                </tfoot>
                </table>
              </div>
              <div class="tab-pane" id="tab_3">
                 <table class="table table-striped table-bordered" id="example3" width="100%">
                    <thead>
                      <tr>
                        <td>No</td>
                        <td>Jenis Sumbangan</td>
                        <td>Muzaki</td>
                        <td>Jumlah</td>
                        <td>Waktu Menyumbang</td>
                        <td>Status</td>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                  
                  $no1=1;
                  $totaldonasi2=0;
                  $q1 = mysqli_query($conn, "SELECT * from pengumpulan p join muzaki m on p.id_muzaki = m.id_muzaki where p.id_muzaki !='' ");
                  while ($d1=mysqli_fetch_array($q1)) { 
                    $totaldonasi2 +=$d1['jumlah'];
                    ?>
                  <tr>
                    <td><?php echo $no1++ ?></td>
                   
                  
                    
                    <td><?php echo $d1['jenis'] ?></td>
                    <td><?php echo $d1['nama'] ?></td>
                    <td><?php echo number_format($d1['jumlah']) ?></td>
                    <td><?php echo $d1['tgl_infaq'].'<br>'.$d1['jam_infaq'] ?></td>
                    <td><?php echo $status[$d1['status']] ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="3">Total</td>
                    <td colspan="2"><?php echo number_format($totaldonasi2) ?></td>
                  </tr>
                </tfoot>
                </table>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>