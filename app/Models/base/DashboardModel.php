<?php namespace App\Models\base;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    public function __construct() {

        //disini untuk mengetahui usernya kita pake seession id biar lebih mudah

        parent::__construct();
        $db  = \Config\Database::connect(); 
        //::: SISTEM
        $this->sistem = $db->table('sistem');
        //::: WEBSITE ::: 
        $this->website_umum = $db->table('website_umum');
        $this->users_pengunjung = $db->table('users_pengunjung'); 
        //::: DASHBOARD ::: 
        $this->admin = $db->table('admin'); 
        $this->users_doa_dan_ucapan = $db->table('users_doa_dan_ucapan'); 

        $this->undangan_tema = $db->table('undangan_tema');   
        $this->undangan_paket = $db->table('undangan_paket');   
        $this->undangan_fitur = $db->table('undangan_fitur');  
        $this->undangan_musik = $db->table('undangan_musik');
        $this->undangan_pengaturan = $db->table('undangan_pengaturan'); 
        $this->undangan_bank = $db->table('undangan_bank'); 
        $this->users_acara = $db->table('users_acara'); 
        $this->users_album = $db->table('users_album'); 
        $this->users_album_video = $db->table('users_album_video'); 
        $this->users_cerita = $db->table('users_cerita');  
        $this->users = $db->table('users');  
        $this->users_order = $db->table('users_order'); 
        $this->users_order_pembayaran = $db->table('users_order_pembayaran'); 
        $this->users_mempelai = $db->table('users_mempelai'); 
        $this->users_testimoni = $db->table('users_testimoni'); 

        $this->users_upgrade_paket = $db->table('users_upgrade_paket'); 
        $this->session = session();

    }

    //::: SISTEM
    public function get_sistem_versi(){
        $kueri = $this->sistem;
        $kueri->select('sistem_versi,sistem_tgl_rilis');
        $kueri->orderBy('sistem_tgl_rilis','DESC') ;
        return $kueri->get()->getResult()[0]->sistem_versi;
    }

    /*---------------------------
        DIPAKAI BERSAMA
    ----------------------------*/
    public function get_no_hp_admin(){
        $kueri = $this->admin;
        $kueri->select('no_hp'); 
        return $kueri->get()->getResult()[0]->no_hp;
    }

    /*---------------------------
        DASHBOARD
    ----------------------------*/
    public function get_all_website_umum(){
        $kueri = $this->website_umum;
        $kueri->select('*');
        $kueri->orderBy('website_id', 'ASC');
        return $kueri->get()->getResult();
    }
    
    public function get_total_users_pengunjung(){
        $builder = $this->users_pengunjung;
        $builder->selectCount('id');
        $where = "id_user=".$_SESSION['id'];
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult()[0]->id;
    }
 
    public function get_total_users_pengunjung_today(){
        $builder = $this->users_pengunjung;
        $builder->selectCount('id');
        $where = "date(created_at) = CURDATE() AND id_user=".$_SESSION['id'];
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult()[0]->id;
    }
    

    /*---------------------------
        TAMPILAN
    ----------------------------*/
    public function update_tema($data){
        $builder = $this->users_order;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->update($data);
    } 
    public function get_undangan_tema_by_id($id_user){
        $builder = $this->undangan_tema;
		$builder->select('undangan_tema.*, undangan_paket.paket_nama'); 
		$builder->join('undangan_paket', 'undangan_paket.paket_id = undangan_tema.paket_id', 'left');
        $builder->join('users_order', 'users_order.paket_id = undangan_tema.paket_id', 'left'); 
        $builder->where('id_user', $id_user); 
        $builder->orderBy('RAND()');    
    	return $builder->get();
    }
    public function get_undangan_tema_by_selain_paket_id($paket_id){
        $builder = $this->undangan_tema;
		$builder->select('undangan_tema.*, undangan_paket.paket_nama'); 
		$builder->join('undangan_paket', 'undangan_paket.paket_id = undangan_tema.paket_id', 'left');
        $builder->where('undangan_paket.paket_id !=', $paket_id); 
        $builder->orderBy('paket_id', 'ASC');   
    	return $builder->get();
    }


    /*---------------------------
        PENGATURAN
    ----------------------------*/

    /* ============ PENGATURAN UNDANGAN ============ */
    public function cek_domain($domain){
        $query = $this->users_order->where('domain', $domain)->get();
        return $query->getResult();
    }
    public function update_domain($data){ 
        $builder = $this->users_order;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->update($data);
    }

    /* ============ SEPATAH KATA ============ */
    public function get_sepatah_kata_pilihan_by_id_user(){
        $builder = $this->undangan_pengaturan;
        $builder->select('sepatah_kata_pilihan,kunci');
        $builder->where('id_user', $_SESSION['id']); 
        $query = $builder->get();
        return $query->getResult();
    }
    public function update_sepatah_kata($data){
        $builder = $this->undangan_pengaturan;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->update($data);
    }

    /* ============ FITUR UNDANGAN ============ */
    public function get_fitur_by_id_user(){
        $builder = $this->undangan_fitur;
        $builder->select('*');
        $builder->where('id_user', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }
    public function update_fitur($data){
        $builder = $this->undangan_fitur;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->update($data);
    }

    /* ============ MUSIK ============ */
    public function get_users_order_musik(){  
        $builder = $this->users_order;
        $builder->select('musik');
        $builder->where('id_user', $_SESSION['id']);
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
    public function update_musik($data){
        $builder = $this->users_order;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->update($data);
    }




























    //::: DOA DAN UCAPAN :::  
    public function get_total_users_doa_dan_ucapan(){    
        $builder = $this->users_doa_dan_ucapan;
        $builder->selectCount('doa_dan_ucapan_id');
        $where = "id_user=".$_SESSION['id'];
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult()[0]->doa_dan_ucapan_id;
    } 
    public function get_all_total_users_doa_dan_ucapan(){     
        $builder = $this->users_doa_dan_ucapan;
        $builder->selectCount('doa_dan_ucapan_id');
        $where = "id_user=".$_SESSION['id'];
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult()[0]->doa_dan_ucapan_id;
    } 
    public function get_total_users_doa_dan_ucapan_today(){     
        $builder = $this->users_doa_dan_ucapan;
        $builder->selectCount('doa_dan_ucapan_id');
        $where = "date(created_at) = CURDATE() AND id_user=".$_SESSION['id'];
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult()[0]->doa_dan_ucapan_id;
    } 
    public function get_all_users_doa_dan_ucapan(){    
        $builder = $this->users_doa_dan_ucapan;
        $builder->select('*'); 
        $builder->orderBy('created_at', 'ASC');
        $where = "id_user=".$_SESSION['id'];
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult();
    }
  
    public function get_total_users_pengunjung_mingguan(){
        $builder = $this->users_pengunjung;
        $builder->select("DAY(created_at) as tanggal, COUNT(id) as jumlah", true);
        $where = "(created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)) AND id_user=".$_SESSION['id'];
        $builder->groupBy("DAY(created_at)");
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult();
    }

   

    public function get_all_users_pengunjung(){
        $builder = $this->users_pengunjung;
        $builder->select('nama_pengunjung, created_at'); 
        $builder->orderBy('created_at', 'DESC');
        $where = "id_user=".$_SESSION['id'];
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult();
    }

    public function hapus_users_doa_dan_ucapan_by_id($doa_dan_ucapan_id){
        $builder = $this->users_doa_dan_ucapan;
        $builder->where('doa_dan_ucapan_id', $doa_dan_ucapan_id);
        return $builder->delete();
    
        //return $this->users_doa_dan_ucapan->where('doa_dan_ucapan_idg', $doa_dan_ucapan_id)->delete();
    } 

    

    
    //::: PAKET_UDO ::: 
    public function get_paket_nama_by_id($paket_id){
        $builder = $this->undangan_paket;
        $builder->select('paket_nama');  
        $where = "paket_id=".$paket_id;
        $builder->where($where);
        return $query = $builder->get()->getResult(); 
    }
    public function get_undangan_paket_by_id($paket_id){
        $builder = $this->undangan_paket;
        $builder->select('*');  
        $where = "paket_id=".$paket_id;
        $builder->where($where);
        return $query = $builder->get()->getResult(); 
    }
    public function get_all_undangan_paket_kecuali_paket_id($paket_id){ 
        $builder = $this->undangan_paket; 
        $where2 = "paket_id !='".$paket_id."'";
        $builder->where($where2);
        return $query = $builder->get()->getResult(); 
    }


    public function get_order_by_id_user(){  
        $builder = $this->users_order;
        $builder->select('users_order.*,undangan_tema.nama_theme,undangan_tema.kode_theme');
        $builder->join('undangan_tema', 'undangan_tema.id = users_order.theme', 'left');
        $builder->where('users_order.id_user',$_SESSION['id'] );
        $query = $builder->get();
        return $query->getResult();
    }
 


    

    

    

    

    public function get_undangan_pengaturan_by_id_user(){
        $builder = $this->undangan_pengaturan;
        $builder->select('*');
        $builder->where('id_user', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }
   
    //:::: MEMPELAI ::::
    public function get_users_mempelai_by_id_user(){
        $builder = $this->users_mempelai;
        $builder->select('*');
        $builder->where('id_user', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }
    public function update_users_mempelai($data){
        $builder = $this->users_mempelai;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->update($data);
    }
    public function update_foto_mempelai($fotosiapa,$isifotonya){
        $builder = $this->undangan_pengaturan;
        $builder->set($fotosiapa,$isifotonya);
        $builder->where('id_user',$_SESSION['id']);
        return $builder->update();
    }

    public function get_users_acara_by_id_user(){
        $builder = $this->users_acara;
        $builder->select('*');
        $builder->where('id_user', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }

    public function update_users_acara($data){
        $builder = $this->users_acara;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->update($data);
    }
   
     

    public function get_users_album_by_id_user(){
        $builder = $this->users_album;
        $builder->select('*');
        $builder->where('id_user', $_SESSION['id']);
        return $query = $builder->get(); 
    }
 
    public function save_users_album($data){
    	return $this->users_album->insert($data);
    }

    public function delete_users_album($id){
        $builder = $this->users_album;
        $builder->where('id',$id);
        return $builder->delete();
    }

    public function get_users_album_video_by_id_user(){
        $builder = $this->users_album_video;
        $builder->select('*');
        $builder->where('id_user', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }

    public function update_users_album_video($data){
        $builder = $this->users_album_video;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->update($data);
    }

    public function get_users_cerita_by_id_user(){
        $builder = $this->users_cerita;
        $builder->select('*');
        $builder->where('id_user', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }

    public function hapus_users_cerita(){
        $builder = $this->users_cerita;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->delete();
    }

    public function save_users_cerita($data){
    	return $this->users_cerita->insert($data);
    }

    public function get_user_by_id_user(){
        $builder = $this->users;
        $builder->select('*');
        $builder->where('id', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }

    public function update_user($data){ 
        $builder = $this->users;
        $builder->where('id', $_SESSION['id']);
        return $builder->update($data);
    }

    public function get_user($data){ 
        $builder = $this->users;
        $builder->select('users.*,users_order.domain');
        $builder->join('users_order', 'users_order.id_user = users.id', 'left');  
        $builder->where($data);
        $query = $builder->get();
        return $query->getResult();
    }

    public function update_users_order_pembayaran($data,$invoice){
        $builder = $this->users_order_pembayaran;
        $builder->where('invoice', $invoice);
        return $builder->update($data);
    }
    

    public function get_users_order_pembayaran_by_id_user(){
        $builder = $this->users_order_pembayaran;
        $builder->select('*');
        $builder->where('id_user', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }

    public function get_undangan_bank_admin(){
        $builder = $this->undangan_bank;
        $builder->select('*');
        $builder->where('bank_id_pemilik', '1');
        $builder->where('bank_siapa', 'ADMIN');
        $query = $builder->get();
        return $query->getResult();
    }

    

    public function get_konten_undangan($id_user){
    	$builder = $this->users_order;
		$builder->select('users_order.id_user as id_user,
                            users_order.domain as domain,
                            users_mempelai.nama_pria as nama_pengantin_pria,
                            users_mempelai.nama_wanita as nama_pengantin_wanita,
                            users_acara.tanggal_akad as akad_tanggal,
                            users_acara.jam_akad as akad_jam,
                            users_acara.alamat_akad as akad_alamat,
                            users_acara.tanggal_resepsi as resepsi_tanggal,
                            users_acara.jam_resepsi as resepsi_jam,
                            users_acara.alamat_resepsi as resepsi_alamat
                            '); 
		$builder->join('users_mempelai', 'users_mempelai.id_user = users_order.id_user', 'left');  
        $builder->join('users_acara', 'users_acara.id_user = users_order.id_user', 'left');   
		$builder->where('users_order.id_user', $id_user);
    	return $builder->get()->getResult();

    }

    //::: TESTIMONI :::
    public function get_users_testimoni(){  
        $builder = $this->users_testimoni;
        $builder->where('id_user', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }
    public function insert_users_testimoni($data){
    	return $this->users_testimoni->insert($data);
    }
    public function update_users_testimoni($data){ 
        $builder = $this->users_testimoni;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->update($data);
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
        //::: Bingkisan :::
        public function get_undangan_bank_by_id($bank_id){  
            $builder = $this->undangan_bank;
            $builder->where('bank_id', $bank_id); 
            $query = $builder->get();
            return $query->getResult();
        }
        public function insert_undangan_bank($data){
            return $this->undangan_bank->insert($data);
        }
        public function update_undangan_bank_by_id($data, $bank_id){
            $builder = $this->undangan_bank;
            $builder->where('bank_id', $bank_id);
            return $builder->update($data);
        }
        public function hapus_undangan_bank_by_id($bank_id){
            $builder = $this->undangan_bank;
            $builder->where('bank_id', $bank_id);
            return $builder->delete();
        } 
    
    //::: USERS_UPGRADE_PAKET
    public function insert_users_upgrade_paket($data){
    	return $this->users_upgrade_paket->insert($data);
    }   
    public function get_users_upgrade_paket_by_id_belum_konfir($upgrade_paket_id_user){
        $builder = $this->users_upgrade_paket;
        $builder->select('*');
        $builder->where('upgrade_paket_id_user', $upgrade_paket_id_user);
        $builder->where('upgrade_paket_status_konfirmasi', 'BELUM');
        $query = $builder->get();
        return $query->getResult();
    }
}