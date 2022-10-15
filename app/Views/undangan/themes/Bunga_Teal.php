<!DOCTYPE html>
<html lang="id" >
<head>
<?php  
foreach ($undangan_pengaturan->getResult() as $row){
    $kunci = $row->kunci;  
} 
//Cek Ada musik atau tidak 
$filename = $users_order_musik[0]->musik;
$pathName = 'assets/music/'.$filename ;
if(file_exists($pathName)){
    $musiknya = '/assets/music/'.$filename ;
}else{
	$musiknya = "/assets/music/default.mp3";
}
//CEK Foto ADA atau Tidaknya
$kitaPNG = 'assets/users/'.$kunci.'/kita.png';
$groomPNG = 'assets/users/'.$kunci.'/groom.png';
$bridePNG = 'assets/users/'.$kunci.'/bride.png';
if (file_exists($kitaPNG)){
	$kitaPNG = base_url($kitaPNG);
}else{
	$kitaPNG = base_url().'/assets/base/img/kita.png';
}
if (file_exists($groomPNG)){
	$groomPNG = base_url($groomPNG);
}else{
	$groomPNG = base_url().'/assets/base/img/groom.png';
}
if (file_exists($bridePNG)){
	$bridePNG = base_url($bridePNG);
}else{
	$bridePNG = base_url().'/assets/base/img/bride.png';
}	
?>
    <?php foreach ($users_mempelai->getResult() as $row){ ?>
    <title><?php echo $row->nama_panggilan_pria." & ".$row->nama_panggilan_wanita; ?> </title> 

	<!-- REQUIRED META AREA	 -->
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#f5f6fa" />
    <meta property="og:title" content="The Wedding of <?php echo $row->nama_panggilan_pria." & ".$row->nama_panggilan_wanita; ?>">
    <meta property="og:description" content="<?php echo 'Hello ' ; if (isset($invite)){echo $invite;} ; echo  '! Kamu Di Undang..'; ?>">
    <meta property="og:url" content="<?= base_url(''.$domain.'/'.$tamu_undangan) ?>">
	<meta property="og:image" itemprop="image" content="<?= $kitaPNG ?>">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
    <meta property="og:type" content="website" />
    <?php }?>

	<!-- CSS STYLE AREA	 -->
    <link rel="icon" href="<?php echo base_url() ?>/assets/base/img/favicon.ico?<?= date("Y-m-d"); ?>">
    <link href="<?php echo base_url() ?>/assets/themes/Bunga_Teal/css/bootstrap.min.css?" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/themes/Bunga_Teal/css/jquery.fancybox.css?" rel="stylesheet">	
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/themes/Bunga_Teal/mdi/css/materialdesignicons.min.css?">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/themes/Bunga_Teal/css/style.css?">
	<?php
	if ($cek_koneksi_internet == true){
	?>
		<script src="https://www.google.com/recaptcha/api.js"></script>
	<?php
	}
	?>
    
</head>

<body>
<!-- ============== HALAMAN AWAL =============== -->
<div class="thebegining">
	<div class="content-thebegining">
		<div style="position: relative;text-align: center;display:block;margin-top:70px">
			<img src="<?= $kitaPNG ?>" class="cover-foto"/>
			<!-- image border cover -->
            <img src="<?= base_url() ?>/assets/themes/Bunga_Teal/img/bg-flower.png" class="cover-border" /><br>
			<!-- image border cover -->
		</div>
	</div>

	<div class="salam">
		<br/><br/><br/><br/><br/><br/><br/><br/><br/>
		<p style="font-weight: bold;font-size: 30px;color: #ffffff;">Halo...</p><br>
		
		<?php 
			if(!empty($invite)){
		?>
		<div style=" color: #fff; background-image: url('<?= base_url() ?>/assets/base/img/undangan_sampul/bg-nama-undangan-3-putih.png');font-weight: normal; font-size: 15px;  width: 100%; height: 50px; margin:auto;height: 86px; background-position: center; background-repeat: no-repeat; background-size: unset; text-align: center; padding: 33px;">
			<b>	
				<?php 		
					echo $invite;
				?>
			</b>
		</div> 	
		<?php 		 
			}else{
		?>	
		<div style="color: #fff;  background-image: url('');font-weight: normal; font-size: 15px; width: 100%; height: 50px; margin:auto;height: 86px; background-position: center; background-repeat: no-repeat; background-size: unset; text-align: center; padding: 33px;">
			<b>	
				<?php
					echo "Anda diundang ke pesta pernikahan kami :D";
				?>
			</b>
		</div> 	
		<?php		
			}
		?>  
		<br>  	
	</div>
		<a style="font-weight: bold;font-size: 16px;color: #fff;position: absolute;bottom: 20px;right: 0;left: 0;">klik untuk membuka undangan</a>
