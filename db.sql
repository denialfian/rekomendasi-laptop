-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 Des 2017 pada 18.08
-- Versi Server: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slr_150data`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `laptop`
--

CREATE TABLE `laptop` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `series` varchar(225) DEFAULT NULL,
  `os` varchar(225) DEFAULT NULL,
  `tahun_rilis` year(4) DEFAULT NULL,
  `u_layar` int(11) DEFAULT NULL,
  `u_resolusi` varchar(225) DEFAULT NULL,
  `prossesor` varchar(225) NOT NULL,
  `kecepatan` varchar(225) NOT NULL,
  `ram` int(11) NOT NULL,
  `storage` varchar(225) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laptop`
--

INSERT INTO `laptop` (`id`, `name`, `brand`, `series`, `os`, `tahun_rilis`, `u_layar`, `u_resolusi`, `prossesor`, `kecepatan`, `ram`, `storage`, `harga`, `gambar`) VALUES
(1, 'Aspire E5-475G | Core i5-7200U', 'acer', 'Aspire', 'DOS', 2015, 14, '1366 x 768', 'Intel Core i5', '2.5', 4, '1000', 6149000, '0269083001493474276.jpg'),
(2, 'Acer Aspire ES1-432-C56Y / C5GA / C52R', 'acer', 'Aspire', 'Linux', 2016, 14, '1366 x 768', 'Intel Celeron', '1.1', 2, '500', 3150000, '0597881001493475555.jpg'),
(3, 'Apple Macbook Pro MF839 Retina', 'Apple', 'MacBook Pro', 'Mac OS X', 2014, 13, '2560 x 1600', 'Intel Core i5', '2.7', 8, '128', 14454000, '0112802001493475769.jpg'),
(4, 'Apple MacBook Air MMGG2', 'Apple', 'MacBook Air', 'Mac OS X', 2016, 13, '1440 x 900', 'Intel Core i7', '2.2', 8, '512', 13954600, '0943526001493475965.jpg'),
(5, 'Asus X441SA-BX001D / BX002D / BX003D / BX004D / BX005D', 'Asus', 'X Series', 'DOS', 2016, 14, '1366 x 768', 'Intel Celeron', '2.48', 2, '500', 3185000, '0132303001493476140.jpg'),
(6, 'Asus A455LA-WX667D / WX668D / WX669D', 'Asus', 'A Series', 'DOS', 2016, 14, '1366 x 768', 'Intel Core i3', '2', 4, '500', 4725000, '0583689001493476362.jpg'),
(7, 'Acer TravelMate Timeline 8473TG-52454G75', 'acer', 'Travelmate Timeline', 'Windows 7', 2011, 14, '1366 x 768', 'Intel Core i5', '2.5', 4, '750', 1100000, '0681528001496831127.jpg'),
(8, 'Acer Aspire One Z1402-3563', 'acer', 'Aspire One', 'Windows 10', 2014, 14, '1366 x 768 ', 'Intel Core i3', '1.7', 2, '500', 4049000, '0075288001496831329.jpg'),
(9, 'Acer Switch One 10 SW1-011', 'acer', 'Aspire', 'Windows 10', 2016, 10, '1280 x 800', 'Intel Atom', '1.44', 2, '500', 3749000, '0116609001496831548.jpg'),
(10, 'Acer Aspire One 531h', 'acer', 'Aspire One', 'Windows XP', 2009, 10, '1024 x 600', 'Intel Atom', '1.6', 1, '160', 1635000, '0105236001496831716.jpg'),
(11, 'Acer Aspire One 14 Z1402', 'acer', 'Aspire One', 'Windows 10', 2015, 14, '1366 x 768', 'Intel Core i3', '2', 4, '500', 3130000, '0782008001496831865.jpg'),
(12, 'Acer Aspire E5-553G-F79R', 'acer', 'Aspire', 'Windows 10', 2016, 16, '1920 x 1080', 'AMD A-Series', '2.5', 4, '1000', 7201000, '0125050001496832175.jpg'),
(13, 'Acer Aspire ES1-431 | N3050', 'acer', 'Aspire', 'DOS', 2014, 14, '1366 x 768 ', 'Intel Celeron', '1.6', 2, '500', 3149000, '0618739001496832284.jpg'),
(14, 'Acer Aspire ES1-132', 'acer', 'Aspire', 'Windows 10', 2015, 12, '1366 x 768', 'Intel Celeron', '2.5', 2, '500', 2898000, '0787970001496832481.jpg'),
(15, 'Acer Aspire One Z1402-C4HS', 'acer', 'Aspire One', 'DOS', 2014, 14, '1366 x 768', 'Intel Celeron', '1.4', 2, '500', 3020000, '0937290001496833276.jpg'),
(16, 'Acer Aspire E5-573G-779S', 'acer', 'Aspire', 'Windows 8', 2015, 16, '1366 x 768', 'Intel Core i5', '2.2', 8, '500', 8150000, '0617968001496833439.jpg'),
(17, 'Acer Aspire E5-474G-59PT', 'acer', 'Aspire', 'Windows 10', 2014, 14, '1366 x 768 ', 'Intel Core i5', '2.3', 4, '1000', 6275000, '0538584001496833617.jpg'),
(18, 'Acer Aspire E5-473G-72HJ', 'acer', 'Aspire', 'DOS', 2016, 14, '1366 x 768', 'Intel Core i7', '2', 4, '1000', 9199000, '0227379001496834553.jpg'),
(19, 'Acer Aspire E5-473G | Core i7-5500U', 'acer', 'Aspire', 'Windows 8', 2014, 14, '1920 x 1080 ', 'Intel Core i7', '2.4', 4, '1000', 8800000, '0881936001496834701.jpg'),
(20, 'ACER ASPIRE 5534', 'acer', 'Aspire', 'Windows 7', 2009, 16, '1366 x 768 ', 'AMD Athlon', '1.6', 3, '250', 1418300, '0728076001496834846.jpg'),
(21, 'Acer Aspire E1-471G', 'acer', 'Aspire', 'DOS', 2011, 14, '1366 x 768 ', 'Intel Core i3', '2.3', 2, '14', 3450000, '0854364001496834983.jpg'),
(22, 'Acer Aspire E5-421-23PV', 'acer', 'Aspire', 'DOS', 2013, 14, '1366 x 768', 'AMD E-Series', '1.35', 2, '500', 3299000, '0168597001496835113.jpg'),
(23, 'Acer Aspire Switch 10 SW3-013', 'acer', 'Aspire Switch 10', 'Windows 10', 2015, 10, '1280 x 800 ', 'Intel Atom', '1.33', 2, '500', 3999000, '0015996001496835337.jpg'),
(24, 'Acer Aspire E5 473G | Core i5-4210U', 'acer', 'Aspire', 'Windows 10', 2015, 14, '1366 x 768', 'Intel Core i5', '1.7', 4, '500', 6200000, '0584377001496835466.jpg'),
(25, 'Acer Aspire E5-551-TG1A', 'acer', 'Aspire', 'DOS', 2013, 16, '1366 x 768 ', 'AMD A-Series', '1.9', 4, '1000', 5300000, '0993301001496835577.jpg'),
(26, 'Acer Aspire E14 E5-421', 'acer', 'Aspire', 'Windows 8', 2014, 14, '1366 x 768', 'AMD A-Series', '2.2', 2, '500', 3790000, '0563663001496835686.jpg'),
(27, 'Acer Aspire ES1-420-518B', 'acer', 'Aspire', 'Linux', 2014, 14, '1366 x 768', 'AMD A-Series', '1.5', 4, '500', 3175000, '0450779001496835784.jpg'),
(28, 'Acer Aspire R11 R3-131T', 'acer', 'Aspire', 'Windows 8', 2016, 12, '1366 x 768', 'Intel Celeron', '1.6', 2, '250', 4499000, '0432502001496835904.jpg'),
(29, 'Asus X550VX-XX106D', 'Asus', 'X Series', 'DOS', 2016, 16, '1366 x 768', 'Intel Core i5', '2.6', 8, '1000', 10165000, '0847395001496836163.jpg'),
(30, 'Asus X550ZE-XX033D', 'Asus', 'X Series', 'Windows 8', 2013, 16, '1920 x 1080', 'AMD A-Series', '2.5', 4, '1000', 5900000, '0357778001496836308.jpg'),
(31, 'Asus X454YA-BX801D', 'Asus', 'X Series', 'DOS', 2016, 14, '1366 x 768', 'AMD A-Series', '2.2', 4, '500', 3899000, '0357321001496836403.jpg'),
(32, 'Asus A455LF-WX158D', 'Asus', 'A Series', 'DOS', 2016, 14, '1366 x 768', 'Intel Core i3', '2', 4, '500', 5158000, '0312731001496836519.jpg'),
(33, 'Asus X540LJ-XX064D / XX065D', 'Asus', 'X Series', 'Windows 10', 2016, 14, '1920 x 1080', 'Intel Core i3', '2.2', 4, '500', 5025000, '0588943001496836617.jpg'),
(34, 'Asus ROG GL552VX-DM044T', 'Asus', 'Rog', 'Windows 10', 2016, 16, '1920 x 1080 ', 'Intel Core i7', '2.1', 8, '1000', 11900000, '0524813001496836751.jpg'),
(35, 'Asus ZenBook UX305CA-FC147T / FC148T', 'Asus', 'ZenBook', 'Windows 10', 2015, 13, '1920 x 1080', 'Intel Core i3', '2.2', 4, '128', 8600000, '0487562001496844105.jpg'),
(36, 'Asus ROG GL552JX-XO139D', 'Asus', 'Rog', 'Windows 8', 2014, 16, '1366 x 768 ', 'Intel Core i7', '2.5', 12, '750', 11799000, '0469172001496844239.jpg'),
(37, 'Asus X550JX-XX031D / XX187D', 'Asus', 'X Series', 'DOS', 2014, 16, '1366 x 768', 'Intel Core i7', '2.6', 4, '1000', 9298000, '0568528001496844374.jpg'),
(38, 'Asus X550IU-BX001D', 'Asus', 'X Series', 'Windows 10', 2017, 16, '1366 x 768', 'AMD FX-Series', '3', 8, '1000', 8800000, '0549584001496844511.jpg'),
(39, 'Asus N501JW-FI273H', 'Asus', 'N Series', 'Windows 8', 2015, 16, '3860 x 2160', 'Intel Core i7', '3.6', 8, '1000', 17100000, '0414890001496844617.jpg'),
(40, 'Asus Zenbook UX310UQ', 'Asus', 'ZenBook', 'Windows 10', 2016, 13, '1920 x 1080', 'Intel Core i7', '2.5', 4, '1000', 13950000, '0418722001496844722.jpg'),
(41, 'Asus X453MA-WX428D / WX429D', 'Asus', 'X Series', 'DOS', 2015, 14, '1366 x 768 ', 'Intel Celeron', '2.16', 4, '500', 3249000, '0410934001496844823.jpg'),
(42, 'Asus X200MA-KX153D / KX154D / KX155D / KX156D', 'Asus', 'X Series', 'Windows 8', 2014, 12, '1366x768 ', 'Intel Celeron', '1.86', 4, '500', 3422500, '0280651001496845148.jpg'),
(43, 'Asus ROG G501JW-CN117H', 'Asus', 'Rog', 'Windows 8', 2015, 16, '1920 x 1080', 'Intel Core i7', '2.6', 12, '1000', 14999000, '0131744001496845112.jpg'),
(44, 'Asus A456UR-GA090D / GA091D / GA092D / GA093D / GA094D', 'Asus', 'A Series', 'DOS', 2016, 14, '1366 x 768 ', 'Intel Core i5', '2.5', 4, '1000', 6844000, '0271733001496845268.jpg'),
(45, 'Asus X555QG-BX121D', 'Asus', 'X Series', 'DOS', 2016, 16, '1366 x 768', 'AMD A-Series', '2.4', 8, '1000', 6980000, '0794593001496845375.jpg'),
(46, 'Asus EeeBook E202SA-FD001D / FD002D / FD003D / FD004D', 'Asus', 'EeeBook', 'Windows 10', 2014, 12, '1366 x 768', 'Intel Celeron', '1.6', 2, '500', 2780000, '0020856001496845493.jpg'),
(47, 'Asus A456UQ-FA029D / FA030D', 'Asus', 'A Series', 'DOS', 2016, 14, '1366 x 768', 'Intel Core i7', '3.1', 8, '1000', 9650000, '0991197001496845685.jpg'),
(48, 'Asus ROG GL502VT', 'Asus', 'Rog', 'Windows 10', 2016, 16, '1920 x 1080', 'Intel Core i7', '3.4', 16, '1000', 22499000, '0742132001496845815.jpg'),
(49, 'Asus VivoBook Flip TP301UJ-DW081D / DW082D', 'Asus', 'VivoBook', 'Windows 10', 2016, 13, '1366 x 768', 'Intel Core i5', '2.6', 4, '1000', 8699000, '0060313001496845942.jpg'),
(50, 'Asus ROG GL553VD-FY380D', 'Asus', 'Rog', 'DOS', 2015, 16, '1920 x 1080', 'Intel Core i7', '2.8', 16, '1000', 14499000, '0544506001496846271.jpg'),
(51, 'Asus X541SA-BX401D', 'Asus', 'X Series', 'DOS', 2016, 16, '1366 x 768', 'Intel Celeron', '1.6', 4, '500', 3425000, '0707133001496852218.jpg'),
(52, 'Asus X455LA-WX058D / WX063D', 'Asus', 'X Series', 'Linux', 2012, 14, '1366 x 768', 'Intel Core i3', '1.9', 2, '500', 4590000, '0570852001496852309.jpg'),
(53, 'Axioo Neon TNH C525X', 'Axioo', 'Neon', 'Linux', 2009, 14, '1366 x 768 ', 'Intel Celeron', '1.58', 2, '500', 2599000, '0080623001496852436.jpg'),
(54, 'Axioo Pico CJM D825', 'Axioo', 'Pico', 'DOS', 2012, 10, '1024 x 600', 'Intel Atom', '1.8', 2, '500', 2290000, '0925917001496852569.jpg'),
(55, 'Dell Inspiron 14-3458 | Core i3-4005U', 'Dell', 'Inspiron', 'DOS', 2014, 14, '1366 x 768', 'Intel Core i3', '2.2', 4, '500', 4640000, '0771096001496852778.jpg'),
(56, 'Dell XPS 13 | Core i5-5200U', 'Dell', 'XPS', 'Windows 10', 2015, 13, '1366 x 768', 'Intel Core i5', '2.3', 8, '128', 13400000, '0493539001496852902.jpg'),
(57, 'Dell Inspiron 3459 | Core i5-6200', 'Dell', 'EXP', 'Windows 10', 2015, 13, '1920 x 1080', 'Intel Core i5', '2.8', 16, '1000', 6900000, '0987242001496853050.jpg'),
(58, 'Dell XPS 15 | Core i7-6700HQ', 'Dell', 'XPS', 'Windows 10', 2015, 16, '1920 x 1080', 'Intel Core i7', '3.5', 8, '256', 19325000, '0013393001496853183.jpg'),
(59, 'Dell Vostro 3468 | Core i3-7100', 'Dell', '-', 'Windows 10', 2016, 14, '1366 x 768', 'Intel Core i3', '2.4', 4, '1000', 5400000, '0976865001496853321.jpg'),
(60, 'Dell Vostro 14-5480 | Core i5-5200U', 'Dell', 'Nuc', 'Windows 8', 2014, 14, '1366 x 768', 'Intel Core i5', '3', 4, '500', 8350000, '0141355001496853496.jpg'),
(61, 'Dell XPS 13 | Core i5-6200', 'Dell', 'XPS', 'Windows 10', 2016, 13, '1920 x 1080', 'Intel Core i5', '2.3', 8, '128', 15864100, '0525914001496853606.jpg'),
(62, 'Dell Inspiron 3421 | Core i3-2365M', 'Dell', 'Inspiron', 'Linux', 2012, 14, '1366 x 768', 'Intel Core i3', '1.4', 2, '500', 5636000, '0942233001496853725.jpg'),
(63, 'Dell Inspiron 11-3157 | N3700', 'Dell', 'Inspiron ', 'Windows 10', 2015, 12, '1366 x 768', 'Intel Core i5', '2.1', 4, '128', 5040000, '0837000001496853824.jpg'),
(64, 'Dell XPS 12 | Intel M5-6Y57', 'Dell', 'XPS', 'Windows 8', 2013, 13, '1366 x 768', 'Intel Core i7', '1.8', 8, '256', 15700000, '0450724001496853934.jpg'),
(65, 'Dell Inspiron 11-3162 | N3050', 'Dell', 'Inspiron ', 'Windows 10', 2016, 12, '1366 x 768', 'Intel Celeron', '2.16', 2, '500', 2850000, '0047048001496854116.jpg'),
(66, 'Dell Inspiron 14-5448-P49G', 'Dell', 'Inspiron', 'Windows 8', 2013, 14, '1366 x 768', 'Intel Core i7', '2.4', 8, '1000', 5749000, '0003651001496854232.jpg'),
(67, 'Dell Inspiron 14-3458 | Core i3-5005', 'Dell', 'Inspiron', 'Windows 10', 2015, 14, '1366 x 768', 'Intel Core i3', '2', 4, '500', 4249000, '0886953001496854320.jpg'),
(68, 'Dell Inspiron 13-7359', 'Dell', 'Inspiron', 'Windows 10', 2016, 13, '1920 x 1080', 'Intel Core i7', '2.5', 8, '256', 7300000, '0130811001496854449.jpg'),
(69, 'HP Pavilion X2 10-n137TU / n138TU', 'HP', 'Pavilion', 'Windows 10', 2015, 10, '1920 x 1080', 'Intel Atom', '1.44', 2, '32', 3839000, '0072209001496854693.jpg'),
(70, 'HP Pavilion 14-AF118AU', 'HP', 'Pavilion', 'DOS', 2015, 14, '1366 x 768', 'AMD A-Series', '2.2', 4, '500', 3832000, '0267064001496854795.jpg'),
(71, 'HP Stream 11-D030TU / D031TU', 'HP', 'Stream', 'Windows 8', 2014, 12, '1366 x 768', 'Intel Celeron', '2.16', 2, '128', 2299000, '0410992001496854892.jpg'),
(72, 'HP Pavilion X2-10-J019TU / J020TU', 'HP', 'Pavilion', 'DOS', 2006, 10, '1366 x 768', 'Intel Atom', '1.33', 2, '500', 2800000, '0919312001496855004.jpg'),
(73, 'HP Pavilion 14-AC150TU / AC151TU / AC152TU', 'HP', 'Pavilion', 'Windows 10', 2015, 14, '1366 x 768', 'Intel Celeron', '1.6', 2, '500', 3150000, '0706335001496855079.jpg'),
(74, 'HP Pavilion 15-BA004AX', 'HP', 'Pavilion', 'DOS', 2012, 16, '1366 x 768', 'AMD A-Series', '2.4', 8, '1000', 6099000, '0614034001496855268.jpg'),
(75, 'HP Envy 13-D044TU', 'HP', 'Envy', 'Windows 10', 2016, 13, '2560 x 1600', 'Intel Celeron', '2', 4, '128', 10999000, '0346338001496855358.jpg'),
(76, 'HP 14-AN030AU', 'HP', 'Pavilion', 'DOS', 2016, 14, '1366 x 768', 'AMD A-Series', '2.3', 4, '500', 3600000, '0388961001496855463.jpg'),
(77, 'HP 14-AN017AU', 'HP', 'Pavilion', 'DOS', 2015, 14, '1366 x 768', 'AMD A-Series', '2.2', 2, '500', 3250000, '0195009001496855577.jpg'),
(78, 'HP EliteBook 8460p', 'HP', 'EliteBook', 'Windows 7', 2010, 14, '1600 x 900', 'Intel Core i7', '2.7', 4, '320', 4100000, '0718992001496855720.jpg'),
(79, 'HP 14-AM015TX / AM016TX / AM017TX', 'HP', 'Pavilion', 'DOS', 2016, 14, '1366 x 768', 'Intel Core i5', '2.3', 4, '500', 4699000, '0670385001496855863.jpg'),
(80, 'HP 14-AM008TU / AM009TU / AM010TU', 'HP', 'Pavilion', 'DOS', 2014, 14, '1366 x 768', 'Intel Celeron', '1.6', 2, '500', 3150000, '0486314001496855949.jpg'),
(81, 'HP Envy M6-w014dx X360', 'HP', 'Envy', 'Windows 8', 2014, 16, '1920 x 1080', 'Intel Core i7', '2.4', 8, '1000', 10999000, '0235526001496856066.jpg'),
(82, 'HP Envy 14-U009TX', 'HP', 'Envy', 'Windows 8', 2011, 14, '1366 x 768', 'Intel Core i7', '3.1', 4, '500', 11999000, '0798484001496856165.jpg'),
(83, 'HP Envy M6-P013DX', 'HP', 'Envy', 'Windows 8', 2015, 16, '1366 x 768', 'AMD FX-Series', '2.1', 6, '1000', 6649000, '0173471001496856309.jpg'),
(84, 'HP Elitebook 2570p-4PA', 'HP', 'Elitebook', 'Windows 7', 2015, 13, '1366 x 768', 'Intel Core i7', '2.9', 4, '750', 17050000, '0523110001496856409.jpg'),
(85, 'HP Pavilion 14-AC003TU', 'HP', 'Pavilion', 'DOS', 2014, 14, '1366 x 768', 'Intel Celeron', '1.6', 2, '500', 2970000, '0622407001496856498.jpg'),
(86, 'HP Pavilion 11-N028TU / N045TU / N046TU X360', 'HP', 'Pavilion', 'Windows 8', 2013, 12, '1366 x 768', 'Intel Celeron', '2.18', 4, '500', 4400000, '0084000001496856601.jpg'),
(87, 'HP Pavilion TouchSmart 10-e001AU / e017AU / e011AU', 'HP', 'Pavilion', 'Windows 8', 2013, 10, '1366 x 768', 'AMD A-Series', '1', 2, '640', 3199000, '0989278001496856750.jpg'),
(88, 'HP Pavilion 14-N233TX', 'HP', 'Pavilion', 'Windows 8', 2011, 14, '1366 x 768', 'Intel Core i7', '1.8', 4, '1000', 9999000, '0031730001496856883.jpg'),
(89, 'HP ProBook 440 G3-17PA', 'HP', 'ProBook', 'Windows 10', 2015, 13, '1366 x 768', 'Intel Core i7', '2.5', 4, '1000', 8865000, '0385196001496856989.jpg'),
(90, 'HP ProBook 440-G2 | Core i3-4005U', 'HP', 'ProBook', 'Windows 7', 2014, 14, '1366 x 768', 'Intel Core i3', '1.7', 4, '500', 6000000, '0641995001496857075.jpg'),
(91, 'HP Pavilion DM4', 'HP', 'Pavilion', 'Windows 7', 2012, 14, '1366 x 768', 'Intel Celeron', '1.6', 2, '126', 1539900, '0485224001496857157.jpg'),
(92, 'Lenovo IdeaPad 310-14ISK', 'Lenovo', 'IdeaPad', 'DOS', 2016, 14, '1366 x 768', 'Intel Core i5', '2.5', 4, '1000', 6449000, '0533759001496857970.jpg'),
(93, 'Lenovo IdeaPad 110-14AST', 'Lenovo', 'IdeaPad', 'DOS', 2016, 14, '1366 x 768', 'AMD A-Series', '2.4', 4, '1000', 3999000, '0656741001496858133.jpg'),
(94, 'Sony Vaio SVF14N19SG', 'Sony', 'Vaio', 'Windows 8', 2012, 14, '1920 x 1080', 'Intel Core i7', '1.8', 8, '1000', 14949000, '0304811001496858277.jpg'),
(95, 'Sony Vaio SVF13N12SG', 'Sony', 'Vaio', 'Windows 8', 2012, 13, '1920 x 1080', 'Intel Core i5', '1.6', 4, '128', 21087000, '0899794001496858462.jpg'),
(96, 'Sony Vaio SVF14212SG', 'Sony', 'Vaio', 'Windows 8', 2013, 14, '1366 x 768', 'Intel Core i3', '1.8', 2, '500', 6140000, '0492294001496858594.jpg'),
(97, 'Toshiba Satellite Radius P25W-C2300', 'Toshiba', 'Satellite', 'Windows 10', 2015, 16, '3840 x 2160', 'Intel Core i7', '2.5', 8, '256', 12300000, '0414936001496858827.jpg'),
(98, 'Toshiba Satellite Radius E45DW-C4210', 'Toshiba', 'Satellite', 'Windows 8', 2015, 14, '1366 x 768', 'AMD FX-Series', '3.4', 8, '750', 6149000, '0187908001496858964.jpg'),
(99, 'Toshiba Satellite Radius P55W-C5200', 'Toshiba', 'Satellite', 'Windows 10', 2016, 16, '1366 x 768', 'Intel Core i5', '3.4', 4, '750', 7198000, '0536773001496859480.jpg'),
(100, 'Toshiba Satellite Radius P55W-C5204', 'Toshiba', 'Satellite', 'Windows 10', 2015, 16, '1920 x 1080', 'Intel Core i7', '2.4', 8, '1000', 8999000, '0345594001496859514.jpg'),
(101, 'Apple MacBook Air MMGF2', 'Apple', 'MacBook Air', 'Mac OS X', 2015, 13, '1440 x 900', 'Intel Core i5', '1.6', 8, '128', 11250000, '0020482001496888172.jpg'),
(102, 'Apple MacBook Air MD712ZA / A 11.6-inch', 'Apple', 'MacBook Air', 'Mac OS X', 2012, 12, '1366 x 768', 'Intel Core i5', '1.3', 4, '256', 13100000, '0759985001496888291.jpg'),
(103, 'Apple MacBook Air MJVM2ID / A', 'Apple', 'MacBook Air', 'Mac OS X', 2013, 12, '1366 x 768', 'Intel Core i5', '1.6', 4, '128', 10800600, '0930907001496888414.jpg'),
(104, 'Apple MacBook Pro MD314ZA / A 13.3-inch', 'Apple', 'MacBook Pro', 'Mac OS X', 2010, 13, '1280 x 800', 'Intel Core i7', '2.8', 4, '750', 9100000, '0885478001496888521.jpg'),
(105, 'Apple MacBook Pro MLW82', 'Apple', 'MacBook Pro', 'Mac OS Sierra', 2016, 15, '2560 x 1600', 'Intel Core i7', '2.7', 16, '512', 34305000, '0257714001496888711.jpg'),
(106, 'Apple MacBook Pro MD101ZA / A 13.3-inch', 'Apple', 'MacBook Pro', 'Mac OS X', 2012, 13, '1280 x 800', 'Intel Core i5', '2.5', 4, '500', 12750750, '0033723001496888879.jpg'),
(107, 'Apple MacBook Pro ME866ZA / A 13.3-inch with Retina Display', 'Apple', 'MacBook Pro', 'Mac OS X', 2016, 13, '2560 x 1600', 'Intel Core i5', '2.5', 8, '512', 20700000, '0745549001496888970.jpg'),
(108, 'Apple MacBook Air MD760ZA / A 13.3-inch', 'Apple', 'MacBook Air', 'Mac OS X', 2012, 13, '1440 x 900', 'Intel Core i5', '1.3', 4, '128', 14243900, '0229906001496889070.jpg'),
(109, 'Apple MacBook Air MD711ZA / A 11.6-inch', 'Apple', 'MacBook Air', 'Mac OS X', 2012, 12, '1366 x 768', 'Intel Core i5', '1.3', 4, '128', 13100000, '0114846001496889180.jpg'),
(110, 'Apple MacBook Pro MD101ID / A', 'Apple', 'MacBook Pro', 'Mac OS X', 2013, 13, '800 x 1280', 'Intel Core i5', '2.5', 4, '500', 11394000, '0244047001496889280.jpg'),
(111, 'Apple MacBook Pro MLH42LL / A', 'Apple', 'MacBook Pro', 'Mac OS Sierra', 2016, 15, '2880 x 1800', 'Intel Core i7', '2.7', 16, '512', 33970000, '0450516001496889440.jpg'),
(112, 'Apple MacBook Pro ME293ZA / A 15.4-inch with Retina Display', 'Apple', 'MacBook Pro', 'Mac OS X', 2013, 15, '2880 x 1800', 'Intel Core i7', '2.5', 16, '512', 29050000, '0019851001496889552.jpg'),
(113, 'Apple MacBook Air MD224ZA / A 11.6-inch', 'Apple', 'MacBook Air', 'Mac OS X', 2011, 12, '1366 x 768', 'Intel Core i5', '1.7', 4, '128', 14118500, '0905688001496889640.jpg'),
(114, 'Apple MacBook Pro MNQF2LL / A', 'Apple', 'MacBook Pro', 'Mac OS Sierra', 2016, 13, '2560 x 1600', 'Intel Core i5', '2.9', 8, '512', 25250000, '0647083001496889734.jpg'),
(115, 'Apple MacBook Pro MLH32LL / A', 'Apple', 'MacBook Pro', 'Mac OS Sierra', 2016, 15, '2880 x 1800', 'Intel Core i7', '2.6', 16, '256', 28928000, '0356386001496889858.jpg'),
(116, 'Apple MacBook Pro MGX72ID / A', 'Apple', 'MacBook Pro', 'Mac OS X', 2012, 13, '2560 x 1600', 'Intel Core i5', '2.6', 8, '128', 16750000, '0375980001496889976.jpg'),
(117, 'Apple MacBook Pro MLUQ2', 'Apple', 'MacBook Pro', 'Mac OS Sierra', 2016, 13, '2560 x 1600', 'Intel Core i5', '2', 8, '256', 18429000, '0416718001496890073.jpg'),
(118, 'Apple MacBook MLH72', 'Apple', 'MacBook', 'Mac OS X', 2016, 13, '1366 x 768', 'Intel Core i5', '1.6', 8, '256', 15379000, '0675405001496890188.jpg'),
(119, 'Apple MacBook Air MJVG2ID / A', 'Apple', 'MacBook Air', 'Mac OS X', 2015, 13, '1366 x 768', 'Intel Core i5', '1.6', 4, '256', 12788000, '0849464001496890267.jpg'),
(120, 'Apple MacBook Pro ME294ZA / A 15.4-inch with Retina Display', 'Apple', 'MacBook Pro', 'Mac OS X', 2016, 23, '2880 x 1800', 'Intel Core i7', '2.5', 16, '512', 29050000, '0570792001496891653.jpg'),
(121, 'Apple MacBook Pro MGXA2 / MGXC2ID / A', 'Apple', 'MacBook Pro', 'Mac OS X', 2012, 15, '1366 x 768', 'Intel Core i7', '2.4', 16, '500', 23479000, '0967508001496893677.jpg'),
(122, 'Apple MacBook Air MD761ZA / A 13.3-inch', 'Apple', 'MacBook Air', 'Mac OS X', 2012, 13, '1366 x 768', 'Intel Core i5', '1.3', 4, '256', 15895000, '0628723001496893786.jpg'),
(123, 'Apple MacBook Air MD232ZA / A 13.3-inch', 'Apple', 'MacBook Air', 'Mac OS X', 2011, 13, '1440 x 900', 'Intel Core i5', '1.8', 4, '256', 17600000, '0069816001496904301.jpg'),
(124, 'Apple MacBook Pro MGX82ID / A', 'Apple', 'MacBook Pro', 'Mac OS X', 2012, 13, '2560 x 1600', 'Intel Core i5', '2.6', 8, '256', 18999000, '0972245001496904471.jpg'),
(125, 'Apple MacBook Air MJVP2ID / A', 'Apple', 'MacBook Air', 'Mac OS X', 2014, 11, '1366 x 768', 'Intel Core i5', '1.6', 4, '256', 11829000, '0357054001496904553.jpg'),
(126, 'Fujitsu LifeBook AH556-011 / 012', 'Fujitsu', 'LifeBook', 'DOS', 2015, 16, '1366 x 768', 'Intel Core i7', '3.1', 8, '256', 8450000, '0767814001496904760.jpg'),
(127, 'Fujitsu LH532V | Core i7-3632Q', 'Fujitsu ', 'LH Series', 'DOS', 2014, 14, '1366 x 768', 'Intel Core i7', '3.2', 4, '750', 9146130, '0819446001496904880.jpg'),
(128, 'Fujitsu LH532V | Core i3-3110', 'Fujitsu', 'LH Series', 'DOS', 2014, 14, '1366 x 768', 'Intel Core i3', '2.4', 2, '500', 5554000, '0498004001496904969.jpg'),
(129, 'Fujitsu LifeBook U745 | Core i7-5500U', 'Fujitsu ', 'LifeBook', 'Windows 8', 2015, 14, '1600 x 900', 'Intel Core i7', '2.4', 12, '1000', 24830000, '0006281001496905092.jpg'),
(130, 'Fujitsu LifeBook LH532 | Core i3-3110', 'Fujitsu', 'LifeBook', 'DOS', 2013, 14, '1366 x 768', 'Intel Core i3', '2.4', 2, '500', 4699000, '0045810001496905174.jpg'),
(131, 'Fujitsu LifeBook S936 | Core i7-6500 | RAM 8GB', 'Fujitsu', 'LifeBook', 'Windows 10', 2016, 13, '2560 x 1440', 'Intel Core i7', '2.5', 8, '256', 24900000, '0587605001496905338.jpg'),
(132, 'Samsung NP270E4V-K04ID', 'Samsung', 'NP Series', 'Windows 8', 2014, 14, '1366 x 768', 'Intel Core i3', '2.4', 4, '500', 4749000, '0041716001496905466.jpg'),
(133, 'Samsung NP275E4V-X01ID', 'Samsung', 'NP Series', 'Windows 7', 2015, 14, '1366 x 768', 'AMD A-Series', '1.6', 4, '500', 5309000, '0719169001496905594.jpg'),
(134, 'Samsung ATIV Book 9 Lite Touch NP915S3G-K02ID / K03ID / K04ID / K06ID', 'Samsung', 'ATIV Series', 'Windows 8', 2013, 13, '1366 x 768', 'AMD A-Series', '1.4', 4, '128', 7349000, '0368296001496905708.jpg'),
(135, 'Samsung ATIV Book 9 Plus NP940X3G-K01ID', 'Samsung', 'ATIV Series', 'Windows 8', 2013, 13, '1920 x 1080', 'Intel Core i5', '1.6', 4, '128', 17949000, '0079065001496905835.jpg'),
(136, 'Samsung NP275E4V-K01ID', 'Samsung', 'NP Series', 'DOS', 2014, 14, '1366 x 768', 'AMD E-Series', '1.7', 4, '500', 4699000, '0052611001496905963.jpg'),
(137, 'Samsung NP270E4V-K04ID-2', 'Samsung', 'NP Series', 'Windows 8', 2014, 14, '1366 x 768', 'Intel Core i3', '2.4', 2, '500', 4749000, '0696226001496906087.jpg'),
(138, 'Sony Vaio SVD13213SG', 'Sony', 'Vaio', 'Windows 8', 2014, 13, '1366 x 768', 'Intel Core i5', '1.6', 4, '128', 24750000, '0827826001496906219.jpg'),
(139, 'Sony Vaio SVD13211SG', 'Sony', 'Vaio', 'Windows 8', 2012, 13, '1920 x 1080', 'Intel Core i5', '1.6', 4, '128', 16870000, '0788525001496906311.jpg'),
(140, 'Sony Vaio SVP13218PG', 'Sony', 'Vaio', 'Windows 8', 2012, 13, '1920 x 1080', 'Intel Core i7', '1.8', 4, '256', 16830000, '0539787001496906401.jpg'),
(141, ' Sony Vaio SVF14N19SG', 'Sony', 'Vaio', 'Windows 8', 2012, 14, '1920 x 1080', 'Intel Core i7', '1.8', 8, '1000', 14949000, '0394234001496906525.jpg'),
(142, 'Sony Vaio SVF14N13SG', 'Sony', 'Vaio', 'Windows 8', 2013, 14, '1920 x 1080', 'Intel Core i3', '1.7', 4, '500', 12270000, '0063100001496906624.jpg'),
(143, 'Sony Vaio SVF14216SG', 'Sony', 'Vaio', 'Windows 8', 2013, 14, '1366 x 768', 'Intel Core i3', '1.9', 2, '500', 7493000, '0976776001496906712.jpg'),
(144, 'Sony Vaio SVF14212SG-2', 'Sony', 'Vaio', 'Windows 8', 2013, 14, '1366 x 768', 'Intel Core i3', '1.8', 2, '500', 6140000, '0234175001496906821.jpg'),
(145, 'Sony Vaio SVS13112EG', 'Sony', 'Vaio', 'Windows 7', 2011, 13, '1366 x 768', 'Intel Core i5', '2.5', 4, '500', 3999000, '0621448001496906936.jpg'),
(146, 'Gateway NV52', 'Gateway', 'NV Series', 'DOS', 2010, 13, '1366 x 768', 'AMD A-Series', '2.5', 4, '320', 2800000, '0211914001496907150.jpg'),
(147, 'MSI GT83VR Titan SLI', 'MSI', '-', 'Windows 10', 2016, 18, '1920 x 1080', 'Intel Core i7', '2.8', 64, '1000', 63138200, '0998871001496907289.jpg'),
(148, 'MSI WT70 2OL', 'MSI', 'WT Series', 'Windows 7', 2014, 17, '1920 x 1080', 'Intel Core i7', '2.8', 16, '1000', 53829022, '0609195001496907397.jpg'),
(149, 'MSI GT80S 6QE-HOS', 'MSI', 'GT Series', 'Windows 10', 2015, 16, '1920 x 1080', 'Intel Core i7', '2.6', 32, '256', 55000000, '0502829001496907544.jpg'),
(150, 'MSI GT70 20D Dragon Edition ', 'MSI', 'GT Series', 'Windows 8', 2013, 16, '1920 x 1080', 'Intel Core i7', '2.4', 32, '1000', 38268400, '0679730001496907646.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user_profil_id` int(11) NOT NULL,
  `laptop_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`id`, `user_profil_id`, `laptop_id`, `nilai`) VALUES
(1, 6, 2, 5),
(2, 6, 4, 4),
(3, 7, 3, 3),
(4, 7, 4, 2),
(5, 6, 3, 3),
(6, 7, 6, 1),
(7, 7, 5, 4),
(8, 9, 1, 4),
(9, 9, 4, 1),
(10, 8, 2, 3),
(11, 8, 4, 3),
(12, 10, 2, 2),
(13, 10, 3, 2),
(14, 10, 4, 4),
(15, 10, 6, 5),
(16, 11, 2, 5),
(17, 11, 4, 4),
(18, 12, 2, 5),
(19, 12, 4, 4),
(20, 6, 50, 5),
(21, 6, 44, 4),
(22, 6, 48, 4),
(23, 6, 46, 2),
(24, 6, 40, 3),
(25, 6, 24, 4),
(26, 6, 20, 4),
(27, 6, 17, 4),
(28, 6, 12, 4),
(29, 6, 36, 5),
(30, 6, 33, 1),
(31, 6, 38, 4),
(32, 6, 28, 2),
(33, 6, 9, 3),
(34, 7, 50, 4),
(35, 7, 48, 3),
(36, 7, 45, 3),
(37, 7, 45, 3),
(38, 7, 40, 3),
(39, 7, 43, 5),
(40, 7, 36, 3),
(41, 7, 39, 4),
(42, 7, 29, 2),
(43, 7, 28, 2),
(44, 7, 26, 2),
(45, 7, 26, 2),
(46, 7, 20, 3),
(47, 7, 14, 3),
(48, 7, 11, 3),
(49, 7, 22, 2),
(50, 8, 46, 3),
(51, 8, 44, 4),
(52, 8, 39, 3),
(53, 8, 42, 4),
(54, 8, 20, 3),
(55, 8, 17, 3),
(56, 8, 24, 3),
(57, 8, 47, 4),
(58, 8, 48, 5),
(59, 8, 8, 2),
(60, 8, 18, 2),
(61, 9, 50, 5),
(62, 9, 47, 2),
(63, 9, 44, 4),
(64, 9, 40, 3),
(65, 9, 36, 4),
(66, 9, 25, 4),
(67, 9, 20, 4),
(68, 9, 18, 3),
(69, 9, 34, 4),
(70, 9, 35, 5),
(71, 10, 50, 3),
(72, 10, 48, 5),
(73, 10, 43, 5),
(74, 10, 39, 3),
(75, 10, 24, 3),
(76, 10, 12, 2),
(77, 10, 42, 3),
(78, 10, 35, 3),
(79, 10, 36, 5),
(80, 10, 34, 4),
(81, 10, 20, 3),
(82, 10, 15, 4),
(83, 11, 48, 3),
(84, 11, 50, 5),
(85, 11, 43, 3),
(86, 11, 41, 4),
(87, 11, 24, 4),
(88, 11, 20, 4),
(89, 11, 18, 4),
(90, 11, 36, 5),
(91, 11, 34, 5),
(92, 11, 28, 3),
(93, 11, 7, 4),
(94, 11, 39, 4),
(95, 12, 50, 3),
(96, 12, 39, 3),
(97, 12, 41, 5),
(98, 12, 47, 3),
(99, 12, 25, 3),
(100, 12, 28, 3),
(101, 12, 16, 4),
(102, 12, 16, 4),
(103, 12, 10, 1),
(104, 12, 6, 3),
(105, 6, 100, 4),
(106, 6, 97, 3),
(107, 6, 97, 3),
(108, 6, 97, 3),
(109, 6, 92, 4),
(110, 6, 94, 4),
(111, 6, 88, 4),
(112, 6, 89, 3),
(113, 6, 83, 2),
(114, 6, 80, 3),
(115, 6, 71, 3),
(116, 6, 77, 3),
(117, 6, 69, 3),
(118, 6, 65, 3),
(119, 6, 58, 3),
(120, 7, 98, 3),
(121, 7, 94, 3),
(122, 7, 91, 5),
(123, 7, 78, 4),
(124, 7, 75, 3),
(125, 7, 70, 3),
(126, 7, 58, 3),
(127, 8, 93, 4),
(128, 8, 98, 3),
(129, 8, 92, 3),
(130, 8, 70, 3),
(131, 8, 71, 3),
(132, 8, 83, 4),
(133, 8, 91, 1),
(134, 9, 99, 3),
(135, 9, 100, 5),
(136, 9, 92, 2),
(137, 9, 89, 2),
(138, 9, 71, 2),
(139, 9, 66, 3),
(140, 9, 58, 5),
(141, 10, 100, 5),
(142, 10, 94, 4),
(143, 10, 65, 3),
(144, 10, 86, 2),
(145, 11, 94, 3),
(146, 11, 94, 3),
(147, 11, 74, 3),
(148, 11, 68, 5),
(149, 11, 84, 2),
(150, 12, 93, 3),
(151, 12, 92, 3),
(152, 12, 69, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `joined` datetime NOT NULL,
  `group` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `joined`, `group`) VALUES
(3, 'admin', '$2y$11$0ih/RcUIScr19OwCP/3DOeU.IRsqylaxVbVKyd6QFbDa4u6vwFfam', '2017-03-19 15:35:02', 1),
(6, 'member1', '$2y$11$qc1cX8jmi6dJTV8vT80yxe7WLI2c7LCkn/IsPesl13P3dDiMLqKAm', '2017-03-28 15:16:49', 2),
(7, 'member2', '$2y$11$HYzwGPIrlBW4uagRi1y5eeyFz9iGRAbzNZmQqZcREXjWj.iVHa3Im', '2017-03-28 15:19:51', 2),
(8, 'member3', '$2y$11$QZJVmbAHwBWzAaoWFE4/0O7Izo8PNo3espUH/6vnNujh/dmPxKGGK', '2017-03-28 15:20:59', 2),
(9, 'member4', '$2y$11$FMoT9d/1Ob8OaYN6uZl7OeGRerg6DWl.FxtfkSqoRvjtdrFjVmK7G', '2017-03-28 15:22:08', 2),
(10, 'member5', '$2y$11$xlxu160b/no23ZXcnraD/OtgFvi0UgR1LYtcZ1PKtxJay./Jd6/a2', '2017-03-28 15:23:17', 2),
(11, 'member6', '$2y$11$soAE6S67SJseyPbKe395puNiGFLXFEAC2fcd5z5nFZcNtP0h7YA0a', '2017-03-28 15:24:09', 2),
(12, 'member7', '$2y$11$oxZ2tZvNvIZzwHuqPGZyqOoJgAOsnK5i7jyU5DQqtXYeE3e.Q0AjW', '2017-05-14 18:56:51', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_info`
--

CREATE TABLE `users_info` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_info`
--

INSERT INTO `users_info` (`user_id`, `name`, `email`, `tgl_lahir`) VALUES
(6, 'deni alfian', 'denialfian66@gmail.com', '2017-05-18'),
(7, NULL, NULL, NULL),
(8, NULL, NULL, NULL),
(9, NULL, NULL, NULL),
(10, NULL, NULL, NULL),
(11, NULL, NULL, NULL),
(12, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_likes`
--

CREATE TABLE `users_likes` (
  `user_id` int(11) NOT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `series` varchar(225) DEFAULT NULL,
  `os` varchar(225) DEFAULT NULL,
  `tahun_rilis` year(4) DEFAULT NULL,
  `u_layar` int(11) DEFAULT NULL,
  `u_resolusi` varchar(225) DEFAULT NULL,
  `prossesor` varchar(225) DEFAULT NULL,
  `kecepatan` varchar(225) DEFAULT NULL,
  `ram` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `storage` int(11) DEFAULT NULL,
  `all_likes` text,
  `cek` enum('y','n') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_likes`
--

INSERT INTO `users_likes` (`user_id`, `brand`, `series`, `os`, `tahun_rilis`, `u_layar`, `u_resolusi`, `prossesor`, `kecepatan`, `ram`, `harga`, `storage`, `all_likes`, `cek`) VALUES
(6, 'Apple Asus', 'Aspire MacBook-Air MacBook-Pro', 'Linux Mac-OS-X', 2016, 14, '1366-x-768', 'Intel-Core-i5', '2.2', 4, 6149000, 512, 'Apple-Asus-Linux Mac-OS-X-Aspire MacBook-Air MacBook-Pro-2016-14-1366-x-768-2.2-Intel-Core-i5-4-512-6149000', 'y'),
(7, 'acer Apple', 'MacBook-Air MacBook-Pro', 'Mac-OS-X MacBook-Air', 2016, 14, '1366-x-768', 'Intel-Celeron', '2.7', 4, 4000000, 1000, 'acer-Apple-Mac-OS-X MacBook-Air-MacBook-Air MacBook-Pro-2016-14-1366 x 768-2.7-Intel Celeron-4-1000-4000000', 'y'),
(8, 'acer', 'Aspire', 'DOS', 2015, NULL, '', '', '', NULL, 8686868, 0, 'acer-DOS-Aspire-2015-0------8686868', 'y'),
(9, 'Apple', 'X Series', 'Mac OS X', 2016, NULL, '', '', '', NULL, 3000000, 0, 'Apple-Mac OS X-X Series-2016-0------3000000', 'y'),
(10, 'Asus', 'Aspire', 'DOS', 2014, NULL, '', '', '', NULL, 329302, 0, 'Asus-DOS-Aspire-2014-0------329302', 'y'),
(11, 'Apple', 'MacBook Pro', 'Mac OS X', 2016, NULL, '', '', '', NULL, 32987902, 0, 'Apple-Mac OS X-MacBook Pro-2016-0------32987902', 'y'),
(12, 'Apple', 'MacBook-Air MacBook-Pro', 'Mac-OS-X MacBook-Air', 2016, 14, '', '', '', 0, 3000000, 0, 'Apple-Mac-OS-X MacBook-Air-MacBook-Air MacBook-Pro-2016-14----0-0-3000000', 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_profil`
--

CREATE TABLE `users_profil` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `users_info_id` int(11) DEFAULT NULL,
  `users_likes_id` int(11) DEFAULT NULL,
  `rekomendasi` enum('cb','cf','mixed') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_profil`
--

INSERT INTO `users_profil` (`id`, `users_id`, `users_info_id`, `users_likes_id`, `rekomendasi`) VALUES
(6, 6, NULL, 6, 'cb'),
(7, 7, NULL, 7, 'cb'),
(8, 8, NULL, 8, 'cb'),
(9, 9, NULL, 9, 'cb'),
(10, 10, NULL, 10, NULL),
(11, 11, NULL, 11, 'cb'),
(12, 12, NULL, 12, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profil_id` (`user_profil_id`),
  ADD KEY `laptop_id` (`laptop_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_likes`
--
ALTER TABLE `users_likes`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_profil`
--
ALTER TABLE `users_profil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_info_id` (`users_info_id`,`users_likes_id`),
  ADD KEY `users_likes_id` (`users_likes_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laptop`
--
ALTER TABLE `laptop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users_likes`
--
ALTER TABLE `users_likes`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users_profil`
--
ALTER TABLE `users_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`laptop_id`) REFERENCES `laptop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`user_profil_id`) REFERENCES `users_profil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users_profil`
--
ALTER TABLE `users_profil`
  ADD CONSTRAINT `users_profil_ibfk_1` FOREIGN KEY (`users_info_id`) REFERENCES `users_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_profil_ibfk_2` FOREIGN KEY (`users_likes_id`) REFERENCES `users_likes` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
