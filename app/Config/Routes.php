<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/** 
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

 /* =================== UNTUK SUB DOMAIN UNDANGAN ======================= */
if(isset($_SERVER['HTTP_HOST'])){
 if($_SERVER['HTTP_HOST'] == DOMAIN_UNDANGAN){
 
	$routes->setDefaultNamespace('App\Controllers\undangan');
	$routes->setDefaultController('Undangan');

	//::: DOA DAN UCAPAN ::: 
	$routes->post('add_users_doa_dan_ucapan', 'Undangan::do_add_users_doa_dan_ucapan');  

	$routes->add('(:any)', 'Undangan::Undangan');
	
/* =================== UNTUK ADMIN PANEL ======================= */		
}else if($_SERVER['HTTP_HOST'] == DOMAIN_ADMIN){

	$routes->setDefaultNamespace('App\Controllers\admin');
	$routes->setDefaultController('Admin');
	$routes->add('', 'Admin::dashboard');
	$routes->add('admin', 'Admin::dashboard');
	$routes->add('admin/', 'Admin::dashboard');
	$routes->add('admin/dashboard', 'Admin::dashboard'); 
	
	$routes->add('admin/profil', 'Admin::profil');
	
	$routes->get('login', 'Admin::login');
	$routes->add('logout', 'Admin::do_unauth');
	$routes->post('do_auth', 'Admin::do_auth');

	//::: PENGATURAN UDO
	$routes->add('admin/pengaturan-udo/paket-undangan', 'Admin::pengaturan_udo_undangan_paket');
	$routes->post('admin/pengaturan-udo/update-paket-undangan', 'Admin::do_update_pengaturan_udo_undangan_paket');

	//::: PENGATURAN WEBSITE
	$routes->add('admin/pengaturan-website/umum', 'Admin::pengaturan_website_umum');
	$routes->post('admin/update-pengaturan-website-umum-informasi-umum', 'Admin::do_update_pengaturan_website_umum_informasi_umum');
	$routes->post('admin/pengaturan-website/umum/tema-website-update', 'Admin::do_update_pengaturan_website_umum_tema_website');
	$routes->post('admin/pengaturan-website/umum/google-recaptcha-update', 'Admin::do_update_pengaturan_website_umum_google_recaptcha');

	$routes->post('admin/update-pengaturan-website-umum-media-sosial-share', 'Admin::do_update_pengaturan_website_umum_media_sosial_share'); 
	$routes->post('admin/pengaturan-website-umum-upload-FBShareGambar', 'Admin::Pengaturan_website_umum_upload_FBShareGambar');
	$routes->post('admin/pengaturan-website-umum-upload-favicon', 'Admin::Pengaturan_website_umum_upload_favicon');
	$routes->post('admin/pengaturan-website-umum-upload-logo', 'Admin::Pengaturan_website_umum_upload_logo');
	$routes->post('admin/pengaturan-website-umum-upload-brand-utama', 'Admin::Pengaturan_website_umum_upload_brand_utama');
	$routes->post('admin/pengaturan-website-umum-upload-brand-login', 'Admin::Pengaturan_website_umum_upload_brand_login');
	$routes->add('admin/pengaturan-website/bank-admin', 'Admin::pengaturan_website_bank_admin');
	$routes->post('admin/update-pengaturan-website-bank-admin', 'Admin::do_update_pengaturan_website_bank_admin');
	$routes->post('admin/update_admin', 'Admin::do_update_admin');
	$routes->post('admin/data-pengguna/pembayaran-pengguna/konfirmasi', 'Admin::pembayaran_pengguna_konfirmasi');
	$routes->post('admin/data-pengguna/pembayaran-pengguna/konfirmasi-batal', 'Admin::pembayaran_pengguna_konfirmasi_batal');
	$routes->add('admin/pengaturan-website/database', 'Admin::pengaturan_website_database');
	$routes->post('admin/pengaturan-website/database-restore', 'Admin::pengaturan_website_database_restore');

	$routes->add('admin/pengaturan-website/widget/home', 'Admin::pengaturan_website_widget_home');
	$routes->post('admin/pengaturan-website/widget/home/upload-foto-model', 'Admin::Pengaturan_website_widget_home_upload_foto_model');
	$routes->post('admin/pengaturan-website/widget-update', 'Admin::do_update_pengaturan_website_widget');
	$routes->post('admin/pengaturan-website/widget-links-update', 'Admin::do_update_pengaturan_website_widget_links');

	//::: DATA PENGGUNA :::
		//LIST PENGGUNA
		$routes->add('admin/data-pengguna/list-pengguna', 'Admin::list_pengguna');
		$routes->add('admin/data-pengguna/list-pengguna/edit-pengguna', 'Admin::list_pengguna_edit_pengguna');
		$routes->post('admin/data-pengguna/list-pengguna/hapus-user', 'Admin::list_pengguna_hapus_user');  
		$routes->post('admin/update_fitur', 'Admin::do_update_fitur');
		$routes->post('admin/update_domain', 'Admin::do_update_domain');
		$routes->post('admin/update_foto_users_mempelai', 'Admin::do_update_foto_users_mempelai');
		$routes->post('admin/update_users_mempelai', 'Admin::do_update_users_mempelai');
		$routes->post('admin/update_users_acara', 'Admin::do_update_users_acara');  
		$routes->post('admin/update_gallery', 'Admin::do_update_gallery');
		$routes->post('admin/del_gallery', 'Admin::do_del_gallery');
		$routes->post('admin/update_users_cerita', 'Admin::do_update_users_cerita');
		$routes->post('admin/update_user', 'Admin::do_update_user');
		$routes->post('admin/update_musik', 'Admin::do_update_musik');
		$routes->post('admin/update_users_album_video', 'Admin::do_update_users_album_video');
		//PEMBAYARAN PENGGUNA
		$routes->add('admin/data-pengguna/pembayaran-pengguna', 'Admin::pembayaran_pengguna');
		//PERMINTAAN UPGRADE PAKET
		$routes->add('admin/data-pengguna/permintaan-upgrade-paket', 'Admin::permintaan_upgrade_paket');
		$routes->add('admin/data-pengguna/permintaan-upgrade-paket/konfirmasi', 'Admin::permintaan_upgrade_paket_konfirmasi');
		$routes->add('admin/data-pengguna/permintaan-upgrade-paket/konfirmasi-batal', 'Admin::permintaan_upgrade_paket_konfirmasi_batal');

	

/* =================== UNTUK DOMAIN UTAMA ======================= */	
}else{

	$routes->setDefaultNamespace('App\Controllers\base');
	$routes->setDefaultController('Beranda');

	//TUTORIAL
	$routes->add('youtube', 'Beranda::youtube');
	$routes->add('maps', 'Beranda::maps');
	
	//TEMA UDO
	$routes->add('tema/', 'Beranda::undangan_tema');

	//TEMA WEBSITE
	$routes->post('tema-website-update', 'Beranda::do_tema_website_update');
	
	//DEMO
	$routes->add('demo/(:any)', 'Beranda::demo');
	
	//::: DOA DAN UCAPAN ::: 
	$routes->post('add_users_doa_dan_ucapan', 'Beranda::do_add_users_doa_dan_ucapan');  



	//ORDER
	$routes->add('order', 'Order');
	$routes->add('order/1', 'Order');
	$routes->add('order/2', 'Order::mempelai');
	$routes->add('order/3', 'Order::acara');
	$routes->add('order/4', 'Order::cerita'); 
	$routes->add('order/5', 'Order::gallery');
	$routes->add('order/del', 'Order::del');
	$routes->add('order/upload', 'Order::fileUpload');
	$routes->add('order/imgupload', 'Order::imgupload');
	$routes->add('order/save', 'Order::saveData');
	$routes->add('order/finish', 'Order::finish'); 
	$routes->add('order/success/(:any)', 'Order::success');
	$routes->add('order/any', 'Order::any');
	$routes->add('order/(:any)', 'Order'); 

	//DASHBOARD USER
	$routes->get('login', 'Dashboard::login');
	$routes->get('user/dashboard', 'Dashboard::index');
	$routes->get('user/kirim-undangan', 'Dashboard::kirim_undangan');
	//::: TESTIMONI ::: 
	$routes->get('user/testimoni', 'Dashboard::testimoni');
	$routes->post('user/simpan_users_testimoni', 'Dashboard::do_simpan_users_testimoni');
	//::: FITUR WEBSITE ::: 
		$routes->get('user/tampilan', 'Dashboard::tampilan');
			$routes->post('user/ganti_tema', 'Dashboard::do_ganti_tema');
		$routes->get('user/pengaturan', 'Dashboard::pengaturan');
			$routes->post('user/update_domain', 'Dashboard::do_update_domain'); 
			$routes->post('user/update_sepatah_kata', 'Dashboard::do_update_sepatah_kata');
$routes->post('user/update_fitur', 'Dashboard::do_update_fitur');
		$routes->get('user/mempelai', 'Dashboard::mempelai');
		//::: MEMPELAI ::: 
			$routes->post('user/update_foto_users_mempelai', 'Dashboard::do_update_foto_users_mempelai');
			$routes->post('user/update_users_mempelai', 'Dashboard::do_update_users_mempelai');
			$routes->post('user/hapus_foto_pria', 'Dashboard::do_delete_foto_pria');
			$routes->post('user/hapus_foto_wanita', 'Dashboard::do_delete_foto_wanita');
			$routes->post('user/hapus_foto_sampul', 'Dashboard::do_delete_foto_sampul');
		$routes->get('user/acara', 'Dashboard::acara');
			$routes->post('user/update_users_acara', 'Dashboard::do_update_users_acara');
		$routes->get('user/album', 'Dashboard::gallery'); 
		$routes->get('user/cerita', 'Dashboard::cerita');
		$routes->add('user/fitur/website/bingkisan', 'Dashboard::fitur_website_bingkisan');
		$routes->post('user/fitur/website/bingkisan/tambah-data-bank', 'Dashboard::fitur_website_bingkisan_tambah_data_bank');
		$routes->post('user/fitur/website/bingkisan/ubah-data-bank', 'Dashboard::fitur_website_bingkisan_ubah_data_bank');
		$routes->post('user/fitur/website/bingkisan/ubah-data-bank-simpan', 'Dashboard::fitur_website_bingkisan_ubah_data_bank_simpan');
		$routes->post('user/fitur/website/bingkisan/hapus-data-bank', 'Dashboard::fitur_website_bingkisan_hapus_data_bank');


	//::: FITUR PENGUNJUNG :::
		$routes->get('user/riwayat', 'Dashboard::riwayat');
		//::: DOA DAN UCAPAN ::: 
		$routes->get('user/doa-dan-ucapan', 'Dashboard::users_doa_dan_ucapan');
		$routes->post('user/hapus_users_doa_dan_ucapan', 'Dashboard::do_hapus_users_doa_dan_ucapan'); 
	
	//::: TAGIHAN USER :::
	$routes->get('user/invoice', 'Dashboard::invoice');
	$routes->post('user/konfirmasi', 'Dashboard::do_konfirmasi');
	$routes->post('user/invoice/upgrade-paket', 'Dashboard::do_upgrade_paket');

	$routes->get('user/profil', 'Dashboard::profil');
	$routes->get('user/logout', 'Dashboard::do_unauth');
	$routes->post('do_auth', 'Dashboard::do_auth');

	 
	$routes->post('user/update_gallery', 'Dashboard::do_update_gallery');
	$routes->post('user/del_gallery', 'Dashboard::do_del_gallery');
	$routes->post('user/update_users_cerita', 'Dashboard::do_update_users_cerita');
	$routes->post('user/update_user', 'Dashboard::do_update_user');
	$routes->post('user/update_musik', 'Dashboard::do_update_musik');
	$routes->post('user/update_users_album_video', 'Dashboard::do_update_users_album_video');
	

	
	//REDIRECT SEMUA ROUTES TIDAK DIKENAL KE HOME
	$routes->add('(:any)', 'Beranda');
}

}




/* =================== DEFAULT ROUTES ======================= */	
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
// $routes->add('theme', 'Anu::demo');
// $routes->add('(:any)', 'Anu::index');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
