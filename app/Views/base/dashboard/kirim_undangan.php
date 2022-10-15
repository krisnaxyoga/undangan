<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="row mb-3">
        <div class="col-xl-12 col-lg-6 mb-4">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header bg-success py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-white">Kirim Undangan</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label><b>Nama yang Diundang</b><sup class="text-danger">*</sup></label>
                        <input id="nama_yang_diundang" type="text" class="form-control" placeholder="contoh : Budi Utama & Partner" value=""  onkeyup="update_nama_yang_diundang()" required>
                    </div>
                    <div class="form-group">
                        <label><b>Nomor whatsapp yang Diundang</b> <sup>(opsional)</sup></label>
                        <input id="wa_yang_diundang" type="text" class="form-control" placeholder="contoh : +6282100002324"   onkeyup="update_wa_yang_diundang()">
                    </div>
                    <a id="tombol_kirim_undangan" target="_blank"  href="" class="btn btn-success btn-sm"><i class="fa-brands fa-whatsapp"></i> Kirim Undangan</a>
                    <br/><br/>
                    <small><sup class="text-danger">Tips!</sup> Jika Anda tidak hapal nomor Whatsapp yang akan diundang, maka cukup isi kotak Nama yang Diundang saja. Selanjutnya klik tombol kirim, nanti akan masuk ke aplikasi Whatsapp secara otomatis dan hanya tinggal mencari kontak yang akan diundangan di Aplikasi Whatsapp Anda. </small>
                    
                </div>
              </div>
        </div>

         


    </div>
    <!--Row-->
</div> 

<?php
function tanggal_indo($tanggal, $cetak_hari = false)
{
	$hari = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
			);
			
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split 	  = explode('/', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	
	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
} 

?>

<script>
var nama_pengantin_pria = "<?= $konten[0]->nama_pengantin_pria ?>" ;
var nama_pengantin_wanita = "<?= $konten[0]->nama_pengantin_wanita ?>" ;
var akad_tanggal = "<?= tanggal_indo($konten[0]->akad_tanggal, true) ?>" ;
var akad_jam = "<?= $konten[0]->akad_jam ?>" ;
var akad_alamat = "<?= $konten[0]->akad_alamat ?>" ;
var resepsi_tanggal = "<?= tanggal_indo($konten[0]->resepsi_tanggal, true) ?>" ;
var resepsi_jam = "<?= $konten[0]->resepsi_jam ?>" ;
var resepsi_alamat = "<?= $konten[0]->resepsi_alamat ?>" ;
var undangan_domain = "<?= SITE_UNDANGAN ?>/<?= $konten[0]->domain ?>" ;

$(document).ready(function() {
    var formattext =""+
                    "%0A%20%0A%20%0A%20%D8%A8%D9%90%D8%B3%D9%92%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%85%D9%90%20%D8%A7%D9%84%D9%84%D9%87%D9%90%20%D8%A7%D9%84%D8%B1%D9%8E%D9%91%D8%AD%D9%92%D9%85%D9%8E%D9%86%D9%90%20%D8%A7%D9%84%D8%B1%D9%8E%D9%91%D8%AD%D9%90%D9%8A%D9%92%D9%85%D9%90%20%0A%0AAssalamu%27alaikum%20warahmatullahi%20wabarakatuh.%0A%20%0A%20%22Dan%20di%20antara%20tanda-tanda%20(kebesaran)-Nya%20ialah%20Dia%20menciptakan%20pasangan-pasangan%20untukmu%20dari%20jenismu%20sendiri,%20agar%20kamu%20cenderung%20dan%20merasa%20tentram%20kepadanya,%20dan%20Dia%20menjadikan%20di%20antaramu%20rasa%20kasih%20dan%20sayang.%20Sesungguhnya%20pada%20yang%20demikian%20itu%20benar-benar%20terdapat%20tanda-tanda%20(kebesaran%20Allah)%20bagi%20kaum%20yang%20berpikir%22%20(Q.S.%20Ar-Rum%20:%2021).%0A%20%0ATanpa%20mengurangi%20rasa%20hormat,%20perkenankan%20kami%20mengundang%20Bapak/Ibu/Saudara/i,%20untuk%20menghadiri%20acara%20pernikahan%20kami%20:" +
                    "%0A%20%0A*"+nama_pengantin_pria+"*%20%E2%99%A1%20*"+nama_pengantin_wanita+"*%0A%20%0AYang%20InsyaAllah%20akan%20dilaksanakan%20pada%20:"+
                    "%0A%0A*Acara Akad*%0A"+"≡"+"%20"+akad_tanggal+"%0A"+"⌂"+"%20"+akad_jam+"%0A"+"۩"+"%20"+akad_alamat+"%0A"+
                    "%0A*Acara Resepsi*%0A"+"≡"+"%20"+resepsi_tanggal+"%0A"+"⌂"+"%20"+resepsi_jam+"%0A"+"۩"+"%20"+resepsi_alamat+"%0A"+
                    "%20%0ABerikut%20link%20undangan%20web%20untuk%20info%20lebih%20lengkap%20mengenai%20acara%20pernikahan%20kami%20:"+
                    "%20%0A%20*"+undangan_domain+"/"+"*%0A%20%0AMerupakan%20suatu%20kehormatan%20dan%20kebahagiaan%20apabila%20Bapak/Ibu/Saudara/i%20berkenan%20hadir%20untuk%20memberikan%20do%27a%20restu%20kepada%20kami.%0A%20%0AWassalamu%27alaikum%20warahmatullahi%20wabarakatu.%0A%20%0A%20%0A%20%0AKami%20yang%20berbahagia,"+
                    "%0A%20%0A*"+nama_pengantin_pria+"*%20%E2%99%A1%20*"+nama_pengantin_wanita+"*%0A";
    
    var link_wa ="https://wa.me/?text="+formattext  ; 
    $("#tombol_kirim_undangan").attr("href", link_wa);
});