</div>		

<div class="dekorasi-all">
	<!-- GAMBAR DEKORASI TENGAH -->
	<!-- <img id="" src="<?php echo base_url() ?>/assets/themes/Bunga_Teal/img/top_flower.png" class="imgatas">  -->

	<!-- GAMBAR DEKORASI KIRI -->
	<!-- <img src="<?php echo base_url() ?>/assets/themes/Bunga_Teal/img/kiri-atas.png" class="imgatas-kiri"> -->
	<!-- GAMBAR DEKORASI KANAN --> 
	<img src="<?php echo base_url() ?>/assets/themes/Bunga_Teal/img/kanan-atas.png" class="imgatas-kanan"> 
</div>

<div class="dekorasi-sampul">
	<!-- GAMBAR DEKORASI TENGAH -->
	<!-- <img id="" src="<?php echo base_url() ?>/assets/themes/Bunga_Teal/img/top_flower.png" class="imgatas">  -->
	
	<!-- GAMBAR DEKORASI KIRI -->
	<!-- <img src="<?php echo base_url() ?>/assets/themes/Bunga_Teal/img/kiri-atas.png" class="imgatas-kiri"> -->
	<!-- GAMBAR DEKORASI KANAN --> 
	<!-- <img src="<?php echo base_url() ?>/assets/themes/Bunga_Teal/img/kanan-atas.png" class="imgatas-kanan"> -->
</div>

