-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 05 Ağu 2019, 23:50:49
-- Sunucu sürümü: 10.1.38-MariaDB
-- PHP Sürümü: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `serilan`
--
CREATE DATABASE IF NOT EXISTS `serilan` DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci;
USE `serilan`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kryptonit3_counter_page`
--

DROP TABLE IF EXISTS `kryptonit3_counter_page`;
CREATE TABLE `kryptonit3_counter_page` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kryptonit3_counter_page`
--

INSERT INTO `kryptonit3_counter_page` (`id`, `page`) VALUES
(1, '6ace82b8-032b-5222-8a14-4783f20a3ce0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kryptonit3_counter_page_visitor`
--

DROP TABLE IF EXISTS `kryptonit3_counter_page_visitor`;
CREATE TABLE `kryptonit3_counter_page_visitor` (
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `visitor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kryptonit3_counter_page_visitor`
--

INSERT INTO `kryptonit3_counter_page_visitor` (`page_id`, `visitor_id`, `created_at`) VALUES
(1, 1, '2019-07-31 19:25:21');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kryptonit3_counter_visitor`
--

DROP TABLE IF EXISTS `kryptonit3_counter_visitor`;
CREATE TABLE `kryptonit3_counter_visitor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visitor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kryptonit3_counter_visitor`
--

INSERT INTO `kryptonit3_counter_visitor` (`id`, `visitor`) VALUES
(1, '2e078b51040fb9fb6e71c253ab506a034aa75b2c6b5815ccaa27d406928d8bd8');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_07_07_185328_create_admin_table', 1),
(2, '2019_07_07_202848_create_tbl_reklamyayinla_table', 2),
(3, '2019_07_09_203600_create_tbl_reklamver_table', 3),
(4, '2019_07_10_205335_create_tbl_ilan_table', 4),
(5, '2019_07_12_141157_create_tbl_kategori_table', 5),
(6, '2019_07_12_233212_create_tbl_users_table', 6),
(7, '2019_07_16_213215_create_tbl_yorum_table', 7),
(8, '2019_07_17_154848_create_tbl_yorumlar_table', 8),
(9, '2019_07_17_155051_create_tbl_picture_table', 9);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_password`, `created_at`, `updated_at`) VALUES
(1, 'Akrep Apoletiler', '168efc366c449fab9c2843e9b54e2a18', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_ilan`
--

DROP TABLE IF EXISTS `tbl_ilan`;
CREATE TABLE `tbl_ilan` (
  `ilan_id` int(10) UNSIGNED NOT NULL,
  `kat_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `ilan_baslik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ilan_adi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ilan_soyadi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ilan_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ilan_adresi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ilan_fiyat` double(8,2) NOT NULL,
  `ilan_telefon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ilan_detay` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ilan_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `tbl_ilan`
--

INSERT INTO `tbl_ilan` (`ilan_id`, `kat_id`, `users_id`, `ilan_baslik`, `ilan_adi`, `ilan_soyadi`, `ilan_email`, `ilan_adresi`, `ilan_fiyat`, `ilan_telefon`, `ilan_detay`, `ilan_image`, `created_at`, `updated_at`) VALUES
(4, 8, 1, 'Tarla', 'Emre', 'Karaca', 'krc_emre_46@hotmail.com', 'Elbistan', 10000.00, '5061703376', 'satılık', 'public/upload/ilan//zwGa1xasgg2mfHNs1HjH8CWLlIhGbrHNlp1K4b1G.jpeg', '2019-07-31 19:26:37', '2019-07-31 19:26:37');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_kategori`
--

DROP TABLE IF EXISTS `tbl_kategori`;
CREATE TABLE `tbl_kategori` (
  `kat_id` int(10) UNSIGNED NOT NULL,
  `kat_ad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ust_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kat_id`, `kat_ad`, `ust_id`, `created_at`, `updated_at`) VALUES
(1, 'Emlak', 0, '2019-07-12 14:22:22', '2019-07-12 14:22:22'),
(2, 'Otomobil', 0, '2019-07-12 14:22:22', '2019-07-12 14:22:22'),
(3, 'İş ilanları', 0, '2019-07-12 14:22:22', '2019-07-12 14:22:22'),
(4, 'İkinci El Ürünler', 0, '2019-07-12 14:22:22', '2019-07-12 14:22:22'),
(5, 'Canlı Hayvan', 0, '2019-07-12 14:22:22', '2019-07-12 14:22:22'),
(6, 'Yedek Parça', 0, '2019-07-12 14:22:22', '2019-07-12 14:22:22'),
(7, 'Özel Ders Verenler', 0, '2019-07-12 14:22:22', '2019-07-12 14:22:22'),
(8, 'Arsa', 1, '2019-07-12 14:22:22', '2019-07-12 14:22:22'),
(9, 'Daire', 1, '2019-07-12 14:22:22', '2019-07-12 14:22:22'),
(10, 'İş Yeri', 1, '2019-07-12 14:22:22', '2019-07-12 14:22:22'),
(11, 'Kiralık', 2, '2019-07-12 14:22:22', '2019-07-12 14:22:22'),
(12, '2 El', 2, '2019-07-12 14:22:22', '2019-07-12 14:22:22'),
(13, 'Sıfır', 2, '2019-07-12 14:22:22', '2019-07-12 14:22:22');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_picture`
--

DROP TABLE IF EXISTS `tbl_picture`;
CREATE TABLE `tbl_picture` (
  `picture_id` int(10) UNSIGNED NOT NULL,
  `picture_ilan_id` int(11) NOT NULL,
  `picture_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `tbl_picture`
--

INSERT INTO `tbl_picture` (`picture_id`, `picture_ilan_id`, `picture_name`, `created_at`, `updated_at`) VALUES
(1, 1, '991794.jpg', '2019-07-28 18:07:52', '2019-07-28 18:07:52'),
(2, 1, '525301.jpg', '2019-07-28 18:09:19', '2019-07-28 18:09:19'),
(3, 1, '363608.jpeg', '2019-07-31 19:21:47', '2019-07-31 19:21:47'),
(4, 4, '71842.JPG', '2019-07-31 19:26:47', '2019-07-31 19:26:47'),
(5, 4, '986884.JPG', '2019-07-31 19:26:47', '2019-07-31 19:26:47');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_reklamver`
--

DROP TABLE IF EXISTS `tbl_reklamver`;
CREATE TABLE `tbl_reklamver` (
  `reklamver_id` int(10) UNSIGNED NOT NULL,
  `reklamver_adi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reklamver_soyadi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reklamver_suresi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reklamver_alan` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `reklamver_telefon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reklamver_foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `tbl_reklamver`
--

INSERT INTO `tbl_reklamver` (`reklamver_id`, `reklamver_adi`, `reklamver_soyadi`, `reklamver_suresi`, `reklamver_alan`, `reklamver_telefon`, `reklamver_foto`, `created_at`, `updated_at`) VALUES
(1, 'Nurcan', 'Polat', '  -- Haftalık', 'Banner', '5342578301', 'public/upload/reklamver//Jn77rwmHzxVSnnd8aLpktFOdHGrYcXIbgi3vZAM0.jpeg', '2019-07-28 18:09:41', '2019-07-28 18:09:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_reklamyayinla`
--

DROP TABLE IF EXISTS `tbl_reklamyayinla`;
CREATE TABLE `tbl_reklamyayinla` (
  `reklamy_id` int(10) UNSIGNED NOT NULL,
  `reklamy_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reklamy_alan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reklamy_durum` int(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `tbl_reklamyayinla`
--

INSERT INTO `tbl_reklamyayinla` (`reklamy_id`, `reklamy_image`, `reklamy_alan`, `reklamy_durum`, `created_at`, `updated_at`) VALUES
(1, 'public/upload/reklam//QM66VVmhQ5f6ZD2zFhVB2Zqn7RWAnAhRtWEt3VFx.jpeg', 'Banner', 1, '2019-07-28 18:10:03', '2019-07-28 18:10:03');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `users_id` int(10) UNSIGNED NOT NULL,
  `users_ad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `tbl_users`
--

INSERT INTO `tbl_users` (`users_id`, `users_ad`, `users_password`, `users_email`, `created_at`, `updated_at`) VALUES
(1, 'Emre Karaca', '8282', 'krc_emre_46@hotmail.com', '2019-07-28 18:07:19', '2019-07-28 18:07:19');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_yorumlar`
--

DROP TABLE IF EXISTS `tbl_yorumlar`;
CREATE TABLE `tbl_yorumlar` (
  `yorumlar_id` int(10) UNSIGNED NOT NULL,
  `yorumlar_ilan_id` int(11) NOT NULL,
  `yorumlar_ekleyen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yorumlar_mesaj` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kryptonit3_counter_page`
--
ALTER TABLE `kryptonit3_counter_page`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kryptonit3_counter_page_visitor`
--
ALTER TABLE `kryptonit3_counter_page_visitor`
  ADD KEY `kryptonit3_counter_page_visitor_page_id_index` (`page_id`),
  ADD KEY `kryptonit3_counter_page_visitor_visitor_id_index` (`visitor_id`);

--
-- Tablo için indeksler `kryptonit3_counter_visitor`
--
ALTER TABLE `kryptonit3_counter_visitor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kryptonit3_counter_visitor_visitor_unique` (`visitor`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Tablo için indeksler `tbl_ilan`
--
ALTER TABLE `tbl_ilan`
  ADD PRIMARY KEY (`ilan_id`);

--
-- Tablo için indeksler `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kat_id`);

--
-- Tablo için indeksler `tbl_picture`
--
ALTER TABLE `tbl_picture`
  ADD PRIMARY KEY (`picture_id`);

--
-- Tablo için indeksler `tbl_reklamver`
--
ALTER TABLE `tbl_reklamver`
  ADD PRIMARY KEY (`reklamver_id`);

--
-- Tablo için indeksler `tbl_reklamyayinla`
--
ALTER TABLE `tbl_reklamyayinla`
  ADD PRIMARY KEY (`reklamy_id`);

--
-- Tablo için indeksler `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`users_id`);

--
-- Tablo için indeksler `tbl_yorumlar`
--
ALTER TABLE `tbl_yorumlar`
  ADD PRIMARY KEY (`yorumlar_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kryptonit3_counter_page`
--
ALTER TABLE `kryptonit3_counter_page`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kryptonit3_counter_visitor`
--
ALTER TABLE `kryptonit3_counter_visitor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_ilan`
--
ALTER TABLE `tbl_ilan`
  MODIFY `ilan_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_picture`
--
ALTER TABLE `tbl_picture`
  MODIFY `picture_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_reklamver`
--
ALTER TABLE `tbl_reklamver`
  MODIFY `reklamver_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_reklamyayinla`
--
ALTER TABLE `tbl_reklamyayinla`
  MODIFY `reklamy_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `users_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_yorumlar`
--
ALTER TABLE `tbl_yorumlar`
  MODIFY `yorumlar_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
