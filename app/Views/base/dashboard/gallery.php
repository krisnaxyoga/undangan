<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <div>
        <br/>
        <a target="_blank"  href="<?= SITE_UNDANGAN ?>/<?= $users_order[0]->domain ?>" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i> Lihat Undangan</a>
        </div>
    </div> 

    <div class="row mb-3">

        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Foto</h6>
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
                                <button class="upload-area-button btn " style="z-index:9999;">
                                    <span style="color:#fff">Browse files</span>
                                </button>
                            </div>
                        </div> 
                    </div>

                    <div style="text-align: center;">
                        <img id="loading" src="<?= base_url() ?>/assets/base/img/loading.svg"  style="height: 30px;width: 30px; display: none;" />
                    </div>
                    <div id="previewss">
                        <?php 
                            $kunci = $undangan_pengaturan[0]->kunci; 
                            
                            //for($a=1;$a<=10;$a++){
                            foreach ($users_album->getResult() as $rowusers_album){    
                                $pathName = 'assets/users/'.$kunci.'/'.$rowusers_album->album.'.png';
                                if(!file_exists($pathName))continue;
                        ?>

                        <div class="preview-uploads" id="preview<?= $rowusers_album->id ?>">
                            <div class="preview-uploads-img">
                                <span class="preview">
                                <img id="img<?= $rowusers_album->id ?>" src="<?= base_url() ?>/assets/users/<?= $kunci ?>/<?= $rowusers_album->album ?>.png"  style="height: 100%;object-position: center;object-fit: cover;width: 100%;"  />
                                </span>
                            </div>
                            <div class="preview-uploads-name">
                            <b><p class="name" style="line-height: revert;font-size: 12px;" ><?= $rowusers_album->album; ?></p></b>
                            <strong class="error text-danger" style="line-height: revert;font-size: 12px;"  data-dz-errormessage></strong>
                            <p class="size" style="line-height: revert;font-size: 12px;"  >-</p>     
                            </div>
                            <div  class="preview-uploads-delete">
                            <button id="<?= $rowusers_album->id.','.$rowusers_album->id_user.','.$rowusers_album->album ?>" data-dz-remove class="btn btn-danger delete btnhehe">
                                Hapus
                            </button>
                            </div>
                        </div>

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
                    <h6 class="m-0 font-weight-bold text-primary">Data Video</h6>
                </div> 
                <div class="card-body">
                    <label>Youtube Link</label>
                    <textarea id="video" type="text" class="form-control" placeholder="Contoh : https://youtu.be/zlKzyYnhu-s" required><?= $users_album_video[0]->video ?></textarea>
                    <div class="mt-1">
                    <label class="form-check-label ">
                      <a  target="_blank" href="<?php echo base_url('youtube'); ?>" style="margin-top: 105px;color: #2c3e50;position: relative;top:3px;color:#17a2b8;"> Cara Menambahkan Video <i class="lni-question-circle" style="color:#17a2b8;"></i></a>
                    </label>
                    </div>
                    <div class="col mt-3">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalVideo">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--Row-->
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

<script src="<?php echo base_url() ?>/assets/base/js/dropzone.js"></script>
<script>

var myDropzone = new Dropzone(document.body, {  
  url: "<?php echo base_url('user/update_gallery'); ?>", 
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
      //$("#previewss").prepend('<div id="preview'+aql.no+'" class="file-row preview-uploads"><div class="preview-uploads-img"><span class="preview"><img id="img3" src="<?= base_url() ?>/assets/users/'+aql.kunci+'/album'+aql.no+'.png"  style="height: 100%;object-position: center;object-fit: cover;width: 100%;" /></span></div><div class="preview-uploads-name"><p class="name" style="line-height: revert;font-size: 12px;" data-dz-name>album'+aql.no+'</p><strong class="error text-danger" style="line-height: revert;font-size: 12px;"  ></strong><p class="size" style="line-height: revert;font-size: 12px;" >-</p></div><div  class="preview-uploads-delete"><button id="'+aql.no+'" class="btn btn-danger delete btnhehe">Hapus</button></div></div>');
      //$('#previewss').empty().append('<?php                              $kunci = $undangan_pengaturan[0]->kunci;                              foreach ($users_album->getResult() as $rowusers_album){                                     $pathName = "assets/users/".$kunci."/".$rowusers_album->album.".png";                                 if(!file_exists($pathName))continue;                         ?>                          <div class="preview-uploads" id="preview<?= $rowusers_album->id ?>">                             <div class="preview-uploads-img">                                 <span class="preview">                                 <img id="img<?= $rowusers_album->id ?>" src="<?= base_url() ?>/assets/users/<?= $kunci ?>/<?= $rowusers_album->album ?>.png"  style="height: 100%;object-position: center;object-fit: cover;width: 100%;"  />                                 </span>                             </div>                             <div class="preview-uploads-name">                             <b><p class="name" style="line-height: revert;font-size: 12px;" ><?= $rowusers_album->album; ?></p></b>                             <strong class="error text-danger" style="line-height: revert;font-size: 12px;"  data-dz-errormessage></strong>                             <p class="size" style="line-height: revert;font-size: 12px;"  >-</p>                                  </div>                             <div  class="preview-uploads-delete">                             <?php $idnya = $rowusers_album->id.",".$rowusers_album->id_user.",".$rowusers_album->album; ?>                             <button id="<?= $idnya; ?>" data-dz-remove class="btn btn-danger delete btnhehe">                                 Hapus                             </button>                             </div>                         </div>                          <?php                             }                         ?>');
      location.reload(); 
    
    
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

    var datanya = $(this).attr("id");
    const datanya_array = datanya.split(",");
    var id = datanya_array[0];
    var id_user = datanya_array[1];
    var album = datanya_array[2];

    var kunci = "<?= $kunci ?>";
    $.ajax({
    type: 'POST',
    url: '<?= base_url('user/del_gallery') ?>',
    data: {id: id, kunci: kunci, id_user: id_user, album: album},
    success: function(data){
        console.log('success: ' + data);
        $('#preview'+id).remove();
    }
    });
 
});

$('#simpanVideo').on('click', function(event) {
    var video = $('#video').val();
    $.ajax({
        url : "<?= base_url('user/update_users_album_video') ?>",
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



</script>