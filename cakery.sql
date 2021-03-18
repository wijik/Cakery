-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 03:32 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `bahan_kue`
--

CREATE TABLE `bahan_kue` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
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

INSERT INTO `bahan_kue` (`id`, `nama_barang`, `gambar`, `deskripsi`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'Tepung Terigu', '1604966684_b05d61b513f93d6a2818.jpg', 'Tepung terigu merupakan salah satu bahan pembuat makanan yang umum ditemukan di Indonesia. Terbuat dari sari pati umbi atau biji-bijian, tepung terigu sering digunakan sebagai bahan utama pembuatan roti, mi, hingga aneka kudapan goreng. ', 5000, 95, '2020-11-06 22:06:03', '2020-11-09 18:14:52'),
(2, 'Gula', '1604966704_13bdff38f9ea0d3bd187.jpg', 'Gula adalah suatu karbohidrat sederhana yang menjadi sumber energi dan komoditas perdagangan utama. Gula paling banyak diperdagangkan dalam bentuk kristal sukrosa padat. Gula digunakan untuk mengubah rasa menjadi manis dan keadaan makanan atau minuman.', 10000, 98, '2020-11-07 21:25:00', '2020-11-09 19:25:01'),
(3, 'Baking soda', '1604966720_b02c36d905718bb59b1d.jpg', 'Merupakan komponen baking powder, kandungannya adalah sodium bicarbonat. Sifat bahan ini mengeluarkan gas (CO2) sehingga kue akan mengembang. Untuk membuat cake, penggunaannya biasanya bersamaan dengan baking powder. Untuk kue kering, soda kue memberikan efek tekstur kering, garing, dan renyah. Untuk membuat cake sebenarya menggunakan baking powder saja sudah cukup.', 20000, 92, '2020-11-07 21:25:42', '2020-11-09 22:14:32'),
(4, 'cream of tartar', '1604966745_0a0f6ee418ab5e01ae08.jpg', 'Cream of tartar atau krim tartar merupakan salah satu bahan pelembut kue. ... Selain melembutkan tekstur kue, krim tartar juga bisa dipakai sebagai ragi atau pengembang. Kombinasi krim tartar dengan baking soda akan menghasilkan gas karbondioksida—jenis gas yang juga dihasilkan ragi dalam roti panggang', 5000, 85, '2020-11-07 21:26:22', '2020-11-09 18:13:36'),
(5, 'SP', '1604966761_0119ba79ebcbb8138696.jpg', 'Fungsi SP yaitu membuat adonan menjadi homogen dan tidak mudah turun saat dikocok atau biasa di sebut cake emulsifier. Biasanya digunakan untuk cake, bolu atau kue-kue lain yang menggunakan teknik telur dikocok hingga mengembang kaku.', 5000, 100, '2020-11-07 21:27:01', '2020-11-09 19:24:42'),
(6, 'Fermippan', '1604968209_69f39692b135424bee0d.jpg', 'Fermipan adalah merk yeast (ragi) kering instant dari Perancis yang sudah dikenal oleh pembuat kue di seluruh dunia. Tidak hanya para profesional saja yang menggunakanya, banyak ibu rumah tangga yang memakai fermipan sebagai bahan pengembang roti alami.\r\n', 5000, 80, '2020-11-09 18:30:09', '0000-00-00 00:00:00');

