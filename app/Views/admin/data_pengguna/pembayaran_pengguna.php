

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

        <!-- Invoice Example -->
        <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                  <h6 class="m-0 font-weight-bold text-light">Data Pembayaran Pengguna</h6>
                </div>
                <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id='dataTable'>
                    <thead class="thead-light">
                      <tr>
                        <th>Tanggal Daftar</th>
                        <th>No Invoice</th>
                        <th>Pengguna</th>
                        <th>Domain</th>
                        <th>Paket</th>
                        <th>Total Tagihan</th>
                        <th>Status Pembayaran</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php 
                    foreach($join as $row){  
                    ?> 
                      <tr>
                        <td><?= date("d-m-Y H:i A", strtotime($row->users_order_created_at)) ?></td>
                        <td>#<?= $row->users_order_pembayaran_invoice ?></td>
                        <td><?= $row->users_email ?></td>
                        <td><a href="<?= SITE_UNDANGAN.'/'.$row->users_order_domain ?>" target="_BLANK" ><?= $row->users_order_domain ?></a></td>
                        <td><?= $row->undangan_paket_paket_nama ?></td>
                        <td><?= rupiah($row->users_order_pembayaran_biaya_paket_saat_itu) ?></td>
                        <?php if($row->users_order_pembayaran_status == '4'){ ?>    
                        <td><span class="badge badge-info">Masa Aktif Habis</span></td>
                        <?php }else if($row->users_order_pembayaran_status == '3'){ ?>    
                        <td><span class="badge badge-dark">Di Non-Aktifkan</span></td>  
                        <?php }else if($row->users_order_pembayaran_status == '2'){ ?>    
                        <td><span class="badge badge-success">Aktif dan Lunas</span></td> 
                        <?php }else if($row->users_order_pembayaran_status == '1'){ ?>    
                        <td><span class="badge badge-warning">Menunggu Konfirmasi Admin</span></td>
                        <?php }else{ ?>    
                        <td><span class="badge badge-danger">Menunggu Pembayaran</span></td>
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
                                  >Konfirmasi & Aktifkan</a>
                                  <a href="#" class="dropdown-item konfirmasiBATALBtn"
                                  >BATAL Konfirmasi & Non-Aktifkan</a>
                                  <?php
                                }else{
                                  ?>
                                  <a href="#" class="dropdown-item" 
                                  data-nama="<?= $row->users_order_pembayaran_nama_lengkap ?>"
                                  data-bank="<?= $row->users_order_pembayaran_nama_bank ?>"
                                  data-invoice="<?= $row->users_order_pembayaran_invoice ?>"
                                  data-toggle="modal" 
                                  data-target="#modalData">Lihat</a>
                                  <a href="#" class="dropdown-item konfirmasiBtn" 
                                  data-id="<?= $row->users_id ?>"
                                  data-toggle="modal" 
                                  data-target="#modalKonfirmasi">Konfirmasi & Aktifkan</a>
                                  <a href="#" class="dropdown-item konfirmasiBATALBtn" 
                                  data-id="<?= $row->users_id ?>"
                                  data-toggle="modal" 
                                  data-target="#modalKonfirmasiBATAL">BATAL Konfirmasi & Non-Aktifkan</a>
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
        Apakah kamu yakin ingin mengkonfirmasi pengguna ini ?
        <input type="hidden" value="" id="iduser">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="konfirmasi">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalKonfirmasiBATAL" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin MEMBATALKAN Konfirmasi pengguna ini ?
        <input type="hidden" value="" id="iduser_BATAL">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="konfirmasiBATAL">Ya</button>
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

    $('.konfirmasiBtn').on('click', function (event) {
        var id = $(this).data('id');
        $(".modal-body #iduser").val( id );
    });
    $('#konfirmasi').on('click', function(event) {

        var id = $('#iduser').val();

        $.ajax({
            url : "<?= base_url('admin/data-pengguna/pembayaran-pengguna/konfirmasi') ?>",
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'html',
            success: function($hasil){
               if($hasil == 'sukses'){
                location.reload();
               }
            }
        });
    });

    $('.konfirmasiBATALBtn').on('click', function (event) {
        var id = $(this).data('id');
        $(".modal-body #iduser_BATAL").val( id );
    });
    $('#konfirmasiBATAL').on('click', function(event) {

        var id = $('#iduser_BATAL').val();

        $.ajax({
            url : "<?= base_url('admin/data-pengguna/pembayaran-pengguna/konfirmasi-batal') ?>",
            method : "POST",
            data : {id: id},
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