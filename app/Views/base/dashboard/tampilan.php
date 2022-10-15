<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?> </h1>
    </div>

    <div class="row mb-3">
        
        <div class="container"> 
          <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12 mt-5">
              <div class="card h-100 p-0" >
                <img style="opacity:65%;" alt="image" class="img-fluid rounded-0" src="<?php echo base_url() ?>/assets/themes/<?= $order[0]->nama_theme ?>/preview.png">
      
                <div style="opacity:65%;" class="content p-2 d-flex justify-content-center">
                  <h5><strong><?= str_replace("_", " ", $order[0]->nama_theme) ?></strong></h5>
                </div>

                <div class="d-flex justify-content-center">
                  <p class="mt-2 mr-2"><a href="#" class="btn btn-success btn-sm disabled" >Active</a></p> 
                  <p class="mt-2 mr-2" >
                    <a target="_blank"  href="<?= SITE_UNDANGAN ?>/<?= $order[0]->domain ?>/Nama Undangan" class="btn btn-primary btn-sm">Lihat Website</a>
                  </p>
                </div>
              </div>
            </div>

            <!-- LOOPING PERTAMA -->
            <?php
            $paket_turunan="";  
            ?>
            <?php foreach ($undangan_tema_by_id->getResult() as $row){ if($row->nama_theme == $order[0]->nama_theme) continue;?>
            <div class="col-lg-3 col-md-6 col-xs-12 mt-5 disabled">
              <ul class="nav" style="left: 0%;position: absolute;top:0%;margin-left: 0.8rem;">
              <?php 
                //CEK PAKET
                $paket_turunan = explode (",",$row->paket_id_turunan);
                $jumlah_paket_turunan = count($paket_turunan);
                //CSS Opacity
                $opacity = "opacity:100%;";
                //TOMBOL Pesan
                $tombol_pesan = '<button class="btn btn-success btn-sm pilih" data-id="'.$row->id.'" class="btn btn-sm btn-danger hapus" data-toggle="modal" data-target="#modalTema">Pilih</button>';
                //Tombol Demo
                $tombol_demo = '<a target="_blank" href="'.SITE_UTAMA.'/demo/'.$row->nama_theme .'/Nama Undangan" class="btn btn-primary btn-sm">Demo</a>';
              
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
              </ul>

              <div class="card h-100 p-0" style="position: static !important; <?= $opacity ?>">
                <img style="<?= $opacity ?>" alt="image" class="img-fluid rounded-0" src="<?php echo base_url() ?>/assets/themes/<?= $row->nama_theme ?>/preview.png">
                 <div class="content p-2 d-flex justify-content-center">
                  <h5><strong><?= str_replace("_", " ", $row->nama_theme) ?></strong></h5>
                </div> 
                <div class="d-flex justify-content-center">
                  <p class="mt-2 mr-2">
                    <?= $tombol_pesan ?>
                  </p>   
                  <p class="mt-2">
                    <?= $tombol_demo ?>
                  </p> 
                </div> 
              </div> 
            </div>    
            <?php 
            //UNTUK LOOPING KEDUA
            $paket_turunan = $row->paket_id_turunan; 
            } 
            ?>

            <!-- LOOPING KEDUA -->
            <?php  
            foreach ($undangan_tema_by_selain_paket_id->getResult() as $row2){if($row2->nama_theme == $order[0]->nama_theme) continue; 
              //CEK jika turunan dari undangan_tema kosong untuk paket_turunannya
              if ($paket_turunan==""){
                 //CEK paket_turunanya dari tabel undangan_paket
                  $turunan_Undangan_Paket = $CI->ambil_undangan_paket_by_id($order[0]->paket_id);
                  $paket_turunan = $turunan_Undangan_Paket[0]->paket_id_turunannya;
              }else{} 
              //CSS Opacity
              $opacity = "";
              //TOMBOL Pesan
              $tombol_pesan = '';
              //Tombol Demo
              $tombol_demo = '';
            
              $array_paket_turunan = explode (",",$paket_turunan);  
              
              $jumlah_array_paket_turunan = count($array_paket_turunan); 
              if ($jumlah_array_paket_turunan<>0){
                for($a = 0; $a < $jumlah_array_paket_turunan; $a++) {
                   //Jika Ketemu Paket Keturunan
                   if ($row2->paket_id == $array_paket_turunan[$a]){
                    //CSS Opacity
                    $opacity = "opacity:100%;";
                    //TOMBOL Pesan
                    $tombol_pesan = '<button class="btn btn-success btn-sm pilih" data-id="'.$row2->id.'" class="btn btn-sm btn-danger hapus" data-toggle="modal" data-target="#modalTema">Pilih</button>';
                    //Tombol Demo
                    $tombol_demo = '<a target="_blank" href="'.SITE_UTAMA.'/demo/'.$row2->nama_theme .'/Nama Undangan" class="btn btn-primary btn-sm">Demo</a>';
                    break;
                  }else{
                    //CSS Opacity
                    $opacity = "opacity:65%;";
                    //TOMBOL Pesan
                    $tombol_pesan = '<button class="btn btn-success btn-sm disabled">Pilih</button>';
                    //Tombol Demo
                    $tombol_demo = '<a class="btn btn-primary btn-sm disabled text-white">Demo</a>'; 
                  }
                }
              }else{

              } 
              
              ?>
            <div class="col-lg-3 col-md-6 col-xs-12 mt-5" style="<?= $opacity ?>">
              <ul class="nav" style="left: 0%;position: absolute;top:0%;margin-left: 0.8rem;">
              <?php 
                if ($row2->paket_id=="1"){
                ?>
                  <li class="nav-item p-1 mb-1 bg-warning text-white">
                    <?= $row2->paket_nama ?>
                  </li>
                <?php
                }elseif ($row2->paket_id=="2"){
                ?>
                  <li class="nav-item p-1 mb-1 bg-success text-white">
                  <?= $row2->paket_nama ?>
                  </li>
                <?php
                }else{
                ?>
                <li class="nav-item p-1 mb-1 bg-danger text-white">
                  <?= $row2->paket_nama ?>
                </li>
                <?php
                }  
                ?> 
              </ul>

              <div class="card h-100 p-0" style="position: static !important; <?= $opacity ?>">
                <img style="<?= $opacity ?>" alt="image" class="img-fluid rounded-0" src="<?php echo base_url() ?>/assets/themes/<?= $row2->nama_theme ?>/preview.png">
                 <div class="content p-2 d-flex justify-content-center">
                  <h5><strong><?= str_replace("_", " ", $row2->nama_theme) ?></strong></h5>
                </div> 
                <div class="d-flex justify-content-center">
                  <p class="mt-2 mr-2">
                    <?= $tombol_pesan ?>
                  </p>   
                  <p class="mt-2">
                    <?= $tombol_demo ?>
                  </p> 
                </div> 
              </div> 
            </div>    
            <?php } ?>
          </div>
          <!--Row-->
        </div>
        <!---Container-->
    </div>
    <!--Row-->
</div>
<!---Container Fluid-->

<!-- Modal -->
<div class="modal fade" id="modalTema" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin mengubah tema ?
        <input type="hidden" name="idTema" id="idTema" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="pilihBtn">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>


<script>
    
    $('.pilih').on('click', function (event) {
        var idtema = $(this).data('id');
        $(".modal-body #idTema").val( idtema );
    });

    $('#pilihBtn').on('click', function(event) {

        var idtema = $('#idTema').val();

        $.ajax({
            url : "<?= base_url('user/ganti_tema') ?>",
            method : "POST",
            data : {id: idtema},
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