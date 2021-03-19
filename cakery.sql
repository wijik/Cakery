-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 01:26 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cakery`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `routinePertama` ()  NO SQL
BEGIN
 	SELECT * from user;
 END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fungsiPertama` (`userid` INT(11)) RETURNS VARCHAR(20) CHARSET utf8mb4 NO SQL
BEGIN
	DECLARE un varchar(100);
    SELECT username
     FROM user
     WHERE id = userid
     INTO un;
     RETURN un;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `by` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `isi` text NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `by`, `judul`, `slug`, `gambar`, `isi`, `created_date`, `updated_date`) VALUES
(9, 14, 'Resep kastengael', 'resep-kastengael', '1604968056_5b30a37efce251633544.jpg', '<p><strong>Bahan bahan</strong></p><p>- 300 gram mentega<br>- 350 gram terigu protein sedang<br>- 50 gram maizena<br>- 2 sdm susu bubuk<br>- 100 gram keju edam parut<br>- 100 gram keju parmesan parut</p><p><strong>Olesan:</strong><br>- kuning telur (kocok lepas)</p><p><strong>Taburan:</strong><br>- keju cheddar parut</p><p><strong>Cara membuat:</strong><br>1. Campur dan ayak terigu, maizena dan susu bubuk. Sisihkan.<br>2. Kocok mentega sebentar saja hingga lunak. Masukkan keju edam dan parmesan parut, aduk rata dengan sendok kayu.<br>3. Masukkan campuran terigu, aduk rata dengan sendok kayu sampai rata dan adonan sudah bisa dibentuk.<br>4. Gilas tipis adonan lalu cetak sesuai selera. Tata dalam loyang tanpa dioles margarin. Oles dengan kuning telur dan taburi keju cheddar parut.<br>- Panggang di teflon sampai matang.</p>', '2020-11-06 22:12:20', '2020-11-09 18:27:36'),
(10, 14, 'Kue PUKIS empuk', 'kue-pukis-empuk', '1604733522_92114f64ae631aceec5e.jpg', '<p><strong>Bahan Bahan</strong></p><ol><li><strong>25 gr</strong> tepung terigu</li><li><strong>50 ml</strong> air (hangat)</li><li><strong>1/2 sdm</strong> ragi instan (fermipan)</li><li>Bahan:</li><li><strong>3 butir</strong> telur</li><li><strong>150 gr</strong> gula pasir</li><li><strong>250 gr</strong> tepung terigu</li><li><strong>300 ml</strong> santan kental hangat (1 kelapa)</li><li><strong>50 ml</strong> minyak sayur</li></ol><p><strong>Langkah Langkah</strong></p><ol><li>Campur bahan biang aduk rata, biarkan kurleb 10 menit sampai berbuih.</li><li>Kocok telur dan gula hg kental, kecilkan mixer, masukan bahan biang, terigu dan santan sedikit demi sedikit bergantian sambil di kocok hg rata.</li><li>Masukan minyak sayur dan garam, aduk rata.</li><li>Diamkan adonan 1 jam hingga mengembang.</li><li>Panaskan cetakan pukis (api kecil), olesi dg margarin (selanjutnya tdk usah di oles lg), tuang adonan 3/4 cetakan lalu tutup dan tunggu hg matang, angkat.</li><li>Tips:<br>- Gunakan wadah yg besar waktu mengocok telur krn adonan akan mengembang 2x lipat.<br>- Aduk adonan tiap kali akan menuang adonan ke cetakan (utk menghilangkan gelembung udara agar permukaan kue tetap mulus tdk berlubang-lubang).<br>- Adonan bs ditambah pasta pandan atau coklat utk rasa yg berbeda.</li></ol>', '2020-11-07 01:18:42', '2020-11-07 01:20:17'),
(11, 14, 'Kue onde onde', 'kue-onde-onde', '1604929054_bf4765bba66a2c04e293.jpg', '<p><strong>Bahan bahan</strong></p><ol><li><strong>250 gr</strong> tepung ketan (me :rosebrand)</li><li><strong>50 gr</strong> kentang yg sudah di kukus haluskan</li><li><strong>5 sdm</strong> gula pasir (pke gula halus Lebih oke)</li><li><strong>1/4 sdt</strong> garam</li><li><strong>155-160 ml</strong> air hangat (tuang bertahap)</li><li><strong>100 gr</strong> wijen putih</li><li>isian kacang hijau</li><li>Bahan-bahan :</li><li><strong>100 gr</strong> kacang hijau tanpa kulit (rendam 1 - 2 jam)</li><li><strong>150 ml</strong> santan kental (1 scht K*ra diencerkan)</li><li><strong>1/4 sdt</strong> garam</li><li><strong>5 sdm</strong> gula pasir</li><li><strong>Secukupnya</strong> vanila</li><li><strong>1 lembar</strong> daun pandan ikat simpul</li></ol><p>&nbsp;</p><p><strong>Langkah langkah</strong></p><ol><li>Campur tepung + kentang + gula + garam.. tuangi air hangat bertahap ????Uleni hingga kalis.. airnya gk perlu semua asal udah enak di bentuk</li><li>Bagi Adonan kulit masing masing @30 gr ????Lalu siapkan juga isian nya, bulat bulatkan @20 gr</li><li>Bagi adonan, lalu pipihkan adonan kulit, beri isian ????Lalu bulatkan sampai halus</li><li>Lalu siapkan semangkuk Air dan Wijen ????Celupkan onde-onde yg sudah dibulatkan tadi ke air, lalu masukan ke mangkuk yg berisi wijen, taburi smpai tertutup rata</li><li>Siapkan minyak agak banyak. Lalu masukan onde\"selagi minyak dingin, nyalakan API sedang cenderung kecil lalu Goreng hingga kering Kuning kecoklatan, jgn keseringan diaduk ya.. agar wijen Tidak rontok\", kalo udah ngapung Dan diputer\" onde-onde Nya, Goreng Hingga Coklat keemasan, angkat Dan tiriskan</li></ol><p>Untuk bahan isian :<br>Cuci bersih kacang hijau kupas, lalu rendam 2 jam ????Tiriskan kacang yg sudah di rendam 2 jam\'an.. kukus hingga empuk.. Lalu haluskan pakai blander tuang sedikit santan blander hingga lembut ????Tuang di teflon / panci.. masukan daun pandan + gula + vanila + santan.. ????Masak pakai api kecil hingga menyusut dan bisa di pulung<br>????Angkat dan dinginkan<br>????Kalo udah dingin bulat\"kan menjadi 10 - 12 bulatan atau sesuai selera</p><p><br>&nbsp;</p>', '2020-11-09 07:37:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_kue`
--

CREATE TABLE `bahan_kue` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan_kue`
--

INSERT INTO `bahan_kue` (`id`, `nama_barang`, `slug`, `gambar`, `deskripsi`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'Tepung Terigu', 'Tepung-Terigu', '1604966684_b05d61b513f93d6a2818.jpg', 'Tepung terigu merupakan salah satu bahan pembuat makanan yang umum ditemukan di Indonesia. Terbuat dari sari pati umbi atau biji-bijian, tepung terigu sering digunakan sebagai bahan utama pembuatan roti, mi, hingga aneka kudapan goreng. ', 5000, 80, '2020-11-06 22:06:03', '2020-11-09 18:14:52'),
(2, 'Gula', 'Gula', '1604966704_13bdff38f9ea0d3bd187.jpg', 'Gula adalah suatu karbohidrat sederhana yang menjadi sumber energi dan komoditas perdagangan utama. Gula paling banyak diperdagangkan dalam bentuk kristal sukrosa padat. Gula digunakan untuk mengubah rasa menjadi manis dan keadaan makanan atau minuman.', 10000, 98, '2020-11-07 21:25:00', '2020-11-09 19:25:01'),
(3, 'Baking soda', 'Baking-soda', '1604966720_b02c36d905718bb59b1d.jpg', 'Merupakan komponen baking powder, kandungannya adalah sodium bicarbonat. Sifat bahan ini mengeluarkan gas (CO2) sehingga kue akan mengembang. Untuk membuat cake, penggunaannya biasanya bersamaan dengan baking powder. Untuk kue kering, soda kue memberikan efek tekstur kering, garing, dan renyah. Untuk membuat cake sebenarya menggunakan baking powder saja sudah cukup.', 20000, 92, '2020-11-07 21:25:42', '2020-11-09 22:14:32'),
(4, 'cream of tartar', 'cream-of-tartar', '1604966745_0a0f6ee418ab5e01ae08.jpg', 'Cream of tartar atau krim tartar merupakan salah satu bahan pelembut kue. ... Selain melembutkan tekstur kue, krim tartar juga bisa dipakai sebagai ragi atau pengembang. Kombinasi krim tartar dengan baking soda akan menghasilkan gas karbondioksida—jenis gas yang juga dihasilkan ragi dalam roti panggang', 5000, 70, '2020-11-07 21:26:22', '2020-11-09 18:13:36'),
(5, 'SP', 'SP', '1604966761_0119ba79ebcbb8138696.jpg', 'Fungsi SP yaitu membuat adonan menjadi homogen dan tidak mudah turun saat dikocok atau biasa di sebut cake emulsifier. Biasanya digunakan untuk cake, bolu atau kue-kue lain yang menggunakan teknik telur dikocok hingga mengembang kaku.', 5000, 90, '2020-11-07 21:27:01', '2020-11-09 19:24:42'),
(6, 'Fermippan', 'Fermippan', '1604968209_69f39692b135424bee0d.jpg', 'Fermipan adalah merk yeast (ragi) kering instant dari Perancis yang sudah dikenal oleh pembuat kue di seluruh dunia. Tidak hanya para profesional saja yang menggunakanya, banyak ibu rumah tangga yang memakai fermipan sebagai bahan pengembang roti alami.\r\n', 5000, 80, '2020-11-09 18:30:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_barang`, `id_user`, `jumlah`) VALUES
(41, 1, 22, 3),
(59, 3, 24, 1),
(64, 3, 23, 7),
(65, 1, 23, 5);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `NamaLengkap` varchar(255) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Telepon` int(11) DEFAULT NULL,
  `JenisKelamin` enum('Laki-laki','Perempuan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Id`, `UserId`, `NamaLengkap`, `Alamat`, `Telepon`, `JenisKelamin`) VALUES
