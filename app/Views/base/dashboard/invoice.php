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
        <?php if($users_order_pembayaran[0]->status != 2){ ?>
        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <?php 
                    
                    $durasi = '+3 days';
                    $tglDaftar = $users_order_pembayaran[0]->created_at;
                    $tglExp = strtotime($durasi, strtotime($tglDaftar));
                    $tglExpFormated = date("d-m-Y H:i A",$tglExp);

                    ?>
                    
                    <h6 class="m-0 font-weight-bold " style="color:#10ac84">Invoice : Selesaikan pembayaran anda sebelum <?= $tglExpFormated ?></h6>

                </div>
            </div>
        </div>
        <?php } ?>
                    
                    


        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tagihan Pembayaran</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Kode Pesanan</label>
                        <div class="upload-area-bg" style="margin-top: 5px;text-align: center;background: #f1f2f6; !important;">                       
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                    <a style="font-size: 16px;text-transform: uppercase;color: #2c3e50;font-weight:600;" >#<?= $users_order_pembayaran[0]->invoice ?></a>
                                    </div>
                                    <div class="col-auto">
                                    <?php if($users_order_pembayaran[0]->status == 4){ ?>
                                        <button  class="btn-info btn-sm btn" >Masa Aktif Habis</button>
                                    <?php }else if($users_order_pembayaran[0]->status == 3){ ?>
                                        <button  class="btn-dark btn-sm btn" >Di Non-Aktifkan</button>
                                    <?php }else if($users_order_pembayaran[0]->status == 2){ ?>
                                        <button  class="btn-success btn-sm btn" >Aktif dan Lunas</button>    
                                    <?php }else if($users_order_pembayaran[0]->status == 1){ ?> 
                                        <button class="btn-warning btn-sm btn" >Menunggu Konfirmasi Admin</button>
                                    <?php }else{ ?>
                                        <button class="btn-danger btn-sm btn" >Menunggu Pembayaran</button>
                                    <?php } ?>
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Domain / URL Undangan</label>
                        <div class="upload-area-bg" style="margin-top: 5px;text-align: center;background: #f1f2f6;">
                            <a style="font-size: 16px;text-transform: ;color: #007bff;" >https://<?= DOMAIN_UNDANGAN ?>/<?= $order[0]->domain ?></a>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Total Tagihan</label>
                        <div class="upload-area-bg" style="margin-top: 5px;text-align: center;background: #f1f2f6;">
                            <a style="font-size: 18px;color: #2c3e50;font-weight:bolder" ><?= rupiah($users_order_pembayaran[0]->biaya_paket_saat_itu) ?></a>
                        </div>
                    </div>

                    <div class="form-group" style="text-align: center;">
                    <?php if($users_order_pembayaran[0]->status == 1){ ?>
                        <label class="form-check-label" >
                        Pembayaran anda sudah kami terima.<br>Mohon tunggu tim kami sedang melakukan verifikasi. Anda dapat juga menghubungi Admin untuk mempercepat verifikasi melalui tombol dibawah. 
                        </label>
                    <?php } else if($users_order_pembayaran[0]->status == 0){ ?>
                        <label class="form-check-label" >
                            Setelah melakukan pembayaran mohon konfirmasi pembayaran anda dengan menekan tombol <strong>Konfirmasi</strong> dan ikuti instruksi selanjutnya. 
                        </label>
                        <?php } ?>    
                    </div>
                    <?php if($users_order_pembayaran[0]->status == 1){ 
                        $format = 
                        "Hallo min,
                        saya mau aktifasi Undangan *".$users_order_pembayaran[0]->invoice."*. 
                        mohon infonya "
                        ?>
                        <a target="_blank" href="https://wa.me/<?= $no_hp_admin ?>/?text=<?php echo urlencode($format) ?>" class="btn btn-info btn-block"><i class="fa-brands fa-whatsapp"></i> Hubungi Admin</a>
                    <?php } else if($users_order_pembayaran[0]->status == 0){ ?>
                        <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalKonfirmasi">Konfirmasi</button>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Rekening Pembayaran </h6>
                </div>
                <div class="card-body">
                    <P>Silahkan lakukan pembayaran dengan transfer sejumlah Total Tagihan ke salah satu Rekening Bank dibawah ini dan Jangan lupa foto bukti struk transfer. Selanjutnya lakukan konfirmasi melalui tombol KONFIRMASI dan upload foto bukti transfer.</p>
                    <div class="form-group">
                        <label>Nama Bank</label>
                        <?php
                        if ($undangan_bank[0]->bank_nama == "BANK RAKYAT INDONESIA (BRI)"){
                            $patchIMG = base_url('/assets/dashboard/img/bank/bank-bri.png');
                        }
                        ?>
                        <div class="upload-area-bg d-flex justify-content-between" style="margin-top: 5px;text-align: center;background: #f1f2f6;">
                            <img src="<?= $patchIMG ?>" height="20px" width="180px">      
                            <a style="font-size: 16px;text-transform: uppercase;color: #2c3e50;" ><?= $undangan_bank[0]->bank_nama ?></a>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nomor Rekening</label>
                        <div class="upload-area-bg d-flex justify-content-between" style="margin-top: 5px;text-align: center;background: #f1f2f6;">
                            <span id="NorekAdmin" style="font-size: 18px;text-transform: uppercase;color: #2c3e50;" ><?= $undangan_bank[0]->bank_nomor_rekening ?></span>   
                            <button class="btn btn-sm btn-secondary NorekAdmin" data-clipboard-action="copy" data-clipboard-target="#NorekAdmin">Salin</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Atas Nama</label>
                        <div class="upload-area-bg" style="margin-top: 5px;text-align: center;background: #f1f2f6;">
                            <a style="font-size: 18px;text-transform: uppercase;color: #2c3e50;" ><?= strtoupper($undangan_bank[0]->bank_nama_pemilik) ?></a>   
                        </div>
                    </div>

                </div>
            </div>
        </div>

     
    </div>
    <!--Row-->
    <div class="row mb-3">
    <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Upgrade Paket</h6>
                </div>
                
                <div class="card-body">
                <p>Jika Anda ingin mengubah Paket maka terdapat biaya tambahan yang harus dibayar. Jenis Paket akan berubah, setelah pembayaran biaya Upgrade Paket dikonfirmasi oleh Admin.</p>
                <form method="POST" enctype="multipart/form-data"  action="<?php echo base_url('user/invoice/upgrade-paket'); ?>">
                <div class="col mt-2">
                    <label>Paket Yang Tersedia <?php echo $masih_ada_pengajuan_upgrade_paket; ?></label>
                    <select <?php if ($masih_ada_pengajuan_upgrade_paket =="MASIH"){echo "disabled";}else{echo " ";} ?> name="upgrade_paket_paket_diajukan" class="form-control">
                        <?php
                        foreach($undangan_paket_all as $row_undangan_paket_all){
                            ?>
                            <option value="<?= $row_undangan_paket_all->paket_id ?>"><?= $row_undangan_paket_all->paket_nama ?> <?php if($row_undangan_paket_all->paket_limit_waktu=="0"){echo "Unlimited";}else{echo $row_undangan_paket_all->paket_limit_waktu." hari";} ?> dengan Biaya Rp <?= number_format($row_undangan_paket_all->paket_biaya_upgrade,0,",",".") ?></option>
                            <?php
                        }
                        ?>
                        
                    </select>
                </div>
                <hr>
                <label>
                    Bukti Pembayaran Biaya Upgrade
                </label>  
                    <div class="col mt-2">
                        <label>Bank yang Digunakan</label>
                        <input <?php if ($masih_ada_pengajuan_upgrade_paket=="MASIH"){echo "disabled";}else{echo " ";} ?> name="upgrade_paket_nama_bank" type="text" class="form-control" placeholder="Contoh : BRI " >
                    </div>     
                    <div class="col mt-2">
                        <label>Nama Anda Sesuai di Bank</label>
                        <input <?php if ($masih_ada_pengajuan_upgrade_paket=="MASIH"){echo "disabled";}else{echo " ";} ?> name="upgrade_paket_nama_lengkap" type="text" class="form-control" placeholder="Contoh : Khairul Fikri" >
                    </div>  
                    <div class="col mt-2 mb-2">
                        <label>Bukti Transfer (max 2MB)</label>
                        <input <?php if ($masih_ada_pengajuan_upgrade_paket=="MASIH"){echo "disabled";}else{echo " ";} ?> type="file"  name="upgrade_paket_bukti" required>
                    </div> 
                    <input type="hidden"  value="<?= $paket_id_lama ?>" name="upgrade_paket_paket_sebelumnya" >
                    <br>    
                    <button <?php if ($masih_ada_pengajuan_upgrade_paket=="MASIH"){echo "disabled";}else{echo " ";} ?> type="submit" class="btn btn-primary btn-block" id="simpanUpgradeSekarang">Upgrade Sekarang</button>
                    </form>   
                    <?php
                    if ($masih_ada_pengajuan_upgrade_paket=="MASIH"){
                        ?>
                        <br>
                        <code>Saat ini pengajuan Upgrade Paket sedang menunggu konfirmasi dari Admin.</code>
                        <?php
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
    <!--Row-->
</div>

<!-- Modal -->
<div class="modal fade" id="modalMenunggu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Pembayaran anda sudah kami terima.<br>Mohon tunggu tim kami sedang melakukan verifikasi..
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <form method="POST" enctype="multipart/form-data"  action="<?php echo base_url('user/konfirmasi'); ?>">
      <div class="modal-body">
        <div class="col mt-2">
            <label>Nama Anda Sesuai di Bank</label>
            <input name="nama_lengkap" type="text" class="form-control" placeholder="Contoh : Khairul Fikri" value="" required>
        </div>
        <div class="col mt-2">
            <label>Bank yang Digunakan</label>
            <input name="nama_bank" type="text" class="form-control" placeholder="Contoh : BRI " value="" required>
        </div>        
        <div class="col mt-2 mb-2">
            <label>Bukti Transfer (max 2MB)</label>
            <input type="file"  id="bukti" name="bukti" accept="image/*" required>
        </div>
        <input type="hidden"  value="<?= $users_order_pembayaran[0]->invoice ?>" name="invoice">
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-primary" id="simpanKonfimasi">Konfirmasi</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
      </form>
    </div>
  </div>
</div>

 

<script src="<?php echo base_url() ?>/assets/base/js/clipboard.min.js"></script>
<script>
var Clipboard = new ClipboardJS('.NorekAdmin');

$('#simpanUpgradeSekarang').on('click', function(event) {
  var upgrade_paket_paket_sebelumnya = $('#upgrade_paket_paket_sebelumnya').val();
  var upgrade_paket_paket_diajukan = $('#upgrade_paket_paket_diajukan').val();
  var upgrade_paket_nama_lengkap = $('#upgrade_paket_nama_lengkap').val();
  var upgrade_paket_nama_bank = $('#upgrade_paket_nama_bank').val();
  var upgrade_paket_bukti = $('#upgrade_paket_bukti').val(); 
  $.ajax({
      url : "<?= base_url('user/invoice/upgrade-paket') ?>",
      method : "POST",
      data : {upgrade_paket_paket_sebelumnya: upgrade_paket_paket_sebelumnya, upgrade_paket_paket_diajukan: upgrade_paket_paket_diajukan, upgrade_paket_nama_lengkap: upgrade_paket_nama_lengkap, upgrade_paket_nama_bank: upgrade_paket_nama_bank, upgrade_paket_bukti: upgrade_paket_bukti},
      async : true,
      dataType : 'html',
      success: function($hasil){
          if($hasil == 'sukses'){
              location.reload();
          }else{
            alert($hasil);
          }
      }
  }); 
});

</script>