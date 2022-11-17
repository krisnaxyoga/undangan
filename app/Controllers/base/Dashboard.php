<?php namespace App\Controllers\base;
 
use CodeIgniter\Controller;
use App\Models\base\DashboardModel;

class Dashboard extends Controller
{
    public function __construct() {
        //mengisi variable global dengan data
        $this->session = session(); 
        $this->DashboardModel = new DashboardModel(); 
		$this->request = \Config\Services::request(); //memanggil class request
        $this->uri = $this->request->uri; //class request digunakan untuk request uri/url
        
    }
    
    //::: SISTEM 
    public function sistem_versi(){
        return $this->DashboardModel->get_sistem_versi();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['view'] = 'base/dashboard/index';
        //mengambil data tetap website_umum
		$data['website_umum'] = $this->DashboardModel->get_all_website_umum();
        $data['users_order_pembayaran'] = $this->DashboardModel->get_users_order_pembayaran_by_id_user();
        $data['order'] = $this->DashboardModel->get_order_by_id_user(); 
        $data['users_pengunjung'] = $this->DashboardModel->get_all_users_pengunjung(); 
        $data['total_users_pengunjung'] = $this->DashboardModel->get_total_users_pengunjung();
        $data['total_mingguan'] = $this->DashboardModel->get_total_users_pengunjung_mingguan();
        $data['no_hp_admin'] = $this->DashboardModel->get_no_hp_admin();

        //::: DOA DAN UCAPAN :::
        $data['doa_dan_ucapan'] = $this->DashboardModel->get_all_users_doa_dan_ucapan();
        $data['total_doa_dan_ucapan'] = $this->DashboardModel->get_all_total_users_doa_dan_ucapan();
        //ATURAN CSS MENU 
        $pilihanmenu  = $this->uri->getSegment(3);
        $data['pilihanmenu'] = urldecode($pilihanmenu); 
        $data['sistem_versi'] = $this->sistem_versi();
        return view('base/dashboard/layout', $data);
    }