(8, 70, NULL, NULL, NULL, NULL),
(9, 71, NULL, NULL, NULL, NULL),
(10, 59, NULL, NULL, NULL, NULL),
(11, 22, NULL, NULL, NULL, NULL),
(12, 24, NULL, NULL, NULL, NULL),
(13, 23, 'Rizki Fauzi ', 'jalan lengkong ', 1273812341, 'Laki-laki'),
(14, 17, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `Id` int(11) NOT NULL,
  `Id_transaksi` int(11) NOT NULL,
  `Id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`Id`, `Id_transaksi`, `Id_barang`, `jumlah`) VALUES
(30, 1022, 1, 4),
(31, 1022, 2, 5),
(32, 1023, 1, 1),
(33, 1023, 2, 1),
(34, 1023, 3, 1),
(35, 1023, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dompet`
--

CREATE TABLE `dompet` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dompet`
--

INSERT INTO `dompet` (`id`, `id_user`, `jumlah`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(2, 17, 327579, '2020-11-05 21:48:17', 14, '2021-03-14 21:55:50', 14),
(3, 22, 24000, '2020-11-06 14:56:15', 14, '2020-11-07 20:31:28', 14),
(4, 14, 10358000, '2020-11-06 06:58:07', 14, '0000-00-00 00:00:00', 0),
(6, 23, 217000, '2020-11-09 18:00:16', 14, '2021-03-14 21:36:09', 14),
(7, 24, 55000, '2021-01-12 09:46:31', 14, '2021-01-11 21:12:39', 14),
(20, 59, 12000, '2021-02-08 19:57:18', 14, NULL, NULL),
(26, 70, 50000, '2021-02-24 15:06:28', 14, NULL, NULL),
(27, 71, 50000, '2021-02-24 15:11:13', 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `id_user`, `id_barang`, `komentar`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(33, 23, 2, '<p>mantap barang nya</p>', 23, '2020-11-16 09:35:56', NULL, NULL),
(34, 23, 1, '<p>Tepung terigu nya bagus</p>', 23, '2020-11-16 09:38:36', NULL, NULL),
(35, 23, 6, '<p>Apa barang ini bisa di pakai di bolu gulung</p>', 23, '2020-11-16 09:39:08', NULL, NULL),
(37, 59, 6, 'barang ini mantap', 59, '2021-02-08 07:02:46', NULL, NULL),
(38, 23, 3, 'coba', 23, '2021-03-09 19:30:38', NULL, NULL),
(39, 23, 6, 'coba', 23, '2021-03-09 20:30:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komentar_artikel`
--

CREATE TABLE `komentar_artikel` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar_artikel`
--

INSERT INTO `komentar_artikel` (`id`, `id_user`, `id_artikel`, `komentar`, `created_date`, `updated_date`) VALUES
(28, 23, 9, 'coba 2', '2021-03-04 00:30:58', NULL),
(30, 23, 9, 'coba', '2021-03-04 01:03:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `total_harga` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `ongkir` int(11) NOT NULL,
  `status` enum('Sudah terbayar','Belum terbayar','','') NOT NULL DEFAULT 'Belum terbayar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_pembeli`, `created_date`, `created_by`, `updated_date`, `updated_by`, `total_harga`, `alamat`, `ongkir`, `status`) VALUES
