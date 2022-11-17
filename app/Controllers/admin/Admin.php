<?php namespace App\Controllers\admin;

use CodeIgniter\Controller;
use App\Models\admin\AdminModel;

class Admin extends Controller
{
    public function __construct() { 
        $this->session = session();
        $this->AdminModel = new AdminModel(); 
		$this->request = \Config\Services::request(); //memanggil class request
        $this->uri = $this->request->uri; //class request digunakan untuk request uri/url 
    }

    /*---------------------------
        SISTEM
    ----------------------------*/
    public function index(){ 
        
        if(session()->has('masukAdmin'))
        {
        	return redirect()->to(base_url('admin/dashboard'));
        }else{
            return redirect()->to(base_url('/login'));
        }
    }
    public function sistem_versi(){
        return $this->AdminModel->get_sistem_versi();
    }

    /*---------------------------
        LOGIN
    ----------------------------*/
    public function do_auth(){

        $data['email'] = $this->request->getPost('email');
        $data['password'] = md5($this->request->getPost('password'));
        $hasil = $this->AdminModel->get_admin($data);
        
        if(count($hasil) > 0)
        {
            // SISTEM
            $sistem_versi = $this->sistem_versi();
            // set session
            $sess_data = array('masukAdmin' => TRUE, 
                                'uname_admin' => $hasil[0]->username, 
                                'nama_lengkap_admin' => $hasil[0]->nama_lengkap, 
                                'id_admin' => $hasil[0]->id,
                                'admin_level' => $hasil[0]->admin_level,
                                'sistem_versi' => $sistem_versi
                            );
            $this->session->set($sess_data);
            return redirect()->to(base_url('admin/dashboard'));
            exit();
        }
        else
        {
            $this->session->setFlashdata('errors', ['Password Salah']);
            return redirect()->to(base_url('/login'));
        }
		
    }
    public function do_unauth(){ 
        $this->session->destroy();
        return redirect()->to(base_url('/login')); 
	}
    public function login(){
        if(session()->has('masukAdmin'))
        {
        	return redirect()->to(base_url('admin/dashboard'));
        }
        $data['title'] = 'Selamat Datang!';
        $data['view'] = 'admin/auth/login';
        $data['url_site_utama'] = SITE_UTAMA;
        //mengambil data tetap website_umum
		$data['website_umum'] = $this->AdminModel->get_all_website_umum();
        return view('admin/auth/layout', $data);
    }

    /*---------------------------
        DASHBOARD
    ----------------------------*/
    public function dashboard(){
        $data['title'] = 'Admin Dashboard';
        $data['view'] = 'admin/index';
        //mengambil data tetap website_umum
		$data['website_umum'] = $this->AdminModel->get_all_website_umum();
        //Data Pengguna Baru
        $data['totalPenggunaBarupending'] = $this->AdminModel->get_total_pengguna_baru_pending(); 
        $data['totalKeuntunganPenggunaBaru'] = $this->AdminModel->get_total_keuntungan_pengguna_baru();
        $data['totalKeuntunganPenggunaBarupending'] = $this->AdminModel->get_total_keuntungan_pengguna_baru_pending();
        //Data Pengguna
        $data['totalPenggunaAktif'] = $this->AdminModel->get_total_pengguna_aktif();
        $data['totalPenggunaTidakAktif'] = $this->AdminModel->get_total_pengguna_tidak_aktif();
        //Data Permintaan Upgrade
        $data['totalPermintaanUpgradePaketPerluKonfirmasi'] = $this->AdminModel->get_total_permintaan_upgrade_paket_perlu_konfirmasi();
        $data['totalPermintaanUpgradePaket'] = $this->AdminModel->get_total_permintaan_upgrade_paket();
        $data['totalKeuntunganUpgradePaket'] = $this->AdminModel->get_total_keuntungan_upgrade_paket();
        $data['totalKeuntunganUpgradePaketpending'] = $this->AdminModel->get_total_keuntungan_upgrade_paket_pending();

        //ATURAN CSS MENU 
        $pilihanmenuS3  = $this->uri->getSegment(3);
        $data['pilihanmenuS3'] = urldecode($pilihanmenuS3);
        $pilihanmenuS4  = $this->uri->getSegment(4);
        $data['pilihanmenuS4'] = urldecode($pilihanmenuS4);
        // $pilihanmenuS5  = $this->uri->getSegment(5);
        // $data['pilihanmenuS5'] = urldecode($pilihanmenuS5); 
        return view('admin/layout', $data);
    }

