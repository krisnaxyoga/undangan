<?php namespace App\Models\admin;

use CodeIgniter\Model;

class AdminModel extends Model
{
    public function __construct() {
        parent::__construct();
        $db  = \Config\Database::connect();
        $this->admin = $db->table('admin'); 
        $this->sistem = $db->table('sistem'); 
        $this->undangan_bank = $db->table('undangan_bank'); 
        $this->undangan_fitur = $db->table('undangan_fitur'); 
        $this->undangan_musik = $db->table('undangan_musik');
        $this->undangan_paket = $db->table('undangan_paket');
        $this->undangan_pengaturan = $db->table('undangan_pengaturan');
        $this->undangan_sepatah_kata = $db->table('undangan_sepatah_kata');
        $this->undangan_tema = $db->table('undangan_tema');
        $this->users = $db->table('users'); 
        $this->users_acara = $db->table('users_acara');
        $this->users_album = $db->table('users_album'); 
        $this->users_album_video = $db->table('users_album_video');
        $this->users_cerita = $db->table('users_cerita');  
        $this->users_doa_dan_ucapan = $db->table('users_doa_dan_ucapan'); 
        $this->users_mempelai = $db->table('users_mempelai'); 
        $this->users_order = $db->table('users_order');  
        $this->users_order_pembayaran = $db->table('users_order_pembayaran');
        $this->users_pengunjung = $db->table('users_pengunjung'); 
        $this->users_testimoni = $db->table('users_testimoni'); 
        $this->users_upgrade_paket = $db->table('users_upgrade_paket');
        $this->website_umum = $db->table('website_umum');
        $this->website_widget = $db->table('website_widget');
        $this->website_widget_links = $db->table('website_widget_links'); 
        $this->session = session(); 
    }

    /*---------------------------
        SISTEM
    ----------------------------*/
    public function get_sistem_versi(){
        $kueri = $this->sistem;
        $kueri->select('sistem_versi,sistem_tgl_rilis');
        $kueri->orderBy('sistem_tgl_rilis','DESC') ;
        return $kueri->get()->getResult()[0]->sistem_versi;
    }

