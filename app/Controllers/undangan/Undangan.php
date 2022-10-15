<?php namespace App\Controllers\undangan;

use CodeIgniter\Controller;
use App\Models\undangan\UndanganModel; 

class Undangan extends Controller
{

	//mendefinisikan variable agar bisa digunakan
	//secara global
	protected $UndanganModel;
	protected $uri; 

	public function __construct() {  
		// MODEL UNDANGAN
		$this->UndanganModel = new UndanganModel(); 
		// SESSION
        $this->session = session(); 
		// CLASS REQUEST URI
		$request = \Config\Services::request();  
		$this->uri = $request->uri;  
    }

	public function index()
	{
		// return redirect()->to(DOMAIN_UTAMA); //redirect ke domain utama
		echo 'URL Tidak Valid / Kurang Lengkap';

	}

	/*---------------------------
		FUNGSI UTAMA
	----------------------------*/
	public function undangan()
	{
		//Kondisi Web dijalankan  localhost/online
		$data['cek_koneksi_internet'] = $this->cek_koneksi_internet();
		
		//mengambil data tetap website_umum
		$data['website_umum'] = $this->UndanganModel->get_all_website_umum();
		$web = $this->uri->getSegment(2); //membaca domain user
		$invite = $this->uri->getSegment(3); //orang yang diundang disini
		$invitebaru = str_replace("_"," ",$invite);
		$invite = $invitebaru;

		$data['web'] = urldecode($web);
		$data['invite'] = urldecode($invite);
		
		//melakukan pengeceakan ke database
		$cekDomain = $this->UndanganModel->cek_domain(urldecode($web));

		/***** 1) CEK DOMAIN *****/
		//jika ditemukan lanjut ke proses selanjutnya
		if(!empty($cekDomain->getResult())){
			
			//jika data ditemukan maka kita akan ambil id_user nya
			foreach ($cekDomain->getResult() as $row){
				$idnya = $row->id_user;
				$this->session->set('id_user',$idnya); //save di session untuk di load jika komentar
			}
			
			/***** 2) CEK PEMBAYARAN AKUN *****/
			//Cek status users_order_pembayaran user
			$cek_status_users_order_pembayaran = $this->UndanganModel->get_status_users_order_pembayaran($idnya);
			foreach ($cek_status_users_order_pembayaran->getResult() as $row)
			{
				$status_users_order_pembayarannya = $row->status;  
			}
			$validasi2 = $status_users_order_pembayarannya;

			/***** 3) CEK LIMIT WAKTU PAKET AKUN *****/
			//Cek limit waktu paket order
			$ambilLIMITwaktu = $this->UndanganModel->get_limit_waktu($idnya);  
			$limitwaktupaket = $ambilLIMITwaktu[0]->paket_limit_waktu;
			//Cek jika paket unlimited
			if ($limitwaktupaket=="0"){
				$validasi3 = 'AKTIF';
			}else{
				//Jika bukan paket unlimited
				$waktupembayaran =  $ambilLIMITwaktu[0]->waktupembayaran;
				//CATAT SAMPAI TANGGAL BERAPA MASA AKTIF PAKET
				$tgl1 = $waktupembayaran;
				$tgl2 = date('Y-m-d h:i:sa', strtotime('+'.$limitwaktupaket.' days', strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak ... hari
				$aktifsampaitgl = date("Y-m-d h:i:sa", strtotime($tgl2)); //print tanggal
				$awal  = date_create($aktifsampaitgl);
				$akhir = date_create(); // waktu sekarang 
				$diff  = date_diff( $awal, $akhir );
				/*	* /
				echo $diff->y . ' tahun, ';
				echo $diff->m . ' bulan, ';
				echo $diff->d . ' hari, ';
				echo $diff->h . ' jam, ';
				echo $diff->i . ' menit, ';
				echo $diff->s . ' detik, ';
				 end;
				/* */
				//JIKA sudah lewat waktu limit
				if (($diff->d == "0") or ($diff->d > $limitwaktupaket)){
					$validasi3 = 'KALDALUARSA';
					//Update Tabel users_order buat status menjadi = 4 (Masa Aktif Habis)
					$data_users_order['status'] = "4";
					$kueri_users_order = $this->UndanganModel->update_status_users_order($data_users_order, $idnya);
					//Update Tabel users_order_pembayaran buat status menjadi = 4 (Masa Aktif Habis)
					$data_users_order_pembayaran['status'] = "4";
					$kueri_users_order_pembayaran = $this->UndanganModel->update_status_users_order_pembayaran($data_users_order_pembayaran, $idnya);
				}else{
					//JIKA belum lewat waktu limit
					$validasi3 = 'AKTIF';
				}
			}

			


			/***** 4) TAMPILKAN UNDANGAN DIGITAL ONLINE *****/
			if ($validasi2 == "4"){
				echo "Akun Anda sudah melewati masa limit waktu PAKET.<br/>";
				echo "Silahkan Upgrade PAKET akun Anda untuk memperpanjang masa limit waktu nya sehingga halaman ini kembali tampil.<br/>";
			}else if ($validasi2 == "3"){
				echo "Akun Anda sudah di Non-Aktifkan oleh Admin. <br/>";
			}else if ($validasi2 == "2"){
				if ($validasi3 == "AKTIF"){
					//id_user kemudian digunakan untuk mengambil semua data yang dibutuhkan
					$data['users_mempelai'] = $this->UndanganModel->get_users_mempelai($idnya);
					$data['users_acara'] = $this->UndanganModel->get_users_acara($idnya);
					$data['users_doa_dan_ucapan'] = $this->UndanganModel->get_users_doa_dan_ucapan($idnya);
					$data['undangan_pengaturan'] = $this->UndanganModel->get_pengaturan($idnya);
					$data['users_cerita'] = $this->UndanganModel->get_users_cerita($idnya);
					$data['users_album'] = $this->UndanganModel->get_users_album($idnya); 
					$data['users_album_video'] = $this->UndanganModel->get_users_album_video($idnya); 
					$data['users_order_musik'] = $this->UndanganModel->get_users_order_musik($idnya); 
					$data['undangan_fitur'] = $this->UndanganModel->get_undangan_fitur($idnya); 
					$data['users_order_pembayaran'] = $this->UndanganModel->get_status_users_order_pembayaran($idnya);
 
					//cek pada tabel order untuk mengambil tema yang digunakan user
					$ordernya = $this->UndanganModel->get_users_order_theme($idnya);
					//ini untuk mendefinisikan tema undangan secara default  
					//apabila tema yang direquest user tidak ditemukan
					$temanya = 'Bunga_Hijau';
					//jika tema ditemukan maka
					//variabel tema akan di 'repleace' sesuai tema pilihan user
					foreach ($ordernya->getResult() as $row){ 
						$temanya = $row->nama_theme;
						$domainnya = $row->domain;
					}
					//CEK PAKAI SEPATAH KATA APA?
					//Cek di tabel undangan_pengaturan dia milih apa
					$pilihan_dipengaturan = $this->UndanganModel->get_pengaturan($idnya);
					foreach ($pilihan_dipengaturan->getResult() as $row){ 
						$pilihannya = $row->sepatah_kata_pilihan;
					}
					//Jika database kosong akibat gagal di difungsi lain
					if ($pilihannya=="0"){
						$pilihannya="2";
					}
					//Ambil kata2 di tabel undangan_sepatah_kata sesuai pilihan tadi dan disimpan ke variabel
					$data['undangan_sepatah_kata'] = $this->UndanganModel->get_sepatah_kata($pilihannya);  
					//CATAT TRAFFIC PENGUNJUNG
					if($invite != NULL){
						$dataTraffic['nama_pengunjung'] = urldecode($invite);
					}else{
						$dataTraffic['nama_pengunjung'] = "Unknown";
					}
					$dataTraffic['id_user'] = $idnya;
					$dataTraffic['addr'] = $this->get_client_ip();
					$this->UndanganModel->insert_traffic($dataTraffic);

					/*Mematikan Untuk Demo
					if ($idnya<>"1"){
						$this->UndanganModel->insert_traffic($dataTraffic);
					}*/

					//AMBIL DATA BANK UNTUK BINGKISAN 
					$id=$idnya;
					$siapa ="PENGGUNA"; 
					$data['daftar_bank_pengguna'] = $this->UndanganModel->get_all_undangan_bank_by_siapa($id, $siapa);
					
					// Kebutuhan SEO Share media sosial
					$data['domain'] = $domainnya;
					$data['tamu_undangan'] = $this->uri->getSegment(3);
					
					//KIRIM SEMUA DATA PADA VIEW
					return view('undangan/themes/'.$temanya, $data);
				}else{
					echo "Akun Anda sudah melewati masa limit waktu PAKET <br/>";
					echo "Akun Anda tercatat memiliki masa limit PAKET $limitwaktupaket hari. Sedangkan waktu pembayaran Anda terkonfirmasi mulai $waktupembayaran, sehingga akun akan hanya berlaku sampai $aktifsampaitgl";
				}
			}elseif ($validasi2 == "1"){
				echo "Maaf, Bukti Pembayaran Order Anda belum dikonfirmasi Admin :D";
			}else{
				echo "Maaf, Anda belum menyelesaikan pembayaran.";
			}
			
		}else{
			//DOMAIN TIDAK DITEMUKAN
			return $this->index();
		}
	}

	/*---------------------------
		FUNGSI TAMBAH DOA_DAN_UCAPAN
	----------------------------*/ 
	public function do_add_users_doa_dan_ucapan(){
		//CEK Apakah ada kode script tidak pantas
        $data_doa_dan_ucapan_nama_pengunjung = $this->request->getPost('doa_dan_ucapan_nama_pengunjung');
        $hasil1_doa_dan_ucapan_nama_pengunjung = strip_tags($data_doa_dan_ucapan_nama_pengunjung);
		$data_doa_dan_ucapan_isi = $this->request->getPost('doa_dan_ucapan_isi');
		$kehadiran = $this->request->getPost('kehadiran');
		$jumlah = $this->request->getPost('jumlah');
        $hasil1_doa_dan_ucapan_isi = strip_tags($data_doa_dan_ucapan_isi);
		//CEK Apakah ada kata tidak pantas
        $katatidakpantas = array('asu','up', 'kontol', 'pantek', 'babi', 'anjing', 'jelek', 'peniru', 'penipu', 'sesat');
		$hasil2_doa_dan_ucapan_nama_pengunjung = preg_replace("/(\b|[0-9_])(".implode('|',$katatidakpantas).")(\b|[0-9_])/i", '***', $hasil1_doa_dan_ucapan_nama_pengunjung);
		$hasil2_doa_dan_ucapan_isi = preg_replace("/(\b|[0-9_])(".implode('|',$katatidakpantas).")(\b|[0-9_])/i", '***', $hasil1_doa_dan_ucapan_isi);
		// DATA
		$data['doa_dan_ucapan_nama_pengunjung'] = $hasil2_doa_dan_ucapan_nama_pengunjung;
		$data['doa_dan_ucapan_isi'] = $hasil2_doa_dan_ucapan_isi;
		$data['kehadiran'] = $kehadiran;
		$data['jumlah'] = $jumlah;
		$data['id_user'] = $_SESSION['id_user'];

		// Cek Recaptcha Status
		$recaptcha_status = $this->request->getPost('recaptcha_status');
		if ($recaptcha_status=="Aktif"){
			//mengambil data tetap website_umum
			$datawebsite_umum = $this->UndanganModel->get_all_website_umum();
			//CHAPCA
			$secret_key = $datawebsite_umum[21]->website_isi;
			$g_recaptcha_response = $this->request->getPost('g_recaptcha_response');
			$verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$g_recaptcha_response);
			$response_aktif = json_decode($verify);
		}else{
			//Tandai Captcha Status Tidak Aktif
			$response_noaktif = "Iya";
		}
		// HASIL captcha
		if($response_aktif->success){
			$insert = $this->UndanganModel->add_users_doa_dan_ucapan($data);
			if($insert){
				echo 'sukses';
			}else{
				echo 'gagal';
			}  
		}else{
			// Lanjut Proses Kalau Captcha Status Tidak Aktif
			if ($response_noaktif=="Iya"){
				$insert = $this->UndanganModel->add_users_doa_dan_ucapan($data);
				if($insert){
					echo 'sukses';
				}else{
					echo 'gagal';
				} 
			}else{
				// Chapca gagal lolos
				echo 'gagal';
			}
			
		}	
	}

	/*---------------------------
		AMBIL IP ADRESS PENGUNJUNG WEB
	----------------------------*/
	public function get_client_ip() {
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = '0';
		return $ipaddress;
	}

	/*---------------------------
		CEK KONEKSI INTERNET
	----------------------------*/
	public function cek_koneksi_internet(){
        $connected = @fsockopen("www.google.com", 80);
        if ($connected){
            $is_conn = true; //jika koneksi tersambung maka bernilai true
        fclose($connected);
        }else{
            $is_conn = false; //jika koneksi gagal maka bernilai false
        }
        return $is_conn;
    }   
}