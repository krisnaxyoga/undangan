<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div> 

    <div class="row mb-12">   
        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Restore Wesbite</h6>
                </div>
                <div class="card-body"> 
                    <p>Restore database bermaksud untuk melakukan pembersihan data sehingga kembali ke defaultnya. Hal yang dilakukan saat Restore ialah sebagai berikut:
                        <ul style="list-style-type: decimal;">
                            <li>
                                Menghapus semua akun Admin dan membuat satu akun admin default :
                                <ul>
                                    <li>Username : adm1ku2@gmail.com</li>
                                    <li>Password : s#eCM.s/s</li>
                                </ul>
                            </li>
                            <li>
                                Menghapus semua akun Pengguna yang pernah membeli jasa UDO diwebsite ini dan membuat satu akun demo default :
                                <ul>
                                    <li>Username : demo12admin@gmail.com</li>
                                    <li>Password : de4Amc,s</li>
                                </ul>
                            </li>
                            <li>
                                Ketika akun Pengguna dihapus, maka data pengguna lainnya juga dihapus seperti :
                                <ul>
                                    <li>Acara</li>
                                    <li>Album Foto</li>
                                    <li>Album Video</li>
                                    <li>Cerita</li>
                                    <li>Doa dan Ucapan</li>
                                    <li>Mempelai</li>
                                    <li>Catatan Order dan Pembayaran</li>
                                    <li>Catatan Upgrade Pengguna</li>
                                    <li>History Pengunjung Undangan</li>
                                    <li>Testimoni</li>
                                    <li>Catatan Pengaturan Pengguna dan Fitur yang digunakannya.</li>
                                </ul>
                            </li>
                            <li> 
                                Pengaturan Informasi Website akan kembali ke default seperti:
                                <ul>
                                    <li>Judul Website</li> 
                                    <li>Tagline Website</li>
                                    <li>Deskripsi Website</li>
                                    <li>Kata Kunci</li>
                                    <li>Nama Pemilik Website</li>  
                                    <li>Logo Usaha (Favicon Website, Logo Website, Brand Utama, Brand Login) </li>
                                    <li>Media Sosial Share ( Id Fans Page Facebook, Facebook Domain Verifikasi, Judul Postingan Media Sosial, Deskripsi Postingan Media Sosial)</li>
                                
                                </ul>
                            </li>
                            <li> Pengaturan Fitur kembali ke default:
                              <ul>
                                <li>Google Recaptcha Di Non-Aktifkan </li>
                                <li>Tema Website kembali ke tema 'Happy' </li>
                                <li>Tombol Ganti Tema Website di Halaman Beranda di Non-Aktifkan</li>
                              </ul>
                            </li>
                            <li>
                                Semua data Bank Admin akan dihapus dan dibuat satu data bank demo.
                            </li>
                            <li>
                                Semua pilihan Paket UDO akan dihapus dan dibuat data pilihan Paket UDO default.
                            </li>

                        </ul>
                    </p> 
                    <?php
                    if ($_SESSION['admin_level']=="Demo"){
                    ?>
                    <button class="btn btn-primary" disabled>Restore Database</button>
                    <?php
                    }else{
                    ?>
                    <input id="admin_id" hidden value="<?= $_SESSION['uname_admin'] ?>">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalRestoreDatabase">Restore Database</button>
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
<div class="modal fade" id="modalRestoreDatabase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin Restore Database ? Klik Ya dan tunggu. <br/>
        Proses akan membutuhkan waktu sejenak sekitar 20 detik, biarkan layar refresh/tertutup sendiri sebagai tanda proses selesai.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanRestoreDatabase">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script>  
$('#simpanRestoreDatabase').on('click', function(event) {
    var admin_id = $('#admin_id').val();
  $.ajax({
      url : "<?= base_url('admin/pengaturan-website/database-restore') ?>",
      method : "POST",
      data : {admin_id: admin_id},
      async : true,
      dataType : 'html',
      success: function($hasil){ 
          if($hasil == 'sukses'){
            alert($hasil);
            location.reload();
          }else{
            alert($hasil);
            location.reload();
          }  
      }
  }); 
});
</script>
<?php
}
?>