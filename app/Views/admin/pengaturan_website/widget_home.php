<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div> 

    <div class="row" id="WidgetPaketUDO">   
        <div class="col-xl-12 col-lg-12 mb-4"> 
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Widget Cover</h6>
                </div>
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-xl-12 col-lg-6 mb-4">
                            <div class="card ">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                                    <h6 class="m-0 font-weight-bold text-white"><?= $website_umum[0]->website_isi ?></h6>
                                </div>
                                <div class="table-responsive p-3"> 
                                    <div class="form-group">
                                        <label>Isi Widget (Text)</label>
                                        <textarea id="widget_cover_isi" type="text" class="form-control" placeholder="" style="height: 148px;"><?= $widget_data_cover[0]->widget_isi ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Tombol Cover</label>
                                        <br>
                                        <?php
                                        $a="0";
                                        foreach ($widget_data_cover_links as $row_widget_data_cover_links ){
                                        ?>
                                        <i class="<?= $row_widget_data_cover_links->widget_links_icon ?>"></i> <?= $row_widget_data_cover_links->widget_links_judul ?>
                                        <!--<div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-dark border border-dark" id="basic-addon3">Icon</span>
                                            </div>
                                            <input id="widget_cover_links_icon-<?= $a ?>" class="form-control " value="<?= $row_widget_data_cover_links->widget_links_icon ?>" >
                                        </div>-->
                                         <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-dark border border-dark" id="basic-addon3">Teks Url</span>
                                            </div>
                                            <input id="widget_cover_links_judul-<?= $a ?>" class="form-control " value="<?= $row_widget_data_cover_links->widget_links_judul ?>" >
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-dark border border-dark" id="basic-addon3">Url</span>
                                            </div>
                                            <input id="widget_cover_links_url-<?= $a ?>" class="form-control disabled" disabled value="<?= $row_widget_data_cover_links->widget_links_url ?>"></input>
                                        </div>
                                        <input id="widget_cover_links_id-<?= $a ?>" hidden value="<?= $row_widget_data_cover_links->widget_links_id ?>">
                                        <?php
                                        $a++;
                                        }
                                        ?>
                                    </div>
                                    <div class="row align-items-center form-group">
                                      <div class="col-6 mr-2">
                                          <label>Foto Model Website</label>  
                                          <?php
                                          if ($_SESSION['admin_level']=="Demo"){
                                            ?>
                                            <input type="file" class="form-control" disabled></input> 
                                            <?php
                                          }else{
                                            ?> 
                                          <input type="file" class="form-control" name="file_foto_model" id="file_foto_model"></input>
                                          <?php
                                          }
                                          ?> 
                                          <small class="text-warning">Foto Model Website adalah gambar yang merupakan logo Anda.Digunakan untuk icon (Favicon) website. Ukuran disarankan yaitu Lebar = 352px dan Tinggi = 352px.</small>
                                      </div> 
                                      <div class="col-auto row align-items-center"> 
                                          <span id="file_foto_model_status">
                                              <img src="<?= base_url('/assets/base/img/home-foto-model.png') ?>" class="rounded-circle img-fluid " style="height: 150px;width: 150px;"></img>
                                          </span>  
                                      </div>
                                    </div> 
                                    <!--Satu Kotak--> 
                                    <?php
                                    if ($_SESSION['admin_level']=="Demo"){
                                      ?>
                                      <button class="btn btn-primary" disabled>Simpan</button>
                                      <?php
                                    }else{
                                      ?>
                                    <input id="widget_cover_id" hidden value="<?= $widget_data_cover[0]->widget_id ?>"> 
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalWidgetCover">Simpan</button>
                                    <?php
                                    }
                                    ?>
                                </div>
                                     
                            </div>
                        </div>
                        <!-- Col sub -->
                        
                    </div>
                    <!-- row sub -->
                </div>
            </div> 
        </div> 
        <!--Col-->
    </div> 
    <!--Row-->

    <div class="row" id="WidgetFitur">   
        <div class="col-xl-12 col-lg-12 mb-4"> 
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Widget Fitur</h6>
                </div>
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-xl-12 col-lg-6 mb-4">
                            <div class="card ">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                                    <h6 class="m-0 font-weight-bold text-white"><?= $widget_data_fitur[0]->widget_judul ?></h6>
                                </div>
                                <div class="table-responsive p-3">
                                    <div class="form-group mt-2">
                                        <label>Judul Widget</label>
                                        <input id="widget_fitur_judul" class="form-control" placeholder="Contoh : Fitur" value="<?= $widget_data_fitur[0]->widget_judul ?>" >
                                    </div> 
                                    <div class="form-group">
                                        <label>Isi Widget</label>
                                        
                                        <br>
                                        <div class="row">
                                        <?php
                                        $c='0';
                                        foreach ($widget_data_fitur_links as $row_widget_data_fitur_links ){
                                        ?>
                                        <div class="col-12 col-md-4 pt-3 pt-sm-4 pt-md-0">
                                          <div class="row">
                                            <div class="col-2">
                                              <img alt="image" class="fdb-icon" src="<?php echo base_url() ?>/<?= $row_widget_data_fitur_links->widget_links_icon ?>">
                                            </div>
                                            <div class="col-10">
                                              <h4><strong><?= $row_widget_data_fitur_links->widget_links_judul ?></strong></h4>
                                              <p>
                                              <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text bg-dark border border-dark" id="basic-addon3">Icon</span>
                                                  </div>
                                                  <input id="widget_fitur_links_icon-<?= $c ?>" class="form-control " value="<?= $row_widget_data_fitur_links->widget_links_icon ?>" >
                                              </div>
                                              <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text bg-dark border border-dark" id="basic-addon3">Teks Url</span>
                                                  </div>
                                                  <input id="widget_fitur_links_judul-<?= $c ?>" class="form-control " value="<?= $row_widget_data_fitur_links->widget_links_judul ?>" >
                                              </div>
                                              <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text bg-dark border border-dark" id="basic-addon3">Deskripsi</span>
                                                  </div>
                                                  <textarea id="widget_fitur_links_deskripsi-<?= $c ?>" class="form-control "  style="height: 144px;" ><?= $row_widget_data_fitur_links->widget_links_deskripsi ?></textarea>
                                              </div> 
                                              <!--<div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text bg-dark border border-dark" id="basic-addon3">Url</span>
                                                  </div>
                                                  <textarea id="widget_fitur_links_url-<?= $c ?>" class="form-control "  style="height: 144px;" ><?= $row_widget_data_fitur_links->widget_links_url ?></textarea>
                                              </div> -->
                                              </p>
                                            </div>
                                          </div>
                                        </div> 
                                        <input id="widget_fitur_links_id-<?= $c ?>" hidden value="<?= $row_widget_data_fitur_links->widget_links_id ?>">
                                        <?php
                                        $c++;
                                        }
                                        ?>
                                        </div>
                                    </div>
                                    <?php
                                    if ($_SESSION['admin_level']=="Demo"){
                                      ?>
                                      <button class="btn btn-primary" disabled>Simpan</button>
                                      <?php
                                    }else{
                                      ?>
                                    <input id="widget_fitur_id" hidden value="<?= $widget_data_fitur[0]->widget_id ?>"> 
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalWidgetFitur">Simpan</button>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- Col sub -->
                        
                    </div>
                    <!-- row sub -->
                </div>
            </div> 
        </div> 
        <!--Col-->
    </div> 
    <!--Row-->

    <div class="row" id="WidgetPaketUDO">   
        <div class="col-xl-12 col-lg-12 mb-4"> 
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Widget Paket UDO</h6>
                </div>
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-xl-12 col-lg-6 mb-4">
                            <div class="card ">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                                    <h6 class="m-0 font-weight-bold text-white"><?= $widget_data_paket_udo[0]->widget_judul ?></h6>
                                </div>
                                <div class="table-responsive p-3">
                                    <div class="form-group mt-2">
                                        <label>Judul Widget</label>
                                        <input id="widget_paket_udo_judul" class="form-control" placeholder="Contoh : Harga" value="<?= $widget_data_paket_udo[0]->widget_judul ?>" >
                                    </div> 
                                    <div class="form-group">
                                        <label>Isi Widget (Text)</label>
                                        <textarea id="widget_paket_udo_isi" type="text" class="form-control" placeholder="" style="height: 148px;"><?= $widget_data_paket_udo[0]->widget_isi ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Text Tombol Order Paket UDO</label>
                                        <input id="widget_paket_udo_links_judul" type="text" class="form-control" placeholder="" value="<?= $widget_data_paket_udo_links[0]->widget_links_judul ?>"></input>
                                    </div>
                                    <?php
                                    if ($_SESSION['admin_level']=="Demo"){
                                      ?>
                                      <button class="btn btn-primary" disabled>Simpan</button>
                                      <?php
                                    }else{
                                      ?>
                                    <input id="widget_paket_udo_id" hidden value="<?= $widget_data_paket_udo[0]->widget_id ?>">
                                    <input id="widget_paket_udo_links_id" hidden value="<?= $widget_data_paket_udo_links[0]->widget_links_id ?>"> 
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalWidgetPaketUdo">Simpan</button>
                                  <?php
                                    }
                                  ?>
                                </div>
                            </div>
                        </div>
                        <!-- Col sub -->
                        
                    </div>
                    <!-- row sub -->
                </div>
            </div> 
        </div> 
        <!--Col-->
    </div> 
    <!--Row-->

    <div class="row" id="WidgetTema">   
        <div class="col-xl-12 col-lg-12 mb-4"> 
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Widget Tema</h6>
                </div>
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-xl-12 col-lg-6 mb-4">
                            <div class="card ">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                                    <h6 class="m-0 font-weight-bold text-white"><?= $widget_data_tema[0]->widget_judul ?></h6>
                                </div>
                                <div class="table-responsive p-3">
                                    <div class="form-group mt-2">
                                        <label>Judul Widget</label>
                                        <input id="widget_tema_judul" class="form-control" placeholder="Contoh : Tema" value="<?= $widget_data_tema[0]->widget_judul ?>" >
                                    </div> 
                                    <div class="form-group">
                                        <label>Isi Widget (Text)</label>
                                        <textarea id="widget_tema_isi" type="text" class="form-control" placeholder="" style="height: 148px;"><?= $widget_data_tema[0]->widget_isi ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Text Tombol Lihat Semua Tema</label>
                                        <input id="widget_tema_links_judul" type="text" class="form-control" placeholder="" value="<?= $widget_data_tema_links[0]->widget_links_judul ?>"></input>
                                    </div>
                                    <?php
                                    if ($_SESSION['admin_level']=="Demo"){
                                      ?>
                                      <button class="btn btn-primary" disabled>Simpan</button>
                                      <?php
                                    }else{
                                      ?>
                                    <input id="widget_tema_id" hidden value="<?= $widget_data_tema[0]->widget_id ?>">
                                    <input id="widget_tema_links_id" hidden value="<?= $widget_data_tema_links[0]->widget_links_id ?>"> 
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalWidgetTema">Simpan</button>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- Col sub -->
                        
                    </div>
                    <!-- row sub -->
                </div>
            </div> 
        </div> 
        <!--Col-->
    </div> 
    <!--Row-->

    <div class="row" id="WidgetTestimoni">   
        <div class="col-xl-12 col-lg-12 mb-4"> 
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Widget Testimoni</h6>
                </div>
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-xl-12 col-lg-6 mb-4">
                            <div class="card ">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                                    <h6 class="m-0 font-weight-bold text-white"><?= $widget_data_testimoni[0]->widget_judul ?></h6>
                                </div>
                                <div class="table-responsive p-3">
                                    <div class="form-group mt-2">
                                        <label>Judul Widget</label>
                                        <input id="widget_testimoni_judul" class="form-control" placeholder="Contoh : Apa Kata Mereka?" value="<?= $widget_data_testimoni[0]->widget_judul ?>" >
                                    </div> 
                                    <!--<div class="form-group">
                                        <label>Isi Widget (Text)</label>
                                        <textarea id="widget_testimoni_isi" type="text" class="form-control" placeholder="" style="height: 148px;"><?= $widget_data_testimoni[0]->widget_isi ?></textarea>
                                    </div>-->
                                    <?php
                                    if ($_SESSION['admin_level']=="Demo"){
                                      ?>
                                      <button class="btn btn-primary" disabled>Simpan</button>
                                      <?php
                                    }else{
                                      ?>
                                    <input id="widget_testimoni_id" hidden value="<?= $widget_data_testimoni[0]->widget_id ?>"> 
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalWidgetTestimoni">Simpan</button>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- Col sub -->
                        
                    </div>
                    <!-- row sub -->
                </div>
            </div> 
        </div> 
        <!--Col-->
    </div> 
    <!--Row-->
    <div class="row" id="WidgetFooter">   
        <div class="col-xl-12 col-lg-12 mb-4"> 
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Widget Footer</h6>
                </div>
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-xl-12 col-lg-6 mb-4">
                            <div class="card ">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                                    <h6 class="m-0 font-weight-bold text-white"><?= $widget_data_footer_kiri[0]->widget_judul ?></h6>
                                </div>
                                <div class="table-responsive p-3">
                                    <div class="form-group mt-2">
                                        <label>Judul Widget</label>
                                        <input id="widget_footer_kiri_judul" class="form-control" placeholder="Contoh : Tentang Kami" value="<?= $widget_data_footer_kiri[0]->widget_judul ?>" >
                                    </div> 
                                    <div class="form-group">
                                        <label>Isi Widget (Text)</label>
                                        <textarea id="widget_footer_kiri_isi" type="text" class="form-control" placeholder="" style="height: 148px;"><?= $widget_data_footer_kiri[0]->widget_isi ?></textarea>
                                    </div>
                                    <?php
                                    if ($_SESSION['admin_level']=="Demo"){
                                      ?>
                                      <button class="btn btn-primary" disabled>Simpan</button>
                                      <?php
                                    }else{
                                      ?>
                                    <input id="widget_footer_kiri_id" hidden value="<?= $widget_data_footer_kiri[0]->widget_id ?>"> 
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalWidgetFooterKiri">Simpan</button>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- Col sub -->
                        <div class="col-xl-6 col-lg-6 mb-4">
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                                    <h6 class="m-0 font-weight-bold text-white"><?= $widget_data_footer_tengah[0]->widget_judul ?></h6>
                                </div>
                                <div class="table-responsive p-3">
                                    <div class="form-group mt-2">
                                        <label>Judul Widget</label>
                                        <input id="widget_footer_tengah_judul" class="form-control" placeholder="Contoh : Tentang Kami" value="<?= $widget_data_footer_tengah[0]->widget_judul ?>" >
                                    </div> 
                                    <div class="form-group">
                                        <label>Isi Widget</label> 
                                        <br>
                                        <?php
                                        $a="0";
                                        foreach ($widget_data_footer_tengah_links as $row_widget_data_footer_tengah_links ){
                                        ?>
                                        <i class="<?= $row_widget_data_footer_tengah_links->widget_links_icon ?>"></i> <?= $row_widget_data_footer_tengah_links->widget_links_judul ?>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-dark border border-dark" id="basic-addon3">Icon</span>
                                            </div>
                                            <input id="widget_footer_tengah_links_icon-<?= $a ?>" class="form-control " value="<?= $row_widget_data_footer_tengah_links->widget_links_icon ?>" >
                                        </div>
                                         <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-dark border border-dark" id="basic-addon3">Teks Url</span>
                                            </div>
                                            <input id="widget_footer_tengah_links_judul-<?= $a ?>" class="form-control " value="<?= $row_widget_data_footer_tengah_links->widget_links_judul ?>" >
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-dark border border-dark" id="basic-addon3">Url</span>
                                            </div>
                                            <textarea id="widget_footer_tengah_links_url-<?= $a ?>" class="form-control " style="height: 144px;"><?= $row_widget_data_footer_tengah_links->widget_links_url ?></textarea>
                                        </div> 
                                        <input id="widget_footer_tengah_links_id-<?= $a ?>" hidden value="<?= $row_widget_data_footer_tengah_links->widget_links_id ?>">
                                        <?php
                                        $a++;
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if ($_SESSION['admin_level']=="Demo"){
                                      ?>
                                      <button class="btn btn-primary" disabled>Simpan</button>
                                      <?php
                                    }else{
                                      ?>
                                    <input id="widget_footer_tengah_id" hidden value="<?= $widget_data_footer_tengah[0]->widget_id ?>"> 
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalWidgetFooterTengah">Simpan</button>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- Col sub -->
                        <div class="col-xl-6 col-lg-6 mb-4">
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                                    <h6 class="m-0 font-weight-bold text-white"><?= $widget_data_footer_kanan[0]->widget_judul ?></h6>
                                </div>
                                <div class="table-responsive p-3">
                                    <div class="form-group mt-2">
                                        <label>Judul Widget</label>
                                        <input id="widget_footer_kanan_judul" class="form-control" placeholder="Contoh : Tentang Kami" value="<?= $widget_data_footer_kanan[0]->widget_judul ?>" >
                                    </div> 
                                    <div class="form-group">
                                        <label>Isi Widget</label>
                                        <br>
                                        <?php
                                        $b='0';
                                        foreach ($widget_data_footer_kanan_links as $row_widget_data_footer_kanan_links ){
                                        ?>
                                        <i class="<?= $row_widget_data_footer_kanan_links->widget_links_icon ?>"></i> <?= $row_widget_data_footer_kanan_links->widget_links_judul ?>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-dark border border-dark" id="basic-addon3">Icon</span>
                                            </div>
                                            <input id="widget_footer_kanan_links_icon-<?= $b ?>" class="form-control " value="<?= $row_widget_data_footer_kanan_links->widget_links_icon ?>" >
                                        </div>
                                         <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-dark border border-dark" id="basic-addon3">Teks Url</span>
                                            </div>
                                            <input id="widget_footer_kanan_links_judul-<?= $b ?>" class="form-control " value="<?= $row_widget_data_footer_kanan_links->widget_links_judul ?>" >
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-dark border border-dark" id="basic-addon3">Url</span>
                                            </div>
                                            <textarea id="widget_footer_kanan_links_url-<?= $b ?>" class="form-control "  style="height: 144px;" ><?= $row_widget_data_footer_kanan_links->widget_links_url ?></textarea>
                                        </div> 
                                        <input id="widget_footer_kanan_links_id-<?= $b ?>" hidden value="<?= $row_widget_data_footer_kanan_links->widget_links_id ?>">
                                        <?php
                                        $b++;
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if ($_SESSION['admin_level']=="Demo"){
                                      ?>
                                      <button class="btn btn-primary" disabled>Simpan</button>
                                      <?php
                                    }else{
                                      ?>
                                    <input id="widget_footer_kanan_id" hidden value="<?= $widget_data_footer_kanan[0]->widget_id ?>"> 
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalWidgetFooterKanan">Simpan</button>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- Col sub -->
                    </div>
                    <!-- row sub -->
                </div>
            </div> 
        </div> 
        <!--Col-->
    </div> 
    <!--Row-->
</div>

<?php
if ($_SESSION['admin_level']!="Demo"){
?>
<!-- Modal -->
<div class="modal fade" id="modalWidgetCover" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan <b>Widget Cover</b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanWidgetCover">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalWidgetFitur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan <b>Widget Fitur</b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanWidgetFitur">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalWidgetPaketUdo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan <b>Widget Paket UDO</b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanWidgetPaketUdo">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalWidgetTema" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan <b>Widget Tema</b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanWidgetTema">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalWidgetTestimoni" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan <b>Widget Testimoni</b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanWidgetTestimoni">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalWidgetFooterKiri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan <b>Widget Footer Kiri</b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanWidgetFooterKiri">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalWidgetFooterTengah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan <b>Widget Footer Tengah</b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanWidgetFooterTengah">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalWidgetFooterKanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan <b>Widget Footer Kanan</b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanWidgetFooterKanan">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script> 

$(document).on('change', '#file_foto_model', function(){
    var name = document.getElementById("file_foto_model").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['png','jpg','jpeg']) == -1)
    {
      alert("Invalid Image File");
      return false;
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("file_foto_model").files[0]);
    var f = document.getElementById("file_foto_model").files[0];
    var fsize = f.size||f.fileSize;
    if(fsize > 2000000)
    {
      alert("Ukuran File Maksimal 2MB");
      return false;
    }
    else
        { 
            form_data.append("file", document.getElementById('file_foto_model').files[0]);
            $.ajax({
                url:"<?= base_url('admin/pengaturan-website/widget/home/upload-foto-model') ?>",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend:function(){
                    $('#file_foto_model_status').html("<p>Sedang mengupload gambar...</p>");
                },
                success:function(data)
                {
                    if(data !=''){
                        var hasil = "<img src='<?= base_url('/assets/base/img/home-foto-model.png') ?>' style='height: 50px;width: 50px;' class='rounded bg-light' />";
                        hasil += "<p>Gambar berhasil di upload <a rel='nofollow' class='btn btn-warning btn-sm' onclick='close_file_foto_model();'>Close</a></p>";
                        $('#file_foto_model_status').html(hasil);
                    }else{
                        $('#file_foto_model_status').html("<p>Gambar gagal diupload</p>");
                    }
                }
            });
        }
});
function close_file_foto_model(){
    var hasil = "<img src='<?= base_url('/assets/base/img/home-foto-model.png') ?>' style='height: 150px;width: 150px;' class='rounded-circle img-fluid' />"; 
    $('#file_foto_model_status').html(hasil);  
}

$('#simpanWidgetCover').on('click', function(event) {
  var widget_id = $('#widget_cover_id').val(); 
  var widget_judul = $('#widget_cover_judul').val();
  var widget_isi = $('#widget_cover_isi').val();
  var widget_links_id = [$('#widget_cover_links_id-0').val(), $('#widget_cover_links_id-1').val()];
  var widget_links_icon= [$('#widget_cover_links_icon-0').val(), $('#widget_cover_links_icon-1').val()];
  var widget_links_judul= [$('#widget_cover_links_judul-0').val(), $('#widget_cover_links_judul-1').val()];
  var widget_links_deskripsi = [$('#widget_cover_links_deskripsi-0').val(), $('#widget_cover_links_deskripsi-1').val()];
  var widget_links_url= [$('#widget_cover_links_url-0').val(), $('#widget_cover_links_url-1').val()];
  $.ajax({
      url : "<?= base_url('admin/pengaturan-website/widget-links-update') ?>",
      method : "POST",
      data : {widget_id: widget_id, widget_judul : widget_judul, widget_isi: widget_isi, widget_links_id: widget_links_id, widget_links_icon: widget_links_icon, widget_links_judul: widget_links_judul, widget_links_deskripsi: widget_links_deskripsi, widget_links_url: widget_links_url},
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

$('#simpanWidgetFitur').on('click', function(event) {
  var widget_id = $('#widget_fitur_id').val(); 
  var widget_judul = $('#widget_fitur_judul').val();
  var widget_links_id = [$('#widget_fitur_links_id-0').val(), $('#widget_fitur_links_id-1').val(), $('#widget_fitur_links_id-2').val(), $('#widget_fitur_links_id-3').val(), $('#widget_fitur_links_id-4').val(), $('#widget_fitur_links_id-5').val()];
  var widget_links_icon= [$('#widget_fitur_links_icon-0').val(), $('#widget_fitur_links_icon-1').val(), $('#widget_fitur_links_icon-2').val(), $('#widget_fitur_links_icon-3').val(), $('#widget_fitur_links_icon-4').val(), $('#widget_fitur_links_icon-5').val()];
  var widget_links_judul= [$('#widget_fitur_links_judul-0').val(), $('#widget_fitur_links_judul-1').val(), $('#widget_fitur_links_judul-2').val(), $('#widget_fitur_links_judul-3').val(), $('#widget_fitur_links_judul-4').val(), $('#widget_fitur_links_judul-5').val()];
  var widget_links_deskripsi = [$('#widget_fitur_links_deskripsi-0').val(), $('#widget_fitur_links_deskripsi-1').val(), $('#widget_fitur_links_deskripsi-2').val(), $('#widget_fitur_links_deskripsi-3').val(), $('#widget_fitur_links_deskripsi-4').val(), $('#widget_fitur_links_deskripsi-5').val()];
  var widget_links_url= [$('#widget_fitur_links_url-0').val(), $('#widget_fitur_links_url-1').val(), $('#widget_fitur_links_url-2').val(), $('#widget_fitur_links_url-3').val(), $('#widget_fitur_links_url-4').val(), $('#widget_fitur_links_url-5').val()];
  $.ajax({
      url : "<?= base_url('admin/pengaturan-website/widget-links-update') ?>",
      method : "POST",
      data : {widget_id: widget_id, widget_judul : widget_judul, widget_links_id: widget_links_id, widget_links_icon: widget_links_icon, widget_links_judul: widget_links_judul, widget_links_deskripsi: widget_links_deskripsi, widget_links_url: widget_links_url},
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

$('#simpanWidgetPaketUdo').on('click', function(event) {
  var widget_id = $('#widget_paket_udo_id').val(); 
  var widget_judul = $('#widget_paket_udo_judul').val();
  var widget_isi = $('#widget_paket_udo_isi').val();
  var widget_links_id = [$('#widget_paket_udo_links_id').val()];
  var widget_links_icon = [''];
  var widget_links_judul = [$('#widget_paket_udo_links_judul').val()];
  var widget_links_url = ['tema'];
  $.ajax({
      url : "<?= base_url('admin/pengaturan-website/widget-links-update') ?>",
      method : "POST",
      data : {widget_id: widget_id, widget_judul :widget_judul, widget_isi: widget_isi, widget_links_id: widget_links_id, widget_links_icon: widget_links_icon, widget_links_judul: widget_links_judul, widget_links_url: widget_links_url},
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

$('#simpanWidgetTema').on('click', function(event) {
  var widget_id = $('#widget_tema_id').val(); 
  var widget_judul = $('#widget_tema_judul').val();
  var widget_isi = $('#widget_tema_isi').val();
  var widget_links_id = [$('#widget_tema_links_id').val()];
  var widget_links_icon = [''];
  var widget_links_judul = [$('#widget_tema_links_judul').val()];
  var widget_links_url = ['tema'];
  $.ajax({
      url : "<?= base_url('admin/pengaturan-website/widget-links-update') ?>",
      method : "POST",
      data : {widget_id: widget_id, widget_judul :widget_judul, widget_isi: widget_isi, widget_links_id: widget_links_id, widget_links_icon: widget_links_icon, widget_links_judul: widget_links_judul, widget_links_url: widget_links_url},
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

$('#simpanWidgetTestimoni').on('click', function(event) {
  var widget_id = $('#widget_testimoni_id').val(); 
  var widget_judul = $('#widget_testimoni_judul').val();
  //var widget_isi = $('#widget_testimoni_isi').val();
  $.ajax({
      url : "<?= base_url('admin/pengaturan-website/widget-update') ?>",
      method : "POST",
      data : {widget_id: widget_id, widget_judul : widget_judul},
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

$('#simpanWidgetFooterKiri').on('click', function(event) {
  var widget_id = $('#widget_footer_kiri_id').val(); 
  var widget_judul = $('#widget_footer_kiri_judul').val();
  var widget_isi = $('#widget_footer_kiri_isi').val();
  $.ajax({
      url : "<?= base_url('admin/pengaturan-website/widget-update') ?>",
      method : "POST",
      data : {widget_id: widget_id, widget_judul : widget_judul, widget_isi: widget_isi},
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

$('#simpanWidgetFooterTengah').on('click', function(event) {
  var widget_id = $('#widget_footer_tengah_id').val(); 
  var widget_judul = $('#widget_footer_tengah_judul').val();
  
  var widget_links_id = [$('#widget_footer_tengah_links_id-0').val(), $('#widget_footer_tengah_links_id-1').val(), $('#widget_footer_tengah_links_id-2').val(), $('#widget_footer_tengah_links_id-3').val()];
  var widget_links_icon= [$('#widget_footer_tengah_links_icon-0').val(), $('#widget_footer_tengah_links_icon-1').val(), $('#widget_footer_tengah_links_icon-2').val(), $('#widget_footer_tengah_links_icon-3').val()];
  var widget_links_judul= [$('#widget_footer_tengah_links_judul-0').val(), $('#widget_footer_tengah_links_judul-1').val(), $('#widget_footer_tengah_links_judul-2').val(), $('#widget_footer_tengah_links_judul-3').val()];
  var widget_links_url= [$('#widget_footer_tengah_links_url-0').val(), $('#widget_footer_tengah_links_url-1').val(), $('#widget_footer_tengah_links_url-2').val(), $('#widget_footer_tengah_links_url-3').val()];
 

  
  $.ajax({
      url : "<?= base_url('admin/pengaturan-website/widget-links-update') ?>",
      method : "POST",
      data : {widget_id: widget_id, widget_judul : widget_judul, widget_links_id: widget_links_id, widget_links_icon: widget_links_icon, widget_links_judul: widget_links_judul, widget_links_url: widget_links_url},
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
 
$('#simpanWidgetFooterKanan').on('click', function(event) {
  var widget_id = $('#widget_footer_kanan_id').val(); 
  var widget_judul = $('#widget_footer_kanan_judul').val();
  var widget_links_id = [$('#widget_footer_kanan_links_id-0').val(), $('#widget_footer_kanan_links_id-1').val(), $('#widget_footer_kanan_links_id-2').val()];
  var widget_links_icon= [$('#widget_footer_kanan_links_icon-0').val(), $('#widget_footer_kanan_links_icon-1').val(), $('#widget_footer_kanan_links_icon-2').val()];
  var widget_links_judul= [$('#widget_footer_kanan_links_judul-0').val(), $('#widget_footer_kanan_links_judul-1').val(), $('#widget_footer_kanan_links_judul-2').val()];
  var widget_links_url= [$('#widget_footer_kanan_links_url-0').val(), $('#widget_footer_kanan_links_url-1').val(), $('#widget_footer_kanan_links_url-2').val()];
  $.ajax({
      url : "<?= base_url('admin/pengaturan-website/widget-links-update') ?>",
      method : "POST",
      data : {widget_id: widget_id, widget_judul : widget_judul, widget_links_id: widget_links_id, widget_links_icon: widget_links_icon, widget_links_judul: widget_links_judul, widget_links_url: widget_links_url},
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
<?php
}
?>