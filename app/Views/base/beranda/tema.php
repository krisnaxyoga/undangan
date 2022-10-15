<!DOCTYPE html>
<html Content-Language="ID" lang="id" xml:lang="id">
  <head>

    <!-- Umum meta tags -->
    <title><?= $website_umum[0]->website_isi ?> - <?= $website_umum[1]->website_isi ?></title> 
    <link rel="icon" href="<?php echo base_url() ?>/assets/base/img/favicon.ico?<?= date("Y-m-d"); ?>">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= $website_umum[2]->website_isi ?>">
    <meta name="keywords" content="<?= $website_umum[3]->website_isi ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#005CAA" />
    <meta name="author" content="<?= $website_umum[4]->website_isi ?>">
    <!-- FB meta tags -->
    <meta property="og:title" content="<?= $website_umum[7]->website_isi ?>">
    <meta property="og:description" content="<?= $website_umum[8]->website_isi ?>">
    <meta property="og:url" content="<?php echo base_url() ?>">
    <meta property="og:image" itemprop="image" content="<?php echo base_url() ?><?= $website_umum[10]->website_isi ?>">
    <meta property="og:image:width" content="<?= $website_umum[11]->website_isi ?>">
    <meta property="og:image:height" content="<?= $website_umum[12]->website_isi ?>">
    <meta property="fb:pages" content="<?= $website_umum[5]->website_isi ?>" />
    <meta name="facebook-domain-verification" content="<?= $website_umum[6]->website_isi ?>" />

    <!-- Required CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/base/css/bootstrap.min.css?" >
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/base/css/line-icons.css?">
    <link type="text/css" href="<?php echo base_url() ?>/assets/base/css/tema-web/<?= strtolower($website_umum[15]->website_isi) ?>/style.css?" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/base/vendor/fontawesome-free/css/all.min.css" >
     
  </head>

  <body id="atas">
    <header>
        <div class="container">
          <nav class="navbar navbar-expand-md fixed-top">
            <div class="container">
              <a class="navbar-brand" href="<?php echo base_url() ?>">
                <img class="rounded" src="<?php echo base_url() ?>/assets/base/img/logo-home.png?cache<?= date("Y-m-d"); ?>" height="35s" alt="image">
              </a>

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav3" aria-controls="navbarNav3" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
        
              <div class="collapse navbar-collapse" id="navbarNav3">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url()?>">BERANDA <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url()?>#fitur">FITUR</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url()?>#harga">HARGA</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url()?>#tema">TEMA</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url()?>#testi">TESTIMONI</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('login') ?>" style="font-weight:bolder">LOGIN</a>
                  </li>
                </ul>
        
              </div>
            </div>
          </nav>
        </div>
    </header>

      <section class="fdb-block temaUDO-tema d-flex align-items-center" >
        <div class="container align-items-end justify-content-center d-flex">
          <div class="row align-items-top text-center">
            <div class="col-12 col-md-12 col-lg-12">
              <h1 class="judul">Pilih Tema</h1>
              <p class="lead subjudul">Tersedia banyak pilihan tema undangan yang menarik untuk pernikahanmu..</p>
              </div>
          </div>
        </div>
      </section>

      <section class="fdb-block " id="tema">
        <div class="container">
          <div class="row">

          <?php foreach ($tema->getResult() as $row){ ?>
            <div class="col-lg-3 col-md-6 col-xs-12 mt-5" >
              <ul class="nav" style="left: 0%;position: absolute;top:0%;margin-left: 0.8rem;">
              <?php 
                //CEK PAKET
                $paket_turunan = explode (",",$row->paket_id_turunan);
                $jumlah_paket_turunan = count($paket_turunan);
                if ($row->paket_id=="1"){
                ?>
                  <li class="nav-item p-1 mb-1 bg-warning text-white">
                    <?= $row->paket_nama ?>
                  </li>
                <?php
                }elseif ($row->paket_id=="2"){
                ?>
                  <li class="nav-item p-1 mb-1 bg-success text-white">
                  <?= $row->paket_nama ?>
                  </li>
                <?php
                }else{
                ?>
                <li class="nav-item p-1 mb-1 bg-danger text-white">
                  <?= $row->paket_nama ?>
                </li>
                <?php
                }  
                ?> 

                <?php
                /*
                //Looping Paket_Turunan
                if ($jumlah_paket_turunan<>0){
                  for($i = 0; $i < $jumlah_paket_turunan; $i++) {
                    $nama_paket_turunan = $CI->ambil_nama_paket_by_id($paket_turunan[$i]);
                    if ($nama_paket_turunan<>""){
                      if ($paket_turunan[$i]=="1"){
                        ?>
                        <li class="nav-item p-1 mb-1 bg-warning text-white">
                           <?= $nama_paket_turunan[0]->paket_nama ?>
                        </li>
                        <?php
                      }elseif ($paket_turunan[$i]=="2"){
                        ?>
                        <li class="nav-item p-1 mb-1 bg-success text-white">
                          <?= $nama_paket_turunan[0]->paket_nama ?>
                        </li>
                        <?php
                      }elseif ($paket_turunan[$i]=="3"){
                        ?>
                        <li class="nav-item p-1 mb-1 bg-danger text-white">
                          <?= $nama_paket_turunan[0]->paket_nama ?>
                        </li>
                        <?php
                      } 
                    } 
                  }
                }*/
                ?>
              </ul> 
             <div class="fdb-box p-0">
                <img alt="image" class="img-fluid rounded-0" src="<?php echo base_url() ?>/assets/themes/<?= $row->nama_theme ?>/preview.png">
      
                <div class="content p-2 d-flex justify-content-center">
                <h3><strong><?= str_replace("_", " ", $row->nama_theme) ?></strong></h3>
                </div> 

                <div class="d-flex justify-content-center">
                  <p class="mt-2 mr-2"><a href="<?php echo base_url('order/'.$row->kode_theme) ?>" class="btn btn-info btn-sm"><i class="fa-solid fa-cart-shopping"></i> Pesan</a></p>  
                  <p class="mt-2"><a target="_blank" href="<?= base_url('demo/'.$row->nama_theme) ?>/Khairul Fikri & Keluarga" class="btn btn-dark btn-sm"><i class="fas fa-eye"></i> Demo</a></p>
                </div>
              </div>
            </div>
          <?php } ?>

          </div>
        </div>
      </section>

      <section class="fdb-block widget-footer"  id="widget-footer">
        <div class="container">
          <div class="row text-center">
            <div class="col-12">
            <a  href="#atas" data-toggle="tooltip" data-placement="top" title="Kembali ke atas">
              <i class="fa-solid fa-arrow-up text-success"></i>
            </a>
            </div>
          </div>
          <div class="row text-left mt-5">
            <div class="col-12 col-md-4">
              <div class="row"> 
                <div class="col-12">
                  <h3><strong><?= $widget_data_footer_kiri[0]->widget_judul ?></strong></h3>
                  <p><?= $widget_data_footer_kiri[0]->widget_isi ?></p>
                </div>
              </div>
            </div>
      
            <div class="col-12 col-md-4 pt-3 pt-sm-4 pt-md-0">
              <div class="row"> 
                <div class="col-12">
                  <h3><strong><?= $widget_data_footer_tengah[0]->widget_judul ?></strong></h3>
                  <?php
                    foreach ($widget_data_footer_tengah_links as $row_widget_data_footer_tengah_links ){
                  ?>
                    <a href="<?= base_url($row_widget_data_footer_tengah_links->widget_links_url) ?>"  style="color: #8f9fa6;text-decoration: none;" rel="no_follow"><i class="<?= $row_widget_data_footer_tengah_links->widget_links_icon ?>"></i> <?= $row_widget_data_footer_tengah_links->widget_links_judul ?></a>
                    <br/>
                  <?php
                    }
                  ?> 
                  </div>
              </div>
            </div>
      
            <div class="col-12 col-md-4 pt-3 pt-sm-4 pt-md-0">
              <div class="row"> 
                <div class="col-12">
                  <h3><strong><?= $widget_data_footer_kanan[0]->widget_judul ?></strong></h3>
                  <?php
                    foreach ($widget_data_footer_kanan_links as $row_widget_data_footer_kanan_links ){
                  ?>
                  <a href="<?= $row_widget_data_footer_kanan_links->widget_links_url ?>"  style="color: #8f9fa6;text-decoration: none;" rel="no_follow">
                    <i class="<?= $row_widget_data_footer_kanan_links->widget_links_icon ?>"></i> <?= $row_widget_data_footer_kanan_links->widget_links_judul ?>
                  </a>
                  <br/>
                  <?php
                    }
                  ?>    
                </div>
              </div>
            </div>
          </div> 
        </div>
      </section> 

      <footer class="fdb-block footer-small footer">
        <div class="container">
        <div class="col-12 text-lg-left">
            <p class="lead footer-social">
             </p>
          </div>
            <div class="row text-center">
            <div class="col">
            <p class="text-footer-home">
              <a href="<?php echo base_url() ?>" rel="dofollow" target="_blank">
                <?= $website_umum[0]->website_isi ?>
              </a> &#169; 
              <?php
               if ($website_umum[13]->website_isi == date("Y")){
                 echo $website_umum[13]->website_isi;
               }else{
                 echo $website_umum[13]->website_isi." - ".date("Y");
               }
               ?> <?= $website_umum[14]->website_isi ?>
            </p>
            </div>
            </div>
        </div>
    </footer>
      
    <script src="<?php echo base_url() ?>/assets/base/js/jquery-min.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/js/bootstrap.min.js"></script>
  </body>
</html>