<?php namespace App\Controllers\base;

use CodeIgniter\Controller;
use App\Models\base\BerandaModel; //load BerandaModel

class Beranda extends Controller
{

	//mendefinisikan variable agar bisa digunakan
	//secara global
	protected $BerandaModel; 

	public function __construct() {
        
		$request = \Config\Services::request();

		//mengisi variable global dengan data
		$this->BerandaModel = new BerandaModel();  //load BerandaModel
		$request = \Config\Services::request(); //memanggil class request
		$this->uri = $request->uri; //class request digunakan untuk request uri/url
		$this->session = session();  
    }

	public function index()
	{
		//Jika Sudah login
		if(session()->has('masukUser'))
        {
        	$data['sudah_login'] = "sudah"; 
        }else{
			$data['sudah_login'] = "belum"; 
		}
		//mengambil data tetap website_umum
		$data['website_umum'] = $this->BerandaModel->get_all_website_umum();
		//mengambil data widget
		$data['widget_data_cover'] = $this->BerandaModel->get_all_website_widget_posisi("home_cover");
        $data['widget_data_cover_links'] = $this->BerandaModel->get_all_website_widget_links( $data['widget_data_cover'][0]->widget_id);
		$data['widget_data_fitur'] = $this->BerandaModel->get_all_website_widget_posisi("home_fitur");
        $data['widget_data_fitur_links'] = $this->BerandaModel->get_all_website_widget_links( $data['widget_data_fitur'][0]->widget_id);
		$data['widget_data_paket_udo'] = $this->BerandaModel->get_all_website_widget_posisi("home_paket_udo");
        $data['widget_data_paket_udo_links'] = $this->BerandaModel->get_all_website_widget_links( $data['widget_data_paket_udo'][0]->widget_id);
		$data['widget_data_tema'] = $this->BerandaModel->get_all_website_widget_posisi("home_tema");
		$data['widget_data_tema_links'] = $this->BerandaModel->get_all_website_widget_links( $data['widget_data_tema'][0]->widget_id);
		$data['widget_data_testimoni'] = $this->BerandaModel->get_all_website_widget_posisi("home_testimoni");
		$data['widget_data_footer_kiri'] = $this->BerandaModel->get_all_website_widget_posisi("home_footer_kiri");
		$data['widget_data_footer_tengah'] = $this->BerandaModel->get_all_website_widget_posisi("home_footer_tengah");
		$data['widget_data_footer_tengah_links'] = $this->BerandaModel->get_all_website_widget_links( $data['widget_data_footer_tengah'][0]->widget_id);
		$data['widget_data_footer_kanan'] = $this->BerandaModel->get_all_website_widget_posisi("home_footer_kanan");
        $data['widget_data_footer_kanan_links'] = $this->BerandaModel->get_all_website_widget_links( $data['widget_data_footer_kanan'][0]->widget_id);

		//mengambil semua data undangan_tema dari BerandaModel
		$data['undangan_tema'] = $this->BerandaModel->get_all_undangan_tema(); 
		//PAKET UNDANGAN
		$data['undangan_paket'] = $this->BerandaModel->get_all_undangan_paket();
		//TESTIMONI
		$data['users_testimoni'] = $this->BerandaModel->get_all_users_testimoni();

		$data['CI'] = $this;
		//load view home
		return view('base/beranda/home', $data);
	} 
	
	//::: TEMA WEBSITE GANTI :::
	public function do_tema_website_update(){ 
        $data['TemaWebsite'] = $this->request->getPost('TemaWebsite'); 
        $update = $this->BerandaModel->update_pengaturan_website_umum_tema_website($data);
        if($update){ 
            echo 'sukses';
        }else{
            echo 'gagal';
        }
    }

