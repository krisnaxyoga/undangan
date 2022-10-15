<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div> 

    <div class="row mb-3"> 
        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Informasi Umum</h6>
                </div> 
                <div class="card-body"> 
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                        <label>Judul Website</label>  
                        <input type="text" class="form-control" name="JudulWebsite" id="JudulWebsite" value="<?= $website_umum[0]->website_isi ?>"></input> 
                        <small class="text-warning"></small>
                    </div>  
                  </div> 
                  <!--Satu Kotak-->
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                        <label>Tagline Website</label>  
                        <input type="text" class="form-control" name="TaglineWebsite" id="TaglineWebsite" value="<?= $website_umum[1]->website_isi ?>"></input> 
                        <small class="text-warning"></small>
                    </div>  
                  </div> 
                  <!--Satu Kotak--> 
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                        <label>Deskripsi Website</label>  
                        <textarea type="text" class="form-control" name="DeskripsiWebsite" id="DeskripsiWebsite" ><?= $website_umum[2]->website_isi ?></textarea> 
                        <small class="text-warning"></small>
                    </div>  
                  </div> 
                  <!--Satu Kotak--> 
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                        <label>Kata Kunci</label>  
                        <textarea type="text" class="form-control" name="KataKunci" id="KataKunci" ><?= $website_umum[3]->website_isi ?></textarea> 
                        <small class="text-warning"></small>
                    </div>  
                  </div> 
                  <!--Satu Kotak-->
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                        <label>Nama Pemilik Website</label>  
                        <input type="text" class="form-control" name="NamaPemilikWebsite" id="NamaPemilikWebsite" value="<?= $website_umum[4]->website_isi ?>"></input> 
                        <small class="text-warning"></small>
                    </div>  
                  </div> 
                  <!--Satu Kotak--> 
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                        <label>Credits : Tahun Mulai</label>  
                        <input type="text" class="form-control" name="CreditsTahunMulai" id="CreditsTahunMulai" value="<?= $website_umum[13]->website_isi ?>"></input> 
                        <small class="text-warning"></small>
                    </div>  
                  </div> 
                  <!--Satu Kotak-->
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                        <label>Credits : Keterangan</label>  
                        <textarea type="text" class="form-control" name="CreditsKeterangan" id="CreditsKeterangan"><?= $website_umum[14]->website_isi ?></textarea> 
                        <small class="text-warning"></small>
                    </div>  
                  </div> 
                  <!--Satu Kotak-->
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                    <?php
                    if ($_SESSION['admin_level']=="Demo"){
                      ?>
                      <button class="btn btn-primary" disabled>Simpan</button>
                      <?php
                    }else{
                      ?>
                      <button class="btn btn-primary" data-toggle="modal" data-target="#modalInformasiUmum">Simpan</button>
                      <?php
                    }
                    ?>    
                    
                    </div>  
                  </div> 
                  <!--Satu Kotak--> 
                </div>
            </div>
        </div>  
    </div>
    <!--Row-->

    <div class="row mb-3"> 
        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tema Website</h6>
                  
                </div> 
                
                <div class="card-body">
                <p>Tema Website berbeda dengan tema Undangan. Tema Website merupakan tampilan halaman beranda dan dashboard admin serta pengguna. </p> 
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                        <label>Pilihan Tema</label>  
                        <?php 
                        $ambilListTemaWebsite = $website_umum[17]->website_isi;
                        $variabelListTemaWebsite = explode ("," , $ambilListTemaWebsite);
                        $jumlahTemaWebsite = count($variabelListTemaWebsite);
                        ?>
                        <select class="form-control" name="TemaWebsite" id="TemaWebsite">
                        <?php
                        for ($a=0; $a < $jumlahTemaWebsite; $a++){
                          ?>
                          <option value="<?= $variabelListTemaWebsite[$a] ?>" <?php if ($website_umum[15]->website_isi == $variabelListTemaWebsite[$a]){ echo "selected";} ?> ><?= $variabelListTemaWebsite[$a] ?></option>
                          <?php
                        }
                        ?>
                        </select>
                        <small class="text-warning"></small>
                    </div>  
                  </div> 
                  <!--Satu Kotak--> 
                  <div class="row align-items-center form-group">
                    <div class="col mr-2"> 
                        <label>Tombol Ganti Tema Website di Homepage</label>  
                        
                        <select class="form-control" name="TemaWebsiteTomboldiHome" id="TemaWebsiteTomboldiHome">
                          <option value="Aktif" <?php if ($website_umum[16]->website_isi == "Aktif"){ echo "selected";} ?> >Aktifkan</option>
                          <option value="Tidak Aktif" <?php if ($website_umum[16]->website_isi == "Tidak Aktif"){ echo "selected";} ?> >Tidak Aktif</option> 
                        </select>
                        <small class="text-warning"></small>
                    </div>  
                  </div> 
                  <!--Satu Kotak-->
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                    <?php
                    if ($_SESSION['admin_level']=="Demo"){
                      ?>
                      <button class="btn btn-primary" disabled>Simpan</button>
                      <?php
                    }else{
                      ?>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalTemaWebsite">Simpan</button>
                    <?php
                    }
                    ?>
                  </div>  
                  </div> 
                  <!--Satu Kotak--> 
                </div>
            </div>
        </div>  
    </div>
    <!--Row-->

    <div class="row mb-3"> 
        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Google Recaptcha</h6>
                  
                </div> 
                
                <div class="card-body">
                <p>Captcha ini berada di halaman Undangan bagian Do'a dan Ucapan. Tamu undangan akan melewati Captcha dahulu sebelum mengirim Do'a atau ucapan selamat. Aktifkan fitur ini untuk menghindari Spam. </p> 
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                        <label>Status Recaptcha</label>  
                        <select class="form-control" name="RecaptchaStatus" id="RecaptchaStatus">
                          <?php
                          if ($website_umum[19]->website_isi == "Aktif"){
                            ?>
                            <option value="Aktif" selected>Aktif</option>
                            <option value="Tidak Aktif" >Tidak Aktif</option>
                            <?php
                          }else{
                            ?>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif" selected>Tidak Aktif</option>
                            <?php
                          }
                          ?>
                           
                        </select>
                        <small class="text-warning"></small>
                    </div>  
                  </div> 
                  <!--Satu Kotak-->
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                        <label>Recaptcha data-sitekey</label>  
                        <input type="text" class="form-control" name="Recaptchadatasitekey" id="Recaptchadatasitekey" value="<?= $website_umum[20]->website_isi ?>"></input> 
                        <small class="text-warning"></small>
                    </div>  
                  </div> 
                  <!--Satu Kotak--> 
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                        <label>Recaptcha secret_key</label>  
                        <textarea type="text" class="form-control" name="Recaptchasecretkey" id="Recaptchasecretkey" ><?= $website_umum[21]->website_isi ?></textarea> 
                        <small class="text-warning"></small>
                    </div>  
                  </div> 
                  <!--Satu Kotak--> 
                   
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                    <?php
                    if ($_SESSION['admin_level']=="Demo"){
                      ?>
                      <button class="btn btn-primary" disabled>Simpan</button>
                      <?php
                    }else{
                      ?>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalGoogleRecaptcha">Simpan</button>
                    <?php
                    }
                    ?>
                    </div>  
                  </div> 
                  <!--Satu Kotak--> 
                </div>
            </div>
        </div>  
    </div>
    <!--Row-->
    
    <div class="row mb-3"> 
        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Logo Usaha</h6>
                </div> 
                <div class="card-body"> 
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                        <label>Favicon Website</label>
                        <?php
                        if ($_SESSION['admin_level']=="Demo"){
                          ?>
                          <input type="file" class="form-control" disabled></input> 
                          <?php
                        }else{
                          ?>  
                          <input type="file" class="form-control" name="file_favicon" id="file_favicon"></input> 
                        <?php
                        }
                        ?>
                        <small class="text-warning">Favicon Website adalah gambar yang merupakan logo Anda.Digunakan untuk icon (Favicon) website. Ukuran disarankan yaitu Lebar = 352px dan Tinggi = 352px.</small>
                    </div> 
                    <div class="col-auto row align-items-center"> 
                        <span id="file_favicon_status">
                            <img src="<?= base_url('/assets/base/img/favicon.ico') ?>" class="rounded bg-light" style="height: 50px;width: 50px;"></img>
                        </span>  
                    </div>
                  </div> 
                  <!--Satu Kotak--> 
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                        <label>Logo Website</label> 
                        <?php
                        if ($_SESSION['admin_level']=="Demo"){
                          ?>
                          <input type="file" class="form-control" disabled></input> 
                          <?php
                        }else{
                          ?> 
                          <input type="file" class="form-control" name="file_favicon" id="file_logo"></input> 
                        <?php
                        }
                        ?>
                        <small class="text-warning">Logo Website adalah gambar yang merupakan logo Anda.Digunakan untuk icon brand sidebar. Ukuran disarankan yaitu Lebar = 352px dan Tinggi = 352px.</small>
                    </div> 
                    <div class="col-auto row align-items-center"> 
                        <span id="file_logo_status">
                            <img src="<?= base_url('/assets/base/img/logo.png') ?>" class="rounded bg-light" style="height: 50px;width: 50px;"></img>
                        </span>  
                    </div>
                  </div> 
                  <!--Satu Kotak--> 
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                        <label>Brand Utama</label>  
                        <?php
                        if ($_SESSION['admin_level']=="Demo"){
                          ?>
                          <input type="file" class="form-control" disabled></input> 
                          <?php
                        }else{
                          ?>
                        <input type="file" class="form-control" name="file_brand_utama" id="file_brand_utama"></input> 
                        <?php
                        }
                        ?>
                        <small class="text-warning">Brand ini adalah gambar yang merupakan logo dan tambah konten lain dengan ukuran width=486px dan height=153px. Digunakan seluruh halaman wesbite kecuali halaman login pelanggan.</small>
                    </div> 
                    <div class="col-auto row align-items-center"> 
                        <span id="file_brand_utama_status">
                            <img src="<?= base_url('/assets/base/img/logo-home.png') ?>" class="rounded bg-light" style="height: 50px;width: 158px;"></img>
                        </span>  
                    </div>
                  </div> 
                  <!--Satu Kotak--> 
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                        <label>Brand Login</label> 
                        <?php
                        if ($_SESSION['admin_level']=="Demo"){
                          ?>
                          <input type="file" class="form-control" disabled></input> 
                          <?php
                        }else{
                          ?> 
                        <input type="file" class="form-control" name="file_brand_login" id="file_brand_login"></input> 
                        <?php
                        }
                        ?>
                        <small class="text-warning">Brand ini adalah gambar yang merupakan logo dan tambah konten lain dengan ukuran width=486px dan height=153px. Digunakan khusus di halaman login pelanggan.</small>
                    </div> 
                    <div class="col-auto row align-items-center"> 
                        <span id="file_brand_login_status">
                            <img src="<?= base_url('/assets/base/img/logo-login.png') ?>" class="rounded bg-light" style="height: 50px;width: 158px;"></img>
                        </span>  
                    </div>
                  </div> 
                  <!--Satu Kotak--> 
                </div>
            </div>
        </div> 

        
 
         
    </div>
    <!--Row-->

    <div class="row mb-3"> 
        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Media Sosial Share</h6>
                </div> 
                <div class="card-body"> 
                <div class="row align-items-center form-group">
                    <div class="col mr-2">
                        <label>Gambar/Thumbnails</label>  
                        <?php
                        if ($_SESSION['admin_level']=="Demo"){
                          ?>
                          <input type="file" class="form-control" disabled></input> 
                          <?php
                        }else{
                          ?> 
                        <input type="file" class="form-control" name="FBShareGambar" id="FBShareGambar"></input> 
                        <?php
                        }
                        ?>
                        <small class="text-warning">Gambar ini akan muncul di media sosial saat berbagi seperti postingan di Facebook umumnya. Ukuran standar yaitu lebar = 851px dan tinggi = 315px.</small>
                    </div> 
                    <div class="col-auto row align-items-center"> 
                        <span id="file_FBShareGambar_status">
                            <img src="<?= base_url('/assets/base/img/thumbnails.png') ?>" class="rounded bg-light" style="height: 89px;width: 241px;"></img>
                        </span>  
                    </div>
                  </div> 
                  <!--Satu Kotak--> 
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                        <label>Id Fans Page Facebook</label>  
                        <input type="text" class="form-control" name="IdFansPageFacebook" id="IdFansPageFacebook" value="<?= $website_umum[5]->website_isi ?>"></input> 
                        <small class="text-warning"></small>
                    </div>  
                  </div> 
                  <!--Satu Kotak-->
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                        <label>Facebook Domain Verifikasi</label>  
                        <input type="text" class="form-control" name="FacebookDomainVerifikasi" id="FacebookDomainVerifikasi" value="<?= $website_umum[6]->website_isi ?>"></input> 
                        <small class="text-warning"></small>
                    </div>  
                  </div> 
                  <!--Satu Kotak-->
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                        <label>Judul Postingan Media Sosial</label>  
                        <input type="text" class="form-control" name="FBShareJudul" id="FBShareJudul" value="<?= $website_umum[7]->website_isi ?>"></input> 
                        <small class="text-warning"></small>
                    </div>  
                  </div> 
                  <!--Satu Kotak-->
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                        <label>Deskripsi Postingan Media Sosial</label>  
                        <textarea type="text" class="form-control" name="FBShareDeskripsi" id="FBShareDeskripsi" ><?= $website_umum[8]->website_isi ?></textarea> 
                        <small class="text-warning"></small>
                    </div>  
                  </div> 
                  <!--Satu Kotak-->
                  <!--<div class="row align-items-center form-group">
                    <div class="col mr-2">
                        <label>Url Postingan Media Sosial</label>  
                        <input type="text" class="form-control" name="FBShareUrl" id="FBShareUrl" value="<?= $website_umum[9]->website_isi ?>"></input> 
                        <small class="text-warning"></small>
                    </div>  
                  </div> 
                  < !--Satu Kotak-->
                  <div class="row align-items-center form-group">
                    <div class="col mr-2">
                    <?php
                        if ($_SESSION['admin_level']=="Demo"){
                          ?>
                          <button class="btn btn-primary" disabled>Simpan</button>
                          <?php
                        }else{
                          ?>
                          <button class="btn btn-primary" data-toggle="modal" data-target="#modalMediaSosialShare">Simpan</button>
                          <?php
                        }
                          ?>
                  </div>  
                  </div> 
                  <!--Satu Kotak--> 
                </div>
            </div>
        </div>  
    </div>
    <!--Row-->
