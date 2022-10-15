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

    <meta name="theme-color" content="#6c5ce7" />

    <!-- Required CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/base/css/bootstrap.min.css?" >
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/base/css/line-icons.css?">
    <link type="text/css" href="<?php echo base_url() ?>/assets/base/css/tema-web/<?= strtolower($website_umum[15]->website_isi) ?>/style.css?" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/base/css/tema-web/<?= strtolower($website_umum[15]->website_isi) ?>/pikaday.css?">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/base/css/croppie.min.css?">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/base/vendor/fontawesome-free/css/all.min.css" >
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3477574739820906"
     crossorigin="anonymous"></script>
  </head>

  <body id="atas">
    <header>
        <div class="container">
          <nav class="navbar navbar-expand-md fixed-top">
            <div class="container">
              <a class="navbar-brand navbar-order" href="<?php echo base_url() ?>">
                <img class="rounded" src="<?php echo base_url() ?>/assets/base/img/logo-home.png?cache<?= date("Y-m-d"); ?>" height="35" alt="image">
              </a>
            </div>
          </nav>
        </div>
    </header>

    <div class="konten" style="display: flex;flex-grow: 1;overflow-x: hidden;flex-direction: row;margin-top: 60px;margin-bottom: 0px;">
        <section class="fdb-block home-tutorial-konten" style="padding-top: 0px;flex:1; ">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-md-8 col-lg-8 col-xl-6">

                <div class="row">
                  <div class="col text-center">
                    <h1 style="color: #005CAA;margin-bottom:0px;">Tutorial!</h1>
                    <p tyle="font-size: 15px;font-weight:500; ">Cara menambahkan video ke undangan </p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col text-left">
                    <p tyle="font-size: 15px;font-weight:500; ">1. Pastikan video kamu sudah di upload di <a href="https://www.youtube.com" target="_blank" >Youtube.com</a></p>
                    <p tyle="font-size: 15px;font-weight:500; ">2. Setelah itu buka vide kamu di youtube dan tekan tombol bagikan</p>
                    <img src="<?= base_url() ?>/assets/base/img/tutorial/youtube1.png" width="100%">
                    <p tyle="font-size: 15px;font-weight:500; ">3. Akan muncul tampilan seperti gambar di bawah ini, copy link nya dengan menekan tombol salin</p>
                    <img src="<?= base_url() ?>/assets/base/img/tutorial/youtube2.png" width="100%">
                    <p tyle="font-size: 15px;font-weight:500; ">4. Ingat!! pastikan link youtube nya formatnya sama seperti digambar <strong>https://youtu.be/</strong> </p>
                    <p tyle="font-size: 15px;font-weight:500; ">5. Terakhir tinggal kamu masukkan linknya ke dalam form yang sudah disediakan kemudian simpan</p>
                    <img src="<?= base_url() ?>/assets/base/img/tutorial/youtube3.png" width="100%">
                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>
    </div>

    <section class="fdb-block widget-footer" id="widget-footer">
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
                    foreach ($widget_data_footer_tengah_link as $row_widget_data_footer_tengah_link ){
                  ?>
                    <a href="<?= base_url($row_widget_data_footer_tengah_link->widget_links_url) ?>"  style="color: #8f9fa6;text-decoration: none;" rel="no_follow"><i class="<?= $row_widget_data_footer_tengah_link->widget_links_icon ?>"></i> <?= $row_widget_data_footer_tengah_link->widget_links_judul ?></a>
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
                    foreach ($widget_data_footer_kanan_link as $row_widget_data_footer_kanan_link ){
                  ?>
                  <a href="<?= $row_widget_data_footer_kanan_link->widget_links_url ?>"  style="color: #8f9fa6;text-decoration: none;" rel="no_follow">
                    <i class="<?= $row_widget_data_footer_kanan_link->widget_links_icon ?>"></i> <?= $row_widget_data_footer_kanan_link->widget_links_judul ?>
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
    <script src="<?php echo base_url() ?>/assets/base/js/jquery.nav.js"></script>    
    <script src="<?php echo base_url() ?>/assets/base/js/jquery.easing.min.js"></script>     
    <script src="<?php echo base_url() ?>/assets/base/js/main.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/js/moment-with-locales.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/js/pikaday.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/js/dropzone.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/js/croppie.min.js"></script>
  </body>
</html>