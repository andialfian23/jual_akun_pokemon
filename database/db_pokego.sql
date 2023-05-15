-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Bulan Mei 2023 pada 11.10
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pokego`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_account`
--

CREATE TABLE `t_account` (
  `id_acn` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `team` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `pokecoins` int(11) DEFAULT NULL,
  `star_dust` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `item` varchar(50) DEFAULT NULL,
  `login` varchar(30) DEFAULT NULL,
  `p_shiny` int(11) DEFAULT NULL,
  `p_legendary` int(11) DEFAULT NULL,
  `p_mythical` int(11) DEFAULT NULL,
  `p_shiny_baby` int(11) DEFAULT NULL,
  `p_iv100` int(11) DEFAULT NULL,
  `p_3k` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `ss` varchar(100) NOT NULL,
  `pokemon` varchar(50) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `purchased` enum('1','0') NOT NULL DEFAULT '0',
  `code` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_account`
--

INSERT INTO `t_account` (`id_acn`, `title`, `team`, `level`, `pokecoins`, `star_dust`, `start_date`, `item`, `login`, `p_shiny`, `p_legendary`, `p_mythical`, `p_shiny_baby`, `p_iv100`, `p_3k`, `price`, `ss`, `pokemon`, `status`, `purchased`, `code`) VALUES
('20200710175714pm', 'Judul', 'Valor', 40, 10, 3000000, '2020-07-13', '2000', 'gmail', 10, 10, 10, 10, 10, 10, 16, 'Screenshot_2020-07-10-07-11-53-99.jpg', '0', '1', '0', 'f2334069cec20a7ea3df35ba28d513301501b414'),
('20200722090718am', 'account with special shiny riolu', 'Valor', 36, NULL, 400000, '2020-07-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 300, 'LOLOLOLOL.png', '1565', '0', '1', 'be0a48163bf9e0f84340dd4883d86f5e7fff308b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_client`
--

CREATE TABLE `t_client` (
  `no_process` int(11) NOT NULL,
  `id_acn` varchar(50) NOT NULL,
  `email_cl` varchar(50) NOT NULL,
  `on_process` enum('1','0') NOT NULL DEFAULT '1',
  `dt_purchased` datetime NOT NULL,
  `cancel_code` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_client`
--

INSERT INTO `t_client` (`no_process`, `id_acn`, `email_cl`, `on_process`, `dt_purchased`, `cancel_code`) VALUES
(1, '20200710175714pm', 'raihannurfarisi@gmail.com', '0', '2020-08-14 17:08:49', 'f2334069cec20a7ea3df35ba28d513301501b414');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_contact_us`
--

CREATE TABLE `t_contact_us` (
  `kd_cu` int(3) NOT NULL,
  `gmail` varchar(50) NOT NULL,
  `pw_gmail` varchar(100) NOT NULL,
  `paypal` varchar(50) NOT NULL,
  `ebay` varchar(128) NOT NULL,
  `g2g` varchar(128) NOT NULL,
  `discord` varchar(128) NOT NULL,
  `fb` varchar(50) NOT NULL,
  `instagram` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_contact_us`
--

INSERT INTO `t_contact_us` (`kd_cu`, `gmail`, `pw_gmail`, `paypal`, `ebay`, `g2g`, `discord`, `fb`, `instagram`) VALUES
(1, 'pokeshop325@gmail.com', 'PokemonGoShop23', 'emailpaypalibu@gmail.com', 'dbatklub', 'dbatklub', 'dbatklub#5066', 'balmon.westerling', '@nacl_radhs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_door`
--

CREATE TABLE `t_door` (
  `un` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `lvl` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_door`
--

INSERT INTO `t_door` (`un`, `pw`, `lvl`, `email`, `name`) VALUES
('Admin', '$2y$10$EMhwevijghRK5xHiBKN2dOchcqf9UTNzxfisDL4sS8PqXugoFad/q', 1, 'radheyasuryaputra95@gmail.com', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_history`
--

CREATE TABLE `t_history` (
  `id_history` int(11) NOT NULL,
  `dt` datetime NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `platform` varchar(50) NOT NULL,
  `un` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_history`
--

INSERT INTO `t_history` (`id_history`, `dt`, `ip_address`, `browser`, `platform`, `un`) VALUES
(1, '2023-05-15 15:32:15', '::1', 'Chrome 112.0.0.0', 'Windows 10', 'Admin'),
(2, '2023-05-15 16:00:05', '::1', 'Chrome 112.0.0.0', 'Windows 10', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_ss`
--

CREATE TABLE `t_ss` (
  `kd_ss` int(11) NOT NULL,
  `ss` varchar(100) NOT NULL,
  `no_ss` varchar(50) NOT NULL,
  `height` int(11) NOT NULL,
  `id_acn` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_ss`
--

INSERT INTO `t_ss` (`kd_ss`, `ss`, `no_ss`, `height`, `id_acn`) VALUES
(1, 'Screenshot_2020-07-10-07-11-53-99.jpg', '1', 2340, '20200710175714pm'),
(8, 'IMG-20200710-WA0006.jpg', '20230512181637pm', 0, '20200710175714pm'),
(3, 'Screenshot_2020-07-10-06-48-54-95_260528048de7f2f358f0056f785be619.jpg', '20200710175804pm', 2340, '20200710175714pm'),
(6, 'LOLOLOLOL.png', '1', 1080, '20200722090718am'),
(7, 'le.png', '20200722090743am', 375, '20200722090718am');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_token`
--

CREATE TABLE `t_token` (
  `Id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_account`
--
ALTER TABLE `t_account`
  ADD PRIMARY KEY (`id_acn`);

--
-- Indeks untuk tabel `t_client`
--
ALTER TABLE `t_client`
  ADD PRIMARY KEY (`no_process`),
  ADD KEY `id_acn` (`id_acn`);

--
-- Indeks untuk tabel `t_contact_us`
--
ALTER TABLE `t_contact_us`
  ADD PRIMARY KEY (`kd_cu`);

--
-- Indeks untuk tabel `t_door`
--
ALTER TABLE `t_door`
  ADD UNIQUE KEY `un` (`un`);

--
-- Indeks untuk tabel `t_history`
--
ALTER TABLE `t_history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indeks untuk tabel `t_ss`
--
ALTER TABLE `t_ss`
  ADD PRIMARY KEY (`kd_ss`);

--
-- Indeks untuk tabel `t_token`
--
ALTER TABLE `t_token`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_client`
--
ALTER TABLE `t_client`
  MODIFY `no_process` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `t_contact_us`
--
ALTER TABLE `t_contact_us`
  MODIFY `kd_cu` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_history`
--
ALTER TABLE `t_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_ss`
--
ALTER TABLE `t_ss`
  MODIFY `kd_ss` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `t_token`
--
ALTER TABLE `t_token`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