(1022, 17, '2021-03-14 22:17:08', 17, NULL, NULL, 131000, 'mana aja', 61000, 'Belum terbayar'),
(1023, 17, '2021-03-14 22:49:27', 17, NULL, NULL, 79000, 'remember', 39000, 'Belum terbayar');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `hapusDetail` AFTER DELETE ON `transaksi` FOR EACH ROW BEGIN
    DELETE FROM detail_transaksi WHERE Id_transaksi  = old.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `salt` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `salt`, `avatar`, `role`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(14, 'admin', '2009fb1187367feecaf8c9e69678123b', 'admin@gmail.com', '5f9120c11c6007.36523312', '1604967893_d4bbb2f5c8bf80152924.png', 0, 0, '2020-10-22 01:03:45', 14, '2021-03-04 02:59:44'),
(17, 'Robbi', '47187d63f94732e72714a91bad07d5ed', 'dimasbayu080103@gmail.com', '5f912d7be22792.64605728', 'user.jpeg', 1, 0, '2020-10-22 01:58:03', NULL, NULL),
(22, 'brian', 'acaf06a9da08c71d2b9b85713c7794e7', 'dimasbayu080103@gmail.com', '5f9a101b4780c9.21326150', '1605019247_55434613cbce45c26d38.png', 1, 0, '2020-10-28 19:43:07', 22, '2020-11-10 08:40:47'),
(23, 'rizki', '49626fbd6fa89a72806fa3cb7266cd00', 'dimasbayu080103@gmail.com', '5fa81c4dee91f4.23557840', '1605019247_55434613cbce45c26d38.png', 1, 0, '2020-11-08 10:26:53', 23, '2021-03-14 01:24:57'),
(24, 'rizal', 'd8403c20830ca6693b62ac51768d6e27', 'rijal@gmail.com', '5ff80993ed5bf8.42938738', 'default.png', 1, 0, '2021-01-08 01:28:19', NULL, NULL),
(59, 'Abdul', '773d59f037cb61a086ba65a160e8578f', 'abdul@gmail.com', '6021352e923ec6.91179787', 'default.png', 1, 0, '2021-02-08 06:57:18', NULL, NULL),
(70, 'Babang', 'anjim', 'babangsatan@gmail.com', 'asd', 'asd', 1, 14, '2021-02-24 15:06:28', NULL, NULL),
(71, 'qwerty', '678244dd36a44055410abdc0d43e1d3e', 'qwerty@gmail.com', '60360a21b8e2c4.73194969', 'default.png', 1, 0, '2021-02-24 02:11:13', NULL, NULL);

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `Dompet` AFTER INSERT ON `user` FOR EACH ROW BEGIN
    INSERT INTO dompet
    set id_user = new.id,
    jumlah = 50000,
    created_date = NOW(),
    created_by = 14;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `addCust` AFTER INSERT ON `user` FOR EACH ROW BEGIN
    INSERT INTO customer
    set UserId = NEW.id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `deleteCustomer` AFTER DELETE ON `user` FOR EACH ROW BEGIN
	DELETE FROM customer WHERE UserId = old.id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapusDompet` AFTER DELETE ON `user` FOR EACH ROW BEGIN
    DELETE FROM dompet WHERE id_user = old.id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapusKomentar` AFTER DELETE ON `user` FOR EACH ROW BEGIN
    DELETE FROM komentar WHERE id_user = old.id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapusKomentarArtikel` AFTER DELETE ON `user` FOR EACH ROW BEGIN
    DELETE FROM komentar_artikel WHERE id_user = old.id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapusTransaksi` AFTER DELETE ON `user` FOR EACH ROW BEGIN
    DELETE FROM transaksi WHERE id_pembeli = old.id;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `by_user` (`by`);

