-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Nov 2020 pada 16.37
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko_buku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(120) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul_buku`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(1, 'Pemrograman Web ', 'TERMURAH ORIGINAL Buku Modul Pemrograman Web HTML Php dan MySQL Terbaru', 'Pemrograman', 135000, 8, 'pemrograman web.jpg'),
(2, 'Daun yang Jatuh Tak Pernah Membenci Angin ', 'Tanggal Terbit : 16 Apr 2018,  ISBN : 9786020331607,  Bahasa : Indonesia,  Penerbit : Gramedia Pustaka Utama ', 'Novel', 69000, 7, '9786020331607_Daun-yang-Jatuh-Tak-Pernah-Membenci-Angin-Cover-Baru-2018.jpg'),
(5, 'Si Anak Badai', 'Tanggal Terbit : 31 Jul 2019,  ISBN : 9786025734939,  Bahasa : Indonesia,  Penerbit : Republika Penerbit', 'Novel', 70000, 4, '9786025734939_Si-Anak-Badai.jpg'),
(6, 'Negeri di Ujung Tanduk', 'Tanggal Terbit : 7 Mei 2018,  ISBN : 9789792294293,  Bahasa : Indonesia,  Penerbit : Gramedia Pustaka Utama', 'Novel', 85000, 12, '9789792294293_Negeri-di-Uju.jpg'),
(7, 'Dikatakan atau Tidak Dikatakan Itu Tetap Cinta', 'Tanggal Terbit : 28 Nov 2016,  ISBN : 9786020332833,  Bahasa : Indonesia,  Penerbit : Gramedia Pustaka Utama', 'Novel', 77000, 20, '9786020332833_dikatakan-atau-tidak-dikatakan-itu-tetap-cinta---hard-cover.jpg'),
(8, 'Menguasai Pemrograman Berorientasi Objek +Cd', 'Tanggal Terbit : 8 Feb 2020,  ISBN : 9786237131236,  Bahasa : Indonesia,  Penerbit : Informatika', 'Pemrograman', 125000, 15, 'menguasai_pemrograman.jpg'),
(9, 'Belajar Otodidak Bahasa Pemrograman Sql Menggunakan Mariadb', 'Tanggal Terbit : 16 Jun 2020,  ISBN : 9786237498476,  Bahasa : Indonesia,  Penerbit : Gava Media', 'Pemrograman', 51000, 5, 'SQL.jpg'),
(10, 'Mahir Bahasa Pemrograman PHP', 'Tanggal Terbit : 20 Mei 2019,  ISBN : 9786020498768,  Bahasa : Indonesia,  Penerbit : Elex Media Komputindo', 'Pemrograman', 60800, 11, '9786020498768_Mahir_Bahasa_.jpg'),
(11, 'Soekarno: Sebuah Biografi', 'Tanggal Terbit : 3 Des 2019,  ISBN : 9786232440074,  Bahasa : Indonesia,  Penerbit : Roemah Soekarno', 'Biografi', 69000, 24, 'soekarno.jpg'),
(12, 'Biografi Imam Al-Ghazali', 'Tanggal Terbit : 1 Okt 2019,  ISBN : 9786025547614,  Bahasa : Indonesia,  Penerbit : Qaf Media Kreativa', 'Biografi', 50000, 2, '9786025547614.jpg'),
(13, 'Biografi Umar Bin Al Khathab', 'Tanggal Terbit : 30 Okt 2018,  ISBN : 9789795926412,  Bahasa : Indonesia,  Penerbit : Pustaka Al Kautsar', 'Biografi', 165000, 8, 'img20200720_15535433.jpg'),
(14, 'Biografi Politik Habibie : Dari Malari Sampai Reformasi', 'Tanggal Terbit : 13 Apr 2017,  ISBN : 9789799116048,  Bahasa : Indonesia,  Penerbit : Media Pressindo', 'Biografi', 95000, 6, '9789799116048_biografi-politik-habibie-dari-malari-sampai-reformasi.jpg'),
(15, 'Komik Horor Nusantara: Setan Lokal', 'Tanggal Terbit : 9 Mar 2020,  ISBN : 9786024813475,  Bahasa : Indonesia,  Penerbit : Kepustakaan Populer Gramedia', 'Komik', 83000, 13, '9786024813475_Komik_Horor_Nusantara_Lokal__Page_1.jpg'),
(16, 'Komik Next G Misteri Gubuk Tua', 'Tanggal Terbit : 5 Agt 2020,  ISBN : 9786023678440,  Bahasa : Indonesia,  Penerbit : Curhat Anak Bangsa', 'Komik', 36000, 14, 'Misteri_Gubuk_Tua.jpg'),
(17, 'Komik Kkpk : Camera Phobia', 'Tanggal Terbit : 10 Mar 2020,  ISBN : 9786232540231,  Bahasa : Indonesia,  Penerbit : Curhat Anak Bangsa', 'Komik', 35000, 21, 'komik-kkpk-camera-phobia.jpg'),
(18, 'Komik Kelurga Muslim (Perpingkot)', 'Tanggal Terbit : 20 Jul 2030,  ISBN : 9786021695579,  Penerbit : Salsabila', 'Komik', 75000, 15, '9786021695579.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hadiah`
--

