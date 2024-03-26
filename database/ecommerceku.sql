-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Nov 2023 pada 10.33
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerceku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kategori` varchar(256) DEFAULT NULL,
  `kode_product` varchar(256) DEFAULT NULL,
  `nama_barang` varchar(256) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `diskon_harga` int(11) DEFAULT NULL,
  `deskripsi` longtext DEFAULT NULL,
  `ukuran` varchar(100) DEFAULT NULL,
  `tipe` varchar(100) DEFAULT NULL,
  `warna` varchar(100) DEFAULT NULL,
  `stok` varchar(100) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `kategori`, `kode_product`, `nama_barang`, `harga`, `berat`, `diskon_harga`, `deskripsi`, `ukuran`, `tipe`, `warna`, `stok`, `image`, `date_created`) VALUES
(1, 'JAM', '-', 'Xiomi Redmi Watch 3 Active', 459000, 0, 0, 'Xiomi Redmi Watch 3 Active', '-', '-', 'Putih', '100', 'redmi-watch-3.png', '2023-10-18 20:27:18'),
(2, 'JAM', '-', 'Xiomi Redmi Band 2', 399000, 0, 0, 'Xiomi Redmi Band 2', '-', '-', 'Putih', '100', 'redmi-band-2.png', '2023-10-18 20:27:18'),
(3, 'JAM', '-', 'Xiomi Redmi Watch 2 Lite', 599000, 0, 0, 'Xiaomi Redmi Watch umumnya adalah smartwatch yang terjangkau dengan berbagai fitur yang berguna. Berikut adalah beberapa fitur umum yang mungkin dimiliki oleh produk ini:\n\nDesain:\nSmartwatch Xiaomi Redmi cenderung memiliki desain yang sederhana dan stylish, dengan layar sentuh yang responsif untuk navigasi yang mudah.\n\nLayar:\nSmartwatch Xiaomi biasanya dilengkapi dengan layar AMOLED atau LCD yang memberikan tampilan yang cerah dan tajam. Ini memungkinkan pengguna melihat notifikasi, data kesehatan, dan informasi lainnya dengan jelas.\n\nFitur Kesehatan dan Kebugaran:\nXiaomi Redmi Watch umumnya menyertakan berbagai sensor untuk melacak aktivitas fisik, denyut jantung, dan tidur. Ini membantu pengguna memantau kesehatan mereka dan memberikan informasi yang diperlukan untuk meningkatkan gaya hidup sehat.\n\nNotifikasi:\nPengguna dapat menerima notifikasi dari ponsel mereka langsung ke smartwatch, termasuk panggilan, pesan teks, dan aplikasi pemberitahuan lainnya.\n\nKetahanan Baterai:\nXiaomi sering menonjolkan daya tahan baterai yang baik pada produk smartwatch mereka, memungkinkan pengguna untuk menggunakan perangkat mereka tanpa perlu sering mengisi daya.\n\nKonektivitas:\nSmartwatch ini biasanya dapat terhubung dengan ponsel pintar melalui Bluetooth, memungkinkan sinkronisasi data dan kontrol jarak jauh pada beberapa fungsi ponsel.', '-', '-', 'Hitam', '100', 'xiaomi-redmi-watch-2-lite.jpg', '2023-10-18 20:29:38'),
(4, 'EARBUD', '-', 'Xiomi Redmi Buds 4 Lite Bluetooth', 199000, 0, 0, 'Xiomi Redmi Buds 4 Lite Bluetooth', '-', '-', 'Putih', '100', 'redmi-buds-4-lite.png', '2023-10-18 20:30:32'),
(5, 'EARBUD', '-', 'Xiomi Redmi Buds 4 Pro ANC 43dB Hi-Res', 799000, 0, 0, 'Xiomi Redmi Buds 4 Pro ANC 43dB Hi-Res audio LDAC', '-', '-', 'Hitam', '100', 'xiomi-redmi-buds-4-pro.png', '2023-10-18 20:31:34'),
(6, 'KEYBOARD', '-', 'Rexus Keyboard gaming Heroic KX4', 279000, 0, 0, 'Rexus Keyboard gaming Heroic KX4', '-', '-', 'Hitam', '100', 'rexus-gaming-heroic-kx4.jpg', '2023-10-18 20:48:59'),
(7, 'KEYBOARD', '-', 'Rexus Keyboard gaming Battlefire K87M', 179000, 0, 0, 'Rexus Keyboard gaming Battlefire K87M', '-', '-', 'Hitam', '100', 'rexus-battlefire-k87m.jpg', '2023-10-18 20:48:59'),
(8, 'MOUSE', '-', 'Logitect B175 Mouse Wireless', 109000, 0, 0, 'Logitect B175 Mouse Wireless', '-', '-', 'Hitam', '100', 'logitech-b175.png', '2023-10-18 20:51:06'),
(9, 'MOUSE', '-', 'Logitech B170 Mouse Wireless', 115000, 0, 0, 'Logitech B170 Mouse Wireless', '-', '-', 'Hitam', '100', 'logitech-b170.png', '2023-10-18 20:51:56'),
(10, 'MOUSE', '-', 'Rexus Mouse Wireless Gaming Arka II 107', 329000, 0, 0, 'Rexus Mouse Wireless Gaming Arka II 107 Dual Connection', '-', '-', 'Hitam', '100', 'rexus-arka2-107.png', '2023-10-18 20:52:43'),
(11, 'MOUSE', '-', 'Rexus Mouse Gaming Xierra X16', 175000, 0, 0, 'Rexus Mouse Gaming Xierra X16', '-', '-', 'Hitam', '100', 'rexus-gaming-xierra-x16.jpg', '2023-10-18 20:53:36'),
(12, 'MOUSE', '-', 'Rexus Mouse Wireless Gaming SH10', 119000, 0, 0, 'Rexus Mouse Wireless Gaming SH10', '-', '-', 'Hitam', '100', 'rexus-mouse-gaming-sh10.jpg', '2023-10-18 20:53:36'),
(13, 'HEADSET', '-', 'Fantech TRINITY MH88 Multiplatform Headset', 155000, 0, 0, 'Fantech TRINITY MH88 Multiplatform Headset Gaming Mobile', '-', '-', 'Putih', '100', 'trinity-mh88.jpg', '2023-10-18 20:55:14'),
(14, 'HEADSET', '-', 'Fantech FLASH HQ53 Headset', 125000, 0, 0, 'Fantech FLASH HQ53 Headset Gaming Mobile', '-', '-', 'Hitam', '100', 'fantech-flash-hq53.jpg', '2023-10-18 20:56:19'),
(15, 'HEADSET', '-', 'Fantech ALTO MH91 Multiplatform Headset', 399000, 0, 0, 'Fantech ALTO MH91 Multiplatform Headset Gaming Mobile', '-', '-', 'Hitam', '100', 'fantech-alto-mh91.png', '2023-10-18 20:57:08'),
(16, 'HEADSET', '-', 'Fantech SONATA MH90 Headset Gaming', 569000, 0, 0, 'Fantech SONATA MH90 Headset Gaming Mobile Multiplatform', '-', '-', 'Hitam', '100', 'fantech-sonata-mh90.jpg', '2023-10-18 20:57:58'),
(17, 'HEADSET', '-', 'Fantech CHIEF II HG20 RGB Space Edition', 169000, 0, 0, 'Fantech CHIEF II HG20 RGB Space Edition Gaming Headset', '-', '-', 'Putih', '100', 'fantech-chief-hg20.png', '2023-10-18 20:58:47'),
(19, 'JAM', '-', 'Mouse Razor', 700000, 0, 0, '700000', '-', '-', 'Hitam', '200', 'product_1699714787.jpg', '2023-11-11 21:59:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_barang`
--

