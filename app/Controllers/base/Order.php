<?php namespace App\Controllers\base;

use CodeIgniter\Controller;
use App\Models\base\OrderModel;

class Order extends Controller
{
	
	protected $order,$uri,$request,$db;

	public function __construct() {
		// parent::__construct();

		//load service bawaan ci
		$this->request = \Config\Services::request(); 
		$this->session = \Config\Services::session();  //untuk membaca session 
		$this->db  = \Config\Database::connect(); //untuk melakukan CRUD ke databse

		$this->OrderModel = new OrderModel(); 
 
		$this->uri = $this->request->uri;
    }

	public function index()
	{
		//mengambil data widget
		$data['widget_data_footer_kanan'] = $this->OrderModel->get_all_website_widget_posisi("footer_kanan");
        $data['widget_data_footer_kanan_link'] = $this->OrderModel->get_all_website_widget_links( $data['widget_data_footer_kanan'][0]->widget_id);

		//ambil data UNDANGAN PAKET
		$data['undangan_paket'] = $this->OrderModel->get_undangan_paket_aktif();

		$kode = $this->uri->getSegment(3); //untuk membaca tema yang dipilih user atau membaca session order

		if ($kode ==''){
			return redirect()->to(base_url('/tema'));
			exit();
		}
		if($this->session->get('theme') == '' && $kode == '1'){
			return redirect()->to(base_url('/tema'));
			exit();
		}

		if($kode != '1' && $this->session->get('theme') == ''){
			$cekTheme = $this->OrderModel->cek_undangan_tema($kode);
			if(!empty($cekTheme->getResult())){
				foreach ($cekTheme->getResult() as $row)
				{
				    $idnya = $row->id;
				}
				$this->session->set('theme', $idnya); 
				$this->session->set('checkpoint', 1);
			}else{
				return redirect()->to(base_url('/tema'));
				exit();
			}
		}
		$cekTheme = $this->OrderModel->cek_undangan_tema($kode);
		$data['kode'] = $kode = $cekTheme->getResult()[0]->paket_id;
		$data['domain'] = $this->session->domain;
		$data['email'] = $this->session->email;
		$data['hp'] = $this->session->hp;
		$data['password'] = $this->session->password;
		$data['view'] = 'base/order/order1-datauser';
		//mengambil data tetap website_umum
		$data['website_umum'] = $this->OrderModel->get_all_website_umum();

		//cek session 
		$check = $this->session->get('checkpoint');
		if($check == 1 || $kode == '1'){
			return view('base/order/order_layout',$data);
		}else{
			return redirect()->route('order/any');
		}

	}

	public function mempelai()
	{
		//mengambil data widget
		$data['widget_data_footer_kanan'] = $this->OrderModel->get_all_website_widget_posisi("footer_kanan");
        $data['widget_data_footer_kanan_link'] = $this->OrderModel->get_all_website_widget_links( $data['widget_data_footer_kanan'][0]->widget_id);

		// cek pengiriman data & simpan form data sebelumnya (awal)
		$submit = $this->request->getPost('submit');
		if($submit != NULL){

			//ambil data dari post sebelumnya
			//dan cek domain
			//jika domain sudah digunakan 
			//maka akan dikembalikan ke halaman sebelumnya (awal)
			$domain = $this->request->getPost('domain');
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');  
			$hp = $this->request->getPost('hp');   
			$undangan_paket_id = $this->request->getPost('undangan_paket_id'); 
			$cekDomain = $this->OrderModel->cek_domain($domain);
			if(!empty($cekDomain->getResult())){
				echo "<script>
					alert('Nama domain sudah dipakai. Gunakan nama domain lain!');
					history.back();
					</script>";
					exit();
			}

			//jika domain tersedia maka
			//simpan datanya kedalam session
			$this->session->set('domain', $domain);
			$this->session->set('email', $email);
			$this->session->set('password', $password);
			$this->session->set('hp', $hp);
			$this->session->set('undangan_paket_id', $undangan_paket_id);
			
			//buatkan data dummynya
			//untuk identitas sementara
			$c = $this->session->get('checkpoint');
			if($c <= 2 && $this->session->get('dummy') == ''){
				$this->session->set('checkpoint', 2);
				$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			    $charactersLength = strlen($characters);
			    $randomString = '';
			    for ($i = 0; $i < 7; $i++) {
			        $randomString .= $characters[rand(0, $charactersLength - 1)];
			    }
			    $generate = "dummy_".$randomString;
			    $this->session->set('dummy', $generate);
			}
			
		}

		//set view data
		$data['view'] = 'base/order/order2-mempelai';
		//mengambil data tetap website_umum
		$data['website_umum'] = $this->OrderModel->get_all_website_umum();

		//cek session 
		$check = $this->session->get('checkpoint');
		if($check >= 2){
			return view('base/order/order_layout',$data);
		}else{
			return redirect()->route('order/any');
		}
		
	} 