function update_nama_yang_diundang(){
    var nama_yang_diundang = $("#nama_yang_diundang").val(); 
    var strBaru1 = nama_yang_diundang.replace('&', 'dan');
        strBaru = strBaru1.replace(/ /g, '_');
        nama_yang_diundang_link = strBaru;
    var linknya = undangan_domain+"/"+nama_yang_diundang;    
    var wa_yang_diundang = $("#wa_yang_diundang").val();
    var formattext ="*Kepada%20:%20" + strBaru1 + 
                    "*%0A%20%0A%20%0A%20%D8%A8%D9%90%D8%B3%D9%92%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%85%D9%90%20%D8%A7%D9%84%D9%84%D9%87%D9%90%20%D8%A7%D9%84%D8%B1%D9%8E%D9%91%D8%AD%D9%92%D9%85%D9%8E%D9%86%D9%90%20%D8%A7%D9%84%D8%B1%D9%8E%D9%91%D8%AD%D9%90%D9%8A%D9%92%D9%85%D9%90%20%0A%0AAssalamu%27alaikum%20warahmatullahi%20wabarakatuh.%0A%20%0A%20%22Dan%20di%20antara%20tanda-tanda%20(kebesaran)-Nya%20ialah%20Dia%20menciptakan%20pasangan-pasangan%20untukmu%20dari%20jenismu%20sendiri,%20agar%20kamu%20cenderung%20dan%20merasa%20tentram%20kepadanya,%20dan%20Dia%20menjadikan%20di%20antaramu%20rasa%20kasih%20dan%20sayang.%20Sesungguhnya%20pada%20yang%20demikian%20itu%20benar-benar%20terdapat%20tanda-tanda%20(kebesaran%20Allah)%20bagi%20kaum%20yang%20berpikir%22%20(Q.S.%20Ar-Rum%20:%2021).%0A%20%0ATanpa%20mengurangi%20rasa%20hormat,%20perkenankan%20kami%20mengundang%20Bapak/Ibu/Saudara/i,%20untuk%20menghadiri%20acara%20pernikahan%20kami%20:" +
                    "%0A%20%0A*"+nama_pengantin_pria+"*%20%E2%99%A1%20*"+nama_pengantin_wanita+"*%0A%20%0AYang%20InsyaAllah%20akan%20dilaksanakan%20pada%20:"+
                    "%0A%0A*Acara Akad*%0A"+"≡"+"%20"+akad_tanggal+"%0A"+"⌂"+"%20"+akad_jam+"%0A"+"۩"+"%20"+akad_alamat+"%0A"+
                    "%0A*Acara Resepsi*%0A"+"≡"+"%20"+resepsi_tanggal+"%0A"+"⌂"+"%20"+resepsi_jam+"%0A"+"۩"+"%20"+resepsi_alamat+"%0A"+
                    "%20%0ABerikut%20link%20undangan%20web%20untuk%20info%20lebih%20lengkap%20mengenai%20acara%20pernikahan%20kami%20:"+
                    "%20%0A%20*"+undangan_domain+"/"+nama_yang_diundang_link+"*%0A%20%0AMerupakan%20suatu%20kehormatan%20dan%20kebahagiaan%20apabila%20Bapak/Ibu/Saudara/i%20berkenan%20hadir%20untuk%20memberikan%20do%27a%20restu%20kepada%20kami.%0A%20%0AWassalamu%27alaikum%20warahmatullahi%20wabarakatu.%0A%20%0A%20%0A%20%0AKami%20yang%20berbahagia,"+
                    "%0A%20%0A*"+nama_pengantin_pria+"*%20%E2%99%A1%20*"+nama_pengantin_wanita+"*%0A";
     if (wa_yang_diundang ==""){
        var link_wa ="https://wa.me/?text="+formattext  ;
     }else{
        var link_wa ="https://wa.me/" + wa_yang_diundang + "/?text="+formattext  ;
     }
     $("#tombol_kirim_undangan").attr("href", link_wa);
}    

