<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div> 

    <div class="row mb-3">   
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Bank Admin</h6>
                </div>
                <div class="card-body"> 
                    <p>Data bank ini akan ditampilkan pada halaman pengunjung ketika hendak membayar biaya jasa Undangan Digital Online.</p>
                    <div class="form-group mt-2">
                        <label>Nama Bank</label>
                        <input id="bank_nama" class="form-control" placeholder="Contoh : Bank BCA" value="<?= $undangan_bank[0]->bank_nama ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Nomor Rekening</label>
                        <input id="bank_nomor_rekening" type="text" class="form-control" placeholder="Contoh : 1635713513" value="<?= $undangan_bank[0]->bank_nomor_rekening ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Nama Pemilik Bank</label>
                        <input id="bank_nama_pemilik" type="text" class="form-control" placeholder="Contoh : Adinda Larasati" value="<?= $undangan_bank[0]->bank_nama_pemilik ?>" required>
                    </div>
                    <?php
                    if ($_SESSION['admin_level']=="Demo"){
                    ?>
                    <button class="btn btn-primary" disabled>Simpan</button>
                    <?php
                    }else{
                    ?>
                    <input id="bank_id" hidden value="<?= $undangan_bank[0]->bank_id ?>">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalBankAdmin">Simpan</button>
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
<div class="modal fade" id="modalBankAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button type="button" class="btn btn-sm btn-primary" id="simpanBankAdmin">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script>  
$('#simpanBankAdmin').on('click', function(event) {
  var bank_id = $('#bank_id').val();
  var bank_nama = $('#bank_nama').val();
  var bank_nomor_rekening = $('#bank_nomor_rekening').val();
  var bank_nama_pemilik = $('#bank_nama_pemilik').val();
  $.ajax({
      url : "<?= base_url('admin/update-pengaturan-website-bank-admin') ?>",
      method : "POST",
      data : {bank_id: bank_id,bank_nama: bank_nama, bank_nomor_rekening: bank_nomor_rekening,bank_nama_pemilik:bank_nama_pemilik},
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