	public function acara(){
		//mengambil data widget
		$data['widget_data_footer_kanan'] = $this->OrderModel->get_all_website_widget_posisi("footer_kanan");
        $data['widget_data_footer_kanan_link'] = $this->OrderModel->get_all_website_widget_links( $data['widget_data_footer_kanan'][0]->widget_id);

		// cek pengiriman data & simpan form data sebelumnya
		$submit = $this->request->getPost('submit');
		if(isset($submit)){

			//simpan data sebelumnya ke session
			$this->simpan_data_sessions('mempelai');
			
			//set checkpoint
			$c = $this->session->get('checkpoint');
			if($c <= 3){
				$this->session->set('checkpoint', 3);
			}
		}

		//set data for view
		$data['view'] = 'base/order/order3-acara';
		//mengambil data tetap website_umum
		$data['website_umum'] = $this->OrderModel->get_all_website_umum();

		// cek session domain
		$check = $this->session->get('checkpoint');
		if($check >= 3){
			return view('base/order/order_layout',$data);
		}else{
			return redirect()->route('order/any');
		}

	}

	public function cerita(){
		//mengambil data widget
		$data['widget_data_footer_kanan'] = $this->OrderModel->get_all_website_widget_posisi("footer_kanan");
        $data['widget_data_footer_kanan_link'] = $this->OrderModel->get_all_website_widget_links( $data['widget_data_footer_kanan'][0]->widget_id);

		$submit = $this->request->getPost('submit');
		if(isset($submit)){
			
			//simpan data sebelumnya ke session
			$this->simpan_data_sessions('acara');

			//set checkpoint
			$c = $this->session->get('checkpoint');
			if($c <= 4){
				$this->session->set('checkpoint', 4);
			}
		}

		//set data for view
		$data['view'] = 'base/order/order4-cerita';
		//mengambil data tetap website_umum
		$data['website_umum'] = $this->OrderModel->get_all_website_umum();

		// cek session domain
		$check = $this->session->get('checkpoint');
		if($check >= 4){
			return view('base/order/order_layout',$data);
		}else{
			return redirect()->route('order/any');
		}
	}

	public function gallery(){
		//mengambil data widget
		$data['widget_data_footer_kanan'] = $this->OrderModel->get_all_website_widget_posisi("footer_kanan");
        $data['widget_data_footer_kanan_link'] = $this->OrderModel->get_all_website_widget_links( $data['widget_data_footer_kanan'][0]->widget_id);

		$submit = $this->request->getPost('submit');

		if(isset($submit)){

			//simpan data sebelumnya ke session
			$this->simpan_data_sessions('cerita');

			 
					
			//set checkpoint
			$c = $this->session->get('checkpoint');
			if($c <= 5){
				$this->session->set('checkpoint', 5);
			}

		}

		//set data for view
		$data['view'] = 'base/order/order5-gallery';
		//mengambil data tetap website_umum
		$data['website_umum'] = $this->OrderModel->get_all_website_umum();

		// cek session domain
		$check = $this->session->get('checkpoint');
		if($check >= 5){
			// $this->session->set('save', 1);
			return view('base/order/order_layout',$data);
		}else{
			return redirect()->route('order/any');
		}
	}

