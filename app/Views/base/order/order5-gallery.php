<div class="konten" style="display: flex;flex-grow: 1;overflow-x: hidden;flex-direction: row;margin-top: 60px;margin-bottom: 40px;">
    <section class="fdb-block  konten-order" style="padding-top: 20px;flex:1; ">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8 col-lg-8 col-xl-6">
            <div class="row">
              <div class="col text-center">
                <h1 style="color: #005CAA;margin-bottom:0px;">Album!</h1>
                <p tyle="font-size: 15px;font-weight:500; ">Hai kak! di isi dulu ya datanya </p>
              </div>
            </div>
            
            <div class="progress" style="margin-top: 10px;">
              <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
            </div>
            <div class="form-check mt-4 border-left pl-4 border-primary">
                    <label class="form-check-label ">
                        <input type="checkbox" class="form-check-input" id="skipGalleryatas" name="skipGalleryatas" required>
                        <a style="margin-top: 105px;color: #2c3e50;position: relative;top: 3px;left: 6px;"> Jangan Aktifkan Fitur Ini</a>
                    </label>
              </div>
              
            <div id="konten-gallery">
            
              <!-- <form action="" method="post" enctype="multipart/form-data"> -->
                <div class="row align-items-center mt-4">
                   <label>Upload Foto Album : </label>
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
                        <button class="upload-area-button btn " style="z-index:9999;">
                          <span>Browse files</span>
                        </button>
                      </div>
                    </div>

                  </div>

                </div>
              <!-- </form> -->
              <div style="text-align: center;">
                <img id="loading" src="<?= base_url() ?>/rev/suzuran/loading.svg"  style="height: 30px;width: 30px; display: none;" />
              </div>
              <div id="previewss">
                  <?php 
                    $generate = $_SESSION['dummy'];
                    for($a=1;$a<=10;$a++){
                      $pathName = 'assets/users/'.$generate.'/album'.$a.'.png';
                      if(!file_exists($pathName))continue;
                  ?>

                  <div class="preview-uploads" id="preview<?= $a ?>">
                    <div class="preview-uploads-img">
                        <span class="preview">
                          <img id="img<?= $a ?>" src="<?= base_url() ?>/assets/users/<?= $generate ?>/album<?= $a ?>.png"  style="height: 100%;object-position: center;object-fit: cover;width: 100%;"  />
                        </span>
                    </div>
                    <div class="preview-uploads-name">
                      <b><p class="name" style="line-height: revert;font-size: 12px;" >album<?= $a; ?></p></b>
                      <strong class="error text-danger" style="line-height: revert;font-size: 12px;"  data-dz-errormessage></strong>
                      <p class="size" style="line-height: revert;font-size: 12px;"  >-</p>     
                    </div>
                    <div  class="preview-uploads-delete">
                      <button id="<?= $a ?>" data-dz-remove class="btn btn-danger delete btnhehe">
                         Hapus
                      </button>
                    </div>
                  </div>

                  <?php
                    }
                  ?>
              </div>
          </div>
          
            <form method="post" action="<?= base_url('order/finish'); ?>">
              <input type="checkbox" class="form-check-input" value="0" id="skipGallery" name="skipGallery" hidden>

              <div class="row justify-content-start mt-3" >
                <div class="col">
                  <div class="row">
                    <div class="col-auto">
                      <a href="<?= base_url('order/4') ?>" class="btn btn-secondary btn-order">Kembali</a>
                    </div>
                    <div class="col">
                      <input type="submit" name="submit" class="btn btn-primary btn-order btn-block" style="background-color: #005CAA;" value="Lanjut" id="tombolLanjutORDER5" disabled>
                    </div>
                  </div>   
                </div>
              </div>
            </form>
            <br/>
            <labe><sup class="text-danger">Tips!</sup> Jika tidak mau upload foto Album maka silahkan Centang pilihan <b>Jangan Aktifkan Fitur Ini</b> diatas, maka tombol <b>Lanjut</b> akan aktif.</labe>

          </div>
        </div>
      </div>
    </section>
</div>
