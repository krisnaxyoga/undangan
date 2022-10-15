<?php namespace App\Models\base;

use CodeIgniter\Model;

class OrderModel extends Model
{

	protected $users_acara,$users_cerita,$data,$komen,$maps,$users_mempelai,$users_order,$undangan_fitur,$undangan_tema,$users,$users_album;

	public function __construct() {

        parent::__construct();
        $db      = \Config\Database::connect();
        //::: WEBSITE ::: 
        $this->website_umum = $db->table('website_umum');
        $this->website_widget = $db->table('website_widget');
        $this->website_widget_links = $db->table('website_widget_links');

        $this->users_acara = $db->table('users_acara');
        $this->users_cerita = $db->table('users_cerita');
        $this->data = $db->table('undangan_pengaturan');
 
        $this->undangan_paket = $db->table('undangan_paket');    

        $this->komen = $db->table('komen');
        $this->maps = $db->table('maps');
        $this->users_mempelai = $db->table('users_mempelai');
        $this->users_order = $db->table('users_order');
        $this->undangan_fitur = $db->table('undangan_fitur');
        $this->undangan_tema = $db->table('undangan_tema');
        $this->users = $db->table('users');
        $this->users_album = $db->table('users_album');
        $this->users_album_video = $db->table('users_album_video');

        $this->users_order_pembayaran = $db->table('users_order_pembayaran'); 
        $this->undangan_paket = $db->table('undangan_paket'); 
        
 
    }

    //WEBSITE
    public function get_all_website_umum(){
        $kueri = $this->website_umum;
        $kueri->select('*');
        $kueri->orderBy('website_id', 'ASC');
        return $kueri->get()->getResult();
    }
    public function get_all_website_widget_posisi($posisinya){
        $kueri = $this->website_widget;
        $kueri->select('*'); 
        $kueri->where('widget_posisi', $posisinya);
        return $kueri->get()->getResult();
    } 
    public function get_all_website_widget_links($widget_id){
        $kueri = $this->website_widget_links;
        $kueri->select('*'); 
        $kueri->where('widget_id', $widget_id);
        return $kueri->get()->getResult();
    } 

    //ambil data UNDANGAN PAKET
	public function get_undangan_paket_aktif()
    {
        return $this->undangan_paket->where('paket_status', 'AKTIF')->get();
    }	

    //untuk mengecek domain
    //dan mengambil domain sesuai dengan data(domain) yang dikirim
    public function cek_domain($domain)
    {
        return $this->users_order->where('domain', $domain)->get();
    }


    public function cek_undangan_tema($kode){
        return $this->undangan_tema->where('kode_theme', $kode)->get();
    }

    public function cek_order($kode){
    	$builder = $this->db->table('undangan_pengaturan');
		$builder->select('*,users_order_pembayaran.status as statusPembayaran, users_order.status as statusWeb'); 
		$builder->join('users', 'users.id = undangan_pengaturan.id_user', 'left');
		$builder->join('users_order', 'users.id = users_order.id_user', 'left');
		$builder->join('users_order_pembayaran', 'users.id = users_order_pembayaran.id_user', 'left');
		$builder->where('undangan_pengaturan.kunci', $kode);
    	return $builder->get();

    }

     public function cek_order_domain($domain){
        // $db  = \Config\Database::connect();
        $builder = $this->db->table('undangan_pengaturan');
        $builder->select('*');
        $builder->join('users', 'users.id = undangan_pengaturan.id_user', 'left');
        $builder->join('users_order', 'users.id = users_order.id_user', 'left');
        $builder->where('users_order.domain', $domain);
        return $builder->get();

    }

    public function update_kode($kode,$id){
        $builder = $this->db->table('users');
        $builder->set('id_unik',$kode);
        $builder->where('id',$id);
        return $builder->update();
    }

    public function cek_email($email)
    {
        return $this->users->where('email', $email)->get();
    }

    public function save_user($data){

    	return $this->users->insert($data);

    }

    public function save_users_mempelai($data){

    	return $this->users_mempelai->insert($data);

    }

    public function save_order($data){

    	return $this->users_order->insert($data);

    }

    public function save_users_acara($data){

    	return $this->users_acara->insert($data);

    }

    public function save_users_cerita($data){

    	return $this->users_cerita->insert($data);

    }

    public function save_users_album($data){

    	return $this->users_album->insert($data);

    }

    public function save_users_album_video($data){

    	return $this->users_album_video->insert($data);

    }

    public function save_data($data){

    	return $this->data->insert($data);

    }


    public function save_undangan_fitur($data){
 
    	return $this->undangan_fitur->insert($data);

    }

    public function biaya_paket_saat_itu($paket_id){
        $builder = $this->undangan_paket;
        $builder->select('paket_harga_diskon'); 
        $builder->where('paket_id', $paket_id);
        return $builder->get();

    } 
    public function paket_limit_waktu_saat_itu($paket_id){
        $builder = $this->undangan_paket;
        $builder->select('paket_limit_waktu'); 
        $builder->where('paket_id', $paket_id);
        return $builder->get();

    } 

    public function save_users_order_pembayaran($data){

    	return $this->users_order_pembayaran->insert($data);

    }

    public function get_admin_no_hp() {
        $builder = $this->db->table('admin');
        $builder->select('no_hp'); 
        $builder->where('id', '1');
        return $builder->get();
    }

    
}
