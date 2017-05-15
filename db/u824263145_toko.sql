
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2017 at 11:28 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u824263145_toko`
--
drop database tokoku;
create database tokoku;
use tokoku;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `id_bank` int(2) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nomor_rekening` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_bank`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `nomor_rekening`) VALUES
(1, 'BCA', '7000987611'),
(2, 'BCA', '8000987622'),
(3, 'Mandiri', '6000543'),
(4, 'Mandiri', '5000543'),
(5, 'BRI', '4000321555'),
(6, 'BRI', '3000321666');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL,
  `lokasi_gambar` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(15) NOT NULL,
  `stok` int(3) NOT NULL,
  `bobot` float DEFAULT NULL,
  `id_kategori_barang` int(2) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=121 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `deskripsi`, `lokasi_gambar`, `harga`, `stok`, `bobot`, `id_kategori_barang`) VALUES
(1, 'Nike Women''s Air Max 2016 Sepatu Lari', '<p>Color: Pink</p>\n<ul style="list-style-type: disc;">\n<li>Synthetic</li>\n<li>Authentic-Nike-brand</li>\n<li>US Sizes</li>\n<li>Innovative AIR MAX 2016 with better cushioning and even more comfortable fit</li>\n<li>The midsole adopted the flexible, cushioned, and lightweight 360 max air bag</li>\n<li>Amazon Recommend,100% Authentic,7-15 days delivery!</li>\n</ul>', '1.jpg', 1200000, 9, 1000, 1),
(2, 'Pulsa Rp. 10.000', '', 'Pulsa10000.jpg', 10500, 2, 12345, 8),
(3, 'Pulsa Rp. 25.000', '', 'Pulsa25000.jpg', 25500, 2, 12345, 8),
(4, 'Pulsa Rp. 50.000', '', 'Pulsa50000.jpg', 50500, 2, 12345, 8),
(5, 'Pulsa Rp. 100.000', '', 'Pulsa100000.jpg', 100500, 2, 12345, 8),
(6, 'Paket Data Rp. 50.000', '', 'Paket50000.jpg', 50000, 2, 12345, 9),
(7, 'Paket Data Rp. 100.000', '', 'Paket100000.jpg', 100000, 2, 12345, 9),
(8, 'Paket Data Rp. 150.000', '', 'Paket150000.jpg', 150000, 2, 12345, 9),
(9, 'Paket Data Rp. 200.000', '', 'Paket200000.jpg', 200000, 2, 12345, 9),
(15, 'Lacoste Men''s Short Sleeve Resort Semi-Fancy Polo', '<ul style="list-style-type: disc;">\r\n<li>Shell: 100% Cotton</li>\r\n<li>Imported</li>\r\n<li>Machine Wash</li>\r\n<li>Color block striped color</li>\r\n<li>Contrasting colors</li>\r\n<li>Classic polo fit</li>\r\n</ul>', '15.jpg', 1064000, 18, 800, 1),
(11, 'Token Listrik Rp. 25.000', '', 'Listrik25000.jpg', 25000, 2, 12345, 10),
(12, 'Token Listrik Rp. 50.000', '', 'Listrik50000.jpg', 50000, 2, 12345, 10),
(13, 'Token Listrik Rp. 100.000', '', 'Listrik100000.jpg', 100000, 2, 12345, 10),
(14, 'Token Listrik Rp. 200.000', '', 'Listrik200000.jpg', 200000, 2, 12345, 10),
(16, 'Faber-Castell set of 6 Drawing Pencils 2B', '<ul style="list-style-type: disc;">\r\n<li>Hexagonal black lead pencils</li>\r\n<li><span class="a-list-item">Set of 6 Drawing pencils includes 2B, 3B, 4B, 5B, 6B, &amp; 8B</span></li>\r\n<li><span class="a-list-item">Can be used for drawing, sketching, hatching, shading, shorthand &amp; computer stationery.</span></li>\r\n</ul>', '16.jpg', 54000, 30, 100, 2),
(17, 'Post-it Flags 1/2-Inch ', '<ul style="list-style-type: disc;">\r\n<li>35/Dispenser, 4-Dispensers/Pack</li>\r\n<li>NOTE:Item is of Assorted Primary Colors.</li>\r\n<li>Flags make it simple to mark, flag or highlight important information</li>\r\n<li>Eye-catching, colorful flag in detachable dispenser is easy to spot.great for color-coding</li>\r\n<li>Each flag sticks securely, removes cleanly</li>\r\n<li>Dispenses one flag at a time</li>\r\n</ul>', '17.jpg', 42000, 50, 2000, 2),
(18, 'Kenko Scissor SF-808  ', '<p><strong>KENKO Gunting SF-808</strong><em><strong>&nbsp;</strong></em>merupakan merupakan gunting yang biasanya digunakan untuk memotong material tipis, seperti kertas atau karton. Sangat berguna untuk keperluan di rumah, sekolah, ataupun kantor. Material stainless pada pisau menghindarkan dari masalah karatan, dan tentu akan tahan lama. Desain pegangan yang nyaman digunakan juga menjadi keunggulan produk ini.</p>', '18.jpg', 19700, 25, 250, 2),
(19, ' Butterfly Penggaris Panjang 30Cm', '<p>Butterfly Penggari Panjang 30Cm, Bahan Aman, Kualitas Plastik Bagus, Tidak Mudah Patah, Mudah Digunakan Dan Awet</p>', '19.jpg', 2000, 29, 30, 2),
(20, 'Amplop Bubble Wrap coklat A5 ', '<ul class="a-unordered-list a-vertical a-spacing-none">\r\n<li><span class="a-list-item">BUBBLE MAILER SIZE: Outside size: 6x10 inch, Inside size: 6x9 inch. Pack of 25pcs</span></li>\r\n<li><span class="a-list-item">LIGHT WEIGHT CUSHION MAILERS: This padded envelopes is very light.</span></li>\r\n<li><span class="a-list-item">DURABLE: The surface of this bubble envelopes made from a durable, recycled kraft paper. The interior built with bubble lined wall construction for extra protection during transit, ensure the packages arrive in great condition.</span></li>\r\n<li><span class="a-list-item">TIGHT SEAL: The self-seal closure provides a reliable, tamper-evident tight seal to secure all enclosures. Extra smooth surface is perfect for handwriting, labeling and stamping.</span></li>\r\n</ul>', '20.jpg', 50000, 25, 800, 2),
(21, 'Spidol Snowman kecil', '<ul class="a-unordered-list a-vertical a-spacing-none">\r\n<li class="">Merk: Snowman</li>\r\n<li class="">Tipe: Whiteboard Marker</li>\r\n<li class="">Diameter Ujung Spidol: 4.5 mm</li>\r\n<li class="">Model Ujung Spidol: Bullet</li>\r\n<li class="">Warna: hitam</li>\r\n<li class="">Dijual dalam: 1 pcs</li>\r\n<li class="">Bisa Dihapus: Bisa</li>\r\n</ul>', '21.jpg', 15000, 50, 100, 2),
(22, 'PEN PAPER Stamp Pad / Bak Stempel Artline No 2', '<ul class="a-unordered-list a-vertical a-spacing-none">\r\n<li class="">Merk: Artline</li>\r\n<li class="">Ukuran: No 2</li>\r\n<li class="">Tipe: Stamp Pad (Bak Stempel)</li>\r\n<li class="">Dijual dalam: 1 buah</li>\r\n</ul>', '22.jpg', 58000, 35, 200, 2),
(23, 'Notebook A5 kokuyo CLA-104A', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Material:paper</li>\r\n<li class="">Color:kraft paper cover White inside page</li>\r\n<li class="">Size：12*18cm</li>\r\n<li class="">Contains 100 sheets of premium paper</li>\r\n<li class="">Can as Graffiti , sketchbook,and menu</li>\r\n<li class="">Full blank pages, enjoy your imagination diy</li>\r\n</ul>', '23.jpg', 55000, 20, 300, 2),
(24, 'Double Tape Nachi 1 inch', '<ul style="list-style-type: square;">\r\n<li>Isolasi dengan perekat 2 sisi</li>\r\n<li>Merekat dengan baik</li>\r\n<li>Dapat disobek dengan tangan</li>\r\n<li>Diameter luar 9 cm</li>\r\n<li>Diameter dalam 8 cm</li>\r\n<li>Lebar 24 mm</li>\r\n<li>Isi 3 pcs</li>\r\n</ul>', '24.jpg', 20000, 12, 200, 2),
(25, 'JO & NIC Atasan Batik Kutu Baru Peplum', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Atasan batik yang cocok untuk ke kantor dan segala acara</li>\r\n<li class="">Cutting peplum untuk kesan ramping</li>\r\n<li class="">Design kutu baru yang sedang in</li>\r\n<li class="">Tersedia 3 ukuran M, L, XL</li>\r\n</ul>', '25.jpg', 150000, 15, 320, 3),
(26, 'Cokelat Monggo Dark 69 %  ', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Terbuat Dari Coklat Pilihan&nbsp;</li>\r\n<li class="">Pure Dark 69 %&nbsp;</li>\r\n<li class="">Dikirim langsung dari pusat produksi di Jogja&nbsp;</li>\r\n</ul>', '26.jpg', 70000, 35, 250, 3),
(27, 'Kerajinan Kalung Etnik Motif KL045 - Multicolor ', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Kalung Etnik&nbsp;</li>\r\n<li class="">Ala Budaya Nusantara</li>\r\n<li class="">Tali elastis, bisa diperpanjang atau diperpendek</li>\r\n<li class="">Harga murah &amp; berkualitas</li>\r\n</ul>', '27.jpg', 39000, 6, 800, 3),
(28, 'Gelas Kerajinan Tangan Kayu Cemara Primitif Alami', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Condition: Brand New</li>\r\n<li class="">Material: High Quality of jujube wood</li>\r\n<li class="">Size: 8cm x 6cm</li>\r\n<li class="">Weight: 100g</li>\r\n</ul>', '28.jpg', 67000, 15, 320, 3),
(29, 'Kopi Bali Kintamani Arabica Ground Coffee200gr', '<ul style="list-style-type: square;">\r\n<li>Premium Coffee</li>\r\n<li>Organic</li>\r\n<li>Chocolaty, Bold, Low Acidity</li>\r\n<li>Natural Process</li>\r\n<li>Rich Flavor &amp; Good Aroma</li>\r\n</ul>', '29.jpg', 68000, 23, 250, 3),
(30, ' Baba Rafi Cireng 500gr  ', '<p>&nbsp;</p>\r\n<ul>\r\n<li class="">Gurih</li>\r\n<li class="">Enak</li>\r\n<li class="">Favorit</li>\r\n</ul>\r\n<p>Cireng yang lagi hits di masyarakat ini akan sangat membuat lidah kamu bergoyang dan keingin lagi kepingin lagi</p>\r\n<p>&nbsp;</p>', '30.jpg', 31000, 9, 360, 3),
(31, 'Kalimantan Dompet Manik Mettalic Ukuran Kecil', 'Dompet manik-manik khas Kalimantan\r\nUkuran +/- 10x 8 cm\r\nBahan dalam busa tanpa sekat\r\nMotif bervariasi (lihat foto)\r\nWarna dasar : Mettalic\r\nPRODUK HANDMADE KHAS KALIMANTAN, KUALITAS 100% ORIGIN', '31.jpg', 60000, 18, 200, 3),
(32, 'Logam Kreatif Perak Motor Gantungan Kunci Keychain', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Brand New.</li>\r\n<li class="">High Quality.</li>\r\n<li class="">Inexpensive.</li>\r\n</ul>', '32.jpg', 40000, 15, 50, 3),
(33, 'Star Wars Darth Vader Figures Gantungan Kunci', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Theme:Movie</li>\r\n<li class="">Size:5.4*3.3*2.4 cm</li>\r\n<li class="">Material: Plastic &amp; Metal</li>\r\n<li class="">Model:Keyring</li>\r\n</ul>', '33.jpg', 35000, 45, 50, 3),
(34, 'Hand Made Tas Rajut Dowa Bahan Nylon Horizon Pink ', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Tas Rajut hand made</li>\r\n<li class="">Bahan Nylon kualitas tinggi</li>\r\n<li class="">Model baru dan simple</li>\r\n<li class="">Kuat dan awet</li>\r\n<li class="">Bisa dicuci</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Dowa tote bag Nylon adalah tas branded yg dibuat dg cara rajut secara manual oleh pengrajin yang sangat handal. Dengan bahan yang berkualitas tinggi yaitu nylon. Tas dengan model simple namun tatap tampak elegant sehingga dapat menunjang penampilan juga aman dalam penyimpanan barang anda karna terdapat banyak kantung di dalam tas. Tas ini juga sangat kuat dan awet, bisa dicuci dengan cara di dry clean.&nbsp;</p>', '34.jpg', 450000, 5, 1500, 3),
(35, 'Make Over-Makeover Ultra Hi-Matte Lipstick(3.8 gr)', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Produk Berkualitas</li>\r\n<li class="">Aman Digunakan</li>\r\n<li class="">Harga Terjangkau</li>\r\n<li class="">Ultra Hi-Matte Lipstick Memiliki Tekstur Yang Paling Matte Di Antara Lipstick Lainnya. Warnanya Sangat Intens Dan Tahan Untuk Pemakaian Sampai 8 Jam.Mengandung:Jojoba Oil Untuk Menjaga Kelembaban Bibir Dan Mencegah Bibir Pecah-Pecah,Vitamin E Sebagai Antioksidan.Pilihan Warna:001 King Of Pink002 Pink Alcatraz003 Sophist Red004 Red Heatwave005 Champagne Rose006 Silky Blonde007 Think Pink008 Runway Rebel009 Foxy-010 Smooch011 Baby Bombshell012 Envy013 Orange Pop014 Urban Rouge015 Fame Fatale</li>\r\n</ul>', '35.jpg', 98000, 15, 100, 4),
(36, 'NYX Cosmetics Mineral Finishing Powder-Medium', '<ul>\r\n<li class="">Makeup awet bebas minyak sepanjang hari</li>\r\n<li class="">Aman digunakan sehari-hari</li>\r\n<li class="">Produk berkualitas</li>\r\n<li class="">NYX&nbsp;MIneral Finishing Powder&nbsp;adalah setting powder yang tidak mengandung bahan kimia, melainkan mineral makeup yang natural dan baik untuk kulit. Sebagai sentuhan akhir untuk riasan, gunakan finishing powder dengan brush dan aplikasikan ke wajah. Produk ini membuat makeup bertahan lama dan wajah terlihat bebas minyak dan makeup awet sepanjang hari.</li>\r\n</ul>\r\n<p>&nbsp;</p>', '36.jpg', 240000, 5, 250, 4),
(37, 'Maybelline Fashion Brow Line Duo Shaper Gray', '<ul>\r\n<li class="">2-in-1 brow liner (pensil alis)</li>\r\n<li class="">Waterproof (Tahan Air)</li>\r\n<li class="">Alis tampak lebih tebal alami dan sempurna</li>\r\n<li class="">Dapatkan bentuk alami, alis lebih lengkap dengan Maybellines fashion Alis Duo Shaper, tanpa threading, pemangkasan atau mencabut alis Anda. pertama 2-in-1 alis dengan ujung pensil tipis untuk membentuk alis Anda dan tip bubuk untuk kesan yang lebih lembut. pensil untuk menajamkan dan powder untuk kesan yang lebih lembut untuk hasil yang lebih Wow</li>\r\n</ul>', '37.jpg', 79000, 10, 220, 4),
(38, ' Wardah Blush On C', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Warna alami pada rona pipi,</li>\r\n<li class="">Wajah terlihat lebih segar,</li>\r\n<li class="">Mengandung pigment</li>\r\n</ul>', '38.jpg', 68000, 20, 320, 4),
(39, 'Ellips Hair Vitamin Hair Vitality 50 x 1ml', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Isi 50 x 1Ml</li>\r\n<li class="">Merawat kesehatan rambut</li>\r\n<li class="">Menguatkan rambut</li>\r\n<li class="">100% Original</li>\r\n</ul>', '39.jpg', 72000, 23, 310, 4),
(40, 'Miyako Kipas Angin 2 in 1 Meja & Dinding KAD-927 - Biru', '<p>1 Tahun Garansi Lokal more</p>\r\n<ul style="list-style-type: square;">\r\n<li>Daya 35W</li>\r\n<li>2in1: Meja dan Dinding</li>\r\n<li>2 pilihan kecepatan</li>\r\n<li>Motor Halus Tidak Berisik</li>\r\n<li>Dilengkapi dengan Pengaman Thermofusensi 1 Tahun</li>\r\n<li>Ukuran Baling 9 inch</li>\r\n</ul>', '40.jpg', 250000, 31, 2000, 5),
(41, ' Miyako Dispenser Air Hot And Normal – WD185H', '<p>1 Tahun Garansi Lokal more</p>\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Konsumsi Daya 350 watt</li>\r\n<li class="">2 pilihan Suhu ( Normal &amp; Hot )</li>\r\n<li class="">Material Tangki Stainless Steel ( Anti Karat )</li>\r\n<li class="">Daya Tampung Tangki 3,5 liter</li>\r\n<li class="">Material Body Plastik PVC</li>\r\n<li class="">Desain Simple &amp; &nbsp;Elegant</li>\r\n<li class="">LED Indicator</li>\r\n<li class="">Kokoh &amp; Tahan Lama</li>\r\n</ul>', '41.jpg', 150000, 11, 2000, 5),
(42, 'LG 24" LED Full HD TV - Hitam (Model 24MT48AF)', '<p>1 Tahun Garansi Lokal</p>\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">1 x HDMI ,</li>\r\n<li class="">Size: 24 inch, Non Smart</li>\r\n<li class="">Rasakan pengalaman menonton lebih personal dengan LG 24" LED TV Hitam - Model 24MT48AF. TV persembahan LG yang satu ini merupakan produk TV sekaligus monitor PC yang bisa diandalkan untuk kebutuhan sehari-hari. Dilengkapi berbagai hiburan multimedia seperti penyiaran berkualitas HD, DVD, internet game dan foto, personal TV ini siap menyajikan hiburan dalam kualitas terbaik di rumah Anda.</li>\r\n</ul>', '42.jpg', 2500000, 3, 7000, 5),
(43, 'Philips HD 3128-33 Rice Cooker', '<p>1 Tahun Garansi Lokal</p>\r\n<li class="">Kapasitas 2 L</li>\r\n<li class="">Daya 400 W</li>\r\n<li class="">\r\n<p>Memasak setiap butir beras dengan sempurna</p>\r\n</li>\r\n<li class="">\r\n<p>Dengan Panci ProCeramic terbaik yang tahan lama</p>\r\n<ul>\r\n<li>ProCeramic Pot berpegangan besar</li>\r\n<li>Pemanasan 3D cerdas</li>\r\n<li>Tetap hangat 48 jam</li>\r\n<li>Kapasitas besar 2 liter</li>\r\n</ul>\r\n</li>\r\n</ul>', '43.jpg', 449000, 2, 1500, 5),
(44, 'Panasonic Hair Dryer EH-ND11 400 Watt - Putih', '<p>1 Tahun Garansi Lokal</p>\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Warna putih</li>\r\n<li class="">Garansi resmi 1 tahun</li>\r\n<li class="">Daya 400 Watt</li>\r\n<li class="">2 mode kecepatan</li>\r\n<li class="">Compact design</li>\r\n<li class="">Rambut cepat kering dan mudah ditata.&nbsp;Dengan desain kompak, Hair Dryer Panasonic EH-ND11 ini memiliki 2 pilihan pengaturan kekuatan angin, sehingga sangat mudah digunakan untuk menata rambut Anda.</li>\r\n</ul>', '44.jpg', 177500, 14, 800, 5),
(45, 'Apple iPhone7 Plus - 256GB - Rose Gold', '<p>Garansi Internasional</p>\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Layar Retina HD</li>\r\n<li class="">Menarik perhatian. Tahan&nbsp;cipratan</li>\r\n<li class="">Kamera12MP</li>\r\n<li class=""><p>Kamera telefoto dan&nbsp;wide-angle12MP</p></li>\r\n<li class=""><p>Zoom optik 2x; zoom digital hingga&nbsp;10x</p></li>\r\n<li class="">Nirkabel ultra cepat dengan&nbsp;roaming terbaik di&nbsp;seluruh&nbsp;dunia</li>\r\n</ul>', '45.jpg', 15700000, 3, 1000, 6),
(46, 'Asus Zenfone Max ZC550KL - 32GB - Hitam', '<p>Garansi Internasional</p>\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Layar 5,5" dengan corning Gorilla Glass 4</li>\r\n<li class="">Sistem operasi Android v.5.0.2 Lollipop (dapat di upgrade ke v.6.0.1 Marshmallow)</li>\r\n<li class="">RAM 2GB, ROM 32GB</li>\r\n<li class="">Konektivitas 4G LTE</li>\r\n<li class="">Kamera 13MP dan 5MP</li>\r\n</ul>', '46.jpg', 2599000, 5, 900, 6),
(47, 'Toshiba Baterai Laptop Series PA3817U-1BRS', '<p>3 Bulan Garansi</p>\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Kualitas terbaik</li>\r\n<li class="">Harga bersaing</li>\r\n<li class="">Bergaransi</li>\r\n<li class="">\r\n<div>Compatible Part Numbers: PA3816U-1BRS, PA3816U, PA3817U, PA3817U-1BRS, PA3818U-1BRS, PA3819U-1BRS, PABAS227, PABAS228, PABAS229, PABAS230</div></li>\r\n<li class=""><div>Tipe Baterai : Li-ion</div></li>\r\n<li class=""><div>Voltase : 10.8 Volt</div></li>\r\n<li class=""><div>Kapasitas : 4400mAh &nbsp;- 48Wh - 6 Cell</div></li>\r\n<li class=""><div>Warna : Black</div></li>\r\n</ul>', '47.jpg', 545000, 6, 900, 7),
(48, ' Apple Macbook Air MMGF2 - 13"', '<p>MacBook Air mempunyai desain yang paling tipis dan ringan di antara laptob Apple lain nya. Laptop dengan 13 Inch ini mempunyai ketipisan 0.3 cm - 1.7 cm dengan berat 1.08 kg saja membuat Laptob ini sangat mudah untuk dibawa dan di selipkan di dalam tas.</p>\r\n<p>1 Tahun Garansi</p>\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">1.6GHz dual-core Intel Core i5 Broadwell processor&nbsp;</li>\r\n<li class="">Turbo Boost up to 2.7GHz</li>\r\n<li class="">Intel HD Graphics 6000</li>\r\n<li class="">8GB memory</li>\r\n<li class="">128GB PCIe-based flash storage</li>\r\n<li class="">RAM 8GB</li>\r\n<li class="">Silver</li>\r\n</ul>', '48.jpg', 16000000, 1, 3000, 7),
(53, 'Laptop Asus X441SA-BX001D 14"LED Hitam ', '<p>2&nbsp;Tahun Garansi</p>\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Size: 14 inch, OS : DOS</li>\r\n<li class="">RAM : 2 GB / HDD :500 GB</li>\r\n<li class="">Intel Celeron-N3060</li>\r\n<li class="">Asus X441SA-BX001D hadir untuk memenuhi kebutuhan komputasi yang optimal dengan harga yang terjangkau. Didukung dengan pilihan prosesor Intel Pentium, Anda dapat melakukan pekerjaan komputasi sekaligus multimedia dengan lancar tanpa hambatan. Dengan desain yang kompak, semakin menambah daya tarik dari Asus X441SA-BX001D.</li>\r\n</ul>', '49.jpg', 3275000, 5, 2000, 7),
(55, ' Adidas - Sepatu Casual Caflaire Aw4705 - Hitam', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Nyaman dipakai</li>\r\n<li class="">elegan</li>\r\n<li class="">Empuk midsole untuk gerakan alami</li>\r\n<li class="">Bahan Berkualitas</li>\r\n<li class="">Sepatu Casual Adidas Caflaire Hadir Dengan Desain Elegan Dan Stylish. Sepatu Ini Memiliki Bentuk Ramping Dan Bagian Atasnya Suede Stylish Sangat Cocok Digunakan Untuk Kegiatan Sehari Hari.</li>\r\n</ul>', '50.jpg', 759000, 12, 1000, 1),
(56, 'Puma Carson Knitted Men''s Sepatu Lari', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Upper menggunakan bahan mesh yang dijahit sedemikian rupa memberikan kesan desain lebih dinamis</li>\r\n<li class="">Cocok untuk berlari dan olahraga lainnya</li>\r\n<li class="">Kenyamanan yang sangat luar biasa</li>\r\n<li class="">Insole yang empuk sehingga kaki tidak akan lecet</li>\r\n<li class="">Sepatu yang stylish dan trendi</li>\r\n</ul>', '51.jpg', 509000, 3, 1000, 1),
(57, 'E-Table Meja Laptop Portable / Desk Portable - Putih', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Fiber material</li>\r\n<li class="">Dual cooling fan</li>\r\n<li class="">Drink &amp; pen holder</li>\r\n<li class="">Mouse pad holder</li>\r\n<li class="">Adjustment legs &amp; angled</li>\r\n<li class="">Easy to use and lightweight taken</li>\r\n</ul>', '52.jpg', 118000, 7, 2000, 7),
(58, 'Mini keyboard dan mouse USB Bluetooth receiver', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Suitable for laptop, Android smart TV, desktop and so on</li>\r\n<li class="">Compatible with Windows XP/Windows 2000/Windows 7/Windows 8/MAC/Android</li>\r\n<li class="">Feature:</li>\r\n<li class="">1. Mini size and ultra-thin design. The thinnest part of keyboard is only 1.3cm thickness</li>\r\n<li class="">2. Flat keys, comfortable and silent to touch and operate</li>\r\n</ul>', '53.jpg', 167155, 12, 800, 7),
(59, ' SADES A7 USB Gaming Headset', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Ergonomic design: multi-point to force and partial pressure head beam, suitable for players to fight for a long time</li>\r\n<li class="">SADES high-performance decoder chip, 7.1-channel surround effect, allowing you to experience the thrill of multi-channel shock</li>\r\n<li class="">USB interface + anti-interference magnetic ring</li>\r\n<li class="">40MM high flux NdFeB drive</li>\r\n<li class="">All-metal head beams light and durable, adapting different head type</li>\r\n<li class="">60mm breathable skin-closed, big earmuffs can not leak and has a good sound</li>\r\n<li class="">TPE high strength and high elasticity of klored wire, safe and environmental protection Resistance to tensile</li>\r\n<li class="">Heart-shaped wire control design, suitable for any type of handshape to control</li>\r\n<li class="">Virtual 7.1 channel</li>\r\n</ul>', '54.jpg', 462700, 5, 500, 7),
(60, 'M-Tech M-Tech Speaker Portable Laptop Notebook Stereo', '<div class="prod-warranty"><span class="prod-warranty__term">1 Bulan</span> <span class="prod-warranty__type">Garansi Lokal</span></div>\r\n</div>\r\n<div class="prod_content">\r\n<div class="prod_details">\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Speaker M-Tech</li>\r\n<li class="">Usb Konektor</li>\r\n<li class="">Cocok Untuk Laptop, PC, Mp3 Player, dan HP</li>\r\n<li class="">Jack Line in</li>\r\n<li class="">Volume Kontrol</li>\r\n</ul>\r\n</div>', '55.jpg', 71500, 4, 400, 7),
(61, 'Laptop Lenovo IdeaPad 100 - RAM 6GB - Intel Core i3 5005U', '<div class="prod-warranty"><span class="prod-warranty__term">1 Tahun</span> <span class="prod-warranty__type">Garansi Lokal</span></div>\r\n</div>\r\n<div class="prod_content">\r\n<div class="prod_details">\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Intel Core i3 5005U 2.0Ghz (3MB Cache)</li>\r\n<li class="">RAM 6GB DDR3, HDD 500GB</li>\r\n<li class="">Intel HD Graphics</li>\r\n<li class="">Windows 10 Home 64bit Original</li>\r\n<li class="">15.6" HD LED, DVD RW, Webcam, USB 3.0</li>\r\n</ul>\r\n</div>', '56.jpg', 5500000, 7, 2300, 7),
(62, ' Laptop Asus X441NA-BX002', '<div class="prod-warranty"><span class="prod-warranty__term">1 Tahun</span> <span class="prod-warranty__type">Garansi Lokal</span></div>\r\n<div class="prod-warranty">\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Size: 14 inch, OS : DOS</li>\r\n<li class="">RAM : 2 GB / HDD :500 GB</li>\r\n<li class="">Intel Celeron N3350 ( 1.6 - 2.48 GHz, 2 MB cache, 2 cores)</li>\r\n<li class="">Graphics Card : Intel HD Graphics 400 (Integrated)</li>\r\n</ul>\r\n</div>', '57.jpg', 3549000, 3, 2500, 7),
(63, ' EPSON Printer L360 - Hitam ', '<div class="prod-warranty"><span class="prod-warranty__term">2 Tahun</span> <span class="prod-warranty__type">Garansi Lokal</span></div>\r\n<div class="prod-warranty">\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Print, Scan, Copy Model Infus Resmi Pabrik.</li>\r\n<li class="">Speed : 33 ppm Black , 15 ppm Color.</li>\r\n<li class="">Resolusi : 5760 x 1440 dpi.</li>\r\n<li class="">Tipe Tinta : T6641 - 4.</li>\r\n</ul>\r\n</div>', '58.jpg', 2029000, 6, 3000, 7),
(64, 'Microsoft Sculpt Mobile Mouse - Pink', '<div class="prod-warranty"><span class="prod-warranty__term">3 Tahun</span> <span class="prod-warranty__type">Garansi Lokal</span></div>\r\n<div class="prod-warranty">\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Mouse nirkabel</li>\r\n<li class="">Roda 4 arah</li>\r\n<li class="">Teknologi BlueTrack, bekerja di permukaan apa saja</li>\r\n<li class="">Tombol Windows di tengah sebagai pengganti tombol Windows di keyboard</li>\r\n<li class="">Koneksi mini-USB</li>\r\n</ul>\r\n</div>', '59.jpg', 450000, 14, 400, 7),
(65, 'Apple iPhone 5S - 16GB - Gold', '<div class="prod-warranty"><span class="prod-warranty__term">1 Tahun</span> <span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type">Garansi Lokal</span></span></span></span></span></span></span>\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Desain Slim</li>\r\n<li class="">Layar 4" Retina Display</li>\r\n<li class="">8 MP iSight</li>\r\n<li class="">Siri</li>\r\n</ul>\r\n</div>', '68.jpg', 3459000, 12, 1000, 6),
(66, 'Oppo F1s Selfie Expert - 32GB - Gold', '<div class="prod-warranty"><span class="prod-warranty__term">1 Tahun</span> <span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type">Garansi Lokal</span></span></span></span></span></span></span></span>\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">more 32 GB, 3 GB RAM</li>\r\n<li class="">Kamera Belakang 13 MP &amp; Kamera Depan 16MP</li>\r\n<li class="">Android OS, v5.1 (Lollipop)</li>\r\n<li class="">Octa-core 1.5 GHz Cortex-A53</li>\r\n<li class="">5.5 inches, Corning Gorilla Glass 4</li>\r\n<li class="">Fingerprint Sensor</li>\r\n</ul>\r\n</div>', '67.jpg', 3490000, 25, 1050, 6),
(67, 'Lenovo TAB 2 A7-30 - 8 GB - Cotton Candy', '<div class="prod-warranty"><span class="prod-warranty__term">1 Tahun</span> <span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type">Garansi Lokal</span></span></span></span></span></span></span></span></span>\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Layar 7" IPS Capacitive</li>\r\n<li class="">1 GB RAM + 8 GB ROM</li>\r\n<li class="">Dual Kamera 2MP + 0.3MP</li>\r\n<li class="">Android&trade; 4.4 KitKat</li>\r\n<li class="">Dolby&reg; Audio</li>\r\n</ul>\r\n</div>', '63.jpg', 1399000, 23, 1500, 6),
(68, ' Xiaomi Mi Pad 3 - 64 GB - Gold', '<div class="prod-warranty"><span class="prod-warranty__term">1 Tahun</span> <span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type">Garansi Lokal</span></span></span></span></span></span></span></span></span></span>\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Ram 4 Gb Rom 64 GB</li>\r\n<li class="">Kamera Belakang 13 MP kamera Depan 5 MP</li>\r\n<li class="">Mediatek MT8176 Hexa-core</li>\r\n<li class="">Non-removable Li-Po 6600 mAh battery</li>\r\n</ul>\r\n</div>', '66.jpg', 5100000, 24, 1650, 6),
(69, 'Apple iPad Mini Wifi + Cellular - 16 GB - Space Grey ', '<div class="prod-warranty"><span class="prod-warranty__term">1 Tahun</span> <span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type">Garansi Lokal</span></span></span></span></span></span></span></span></span></span></span>\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">iOS 6, upgradable to iOS 9.3.5</li>\r\n<li class="">Internal memory 16 GB, RAM 512 MB</li>\r\n<li class="">Primary Camera 5 MP, Secondary Camera 1,2 MP</li>\r\n</ul>\r\n</div>', '65.jpg', 3999000, 28, 1700, 6),
(70, 'Samsung Galaxy Tab S2 8.0" - 32 GB - Gold', '<div class="prod-warranty"><span class="prod-warranty__term">1 Tahun</span> <span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type"><span class="prod-warranty__type">Garansi Lokal</span></span></span></span></span></span></span></span></span></span></span></span>\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Display 8.0"</li>\r\n<li class="">Kamera 8MP &amp; 2.1MP</li>\r\n<li class="">Android OS, v6.0.1 (Marshmallow)</li>\r\n<li class="">RAM 3&nbsp;GB</li>\r\n</ul>\r\n</div>', '64.jpg', 5725000, 31, 1900, 6),
(71, 'Samsung Galaxy J5 Prime SM-G570 - Hitam', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Android OS, v6.0.1 (Marshmallow)</li>\r\n<li class="">Quad-core 1.4 GHz Cortex-A53</li>\r\n<li class="">Kamera 13 MP, f/1.9, &amp; 5 MP, f/2.2</li>\r\n<li class="">RAM 2 GB, ROM 16 G<strong></strong>B</li>\r\n</ul>\r\n</div>', '60.jpg', 2629000, 21, 900, 6),
(72, 'Xiaomi Redmi 4a - 16Gb - Rose Gold', '<div class="prod_brief">\r\n<div class="prod-warranty">1 Tahun Garansi</div>\r\n</div>\r\n<div class="prod_content">\r\n<div class="prod_details">\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Processor : Snapdragon 425 Quad Core</li>\r\n<li class="">RAM : 2GB RAM</li>\r\n<li class="">ROM : 16GB ROM</li>\r\n<li class="">Jaringan : FDD LTE 4G</li>\r\n<li class="">Kamera Depan : 5.0MP</li>\r\n<li class="">Kamera Belakang : 13.0 MP</li>\r\n</ul>\r\n</div>\r\n</div>', '61.jpg', 1500000, 13, 900, 6),
(73, ' Samsung Galaxy J7 2016 - 5.5"- 2GB RAM - Pink Gold', '<div class="prod_brief">\r\n<div class="prod-warranty">1 Tahun Garansi</div>\r\n</div>\r\n<div class="prod_content"><br />\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">CPU Octa-Core 1.6GHz</li>\r\n<li class="">Kamera 13 MP &amp; 5 MP CMOS</li>\r\n<li class="">Layar Super AMOLED 5,5" f/1.9, 1280 x 720 (HD)</li>\r\n<li class="">RAM 2GB, ROM 16GB</li>\r\n<li class="">Dual-SIM</li>\r\n</ul>\r\n</div>', '62.jpg', 3499000, 35, 1000, 6),
(74, 'Nokia 230 Handphone - Silver [16MB/ Dual SIM]', '<div class="prod_brief">\r\n<div class="prod-warranty">1 Tahun Garansi</div>\r\n</div>\r\n<div class="prod_content">\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Dual Sim, Layar 2.8 inches</li>\r\n<li class="">Memory internal 16 MB RAM, 1000 Kontak, microSD, up to 32 GB</li>\r\n<li class="">Kamera belakang 2 MP, LED flash, kamera depan 2 MP, 480p, LED flash</li>\r\n<li class="">Stereo FM radio, MP4, MP3</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</div>', '69.jpg', 759000, 20, 700, 6),
(75, 'Shake n Take 3 Free 1 Extra Bottle - Biru', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">botol juicer bisa langsung untuk di minum</li>\r\n<li class="">model botol minum sporty, keren untuk dibawa kemana saja</li>\r\n<li class="">mudah digunakan</li>\r\n</ul>', '70.jpg', 175000, 32, 1000, 5),
(76, 'Pro Master Turbo Hoover Vacum Cleaner Blower Bundle', '<div class="prod_content">\r\n<div class="prod_details">\r\n<p>1 Bulan Garansi</p>\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Daya 350 Watt&nbsp;</li>\r\n<li class="">Filter Stainless Steel</li>\r\n<li class="">Mudah Dibersihkan</li>\r\n<li class="">7 Pcs Aksesoris Lengkap</li>\r\n<li class="">Kekuatan Sedotan Extra</li>\r\n</ul>\r\n</div>\r\n</div>', '71.jpg', 319700, 15, 1800, 5),
(77, ' Sharp PJ-A55TY-W Air Cooler - Putih', '<div class="prod_content">\r\n<div class="prod_details">\r\n<p>1 Tahun&nbsp;Garansi</p>\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Daya 100 Watt</li>\r\n<li class="">LCD Panel</li>\r\n<li class="">Watertank 5 Liter</li>\r\n<li class="">Diskon tambahan tidak berlaku untuk produk ini &nbsp;</li>\r\n</ul>\r\n</div>\r\n</div>', '72.jpg', 1199000, 17, 3000, 5),
(78, 'Butterfly JH 5832A Mesin Jahit Portable + Gratis Starter SJS Kit', '<div class="prod_content">\r\n<div class="prod_details">\r\n<p>1 Tahun&nbsp;Garansi</p>\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Butterfly&reg; JH 5832A Mesin Jahit Portable Multifungsi</li>\r\n<li class="">Dilengkapi dengan 32 Pola Jahitan Built-In</li>\r\n<li class="">Auto Pemasuk Benang ke Mata</li>\r\n<li class="">Sistem Lobang Kancing 1 Langkah</li>\r\n<li class="">Mesin Jahit yang sangat mudah dan ringkas digunakan</li>\r\n</ul>\r\n</div>\r\n</div>', '73.jpg', 1749900, 30, 8000, 5),
(79, 'Samsung Microwave ME731K - Hitam/Putih - 20 L', '<div class="prod_content">\r\n<div class="prod_details">\r\n<p>1 Tahun&nbsp;Garansi</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li class="">800-1150 W</li>\r\n<li class="">20 liter</li>\r\n<li class="">LED Display</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>', '74.jpg', 1300000, 5, 12000, 5),
(80, ' Sharp - Pop Up Toaster KZ200LP(K) - 850 Watt', '<div class="prod_content">\r\n<div class="prod_details">\r\n<p>1 Tahun&nbsp;Garansi</p>\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Power: 850w</li>\r\n<li class="">2 Slices</li>\r\n<li class="">Automatic Pop Up Mechanism</li>\r\n<li class="">Adjust degree browing with 6 settings</li>\r\n<li class="">Cancel, Reheat and Defrost Function</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>', '75.jpg', 373000, 15, 3000, 5),
(81, 'MAKE UP FOR EVER HD Pressed Powder 6.2g', '<div class="prod_content">\r\n<div class="prod_details">\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Original</li>\r\n<li class="">Ideal for all skin types</li>\r\n<li class="">One universal shade for all skintones</li>\r\n<li class="">Formulated with hyaluronic acid</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>', '76.jpg', 743000, 40, 250, 4),
(82, 'Rimmel Stay Matte Makeup Primer', '<div class="prod_content">\r\n<div class="prod_details">\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Hasil Matte</li>\r\n<li class="">Halus dan Lembut di kulit</li>\r\n<li class="">Tahan Lama</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>', '77.jpg', 149000, 50, 100, 4),
(83, 'Ultima II Under Makeup Base Tint Aquafleur', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Makeup Base Sebelum Memakai Makeup (Foundation)</li>\r\n<li class="">Melembabkan Kulit</li>\r\n<li class="">Membuat Kulit Wajah Siap Untuk Diaplikasikan Makeup</li>\r\n<li class="">Makeup Lebih Berbaur Sempurna</li>\r\n</ul>', '78.jpg', 170000, 28, 250, 4),
(84, ' Makeup Foundation Sponge Blender Blending Puff', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">100% brand new<br />High quality<br />Professional</li>\r\n</ul>', '79.jpg', 82000, 15, 100, 4),
(85, 'Bali Souvenir Gelang Kayu Unik', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Warna Menawan</li>\r\n<li class="">Gelang Handmade Unik</li>\r\n<li class="">Design Menarik</li>\r\n</ul>', '80.jpg', 40000, 20, 200, 3),
(86, 'Gantungan Kunci Burung Kayu Batik', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Souvenir gantungan kunci</li>\r\n<li class="">Cocok untuk souvenir pernikahan &amp; oleh-oleh</li>\r\n<li class="">Unik &amp; berkualitas</li>\r\n<li class="">Harga Murah &amp; terjangkau</li>\r\n</ul>', '81.jpg', 4000, 100, 50, 3),
(87, 'Souvenir Jogja Lukisan Wayang Kulit Werkudara', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Bahan dari Kulit Kambing &amp; Kayu</li>\r\n<li class="">Ukuran 70x50x2cm</li>\r\n<li class="">Cocok untuk hiasan &amp; souvenir</li>\r\n<li class="">Kombinasi warna yang eksotik</li>\r\n</ul>', '82.jpg', 225000, 28, 1000, 3),
(88, 'Bandung Gedung Sate Retro Fridge Magnets Metal - Silver', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Name&nbsp;&nbsp;&nbsp; : Bandung Gedung Sate Retro Fridge Magnets Metal - Silver</li>\r\n<li class="">Material : Metal Alloy</li>\r\n<li class="">Style &nbsp; &nbsp; : Vintage and Simple</li>\r\n<li class="">Type &nbsp;&nbsp; &nbsp; : Fridge Magnets</li>\r\n<li class="">Great decoration for home, office or be a gift or present for friends.</li>\r\n</ul>', '83.jpg', 50000, 35, 350, 3),
(89, 'Kerajinan Ornamen Wayang Golek Tabung Double - Ungu', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Hasil ukir dan pilihan batik terbaik</li>\r\n<li class="">Bahan dasar kayu</li>\r\n<li class="">Tinggi: 25 cm, Lebar: 15 cm</li>\r\n<li class="">Sangat cocok untuk souvenir</li>\r\n</ul>', '84.jpg', 95000, 60, 300, 3),
(90, 'Celengan Unik Batok Kelapa - Pig', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Bentuk Babi</li>\r\n<li class="">Terbuat dari tempurung kelapa kombinasi kayu</li>\r\n<li class="">Fungsi untuk menyimpan uang</li>\r\n</ul>', '85.jpg', 49000, 26, 300, 3),
(91, 'Miniatur Andong Jawa Kayu Jati P40', '<p>&nbsp;</p>\r\n<ul>\r\n<li class="">Pajangan miniatur andong</li>\r\n<li class="">Bahan kayu jati finishing melamin</li>\r\n<li class="">Ukuran 40 x 8 x 22 cm</li>\r\n<li class="">Cocok dijadikan pajangan dekorasi rumah</li>\r\n<li class="">Pengiriman Packing kayu</li>\r\n</ul>\r\n<p>&nbsp;</p>', '86.jpg', 195000, 21, 3000, 3),
(92, 'Pajangan Dinding Bebek Batik Caping', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Batik Caping Khas Jogja</li>\r\n<li class="">Bisa juga untuk Souvenir</li>\r\n<li class="">Bahan dari kayu yang di batik tulis</li>\r\n<li class="">Finishing yang sangat cantik</li>\r\n</ul>', '87.jpg', 190000, 40, 3000, 3),
(93, 'Kerajinan Topeng Kayu Batik Rama Shinta L 22x17x7 cm + Finishing NC', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">1 pasang topeng isi 2 Rama &amp; Shinta</li>\r\n<li class="">Ukuran L 22x17x7 cm</li>\r\n<li class="">Bahan kayu yang di ukir jadi topeng</li>\r\n<li class="">Batik Tulis dari Jogja</li>\r\n<li class="">Finishing NC mengkilap &amp; awet</li>\r\n</ul>', '88.jpg', 120000, 36, 2000, 3),
(94, 'Gloria Bellucci - Souvenir Magnet Kulkas Indonesia', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Bahan fiberglass resin</li>\r\n<li class="">Kualitas terbaik</li>\r\n<li class="">mempercantik kulkas anda</li>\r\n</ul>', '90.jpg', 15000, 50, 100, 3),
(95, 'Gloria Bellucci - Souvenir Magnet Kulkas Jakarta Indonesia ', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Bahan fiberglass resin</li>\r\n<li class="">Kualitas terbaik</li>\r\n<li class="">mempercantik kulkas anda</li>\r\n</ul>', '89.jpg', 15000, 50, 100, 3),
(96, '1 Sett Miniatur Wayang Kayu Batik Pendawa Lima - S 29x11x0.8 cm', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Wayang Kayu Batik Tulis Khas Jogja</li>\r\n<li class="">Ukuran&nbsp;S 29x11x0.8 cm</li>\r\n<li class="">Cocok buat pajangan &amp; Souvenir</li>\r\n<li class="">Dikerjakan pengrajin profesional Jogja</li>\r\n<li class="">1 sett isi 5pcs wayang</li>\r\n</ul>', '91.jpg', 123000, 20, 500, 3),
(97, 'Piring Pajangan Indonesia', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Design menarik</li>\r\n<li class="">Cocok untuk dipajang di ruang tamu maupun di ruang lainnya</li>\r\n<li class="">Harga terjangkau</li>\r\n</ul>', '92.jpg', 105000, 39, 600, 3),
(98, 'Unik Kotak Perhiasan Jati (Bisa Pahat Tulisan/Gbr Utk Souvenir)', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Design menarik</li>\r\n<li class="">Cocok untuk dipajang di ruang tamu maupun di ruang lainnya</li>\r\n<li class="">Harga terjangkau</li>\r\n</ul>', '92.jpg', 600000, 21, 2000, 3),
(99, 'Kertas A4 100 Gram Paper One 1 Rim', '<p>Ready Kertas A4 100 GramPaper One<br />*Merek: Paper One<br />*Ukuran: A4<br />*Tebal: 100 GSM<br />*Isi: 1 rim ( 500 lembar)<br /><br />Keterangan: <br />*Kertas A4 100 Gram paper one ini merupakan kertas untuk photocopy dan kebutuhan lainya, dengan kualitas terbaik dan putihna kertas ini banyak user senang menggunakanya.<br /><br />*Untuk pembelian banyak disarankan menggunakan Go- Send untuk mengirit biaya*Design menarik</p>', '93.jpg', 65000, 60, 3300, 2),
(100, 'Kertas F4 80 Gram Paper One 1 Rim', '<p>Ready Kertas F4 80 Paper One<br />*Merek: Paper One<br />*Ukuran: F4<br />*Tebal: 80 GSM<br />*Isi: 1 rim ( 500 lembar)<br /><br />Keterangan: <br />*Kertas F4 80 paper one ini merupakan kertas untuk photocopy dan kebutuhan lainya, dengan kualitas terbaik dan putihna kertas ini banyak user senang menggunakanya.<br /><br />*Untuk pembelian banyak disarankan menggunakan Go- Send untuk mengirit biaya*</p>', '94.jpg', 39500, 45, 3500, 2),
(101, 'Paper Roll/ Kertas Struk Thermal/ Thermal Paper Printech ', '<p>Ready Struk Thermal Printec<br />*Merek: Printech<br />*Ukuran: 80X80<br />*Tipe: Struk Thermal untuk mesin kasir, mesin atm<br />*Dijual Dalam: 1 box (50 Roll)<br />*Harga diatas merupakan harga 1 roll dan minimal pembelian adalah 1 box (50 roll) dan kelipatanya.<br />*Dianjurkan untuk menggunakan fitur gosend untuk mengirit biaya kirim.<br /><br />Keterangan:<br />*Kertas Struk printech ini merupakan kertas struk thermal yang sering digunakan ukuran besar, dengan kualitas terbaik dan tahan lama banyak orang sering menggunakan ini</p>', '95.jpg', 11000, 200, 45, 2),
(102, 'Boxfile Bindex Jumbo Folio 1034 Hitam/Biru atk', '<p>Ready Boxfile Bindex Jumbo<br />"Merek: bindex<br />*Ukuran: Jumbo Folio<br />*Warna: hitam dan biru<br />*Tipe: Boxfile duduk<br />*Dijual Dalam:1 buah<br /><br />Keterangan:<br />*Boxfile bindex merupakan boxfile yang duduk yang biasana digunakan untuk menaruk barang dan arsip. Dengan kualitas terbaik dan tahan lama banyak user senang menggunakan ini.</p>', '96.jpg', 22000, 80, 150, 2),
(103, 'Penahan Buku Standard Book Lion No: 7 ( 1 set isi 2)', '<p>Ready Standard Book Lion<br />*Merek: Lion<br />*Tipe: Penahan Buku Besi<br />*Isi: 1 set isi 2<br />*Dijual Dalam: 6 Set<br />*Harga diatas merupakan harga 1 set, minimal pembelian adalah 6 set dab kelipatanya<br /><br />Keterangan: <br />*Standard Book Lion ini merupakan penahan buku besi yang sangat sering digunakan. Dengan kualitas terbaik dan tahan lama banyak user senang menggunakanya</p>', '97.jpg', 22000, 45, 750, 2),
(104, 'Stapler HD-50 Kenko atk', '<p>Ready Stapler HD 50 Kenko/Joyko<br />*Ukuran: Besar ( 123mm)<br />*Merek: Kenko/Joyko<br />*Tipe: stapler besar dilapisi warna diseluruh body<br />*Warna: hitam,biru,merah dan abu abu<br />*Dijual dalam: 1 buah<br /><br />Keterangan:<br />*Stapler HD 50 Kenko merupakan stapler berukuran besar yang bisa diisi dengan staples no:3( ukuran besar). Sangat gemar digunakan oleh user karena dapat menstaples kertas sangat banyak dan long lasting.</p>', '98.jpg', 17500, 40, 300, 2),
(105, 'Binder Clip No: 105 Kenko', '<p>Ready Binder clip No: 105 Kenko<br />*ukuran: kecil (15mm)<br />*Tipe: binder clip hitam<br />*Dijual dalam: 1 lusin ( 12 buah)<br /><br />Keterangan:<br />*Binder clip 105 kenko merupakan binder clip ukuran terkecil. Yang biasa digunakan untuk menjepit kertas dan documents.</p>', '99.jpg', 15000, 65, 200, 2),
(106, 'Lem Fox Putih 150 Gram', '<p>Ready Lem Fox Putih<br />*Merek: Fox<br />*Tipe: Lem Colek<br />*Warna: Putih<br />*Ukuran: 150 gram<br />*Dijual Dalam: 1 buah<br /><br />Keterangan:<br />*Lem Fox Putih ini merupakan lem berbentuk botol, yang berisi 150 gram. Lem colek putih ini banyak digunakan user untuk keperluan rumah tangga dan merekat kayu,kain hingga kertas dan keperluan kantor. Dengan Lem berkualitas tinggi dan anti kering banyak user nyaman menggunakan lem yang satu ini.</p>', '100.jpg', 800, 69, 200, 2),
(107, 'Spidol Whiteboard Marker Snowman', '<p>eady Spidol Whiteboard Snowman<br />*Merek: snowman<br />*Tipe: Spidol whiteboard ( bisa dihapus)<br />*Model: Spidol BG-12<br />*Warna: hitam,biru dan merah<br />*Dijual Dalam: 1 buah<br /><br />Keterangan: <br />*Spidol Snowman whiteboard merupakan spidol dengan tinta yang bisa dihapus. Dengan merek snowman yang merupakan kualitas terbaik dalam tinta, anti kering dan juga mudah untuk diisi.</p>', '101.jpg', 6000, 100, 100, 2),
(108, 'Tinta refill Spidol Permanent marker Snowman G-12', '<p>Ready Refill Spidol snowman permanent G-12<br />*Tipe: tinta refill spidol permanent( tidak bisa dihapus)<br />*Merek: snowman<br />*Dijual dalam: 1 botol<br />*Warna: hitam,biru dan merah<br /><br />Keterangan:<br />*Tinta refill spidol permanent merupakan isi ulang untuk spidol permanent G-12, biasa digunakan para user untuk menulis di plastik,kaca dan benda benda. Dengan tinta yang anti kering dan kualitas tertinggi.</p>', '102.jpg', 9000, 85, 120, 2),
(109, ' Epson Tinta Botol Set Original T6641 - T6644', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">EPSON Genuine Refill Ink</li>\r\n<li class="">T6641 - T6644</li>\r\n<li class="">Compatible for L100 L110 L120 L200 L210 L300 L350 L355 L550 L555 Printer</li>\r\n<li class="">70ml / botol</li>\r\n</ul>', '103.jpg', 298000, 62, 500, 2),
(110, 'Map Kertas Biola', '<p>Map kertas merk biola<br />ukuran folio<br />tersedia warna <br />biru<br />hijau<br />merah<br />kuning</p>', '104.jpg', 40000, 50, 2300, 2),
(111, 'Amplop COKLAT Tali E310 Airmail Executive / AMPLOP TALI COKLAT E 310', '<p>Materai 6000<br />Dijual per lembar isi 50pcs.</p>', '105.jpg', 250000, 30, 150, 2),
(112, 'Kalkulator Desktop casio', '<p>CASIO DH-16 - Kalkulator Desktop<br /><br />- 16 Digit Display<br />- Desk-Top Type<br />- Dimension 28.5(H) 151(W) 159(D) mm<br />- Extra Large display<br />- Larger display makes more data easier to read.<br />- Two-way power (Solar + Battery)<br />- Solar powered when light is sufficient, battery powered when light is insufficient.<br />- Key rollover<br />- Key operations are stored in a buffer, so nothing is lost even during high-speed input.<br />- Plastic keys<br />- Designed and engineered for easy operation.<br />- Regular percent<br />- Regular percentage calculations.<br />- Mark-up<br />- All the mark-up capabilities of an adding machine for simplified cost and profit calculations.<br />Garansi Resmi Casio 1 Tahun</p>', '106.jpg', 175000, 24, 425, 2),
(113, 'ERDS Jaket Parasut Bolak-Balik Maroon-Dark Grey  ', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Bahan berkualitas</li>\r\n<li class="">Fashionable</li>\r\n<li class="">Harga Terjangkau&nbsp;</li>\r\n<li class="">Luar Parasut dalam Fleece</li>\r\n<li class="">Hoodie bongkar pasang&nbsp;</li>\r\n<li class="">Jahitan Rapih</li>\r\n<li class="">Perawatan Mudah&nbsp;</li>\r\n<li class="">Best seller</li>\r\n</ul>', '107.jpg', 220000, 34, 600, 1),
(114, 'Slim and Fit Kamesenin T-Shirt - Hitam', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Bahan 100% katun</li>\r\n<li class="">Nyaman digunakan</li>\r\n<li class="">Sablon tidak mudah mengelupas</li>\r\n</ul>', '108.jpg', 85000, 40, 500, 1),
(115, 'Hus Puppies HP69P Polos Jam Tangan Wanita - Strap Leather (Gold)', '<div class="prod_content">\r\n<div class="prod_details">\r\n<p>1 Tahun Garansi</p>\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Analogue 3 Jarum</li>\r\n<li class="">Desain Menawan</li>\r\n<li class="">Tali : Kulit</li>\r\n<li class="">Ketahanan air hingga tekanan 50 meter</li>\r\n</ul>\r\n</div>\r\n</div>', '109.jpg', 1840000, 2, 1000, 1),
(116, 'Hush Puppies Tas Slempang Pria Cyril Crossbody (L) - Black ', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Nyaman Digunakan</li>\r\n<li class="">Katun Poliester</li>\r\n<li class="">Size Standart Internasional</li>\r\n<li class="">Product Original</li>\r\n</ul>', '110.jpg', 1190000, 5, 1000, 1),
(117, 'Ayako Fashion Atasan Wanita Blouse Sasa - (White) - YU  ', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Bahan Twiscone berkualitas</li>\r\n<li class="">LD 100 cm, Panjang 60 cm</li>\r\n<li class="">Fit L&nbsp;</li>\r\n<li class="">Sangat nyaman dipakai</li>\r\n<li class="">Model simple dan elegan</li>\r\n<li class="">Model Lengan 3/4</li>\r\n<li class="">Produksi dalam negeri</li>\r\n<li class="">Jahitan rapi</li>\r\n</ul>', '111.jpg', 199000, 10, 500, 1),
(118, 'Retro High Waist Pleated Half Body Maxi Skirts (Grey)', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">High-grade cotton</li>\r\n<li class="">High waist design</li>\r\n<li class="">One size fit most&nbsp;Asian women</li>\r\n<li class="">Solid color</li>\r\n<li class="">Pleated and big swing skirt&nbsp;decoration</li>\r\n<li class="">Strong sewing thread</li>\r\n<li class="">Comfortable, soft, skin-friendly,&nbsp;breathable</li>\r\n<li class="">Korean style</li>\r\n</ul>', '112.jpg', 125000, 15, 500, 1),
(119, 'Catenzo Jaket Modis Sporty Wanita - Bahan Diadora - Krem', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Jaket best seller harga terbaik</li>\r\n<li class="">Nyaman dipakai</li>\r\n<li class="">Jahitan solid, kuat, awet dan tahan lama</li>\r\n<li class="">Jaket wanita</li>\r\n</ul>', '113.jpg', 13400, 5, 600, 1);
INSERT INTO `barang` (`id_barang`, `nama_barang`, `deskripsi`, `lokasi_gambar`, `harga`, `stok`, `bobot`, `id_kategori_barang`) VALUES
(120, 'Women Prom Gown Party Cocktail Evening Formal Wedding Long Dress', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">&nbsp;100% brand new and high quality</li>\r\n<li class="">Type: Women Evening Cocktail Party Long Dress Gown</li>\r\n<li class="">Material:gauze</li>\r\n<li class="">Color: As the picture shown&nbsp;</li>\r\n</ul>', '114.jpg', 550000, 4, 1500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang_digital`
--

