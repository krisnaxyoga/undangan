<!DOCTYPE html>
<html Content-Language="ID" lang="id" xml:lang="id">

<head>
    <!-- Umum meta tags -->
    <title><?= $title ?> - <?= $website_umum[1]->website_isi ?></title> 
    <link rel="icon" href="<?php echo base_url() ?>/assets/base/img/favicon.ico?<?= date("Y-m-d"); ?>">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= $website_umum[2]->website_isi ?>">
    <meta name="keywords" content="<?= $website_umum[3]->website_isi ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="<?= $website_umum[4]->website_isi ?>">
    <!-- FB meta tags -->
    <meta property="og:title" content="<?= $website_umum[7]->website_isi ?>">
    <meta property="og:description" content="<?= $website_umum[8]->website_isi ?>">
    <meta property="og:url" content="<?php echo base_url() ?>">
    <meta property="og:image" itemprop="image" content="<?php echo base_url() ?><?= $website_umum[10]->website_isi ?>">
    <meta property="og:image:width" content="<?= $website_umum[11]->website_isi ?>">
    <meta property="og:image:height" content="<?= $website_umum[12]->website_isi ?>">
    <meta property="fb:pages" content="<?= $website_umum[5]->website_isi ?>" />
    <meta name="facebook-domain-verification" content="<?= $website_umum[6]->website_isi ?>" />

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/base/css/tema-web/<?= strtolower($website_umum[15]->website_isi) ?>/style.css?">
    <link href="<?= base_url('assets/admin/'); ?>/vendor/fontawesome-free/css/all.min.css?" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/admin/'); ?>/vendor/bootstrap/css/bootstrap.css?" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/admin/'); ?>/css/tema-web/<?= strtolower($website_umum[15]->website_isi) ?>/ruang-admin.css?" rel="stylesheet">
    <link href="<?= base_url('assets/admin/'); ?>/vendor/datatables/dataTables.bootstrap4.min.css?" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/base/css/croppie.min.css?">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/base/css/tema-web/<?= strtolower($website_umum[15]->website_isi) ?>/pikaday.css?">
    

    <script src="<?= base_url() ?>/assets/base/js/moment-with-locales.js"></script>
    <script src="<?= base_url('assets/dashboard'); ?>/vendor/jquery/jquery.min.js"></script>
</head>