	public function simpan_data_sessions($indentifier){

		switch ($indentifier) {

			case 'mempelai':

				$datausers_Mempelai = [
					//pria
					'nama_lengkap_pria'  => $this->request->getPost('nama_lengkap_pria'),
					'nama_panggilan_pria'  => $this->request->getPost('nama_panggilan_pria'),
					'nama_ayah_pria'  => $this->request->getPost('nama_ayah_pria'),
					'nama_ibu_pria'  => $this->request->getPost('nama_ibu_pria'),
					'w_ayah_pria'  => $this->request->getPost('w_ayah_pria'),
					'w_ibu_pria'  => $this->request->getPost('w_ibu_pria'),
	
					//wanita
					'nama_lengkap_wanita'  => $this->request->getPost('nama_lengkap_wanita'),
					'nama_panggilan_wanita'  => $this->request->getPost('nama_panggilan_wanita'),
					'nama_ayah_wanita'  => $this->request->getPost('nama_ayah_wanita'),
					'nama_ibu_wanita'  => $this->request->getPost('nama_ibu_wanita'),
					'w_ayah_wanita'  => $this->request->getPost('w_ayah_wanita'),
					'w_ibu_wanita'  => $this->request->getPost('w_ibu_wanita'),
	
				];

				$this->session->set($datausers_Mempelai);
				break;

			case 'acara':

				$datausers_Acara = [
					//akad
					'tanggal_akad'  => $this->request->getPost('tanggal_akad'),
					'waktu_akad'  => $this->request->getPost('waktu_akad'),
					'lokasi_akad'  => $this->request->getPost('lokasi_akad'),
					'alamat_akad'  => $this->request->getPost('alamat_akad'),
					'gmap_akad'  => $this->request->getPost('gmap_akad'),
	
					//akad
					'tanggal_resepsi'  => $this->request->getPost('tanggal_resepsi'),
					'waktu_resepsi'  => $this->request->getPost('waktu_resepsi'),
					'lokasi_resepsi'  => $this->request->getPost('lokasi_resepsi'),
					'alamat_resepsi'  => $this->request->getPost('alamat_resepsi'),
					'gmap_resepsi'  => $this->request->getPost('gmap_resepsi'),
	
				];
				$this->session->set($datausers_Acara);
				break;

			case 'cerita': 

				$skipCerita = $this->request->getPost('skipCerita');
				$this->session->set('skipCerita', $skipCerita);
				
				$noTanggal = 0;
				$noJudul = 0;
				$noIsi = 0;
	
				$jml_cerita_sebelumnya = $this->session->get('jml_cerita');
	
				for($i=0;$i<=$jml_cerita_sebelumnya;$i++){
					$this->session->remove('tanggal_cerita'.$i);
					$this->session->remove('judul_cerita'.$i);
					$this->session->remove('isi_cerita'.$i);
				}
	
				foreach ($this->request->getPost('tanggal_cerita') as $value) {
					$this->session->set('tanggal_cerita'.$noTanggal++, $value); 
					if($value == "")
						continue;
				}
	
				foreach ($this->request->getPost('judul_cerita') as $value) {
					$this->session->set('judul_cerita'.$noJudul++, $value); 
				}
	
				foreach ($this->request->getPost('isi_cerita') as $value) {
					$this->session->set('isi_cerita'.$noIsi++, $value); 
				}
	
				$this->session->set('jml_cerita', $noTanggal); 
				break;

			default:
				return redirect()->route('order'); 
				break;
		}

	}