CREATE TABLE IF NOT EXISTS `barang_digital` (
  `id_barang` int(11) NOT NULL,
  `serial_number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `barang_digital`
--

INSERT INTO `barang_digital` (`id_barang`, `serial_number`, `status`) VALUES
(2, '100001', 0),
(2, '100002', 0),
(3, '25001', 0),
(3, '25002', 0),
(4, '50001', 0),
(4, '50002', 0),
(5, '100001', 0),
(5, '100002', 0),
(6, '2650001', 0),
(6, '2650002', 0),
(7, '26100001', 0),
(7, '26100002', 0),
(8, '26150001', 0),
(8, '26150002', 0),
(9, '26200001', 0),
(9, '26200002', 0),
(11, '0425001', 0),
(11, '0425002', 0),
(12, '0450001', 0),
(12, '0450002', 0),
(13, '04100001', 0),
(13, '04100002', 0),
(14, '04200001', 0),
(14, '04200001', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE IF NOT EXISTS `kategori_barang` (
  `id_kategori_barang` int(2) NOT NULL AUTO_INCREMENT,
  `nama_kategori_barang` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kategori_barang` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_kategori_barang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori_barang`, `nama_kategori_barang`, `jenis_kategori_barang`) VALUES
(1, 'Fashion', 0),
(2, 'Alat Tulis Kantor', 0),
(3, 'Souvenir', 0),
(4, 'Kecantikan', 0),
(5, 'Elektronik', 0),
(6, 'Handphone & Tablet', 0),
(7, 'Laptop & Aksesoris', 0),
(8, 'Pulsa', 1),
(9, 'Paket Data', 1),
(10, 'Token Listrik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE IF NOT EXISTS `keranjang` (
  `id_barang` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `jumlah_barang` int(2) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `id_barang` (`id_barang`,`id_transaksi`),
  UNIQUE KEY `id_barang_2` (`id_barang`,`id_transaksi`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_barang`, `id_transaksi`, `jumlah_barang`, `keterangan`) VALUES
