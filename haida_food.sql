-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 08:08 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haida_food`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_jabatan`
--

CREATE TABLE `m_jabatan` (
  `ID_Jabatan` int(11) NOT NULL,
  `NamaJabatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_jabatan`
--

INSERT INTO `m_jabatan` (`ID_Jabatan`, `NamaJabatan`) VALUES
(2, 'Supervisor'),
(3, 'Staff'),
(5, 'HL'),
(8, 'PPL');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `ID_User` int(11) NOT NULL,
  `NikUser` varchar(255) DEFAULT NULL,
  `NoKartu` varchar(255) DEFAULT NULL,
  `NamaUser` varchar(255) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `ID_Jabatan` int(11) DEFAULT NULL,
  `PassUser` varchar(255) DEFAULT NULL,
  `DeptUser` varchar(255) DEFAULT NULL,
  `ImageUser` varchar(255) DEFAULT NULL,
  `StatusUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`ID_User`, `NikUser`, `NoKartu`, `NamaUser`, `Username`, `ID_Jabatan`, `PassUser`, `DeptUser`, `ImageUser`, `StatusUser`) VALUES
(1, NULL, NULL, 'administrator', 'admin', NULL, '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', NULL, NULL, 0),
(2, NULL, NULL, 'contoh', 'contoh', NULL, 'adcd7048512e64b48da55b027577886ee5a36350', NULL, NULL, 0),
(7, NULL, NULL, 'idris', 'idris', NULL, 'adcd7048512e64b48da55b027577886ee5a36350', NULL, NULL, 0),
(18, '12348753', '1058761465', 'hasan', NULL, 2, NULL, 'produksi', 'b02968910a9d758347f975f15e514cf8.png', 1),
(19, '73453', '1057967145', 'sucipto', NULL, 2, NULL, 'Produksi', '69a0b585307d8562663d2719b5aae029.jpg', 1),
(20, '734552', '1059466057', 'boncel', NULL, 3, NULL, 'packing', '05f69478d494407d3722fff37102d571.png', 1),
(25, '4234245', '1057517401', 'ragil', NULL, 5, NULL, 'Packing', 'eb0248a0a4e0de57c9951140f320d27c.jpg', 1),
(27, '245098', '1059981273', 'najwa', NULL, 8, NULL, 'gudang', '1e84b10980d05e1a5dd3bf58f913f6eb.jpg', 1),
(28, '78053', '1054087193', 'imron', NULL, 8, NULL, 'produksi', 'b1fddf69329017f58d03ca558e462207.jpg', 1),
(29, '69805', '1058928457', 'sasha', NULL, 3, NULL, 'packing', 'c0fe04d14d00528e7ffcbcc8fcf7ac09.jpg', 1),
(30, '5803', '1059466921', 'wahyu', NULL, 8, NULL, 'Finishing', 'bf650811b6ce4ad58364a95629f09647.jpg', 1),
(31, '96798', '1059404409', 'intan', NULL, 8, NULL, 'produksi', '74ad93cadba6ee3d7b7f6caef9d93527.png', 1),
(32, '58923', '1057625257', 'rena', NULL, 8, NULL, 'produksi', 'ce4ea7616a13317a455dd81117d758db.jpg', 1),
(33, '728342', '2828485667', 'Raditya Dimas Prayoga', NULL, 8, NULL, 'Poultry', 'b4b2bb5278f5be9e4f16b382e729ad3d.jpg', 1),
(43, '060106', '1067892310', 'bagas', NULL, 8, NULL, 'produksi', '437bdcd1a6367adc2dd555c2337bc03f.jpg', 1),
(44, '301295', '2058791326', 'idris', NULL, 8, NULL, 'Packing', 'c3a53c59aece7c615ebd1d1629b96ce6.jpg', 1),
(45, '145321', '890478312', 'Wawa', NULL, 5, NULL, 'Packing', 'd20ef63dff20578d769c443b16e14a36.jpg', 1),
(46, '061783', '1267329804', 'Aisya', NULL, 8, NULL, 'Packing', 'c729f0764f946d66614839448a4e5852.jpg', 1),
(47, '673890', '2341789650', 'April', NULL, 8, NULL, 'Gudang', '35d5981f410426ef91f0030001f60961.jpeg', 1),
(48, '436782', '3909187280', 'Ayudia', NULL, 5, NULL, 'Produksi', '3a86bfebf57058a2f0af827df80c4f13.jpg', 1),
(50, '389021', '4356789209', 'Nadia', NULL, 3, NULL, 'Gudang', '656dd35fde2d25c4143bf3514d4e5bfd.jpg', 1),
(51, '525632', '534453', 'naura habibah', NULL, 5, NULL, 'Packing', NULL, 1),
(52, '238091', '2901874356', 'Herman', NULL, 2, NULL, 'Produksi', '40a9ea140bea8a1c3e28ac44fe890508.jpg', 1),
(53, '732533', '72354413', 'sinta laura', NULL, 5, NULL, 'Coloring', NULL, 1),
(54, '289367', '2354167860', 'Bambang', NULL, 2, NULL, 'Gudang', '0d1e62923884a87bc41bae80f39feedf.jpg', 1),
(55, '231689', '2378918209', 'Tika', NULL, 3, NULL, 'Packing', '0f6bd6a6fa4f1f4beac440b8820e58f6.jpg', 1),
(56, '209836', '2389098714', 'Riris santia', NULL, 5, NULL, 'Packing', '53cc785650ceae0169d31fdb14b73e3a.jpg', 1),
(57, '291104', '2908765345', 'Fitria tia', NULL, 2, NULL, 'Marketing', '187823bf39b3cc0fe75680fb7721d61e.jpg', 1),
(58, '298371', '2865390815', 'Faizz', NULL, 3, NULL, 'IT', '5533fcb5d293688aa77a03511c9b834d.jpg', 1),
(59, '278934', '2087649191', 'Rizki', NULL, 5, NULL, 'Accounting', '2cc3a5c08dfb16b765e9382e8fddc3b4.jpg', 1),
(60, '652314', '23424134', 'Robert', NULL, 5, NULL, 'Gudang Hardware', '8f444795e4a6e04a46ed1891fc207c4d.jpg', 1),
(61, '762345', '62136345', 'nurul huda', NULL, 5, NULL, 'produksi', 'be569be1bfe4c65e2418688b38728162.jpg', 1),
(62, '989723', '76323424', 'heni wiyanti', NULL, 5, NULL, 'Eksport', 'fb227f52d81e8d503246935dd99aa76b.jpg', 1),
(63, '943453', '732342441', 'Bella', NULL, 5, NULL, 'packing', '46412dd48ea64515c252f688d8ccfde3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `ID_Trans` int(11) NOT NULL,
  `TglTrans` date DEFAULT NULL,
  `JamTrans` time DEFAULT NULL,
  `ID_User` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`ID_Trans`, `TglTrans`, `JamTrans`, `ID_User`) VALUES
(2, '2022-09-15', '19:53:26', '33'),
(3, '2022-09-15', '19:53:47', '33'),
(5, '2022-09-15', '19:54:11', '33'),
(8, '2022-09-15', '19:54:55', '33'),
(9, '2022-09-15', '19:55:07', '33'),
(11, '2022-10-16', '06:25:53', '18'),
(14, '2022-10-17', '09:33:25', '20'),
(16, '2022-10-17', '09:33:29', '20'),
(17, '2022-10-17', '09:33:33', '20'),
(19, '2022-10-17', '09:33:34', '20'),
(21, '2022-10-17', '09:33:36', '20'),
(23, '2022-10-17', '09:33:37', '20'),
(25, '2022-10-17', '09:33:38', '20'),
(27, '2022-10-17', '09:33:40', '20'),
(29, '2022-10-17', '09:33:41', '20'),
(30, '2022-10-17', '09:33:45', '20'),
(32, '2022-10-17', '09:33:46', '20'),
(34, '2022-10-17', '09:33:47', '20'),
(36, '2022-10-17', '09:33:48', '20'),
(38, '2022-10-17', '09:33:49', '20'),
(40, '2022-10-17', '09:33:50', '20'),
(42, '2022-10-17', '09:33:51', '20'),
(44, '2022-10-17', '09:33:52', '20'),
(46, '2022-10-17', '09:33:53', '20'),
(48, '2022-10-17', '09:33:54', '20'),
(50, '2022-10-17', '09:33:55', '20'),
(51, '2022-10-17', '09:33:58', '20'),
(52, '2022-10-17', '09:33:59', '20'),
(53, '2022-10-17', '09:33:59', '20'),
(54, '2022-10-17', '09:34:00', '20'),
(55, '2022-10-17', '09:34:03', '20'),
(56, '2022-10-17', '09:34:05', '20'),
(57, '2022-10-17', '09:34:07', '20'),
(59, '2022-10-17', '09:34:11', '20'),
(60, '2022-10-17', '09:34:12', '20'),
(61, '2022-10-17', '09:34:12', '20'),
(62, '2022-10-17', '09:34:13', '20'),
(63, '2022-10-17', '09:34:14', '20'),
(64, '2022-10-17', '09:34:15', '20'),
(65, '2022-10-17', '09:34:15', '20'),
(66, '2022-10-17', '09:34:16', '20'),
(69, '2022-10-17', '14:41:24', '27'),
(70, '2022-10-17', '14:41:32', '18'),
(71, '2022-10-17', '14:41:35', '27'),
(72, '2022-10-17', '14:41:37', '27'),
(73, '2022-10-17', '14:41:38', '27'),
(76, '2022-10-17', '14:41:47', '20'),
(79, '2022-10-17', '14:41:57', '29'),
(80, '2022-10-17', '14:41:59', '29'),
(86, '2022-10-17', '14:42:07', '28'),
(87, '2022-10-17', '14:42:08', '28'),
(88, '2022-10-17', '14:42:10', '28'),
(89, '2022-10-17', '14:42:11', '28'),
(90, '2022-10-17', '14:42:12', '28'),
(91, '2022-10-17', '14:42:15', '28'),
(92, '2022-10-17', '14:42:16', '28'),
(93, '2022-10-17', '14:42:17', '28'),
(94, '2022-10-17', '14:42:18', '28'),
(95, '2022-10-17', '14:42:19', '28'),
(96, '2022-10-17', '14:42:20', '28'),
(97, '2022-10-17', '14:42:20', '28'),
(98, '2022-10-17', '14:42:21', '28'),
(99, '2022-10-17', '14:42:21', '28'),
(107, '2022-10-17', '14:42:32', '31'),
(108, '2022-10-17', '14:42:33', '31'),
(109, '2022-10-17', '14:42:34', '31'),
(110, '2022-10-17', '14:42:42', '32'),
(111, '2022-10-17', '14:42:43', '32'),
(112, '2022-10-17', '14:42:44', '32'),
(113, '2022-10-17', '14:42:51', '29'),
(114, '2022-10-17', '14:42:53', '29'),
(115, '2022-10-17', '14:42:54', '29'),
(116, '2022-10-17', '14:42:55', '29'),
(117, '2022-10-17', '14:42:56', '29'),
(118, '2022-10-17', '14:43:02', '29'),
(119, '2022-10-17', '14:43:03', '29'),
(120, '2022-10-17', '14:43:04', '29'),
(121, '2022-10-17', '14:43:04', '29'),
(122, '2022-10-17', '14:43:05', '29'),
(123, '2022-10-17', '14:43:05', '29'),
(124, '2022-10-17', '14:43:06', '29'),
(125, '2022-10-17', '14:43:08', '29'),
(126, '2022-10-17', '14:43:09', '29'),
(127, '2022-10-17', '14:43:10', '29'),
(128, '2022-10-17', '14:43:10', '29'),
(129, '2022-10-17', '14:43:11', '29'),
(130, '2022-10-17', '14:43:12', '29'),
(131, '2022-10-17', '14:43:13', '29'),
(132, '2022-10-17', '14:43:13', '29'),
(133, '2022-10-17', '14:43:14', '28'),
(134, '2022-10-17', '14:43:15', '29'),
(135, '2022-10-17', '14:43:16', '28'),
(136, '2022-10-17', '14:43:17', '29'),
(137, '2022-10-17', '14:43:19', '32'),
(138, '2022-10-17', '14:43:20', '32'),
(139, '2022-10-17', '14:43:21', '31'),
(140, '2022-10-17', '14:43:21', '31'),
(141, '2022-10-17', '14:43:22', '31'),
(148, '2022-10-17', '14:44:07', '20'),
(149, '2022-10-17', '14:44:11', '31'),
(150, '2022-10-17', '14:44:15', '31'),
(151, '2022-10-17', '14:44:15', '31'),
(152, '2022-10-17', '14:44:16', '31'),
(153, '2022-10-17', '14:44:18', '31'),
(154, '2022-10-17', '14:44:19', '31'),
(155, '2022-10-17', '14:44:20', '31'),
(156, '2022-10-17', '14:44:25', '31'),
(157, '2022-10-17', '14:44:26', '31'),
(158, '2022-10-17', '14:44:27', '31'),
(159, '2022-10-17', '14:44:27', '31'),
(160, '2022-10-17', '14:44:28', '31'),
(161, '2022-10-17', '14:44:31', '32'),
(162, '2022-10-17', '14:44:32', '32'),
(163, '2022-10-17', '14:44:33', '32'),
(164, '2022-10-17', '14:44:35', '32'),
(165, '2022-10-17', '14:44:37', '32'),
(166, '2022-10-17', '14:44:38', '32'),
(167, '2022-10-17', '14:44:41', '32'),
(168, '2022-10-17', '14:44:42', '32'),
(169, '2022-10-17', '14:44:46', '31'),
(170, '2022-10-17', '14:44:46', '31'),
(172, '2022-10-17', '14:44:55', '28'),
(173, '2022-10-17', '14:44:57', '28'),
(174, '2022-10-17', '14:45:00', '29'),
(176, '2022-10-17', '14:45:07', '18'),
(177, '2022-10-17', '14:45:12', '18'),
(178, '2022-10-17', '14:45:19', '18'),
(179, '2022-10-17', '14:45:22', '18'),
(180, '2022-10-17', '14:45:24', '18'),
(181, '2022-10-17', '14:45:25', '18'),
(182, '2022-10-17', '14:45:30', '18'),
(183, '2022-10-17', '14:45:31', '18'),
(184, '2022-10-17', '14:45:32', '18'),
(185, '2022-10-17', '14:45:35', '18'),
(186, '2022-10-17', '14:45:36', '18'),
(187, '2022-10-17', '14:45:37', '18'),
(192, '2022-10-17', '14:45:50', '31'),
(193, '2022-10-17', '14:45:51', '31'),
(194, '2022-10-17', '14:45:52', '31'),
(195, '2022-10-17', '14:45:54', '28'),
(196, '2022-10-17', '14:45:56', '20'),
(197, '2022-10-17', '14:45:57', '20'),
(198, '2022-10-17', '14:46:01', '29'),
(199, '2022-10-17', '14:46:02', '29'),
(200, '2022-10-17', '14:46:04', '29'),
(215, '2022-10-17', '14:46:27', '18'),
(216, '2022-10-17', '14:46:28', '18'),
(217, '2022-10-17', '14:46:29', '18'),
(218, '2022-10-17', '14:46:30', '18'),
(219, '2022-10-17', '14:46:31', '18'),
(220, '2022-10-17', '14:46:31', '18'),
(221, '2022-10-17', '14:46:32', '18'),
(222, '2022-10-17', '14:46:33', '18'),
(223, '2022-10-17', '14:46:34', '18'),
(224, '2022-10-17', '14:46:35', '18'),
(225, '2022-10-17', '14:46:37', '18'),
(226, '2022-10-17', '14:46:40', '18'),
(227, '2022-10-17', '14:46:41', '18'),
(228, '2022-10-17', '14:46:41', '18'),
(229, '2022-10-17', '14:46:48', '27'),
(230, '2022-10-17', '14:46:49', '27'),
(231, '2022-10-17', '14:46:50', '27'),
(232, '2022-10-17', '14:46:51', '27'),
(233, '2022-10-17', '14:46:52', '27'),
(234, '2022-10-17', '14:46:55', '27'),
(235, '2022-10-17', '14:46:57', '27'),
(236, '2022-10-17', '14:46:59', '27'),
(237, '2022-10-17', '14:47:00', '27'),
(238, '2022-10-17', '14:47:01', '27'),
(239, '2022-10-17', '14:47:02', '27'),
(240, '2022-10-17', '14:47:03', '27'),
(241, '2022-10-17', '14:47:06', '27'),
(242, '2022-10-17', '14:47:07', '27'),
(243, '2022-10-17', '14:47:08', '27'),
(244, '2022-10-17', '14:47:08', '27'),
(245, '2022-10-17', '14:47:09', '27'),
(246, '2022-10-17', '14:47:10', '27'),
(247, '2022-10-17', '14:47:11', '27'),
(248, '2022-10-17', '14:47:14', '27'),
(249, '2022-10-17', '14:47:15', '27'),
(250, '2022-10-17', '14:47:16', '27'),
(251, '2022-10-17', '14:47:18', '27'),
(252, '2022-10-17', '14:47:19', '27'),
(253, '2022-10-17', '14:47:20', '27'),
(254, '2022-10-17', '14:47:21', '27'),
(255, '2022-10-17', '14:47:24', '27'),
(256, '2022-10-17', '14:47:24', '27'),
(257, '2022-10-17', '14:47:25', '27'),
(258, '2022-10-17', '14:47:26', '27'),
(259, '2022-10-17', '14:47:29', '27'),
(260, '2022-10-17', '14:47:30', '27'),
(261, '2022-10-17', '14:47:32', '28'),
(262, '2022-10-17', '14:47:33', '28'),
(263, '2022-10-17', '14:47:35', '28'),
(264, '2022-10-17', '14:47:35', '28'),
(265, '2022-10-17', '14:47:37', '28'),
(266, '2022-10-17', '14:47:38', '28'),
(267, '2022-10-17', '14:47:39', '28'),
(268, '2022-10-17', '14:47:40', '28'),
(269, '2022-10-17', '14:47:41', '28'),
(270, '2022-10-17', '14:47:42', '28'),
(271, '2022-10-17', '14:47:43', '28'),
(272, '2022-10-17', '14:47:44', '28'),
(273, '2022-10-17', '14:47:45', '28'),
(274, '2022-10-17', '14:47:47', '28'),
(275, '2022-10-17', '14:47:51', '32'),
(276, '2022-10-17', '14:47:51', '32'),
(277, '2022-10-17', '14:47:52', '32'),
(278, '2022-10-17', '14:47:57', '32'),
(279, '2022-10-17', '14:47:59', '32'),
(280, '2022-10-17', '14:47:59', '32'),
(281, '2022-10-17', '14:48:00', '32'),
(282, '2022-10-17', '14:48:01', '32'),
(283, '2022-10-17', '14:48:03', '32'),
(284, '2022-10-17', '14:48:04', '32'),
(285, '2022-10-17', '14:48:05', '32'),
(286, '2022-10-17', '14:48:05', '32'),
(287, '2022-10-17', '14:48:07', '32'),
(288, '2022-10-17', '14:48:09', '32'),
(289, '2022-10-17', '14:48:10', '32'),
(290, '2022-10-17', '14:48:11', '32'),
(291, '2022-10-17', '14:48:14', '32'),
(322, '2022-10-17', '14:48:38', '32'),
(323, '2022-10-17', '14:48:39', '32'),
(324, '2022-10-17', '14:48:41', '32'),
(325, '2022-10-17', '14:48:41', '32'),
(326, '2022-10-17', '14:48:42', '32'),
(327, '2022-10-17', '14:48:43', '32'),
(328, '2022-10-17', '14:48:43', '32'),
(329, '2022-10-17', '14:48:45', '32'),
(330, '2022-10-17', '14:48:46', '32'),
(331, '2022-10-17', '14:48:47', '32'),
(332, '2022-10-17', '14:48:48', '32'),
(333, '2022-10-17', '14:48:49', '32'),
(334, '2022-10-17', '14:48:49', '32'),
(335, '2022-10-17', '14:48:50', '32'),
(336, '2022-10-17', '14:48:53', '20'),
(337, '2022-10-17', '14:48:54', '20'),
(338, '2022-10-17', '14:48:54', '20'),
(339, '2022-10-17', '14:48:56', '20'),
(340, '2022-10-17', '14:48:57', '20'),
(341, '2022-10-17', '14:49:00', '31'),
(342, '2022-10-17', '14:49:00', '31'),
(343, '2022-10-17', '14:49:01', '31'),
(344, '2022-10-17', '14:49:02', '31'),
(345, '2022-10-17', '14:49:02', '31'),
(346, '2022-10-17', '14:49:03', '31'),
(347, '2022-10-17', '14:49:04', '31'),
(348, '2022-10-17', '14:49:04', '31'),
(349, '2022-10-17', '14:49:05', '31'),
(350, '2022-10-17', '14:49:06', '31'),
(351, '2022-10-17', '14:49:06', '31'),
(352, '2022-10-17', '14:49:07', '31'),
(353, '2022-10-17', '14:49:07', '31'),
(354, '2022-10-17', '14:49:08', '31'),
(355, '2022-10-17', '14:49:09', '31'),
(356, '2022-10-17', '14:49:10', '31'),
(357, '2022-10-17', '14:49:11', '31'),
(380, '2022-10-17', '14:52:13', '20'),
(381, '2022-10-17', '14:52:22', '20'),
(382, '2022-10-17', '14:52:23', '20'),
(383, '2022-10-17', '14:52:24', '20'),
(384, '2022-10-17', '14:52:25', '20'),
(385, '2022-10-17', '14:52:26', '20'),
(387, '2022-10-17', '14:52:28', '20'),
(388, '2022-10-17', '14:58:58', '29'),
(389, '2022-10-17', '14:59:06', '28'),
(391, '2022-10-17', '14:59:10', '31'),
(392, '2022-10-17', '14:59:13', '27'),
(394, '2022-10-17', '14:59:17', '32'),
(396, '2022-10-17', '14:59:22', '18'),
(397, '2022-10-17', '14:59:22', '20'),
(398, '2022-10-17', '14:59:24', '18'),
(400, '2022-10-17', '14:59:29', '27'),
(401, '2022-10-17', '14:59:32', '20'),
(403, '2022-10-17', '14:59:36', '32'),
(404, '2022-10-17', '14:59:37', '31'),
(406, '2022-10-17', '14:59:41', '18'),
(407, '2022-10-17', '14:59:45', '28'),
(408, '2022-10-17', '14:59:45', '29'),
(409, '2022-10-17', '14:59:48', '29'),
(410, '2022-10-17', '14:59:49', '28'),
(411, '2022-10-17', '15:03:10', '28'),
(412, '2022-10-17', '15:03:11', '29'),
(413, '2022-10-17', '15:03:12', '28'),
(414, '2022-10-17', '15:03:13', '29'),
(415, '2022-10-17', '15:03:36', '31'),
(417, '2022-10-17', '16:15:51', '18'),
(418, '2022-10-17', '16:15:54', '27'),
(420, '2022-10-17', '16:16:00', '32'),
(421, '2022-10-17', '16:16:03', '32'),
(422, '2022-10-17', '16:16:05', '32'),
(424, '2022-10-17', '16:17:25', '20'),
(425, '2022-10-17', '16:17:26', '29'),
(426, '2022-10-17', '16:17:27', '29'),
(427, '2022-10-17', '16:17:27', '20'),
(429, '2022-10-17', '16:17:30', '29'),
(430, '2022-10-17', '16:17:30', '31'),
(431, '2022-10-17', '16:17:31', '32'),
(432, '2022-10-17', '16:17:32', '31'),
(433, '2022-10-17', '16:17:32', '27'),
(437, '2022-10-17', '16:17:35', '32'),
(438, '2022-10-17', '16:17:36', '27'),
(441, '2022-10-17', '16:17:39', '31'),
(442, '2022-10-17', '16:17:39', '32'),
(448, '2022-10-17', '16:29:00', '33'),
(449, '2022-10-17', '16:31:00', '30'),
(450, '2022-10-17', '16:31:03', '30'),
(451, '2022-10-17', '16:31:06', '33'),
(452, '2022-10-17', '16:31:08', '33'),
(453, '2022-10-17', '16:31:10', '25'),
(454, '2022-10-17', '16:31:13', '19'),
(455, '2022-10-17', '16:31:16', '30'),
(456, '2022-10-17', '16:31:20', '33'),
(457, '2022-10-31', '10:43:40', '63'),
(458, '2022-10-31', '10:49:35', '61'),
(459, '2022-10-31', '10:49:44', '58'),
(460, '2022-10-31', '10:49:56', '60'),
(461, '2022-10-31', '10:50:10', '59'),
(462, '2022-10-31', '10:50:32', '60'),
(463, '2022-10-31', '10:50:40', '56'),
(464, '2022-10-31', '10:50:43', '61'),
(465, '2022-10-31', '10:50:59', '60'),
(466, '2022-10-31', '10:51:04', '58'),
(467, '2022-10-31', '10:51:18', '61'),
(468, '2022-10-31', '10:51:30', '60'),
(469, '2022-10-31', '10:51:31', '63'),
(470, '2022-10-31', '10:51:33', '59'),
(471, '2022-10-31', '10:51:44', '61'),
(472, '2022-10-31', '10:51:47', '56'),
(473, '2022-10-31', '10:51:52', '61'),
(474, '2022-10-31', '10:51:53', '56'),
(475, '2022-10-31', '10:52:19', '57'),
(476, '2022-10-31', '10:52:26', '56'),
(477, '2022-10-31', '10:52:40', '63'),
(478, '2022-10-31', '10:52:50', '61'),
(479, '2022-10-31', '10:52:58', '56'),
(480, '2022-10-31', '10:53:03', '58'),
(481, '2022-10-31', '11:21:25', '58'),
(482, '2022-10-31', '11:21:36', '55'),
(483, '2022-10-31', '11:21:38', '58'),
(484, '2022-10-31', '11:21:41', '62'),
(485, '2022-10-31', '11:21:43', '59'),
(486, '2022-10-31', '11:21:46', '56'),
(487, '2022-10-31', '11:21:48', '57'),
(488, '2022-10-31', '11:21:51', '60'),
(489, '2022-10-31', '11:21:53', '63'),
(490, '2022-10-31', '11:21:59', '56'),
(491, '2022-10-31', '11:22:01', '61'),
(492, '2022-10-31', '11:22:03', '63'),
(493, '2022-10-31', '11:22:08', '60'),
(494, '2022-10-31', '11:22:09', '63'),
(495, '2022-10-31', '11:22:16', '58'),
(496, '2022-10-31', '11:22:18', '62'),
(497, '2022-10-31', '11:22:21', '55'),
(498, '2022-10-31', '11:22:22', '62'),
(499, '2022-10-31', '11:22:24', '55'),
(500, '2022-10-31', '11:22:25', '62'),
(501, '2022-10-31', '11:22:27', '61'),
(502, '2022-10-31', '11:22:29', '56'),
(503, '2022-10-31', '11:22:30', '58'),
(504, '2022-10-31', '11:22:32', '57'),
(505, '2022-10-31', '11:22:34', '60'),
(506, '2022-10-31', '11:22:36', '63'),
(507, '2022-10-31', '11:22:38', '61'),
(508, '2022-10-31', '11:22:39', '58'),
(509, '2022-10-31', '11:22:40', '62'),
(510, '2022-10-31', '11:22:42', '55'),
(511, '2022-10-31', '11:22:47', '58'),
(512, '2022-10-31', '11:22:50', '56'),
(513, '2022-10-31', '11:22:52', '58'),
(514, '2022-10-31', '11:22:54', '55'),
(515, '2022-10-31', '11:22:57', '60'),
(516, '2022-10-31', '11:22:58', '58'),
(517, '2022-10-31', '11:23:05', '62'),
(518, '2022-10-31', '11:23:07', '55'),
(519, '2022-10-31', '11:23:21', '61'),
(520, '2022-10-31', '11:23:22', '59'),
(521, '2022-10-31', '11:23:24', '63'),
(522, '2022-10-31', '11:23:25', '59'),
(523, '2022-10-31', '11:23:36', '57'),
(524, '2022-10-31', '11:23:42', '58'),
(525, '2022-10-31', '11:23:44', '62'),
(526, '2022-10-31', '11:23:46', '55'),
(527, '2022-10-31', '11:23:48', '61'),
(528, '2022-10-31', '11:23:50', '59'),
(529, '2022-10-31', '11:23:52', '60'),
(530, '2022-10-31', '11:23:54', '63'),
(531, '2022-10-31', '11:23:55', '57'),
(532, '2022-10-31', '11:23:57', '56'),
(533, '2022-10-31', '11:23:58', '55'),
(534, '2022-10-31', '11:23:59', '58'),
(535, '2022-10-31', '11:24:01', '61'),
(536, '2022-10-31', '11:24:02', '59'),
(537, '2022-10-31', '11:24:04', '62'),
(538, '2022-10-31', '11:24:06', '59'),
(539, '2022-10-31', '11:24:07', '62'),
(540, '2022-10-31', '11:24:09', '59'),
(541, '2022-10-31', '11:24:13', '55'),
(542, '2022-10-31', '11:24:23', '61'),
(543, '2022-10-31', '11:24:27', '56'),
(544, '2022-10-31', '11:24:28', '55'),
(545, '2022-10-31', '11:24:30', '58'),
(546, '2022-10-31', '11:24:31', '62'),
(547, '2022-10-31', '11:24:34', '63'),
(548, '2022-10-31', '11:24:46', '59'),
(549, '2022-10-31', '11:24:48', '61'),
(550, '2022-10-31', '11:24:49', '59'),
(551, '2022-10-31', '11:24:50', '61'),
(552, '2022-10-31', '11:24:53', '59'),
(553, '2022-10-31', '11:25:00', '56'),
(554, '2022-10-31', '11:25:02', '55'),
(555, '2022-10-31', '11:25:10', '59'),
(556, '2022-10-31', '11:25:11', '61'),
(557, '2022-10-31', '11:25:12', '56'),
(558, '2022-10-31', '11:25:13', '61'),
(559, '2022-10-31', '11:25:14', '59'),
(560, '2022-10-31', '11:25:16', '61'),
(561, '2022-10-31', '11:25:17', '56'),
(562, '2022-10-31', '11:25:19', '63'),
(563, '2022-10-31', '11:25:21', '60'),
(564, '2022-10-31', '11:25:22', '62'),
(565, '2022-10-31', '11:25:25', '58'),
(566, '2022-10-31', '11:25:27', '55'),
(567, '2022-10-31', '11:25:28', '57'),
(568, '2022-10-31', '11:25:30', '56'),
(569, '2022-10-31', '11:25:33', '57'),
(570, '2022-10-31', '11:25:34', '60'),
(571, '2022-10-31', '11:25:35', '57'),
(572, '2022-10-31', '11:25:36', '60'),
(573, '2022-10-31', '11:25:38', '57'),
(574, '2022-10-31', '11:25:39', '60'),
(575, '2022-10-31', '11:25:41', '57'),
(576, '2022-10-31', '11:25:42', '60'),
(577, '2022-10-31', '11:25:45', '57'),
(578, '2022-10-31', '11:25:47', '60'),
(579, '2022-10-31', '11:25:52', '57'),
(580, '2022-10-31', '11:26:22', '59'),
(581, '2022-10-31', '11:26:24', '57'),
(582, '2022-10-31', '11:26:26', '61'),
(583, '2022-10-31', '11:26:36', '56'),
(584, '2022-10-31', '11:26:37', '61'),
(585, '2022-10-31', '11:26:40', '56'),
(586, '2022-10-31', '11:26:51', '61'),
(587, '2022-10-31', '11:26:57', '56'),
(588, '2022-10-31', '11:26:58', '61'),
(589, '2022-10-31', '11:26:59', '56'),
(590, '2022-10-31', '11:27:00', '61'),
(591, '2022-10-31', '11:27:01', '56'),
(592, '2022-10-31', '11:27:03', '61'),
(593, '2022-10-31', '11:27:05', '56'),
(594, '2022-10-31', '11:27:06', '61'),
(595, '2022-10-31', '11:27:07', '56'),
(596, '2022-10-31', '11:27:08', '61'),
(597, '2022-10-31', '11:27:09', '56'),
(598, '2022-10-31', '11:27:10', '61'),
(599, '2022-10-31', '11:27:16', '56'),
(600, '2022-10-31', '11:27:17', '61'),
(601, '2022-10-31', '11:27:18', '56'),
(602, '2022-10-31', '11:27:19', '61'),
(603, '2022-10-31', '11:27:20', '56'),
(604, '2022-10-31', '11:27:22', '61'),
(605, '2022-10-31', '11:27:23', '56'),
(606, '2022-10-31', '11:27:24', '61'),
(607, '2022-10-31', '11:27:28', '56'),
(608, '2022-10-31', '11:27:29', '61'),
(609, '2022-10-31', '11:27:48', '60'),
(610, '2022-10-31', '11:27:53', '57'),
(611, '2022-10-31', '11:27:56', '56'),
(612, '2022-10-31', '11:27:59', '58'),
(613, '2022-10-31', '11:28:01', '62'),
(614, '2022-10-31', '11:28:04', '61'),
(615, '2022-10-31', '11:28:07', '55'),
(616, '2022-10-31', '11:28:11', '59'),
(617, '2022-10-31', '11:28:44', '56'),
(618, '2022-10-31', '11:28:46', '61'),
(619, '2022-10-31', '11:28:52', '63'),
(620, '2022-10-31', '11:28:54', '60'),
(621, '2022-10-31', '11:30:00', '60'),
(622, '2022-10-31', '11:30:01', '63');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_jabatan`
--
ALTER TABLE `m_jabatan`
  ADD PRIMARY KEY (`ID_Jabatan`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`ID_User`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`ID_Trans`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_jabatan`
--
ALTER TABLE `m_jabatan`
  MODIFY `ID_Jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `ID_Trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=623;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