	//checkpoint jika session checkpoint tidak sesuai akan 'dilempar' sesuai sessionnya
	//misal, jika masih di tahap order 1 tidak akan bisa langsung loncat ke order 5 dsb
	public function any(){

		$checkpoint = $this->session->get('checkpoint');
		switch ($checkpoint) {
			case 1:
				return redirect()->route('order/1'); 
				break;
			case 2:
				return redirect()->route('order/2'); 
				break;
			case 3:
				return redirect()->route('order/3'); 
				break;
			case 4:
				return redirect()->route('order/4'); 
				break;
			case 5:
				return redirect()->route('order/5'); 
				break;
			default:
				return redirect()->route('order'); 
				break;
		}
		
	}


	// upload foto gallery
	public function fileUpload(){

		$check = $this->session->get('checkpoint');
		if($check != 5){
			return redirect()->route('order/any');
			exit();
		}

        $avatar = $this->request->getFile('file');
        $generate = $this->session->get('dummy'); //data dummy yg tadi dibuat untuk penyimpanan foto sementara
        $path = 'assets/users/'.$generate;
        
        //folder e
        if(!file_exists($path)){
        	$create = mkdir('assets/users/'.$generate, 0777,true);
        }

        //generate dan cek nama file
        for($i=1;$i<=10;$i++){
        	$pathName = 'assets/users/'.$generate.'/album'.$i.'.png';
        	if(!file_exists($pathName)){
        		$ok = array("no"=>$i,"dummy"=>$generate);
        		$avatar->move('assets/users/'.$generate, 'album'.$i.'.png');
        		echo json_encode($ok);
        		break;
        	} 
        }


	 }

	 //upload foto users_mempelai
	 public function imgupload(){

		$check = $this->session->get('checkpoint');
		if($check < 2){
			return redirect()->route('order/any');
			exit();
		}

        $groom = $this->request->getFile('foto_groom');
        $bride = $this->request->getFile('foto_bride');
        $sampul = $this->request->getFile('foto_sampul');
        $generate = $this->session->get('dummy');
        $path = 'assets/users/'.$generate;
        
        //buat folder ny
        if(!file_exists($path)){
        	$create = mkdir('assets/users/'.$generate, 0777,true);
        }

        if($groom != ''){
        	$avatar = $groom;
        	$pathName = 'assets/users/'.$generate.'/groom.png';
        	if(file_exists($pathName)){
        		unlink($pathName);
	    	} 
				$avatar->move('assets/users/'.$generate, 'groom.png');
				$this->session->set('foto_groom', 1);
				echo 'uploadedgroom';
		}else if($bride != ''){
        	$avatar = $bride;
        	$pathName = 'assets/users/'.$generate.'/bride.png';
        	if(file_exists($pathName)){
        		unlink($pathName);
	    	} 
	    	$avatar->move('assets/users/'.$generate, 'bride.png');
    		$this->session->set('foto_bride', 1);
			echo 'uploadedbride';
			
        }else{
        	$avatar = $sampul;
        	$pathName = 'assets/users/'.$generate.'/kita.png';
        	if(file_exists($pathName)){
        		unlink($pathName);
	    	} 
	    	$avatar->move('assets/users/'.$generate, 'kita.png');
    		$this->session->set('foto_sampul', 1);
    		echo 'uploadedsampul';
        } 	


	 }

	//  hapus foto gallery
	 public function del(){

	 	$check = $this->session->get('checkpoint');
		if($check != 5){
			return redirect()->route('order/any');
			exit();
		}

	 	$id = $this->request->getPost('id');
        $generate = $this->session->get('dummy');
        $file = 'assets/users/'.$generate.'/album'.$id.'.png';
        unlink($file);
        echo json_encode("sukses");


	 }

