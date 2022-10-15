<?php namespace App\Models\base;

use CodeIgniter\Model;

class BerandaModel extends Model
{
    protected $undangan_tema;

    public function __construct() {

        parent::__construct();
        $db      = \Config\Database::connect(); 

        $this->website_umum = $db->table('website_umum');
        $this->website_widget = $db->table('website_widget');
        $this->website_widget_links = $db->table('website_widget_links');

        $this->undangan_tema = $db->table('undangan_tema'); 
        $this->undangan_paket = $db->table('undangan_paket');
        $this->undangan_pengaturan = $db->table('undangan_pengaturan');
        $this->undangan_sepatah_kata = $db->table('undangan_sepatah_kata'); 
        $this->undangan_fitur = $db->table('undangan_fitur');  
        $this->undangan_bank = $db->table('undangan_bank');  

        $this->users = $db->table('users');
        $this->users_acara = $db->table('users_acara');
        $this->users_cerita = $db->table('users_cerita');
        $this->users_doa_dan_ucapan = $db->table('users_doa_dan_ucapan');
        $this->users_order = $db->table('users_order');
        $this->users_mempelai = $db->table('users_mempelai');
        $this->users_album = $db->table('users_album');
        $this->users_album_video = $db->table('users_album_video');
        $this->users_testimoni = $db->table('users_testimoni');

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
    public function update_pengaturan_website_umum_tema_website($data){
        $kueri = $this->website_umum;
        $kueri->set('website_isi', $data['TemaWebsite']);
        $where = " website_nama='Tema Website' ";
        $kueri->where($where); 
        return $kueri->update();
    }

    /*---------------------------
        FITUR
    ----------------------------*/
    public function get_undangan_fitur($id){
        return $this->undangan_fitur->where('id_user', $id)->get();
    }

    /*---------------------------
        PAKET UDO
    ----------------------------*/
    public function get_all_undangan_paket(){
        return $this->undangan_paket->get();
    }
    public function get_paket_nama_by_id($paket_id){
        $builder = $this->undangan_paket;
        $builder->select('paket_nama');   
        $builder->where('paket_id',$paket_id);
        return $query = $builder->get()->getResult() ;
    }

    /*---------------------------
        TEMA
    ----------------------------*/
    public function get_all_undangan_tema(){ 
        $builder = $this->undangan_tema;
		$builder->select('undangan_tema.*,
                            undangan_paket.paket_nama
                            '); 
		$builder->join('undangan_paket', 'undangan_paket.paket_id = undangan_tema.paket_id', 'left');  
        $builder->orderBy('paket_id', 'RANDOM');  
    	return $builder->get();
    }
    public function get_undangan_tema_by_name($nama){
        $query = $this->undangan_tema->where('nama_theme', $nama)->get();
        return $query->getResult();
    }
    public function get_count_undangan_tema_by_paket_id($paket_id){
        $builder = $this->undangan_tema;
        $builder->select(' count(paket_id) as jumlahtemapaketini');
        $builder->where('paket_id',$paket_id);
        return $query = $builder->get()->getResult();
    }

    /*---------------------------
        TESTIMONI
    ----------------------------*/
    public function get_all_users_testimoni(){ 
        $builder = $this->users_testimoni;
		$builder->select('users_testimoni.testimoni_isi as testimoni_isi, 
                            users_testimoni.testimoni_rating as testimoni_rating,
                            users_testimoni.update_at as testimoni_tanggal,
                            users_mempelai.nama_panggilan_pria as nama_panggilan_pria,
                            users_mempelai.nama_panggilan_wanita as nama_panggilan_wanita,
                            undangan_pengaturan.kunci as kunci
                            '); 
		$builder->join('users_mempelai', 'users_mempelai.id_user = users_testimoni.id_user', 'left');  
        $builder->join('users_order_pembayaran', 'users_order_pembayaran.id_user = users_testimoni.id_user', 'left');
        $builder->join('undangan_pengaturan', 'undangan_pengaturan.id_user = users_testimoni.id_user', 'left');
        $builder->where(" users_order_pembayaran.status!='0' or users_order_pembayaran.status!='1' ");
        $builder->where(" users_testimoni.testimoni_status='Aktif' ");
        $builder->orderBy('testimoni_tanggal','DESC');
    	return $builder->get();
    }

    
    /*---------------------------
        DEMO
    ----------------------------*/

    /* ============ UNDANGAN_PENGATURAN ============ */
    public function get_undangan_pengaturan($id){
        return $this->undangan_pengaturan->where('id_user', $id)->get();
    }

    /* ============ UNDANGAN_SEPATAH_KATA ============ */
    public function get_sepatah_kata($id){
        return $this->undangan_sepatah_kata->where('sepatah_kata_pilihan', $id)->get();
    }

    /* ============ USERS ============ */ 
    public function get_users(){
        return $this->users->get()->getResultArray();
    }

    /* ============ USERS_MEMPELAI ============ */ 
    public function get_users_mempelai($id){
        return $this->users_mempelai->where('id_user', $id)->get();
    }

    /* ============ USERS_ACARA ============ */
    public function get_users_acara($id){
        return $this->users_acara->where('id_user', $id)->get();
    }
 
    /* ============ USERS_DOA_DAN_UCAPAN ============ */ 
    public function get_users_doa_dan_ucapan($id){ 
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

    /* ============ USERS_CERITA ============ */
    public function get_users_cerita($id){
        return $this->users_cerita->where('id_user', $id)->get()->getResultArray();
    }

    /* ============ USERS_ALBUM ============ */
    public function get_users_album($id){
        return $this->users_album->where('id_user', $id)->get()->getResultArray();
    }

    /* ============ USERS_ALBUM_VIDEO ============ */ 
    public function get_users_album_video($id){
        return $this->users_album_video->where('id_user', $id)->get()->getResult();
    }

    /* ============ USERS_ORDER ============ */  
    public function get_users_order_musik($id){  
        $builder = $this->users_order;
        $builder->select('musik');
        $builder->where('id_user', $id);
        $query = $builder->get();
        return $query->getResult();
    }

    /* ============ UNDANGAN_BANK ============ */
    public function get_all_undangan_bank_by_siapa($id, $siapa){  
        $builder = $this->undangan_bank;
        $builder->where('bank_id_pemilik', $id);
        $builder->where('bank_siapa', $siapa);
        $query = $builder->get();
        return $query->getResult();
    } 

    
 
     
        
} 