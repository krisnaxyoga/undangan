<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="row mb-3">
        <!-- Pengguna Baru pending-->
        <div class="col-xl-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Pengguna Baru <code>pending</code></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <a href="<?= base_url('admin/data-pengguna/pembayaran-pengguna') ?>" >
                          <?= $totalPenggunaBarupending; ?>
                        </a>
                      </div>
                    </div>
                    <div class="col-auto">
                      <a href="<?= base_url('admin/data-pengguna/pembayaran-pengguna') ?>" >
                        <i class="fas fa-users fa-2x text-warning"></i>
                      </a>  
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <!-- Total Pengguna Aktif -->
        <div class="col-xl-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Pengguna Aktif</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                        <a href="<?= base_url('admin/data-pengguna/pembayaran-pengguna') ?>" >
                          <?= $totalPenggunaAktif ?>
                        </a>
                      </div>
                    </div>
                    <div class="col-auto">
                      <a href="<?= base_url('admin/data-pengguna/pembayaran-pengguna') ?>" >
                        <i class="fas fa-users fa-2x text-info"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
        <!-- Total Pengguna Tidak Aktif -->
        <div class="col-xl-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Pengguna Tidak Aktif</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                        <a href="<?= base_url('admin/data-pengguna/pembayaran-pengguna') ?>" >
                          <?= $totalPenggunaTidakAktif ?>
                        </a>
                      </div>
                    </div>
                    <div class="col-auto">
                      <a href="<?= base_url('admin/data-pengguna/pembayaran-pengguna') ?>" >
                        <i class="fas fa-users fa-2x text-danger"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
                   
        <!-- Keuntungan Pengguna Baru -->
        <div class="col-xl-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Keuntungan Pengguna Baru</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= rupiah($totalKeuntunganPenggunaBaru) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <!-- Keuntungan Pengguna Baru pending-->
        <div class="col-xl-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Keuntungan Pengguna Baru <code>pending</code></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= rupiah($totalKeuntunganPenggunaBarupending) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <!-- Permintaan Upgrade Paket Perlu Konfirmasi Admin-->
        <div class="col-xl-6 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Permintaan Upgrade Paket Perlu Konfirmasi Admin</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <a href="<?= base_url('admin/data-pengguna/permintaan-upgrade-paket') ?>" >
                          <?= $totalPermintaanUpgradePaketPerluKonfirmasi; ?>
                        </a>
                      </div>
                    </div>
                    <div class="col-auto">
                      <a href="<?= base_url('admin/data-pengguna/permintaan-upgrade-paket') ?>" >
                        <i class="fas fa-level-up  fa-2x text-warning"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <!-- Total Permintaan Upgrade Paket-->
        <div class="col-xl-6 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Permintaan Upgrade Paket</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <a href="<?= base_url('admin/data-pengguna/permintaan-upgrade-paket') ?>" >
                          <?= $totalPermintaanUpgradePaket; ?>
                        </a>
                      </div>
                    </div>
                    <div class="col-auto">
                      <a href="<?= base_url('admin/data-pengguna/permintaan-upgrade-paket') ?>" >
                        <i class="fas fa-level-up  fa-2x text-primary"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>    
        <!-- Keuntungan Upgrade Paket -->
        <div class="col-xl-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Keuntungan Upgrade Paket</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= rupiah($totalKeuntunganUpgradePaket) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <!-- Keuntungan Upgrade Paket pending -->
        <div class="col-xl-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Keuntungan Upgrade Paket <code>pending</code></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= rupiah($totalKeuntunganUpgradePaketpending) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        

            
            

            
    </div>
    <!--Row-->
</div>
<!---Container Fluid-->

 