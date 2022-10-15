<!DOCTYPE html>
<html Content-Language="ID" lang="id" xml:lang="id">

<head>
    <!-- Umum meta tags -->
    <title><?= $title ?> - <?= $website_umum[1]->website_isi ?></title> 
    <link rel="icon" href="<?php echo base_url() ?>/assets/base/img/favicon.ico?<?= date("Y-m-d"); ?>">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= $website_umum[2]->website_isi ?>">
    <meta name="keywords" content="<?= $website_umum[3]->website_isi ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="<?= $website_umum[4]->website_isi ?>">
    <!-- FB meta tags -->
    <meta property="og:title" content="<?= $website_umum[7]->website_isi ?>">
    <meta property="og:description" content="<?= $website_umum[8]->website_isi ?>">
    <meta property="og:url" content="<?php echo base_url() ?>">
    <meta property="og:image" itemprop="image" content="<?php echo base_url() ?><?= $website_umum[10]->website_isi ?>">
    <meta property="og:image:width" content="<?= $website_umum[11]->website_isi ?>">
    <meta property="og:image:height" content="<?= $website_umum[12]->website_isi ?>">
    <meta property="fb:pages" content="<?= $website_umum[5]->website_isi ?>" />
    <meta name="facebook-domain-verification" content="<?= $website_umum[6]->website_isi ?>" />
 
    
    <link href="<?= base_url('assets/admin'); ?>/vendor/fontawesome-free/css/all.min.css?" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/admin'); ?>/vendor/bootstrap/css/bootstrap.css?" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/base'); ?>/css/tema-web/<?= strtolower($website_umum[15]->website_isi) ?>/style.css?" rel="stylesheet">
    <link href="<?= base_url('assets/admin'); ?>/css/tema-web/<?= strtolower($website_umum[15]->website_isi) ?>/ruang-admin.css?" rel="stylesheet">

</head>

<body class="bg-gradient-login">
<?php 
 echo view($view);
?>
<script src="<?= base_url('assets/admin'); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/admin'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/admin'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/admin'); ?>/js/ruang-admin.min.js"></script>
</body>
<script>
setTimeout("$('#ikierror').hide();", 2000);
</script>

</html>