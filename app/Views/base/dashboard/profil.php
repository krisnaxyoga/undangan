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

        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Profil Pengguna</h6>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label>Username</label>
                        <input id="username" type="text" class="form-control" placeholder="Contoh : reydinda" value="<?= $user[0]->username ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="password" class="form-control" placeholder="********" value="" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input id="email" type="email" class="form-control" placeholder="Contoh : reydinda" value="<?= $user[0]->email ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Nomor Hp</label>
                        <input id="hp" type="number" class="form-control" placeholder="Contoh : 081234567890" value="<?= $user[0]->hp ?>" required>
                    </div>

                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalUser">Simpan</button>
                </div>
            </div>
        </div>
 
     
    </div>
    <!--Row-->
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
        Apakah kamu yakin ingin menyimpan perubahan ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanUser">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>/assets/base/js/dropzone.js"></script>

<script>
$('#simpanUser').on('click', function(event) {

var username = $('#username').val();
var hp = $('#hp').val();
var password = $('#password').val();
var email = $('#email').val();

$.ajax({
    url : "<?= base_url('user/update_user') ?>",
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
</script>

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
     url: '<?= base_url('user/del_gallery') ?>',
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
    url : "<?= base_url('user/update_video') ?>",
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