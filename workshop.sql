-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2021 at 03:53 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `jkt`
--

CREATE TABLE `jkt` (
  `jktid` varchar(200) NOT NULL,
  `password` varchar(256) NOT NULL,
  `cookie` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jkt`
--

INSERT INTO `jkt` (`jktid`, `password`, `cookie`) VALUES
('jktadmin1', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('jktadmin2', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('jktadmin3', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pbt`
--

CREATE TABLE `pbt` (
  `pbtid` varchar(200) CHARACTER SET latin1 NOT NULL,
  `name` varchar(200) NOT NULL,
  `state` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `cookie` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pbt`
--

INSERT INTO `pbt` (`pbtid`, `name`, `state`, `phone`, `password`, `cookie`) VALUES
('BAUDC', 'Majlis Daerah Bau', 'Sarawak', '082-763129', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('BDA', 'Lembaga Kemajuan Bintulu (Perbandaran)', 'Sarawak', '086-332011', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('DBKK', 'Dewan Bandaraya Kota Kinabalu', 'Sabah', '088-521800', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('DBKL', 'Dewan Bandaraya Kuala Lumpur', 'Wilayah Persekutuan', '03-2617 9000', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('DBKU', 'Dewan Bandaraya Kuching Utara', 'Sarawak', '082-446688', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('GERIK', 'Majlis Daerah Gerik', 'Perak', '05-7911686', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('LBK', 'Lembaga Bandaran Kudat', 'Sabah', '088-624600', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MBAS', 'Majlis Bandaraya Alor Setar', 'Kedah', '04-7332499', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MBI', 'Majlis Bandaraya Ipoh', 'Perak', '05-2083333', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MBIP', 'Majlis Bandaraya Iskandar Puteri', 'Johor', '07-5555000', 'P7B5sPN4aZfMdZ4zoLaO4Q==', 'c094REhmdUJiU1ZUZ25jemQyZ0FiSTdtUU15YUxPRUczQm10RnNqaVk3TUQ5eHNCdDYyVjlhdTVjVXdXMGpvTDo6iH5OaCgvgaNlhl7wJJ7ETQ=='),
('MBJB', 'Majlis Bandaraya Johor Bahru', 'Johor', '07-2282525', 'P7B5sPN4aZfMdZ4zoLaO4Q==', 'cytVT3JhMU9UMkVpYXIvN0lFMVRhSkk2eFloM0xJWDVOcG9iaDVXczNSTT06OhcncsCKm/BVBPGoNEg7Vdo='),
('MBKS', 'Majlis Bandaraya Kuching Selatan', 'Sarawak', '082-242311', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MBKT', 'Majlis Bandaraya Kuala Terengganu', 'Terengganu', '09-6261111', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MBM', 'Majlis Bandaraya Miri', 'Sarawak', '085 - 433 501', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MBMB', 'Majlis Bandaraya Melaka Bersejarah', 'Melaka', '06-2326411', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MBPG', 'Majlis Bandaraya Pasir Gudang', 'Johor', '07-2513720', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MBPJ', 'Majlis Bandaraya Petaling Jaya', 'Selangor', '03-79563544', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MBPP', 'Majlis Bandaraya Pulau Pinang', 'Pulau Pinang', '04-2592020', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MBSA', 'Majlis Bandaraya Shah Alam', 'Selangor', '03-55105133', 'P7B5sPN4aZfMdZ4zoLaO4Q==', 'WXkyaHB1WWZHdERJM0xzQ3k0UithaE8zeXd5R0ZMc2o2QVhCOG9KTVUvdz06Oh3oIyNOWLSxPjYurdL3VZU='),
('MBSJ', 'Majlis Bandaraya Subang Jaya', 'Selangor', '03-53676546', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MBSNS', 'Majlis Bandaraya Seremban', 'Negeri Sembilan', '06-7654444', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MBSP', 'Majlis Bandaraya Seberang Perai', 'Pulau Pinang', '04 - 549 7555', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDBACHOK', 'Majlis Daerah Bachok', 'Kelantan', '09-7788524', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDBALING', 'Majlis Daerah Baling', 'Kedah', '04-4701800', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDBB', 'Majlis Daerah Bandar Baharu', 'Kedah', '04-4077264', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDBEAUFORT', 'Majlis Daerah Beaufort', 'Sabah', '087-211533', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDBELURAN', 'Majlis Daerah Beluran', 'Sabah', '089-511272', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDBERA', 'Majlis Daerah Bera', 'Pahang', '09-2501700', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDBESUT', 'Majlis Daerah Besut', 'Terengganu', '09 - 695 6388', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDBETONG', 'Majlis Daerah Betong', 'Sarawak', '083- 472 701', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDBG', 'Majlis Daerah Batu Gajah', 'Perak', '05-3632020', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDCH', 'Majlis Daerah Cameron Highlands', 'Pahang', '05-4911455', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDDABONG', 'Majlis Daerah Dabong', 'Kelantan', '09-9663345', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDDM', 'Majlis Daerah Dalat & Mukah', 'Sarawak', '084- 871 632', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDGM', 'Majlis Daerah Gua Musang', 'Kelantan', '09-9120235', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDHS', 'Majlis Daerah Hulu Selangor', 'Selangor', '03-60641331', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDHT', 'Majlis Daerah Hulu Terengganu', 'Terengganu', '09-6811466', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDJELEBU', 'Majlis Daerah Jelebu', 'Negeri Sembilan', '06-6136479', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDJELI', 'Majlis Daerah Jeli', 'Kelantan', '09-9440023', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDJERANTUT', 'Majlis Daerah Jerantut', 'Pahang', '09-2662205', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDKAMPAR', 'Majlis Daerah Kampar', 'Perak', '05 - 467 1020', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDKANOWIT', 'Majlis Daerah Kanowit', 'Sarawak', '084-752093', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDKAPIT', 'Majlis Daerah Kapit', 'Sarawak', '084-796266', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDKB', 'Majlis Daerah Kota Belud', 'Sabah', '088-976529', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDKBTGN', 'Majlis Daerah Kinabatangan', 'Sabah', '089-560101', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDKENINGAU', 'Majlis Daerah Keningau', 'Sabah', '087-3411152', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDKERIAN', 'Majlis Daerah Kerian', 'Perak', '05-7161228', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDKETEREH', 'Majlis Daerah Ketereh', 'Kelantan', '09-7886112', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDKK', 'Majlis Daerah Kuala Krai', 'Kelantan', '09-9666121 ', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDKM', 'Majlis Daerah Kota Marudu', 'Sabah', '088-661163', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDKP', 'Majlis Daerah Kuala Pilah', 'Negeri Sembilan ', '06-4814025', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDKPENYU', 'Majlis Daerah Kuala Penyu', 'Sabah', '087-884248', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDKS', 'Majlis Daerah Kuala Selangor', 'Selangor', '03-32891439', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDKT', 'Majlis Daerah Kota Tinggi', 'Johor', '07-8831004', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDKUNAK', 'Majlis Daerah Kunak', 'Sabah', '089-851201', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDLA', 'Majlis Daerah Lubok Antu', 'Sarawak', '083-563015', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDLABIS', 'Majlis Daerah Labis', 'Johor', '07-9251781', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDLAWAS', 'Majlis Daerah Lawas', 'Sarawak', '085-284001', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDLBS', 'Majlis Daerah Luar Bandar Sibu', 'Sarawak', '084-336077', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDLD', 'Majlis Daerah Lahad Datu', 'Sabah', '089-881501', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDLG', 'Majlis Daerah Lenggong', 'Perak', '05-7677207', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDLIMBANG', 'Majlis Daerah Limbang', 'Sarawak', '085 - 211 055', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDLIPIS', 'Majlis Daerah Lipis', 'Pahang', '09-3121352', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDLUNDU', 'Majlis Daerah Lundu', 'Sarawak', '082-735501', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDM', 'Majlis Daerah Marudi', 'Sarawak', '085-755755', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDMACHANG', 'Majlis Daerah Machang', 'Kelantan', '09-9751076', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDMARAN', 'Majlis Daerah Maran', 'Pahang', '09-4771411', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDMARANG', 'Majlis Daerah Marang', 'Terengganu', '09-61823266', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDMD', 'Majlis Daerah Matu & Daro', 'Sarawak', '084-832233', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDMERSING', 'Majlis Daerah Mersing', 'Johor', '07-7981818', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDMJ', 'Majlis Daerah Maradong & Julau', 'Sarawak', '084-693288', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDN', 'Majlis Daerah Nabawan', 'Sabah', '087-366194', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDPAPAR', 'Majlis Daerah Papar', 'Sabah', '088-911094', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDPEKAN', 'Majlis Daerah Pekan', 'Pahang', '09-4211077', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDPENDANG', 'Majlis Daerah Pendang', 'Kedah', '04-7596077', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDPH', 'Majlis Daerah Pengkalan Hulu', 'Perak', '04-4778148', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDPITAS', 'Majlis Daerah Pitas', 'Sabah', '088-622163', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDPM', 'Majlis Daerah Pasir Mas', 'Kelantan', '09-7916666', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDPONTIAN', 'Majlis Daerah Pontian', 'Johor', '07-6871442', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDPP', 'Majlis Daerah Pasir Puteh', 'Kelantan', '09-7866011', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDPPG', 'Majlis Daerah Penampang', 'Sabah', '088-711712', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDPT', 'Majlis Daerah Perak Tengah', 'Perak', '05-3712088', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDPTERAP', 'Majlis Daerah Padang Terap', 'Kedah', '04-7866328', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDPUTATAN', 'Majlis Daerah Putatan', 'Sabah', '088-772823', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDR', 'Majlis Daerah Rembau', 'Negeri Sembilan', '06-6851144', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDRANAU', 'Majlis Daerah Ranau', 'Sabah', '088-879031', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDRAUB', 'Majlis Daerah Raub', 'Pahang', '09-3551175', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDROMPIN', 'Majlis Daerah Rompin', 'Pahang', '09-4146677', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDSA', 'Majlis Daerah Sri Aman', 'Sarawak', '083-322066', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDSaratok', 'Majlis Daerah Saratok', 'Sarawak', '083-436104', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDSarikei', 'Majlis Daerah Sarikei', 'Sarawak', '084-651201', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDSB', 'Majlis Daerah Sabak Bernam', 'Selangor', '03-32241655', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDSELAMA', 'Majlis Daerah Selama', 'Perak', '05-8394201', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDSemporna', 'Majlis Daerah Semporna', 'Sabah', '089-785350', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDSerian', 'Majlis Daerah Serian', 'Sarawak', '082-874154', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDSETIU', 'Majlis Daerah Setiu', 'Terengganu', '09-6099377', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDSIK', 'Majlis Daerah Sik', 'Kedah', '04-4676000', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDSimunjan', 'Majlis Daerah Simunjan', 'Sarawak', '082-803610', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDSipitang', 'Majlis Daerah Sipitang', 'Sabah', '087-821701', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDSR', 'Majlis Daerah Simpang Renggam', 'Johor', '07-7551300', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDSubis', 'Majlis Daerah Subis', 'Sarawak', '085-719018', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDTAMBUNAN', 'Majlis Daerah Tambunan', 'Sabah', '087-770126', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDTAMPIN\r\n', 'Majlis Daerah Tampin', 'Negeri Sembilan', '06-4411601', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDTANGKAK', 'Majlis Daerah Tangkak', 'Johor', '06-9781261', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDTAPAH', 'Majlis Daerah Tapah', 'Perak', '05-4011326', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDTENOM', 'Majlis Daerah Tenom', 'Sabah', '087-735553', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDTM', 'Majlis Daerah Tanjong Malim', 'Perak', '05-4563410', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDTMERAH', 'Majlis Daerah Tanah Merah', 'Kelantan', '09-9556026', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDTONGOD', 'Majlis Daerah Tongod', 'Sabah', '087-748828', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDTUARAN', 'Majlis Daerah Tuaran', 'Sabah', '088-788303', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDTUMPAT', 'Majlis Daerah Tumpat', 'Kelantan', '09-7257285', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDY', 'Majlis Daerah Yan', 'Kedah', '04-4655745', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MDYP', 'Majlis Daerah Yong Peng', 'Johor', '07-4671276', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPAG', 'Majlis Perbandaran Alor Gajah', 'Melaka', '06-5562575', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPAJ', 'Majlis Perbandaran Ampang Jaya', 'Selangor', '03-42968000', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPBENTONG', 'Majlis Perbandaran Bentong', 'Pahang', '09-2221148', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPBP', 'Majlis Perbandaran Batu Pahat', 'Johor', '07-4341045', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPDUNGUN', 'Majlis Perbandaran Dungun', 'Terengganu', '09-8481931', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPHTJ', 'Majlis Perbandaran Hang Tuah Jaya', 'Melaka', '06-2323741', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPJ', 'Majlis Perbandaran Jasin', 'Melaka', '06-5291245', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPJL', 'Majlis Perbandaran Jempol', 'Negeri Sembilan', '06-4581233', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPK', 'Majlis Perbandaran Kuantan', 'Pahang', '09-5121666', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPKANGAR\r\n', 'Majlis Perbandaran Kangar', 'Perlis', '04-9762188', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPKB', 'Majlis Perbandaran Kota Bharu Bandaraya Islam', 'Kelantan', '09-7483209', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPKEMAMAN', 'Majlis Perbandaran Kemaman', 'Terengganu', '09-8597777', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPKJ', 'Majlis Perbandaran Kajang', 'Selangor', '03-87370112', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPKK', 'Majlis Perbandaran Kulim', 'Kedah', '04-4325225', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPKKPK', 'Majlis Perbandaran Kuala Kangsar', 'Perak', '05-7763199', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPKL', 'Majlis Perbandaran Kuala Langat', 'Selangor', '03-31872825', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPKLANG', 'Majlis Perbandaran Klang', 'Selangor', '03-33716044', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPKLUANG', 'Majlis Perbandaran Kluang', 'Johor', '07-7771401', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPKPASU', 'Majlis Perbandaran Kubang Pasu', 'Kedah', '04-9183300', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPKS', 'Majlis Perbandaran Kota Samarahan', 'Sarawak', '082-671023\r\n', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPKULAI', 'Majlis Perbandaran Kulai', 'Johor', '07- 6631511', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPLBP', 'Majlis Perbandaran Langkawi Bandaraya Pelancongan', 'Kedah', '04-9666590', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPM', 'Majlis Perbandaran Manjung', 'Perak', '05-6898800', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPMUAR', 'Majlis Perbandaran Muar', 'Johor', '06-9521204', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPPadawan', 'Majlis Perbandaran Padawan', 'Sarawak', '082-615566\r\n', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPPD', 'Majlis Perbandaran Port Dickson', 'Negeri Sembilan', '06-6473904', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPPengerang', 'Majlis Perbandaran Pengerang', 'Johor', '07-8862692', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPS', 'Majlis Perbandaran Selayang', 'Selangor', '03 - 61265800', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPSEGAMAT', 'Majlis Perbandaran Segamat', 'Johor', '07-9314455', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPSEPANG', 'Majlis Perbandaran Sepang', 'Selangor', '03-83190200', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPSNDKN', 'Majlis Perbandaran Sandakan', 'Sabah', '089 - 275 400', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPSPK', 'Majlis Perbandaran Sungai Petani', 'Kedah', '04-4296666', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPT', 'Majlis Perbandaran Temerloh', 'Pahang', '09-2901777', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPTAIPING', 'Majlis Perbandaran Taiping', 'Perak', '05-8080777', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPTAWAU', 'Majlis Perbandaran Tawau', 'Sabah', '080 701601', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('MPTI', 'Majlis Perbandaran Teluk Intan', 'Perak', '05-6221299', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL),
('SMC', 'Majlis Perbandaran Sibu', 'Sarawak', '084-333411', 'P7B5sPN4aZfMdZ4zoLaO4Q==', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `category` varchar(200) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `video` varchar(200) DEFAULT NULL,
  `text` varchar(200) NOT NULL,
  `latitude` varchar(200) NOT NULL,
  `longitude` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `closed_timestamp` timestamp NULL DEFAULT NULL,
  `pbtid` varchar(200) DEFAULT NULL,
  `pbtcomment` varchar(200) DEFAULT NULL,
  `pbtimage` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts_users_acknowledgement`
--

CREATE TABLE `posts_users_acknowledgement` (
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ic` varchar(20) NOT NULL,
  `telephone` int(15) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `cookie` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `email`, `ic`, `telephone`, `password`, `cookie`) VALUES
(106, 'Ronald ll', 'ron556611@gmail.com', '990624015311', 2345, 'P7B5sPN4aZfMdZ4zoLaO4Q==', 'RlBvWSs5eXJ4dlFCTUl4Q3dnaURTQT09Ojo3pjlOgp8ppfP3rID2T+4+'),
(123, 'testttt', 'test@test.com', '997755443322', 2, 'V9DxRGIi1yCGeagVqzuHSA==', 'bFJjUnRZeThvbzRWMUV5Q1EwRTJKQT09OjrlkeDESKskFJz8i+ICh+SS'),
(126, 'RONALD', 'serene_chu@hotmail.com', '990619016344', 127102269, 'CLdgwZKErrV0qj8OnF5++g==', 'cEZma1RSUW82aGxoWVR0OWJ5MGtBUT09OjrtZJs9Bd77NIebVJEklvZ5'),
(128, 'hi', 'serene_chu1@hotmail.com', '990619016345', 127530678, 'V9DxRGIi1yCGeagVqzuHSA==', NULL),
(233, 'tttttt', 'test@gmail.com', '990624015312', 127848343, 'P7B5sPN4aZfMdZ4zoLaO4Q==', 'TWtRNVNlNytFbEloTHFvbm1RQ09oZz09OjrDv2fmzbunCbskPx/vWbci');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jkt`
--
ALTER TABLE `jkt`
  ADD PRIMARY KEY (`jktid`);

--
-- Indexes for table `pbt`
--
ALTER TABLE `pbt`
  ADD PRIMARY KEY (`pbtid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `pbtid` (`pbtid`);

--
-- Indexes for table `posts_users_acknowledgement`
--
ALTER TABLE `posts_users_acknowledgement`
  ADD PRIMARY KEY (`userid`,`postid`),
  ADD KEY `posts_users_acknowledgement_postid_foreign` (`postid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `ic` (`ic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_pbtid_foreign` FOREIGN KEY (`pbtid`) REFERENCES `pbt` (`pbtid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts_users_acknowledgement`
--
ALTER TABLE `posts_users_acknowledgement`
  ADD CONSTRAINT `posts_users_acknowledgement_postid_foreign` FOREIGN KEY (`postid`) REFERENCES `posts` (`postid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_users_acknowledgement_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `AutoDeleteOldFeedback` ON SCHEDULE EVERY 1 DAY STARTS '2021-01-23 03:21:56' ON COMPLETION PRESERVE ENABLE DO DELETE FROM posts WHERE closed_timestamp < DATE_SUB(NOW(), INTERVAL 90 DAY)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