function update_wa_yang_diundang(){
    var nama_yang_diundang = $("#nama_yang_diundang").val();
    var strBaru1 = nama_yang_diundang.replace('&', 'dan');
        strBaru = strBaru1.replace(/ /g, '_');
        nama_yang_diundang_link = strBaru;
    var linknya = undangan_domain+"/"+nama_yang_diundang;   
    var wa_yang_diundang = $("#wa_yang_diundang").val();
    var formattext ="*Kepada%20:%20" + strBaru1 + 
                    "*%0A%20%0A%20%0A%20%D8%A8%D9%90%D8%B3%D9%92%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%80%D9%85%D9%90%20%D8%A7%D9%84%D9%84%D9%87%D9%90%20%D8%A7%D9%84%D8%B1%D9%8E%D9%91%D8%AD%D9%92%D9%85%D9%8E%D9%86%D9%90%20%D8%A7%D9%84%D8%B1%D9%8E%D9%91%D8%AD%D9%90%D9%8A%D9%92%D9%85%D9%90%20%0A%0AAssalamu%27alaikum%20warahmatullahi%20wabarakatuh.%0A%20%0A%20%22Dan%20di%20antara%20tanda-tanda%20(kebesaran)-Nya%20ialah%20Dia%20menciptakan%20pasangan-pasangan%20untukmu%20dari%20jenismu%20sendiri,%20agar%20kamu%20cenderung%20dan%20merasa%20tentram%20kepadanya,%20dan%20Dia%20menjadikan%20di%20antaramu%20rasa%20kasih%20dan%20sayang.%20Sesungguhnya%20pada%20yang%20demikian%20itu%20benar-benar%20terdapat%20tanda-tanda%20(kebesaran%20Allah)%20bagi%20kaum%20yang%20berpikir%22%20(Q.S.%20Ar-Rum%20:%2021).%0A%20%0ATanpa%20mengurangi%20rasa%20hormat,%20perkenankan%20kami%20mengundang%20Bapak/Ibu/Saudara/i,%20untuk%20menghadiri%20acara%20pernikahan%20kami%20:" +
                    "%0A%20%0A*"+nama_pengantin_pria+"*%20%E2%99%A1%20*"+nama_pengantin_wanita+"*%0A%20%0AYang%20InsyaAllah%20akan%20dilaksanakan%20pada%20:"+
                    "%0A%0A*Acara Akad*%0A"+"≡"+"%20"+akad_tanggal+"%0A"+"⌂"+"%20"+akad_jam+"%0A"+"۩"+"%20"+akad_alamat+"%0A"+
                    "%0A*Acara Resepsi*%0A"+"≡"+"%20"+resepsi_tanggal+"%0A"+"⌂"+"%20"+resepsi_jam+"%0A"+"۩"+"%20"+resepsi_alamat+"%0A"+
                    "%20%0ABerikut%20link%20undangan%20web%20untuk%20info%20lebih%20lengkap%20mengenai%20acara%20pernikahan%20kami%20:"+
                    "%20%0A%20*"+undangan_domain+"/"+nama_yang_diundang_link+"*%0A%20%0AMerupakan%20suatu%20kehormatan%20dan%20kebahagiaan%20apabila%20Bapak/Ibu/Saudara/i%20berkenan%20hadir%20untuk%20memberikan%20do%27a%20restu%20kepada%20kami.%0A%20%0AWassalamu%27alaikum%20warahmatullahi%20wabarakatu.%0A%20%0A%20%0A%20%0AKami%20yang%20berbahagia,"+
                    "%0A%20%0A*"+nama_pengantin_pria+"*%20%E2%99%A1%20*"+nama_pengantin_wanita+"*%0A";
     if (wa_yang_diundang ==""){
        var link_wa ="https://wa.me/?text="+formattext  ;
     }else{
        var link_wa ="https://wa.me/" + wa_yang_diundang + "/?text="+formattext  ;
     }
     $("#tombol_kirim_undangan").attr("href", link_wa);
}   
</script>