--
-- Triggers `bahan_kue`
--
DELIMITER $$
CREATE TRIGGER `before_delete_produk` BEFORE DELETE ON `bahan_kue` FOR EACH ROW INSERT INTO log_barang (status, nama_barang) VALUES ('BARANG DI HAPUS', old.nama_barang)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_produk_update` BEFORE UPDATE ON `bahan_kue` FOR EACH ROW BEGIN
    INSERT INTO log_barang
    set id = OLD.id,
    nama_barang = old.nama_barang,
    status = "Barang Di Update",
    harga_baru=new.harga,
    harga_lama=old.harga,
    nama_lama=old.nama_barang,
    nama_baru=new.nama_barang,
    stok_lama=old.stok,
    stok_baru=new.stok,
    waktu = NOW(); 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
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
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `by`, `judul`, `slug`, `gambar`, `isi`, `created_date`, `updated_date`) VALUES
(9, 14, 'Resep kastengael', 'resep-kastengael', '1604968056_5b30a37efce251633544.jpg', '<p><strong>Bahan bahan</strong></p><p>- 300 gram mentega<br>- 350 gram terigu protein sedang<br>- 50 gram maizena<br>- 2 sdm susu bubuk<br>- 100 gram keju edam parut<br>- 100 gram keju parmesan parut</p><p><strong>Olesan:</strong><br>- kuning telur (kocok lepas)</p><p><strong>Taburan:</strong><br>- keju cheddar parut</p><p><strong>Cara membuat:</strong><br>1. Campur dan ayak terigu, maizena dan susu bubuk. Sisihkan.<br>2. Kocok mentega sebentar saja hingga lunak. Masukkan keju edam dan parmesan parut, aduk rata dengan sendok kayu.<br>3. Masukkan campuran terigu, aduk rata dengan sendok kayu sampai rata dan adonan sudah bisa dibentuk.<br>4. Gilas tipis adonan lalu cetak sesuai selera. Tata dalam loyang tanpa dioles margarin. Oles dengan kuning telur dan taburi keju cheddar parut.<br>- Panggang di teflon sampai matang.</p>', '2020-11-06 22:12:20', '2020-11-09 18:27:36'),
(10, 14, 'Kue PUKIS empuk', 'kue-pukis-empuk', '1604733522_92114f64ae631aceec5e.jpg', '<p><strong>Bahan Bahan</strong></p><ol><li><strong>25 gr</strong> tepung terigu</li><li><strong>50 ml</strong> air (hangat)</li><li><strong>1/2 sdm</strong> ragi instan (fermipan)</li><li>Bahan:</li><li><strong>3 butir</strong> telur</li><li><strong>150 gr</strong> gula pasir</li><li><strong>250 gr</strong> tepung terigu</li><li><strong>300 ml</strong> santan kental hangat (1 kelapa)</li><li><strong>50 ml</strong> minyak sayur</li></ol><p><strong>Langkah Langkah</strong></p><ol><li>Campur bahan biang aduk rata, biarkan kurleb 10 menit sampai berbuih.</li><li>Kocok telur dan gula hg kental, kecilkan mixer, masukan bahan biang, terigu dan santan sedikit demi sedikit bergantian sambil di kocok hg rata.</li><li>Masukan minyak sayur dan garam, aduk rata.</li><li>Diamkan adonan 1 jam hingga mengembang.</li><li>Panaskan cetakan pukis (api kecil), olesi dg margarin (selanjutnya tdk usah di oles lg), tuang adonan 3/4 cetakan lalu tutup dan tunggu hg matang, angkat.</li><li>Tips:<br>- Gunakan wadah yg besar waktu mengocok telur krn adonan akan mengembang 2x lipat.<br>- Aduk adonan tiap kali akan menuang adonan ke cetakan (utk menghilangkan gelembung udara agar permukaan kue tetap mulus tdk berlubang-lubang).<br>- Adonan bs ditambah pasta pandan atau coklat utk rasa yg berbeda.</li></ol>', '2020-11-07 01:18:42', '2020-11-07 01:20:17'),
(11, 14, 'Kue onde onde', 'kue-onde-onde', '1604929054_bf4765bba66a2c04e293.jpg', '<p><strong>Bahan bahan</strong></p><ol><li><strong>250 gr</strong> tepung ketan (me :rosebrand)</li><li><strong>50 gr</strong> kentang yg sudah di kukus haluskan</li><li><strong>5 sdm</strong> gula pasir (pke gula halus Lebih oke)</li><li><strong>1/4 sdt</strong> garam</li><li><strong>155-160 ml</strong> air hangat (tuang bertahap)</li><li><strong>100 gr</strong> wijen putih</li><li>isian kacang hijau</li><li>Bahan-bahan :</li><li><strong>100 gr</strong> kacang hijau tanpa kulit (rendam 1 - 2 jam)</li><li><strong>150 ml</strong> santan kental (1 scht K*ra diencerkan)</li><li><strong>1/4 sdt</strong> garam</li><li><strong>5 sdm</strong> gula pasir</li><li><strong>Secukupnya</strong> vanila</li><li><strong>1 lembar</strong> daun pandan ikat simpul</li></ol><p>&nbsp;</p><p><strong>Langkah langkah</strong></p><ol><li>Campur tepung + kentang + gula + garam.. tuangi air hangat bertahap ????Uleni hingga kalis.. airnya gk perlu semua asal udah enak di bentuk</li><li>Bagi Adonan kulit masing masing @30 gr ????Lalu siapkan juga isian nya, bulat bulatkan @20 gr</li><li>Bagi adonan, lalu pipihkan adonan kulit, beri isian ????Lalu bulatkan sampai halus</li><li>Lalu siapkan semangkuk Air dan Wijen ????Celupkan onde-onde yg sudah dibulatkan tadi ke air, lalu masukan ke mangkuk yg berisi wijen, taburi smpai tertutup rata</li><li>Siapkan minyak agak banyak. Lalu masukan onde\"selagi minyak dingin, nyalakan API sedang cenderung kecil lalu Goreng hingga kering Kuning kecoklatan, jgn keseringan diaduk ya.. agar wijen Tidak rontok\", kalo udah ngapung Dan diputer\" onde-onde Nya, Goreng Hingga Coklat keemasan, angkat Dan tiriskan</li></ol><p>Untuk bahan isian :<br>Cuci bersih kacang hijau kupas, lalu rendam 2 jam ????Tiriskan kacang yg sudah di rendam 2 jam\'an.. kukus hingga empuk.. Lalu haluskan pakai blander tuang sedikit santan blander hingga lembut ????Tuang di teflon / panci.. masukan daun pandan + gula + vanila + santan.. ????Masak pakai api kecil hingga menyusut dan bisa di pulung<br>????Angkat dan dinginkan<br>????Kalo udah dingin bulat\"kan menjadi 10 - 12 bulatan atau sesuai selera</p><p><br>&nbsp;</p>', '2020-11-09 07:37:34', '0000-00-00 00:00:00');

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
(59, 3, 24, 1);

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
(2, 17, 28580000, '2020-11-05 21:48:17', 14, '2020-11-09 23:42:33', 14),
(3, 22, 24000, '2020-11-06 14:56:15', 14, '2020-11-07 20:31:28', 14),
(4, 14, 8449000, '2020-11-06 06:58:07', 14, '0000-00-00 00:00:00', 0),
(6, 23, 5000, '2020-11-09 18:00:16', 14, '2020-11-09 23:42:46', 14),
(7, 24, 55000, '2021-01-12 09:46:31', 14, '2021-01-11 21:12:39', 14);

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
(35, 23, 6, '<p>Apa barang ini bisa di pakai di bolu gulung</p>', 23, '2020-11-16 09:39:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komentar_artikel`
--

