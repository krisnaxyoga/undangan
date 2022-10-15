<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <div>
            <br/>
        <a target="_self"  href="<?= base_url('user/kirim-undangan') ?>" class="btn btn-success btn-sm"><i class="fa-brands fa-whatsapp"></i>  Kirim Undangan</a>
        <a target="_blank"  href="<?= SITE_UNDANGAN ?>/<?= $order[0]->domain ?>" class="btn btn-warning btn-sm"><i class="fas fa-globe"></i> Lihat Undangan</a>
        <a target="_blank"  href="https://api.whatsapp.com/send?phone=<?= $no_hp_admin ?>&text=Halo%20Kak%20,%20saya%20pelanggan kakak, mau%20Bantuan%20tentang%20Undangan%20Digital%20Online%20:D" class="btn btn-info btn-sm"><i class="fa-brands fa-whatsapp"></i> Hubungi Admin</a>
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
                    
                    <h6 class="m-0 font-weight-bold " style="color:#10ac84">Invoice : Selesaikan pembayaran anda sebelum <?= $tglExpFormated ?>. Klik : <a href="<?= base_url('user/invoice') ?>"> konfirmasi pembayaran.</a></h6>

                </div>
            </div>
        </div>
        <?php } ?>

        <!-- New User Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Pengunjung</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_users_pengunjung ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Do'a dan Ucapan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_doa_dan_ucapan  ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pengunjung 7 Hari Terakhir</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Invoice Example -->
        <div class="col-xl-8 col-lg-7 mb-4">
            <div class="card">
                <div class="card-header py-3 bg-success d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white">Data Pengunjung</h6>
                    <a class="m-0 float-right btn btn-light btn-sm" href="<?= base_url('user/riwayat') ?>">Lihat lebih <i class="fas fa-chevron-right"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                        $limit = 0;
                        foreach($users_pengunjung as $row){ 
                            $limit++;
                            if($limit > 5){ //limit 5
                                break;
                            }
                    
                        ?>
                            <tr>
                                <td id='tanggal_kunjungan'><?= date( "m/d/Y", strtotime($row->created_at)) ?></td>
                               
                                <td><?= $row->nama_pengunjung ?></td>
                            </tr>

                        <?php } ?>
                            
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
        <!-- Message From Customer-->
        <div class="col-xl-4 col-lg-5 ">
            <div class="card">
                <div class="card-header py-4 bg-warning d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white">Data Do'a dan Ucapan</h6>
                </div>
                <div>
                    <?php 
                    $limit = 0;
                    foreach($doa_dan_ucapan as $doa_dan_ucapan_row){ 
                        $limit++;
                        if($limit > 4){ //limit 4 komentar
                            break;
                        }
                
                    ?>
                        <div class="customer-message align-items-center">
                            <a class="font-weight-bold text-warning" href="#">
                                <div class="text-truncate message-title"><?= \esc($doa_dan_ucapan_row->doa_dan_ucapan_isi) ?></div>
                                <div class="small text-gray-500 message-time font-weight-bold"><?= \esc($doa_dan_ucapan_row->doa_dan_ucapan_nama_pengunjung) ?></div>
                            </a>
                        </div>
                    <?php } ?>
                    
                    <div class="card-footer text-center ">
                        <a class="m-0 small card-link text-warning" href="<?= base_url('user/doa-dan-ucapan') ?>">Lihat Lebih <i class="fas fa-chevron-right"></i></a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <!--Row-->
</div>
<!---Container Fluid--> 

<script>

    var jumlah = [];
    var tanggal = [];
    moment.locale('id');
    var namaBulan  = moment().format('MMMM');
    
    <?php foreach($total_mingguan as $row){ ?>
        jumlah.push(<?= $row->jumlah ?>);
        tanggal.push(<?= $row->tanggal ?>+' '+namaBulan);
    <?php } ?>
    


</script>