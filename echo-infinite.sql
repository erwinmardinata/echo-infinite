-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 Mar 2018 pada 23.53
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `echo-infinite`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`) VALUES
(1, 'admin@admin.com', '25ed1bcb423b0b7200f485fc5ff71c8e', 'Erwin Mardinata');

-- --------------------------------------------------------

--
-- Struktur dari tabel `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `font` varchar(200) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `content`
--

INSERT INTO `content` (`id`, `font`, `judul`, `isi`) VALUES
(1, '<i class="fa fa-bullseye" aria-hidden="true"></i>', 'Dismissible alerts', 'Progress bars use CSS3 transitions and animations to achieve some of their effects. These features are not supported in Internet Explorer 9 and below or older versions of Firefox. Opera 12 does not support animations.'),
(2, '<i class="fa fa-bullseye" aria-hidden="true"></i>', 'Progress bars', 'Progress bars use CSS3 transitions and animations to achieve some of their effects. These features are not supported in Internet Explorer 9 and below or older versions of Firefox. Opera 12 does not support animations.'),
(3, '<i class="fa fa-bullseye" aria-hidden="true"></i>', 'Media object', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `posisi` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id`, `judul`, `deskripsi`, `photo`, `posisi`) VALUES
(13, 'Lorem Ipsum', 'Setelah itu kita buat controller untuk CRUD nya denga mambuat perintah php artisan make:controller CrudController --resource pada cmd/terminal ,maka akan ada file CrudController.php pada folder \\app\\Http\\Controllers lalu ubas isinya menjadi seperti di bawah ini', 'pexels-photo-399160.jpeg', 0),
(14, 'MELAWAN ISU PRIMORDIALISME DAN SEKSISME DENGAN SENYUMAN', 'Setelah itu kita buat controller untuk CRUD nya denga mambuat perintah php artisan make:controller CrudController --resource pada cmd/terminal ,maka akan ada file CrudController.php pada folder \\app\\Http\\Controllers lalu ubas isinya menjadi seperti di bawah ini', 'pexels-photo-373076.jpeg', 2),
(15, 'Learning By Doing', 'Hai guys,kali ini kita akan membuat tutorial tentang membuat Create Read Update Delete atau disingkat CRUD dengan menggunakan Laravel 5.3 ,pada tutorial sebelumnya kita telah belajar bagaimana membuat form login dan register,bagi yang belum tahu dapat melihatnya disini.', 'pexels-photo-414645.jpeg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