    public function do_auth(){

        $data['email'] = $this->request->getPost('email');
        $data['password'] = md5($this->request->getPost('password'));
        $hasil = $this->DashboardModel->get_user($data);
        
        if(count($hasil) > 0)
        {
            // SISTEM
            $sistem_versi = $this->sistem_versi();
            // set session
            $sess_data = array(
                'masukUser' => TRUE, 
                'uname' => $hasil[0]->username, 
                'id' => $hasil[0]->id, 
                'sistem_versi' => $sistem_versi, 
                'domain' => $hasil[0]->domain
            );
            
            $this->session->set($sess_data);
            
            return redirect()->to(base_url('user/dashboard'));
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

    public function login()
    {
        if(session()->has('masukUser'))
        {
        	return redirect()->to(base_url('user/dashboard'));
        }
        //mengambil data tetap website_umum
		$data['website_umum'] = $this->DashboardModel->get_all_website_umum();
        $data['title'] = 'Selamat Datang!';
        $data['view'] = 'base/dashboard/auth/login';
        return view('base/dashboard/auth/layout', $data);
    }

    public function kirim_undangan()
    {
        $data['title'] = 'Kirim Undangan';
        $data['view'] = 'base/dashboard/kirim_undangan';
        //mengambil data tetap website_umum
		$data['website_umum'] = $this->DashboardModel->get_all_website_umum();
        $data['konten'] = $this->DashboardModel->get_konten_undangan($_SESSION['id']); 
        
        //ATURAN CSS MENU
        $pilihanmenu  = $this->uri->getSegment(3);
        $data['pilihanmenu'] = urldecode($pilihanmenu); 
        return view('base/dashboard/layout', $data); 
    }

    public function riwayat()
    {
        $data['title'] = 'Riwayat Pengunjung';
        $data['view'] = 'base/dashboard/riwayat';
        //mengambil data tetap website_umum
		$data['website_umum'] = $this->DashboardModel->get_all_website_umum();
        $data['total_users_pengunjung'] = $this->DashboardModel->get_total_users_pengunjung();
        $data['total_users_pengunjung_today'] = $this->DashboardModel->get_total_users_pengunjung_today();
        $data['total_mingguan'] = $this->DashboardModel->get_total_users_pengunjung_mingguan();
        $data['users_pengunjung'] = $this->DashboardModel->get_all_users_pengunjung();
        $pilihanmenu  = $this->uri->getSegment(3); 
        $data['pilihanmenu'] = urldecode($pilihanmenu);
        return view('base/dashboard/layout', $data);
    }

    //::: DOA DAN UCAPAN  
    public function users_doa_dan_ucapan()
    {
        $data['title'] = "Data Do'a dan Ucapan";
        $data['view'] = 'base/dashboard/doa_dan_ucapan';
        //mengambil data tetap website_umum
		$data['website_umum'] = $this->DashboardModel->get_all_website_umum();
        $data['total_users_doa_dan_ucapan'] = $this->DashboardModel->get_total_users_doa_dan_ucapan();
        $data['total_users_doa_dan_ucapan_today'] = $this->DashboardModel->get_total_users_doa_dan_ucapan_today();
        $data['users_doa_dan_ucapan'] = $this->DashboardModel->get_all_users_doa_dan_ucapan();
        $pilihanmenu  = $this->uri->getSegment(3);
        $data['pilihanmenu'] = urldecode($pilihanmenu);
        return view('base/dashboard/layout', $data);
    } 
    public function do_hapus_users_doa_dan_ucapan(){ 
        $doa_dan_ucapan_id = $this->request->getPost('doa_dan_ucapan_id');
        $hapus = $this->DashboardModel->hapus_users_doa_dan_ucapan_by_id($doa_dan_ucapan_id);  
        if($hapus){
            echo 'sukses';
        }else{
            echo 'gagal';
        }
    }

    //::: TEMA 
    public function tampilan() 
	{   
        $data['undangan_tema_by_id'] = $this->DashboardModel->get_undangan_tema_by_id($_SESSION['id']); 

        //PAKET_ID Users
        $paket_id = $this->DashboardModel->get_order_by_id_user()[0]->paket_id; 
        $data['undangan_tema_by_selain_paket_id'] = $this->DashboardModel->get_undangan_tema_by_selain_paket_id($paket_id);

        $data['order'] = $this->DashboardModel->get_order_by_id_user(); 
        $data['title'] = 'Tema Undangan';
        $data['view'] = 'base/dashboard/tampilan';
        //mengambil data tetap website_umum
		$data['website_umum'] = $this->DashboardModel->get_all_website_umum();
        $pilihanmenu  = $this->uri->getSegment(3);
        $data['pilihanmenu'] = urldecode($pilihanmenu);
        $data['CI'] = $this;
		//load view home
		return view('base/dashboard/layout', $data);
    }
    public function do_ganti_tema()
	{
        $data['theme'] = $this->request->getPost('id');
        $ganti = $this->DashboardModel->update_tema($data);
        if($ganti){
            echo 'sukses';
        }else{
            echo 'gagal';
        }
    }
    public function ambil_nama_paket_by_id($paket_id){
		return $this->DashboardModel->get_paket_nama_by_id($paket_id);
	}
    public function ambil_undangan_paket_by_id($paket_id){
		return $this->DashboardModel->get_undangan_paket_by_id($paket_id);

	}

 
    







    /*---------------------------
        PENGATURAN
    ----------------------------*/    
    public function pengaturan(){
        $data['order'] = $this->DashboardModel->get_order_by_id_user();
        $data['fitur'] = $this->DashboardModel->get_fitur_by_id_user();
        $data['undangan_pengaturan'] = $this->DashboardModel->get_sepatah_kata_pilihan_by_id_user(); 
        
        $data['users_order_musik'] = $this->DashboardModel->get_users_order_musik();
        $data['undangan_musik'] = $this->DashboardModel->get_all_undangan_musik();  

        $data['title'] = 'Pengaturan Undangan';
        $data['view'] = 'base/dashboard/pengaturan';
        //mengambil data tetap website_umum
		$data['website_umum'] = $this->DashboardModel->get_all_website_umum();
        $pilihanmenu  = $this->uri->getSegment(3);
        $data['pilihanmenu'] = urldecode($pilihanmenu);
		return view('base/dashboard/layout', $data);
    } 

    /* ============ PENGATURAN UNDANGAN ============ */
    public function do_update_domain(){
        $data['domain'] = $this->request->getPost('domain');
        $data['domain_jml_diubah'] = $this->request->getPost('domain_jml_diubah');

        if($data['domain'] != ''){
            $cek = $this->DashboardModel->cek_domain($data['domain']); //cek dulu domain yg direkuest jika sdh ada maka feedback error
            if(count($cek) > 0){
                echo 'gagaldomainsama';
                exit;
            }else{
                $update = $this->DashboardModel->update_domain($data);
                if($update){
                    echo 'sukses';
                }else{
                    echo 'gagalsimpandomain'; 
                }
            }   
        }
    }

    /* ============ SEPATAH KATA ============ */
    public function do_update_sepatah_kata(){
        $data['sepatah_kata_pilihan'] = $this->request->getPost('sepatah_kata_pilihan'); 
        $update = $this->DashboardModel->update_sepatah_kata($data);
        if($update){
            echo 'sukses';
        }else{
            echo 'gagal';
        }
    }

    /* ============ FITUR UNDANGAN ============ */
    public function do_update_fitur(){
        $data['komen'] = $this->request->getPost('ucapan');
    	$data['gallery'] = $this->request->getPost('users_album');
    	$data['cerita'] = $this->request->getPost('users_cerita');
        $data['lokasi'] = $this->request->getPost('lokasi');
        $update = $this->DashboardModel->update_fitur($data);
        if($update){
            echo 'sukses';
        }else{
            echo 'gagal';
        }
    }

    /* ============ MUSIK ============ */
    public function do_update_musik(){
    	$pilihan_musik = $this->request->getPost('pilihan_musik'); 
    	//Simpan filename musik baru di database
        $dataMusik['musik'] = $pilihan_musik;
        $saveMusik = $this->DashboardModel->update_musik($dataMusik);
    	if ($saveMusik){
        return "sukses";
        }else{
        return "gagal";
        }  
    }






































    

    

    

    

    //::: MEMPELAI
    public function mempelai()
	{
        $data['users_mempelai'] = $this->DashboardModel->get_users_mempelai_by_id_user();
        $data['undangan_pengaturan'] = $this->DashboardModel->get_undangan_pengaturan_by_id_user();
        $data['order'] = $this->DashboardModel->get_order_by_id_user();
        $data['title'] = 'Data Mempelai';
        $data['view'] = 'base/dashboard/mempelai';
        //mengambil data tetap website_umum
		$data['website_umum'] = $this->DashboardModel->get_all_website_umum();
        $pilihanmenu  = $this->uri->getSegment(3);
        $data['pilihanmenu'] = urldecode($pilihanmenu);
		return view('base/dashboard/layout', $data);
    }
    //upload foto users_mempelai
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

        $update = $this->DashboardModel->update_users_mempelai($data);
        if($update){
            echo 'sukses';
        }else{
            echo 'gagal';
        }
     }

     public function acara(){

        $data['users_acara'] = $this->DashboardModel->get_users_acara_by_id_user();
        $data['undangan_pengaturan'] = $this->DashboardModel->get_undangan_pengaturan_by_id_user();
        $data['order'] = $this->DashboardModel->get_order_by_id_user();
        $data['title'] = 'Data Acara';
        $data['view'] = 'base/dashboard/acara';
        //mengambil data tetap website_umum
		$data['website_umum'] = $this->DashboardModel->get_all_website_umum();
        $pilihanmenu  = $this->uri->getSegment(3);
        $data['pilihanmenu'] = urldecode($pilihanmenu);
		return view('base/dashboard/layout', $data);
     }

    public function do_update_users_acara(){
         
        $datanyaSiapa = $this->request->getPost('datanyaSiapa'); //cara cepat pake variabel :)
        $data["tanggal_".$datanyaSiapa] = $this->request->getPost('tanggal');
        $data['jam_'.$datanyaSiapa] = $this->request->getPost('waktu');
        $data['tempat_'.$datanyaSiapa] = $this->request->getPost('lokasi');
        $data['alamat_'.$datanyaSiapa] = $this->request->getPost('alamat');
        $data['gmap_'.$datanyaSiapa] = $this->request->getPost('gmap');

        $update = $this->DashboardModel->update_users_acara($data);
        if($update){
            echo 'sukses';
        }else{
            echo 'gagal';
        }
    }

    //::: ALBUM
    public function gallery(){

        $data['users_album'] = $this->DashboardModel->get_users_album_by_id_user();
        $data['users_album_video'] = $this->DashboardModel->get_users_album_video_by_id_user();
        $data['undangan_pengaturan'] = $this->DashboardModel->get_undangan_pengaturan_by_id_user();
        $data['users_order'] = $this->DashboardModel->get_order_by_id_user(); 
        $data['title'] = 'Data Album';
        $data['view'] = 'base/dashboard/gallery';
        //mengambil data tetap website_umum
		$data['website_umum'] = $this->DashboardModel->get_all_website_umum();
        $pilihanmenu  = $this->uri->getSegment(3);
        $data['pilihanmenu'] = urldecode($pilihanmenu);
		return view('base/dashboard/layout', $data);
    }
    public function do_update_users_album_video(){
         
        $data['video'] = $this->request->getPost('video');

        $update = $this->DashboardModel->update_users_album_video($data);
        if($update){
            echo 'sukses';
        }else{
            echo 'gagal';
        }
    }
    // upload foto gallery
	public function do_update_gallery(){
 
        $avatar = $this->request->getFile('file'); //a
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
                    'id_user' => $_SESSION['id'],
                    'album' => 'album'.$i
  
                ];
                $saveusers_Album = $this->DashboardModel->save_users_album($datausers_Album);
        		break;
        	} 
        }

       
    }
    public function do_del_gallery(){
        $id = $this->request->getPost('id');
        $kunci = $this->request->getPost('kunci');
        $album = $this->request->getPost('album');
        $file = 'assets/users/'.$kunci.'/'.$album.'.png';
        unlink($file);
        $delete = $this->DashboardModel->delete_users_album($id);
        echo json_encode("sukses");
    }

    //::: CERITA 
    public function cerita(){
        $data['users_cerita'] = $this->DashboardModel->get_users_cerita_by_id_user();
        $data['order'] = $this->DashboardModel->get_order_by_id_user();
        $data['title'] = 'Data Cerita';
        $data['view'] = 'base/dashboard/cerita';
        //mengambil data tetap website_umum
		$data['website_umum'] = $this->DashboardModel->get_all_website_umum();
        $pilihanmenu  = $this->uri->getSegment(3);
        $data['pilihanmenu'] = urldecode($pilihanmenu);
		return view('base/dashboard/layout', $data);
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
            $hpscerita = $this->DashboardModel->hapus_users_cerita();

            //SETELAH ITU KITA SIMPAN KE DB
            for($i=0;$i<$noTanggal;$i++){
				$tanggal_cerita = $this->session->get('tanggal_cerita'.$i);
				$judul_cerita = $this->session->get('judul_cerita'.$i);
				$isi_cerita = $this->session->get('isi_cerita'.$i);

				$datausers_Cerita = [
					'id_user' => $_SESSION['id'],
					'tanggal_cerita' => $tanggal_cerita,
					'judul_cerita' => $judul_cerita,
					'isi_cerita' => $isi_cerita
				];

                $saveusers_Cerita = $this->DashboardModel->save_users_cerita($datausers_Cerita);
            }

            return redirect()->to(base_url('user/cerita'));

    }

    

    //::: USERS
    public function profil(){

        $data['user'] = $this->DashboardModel->get_user_by_id_user();
        $data['order'] = $this->DashboardModel->get_order_by_id_user();
        $data['kunci'] = $this->DashboardModel->get_undangan_pengaturan_by_id_user()[0]->kunci;
        $data['title'] = 'Profil';
        $data['view'] = 'base/dashboard/profil';
        //mengambil data tetap website_umum
		$data['website_umum'] = $this->DashboardModel->get_all_website_umum();
        //ATURAN CSS MENU
        $pilihanmenu  = $this->uri->getSegment(3);
        $data['pilihanmenu'] = urldecode($pilihanmenu); 
		return view('base/dashboard/layout', $data);
    }
    public function do_update_user(){

        if($this->request->getPost('password') != ''){
            $data['password'] = md5($this->request->getPost('password'));
        }

        $data['username'] = $this->request->getPost('username');
        $data['email'] = $this->request->getPost('email');
        $data['hp'] = $this->request->getPost('hp');

        $update = $this->DashboardModel->update_user($data);
        if($update){
            $this->session->set('uname', $data['username']);
            echo 'sukses';
        }else{
            echo 'gagal';
        }
       
    }
    public function invoice(){ 

        $data['users_order_pembayaran'] = $this->DashboardModel->get_users_order_pembayaran_by_id_user();
        $data['user'] = $this->DashboardModel->get_user_by_id_user();
        $data['order'] = $this->DashboardModel->get_order_by_id_user();
        $data['undangan_bank'] = $this->DashboardModel->get_undangan_bank_admin();
        //Data Paket UDO
        $paket_users = $this->DashboardModel->get_order_by_id_user();
        $data['paket_id_lama'] = $paket_users[0]->paket_id;
        $data['undangan_paket_all'] = $this->DashboardModel->get_all_undangan_paket_kecuali_paket_id($paket_users[0]->paket_id);
        //CEK UPGRADE BELUM KOMFIR
        $cekDataUpgradePaketUserBelumKonfir =  $this->DashboardModel->get_users_upgrade_paket_by_id_belum_konfir($_SESSION['id']);
        $hasilcek = $cekDataUpgradePaketUserBelumKonfir[0]->upgrade_paket_status_konfirmasi;
        if ($hasilcek == "BELUM"){
            $data['masih_ada_pengajuan_upgrade_paket'] = "MASIH";
        }else{
            $data['masih_ada_pengajuan_upgrade_paket'] = "TIDAK ADA";
        }

        // AMBIL data No Whatsaap Admin
		$data['no_hp_admin'] = $this->DashboardModel->get_no_hp_admin();
        
        $data['title'] = 'Pembayaran';
        //ATURAN CSS MENU
        $pilihanmenu  = $this->uri->getSegment(3);
        $data['pilihanmenu'] = urldecode($pilihanmenu); 

        $data['view'] = 'base/dashboard/invoice';
        //mengambil data tetap website_umum
		$data['website_umum'] = $this->DashboardModel->get_all_website_umum();
		return view('base/dashboard/layout', $data);
    }
    public function do_konfirmasi(){
        $bukti = $this->request->getFile('bukti');
        $invoice = $this->request->getPost('invoice');
        $datausers_order_pembayaran['nama_lengkap'] = $this->request->getPost('nama_lengkap');
        $datausers_order_pembayaran['nama_bank'] = $this->request->getPost('nama_bank');
        $datausers_order_pembayaran['status'] = '1'; //status menunggu konfirmasi atau user sudah upload bukti
        $datausers_order_pembayaran['bukti'] = $invoice.'.png';

        if (!$bukti->isValid())
        {
            return redirect()->to(base_url('user/invoice')); //jika bukti lebih dari 2 mb tolak
        }

         //folder e
         if(!file_exists('assets/bukti')){
        	$create = mkdir('assets/bukti', 0777,true);
        }

        $pathName = 'assets/bukti/'.$invoice.'.png';
        if(file_exists($pathName)){
            unlink($pathName);
        } 

        $bukti->move('assets/bukti/',$invoice.'.png'); //uploadd

        //setelah di upload insert data ke db
        $update = $this->DashboardModel->update_users_order_pembayaran($datausers_order_pembayaran,$invoice);
        if($update){
            return redirect()->to(base_url('user/invoice'));
        }else{
            return redirect()->to(base_url('user/invoice'));
        }

    }
    public function do_upgrade_paket(){
        $upgrade_paket_bukti = $this->request->getFile('upgrade_paket_bukti');
        //Buat Invoice
        // Invoice terdiri dari : upgrade, 2 digit tahun, 2 digit bulan, id paket lama, id paket baru,id users
        $invoice = "upgrade_".$this->request->getPost('upgrade_paket_paket_sebelumnya')."_".$this->request->getPost('upgrade_paket_paket_diajukan')."_".$_SESSION['id'];
        //Ambil Biaya Upgrade Saat itu
        $upgrade_paket_biaya_saat_itu = $this->DashboardModel->get_undangan_paket_by_id($this->request->getPost('upgrade_paket_paket_diajukan'))[0]->paket_biaya_upgrade;
        
        $data['upgrade_paket_id_user']=$_SESSION['id'];
        $data['upgrade_paket_paket_sebelumnya']=$this->request->getPost('upgrade_paket_paket_sebelumnya');
        $data['upgrade_paket_paket_diajukan']=$this->request->getPost('upgrade_paket_paket_diajukan');
        $data['upgrade_paket_invoice']=$invoice;
        $data['upgrade_paket_biaya_saat_itu']=$upgrade_paket_biaya_saat_itu;
        $data['upgrade_paket_nama_lengkap']=$this->request->getPost('upgrade_paket_nama_lengkap');
        $data['upgrade_paket_nama_bank']=$this->request->getPost('upgrade_paket_nama_bank');
        $data['upgrade_paket_bukti']=$invoice.'.png';
        $data['upgrade_paket_status_konfirmasi']="BELUM"; 
        //CEK BUKTI
        if (!$upgrade_paket_bukti->isValid())
        {
            return redirect()->to(base_url('user/invoice')); //jika bukti lebih dari 2 mb tolak
        }
        if(!file_exists('assets/bukti')){
        	$create = mkdir('assets/bukti', 0777,true);
        }
        $pathName = 'assets/bukti/'.$invoice.'.png';
        if(file_exists($pathName)){
            unlink($pathName);
        } 
        $upgrade_paket_bukti->move('assets/bukti/',$invoice.'.png'); //uploadd

        //setelah di upload insert data ke db
        $insert = $this->DashboardModel->insert_users_upgrade_paket($data);
        if($insert){
            return redirect()->to(base_url('user/invoice'));
        }else{
            return redirect()->to(base_url('user/invoice'));
        }

    }

    //::: TESTIMONI :::
    public function testimoni()
    {
        $data['title'] = 'Testimoni';
        $data['view'] = 'base/dashboard/testimoni';
        //mengambil data tetap website_umum
		$data['website_umum'] = $this->DashboardModel->get_all_website_umum();
        $data['users_testimoni'] = $this->DashboardModel->get_users_testimoni(); 
        
        //ATURAN CSS MENU
        $pilihanmenu  = $this->uri->getSegment(3);
        $data['pilihanmenu'] = urldecode($pilihanmenu); 
        return view('base/dashboard/layout', $data); 
    }
    public function do_simpan_users_testimoni(){ 
        //CEK Apakah ada kode script tidak pantas
        $data_testimoni_isi = $this->request->getPost('testimoni_isi');
        $hasil1_testimoni_isi = strip_tags($data_testimoni_isi);
        //CEK Apakah ada kata tidak pantas
        $katatidakpantas = array('asu','up', 'kontol', 'pantek', 'babi', 'anjing', 'jelek', 'peniru', 'penipu', 'sesat'); 
        $data_testimoni_isi = $this->request->getPost('testimoni_isi');
        $hasil2_testimoni_isi = preg_replace("/(\b|[0-9_])(".implode('|',$katatidakpantas).")(\b|[0-9_])/i", '***', $hasil1_testimoni_isi);
        $testimoni_rating = $this->request->getPost('testimoni_rating');
        $data['testimoni_status'] = "";
        $data['testimoni_keterangan'] = ""; 
        
        $cari = strpos($hasil2_testimoni_isi,"*");
        if (!empty($cari)){
            $data['testimoni_isi'] = $hasil2_testimoni_isi;
            $data['testimoni_status'] = "Tidak Aktif";
            $data['testimoni_keterangan'] .= "Ada Kata Tidak Pantas,";
        }else{
            $data['testimoni_isi'] = $hasil2_testimoni_isi;
            $data['testimoni_status'] = "Aktif";
        }
        //CEK jika penilaian kurang dari 3 bintang 
        if ($testimoni_rating <= 3){
            $data['testimoni_rating'] = $testimoni_rating; 
            $data['testimoni_status'] = "Tidak Aktif";
            $data['testimoni_keterangan'] .= "Rating Jelek,";
        }else{
            $data['testimoni_rating'] = $testimoni_rating;
            //CEK Jika sebelumnya tidak aktif maka tetap tidak aktif
            if ($data['testimoni_status'] == "Tidak Aktif"){
                $data['testimoni_status'] = "Tidak Aktif";
            }else{
                $data['testimoni_status'] = "Aktif";
            }
           
        }
        //Cek apakah sudah ada sebelumnya
        $dataSebelumnya = $this->DashboardModel->get_users_testimoni();
        //Lanjutkan proses
        if(count($dataSebelumnya) > 0){ 
            $update = $this->DashboardModel->update_users_testimoni($data);
            if($update){ 
                echo 'sukses';
            }else{
                echo 'gagal';
            }
        }else{  
            $data['id_user'] = $_SESSION['id'];  
            $insert = $this->DashboardModel->insert_users_testimoni($data);
            if($insert){ 
                echo 'sukses';
            }else{
                echo 'gagal';
            }
        } 
    }

    //::: MEMPELAI :::
    public function do_delete_foto_pria(){
        $hapusfotoprianya = $this->request->getPost('hapusfotoprianya');
        if ($hapusfotoprianya=="iya"){
            $kunci = $this->DashboardModel->get_undangan_pengaturan_by_id_user()[0]->kunci;
            $patch_foto_pria = 'assets/users/'.$kunci.'/groom.png'; 
            // 1. Cek File ada atau tidak
            if (!file_exists($patch_foto_pria)){
                die ('File Foto tidak ada : '.$patch_foto_pria);
            }else{
                // 2. Cek Permisi File ada atau tidak
                if (!is_writable($patch_foto_pria)){
                    die('File tidak ada PERMISI : '.$patch_foto_pria);
                    // 3. Coba beri Permisi
                    if (!chmod($patch_foto_pria, 0666)) {
                        die('File tidak bisa di beri PERMISI : '.$patch_foto_pria);
                    }else{
                        // 4. Hapus File
                        if (!@unlink($patch_foto_pria)) {
                            $error = error_get_last();
                            die ('File gagal di hapus : '.$patch_foto_pria.' ERROR :'.$error);
                        }else{
                            //die ('File berhasil di hapus');
                            $fotosiapa ="foto_pria";
                            $isifotonya ="0";
                            $updateDBFotoPria = $this->DashboardModel->update_foto_mempelai($fotosiapa,$isifotonya);
                            if ($updateDBFotoPria){
                                echo "sukses";
                            }else{
                                echo "gagal";
                            }
                        }
                    }
                }else{ 
                    // 3. Hapus File
                    if (!@unlink($patch_foto_pria)) {
                        $error = error_get_last();
                        die ('File gagal di hapus : '.$patch_foto_pria.' ERROR :'.$error);
                    }else{
                        //die ('File berhasil di hapus');
                        $fotosiapa ="foto_pria";
                        $isifotonya ="0";
                        $updateDBFotoPria = $this->DashboardModel->update_foto_mempelai($fotosiapa,$isifotonya);
                        if ($updateDBFotoPria){
                            echo "sukses";
                        }else{
                            echo "gagal";
                        }
                    }
                }
            } 
        }else{
            //Tidak ada post dari view
            die ('Tidak ada post dari view');
        }
         
    }
    public function do_delete_foto_wanita(){
        $hapusfotowanitanya = $this->request->getPost('hapusfotowanitanya');
        if ($hapusfotowanitanya=="iya"){
            $kunci = $this->DashboardModel->get_undangan_pengaturan_by_id_user()[0]->kunci;
            $patch_foto_wanita = 'assets/users/'.$kunci.'/bride.png'; 
            // 1. Cek File ada atau tidak
            if (!file_exists($patch_foto_wanita)){
                die ('File Foto tidak ada : '.$patch_foto_wanita);
            }else{
                // 2. Cek Permisi File ada atau tidak
                if (!is_writable($patch_foto_wanita)){
                    die('File tidak ada PERMISI : '.$patch_foto_wanita);
                    // 3. Coba beri Permisi
                    if (!chmod($patch_foto_wanita, 0666)) {
                        die('File tidak bisa di beri PERMISI : '.$patch_foto_wanita);
                    }else{
                        // 4. Hapus File
                        if (!@unlink($patch_foto_wanita)) {
                            $error = error_get_last();
                            die ('File gagal di hapus : '.$patch_foto_wanita.' ERROR :'.$error);
                        }else{
                            //die ('File berhasil di hapus');
                            $fotosiapa ="foto_wanita";
                            $isifotonya ="0";
                            $updateDBFotoWanita = $this->DashboardModel->update_foto_mempelai($fotosiapa,$isifotonya);
                            if ($updateDBFotoWanita){
                                echo "sukses";
                            }else{
                                echo "gagal";
                            } 
                        }
                    }
                }else{ 
                    // 3. Hapus File
                    if (!@unlink($patch_foto_wanita)) {
                        $error = error_get_last();
                        die ('File gagal di hapus : '.$patch_foto_wanita.' ERROR :'.$error);
                    }else{
                        //die ('File berhasil di hapus');
                        $fotosiapa ="foto_wanita";
                        $isifotonya ="0";
                        $updateDBFotoWanita = $this->DashboardModel->update_foto_mempelai($fotosiapa,$isifotonya);
                        if ($updateDBFotoWanita){
                            echo "sukses";
                        }else{
                            echo "gagal";
                        }
                    }
                }
            } 
        }else{
            //Tidak ada post dari view
            die ('Tidak ada post dari view');
        }
         
    }
    public function do_delete_foto_sampul(){
        $hapusfotosampulnya = $this->request->getPost('hapusfotosampulnya');
        if ($hapusfotosampulnya=="iya"){
            $kunci = $this->DashboardModel->get_undangan_pengaturan_by_id_user()[0]->kunci;
            $patch_foto_sampul = 'assets/users/'.$kunci.'/kita.png'; 
            // 1. Cek File ada atau tidak
            if (!file_exists($patch_foto_sampul)){
                die ('File Foto tidak ada : '.$patch_foto_sampul);
            }else{
                // 2. Cek Permisi File ada atau tidak
                if (!is_writable($patch_foto_sampul)){
                    die('File tidak ada PERMISI : '.$patch_foto_sampul);
                    // 3. Coba beri Permisi
                    if (!chmod($patch_foto_sampul, 0666)) {
                        die('File tidak bisa di beri PERMISI : '.$patch_foto_sampul);
                    }else{
                        // 4. Hapus File
                        if (!@unlink($patch_foto_sampul)) {
                            $error = error_get_last();
                            die ('File gagal di hapus : '.$patch_foto_sampul.' ERROR :'.$error);
                        }else{
                            //die ('File berhasil di hapus');
                            echo "sukses";
                        }
                    }
                }else{ 
                    // 3. Hapus File
                    if (!@unlink($patch_foto_sampul)) {
                        $error = error_get_last();
                        die ('File gagal di hapus : '.$patch_foto_sampul.' ERROR :'.$error);
                    }else{
                        //die ('File berhasil di hapus');
                        echo "sukses";
                    }
                }
            } 
        }else{
            //Tidak ada post dari view
            die ('Tidak ada post dari view');
        }
         
    }








    //::: FITUR WEBSITE ::: 
        //::: Bingkisan :::
        public function fitur_website_bingkisan()
        {
            $data['title'] = 'Bingkisan dari Tamu Undangan';
            $data['view'] = 'base/dashboard/fitur_website/bingkisan.php';
            //mengambil data tetap website_umum
            $data['website_umum'] = $this->DashboardModel->get_all_website_umum();  
            $id=$_SESSION['id']; 
            $siapa="PENGGUNA";
            $data['daftar_bank_pengguna'] = $this->DashboardModel->get_all_undangan_bank_by_siapa($id, $siapa);
             
            //ATURAN CSS MENU
            $pilihanmenuS5  = $this->uri->getSegment(5);
            $data['pilihanmenuS5'] = urldecode($pilihanmenuS5); 
            return view('base/dashboard/layout', $data); 
        }
        public function fitur_website_bingkisan_ubah_data_bank()
        {
            $data['title'] = 'Bingkisan dari Tamu Undangan';
            $data['view'] = 'base/dashboard/fitur_website/bingkisan.php';
            //mengambil data tetap website_umum
            $data['website_umum'] = $this->DashboardModel->get_all_website_umum();  
            $id=$_SESSION['id']; 
            $siapa="PENGGUNA";
            $data['daftar_bank_pengguna'] = $this->DashboardModel->get_all_undangan_bank_by_siapa($id, $siapa); 
            $bank_id = $this->request->getPost('tabel_bank_id');
            $data['data_bank_pengguna'] = $this->DashboardModel->get_undangan_bank_by_id($bank_id);
            //ATURAN CSS MENU
            $pilihanmenuS5  = $this->uri->getSegment(5);
            $data['pilihanmenuS5'] = urldecode($pilihanmenuS5); 
            return view('base/dashboard/layout', $data); 
        }
        public function fitur_website_bingkisan_tambah_data_bank()
        {
            
            $data['bank_id_pemilik'] = $_SESSION['id'];
            $data['bank_siapa'] = "PENGGUNA";
            $data['bank_nama'] = $this->request->getPost('bank_nama');
            $data['bank_kode'] = $this->request->getPost('bank_kode'); 
            $data['bank_nama_pemilik'] = $this->request->getPost('bank_nama_pemilik'); 
            $data['bank_nomor_rekening'] = $this->request->getPost('bank_nomor_rekening'); 
            $insert = $this->DashboardModel->insert_undangan_bank($data);
            if($insert){ 
              echo 'sukses'; 
            }else{ 
                echo 'gagal';
           }
        }
        public function fitur_website_bingkisan_ubah_data_bank_simpan()
        {
            $bank_id = $this->request->getPost('bank_id');
            $data['bank_id_pemilik'] = $_SESSION['id'];
            $data['bank_siapa'] = "PENGGUNA";
            $data['bank_nama'] = $this->request->getPost('bank_nama');
            $data['bank_kode'] = $this->request->getPost('bank_kode'); 
            $data['bank_nama_pemilik'] = $this->request->getPost('bank_nama_pemilik'); 
            $data['bank_nomor_rekening'] = $this->request->getPost('bank_nomor_rekening'); 
            $update = $this->DashboardModel->update_undangan_bank_by_id($data, $bank_id);
            if($update){ 
              echo 'sukses'; 
            }else{ 
                echo 'gagal';
           }
        }
        public function fitur_website_bingkisan_hapus_data_bank(){ 
            $bank_id = $this->request->getPost('bank_id');
            $hapus = $this->DashboardModel->hapus_undangan_bank_by_id($bank_id);  
            if($hapus){
                echo 'sukses';
            }else{
                echo 'gagal';
            }
        }
}