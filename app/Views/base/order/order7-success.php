<div class="konten" style="display: flex;flex-grow: 1;overflow-x: hidden;flex-direction: row;margin-top: 60px;margin-bottom: 40px;">
    <section class="fdb-block  konten-order" style="padding-top: 20px;flex:1; ">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8 col-lg-8 col-xl-6">
            <div class="row">
              <div class="col text-center">
                <h1 style="color: #005CAA;margin-bottom:0px;">Sukses!</h1>
                <p tyle="font-size: 15px;font-weight:500; ">Hai kak! selamat undangan kamu sudah berhasil dibuat </p>
              </div>
            </div>

            <div class="row align-items-center">
              <div class="col mt-5">
                <label>Kode Pesanan</label>
                <div class="upload-area-bg" style="margin-top: 5px;text-align: center;">
                  
                  <div class="col">
                  <div class="row">
                    <div class="col">
                      <a style="font-size: 14px;text-transform: uppercase;color: #2c3e50;" >#<?= $kode ?></a>
                    </div>
                    <div class="col-auto">
                    <br/>
                      <?php if($status == 4){ ?>
                       <a href="<?= base_url('user/invoice') ?>" class="btn-info btn-sm" >Masa Aktif Habis</a>
                      <?php }else if($status == 3){ ?>
                       <a href="<?= base_url('user/invoice') ?>" class="btn-dark btn-sm" >Di Non-Aktifkan</a>
                      <?php }else if($status == 2){ ?>
                       <a href="<?= base_url('user/invoice') ?>" class="btn-success btn-sm" >Aktif dan Lunas</a>
                      <?php }else if($status == 1){ ?>
                       <a href="<?= base_url('user/invoice') ?>" class="btn-warning btn-sm" >Menunggu Konfirmasi Admin</a>
                      <?php }else{ ?> 
                        <a href="<?= base_url('user/invoice') ?>" class="btn-danger btn-sm" >Menunggu Pembayaran | Klik untuk Bayar</a>
                      <?php } ?>
                    </div>
                  </div>   
                </div>
                </div>
              </div>
            </div>

            <div class="row align-items-center">
              <div class="col mt-1">
                <label>Nama Domain / URL Undangan</label>
                <div class="upload-area-bg" style="margin-top: 5px;text-align: center;">
                  <a style="font-size: 14px;text-transform: lowercase;color: #007bff;" ><?= SITE_UNDANGAN?>/<?= $domain ?></a>
                  
                </div>
              </div>
            </div>

            <div class="row justify-content-start mt-3" >
                <div class="col">
                  <div class="row">
                    <div class="col">
                      <a href="<?= SITE_UNDANGAN?>/<?= $domain ?>" target="_blank" class="btn btn-primary btn-order btn-block">Buka Website</a>
                    </div>
                    <div class="col" <?php if($status == 1)echo "style='display:none'" ?>>
<?php $format = 
"Hallo min,
saya mau aktifasi Undangan *".$kode."*. 
mohon infonya " ?> 
                       <a href="<?= base_url('user/dashboard') ?>"  class="btn btn-success btn-order btn-block" >Dashboard</a>
                    </div>
                  </div>   
                </div>
            </div>
            
            <?php
              if($status != 2){
                ?>
              <div class="form-check mt-4" style="text-align: center;" >
                <label class="form-check-label" <?php if($status == 1)echo "style='display:none'" ?>>
                    Untuk melakukan aktifasi silahkan login ke dashboard user atau menghubungi admin kami via <a target="_blank" href="https://wa.me/<?= $admin_no_hp ?>/?text=<?php echo urlencode($format) ?>"  >Whtasapp (Klik DISINI untuk chat sekarang)</a> dengan menyertakan <strong>kode : <?= $kode ?></strong>.
                </label>
              </div>    
                <?php
              }
            ?>
            

          </div>
        </div>
      </div>
    </section>
</div>