<body id="page-top">
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-tema accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center " href="<?= base_url('admin/dashboard'); ?>">
            <div class="sidebar-brand-icon">
                <img class="rounded bg-light" src="<?= base_url('assets/base'); ?>/img/logo.png">
            </div>
            <div class="sidebar-brand-text mx-3"><?= $website_umum[0]->website_isi ?></div>
        </a>
        <hr class="sidebar-divider my-0"/>
        <li class="nav-item">
            <a class="nav-link" target="_BLANK" href="<?= SITE_UTAMA; ?>">
                <i class="fas fa-globe text-primary"></i>
                <span class="text-primary">Lihat Website</span></a>
        </li>
        <li class="nav-item <?php if ($pilihanmenuS3 == "dashboard"){echo "active";}else{echo "";} ?>">
            <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">
                <i class="fas fa-fw fa-tachometer-alt text-primary"></i>
                <span class="text-primary">Dashboard</span></a>
        </li>
        <hr class="sidebar-divider"/>
        <li class="nav-item">
            <a class="nav-link underline" href=""> 
                <span >Data Pengguna</span></a>
        </li>
        <li class="nav-item <?php if ($pilihanmenuS4 == "list-pengguna"){echo "active";}else{echo "";} ?>">
            <a class="nav-link" href="<?= base_url('admin/data-pengguna/list-pengguna'); ?>">
                <i class="fas fa-fw fa-user-alt text-danger"></i>
                <span class="text-danger">List Pengguna</span></a>
        </li>
        <li class="nav-item <?php if ($pilihanmenuS4 == "pembayaran-pengguna"){echo "active";}else{echo "";} ?>">
            <a class="nav-link" href="<?= base_url('admin/data-pengguna/pembayaran-pengguna'); ?>">
                <i class="fas fa-fw fa-money-bill-alt text-danger"></i>
                <span class="text-danger">Pembayaran Pengguna</span></a>
        </li>
        <li class="nav-item <?php if ($pilihanmenuS4 == "permintaan-upgrade-paket"){echo "active";}else{echo "";} ?>">
            <a class="nav-link" href="<?= base_url('admin/data-pengguna/permintaan-upgrade-paket'); ?>">
                <i class="fas fa-fw fa-list text-danger"></i>
                <span class="text-danger">Permintaan Upgrade Paket</span></a>
        </li>
        <hr class="sidebar-divider"/>
        <li class="nav-item">
            <a class="nav-link underline" href=""> 
                <span class="">Pengaturan UDO</span></a>
        </li>
        <li class="nav-item <?php if ($pilihanmenuS4 == "paket-undangan"){echo "active";}else{echo "";} ?>">
            <a class="nav-link" href="<?= base_url('admin/pengaturan-udo/paket-undangan'); ?>">
                <i class="fas fa-fw fa-list text-success"></i>
                <span class="text-success">Paket</span></a>
        </li>
        <!--
        <li class="nav-item <?php if ($pilihanmenuS3 == "sepatah-kata-undangan"){echo "active";}else{echo "";} ?>">
            <a class="nav-link" href="<?= base_url('admin/sepatah-kata-undangan'); ?>">
                <i class="fas fa-fw fa-book text-success"></i>
                <span class="text-success">Sepatah Kata</span></a>
        </li>
        <li class="nav-item <?php if ($pilihanmenuS3 == "tema-undangan"){echo "active";}else{echo "";} ?>">
            <a class="nav-link" href="<?= base_url('admin/tema-undangan'); ?>">
                <i class="fas fa-fw fa-image text-success"></i>
                <span class="text-success">Tema</span></a>
        </li>-->
        <hr class="sidebar-divider"/>  
        <li class="nav-item ">
            <a class="nav-link underline " href=""> 
                <span class=" ">Pengaturan Website</span></a>
        </li>
        <li class="nav-item <?php if ($pilihanmenuS4 == "umum"){echo "active";}else{echo "";} ?>">
            <a class="nav-link" href="<?= base_url('admin/pengaturan-website/umum'); ?>">
                <i class="fas fa-globe text-warning"></i>
                <span class="text-warning">Umum</span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWidget" aria-expanded="true" aria-controls="collapseWidget">
                <i class="fas fa-cog text-warning"></i>
                <span class="text-warning">Widget</span></a>
            <div id="collapseWidget" class="text-warning collapse <?php if ($pilihanmenuS4 == "widget" ){echo "show active";}else{echo "";} ?>" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="text-warning collapse-item <?php if ($pilihanmenuS5 == "home"){echo "active";}else{echo "";} ?>" href="<?= base_url('admin/pengaturan-website/widget/home'); ?>">Home</a>
                    
                </div>   
            </div>    
        </li>
        <li class="nav-item <?php if ($pilihanmenuS4 == "bank-admin"){echo "active";}else{echo "";} ?>">
            <a class="nav-link" href="<?= base_url('admin/pengaturan-website/bank-admin'); ?>">
                <i class="fas fa-money-bill text-warning"></i>
                <span class="text-warning">Bank Admin</span></a>
        </li>
        <li class="nav-item <?php if ($pilihanmenuS4 == "database"){echo "active";}else{echo "";} ?>">
            <a class="nav-link" href="<?= base_url('admin/pengaturan-website/database'); ?>">
                <i class="fas fa-database text-warning"></i>
                <span class="text-warning">Database</span></a>
        </li>
         
        <hr class="sidebar-divider"/>
        <div class="version" ><?= $website_umum[0]->website_isi ?> Versi <?= $_SESSION['sistem_versi'] ?></div>
    </ul>
    <!-- Sidebar -->

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- TopBar -->
            <nav class="navbar navbar-expand navbar-tema bg-navbar topbar mb-4 static-top">
                <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                    <!-- NOTIF -- >
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                                aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                                <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                                </div>
                            </div>
                            </form>
                        </div>
                        </li>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                            Alerts Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 12, 2019</div>
                                <span class="font-weight-bold">A new monthly report is ready to download!</span>
                            </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-success">
                                <i class="fas fa-donate text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 7, 2019</div>
                                $290.29 has been deposited into your account!
                            </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 2, 2019</div>
                                Spending Alert: We've noticed unusually high spending for your account.
                            </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <span class="badge badge-warning badge-counter">2</span>
                        </a>
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                            Message Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/man.png" style="max-width: 60px" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been
                                having.</div>
                                <div class="small text-gray-500">Udin Cilok · 58m</div>
                            </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/girl.png" style="max-width: 60px" alt="">
                                <div class="status-indicator bg-default"></div>
                            </div>
                            <div>
                                <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people
                                say this to all dogs, even if they aren't good...</div>
                                <div class="small text-gray-500">Jaenab · 2w</div>
                            </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-tasks fa-fw"></i>
                            <span class="badge badge-success badge-counter">3</span>
                        </a>
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                            Tugas Admin
                            </h6>
                            <a class="dropdown-item align-items-center" href="#">
                            <div class="mb-3">
                                <div class="small text-gray-500">Konfirmasi Penngguna Baru
                                <div class="small float-right"><b>50%</b></div>
                                </div>
                                <div class="progress" style="height: 12px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            </a>
                            <a class="dropdown-item align-items-center" href="#">
                            <div class="mb-3">
                                <div class="small text-gray-500">Konfirmasi Upgrade Paket Pengguna
                                <div class="small float-right"><b>30%</b></div>
                                </div>
                                <div class="progress" style="height: 12px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            </a>
                             
                            <a class="dropdown-item text-center small text-gray-500" href="#">View All Taks</a>
                        </div>
                    </li>
                    <!-- NOTIF -->
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="img-profile rounded-circle" src="<?= base_url('assets/dashboard'); ?>/img/boy.png" style="max-width: 60px">
                            <span class="ml-2 d-none d-lg-inline text-white small"><?= $_SESSION['nama_lengkap_admin'] ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= base_url('admin/profil') ?>">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profil
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url('logout') ?>">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- Topbar -->
            <?php
            function rupiah($angka){
	
                $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                return $hasil_rupiah;
             
            }
            ?>

            <?php 
            echo view($view);
            ?>

        </div>
        
        <!-- Footer -->
        <footer class="sticky-footer footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                <p class="text-footer-home">
                <a href="<?php echo base_url() ?>" rel="dofollow" target="_blank">
                    <?= $website_umum[0]->website_isi ?>
                </a> &#169; 
                <?php
                if ($website_umum[13]->website_isi == date("Y")){
                    echo $website_umum[13]->website_isi;
                }else{
                    echo $website_umum[13]->website_isi." - ".date("Y");
                }
                ?> <?= $website_umum[14]->website_isi ?>
                </p>
            </div>
            </div>
        </footer>
        <!-- Footer -->
    </div>
    
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


    <!-- modal upload croppie -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Foto Mempelai</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div id="resizer"></div>
                    <hr>
                    <button class="btn btn-block btn-dark" id="upload" > 
                    Upload</button>
                </div>
            </div>
        </div>
    </div>

<script src="<?= base_url('assets/dashboard'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/dashboard'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/dashboard'); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/dashboard'); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/dashboard'); ?>/js/ruang-admin.js"></script>

<!-- cart 
<script src="<?= base_url('assets/dashboard'); ?>/vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/dashboard'); ?>/js/demo/chart-area-demo.js"></script>
-->

<!-- Page level custom scripts -->
<script>
 $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
</script>

</body>

</html>