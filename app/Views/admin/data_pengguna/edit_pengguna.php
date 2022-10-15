<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <div>
        <a target="_blank" href="<?= SITE_UNDANGAN ?>/<?= $users_order[0]->domain ?>" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i> Lihat Website</a>
        </div>
    </div> 
 
    <div class="row mb-3">

        <!-- ========== users_MEMPELAI =========== -->
        <?php 


        // CEK Foto semua ditemukan atau tidak
        $kunci = $undangan_pengaturan[0]->kunci;
        $fotogroom = "assets/users/".$kunci."/groom.png";
        if (file_exists($fotogroom)) {
          $fotogroom = $fotogroom;
        } else {
          $fotogroom = "/assets/base/img/groom.png";
        }
        $fotobride = "assets/users/".$kunci."/bride.png";
        if (file_exists($fotobride)) {
          $fotobride = $fotobride;
        } else {
          $fotobride = "/assets/base/img/bride.png";
        }
        $fotosampul = "assets/users/".$kunci."/kita.png";
        if (file_exists($fotosampul)) {
          $fotosampul = $fotosampul;
        } else {
          $fotosampul = "/assets/base/img/kita.png";
        }
        ?>
        <div class="row">
          <div class="col-xl-6 col-lg-6 mb-4">
              <div class="card mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Data Mempelai Pria</h6>
                  </div>
                  <div class="card-body">
                      <!-- CONTENT DISINI -->
                      <div class="upload-area-bg" style="text-align: center;">
                          <div class="col">
                              <div class="row">
                                  <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center">
                                      <div class="upload-area" style="height: 100%;padding: 5px 5px;">
                                      <img src="<?php echo base_url() ?><?= $fotogroom ?>" id="profile-pic-groom" style='border-radius: 5px;height: 200px;width: 200px;'>
                                      </div>
                                  </div>
                                  <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center mt-3">
                                      <div class="btn btn-primary <?php if ($_SESSION['admin_level']=="Demo"){echo "disabled";}else{echo "";} ?>">
                                        <?php
                                        if ($_SESSION['admin_level']=="Demo"){
                                        ?>
                                          Upload Foto
                                        <?php
                                        }else{
                                          ?>
                                          <input type="file" class="file-upload" id="groom"  name="profile_picture" accept="image/*"> Upload Foto
                                          <?php
                                        }
                                        ?>
                                      </div>
                                  </div>
                              </div>   
                          </div>
                      </div>
                      <hr>
                      <div class="col mt-2">
                          <label>Nama Lengkap <sup class="text-danger">*</sup></label>
                          <input id="nama_lengkap_pria" type="text" class="form-control" placeholder="Contoh : Khairul Fikri, M.Kom" value="<?= $users_mempelai[0]->nama_pria ?>" required>
                      </div>

                      <div class="col mt-2">
                          <label>Nama Panggilan <sup class="text-danger">*</sup></label>
                          <input id="nama_panggilan_pria" type="text" class="form-control" placeholder="Contoh : Fikri" value="<?=  $users_mempelai[0]->nama_panggilan_pria ?>" required>
                      </div>

                      <div class="col mt-2">
                          <label>Nama Ayah <sup class="text-danger">*</sup></label>
                          <input id="nama_ayah_pria" type="text" class="form-control" placeholder="Nama Ayah" value="<?= $users_mempelai[0]->nama_ayah_pria ?>" required>
                      </div>

                      <div class="col mt-2">
                          <label>Nama Ibu <sup class="text-danger">*</sup></label>
                          <input id="nama_ibu_pria" type="text" class="form-control" placeholder="Nama Ibu" value="<?= $users_mempelai[0]->nama_ibu_pria ?>" required>
                      </div>
                      <div class="col mt-3">
                        <?php
                        if ($_SESSION['admin_level']=="Demo"){
                        ?>
                          <button class="btn btn-primary" disabled>Simpan</button>
                        <?php
                        }else{
                        ?>
                          <button class="btn btn-primary" data-toggle="modal" data-target="#modalPria">Simpan</button>
                        <?php
                        }
                        ?>  
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-xl-6 col-lg-6 mb-4">
              <div class="card mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Data Mempelai Wanita</h6>
                  </div>
                  <div class="card-body">
                      <!-- CONTENT DISINI -->
                      <div class="upload-area-bg" style="text-align: center;">
                          <div class="col">
                              <div class="row">
                                  <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center">
                                      <div class="upload-area" style="height: 100%;padding: 5px 5px;">
                                      <img src="<?php echo base_url() ?><?= $fotobride ?>" id="profile-pic-bride" style='border-radius: 5px;height: 200px;width: 200px;'>
                                      </div>
                                  </div>
                                  <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center mt-3">
                                      <div class="btn btn-primary <?php if ($_SESSION['admin_level']=="Demo"){echo "disabled";}else{echo "";} ?>">
                                      <?php
                                        if ($_SESSION['admin_level']=="Demo"){
                                        ?>
                                          Upload Foto
                                        <?php
                                        }else{
                                          ?>    
                                          <input type="file" class="file-upload" id="bride"  name="profile_picture" accept="image/*"> Upload Foto
                                        <?php
                                        }
                                        ?>
                                      </div>
                                  </div>
                              </div>   
                          </div>
                      </div>
                      <hr>
                      <div class="col mt-2">
                          <label>Nama Lengkap <sup class="text-danger">*</sup></label>
                          <input id="nama_lengkap_wanita" type="text" class="form-control" placeholder="Contoh : Dewi Untari, S.Kom" value="<?= $users_mempelai[0]->nama_wanita ?>" required>
                      </div>

                      <div class="col mt-2">
                          <label>Nama Panggilan <sup class="text-danger">*</sup></label>
                          <input id="nama_panggilan_wanita" type="text" class="form-control" placeholder="Contoh : Dewi" value="<?=  $users_mempelai[0]->nama_panggilan_wanita ?>" required>
                      </div>

                      <div class="col mt-2">
                          <label>Nama Ayah <sup class="text-danger">*</sup></label>
                          <input id="nama_ayah_wanita" type="text" class="form-control" placeholder="Nama Ayah" value="<?= $users_mempelai[0]->nama_ayah_wanita ?>" required>
                      </div>

                      <div class="col mt-2">
                          <label>Nama Ibu <sup class="text-danger">*</sup></label>
                          <input id="nama_ibu_wanita" type="text" class="form-control" placeholder="Nama Ibu" value="<?= $users_mempelai[0]->nama_ibu_wanita ?>" required>
                      </div>

                      <div class="col mt-3">
                      <?php
                        if ($_SESSION['admin_level']=="Demo"){
                        ?>
                          <button class="btn btn-primary" disabled>Simpan</button>
                        <?php
                        }else{
                        ?>
                          <button class="btn btn-primary" data-toggle="modal" data-target="#modalWanita">Simpan</button>
                      <?php
                        }
                      ?>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-xl-6 col-lg-6 mb-4">
              <div class="card mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Data Foto Sampul</h6>
                  </div>
                  <div class="card-body">
                      <!-- CONTENT DISINI -->
                      <div class="upload-area-bg" style="text-align: center;">
                          <div class="col">
                              <div class="row">
                                  <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center">
                                      <div class="upload-area" style="height: 100%;padding: 5px 5px;">
                                      <img src="<?= base_url() ?><?= $fotosampul ?>" id="profile-pic-sampul" style='border-radius: 5px;height: 200px;width: 200px;'>
                                      </div>

                                  </div>
                                  <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center mt-3">
                                      <div class="btn btn-dark <?php if ($_SESSION['admin_level']=="Demo"){echo "disabled";}else{echo "";} ?>">
                                      <?php
                                        if ($_SESSION['admin_level']=="Demo"){
                                        ?>
                                          Upload Foto
                                        <?php
                                        }else{
                                          ?>
                                          <input type="file" class="file-upload" id="sampul"  name="profile_picture" accept="image/*"> Upload Foto
                                      <?php
                                        }
                                      ?>
                                      </div>
                                  </div>
                              </div>   
                          </div>
                      </div>
                    
                  </div>
              </div>
          </div>

          <!-- ========== VIDEO  ==========-->
          <div class="col-xl-6 col-lg-6 mb-4">
              <div class="card mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Data Video</h6>
                  </div>
                  <div class="card-body">
                      <label>Youtube Link <sup>(opsional)</sup></label>
                      <textarea id="video" type="text" class="form-control" placeholder="Contoh : https://youtu.be/zlKzyYnhu-s" required><?= $users_album_video[0]->video ?></textarea>
                      <div class="mt-1">
                      <label class="form-check-label ">
                        <a target="_blank" href="<?= SITE_UTAMA ?>/youtube" style="margin-top: 105px;color: #2c3e50;position: relative;top:3px;color:#17a2b8;"><i class="lni-question-circle" style="color:#17a2b8;"></i>Cara Menambahkan Video</a>
                      </label>
                      </div>
                      <div class="col mt-3">
                      <?php
                        if ($_SESSION['admin_level']=="Demo"){
                        ?>
                          <button class="btn btn-primary" disabled>Simpan</button>
                        <?php
                        }else{
                        ?>
                          <button class="btn btn-primary" data-toggle="modal" data-target="#modalVideo">Simpan</button>
                      <?php
                        }
                      ?>
                      </div>
                  </div>
              </div>
          </div>
        
         
        
        </div>

         
        <!-- ========== users_ACARA  ==========-->
          <div class="col-xl-6 col-lg-6 mb-4">
              <div class="card mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Data Akad Nikah</h6>
                  </div>
                  <div class="card-body">
                      <!-- CONTENT DISINI -->
                      <div class="col mt-2">
                          <label>Tanggal <sup class="text-danger">*</sup></label>
                          <input type="text" class="form-control" id="datepicker" placeholder="Tanggal" readonly="readonly" style="cursor:pointer; background-color: #FFFFFF" value="Jumat, 17 Januari 2020" required>
                          <input type="hidden" id="tanggal_akad" value="<?= $users_acara[0]->tanggal_akad ?>">
                      </div>

                      <div class="col mt-2">
                          <label>Waktu / Jam <sup class="text-danger">*</sup></label>
                          <input id="waktu_akad" type="text" class="form-control" placeholder="Contoh : 10.00 Pagi" value="<?= $users_acara[0]->jam_akad ?>" required>
                      </div>

                      <div class="col mt-2">
                          <label>Tempat / Lokasi <sup class="text-danger">*</sup></label>
                          <input id="lokasi_akad" type="text" class="form-control" placeholder="Contoh : Kediaman Mempelai Wanita " value="<?= $users_acara[0]->tempat_akad ?>" required>
                      </div>

                      <div class="col mt-2">
                          <label>Alamat <sup class="text-danger">*</sup></label>
                          <textarea id="alamat_akad" type="text" class="form-control" placeholder="Contoh : JL. Ahmad Yani No.1"><?= $users_acara[0]->alamat_akad ?></textarea>
                      </div>

                      <div class="col mt-2">
                          <label>Link Google Maps <sup>(opsional)</sup></label>
                          <textarea id="gmap_akad" type="text" class="form-control" placeholder="Google Map acara Akad Nikah"><?= $users_acara[0]->gmap_akad ?></textarea>
                      </div>
                      <div class="mt-1">
                      <label class="form-check-label ">
                        <a target="_blank" href="<?php echo base_url('maps'); ?>" style="margin-top: 105px;color: #2c3e50;position: relative;top:3px;color:#17a2b8;">Cara Menambahkan Maps <i class="lni-question-circle" style="color:#17a2b8;"></i></a>
                      </label>
                      </div>

                       
                      <div class="col mt-3">
                      <?php
                        if ($_SESSION['admin_level']=="Demo"){
                        ?>
                          <button class="btn btn-primary" disabled>Simpan</button>
                        <?php
                        }else{
                        ?>
                          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAkad">Simpan</button>
                      <?php
                        }
                      ?>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-xl-6 col-lg-6 mb-4">
              <div class="card mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Data Resepsi Nikah</h6>
                  </div>
                  <div class="card-body">
                      <!-- CONTENT DISINI -->
                      <div class="col mt-2">
                          <label>Tanggal <sup class="text-danger">*</sup></label>
                          <input type="text" class="form-control" id="datepicker2" placeholder="Tanggal" readonly="readonly" style="cursor:pointer; background-color: #FFFFFF" value="<?= $users_acara[0]->tanggal_resepsi ?>" required> 
                          <input type="hidden" id="tanggal_resepsi" value="<?= $users_acara[0]->tanggal_akad ?>">
                      </div>

                      <div class="col mt-2">
                          <label>Waktu / Jam <sup class="text-danger">*</sup></label>
                          <input id="waktu_resepsi" type="text" class="form-control" placeholder="Contoh : 10.00 Pagi" value="<?= $users_acara[0]->jam_resepsi ?>" required>
                      </div>

                      <div class="col mt-2">
                          <label>Tempat / Lokasi <sup class="text-danger">*</sup></label>
                          <input id="lokasi_resepsi" type="text" class="form-control" placeholder="Contoh : Kediaman Mempelai Wanita " value="<?= $users_acara[0]->tempat_resepsi ?>" required>
                      </div>

                      <div class="col mt-2">
                          <label>Alamat <sup class="text-danger">*</sup></label>
                          <textarea id="alamat_resepsi" type="text" class="form-control" placeholder="Contoh : JL. Ahmad Yani No.1"><?= $users_acara[0]->alamat_resepsi ?></textarea>
                      </div>

                      <div class="col mt-2">
                          <label>Link Google Maps <sup>(opsional)</sup></label>
                          <textarea id="gmap_resepsi" type="text" class="form-control" placeholder="Google Map acara Resepsi Pernikahan"><?= $users_acara[0]->gmap_resepsi ?></textarea>
                      </div>
                      <div class="mt-1">
                      <label class="form-check-label ">
                        <a target="_blank" href="<?php echo base_url('maps'); ?>" style="margin-top: 105px;color: #2c3e50;position: relative;top:3px;color:#17a2b8;">Cara Menambahkan Maps <i class="lni-question-circle" style="color:#17a2b8;"></i></a>
                      </label>
                      </div>

                      <div class="col mt-3">
                      <?php
                        if ($_SESSION['admin_level']=="Demo"){
                        ?>
                          <button class="btn btn-primary" disabled>Simpan</button>
                        <?php
                        }else{
                        ?>
                          <button class="btn btn-primary" data-toggle="modal" data-target="#modalResepsi">Simpan</button>
                      <?php
                        }
                      ?>
                      </div>
                  </div>
              </div>
          </div>

           

        
        <!-- ========== users_CERITA ========== -->
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Cerita</h6>
                </div>
                <div class="card-body">
                   
                    <form method="post" action="<?php echo base_url('admin/update_users_cerita'); ?>">
                    <div id="konten-cerita" >
                    
                        <?php 
                            $jml_cerita = count($users_cerita);
                            for($i=0;$i < $jml_cerita;$i++){ 
                        ?>

                            <div id="cerita<?php echo $i+1 ?>">
                                <div class="row align-items-center mt-3">
                                    <div class="col-auto">
                                        <a style="color: #2c3e50;margin-bottom:0px;font-size: 20px;font-weight: 600;display: flex;">#<?php echo $i+1 ?></a>
                                    </div>
                                    <div class="col">
                                    <?php
                                    if ($_SESSION['admin_level']=="Demo"){
                                    ?>
                                     <a class="btn btn-sm disabled" style="background-color: #dc3545;padding: 5px;font-size: 12px;border-radius: 5px;color:#fff">Hapus</a>
                                    <?php
                                    }else{
                                      ?>
                                      <a id="<?php echo $i+1 ?>" class="btn btn-sm btn_remove" style="background-color: #dc3545;padding: 5px;font-size: 12px;border-radius: 5px;color:#fff">Hapus</a>
                                      <?php
                                    }
                                    ?>
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col">
                                        <label>Tanggal <sup class="text-danger">*</sup></label>
                                        <input name="tanggal_cerita[]" type="text" class="form-control" placeholder="Contoh : 20 Februari 2020" value="<?= $users_cerita[$i]->tanggal_cerita ?>" required>
                                    </div>
                                </div>

                                <div class="row align-items-center mt-3">
                                    <div class="col">
                                        <label>Judul <sup class="text-danger">*</sup></label>
                                        <input name="judul_cerita[]" type="text" class="form-control" placeholder="Contoh : Ta'aruf" value="<?= $users_cerita[$i]->judul_cerita  ?>" required>
                                    </div>
                                </div>

                                <div class="row align-items-center mt-3">
                                    <div class="col">
                                        <label>Isi Cerita <sup class="text-danger">*</sup></label>
                                        <textarea name="isi_cerita[]" type="text" class="form-control" placeholder="Maximal 500 Karakter" maxlength="500" rows="4" required><?= $users_cerita[$i]->isi_cerita ?></textarea>
                                    </div>
                                </div>
                            </div>  

                        <?php 
                            }
                        ?>

                    </div>

                    <div class="row mt-2" >
                        <div class="col text-center">
                        <?php
                        if ($_SESSION['admin_level']=="Demo"){
                        ?>
                          <a class="btn btn-primary btn-order btn-order-secondary btn-block disabled" style="color:#fff">Tambah Cerita</a>
                        <?php
                        }else{
                          ?>
                          <a id="addCerita" class="btn btn-primary btn-order btn-order-secondary btn-block" style="color:#fff">Tambah Cerita</a>
                          <?php
                        }
                        ?>
                        </div>
                    </div>

                    <div class="col mt-3">
                    <?php
                        if ($_SESSION['admin_level']=="Demo"){
                        ?>
                          <button class="btn btn-primary" disabled>Simpan</button>
                        <?php
                        }else{
                        ?>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    <?php
                        }
                    ?>
                    </div>
                    </form>        
                </div>
                


            </div>
        </div>

        <!-- ========== GALLERY ========== -->
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Gallery</h6>
                </div>
                <div class="card-body">

                    <div class="upload-area-bg">
                        <div class="upload-area do-add-btn">
                            <div class="upload-area-inner">
                                <div class="upload-area-icon-main">
                                    <i class="lni-cloud-download"></i>
                                </div>
                                <h3 class="upload-area-caption">
                                    <span>Drag and drop files here</span>
                                </h3>
                                <p>or</p>
                                <?php
                                if ($_SESSION['admin_level']=="Demo"){
                                ?>
                                <button class="upload-area-button btn disabled" style="z-index:9999;">
                                    <span style="color:#fff">Browse files</span>
                                </button>
                                <?php
                                }else{
                                  ?>
                                  <button class="upload-area-button btn " style="z-index:9999;">
                                      <span style="color:#fff">Browse files</span>
                                  </button>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div style="text-align: center;">
                        <img id="loading" src="<?= base_url() ?>/assets/base/img/loading.svg"  style="height: 30px;width: 30px; display: none;" />
                    </div>
                    <div id="previewss">
                        <?php 
                            $kunci = $undangan_pengaturan[0]->kunci;
                            for($a=1;$a<=10;$a++){
                                $pathName = 'assets/users/'.$kunci.'/album'.$a.'.png';
                                if(!file_exists($pathName))continue;
                        ?>

                        <div class="preview-uploads" id="preview<?= $a ?>">
                            <div class="preview-uploads-img">
                                <span class="preview">
                                <img id="img<?= $a ?>" src="<?= base_url() ?>/assets/users/<?= $kunci ?>/album<?= $a ?>.png"  style="height: 100%;object-position: center;object-fit: cover;width: 100%;"  />
                                </span>
                            </div>
                            <div class="preview-uploads-name">
                            <b><p class="name" style="line-height: revert;font-size: 12px;" >album<?= $a; ?></p></b>
                            <strong class="error text-danger" style="line-height: revert;font-size: 12px;"  data-dz-errormessage></strong>
                            <p class="size" style="line-height: revert;font-size: 12px;"  >-</p>     
                            </div>
                            <div  class="preview-uploads-delete">
                            <?php
                            if ($_SESSION['admin_level']=="Demo"){
                            ?>
                              <button class="btn btn-danger delete btnhehe disabled">
                                  Hapus
                              </button>
                            <?php
                            }else{
                              ?>
                              <button id="<?= $a ?>" data-dz-remove class="btn btn-danger delete btnhehe">
                                  Hapus
                              </button>
                              <?php
                            }
                            ?>
                            
                            </div>
                        </div>

                        <?php
                            }
                        ?>
                    </div>

                </div>
            </div>
        </div>

        <!-- ========== PENGATURAN ========== -->
        <!-- PENGATURAN UNDANGAN -->
        <div class="col-xl-12 col-lg-6 mb-4">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Pengaturan Undangan</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                    <label>Nama Domain / URL Undangan</label> 
                    <p style="bottom: -12.3px;position: inherit; color: #005CAA;font-weight: bold; ">https://<?= DOMAIN_UNDANGAN ?>/<span id="domainyo"><?= $users_order[0]->domain ?></span></p>
                    <input id="domain" type="text" class="form-control" placeholder="akudandia" value="<?= $users_order[0]->domain ?>"  onkeyup="nospaces(this)" required>
                    
                    </div>
                    <?php 
                      if ($users_order[0]->domain_jml_diubah < 3 ){
                         
                        if ($_SESSION['admin_level']=="Demo"){
                        ?>
                          <button class="btn btn-primary" disabled>Simpan</button>
                        <?php
                        }else{
                        ?>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalDomain">Simpan</button>
                        <?php
                        }
                         
                      }else{
                        ?>
                        <button class="btn btn-primary" disabled>Simpan</button>
                        <?php
                      }
                    ?>
                  <hr>  
                  <code>Anda hanya bisa merubah Nama Domain sebanyak tiga kali. Sekarang tersisa sebanyak <?php $hasil= 3-$order[0]->domain_jml_diubah; echo $hasil; ?> kali untuk merubah Nama Domain.</code>  
                  
                    
                </div>
              </div>
        </div>

        <!-- MUSIK -->
        <div class="col-xl-6 col-lg-6 mb-4">
              <!-- Form Basic --> 
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Musik <sup>(opsional)</sup></h6>
                </div>
                <div class="card-body"> 
					        <?php
                  //Cek Ada musik atau tidak
                      $pathName = $users_order_musik[0]->musik;
                      if($pathName != "default.mp3"){
                          $musiknya = $users_order_musik[0]->musik;
                      }else{
                        $musiknya = "musik default sistem.";
                      }
                  ?>
                    <p>Jika tidak ada musik baru yang diupload atau di pilih, maka secara otomatis musik Undangan Kakak secara default adalah musik default dari sistem.</p>
                    <i class="fas fa-music"></i>  Saat ini : <code><?php echo $musiknya;?></code><br/>
                	<label>Silahkan Pilih Musik Yang Tersedia</label>
                    <div class="form-group">
                      <select id="pilihan_musik" class="form-control">
                      <?php
                      foreach ($undangan_musik as $row_undangan_musik){
                        ?>
                        <option <?php if ($musiknya == $row_undangan_musik->musik_file ){echo "selected";}else{echo "";} ?> value="<?= $row_undangan_musik->musik_file ?>"><?= $row_undangan_musik->musik_file ?></option>
                        <?php
                      }
                      ?> 
                      </select>
                    </div>
                    <label>Atau upload sendiri (max 2MB)</label>
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" name="" id="" accept=".mp3" disabled>
                      </div>
                    </div>
                    <?php
                    if ($_SESSION['admin_level']=="Demo"){
                    ?>
                      <button class="btn btn-primary" disabled>Simpan</button>
                    <?php
                    }else{
                    ?>
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalMusik">Simpan</button>
                    <?php
                    }
                    ?>
                </div>
              </div> 
        </div>

        <div class="col-xl-6 col-lg-6 mb-4">
         <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Fitur Undangan</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" disabled checked id="setSampul">
                        <label class="custom-control-label" for="setSampul" >Halaman Sampul</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" disabled checked id="setMempelai">
                        <label class="custom-control-label" for="setMempelai" >Halaman Mempelai</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" disabled checked id="setusers_Acara">
                        <label class="custom-control-label" for="setusers_Acara" >Halaman Acara</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setUcapan" 
                        <?php if($fitur[0]->komen == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setUcapan" >Halaman Ucapan</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setusers_Album"
                        <?php if($fitur[0]->gallery == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setusers_Album" >Halaman Gallery/Album</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setCerita"
                        <?php if($fitur[0]->cerita == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setCerita">Halaman Cerita</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setLokasi"
                        <?php if($fitur[0]->lokasi == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setLokasi" >Halaman Lokasi</label>
                      </div>
                    </div>
                    <?php
                    if ($_SESSION['admin_level']=="Demo"){
                    ?>
                      <button class="btn btn-primary" disabled>Simpan</button>
                    <?php
                    }else{
                    ?>
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalFitur">Simpan</button>
                    <?php
                    }
                    ?>
                  </div>
            </div>
        </div>

        <!-- ========= PROFIL ========= -->
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Profil Pengguna</h6>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label>Username <sup class="text-danger">*</sup></label>
                        <input id="username" type="text" class="form-control" placeholder="Contoh : reydinda" value="<?= $user[0]->username ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Password <sup class="text-danger">*</sup></label>
                        <input id="password" type="password" class="form-control" placeholder="********" value="" required>
                    </div>

                    <div class="form-group">
                        <label>Email <sup class="text-danger">*</sup></label>
                        <input id="email" type="email" class="form-control" placeholder="Contoh : reydinda" value="<?= $user[0]->email ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Nomor Hp <sup class="text-danger">*</sup></label>
                        <input id="hp" type="number" class="form-control" placeholder="Contoh : 081234567890" value="<?= $user[0]->hp ?>" required>
                    </div>
                    <?php
                    if ($_SESSION['admin_level']=="Demo"){
                    ?>
                      <button class="btn btn-primary" disabled>Simpan</button>
                    <?php
                    }else{
                    ?>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalUser">Simpan</button>
                    <?php
                    }
                    ?>
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
<div class="modal fade" id="modalDomain" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin mengubah nama domain ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanDomain">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalFitur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan pada Fitur?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanFitur">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalGagal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Gagal mengganti nama domain..
        Nama domain sudah dipakai!!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAkad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan <b>Acara Akad</b> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanAkad">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalResepsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan <b>Acara Resepsi</b> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanResepsi">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan <b>Link Video</b> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanVideo">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalWanita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan data <b>Pengantin Wanita</b> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanWanita">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalPria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan data <b>Pengantin Pria</b> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanPria">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan data <b>Pengguna</b> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanUser">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalMusik" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan <b>Pilihan Musik</b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanMusik">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<?php
}
?>


<script src="<?php echo base_url() ?>/assets/base/js/croppie.min.js"></script>
<script src="<?php echo base_url() ?>/assets/base/js/dropzone.js"></script>
<script src="<?php echo base_url() ?>/assets/base/js/pikaday.js"></script>

<?php
if ($_SESSION['admin_level']!="Demo"){
?>
<script>

    // ============= users_CERITA                        
    var i = <?php echo $jml_cerita ?>;

    $(document).on('click', '.btn_remove', function(){  

       var button_id = $(this).attr("id");
       $('#cerita'+button_id+'').remove();  
       i--;

       if(i == 0){
        $("..form-control").prop('required',true);
       }

     });  

    $('#addCerita').click(function(){  

      i++;  

      $('#konten-cerita').append('<div id="cerita'+i+'"><div class="row align-items-center mt-3"><div class="col-auto"><a style="color: #2c3e50;margin-bottom:0px;font-size: 20px;font-weight: 600;display: flex;">#'+i+'</a></div><div class="col"><a id="'+i+'" class="btn btn-sm btn_remove" style="background-color: #dc3545;padding: 5px;font-size: 12px;border-radius: 5px;">Hapus</a></div></div><div class="row align-items-center"><div class="col"><label>Tanggal</label><input name="tanggal_cerita[]" type="text" class="form-control" placeholder="Contoh : 14 Januari 2020 " required></div></div><div class="row align-items-center mt-3"><div class="col"><label>Judul</label><input name="judul_cerita[]" type="text" class="form-control" placeholder="Contoh : Pertama Bertemu" required></div></div><div class="row align-items-center mt-3"><div class="col"><label>Isi Cerita</label><textarea name="isi_cerita[]" type="text" class="form-control" placeholder="Maximal 500 Karakter" maxlength="500" rows="4" required></textarea></div></div></div>');  
        $(".form-control").prop('required',false);
    });


    // =========== users_ACARA


    moment.locale('id');
    $('#datepicker').val(moment('<?= $users_acara[0]->tanggal_akad ?>').format('dddd, Do MMMM YYYY'));
    var picker = new Pikaday({ 
      
      field: $('#datepicker')[0],
      format: 'dddd, Do MMMM YYYY',
      onSelect: function() {
        $('#tanggal_akad').val(this.getMoment().format('YYYY/MM/DD'));
      }
    });

    $('#datepicker2').val(moment('<?= $users_acara[0]->tanggal_resepsi ?>').format('dddd, Do MMMM YYYY'));
    var picker = new Pikaday({ 
      format: 'dddd, Do MMMM YYYY',
      field: $('#datepicker2')[0],
      onSelect: function() {
        $('#tanggal_resepsi').val(this.getMoment().format('YYYY/MM/DD'));
      }
    });
       
    $('#simpanAkad').on('click', function(event) { 

        var datanyaSiapa = 'akad';
        var tanggal = $('#tanggal_akad').val();
        var waktu = $('#waktu_akad').val();
        var lokasi = $('#lokasi_akad').val();
        var alamat = $('#alamat_akad').val();
        var gmap = $('#gmap_akad').val();

        $.ajax({
            url : "<?= base_url('admin/update_users_acara') ?>",
            method : "POST",
            data : {tanggal: tanggal,waktu: waktu, lokasi: lokasi, alamat: alamat,gmap: gmap, datanyaSiapa: datanyaSiapa},
            async : true,
            dataType : 'html',
            success: function($hasil){
                if($hasil == 'sukses'){
                    location.reload();
                }
            }
        });

    });

    $('#simpanResepsi').on('click', function(event) {

        var datanyaSiapa = 'resepsi';
        var tanggal = $('#tanggal_resepsi').val();
        var waktu = $('#waktu_resepsi').val();
        var lokasi = $('#lokasi_resepsi').val();
        var alamat = $('#alamat_resepsi').val();
        var gmap = $('#gmap_resepsi').val();

        $.ajax({
            url : "<?= base_url('admin/update_users_acara') ?>",
            method : "POST",
            data : {tanggal: tanggal,waktu: waktu, lokasi: lokasi, alamat: alamat,gmap: gmap, datanyaSiapa: datanyaSiapa},
            async : true,
            dataType : 'html',
            success: function($hasil){
                if($hasil == 'sukses'){
                    location.reload();
                }
            }
        });

    });

     
    // ============= GALLERY

        var myDropzone = new Dropzone(document.body, { 
    url: "<?php echo base_url('admin/update_gallery'); ?>", 
    paramName: "file",
    acceptedFiles: 'image/*',
    autoQueue: true,
    maxFilesize: 2,  //ukuran maksimal foto 
    clickable: ".do-add-btn" 
    });

    myDropzone.on("success", function(file,response){
        if(response == ""){
        $('.dz-preview').remove();
        alert('Batas Upload 10 Foto!');

        }else{
        var aql = JSON.parse(response);
        $('.dz-preview').remove();
        $("#previewss").prepend('<div id="preview'+aql.no+'" class="file-row preview-uploads"><div class="preview-uploads-img"><span class="preview"><img id="img3" src="<?= base_url() ?>/assets/users/'+aql.kunci+'/album'+aql.no+'.png"  style="height: 100%;object-position: center;object-fit: cover;width: 100%;" /></span></div><div class="preview-uploads-name"><p class="name" style="line-height: revert;font-size: 12px;" data-dz-name>album'+aql.no+'</p><strong class="error text-danger" style="line-height: revert;font-size: 12px;"  ></strong><p class="size" style="line-height: revert;font-size: 12px;" >-</p></div><div  class="preview-uploads-delete"><button id="'+aql.no+'" class="btn btn-danger delete btnhehe">Hapus</button></div></div>');
        }
        $('#loading').hide();
    });

    myDropzone.on("sending", function(file, xhr, formData) {
    $('.dz-preview').remove();
    formData.append("kunci", "<?= $kunci ?>");
    $('#loading').show();
    });


    myDropzone.on("error", function(file, response) {
    $('.dz-preview').remove();
    alert('Maximal File = 2MB!');
    $('#loading').hide();
    });

    $(document).on('click', '.btnhehe', function(){  

    var button_id = $(this).attr("id");
    var kunci = "<?= $kunci ?>";
    $.ajax({
        type: 'POST',
        url: '<?= base_url('admin/del_gallery') ?>',
        data: {id: button_id,kunci: kunci},
        success: function(data){
            console.log('success: ' + data);
            $('#preview'+button_id).remove();
        }
    });
    
    });

    $('#simpanVideo').on('click', function(event) {

        var video = $('#video').val();
        $.ajax({
            url : "<?= base_url('admin/update_users_album_video') ?>",
            method : "POST",
            data : {video: video},
            async : true,
            dataType : 'html',
            success: function($hasil){
                if($hasil == 'sukses'){
                    location.reload();
                }
            }
        });

    });



    // ========== users_MEMPELAI
    $(document).ready(function () {
         /** croppie shareurcodes.com **/
        var croppie = null;
        var el = document.getElementById('resizer');

        $.base64ImageToBlob = function(str) {
            /** extract content type and base64 payload from original string **/
            var pos = str.indexOf(';base64,');
            var type = str.substring(5, pos);
            var b64 = str.substr(pos + 8);
        
            /* decode base64 */
            var imageContent = atob(b64);
        
            /* create an ArrayBuffer and a view (as unsigned 8-bit) */
            var buffer = new ArrayBuffer(imageContent.length);
            var view = new Uint8Array(buffer);
        
            /* fill the view, using the decoded base64 */
            for (var n = 0; n < imageContent.length; n++) {
            view[n] = imageContent.charCodeAt(n);
            }
        
            /* convert ArrayBuffer to Blob */
            var blob = new Blob([buffer], { type: type });
        
            return blob;
        }

        $.getImage = function(input, croppie) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {  
                    croppie.bind({
                        url: e.target.result,
                    });
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        var fotonyasiapa = '';
        $(".file-upload").on("change", function(event) {
            $("#myModal").modal();
            fotonyasiapa = $(this).attr("id");
            console.log("foto_"+fotonyasiapa);
            /* Initailize croppie instance and assign it to global variable */
            croppie = new Croppie(el, {
                    viewport: {
                        width: 200,
                        height: 200,
                        type: 'square'
                    },
                    boundary: {
                        width: 250,
                        height: 250
                    },
                    enableOrientation: true
                });
            $.getImage(event.target, croppie); 
        });

        $("#upload").on("click", function() {
            croppie.result('base64').then(function(base64) {
                $("#myModal").modal("hide"); 
                $("#profile-pic").attr("src","/images/ajax-loader.gif");

                var url = "<?php echo base_url('admin/update_foto_users_mempelai') ?>";
                var formData = new FormData();
                formData.append("foto_"+fotonyasiapa, $.base64ImageToBlob(base64));
                formData.append("kunci", "<?= $kunci ?>");


                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                    console.log(data);
                        if (data == "uploadedbride") {
                            $("#profile-pic-bride").attr("src", base64); 
                        } else if(data == "uploadedgroom"){
                            $("#profile-pic-groom").attr("src", base64); 
                        } else if(data == "uploadedsampul"){
                            $("#profile-pic-sampul").attr("src", base64); 
                        } else {
                            $("#profile-pic").attr("src","/images/icon-cam.png"); 
                            console.log(data['profile_picture']);
                        }
                    },
                    error: function(error) {
                        console.log(error);
                        $("#profile-pic").attr("src","/images/icon-cam.png"); 
                    }
                });
            });
        });

        /* To Rotate Image Left or Right */
        $(".rotate").on("click", function() {
            croppie.rotate(parseInt($(this).data('deg'))); 
        });

        $('#myModal').on('hidden.bs.modal', function (e) {
            /* This function will call immediately after model close */
            /* To ensure that old croppie instance is destroyed on every model close */
            setTimeout(function() { croppie.destroy(); }, 100);
        });

});

      $('#simpanWanita').on('click', function(event) {

        var datanyaSiapa = 'wanita';
        var nama = $('#nama_lengkap_wanita').val();
        var nama_panggilan = $('#nama_panggilan_wanita').val();
        var nama_ayah = $('#nama_ayah_wanita').val();
        var nama_ibu = $('#nama_ibu_wanita').val();
        console.log(nama);
        $.ajax({
            url : "<?= base_url('admin/update_users_mempelai') ?>",
            method : "POST",
            data : {nama: nama,nama_panggilan: nama_panggilan, nama_ayah: nama_ayah, nama_ibu: nama_ibu, datanyaSiapa: datanyaSiapa},
            async : true,
            dataType : 'html',
            success: function($hasil){
                if($hasil == 'sukses'){
                    location.reload();
                }
            }
        });

      });

      $('#simpanPria').on('click', function(event) {

      var datanyaSiapa = 'pria';
      var nama = $('#nama_lengkap_pria').val();
      var nama_panggilan = $('#nama_panggilan_pria').val();
      var nama_ayah = $('#nama_ayah_pria').val();
      var nama_ibu = $('#nama_ibu_pria').val();

      $.ajax({
          url : "<?= base_url('admin/update_users_mempelai') ?>",
          method : "POST",
          data : {nama: nama,nama_panggilan: nama_panggilan, nama_ayah: nama_ayah, nama_ibu: nama_ibu, datanyaSiapa: datanyaSiapa},
          async : true,
          dataType : 'html',
          success: function($hasil){
              if($hasil == 'sukses'){
                  location.reload();
              }
          }
      });

      });


    //========== PENGATURAN 
    function nospaces(t){
      if(t.value.match(/\s/g)){
        t.value=t.value.replace(/\s/g,'');
      }
    }

    $('#simpanFitur').on('click', function(event) {

        var ucapan = $('#setUcapan').is(":checked") ? 1 : 0;
        var users_album = $('#setusers_Album').is(":checked") ? 1 : 0;
        var users_cerita = $('#setCerita').is(":checked") ? 1 : 0;
        var lokasi = $('#setLokasi').is(":checked") ? 1 : 0;

        console.log(ucapan);

        $.ajax({
            url : "<?= base_url('admin/update_fitur') ?>",
            method : "POST",
            data : {ucapan: ucapan,users_album: users_album, users_cerita: users_cerita, lokasi: lokasi},
            async : true,
            dataType : 'html',
            success: function($hasil){
                if($hasil == 'sukses'){
                    location.reload();
                }
            }
        });

    });

    $('#simpanDomain').on('click', function(event) {

      var domain = $('#domain').val();      

      $.ajax({
          url : "<?= base_url('admin/update_domain') ?>",
          method : "POST",
          data : {domain: domain},
            async : true,
            dataType : 'html',
          success: function($hasil){
              if($hasil == 'sukses'){
                  location.reload();
              }else{
                  $('#modalDomain').modal('hide'); 
                  $('#modalGagal').modal('show'); 
              }

              console.log($hasil);
          }
      });

    });

    //=======PROFIL
    $('#simpanUser').on('click', function(event) {

        var username = $('#username').val();
        var hp = $('#hp').val();
        var password = $('#password').val();
        var email = $('#email').val();

        $.ajax({
            url : "<?= base_url('admin/update_user') ?>",
            method : "POST",
            data : {username: username,password: password, hp: hp, email: email},
            async : true,
            dataType : 'html',
            success: function($hasil){
                if($hasil == 'sukses'){
                    location.reload();
                }
            }
        });

    });
	
	$('#simpanMusik').on('click', function(event) {

      var pilihan_musik = $('#pilihan_musik').val();      
        
      $.ajax({
          url : "<?= base_url('admin/update_musik') ?>",
          method : "POST",
          data : {pilihan_musik: pilihan_musik },
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