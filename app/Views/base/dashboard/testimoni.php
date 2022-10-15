<style>
.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: left
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 1em;
    font-size: 6vw;
    color: #FFD600;
    cursor: pointer
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
} 
</style>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="row mb-3">
        <div class="col-xl-12 col-lg-6 mb-4">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header bg-warning py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-white">Buat Testimoni</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label><b>Beri Bintang</b> <sup class="text-danger">*</sup></label>
                        <div class="rating"> 
                            <input  type="radio" name="testimoni_rating" value="5" id="5" <?php if (isset($users_testimoni[0]->testimoni_rating) && $users_testimoni[0]->testimoni_rating == '5') { echo 'checked'; } ?> ><label for="5" title="Sempurna - 5 Bintang">☆</label> 
                            <input  type="radio" name="testimoni_rating" value="4" id="4" <?php if (isset($users_testimoni[0]->testimoni_rating) && $users_testimoni[0]->testimoni_rating == '4') { echo 'checked'; } ?>><label for="4" title="Sangat Bagus - 4 Bintang">☆</label> 
                            <input  type="radio" name="testimoni_rating" value="3" id="3" <?php if (isset($users_testimoni[0]->testimoni_rating) && $users_testimoni[0]->testimoni_rating == '3') { echo 'checked'; } ?>><label for="3" title="Bagus - 3 Bintang">☆</label> 
                            <input  type="radio" name="testimoni_rating" value="2" id="2" <?php if (isset($users_testimoni[0]->testimoni_rating) && $users_testimoni[0]->testimoni_rating == '2') { echo 'checked'; } ?>><label for="2" title="Tidak Buruk - 2 Bintang">☆</label> 
                            <input  type="radio" name="testimoni_rating" value="1" id="1" <?php if (isset($users_testimoni[0]->testimoni_rating) && $users_testimoni[0]->testimoni_rating == '1') { echo 'checked'; } ?>><label for="1" title="Buruk - 1 Bintang">☆</label>
                        </div> 
                    </div>
                    <div class="form-group">
                        <label><b>Testimoni</b> <sup class="text-danger">*</sup></label>
                        <textarea  onkeyup="cek_isi_testimoni()" id="testimoni_isi" type="text" class="form-control" placeholder="" value=""  required><?php if (isset($users_testimoni[0]->testimoni_isi) && $users_testimoni[0]->testimoni_isi <> '') { echo $users_testimoni[0]->testimoni_isi; } ?></textarea>
                    </div> 
                    
                    <button id="tombolTestimoni" class="btn btn-warning" data-toggle="modal" data-target="#modalTestimoni">Simpan</button>
                </div>
              </div>
        </div> 
    </div>
    <!--Row-->
</div> 

<!-- Modal -->
<div class="modal fade" id="modalTestimoni" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan <b>Testimoni</b> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanTestimoni">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    var testimoni_isi = $('#testimoni_isi').val();
    if (testimoni_isi == ""){
        $('#tombolTestimoni').attr('disabled', 'disabled');
    }else{
        $('#tombolTestimoni').removeAttr('disabled');
    }
}); 
function cek_isi_testimoni(){ 
    var testimoni_isi = $('#testimoni_isi').val();
    if (testimoni_isi == ""){
        $('#tombolTestimoni').attr('disabled', 'disabled');
    }else{
        $('#tombolTestimoni').removeAttr('disabled');
    }
}  
$('#simpanTestimoni').on('click', function(event) {
    var testimoni_isi = $('#testimoni_isi').val(); 
    var testimoni_rating;
    let rates = document.getElementsByName('testimoni_rating');
    rates.forEach((rate) => {
        if (rate.checked) {
            testimoni_rating = rate.value;
        }
    });
    $.ajax({
        url : "<?= base_url('user/simpan_users_testimoni') ?>",
        method : "POST",
        data : {testimoni_isi: testimoni_isi,testimoni_rating: testimoni_rating},
        async : true,
        dataType : 'html',
        success: function($hasil){
            if($hasil == 'sukses'){
                location.reload();
            }else{
                alert("Gagal menyimpan data Testimoni Anda.");
                //alert($hasil);
            }
        }
    });
});
</script>