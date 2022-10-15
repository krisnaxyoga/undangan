<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <div>
        <br/>
        <a target="_blank"  href="<?= SITE_UNDANGAN ?>/<?= $order[0]->domain ?>" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i> Lihat Undangan</a>
        </div>
    </div>

    <div class="row mb-3">
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
                    <p style="bottom: -12.3px;position: inherit; color: #005CAA;font-weight: bold; ">https://<?= DOMAIN_UNDANGAN ?>/<span id="domainyo"><?= $order[0]->domain ?></span></p>
                    <input id="domain" type="text" class="form-control" placeholder="akudandia" value="<?= $order[0]->domain ?>"  onkeyup="nospaces(this)" required>
                    
                    </div>
                    <?php 
                      if ($order[0]->domain_jml_diubah < 3 ){
                        ?>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalDomain">Simpan</button>
                        <?php
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
        
        <!-- SEPATAH KATA -->
        <div class="col-xl-12 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Sepatah Kata</h6>
                </div>
                <div class="card-body">
                    <!-- CONTENT DISINI -->
                    <div class="col-12 mt-2">
                        <label>Sepatah kata berada di dua halaman yaitu <b>Mempelai</b> dan <b>Acara</b>, Kakak dapat merubah sesuai keinginan atau dapat memilih kata-kata dari pilihan-pilihan dibawah ini:</label>
                        <p><b>Pilihan 1:</b> <button class="btn btn-warning" onclick="SepatahKataPilihan1()" id="BTNSepatahKataPilihan1">Klik untuk lihat</button></p>
                        <div id="DIVSepatahKataPilihan1" style="display:none;">
                          <a href="<?php echo base_url() ?>/assets/dashboard/img/sepatakata/pilihan1-mempelai.png" target="_blank"><img class="col-3"  src="<?php echo base_url() ?>/assets/dashboard/img/sepatakata/pilihan1-mempelai.png" > </img></a>
                          <a href="<?php echo base_url() ?>/assets/dashboard/img/sepatakata/pilihan1-acara-a.png" target="_blank"><img class="col-3"  src="<?php echo base_url() ?>/assets/dashboard/img/sepatakata/pilihan1-acara-a.png" ></img></a>
                          <a href="<?php echo base_url() ?>/assets/dashboard/img/sepatakata/pilihan1-acara-b.png" target="_blank"><img class="col-3"  src="<?php echo base_url() ?>/assets/dashboard/img/sepatakata/pilihan1-acara-b.png" ></img></a>
                          <br/><br/>
                          <center><sup>Klik Gambar untuk memperbesar.</sup></center>
                        </div>
                        
                        <p><b>Pilihan 2:</b> <button class="btn btn-warning" onclick="SepatahKataPilihan2()" id="BTNSepatahKataPilihan2">Klik untuk lihat</button></p>
                        <div id="DIVSepatahKataPilihan2" style="display:none;"> 
                          <a href="<?php echo base_url() ?>/assets/dashboard/img/sepatakata/pilihan2-mempelai.png" target="_blank"><img class="col-3"  src="<?php echo base_url() ?>/assets/dashboard/img/sepatakata/pilihan2-mempelai.png" > </img></a>
                          <a href="<?php echo base_url() ?>/assets/dashboard/img/sepatakata/pilihan2-acara-a.png" target="_blank"><img class="col-3"  src="<?php echo base_url() ?>/assets/dashboard/img/sepatakata/pilihan2-acara-a.png" ></img></a>
                          <br/><br/>
                          <center><sup>Klik Gambar untuk memperbesar.</sup></center>
                        </div>
                        <p><b>Pilihan 3:</b> <button class="btn btn-warning" onclick="SepatahKataPilihan3()" id="BTNSepatahKataPilihan3">Klik untuk lihat</button></p>
                        <div id="DIVSepatahKataPilihan3" style="display:none;">  
                          <a href="<?php echo base_url() ?>/assets/dashboard/img/sepatakata/pilihan3-mempelai.png" target="_blank"><img class="col-3"  src="<?php echo base_url() ?>/assets/dashboard/img/sepatakata/pilihan3-mempelai.png" > </img></a>
                          <a href="<?php echo base_url() ?>/assets/dashboard/img/sepatakata/pilihan3-acara-a.png" target="_blank"><img class="col-3"  src="<?php echo base_url() ?>/assets/dashboard/img/sepatakata/pilihan3-acara-a.png" ></img></a>
                          <br/><br/>
                          <center><sup>Klik Gambar untuk memperbesar.</sup></center>
                        </div>

                        <p>Silahkan pilih model sepatah kata undangan kakak:</p>
                        <select class="form-control" id="sepatah_kata_pilihan" aria-label="Default select example">
                          <option value="1" <?php if ($undangan_pengaturan[0]->sepatah_kata_pilihan =="1"){echo "selected";}else{echo "no-selected";} ?> >Nomor 1</option>
                          <option value="2" <?php if ($undangan_pengaturan[0]->sepatah_kata_pilihan =="2"){echo "selected";}else{echo "no-selected";} ?> >Nomor 2</option>
                          <option value="3" <?php if ($undangan_pengaturan[0]->sepatah_kata_pilihan =="3"){echo "selected";}else{echo "no-selected";} ?> >Nomor 3</option>
                        </select> 
                    </div>
                    <div class="col mt-3">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalSepatahKata">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
               
        <!-- FITUR UNDANGAN -->
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
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalFitur">Simpan</button>
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
                  
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalMusik">Simpan</button>
                </div>
              </div> 
        </div>


    </div>
    <!--Row-->
</div>

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
<div class="modal fade" id="modalSepatahKata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan <b>Sepatah Kata</b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanSepatahKata">Ya</button>
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
        Apakah kamu yakin ingin menyimpan perubahan ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanFitur">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalGagalDomainSama" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<div class="modal fade" id="modalGagalSimpanDomain" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        Gagal Menyimpan ke database!!
        <p id="pesan">tes</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
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

<script>
    function nospaces(t){
      if(t.value.match(/\s/g)){
        t.value=t.value.replace(/\s/g,'');
      }
      document.getElementById("domainyo").innerHTML=t.value;
    }

    function SepatahKataPilihan1() {
      var x = document.getElementById("DIVSepatahKataPilihan1");
      var y = document.getElementById("BTNSepatahKataPilihan1");
      if (x.style.display === "none") {
        x.style.display = "block";
        y.innerHTML = "Klik untuk menutup";
      } else {
        x.style.display = "none";
        y.innerHTML = "Klik untuk lihat";
      }
    } 
    function SepatahKataPilihan2() {
      var x = document.getElementById("DIVSepatahKataPilihan2");
      var y = document.getElementById("BTNSepatahKataPilihan2");
      if (x.style.display === "none") {
        x.style.display = "block";
        y.innerHTML = "Klik untuk menutup";
      } else {
        x.style.display = "none";
        y.innerHTML = "Klik untuk lihat";
      }
    } 
    function SepatahKataPilihan3() {
      var x = document.getElementById("DIVSepatahKataPilihan3");
      var y = document.getElementById("BTNSepatahKataPilihan3");
      if (x.style.display === "none") {
        x.style.display = "block";
        y.innerHTML = "Klik untuk menutup";
      } else {
        x.style.display = "none";
        y.innerHTML = "Klik untuk lihat";
      }
    } 

    $('#simpanSepatahKata').on('click', function(event) {
      var sepatah_kata_pilihan = $('#sepatah_kata_pilihan').val();
      $.ajax({
          url : "<?= base_url('user/update_sepatah_kata') ?>",
          method : "POST",
          data : {sepatah_kata_pilihan : sepatah_kata_pilihan},
          async : true,
          dataType : 'html',
          success: function($hasil){
              if($hasil == 'sukses'){
                  location.reload();
              }
          }
      }); 
    });

    $('#simpanFitur').on('click', function(event) {

        var ucapan = $('#setUcapan').is(":checked") ? 1 : 0;
        var users_album = $('#setusers_Album').is(":checked") ? 1 : 0;
        var users_cerita = $('#setCerita').is(":checked") ? 1 : 0;
        var lokasi = $('#setLokasi').is(":checked") ? 1 : 0;

        console.log(users_album);

        $.ajax({
            url : "<?= base_url('user/update_fitur') ?>",
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
      <?php
        $jml_diubah = $order[0]->domain_jml_diubah+1;
      ?>
      var domain_jml_diubah = <?= $jml_diubah ?> ;
      $.ajax({
          url : "<?= base_url('user/update_domain') ?>",
          method : "POST",
          data : {domain: domain,domain_jml_diubah: domain_jml_diubah },
            async : true,
            dataType : 'html',
          success: function($hasil){
              if($hasil == 'sukses'){
                  location.reload();
              }else if($hasil == 'gagaldomainsama'){
                  $('#modalDomain').modal('hide'); 
                  $('#modalGagalDomainSama').modal('show'); 
              }else if($hasil == 'gagalsimpandomain'){
                $('#modalDomain').modal('hide'); 
                $('#modalGagalSimpanDomain').modal('show');  
              }else{
                // Variabel $hasil kosong
                console.log($hasil);
              }

              console.log($hasil);
          }
      });

    });

	$('#simpanMusik').on('click', function(event) {

      var pilihan_musik = $('#pilihan_musik').val();      
        
      $.ajax({
          url : "<?= base_url('user/update_musik') ?>",
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