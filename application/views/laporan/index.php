 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div>
      <?php echo $this->session->flashdata('msg'); ?>
    </div> 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Laporan Check In</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="<?php echo base_url() ?>Laporan/filter" method="post">
                <div class="row">
                  <div class="col-2">
                    <input type="text" name="period_awal" value="<?php echo $this->session->userdata('ses_period_awal');?>" class=" date-picker form-control" onfocus="this.type='date'" onclick="this.type='date'" placeholder="Tanggal Awal">
                  </div>

                  <div class="col-2">
                    <input type="text" name="period_akhir" value="<?php echo $this->session->userdata('ses_period_akhir');?>" class="date-picker form-control" onfocus="this.type='date'" onclick="this.type='date'" placeholder="Tanggal Akhir">

                    <script>
                      function timeFunctionLong(input) {
                        setTimeout(function() {
                          input.type = 'text';
                        }, 60000);
                      }
                    </script>
                  </div> 

                  <div class="col-2">
                    <!-- <input type="text" class="form-control" placeholder=".col-2"> -->
                    <select class="form-control" name="dept">                      
                      <option value="">-Department-</option>
                      <?php foreach ($dept->result() as $ad): ?>
                        <?php
                         if ($this->session->userdata('ses_dept') == $ad->dept) {
                           $oke_dept = "selected";
                         }else{
                          $oke_dept = "";
                          } 
                        ?>
                        <option value="<?php echo $ad->dept;?>" <?php echo $oke_dept;?>><?php echo $ad->dept;?></option>
                      <?php endforeach ?>
                    </select>
                  </div>

                  <div class="col-2">
                    <input type="text" name="karyawan" placeholder="NIK Karyawan" value="<?php echo $this->session->userdata('ses_karyawan');?>" class="form-control">
                  </div>

                  <div class="col-4">
                      <input type="submit" name="submitdata" class="btn btn-info" value="Search" />
                      <input type="submit" name="submitdata" class="btn btn-warning" value="Reset" />
                      <input type="submit" name="submitdata" class="btn btn-dark" value="Print" formtarget="_blank" />
                      <input type="submit" name="submitdata" class="btn btn-success" value="Excel" />
                    </div>
                  </div>

                </div>
                </form>              
                <table class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Tanggal / Jam</th>
                      <th>Nik</th>
                      <th>Nama</th>
                      <th>Department</th>
                      <th>Jabatan</th>
                      <th></th>
                    </tr>
                  </thead>
                  <?php 
                    if ($nomor == 'index') {
                      $tampil = 1;
                    }else{
                      $tampil = $nomor+1;                       
                    }
                  ?>
                  <tbody>
                    <?php  $no=$tampil;; foreach ($laporan->result() as $ad): ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo date('d M y',strtotime($ad->TglTrans))." / ".date('H:i:s',strtotime($ad->JamTrans));?></td>
                      <td><?php echo $ad->NikUser;?></td>
                      <td><?php echo $ad->NamaUser;?></td>
                      <td><?php echo $ad->DeptUser;?></td>
                      <td><?php echo $ad->NamaJabatan;?></td>
                      <td>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-info-<?php echo $ad->ID_Trans;?>"><li class="fas fa-trash"></li> Hapus</button>
                      </td>
                    </tr>

                    <!-- modal hapus -->
                    <div class="modal fade" id="hapus-info-<?php echo $ad->ID_Trans;?>">
                      <div class="modal-dialog">
                        <form action="<?php echo base_url() ?>Laporan/hapus" method="post">
                        <div class="modal-content">
                          <div class="modal-header" style="background-color:#dc3545;color:#FFFFFF;">
                            <h4 class="modal-title">Hapus</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                            <input type="text" name="id" value="<?php echo $ad->ID_Trans;?>" hidden>

                            <p>Apakah mau menghapus Transaksi <b><?php echo $ad->NamaUser;?></b> ini ?</p>

                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                    <?php endforeach ?>
                    </tbody>
                  </table>
                  <?php echo $links;?>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->