	//::: PAGE TEMA :::
	public function undangan_tema()
	{	
		//mengambil data tetap website_umum
		$data['website_umum'] = $this->BerandaModel->get_all_website_umum();
		//mengambil data widget
		$data['widget_data_footer_kiri'] = $this->BerandaModel->get_all_website_widget_posisi("home_footer_kiri");
		$data['widget_data_footer_tengah'] = $this->BerandaModel->get_all_website_widget_posisi("home_footer_tengah");
		$data['widget_data_footer_tengah_links'] = $this->BerandaModel->get_all_website_widget_links( $data['widget_data_footer_tengah'][0]->widget_id);
		$data['widget_data_footer_kanan'] = $this->BerandaModel->get_all_website_widget_posisi("home_footer_kanan");
        $data['widget_data_footer_kanan_links'] = $this->BerandaModel->get_all_website_widget_links( $data['widget_data_footer_kanan'][0]->widget_id);

		//mengambil semua data undangan_tema dari BerandaModel
		$data['tema'] = $this->BerandaModel->get_all_undangan_tema();
		$data['CI'] = $this;
		//kirim data ke view
		return view('base/beranda/tema',$data);

	}


	public function ambil_nama_paket_by_id($paket_id){
		return $this->BerandaModel->get_paket_nama_by_id($paket_id);

	}
	public function ambil_count_undangan_tema_by_paket_id($paket_id){
		return $this->BerandaModel->get_count_undangan_tema_by_paket_id($paket_id);

	}

	public function demo(){

		//Kondisi Web dijalankan  localhost/online
		$data['cek_koneksi_internet'] = $this->cek_koneksi_internet();

		//id user khusus demo
		$idnya = '1';  

		//mengambil data tetap website_umum
		$data['website_umum'] = $this->BerandaModel->get_all_website_umum();
		$temanya = $this->uri->getSegment(3); //get tema
		$invite = $this->uri->getSegment(4); //get invited user
		//cek apkah temanya ada ?
		$cek = $this->BerandaModel->get_undangan_tema_by_name(urldecode($temanya));
		if(count($cek) > 0){

			//get all data
			$data['web'] = urldecode('reydinda');
			$data['invite'] = urldecode($invite);
			$data['users_mempelai'] = $this->BerandaModel->get_users_mempelai($idnya);
			$data['users_acara'] = $this->BerandaModel->get_users_acara($idnya);

			//::: DOA DAN UCAPAN ::: 
			$data['users_doa_dan_ucapan'] = $this->BerandaModel->get_users_doa_dan_ucapan($idnya);

			$data['undangan_pengaturan'] = $this->BerandaModel->get_undangan_pengaturan($idnya);
			$data['users_cerita'] = $this->BerandaModel->get_users_cerita($idnya);
			$data['users_album'] = $this->BerandaModel->get_users_album($idnya);
			$data['users_album_video'] = $this->BerandaModel->get_users_album_video($idnya); 
			$data['undangan_fitur'] = $this->BerandaModel->get_undangan_fitur($idnya);  
			$data['users_order_musik'] = $this->BerandaModel->get_users_order_musik($idnya);  

			//CEK PAKAI SEPATAH KATA APA?
			//Cek di tabel undangan_pengaturan dia milih apa
			$pilihan_dipengaturan = $this->BerandaModel->get_undangan_pengaturan($idnya);
				foreach ($pilihan_dipengaturan->getResult() as $row){ 
					$pilihannya = $row->sepatah_kata_pilihan;
				}
				//Ambil kata2 di tabel undangan_sepatah_kata sesuai pilihan tadi dan disimpan ke variabel
				$data['undangan_sepatah_kata'] = $this->BerandaModel->get_sepatah_kata($pilihannya);  
			
			//AMBIL DATA BANK UNTUK BINGKISAN 
			$id=$idnya;
			$siapa ="PENGGUNA"; 
			$data['daftar_bank_pengguna'] = $this->BerandaModel->get_all_undangan_bank_by_siapa($id, $siapa);

			// Kebutuhan SEO Share media sosial
			$data['domain'] = urldecode('demo/' . $temanya);
			$data['tamu_undangan'] = urldecode($invite);
						
			return view('undangan/themes/'.$temanya, $data); 

		}else{
			echo "URL Tidak Valid / Kurang Lengkap";
		}

	} 
	