	 public function finish(){
		//mengambil data widget
		$data['widget_data_footer_kanan'] = $this->OrderModel->get_all_website_widget_posisi("footer_kanan");
        $data['widget_data_footer_kanan_link'] = $this->OrderModel->get_all_website_widget_links( $data['widget_data_footer_kanan'][0]->widget_id);

	 	$submit = $this->request->getPost('submit');
	 	if(!isset($submit)){
			die('Tidak ada data post ID submit');
		}else{
			$adaskipGallery="0"; 
			//CEK di folder album jika sudah ada fotonya
			$album_generate = $this->session->get('dummy');   
			for($album_i=1;$album_i<=1;$album_i++){
				$album_pathName = 'assets/users/'.$album_generate.'/album'.$album_i.'.png';
				if(file_exists($album_pathName)){ 
					$adaskipGallery=="1"; 
				}else{
					//die('Tidak ada file :'.$album_pathName);
					$adaskipGallery=="0"; 
				}
			}
			$skipGallery = array('skipGallery' => $adaskipGallery);
			$this->session->set($skipGallery);

		}

	 	//set data for view
		$data['view'] = 'base/order/order6-finish';
		//mengambil data tetap website_umum
		$data['website_umum'] = $this->OrderModel->get_all_website_umum();

		// cek session domain
		$check = $this->session->get('checkpoint');
		if($check == 5){
			$this->session->set('save', 1);
			return view('base/order/order_layout',$data);
		}else{
			return redirect()->route('order/any');
		}
	 }

	 public function success(){
		//mengambil data widget
		$data['widget_data_footer_kanan'] = $this->OrderModel->get_all_website_widget_posisi("footer_kanan");
        $data['widget_data_footer_kanan_link'] = $this->OrderModel->get_all_website_widget_links( $data['widget_data_footer_kanan'][0]->widget_id);

	 	$kode = $this->uri->getSegment(4);
	 	if(!empty($kode)){
	 		$cekOrder = $this->OrderModel->cek_order($kode);
			if(!empty($cekOrder->getResult())){
				foreach ($cekOrder->getResult() as $row)
				{
				    $id = $row->id_user;
				    $kode = $row->invoice;
				    $domain = $row->domain;
				    $username = $row->username;
				    $status = $row->statusPembayaran; 
 
				}
				$data['view'] = 'base/order/order7-success';
				//mengambil data tetap website_umum
				$data['website_umum'] = $this->OrderModel->get_all_website_umum();
				$data['domain'] = $domain;
				$data['kode'] = $kode;
				$data['status'] = $status;

				// AMBIL data No Whatsaap Admin
				$admin_no_hp = $this->OrderModel->get_admin_no_hp(); 
				foreach ($admin_no_hp->getResult() as $row)
				{
					$data['admin_no_hp']  = $row->no_hp;

				}

				// set session login
				$ok = array('masukUser' => TRUE, 'uname' => $username, 'id' => $id, 'domain' => $domain);
				$this->session->set($ok);

				// $this->session->destroy();
				return view('base/order/order_layout',$data);

			}else{
				return redirect()->route('order/any');
			}
	 	}else{
	 		return redirect()->route('order/any');
	 	}
	}