CREATE TABLE `gambar_barang` (
  `id_gambar_barang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gambar_barang`
--

INSERT INTO `gambar_barang` (`id_gambar_barang`, `id_barang`, `gambar`, `date_created`) VALUES
(1, 3, 'xiaomi-redmi-watch-2-lite.jpg', '2023-11-19 04:38:48'),
(2, 3, 'xiaomi-redmi-watch-2-lite-pic-2.jpg', '2023-11-19 04:38:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_pembayaran_pelanggan`
--

CREATE TABLE `rekap_pembayaran_pelanggan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `no_order` varchar(256) DEFAULT NULL,
  `tgl_order` date DEFAULT NULL,
  `nama_penerima` varchar(256) DEFAULT NULL,
  `provinsi` varchar(256) DEFAULT NULL,
  `kota` varchar(256) DEFAULT NULL,
  `alamat_penerima` text DEFAULT NULL,
  `kode_pos` varchar(100) DEFAULT NULL,
  `ekspedisi` varchar(256) DEFAULT NULL,
  `paket` varchar(256) DEFAULT NULL,
  `estimasi` varchar(256) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_pembayaran` varchar(256) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama` varchar(256) DEFAULT NULL,
  `nama_bank` varchar(256) DEFAULT NULL,
  `no_rek` varchar(256) DEFAULT NULL,
  `status_order` int(1) DEFAULT NULL,
  `no_resi` varchar(256) DEFAULT NULL,
  `keterangan` longtext DEFAULT NULL,
  `hp_penerima` varchar(128) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rekap_pembayaran_pelanggan`
--

INSERT INTO `rekap_pembayaran_pelanggan` (`id`, `id_user`, `no_order`, `tgl_order`, `nama_penerima`, `provinsi`, `kota`, `alamat_penerima`, `kode_pos`, `ekspedisi`, `paket`, `estimasi`, `ongkir`, `berat`, `grand_total`, `total_bayar`, `status_pembayaran`, `bukti_bayar`, `atas_nama`, `nama_bank`, `no_rek`, `status_order`, `no_resi`, `keterangan`, `hp_penerima`, `date_created`) VALUES
(3, 7, '20220414DGY8CKTN', '2022-04-14', 'NOVITA KURNIA NINGRUM', 'Jawa Tengah', 'Batang', 'Petamanan Banyuputih RT 05 / RW 03', '51271', 'tiki', 'ECO', '4 Hari', 13000, 980, 0, 13000, '1', 'bukti_bayar_0000000000000013.jpg', 'lola', 'BCA', '23432425252', 0, NULL, NULL, '0865643556655', '2022-04-14 10:54:10'),
(4, 7, '20220414GBCBTDMZ', '2022-04-14', 'hendry agus setiawan', 'Jawa Tengah', 'Batang', 'Petamanan Banyuputih RT 05 / RW 03', '51271', 'pos', 'Paket Kilat Khusus', '4 HARI Hari', 13300, 1020, 0, 13300, '1', 'bukti_bayar_0000000000000013.jpg', 'papa', 'BRI', '72673264233', 0, NULL, NULL, '0865643556655', '2022-04-14 10:56:04'),
(5, 7, '20220414QJBL1M5S', '2022-04-14', 'satria', 'Jawa Tengah', 'KABUPATEN SEMARANG', 'Semarang indah', '53300', 'tiki', 'ECO', '4 Hari', 20000, 2000, 0, 20000, '1', 'bukti_bayar_0000000000000013.jpg', 'mama', 'BRI', '12234567866', 0, NULL, NULL, '0865643556655', '2022-04-14 10:58:28'),
(6, 7, '20220414MOCWIKA5', '2022-04-14', 'pulung3', 'Jawa Tengah', 'KABUPATEN SEMARANG', 'Semarang indah', '53300', 'tiki', 'ECO', '4 Hari', 12500, 580, 0, 12500, '1', 'bukti_bayar_0000000000000013.jpg', 'sasa', 'BCA', '123142343534', 0, NULL, NULL, '0865643556655', '2022-04-14 10:59:31'),
(7, 7, '202204148AFNT3JS', '2022-04-14', 'NOVITA KURNIA NINGRUM', 'Lampung', 'JAKARTA UTARA', 'Petamanan Banyuputih RT 05 / RW 03', '14420', 'tiki', 'ECO', '5 Hari', 26000, 680, 0, 26000, '1', 'bukti_bayar_0000000000000013.jpg', 'Tawon', 'BCA', '2343242525', 0, NULL, NULL, '0865643556655', '2022-04-14 11:01:18'),
(8, 7, '20220414ULIJGMHB', '2022-04-14', 'satria', 'Jawa Tengah', 'Tegal', 'Tegal', '51271', 'pos', 'Paket Kilat Khusus', '3 HARI Hari', 9000, 600, 0, 9000, '1', 'bukti_bayar_0000000000000013.jpg', 'Kucingku', 'BCA', '1234543234', 0, NULL, NULL, '0865643556655', '2022-04-14 20:36:03'),
(9, 7, '20220427AZM80CDM', '2022-04-27', 'satria', 'Bangka Belitung', 'Batang', 'Semarang indah', '51271', 'jne', 'OKE', '3-6 Hari', 44000, 100, 0, 44000, '1', 'bukti_bayar_0000000000000013.jpg', 'Kucing', 'BRI', '027782662123723', 0, NULL, NULL, '0865643556655', '2022-04-27 08:12:01'),
(10, 7, '2022042702ASAGY4', '2022-04-27', 'samsul', 'Kepulauan Riau', 'Batang', 'batang', '51271', 'tiki', 'ECO', '5 Hari', 56000, 200, 0, 56000, '1', 'bukti_bayar_0000000000000013.jpg', 'saifudin', 'BCA', '2837495873', 0, NULL, NULL, '0865643556655', '2022-04-27 09:23:30'),
(11, 7, '20220430TKEZHVBZ', '2022-04-30', 'NOVITA KURNIA NINGRUM', 'Lampung', 'Batang', 'Petamanan Banyuputih RT 05 / RW 03', '51271', 'tiki', 'ECO', '5 Hari', 29000, 200, 0, 29000, '1', 'bukti_bayar_0000000000000013_20220430tkezhvbz.jpg', 'sasabila', 'BNI', '24324322543', 3, 'JKT2347623423424', NULL, '0865643556655', '2022-04-30 07:43:17'),
(12, 7, '20220504LKJD7YVE', '2021-05-01', 'musin', 'Banten', 'JAKARTA UTARA', 'batang', '14420', 'pos', 'Paket Kilat Khusus', '4 HARI Hari', 14000, 100, 0, 14000, '1', 'bukti_bayar_0000000000000013_20220504lkjd7yve.jpg', 'Hendry Agus Setiawan', 'BCA', '2343242525', 3, 'JKT2347623423421', NULL, '0865643556655', '2022-05-04 06:43:34'),
(13, 7, '20220507BMR4ECZH', '2022-05-07', 'setiawan', 'Jawa Tengah', 'JAKARTA UTARA', 'Semarang', '14420', 'pos', 'Paket Kilat Khusus', '3 HARI Hari', 14000, 400, 140000, 154000, '1', 'bukti_bayar_0000000000000013_20220507bmr4eczh.jpg', 'bagas', 'BCA', '1234567543', 3, 'JKT2347623423333', NULL, '0865643556655', '2022-05-07 09:28:20'),
(14, 7, '20220507SV2LRSP1', '2022-05-07', 'wanto', 'Banten', 'KABUPATEN SEMARANG', 'batang', '53300', 'jne', 'OKE', '3-6 Hari', 16000, 120, 1000000, 1016000, '1', 'bukti_bayar_0000000000000013_20220507sv2lrsp1.jpg', 'Samsul Aja', 'BCA', '1234543212', 3, 'JKT2347623421211', NULL, '0865643556655', '2022-05-07 15:12:27'),
(15, 7, '20220507VQWZNBEP', '2022-05-07', 'satria', 'Nanggroe Aceh Darussalam (NAD)', 'KABUPATEN SEMARANG', 'Petamanan Banyuputih RT 05 / RW 03', '53300', 'tiki', 'REG', '3 Hari', 84000, 100, 40000, 124000, '1', 'bukti_bayar_0000000000000013_20220507vqwznbep.jpg', 'Uvuvwewe', 'BRI', '027782662123723', 2, 'JKT2347623423420', NULL, '0865643556655', '2022-05-07 16:02:43'),
(16, 7, '20220507ODGV7E1V', '2022-05-07', 'Aris Dwiyanto', 'Maluku Utara', 'Batang', 'Kampung Japat Saleh', '51271', 'tiki', 'ECO', '6 Hari', 93000, 220, 1050000, 1143000, '1', 'bukti_bayar_0000000000000013_20220507odgv7e1v.jpg', 'Hendry Agus Setiawan', 'BCA', '2837495873', 3, 'JKT2347623423424', NULL, '0865643556655', '2022-05-07 16:45:27'),
(17, 11, '20220512SLBNWX3G', '2022-05-12', 'Sugeng', 'Jawa Tengah', 'Semarang', 'Jl. Walisongo No.3-5, Tambakaji, Kec. Ngaliyan, Kota Semarang, Jawa Tengah 50185', '51722', 'pos', 'Paket Kilat Khusus', '3 HARI Hari', 11000, 100, 50000, 61000, '1', 'bukti_bayar_0000000000000031_20220512slbnwx3g.jpg', 'Sugeng', 'BCA', '2297220891', 3, 'JKT23476234234001', NULL, '0865643556655', '2022-05-12 09:38:52'),
(18, 11, '20220512G82MTAFN', '2022-05-12', 'samin', 'Jawa Tengah', 'Batang', 'Petamanan Banyuputih RT 05 / RW 03', '51271', 'tiki', 'ONS', '1 Hari', 16500, 400, 160000, 176500, '1', 'bukti_bayar_0000000000000031_20220512g82mtafn.jpg', 'Hendry Agus Setiawan', 'BCA', '027782662123723', 3, 'JKT2347623423424', NULL, '0865643556655', '2022-05-12 12:30:31'),
(19, 7, '20220604SPBHC9CB', '2022-06-04', 'JGFKUVFJH', 'Jawa Tengah', 'Tegal', 'TEgal', '52131', 'jne', 'CTCYES', '1-1 Hari', 10000, 120, 1000000, 1010000, '1', 'bukti_bayar_0000000000000013_20220604spbhc9cb.jpg', 'Januar Satria Ramadhan', 'BCA', '047040199', 1, NULL, NULL, '0818099020493123', '2022-06-04 16:02:12'),
(20, 7, '20220621EWLGPPAY', '2022-06-21', 'sa', 'Jawa Timur', 'Tegal', 'Jalan Arum Indah 5 Gang 5 No 29 Tegal', '52131', 'tiki', 'REG', '3 Hari', 15000, 500, 200000, 215000, '1', 'bukti_bayar_0000000000000013_20220621ewlgppay.jpg', 'Januar Satria Ramadhan', 'BCA', '142345', 0, NULL, NULL, '0818099020493123', '2022-06-21 09:53:09'),
(21, 7, '20220621JKGM8PA4', '2022-06-21', 'Ruri suko basuki', 'Kalimantan Selatan', 'Tegal', 'Jalan Arum Indah 5 Gang 5 No 29 Tegal', '52131', 'pos', 'Paket Kilat Khusus', '5 HARI Hari', 47500, 100, 50000, 97500, '0', NULL, NULL, NULL, NULL, 0, NULL, NULL, '0818099020493123', '2022-06-21 10:17:51'),
(22, 7, '20220621YOLCLUHT', '2022-06-21', 'Adiba', 'Jawa Tengah', 'Tegal', 'Jalan Arum Indah 5 Gang 5 No 29 Tegal', '52131', 'tiki', 'REG', '3 Hari', 11000, 120, 1000000, 1011000, '0', NULL, NULL, NULL, NULL, 0, NULL, NULL, '0818099020493123', '2022-06-21 22:39:55'),
(23, 5, '20231112XFZAVGR9', '2023-11-12', 'Nana Kurnia', 'Jawa Tengah', 'KABUPATEN SEMARANG', 'Semarang indah', NULL, NULL, NULL, NULL, NULL, NULL, 459000, 0, '1', 'bukti_bayar_20231112xfzavgr9.jpg', 'Nana Kurnia', 'BCA', '1234543234', 3, 'SHDJWYWD8766BJS', NULL, '0865643556655', '2023-11-12 21:43:17'),
(24, 5, '20231114OXPMPH7F', '2023-11-14', 'NOVITA KURNIA NINGRUM', 'Jawa Tengah', 'KABUPATEN SEMARANG', 'Semarang indah', NULL, NULL, NULL, NULL, NULL, NULL, 998000, 0, '1', 'bukti_bayar_20231114oxpmph7f.png', 'Nana Kurnia', 'BCA', '1234543234', 3, 'JKT2942T32473854378', NULL, '0865643556655', '2023-11-14 21:36:46'),
(25, 5, '20231114MZAPWSKV', '2023-11-14', 'NOVITA KURNIA NINGRUM', 'Jawa Tengah', 'KABUPATEN SEMARANG', 'Semarang indah', NULL, NULL, NULL, NULL, NULL, NULL, 399000, 0, '0', NULL, NULL, NULL, NULL, 0, NULL, NULL, '0865643556655', '2023-11-14 22:19:41'),
(26, 5, '20231116KX86ZTGY', '2023-11-16', 'Nana Kurnia', 'Jawa Tengah', 'KABUPATEN SEMARANG', 'Semarang indah', NULL, NULL, NULL, NULL, NULL, NULL, 757000, 0, '1', 'bukti_bayar_20231116kx86ztgy.jpg', 'Nana Kurnia', 'BCA', '74385483', 3, 'JKT5767576678788', NULL, '08515665656', '2023-11-16 21:05:57'),
(27, 4, '20231119LKXANURL', '2023-11-19', 'Agus', 'Jakarta Utara', 'Jakarta', 'Jl Majapahit Kel.Majapahit', NULL, NULL, NULL, NULL, NULL, NULL, 2396000, 0, '1', 'bukti_bayar_20231119lkxanurl.jpg', 'Agus', 'Mandiri', '8956745826', 3, 'JKT83745894385', NULL, '0859765236', '2023-11-19 16:26:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rinci_transaksi`
--

CREATE TABLE `tbl_rinci_transaksi` (
  `id` int(11) NOT NULL,
  `no_order` varchar(256) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_rinci_transaksi`
--

INSERT INTO `tbl_rinci_transaksi` (`id`, `no_order`, `id_barang`, `qty`) VALUES
(1, '20220414DGY8CKTN', 3, 5),
(2, '20220414DGY8CKTN', 1, 5),
(3, '20220414GBCBTDMZ', 3, 3),
(4, '20220414GBCBTDMZ', 1, 3),
(5, '20220414QJBL1M5S', 3, 8),
(6, '20220414QJBL1M5S', 1, 8),
(7, '20220414MOCWIKA5', 3, 1),
(8, '20220414MOCWIKA5', 1, 4),
(9, '202204148AFNT3JS', 3, 2),
(10, '202204148AFNT3JS', 1, 4),
(11, '20220414ULIJGMHB', 1, 5),
(12, '20220427AZM80CDM', 5, 1),
(13, '2022042702ASAGY4', 4, 1),
(14, '2022042702ASAGY4', 5, 1),
(15, '20220430TKEZHVBZ', 5, 1),
(16, '20220430TKEZHVBZ', 4, 1),
(17, '20220504LKJD7YVE', 3, 1),
(18, '20220507BMR4ECZH', 5, 2),
(19, '20220507BMR4ECZH', 4, 2),
(20, '20220507SV2LRSP1', 1, 1),
(21, '20220507VQWZNBEP', 5, 1),
(22, '20220507ODGV7E1V', 1, 1),
(23, '20220507ODGV7E1V', 3, 1),
(24, '20220512SLBNWX3G', 3, 1),
(25, '20220512G82MTAFN', 3, 2),
(26, '20220512G82MTAFN', 4, 2),
(27, '20220604SPBHC9CB', 1, 1),
(28, '20220621EWLGPPAY', 3, 2),
(29, '20220621EWLGPPAY', 4, 2),
(30, '20220621EWLGPPAY', 5, 1),
(31, '20220621JKGM8PA4', 3, 1),
(32, '20220621YOLCLUHT', 1, 1),
(33, '20231112XFZAVGR9', 1, 1),
(34, '20231114OXPMPH7F', 2, 1),
(35, '20231114OXPMPH7F', 3, 1),
(36, '20231114MZAPWSKV', 2, 1),
(37, '20231116KX86ZTGY', 4, 1),
(38, '20231116KX86ZTGY', 6, 2),
(39, '20231119LKXANURL', 3, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `tgl_lahir` datetime DEFAULT NULL,
  `gender` varchar(128) DEFAULT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `tgl_lahir`, `gender`, `phone`, `username`, `email`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'sasa sartika', '1997-10-01 03:28:07', 'Perempuan', '08569856565', 'sasa', 'sasa@gmail.com', '$2y$10$1Y5ALImDUmwS.kCBQGzUeeo//N2l/rECscqfPRxLuLHnkzbYXNlia', 1, 1, '2023-10-24 22:28:07'),
(2, 'Novita Sari', NULL, NULL, NULL, NULL, 'novita@gmail.com', '$2y$10$RoP0Ak6Qk6Cb8NhOuEXinO2aK6fs5KDtCLAGV9xBgQxrJ5fUVqxpK', 4, NULL, NULL),
(3, 'Adelia', NULL, NULL, NULL, NULL, 'adelia@gmail.com', '$2y$10$FnzzU292AggIn8Zg9Rh1muZO5INnUthnYFO8rtsAcIws4FjGAndpC', NULL, NULL, NULL),
(4, 'Agus', NULL, NULL, NULL, NULL, 'agus@gmail.com', '$2y$10$A8YUb9lkzq6FRnQKWE3Pj.g1783q01lU4MXl.JeJgrNtI/01FA0Hi', 4, 1, '2023-11-12 06:37:16'),
(5, 'nana', NULL, NULL, NULL, NULL, 'nana@gmail.com', '$2y$10$PJDVOp0K8xG.4/Us1j3HyurVQMm6zzVGuZFRmnf3rvE7iyH31RtZm', 4, 1, '2023-11-12 06:38:10'),
(6, 'Adamas', '1997-08-09 00:00:00', 'Laki-Laki', '0856495692999', 'adamas', 'adamas@gmail.com', '$2y$10$7iVVxfWYvnsKfO5GGqJzh./gxBLDb6lxzIxZow6kQ8h5catMwEQqy', 4, 1, '2023-11-15 00:40:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(12, 2, 3),
(13, 1, 3),
(16, 2, 7),
(17, 2, 8),
(18, 2, 6),
(19, 2, 9),
(22, 2, 11),
(23, 2, 12),
(24, 2, 13),
(25, 2, 1),
(27, 2, 15),
(28, 2, 16),
(29, 2, 17),
(30, 2, 18),
(31, 4, 19),
(32, 4, 20),
(33, 4, 21),
(34, 4, 22),
(35, 4, 23),
(36, 3, 24),
(37, 3, 25),
(38, 3, 26),
(39, 3, 27),
(40, 1, 1),
(41, 4, 32),
(43, 1, 33),
(44, 4, 34);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_has_sub_menu`
--

CREATE TABLE `user_has_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `status_sub` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_has_sub_menu`
--

INSERT INTO `user_has_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`, `status_sub`, `date_created`) VALUES
(4, 3, 'Menu Management', '-', 'fal fa-fw fa-bars', 1, 0, '2022-08-02 20:30:48'),
(10, 5, 'Pendataan UMKM', 'pendataanumkm/cpendataanumkm', 'fal fa-fw fa-barcode', 1, 1, '2023-04-07 13:45:56'),
(11, 6, 'Pengujian', 'naivebayes/datauji', 'fal fa-fw fa-pen', 1, 1, '2023-04-08 14:13:58'),
(12, 6, 'Calon', 'naivebayes/datacalon', 'fal fa-fw fa-profile', 1, 1, '2023-04-10 09:23:34'),
(13, 7, 'Dataset', 'c45/dataset', 'fal fa-fw fa-list', 1, 1, '2023-06-10 10:54:01'),
(14, 7, 'Init', 'c45/init', 'fal fa-fw fa-book', 1, 1, '2023-06-10 10:54:37'),
(15, 7, 'Prediction', 'c45/prediction', 'fal fa-fw fa-pen', 1, 1, '2023-06-10 10:55:24'),
(16, 8, 'Enkripsi', 'md4', 'fal fa-fw fa-pen', 1, 1, '2023-07-03 13:24:50'),
(19, 9, 'Beasiswa', 'beasiswa', 'fal fa-fw fa-book', 1, 1, '2023-09-11 07:40:06'),
(24, 10, 'Presensi Peserta', 'presensi', 'fal fa-fw fa-user', 1, 1, '2023-10-10 04:38:27'),
(27, 3, 'Role', 'admin/role', 'fal fa-fw fa-users', 1, 1, '2023-10-16 05:41:33'),
(28, 3, 'User Management', 'admin/user', 'fal fa-fw fa-user-plus', 1, 1, '2023-10-16 05:43:19'),
(29, 1, 'Dashboard', 'admin', 'fal fa-fw fa-dashboard', 1, 1, '2023-10-16 05:49:56'),
(32, 13, 'Pengaturan', 'pengaturan', 'fal fa-fw fa-wrench', 1, 1, '2023-10-16 06:11:57'),
(33, 12, 'Kelola Administrator', 'kelolaadmin', 'fal fa-fw fa-unlock-alt', 1, 1, '2023-10-16 06:16:09'),
(34, 13, 'Pengaturan Presensi', 'pengaturanpresensi', 'fal fa-fw fa-wrench', 1, 1, '2023-10-17 00:17:26'),
(35, 19, 'Dashboard', 'pesertamagang', 'fal fa-fw fa-dashboard', 1, 1, '2023-10-22 16:32:17'),
(36, 20, 'Presensi Peserta', 'presensipeserta', 'fal fa-fw fa-check', 1, 1, '2023-10-22 17:11:47'),
(37, 21, 'Riwayat Presensi Peserta', 'riwayatpresensipeserta', 'fal fa-fw fa-book', 1, 1, '2023-10-22 17:13:36'),
(38, 22, 'Kegiatan Harian Peserta', 'kegiatan', '', 1, 1, '2023-10-22 19:53:29'),
(39, 23, 'Nilai Akhir Peserta', 'nilaiakhirpeserta', 'fal fa-fw fa-book', 1, 1, '2023-10-22 21:31:50'),
(47, 3, 'List Barang', 'barang', 'fal fa-fw fa-suitcase', 1, 1, '2023-11-05 11:55:41'),
(51, 31, 'Pembayaran', 'pembayarancustomer', 'fas fa-cash-register', 1, 1, '2023-11-13 06:15:44'),
(52, 32, 'History', 'rekappembayaran', 'fas fa-history', 1, 1, '2023-11-14 21:22:10'),
(53, 33, 'Pesanan', 'PembayaranCustomer', 'fas fa-hourglass-start', 1, 1, '2023-11-14 21:33:16'),
(54, 34, 'Halaman Utama', 'home', 'fas fa-home', 1, 1, '2023-11-14 21:35:42'),
(55, 33, 'Laporan Bulanan', 'report', 'fal fa-fw fas fa-book-open', 1, 1, '2023-11-19 14:40:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `menu_nama` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `menu_nama`, `date_created`) VALUES
(1, 'Admin', 'Dashboard', '2022-06-14 00:00:00'),
(3, 'Master', 'Data Master', '2023-10-10 22:56:42'),
(12, 'administrator', 'Kelola Administrator', '2023-10-10 22:57:10'),
(14, 'auth/logout', 'Keluar', '2023-10-10 22:58:17'),
(31, 'pembayarancustomer', 'Rekap Customer', '2023-11-13 06:14:15'),
(32, 'rekappembayaran', 'History Pesanan', '2023-11-14 21:21:27'),
(33, 'pembayarancustomer', 'Rekap Pembayaran', '2023-11-14 21:32:24'),
(34, 'home', 'Home', '2023-11-14 21:35:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(4, 'Customer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `has_sub_menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `has_sub_menu_id`, `title`, `url`, `icon`, `is_active`, `date_created`) VALUES
(1, 1, 4, 'Menu Management (Level 1)', 'master/menulevel1', 'fal fa-fw fa-folder', 1, '2022-07-06 00:00:00'),
(2, 1, 4, 'Submenu Management (Level 2)', 'master/menulevel2', 'fal fa-fw fa-folder-open', 1, '2022-07-06 00:00:00'),
(3, 1, 4, 'Submenu Management (Level 3)', 'master/menulevel3', 'fal fa-fw fa-folder-open', 1, '2022-07-06 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `token` varchar(256) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `gambar_barang`
--
ALTER TABLE `gambar_barang`
  ADD PRIMARY KEY (`id_gambar_barang`);

--
-- Indeks untuk tabel `rekap_pembayaran_pelanggan`
--
ALTER TABLE `rekap_pembayaran_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_has_sub_menu`
--
ALTER TABLE `user_has_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `gambar_barang`
--
ALTER TABLE `gambar_barang`
  MODIFY `id_gambar_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rekap_pembayaran_pelanggan`
--
ALTER TABLE `rekap_pembayaran_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `user_has_sub_menu`
--
ALTER TABLE `user_has_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
