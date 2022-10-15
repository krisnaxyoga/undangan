

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

        <!-- Invoice Example -->
        <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                  <h6 class="m-0 font-weight-bold text-light">Permintaan Upgrade Paket</h6>
                </div>
                <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id='dataTable'>
                    <thead class="thead-light">
                      <tr>
                        <th>Tanggal</th>
                        <!--<th>No Invoice</th>-->
                        <th>Pengguna</th>
                        <th>Domain</th> 
                        <th>Paket Upgrade</th>
                        <th>Biaya Saat Pengajuan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php 
                    foreach($data_users_upgrade_paket as $row){ 
                
                    ?>

                      <tr>
                        <td><?= $row->created_at ?></td>
                        <!--<td>#<?= $row->upgrade_paket_invoice ?></td>-->
                        <td><?= $row->username ?></td>
                        <td><a href="<?= SITE_UNDANGAN.'/'.$row->domain ?>"><?= $row->domain ?></a></td>
                        <td><?= $row->paket_nama ?></td>
                        <td>Rp <?= number_format($row->upgrade_paket_biaya_saat_itu,0,",",".") ?></td>
                        <?php if($row->upgrade_paket_status_konfirmasi == 'BELUM'){ ?> 

                        <td><span class="badge badge-warning">Menunggu Konfirmasi</span></td>
                        <?php }else if($row->upgrade_paket_status_konfirmasi == 'SUDAH'){ ?>    
                        <td><span class="badge badge-success">Sudah Konfirmasi Admin</span></td> 
                        <?php } ?>

                        <td><div class="btn-group mb-1">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Aksi
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                <?php
                                if ($_SESSION['admin_level']=="Demo"){
                                  ?>
                                  <a href="#" class="dropdown-item"
                                  >Lihat</a>
                                  <a href="#" class="dropdown-item konfirmasiBtn" 
                                  >Konfirmasi</a>
                                  <a href="#" class="dropdown-item batalkonfirmasiBtn"
                                  >Batal Konfirmasi</a>
                                  <?php
                                }else{
                                  ?>
                                <a href="#" class="dropdown-item" 
                                data-nama="<?= $row->upgrade_paket_nama_lengkap ?>"
                                data-bank="<?= $row->upgrade_paket_nama_bank ?>"
                                data-invoice="<?= $row->upgrade_paket_invoice ?>"
                                data-toggle="modal" 
                                data-target="#modalData">Lihat</a>
                                <a href="#" class="dropdown-item konfirmasiBtn" 
                                data-id="<?= $row->upgrade_paket_id ?>_<?= $row->upgrade_paket_paket_diajukan ?>_<?= $row->upgrade_paket_id_user ?>"
                                data-toggle="modal" 
                                data-target="#modalKonfirmasi">Konfirmasi</a>
                                <a href="#" class="dropdown-item batalkonfirmasiBtn" 
                                data-id="<?= $row->upgrade_paket_id ?>_<?= $row->upgrade_paket_paket_sebelumnya ?>_<?= $row->upgrade_paket_id_user ?>"
                                data-toggle="modal" 
                                data-target="#modalBatalKonfirmasi">Batal Konfirmasi</a>
                                <?php
                                }
                                ?>
                            </div></td>
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
<div class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin mengkonfirmasi Upgrade Paket pengguna ini ?
        <input type="hidden" value="" id="paket_id_id_users">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="konfirmasi">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalBatalKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin BATAL mengkonfirmasi Upgrade Paket pengguna ini ?
        <input type="hidden" value="" id="paket_id_batal_id_users">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="batalkonfirmasi">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col mt-2">
            <label>Nama Sesuai di Bank</label>
            <input id="nama_lengkap" type="text" class="form-control" placeholder="Contoh : Khairul Fikri" value="" required>
        </div>
        <div class="col mt-2">
            <label>Nama Bank</label>
            <input id="nama_bank" type="text" class="form-control" placeholder="Contoh : BRI" value="" required>
        </div>        
        <div class="col mt-2 mb-2">
            <label>Bukti Transfer</label><br>
            <img id="bukti" src="" height="250px">
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<?php
if ($_SESSION['admin_level']!="Demo"){
?>
<script>

    //triggered when modal is about to be shown
    $('#modalData').on('show.bs.modal', function(e) {
        var nama = $(e.relatedTarget).data('nama');
        var bank = $(e.relatedTarget).data('bank');
        var invoice = $(e.relatedTarget).data('invoice');
        $('#nama_lengkap').val(nama);
        $('#nama_bank').val(bank);
        $('#bukti').attr('src','<?= base_url() ?>/assets/bukti/'+invoice+'.png');
    });

    //KONFIRMASI
    $('.konfirmasiBtn').on('click', function (event) {
        var id = $(this).data('id');
        $(".modal-body #paket_id_id_users").val( id );
    });
    $('#konfirmasi').on('click', function(event) {
        var paket_id_id_users = $('#paket_id_id_users').val();
        $.ajax({
            url : "<?= base_url('admin/data-pengguna/permintaan-upgrade-paket/konfirmasi') ?>",
            method : "POST",
            data : {paket_id_id_users: paket_id_id_users},
            async : true,
            dataType : 'html',
            success: function($hasil){
               if($hasil == 'sukses'){
                location.reload();
               }
            }
        });
    });

    //BATAL KONFIRMASI
    $('.batalkonfirmasiBtn').on('click', function (event) {
        var id = $(this).data('id');
        $(".modal-body #paket_id_batal_id_users").val( id );
    });
    $('#batalkonfirmasi').on('click', function(event) {
        var paket_id_batal_id_users = $('#paket_id_batal_id_users').val();
        $.ajax({
            url : "<?= base_url('admin/data-pengguna/permintaan-upgrade-paket/batal-konfirmasi') ?>",
            method : "POST",
            data : {paket_id_batal_id_users: paket_id_batal_id_users},
            async : true,
            dataType : 'html',
            success: function($hasil){
               if($hasil == 'sukses'){
                location.reload();
               }
            }
        });
    });

</script>
<?php
}
?>