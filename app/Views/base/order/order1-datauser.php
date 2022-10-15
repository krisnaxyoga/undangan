<div class="konten" style="display: flex;flex-grow: 1;overflow-x: hidden;flex-direction: row;margin-top: 60px;margin-bottom: 40px;">
    <section class="fdb-block konten-order" style="padding-top: 20px;flex:1; ">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8 col-lg-8 col-xl-6">
            <div class="row">
              <div class="col text-center">
                <h1 >Halo...</h1>
                <p >Hai kak! di isi dulu ya datanya. </p>
              </div>
            </div> 

            <form action="<?php echo base_url('order/2') ?>" method="post">
            <div class="row align-items-center">
              <div class="col mt-4">
                <label>Nama Domain / URL Undangan <sup class="text-danger">*</sup></label>
                <p style="bottom: -3.3px;position: inherit; color: #005CAA;font-weight: bold; ">https://<?= DOMAIN_UNDANGAN ?>/<span id="domainyo">akudandia</span></p>
                <input name="domain" type="text" class="form-control" placeholder="akudandia"    onkeyup="nospaces(this)" required>
              </div>
            </div>
            <div class="row align-items-center mt-3"> 
              <div class="col">
                <label>Email <sup class="text-danger">*</sup></label>
                <input name="email" type="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>" required>
              </div>
            </div>
            <div class="row align-items-center mt-3">
              <div class="col">
                <label>Password <sup class="text-danger">*</sup></label>
                <input name="password" type="password" class="form-control" placeholder="Password" value="<?php echo $password; ?>" required>
              </div>
            </div>
            <div class="row align-items-center mt-3">
              <div class="col">
                <label>Nomer HP / WhatsApp <sup class="text-danger">*</sup></label>
                <input name="hp" type="number" class="form-control" placeholder="0" value="<?php echo $hp; ?>" required>
              </div>
            </div> 
            <div class="row align-items-center mt-3">
              <div class="col">
                <label>Paket Undangan <sup class="text-danger">*</sup></label>
                <select name="undangan_paket_id" class="form-control" required>
                  <?php  
                    foreach ($undangan_paket->getResult() as $undangan_paket_row){ 
                      if ($kode == $undangan_paket_row->paket_id){
                        if ($undangan_paket_row->paket_limit_waktu=='0'){
                          $limit_waktu='/selamanya';
                        }else{
                          $limit_waktu='/'.$undangan_paket_row->paket_limit_waktu.'hari';
                        }
                        ?>
                          <option value="<?= $undangan_paket_row->paket_id ?>"><?= $undangan_paket_row->paket_nama.' - Rp. '.number_format($undangan_paket_row->paket_harga_diskon,0,",",".").$limit_waktu ?></option>
                        <?php
                      } 
                    }
                  ?> 
                </select>

 
              </div>
            </div>
            <div class="row justify-content-start mt-4" >
              <div class="col">
                <div class="row">
                  <div class="col">
                    <!-- <a class="btn btn-primary btn-order btn-block" style="background-color: #005CAA;">Lanjut</a> -->
                    <input class="btn btn-primary btn-order btn-block" type="submit" name="submit" value="Lanjut">
                  </div>

                </div>

              </div>
            </div>
            </form>

          </div>
        </div>
      </div>
    </section>
</div>