(1, 1, 1, ''),
(34, 1, 1, ''),
(32, 2, 5, ''),
(33, 2, 2, ''),
(19, 3, 5, ''),
(20, 3, 1, ''),
(21, 3, 2, ''),
(24, 3, 5, ''),
(17, 9, 1, ''),
(1, 9, 1, ''),
(1, 10, 1, ''),
(15, 11, 1, 'ssdss'),
(19, 12, 1, 'aa'),
(15, 13, 1, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE IF NOT EXISTS `metode_pembayaran` (
  `id_metode_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_pembayaran` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_metode_pembayaran`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id_metode_pembayaran`, `jenis_pembayaran`) VALUES
(1, 'Transfer'),
(2, 'Virtual Account');

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran_bank`
--

CREATE TABLE IF NOT EXISTS `metode_pembayaran_bank` (
  `id_metode_pembayaran` int(2) NOT NULL,
  `id_bank` int(2) NOT NULL,
  UNIQUE KEY `id_metode_pembayaran` (`id_metode_pembayaran`,`id_bank`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `metode_pembayaran_bank`
--

INSERT INTO `metode_pembayaran_bank` (`id_metode_pembayaran`, `id_bank`) VALUES
(1, 1),
(1, 3),
(1, 5),
(2, 2),
(2, 4),
(2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `no_hp` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `kecamatan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `kabupaten` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `provinsi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `kode_pos` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_lengkap`, `email`, `password`, `no_hp`, `alamat`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`) VALUES
(1, 'Intan Oktafiani', '23516026@std.stei.itb.ac.id', '23516026', '085268905666', 'Jalan Terusan Cigadung No 18, Rt 08, Cibeunying Kaler, Bandung.', '', '', '', '40191'),
(2, 'Deddy Ch. Kakunsi', '23516047@std.stei.itb.ac.id', '23516047', '089608981378', 'Cikapundung no 10', '', '', '', '40111'),
(3, 'Fransiska Utami Dewi L.', '23516040@std.stei.itb.ac.id', '23516040', '081993620315', 'Kebon Bibit no 01 RT 02', '', '', '', '40116'),
(4, 'Andi Mita', '23516023@std.itb.ac.id', '23516023', '085299904312', 'Dago Asri No 123 Rt 01/ RW 02', '', '', '', '40135'),
(5, 'Kurnia Ramadhan Putra', '23516001@std.itb.ac.id', '23516001', '085320880888', 'Kos Putra, Jalan Supratman No 23', '', '', '', '40122'),
(6, 'Ikhwan Noor Ikhsan', '23516049@std.stei.itb.ac.id', '23516049', '085248986464', 'Jalan Dago No 09', '', '', '', '40135'),
(7, 'Wisataku', 'wisataku.if5122@gmail.com', 'wisataku', '081221177318', 'Jalan Tubagus Ismail VIII no 50', '', '', '', '40134'),
(8, 'Leasingku', 'leasingku.if5122@gmail.com', 'leasingku', '085320880888', 'Jalan Supratman No 987', '', '', '', '40122');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE IF NOT EXISTS `pengembalian` (
  `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) NOT NULL,
  `waktu_permintaan_pengembalian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_pengembalian` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `alasan_pengembalian` text COLLATE utf8_unicode_ci NOT NULL,
  `alasan_penolakan` text COLLATE utf8_unicode_ci,
  `lokasi_gambar_bukti_alasan` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `no_resi_pengembalian` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `waktu_respon_pengembalian` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_pengembalian`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_transaksi`, `waktu_permintaan_pengembalian`, `status_pengembalian`, `alasan_pengembalian`, `alasan_penolakan`, `lokasi_gambar_bukti_alasan`, `no_resi_pengembalian`, `waktu_respon_pengembalian`) VALUES