<div id="konten" style="z-index: 1;">
 

	<!-- ============== MUSIK =============== -->
	<audio loop src="<?php echo base_url() ?><?= $musiknya ?>" id="audio" ></audio>
	<?php 
	//BUKA:::SAMPUL dan  users_MEMPELAI
	foreach ($users_mempelai->getResult() as $row_users_mempelai){  ?>
	<!-- ============== SAMPUL =============== -->	
		
	<div id="sampul-konten" class="konten" >                	
      	<table style="width: 100%;margin-top:-50px"> <!-- tambahkan margin-top:-XX jika kurang ketas -->
      		<tbody>
      		 <tr>
                <th style="text-align: center;">
                    <span class="the-wedding">- THE WEDDING OF -</span>
                </th>
            </tr>
            <tr>
                <th style="position: relative;text-align: center;display:block;margin-top:40px">
					<img src="<?= $kitaPNG; ?>" class="cover-foto"/>
					
					<!-- image border cover -->
                    <img src="<?= base_url() ?>/assets/themes/Bunga_Teal/img/bg-flower.png" class="cover-border" /><br>
					<!-- image border cover -->

                </th>
			</tr>
			<tr>
      			<th style="text-align: center;margin-top:40px;margin-bottom:15px;display: block;">
                    <span class="nama-mempelai"><?php echo $row_users_mempelai->nama_panggilan_pria; ?> & <?php echo $row_users_mempelai->nama_panggilan_wanita; ?></span>
                </th>
			</tr>
			<tr>
      			<th style="text-align: center;">
				  <span class="tanggal-weddingnya" ></span>   
                </th>
      		</tr>
      		</tbody>
      	</table>
    </div>
	
	<!-- ============== users_MEMPELAI =============== -->
    <div id="users_mempelai-konten" class="konten" style="display: none;">   
		<img src="<?php echo base_url() ?>/assets/base/img/bismillah.png" class="mempelai-salam-pembuka"/><br>
        <br/>

		<?php
		//Load Sepatah kata di Mempelai
		foreach ($undangan_sepatah_kata->getResult() as $row_undangan_sepatah_kata){ 
			if ($row_undangan_sepatah_kata->sepatah_kata_halaman == "mempelai"){
				//Simpan
				$kata2_mempelai = $row_undangan_sepatah_kata->sepatah_kata_isi;
			}
		}
		?>
		<p class="mempelai-intermezzo" ><?php echo $kata2_mempelai; ?></p>
		 

        <img src="<?= $groomPNG; ?>" class="mempelai-img" />

        <h1 class="mempelai-pria-nama"><?php echo $row_users_mempelai->nama_pria; ?></h1>
        <p class="mempelai-pria-ortu"><?php echo "Putra dari Bpk. ".$row_users_mempelai->nama_ayah_pria . " dan Ibu " .$row_users_mempelai->nama_ibu_pria  ?></p> 
        <h1 class="dengan">dengan</h1>

        <img src="<?= $bridePNG; ?>" class="mempelai-img"/>

        <h1 class="mempelai-wanita-nama"><?php echo $row_users_mempelai->nama_wanita; ?></h1>
        <p class="mempelai-wanita-ortu"><?php echo "Putri dari Bpk. ".$row_users_mempelai->nama_ayah_wanita . " dan Ibu " .$row_users_mempelai->nama_ibu_wanita  ?></p>
 
    </div>
    <?php 
	//TUTUP:::SAMPUL dan  users_MEMPELAI
	} ?>  

	<!-- ============== users_ACARA =============== -->
	<?php  
	foreach ($users_acara->getResult() as $row_users_acara){ 
		$tanggal_akad =  $row_users_acara->tanggal_akad;
		$tanggal_resepsi =  $row_users_acara->tanggal_resepsi;
	?>
    <div id="users_acara-konten" style="display: none;" class="konten">

    	<div class="section-title">
            <h2> Acara </h2>
	    </div>

	    <div class="acaranya" >
			<table class="tb-acara">
				<thead>
					<th colspan="4" class="acara-title">
						<img src="<?php echo base_url() ?>/assets/themes/Bunga_Teal/img/akad-badge.png">
					</th>
				</thead>
				<tbody>
					<tr>
						<th class="tb-ic-acara"><i class="mdi mdi-calendar icon-acara" ></th>
						<th class="tb-ket-acara"> Tanggal</th>
						<th class="tb-anu-acara">:</th>
						<th class="tb-isi-acara" id="tanggal-acara-akad"><?php echo $row_users_acara->tanggal_akad; ?></th>
					</tr>

					<tr>
						<th class="tb-ic-acara"><i class="mdi mdi-timer icon-acara" ></th>
						<th class="tb-ket-acara"> Jam</th>
						<th class="tb-anu-acara">:</th>
						<th class="tb-isi-acara"><?php echo $row_users_acara->jam_akad; ?></th>
					</tr>

					<tr>
						<th class="tb-ic-acara"><i class="mdi mdi-map-marker icon-acara" ></th>
						<th class="tb-ket-acara"> Tempat</th>
						<th class="tb-anu-acara">:</th>
						<th class="tb-isi-acara"><?php echo $row_users_acara->tempat_akad; ?><br><?php echo $row_users_acara->alamat_akad; ?></th>
					</tr>


				</tbody>
			</table>		

			<table class="tb-acara">
				<thead>
					<th colspan="4" class="acara-title">
						
					<img src="<?php echo base_url() ?>/assets/themes/Bunga_Teal/img/resepsi-badge.png">
					</th>
				</thead>
				<tbody>
					<tr>
						<th class="tb-ic-acara"><i class="mdi mdi-calendar icon-acara"></th>
						<th class="tb-ket-acara"> Tanggal</th>
						<th class="tb-anu-acara">:</th>
						<th class="tb-isi-acara " id="tanggal-acara-resepsi"><?php echo $row_users_acara->tanggal_resepsi; ?></th>
					</tr>

					<tr>
						<th class="tb-ic-acara"><i class="mdi mdi-timer icon-acara" ></th>
						<th class="tb-ket-acara"> Jam</th>
						<th class="tb-anu-acara">:</th>
						<th class="tb-isi-acara"><?php echo $row_users_acara->jam_resepsi; ?></th>
					</tr>

					<tr>
						<th class="tb-ic-acara"><i class="mdi mdi-map-marker icon-acara" ></th>
						<th class="tb-ket-acara"> Tempat</th>
						<th class="tb-anu-acara">:</th>
						<th class="tb-isi-acara"><?php echo $row_users_acara->tempat_resepsi; ?><br><?php echo $row_users_acara->alamat_resepsi; ?></th>
					</tr>


				</tbody>
			</table>			
		</div>
    </div>
    <?php } ?> 

	<!-- ============== users_ALBUM =============== -->
	<div id="users_album-konten" style="display: none;">
		<section class="gallery-section section-padding" id="gallery">
				<div class="container">
					<div class="row">
						<div class="col col-xs-12">
							<div class="section-title">
								<h2>Album Kami</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col col-xs-12">
							<div class="gallery-grids">

							<?php  foreach($users_album as $key => $datausers_album) {  ?>

								<div class="grid">
									<a href="<?php echo base_url() ?>/assets/users/<?php echo $kunci.'/'.$datausers_album['album'] ?>.png" class="fancybox" data-fancybox-group="gall-1">
										<img src="<?php echo base_url() ?>/assets/users/<?php echo $kunci.'/'.$datausers_album['album']; ?>.png" alt>
									</a>
								</div>

							<?php } ?>

							</div>
							
						</div>
						<?php 
						// ALBUM VIDEO
						$youtube = $users_album_video[0]->video;
						?>
						<?php if($youtube != ""){ 
								$embed = str_replace("youtu.be","www.youtube.com/embed","$youtube");
								$unik = str_replace("https://youtu.be","","$youtube");
								$unikfinal = str_replace("/","","$unik");
						?>
						<div class="col col-xs-12">
							<div class="youtube">
									<a href="<?php echo $embed; ?>" data-type="iframe" class="video-play-btn">
										<img src="https://img.youtube.com/vi/<?php echo $unikfinal; ?>/maxresdefault.jpg" alt class="img img-responsive">
										<i class="mdi mdi-play"></i>
									</a>
							</div>
						</div>
						<?php }?>
					</div>
				</div>
		</section>
	</div>
	
	<!-- ============== DOA DAN UCAPAN =============== -->  
    <div id="ucapan-konten" style="display: none;" class="konten">
    	
    	<div class="col-12 ucapan-field">
            <div class="section-title">
				<h2>Do'a dan Ucapan</h2>
			</div>
	                <div class="row">
	                    <div class="col-12">
		                    <div class="form-group">
		                        <input id="doa_dan_ucapan_nama_pengunjung" type="text" class="form-control mt-2" placeholder="Nama Anda" value="<?= $invite ?>" required>
		                    </div>
	                    </div>
	                    <div class="col-12">
		                    <div class="form-group">
		                        <textarea id="doa_dan_ucapan_isi" class="form-control" id="exampleFormControlTextarea1" placeholder="Pesan anda.." rows="3" required></textarea>
		                    </div>
	                    </div>
	                    <div class="col-12">
							<?php
							 if ($website_umum[19]->website_isi == "Aktif"){
								?>
							<div class="g-recaptcha" data-sitekey="<?= $website_umum[20]->website_isi  ?>" data-callback="ENABLEDsubmit_doa_dan_ucapan"></div>
							<br/>	
								<?php
							 }
							 ?>
	                    	<button id="submit_doa_dan_ucapan" class="btn btn-primary btn-block" >Kirim</button>
							<img src="<?= base_url() ?>/assets/base/img/loadinga.svg" height="30px" style="display:none;" id="loading_">
	                    </div>
	                </div>
        </div>
        <div class="komen-netizen" >
			
			<div class="layout-komen">				
				<?php  foreach($users_doa_dan_ucapan as $key => $data) { ?>
				<div class="komen" >
					<div class="col-12 doa_dan_ucapan_nama_pengunjung">
						<?= \esc($data['doa_dan_ucapan_nama_pengunjung']); ?>
					</div>
					<div class="col-12 doa_dan_ucapan_isi"> 
						<?= \esc($data['doa_dan_ucapan_isi']); ?>
					</div>
				</div>
				<?php } ?> 
			</div>

			<a href="#" id="loadMore" class="btn btn-primary btn-block" role="button">Lebih Banyak.</a>
        </div>


    </div>


	<!-- ============== CERITA =============== -->
    <div id="cerita-konten" style="display: none;" class="konten">
    	
		<section class="cerita section-padding" id="cerita">
			<div class="container">
				<div class="section-title">
						<h2> Cerita Kita </h2>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="main-timeline">

						<?php 
						$no=0;
						foreach($users_cerita as $key => $data) { 
							$no++;
							if($no % 2 == 0){ ?>

								<div class="timeline">
									<div class="timeline-icon"></div>
									<div class="timeline-content">
										<span class="date"><?php echo $data['tanggal_cerita']; ?></span>
										<h4 class="title"><?php echo $data['judul_cerita']; ?></h4>
										<p class="description">
										<?php echo $data['isi_cerita']; ?>
										</p>
									</div>
								</div>
							<?php }else{?>
								<div class="timeline">
									<div class="timeline-icon"></div>
									<div class="timeline-content right">
										<span class="date"><?php echo $data['tanggal_cerita']; ?></span>
										<h4 class="title"><?php echo $data['judul_cerita']; ?></h4>
										<p class="description">
										<?php echo $data['isi_cerita']; ?>
										</p>
									</div>      
								</div>
							<?php } ?>

							
						<?php } ?> 
						</div>
					</div>
				</div>
			</div>
		</section>

	</div>
	
	<!-- ============== LOKASI =============== --> 
    <div id="lokasi-konten" style="display: none;" class="konten"> 
		<?php  
		foreach ($users_acara->getResult() as $row_users_acara){ 
			$dicari="iframe";
			$kalimat_akad = $row_users_acara->gmap_akad;
			$kalimat_resepsi = $row_users_acara->gmap_resepsi;

			// Cek Apakah maps Akad dan Resepsi sama
			if ( $row_users_acara->gmap_akad == $row_users_acara->gmap_resepsi){
				//Cek di AKAD betul iframe Gmap atau tidak
				if(preg_match("/$dicari/i", $kalimat_akad)){
					 
		?>
		<div class="col-12">
			<div class="section-title">
				<h2>Denah Lokasi<br/>Akad & Resepsi </h2>
			</div>
			<div class="col-12 maps">
				<?= $row_users_acara->gmap_akad ?>
			</div>
		</div>
		<?php
				}
			}else{
				if(preg_match("/$dicari/i", $kalimat_akad) and preg_match("/$dicari/i", $kalimat_resepsi) ){
		?> 
					<div class="section-title">
						<h2>Denah Lokasi</h2>
					</div>
					<div class="col-12"> 
						<div class="col-6">
							<div class="section-title">
								<h2>Akad Nikah</h2>
							</div>
							<div class="maps">
								<?= $row_users_acara->gmap_akad ?>
							</div>
						</div> 
						<div class="col-6 ">
							<div class="section-title">
								<h2>Resepsi Pernikahan </h2>
							</div>
							<div class="maps">
							<?= $row_users_acara->gmap_resepsi ?>
							</div>
						</div> 
					</div> 
		<?php 
				}else{
					if(preg_match("/$dicari/i", $kalimat_akad)){
						//GMAP sebenarnya
						$gmap_sebenarnya = $row_users_acara->gmap_akad;
					}else if(preg_match("/$dicari/i", $kalimat_resepsi)){
						//GMAP sebenarnya
						$gmap_sebenarnya = $row_users_acara->gmap_resepsi;
					}
					//TAMPILKAN MAP
					?>
					<div class="col-12">
						<div class="section-title">
							<h2>Denah Lokasi<br/>Akad & Resepsi </h2>
						</div>
						<div class="col-12 maps">
							<?= $gmap_sebenarnya ?>
						</div>
					</div>
					<?php
				}
			} ?> 
	</div> 
	<?php
	}
	?>  

	<!-- ============== BINGKISAN =============== -->
	<div id="bingkisan-konten" style="display: none;" class="konten">
		<div class="section-title">
			<h2>Berikan Bingkisan</h2>
		</div>
		<div class="d-flex justify-content-center text-center">
			<div class="col-md-4 col-sm-12 col-md-offset-4">
				<p class="description">Bagi yang ingin memberikan Kado Pernikahan untuk pernikahan kami, bisa melalui E-Money / Rekening Bank berikut:</p>	
				<div class="card">
					<script src="<?php echo base_url() ?>/assets/base/js/clipboard.min.js"></script>
					<ul class="list-group list-group-flush">
						<?php 
						$a="0";
						foreach ($daftar_bank_pengguna as $row_daftar_bank_pengguna){
						?> 
						<li class="list-group-item">
							<b><?= $row_daftar_bank_pengguna->bank_nama ?></b>
							<br>
							<span id="bank_nomor_rekening_<?= $a ?>"><?= $row_daftar_bank_pengguna->bank_nomor_rekening ?></span> 
							<button class="bank_nomor_rekening_<?= $a ?>" data-clipboard-action="copy" data-clipboard-target="#bank_nomor_rekening_<?= $a ?>">
								<i class="mdi mdi-clipboard"></i>
							</button>
							
							<?php
							if($row_daftar_bank_pengguna->bank_kode!=""){
								?>
								<br>
								<code>Kode Bank : <?= $row_daftar_bank_pengguna->bank_kode ?></code>
								<?php
							}
							?>
							
							<br>
							An. <?= $row_daftar_bank_pengguna->bank_nama_pemilik ?>	 
						</li>
						<script>
							var Clipboard = new ClipboardJS('.bank_nomor_rekening_<?= $a ?>');
						</script>
						<?php
						$a++;
						}
						?>
					</ul> 				
				</div> 					
			</div>
		</div>
	</div>
	<a id="bingkisan" style="cursor:pointer;" class="tombol-bingkisan">
		<i class="mdi mdi-gift"> Beri Bingkisan</i>
	</a>
	<!-- TUTUP BINGKISAN -->
	