	//::: DOA DAN UCAPAN :::  
	public function do_add_users_doa_dan_ucapan(){
		//CEK Apakah ada kode script tidak pantas
        $data_doa_dan_ucapan_nama_pengunjung = $this->request->getPost('doa_dan_ucapan_nama_pengunjung');
        $hasil1_doa_dan_ucapan_nama_pengunjung = strip_tags($data_doa_dan_ucapan_nama_pengunjung);
		$data_doa_dan_ucapan_isi = $this->request->getPost('doa_dan_ucapan_isi');
        $hasil1_doa_dan_ucapan_isi = strip_tags($data_doa_dan_ucapan_isi);
		//CEK Apakah ada kata tidak pantas
        $katatidakpantas = array('asu','up', 'kontol', 'pantek', 'babi', 'anjing', 'jelek', 'peniru', 'penipu', 'sesat');
		$hasil2_doa_dan_ucapan_nama_pengunjung = preg_replace("/(\b|[0-9_])(".implode('|',$katatidakpantas).")(\b|[0-9_])/i", '***', $hasil1_doa_dan_ucapan_nama_pengunjung);
		$hasil2_doa_dan_ucapan_isi = preg_replace("/(\b|[0-9_])(".implode('|',$katatidakpantas).")(\b|[0-9_])/i", '***', $hasil1_doa_dan_ucapan_isi);
		// DATA
		$data['doa_dan_ucapan_nama_pengunjung'] = $hasil2_doa_dan_ucapan_nama_pengunjung;
		$data['doa_dan_ucapan_isi'] = $hasil2_doa_dan_ucapan_isi; 
		$data['id_user'] = '1';

		// Cek Recaptcha Status
		$recaptcha_status = $this->request->getPost('recaptcha_status');
		if ($recaptcha_status=="Aktif"){
			//mengambil data tetap website_umum
			$datawebsite_umum = $this->BerandaModel->get_all_website_umum();
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
			$insert = $this->BerandaModel->add_users_doa_dan_ucapan($data);
			if($insert){
				echo 'sukses';
			}else{
				echo 'gagal';
			} 
		}else{
			// Lanjut Proses Kalau Captcha Status Tidak Aktif
			if ($response_noaktif=="Iya"){
				$insert = $this->BerandaModel->add_users_doa_dan_ucapan($data);
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

	public function youtube()
	{
		//mengambil data tetap website_umum
		$data['website_umum'] = $this->BerandaModel->get_all_website_umum();
		//mengambil data widget
		$data['widget_data_footer_kiri'] = $this->BerandaModel->get_all_website_widget_posisi("footer_kiri");
		$data['widget_data_footer_tengah'] = $this->BerandaModel->get_all_website_widget_posisi("footer_tengah");
		$data['widget_data_footer_tengah_link'] = $this->BerandaModel->get_all_website_widget_links( $data['widget_data_footer_tengah'][0]->widget_id);
		$data['widget_data_footer_kanan'] = $this->BerandaModel->get_all_website_widget_posisi("footer_kanan");
        $data['widget_data_footer_kanan_link'] = $this->BerandaModel->get_all_website_widget_links( $data['widget_data_footer_kanan'][0]->widget_id);

		return view('base/youtube', $data);
	}

	public function maps()
	{
		//mengambil data tetap website_umum
		$data['website_umum'] = $this->BerandaModel->get_all_website_umum();
		//mengambil data widget
		$data['widget_data_footer_kiri'] = $this->BerandaModel->get_all_website_widget_posisi("footer_kiri");
		$data['widget_data_footer_tengah'] = $this->BerandaModel->get_all_website_widget_posisi("footer_tengah");
		$data['widget_data_footer_tengah_link'] = $this->BerandaModel->get_all_website_widget_links( $data['widget_data_footer_tengah'][0]->widget_id);
		$data['widget_data_footer_kanan'] = $this->BerandaModel->get_all_website_widget_posisi("footer_kanan");
        $data['widget_data_footer_kanan_link'] = $this->BerandaModel->get_all_website_widget_links( $data['widget_data_footer_kanan'][0]->widget_id);

		return view('base/maps',$data);
	}

	/*---------------------------
		CEK KONEKSI INTERNET
	----------------------------*/
	public function cek_koneksi_internet(){
        $connected = @fsockopen("www.google.com", 80);
        
		if ($connected){
            $is_conn = true; //jika koneksi tersambung maka bernilai true
        	fclose($connected);
        } else {
            $is_conn = false; //jika koneksi gagal maka bernilai false
        }

        return $is_conn;
    }   
}