(1, 4, '2017-05-13 02:22:13', 'Diterima', 'Ketika dibuka dari packingan layar sudah pecah', NULL, 'broken.jpg', 'BDG91389183', '2017-05-14 09:00:00'),
(2, 6, '2017-05-13 02:22:21', 'Diterima', 'Layar retak', NULL, 'broken.jpg', 'JKT387187813', '2017-05-08 00:00:00'),
(3, 8, '2017-05-13 02:58:35', 'Menunggu Respon', 'Layar Pecah', NULL, 'broken.jpg', '', '0000-00-00 00:00:00'),
(4, 2, '2017-05-13 02:24:27', 'Ditolak', 'Warna salah', 'warna sesuai permintaan', 'broken.jpg', '', '2017-05-13 03:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`) VALUES
(1, 'intan', 'oktafiani'),
(2, 'dewi', 'laseno'),
(3, 'deddy', 'kakunsi'),
(4, 'pelanggan', 'pembeli');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `status_transaksi` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_nominal` int(15)  DEFAULT 0,
  `alamat_pengiriman` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `kode_pos_pengiriman` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nomor_resi` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `waktu_pembayaran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `waktu_checkout` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `potongan_voucher` int(15) DEFAULT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_metode_pembayaran` int(2)  DEFAULT NULL,
  `id_bank` int(2)  DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `status_transaksi`, `jumlah_nominal`, `alamat_pengiriman`, `kode_pos_pengiriman`, `nomor_resi`, `waktu_pembayaran`, `waktu_checkout`, `potongan_voucher`, `id_pelanggan`, `id_metode_pembayaran`, `id_bank`) VALUES
