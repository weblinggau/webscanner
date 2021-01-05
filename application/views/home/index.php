<div class="container-fluid">

          <div class="row">

            <div class="col-lg-8 mb-4">

              <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data</h6>
                  </div>
                  <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div>
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nopol</th>
                          <th>Tahun</th>
                          <th>Kode Arsip Stnk</th>
                          <th>Kode Arsip BPKB</th>
                          <th>Arsip 1</th>
                          <th>Arsip 2</th>
                          <th>Arsip 3</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($list as $d) {
                         ?>
                        <tr>
                          <td><?= $no++;?></td>
                          <td><?= $d->nopol; ?></td>
                          <td><?= $d->tahun; ?></td>
                          <td><?= $d->noka; ?></td>
                          <td><?= $d->nosin; ?></td>
                          <td>
                            <?php if (empty($d->arsip1)) {?>
                              <a href="<?= base_url('home/scan/').$d->id_data.'/arsip1'?>">
                              <span class="badge badge-success">Scan DOc</span>
                              </a>
                            <?php }else{ ?>
                            <img src="<?= base_url('upload/').$d->arsip1;?>"  width="50%">
                            <a href="<?= base_url('home/scan/').$d->id_data.'/arsip1'?>">
                              <span class="badge badge-warning">Edit Scan</span>
                            </a>
                            <?php } ?>
                          </td>
                          <td>
                            <?php if (empty($d->arsip2)) {?>
                              <a href="<?= base_url('home/scan/').$d->id_data.'/arsip2'?>">
                              <span class="badge badge-success">Scan DOc</span>
                              </a>
                            <?php }else{ ?>
                            <img src="<?= base_url('uis/').$d->arsip2;?>"  width="50%">
                            <a href="<?= base_url('home/scan/').$d->id_data.'/arsip2'?>">
                              <span class="badge badge-warning">Edit Scan</span>
                            </a>
                            <?php } ?>
                          </td>
                          <td>
                            <?php if (empty($d->arsip3)) {?>
                              <a href="<?= base_url('home/scan/').$d->id_data.'/arsip3'?>">
                              <span class="badge badge-success">Scan DOc</span>
                              </a>
                            <?php }else{ ?>
                            <img src="<?= base_url('uis/').$d->arsip3;?>"  width="50%">
                            <a href="<?= base_url('home/scan/').$d->id_data.'/arsip3'?>">
                              <span class="badge badge-warning">Edit Scan</span>
                            </a>
                            <?php } ?>
                          </td>
                          <td>
                            <a href="" data-toggle="modal" data-target="#viewscan" data-id="<?= $d->id_data; ?>">
                              <span class="badge badge-warning">View</span>
                            </a>
                            <a href="" data-toggle="modal" data-target="#edit" data-id="<?= $d->id_data; ?>">
                              <span class="badge badge-success">Edit</span>
                            </a>
                            <a href="<?= base_url('home/delete/').$d->id_data?>">
                              <span class="badge badge-danger">Delete</span>
                            </a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>        
              </table>
            </div>
                  </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4">

              <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Instructions</h6>
                  </div>
                  <div class="card-body">
                    <p>Untuk menambahkan klik tombol berikut</p>
                    <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#nor">
                      <span class="icon text-white-50">
                          <i class="fas fa-arrow-right"></i>
                      </span>
                      <span class="text">Tambah Data</span>
                    </a>
                    
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <div class="modal fade" id="nor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="user" method="post" action="<?= base_url("home/add");?>">
                <div class="form-group">
                  <label>Nopol</label>
                  <input type="text" class="form-control"  name="nopol">
                </div>
                <div class="form-group">
                  <label>Tahun</label>
                  <input type="text" class="form-control"  name="tahun">
                </div>
                <div class="form-group">
                  <label>Kode Arsip Stnk</label>
                  <input type="text" class="form-control"  name="noka">
                </div>
                <div class="form-group">
                  <label>Kode Arsip BPKB</label>
                  <input type="text" class="form-control"  name="nosin">
                </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary btn-user">Save Data</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="viewscan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">View Data</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="modal-data"></div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Data Scan</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="prodi" method="post" action="<?= base_url("home/update")?>">
              <div class="modal-data"></div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary btn-user">Edit</button>
            </div>
            </form>
          </div>
        </div>
      </div>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#viewscan').on('show.bs.modal', function (e) {
            var userDat = $(e.relatedTarget).data('id');
            /* fungsi AJAX untuk melakukan fetch data */
            $.ajax({
                type : 'post',
                url : '<?= base_url("home/view") ?>',
                /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */
                data :  'iddat='+ userDat,
                /* memanggil fungsi getDetail dan mengirimkannya */
                success : function(data){
                $('.modal-data').html(data);
                /* menampilkan data dalam bentuk dokumen HTML */
                }
            });
         });
        $('#edit').on('show.bs.modal', function (e) {
            var userDat = $(e.relatedTarget).data('id');
            /* fungsi AJAX untuk melakukan fetch data */
            $.ajax({
                type : 'post',
                url : '<?= base_url("home/praedit") ?>',
                /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */
                data :  'iddat='+ userDat,
                /* memanggil fungsi getDetail dan mengirimkannya */
                success : function(data){
                $('.modal-data').html(data);
                /* menampilkan data dalam bentuk dokumen HTML */
                }
            });
         });
    });
  </script>