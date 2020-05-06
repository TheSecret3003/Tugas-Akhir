-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2020 at 03:58 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `jenis_kendaraan`) VALUES
(1, 'TransJakarta'),
(2, 'Bus'),
(3, 'Bus Sedang'),
(4, 'Angkot');

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id_kendaraan` int(10) NOT NULL,
  `id_trayek` int(50) NOT NULL,
  `id_wilayah` varchar(10) NOT NULL,
  `koridor` varchar(10) NOT NULL,
  `jenis_trayek` varchar(50) NOT NULL,
  `nama_trayek` varchar(50) NOT NULL,
  `warna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id_kendaraan`, `id_trayek`, `id_wilayah`, `koridor`, `jenis_trayek`, `nama_trayek`, `warna`) VALUES
(1, 1, 'P', '1', 'TransJakarta', 'Blok M - Kota', '#d02026'),
(1, 2, 'P', '2', 'TransJakarta', 'Pulo Gadung - Harmoni', '#264798'),
(1, 3, 'P', '3', 'TransJakarta', 'Kalideres - Pasar Baru', '#edb900'),
(1, 4, 'P', '4', 'TransJakarta', 'Pulo Gadung - Tosari', '#5d2e64'),
(1, 5, 'P', '5', 'TransJakarta', 'Ancol - Kampung Melayu', '#c85f1b'),
(1, 6, 'P', '6', 'TransJakarta', 'Ragunan - Halimun', '#31a542'),
(1, 7, 'P', '7', 'TransJakarta', 'Kampung Rambutan - Kampung Melayu', '#ec2661'),
(1, 8, 'P', '8', 'TransJakarta', 'Lebak Bulus - Harmoni', '#da259a'),
(1, 9, 'P', '9', 'TransJakarta', 'Pinang Ranti - Pluit', '#449f98'),
(1, 10, 'P', '10', 'TransJakarta', 'Tanjung Priok - PGC', '#8f1a1e'),
(1, 11, 'P', '11', 'TransJakarta', 'Kampung Melayu - Pulo Gebang', '#2f4fa2'),
(1, 12, 'P', '12', 'TransJakarta', 'Penjaringan - Sunter Kelapa Gading', '#62bd73'),
(1, 13, 'P', '13', 'TransJakarta', 'Tendean - CBD Ciledug', '#5c359d');

-- --------------------------------------------------------

--
-- Table structure for table `terminal`
--

CREATE TABLE `terminal` (
  `id_trayek` int(50) NOT NULL,
  `id_terminal` int(11) NOT NULL,
  `id_halte` int(10) NOT NULL,
  `nama_terminal` varchar(100) NOT NULL,
  `jadwal` varchar(50) NOT NULL,
  `durasi` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `terminal`
--

INSERT INTO `terminal` (`id_trayek`, `id_terminal`, `id_halte`, `nama_terminal`, `jadwal`, `durasi`, `latitude`, `longitude`) VALUES
(1, 1, 1, 'Blok M', '06.00 - 18.00', 5, -6.24342, 106.802),
(1, 2, 2, 'Masjid Al-Azhar', '06.03 - 18.03', 5, -6.23515, 106.798),
(1, 3, 3, 'Bundaran Senayan', '06.06 - 18.06', 5, -6.22742, 106.802),
(1, 4, 4, 'Gelora Bungkarno', '06.09 - 18.09', 5, -6.22431, 106.806),
(1, 5, 5, 'Polda Metro Jaya', '06.12 - 18.12', 5, -6.2217, 106.81),
(1, 6, 6, 'Bendungan hilir', '06.15 - 18.15', 5, -6.21726, 106.815),
(1, 7, 7, 'Sudirman Karet', '06.18 - 18.18', 5, -6.21482, 106.818),
(1, 8, 8, 'Dukuh Atas', '06.21 - 18.21', 5, -6.20572, 106.822),
(1, 9, 9, 'Tosari', '06.24 - 18.24', 5, -6.19872, 106.823),
(1, 10, 10, 'Bundaran HI', '06.27 - 18.27', 5, -6.19374, 106.823),
(1, 11, 11, 'Sarinah', '06.30 - 18.30', 5, -6.18807, 106.823),
(1, 12, 12, 'Bank Indonesia', '06.33 - 18.33', 5, -6.18276, 106.823),
(1, 13, 13, 'Monas', '06.36 - 18.36', 5, -6.17597, 106.823),
(1, 14, 14, 'Harmoni ', '06.39 - 18.39', 5, -6.16584, 106.82),
(1, 15, 15, 'Sawah Besar', '06.42 - 18.42', 5, -6.16053, 106.819),
(1, 16, 16, 'Mangga Besar', '06.45 - 18.45', 5, -6.15227, 106.817),
(1, 17, 17, 'Olimo', '06.48 - 18.48', 5, -6.1493, 106.817),
(1, 18, 18, 'Glodok', '06.51 - 18.51', 5, -6.14419, 106.815),
(1, 19, 19, 'Kota', '06.54 - 18.54', 5, -6.13785, 106.814),
(2, 20, 20, 'Pulo Gadung', '06.00 - 18.00', 10, -6.18328, 106.909),
(2, 21, 21, 'Bermis', '06.04 - 18.04', 10, -6.18328, 106.909),
(2, 22, 22, 'Pulomas', '06.07 - 18.07', 10, -6.18328, 106.909),
(2, 23, 23, 'ASMI', '06.09 - 18.09', 10, -6.17202, 106.889),
(2, 24, 24, 'Pedongkelan', '06.11 - 18.11', 10, -6.16788, 106.882),
(2, 25, 25, 'Cempaka Timur', '06.13 - 18.13', 10, -6.16662, 106.876),
(2, 26, 26, 'RS Islam', '06.15 - 18.15', 10, -6.16864, 106.87),
(2, 27, 27, 'Cempaka Tengah', '06.17 - 18.17', 10, -6.17048, 106.867),
(2, 28, 28, 'Pasar Cempaka Putih', '06.19 - 18.19', 10, -6.1725, 106.862),
(2, 29, 29, 'Rawa Selatan', '06.21 - 18.21', 10, -6.17403, 106.858),
(2, 30, 30, 'Galur', '06.23 - 18.23', 10, -6.17447, 106.855),
(2, 31, 31, 'Senen', '06.25 - 18.25', 10, -6.17826, 106.843),
(2, 32, 32, 'Atrium', '06.27 - 18.27', 10, -6.17726, 106.841),
(2, 33, 33, 'RSPAD', '06.29 - 18.29', 10, -6.17559, 106.837),
(2, 34, 34, 'Deplu', '06.31 - 18.31', 10, -6.17363, 106.835),
(2, 35, 35, 'Gambir 1', '06.31 - 18.31', 10, -6.17444, 106.83),
(2, 36, 36, 'Istiqlal', '06.33 - 18.33', 10, -6.17232, 106.831),
(2, 37, 37, 'Juanda', '06.35 - 18.35', 10, -6.16814, 106.831),
(2, 38, 38, 'Pecenongan', '06.37 - 18.37', 10, -6.16779, 106.828),
(2, 39, 14, 'Harmoni', '06.39 - 18.39', 10, -6.16584, 106.82),
(3, 40, 39, 'Kalideres', '06.00 - 18.00', 10, -6.15463, 106.706),
(3, 41, 40, 'Pesakih', '06.03 - 18.03', 10, -6.15484, 106.715),
(3, 42, 41, 'Sumur Bor', '06.05 - 18.05', 10, -6.15309, 106.719),
(3, 43, 42, 'Rawa Buaya', '06.07 - 18.07', 10, -6.154, 106.726),
(3, 44, 43, 'Jembatan Baru', '06.09 - 18.09', 10, -6.1549, 106.731),
(3, 45, 44, 'Dispenda', '06.11 - 18.11', 10, -6.1547, 106.738),
(3, 46, 45, 'Jembatan Gantung', '06.14- 18.14', 10, -6.15553, 106.749),
(3, 47, 46, 'Taman Kota', '06.18 - 18.18', 10, -6.15723, 106.758),
(3, 48, 47, 'Indosiar', '06.24 - 18.24', 10, -6.16349, 106.775),
(3, 49, 48, 'Jelambar', '06.28 - 18.28', 10, -6.16665, 106.787),
(3, 50, 49, 'Grogol 1', '06.30 - 18.30', 10, -6.16689, 106.79),
(3, 51, 50, 'RS Sumber Waras', '06.32 - 18.32', 10, -6.16635, 106.797),
(3, 52, 14, 'Harmoni', '06.38 - 18.38', 10, -6.16584, 106.82),
(3, 53, 38, 'Pecenongan', '06.41 - 18.41', 10, -6.16779, 106.828),
(3, 54, 37, 'Juanda', '06.42 - 18.42', 10, -6.16814, 106.831),
(3, 55, 51, 'Pasar Baru', '06.44 - 18.44', 10, -6.16617, 106.835),
(4, 56, 20, 'Pulo Gadung', '06.00 - 18.00', 10, -6.18328, 106.909),
(4, 57, 52, 'Pasar Pulo Gadung', '06.03 - 18.03', 10, -6.18749, 106.906),
(4, 58, 53, 'TU GAS', '06.05 - 18.05', 10, -6.1924, 106.905),
(4, 59, 54, 'Layur', '06.07 - 18.07', 10, -6.19357, 106.899),
(4, 60, 55, 'Pemuda Rawamangun', '06.09 - 18.09', 10, -6.19354, 106.892),
(4, 61, 56, 'Velodrome', '06.11 - 18.11', 10, -6.19352, 106.888),
(4, 62, 57, 'Sunan Giri', '06.13 - 18.13', 10, -6.19331, 106.884),
(4, 63, 58, 'UNJ', '06.15 - 18.15', 10, -6.19295, 106.88),
(4, 64, 59, 'Pramuka BPKP', '06.17 - 18.17', 10, -6.19223, 106.874),
(4, 65, 60, 'Pramuka LIA', '06.19 - 18.19', 10, -6.19228, 106.869),
(4, 66, 61, 'Utan Kayu', '06.21 - 18.21', 10, -6.19279, 106.865),
(4, 67, 62, 'Pasar Genjing', '06.23 - 18.23', 10, -6.19449, 106.861),
(4, 68, 63, 'Matraman 2', '06.25 - 18.25', 10, -6.19913, 106.854),
(4, 69, 64, 'Manggarai', '06.27 - 18.27', 10, -6.20891, 106.847),
(4, 70, 65, 'Pasar Rumput', '06.29 - 18.29', 10, -6.20719, 106.841),
(4, 71, 66, 'Halimun', '06.31 - 18.31', 10, -6.2052, 106.833),
(4, 72, 67, 'Dukuh Atas 2', '06.33 - 18.33', 10, -6.20438, 106.823),
(4, 73, 9, 'Tosari', '06.35 - 18.35', 10, -6.19872, 106.823),
(5, 74, 68, 'Ancol', '06.00 - 18.00', 10, -6.1275, 106.831),
(5, 75, 69, 'Pademangan', '06.03 - 18.03', 10, -6.13379, 106.832),
(5, 76, 70, 'Gunung Sahari Mangga Dua', '06.06 - 18.06', 10, -6.13687, 106.832),
(5, 77, 71, 'Jembatan Merah', '06.09 - 18.09', 10, -6.14677, 106.834),
(5, 78, 72, 'Pasar Baru Timur', '06.12 - 18.12', 10, -6.16239, 106.838),
(5, 79, 73, 'Budi Utomo', '06.15 - 18.15', 10, -6.16604, 106.839),
(5, 80, 74, 'Senen Central', '06.19 - 18.19', 10, -6.17824, 106.842),
(5, 81, 75, 'Pal Putih', '06.22 - 18.22', 10, -6.18464, 106.844),
(5, 82, 76, 'Kramat Sentiong NU', '06.25 - 18.25', 10, -6.18813, 106.846),
(5, 83, 77, 'Salemba UI', '06.28 - 18.28', 10, -6.19362, 106.849),
(5, 84, 78, 'Salemba Carolus', '06.32 - 18.32', 10, -6.19695, 106.851),
(5, 85, 79, 'Matraman 1', '06.35 - 18.35', 10, -6.20012, 106.854),
(5, 86, 80, 'Tegalan', '06.38 - 18.38', 10, -6.20301, 106.857),
(5, 87, 81, 'Slamet Riyadi', '06.41 - 18.41', 10, -6.20859, 106.859),
(5, 88, 82, 'Kebon Pala', '06.44 - 18.44', 10, -6.21291, 106.861),
(5, 89, 83, 'Pasar Jatinegara', '06.48 - 18.48', 10, -6.21577, 106.866),
(5, 90, 84, 'RS Premier Jatinegara', '06.51 - 18.51', 10, -6.2216, 106.869),
(5, 91, 85, 'Kampung Melayu', '06.54 - 18.54', 10, -6.22457, 106.867),
(6, 92, 86, 'Ragunan', '06.00 - 18.00', 15, -6.30586, 106.819),
(6, 93, 87, 'Departemen Pertanian', '06.03 - 18.03', 15, -6.29481, 106.822),
(6, 94, 88, 'SMK 57', '06.06 - 18.06', 15, -6.29125, 106.823),
(6, 95, 89, 'Jati Padang', '06.09 - 18.09', 15, -6.28566, 106.826),
(6, 96, 90, 'Pejaten', '06.12 - 18.12', 15, -6.27853, 106.83),
(6, 97, 91, 'Buncit Indah', '06.15 - 18.15', 15, -6.27443, 106.83),
(6, 98, 92, 'Warung Jati', '06.18 - 18.18', 15, -6.26246, 106.83),
(6, 99, 93, 'Imigrasi', '06.21- 18.21', 15, -6.25683, 106.828),
(6, 100, 94, 'Duren Tiga', '06.24- 18.24', 15, -6.25218, 106.827),
(6, 101, 95, 'Mampang Prapatan', '06.27 - 18.27', 15, -6.24192, 106.826),
(6, 102, 96, 'Kuningan Timur', '06.30 - 18.30', 15, -6.236, 106.828),
(6, 103, 97, 'Patra Kuningan', '06.33- 18.33', 15, -6.23356, 106.831),
(6, 104, 98, 'Gor Sumantri', '06.36 - 18.36', 15, -6.22069, 106.832),
(6, 105, 99, 'Karet Kuningan', '06.39 - 18.39', 15, -6.21762, 106.831),
(6, 106, 100, 'Kuningan Madya', '06.42 - 18.42', 15, -6.21272, 106.83),
(6, 107, 101, 'Setiabudi Utara', '06.45 - 18.45', 15, -6.20835, 106.83),
(6, 108, 102, 'Latuharhary', '06.48 - 18.48', 15, -6.20289, 106.828),
(6, 109, 66, 'Halimun', '06.51- 18.51', 15, -6.2052, 106.833),
(7, 110, 103, 'Kampung Rambutan', '06.03 - 18.03', 20, -6.30937, 106.882),
(7, 111, 104, 'Tanah Merdeka', '06.06 - 18.06', 20, -6.30826, 106.874),
(7, 112, 105, 'RS Harapan Bunda', '06.09 - 18.09', 20, -6.30205, 106.868),
(7, 113, 106, 'Pasar Induk', '06.12 - 18.12', 20, -6.29429, 106.872),
(7, 114, 107, 'Pasar Kramat Jati', '06.15 - 18.15', 20, -6.26892, 106.867),
(7, 115, 108, 'PGC 1', '06.18 - 18.18', 20, -6.26211, 106.866),
(7, 116, 109, 'BKN', '06.21 - 18.21', 20, -6.25792, 106.87),
(7, 117, 110, 'Cawang UKI', '06.24 - 18.24', 20, -6.2505, 106.873),
(7, 118, 111, 'BNN', '06.27 - 18.27', 20, -6.24622, 106.872),
(7, 119, 112, 'Cawang Otista', '06.30 - 18.30', 20, -6.24376, 106.869),
(7, 120, 113, 'Gelanggang Remaja', '06.33 - 18.33', 20, -6.2355, 106.868),
(7, 121, 114, 'Bidara Cina', '06.36 - 18.36', 20, -6.22984, 106.867),
(7, 122, 85, 'Kampung Melayu', '06.39 - 18.39', 20, -6.22457, 106.867),
(8, 123, 115, 'Lebak Bulus', '06.00 - 18.00', 10, -6.28951, 106.775),
(8, 124, 116, 'Pondok Pinang', '06.04 - 18.04', 10, -6.28226, 106.772),
(8, 125, 117, 'Pondok Indah 1', '06.08 - 18.08', 10, -6.28749, 106.779),
(8, 126, 118, 'Pondok Indah 2', '06.12 - 18.12', 10, -6.26726, 106.784),
(8, 127, 119, 'Tanah Kusir', '06.16 - 18.16', 10, -6.25709, 106.782),
(8, 128, 120, 'Kebayoran Lama Bungur', '06.20 - 18.20', 10, -6.25277, 106.782),
(8, 129, 121, 'Pasar Kebayoran Lama', '06.24 - 18.24', 10, -6.23857, 106.783),
(8, 130, 122, 'Simprug', '06.28 - 18.28', 10, -6.23396, 106.786),
(8, 131, 123, 'Permata Hijau', '06.32 - 18.32', 10, -6.22149, 106.783),
(8, 132, 124, 'Permata Hijau RS Medika', '06.36 - 18.36', 10, -6.21843, 106.778),
(8, 133, 125, 'Pos Pengumben', '06.40 - 18.40', 10, -6.21303, 106.772),
(8, 134, 126, 'Kelapa Dua Sasak', '06.44 - 18.44', 10, -6.20564, 106.77),
(8, 135, 127, 'Kebon Jeruk', '06.48 - 18.48', 10, -6.1944, 106.769),
(8, 136, 128, 'Duri Kepa', '06.52 - 18.52', 10, -6.18535, 106.768),
(8, 137, 129, 'Kedoya Assiddiq', '06.56 - 18.56', 10, -6.1746, 106.766),
(8, 138, 130, 'Kedoya Garden', '06.58 - 18.58', 10, -6.16453, 106.763),
(8, 139, 47, 'Indosiar', '07.00 - 19.00', 10, -6.16349, 106.775),
(8, 140, 48, 'Jelambar', '07.01 - 19.01', 10, -6.16665, 106.787),
(8, 141, 49, 'Grogol 1', '07.04 - 18.04', 10, -6.16689, 106.79),
(8, 142, 50, 'RS Sumber Waras', '07.06 - 18.06', 10, -6.16635, 106.797),
(8, 143, 14, 'Harmoni', '07.08 - 18.08', 10, -6.16584, 106.82),
(9, 144, 131, 'Pinang Ranti', '06.00 - 18.00', 15, -6.29143, 106.886),
(9, 145, 132, 'Garuda Taman Mini', '06.03 - 18.03', 15, -6.29027, 106.881),
(9, 146, 110, 'Cawang UKI', '06.14 - 18.14', 15, -6.2505, 106.873),
(9, 147, 111, 'BNN', '06.16 - 18.16', 15, -6.24622, 106.872),
(9, 148, 133, 'Cawang Ciliwung', '06.19- 18.19', 15, -6.24306, 106.863),
(9, 149, 134, 'Cawang Cikoko', '06.21- 18.21', 15, -6.24317, 106.858),
(9, 150, 135, 'Tugu Pancoran', '06.23- 18.23', 15, -6.24322, 106.844),
(9, 151, 136, 'Pancoran Barat', '06.26- 18.26', 15, -6.24163, 106.838),
(9, 152, 147, 'Tegal Parang', '06.29- 18.29', 15, -6.23889, 106.83),
(9, 153, 138, 'Kuningan Barat', '06.32- 18.32', 15, -6.23717, 106.828),
(9, 154, 139, 'Gatsu Jamsostek', '06.35- 18.35', 15, -6.23352, 106.822),
(9, 155, 140, 'Gatsu LIPI', '06.38- 18.38', 15, -6.22702, 106.817),
(9, 156, 141, 'Semanggi', '06.41- 18.41', 15, -6.22702, 106.817),
(9, 157, 142, 'Senayan JCC', '06.44- 18.44', 15, -6.21407, 106.809),
(9, 158, 143, 'Slipi Petamburan', '06.47- 18.47', 15, -6.20204, 106.8),
(9, 159, 144, 'Slipi Kemanggisan', '06.50- 18.50', 15, -6.19015, 106.797),
(9, 160, 145, 'Grogol 2', '06.53- 18.53', 15, -6.1673, 106.788),
(9, 161, 146, 'Latumeten', '06.56- 18.56', 15, -6.16119, 106.79),
(9, 162, 147, 'Jembatan Besi', '06.59- 18.59', 15, -6.15212, 106.795),
(9, 163, 148, 'Jembatan 2', '07.02- 19.02', 15, -6.14341, 106.793),
(9, 164, 149, 'Jembatan 3', '07.05- 19.05', 15, -6.13347, 106.793),
(9, 165, 150, 'Penjaringan', '07.08- 19.08', 15, -6.12642, 106.792),
(9, 166, 151, 'Pluit', '07.11- 19.11', 15, -6.1159, 106.791),
(10, 167, 152, 'Tanjung Priok', '06.00 - 18.00', 10, -6.10968, 106.882),
(10, 168, 153, 'Enggano', '06.03 - 18.03', 10, -6.11015, 106.892),
(10, 169, 154, 'Permai Koja', '06.05 - 18.05', 10, -6.11386, 106.893),
(10, 170, 155, 'Kantor Walikota Jakut', '06.07 - 18.07', 10, -6.11879, 106.893),
(10, 171, 156, 'Plumpang Pertamina', '06.09 - 18.09', 10, -6.12844, 106.894),
(10, 172, 157, 'Sunter Kelapa Gading', '06.11 - 18.11', 10, -6.14275, 106.891),
(10, 173, 158, 'Yos Sudarso Kodamar', '06.14 - 18.14', 10, -6.16189, 106.882),
(10, 174, 159, 'Cempaka Mas', '06.17 - 18.17', 10, -6.16563, 106.879),
(10, 175, 170, 'Cempaka Putih', '06.19 - 18.19', 10, -6.17435, 106.876),
(10, 176, 161, 'Kayu Putih Rawasari', '06.21 - 18.21', 10, -6.18733, 106.875),
(10, 177, 162, 'Utan Kayu Rawamangun', '06.23- 18.23', 10, -6.19748, 106.874),
(10, 178, 163, 'Bea Cukai Ahmad Yani', '06.25 - 18.25', 10, -6.20559, 106.874),
(10, 179, 164, 'Stasiun Jatinegara 2', '06.28 - 18.28', 10, -6.21566, 106.868),
(10, 180, 165, 'Pedati Prumpung', '06.30 - 18.30', 10, -6.22025, 106.874),
(10, 181, 166, 'Cipinang Kebon Nanas', '06.32 - 18.32', 10, -6.23141, 106.876),
(10, 182, 167, 'Penas Kalimalang', '06.34 - 18.34', 10, -6.23922, 106.878),
(10, 183, 168, 'Cawang Sutoyo', '06.37 - 18.37', 10, -6.24489, 106.876),
(10, 184, 110, 'Cawang UKI', '06.39 - 18.39', 10, -6.2505, 106.873),
(10, 185, 109, 'BKN', '06.41 - 18.41', 10, -6.25792, 106.87),
(10, 186, 169, 'PGC 2', '06.43 - 18.43', 10, -6.2619, 106.866),
(11, 187, 85, 'Kampung Melayu', '06.00 - 18.00', 10, -6.22457, 106.867),
(11, 188, 164, 'Stasiun Jatinegara 2', '06.06- 18.06', 10, -6.21566, 106.868),
(11, 189, 170, 'Fly Over Jatinegara', '06.09- 18.09', 10, -6.2152, 106.874),
(11, 190, 171, 'Pasar Enjo', '06.12- 18.12', 10, -6.21493, 106.878),
(11, 191, 172, 'Imigrasi Jaktim', '06.15- 18.15', 10, -6.2147, 106.882),
(11, 192, 173, 'Cipinang', '06.18- 18.18', 10, -6.21397, 106.889),
(11, 193, 174, 'Stasiun Klender', '06.21- 18.21', 10, -6.21365, 106.899),
(11, 194, 175, 'Flyover Klender', '06.24- 18.24', 10, -6.21369, 106.903),
(11, 195, 176, 'Kampung Sumur', '06.27- 18.27', 10, -6.21389, 106.907),
(11, 196, 177, 'Buaran', '06.30- 18.30', 10, -6.21484, 106.915),
(11, 197, 178, 'Perumnas Klender', '06.33- 18.33', 10, -6.21671, 106.93),
(11, 198, 179, 'Penggilingan', '06.36- 18.36', 10, -6.21365, 106.94),
(11, 199, 180, 'Wali Kota Jaktim', '06.39- 18.39', 10, -6.21258, 106.945),
(11, 200, 181, 'Pulo Gebang', '06.42- 18.42', 10, -6.20795, 106.954),
(12, 201, 182, 'Penjaringan', '06.00 - 18.00', 15, -6.12642, 106.792),
(12, 202, 183, 'Stasiun Kota', '06.02 - 18.02', 15, -6.13757, 106.815),
(12, 203, 184, 'Pangeran Jayakarta', '06.04 - 18.04', 15, -6.14129, 106.823),
(12, 204, 70, 'Gunung Sahari Mangga Dua', '06.09 - 18.09', 15, -6.13687, 106.832),
(12, 205, 71, 'Jembatan Merah', '06.08 - 18.08', 15, -6.14677, 106.834),
(12, 206, 185, 'Danau Agung', '06.12 - 18.12', 15, -6.14675, 106.858),
(12, 207, 186, 'SMP 140', '06.12 - 18.12', 15, -6.13976, 106.859),
(12, 208, 187, 'Sunter Boulevard Barat', '06.14 - 18.014', 15, -6.14958, 106.889),
(12, 209, 157, 'Sunter Kelapa Gading', '06.24 - 18.24', 15, -6.14275, 106.891);

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` varchar(10) NOT NULL,
  `nama_wilayah` varchar(50) NOT NULL,
  `suku_dinas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `nama_wilayah`, `suku_dinas`) VALUES
('B', 'Jakarta Barat', 'Jakbar'),
('P', 'Jakarta Pusat', 'Jakpus'),
('S', 'Jakarta Selatan', 'Jaksel'),
('T', 'Jakarta Timur', 'Jaktim'),
('U', 'Jakarta Utara', 'Jakut');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_trayek`),
  ADD KEY `id_kendaraan` (`id_kendaraan`),
  ADD KEY `id_wilayah` (`id_wilayah`);

--
-- Indexes for table `terminal`
--
ALTER TABLE `terminal`
  ADD PRIMARY KEY (`id_terminal`),
  ADD KEY `id_trayek` (`id_trayek`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id_trayek` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `terminal`
--
ALTER TABLE `terminal`
  MODIFY `id_terminal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rute`
--
ALTER TABLE `rute`
  ADD CONSTRAINT `rute_ibfk_1` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rute_ibfk_2` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `terminal`
--
ALTER TABLE `terminal`
  ADD CONSTRAINT `terminal_ibfk_1` FOREIGN KEY (`id_trayek`) REFERENCES `rute` (`id_trayek`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