CREATE TABLE `komentar_artikel` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_blog` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar_artikel`
--

INSERT INTO `komentar_artikel` (`id`, `id_user`, `id_blog`, `komentar`, `created_date`, `updated_date`) VALUES
(22, 23, 9, 'Saya sudah coba resep nya, berhasil\r\nTerimakasih', '2020-11-15 20:45:01', '0000-00-00 00:00:00'),
(23, 23, 10, 'Saya sudah coba, rasanya enak sekali', '2020-11-15 21:10:05', '0000-00-00 00:00:00'),
(24, 17, 9, 'marhaban ya romadhon\r\n', '2021-01-18 21:27:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `log_barang`
--

CREATE TABLE `log_barang` (
  `log_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `harga_lama` int(11) DEFAULT NULL,
  `harga_baru` int(11) DEFAULT NULL,
  `nama_lama` varchar(255) DEFAULT NULL,
  `nama_baru` varchar(255) DEFAULT NULL,
  `stok_lama` int(11) DEFAULT NULL,
  `stok_baru` int(11) DEFAULT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_barang`
--

INSERT INTO `log_barang` (`log_id`, `id`, `nama_barang`, `status`, `harga_lama`, `harga_baru`, `nama_lama`, `nama_baru`, `stok_lama`, `stok_baru`, `waktu`) VALUES
(12, 12, 'Percobaan', 'Barang Di Update', 1000, 1000, 'Percobaan', 'Percobaan', 200, 500, '2021-01-19 19:24:28'),
(13, 1, 'Tepung Terigu', 'Barang Di Update', 5000, 5000, 'Tepung Terigu', 'Tepung Terigu', 96, 95, '2021-01-28 20:30:32'),
(14, 1, 'Tepung Terigu', 'Barang Di Update', 5000, 5000, 'Tepung Terigu', 'Tepung Terigu', 95, 94, '2021-01-28 20:31:42'),
(15, 1, 'Tepung Terigu', 'Barang Di Update', 5000, 5000, 'Tepung Terigu', 'Tepung Terigu', 94, 95, '2021-01-28 20:31:42'),
(16, 1, 'Tepung Terigu', 'Barang Di Update', 5000, 5000, 'Tepung Terigu', 'Tepung Terigu', 95, 94, '2021-01-28 20:33:00'),
(17, 1, 'Tepung Terigu', 'Barang Di Update', 5000, 5000, 'Tepung Terigu', 'Tepung Terigu', 94, 95, '2021-01-28 20:33:00'),
(18, 2, 'Gula', 'Barang Di Update', 10000, 10000, 'Gula', 'Gula', 93, 92, '2021-01-28 20:34:58'),
(19, 2, 'Gula', 'Barang Di Update', 10000, 10000, 'Gula', 'Gula', 92, 93, '2021-01-28 20:34:58'),
(20, 4, 'cream of tartar', 'Barang Di Update', 5000, 5000, 'cream of tartar', 'cream of tartar', 85, 84, '2021-01-31 21:42:35'),
(21, 4, 'cream of tartar', 'Barang Di Update', 5000, 5000, 'cream of tartar', 'cream of tartar', 84, 85, '2021-01-31 21:42:35'),
(22, 0, 'Percobaan', 'BARANG DI HAPUS', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00'),
(23, 6, 'Fermippan', 'Barang Di Update', 5000, 5000, 'Fermippan', 'Fermippan', 80, 79, '2021-01-31 21:48:56'),
(24, 6, 'Fermippan', 'Barang Di Update', 5000, 5000, 'Fermippan', 'Fermippan', 79, 80, '2021-01-31 21:48:56'),
(25, 3, 'Baking soda', 'Barang Di Update', 20000, 20000, 'Baking soda', 'Baking soda', 92, 93, '2021-01-31 21:52:18'),
(26, 3, 'Baking soda', 'Barang Di Update', 20000, 20000, 'Baking soda', 'Baking soda', 93, 92, '2021-01-31 21:52:18'),
(27, 2, 'Gula', 'Barang Di Update', 10000, 10000, 'Gula', 'Gula', 93, 98, '2021-02-01 08:23:08');

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

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id`, `id_user`, `deskripsi`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(9, 23, 'rizki ingin di isi dana nya dengan jumlah 50000', '2020-11-15 21:09:15', 23, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `total_harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_barang`, `id_pembeli`, `created_date`, `created_by`, `updated_date`, `updated_by`, `total_harga`, `jumlah`, `alamat`, `ongkir`) VALUES
(29, 1, 17, '2020-11-06 23:27:21', 17, NULL, NULL, 89000, 10, 'bengek hyung', 39000),
(30, 1, 22, '2020-11-06 23:30:55', 22, NULL, NULL, 261000, 50, 'jalan ahmad yani nomer 69', 11000),
(31, 1, 22, '2020-11-06 23:49:13', 22, NULL, NULL, 42000, 5, 'awdasdaw', 17000),
(32, 1, 22, '2020-11-07 01:42:58', 22, NULL, NULL, 38000, 5, 'coba coba ngurangin stok', 13000),
(33, 1, 22, '2020-11-07 03:28:16', 22, NULL, NULL, 99000, 6, 'kagok ajg', 69000),
(34, 1, 22, '2020-11-07 03:34:03', 22, NULL, NULL, 463000, 89, 'habisin uang anjg', 18000),
(35, 1, 22, '2020-11-07 03:40:30', 22, NULL, NULL, 108000, 19, 'kurang 8 ribu', 13000),
(36, 1, 22, '2020-11-07 08:15:26', 22, NULL, NULL, 32000, 2, 'coba pdf', 22000),
(37, 1, 22, '2020-11-07 08:41:55', 22, NULL, NULL, 29000, 1, 'plz lah jalan cuk\r\n', 24000),
(38, 1, 22, '2020-11-07 21:17:10', 22, NULL, NULL, 76000, 10, 'keknya gagal bos', 11000),
(39, 1, 22, '2020-11-07 21:17:10', 22, NULL, NULL, 76000, 3, 'keknya gagal bos', 11000),
(40, 5, 17, '2020-11-07 21:29:40', 17, NULL, NULL, 115000, 10, 'coba dd', 65000),
(41, 5, 17, '2020-11-07 21:31:29', 17, NULL, NULL, 75000, 5, 'ya i did it again', 50000),
(42, 5, 17, '2020-11-07 21:33:37', 17, NULL, NULL, 65000, 3, 'mahal sama ongkos nya ajg', 50000),
(43, 5, 17, '2020-11-07 21:34:15', 17, NULL, NULL, 60000, 2, 'emang mahal sama ongkir nya ajg', 50000),
(44, 5, 17, '2020-11-07 22:12:41', 17, NULL, NULL, 205000, 5, 'harusnya ngurang 4', 50000),
(45, 2, 17, '2020-11-07 22:12:41', 17, NULL, NULL, 205000, 5, 'harusnya ngurang 4', 50000),
(46, 3, 17, '2020-11-07 22:12:41', 17, NULL, NULL, 205000, 3, 'harusnya ngurang 4', 50000),
(47, 4, 17, '2020-11-07 22:12:41', 17, NULL, NULL, 205000, 4, 'harusnya ngurang 4', 50000),
(48, 2, 17, '2020-11-08 10:20:23', 17, NULL, NULL, 79000, 1, 'banyak duit bebas bos', 69000),
(49, 3, 23, '2020-11-08 11:01:46', 23, NULL, NULL, 98000, 4, 'kurang 2k kata w juga', 18000),
(50, 5, 17, '2020-11-08 17:10:41', 17, NULL, NULL, 65000, 5, 'when im so damn tired', 35000),
(51, 4, 17, '2020-11-08 17:10:41', 17, NULL, NULL, 65000, 1, 'when im so damn tired', 35000),
(52, 2, 17, '2020-11-08 17:14:00', 17, NULL, NULL, 77000, 3, 'mamah bade nu ka maot hela', 22000),
(53, 4, 17, '2020-11-08 17:14:00', 17, NULL, NULL, 77000, 5, 'mamah bade nu ka maot hela', 22000),
(54, 3, 17, '2020-11-09 17:52:28', 17, NULL, NULL, 75000, 2, 'h-1 njinx', 35000),
(55, 3, 17, '2020-11-09 19:21:35', 17, NULL, NULL, 1898000, 94, 'alamat', 18000),
(56, 3, 17, '2020-11-09 19:21:36', 17, NULL, NULL, 1898000, 94, 'alamat', 18000),
(57, 2, 17, '2020-11-09 19:22:16', 17, NULL, NULL, 33000, 2, 'coba coba', 13000),
(58, 3, 17, '2020-11-09 23:38:12', 17, NULL, NULL, 51000, 2, 'aduh meni udah pada ladu', 11000),
(59, 6, 17, '2020-11-10 07:18:53', 17, NULL, NULL, 85000, 1, 'mahal sama ongkos nya anjng', 80000),
(60, 4, 17, '2020-11-10 09:38:32', 17, NULL, NULL, 64000, 5, 'papa pre perpapwawoawkoaoawokawo', 39000),
(61, 1, 23, '2020-11-12 07:51:48', 23, NULL, NULL, 23000, 1, 'coba pdf', 18000),
(62, 1, 23, '2020-11-12 07:52:13', 23, NULL, NULL, 23000, 1, 'coba pdf', 18000),
(63, 1, 23, '2020-11-12 07:52:28', 23, NULL, NULL, 23000, 1, 'coba pdf', 18000),
(64, 1, 23, '2020-11-12 07:52:52', 23, NULL, NULL, 23000, 1, 'coba pdf', 18000),
(65, 6, 17, '2020-11-12 07:54:26', 17, NULL, NULL, 23000, 1, 'plz lah berhasil cuk', 18000),
(66, 6, 17, '2020-11-12 07:55:11', 17, NULL, NULL, 23000, 1, 'plz lah berhasil cuk', 18000),
(67, 6, 17, '2020-11-12 07:56:19', 17, NULL, NULL, 23000, 1, 'plz lah berhasil cuk', 18000),
(68, 6, 17, '2020-11-12 07:56:35', 17, NULL, NULL, 23000, 1, 'plz lah berhasil cuk', 18000),
(69, 6, 17, '2020-11-12 07:56:44', 17, NULL, NULL, 23000, 1, 'plz lah berhasil cuk', 18000),
(70, 6, 17, '2020-11-12 07:57:03', 17, NULL, NULL, 23000, 1, 'plz lah berhasil cuk', 18000),
(71, 6, 17, '2020-11-12 07:57:14', 17, NULL, NULL, 23000, 1, 'plz lah berhasil cuk', 18000),
(72, 6, 17, '2020-11-12 07:57:22', 17, NULL, NULL, 23000, 1, 'plz lah berhasil cuk', 18000),
(73, 6, 17, '2020-11-12 07:57:27', 17, NULL, NULL, 23000, 1, 'plz lah berhasil cuk', 18000),
(74, 6, 17, '2020-11-12 07:58:30', 17, NULL, NULL, 23000, 1, 'plz lah berhasil cuk', 18000),
(75, 6, 17, '2020-11-12 07:58:48', 17, NULL, NULL, 23000, 1, 'plz lah berhasil cuk', 18000),
(76, 6, 17, '2020-11-12 08:00:03', 17, NULL, NULL, 23000, 1, 'plz lah berhasil cuk', 18000),
(77, 6, 17, '2020-11-12 08:02:06', 17, NULL, NULL, 23000, 1, 'plz lah berhasil cuk', 18000),
(78, 2, 17, '2020-11-12 08:03:02', 17, NULL, NULL, 45000, 1, 'kok mahal bet harga gula ya', 35000),
(79, 2, 17, '2020-11-12 08:06:25', 17, NULL, NULL, 45000, 1, 'kok mahal bet harga gula ya', 35000),
(80, 2, 17, '2020-11-12 08:07:24', 17, NULL, NULL, 36000, 1, 'walau semua masih ada di kepala', 26000),
(81, 3, 17, '2020-11-12 08:16:29', 17, NULL, NULL, 59000, 1, 'mahal sama ongkos ajg', 39000),
(82, 3, 17, '2020-11-12 08:17:44', 17, NULL, NULL, 103000, 1, 'mahal bet dah onkgos nya', 83000),
(83, 3, 17, '2020-11-12 08:19:25', 17, NULL, NULL, 62000, 1, 'kepaihang', 42000),
(84, 3, 17, '2020-11-12 08:22:50', 17, NULL, NULL, 89000, 1, 'mantap beli susu', 69000),
(85, 2, 17, '2020-11-12 09:35:36', 17, NULL, NULL, 79000, 1, 'jika kau bisa', 69000),
(86, 2, 17, '2020-11-12 09:35:46', 17, NULL, NULL, 79000, 1, 'jika kau bisa', 69000),
(87, 2, 17, '2020-11-12 09:36:04', 17, NULL, NULL, 79000, 1, 'jika kau bisa', 69000),
(88, 2, 24, '2021-01-11 21:16:46', 24, NULL, NULL, 45000, 1, 'plz lah', 35000),
(90, 1, 17, '2021-01-28 07:31:42', 17, NULL, NULL, 70000, 1, 'harusnya 96 sih', 65000),
(91, 1, 17, '2021-01-28 07:33:00', 17, NULL, NULL, 70000, 1, 'harusnya 96 sih', 65000),
(92, 2, 17, '2021-01-28 07:34:58', 17, NULL, NULL, 28000, 1, 'ayolah 93', 18000);

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `tambah_stok` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
    UPDATE bahan_kue SET stok = stok + new.jumlah
   WHERE id = new.id_barang;
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
(14, 'admin', '2009fb1187367feecaf8c9e69678123b', 'dimasbayu080103@gmail.com', '5f9120c11c6007.36523312', '1604967893_d4bbb2f5c8bf80152924.png', 0, 0, '2020-10-22 01:03:45', 14, '2020-11-09 18:24:53'),
(17, 'Robbi', '47187d63f94732e72714a91bad07d5ed', 'dimasbayu080103@gmail.com', '5f912d7be22792.64605728', 'user.jpeg', 1, 0, '2020-10-22 01:58:03', NULL, NULL),
(22, 'brian', 'acaf06a9da08c71d2b9b85713c7794e7', 'dimasbayu080103@gmail.com', '5f9a101b4780c9.21326150', '1605019247_55434613cbce45c26d38.png', 1, 0, '2020-10-28 19:43:07', 22, '2020-11-10 08:40:47'),
(23, 'rizki', '49626fbd6fa89a72806fa3cb7266cd00', 'dimasbayu080103@gmail.com', '5fa81c4dee91f4.23557840', '1605019247_55434613cbce45c26d38.png', 1, 0, '2020-11-08 10:26:53', 23, '2020-11-10 08:05:19'),
(24, 'rijal', 'd8403c20830ca6693b62ac51768d6e27', 'rijal@gmail.com', '5ff80993ed5bf8.42938738', 'default.png', 1, 0, '2021-01-08 01:28:19', NULL, NULL);

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
-- Indexes for table `bahan_kue`
--
ALTER TABLE `bahan_kue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `by_user` (`by`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `dompet`
--
ALTER TABLE `dompet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dompet` (`id_user`);

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
  ADD KEY `ibfk_1` (`id_blog`),
  ADD KEY `ibfk_2` (`id_user`);

--
-- Indexes for table `log_barang`
--
ALTER TABLE `log_barang`
  ADD PRIMARY KEY (`log_id`);

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
  ADD KEY `transaksi_ibfk_1` (`id_barang`),
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
-- AUTO_INCREMENT for table `bahan_kue`
--
ALTER TABLE `bahan_kue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `dompet`
--
ALTER TABLE `dompet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `komentar_artikel`
--
ALTER TABLE `komentar_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `log_barang`
--
ALTER TABLE `log_barang`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `by_user` FOREIGN KEY (`by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `id_barang` FOREIGN KEY (`id_barang`) REFERENCES `bahan_kue` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `ibfk_1` FOREIGN KEY (`id_blog`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `bahan_kue` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pembeli`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