</div>
 
<?php
if ($_SESSION['admin_level']!="Demo"){
?>
<!-- Modal -->
<div class="modal fade" id="modalInformasiUmum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan data <b>Informasi Umum Website</b> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanInformasiUmum">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalTemaWebsite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan data <b>Tema Website</b> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanTemaWebsite">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalGoogleRecaptcha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan data <b>Google Recaptcha</b> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanGoogleRecaptcha">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalMediaSosialShare" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan data <b>Media Sosial Share</b> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanMediaSosialShare">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script>
$('#simpanInformasiUmum').on('click', function(event) { 
    var JudulWebsite = $('#JudulWebsite').val();
    var TaglineWebsite = $('#TaglineWebsite').val();
    var DeskripsiWebsite = $('#DeskripsiWebsite').val();
    var KataKunci = $('#KataKunci').val(); 
    var NamaPemilikWebsite = $('#NamaPemilikWebsite').val(); 
    var CreditsTahunMulai = $('#CreditsTahunMulai').val(); 
    var CreditsKeterangan = $('#CreditsKeterangan').val(); 
    $.ajax({
        url : "<?= base_url('admin/update-pengaturan-website-umum-informasi-umum') ?>",
        method : "POST",
        data : {JudulWebsite: JudulWebsite,TaglineWebsite: TaglineWebsite, DeskripsiWebsite: DeskripsiWebsite, KataKunci: KataKunci,NamaPemilikWebsite: NamaPemilikWebsite, CreditsTahunMulai: CreditsTahunMulai, CreditsKeterangan: CreditsKeterangan },
        async : true,
        dataType : 'html',
        success: function($hasil){
            if($hasil == 'sukses'){
                location.reload();
            }
        }
    }); 
});

$('#simpanTemaWebsite').on('click', function(event) { 
    var TemaWebsite = $('#TemaWebsite').val(); 
    var TemaWebsiteTomboldiHome = $('#TemaWebsiteTomboldiHome').val();
    $.ajax({
        url : "<?= base_url('admin/pengaturan-website/umum/tema-website-update') ?>",
        method : "POST",
        data : {TemaWebsite: TemaWebsite, TemaWebsiteTomboldiHome: TemaWebsiteTomboldiHome},
        async : true,
        dataType : 'html',
        success: function($hasil){
            if($hasil == 'sukses'){
                location.reload();
            }
        }
    }); 
});

$('#simpanGoogleRecaptcha').on('click', function(event) { 
    var RecaptchaStatus = $('#RecaptchaStatus').val();
    var Recaptchadatasitekey = $('#Recaptchadatasitekey').val();
    var Recaptchasecretkey = $('#Recaptchasecretkey').val(); 
    $.ajax({
        url : "<?= base_url('admin/pengaturan-website/umum/google-recaptcha-update') ?>",
        method : "POST",
        data : {RecaptchaStatus: RecaptchaStatus,Recaptchadatasitekey: Recaptchadatasitekey, Recaptchasecretkey: Recaptchasecretkey },
        async : true,
        dataType : 'html',
        success: function($hasil){
            if($hasil == 'sukses'){
                location.reload();
            }
        }
    }); 
});

$(document).on('change', '#file_favicon', function(){
    var name = document.getElementById("file_favicon").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['ico','png','jpg','jpeg']) == -1)
    {
      alert("Invalid Image File");
      return false;
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("file_favicon").files[0]);
    var f = document.getElementById("file_favicon").files[0];
    var fsize = f.size||f.fileSize;
    if(fsize > 2000000)
    {
      alert("Ukuran File Maksimal 2MB");
      return false;
    }
    else
        { 
            form_data.append("file", document.getElementById('file_favicon').files[0]);
            $.ajax({
                url:"<?= base_url('admin/pengaturan-website-umum-upload-favicon') ?>",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend:function(){
                    $('#file_favicon_status').html("<p>Sedang mengupload gambar...</p>");
                },
                success:function(data)
                {
                    if(data !=''){
                        var hasil = "<img src='<?= base_url('/assets/base/img/favicon.ico') ?>' style='height: 50px;width: 50px;' class='rounded bg-light' />";
                        hasil += "<p>Gambar berhasil di upload <a rel='nofollow' class='btn btn-warning btn-sm' onclick='close_file_favicon();'>Close</a></p>";
                        $('#file_favicon_status').html(hasil);
                    }else{
                        $('#file_favicon_status').html("<p>Gambar gagal diupload</p>");
                    }
                }
            });
        }
});
function close_file_favicon(){
    var hasil = "<img src='<?= base_url('/assets/base/img/favicon.ico') ?>' style='height: 50px;width: 50px;' class='rounded bg-light' />"; 
    $('#file_favicon_status').html(hasil); 
}
$(document).on('change', '#file_logo', function(){
    var name = document.getElementById("file_logo").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['ico','png','jpg','jpeg']) == -1)
    {
      alert("Invalid Image File");
      return false;
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("file_logo").files[0]);
    var f = document.getElementById("file_logo").files[0];
    var fsize = f.size||f.fileSize;
    if(fsize > 2000000)
    {
      alert("Ukuran File Maksimal 2MB");
      return false;
    }
    else
        { 
            form_data.append("file", document.getElementById('file_logo').files[0]);
            $.ajax({
                url:"<?= base_url('admin/pengaturan-website-umum-upload-logo') ?>",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend:function(){
                    $('#file_logo_status').html("<p>Sedang mengupload gambar...</p>");
                },
                success:function(data)
                {
                    if(data !=''){
                        var hasil = "<img src='<?= base_url('/assets/base/img/logo.png') ?>' style='height: 50px;width: 50px;' class='rounded bg-light' />";
                        hasil += "<p>Gambar berhasil di upload <a rel='nofollow' class='btn btn-warning btn-sm' onclick='close_file_logo();'>Close</a></p>";
                        $('#file_logo_status').html(hasil);
                    }else{
                        $('#file_logo_status').html("<p>Gambar gagal diupload</p>");
                    }
                }
            });
        }
});
function close_file_logo(){
    var hasil = "<img src='<?= base_url('/assets/base/img/logo.png') ?>' style='height: 50px;width: 50px;' class='rounded bg-light' />"; 
    $('#file_logo_status').html(hasil); 
}
$(document).on('change', '#file_brand_utama', function(){
    var name = document.getElementById("file_brand_utama").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['ico','png','jpg','jpeg']) == -1)
    {
      alert("Invalid Image File");
      return false;
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("file_brand_utama").files[0]);
    var f = document.getElementById("file_brand_utama").files[0];
    var fsize = f.size||f.fileSize;
    if(fsize > 2000000)
    {
      alert("Ukuran File Maksimal 2MB");
      return false;
    }
    else
        {
            form_data.append("file", document.getElementById('file_brand_utama').files[0]);
            $.ajax({
                url:"<?= base_url('admin/pengaturan-website-umum-upload-brand-utama') ?>",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend:function(){
                    $('#file_brand_utama_status').html("<p>Sedang mengupload gambar...</p>");
                },
                success:function(data)
                {
                    if(data !=''){
                        var hasil = "<img src='<?= base_url('/assets/base/img/logo-home.png') ?>' style='height: 50px;width: 158px;' class='rounded bg-light' />";
                        hasil += "<p>Gambar berhasil di upload <a rel='nofollow' class='btn btn-warning btn-sm' onclick='close_file_brand_utama();'>Close</a></p>";
                        $('#file_brand_utama_status').html(hasil);
                    }else{
                        $('#file_brand_utama_status').html("<p>Gambar gagal diupload</p>");
                    }
                }
            });
        }
});
function close_file_brand_utama(){
    var hasil = "<img src='<?= base_url('/assets/base/img/logo-home.png') ?>' style='height: 50px;width: 158px;' class='rounded bg-light' />"; 
    $('#file_brand_utama_status').html(hasil); 
}
$(document).on('change', '#file_brand_login', function(){
    var name = document.getElementById("file_brand_login").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['ico','png','jpg','jpeg']) == -1)
    {
      alert("Invalid Image File");
      return false;
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("file_brand_login").files[0]);
    var f = document.getElementById("file_brand_login").files[0];
    var fsize = f.size||f.fileSize;
    if(fsize > 2000000)
    {
      alert("Ukuran File Maksimal 2MB");
      return false;
    }
    else
        {
            form_data.append("file", document.getElementById('file_brand_login').files[0]);
            $.ajax({
                url:"<?= base_url('admin/pengaturan-website-umum-upload-brand-login') ?>",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend:function(){
                    $('#file_brand_login_status').html("<p>Sedang mengupload gambar...</p>");
                },
                success:function(data)
                {
                    if(data !=''){
                        var hasil = "<img src='<?= base_url('/assets/base/img/logo-login.png') ?>' style='height: 50px;width: 158px;' class='rounded bg-light' />";
                        hasil += "<p>Gambar berhasil di upload <a rel='nofollow' class='btn btn-warning btn-sm' onclick='close_file_brand_login();'>Close</a></p>";
                        $('#file_brand_login_status').html(hasil);
                    }else{
                        $('#file_brand_login_status').html("<p>Gambar gagal diupload</p>");
                    }
                }
            });
        }
});
function close_file_brand_login(){
    var hasil = "<img src='<?= base_url('/assets/base/img/logo-login.png') ?>' style='height: 50px;width: 158px;' class='rounded bg-light' />"; 
    $('#file_brand_login_status').html(hasil);    
}