--
-- Indexes for table `bahan_kue`
--
ALTER TABLE `bahan_kue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `UserId` (`UserId`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_barang` (`Id_barang`),
  ADD KEY `Id_transaksi` (`Id_transaksi`);

--
-- Indexes for table `dompet`
--
ALTER TABLE `dompet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentar_ibfk_1` (`id_user`),
  ADD KEY `komentar_ibfk_2` (`id_barang`);

--
-- Indexes for table `komentar_artikel`
--
ALTER TABLE `komentar_artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ibfk_2` (`id_user`),
  ADD KEY `ibfk_1` (`id_artikel`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_ibfk_2` (`id_pembeli`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bahan_kue`
--
ALTER TABLE `bahan_kue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `dompet`
--
ALTER TABLE `dompet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `komentar_artikel`
--
ALTER TABLE `komentar_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1024;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `by_user` FOREIGN KEY (`by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `id_barang` FOREIGN KEY (`id_barang`) REFERENCES `bahan_kue` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`id`);

--
-- Constraints for table `dompet`
--
ALTER TABLE `dompet`
  ADD CONSTRAINT `fk_dompet` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `bahan_kue` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar_artikel`
--
ALTER TABLE `komentar_artikel`
  ADD CONSTRAINT `ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notif`
--
ALTER TABLE `notif`
  ADD CONSTRAINT `notif_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pembeli`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
