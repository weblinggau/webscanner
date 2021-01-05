<div class="container-fluid">

          <div class="row">

            <div class="col-lg-7 mb-4">

              <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data</h6>
                  </div>
                  <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div>
                  <form class="user">
                      <div class="form-group">
                        <label>Nopol</label>
                        <input type="text" class="form-control"  name="nopol" value="<?= $scan->nopol; ?>">
                      </div>
                      <?php 
                        if ($rule == 'arsip1') {
                          $files = $scan->arsip1;
                        }elseif ($rule == 'arsip2') {
                          $files = $scan->arsip2;
                        }elseif ($rule == 'arsip3') {
                          $files = $scan->arsip3;
                        }else{
                          //sss
                        }
                       ?>
                      <a href="<?= 'ddescanner:'.base64_encode('?id='.$scan->id_data.'&arsip='.$rule.'&file='.$files.'|ANYSimplexJPG|Color|150|Auto') ?>" class="btn btn-warning" type="button" data-dismiss="modal">Scan Doc</a>
                      <a href="<?= base_url('home'); ?>" class="btn btn-success" type="button" data-dismiss="modal">Save</a>
                  </form>
            </div>
                  </div>
                </div>
            </div>

            <div class="col-lg-5 mb-4">

              <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Image Source</h6>
                  </div>
                  <div class="card-body">
                    <a href="ddescanner:changescanner" class="btn btn-success" type="button" data-dismiss="modal">Setting Scan</a>
                     
                    <div class="image">

                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
  <script type="text/javascript">
    $(document).ready(function(){
      setInterval(function(){ 
        $.ajax({
            type : 'get',
            url : '<?= base_url("home/image/").$scan->id_data.'/'.$rule ?>',
              success : function(data){
                $('.image').html(data);
                /* menampilkan data dalam bentuk dokumen HTML */
              }
        }); 
      }, 3000);
    });
  </script>