(1, 'Belum Dibayar', 1650000, 'Dago Asri', '40135', NULL, '0000-00-00 00:00:00', '2017-04-26 07:00:00', 0, 4, 1, 1),
(2, 'Belum Dibayar', 270000, 'Jalan Tubagus Ismail', '40134', 'BDG299492', '2017-05-15 07:52:03', '2017-04-24 06:30:00', 40500, 7, 1, 2),
(3, 'Belum Dibayar', 190000, 'Jalan Supratman', '40122', 'BDG8803720', '2017-05-15 07:52:03', '2017-04-24 05:01:00', 28500, 8, 1, 1),
(4, 'Belum Dibayar', 2599000, 'Kebon Bibit', '40116', 'BDG984990078', '2017-05-15 07:52:03', '2017-04-23 12:00:00', NULL, 3, 2, 2),
(5, 'Belum Dibayar', 2500000, 'Lazio Jambi', '36124', 'JBI838781', '2017-05-15 07:52:03', '2017-05-04 09:18:07', NULL, 1, 2, 2),
(6, 'Belum Dibayar', 410000, 'Terusan Cigadung No 18', '40192', 'BDG8727491', '2017-05-15 07:52:03', '2017-05-04 06:15:00', NULL, 4, 1, 2),
(7, 'Belum Dibayar', 120000, 'Dago Asri', '40827', 'BDG8731791', '2017-05-15 07:52:03', '2017-03-20 14:00:13', NULL, 7, 1, 4),
(8, 'Belum Dibayar', 1234500, 'Jatinangor', '40278', 'BDG39109031', '2017-05-15 07:52:03', '2017-05-30 01:08:02', NULL, 8, 2, 4),
(9, 'Belum Dibayar', 1242000, '', '', 'RESI_001', '2017-05-15 07:52:03', '0000-00-00 00:00:00', 0, 1, 0, 0),
(10, 'Belum Dibayar', 1200000, '', '', 'RESI_001', '2017-05-15 07:52:03', '2017-05-15 07:51:56', 0, 3, 0, 0),
(11, 'Belum Dibayar', 1064000, '', '', 'RESI_001', '2017-05-15 07:53:56', '2017-05-15 07:53:29', 0, 3, 0, 0),
(12, 'Belum Dibayar', 2000, '', '', 'RESI_001', '2017-05-15 10:50:16', '2017-05-15 10:49:15', 0, 3, 0, 0),
(13, 'Belum Dibayar', 1064000, '', '', 'RESI_001', '2017-05-15 11:17:55', '2017-05-15 11:16:38', 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE IF NOT EXISTS `voucher` (
  `id_voucher` int(11) NOT NULL AUTO_INCREMENT,
  `kode_voucher` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nominal_voucher` int(2) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_kategori_barang` int(11) NOT NULL,
  PRIMARY KEY (`id_voucher`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id_voucher`, `kode_voucher`, `nominal_voucher`, `id_pelanggan`, `id_kategori_barang`) VALUES
(1, 'sou123456', 15, 7, 3),
(2, 'atk09876', 20, 8, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