$(document).on('change', '#FBShareGambar', function(){
    var name = document.getElementById("FBShareGambar").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['ico','png','jpg','jpeg']) == -1)
    {
      alert("Invalid Image File");
      return false;
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("FBShareGambar").files[0]);
    var f = document.getElementById("FBShareGambar").files[0];
    var fsize = f.size||f.fileSize;
    if(fsize > 2000000)
    {
      alert("Ukuran File Maksimal 2MB");
      return false;
    }
    else
        {
            form_data.append("file", document.getElementById('FBShareGambar').files[0]);
            $.ajax({
                url:"<?= base_url('admin/pengaturan-website-umum-upload-FBShareGambar') ?>",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend:function(){
                    $('#file_FBShareGambar_status').html("<p>Sedang mengupload gambar...</p>");
                },
                success:function(data)
                {
                    if(data !=''){
                        var hasil = "<img src='<?= base_url('/assets/base/img/thumbnails.png') ?>' style='height: 89px;width: 241px;' class='rounded bg-light' />";
                        hasil += "<p>Gambar berhasil di upload <a rel='nofollow' class='btn btn-warning btn-sm' onclick='close_file_FBShareGambar();'>Close</a></p>";
                        $('#file_FBShareGambar_status').html(hasil);
                    }else{
                        $('#file_FBShareGambar_status').html("<p>Gambar gagal diupload</p>");
                    }
                }
            });
        }
});
function close_file_FBShareGambar(){
    var hasil = "<img src='<?= base_url('/assets/base/img/thumbnails.png') ?>' style='height: 89px;width: 241px;' class='rounded bg-light' />"; 
    $('#file_FBShareGambar_status').html(hasil);    
}
$('#simpanMediaSosialShare').on('click', function(event) { 
    var IdFansPageFacebook = $('#IdFansPageFacebook').val();
    var FacebookDomainVerifikasi = $('#FacebookDomainVerifikasi').val();
    var FBShareJudul = $('#FBShareJudul').val();
    var FBShareDeskripsi = $('#FBShareDeskripsi').val(); 
    $.ajax({
        url : "<?= base_url('admin/update-pengaturan-website-umum-media-sosial-share') ?>",
        method : "POST",
        data : {IdFansPageFacebook: IdFansPageFacebook,FacebookDomainVerifikasi: FacebookDomainVerifikasi, FBShareJudul: FBShareJudul, FBShareDeskripsi: FBShareDeskripsi},
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