	 public function saveData(){

	 	$check = $this->session->get('checkpoint');
	 	$check2 = $this->session->get('save');
		if($check < 5 && $check2 != 1){
			return redirect()->route('order/any');
			exit();
		}

		$email = $this->session->get('email');
		$domain = $this->session->get('domain');

		//untuk menghindari doubble insert ketika ditekan tombol back setealh success
		$cekUser = $this->OrderModel->cek_email($email);
		if(!empty($cekUser->getResult())){
			$cekOrder = $this->OrderModel->cek_order_domain($domain);
			if(!empty($cekOrder->getResult())){
				foreach ($cekOrder->getResult() as $row){
					$kodenya = $row->kunci;
				} 
				return redirect()->to(base_url('/order/success/'.$kodenya));
			}else{
				echo "Terjadi Kesalahan, Duplikat insert data <br/>"; //user berhasil daftar tapi data tidak masuk semua (interupt)
				echo "Akun Kakak berhasil didaftarkan tapi data tidak masuk semua (interupt)";
				$this->session->destroy();
				exit();
				return redirect()->to(base_url('/login'));
			}
		}

		//::: USERS :::
	 	$hp = $this->session->get('hp');
	 	$username = $email;
	 	$password = $this->session->password;

	 	$dataUser = [
	 		'email' => $email,
	 		'hp' => $hp,
	 		'username' => $username,
	 		'password' => md5($password),
	 		'id_unik' => '',
	 	];
		
		//insert dulu data user nya nanti diambil idnya 
	 	$saveUser = $this->OrderModel->save_user($dataUser);
	 	if(!$saveUser){
	 		echo "<script>
					alert('Terjadi Kesalahan! Silahkan coba beberapa saat lagi!');
					document.location.href='order/any';
					</script>";
					exit();
	 	}
		
	 	//global
	 	$id_user = $this->db->insertID(); //ambil id user
		$today = date('ym');
	 	$kode = $today.$id_user.rand(10,99); //dijadikan invoice sekaligus kode unik user. Formatnya ( 2 digit tahun, 2 digit bulan, id user, random 2 angka)
	 	$this->OrderModel->update_kode($kode,$id_user);

	 	//::: USERS_MEMPELAI	
	 	$nama_lengkap_pria = $this->session->get('nama_lengkap_pria');
	 	$nama_panggilan_pria = $this->session->get('nama_panggilan_pria');
	 	$nama_ibu_pria = $this->session->get('nama_ibu_pria');
	 	$nama_ayah_pria = $this->session->get('nama_ayah_pria');
	 	$nama_lengkap_wanita = $this->session->get('nama_lengkap_wanita');
	 	$nama_panggilan_wanita = $this->session->get('nama_panggilan_wanita');
	 	$nama_ibu_wanita = $this->session->get('nama_ibu_wanita');
	 	$nama_ayah_wanita = $this->session->get('nama_ayah_wanita');
	 	$datausers_Mempelai = [
	 		'id_user' => $id_user,
	 		'nama_pria' => $nama_lengkap_pria,
	 		'nama_panggilan_pria' => $nama_panggilan_pria,
	 		'nama_ibu_pria' => $nama_ibu_pria,
	 		'nama_ayah_pria' => $nama_ayah_pria,
	 		'nama_wanita' => $nama_lengkap_wanita,
	 		'nama_panggilan_wanita' => $nama_panggilan_wanita,
	 		'nama_ibu_wanita' => $nama_ibu_wanita,
	 		'nama_ayah_wanita' => $nama_ayah_wanita,
	 	];

	 	//::: USERS_ORDER
	 	$theme = $this->session->get('theme');
		$paket_id = $this->session->get('undangan_paket_id');
	 	$dataOrder = [
	 		'id_user' => $id_user,
	 		'domain' => $domain,
	 		'theme' => $theme,
	 		'status' => '0', 
			'paket_id' => $paket_id

	 	];

	 	//::: USERS_ACARA
	 	$tanggal_akad = $this->session->get('tanggal_akad');
	 	$waktu_akad = $this->session->get('waktu_akad');
	 	$lokasi_akad = $this->session->get('lokasi_akad');
	 	$alamat_akad = $this->session->get('alamat_akad');
		$gmap_akad = $this->session->get('gmap_akad');
	 	$tanggal_resepsi = $this->session->get('tanggal_resepsi');
	 	$waktu_resepsi = $this->session->get('waktu_resepsi');
	 	$lokasi_resepsi = $this->session->get('lokasi_resepsi');
		$alamat_resepsi = $this->session->get('alamat_resepsi');
		$gmap_resepsi = $this->session->get('gmap_resepsi');
	 	$datausers_Acara = [
	 		'id_user' => $id_user,
	 		'tanggal_akad' => $tanggal_akad,
	 		'jam_akad' => $waktu_akad,
	 		'tempat_akad' => $lokasi_akad,
	 		'alamat_akad' => $alamat_akad,
			'gmap_akad' => $gmap_akad,
	 		'tanggal_resepsi' => $tanggal_resepsi,
	 		'jam_resepsi' => $waktu_resepsi,
	 		'tempat_resepsi' => $lokasi_resepsi,
	 		'alamat_resepsi' => $alamat_resepsi,
			'gmap_resepsi' => $gmap_resepsi
	 	];
		//CEK MAPnya, jika kosong maka fitur map disabled
		$undangan_fitur_lokasi=0;
		$dicari="iframe";
		$kalimat_akad = $gmap_akad;
		$kalimat_resepsi = $gmap_resepsi;

		

		if ($gmap_akad=="" and $gmap_resepsi== "" ){
			$undangan_fitur_lokasi = 0;
		}elseif ($gmap_akad<>"" and $gmap_resepsi== "" ){
			//Cek di AKAD betul iframe Gmap atau tidak
			if(preg_match("/$dicari/i", $kalimat_akad)){
				$undangan_fitur_lokasi = 1;
			}else{
				$undangan_fitur_lokasi = 0;
			}
		}elseif ($gmap_akad=="" and $gmap_resepsi<> "" ){
			//Cek di RESEPSI betul iframe Gmap atau tidak
			if(preg_match("/$dicari/i", $kalimat_resepsi)){
				$undangan_fitur_lokasi = 1;
			}else{
				$undangan_fitur_lokasi = 0;
			}
		}else{
			//Cek di RESEPSI betul iframe Gmap atau tidak
			if(preg_match("/$dicari/i", $kalimat_akad) == true and preg_match("/$dicari/i", $kalimat_resepsi) == true ){
				$undangan_fitur_lokasi = 1;
			}else if(preg_match("/$dicari/i", $kalimat_akad) == true and preg_match("/$dicari/i", $kalimat_resepsi) == false ){
				$undangan_fitur_lokasi = 1;
			}else if(preg_match("/$dicari/i", $kalimat_akad) == false and preg_match("/$dicari/i", $kalimat_resepsi) == true ){
				$undangan_fitur_lokasi = 1;
			}else{
				$undangan_fitur_lokasi = 0;
			} 
		}

	 	//::: CERITA :::
	 	$skipCerita = $this->session->get('skipCerita');
	 	$cerita = 0;
		if($skipCerita == ''){
			$jml_cerita = $this->session->get('jml_cerita');

			for($i=0;$i<$jml_cerita;$i++){
				$tanggal_cerita = $this->session->get('tanggal_cerita'.$i);
				$judul_cerita = $this->session->get('judul_cerita'.$i);
				$isi_cerita = $this->session->get('isi_cerita'.$i);

				$datausers_Cerita = [
					'id_user' => $id_user,
					'tanggal_cerita' => $tanggal_cerita,
					'judul_cerita' => $judul_cerita,
					'isi_cerita' => $isi_cerita
				];

				$saveusers_Cerita = $this->OrderModel->save_users_cerita($datausers_Cerita);
			}
			$cerita = 1;
		}
		

		//::: ALBUM :::
		$skipGallery = $this->session->get('skipGallery');
		 
		
		$video = '';
		$gallery = 0;
		$generate = $this->session->get('dummy');
		 
		//CEK $skipGalery tidak kosong
		if (!$skipGallery==""){
			die('skipGallery KOSONG');
		}else{
			//Jika Ada upload foto
			if($skipGallery == "1"){
				for($a=1;$a<=10;$a++){
				  $pathName = 'assets/users/'.$generate.'/album'.$a.'.png';
				  if(!file_exists($pathName)){
					//die('Tidak ditemukan : '.$pathName);
				  }else{
					$datausers_Album = [
						'id_user' => $id_user,
						'album' => 'album'.$a 
					] ;
	  
					$saveusers_Album = $this->OrderModel->save_users_album($datausers_Album); 
					//Cek berhasil insert data atau tidak
					if (!$saveusers_Album){
						die('Gagal insert data : album'.$a);
					}
				  } 
				}
				$video = '';
				$gallery = 1;
			}else{
				$gallery = 0;
			}
		}
		

		$foto_pria = $this->session->get('foto_groom');
		$foto_wanita = $this->session->get('foto_bride');
		if($foto_pria == null){
			$foto_pria = "0";
		}
		if($foto_wanita == null){
			$foto_wanita = "0";
		}
		$kunci = md5($id_user.$domain);
		$folder = 'assets/users/'.$generate;
		$folderBaru = 'assets/users/'.$kunci; 

		//Cek adakah $generate hasil dari session Dummy
		if ($generate<>""){
			//Cek Jika tidak ada Folder Dummy karena user tidak upload foto apapun
			if(!file_exists($folder)){
				$create = mkdir('assets/users/'.$generate, 0777,true);
			}
			// Rename folder dumy ke forder sebenarnya
			rename($folder, $folderBaru);
		}else{
			$create = mkdir('assets/users/'.$kunci, 0777,true);
		}

		$dataData = [
			'id_user' => $id_user,
			'foto_pria' => $foto_pria,
			'foto_wanita' => $foto_wanita, 
			'kunci' => $kunci
		];

		$dataAlbumVideo = [
			'id_user' => $id_user,
			'video' => $video
		];

		//Undangan_fitur
		$dataUndanganFitur = [ 
			'id_user' => $id_user,
			'sampul' => 1,
			'mempelai' => 1,
			'acara' => 1,
			'komen' => 1,
			'gallery' => $gallery,
			'cerita' => $cerita,
			'lokasi' => $undangan_fitur_lokasi,
		];

		//pembayaran
		$biaya_paket_saat_itu = $this->OrderModel->biaya_paket_saat_itu($paket_id); 
		foreach ($biaya_paket_saat_itu->getResult() as $row)
		{
			$hasil_biaya_paket_saat_itu = $row->paket_harga_diskon;

		}
		$paket_limit_waktu_saat_itu = $this->OrderModel->paket_limit_waktu_saat_itu($paket_id);
		foreach ($paket_limit_waktu_saat_itu->getResult() as $row)
		{
			$hasil_paket_limit_waktu_saat_itu = $row->paket_limit_waktu;

		}
		//Cek Apakah ada Paket Gratis
		if ($hasil_biaya_paket_saat_itu=="0" or $hasil_biaya_paket_saat_itu==""){
			$statusbayar = "2";
		}else{
			$statusbayar = "0";
		}
		$dataUsers_Order_Pembayaran = [
			'id_user' => $id_user,
			'invoice' => $kode,
			'status' => $statusbayar,
			'biaya_paket_saat_itu' => $hasil_biaya_paket_saat_itu,
			'paket_limit_waktu_saat_itu' => $hasil_paket_limit_waktu_saat_itu
		];

		$saveUsers_Order_Pembayaran = $this->OrderModel->save_users_order_pembayaran($dataUsers_Order_Pembayaran);
		$saveUndanganFitur = $this->OrderModel->save_undangan_fitur($dataUndanganFitur);
		$saveData = $this->OrderModel->save_data($dataData);
		$saveAlbumVideo = $this->OrderModel->save_users_album_video($dataAlbumVideo);
	 	$saveusers_Acara = $this->OrderModel->save_users_acara($datausers_Acara);
	 	$saveOrder = $this->OrderModel->save_order($dataOrder);
		$saveUser = $this->OrderModel->save_users_mempelai($datausers_Mempelai);

	 	if($saveUser){

			$this->session->destroy();
	 		return redirect()->to(base_url('/order/success/'.$kunci));
	 	}else{
	 		echo "gagal";
	 	}

	 }

}