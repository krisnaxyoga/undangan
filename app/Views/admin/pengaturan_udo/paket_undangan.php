<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
                    
    </div> 
    <p>Data ini ditampilkan di halaman Beranda dan berisi tentang pilihan Paket Undangan yang disedikan.</p>
        

    <div class="row mb-3">   
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-warning">Paket Undangan : <?= $undangan_paket[0]->paket_nama ?></h6>
                </div>
                <div class="card-body">  
                    <div class="form-group mt-2">
                        <label>Nama Paket</label>
                        <input id="paket_nama0" class="form-control" placeholder="Contoh : " value="<?= $undangan_paket[0]->paket_nama ?>" required>
                    </div> 
                    <div class="form-group">
                        <label>Keterangan Paket</label>
                        <textarea id="paket_keterangan0" type="text" class="form-control" placeholder="Contoh : " value="" required><?= $undangan_paket[0]->paket_keterangan ?></textarea>
                    </div> 
                    <div class="form-group">
                        <label>Harga Normal</label>
                        <input id="paket_harga_normal0" type="text" class="form-control" placeholder="Contoh : " value="<?= $undangan_paket[0]->paket_harga_normal ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Diskon</label>
                        <input id="paket_harga_diskon0" type="text" class="form-control" placeholder="Contoh : " value="<?= $undangan_paket[0]->paket_harga_diskon ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Masa Aktif Paket (hari)</label>
                        <input id="paket_limit_waktu0" type="text" class="form-control" placeholder="Contoh : " value="<?= $undangan_paket[0]->paket_limit_waktu ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Biaya Upgrade</label><br>
                        <small>Dibayarkan oleh Pengguna jika ingin pindah ke Paket ini.</small>
                        <input id="paket_biaya_upgrade0" type="text" class="form-control" placeholder="Contoh : " value="<?= $undangan_paket[0]->paket_biaya_upgrade ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Status Paket</label>
                        <select id="paket_status0" class="form-control">
                            <?php
                                if ($undangan_paket[0]->paket_status == "AKTIF"){
                                    ?>
                                        <option value="AKTIF" selected>Aktif</option>
                                        <option value="TIDAK AKTIF">Tidak Aktif</option>
                                    <?php
                                }else{
                                    ?>
                                        <option value="AKTIF" >Aktif</option>
                                        <option value="Tidak AKTIF" selected>Tidak Aktif</option>
                                    <?php
                                }
                            ?>     
                        </select>
                    </div>
                    <?php
                    if ($_SESSION['admin_level']=="Demo"){
                    ?>
                      <button class="btn btn-warning" disabled>Simpan</button>
                    <?php
                    }else{
                    ?>
                    <input id="paket_id0" hidden value="<?= $undangan_paket[0]->paket_id ?>"> 
                    <button class="btn btn-warning" data-toggle="modal" data-target="#modalUndanganPaket0">Simpan</button>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div> 
        <!--Col-->                        
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-success">Paket Undangan : <?= $undangan_paket[1]->paket_nama ?></h6>
                </div>
                <div class="card-body">  
                    <div class="form-group mt-2">
                        <label>Nama Paket</label>
                        <input id="paket_nama1" class="form-control" placeholder="Contoh : " value="<?= $undangan_paket[1]->paket_nama ?>" required>
                    </div> 
                    <div class="form-group">
                        <label>Keterangan Paket</label>
                        <textarea id="paket_keterangan1" type="text" class="form-control" placeholder="Contoh : " value="" required><?= $undangan_paket[1]->paket_keterangan ?></textarea>
                    </div> 
                    <div class="form-group">
                        <label>Harga Normal</label>
                        <input id="paket_harga_normal1" type="text" class="form-control" placeholder="Contoh : " value="<?= $undangan_paket[1]->paket_harga_normal ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Diskon</label>
                        <input id="paket_harga_diskon1" type="text" class="form-control" placeholder="Contoh : " value="<?= $undangan_paket[1]->paket_harga_diskon ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Masa Aktif Paket (hari)</label>
                        <input id="paket_limit_waktu1" type="text" class="form-control" placeholder="Contoh : " value="<?= $undangan_paket[1]->paket_limit_waktu ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Biaya Upgrade</label><br>
                        <small>Dibayarkan oleh Pengguna jika ingin pindah ke Paket ini.</small>
                        <input id="paket_biaya_upgrade1" type="text" class="form-control" placeholder="Contoh : " value="<?= $undangan_paket[1]->paket_biaya_upgrade ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Status Paket</label>
                        <select id="paket_status1" class="form-control">
                            <?php
                                if ($undangan_paket[1]->paket_status == "AKTIF"){
                                    ?>
                                        <option value="AKTIF" selected>Aktif</option>
                                        <option value="TIDAK AKTIF">Tidak Aktif</option>
                                    <?php
                                }else{
                                    ?>
                                        <option value="AKTIF" >Aktif</option>
                                        <option value="Tidak AKTIF" selected>Tidak Aktif</option>
                                    <?php
                                }
                            ?>     
                        </select>
                    </div>
                    <?php
                    if ($_SESSION['admin_level']=="Demo"){
                    ?>
                      <button class="btn btn-success" disabled>Simpan</button>
                    <?php
                    }else{
                    ?>
                    <input id="paket_id1" hidden value="<?= $undangan_paket[1]->paket_id ?>">
                    <button class="btn btn-success" data-toggle="modal" data-target="#modalUndanganPaket1">Simpan</button>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div> 
        <!--Col-->
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-danger">Paket Undangan : <?= $undangan_paket[2]->paket_nama ?></h6>
                </div>
                <div class="card-body">  
                    <div class="form-group mt-2">
                        <label>Nama Paket</label>
                        <input id="paket_nama2" class="form-control" placeholder="Contoh : " value="<?= $undangan_paket[2]->paket_nama ?>" required>
                    </div> 
                    <div class="form-group">
                        <label>Keterangan Paket</label>
                        <textarea id="paket_keterangan2" type="text" class="form-control" placeholder="Contoh : " value="" required><?= $undangan_paket[2]->paket_keterangan ?></textarea>
                    </div> 
                    <div class="form-group">
                        <label>Harga Normal</label>
                        <input id="paket_harga_normal2" type="text" class="form-control" placeholder="Contoh : " value="<?= $undangan_paket[2]->paket_harga_normal ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Diskon</label>
                        <input id="paket_harga_diskon2" type="text" class="form-control" placeholder="Contoh : " value="<?= $undangan_paket[2]->paket_harga_diskon ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Masa Aktif Paket (hari)</label>
                        <input id="paket_limit_waktu2" type="text" class="form-control" placeholder="Contoh : " value="<?= $undangan_paket[2]->paket_limit_waktu ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Biaya Upgrade</label><br>
                        <small>Dibayarkan oleh Pengguna jika ingin pindah ke Paket ini.</small>
                        <input id="paket_biaya_upgrade2" type="text" class="form-control" placeholder="Contoh : " value="<?= $undangan_paket[2]->paket_biaya_upgrade ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Status Paket</label>
                        <select id="paket_status2" class="form-control">
                            <?php
                                if ($undangan_paket[2]->paket_status == "AKTIF"){
                                    ?>
                                        <option value="AKTIF" selected>Aktif</option>
                                        <option value="TIDAK AKTIF">Tidak Aktif</option>
                                    <?php
                                }else{
                                    ?>
                                        <option value="AKTIF" >Aktif</option>
                                        <option value="Tidak AKTIF" selected>Tidak Aktif</option>
                                    <?php
                                }
                            ?>     
                        </select>
                    </div>
                    <?php
                    if ($_SESSION['admin_level']=="Demo"){
                    ?>
                      <button class="btn btn-danger" disabled>Simpan</button>
                    <?php
                    }else{
                    ?>
                    <input id="paket_id2" hidden value="<?= $undangan_paket[2]->paket_id ?>">
                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalUndanganPaket2">Simpan</button>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div> 
        <!--Col-->
    </div> 
    <!--Row-->
</div>
<?php
if ($_SESSION['admin_level']!="Demo"){
?>
<!-- Modal -->
<div class="modal fade" id="modalUndanganPaket0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanUndanganPaket0">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalUndanganPaket1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanUndanganPaket1">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalUndanganPaket2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanUndanganPaket2">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script>  
$('#simpanUndanganPaket0').on('click', function(event) {
  var paket_id = $('#paket_id0').val();
  var paket_nama = $('#paket_nama0').val();
  var paket_keterangan = $('#paket_keterangan0').val();
  var paket_harga_normal = $('#paket_harga_normal0').val();
  var paket_harga_diskon = $('#paket_harga_diskon0').val();
  var paket_limit_waktu = $('#paket_limit_waktu0').val();
  var paket_biaya_upgrade = $('#paket_biaya_upgrade0').val();
  var paket_status = $('#paket_status0').val();
  $.ajax({
      url : "<?= base_url('admin/pengaturan-udo/update-paket-undangan') ?>",
      method : "POST",
      data : {paket_id: paket_id,paket_nama: paket_nama,paket_keterangan: paket_keterangan, paket_harga_normal: paket_harga_normal,paket_harga_diskon: paket_harga_diskon, paket_limit_waktu: paket_limit_waktu, paket_biaya_upgrade: paket_biaya_upgrade, paket_status: paket_status},
      async : true,
      dataType : 'html',
      success: function($hasil){
          if($hasil == 'sukses'){
              location.reload();
          }else{
            alert($hasil);
          }
      }
  }); 
});

$('#simpanUndanganPaket1').on('click', function(event) {
  var paket_id = $('#paket_id1').val();
  var paket_nama = $('#paket_nama1').val();
  var paket_keterangan = $('#paket_keterangan1').val();
  var paket_harga_normal = $('#paket_harga_normal1').val();
  var paket_harga_diskon = $('#paket_harga_diskon1').val();
  var paket_limit_waktu = $('#paket_limit_waktu1').val();
  var paket_biaya_upgrade = $('#paket_biaya_upgrade1').val();
  var paket_status = $('#paket_status1').val();
  $.ajax({
      url : "<?= base_url('admin/pengaturan-udo/update-paket-undangan') ?>",
      method : "POST",
      data : {paket_id: paket_id,paket_nama: paket_nama,paket_keterangan: paket_keterangan, paket_harga_normal: paket_harga_normal,paket_harga_diskon: paket_harga_diskon, paket_limit_waktu: paket_limit_waktu, paket_biaya_upgrade: paket_biaya_upgrade, paket_status: paket_status},
      async : true,
      dataType : 'html',
      success: function($hasil){
          if($hasil == 'sukses'){
              location.reload();
          }else{
            alert($hasil);
          }
      }
  }); 
});
$('#simpanUndanganPaket2').on('click', function(event) {
  var paket_id = $('#paket_id2').val();
  var paket_nama = $('#paket_nama2').val();
  var paket_keterangan = $('#paket_keterangan2').val();
  var paket_harga_normal = $('#paket_harga_normal2').val();
  var paket_harga_diskon = $('#paket_harga_diskon2').val();
  var paket_limit_waktu = $('#paket_limit_waktu2').val();
  var paket_biaya_upgrade = $('#paket_biaya_upgrade2').val();
  var paket_status = $('#paket_status2').val();
  $.ajax({
      url : "<?= base_url('admin/pengaturan-udo/update-paket-undangan') ?>",
      method : "POST",
      data : {paket_id: paket_id,paket_nama: paket_nama,paket_keterangan: paket_keterangan, paket_harga_normal: paket_harga_normal,paket_harga_diskon: paket_harga_diskon, paket_limit_waktu: paket_limit_waktu, paket_biaya_upgrade: paket_biaya_upgrade,paket_status: paket_status},
      async : true,
      dataType : 'html',
      success: function($hasil){
          if($hasil == 'sukses'){
              location.reload();
          }else{
            alert($hasil);
          }
      }
  }); 
});

</script>
<?php
}
?>