</div>


<!-- ============== BOTTOM NAVIGATION =============== -->
<nav class="mobile-bottom-nav2" id="nav">

	<div class="container-fluid px-0">
	    <div class="row no-gutters">
			<div class="col-12" style="display: flex;margin-bottom: 5px;margin-top: 5px;" id="hehe">

				<div class="mobile-bottom-nav__item mobile-bottom-nav__item--active" id="sampul">
					<div class="mobile-bottom-nav__item-content">
						<i class="navbar-icon mdi mdi-home"></i>
						Sampul
					</div>		
				</div>

				<div class="mobile-bottom-nav__item" id="users_mempelai">
					<div class="mobile-bottom-nav__item-content" >
						<i class="navbar-icon mdi mdi-heart"></i>
						Mempelai
					</div>		
				</div>

				<div class="mobile-bottom-nav__item" id="users_acara">		
					<div class="mobile-bottom-nav__item-content" >
						<i class="navbar-icon mdi mdi-calendar-text"></i>
						Acara
					</div>
				</div>
				<div class="mobile-bottom-nav__item" id="lain">
					<div class="mobile-bottom-nav__item-content" >
						<i class="navbar-icon mdi mdi-more" id="lain"></i>
						Lain
					</div>		
				</div>

		
			</div>
		</div>	
	</div>