CREATE TABLE `tb_hadiah` (
  `id_hadiah` int(11) NOT NULL,
  `nama_hadiah` varchar(150) NOT NULL,
  `ringkasan` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `points` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_hadiah`
--

INSERT INTO `tb_hadiah` (`id_hadiah`, `nama_hadiah`, `ringkasan`, `deskripsi`, `points`, `stok`, `gambar`) VALUES
(1, 'Samsung Galaxy Note9 Smartphone [8 GB / 512 GB]', 'Prosesor : Exynos 9810 Octa-Core (2.7GHz Quad + 1.7GHz Quad), 64 bit, 10nm', 'Belakangan sudah ramai dibicarakan jika Samsung segera merilis flagship phone terbarunya, Samsung Galaxy Note 9. Dan tepat di minggu ke-2 bulan Agustus smartphone ini resmi diluncurkan. Kabar terbarunya ponsel ini dibekali dengan beberapa pembaruan, semisal fungsi S Pen yang lebih atraktif, kapasitas memori penyimpanan yang lebih leluasa, dan tentunya kinerja prosesor yang powerful. Selain itu, masih ada hal lain yang terbilang cukup istimewa dari Smartphone Galaxy Note 9, diantaranya desain handphone yang kelihatan premium, panel layar OLED 6,3 inch dan kemera ponsel yang didukung kecerdasan buatan (AI). Begitupun dengan perbekalan baterai yang dititipkan berkapasitas 4000 mAh.', 50, 5, 'hpsamsung.jpeg'),
(3, 'Samsung Galaxy Note10 Smartphone [8 GB / 256 GB]', 'Prosesor : S5E9825(Exynos 9825) Octa-core (2.7GHz + 2.4GHz + 1.9GHz Quad), 64 bit, 7nm processor', 'Samsung Galaxy Note 10 merupakan android dari Samsung dengan ukuran layar 6.3 Inch. Dengan tipe display Dynamic AMOLED 2280 x 1080 (FHD+) 401 ppi, 19:9, memiliki kamera utama 12MP OIS (F1.5/F2.2 Dual Pixel, Dual Aperture), UHD, Autofocus + 16MP (F2.2) + 12MP (F2.1), dan kamera depan 10MP OIS (F2.2 Dual Pixel), Autofocus. Dengan daya baterai Non-removable Li-Ion 3500 mAh, Super Fast Charging & Fast Wireless Charging 2.0.', 30, 10, '20200123154941440296330e17184ac7d83418440abcf2.jpg'),
(4, 'Samsung Galaxy A50s Smartphone [6 GB / 128GB]', 'Processor : Ramen+ Octa-Core, On-Screen Fingerprint, Ukuran Layar : 6.4 Inch FHD+ sAMOLED Infinity, 6 GB RAM, 128 GB ROM', 'Samsung Galaxy A50s merupakan smartphone yang dibakali layar 6.4 Inch ini tentu terlihat lebih premium jika dibandingkan dengan pendahulunya. Bahkan yang menarik sekarang A50s sudah menerapkan sistem keamanan On-Screen Fingerprint. Tidak hanya itu, untuk potret gambar dan rekaman video yang menjanjikan maka dibalakangnya telah didukung dengan triple lensa 48 MP + 5 MP + 8 MP. Sedangkan untuk kebutuhan selfienya Samsung membekali smartphone ini dengan kamera 32 MP. Dapat dipastikan kebutuhan sehari-hari seperti browsing, chatting, dan sosial media akan tercukupi karena ponsel ini memiliki baterai berkapasitas 4000 mAh. ', 25, 20, '2020012315364672337ea35f5b2b4eb974096dc7639716.jpg'),
(5, 'Xiaomi Redmi Note 9', 'Prosessor MTK Helio G85, RAM 6 GB, ROM 128 GB', 'Xiaomi Redmi Note 9 Smartphone, hadir dengan layar berukuran 6.53 Inch dan memiliki resolusi 2340x1080 FHD+. Smartphone ini juga didukung dengan prosesor MTK Helio G85, serta sistem operasi Android 10 MIUI 11.', 15, 50, '2020082815321226acee15e38d8d40ec505810bfa8de31.jpg'),
(6, 'Xiaomi Mi True Wireless Earbuds Basic', 'Koneksi berkecepatan tinggi Bluetooth 5.0', 'Mi True Wireless Earbuds Basic adalah sepasang earbud True Wireless, yang berarti bahwa mereka tidak terhubung dengan kabel atau kawat, tetapi cara penggunaannya masih cukup sederhana. Mereka menggunakan teknologi Bluetooth 5.0 untuk koneksi kecepatan tinggi. Cukup pakai di telingamu dan musik siap untuk didengarkan.', 10, 6, '202001231624167f3df834e3100641f89d6df0a5a4f3c2.jpg'),
(7, 'Jaket Hoodie Dicoding', 'Jaket Hoodie Bahan Katun Berkualitas', 'Jaket Hoodie Dicoding eksklusif ini merupakan edisi terbatas dan siap dikirim langsung ke alamat di Indonesia.', 10, 5, '20190418095109912b2b1958f78bcabdca5711f0a89c36.jpg'),
(8, 'T-shirt Dicoding Graduate', 'Eksklusif khusus lulusan academy', 'T-shirt eksklusif edisi terbatas ini hanya dapat di-redeem oleh developer yang telah berhasil lulus salah satu academy dicoding*. Tersedia dalam ukuran XS, S, M, L, XL, dan XXL. T-shirt akan dikirim langsung ke alamat di Indonesia.', 5, 50, '20200904163953d00d19d16879f804a3b91a64378f9570.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `jasa_kirim` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `id_user`, `nama`, `alamat`, `no_telp`, `jasa_kirim`, `bank`, `tgl_pesan`, `batas_bayar`, `points`) VALUES
(21, 2, 'user', '', '', '', '', '2020-10-30 14:04:28', '2020-10-31 14:04:28', 5),
(22, 2, 'user', '', '', '', '', '2020-10-30 14:08:09', '2020-10-31 14:08:09', 5),
(23, 2, 'user', 'Bekasi, Jawa Barat', '085211345481', 'TIKI', 'BNI - XXXXXXX', '2020-10-30 15:40:25', '2020-10-31 15:40:25', 5),
(24, 2, 'user', 'TEST1', '1', 'JNE', 'BCA - XXXXXXX', '2020-10-30 15:44:22', '2020-10-31 15:44:22', 5),
(25, 2, 'user', 'TEST2', '2', 'TIKI', 'BNI - XXXXXXX', '2020-10-30 15:47:32', '2020-10-31 15:47:32', 5),
(26, 2, 'user', 'TEST3', '3', 'Pos Indonesia', 'BRI - XXXXXXX', '2020-10-30 15:48:16', '2020-10-31 15:48:16', 5),
(27, 2, 'user', 'test4', '4', 'Gojek', 'Mandiri - XXXXXXX', '2020-10-30 15:50:01', '2020-10-31 15:50:01', 5),
(28, 2, 'user', 'test5', '5', 'Grab', 'Mandiri - XXXXXXX', '2020-10-30 15:53:14', '2020-10-31 15:53:14', 5),
(29, 2, 'user', 'TEST6', '6', 'TIKI', 'BNI - XXXXXXX', '2020-10-30 15:56:43', '2020-10-31 15:56:43', 5),
(30, 2, 'user', 'test7', '7', 'TIKI', 'Mandiri - XXXXXXX', '2020-10-30 15:58:38', '2020-10-31 15:58:38', 5),
(31, 2, 'user', 'test7', '7', 'TIKI', 'Mandiri - XXXXXXX', '2020-10-30 15:58:54', '2020-10-31 15:58:54', 5),
(32, 2, 'user', 'TEST8', '8', 'TIKI', 'BCA - XXXXXXX', '2020-10-30 16:02:34', '2020-10-31 16:02:34', 5),
(33, 2, 'user', 'test9', '9', 'Gojek', 'BCA - XXXXXXX', '2020-10-30 16:04:35', '2020-10-31 16:04:35', 5),
(34, 2, 'user', 'test10', '10', 'JNE', 'BRI - XXXXXXX', '2020-10-30 16:05:43', '2020-10-31 16:05:43', 5),
(35, 2, 'user', 'test12', '12', 'JNE', 'BRI - XXXXXXX', '2020-10-30 16:09:34', '2020-10-31 16:09:34', 5),
(36, 2, 'user', 'test13', '13', 'TIKI', 'BNI - XXXXXXX', '2020-10-30 16:11:50', '2020-10-31 16:11:50', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(120) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_buku`, `judul_buku`, `jumlah`, `harga`) VALUES
(29, 21, 15, 'Komik Horor Nusantara: Setan Lokal', 1, 83000),
(30, 22, 10, 'Mahir Bahasa Pemrograman PHP', 1, 60800),
(31, 23, 12, 'Biografi Imam Al-Ghazali', 1, 50000),
(32, 24, 16, 'Komik Next G Misteri Gubuk Tua', 1, 36000),
(33, 25, 16, 'Komik Next G Misteri Gubuk Tua', 1, 36000),
(34, 26, 16, 'Komik Next G Misteri Gubuk Tua', 1, 36000),
(35, 27, 14, 'Biografi Politik Habibie : Dari Malari Sampai Reformasi', 1, 95000),
(36, 28, 1, 'Pemrograman Web ', 1, 135000),
(37, 30, 9, 'Belajar Otodidak Bahasa Pemrograman Sql Menggunakan Mariadb', 1, 51000),
(38, 32, 2, 'Daun yang Jatuh Tak Pernah Membenci Angin ', 1, 69000),
(39, 33, 2, 'Daun yang Jatuh Tak Pernah Membenci Angin ', 1, 69000),
(40, 34, 17, 'Komik Kkpk : Camera Phobia', 1, 35000),
(41, 35, 13, 'Biografi Umar Bin Al Khathab', 1, 165000);

--
-- Trigger `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_buku SET stok = stok - NEW.jumlah
    WHERE id_buku = NEW.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan_reward`
--

CREATE TABLE `tb_pesan_reward` (
  `id` int(11) NOT NULL,
  `id_hadiah` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', 'admin', 1),
(2, 'user', 'user', 'user', 2),
(3, 'Rizki Wahyudi', 'rizki', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `tb_hadiah`
--
ALTER TABLE `tb_hadiah`
  ADD PRIMARY KEY (`id_hadiah`);

--
-- Indeks untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pesan_reward`
--
ALTER TABLE `tb_pesan_reward`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_hadiah`
--
ALTER TABLE `tb_hadiah`
  MODIFY `id_hadiah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `tb_pesan_reward`
--
ALTER TABLE `tb_pesan_reward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
