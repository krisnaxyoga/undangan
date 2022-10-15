 

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="row mb-3">
        <!-- New User Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Do'a dan Ucapan Hari Ini</div> 
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_users_doa_dan_ucapan_today  ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Do'a dan Ucapan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_users_doa_dan_ucapan ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Invoice Example -->
        <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-warning">
                  <h6 class="m-0 font-weight-bold text-white">Data Do'a dan Ucapan</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="table-warning">
                      <tr>
                        <th>Nama</th>
                        <th>Do'a dan Ucapan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nama</th>
                        <th>Do'a dan Ucapan</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php 
                    foreach($users_doa_dan_ucapan as $users_doa_dan_ucapan_row){ 
                    ?>
                      <tr>
                        <td><?= \esc($users_doa_dan_ucapan_row->doa_dan_ucapan_nama_pengunjung) ?></td>
                        <td><?= \esc($users_doa_dan_ucapan_row->doa_dan_ucapan_isi) ?></td>
                        <td>
                            <button 
                            data-id="<?= $users_doa_dan_ucapan_row->doa_dan_ucapan_id?>" 
                            class="btn btn-sm btn-danger hapus" data-toggle="modal" data-target="#modalHapus">Hapus</button>
                        </td>
                      </tr>

                    <?php } ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
        <!-- Message From Customer-->
       
    </div>
    <!--Row-->
</div>
<!---Container Fluid-->

<!-- Modal -->
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menghapus <b>Do'a dan Ucapan</b> ini ?
        <input type="hidden" name="doa_dan_ucapan_id" id="doa_dan_ucapan_id" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm text-danger" id="hapusBtn">Hapus</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div> 
<script>
     
    $('.hapus').on('click', function (event) { 
        var doa_dan_ucapan_id = $(this).attr('data-id');
        $(".modal-body #doa_dan_ucapan_id").val( doa_dan_ucapan_id );
    });

    $('#hapusBtn').on('click', function(event) {

        var doa_dan_ucapan_id = $('#doa_dan_ucapan_id').val(); 
         
        $.ajax({
            url : "<?php echo base_url('user/hapus_users_doa_dan_ucapan'); ?>",
            method : "POST",
            data : {doa_dan_ucapan_id: doa_dan_ucapan_id}, 
            async : true,
            dataType : 'html',
            success: function($hasil){
               if($hasil == 'sukses'){
                location.reload();
               }else{
                 alert("Gagal Menghapus Doa dan Ucapan");
               }
            }
        }); 
    });

</script>