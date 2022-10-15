-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2022 pada 11.49
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `udo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(2) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_level` enum('Administrator','Demo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `nama_lengkap`, `no_hp`, `admin_level`, `created_at`) VALUES
(1, 'admin', 'e534f289b4764bdbb904651e8c6a61b7', 'adm1ku2@gmail.com', 'Khairul Fikri', '+6282173020446', 'Administrator', '2022-06-15 05:26:40'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'Admin Demo', '082111112222', 'Demo', '2022-06-15 06:34:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sistem`
--

CREATE TABLE `sistem` (
  `sistem_id` int(11) NOT NULL,
  `sistem_versi` varchar(250) NOT NULL,
  `sistem_fix_bug` longtext NOT NULL,
  `sistem_fix_error` longtext NOT NULL,
  `sistem_tambahan` longtext NOT NULL,
  `sistem_tgl_rilis` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sistem`
--

INSERT INTO `sistem` (`sistem_id`, `sistem_versi`, `sistem_fix_bug`, `sistem_fix_error`, `sistem_tambahan`, `sistem_tgl_rilis`) VALUES
(1, '1.0', '', '', '', '2022-05-19 03:31:36'),
(2, '2.0', '', '', '', '2022-05-26 10:15:32'),
(3, '3.0', '', '', '', '2022-06-19 09:48:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `undangan_bank`
--

CREATE TABLE `undangan_bank` (
  `bank_id` int(11) NOT NULL,
  `bank_id_pemilik` int(11) NOT NULL,
  `bank_siapa` enum('ADMIN','PENGGUNA') NOT NULL DEFAULT 'PENGGUNA',
  `bank_nama` varchar(255) NOT NULL,
  `bank_kode` varchar(5) NOT NULL,
  `bank_nama_pemilik` varchar(255) NOT NULL,
  `bank_nomor_rekening` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `undangan_bank`
--

INSERT INTO `undangan_bank` (`bank_id`, `bank_id_pemilik`, `bank_siapa`, `bank_nama`, `bank_kode`, `bank_nama_pemilik`, `bank_nomor_rekening`, `created_at`, `updated_at`) VALUES
(1, 1, 'ADMIN', 'BANK RAKYAT INDONESIA (BRI)', '002', 'Khairul Fikri', '3079-0101-5802-530', '2022-06-15 05:26:40', '0000-00-00 00:00:00'),
(2, 1, 'PENGGUNA', 'BANK RAKYAT INDONESIA (BRI)', '002', 'Ray', '1111-1111-1111-111', '2022-06-15 05:26:40', '0000-00-00 00:00:00'),
(3, 1, 'PENGGUNA', 'BANK MUAMALAT', '147', 'Ray', '222-222-2222-22', '2022-06-15 05:26:40', '0000-00-00 00:00:00'),
(4, 1, 'PENGGUNA', 'SHOPEE PAY', '', 'Ray', '+62821000044444', '2022-06-15 05:26:40', '0000-00-00 00:00:00'),
(5, 1, 'PENGGUNA', 'Go-PAY', '', 'Ray', '+62821000044444', '2022-06-15 05:26:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `undangan_fitur`
--

CREATE TABLE `undangan_fitur` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `sampul` int(11) NOT NULL,
  `mempelai` int(11) NOT NULL,
  `acara` int(11) NOT NULL,
  `komen` int(11) NOT NULL,
  `gallery` int(11) NOT NULL,
  `cerita` int(11) NOT NULL,
  `lokasi` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `undangan_fitur`
--

INSERT INTO `undangan_fitur` (`id`, `id_user`, `sampul`, `mempelai`, `acara`, `komen`, `gallery`, `cerita`, `lokasi`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-07-26 14:16:43', '2020-08-26 06:26:16'),
(2, 2, 1, 1, 1, 1, 0, 0, 0, '2022-06-16 07:30:58', '2022-06-16 14:30:58'),
(3, 3, 1, 1, 1, 1, 0, 0, 0, '2022-06-16 07:40:22', '2022-06-16 14:40:22'),
(4, 4, 1, 1, 1, 1, 0, 0, 0, '2022-06-16 07:47:30', '2022-06-16 14:47:30'),
(5, 5, 1, 1, 1, 1, 0, 0, 0, '2022-06-16 07:53:19', '2022-06-16 14:53:19'),
(6, 6, 1, 1, 1, 1, 0, 0, 0, '2022-06-17 09:06:48', '2022-06-17 16:06:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `undangan_musik`
--

CREATE TABLE `undangan_musik` (
  `musik_id` int(5) NOT NULL,
  `musik_file` varchar(255) NOT NULL,
  `musik_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `undangan_musik`
--

INSERT INTO `undangan_musik` (`musik_id`, `musik_file`, `musik_updated`) VALUES
(1, 'default.mp3', '2022-06-08 07:58:45'),
(2, 'Ketika Cinta Bertasbih by Melly.mp3', '2022-06-08 07:58:45'),
(3, 'Anna Uhibbuka Fillah by Rita dan Dhimas.mp3', '2022-06-08 07:58:45'),
(4, 'Its You by Sezairi.mp3', '2022-06-08 07:58:45'),
(5, 'Perfect Duet by Beyonca.mp3', '2022-06-08 07:59:49'),
(6, 'Menikahimu by Kahitna.mp3', '2022-06-08 07:59:49'),
(7, 'Akad by Payung Teduh.mp3', '2022-06-19 08:54:56'),
(8, 'Beautiful In White by Shane Filan.mp3', '2022-06-19 08:54:56'),
(9, 'Crazy by Andrew Garcia.mp3', '2022-06-19 08:54:56'),
(10, 'Fly Me To The Moon by Frank Sinatra.mp3', '2022-06-19 08:54:56'),
(11, 'Janji Suci by Yovie dan Nuno.mp3', '2022-06-19 08:54:56'),
(12, 'Zaujati by Dody Hidayatullah.mp3', '2022-06-19 08:54:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `undangan_paket`
--

CREATE TABLE `undangan_paket` (
  `paket_id` int(5) NOT NULL,
  `paket_id_turunannya` varchar(100) NOT NULL,
  `paket_nama` varchar(10) NOT NULL,
  `paket_keterangan` varchar(100) NOT NULL,
  `paket_harga_normal` int(10) NOT NULL,
  `paket_harga_diskon` int(10) NOT NULL,
  `paket_limit_waktu` int(2) NOT NULL,
  `paket_status` enum('AKTIF','TIDAK AKTIF','','') NOT NULL DEFAULT 'TIDAK AKTIF',
  `paket_biaya_upgrade` int(10) NOT NULL,
  `paket_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `undangan_paket`
--

INSERT INTO `undangan_paket` (`paket_id`, `paket_id_turunannya`, `paket_nama`, `paket_keterangan`, `paket_harga_normal`, `paket_harga_diskon`, `paket_limit_waktu`, `paket_status`, `paket_biaya_upgrade`, `paket_created_at`) VALUES
(1, '', 'Gratis', 'Coba dan rasakan layanan seperti premium selama 2 hari', 85000, 0, 2, 'AKTIF', 0, '2022-06-15 05:26:41'),
(2, '1', 'Premium', 'Rasakan semua layanan Undangan Digital Online ini selama 30 hari.', 100000, 75000, 30, 'AKTIF', 25000, '2022-06-15 05:26:41'),
(3, '1,2', 'Unlimited', 'Semua fitur layanan Undangan Digital Online dimiliki tanpa batasan waktu.', 145000, 100000, 0, 'AKTIF', 50000, '2022-06-15 05:26:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `undangan_pengaturan`
--

CREATE TABLE `undangan_pengaturan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto_pria` varchar(50) NOT NULL DEFAULT '0',
  `foto_wanita` varchar(50) NOT NULL DEFAULT '0',
  `kunci` varchar(100) NOT NULL,
  `sepatah_kata_pilihan` varchar(500) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `undangan_pengaturan`
--

INSERT INTO `undangan_pengaturan` (`id`, `id_user`, `foto_pria`, `foto_wanita`, `kunci`, `sepatah_kata_pilihan`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '1', 'mIjh78y8ge13b89d99c1a29132e57d2ca', '2', '2020-07-26 14:16:43', '2022-06-16 13:59:29'),
(2, 2, '0', '0', 'b60a918e73dfe0c89f3d855ecb489934', '1', '2022-06-16 07:30:58', '2022-06-16 14:30:58'),
(3, 3, '1', '1', '1dae2bbf0f0e4e1f71c7318ccc3b905c', '1', '2022-06-16 07:40:22', '2022-06-16 14:40:22'),
(4, 4, '0', '0', '97ebc54af47d3450b034e4aae9135699', '1', '2022-06-16 07:47:30', '2022-06-16 14:47:30'),
(5, 5, '1', '1', '4b20995def8b6affa6726e51f595e940', '1', '2022-06-16 07:53:19', '2022-06-16 14:53:19'),
(6, 6, '1', '1', 'b74a93fc3632981d4d059bcc98e7f9a3', '1', '2022-06-17 09:06:48', '2022-06-17 16:06:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `undangan_sepatah_kata`
--

CREATE TABLE `undangan_sepatah_kata` (
  `sepatah_kata_id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `sepatah_kata_pilihan` int(2) NOT NULL,
  `sepatah_kata_halaman` varchar(10) NOT NULL,
  `sepatah_kata_urutan` int(2) NOT NULL,
  `sepatah_kata_isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `undangan_sepatah_kata`
--

INSERT INTO `undangan_sepatah_kata` (`sepatah_kata_id`, `id_users`, `sepatah_kata_pilihan`, `sepatah_kata_halaman`, `sepatah_kata_urutan`, `sepatah_kata_isi`) VALUES
(1, 1, 1, 'mempelai', 1, 'Seindah-indahnya perhiasan adalah wanita sholihah dan semulia-mulianya laki-laki adalah yang memuliakan wanita, Ya Allah izinkanlah putra-putri kami untuk mengikuti sunnah Rosul-Mu'),
(2, 1, 1, 'acara', 1, 'Assalamu\'alaikum warahmatullahi wabarakatuh <br/><br/>\n    \n                                        Dengan memohon Rahmat dan Ridho Allah SWT, kami mengundang Bapak/Ibu/Saudara/i untuk menghadiri resepsi pernikahan putra-putri kami, yang Insya Allah akan diselenggarakan pada :'),
(3, 1, 1, 'acara', 2, 'Merupakan suatu kehormatan dan kebahagian bagi kami apabila Bapak/IBu/Saudara/i berkenan hadir untuk memberikan do\'a restu kepada kedua mempelai.\n                                        <br/><br/>\n                                        Atas kehadiran dan do\'a restu Bapak/Ibu/Saudara/Saudari/i, kami ucapkan terima kasih.<br/><br/>\n                                        Waassalamu\'alaikum Warahmatullahi Wabarakatuh.'),
(4, 1, 2, 'mempelai', 1, 'Assalamu\'alaikum warahmatullahi wabarakatuh <br/> <br/> Dengan memohon Rahmat dan Ridho Allah SWT, kami akan menyelenggarakan resepsi pernikahan Putra-Putri kami :'),
(5, 1, 2, 'acara', 1, ''),
(6, 1, 2, 'acara', 2, ''),
(7, 1, 3, 'mempelai', 1, 'Seindah-indahnya perhiasan adalah wanita sholihah dan semulia-mulianya laki-laki adalah yang memuliakan wanita, Ya Allah izinkanlah putra-putri kami untuk mengikuti sunnah Rosul-Mu'),
(8, 1, 3, 'acara', 1, ''),
(9, 1, 3, 'acara', 2, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `undangan_tema`
--

CREATE TABLE `undangan_tema` (
  `id` int(11) NOT NULL,
  `nama_theme` varchar(50) NOT NULL,
  `kode_theme` varchar(50) NOT NULL,
  `paket_id` int(5) NOT NULL DEFAULT 1,
  `paket_id_turunan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `undangan_tema`
--

INSERT INTO `undangan_tema` (`id`, `nama_theme`, `kode_theme`, `paket_id`, `paket_id_turunan`, `created_at`, `updated_at`) VALUES
(1, 'Bunga_HW', 'A001', 1, '', '2020-07-26 13:23:40', '2022-05-14 11:52:14'),
(2, 'Bunga_Teal', 'A002', 1, '', '2020-07-26 13:23:40', '2022-05-14 11:52:14'),
(3, 'Bunga_Hijau', 'A003', 1, '', '2020-08-17 01:03:22', '2022-05-14 11:52:14'),
(4, 'Bunga_Pink', 'A004', 1, '', '2020-08-28 18:22:30', '2022-05-14 11:52:14'),
(5, 'Mawar_Biru', 'A005', 1, '', '2020-08-28 17:03:54', '2022-05-14 11:52:14'),
(6, 'Mawar_Merah', 'A006', 1, '', '2020-08-28 17:04:08', '2022-05-14 11:52:14'),
(8, 'Cahaya_Emas', 'A008', 1, '', '2020-08-28 19:56:29', '2022-03-07 15:11:38'),
(9, 'Gelap_Bercahaya', 'A009', 1, '', '2020-08-28 19:56:29', '2022-03-07 15:11:38'),
(10, 'Coklat_Manis', 'A010', 2, '1', '2020-08-28 19:56:29', '2022-03-07 15:11:38'),
(11, 'Elegan_Emas', 'A011', 2, '1', '2020-08-28 19:56:29', '2022-03-11 15:28:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `hp` decimal(15,0) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_unik` varchar(500) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `hp`, `email`, `username`, `password`, `id_unik`, `foto`, `created_at`, `updated_at`) VALUES
(1, '89839273811', 'demo12admin@gmail.com', 'demo', 'dcac7e44d491acbf7e9ee07cbb4547bc', '2007155', '', '2020-07-26 14:16:42', '2022-06-19 15:35:29'),
(2, '0', 'wedew@gmail.com', 'wedew@gmail.com', '0aea864490b6155603dec6ffe66f6b2e', '2206240', '', '2022-06-16 07:30:58', '2022-06-16 14:30:58'),
(3, '0', 'ayufaisal@gmail.com', 'ayufaisal@gmail.com', 'b6b400fe9451e8eee174451739320f01', '2206386', '', '2022-06-16 07:40:22', '2022-06-16 14:40:22'),
(4, '0', 'rifqisonia@gmail.com', 'rifqisonia@gmail.com', 'd4083dae0bbf69dca623d7fc4ad1f00d', '2206487', '', '2022-06-16 07:47:30', '2022-06-16 14:47:30'),
(5, '0', 'vivihadi@gmail.com', 'vivihadi@gmail.com', 'e55b032c86da0f4a8fce31388f69659c', '2206562', '', '2022-06-16 07:53:19', '2022-06-16 14:53:19'),
(6, '8123456777', 'klikpliz@gmail.com', 'klikpliz@gmail.com', '48eec883c86443c947c0fc4ad6cc8ba2', '2206645', '', '2022-06-17 09:06:48', '2022-06-17 16:06:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_acara`
--

CREATE TABLE `users_acara` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_akad` varchar(50) DEFAULT NULL,
  `jam_akad` varchar(50) NOT NULL,
  `tempat_akad` varchar(100) NOT NULL,
  `alamat_akad` text NOT NULL,
  `gmap_akad` text DEFAULT NULL,
  `tanggal_resepsi` varchar(50) NOT NULL,
  `jam_resepsi` varchar(50) NOT NULL,
  `tempat_resepsi` varchar(100) NOT NULL,
  `alamat_resepsi` text NOT NULL,
  `gmap_resepsi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_acara`
--

INSERT INTO `users_acara` (`id`, `id_user`, `tanggal_akad`, `jam_akad`, `tempat_akad`, `alamat_akad`, `gmap_akad`, `tanggal_resepsi`, `jam_resepsi`, `tempat_resepsi`, `alamat_resepsi`, `gmap_resepsi`, `created_at`, `updated_at`) VALUES
(1, 1, '2020/01/11', '11.00 Pagi', 'Kediaman Mempelai Wanita', 'Jl. Medan Merdeka Utara No.3 RT.02/RW.03. Gambir, Jakarta Pusat.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.705836876672!2d106.82198811476884!3d-6.170129095532956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d6aa94d477%3A0xebf3b9d252c86a26!2sMerdeka%20Palace!5e0!3m2!1sen!2sid!4v1595773648767!5m2!1sen!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', '2020/01/11', '11.00 Malam', 'Kediaman Mempelai Pria', 'Jl. Medan Merdeka Utara No.3 RT.02/RW.03. Gambir, Jakarta Pusat.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.705836876672!2d106.82198811476884!3d-6.170129095532956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d6aa94d477%3A0xebf3b9d252c86a26!2sMerdeka%20Palace!5e0!3m2!1sen!2sid!4v1595773648767!5m2!1sen!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', '2020-07-26 14:16:43', '2022-02-22 20:31:10'),
(2, 2, '2020/01/08', '08:00 Wib S/D Selesai', 'Kediaman Mempelai Pria', 'Jln. Mawar No.4, Kota Sialang, Kecamatan Budioso, Provinsi Sakipi.', '', '2020/01/16', '10:00 Wib S/D Selesai', 'Kediaman Mempelai Wanita', 'Jln. Manggau, Gang Kemani, No.1, Kota Sialang, Kec. Budioso, Provinsi Sakipi.', '', '2022-06-16 07:30:58', '2022-06-16 14:30:58'),
(3, 3, '2022/06/09', '08:00 Wib S/D Selesai', 'Kediaman Mempelai Pria', 'Jln. Mawar No.4, Kota Sialang, Kecamatan Budioso, Provinsi Sakipi.', '', '2022/06/23', '10:00 Wib S/D Selesai', 'Kediaman Mempelai Wanita', 'Kediaman Mempelai Wanita', '', '2022-06-16 07:40:22', '2022-06-16 14:40:22'),
(4, 4, '2022/06/03', '08:00 Wib S/D Selesai', 'Kediaman Mempelai Pria', 'Jln. Mawar No.4, Kota Sialang, Kecamatan Budioso, Provinsi Sakipi.', '', '2022/06/03', '10:00 Wib S/D Selesai', 'Kediaman Mempelai Wanita', 'Jln. Manggau, Gang Kemani, No.1, Kota Sialang, Kec. Budioso, Provinsi Sakipi.', '', '2022-06-16 07:47:30', '2022-06-16 14:47:30'),
(5, 5, '2022/06/09', '08:00 Wib S/D Selesai', 'Kediaman Mempelai Pria', 'Kediaman Mempelai Pria', '', '2022/06/17', '10:00 Wib S/D Selesai', 'Kediaman Mempelai Wanita', 'Jln. Manggau, Gang Kemani, No.1, Kota Sialang, Kec. Budioso, Provinsi Sakipi.', '', '2022-06-16 07:53:19', '2022-06-16 14:53:19'),
(6, 6, '2022/06/30', '08 sd selese', 'Jakarta', 'Jakarta aja', 'https://www.google.com/maps/place/Monumen+Nasional,+Gambir,+Kecamatan+Gambir,+Kota+Jakarta+Pusat,+Daerah+Khusus+Ibukota+Jakarta/@-6.1753924,106.8271528,17z/data=!4m2!3m1!1s0x2e69f5d2e764b12d:0x3d2ad6e1e0e9bcc8', '2022/06/24', '10 sd swlese', 'Gedung', 'Jkt dong', 'https://www.google.com/maps/place/Monumen+Nasional,+Gambir,+Kecamatan+Gambir,+Kota+Jakarta+Pusat,+Daerah+Khusus+Ibukota+Jakarta/@-6.1753924,106.8271528,17z/data=!4m2!3m1!1s0x2e69f5d2e764b12d:0x3d2ad6e1e0e9bcc8', '2022-06-17 09:06:48', '2022-06-17 16:06:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_album`
--

CREATE TABLE `users_album` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `album` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_album`
--

INSERT INTO `users_album` (`id`, `id_user`, `album`) VALUES
(1, 1, 'album1'),
(2, 1, 'album2'),
(3, 1, 'album3'),
(4, 1, 'album4'),
(5, 1, 'album5'),
(6, 1, 'album6'),
(7, 1, 'album7'),
(8, 1, 'album8'),
(9, 1, 'album9'),
(10, 1, 'album10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_album_video`
--

CREATE TABLE `users_album_video` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `video` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_album_video`
--

INSERT INTO `users_album_video` (`id`, `id_user`, `video`) VALUES
(1, 1, 'https://youtu.be/86qGojD_DBA'),
(2, 2, ''),
(3, 3, ''),
(4, 4, ''),
(5, 5, ''),
(6, 6, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_cerita`
--

CREATE TABLE `users_cerita` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_cerita` varchar(50) NOT NULL,
  `judul_cerita` text NOT NULL,
  `isi_cerita` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_cerita`
--

INSERT INTO `users_cerita` (`id`, `id_user`, `tanggal_cerita`, `judul_cerita`, `isi_cerita`, `created_at`, `updated_at`) VALUES
(1, 1, '14 Januari 2020', 'Pertama bertemu', 'Waktu Pertama Kali\r\nKulihat Dirimu Hadir\r\nRasa hati ini inginkan dirimu ', '2021-12-10 12:50:24', '2022-03-03 23:30:11'),
(2, 1, '15 Maret 2020', 'Jatuh Cinta', 'Hati tenang mendengar \r\nsuara indah menyapa\r\nGeloranya hati ini\r\nTak ku sangka..', '2021-12-10 12:50:24', '2022-03-03 23:30:21'),
(3, 1, '1 Mei 2020', 'Ta\'aruf', 'Rasa ini.. tak tertahan..\r\nHati ini..slalu untukmu..', '2021-12-10 12:50:25', '2022-03-03 23:30:34'),
(4, 1, '16 Mei 2020', 'Khitbah', 'Terimalah lagu ini dari orang biasa\r\nTapi cintaku padamu luar biasa\r\nAku tak punya bunga\r\nAku tak punya harta\r\nYang ku punya hanyalah\r\nHati yang setia.. Tulus.. Padamu.. :)', '2021-12-10 12:50:25', '2022-03-03 23:30:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_doa_dan_ucapan`
--

CREATE TABLE `users_doa_dan_ucapan` (
  `doa_dan_ucapan_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `doa_dan_ucapan_nama_pengunjung` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doa_dan_ucapan_isi` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users_doa_dan_ucapan`
--

INSERT INTO `users_doa_dan_ucapan` (`doa_dan_ucapan_id`, `id_user`, `doa_dan_ucapan_nama_pengunjung`, `doa_dan_ucapan_isi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Aninda Safira', 'Alhamdulilah, selamat atas pernikahan kalian. Semoga pernikahan kalian dilimpahi oleh cinta, kebaikan dan kebahagiaan. Jazakallahu khairan khatira.. ???', '2020-08-23 15:10:31', '2020-08-29 11:41:35'),
(2, 1, 'Raisa Andriana', 'Selamat menikah sahabatku, ‘Barakallahu lakum wa baraka alaikum’ ', '2020-08-22 15:12:45', '2020-08-22 01:17:42'),
(3, 1, 'Anisa Rahma', 'Alhamdulillah.. Selamat ya. Semoga Allah Swt selalu melimpahkan rahmatNya untuk pernikahan kalian.', '2020-08-20 15:14:44', '2020-08-22 01:18:37'),
(4, 1, 'Maudy Ayunda', 'MasyaAllah.. Selamat buat kalian berdua ?? Barakallah', '2020-08-22 15:32:50', '2020-08-29 11:41:51'),
(5, 1, 'Citra Kirana', 'Baarakallahu laka wa baaraka ‘alaika wa jama’a bainakumaa fii khaiir.\r\n\r\nSemoga Allah memberikan keberkahan untukmu dan atasmu, serta semoga Dia mengumpulkan di antara kalian berdua dalam kebaikan. \r\n\r\n????', '2020-07-26 16:00:41', '2020-07-26 23:00:41'),
(6, 1, 'Nissya Sabyan', 'Semoga pernikahan kalian langgeng dan selalu dinaungi petunjuk Allah dalam setiap langkah.. Aamiin ??', '2020-07-26 16:03:18', '2020-07-26 23:03:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_mempelai`
--

CREATE TABLE `users_mempelai` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pria` varchar(50) NOT NULL,
  `nama_panggilan_pria` varchar(50) NOT NULL,
  `nama_ibu_pria` varchar(50) NOT NULL,
  `nama_ayah_pria` varchar(50) NOT NULL,
  `nama_wanita` varchar(50) NOT NULL,
  `nama_panggilan_wanita` varchar(50) NOT NULL,
  `nama_ibu_wanita` varchar(50) NOT NULL,
  `nama_ayah_wanita` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_mempelai`
--

INSERT INTO `users_mempelai` (`id`, `id_user`, `nama_pria`, `nama_panggilan_pria`, `nama_ibu_pria`, `nama_ayah_pria`, `nama_wanita`, `nama_panggilan_wanita`, `nama_ibu_wanita`, `nama_ayah_wanita`, `created_at`, `updated_at`) VALUES
(1, 1, 'Reynaldi Aditya Wisnu', 'Rey', 'Raisa Andriana', 'Hamish Daud', 'Khodijah Dinda Hauwu', 'Dinda', 'Kartika Putri', 'Usman Bin Yahya', '2020-07-26 14:16:43', '2021-12-10 21:00:23'),
(2, 2, 'Dewa Pratama', 'Dewa', 'Siti Saroni', 'Muhammad Abdul', 'Weni Sulastri', 'Weni', 'Nur Patimah', 'Sulaiman', '2022-06-16 07:30:58', '2022-06-16 14:30:58'),
(3, 3, 'Faisal Mardani', 'Faisal', 'Karina Mahaputri', 'Abdul Munir', 'Ayu Sulastri', 'Ayu', 'Ela Manusi', 'Budi Perkasa', '2022-06-16 07:40:22', '2022-06-16 14:40:22'),
(4, 4, 'Rifqi Utama', 'Rifqi', 'Sulastri', 'Udi Samono', 'Sonia Putri', 'Sonia', 'Lela Sumantri', 'Fauzan Budi', '2022-06-16 07:47:30', '2022-06-16 14:47:30'),
(5, 5, 'Hadi Perkasa', 'Hadi', 'Mauminah Putri', 'Abdul Kodir', 'Vivi Utami', 'Vivi', 'Sumini', 'Samanto Putro', '2022-06-16 07:53:19', '2022-06-16 14:53:19'),
(6, 6, 'Atta h', 'Atta', 'Ibu atta', 'Ayah atta', 'Aurel aja', 'Aurel', 'Ibu aurel', 'Ayah aurel', '2022-06-17 09:06:48', '2022-06-17 16:06:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_order`
--

CREATE TABLE `users_order` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `domain` varchar(50) NOT NULL,
  `domain_jml_diubah` int(1) NOT NULL DEFAULT 1,
  `theme` varchar(50) NOT NULL,
  `musik` varchar(200) NOT NULL DEFAULT 'musik.mp3',
  `status` int(11) NOT NULL,
  `paket_id` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_order`
--

INSERT INTO `users_order` (`id`, `id_user`, `domain`, `domain_jml_diubah`, `theme`, `musik`, `status`, `paket_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'demo', 2, '8', 'Anna Uhibbuka Fillah by Rita dan Dhimas.mp3', 2, 3, '2020-07-26 14:16:43', '2022-06-16 17:30:39'),
(2, 2, 'wedew', 1, '2', 'musik.mp3', 4, 1, '2022-06-16 07:30:58', '2022-06-19 16:10:17'),
(3, 3, 'ayufaisal', 1, '9', 'musik.mp3', 4, 1, '2022-06-16 07:40:22', '2022-06-19 16:10:57'),
(4, 4, 'rifqisonia', 1, '8', 'musik.mp3', 4, 1, '2022-06-16 07:47:30', '2022-06-19 16:11:05'),
(5, 5, 'vivihadi', 1, '1', 'musik.mp3', 4, 1, '2022-06-16 07:53:19', '2022-06-19 16:11:10'),
(6, 6, 'attaaurel', 1, '2', 'musik.mp3', 4, 1, '2022-06-17 09:06:48', '2022-06-19 16:28:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_order_pembayaran`
--

CREATE TABLE `users_order_pembayaran` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `invoice` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_paket_saat_itu` double NOT NULL,
  `paket_limit_waktu_saat_itu` int(2) NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bank` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users_order_pembayaran`
--

INSERT INTO `users_order_pembayaran` (`id`, `id_user`, `invoice`, `biaya_paket_saat_itu`, `paket_limit_waktu_saat_itu`, `nama_lengkap`, `nama_bank`, `bukti`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '0', 0, 0, 'Demo', 'Bri Syariah', '2007155.png', 2, '2020-08-26 01:36:07', '2022-02-21 02:26:00'),
(2, 2, '2206240', 0, 2, '', '', '', 4, '2022-06-16 07:30:58', '2022-06-19 09:10:17'),
(3, 3, '2206386', 0, 2, '', '', '', 4, '2022-06-16 07:40:22', '2022-06-19 09:10:57'),
(4, 4, '2206487', 0, 2, '', '', '', 4, '2022-06-16 07:47:30', '2022-06-19 09:11:05'),
(5, 5, '2206562', 0, 2, '', '', '', 4, '2022-06-16 07:53:19', '2022-06-19 09:11:10'),
(6, 6, '2206645', 0, 2, '', '', '', 4, '2022-06-17 09:06:48', '2022-06-19 09:28:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_pengunjung`
--

CREATE TABLE `users_pengunjung` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pengunjung` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users_pengunjung`
--

INSERT INTO `users_pengunjung` (`id`, `id_user`, `nama_pengunjung`, `addr`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tamu Undangan', '114.125.14.251', '2022-06-16 06:59:50', '2022-06-16 13:59:50'),
(2, 4, 'Unknown', '114.125.14.251', '2022-06-16 07:47:47', '2022-06-16 14:47:47'),
(3, 4, 'Unknown', '114.125.14.251', '2022-06-16 07:47:50', '2022-06-16 14:47:50'),
(4, 4, 'Dewi', '114.125.14.251', '2022-06-16 07:48:00', '2022-06-16 14:48:00'),
(5, 2, 'Unknown', '114.125.12.99', '2022-06-16 10:24:58', '2022-06-16 17:24:58'),
(6, 2, 'Unknown', '114.125.12.99', '2022-06-16 10:25:00', '2022-06-16 17:25:00'),
(7, 1, 'Unknown', '114.125.12.99', '2022-06-16 10:25:39', '2022-06-16 17:25:39'),
(8, 1, 'Unknown', '114.125.12.99', '2022-06-16 10:25:40', '2022-06-16 17:25:40'),
(9, 1, 'Nama Undangan', '114.125.12.99', '2022-06-16 10:28:22', '2022-06-16 17:28:22'),
(10, 1, 'Nama Undangan', '114.125.12.99', '2022-06-16 10:29:57', '2022-06-16 17:29:57'),
(11, 1, 'Nama Undangan', '114.125.12.99', '2022-06-16 10:30:50', '2022-06-16 17:30:50'),
(12, 1, 'Nama Undangan', '114.125.12.99', '2022-06-16 10:31:20', '2022-06-16 17:31:20'),
(13, 1, 'Nama Undangan', '114.125.12.99', '2022-06-16 10:31:34', '2022-06-16 17:31:34'),
(14, 1, 'Nama Undangan', '114.125.12.99', '2022-06-16 10:31:36', '2022-06-16 17:31:36'),
(15, 3, 'Unknown', '103.169.254.35', '2022-06-16 11:13:29', '2022-06-16 18:13:29'),
(16, 3, 'Unknown', '103.169.254.35', '2022-06-16 11:13:32', '2022-06-16 18:13:32'),
(17, 6, 'Unknown', '114.142.169.63', '2022-06-17 09:07:02', '2022-06-17 16:07:02'),
(18, 6, 'Unknown', '114.142.169.63', '2022-06-17 09:07:05', '2022-06-17 16:07:05'),
(19, 6, 'Unknown', '114.142.169.63', '2022-06-17 09:08:55', '2022-06-17 16:08:55'),
(20, 6, 'Unknown', '114.142.169.63', '2022-06-17 09:08:57', '2022-06-17 16:08:57'),
(21, 2, 'Unknown', '114.142.169.63', '2022-06-17 09:48:49', '2022-06-17 16:48:49'),
(22, 1, 'Unknown', '114.142.169.63', '2022-06-17 09:49:23', '2022-06-17 16:49:23'),
(23, 5, 'Unknown', '114.142.169.63', '2022-06-17 09:49:48', '2022-06-17 16:49:48'),
(24, 6, 'Unknown', '182.1.0.230', '2022-06-17 10:27:11', '2022-06-17 17:27:11'),
(25, 6, 'Unknown', '182.1.0.230', '2022-06-17 10:27:12', '2022-06-17 17:27:12'),
(26, 2, 'Unknown', '182.1.124.228', '2022-06-18 13:56:44', '2022-06-18 20:56:44'),
(27, 2, 'Unknown', '182.1.124.228', '2022-06-18 13:56:47', '2022-06-18 20:56:47'),
(28, 2, 'Unknown', '180.252.80.130', '2022-06-18 13:57:24', '2022-06-18 20:57:24'),
(29, 2, 'Unknown', '180.252.80.130', '2022-06-18 13:57:25', '2022-06-18 20:57:25'),
(30, 2, 'Unknown', '182.1.51.143', '2022-06-19 08:36:40', '2022-06-19 15:36:40'),
(31, 2, 'Unknown', '182.1.51.143', '2022-06-19 08:36:44', '2022-06-19 15:36:44'),
(32, 3, 'Unknown', '182.1.51.143', '2022-06-19 08:36:59', '2022-06-19 15:36:59'),
(33, 3, 'Unknown', '182.1.51.143', '2022-06-19 08:37:02', '2022-06-19 15:37:02'),
(34, 6, 'Unknown', '182.1.51.143', '2022-06-19 08:37:16', '2022-06-19 15:37:16'),
(35, 6, 'Unknown', '182.1.51.143', '2022-06-19 08:37:17', '2022-06-19 15:37:17'),
(36, 2, 'Unknown', '127.0.0.1', '2022-06-19 08:59:22', '2022-06-19 15:59:22'),
(37, 2, 'Unknown', '127.0.0.1', '2022-06-19 08:59:25', '2022-06-19 15:59:25'),
(38, 2, 'Unknown', '127.0.0.1', '2022-06-19 09:06:28', '2022-06-19 16:06:28'),
(39, 2, 'Unknown', '127.0.0.1', '2022-06-19 09:06:28', '2022-06-19 16:06:28'),
(40, 2, 'Unknown', '127.0.0.1', '2022-06-19 09:06:34', '2022-06-19 16:06:34'),
(41, 2, 'Unknown', '127.0.0.1', '2022-06-19 09:06:34', '2022-06-19 16:06:34'),
(42, 2, 'Unknown', '127.0.0.1', '2022-06-19 09:09:31', '2022-06-19 16:09:31'),
(43, 2, 'Unknown', '127.0.0.1', '2022-06-19 09:09:31', '2022-06-19 16:09:31'),
(44, 2, 'Unknown', '127.0.0.1', '2022-06-19 09:10:02', '2022-06-19 16:10:02'),
(45, 2, 'Unknown', '127.0.0.1', '2022-06-19 09:10:02', '2022-06-19 16:10:02'),
(46, 1, 'Unknown', '127.0.0.1', '2022-06-19 09:11:14', '2022-06-19 16:11:14'),
(47, 1, 'Unknown', '127.0.0.1', '2022-06-19 09:11:16', '2022-06-19 16:11:16'),
(48, 6, 'Unknown', '127.0.0.1', '2022-06-19 09:16:58', '2022-06-19 16:16:58'),
(49, 6, 'Unknown', '127.0.0.1', '2022-06-19 09:16:59', '2022-06-19 16:16:59'),
(50, 6, 'Unknown', '127.0.0.1', '2022-06-19 09:18:39', '2022-06-19 16:18:39'),
(51, 6, 'Unknown', '127.0.0.1', '2022-06-19 09:18:40', '2022-06-19 16:18:40'),
(52, 6, 'Unknown', '127.0.0.1', '2022-06-19 09:23:43', '2022-06-19 16:23:43'),
(53, 6, 'Unknown', '127.0.0.1', '2022-06-19 09:23:43', '2022-06-19 16:23:43'),
(54, 6, 'Unknown', '127.0.0.1', '2022-06-19 09:23:59', '2022-06-19 16:23:59'),
(55, 6, 'Unknown', '127.0.0.1', '2022-06-19 09:24:00', '2022-06-19 16:24:00'),
(56, 6, 'Unknown', '127.0.0.1', '2022-06-19 09:24:02', '2022-06-19 16:24:02'),
(57, 6, 'Unknown', '127.0.0.1', '2022-06-19 09:24:03', '2022-06-19 16:24:03'),
(58, 6, 'Unknown', '127.0.0.1', '2022-06-19 09:27:02', '2022-06-19 16:27:02'),
(59, 6, 'Unknown', '127.0.0.1', '2022-06-19 09:27:03', '2022-06-19 16:27:03'),
(60, 6, 'Unknown', '127.0.0.1', '2022-06-19 09:27:06', '2022-06-19 16:27:06'),
(61, 6, 'Unknown', '127.0.0.1', '2022-06-19 09:27:06', '2022-06-19 16:27:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_testimoni`
--

CREATE TABLE `users_testimoni` (
  `testimoni_id` int(11) NOT NULL,
  `testimoni_isi` varchar(255) NOT NULL,
  `testimoni_rating` tinyint(1) NOT NULL,
  `testimoni_status` enum('Aktif','Tidak Aktif') NOT NULL,
  `testimoni_keterangan` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_testimoni`
--

INSERT INTO `users_testimoni` (`testimoni_id`, `testimoni_isi`, `testimoni_rating`, `testimoni_status`, `testimoni_keterangan`, `id_user`, `update_at`) VALUES
(1, 'Keren dan sangat menarik, bikinnya mudah, cepat serta bisa custom sendiri.', 5, 'Aktif', '', 1, '2022-03-03 16:00:29'),
(2, 'Mulanya saat diberitahu temen kaget... apaan kok undangan wedding pake kayak gitu... eee.. setelah dibuka, pengen pake gituan... dan respon temen2 .. luar biasa..', 5, 'Aktif', '', 2, '2022-06-16 07:33:06'),
(3, 'Terima kasih UDO! Sebelumnya ga pernah terpikir menggunakan undangan online berbasis web karena dirasa akan lebih efektif menggunakan messenger. Tapi, setelah kami tau UDO, akhirnya kami memutuskan untuk pake UDO. ', 5, 'Aktif', '', 3, '2022-06-16 07:41:44'),
(4, 'Keren banget UDO tks udh menjadi bagian dari pernikahansaya. Bener2 ngebantu banget fitur bagus dan lengkap padahal free.. semoga UDO makin berkembang dan sukses trsju.. serta banyak bantu pasangan2 yg mau nikah dg low budget. Sekali lagi tks UDO', 5, 'Aktif', '', 4, '2022-06-16 07:49:16'),
(5, 'Bagus sangat, the best dah pokoknya ga nyesel menggunakan undangan digital ini, terimakasih sudah membatu pernikahan kami dengan mudah ?? Semoga UDO makin sukses dan makin banyak yg menggunakan nya saling menguntungkan buat pengantin dan aplikasi nya.', 5, 'Aktif', '', 5, '2022-06-16 07:55:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_upgrade_paket`
--

CREATE TABLE `users_upgrade_paket` (
  `upgrade_paket_id` int(11) NOT NULL,
  `upgrade_paket_id_user` int(11) NOT NULL,
  `upgrade_paket_paket_sebelumnya` int(2) NOT NULL,
  `upgrade_paket_paket_diajukan` int(2) NOT NULL,
  `upgrade_paket_invoice` varchar(50) NOT NULL,
  `upgrade_paket_biaya_saat_itu` double NOT NULL,
  `upgrade_paket_nama_lengkap` varchar(100) NOT NULL,
  `upgrade_paket_nama_bank` varchar(100) NOT NULL,
  `upgrade_paket_bukti` varchar(200) NOT NULL,
  `upgrade_paket_status_konfirmasi` enum('SUDAH','BELUM') NOT NULL DEFAULT 'BELUM',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_upgrade_paket`
--

INSERT INTO `users_upgrade_paket` (`upgrade_paket_id`, `upgrade_paket_id_user`, `upgrade_paket_paket_sebelumnya`, `upgrade_paket_paket_diajukan`, `upgrade_paket_invoice`, `upgrade_paket_biaya_saat_itu`, `upgrade_paket_nama_lengkap`, `upgrade_paket_nama_bank`, `upgrade_paket_bukti`, `upgrade_paket_status_konfirmasi`, `created_at`) VALUES
(1, 3, 1, 2, 'upgrade_1_2_3', 25000, 'Tes', 'Tes', 'upgrade_1_2_3.png', 'BELUM', '2022-06-16 07:43:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `website_umum`
--

CREATE TABLE `website_umum` (
  `website_id` int(11) NOT NULL,
  `website_nama` varchar(255) NOT NULL,
  `website_isi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `website_umum`
--

INSERT INTO `website_umum` (`website_id`, `website_nama`, `website_isi`) VALUES
(1, 'Judul Website', 'Undangan Digital Online'),
(2, 'Tagline Website', 'Undangan Pernikahan Digital Gratis'),
(3, 'Deskripsi Website', 'Undangan pernikahan online gratis dengan pilihan desain yang menarik,buat dan bagikan undangan pernikahan kamu dengan berbagai pilihan tampilan undangan yang menarik dan pastinya gratis hanya di sini.'),
(4, 'Kata Kunci', 'Website Wedding , template undangan pernikahan online , undannganonline, undangan online web free , undangan tunangan online , link undangan pernikahan , membuat undangan pernikahan online,buat undangan digital gratis, membuat undangan pernikahan online gratis ,website pernikahan online gratis, undangan web , akanikah , akan nikah , undangan online gratis , undangan nikah online , undangan online pernikahan , undangan online, website wedding free , undangan gratis , buat undangan online , buat undangan , undangan online free, undangan gratis, free website, akan nikah , website akanikah , akanikah website , akan nikah website, undangan digital , tema undangan pernikahan, tema undangan digital, undangan pernikahan digital gratis, undangan pernikahan murah'),
(5, 'Nama Pemilik Website', 'Zonacerdas'),
(6, 'Id Fans Page Facebook', ''),
(7, 'Facebook Domain Verifikasi', ''),
(8, 'FB Share Judul', 'Undangan Pernikahan Digital Gratis'),
(9, 'FB Share Deskripsi', 'Undangan pernikahan online gratis dengan pilihan desain yang menarik,buat dan bagikan undangan pernikahan kamu dengan berbagai pilihan tampilan undangan yang menarik dan pastinya gratis hanya di sini.'),
(10, 'FB Share Url', ''),
(11, 'FB Share Gambar', '/assets/base/img/thumbnails.png'),
(12, 'FB Share Gambar Lebar', '851'),
(13, 'FB Share Gambar Tinggi', '315'),
(14, 'Credits Tahun Mulai', '2022'),
(15, 'Credits Keterangan', 'under the management of <a href=\'https://www.zonacerdas.net\' rel=\'dofollow\' target=\'_blank\'>Zonacerdas.</a>'),
(16, 'Tema Website', 'Happy'),
(17, 'Tema Website Tombol di Home                                    ', 'Aktif'),
(18, 'Tema Website Yang Tersedia', 'Biru,OlMop,Purple,Sunny,Happy'),
(19, '', ''),
(20, 'Recaptcha Status', 'Aktif'),
(21, 'Recaptcha data-sitekey', '6LdNxaEeAAAAADODTxhJOMYKn5hkRGZWM7XTPpQk'),
(22, 'Recaptcha secret_key', '6LdNxaEeAAAAAJajqS7y86-8oz1WtWwqMdLpL2si');

-- --------------------------------------------------------

--
-- Struktur dari tabel `website_widget`
--

CREATE TABLE `website_widget` (
  `widget_id` int(2) NOT NULL,
  `widget_posisi` varchar(500) NOT NULL,
  `widget_judul` varchar(500) NOT NULL,
  `widget_isi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `website_widget`
--

INSERT INTO `website_widget` (`widget_id`, `widget_posisi`, `widget_judul`, `widget_isi`) VALUES
(1, 'home_footer_kiri', 'Tentang Kami', 'Website ini merupakan layanan jasa pembuatan Undangan Pernikahan Online yang dapat di kirim melalui Whatsapp. Kirim undangan pernikahan mudah, cepat dan irit biaya. Tersedia banyak model template undangan pernikahan yang dapat digunakan dengan mudah.'),
(2, 'home_footer_tengah', 'Undangan Pernikahan Digital', 'link'),
(3, 'home_footer_kanan', 'Kontak', 'link'),
(4, 'home_testimoni', 'Apa Kata Mereka?', ''),
(5, 'home_tema', 'Tema', 'Tersedia banyak pilihan tema undangan yang menarik untuk pernikahanmu...'),
(6, 'home_paket_udo', 'Harga', '<h2 class=\"judul\">Harga Termurah!</h2><p class=\"lead subjudul\">SELAMA PANDEMI, Dengan harga terjangkau anda sudah mendapatkan halaman website, manajemen tamu, cerita, komentar, peta lokasi, dan buku tamu digital!.</p>'),
(7, 'home_fitur', 'Fitur', ''),
(8, 'home_cover', '', 'Undangan pernikahan lebih hemat, praktis, dan kekinian dengan url undangan yang disebar otomatis untuk memberikan kesan terbaik.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `website_widget_links`
--

CREATE TABLE `website_widget_links` (
  `widget_links_id` int(11) NOT NULL,
  `widget_id` int(2) NOT NULL,
  `widget_links_icon` varchar(255) NOT NULL,
  `widget_links_judul` varchar(500) NOT NULL,
  `widget_links_deskripsi` longtext NOT NULL,
  `widget_links_url` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `website_widget_links`
--

INSERT INTO `website_widget_links` (`widget_links_id`, `widget_id`, `widget_links_icon`, `widget_links_judul`, `widget_links_deskripsi`, `widget_links_url`) VALUES
(1, 2, 'fa-solid fa-cart-shopping', 'Buat Undangan', '', 'tema'),
(2, 2, 'fa-solid fa-right-to-bracket', 'Dashboard', '', 'login'),
(3, 2, 'fa-solid fa-map', 'Tutorial Map', '', 'maps'),
(4, 2, 'fa-brands fa-youtube', 'Tutorial Youtube', '', 'youtube'),
(5, 3, 'fa-brands fa-whatsapp', '+6282173020446', '', 'https://api.whatsapp.com/send?phone=+6282173020446&text=Halo%20Kak%20Fikri,%20saya%20mau%20tanya-tanya%20tentang%20Undangan%20Digital%20Online%20:D'),
(6, 3, 'fa-brands fa-instagram', 'Zonacerdas', '', 'https://www.instagram.com/zonacerdas'),
(7, 3, 'fa-brands fa-facebook-f', 'Zonacerdas', '', 'https://www.facebook.com/zonacerdas.net/'),
(8, 5, '', 'Lihat Semua', '', 'tema'),
(9, 6, '', 'Pesan Sekarang', '', 'tema'),
(10, 7, 'assets/base/img/icons/gift.svg', 'Website Selalu Aktif', 'Website yang cepat dan aman akan aktif tanpa ada batasan waktu.', ''),
(11, 7, 'assets/base/img/icons/cloud.svg', 'Ubah Tampilan', 'Desain web dan undangan dapat kamu ubah sesuka hati sesuai keinginan.', ''),
(12, 7, 'assets/base/img/icons/map-pin.svg', 'Do\'a dan Ucapan', 'Para tamu dapat memberikan doa dan ucapan langsung di profile website undanganmu.', ''),
(13, 7, 'assets/base/img/icons/layers.svg', 'Cerita', 'Tuangkan cerita perjalanan cinta anda kepada tamu undangan.', ''),
(14, 7, 'assets/base/img/icons/life-buoy.svg', 'Layar Sapa', 'Setiap tamu yang hadir dapat disapa saat menerima undangan.', ''),
(15, 7, 'assets/base/img/icons/layout.svg', 'Kirim Undangan', 'Kamu bisa menggunakan WhatsApp untuk mengirimkan undangan.', ''),
(16, 8, '', 'Buat Undangan', '', 'order'),
(17, 8, '', 'Lihat Demo', '', 'tema');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sistem`
--
ALTER TABLE `sistem`
  ADD PRIMARY KEY (`sistem_id`);

--
-- Indeks untuk tabel `undangan_bank`
--
ALTER TABLE `undangan_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indeks untuk tabel `undangan_fitur`
--
ALTER TABLE `undangan_fitur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `undangan_musik`
--
ALTER TABLE `undangan_musik`
  ADD PRIMARY KEY (`musik_id`);

--
-- Indeks untuk tabel `undangan_paket`
--
ALTER TABLE `undangan_paket`
  ADD PRIMARY KEY (`paket_id`);

--
-- Indeks untuk tabel `undangan_pengaturan`
--
ALTER TABLE `undangan_pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `undangan_sepatah_kata`
--
ALTER TABLE `undangan_sepatah_kata`
  ADD PRIMARY KEY (`sepatah_kata_id`);

--
-- Indeks untuk tabel `undangan_tema`
--
ALTER TABLE `undangan_tema`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_acara`
--
ALTER TABLE `users_acara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_album`
--
ALTER TABLE `users_album`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_album_video`
--
ALTER TABLE `users_album_video`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_cerita`
--
ALTER TABLE `users_cerita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_doa_dan_ucapan`
--
ALTER TABLE `users_doa_dan_ucapan`
  ADD PRIMARY KEY (`doa_dan_ucapan_id`);

--
-- Indeks untuk tabel `users_mempelai`
--
ALTER TABLE `users_mempelai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_order`
--
ALTER TABLE `users_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_order_pembayaran`
--
ALTER TABLE `users_order_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_pengunjung`
--
ALTER TABLE `users_pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_testimoni`
--
ALTER TABLE `users_testimoni`
  ADD PRIMARY KEY (`testimoni_id`);

--
-- Indeks untuk tabel `users_upgrade_paket`
--
ALTER TABLE `users_upgrade_paket`
  ADD PRIMARY KEY (`upgrade_paket_id`);

--
-- Indeks untuk tabel `website_umum`
--
ALTER TABLE `website_umum`
  ADD PRIMARY KEY (`website_id`);

--
-- Indeks untuk tabel `website_widget`
--
ALTER TABLE `website_widget`
  ADD PRIMARY KEY (`widget_id`);

--
-- Indeks untuk tabel `website_widget_links`
--
ALTER TABLE `website_widget_links`
  ADD PRIMARY KEY (`widget_links_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sistem`
--
ALTER TABLE `sistem`
  MODIFY `sistem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `undangan_bank`
--
ALTER TABLE `undangan_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `undangan_fitur`
--
ALTER TABLE `undangan_fitur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `undangan_musik`
--
ALTER TABLE `undangan_musik`
  MODIFY `musik_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `undangan_paket`
--
ALTER TABLE `undangan_paket`
  MODIFY `paket_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `undangan_pengaturan`
--
ALTER TABLE `undangan_pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `undangan_sepatah_kata`
--
ALTER TABLE `undangan_sepatah_kata`
  MODIFY `sepatah_kata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `undangan_tema`
--
ALTER TABLE `undangan_tema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users_acara`
--
ALTER TABLE `users_acara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users_album`
--
ALTER TABLE `users_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users_album_video`
--
ALTER TABLE `users_album_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users_cerita`
--
ALTER TABLE `users_cerita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users_doa_dan_ucapan`
--
ALTER TABLE `users_doa_dan_ucapan`
  MODIFY `doa_dan_ucapan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users_mempelai`
--
ALTER TABLE `users_mempelai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users_order`
--
ALTER TABLE `users_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users_order_pembayaran`
--
ALTER TABLE `users_order_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users_pengunjung`
--
ALTER TABLE `users_pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `users_testimoni`
--
ALTER TABLE `users_testimoni`
  MODIFY `testimoni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users_upgrade_paket`
--
ALTER TABLE `users_upgrade_paket`
  MODIFY `upgrade_paket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `website_umum`
--
ALTER TABLE `website_umum`
  MODIFY `website_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `website_widget`
--
ALTER TABLE `website_widget`
  MODIFY `widget_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `website_widget_links`
--
ALTER TABLE `website_widget_links`
  MODIFY `widget_links_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
