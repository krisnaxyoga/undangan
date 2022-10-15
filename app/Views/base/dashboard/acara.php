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
                    <h6 class="m-0 font-weight-bold text-primary">Data Akad Nikah</h6>
                </div>
                <div class="card-body">
                    <!-- CONTENT DISINI -->
                    <div class="col mt-2">
                        <label>Tanggal <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="datepicker" placeholder="Tanggal" readonly="readonly" style="cursor:pointer; background-color: #FFFFFF" value="Jumat, 17 Januari 2020" required>
                        <input type="hidden" id="tanggal_akad" value="<?= $users_acara[0]->tanggal_akad ?>">
                    </div>

                    <div class="col mt-2">
                        <label>Waktu / Jam <sup class="text-danger">*</sup></label>
                        <input id="waktu_akad" type="text" class="form-control" placeholder="Contoh : 10.00 Pagi" value="<?= $users_acara[0]->jam_akad ?>" required>
                    </div>

                    <div class="col mt-2">
                        <label>Tempat / Lokasi <sup class="text-danger">*</sup></label>
                        <input id="lokasi_akad" type="text" class="form-control" placeholder="Contoh : Kediaman Mempelai Wanita " value="<?= $users_acara[0]->tempat_akad ?>" required>
                    </div>

                    <div class="col mt-2">
                        <label>Alamat <sup class="text-danger">*</sup></label>
                        <textarea id="alamat_akad" type="text" class="form-control" placeholder="Contoh : JL. Ahmad Yani No.1"><?= $users_acara[0]->alamat_akad ?></textarea>
                    </div>

                    <div class="col mt-2">
                        <label>Link Google Maps <sup>(opsional)</sup></label>
                        <textarea id="gmap_akad" type="text" class="form-control" placeholder="Google Map acara Akad Nikah"><?= $users_acara[0]->gmap_akad ?></textarea>
                    </div>
                    <div class="mt-1">
                    <label class="form-check-label ">
                      <a target="_blank" href="<?php echo base_url('maps'); ?>" style="margin-top: 105px;color: #2c3e50;position: relative;top:3px;color:#17a2b8;">Cara Menambahkan Maps <i class="lni-question-circle" style="color:#17a2b8;"></i></a>
                    </label>
                    </div>

                    <div class="col mt-3">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAkad">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Resepsi Nikah</h6>
                </div>
                <div class="card-body">
                    <!-- CONTENT DISINI -->
                    <div class="col mt-2">
                        <label>Tanggal <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="datepicker2" placeholder="Tanggal" readonly="readonly" style="cursor:pointer; background-color: #FFFFFF" value="<?= $users_acara[0]->tanggal_resepsi ?>" required> 
                        <input type="hidden" id="tanggal_resepsi" value="<?= $users_acara[0]->tanggal_akad ?>">
                    </div>

                    <div class="col mt-2">
                        <label>Waktu / Jam <sup class="text-danger">*</sup></label>
                        <input id="waktu_resepsi" type="text" class="form-control" placeholder="Contoh : 10.00 Pagi" value="<?= $users_acara[0]->jam_resepsi ?>" required>
                    </div>

                    <div class="col mt-2">
                        <label>Tempat / Lokasi <sup class="text-danger">*</sup></label>
                        <input id="lokasi_resepsi" type="text" class="form-control" placeholder="Contoh : Kediaman Mempelai Wanita " value="<?= $users_acara[0]->tempat_resepsi ?>" required>
                    </div>

                    <div class="col mt-2">
                        <label>Alamat <sup class="text-danger">*</sup></label>
                        <textarea id="alamat_resepsi" type="text" class="form-control" placeholder="Contoh : JL. Ahmad Yani No.1" required><?= $users_acara[0]->alamat_resepsi ?></textarea>
                    </div>

                    <div class="col mt-2">
                        <label>Link Google Maps <sup>(opsional)</sup></label>
                        <textarea id="gmap_resepsi" type="text" class="form-control" placeholder="Google Map acara Resepsi Pernikahan"><?= $users_acara[0]->gmap_resepsi ?></textarea>
                    </div>
                    <div class="mt-1">
                    <label class="form-check-label ">
                      <a target="_blank" href="<?php echo base_url('maps'); ?>" style="margin-top: 105px;color: #2c3e50;position: relative;top:3px;color:#17a2b8;">Cara Menambahkan Maps <i class="lni-question-circle" style="color:#17a2b8;"></i></a>
                    </label>
                    </div>

                    <div class="col mt-3">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalResepsi">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    <!--Row-->
</div>


<!-- Modal -->
<div class="modal fade" id="modalAkad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan <b>Acara Akad</b> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanAkad">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalResepsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan <b>Acara Resepsi</b> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanResepsi">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
 

<script src="<?php echo base_url() ?>/assets/base/js/pikaday.js"></script>
<script>

$(document).ready(function () {

    

    moment.locale('id');
    $('#datepicker').val(moment('<?= $users_acara[0]->tanggal_akad ?>').format('dddd, Do MMMM YYYY'));
    var picker = new Pikaday({ 
      
      field: $('#datepicker')[0],
      format: 'dddd, Do MMMM YYYY',
      onSelect: function() {
        $('#tanggal_akad').val(this.getMoment().format('YYYY/MM/DD'));
      }
    });

    $('#datepicker2').val(moment('<?= $users_acara[0]->tanggal_resepsi ?>').format('dddd, Do MMMM YYYY'));
    var picker = new Pikaday({ 
      format: 'dddd, Do MMMM YYYY',
      field: $('#datepicker2')[0],
      onSelect: function() {
        $('#tanggal_resepsi').val(this.getMoment().format('YYYY/MM/DD'));
      }
    });
       
    $('#simpanAkad').on('click', function(event) {

        var datanyaSiapa = 'akad';
        var tanggal = $('#tanggal_akad').val();
        var waktu = $('#waktu_akad').val();
        var lokasi = $('#lokasi_akad').val();
        var alamat = $('#alamat_akad').val();
        var gmap = $('#gmap_akad').val();

        $.ajax({
            url : "<?= base_url('user/update_users_acara') ?>",
            method : "POST",
            data : {tanggal: tanggal,waktu: waktu, lokasi: lokasi, alamat: alamat, gmap: gmap, datanyaSiapa: datanyaSiapa},
            async : true,
            dataType : 'html',
            success: function($hasil){
                if($hasil == 'sukses'){
                    location.reload();
                }
            }
        });

    });

    $('#simpanResepsi').on('click', function(event) {

        var datanyaSiapa = 'resepsi';
        var tanggal = $('#tanggal_resepsi').val();
        var waktu = $('#waktu_resepsi').val();
        var lokasi = $('#lokasi_resepsi').val();
        var alamat = $('#alamat_resepsi').val();
        var gmap = $('#gmap_resepsi').val();

        $.ajax({
            url : "<?= base_url('user/update_users_acara') ?>",
            method : "POST",
            data : {tanggal: tanggal,waktu: waktu, lokasi: lokasi, alamat: alamat,gmap: gmap, datanyaSiapa: datanyaSiapa},
            async : true,
            dataType : 'html',
            success: function($hasil){
                if($hasil == 'sukses'){
                    location.reload();
                }
            }
        }); 

    });

     

});


</script>