    /*---------------------------
        DATA PENGGUNA
    ----------------------------*/ 
		/* ============ LIST PENGGUNA ============ */
        public function list_pengguna(){
            $data['title'] = 'Data Pengguna';
            $data['view'] = 'admin/data_pengguna/list_pengguna';
            //mengambil data tetap website_umum
            $data['website_umum'] = $this->AdminModel->get_all_website_umum();
            $data['join'] = $this->AdminModel->get_all_join();
            //ATURAN CSS MENU 
            //$pilihanmenuS3  = $this->uri->getSegment(3);
            //$data['pilihanmenuS3'] = urldecode($pilihanmenuS3); 
            $pilihanmenuS4  = $this->uri->getSegment(4);
            $data['pilihanmenuS4'] = urldecode($pilihanmenuS4); 
            //$pilihanmenuS5  = $this->uri->getSegment(5);
            //$data['pilihanmenuS5'] = urldecode($pilihanmenuS5); 
            return view('admin/layout', $data);
        }
        public function list_pengguna_edit_pengguna(){
            if($this->request->getMethod() == 'post'){
                $id = $this->request->getPost('id');
                $this->session->set('id_usernya', $id);
            }
            
            //mengambil data tetap website_umum
            $data['website_umum'] = $this->AdminModel->get_all_website_umum();
            $data['user'] = $this->AdminModel->get_user_by_id_user();
            $data['fitur'] = $this->AdminModel->get_fitur_by_id_user();
            $data['users_acara'] = $this->AdminModel->get_users_acara_by_id_user();
            $data['users_mempelai'] = $this->AdminModel->get_users_mempelai_by_id_user();
            $data['users_cerita'] = $this->AdminModel->get_users_cerita_by_id_user(); 
            $data['users_album'] = $this->AdminModel->get_users_album_by_id_user();
            $data['users_album_video'] = $this->AdminModel->get_users_album_video_by_id_user();
            $data['undangan_pengaturan'] = $this->AdminModel->get_undangan_pengaturan_by_id_user($id);
            $data['users_order'] = $this->AdminModel->get_users_order_by_id_user(); 
            $data['users_order_musik'] = $this->AdminModel->get_users_order_musik();
            $data['undangan_musik'] = $this->AdminModel->get_all_undangan_musik();

            //ATURAN CSS MENU 
            //$pilihanmenuS3  = $this->uri->getSegment(3);
            //$data['pilihanmenuS3'] = urldecode($pilihanmenuS3); 
            $pilihanmenuS4  = $this->uri->getSegment(4);
            $data['pilihanmenuS4'] = urldecode($pilihanmenuS4); 
            //$pilihanmenuS5  = $this->uri->getSegment(5);
            //$data['pilihanmenuS5'] = urldecode($pilihanmenuS5);
            $data['title'] = 'Edit Pengguna';
            $data['view'] = 'admin/data_pengguna/edit_pengguna';
            return view('admin/layout', $data);

        }
        public function do_update_user(){
            if($this->request->getPost('password') != ''){
                $data['password'] = md5($this->request->getPost('password'));
            } 
            $data['username'] = $this->request->getPost('username');
            $data['email'] = $this->request->getPost('email');
            $data['hp'] = $this->request->getPost('hp'); 
            $update = $this->AdminModel->update_user($data);
            if($update){
                $this->session->set('uname', $data['username']);
                echo 'sukses';
            }else{
                echo 'gagal';
            } 
        }
        public function do_update_users_cerita(){ 
            //HAPUS DULU SESSION SEBELUMNYA
            $jml_cerita_sebelumnya = $this->session->get('jml_cerita'); 
            for($i=0;$i<=$jml_cerita_sebelumnya;$i++){
                $this->session->remove('tanggal_cerita'.$i);
                $this->session->remove('judul_cerita'.$i);
                $this->session->remove('isi_cerita'.$i);
            } 
            //SEBAGAI ARRAY PENANDA
            $noTanggal = 0;
            $noJudul = 0;
            $noIsi = 0; 
            //KITA KUMPULKAN DAN SIMPAN DATANYA DI SESSION DULU
            foreach ($this->request->getPost('tanggal_cerita') as $value) {
                if($value == "")
                    continue;
                $this->session->set('tanggal_cerita'.$noTanggal++, $value);  
            } 
            foreach ($this->request->getPost('judul_cerita') as $value) {
                if($value == "")
                continue;
                $this->session->set('judul_cerita'.$noJudul++, $value); 
            } 
            foreach ($this->request->getPost('isi_cerita') as $value) {
                if($value == "")
                continue;
                $this->session->set('isi_cerita'.$noIsi++, $value); 
            } 
            //KEMUDIAN HAPUS SEMUA DATA CERITA SEBULUMNYA
            $hpscerita = $this->AdminModel->hapus_users_cerita(); 
            //SETELAH ITU KITA SIMPAN KE DB
            for($i=0;$i<$noTanggal;$i++){
                $tanggal_cerita = $this->session->get('tanggal_cerita'.$i);
                $judul_cerita = $this->session->get('judul_cerita'.$i);
                $isi_cerita = $this->session->get('isi_cerita'.$i); 
                $datausers_Cerita = [
                    'id_user' => $_SESSION['id_usernya'],
                    'tanggal_cerita' => $tanggal_cerita,
                    'judul_cerita' => $judul_cerita,
                    'isi_cerita' => $isi_cerita
                ]; 
                $saveusers_Cerita = $this->AdminModel->save_users_cerita($datausers_Cerita);
            } 
            return redirect()->to(base_url('admin/edit_pengguna')); 
        }
        public function do_update_users_album_video(){ 
            $data['video'] = $this->request->getPost('video'); 
            $update = $this->AdminModel->update_users_album_video($data);
            if($update){
                echo 'sukses';
            }else{
                echo 'gagal';
            }
        }
        public function do_update_gallery(){ 
            $avatar = $this->request->getFile('file');
            $kunci = $this->request->getPost('kunci');
            $path = 'assets/users/'.$kunci; 
            //folder e
            if(!file_exists($path)){
                $create = mkdir('assets/users/'.$kunci, 0777,true);
            } 
            //nama file e
            for($i=1;$i<=10;$i++){
                $pathName = 'assets/users/'.$kunci.'/album'.$i.'.png';
                if(!file_exists($pathName)){
                    $ok = array("no"=>$i,"kunci"=>$kunci);
                    $avatar->move('assets/users/'.$kunci, 'album'.$i.'.png');
                    echo json_encode($ok); 
                    //save to db
                    $datausers_Album = [
                        'id_user' => $_SESSION['id_usernya'],
                        'album' => 'album'.$i 
                    ];
                    $saveusers_Album = $this->AdminModel->save_users_album($datausers_Album);
                    break;
                } 
            } 
        }
        public function do_del_gallery(){
            $id = $this->request->getPost('id');
            $kunci = $this->request->getPost('kunci');
            $file = 'assets/users/'.$kunci.'/album'.$id.'.png';
            $data['users_album'] = 'album'.$id;
            $data['id_user'] = $_SESSION['id_usernya'];
            $delete = $this->AdminModel->delete_users_album($data);
            unlink($file);
            echo json_encode("sukses");
        }
        public function do_update_users_acara(){ 
            $datanyaSiapa = $this->request->getPost('datanyaSiapa'); //cara cepat pake variabel :)
            $data["tanggal_".$datanyaSiapa] = $this->request->getPost('tanggal');
            $data['jam_'.$datanyaSiapa] = $this->request->getPost('waktu');
            $data['tempat_'.$datanyaSiapa] = $this->request->getPost('lokasi');
            $data['alamat_'.$datanyaSiapa] = $this->request->getPost('alamat');
            $data['gmap_'.$datanyaSiapa] = $this->request->getPost('gmap'); 
            $update = $this->AdminModel->update_users_acara($data);
            if($update){
                echo 'sukses';
            }else{
                echo 'gagal';
            } 
        }
        public function do_update_foto_users_mempelai(){ 
            $groom = $this->request->getFile('foto_groom');
            $bride = $this->request->getFile('foto_bride');
            $sampul = $this->request->getFile('foto_sampul');
            $kunci = $this->request->getPost('kunci');
            $path = 'assets/users/'.$kunci; 
            //cek folder e
            if(!file_exists($path)){
                $create = mkdir('assets/users/'.$kunci, 0777,true);
            } 
            if($groom != ''){ //cek dulu ini fotonya siapa
                $avatar = $groom;
                $pathName = 'assets/users/'.$kunci.'/groom.png';
                if(file_exists($pathName)){
                    unlink($pathName); //hapus dulu foto yg lama
                } 
                    $avatar->move('assets/users/'.$kunci, 'groom.png'); //upload yg baru
                    echo 'uploadedgroom'; //give feedback ke jquery.. agar tampilan fotonya di ubah dgn yg baru
            }else if($bride != ''){
                $avatar = $bride;
                $pathName = 'assets/users/'.$kunci.'/bride.png';
                if(file_exists($pathName)){
                    unlink($pathName);
                } 
                $avatar->move('assets/users/'.$kunci, 'bride.png');
                $this->session->set('foto_bride', 1);
                echo 'uploadedbride';
                
            }else{
                $avatar = $sampul;
                $pathName = 'assets/users/'.$kunci.'/kita.png';
                if(file_exists($pathName)){
                    unlink($pathName);
                } 
                $avatar->move('assets/users/'.$kunci, 'kita.png');
                $this->session->set('foto_sampul', 1);
                echo 'uploadedsampul';
            } 	 
        }
        public function do_update_users_mempelai(){ 
            $datanyaSiapa = $this->request->getPost('datanyaSiapa'); //cara cepat pake variabel :)
            $data["nama_".$datanyaSiapa] = $this->request->getPost('nama');
            $data['nama_panggilan_'.$datanyaSiapa] = $this->request->getPost('nama_panggilan');
            $data['nama_ayah_'.$datanyaSiapa] = $this->request->getPost('nama_ayah');
            $data['nama_ibu_'.$datanyaSiapa] = $this->request->getPost('nama_ibu'); 
            $update = $this->AdminModel->update_users_mempelai($data);
            if($update){
                echo 'sukses';
            }else{
                echo 'gagal';
            }
        }
        public function do_update_musik(){
        	$pilihan_musik = $this->request->getPost('pilihan_musik'); 
        	//Simpan filename musik baru di database
        	$dataMusik['musik'] = $pilihan_musik;
        	$saveMusik = $this->AdminModel->update_musik($dataMusik);
        	if ($saveMusik){
        		return "sukses";
        	}else{
        		return "gagal";
        	} 
        }
        public function do_update_fitur(){
        	$data['komen'] = $this->request->getPost('ucapan');
        	$data['gallery'] = $this->request->getPost('users_album');
        	$data['cerita'] = $this->request->getPost('users_cerita');
        	$data['lokasi'] = $this->request->getPost('lokasi');
            $update = $this->AdminModel->update_fitur($data);
            if($update){
                echo 'sukses';
            }else{
                echo 'gagal';
            }
        }
        public function do_update_domain(){
            $domain = $this->request->getPost('domain'); 
            if($domain != ''){
                $cek = $this->AdminModel->cek_domain($domain); //cek dulu domain yg direkuest jika sdh ada maka feedback error
                if(count($cek) > 0){
                    echo 'gagal';
                    exit;
                }else{
                    $update = $this->AdminModel->update_domain($domain);
                    if($update){
                        echo 'sukses';
                    }else{
                        echo 'gagal';
                    }
                }   
            }
        }
        public function RemoveEmptySubFolders($path){
            $empty=true;
            foreach (glob($path.DIRECTORY_SEPARATOR."*") as $file)
            {
                if (is_dir($file))
                {
                    if (!RemoveEmptySubFolders($file)) $empty=false;
                }
                else
                {
                    $empty=false;
                }
            }
            if ($empty) rmdir($path);
            return $empty;
        }
        public static function delTree($dir) {
            $files = array_diff(scandir($dir), array('.','..'));
             foreach ($files as $file) {
               (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
             }
             return rmdir($dir);
        }
        public function list_pengguna_hapus_user($id_users = ""){
            // Jika $id_users kosong maka yang request delete dari menu LIST_PENGGUNA
            if($id_users == ""){
                $id = $this->request->getPost('id');
            } else {
                // Jika $id_users berisi maka yang request dari menu DATABASE > RESTORE
                $id = $id_users;
            }
            
            //ALbum PENGGUNA
            $undangan_pengaturan = $this->AdminModel->get_undangan_pengaturan_by_id_user($id);
            //Cek jika didatabase ada data nya
            if (!empty($undangan_pengaturan)){
                $kunci = $undangan_pengaturan[0]->kunci;
                $patchAlbum = 'assets/users/'.$kunci ; 
                // 1. Cek Folder ada atau tidak
                if ( !is_dir( $patchAlbum ) ) {
                    //die('Folder '.$patchAlbum.' TIDAK ADA');
                    echo "";
                }else{
                    // 2. Cek Folder dapat permisi atau tidak
                    if (!is_writable($patchAlbum)){
                        die('Folder '.$patchAlbum.' tidak ada PERMISI');
                    }else{
                        // 3. Cek Folder kosong atau tidak
                        if (!empty(scandir($patchAlbum))){
                            //die('Folder '.$patchAlbum.' KOSONG'); 
                            $hapus = $this->RemoveEmptySubFolders($patchAlbum);
                            // 4. // Hapus Folder Kosong
                            if (!$hapus) { 
                                // 5. CEK File hidden di folder Kosong dan Hapus Folder
                                $hapus2 = $this->delTree($patchAlbum); 
                                if (!$hapus2) {
                                    $error = error_get_last();
                                    die ('Folder Kosong 2 gagal di hapus : '.$error); 
                                }else{
                                    //die ('Folder Kosong 2 berhasil di hapus');
                                }
                            }else{
                                //die ('Folder Kosong berhasil di hapus');
                            } 
                        }else{
                            // 4. Hapus folder
                            if (!@rmdir($patchAlbum)) {
                                $error = error_get_last();
                                die ('Folder gagal di hapus : '.$error);
                            }else{
                                //die ('Folder berhasil di hapus');
                            }
                        }
                    } 
                }  
            }
             
            //BUKTI PEMBAYARAN PENGGUNA
            $users_order_pembayaran = $this->AdminModel->get_users_order_pembayaran_by_id_user($id);
            //Cek jika didatabase ada data ORDER PEMBAYARAN nya
            if (!empty($users_order_pembayaran)){
                $invoice = $users_order_pembayaran[0]->invoice;
                $fileBuktiInvoice = 'assets/bukti/'.$invoice.'.png'; 
                // 1. Cek File ada atau tidak
                if (!file_exists($fileBuktiInvoice)){
                    //die ('File bukti PEMBAYARAN PENGGUNA tidak ada : '.$fileBuktiInvoice);
                    echo "";
                }else{
                    // 2. Cek Permisi File ada atau tidak
                    if (!is_writable($fileBuktiInvoice)){
                        //die('File tidak ada PERMISI : '.$fileBuktiInvoice);
                        // 3. Coba beri Permisi
                        if (!chmod($fileBuktiInvoice, 0666)) {
                            die('File tidak bisa di beri PERMISI : '.$fileBuktiInvoice);
                        }else{
                            // 4. Hapus File
                            if (!@unlink($fileBuktiInvoice)) {
                                $error = error_get_last();
                                die ('File gagal di hapus : '.fileBuktiInvoice.' ERROR :'.$error);
                            }else{
                                //die ('File berhasil di hapus');
                            }
                        }
                    }else{ 
                        // 3. Hapus File
                        if (!@unlink($fileBuktiInvoice)) {
                            $error = error_get_last();
                            die ('File gagal di hapus : '.fileBuktiInvoice.' ERROR :'.$error);
                        }else{
                            //die ('File berhasil di hapus');
                        }
                    }
                }
            }
              
            //BUKTI UPGRADE PAKET
            $users_upgrade_paket = $this->AdminModel->get_users_upgrade_paket_by_id_user($id); 
            //Cek jika didatabase ada catatan UPGARADE PAKET atau tidak
            if (!empty($users_upgrade_paket)){
                $invoice = $users_upgrade_paket[0]->upgrade_paket_bukti;
                $fileBuktiInvoice = 'assets/bukti/'.$invoice.''; 
                // 1. Cek File ada atau tidak
                if (!file_exists($fileBuktiInvoice)){
                    //die ('File bukti UPGRADE PAKET tidak ada : '.$fileBuktiInvoice);
                    echo "";
                }else{
                    // 2. Cek Permisi File ada atau tidak
                    if (!is_writable($fileBuktiInvoice)){
                        //die('File tidak ada PERMISI : '.$fileBuktiInvoice);
                        // 3. Coba beri Permisi
                        if (!chmod($fileBuktiInvoice, 0666)) {
                            die('File tidak bisa di beri PERMISI : '.$fileBuktiInvoice);
                        }else{
                            // 4. Hapus File
                            if (!@unlink($fileBuktiInvoice)) {
                                $error = error_get_last();
                                die ('File gagal di hapus : '.fileBuktiInvoice.' ERROR :'.$error);
                            }else{
                                //die ('File berhasil di hapus');
                            }
                        }
                    }else{ 
                        // 3. Hapus File
                        if (!@unlink($fileBuktiInvoice)) {
                            $error = error_get_last();
                            die ('File gagal di hapus : '.fileBuktiInvoice.' ERROR :'.$error);
                        }else{
                            //die ('File berhasil di hapus');
                        }
                    }
                } 
            }
            
             
            
            $delete = $this->AdminModel->list_pengguna_hapus_user($id); 
            if($delete){
                echo 'sukses';
            }else{
                echo 'gagal';
            }  
        }

        /* ============ PEMBAYARAN PENGGUNA ============ */
        public function pembayaran_pengguna(){
            $data['title'] = 'Pembayaran Pengguna';
            $data['view'] = 'admin/data_pengguna/pembayaran_pengguna';
            //mengambil data tetap website_umum
            $data['website_umum'] = $this->AdminModel->get_all_website_umum();
            $data['join'] = $this->AdminModel->get_all_join();
            //ATURAN CSS MENU 
            //$pilihanmenuS3  = $this->uri->getSegment(3);
            //$data['pilihanmenuS3'] = urldecode($pilihanmenuS3); 
            $pilihanmenuS4  = $this->uri->getSegment(4);
            $data['pilihanmenuS4'] = urldecode($pilihanmenuS4); 
            //$pilihanmenuS5  = $this->uri->getSegment(5);
            //$data['pilihanmenuS5'] = urldecode($pilihanmenuS5); 
            return view('admin/layout', $data);
        }
        public function pembayaran_pengguna_konfirmasi(){
            $id = $this->request->getPost('id');
            $update = $this->AdminModel->pembayaran_pengguna_konfirmasi_by_id($id);
            if($update){
                echo 'sukses';
            }else{
                echo 'gagal';
            }
        }
        public function pembayaran_pengguna_konfirmasi_batal(){
            $id = $this->request->getPost('id');
            $update = $this->AdminModel->pembayaran_pengguna_konfirmasi_batal_by_id($id);
            if($update){
                echo 'sukses';
            }else{
                echo 'gagal';
            }
        }

        /* ============ PERMINTAAN UPGRADE PAKET ============ */
        public function permintaan_upgrade_paket(){
            $data['data_users_upgrade_paket'] = $this->AdminModel->get_all_users_upgrade_paket();
            //DATA WEBSITE UMUM
            $data['website_umum'] = $this->AdminModel->get_all_website_umum();    
            //ATURAN CSS MENU 
            $pilihanmenuS3  = $this->uri->getSegment(3);
            $data['pilihanmenuS3'] = urldecode($pilihanmenuS3); 
            $pilihanmenuS4  = $this->uri->getSegment(4);
            $data['pilihanmenuS4'] = urldecode($pilihanmenuS4); 
            //$pilihanmenuS5  = $this->uri->getSegment(5);
            //$data['pilihanmenuS5'] = urldecode($pilihanmenuS5); 
            $data['title'] = 'Data Permintaan Upgrade Paket';
            $data['view'] = 'admin/data_pengguna/permintaan_upgrade_paket.php';
            return view('admin/layout', $data);
        }
        public function permintaan_upgrade_paket_konfirmasi(){
            $paket_id_id_users = $this->request->getPost('paket_id_id_users');
            $update = $this->AdminModel->update_permintaan_upgrade_paket_konfirmasi($paket_id_id_users);
            if($update){
                echo 'sukses';
            }else{
                echo 'gagal';
            }
        }
        public function permintaan_upgrade_paket_batal_konfirmasi(){
            $paket_id_id_users = $this->request->getPost('paket_id_batal_id_users');
            $update = $this->AdminModel->update_permintaan_upgrade_paket_batal_konfirmasi($paket_id_id_users);
            if($update){
                echo 'sukses';
            }else{
                echo 'gagal';
            }
        }
    
    /*---------------------------
        PENGATURAN UDO
    ----------------------------*/ 
        /* ============ PAKET UDO ============ */
        public function pengaturan_udo_undangan_paket(){
            $data['admin'] = $this->AdminModel->get_admin_by_id();
            $data['title'] = 'Pengaturan UDO : Paket Undangan';
            $data['view'] = 'admin/pengaturan_udo/paket_undangan';
            //mengambil data tetap website_umum
            $data['website_umum'] = $this->AdminModel->get_all_website_umum();
            //mengambil data paket undangan
            $data['undangan_paket'] = $this->AdminModel->get_all_undangan_paket();
            //ATURAN CSS MENU 
            $pilihanmenuS3  = $this->uri->getSegment(3);
            $data['pilihanmenuS3'] = urldecode($pilihanmenuS3); 
            $pilihanmenuS4  = $this->uri->getSegment(4);
            $data['pilihanmenuS4'] = urldecode($pilihanmenuS4); 
            $pilihanmenuS5  = $this->uri->getSegment(5);
            $data['pilihanmenuS5'] = urldecode($pilihanmenuS5); 
            return view('admin/layout', $data);
        }
        public function do_update_pengaturan_udo_undangan_paket(){
            $paket_id = $this->request->getPost('paket_id');
            $data['paket_nama'] = $this->request->getPost('paket_nama');
            $data['paket_keterangan'] = $this->request->getPost('paket_keterangan');
            $data['paket_harga_normal'] = $this->request->getPost('paket_harga_normal');
            $data['paket_harga_diskon'] = $this->request->getPost('paket_harga_diskon');
            $data['paket_limit_waktu'] = $this->request->getPost('paket_limit_waktu');
            $data['paket_biaya_upgrade'] = $this->request->getPost('paket_biaya_upgrade');
            $data['paket_status'] = $this->request->getPost('paket_status');
            $update = $this->AdminModel->update_pengaturan_udo_undangan_paket($data, $paket_id);
            if($update){
                echo 'sukses';
            }else{
                echo 'gagal';
            } 
        } 

    /*---------------------------
        PENGATURAN WEBSITE
    ----------------------------*/  
        /* ============ UMUM ============ */
        public function pengaturan_website_umum(){
            $id_users = $_SESSION['id_admin']; 
            $data['title'] = 'Pengaturan Website : Umum';
            $data['view'] = 'admin/pengaturan_website/umum.php';
            //mengambil data tetap website_umum
            $data['website_umum'] = $this->AdminModel->get_all_website_umum();
            //ATURAN CSS MENU 
            $pilihanmenuS3  = $this->uri->getSegment(3);
            $data['pilihanmenuS3'] = urldecode($pilihanmenuS3); 
            $pilihanmenuS4  = $this->uri->getSegment(4);
            $data['pilihanmenuS4'] = urldecode($pilihanmenuS4); 
            $pilihanmenuS5  = $this->uri->getSegment(5);
            $data['pilihanmenuS5'] = urldecode($pilihanmenuS5); 
            return view('admin/layout', $data);
        }
        public function do_update_pengaturan_website_umum_informasi_umum(){
            $data['JudulWebsite'] = $this->request->getPost('JudulWebsite');
            $data['TaglineWebsite'] = $this->request->getPost('TaglineWebsite');
            $data['DeskripsiWebsite'] = $this->request->getPost('DeskripsiWebsite');
            $data['KataKunci'] = $this->request->getPost('KataKunci');
            $data['NamaPemilikWebsite'] = $this->request->getPost('NamaPemilikWebsite');
            $data['CreditsTahunMulai'] = $this->request->getPost('CreditsTahunMulai');
            $data['CreditsKeterangan'] = $this->request->getPost('CreditsKeterangan');
            $update = $this->AdminModel->update_pengaturan_website_umum_informasi_umum($data);
            if($update){ 
                echo 'sukses';
            }else{
                echo 'gagal';
            }
        }
        public function do_update_pengaturan_website_umum_tema_website(){ 
            $data['TemaWebsite'] = $this->request->getPost('TemaWebsite'); 
            $data['TemaWebsiteTomboldiHome'] = $this->request->getPost('TemaWebsiteTomboldiHome');
            $update = $this->AdminModel->update_pengaturan_website_umum_tema_website($data);
            if($update){ 
                echo 'sukses';
            }else{
                echo 'gagal';
            }
        }
        public function do_update_pengaturan_website_umum_google_recaptcha(){ 
            $data['RecaptchaStatus'] = $this->request->getPost('RecaptchaStatus');
            $data['Recaptchadatasitekey'] = $this->request->getPost('Recaptchadatasitekey');
            $data['Recaptchasecretkey'] = $this->request->getPost('Recaptchasecretkey');
            $update = $this->AdminModel->update_pengaturan_website_umum_google_recaptcha($data);
            if($update){ 
                echo 'sukses';
            }else{
                echo 'gagal';
            }
        }
        public function Pengaturan_website_umum_upload_FBShareGambar(){ 
            $FBShareGambarbaru = $this->request->getFile('file');;
            $path = 'assets/base/img';
            //Cek Jika Folder Tidak ada maka dibuat
            if(!file_exists($path)){
                $create = mkdir('assets/base/img', 0777,true);
            }
            //Hapus FBShareGambar Lama
            $FBShareGambarlama = 'assets/base/img/thumbnails.png';
            unlink($FBShareGambarlama);
            //Upload FBShareGambar Baru
            $uploadfilenya = $FBShareGambarbaru->move('assets/base/img','thumbnails.png');

            if ($uploadfilenya){
                echo base_url($FBShareGambarlama);
            }else{
                echo "";
            } 
        }
        public function do_update_pengaturan_website_umum_media_sosial_share(){
            $data['IdFansPageFacebook'] = $this->request->getPost('IdFansPageFacebook');
            $data['FacebookDomainVerifikasi'] = $this->request->getPost('FacebookDomainVerifikasi');
            $data['FBShareJudul'] = $this->request->getPost('FBShareJudul');
            $data['FBShareDeskripsi'] = $this->request->getPost('FBShareDeskripsi'); 
            $update = $this->AdminModel->update_pengaturan_website_umum_media_sosial_share($data);
            if($update){ 
                echo 'sukses';
            }else{
                echo 'gagal';
            }
        }
        public function Pengaturan_website_umum_upload_favicon(){ 
            $faviconbaru = $this->request->getFile('file'); 
            $path = 'assets/base/img';
            //Cek Jika Folder Tidak ada maka dibuat
            if(!file_exists($path)){
                $create = mkdir('assets/base/img', 0777,true);
            } 
            //Hapus Favicon Lama
            $faviconlama = 'assets/base/img/favicon.ico';
            unlink($faviconlama);
            //Upload Favicon Baru
            $uploadfilenya = $faviconbaru->move('assets/base/img','favicon.ico'); 
            if ($uploadfilenya){
                echo base_url($faviconlama);
            }else{
                echo "";
            } 
        }
        public function Pengaturan_website_umum_upload_logo(){ 
            $logobaru = $this->request->getFile('file'); 
            $path = 'assets/base/img';
            //Cek Jika Folder Tidak ada maka dibuat
            if(!file_exists($path)){
                $create = mkdir('assets/base/img', 0777,true);
            } 
            //Hapus Logo Lama
            $logolama = 'assets/base/img/logo.png';
            unlink($logolama);
            //Upload Logo Baru
            $uploadfilenya = $logobaru->move('assets/base/img','logo.png');
            
            if ($uploadfilenya){
                echo base_url($logolama);
            }else{
                echo "";
            } 
        }
        public function Pengaturan_website_umum_upload_brand_utama(){ 
            $brand_utamabaru = $this->request->getFile('file');;
            $path = 'assets/base/img';
            //Cek Jika Folder Tidak ada maka dibuat
            if(!file_exists($path)){
                $create = mkdir('assets/base/img', 0777,true);
            }
            //Hapus brand_utama Lama
            $brand_utamalama = 'assets/base/img/logo-home.png';
            unlink($brand_utamalama);
            //Upload brand_utama Baru
            $uploadfilenya = $brand_utamabaru->move('assets/base/img','logo-home.png');

            if ($uploadfilenya){
                echo base_url($brand_utamalama);
            }else{
                echo "";
            } 
        }
        public function Pengaturan_website_umum_upload_brand_login(){ 
            $brand_loginbaru = $this->request->getFile('file');;
            $path = 'assets/base/img';
            //Cek Jika Folder Tidak ada maka dibuat
            if(!file_exists($path)){
                $create = mkdir('assets/base/img', 0777,true);
            }
            //Hapus brand_login Lama
            $brand_loginlama = 'assets/base/img/logo-login.png';
            unlink($brand_loginlama);
            //Upload brand_login Baru
            $uploadfilenya = $brand_loginbaru->move('assets/base/img','logo-login.png');

            if ($uploadfilenya){
                echo base_url($brand_loginlama);
            }else{
                echo "";
            } 
        }

        /* ============ WIDGET ============ */
        public function pengaturan_website_widget_home(){
            $id_users = $_SESSION['id_admin'];  

            // Ambil data widget
            $data['widget_data_cover'] = $this->AdminModel->get_all_website_widget_posisi("home_cover");
            $data['widget_data_cover_links'] = $this->AdminModel->get_all_website_widget_links( $data['widget_data_cover'][0]->widget_id);
            $data['widget_data_fitur'] = $this->AdminModel->get_all_website_widget_posisi("home_fitur");
            $data['widget_data_fitur_links'] = $this->AdminModel->get_all_website_widget_links( $data['widget_data_fitur'][0]->widget_id);
            $data['widget_data_paket_udo'] = $this->AdminModel->get_all_website_widget_posisi("home_paket_udo");
            $data['widget_data_paket_udo_links'] = $this->AdminModel->get_all_website_widget_links( $data['widget_data_paket_udo'][0]->widget_id);
            $data['widget_data_tema'] = $this->AdminModel->get_all_website_widget_posisi("home_tema");
            $data['widget_data_tema_links'] = $this->AdminModel->get_all_website_widget_links( $data['widget_data_tema'][0]->widget_id);
            $data['widget_data_testimoni'] = $this->AdminModel->get_all_website_widget_posisi("home_testimoni");
            $data['widget_data_footer_kiri'] = $this->AdminModel->get_all_website_widget_posisi("home_footer_kiri");
            $data['widget_data_footer_tengah'] = $this->AdminModel->get_all_website_widget_posisi("home_footer_tengah");
            $data['widget_data_footer_tengah_links'] = $this->AdminModel->get_all_website_widget_links( $data['widget_data_footer_tengah'][0]->widget_id);
            $data['widget_data_footer_kanan'] = $this->AdminModel->get_all_website_widget_posisi("home_footer_kanan");
            $data['widget_data_footer_kanan_links'] = $this->AdminModel->get_all_website_widget_links( $data['widget_data_footer_kanan'][0]->widget_id);


            $data['title'] = 'Widget Home';
            $data['view'] = 'admin/pengaturan_website/widget_home.php';
            //mengambil data tetap website_umum
            $data['website_umum'] = $this->AdminModel->get_all_website_umum();
            //ATURAN CSS MENU 
            $pilihanmenuS3  = $this->uri->getSegment(3);
            $data['pilihanmenuS3'] = urldecode($pilihanmenuS3); 
            $pilihanmenuS4  = $this->uri->getSegment(4);
            $data['pilihanmenuS4'] = urldecode($pilihanmenuS4); 
            $pilihanmenuS5  = $this->uri->getSegment(5);
            $data['pilihanmenuS5'] = urldecode($pilihanmenuS5); 
            return view('admin/layout', $data);
        }
        public function Pengaturan_website_widget_home_upload_foto_model(){ 
            $faviconbaru = $this->request->getFile('file'); 
            $path = 'assets/base/img';
            //Cek Jika Folder Tidak ada maka dibuat
            if(!file_exists($path)){
                $create = mkdir('assets/base/img', 0777,true);
            } 
            //Hapus Favicon Lama
            $faviconlama = 'assets/base/img/home-foto-model.png';
            unlink($faviconlama);
            //Upload Favicon Baru
            $uploadfilenya = $faviconbaru->move('assets/base/img','home-foto-model.png'); 
            if ($uploadfilenya){
                echo base_url($faviconlama);
            }else{
                echo "";
            } 
        }
        public function do_update_pengaturan_website_widget(){
            $widget_id = $this->request->getPost('widget_id');
            $data['widget_judul'] = $this->request->getPost('widget_judul');
            $data['widget_isi'] = $this->request->getPost('widget_isi'); 
            $update = $this->AdminModel->update_pengaturan_website_widget($data, $widget_id);
            if($update){
                echo 'sukses';
            }else{
                echo 'gagal';
            } 
        } 
        public function do_update_pengaturan_website_widget_links(){
            $widget_id = $this->request->getPost('widget_id');
            $data1['widget_judul'] = $this->request->getPost('widget_judul');
            $data1['widget_isi'] = $this->request->getPost('widget_isi');
            $update = $this->AdminModel->update_pengaturan_website_widget($data1, $widget_id);
            $widget_links_id = $this->request->getPost('widget_links_id');
            $widget_links_icon = $this->request->getPost('widget_links_icon');
            $widget_links_judul = $this->request->getPost('widget_links_judul'); 
            $widget_links_deskripsi = $this->request->getPost('widget_links_deskripsi');
            $widget_links_url = $this->request->getPost('widget_links_url'); 
            $jumlahArray = count ($widget_links_id);
            for ($a = 0 ; $a < $jumlahArray ; $a++){
                $link_id = $widget_links_id[$a];
                $data2['widget_links_icon'] = $widget_links_icon[$a];
                $data2['widget_links_judul'] = $widget_links_judul[$a]; 
                $data2['widget_links_deskripsi'] = $widget_links_deskripsi[$a];
                $data2['widget_links_url'] = $widget_links_url[$a]; 
                $update = $this->AdminModel->update_pengaturan_website_widget_links($data2, $link_id);
                $hasil2 = $update;
            }
            if($hasil2){
                echo 'sukses';
            }else{
                echo 'gagal';
            }
        }
        
        /* ============ BANK ADMIN ============ */
        public function pengaturan_website_bank_admin(){
            $id_users = $_SESSION['id_admin'];
            $data['undangan_bank'] = $this->AdminModel->get_undangan_bank_by_id($id_users); 
            $data['title'] = 'Pengaturan Website : Bank Admin';
            $data['view'] = 'admin/pengaturan_website/bank_admin.php';
            //mengambil data tetap website_umum
            $data['website_umum'] = $this->AdminModel->get_all_website_umum();
            //ATURAN CSS MENU 
            $pilihanmenuS3  = $this->uri->getSegment(3);
            $data['pilihanmenuS3'] = urldecode($pilihanmenuS3); 
            $pilihanmenuS4  = $this->uri->getSegment(4);
            $data['pilihanmenuS4'] = urldecode($pilihanmenuS4); 
            $pilihanmenuS5  = $this->uri->getSegment(5);
            $data['pilihanmenuS5'] = urldecode($pilihanmenuS5); 
            return view('admin/layout', $data);
        }
        public function do_update_pengaturan_website_bank_admin(){
            $data['bank_id'] = $this->request->getPost('bank_id');
            $data['bank_nama'] = $this->request->getPost('bank_nama');
            $data['bank_nomor_rekening'] = $this->request->getPost('bank_nomor_rekening');
            $data['bank_nama_pemilik'] = $this->request->getPost('bank_nama_pemilik');

            $update = $this->AdminModel->update_undangan_bank($data);
            if($update){
                echo 'sukses';
            }else{
                echo 'gagal';
            } 

        } 

        /* ============ DATABASE ============ */
        public function pengaturan_website_database(){
            $id_users = $_SESSION['id_admin'];  
            $data['title'] = 'Pengaturan Website : Database';
            $data['view'] = 'admin/pengaturan_website/database.php';
            //mengambil data tetap website_umum
            $data['website_umum'] = $this->AdminModel->get_all_website_umum();
            //ATURAN CSS MENU 
            $pilihanmenuS3  = $this->uri->getSegment(3);
            $data['pilihanmenuS3'] = urldecode($pilihanmenuS3); 
            $pilihanmenuS4  = $this->uri->getSegment(4);
            $data['pilihanmenuS4'] = urldecode($pilihanmenuS4); 
            $pilihanmenuS5  = $this->uri->getSegment(5);
            $data['pilihanmenuS5'] = urldecode($pilihanmenuS5); 
            return view('admin/layout', $data);
        }
        public function pengaturan_website_database_restore(){
            $admin_id = $this->request->getPost('admin_id'); 
            $aksi = $this->AdminModel->go_pengaturan_website_database_restore($admin_id);
             
            //Pindahkan Gambar sistem Default ke public
            $GbrDefault = "assets/base/img/default/home-foto-model.png";
            $GbrPublic =  "assets/base/img/home-foto-model.png";
            copy($GbrDefault, $GbrPublic); 
            $GbrDefault = "assets/base/img/default/favicon.ico";
            $GbrPublic =  "assets/base/img/favicon.ico";
            copy($GbrDefault, $GbrPublic); 
            $GbrDefault = "assets/base/img/default/logo.png";
            $GbrPublic =  "assets/base/img/logo.png";
            copy($GbrDefault, $GbrPublic);
            $GbrDefault = "assets/base/img/default/logo-home.png";
            $GbrPublic = "assets/base/img/logo-home.png";
            copy($GbrDefault, $GbrPublic);
            $GbrDefault = "assets/base/img/default/logo-login.png"; 
            $GbrPublic =  "assets/base/img/logo-login.png";
            copy($GbrDefault, $GbrPublic);
            $GbrDefault = "assets/base/img/default/thumbnails.png";
            $GbrPublic =  "assets/base/img/thumbnails.png";
            copy($GbrDefault, $GbrPublic);
            //Hapus data pengguna
            $id_usersKecuali="1";
            $id_usersKecualiDemo = $this->AdminModel->get_id_usersKecuali($id_usersKecuali);
            foreach ($id_usersKecualiDemo as $row_id_usersKecualiDemo){
                $hasilHapusUsers = $this->list_pengguna_hapus_user($row_id_usersKecualiDemo->id); 
            }   
            if($hasilHapusUsers <> ""){
                echo 'sukses';
            }else{
                echo 'gagal';
            }  
        } 

    /*---------------------------
        AKUN
    ----------------------------*/ 
    public function profil(){ 
        $data['admin'] = $this->AdminModel->get_admin_by_id();
        $data['title'] = 'Profil Admin';
        $data['view'] = 'admin/profil';
        //mengambil data tetap website_umum
		$data['website_umum'] = $this->AdminModel->get_all_website_umum();
		return view('admin/layout', $data);
    }
    public function do_update_admin(){

        if($this->request->getPost('password') != ''){
            $data['password'] = md5($this->request->getPost('password'));
        }

        $data['username'] = $this->request->getPost('username');
        $data['nama_lengkap'] = $this->request->getPost('nama');
        $data['email'] = $this->request->getPost('email');
        $data['no_hp'] = $this->request->getPost('no_hp');

        $update = $this->AdminModel->update_admin($data);
        if($update){
            $this->session->set('uname_admin', $data['username']);
            echo 'sukses';
        }else{
            echo 'gagal';
        }
       
    }
 

}