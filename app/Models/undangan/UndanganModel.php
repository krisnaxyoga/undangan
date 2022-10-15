<?php namespace App\Models\undangan;

use CodeIgniter\Model;

class UndanganModel extends Model
{
    //mendefinisikan variable agar bisa digunakan
	//secara global
    protected $users_acara,$users_cerita,$undangan_pengaturan,$undangan_sepatah_kata,$komen,$users_mempelai,$users_order,$undangan_fitur,$undangan_tema,$users,$users_album;

    public function __construct() {

        parent::__construct(); 
        $db      = \Config\Database::connect();
        
        //mengisi variable global dengan data
        //untuk meload tabel
        //::: WEBSITE
        $this->website_umum = $db->table('website_umum');

        $this->users = $db->table('users');
        $this->users_album = $db->table('users_album');
        $this->users_album_video = $db->table('users_album_video');
        $this->users_pengunjung = $db->table('users_pengunjung');
        $this->users_acara = $db->table('users_acara');
        $this->users_cerita = $db->table('users_cerita'); 
        $this->users_doa_dan_ucapan = $db->table('users_doa_dan_ucapan');
        $this->users_mempelai = $db->table('users_mempelai');
        $this->users_order = $db->table('users_order');
        $this->users_order_pembayaran = $db->table('users_order_pembayaran');

        $this->undangan_pengaturan = $db->table('undangan_pengaturan');
        $this->undangan_sepatah_kata = $db->table('undangan_sepatah_kata');
        $this->undangan_bank = $db->table('undangan_bank');
        $this->undangan_fitur = $db->table('undangan_fitur');
        $this->undangan_tema = $db->table('undangan_tema');
 
        
        
   
    }

    /*---------------------------
        WEBSITE
    ----------------------------*/
    public function get_all_website_umum(){
        $kueri = $this->website_umum;
        $kueri->select('*');
        $kueri->orderBy('website_id', 'ASC');
        return $kueri->get()->getResult();
    }

    /*---------------------------
        CEK DOMAIN
    ----------------------------*/

    /*---------------------------
        CEK PEMBAYARAN AKUN
    ----------------------------*/

    /*---------------------------
        CEK LIMIT WAKTU AKUN
    ----------------------------*/
    //Update Tabel users_order buat status menjadi = 3 (Masa Aktif Habis)
    public function update_status_users_order_pembayaran($data_users_order_pembayaran, $idnya){
        $kueri = $this->users_order_pembayaran;
        $kueri->where('id_user', $idnya);
        return $kueri->update($data_users_order_pembayaran);
    }
    //Update Tabel users_order_pembayaran buat status menjadi = 3 (Masa Aktif Habis)
    public function update_status_users_order($data_users_order, $idnya){
        $kueri = $this->users_order;
        $kueri->where('id_user', $idnya);
        return $kueri->update($data_users_order);
    }

    /*---------------------------
        TAMPILKAN UNDANGAN
    ----------------------------*/







































    //mengambil data user
    public function get_users()
    {
        return $this->users->get()->getResultArray();
    }

    //untuk mengecek domain
    //dan mengambil domain sesuai dengan data(domain) yang dikirim
    public function cek_domain($domain)
    {
        return $this->users_order->where('domain', $domain)->get();
    }

    //mengambil data users_mempelai sesuai dengan data(id_user) yang dikirim
    public function get_users_mempelai($id){
        return $this->users_mempelai->where('id_user', $id)->get();
    }

    //mengambil data users_acara sesuai dengan data(id_user) yang dikirim
    public function get_users_acara($id){
        return $this->users_acara->where('id_user', $id)->get();
    }

    //::: DOA DAN UCAPAN ::: 
    //mengambil data komen sesuai dengan data(id_user) yang dikirim
    public function get_users_doa_dan_ucapan($id){
        //return $this->users_doa_dan_ucapan->where('id_user', $id)->get()->getResultArray();

        $builder = $this->users_doa_dan_ucapan;
        $builder->select('*'); 
        $builder->orderBy('created_at', 'DESC'); 
        $where = "id_user=".$id;
        $builder->where($where);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function add_users_doa_dan_ucapan($data){
    	return $this->users_doa_dan_ucapan->insert($data); 
    } 


    //mengambil undangan_pengaturan sesuai dengan data(id_user) yang dikirim
    public function get_pengaturan($id){
        return $this->undangan_pengaturan->where('id_user', $id)->get();
    }

    //mengambil sepatah kata sesuai milik id_user yang dikirim
    public function get_sepatah_kata($id){
        return $this->undangan_sepatah_kata->where('sepatah_kata_pilihan', $id)->get();
    }

    //mengambil data users_cerita sesuai dengan data(id_user) yang dikirim
    public function get_users_cerita($id){
        return $this->users_cerita->where('id_user', $id)->get()->getResultArray();
    }

    //mengambil data users_album dengan data(id_user) yang dikirim
    public function get_users_album($id){
        return $this->users_album->where('id_user', $id)->get()->getResultArray();
    }

    //mengambil data users_album_video dengan data(id_user) yang dikirim
    public function get_users_album_video($id){
        return $this->users_album_video->where('id_user', $id)->get()->getResult(); 
    }

    //mengambil data undangan_fitur sesuai dengan data(id_user) yang dikirim
    public function get_undangan_fitur($id){
        return $this->undangan_fitur->where('id_user', $id)->get();
    }

    //mengambil data order sesuai dengan data(id_user) yang dikirim
    public function get_users_order_theme($id){
        $builder = $this->users_order;
        $builder->select('*');
        $builder->join('undangan_tema', 'undangan_tema.id = users_order.theme', 'left');
        $builder->where('users_order.id_user', $id);
        return $builder->get();
    }

    //mengambil data status users_order_pembayaran user dengan data(id=user) yang dikirim
    public function get_status_users_order_pembayaran($id){
        $builder2 = $this->db->table('users_order_pembayaran');
        $builder2->select('status'); 
        $builder2->where('id_user', $id);
        return $builder2->get();
    }

    public function get_all_undangan_tema(){
        return $this->undangan_etma->get();
    }
 
    public function cek_undangan_tema($kode){
        return $this->undangan_tema->where('kode_theme', $kode)->get();
    }

    public function get_users_order_musik($id){
        $builder2 = $this->users_order;
        $builder2->select('musik'); 
        $builder2->where('id_user', $id);
        return $builder2->get()->getResult();
    }
    
    public function insert_traffic($data){
    	return $this->users_pengunjung->insert($data);
    }

    public function get_limit_waktu($id_user){
    	$builder = $this->users_order;
		$builder->select('users_order.id as users_order_id, undangan_paket.paket_id as paket_id, users_order_pembayaran.paket_limit_waktu_saat_itu as paket_limit_waktu, users_order_pembayaran.updated_at as waktupembayaran'); 
		$builder->join('undangan_paket', 'users_order.paket_id = undangan_paket.paket_id', 'left'); 
        $builder->join('users_order_pembayaran', 'users_order.id_user = users_order_pembayaran.id_user', 'left'); 
		$builder->where('users_order.id_user', $id_user);
    	return $builder->get()->getResult();

    }

    //::: FITUR WEBSITE :::
        //::: Bingkisan :::
        public function get_all_undangan_bank_by_siapa($id, $siapa){  
            $builder = $this->undangan_bank;
            $builder->where('bank_id_pemilik', $id);
            $builder->where('bank_siapa', $siapa);
            $query = $builder->get();
            return $query->getResult();
        }
    
} 