</nav>
<nav class="mobile-bottom-nav2" id="nav2" style="display: none;">

	<div class="container-fluid px-0">
	    <div class="row no-gutters">
			<div class="col-12" style="display: flex;margin-bottom: 5px;margin-top: 5px; " id="hehe">
				<div class="mobile-bottom-nav__item mobile-bottom-nav__item--active" id="sampul">
					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-home"></i>
						Sampul
					</div>		
				</div>

				<div class="mobile-bottom-nav__item" id="users_mempelai">
					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-heart"></i>
						Mempelai
					</div>		
				</div>

				<div class="mobile-bottom-nav__item" id="users_acara">		
					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-calendar-text"></i>
						Acara
					</div>
				</div>
				
				<?php foreach ($undangan_fitur->getResult() as $row){ ?>
				<div class="mobile-bottom-nav__item" id="ucapan"
				<?php 
                if($row->komen != 1)
                    echo "style=display:none;";
                }?>>

					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-message-bulleted"></i>
						Ucapan
					</div>		
				</div>

		
			</div>
		</div>	
	</div>

	<div class="container-fluid px-0">
	    <div class="row no-gutters">
			<div class="col-12" style="display: flex;margin-bottom: 5px;margin-top: 5px;">
		<?php foreach ($undangan_fitur->getResult() as $row){ ?>
				<div class="mobile-bottom-nav__item" id="users_album" 
                <?php 
                if($row->gallery != 1)
                    echo "style=display:none;"
                ?>>
					<div class="mobile-bottom-nav__item-content icons">
                        <i class="navbar-icon mdi mdi-image"></i>
                        Album
                    </div>      
				</div>

				<div class="mobile-bottom-nav__item" id="cerita" 
                <?php 
                if($row->cerita != 1)
                    echo "style=display:none;"
                ?>>
					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-chart-bubble" ></i>
						 Cerita Kita
					</div>		
				</div>


				<div class="mobile-bottom-nav__item" id="lokasi"
				<?php 
                if($row->lokasi != 1)
                    echo "style=display:none;"
                ?>>
					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-map-marker"></i>
						Lokasi
					</div>		
				</div>


				<div class="mobile-bottom-nav__item">
					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-close-circle" style="color:red;" id="tutup"></i>
						Tutup
					</div>		
				</div>

            <?php } ?>
			</div>
		</div>
	</div>


