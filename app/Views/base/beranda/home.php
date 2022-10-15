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

    <meta name="theme-color" content="#005CAA" />
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
              <a class="navbar-brand" href="<?php echo base_url() ?>/">
                <img  class="rounded" src="<?php echo base_url() ?>/assets/base/img/logo-home.png?cache<?= date("Y-m-d"); ?>" height="35" alt="image">
              </a>

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav3" aria-controls="navbarNav3" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
        
              <div class="collapse navbar-collapse" id="navbarNav3">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">BERANDA <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#fitur">FITUR</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#harga">HARGA</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#tema">TEMA</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link" href="#testi">TESTIMONI</a>
                  </li> 
                  <li class="nav-item">
                    <?php 
                      if ($sudah_login =="sudah"){
                        ?>
                        <a class="nav-link" href="<?= base_url('user/dashboard') ?>" style="font-weight:bolder">AKUN SAYA</a>
                        <?php
                      }else{
                        ?>
                        <a class="nav-link" href="<?= base_url('login') ?>" style="font-weight:bolder">LOGIN</a>
                        <?php
                      }
                    ?>
                    
                  </li>
                </ul>
        
              </div>
            </div>
          </nav>
        </div>
    </header>

      <section class="fdb-block cover d-flex align-items-center" style="border-radius: 0px 0px 94px 94px;" >
        <div class="container align-items-end justify-content-center d-flex">
          <div class="row align-items-top text-left">
            <div class="col-12 col-md-6 col-lg-6">
              <h1 class="judul"><?= $website_umum[0]->website_isi ?></h1>
              <p class="lead subjudul"><?= $widget_data_cover[0]->widget_isi ?></p>
              <div class="row">
              <?php
                foreach ($widget_data_cover_links as $row_widget_data_cover_links ){
              ?>
              
                <div class="col-lg-6 mb-5">
                <a href="<?= base_url() ?>/<?= $row_widget_data_cover_links->widget_links_url ?>" class="btn btn-info">
                  <?= $row_widget_data_cover_links->widget_links_judul ?>
                   
                  
                </a>
                </div>
              <?php
                }
              ?>
              </div>
            </div>
      
            <div class="col-12 col-sm-4 col-md-6 col-lg-4 m-auto">
              <img alt="image" class="rounded-circle img-fluid " src="<?php echo base_url() ?>/assets/base/img/home-foto-model.png?<?= date("Y-m-d"); ?>">
            </div>
          </div>
        </div>
      </section>

      <section class="fdb-block fitur" id="fitur">
        <div class="container">
          <div class="row text-center">
            <div class="col-12">
              <h1><?= $widget_data_fitur[0]->widget_judul ?></h1>
            </div>
          </div>
          <div class="row text-left mt-5">
          <?php
            foreach ($widget_data_fitur_links as $row_widget_data_fitur_links ){
          ?>  
            <div class="col-12 col-md-4">
              <div class="row">
                <div class="col-3">
                  <img alt="image" class="fdb-icon" src="<?php echo base_url() ?>/<?= $row_widget_data_fitur_links->widget_links_icon ?>">
                </div>
                <div class="col-9">
                  <h3><strong><?= $row_widget_data_fitur_links->widget_links_judul ?></strong></h3>
                  <p><?= $row_widget_data_fitur_links->widget_links_deskripsi ?></p>
                </div>
              </div>
            </div> 
          <?php
            }
          ?> 
          </div>
      
          
        </div>
      </section>

      <section class="fdb-block paketUDO"  id="harga">
        <div class="container">
          <div class="row text-center">
            <div class="col">
              <h2 class="text-white"><?= $widget_data_paket_udo[0]->widget_judul ?></h2>
            </div>
          </div>

          

          <div class="row mt-5 align-items-center">
            <div class=" col-md-12 col-lg-12">
            <?= $widget_data_paket_udo[0]->widget_isi ?> 
            </div>

            <?php  
            $temaTEXT = array("text-warning", "text-success", "text-danger");
            $temaBUTTON = array("btn-warning", "btn-success", "btn-danger");
            $no='0';
            foreach ($undangan_paket->getResult() as $undangan_paket_row){ ?>
            <div class=" col-md-4 m-auto col-lg-4 text-center pt-4 pt-lg-0">
              <div class="fdb-box px-4 pt-5
                <?php if ($undangan_paket_row->paket_status=='TIDAK AKTIF'){echo 'bg-light text-muted';} ?>
                ">

                <h2 class="<?= $temaTEXT[$no] ?>"><?= $undangan_paket_row->paket_nama ?></h2>
                <p class="lead"><?= $undangan_paket_row->paket_keterangan ?></p>
               
                <?php
                if ($undangan_paket_row->paket_limit_waktu==0){
                  $masaaktifnya = "Aktif selamanya.";
                }else{
                  $masaaktifnya = $undangan_paket_row->paket_limit_waktu." hari masa aktif.";
                }
                ?>
                <i class="fa-solid fa-calendar-days text-info"></i> <?= $masaaktifnya ?><br/>
                <?php  
                $jumlahtemapaketini = $CI->ambil_count_undangan_tema_by_paket_id($undangan_paket_row->paket_id); 
                //Jangan tampil jika tema masih kosong
                if ($jumlahtemapaketini[0]->jumlahtemapaketini<>"0"){
                ?> 
                <i class="fa-solid fa-circle-check text-info"></i> <?= $jumlahtemapaketini[0]->jumlahtemapaketini ?> pilihan tema tersedia <br/>
                <?php
                }
                //CEK PAKET_ID_TURUNANNYA
                if ($undangan_paket_row->paket_id_turunannya<>""){
                  $array_turunannya = explode (",",$undangan_paket_row->paket_id_turunannya);
                  $jumlah_turunannya = count($array_turunannya);
                  if ($jumlah_turunannya<>0){
                    for($a = 0; $a < $jumlah_turunannya; $a++) {
                      $jumlahtemapaketini = $CI->ambil_count_undangan_tema_by_paket_id($array_turunannya[$a]);
                      $nama_paketnya = $CI->ambil_nama_paket_by_id($array_turunannya[$a]);
                      //Jangan tampil jika tema masih kosong
                      if ($jumlahtemapaketini[0]->jumlahtemapaketini<>"0"){
                        echo '
                        <i class="fa-solid fa-circle-check text-info"></i> '.$jumlahtemapaketini[0]->jumlahtemapaketini.' tema PAKET '.$nama_paketnya[0]->paket_nama.' <br/>
                        ';
                      }
                      
                    }
                  }
                } 
                ?> 
                <i class="fa-solid fa-clipboard-list text-info"></i> Layanan Album, Lokasi, Musik, dan lainnya.<br/>
                
                <p class="h1 mt-5 mb-5"><sup><strike>Rp <?= number_format($undangan_paket_row->paket_harga_normal,2,",",".") ?></strike></sup><br>
                  
                  <span class="<?= $temaTEXT[$no] ?>">Rp <?= number_format($undangan_paket_row->paket_harga_diskon,0,",",".") ?></span></p>
      
                <p>
                <?php 
                  if ($undangan_paket_row->paket_status=='TIDAK AKTIF'){
                    ?>
                    <button class="btn bg-secondary text-white" disabled><?= $widget_data_paket_udo_links[0]->widget_links_judul ?></button>
                    <?php
                  }else{
                    ?>
                    <a href="<?= base_url() ?>/<?= $widget_data_paket_udo_links[0]->widget_links_url ?>" class="btn <?= $temaBUTTON[$no] ?> text-white" ><?= $widget_data_paket_udo_links[0]->widget_links_judul ?></a>
                    <?php
                  }
                ?>   
                </p>
              </div>
            </div> 
            <?php
             $no=$no+1;
            }

            
            ?>

          </div>
          
         


        </div>
      </section>

      <section class="fdb-block temaUDO-home" id="tema">
        <div class="container">
          <div class="row text-center justify-content-center">
            <div class="col-12">
              <h2><?= $widget_data_tema[0]->widget_judul ?></h2>
              <p class="lead"><?= $widget_data_tema[0]->widget_isi ?></p>
            </div>
          </div>
    
          <div class="row">
            <?php 
            $no = 1;
            foreach ($undangan_tema->getResult() as $row){ ?>
              <div class="col-lg-3 col-md-6 col-xs-12 mt-5">
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
                  } */
                ?>
                </ul>  
                <div class="fdb-box p-0">
                  <img alt="image" class="img-fluid rounded-0" src="<?php echo base_url() ?>/assets/themes/<?= $row->nama_theme ?>/preview.png">
        
                  <div class="content p-2 d-flex justify-content-center">
                    <h3><strong><?= str_replace("_", " ", $row->nama_theme) ?></strong></h3>
                  </div>

                  <div class="d-flex justify-content-center">
                    <p class="mt-2 mr-2"><a href="<?= base_url('/order/'.$row->kode_theme) ?>" class="btn btn-info btn-sm"><i class="fa-solid fa-cart-shopping"></i> Pesan</a></p>  
                    <p class="mt-2"><a target="_blank" href="<?= base_url('/demo/'.$row->nama_theme) ?>/Khairul Fikri & Keluarga" class="btn btn-dark btn-sm"><i class="fas fa-eye"></i> Demo</a></p>
                  </div>
                </div>
              </div>
            <?php 
            if ($no++ == 4) break;
            } 
            ?>
          </div>

          <div class="d-flex justify-content-center">
          <?php
            foreach ($widget_data_tema_links as $row_widget_data_tema_links ){
          ?>
            <p class="mt-4"><a href="<?= base_url($row_widget_data_tema_links->widget_links_url) ?>" class="btn btn-tema-lihat-semua"><?= $row_widget_data_tema_links->widget_links_judul ?></a></p>
          <?php
            }
          ?>
          </div>

        </div>
      </section>

      
      <section class="fdb-block testi" id="testi">
        <div class="container ">
          <div class="row text-center justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
              <h2><?= $widget_data_testimoni[0]->widget_judul ?></h2>
              <p class="lead"></p>
            </div>
          </div> 
          <div  class="row mt-5 align-items-center justify-content-center testi-konten">
             
          <?php 
            $a = 1;
            foreach ($users_testimoni->getResult() as $users_testimoni_row){ 
              //CEK Foto ADA atau Tidaknya
              $kitaPNG = 'assets/users/'.$users_testimoni_row->kunci.'/kita.png'; 
              if (file_exists($kitaPNG)){
                $kitaPNG = base_url($kitaPNG);
              }else{
                $kitaPNG = base_url().'/assets/base/img/kita.png';
              }  
              
              ?> 
            <div xmlns:v="http://rdf.data-vocabulary.org/#" typeof="v:Review" class="col-md-8 col-lg-4 testi-konten-item">
              <div class="fdb-box testi-konten-item-nya">
                <div class="row no-gutters align-items-center">
                  <div class="col-12">
                    <img alt="image" class="img-fluid rounded col-4" src="<?php echo $kitaPNG ?>">
                  </div>
                  <div class="col-12 mt-1 ml-auto">
                    <p>
                    <span property="v:itemreviewed" hidden><?= base_url() ?></span>
                    <span property="v:reviewer"><strong><?= $users_testimoni_row->nama_panggilan_pria." & ".$users_testimoni_row->nama_panggilan_wanita ?></strong></span> <br/>
                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                  <em>
                    <?php
                    for ($b = 0; $b < $users_testimoni_row->testimoni_rating; $b++) {
                      ?>  
                    <i class="fas fa-star text-warning"></i>
                    <?php 
                    } 
                    for ($c = 5; $c > $users_testimoni_row->testimoni_rating; $c--) {
                    ?>  
                    <i class="fa fa-star "></i>
                    <?php 
                    } 
                    ?>
                      <span property="v:rating"><?= $users_testimoni_row->testimoni_rating ?></span> Bintang 
                    </em> <Br>
                    <em>
                      <span property="v:dtreviewed" content="<?= $users_testimoni_row->testimoni_tanggal ?>">pada <?= date("D, d M Y", strtotime($users_testimoni_row->testimoni_tanggal)) ?></span>.
                    </em>
                    </p>
                    <p >
                      <span property="v:summary">
                        "<?= $users_testimoni_row->testimoni_isi ?>"
                      </span>
                    </p>
                    <span property="v:description" hidden>Undangan digital berupa website untuk pernikahanmu. Lebih praktis, keren dan kekinian.</span>
                  </div>
                </div>
              </div>
            </div>
            <?php 
            if ($a++ == 10) break;
            } 
            ?>
              
          </div>
         
        </div>
      </section> 

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
            <?php
            if ($website_umum[16]->website_isi == "Aktif"){
              $ambilListTemaWebsite = $website_umum[17]->website_isi;
              $variabelListTemaWebsite = explode ("," , $ambilListTemaWebsite);
              $jumlahTemaWebsite = count($variabelListTemaWebsite);
              ?>
              <select titel="Ganti Tema Website" class="gantiTEMA-home" name="simpanTemaWebsite" id="simpanTemaWebsite">
                <?php
                for ($a=0; $a < $jumlahTemaWebsite; $a++){
                  ?>
                  <option value="<?= $variabelListTemaWebsite[$a] ?>" <?php if ($website_umum[15]->website_isi == $variabelListTemaWebsite[$a]){ echo "selected";} ?> ><?= $variabelListTemaWebsite[$a] ?></option>
                  <?php
                }
                ?>
               </select>
              <?php
            }
            ?>
            
        </div>
        
    </footer>
      
    <script src="<?php echo base_url() ?>/assets/base/js/jquery-min.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/js/bootstrap.min.js"></script>
    <script>
      $('#simpanTemaWebsite').on('change', function(event) { 
          var TemaWebsite = $('#simpanTemaWebsite').val(); 
          $.ajax({
              url : "<?= base_url('tema-website-update') ?>",
              method : "POST",
              data : {TemaWebsite: TemaWebsite},
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
  </body>
</html>