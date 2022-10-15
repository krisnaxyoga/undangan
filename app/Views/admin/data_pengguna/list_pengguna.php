

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="row mb-3">


        <!-- Invoice Example -->
        <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                  <h6 class="m-0 font-weight-bold text-light">Data Pengguna</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Tanggal Daftar</th>
                        <th>Pengguna</th>
                        <th>Domain</th>
                        <th>Paket</th>
                        <th>Limit Waktu Saat itu</th>
                        <!--<th>Masa Akhir Paket</th>-->
                        <th>Status Tagihan</th>
                        <th>Jatuh Tempo Tagihan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Tanggal Daftar</th>
                        <th>Pengguna</th>
                        <th>Domain</th>
                        <th>Paket</th>
                        <!--<th>Limit Waktu Saat itu</th>-->
                        <th>Masa Akhir Paket</th>
                        <th>Status Tagihan</th>
                        <th>Jatuh Tempo Tagihan</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php 
                    foreach($join as $row){ 
                    ?>
                      <tr>
                        <td><?= date("d-m-Y H:i A", strtotime($row->users_order_created_at)) ?></td>
                        <td><?= $row->users_email ?></td>
                        <td><a href="<?= SITE_UNDANGAN.'/'.$row->users_order_domain ?>" target="_BLANK"  ><?= $row->users_order_domain ?></a></td>
                        <td><?= $row->undangan_paket_paket_nama ?></td>
                        <td><?php 
                              if ($row->users_order_pembayaran_paket_limit_waktu_saat_itu =="0"){
                                echo "Unlimited";
                              }else{
                                echo $row->users_order_pembayaran_paket_limit_waktu_saat_itu." hari";
                              }
                              ?></td>
                        <?php
                        $tgl1 = $row->users_order_pembayaran_updated_at;
                        $tgl2 = date('Y-m-d h:i:sa', strtotime('+'.$row->users_order_pembayaran_paket_limit_waktu_saat_itu.' days', strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak ... hari
                        $aktifsampaitgl = date("d-m-Y H:i A", strtotime($tgl2)); //print tanggal
                        ?>
                        <!--<td><?= $aktifsampaitgl ?></td> -->
                        <?php if($row->users_order_pembayaran_status == '4'){ ?>    
                        <td><span class="badge badge-info">Masa Aktif Habis</span></td>
                        <?php }else if($row->users_order_pembayaran_status == '3'){ ?>    
                        <td><span class="badge badge-dark">Di Non-Aktifkan</span></td>
                        <?php }else if($row->users_order_pembayaran_status == '2'){ ?>    
                        <td><span class="badge badge-success">Aktif dan Lunas</span></td>
                        <?php }else if($row->users_order_pembayaran_status == '1'){ ?>    
                        <td><span class="badge badge-warning">Menunggu Konfirmasi Admin</span></td>
                        <?php }else{ ?>    
                        <td><span class="badge badge-danger">Menunggu Pembayaran</span></td>
                        <?php } ?>
                        <?php     
                        $durasi = '+3 days';
                        $tglDaftar = $row->users_order_created_at;
                        $tglExp = strtotime($durasi, strtotime($tglDaftar));
                        $tglExpFormated = date("d-m-Y H:i A",$tglExp); 
                        ?> 
                        <td><?= $tglExpFormated ?></td>  
                        
                        

                        <td>
                            <form method="post" action="<?php echo base_url('admin/data-pengguna/list-pengguna/edit-pengguna'); ?>">
                            <input type="hidden" value="<?= $row->users_id ?>" name="id">
                            <button 
                            class="btn btn-sm btn-primary" type="submit">Edit</button>
                            </form>
                            <?php
                             if ($row->users_id=="1"){
                              ?>
                            <button 
                            title="Akun Demo Tidak Bisa Dihapus" 
                            class="btn btn-sm btn-danger disabled" >Hapus</button>  
                              <?php 
                             }else{ 
                              if ($_SESSION['admin_level']=="Demo"){
                                ?>
                                <button 
                                title="Anda Sedang Menggunakan Akun Admin Demo" 
                                class="btn btn-sm btn-danger disabled" >Hapus</button>  
                              <?php
                              }else{ 
                              ?>
                            <button 
                            data-id="<?= $row->users_id?>" 
                            class="btn btn-sm btn-danger hapus" data-toggle="modal" data-target="#modalHapus">Hapus</button>  
                              <?php
                              }
                             }
                            ?>
                            
                        </td>
                      </tr>

                    <?php } ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
        <!-- Message From Customer-->
       
    </div>
    <!--Row-->
</div>
<!---Container Fluid-->

<?php
if ($_SESSION['admin_level']!="Demo"){
?>
<!-- Modal -->
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menghapus pengguna ini ?<br>
        <strong>SEMUA DATA PENGGUNA pada WEBSITE ini AKAN TERHAPUS!!</strong>
        <input type="hidden" id="iduser" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm text-danger" id="hapusBtn">Hapus</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
  

    $('.hapus').on('click', function (event) {
        var iduser = $(this).data('id');
        $(".modal-body #iduser").val( iduser );
    });

    $('#hapusBtn').on('click', function(event) {

        var id = $('#iduser').val();
     
        $.ajax({
            url : "<?= base_url('admin/data-pengguna/list-pengguna/hapus-user') ?>",
            method : "POST",
            data : {id: id},
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