</nav>


</body>

<div class="dekorasi-all dekorasi-all-bawah">
	<!-- GAMBAR DEKORASI TENGAH --> 
	<!-- <img class="imgbawah" src="<?php echo base_url() ?>/assets/themes/Bunga_Teal/img/bottom_flower.png" >  -->
	<!-- GAMBAR DEKORASI KIRI --> 
	<!-- <img class="imgbawah-kanan" src="<?php echo base_url() ?>/assets/themes/Bunga_Teal/img/kanan-bawah.png" >  -->
	<!-- GAMBAR DEKORASI KIRI --> 
	<img class="imgbawah-kiri" src="<?php echo base_url() ?>/assets/themes/Bunga_Teal/img/kiri-bawah.png" > 
</div>

<div class="dekorasi-sampul dekorasi-sampul-bawah">
	<!-- GAMBAR DEKORASI TENGAH --> 
	<!-- <img class="imgbawah" src="<?php echo base_url() ?>/assets/themes/Bunga_Teal/img/bottom_flower.png" >  -->
	<!-- GAMBAR DEKORASI KIRI --> 
	<!-- <img class="imgbawah-kanan" src="<?php echo base_url() ?>/assets/themes/Bunga_Teal/img/kanan-bawah.png" >  -->
	<!-- GAMBAR DEKORASI KIRI --> 
	<!-- <img class="imgbawah-kiri" src="<?php echo base_url() ?>/assets/themes/Bunga_Teal/img/kiri-bawah.png" > -->