    /*---------------------------
        DIPAKAI UMUM
    ----------------------------*/
        /* ============ SEO WEB ============ */
        public function get_all_website_umum(){
            $kueri = $this->website_umum;
            $kueri->select('*');
            $kueri->orderBy('website_id', 'ASC');
            return $kueri->get()->getResult();
        }
        /* ============ DATA PENGGUNA ============ */
        public function get_all_join(){
            $builder = $this->users_order_pembayaran;
            $builder->select('
                                users.id as users_id, 
                                users_order.created_at as users_order_created_at,
                                users.email as users_email,
                                users_order.domain as users_order_domain,
                                undangan_paket.paket_nama as undangan_paket_paket_nama,
                                users_order_pembayaran.paket_limit_waktu_saat_itu as users_order_pembayaran_paket_limit_waktu_saat_itu,
                                users_order_pembayaran.updated_at as users_order_pembayaran_updated_at,
                                users_order_pembayaran.status as users_order_pembayaran_status,

                                users_order_pembayaran.invoice as users_order_pembayaran_invoice,
                                users_order_pembayaran.biaya_paket_saat_itu as users_order_pembayaran_biaya_paket_saat_itu,
                                users_order_pembayaran.nama_lengkap as users_order_pembayaran_nama_lengkap,
                                users_order_pembayaran.nama_bank as users_order_pembayaran_nama_bank,
                                users_order_pembayaran.bukti as users_order_pembayaran_bukti
            ');
            $builder->join('users', 'users.id = users_order_pembayaran.id_user', 'left');
            $builder->join('users_order', 'users_order.id_user = users_order_pembayaran.id_user', 'left');
            $builder->join('undangan_paket', 'undangan_paket.paket_id = users_order.paket_id', 'left');
            $query = $builder->get();
            return $query->getResult();
        }
        public function get_admin_by_id(){
            $builder = $this->admin;
            $builder->select('*');
            $builder->where('id', $_SESSION['id_admin']);
            $query = $builder->get();
            return $query->getResult();
        }
        public function update_admin($data){
            $builder = $this->admin;
            $builder->where('id', $_SESSION['id_admin']);
            return $builder->update($data);
        }
        public function get_admin($data){
            $builder = $this->admin;
            $builder->where($data);
            $query = $builder->get();
            return $query->getResult();
        }

    /*---------------------------
        DASHBOARD
    ----------------------------*/
    public function get_total_pengguna_baru_pending(){
        $builder = $this->users_order_pembayaran;
        $builder->selectCount('id');
        $where = "status='1'";
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult()[0]->id;
    }
    public function get_total_pengguna_aktif(){
        $builder = $this->users_order_pembayaran;
        $builder->selectCount('id');
        $where = "status='2'";
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult()[0]->id;
    }
    public function get_total_pengguna_tidak_aktif(){
        $builder = $this->users_order_pembayaran;
        $builder->selectCount('id');
        $where = "status='3' or status='4'";
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult()[0]->id;
    }
    public function get_total_keuntungan_pengguna_baru(){
        $builder = $this->users_order_pembayaran;
        $builder->select ('SUM(biaya_paket_saat_itu) as harga');
        $where = "status=2";
        $builder->where($where);
        $query = $builder->get(); 
        return $query->getResult()[0]->harga;
    }
    public function get_total_keuntungan_pengguna_baru_pending(){
        $builder = $this->users_order_pembayaran;
        $builder->select ('SUM(biaya_paket_saat_itu) as harga');
        $where = "status!=2";
        $builder->where($where);
        $query = $builder->get(); 
        return $query->getResult()[0]->harga;

    }
    public function get_total_permintaan_upgrade_paket_perlu_konfirmasi(){
        $builder = $this->users_upgrade_paket;
        $builder->selectCount('upgrade_paket_id');
        $where = "upgrade_paket_status_konfirmasi='BELUM'";
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult()[0]->upgrade_paket_id;
    }
    public function get_total_permintaan_upgrade_paket(){
        $builder = $this->users_upgrade_paket;
        $builder->selectCount('upgrade_paket_id'); 
        $query = $builder->get();
        return $query->getResult()[0]->upgrade_paket_id;
    }
    public function get_total_keuntungan_upgrade_paket(){
        $builder = $this->users_upgrade_paket;
        $builder->select ('SUM(upgrade_paket_biaya_saat_itu) as keuntungan');
        $where = "upgrade_paket_status_konfirmasi='SUDAH'";
        $builder->where($where);
        $query = $builder->get(); 
        return $query->getResult()[0]->keuntungan;
    }
    public function get_total_keuntungan_upgrade_paket_pending(){
        $builder = $this->users_upgrade_paket;
        $builder->select ('SUM(upgrade_paket_biaya_saat_itu) as keuntungan');
        $where = "upgrade_paket_status_konfirmasi='BELUM'";
        $builder->where($where);
        $query = $builder->get(); 
        return $query->getResult()[0]->keuntungan;
    }

    /*---------------------------
        DATA PENGGUNA
    ----------------------------*/ 
		/* ============ LIST PENGGUNA ============ */ 
        public function get_user_by_id_user(){
            $builder = $this->users;
            $builder->select('*');
            $builder->where('id', $_SESSION['id_usernya']);
            $query = $builder->get();
            return $query->getResult();
        }
        public function get_fitur_by_id_user(){
            $builder = $this->undangan_fitur;
            $builder->select('*');
            $builder->where('id_user', $_SESSION['id_usernya']);
            $query = $builder->get();
            return $query->getResult();
        }
        public function get_users_acara_by_id_user(){
            $builder = $this->users_acara;
            $builder->select('*');
            $builder->where('id_user', $_SESSION['id_usernya']);
            $query = $builder->get();
            return $query->getResult();
        }
        public function get_users_mempelai_by_id_user(){
            $builder = $this->users_mempelai;
            $builder->select('*');
            $builder->where('id_user', $_SESSION['id_usernya']);
            $query = $builder->get();
            return $query->getResult();
        }
        public function get_users_cerita_by_id_user(){
            $builder = $this->users_cerita;
            $builder->select('*');
            $builder->where('id_user', $_SESSION['id_usernya']);
            $query = $builder->get();
            return $query->getResult();
        }
        public function get_users_album_by_id_user(){
            $builder = $this->users_album;
            $builder->select('*');
            $builder->where('id_user', $_SESSION['id_usernya']);
            $query = $builder->get();
            return $query->getResult();
        }
        public function get_users_album_video_by_id_user(){
            $builder = $this->users_album_video;
            $builder->select('*');
            $builder->where('id_user', $_SESSION['id_usernya']);
            $query = $builder->get();
            return $query->getResult();
        }
        public function get_undangan_pengaturan_by_id_user($id_users){
            $builder = $this->undangan_pengaturan;
            $builder->select('*');
            $builder->where('id_user', $id_users);
            $query = $builder->get();
            return $query->getResult();
        }
        public function get_users_order_by_id_user(){
            $builder = $this->users_order;
            $builder->select('users_order.*,undangan_tema.nama_theme,undangan_tema.kode_theme');
            $builder->join('undangan_tema', 'undangan_tema.id = users_order.theme', 'left');
            $builder->where('users_order.id_user', $_SESSION['id_usernya']);
            $query = $builder->get();
            return $query->getResult();
        }
        public function get_users_order_musik(){
            $builder = $this->users_order;
            $builder->select('musik');
            $builder->where('id_user', $_SESSION['id_usernya']);
            $query = $builder->get();
            return $query->getResult();
        }
        public function get_all_undangan_musik(){
            $kueri =$this->undangan_musik;
            $kueri->select('musik_file');
            $kueri->OrderBy('musik_file', 'ASC');
            $ambil = $kueri->get();
            return $ambil->getResult();
        }
        public function get_users_upgrade_paket_by_id_user($id_users){
            $builder = $this->users_upgrade_paket;
            $builder->select('*');
            $builder->where('upgrade_paket_id_user', $id_users);
            $query = $builder->get();
            return $query->getResult();
        }
        public function get_users_order_pembayaran_by_id_user($id_users){
            if ($id_users ==''){
                $id_users = $_SESSION['id_usernya'];
            }else{
                $id_users =  $id_users;
            }
            $builder = $this->users_order_pembayaran;
            $builder->select('*');
            $builder->where('id_user', $id_users);
            $query = $builder->get();
            return $query->getResult();
        }
        public function update_user($data){
            $builder = $this->users;
            $builder->where('id', $_SESSION['id_usernya']);
            return $builder->update($data);
        }         
        public function save_users_cerita($data){
            return $this->users_cerita->insert($data);
        }
        public function update_users_album_video($data){
            $builder = $this->users_album_video;
            $builder->where('id_user', $_SESSION['id_usernya']);
            return $builder->update($data);
        }
        public function save_users_album($data){
            return $this->users_album->insert($data);
        }        
        public function update_users_acara($data){
            $builder = $this->users_acara;
            $builder->where('id_user', $_SESSION['id_usernya']);
            return $builder->update($data);
        }
        public function update_users_mempelai($data){
            $builder = $this->users_mempelai;
            $builder->where('id_user', $_SESSION['id_usernya']);
            return $builder->update($data);
        }
        public function update_musik($data){
            $builder = $this->users_order;
            $builder->where('id_user', $_SESSION['id_usernya']);
            return $builder->update($data);
        }
        public function update_fitur($data){
            $builder = $this->undangan_fitur;
            $builder->where('id_user', $_SESSION['id_usernya']);
            return $builder->update($data);
        }
        public function cek_domain($domain){
            $query = $this->users_order->where('domain', $domain)->get();
            return $query->getResult();
        }
        public function update_domain($domain){
            $builder = $this->users_order;
            $builder->set('domain', $domain);
            $builder->where('id_user', $_SESSION['id_usernya']);
            return $builder->update();
        }
        public function delete_users_album($data){ 
            $builder = $this->users_album;
            $builder->where($data);
            return $builder->delete();
        }
        public function hapus_users_cerita(){
            $builder = $this->users_cerita;
            $builder->where('id_user', $_SESSION['id_usernya']);
            return $builder->delete();
        }
        public function list_pengguna_hapus_user($id){
            $this->users_acara->where('id_user', $id)->delete(); 
            $this->users_album->where('id_user', $id)->delete();
            $this->users_album_video->where('id_user', $id)->delete();
            $this->users_cerita->where('id_user', $id)->delete();
            $this->users_doa_dan_ucapan->where('id_user', $id)->delete();
            $this->users_mempelai->where('id_user', $id)->delete();
            $this->users_order->where('id_user', $id)->delete();
            $this->users_order_pembayaran->where('id_user', $id)->delete();
            $this->users_pengunjung->where('id_user', $id)->delete();
            $this->users_testimoni->where('id_user', $id)->delete();
            $this->users_upgrade_paket->where('upgrade_paket_id_user', $id)->delete();
            $this->undangan_fitur->where('id_user', $id)->delete();
            $this->undangan_pengaturan->where('id_user', $id)->delete(); 
            return $this->users->where('id', $id)->delete();
        }

        /* ============ PEMBAYARAN PENGGUNA ============ */
        public function pembayaran_pengguna_konfirmasi_by_id($id){
            //update status users_order_pembayaran
            $builder = $this->users_order_pembayaran;
            $builder->set('status', '2');
            $builder->where('id_user', $id);
            $builder->update();
            //update stats website
            $builder2 = $this->users_order;
            $builder2->set('status', '2');
            $builder2->where('id_user', $id);
            return $builder2->update();
        }
        public function pembayaran_pengguna_konfirmasi_batal_by_id($id){
            //update status users_order_pembayaran
            $builder = $this->users_order_pembayaran;
            $builder->set('status', '3');
            $builder->where('id_user', $id);
            $builder->update();
            //update stats website
            $builder2 = $this->users_order;
            $builder2->set('status', '3');
            $builder2->where('id_user', $id);
            return $builder2->update();
        }

        /* ============ PERMINTAAN UPGRADE PAKET ============ */
        public function get_all_users_upgrade_paket(){
            $builder = $this->users_upgrade_paket; 
            $builder->select('users_upgrade_paket.*, users.username, users_order.domain, undangan_paket.*');
            $builder->join('users', 'users.id = users_upgrade_paket.upgrade_paket_id_user', 'left');
            $builder->join('users_order', 'users_order.id_user = users_upgrade_paket.upgrade_paket_id_user', 'left');
            $builder->join('undangan_paket', 'undangan_paket.paket_id = users_upgrade_paket.upgrade_paket_paket_diajukan', 'left');
             
            $query = $builder->get();
            return $query->getResult();
        } 
        public function update_permintaan_upgrade_paket_konfirmasi($paket_id_id_users){
            //Potong id
            $potong = explode("_",$paket_id_id_users);
            $upgrade_paket_id = $potong[0];
            $upgrade_paket_paket_diajukan = $potong[1];
            $id_user = $potong[2];
            //update status users_upgrade_paket
            $builder1 = $this->users_upgrade_paket;
            $builder1->set('upgrade_paket_status_konfirmasi', 'SUDAH');
            $builder1->where('upgrade_paket_id', $upgrade_paket_id);
            $builder1->update();
            //update paket_id di users_order
            $builder2 = $this->users_order;
            $builder2->set('paket_id', $upgrade_paket_paket_diajukan);
            $builder2->where('id_user', $id_user);
            $builder2->update();
            //update waktu pembayaran
            //Karena masa limit waktu dihitung mulai dari > users_order_pembayaran.updated_at <
            $waktuterbaru = date("Y-m-d H:i:s");
            $builder3 = $this->users_order_pembayaran;
            $builder3->set('updated_at', $waktuterbaru);
            $builder3->where('id_user', $id_user);
            return $builder3->update();
        }
        public function update_permintaan_upgrade_paket_batal_konfirmasi($paket_id_batal_id_users){
            //Potong id
            $potong = explode("_",$paket_id_batal_id_users);
            $upgrade_paket_id = $potong[0];
            $upgrade_paket_paket_sebelumnya = $potong[1];
            $id_user = $potong[2];
            //update status users_upgrade_paket
            $builder = $this->users_upgrade_paket;
            $builder->set('upgrade_paket_status_konfirmasi', 'BELUM');
            $builder->where('upgrade_paket_id', $upgrade_paket_id);
            $builder->update();
            //update paket_id di users_order
            $builder = $this->users_order;
            $builder->set('paket_id', $upgrade_paket_paket_sebelumnya);
            $builder->where('id_user', $id_user);
            return $builder->update();
        }

    /*---------------------------
        PENGATURAN UDO
    ----------------------------*/ 
        /* ============ PAKET UDO ============ */
        public function get_all_undangan_paket(){
            $kueri = $this->undangan_paket;
            $kueri->select('*'); 
            return $kueri->get()->getResult();
        }
        public function update_pengaturan_udo_undangan_paket($data, $paket_id){
            $kueri = $this->undangan_paket;
            $kueri->where('paket_id', $paket_id);
            return $kueri->update($data);
        }

    /*---------------------------
        PENGATURAN WEBSITE
    ----------------------------*/  
        /* ============ UMUM ============ */    
        public function update_pengaturan_website_umum_informasi_umum($data){
            $kueri = $this->website_umum;
            $kueri->set('website_isi', $data['JudulWebsite']);
            $where = "website_nama='Judul Website'";
            $kueri->where($where);
            $kueri->update();
            // 
            $kueri->set('website_isi', $data['TaglineWebsite']);
            $where = " website_nama='Tagline Website' ";
            $kueri->where($where);
            $kueri->update();
            // 
            $kueri->set('website_isi', $data['DeskripsiWebsite']);
            $where = " website_nama='Deskripsi Website' ";
            $kueri->where($where);
            $kueri->update();
            // 
            $kueri->set('website_isi', $data['KataKunci']);
            $where = " website_nama='Kata Kunci' ";
            $kueri->where($where);
            $kueri->update();
            // 
            $kueri->set('website_isi', $data['NamaPemilikWebsite']);
            $where = " website_nama='Nama Pemilik Website' ";
            $kueri->where($where);
            $kueri->update();
            // 
            $kueri->set('website_isi', $data['CreditsTahunMulai']);
            $where = " website_nama='Credits Tahun Mulai' ";
            $kueri->where($where);
            $kueri->update();
            // 
            $kueri->set('website_isi', $data['CreditsKeterangan']);
            $where = " website_nama='Credits Keterangan' ";
            $kueri->where($where);
            return $kueri->update();
        }
        public function update_pengaturan_website_umum_tema_website($data){
            $kueri = $this->website_umum;
            $kueri->set('website_isi', $data['TemaWebsite']);
            $where = " website_nama='Tema Website' ";
            $kueri->where($where); 
            $kueri->update();
            //
            $kueri = $this->website_umum;
            $kueri->set('website_isi', $data['TemaWebsiteTomboldiHome']);
            $where = " website_nama='Tema Website Tombol di Home' ";
            $kueri->where($where); 
            return $kueri->update();
        }
        public function update_pengaturan_website_umum_google_recaptcha($data){
            $kueri = $this->website_umum;
            
            // 
            $kueri->set('website_isi', $data['RecaptchaStatus']);
            $where = " website_nama='Recaptcha Status' ";
            $kueri->where($where);
            $kueri->update();
            // 
            $kueri->set('website_isi', $data['Recaptchadatasitekey']);
            $where = " website_nama='Recaptcha data-sitekey' ";
            $kueri->where($where);
            $kueri->update();
            // 
            $kueri->set('website_isi', $data['Recaptchasecretkey']);
            $where = " website_nama='Recaptcha secret_key' ";
            $kueri->where($where);
            return $kueri->update();
        }
        public function update_pengaturan_website_umum_media_sosial_share($data){
            $kueri = $this->website_umum;
            $kueri->set('website_isi', $data['IdFansPageFacebook']);
            $where = "website_nama='Id Fans Page Facebook'";
            $kueri->where($where);
            $kueri->update();
            // 
            $kueri->set('website_isi', $data['FacebookDomainVerifikasi']);
            $where = " website_nama='Facebook Domain Verifikasi' ";
            $kueri->where($where);
            $kueri->update();
            // 
            $kueri->set('website_isi', $data['FBShareJudul']);
            $where = " website_nama='FB Share Judul' ";
            $kueri->where($where);
            $kueri->update();
            // 
            $kueri->set('website_isi', $data['FBShareDeskripsi']);
            $where = " website_nama='FB Share Deskripsi' ";
            $kueri->where($where);
            return $kueri->update(); 
        }
        public function go_pengaturan_website_database_restore($admin_id){
            //Cek apakah admin yang lakukan restore ada didatabase
            $kueri = $this->admin;
            $kueri->select ('username');
            $kueri->where('username', $admin_id);
            $ketemu = $kueri->get()->getResult();
            if($ketemu>0){
                // Delete semua akun Admin dan buat default
                $kueri1 = $this->admin;
                $kueri1->TRUNCATE();  
                $dataAdminDefault = [   'id' => '1',
                                        'username' => 'admin',
                                        'password' => 'e534f289b4764bdbb904651e8c6a61b7',
                                        'email' => 'adm1ku2@gmail.com',
                                        'nama_lengkap' => 'Khairul Fikri',
                                        'no_hp' => '+6282173020446'
                                    ];
                $this->admin->insert($dataAdminDefault);
                
                // Delete semua data Bank dan buat default
                $kueri2 = $this->undangan_bank;
                $kueri2->TRUNCATE();  
                $dataBankDefault['0'] = [   'bank_id' => '1',
                                        'bank_id_pemilik' => '1',
                                        'bank_siapa' => 'ADMIN',
                                        'bank_nama' => 'BANK RAKYAT INDONESIA (BRI)',
                                        'bank_kode' => '002',
                                        'bank_nama_pemilik' => 'Khairul Fikri',
                                        'bank_nomor_rekening' => '3079-0101-5802-530'
                                    ];
                $dataBankDefault['1'] = [   
                                    'bank_id' => '2',
                                    'bank_id_pemilik' => '1',
                                    'bank_siapa' => 'PENGGUNA',
                                    'bank_nama' => 'BANK RAKYAT INDONESIA (BRI)',
                                    'bank_kode' => '002',
                                    'bank_nama_pemilik' => 'Ray',
                                    'bank_nomor_rekening' => '1111-1111-1111-111'
                                ]; 
                $dataBankDefault['2'] = [   
                                    'bank_id' => '3',
                                    'bank_id_pemilik' => '1',
                                    'bank_siapa' => 'PENGGUNA',
                                    'bank_nama' => 'BANK MUAMALAT',
                                    'bank_kode' => '147',
                                    'bank_nama_pemilik' => 'Ray',
                                    'bank_nomor_rekening' => '222-222-2222-22'
                                ];                                    
                $dataBankDefault['3'] = [   
                                    'bank_id' => '4',
                                    'bank_id_pemilik' => '1',
                                    'bank_siapa' => 'PENGGUNA',
                                    'bank_nama' => 'SHOPEE PAY',
                                    'bank_kode' => '',
                                    'bank_nama_pemilik' => 'Ray',
                                    'bank_nomor_rekening' => '+62821000044444'
                                ];
                $dataBankDefault['4'] = [   
                                    'bank_id' => '5',
                                    'bank_id_pemilik' => '1',
                                    'bank_siapa' => 'PENGGUNA',
                                    'bank_nama' => 'Go-PAY',
                                    'bank_kode' => '',
                                    'bank_nama_pemilik' => 'Ray',
                                    'bank_nomor_rekening' => '+62821000044444'
                                ];                                
    
                $f = 0;  
                $hitungdataBankDefault = count($dataBankDefault);                  
                while ($f < $hitungdataBankDefault){
                    $hasil = $this->undangan_bank->insert($dataBankDefault[$f]);
                    $f++;
                }  
            
                // Delete semua data Paket UDO dan buat default
                $kueri3 = $this->undangan_paket;
                $kueri3->TRUNCATE(); 
                $dataPaketUDODefault['0'] = [   
                                        'paket_id' => '1',
                                        'paket_id_turunannya' => '',
                                        'paket_nama' => 'Happy',
                                        'paket_keterangan' => 'Coba dan rasakan layanan seperti premium selama 7 hari',
                                        'paket_harga_normal' => '85000',
                                        'paket_harga_diskon' => '50000',
                                        'paket_limit_waktu' => '7',
                                        'paket_biaya_upgrade' => '0',
                                        'paket_status' => 'AKTIF'
                                    ];
                $dataPaketUDODefault['1'] = [   
                                        'paket_id' => '2',
                                        'paket_id_turunannya' => '1',
                                        'paket_nama' => 'Premium',
                                        'paket_keterangan' => 'Rasakan semua layanan Undangan Digital Online ini selama 30 hari.',
                                        'paket_harga_normal' => '100000',
                                        'paket_harga_diskon' => '75000',
                                        'paket_limit_waktu' => '30',
                                        'paket_biaya_upgrade' => '25000',
                                        'paket_status' => 'AKTIF'
                                    ];   
                $dataPaketUDODefault['2'] = [   
                                        'paket_id' => '3',
                                        'paket_id_turunannya' => '1,2',
                                        'paket_nama' => 'Unlimited',
                                        'paket_keterangan' => 'Semua fitur layanan Undangan Digital Online dimiliki tanpa batasan waktu.',
                                        'paket_harga_normal' => '145000',
                                        'paket_harga_diskon' => '100000',
                                        'paket_limit_waktu' => '0',
                                        'paket_biaya_upgrade' => '50000',
                                        'paket_status' => 'AKTIF'
                                    ]; 
                $a = 0;  
                $hitungdataPaketUDODefault = count($dataPaketUDODefault);                  
                while ($a < $hitungdataPaketUDODefault){
                    $hasil = $this->undangan_paket->insert($dataPaketUDODefault[$a]);
                    $a++;
                }                                                           
                
                // Delete semua data Sepatah Kata dan buat default
                $kueri4 = $this->undangan_sepatah_kata;
                $kueri4->TRUNCATE(); 
                $dataSepatahKataDefault['0'] = [   
                                        'sepatah_kata_id' => '1',
                                        'id_users' => '1',
                                        'sepatah_kata_pilihan' => '1',
                                        'sepatah_kata_halaman' => 'mempelai',
                                        'sepatah_kata_urutan' => '1',
                                        'sepatah_kata_isi' => 'Seindah-indahnya perhiasan adalah wanita sholihah dan semulia-mulianya laki-laki adalah yang memuliakan wanita, Ya Allah izinkanlah putra-putri kami untuk mengikuti sunnah Rosul-Mu'
                                    ];
                $dataSepatahKataDefault['1'] = [   
                                        'sepatah_kata_id' => '2',
                                        'id_users' => '1',
                                        'sepatah_kata_pilihan' => '1',
                                        'sepatah_kata_halaman' => 'acara',
                                        'sepatah_kata_urutan' => '1',
                                        'sepatah_kata_isi' => "Assalamu'alaikum warahmatullahi wabarakatuh <br/><br/>
    
                                        Dengan memohon Rahmat dan Ridho Allah SWT, kami mengundang Bapak/Ibu/Saudara/i untuk menghadiri resepsi pernikahan putra-putri kami, yang Insya Allah akan diselenggarakan pada :"
                                    ];
                $dataSepatahKataDefault['2'] = [   
                                        'sepatah_kata_id' => '3',
                                        'id_users' => '1',
                                        'sepatah_kata_pilihan' => '1',
                                        'sepatah_kata_halaman' => 'acara',
                                        'sepatah_kata_urutan' => '2',
                                        'sepatah_kata_isi' => "Merupakan suatu kehormatan dan kebahagian bagi kami apabila Bapak/IBu/Saudara/i berkenan hadir untuk memberikan do'a restu kepada kedua mempelai.
                                        <br/><br/>
                                        Atas kehadiran dan do'a restu Bapak/Ibu/Saudara/Saudari/i, kami ucapkan terima kasih.<br/><br/>
                                        Waassalamu'alaikum Warahmatullahi Wabarakatuh."
                                    ];
                $dataSepatahKataDefault['3'] = [   
                                        'sepatah_kata_id' => '4',
                                        'id_users' => '1',
                                        'sepatah_kata_pilihan' => '2',
                                        'sepatah_kata_halaman' => 'mempelai',
                                        'sepatah_kata_urutan' => '1',
                                        'sepatah_kata_isi' => "Assalamu'alaikum warahmatullahi wabarakatuh <br/> <br/> Dengan memohon Rahmat dan Ridho Allah SWT, kami akan menyelenggarakan resepsi pernikahan Putra-Putri kami :"
                                    ];
                $dataSepatahKataDefault['4'] = [   
                                        'sepatah_kata_id' => '5',
                                        'id_users' => '1',
                                        'sepatah_kata_pilihan' => '2',
                                        'sepatah_kata_halaman' => 'acara',
                                        'sepatah_kata_urutan' => '1',
                                        'sepatah_kata_isi' => ''
                                    ];
                $dataSepatahKataDefault['5'] = [   
                                        'sepatah_kata_id' => '6',
                                        'id_users' => '1',
                                        'sepatah_kata_pilihan' => '2',
                                        'sepatah_kata_halaman' => 'acara',
                                        'sepatah_kata_urutan' => '2',
                                        'sepatah_kata_isi' => ''
                                    ];
                $dataSepatahKataDefault['6'] = [   
                                        'sepatah_kata_id' => '7',
                                        'id_users' => '1',
                                        'sepatah_kata_pilihan' => '3',
                                        'sepatah_kata_halaman' => 'mempelai',
                                        'sepatah_kata_urutan' => '1',
                                        'sepatah_kata_isi' => 'Seindah-indahnya perhiasan adalah wanita sholihah dan semulia-mulianya laki-laki adalah yang memuliakan wanita, Ya Allah izinkanlah putra-putri kami untuk mengikuti sunnah Rosul-Mu'
                                    ];
                $dataSepatahKataDefault['7'] = [   
                                        'sepatah_kata_id' => '8',
                                        'id_users' => '1',
                                        'sepatah_kata_pilihan' => '3',
                                        'sepatah_kata_halaman' => 'acara',
                                        'sepatah_kata_urutan' => '1',
                                        'sepatah_kata_isi' => ''
                                    ];
                $dataSepatahKataDefault['8'] = [   
                                        'sepatah_kata_id' => '9',
                                        'id_users' => '1',
                                        'sepatah_kata_pilihan' => '3',
                                        'sepatah_kata_halaman' => 'acara',
                                        'sepatah_kata_urutan' => '2',
                                        'sepatah_kata_isi' => ''
                                    ];  
                $b = 0; 
                $hitungdataSepatahKataDefault = count($dataSepatahKataDefault);                   
                while ($b < $hitungdataSepatahKataDefault){
                    $hasil = $this->undangan_sepatah_kata->insert($dataSepatahKataDefault[$b]);
                    $b++;
                }                   
                                 
                // Delete semua akun pengguna dan buat akun demo
                // Terletak di cotroller
    
                // Restore Pengaturan Website Umum
                // Maslah Gambar ada di controler
                $kueri5 = $this->website_umum;
                $kueri5->TRUNCATE(); 
                $dataWebsiteUmumDefault['0'] = [   
                                        'website_id' => '1',
                                        'website_nama' => 'Judul Website',
                                        'website_isi' => 'Undangan Digital Online'
                                    ];
                $dataWebsiteUmumDefault['1'] = [   
                                        'website_id' => '2',
                                        'website_nama' => 'Tagline Website',
                                        'website_isi' => 'Undangan Pernikahan Digital Gratis'
                                    ];
                $dataWebsiteUmumDefault['2'] = [   
                                        'website_id' => '3',
                                        'website_nama' => 'Deskripsi Website',
                                        'website_isi' => 'Undangan pernikahan online gratis dengan pilihan desain yang menarik,buat dan bagikan undangan pernikahan kamu dengan berbagai pilihan tampilan undangan yang menarik dan pastinya gratis hanya di sini.'
                                    ];
                $dataWebsiteUmumDefault['3'] = [   
                                        'website_id' => '4',
                                        'website_nama' => 'Kata Kunci',
                                        'website_isi' => 'Website Wedding , template undangan pernikahan online , undannganonline, undangan online web free , undangan tunangan online , link undangan pernikahan , membuat undangan pernikahan online,buat undangan digital gratis, membuat undangan pernikahan online gratis ,website pernikahan online gratis, undangan web , akanikah , akan nikah , undangan online gratis , undangan nikah online , undangan online pernikahan , undangan online, website wedding free , undangan gratis , buat undangan online , buat undangan , undangan online free, undangan gratis, free website, akan nikah , website akanikah , akanikah website , akan nikah website, undangan digital , tema undangan pernikahan, tema undangan digital, undangan pernikahan digital gratis, undangan pernikahan murah'
                                    ];
                $dataWebsiteUmumDefault['4'] = [   
                                        'website_id' => '5',
                                        'website_nama' => 'Nama Pemilik Website',
                                        'website_isi' => 'Zonacerdas'
                                    ];
                $dataWebsiteUmumDefault['5'] = [   
                                        'website_id' => '6',
                                        'website_nama' => 'Id Fans Page Facebook',
                                        'website_isi' => ''
                                    ];    
                $dataWebsiteUmumDefault['6'] = [   
                                        'website_id' => '7',
                                        'website_nama' => 'Facebook Domain Verifikasi',
                                        'website_isi' => ''
                                    ];
                $dataWebsiteUmumDefault['7'] = [   
                                        'website_id' => '8',
                                        'website_nama' => 'FB Share Judul',
                                        'website_isi' => 'Undangan Pernikahan Digital Gratis'
                                    ];
                $dataWebsiteUmumDefault['8'] = [   
                                        'website_id' => '9',
                                        'website_nama' => 'FB Share Deskripsi',
                                        'website_isi' => 'Undangan pernikahan online gratis dengan pilihan desain yang menarik,buat dan bagikan undangan pernikahan kamu dengan berbagai pilihan tampilan undangan yang menarik dan pastinya gratis hanya di sini.'
                                    ];
                $dataWebsiteUmumDefault['9'] = [   
                                        'website_id' => '10',
                                        'website_nama' => 'FB Share Url',
                                        'website_isi' => ''
                                    ];
                $dataWebsiteUmumDefault['10'] = [   
                                        'website_id' => '11',
                                        'website_nama' => 'FB Share Gambar',
                                        'website_isi' => '/assets/base/img/thumbnails.png'
                                    ];
                $dataWebsiteUmumDefault['11'] = [   
                                        'website_id' => '12',
                                        'website_nama' => 'FB Share Gambar Lebar',
                                        'website_isi' => '851'
                                    ]; 
                $dataWebsiteUmumDefault['12'] = [   
                                        'website_id' => '13',
                                        'website_nama' => 'FB Share Gambar Tinggi',
                                        'website_isi' => '315'
                                    ];
                $dataWebsiteUmumDefault['13'] = [   
                                        'website_id' => '14',
                                        'website_nama' => 'Credits Tahun Mulai',
                                        'website_isi' => '2022'
                                    ];  
                $dataWebsiteUmumDefault['14'] = [   
                                        'website_id' => '15',
                                        'website_nama' => 'Credits Keterangan',
                                        'website_isi' => "under the management of <a href='https://www.zonacerdas.net' rel='dofollow' target='_blank'>Zonacerdas.</a>"
                                    ]; 
                $dataWebsiteUmumDefault['15'] = [   
                                        'website_id' => '16',
                                        'website_nama' => 'Tema Website',
                                        'website_isi' => 'Happy'
                                    ];   
                $dataWebsiteUmumDefault['16'] = [   
                                        'website_id' => '17',
                                        'website_nama' => 'Tema Website Tombol di Home                                    ',
                                        'website_isi' => 'Tidak Aktif'
                                    ]; 
                $dataWebsiteUmumDefault['17'] = [   
                                        'website_id' => '18',
                                        'website_nama' => 'Tema Website Yang Tersedia',
                                        'website_isi' => 'Biru,OlMop,Purple,Sunny,Happy'
                                    ];
                $dataWebsiteUmumDefault['18'] = [   
                                        'website_id' => '19',
                                        'website_nama' => '',
                                        'website_isi' => ''
                                    ];   
                $dataWebsiteUmumDefault['19'] = [   
                                        'website_id' => '20',
                                        'website_nama' => 'Recaptcha Status',
                                        'website_isi' => 'Tidak Aktif'
                                    ]; 
                $dataWebsiteUmumDefault['20'] = [   
                                        'website_id' => '21',
                                        'website_nama' => 'Recaptcha data-sitekey',
                                        'website_isi' => '6LdNxaEeAAAAADODTxhJOMYKn5hkRGZWM7XTPpQk'
                                    ];    
                $dataWebsiteUmumDefault['21'] = [   
                                        'website_id' => '22',
                                        'website_nama' => 'Recaptcha secret_key',
                                        'website_isi' => '6LdNxaEeAAAAAJajqS7y86-8oz1WtWwqMdLpL2si'
                                    ];                                     
                                  
                $c = 0;  
                $hitungdataWebsiteUmumDefault = count($dataWebsiteUmumDefault);               
                while ($c < $hitungdataWebsiteUmumDefault){
                    $hasil_c = $this->website_umum->insert($dataWebsiteUmumDefault[$c]);
                    $c++;
                }   
    
                //undangan_fitur
                //undangan_pengaturan
                //undangan_tema : TIDAK
    
                // Restore Pengaturan Website Widget
                $kueri6 = $this->website_widget;
                $kueri6->TRUNCATE(); 
                $dataWebsiteWidgetDefault['0'] = [   
                                        'widget_id' => '1',
                                        'widget_posisi' => 'home_footer_kiri',
                                        'widget_judul' => 'Tentang Kami',
                                        'widget_isi' => 'Website ini merupakan layanan jasa pembuatan Undangan Pernikahan Online yang dapat di kirim melalui Whatsapp. Kirim undangan pernikahan mudah, cepat dan irit biaya. Tersedia banyak model template undangan pernikahan yang dapat digunakan dengan mudah.'
                                    ];
                $dataWebsiteWidgetDefault['1'] = [   
                                        'widget_id' => '2',
                                        'widget_posisi' => 'home_footer_tengah',
                                        'widget_judul' => 'Undangan Pernikahan Digital',
                                        'widget_isi' => 'link'
                                    ];
                $dataWebsiteWidgetDefault['2'] = [   
                                        'widget_id' => '3',
                                        'widget_posisi' => 'home_footer_kanan',
                                        'widget_judul' => 'Kontak',
                                        'widget_isi' => 'link'
                                    ];
                $dataWebsiteWidgetDefault['3'] = [   
                                        'widget_id' => '4',
                                        'widget_posisi' => 'home_testimoni',
                                        'widget_judul' => 'Apa Kata Mereka?',
                                        'widget_isi' => ''
                                    ];
                $dataWebsiteWidgetDefault['4'] = [   
                                        'widget_id' => '5',
                                        'widget_posisi' => 'home_tema',
                                        'widget_judul' => 'Tema',
                                        'widget_isi' => 'Tersedia banyak pilihan tema undangan yang menarik untuk pernikahanmu...'
                                    ]; 
                $dataWebsiteWidgetDefault['5'] = [   
                                        'widget_id' => '6',
                                        'widget_posisi' => 'home_paket_udo',
                                        'widget_judul' => 'Harga',
                                        'widget_isi' => '<h2 class="judul">Harga Termurah!</h2><p class="lead subjudul">SELAMA PANDEMI, Dengan harga terjangkau anda sudah mendapatkan halaman website, manajemen tamu, cerita, komentar, peta lokasi, dan buku tamu digital!.</p>'
                                    ];
                $dataWebsiteWidgetDefault['6'] = [   
                                        'widget_id' => '7',
                                        'widget_posisi' => 'home_fitur',
                                        'widget_judul' => 'Fitur',
                                        'widget_isi' => ''
                                    ]; 
                $dataWebsiteWidgetDefault['7'] = [   
                                        'widget_id' => '8',
                                        'widget_posisi' => 'home_cover',
                                        'widget_judul' => '',
                                        'widget_isi' => 'Undangan pernikahan lebih hemat, praktis, dan kekinian dengan url undangan yang disebar otomatis untuk memberikan kesan terbaik.'
                                    ];                                                                                                                          
                $d = 0;        
                $hitungdataWebsiteWidgetDefault = count($dataWebsiteWidgetDefault);            
                while ($d < $hitungdataWebsiteWidgetDefault){
                    $hasil_d = $this->website_widget->insert($dataWebsiteWidgetDefault[$d]);
                    $d++;
                }  
                 
                // Restore Pengaturan Website Widget Links
                $kueri7 = $this->website_widget_links;
                $kueri7->TRUNCATE(); 
                $dataWebsiteWidgetLinksDefault['0'] = [  
                                        'widget_links_id' => '1', 
                                        'widget_id' => '2',
                                        'widget_links_icon' => 'fa-solid fa-cart-shopping',
                                        'widget_links_judul' => 'Buat Undangan',
                                        'widget_links_deskripsi' => '',
                                        'widget_links_url' => 'tema'
                                    ];
                $dataWebsiteWidgetLinksDefault['1'] = [   
                                        'widget_links_id' => '2', 
                                        'widget_id' => '2',
                                        'widget_links_icon' => 'fa-solid fa-right-to-bracket',
                                        'widget_links_judul' => 'Dashboard',
                                        'widget_links_deskripsi' => '',
                                        'widget_links_url' => 'login'
                                    ];
                $dataWebsiteWidgetLinksDefault['2'] = [   
                                        'widget_links_id' => '3', 
                                        'widget_id' => '2',
                                        'widget_links_icon' => 'fa-solid fa-map',
                                        'widget_links_judul' => 'Tutorial Map',
                                        'widget_links_deskripsi' => '',
                                        'widget_links_url' => 'maps'
                                    ]; 
                $dataWebsiteWidgetLinksDefault['3'] = [  
                                        'widget_links_id' => '4', 
                                        'widget_id' => '2',
                                        'widget_links_icon' => 'fa-brands fa-youtube',
                                        'widget_links_judul' => 'Tutorial Youtube',
                                        'widget_links_deskripsi' => '',
                                        'widget_links_url' => 'youtube'
                                    ];
                $dataWebsiteWidgetLinksDefault['4'] = [   
                                        'widget_links_id' => '5', 
                                        'widget_id' => '3',
                                        'widget_links_icon' => 'fa-brands fa-whatsapp',
                                        'widget_links_judul' => '+6282173020446',
                                        'widget_links_deskripsi' => '',
                                        'widget_links_url' => 'https://api.whatsapp.com/send?phone=+6282173020446&text=Halo%20Kak%20Fikri,%20saya%20mau%20tanya-tanya%20tentang%20Undangan%20Digital%20Online%20:D'
                                    ];
                $dataWebsiteWidgetLinksDefault['5'] = [   
                                        'widget_links_id' => '6', 
                                        'widget_id' => '3',
                                        'widget_links_icon' => 'fa-brands fa-instagram',
                                        'widget_links_judul' => 'Zonacerdas',
                                        'widget_links_deskripsi' => '',
                                        'widget_links_url' => 'https://www.instagram.com/zonacerdas'
                                    ]; 
                $dataWebsiteWidgetLinksDefault['6'] = [   
                                        'widget_links_id' => '7', 
                                        'widget_id' => '3',
                                        'widget_links_icon' => 'fa-brands fa-facebook-f',
                                        'widget_links_judul' => 'Zonacerdas',
                                        'widget_links_deskripsi' => '',
                                        'widget_links_url' => 'https://www.facebook.com/zonacerdas.net/'
                                    ];
                $dataWebsiteWidgetLinksDefault['7'] = [   
                                        'widget_links_id' => '8', 
                                        'widget_id' => '5',
                                        'widget_links_icon' => '',
                                        'widget_links_judul' => 'Lihat Semua',
                                        'widget_links_deskripsi' => '',
                                        'widget_links_url' => 'tema'
                                    ];
                $dataWebsiteWidgetLinksDefault['8'] = [   
                                        'widget_links_id' => '9', 
                                        'widget_id' => '6',
                                        'widget_links_icon' => '',
                                        'widget_links_judul' => 'Pesan Sekarang',
                                        'widget_links_deskripsi' => '',
                                        'widget_links_url' => 'tema'
                                    ];   
                $dataWebsiteWidgetLinksDefault['9'] = [   
                                        'widget_links_id' => '10', 
                                        'widget_id' => '7',
                                        'widget_links_icon' => 'assets/base/img/icons/gift.svg',
                                        'widget_links_judul' => 'Website Selalu Aktif',
                                        'widget_links_deskripsi' => 'Website yang cepat dan aman akan aktif tanpa ada batasan waktu.',
                                        'widget_links_url' => ''
                                    ];     
                $dataWebsiteWidgetLinksDefault['10'] = [   
                                        'widget_links_id' => '11', 
                                        'widget_id' => '7',
                                        'widget_links_icon' => 'assets/base/img/icons/cloud.svg',
                                        'widget_links_judul' => 'Ubah Tampilan',
                                        'widget_links_deskripsi' => 'Desain web dan undangan dapat kamu ubah sesuka hati sesuai keinginan.',
                                        'widget_links_url' => ''
                                    ];   
                $dataWebsiteWidgetLinksDefault['11'] = [   
                                        'widget_links_id' => '12', 
                                        'widget_id' => '7',
                                        'widget_links_icon' => 'assets/base/img/icons/map-pin.svg',
                                        'widget_links_judul' => "Do'a dan Ucapan",
                                        'widget_links_deskripsi' => 'Para tamu dapat memberikan doa dan ucapan langsung di profile website undanganmu.',
                                        'widget_links_url' => ''
                                    ];  
                $dataWebsiteWidgetLinksDefault['12'] = [   
                                        'widget_links_id' => '13', 
                                        'widget_id' => '7',
                                        'widget_links_icon' => 'assets/base/img/icons/layers.svg',
                                        'widget_links_judul' => 'Cerita',
                                        'widget_links_deskripsi' => 'Tuangkan cerita perjalanan cinta anda kepada tamu undangan.',
                                        'widget_links_url' => ''
                                    ];     
                $dataWebsiteWidgetLinksDefault['13'] = [   
                                        'widget_links_id' => '14', 
                                        'widget_id' => '7',
                                        'widget_links_icon' => 'assets/base/img/icons/life-buoy.svg',
                                        'widget_links_judul' => 'Layar Sapa',
                                        'widget_links_deskripsi' => 'Setiap tamu yang hadir dapat disapa saat menerima undangan.',
                                        'widget_links_url' => ''
                                    ];   
                $dataWebsiteWidgetLinksDefault['14'] = [   
                                        'widget_links_id' => '15', 
                                        'widget_id' => '7',
                                        'widget_links_icon' => 'assets/base/img/icons/layout.svg',
                                        'widget_links_judul' => 'Kirim Undangan',
                                        'widget_links_deskripsi' => 'Kamu bisa menggunakan WhatsApp untuk mengirimkan undangan.',
                                        'widget_links_url' => ''
                                    ]; 
                $dataWebsiteWidgetLinksDefault['15'] = [   
                                        'widget_links_id' => '16', 
                                        'widget_id' => '8',
                                        'widget_links_icon' => '',
                                        'widget_links_judul' => 'Buat Undangan',
                                        'widget_links_deskripsi' => '',
                                        'widget_links_url' => 'order'
                                    ];
                $dataWebsiteWidgetLinksDefault['16'] = [   
                                        'widget_links_id' => '17', 
                                        'widget_id' => '8',
                                        'widget_links_icon' => '',
                                        'widget_links_judul' => 'Lihat Demo',
                                        'widget_links_deskripsi' => '',
                                        'widget_links_url' => 'tema'
                                    ];                                                                                                                                                                            
                $e = 0;
                $hitungdataWebsiteWidgetLinksDefault= count($dataWebsiteWidgetLinksDefault) ;                   
                while ($e < $hitungdataWebsiteWidgetLinksDefault){
                    $hasil_e = $this->website_widget_links->insert($dataWebsiteWidgetLinksDefault[$e]);
                    $e++;
                }  
                return $hasil_e;
                
            } 
        }
        public function get_all_website_widget_posisi($posisinya){
            $kueri = $this->website_widget;
            $kueri->select('*'); 
            $kueri->where('widget_posisi', $posisinya);
            return $kueri->get()->getResult();
        } 

        /* ============ WIDGET ============ */
        public function update_pengaturan_website_widget($data, $widget_id){
            $kueri = $this->website_widget;
            $kueri->where('widget_id', $widget_id);
            return $kueri->update($data);
        }
        public function get_all_website_widget_links($widget_id){
            $kueri = $this->website_widget_links;
            $kueri->select('*'); 
            $kueri->where('widget_id', $widget_id);
            return $kueri->get()->getResult();
        } 
        public function update_pengaturan_website_widget_links($data, $link_id){
            $kueri = $this->website_widget_links;
            $kueri->where('widget_links_id', $link_id);
            return $kueri->update($data);
        }

        /* ============ BANK ADMIN ============ */
        public function get_undangan_bank_by_id($id){
            $builder = $this->undangan_bank;
            $builder->select('*');
            $builder->where('bank_id_pemilik', $id);
            $query = $builder->get();
            return $query->getResult();
        }
        public function update_undangan_bank($data){
            $builder = $this->undangan_bank;
            $builder->where('bank_id', $data['bank_id']);
            return $builder->update($data);
        }

        /* ============ DATABASE ============ */
        public function get_id_usersKecuali($id_usersKecuali){
            $builder = $this->users;
            $builder->select('id');
            $kondisi = " id != '".$id_usersKecuali."' ";
            $builder->where($kondisi);
            $query = $builder->get();
            return $query->getResult();
        } 


    /*
    public function get_total_users_pengunjung(){ 
        $builder = $this->users_pengunjung;
        $builder->selectCount('id');
        $where = "id_user=".$_SESSION['id_usernya'];
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult()[0]->id;
    }

    public function get_total_users_pengunjung_today(){
        $builder = $this->users_pengunjung;
        $builder->selectCount('id');
        $where = "date(created_at) = CURDATE() AND id_user=".$_SESSION['id_usernya'];
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult()[0]->id;
    }

    public function get_total_users_doa_dan_ucapan(){
        $builder = $this->users_doa_dan_ucapan;
        $builder->selectCount('id');
        $where = "id_user=".$_SESSION['id_usernya'];
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult()[0]->id;
    }

    public function get_total_users_doa_dan_ucapan_today(){
        $builder = $this->users_doa_dan_ucapan;
        $builder->selectCount('id');
        $where = "date(created_at) = CURDATE() AND id_user=".$_SESSION['id_usernya'];
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult()[0]->id;
    }

    public function get_total_users_pengunjung_mingguan(){
        $builder = $this->users_pengunjung;
        $builder->select("DAY(created_at) as tanggal, COUNT(id) as jumlah", true);
        $where = "(created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)) AND id_user=".$_SESSION['id_usernya'];
        $builder->groupBy("DAY(created_at)");
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult();
    }

    public function get_all_users_doa_dan_ucapan(){
        $builder = $this->users_doa_dan_ucapan;
        $builder->select('*'); 
        $builder->orderBy('created_at', 'DESC'); 
        $where = "id_user=".$_SESSION['id_usernya'];
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult();
    }

    public function get_all_users_pengunjung(){
        $builder = $this->users_pengunjung;
        $builder->select('nama_pengunjung, created_at'); 
        $builder->orderBy('created_at', 'DESC');
        $where = "id_user=".$_SESSION['id_usernya'];
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult();
    }

    public function delete_users_doa_dan_ucapan_by_id($id){
        $builder = $this->users_doa_dan_ucapan;
        $builder->where('id', $id);
        return $builder->delete();
    }

    //mengambil semua data pada table undangan_tema
    public function get_all_undangan_tema(){
        return $this->undangan_tema->get();
    }

    public function update_tema($data){
        $builder = $this->users_order;
        $builder->where('id_user', $_SESSION['id_usernya']);
        return $builder->update($data);
    } 
    public function get_user($data){
        $builder = $this->users;
        $builder->where($data);
        $query = $builder->get();
        return $query->getResult();
    }

    public function update_users_order_pembayaran($data,$invoice){
        $builder = $this->users_order_pembayaran;
        $builder->where('invoice', $invoice);
        return $builder->update($data);
    }*/ 
}