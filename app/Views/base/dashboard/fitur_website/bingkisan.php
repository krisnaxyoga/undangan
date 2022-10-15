 

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1> 
    </div>
    <p>Silahakan dibuat data bank Anda yang berguna sebagai media tampung kiriman Bingkisan Hadiah dari Tamu Undangan</p>
    
    <div class="row mb-3">   
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <?php
                  if (!isset($data_bank_pengguna)){
                    ?>
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Bank Baru</h6>
                    <?php
                  }else{
                    ?>
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Data Bank </h6>
                    <?php
                  }
                  ?>
                  
                </div>
                <div class="card-body"> 
                <?php
                  /*if (isset($data_bank_pengguna)){
                    ?>
                    <form method="post" action="<?php echo base_url('user/fitur/website/bingkisan/ubah-data-bank-simpan'); ?>">
                <?php
                  }else{
                    ?>
                    <form method="post" action="<?php echo base_url('user/fitur/website/bingkisan/tambah-data-bank'); ?>">
                    <?php
                  }*/
                ?>    
                    <p>Data bank ini akan ditampilkan pada halaman Undangan yang dibagikan ke Tamu Undangan</p>
                    <div class="form-group mt-2">
                        <label>Jenis Bank</label>
                        <input id="bank_nama" class="form-control" placeholder="Contoh : Bank Muamalat/GO-PAY/Shopee" value="<?= $data_bank_pengguna[0]->bank_nama ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Kode Bank<sup>(opsional)</sup></label>
                        <input id="bank_kode" type="text" class="form-control" placeholder="Contoh : 147" value="<?= $data_bank_pengguna[0]->bank_kode ?>" required>
                    </div>
 
                    <div class="form-group">
                        <label>Nama Pemilik Bank</label>
                        <input id="bank_nama_pemilik" type="text" class="form-control" placeholder="Contoh : Khairul Fikri" value="<?= $data_bank_pengguna[0]->bank_nama_pemilik ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Nomor Rekening</label>
                        <input id="bank_nomor_rekening" type="text" class="form-control" placeholder="Contoh : 111-111-111/No Go-Pay/Shopee" value="<?= $data_bank_pengguna[0]->bank_nomor_rekening ?>" required>
                    </div>

                    <?php
                    if (isset($data_bank_pengguna)){
                    ?> 
                      <input id="bank_id" hidden value="<?= $data_bank_pengguna[0]->bank_id ?>">
                      <button class="btn btn-success" data-toggle="modal" id="UbahDataBankSimpan">Simpan Perubahan</button>
                    <?php
                    }else{
                      ?>
                      
                      <button class="btn btn-primary" data-toggle="modal" id="TambahDataBank">Tambah</button>
                      <?php
                    }
                    ?>
                    </form>
                </div>
            </div>
        </div> 
        <!--Col-->
    </div> 
    <!--Row-->

    <div class="row mb-3">
         


        <!-- Invoice Example -->
        <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-warning">
                  <h6 class="m-0 font-weight-bold text-white">Data Bank Anda</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="table-warning">
                      <tr>
                        <th>Jenis Bank</th>
                        <th>Kode Bank</th>
                        <th>Nama Pemilik</th>
                        <th>Nomor Rekening</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Jenis Bank</th>
                        <th>Kode Bank</th>
                        <th>Nama Pemilik</th>
                        <th>Nomor Rekening</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php 
                    foreach($daftar_bank_pengguna as $row_daftar_bank_pengguna){ 
                    ?>
                      <tr>
                        <td><?= \esc($row_daftar_bank_pengguna->bank_nama) ?></td>
                        <td><?= \esc($row_daftar_bank_pengguna->bank_kode) ?></td>
                        <td><?= \esc($row_daftar_bank_pengguna->bank_nama_pemilik) ?></td>
                        <td><?= \esc($row_daftar_bank_pengguna->bank_nomor_rekening) ?></td>
                        <td>
                            <form method="post" action="<?php echo base_url('user/fitur/website/bingkisan/ubah-data-bank'); ?>">
                              <input type="hidden" value="<?= $row_daftar_bank_pengguna->bank_id ?>" name="tabel_bank_id">
                              <button 
                              class="btn btn-sm btn-success" type="submit">Ubah</button>
                            </form>
                            <button 
                            data-id="<?= $row_daftar_bank_pengguna->bank_id?>" 
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
        Apakah kamu yakin ingin menghapus <b>Data Bank</b> ini ?
        <input type="hidden" name="tabel_bank_id" id="tabel_bank_id" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm text-danger" id="hapusBtn">Hapus</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div> 
<script>
$('#TambahDataBank').on('click', function(event) {
  var bank_id = $('#bank_id').val(); 
  var bank_nama = $('#bank_nama').val();
  var bank_kode = $('#bank_kode').val(); 
  var bank_nama_pemilik = $('#bank_nama_pemilik').val();
  var bank_nomor_rekening = $('#bank_nomor_rekening').val();
  $.ajax({
      url : "<?= base_url('user/fitur/website/bingkisan/tambah-data-bank') ?>",
      method : "POST",
      data : {bank_id: bank_id, bank_nama: bank_nama, bank_kode: bank_kode, bank_nama_pemilik: bank_nama_pemilik, bank_nomor_rekening: bank_nomor_rekening },
      async : true,
      dataType : 'html',
      success: function($hasil){
          if($hasil == 'sukses'){
            alert($hasil);
            window.location.replace("<?= base_url('user/fitur/website/bingkisan') ?>");
          }else{
            alert($hasil);
          }
      }
  }); 
});   
$('#UbahDataBankSimpan').on('click', function(event) {
  var bank_id = $('#bank_id').val(); 
  var bank_nama = $('#bank_nama').val();
  var bank_kode = $('#bank_kode').val(); 
  var bank_nama_pemilik = $('#bank_nama_pemilik').val();
  var bank_nomor_rekening = $('#bank_nomor_rekening').val();
  $.ajax({
      url : "<?= base_url('user/fitur/website/bingkisan/ubah-data-bank-simpan') ?>",
      method : "POST",
      data : {bank_id: bank_id, bank_nama: bank_nama, bank_kode: bank_kode, bank_nama_pemilik: bank_nama_pemilik, bank_nomor_rekening: bank_nomor_rekening },
      async : true,
      dataType : 'html',
      success: function($hasil){
          if($hasil == 'sukses'){
            alert($hasil);
            window.location.replace("<?= base_url('user/fitur/website/bingkisan') ?>");
          }else{
            alert($hasil);
          }
      }
  }); 
});  
     
    $('.hapus').on('click', function (event) { 
        var bank_id = $(this).attr('data-id');
        $(".modal-body #tabel_bank_id").val( bank_id );
    });
    $('#hapusBtn').on('click', function(event) {

        var tabel_bank_id = $('#tabel_bank_id').val(); 
         
        $.ajax({
            url : "<?php echo base_url('user/fitur/website/bingkisan/hapus-data-bank'); ?>",
            method : "POST",
            data : {bank_id: tabel_bank_id}, 
            async : true,
            dataType : 'html',
            success: function($hasil){
               if($hasil == 'sukses'){
                location.reload();
               }else{
                 alert("Gagal Menghapus Data Bank Anda");
               }
            }
        }); 
    });

</script>