</div>



<!-- mengirimkan data php ke javascript -->
<script>var base_url = '<?php echo base_url() ?>';</script>
<script>var tanggal_akad = '<?php echo $tanggal_akad; ?>';</script>
<script>var tanggal_resepsi = '<?php echo $tanggal_resepsi; ?>';</script>
<!-- mengirimkan data php ke javascript -->

<!-- JS AREA -->
<script src="<?php echo base_url() ?>/assets/themes/Bunga_Teal/js/moment-with-locales.js"></script>
<script src="<?php echo base_url() ?>/assets/themes/Bunga_Teal/js/bootstrap.min.js" ></script>
<script src="<?php echo base_url() ?>/assets/themes/Bunga_Teal/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>/assets/themes/Bunga_Teal/js/jquery-plugin-collection.js"></script>
<script src="<?php echo base_url() ?>/assets/themes/Bunga_Teal/js/script.js"></script>
<script> 
	/*=================
     ADD DOA DAN UCAPAN  
    ======================= */
	<?php
		if ($website_umum[19]->website_isi == "Aktif"){
	?>
		// Matikan Tombol dulu jika belum rechapca
		$('#submit_doa_dan_ucapan').attr('disabled', 'disabled');	
	<?php
		}
	?>
	function ENABLEDsubmit_doa_dan_ucapan(){ 
		$('#submit_doa_dan_ucapan').removeAttr('disabled');
	}
	//Mulai boleh submit doa dan ucapan
	$('#submit_doa_dan_ucapan').on('click', function(event) {		
		$('#loading_').css('display','inline');
		$('#submit_doa_dan_ucapan').css('display','none');
		var doa_dan_ucapan_nama_pengunjung =  $('#doa_dan_ucapan_nama_pengunjung').val();
		var doa_dan_ucapan_isi =  $('#doa_dan_ucapan_isi').val();
		var g_recaptcha_response =  $('#g-recaptcha-response').val();
		$.ajax({
			url : "<?= base_url('add_users_doa_dan_ucapan') ?>",
			method : "POST",
			data : {doa_dan_ucapan_nama_pengunjung: doa_dan_ucapan_nama_pengunjung,doa_dan_ucapan_isi: doa_dan_ucapan_isi,g_recaptcha_response:g_recaptcha_response},
			async : true,
			dataType : 'html',
			success: function($hasil){
				if($hasil == 'sukses'){
					$('.layout-komen').append("<div class='komen' style='display:block'><div class='col-12 doa_dan_ucapan_nama_pengunjung'>"+doa_dan_ucapan_nama_pengunjung+"</div><div class='col-12 doa_dan_ucapan_isi'>"+doa_dan_ucapan_isi+"</div></div>");

					$(".komen:hidden").slice(0, 100).slideDown();
					$("html, body").animate({ scrollTop: $(document).height() }, 1000);
					$("#loadMore").fadeOut('slow');

					$('#loading_').css('display','none');
					$('#submit_doa_dan_ucapan').css('display','block'); 
					$('#submit_doa_dan_ucapan').prop('disabled', true);  
				}
			}
		});
	});
</script>
</html>
