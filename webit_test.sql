-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Värd: localhost:8889
-- Tid vid skapande: 07 okt 2017 kl 21:50
-- Serverversion: 5.6.25
-- PHP-version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `webit_test`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `books`
--

CREATE TABLE `books` (
  `id` int(10) unsigned NOT NULL,
  `book_package_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `books`
--

INSERT INTO `books` (`id`, `book_package_id`, `title`, `price`, `created_at`, `updated_at`) VALUES
(4, 3, 'bok 10', 540.00, '2017-10-07 06:26:54', '2017-10-07 10:42:24'),
(9, 4, 'bok 1', 15.00, '2017-10-07 10:09:45', '2017-10-07 10:42:40'),
(11, 4, 'Bok 5', 5.00, '2017-10-07 10:42:46', '2017-10-07 10:42:46'),
(12, 6, 'Bok 18', 12.00, '2017-10-07 16:01:52', '2017-10-07 16:06:57'),
(13, 6, 'Bok 6', 65.00, '2017-10-07 16:05:39', '2017-10-07 16:05:39'),
(14, 6, 'Bok 13', 13.00, '2017-10-07 16:05:48', '2017-10-07 16:05:48'),
(15, 6, 'Bok 55', 555.00, '2017-10-07 16:06:07', '2017-10-07 16:06:07'),
(16, 6, 'bok 1', 55.00, '2017-10-07 16:06:16', '2017-10-07 16:06:57'),
(17, 7, 'bok 22', 22222.00, '2017-10-07 17:14:36', '2017-10-07 17:14:51'),
(18, 7, 'snygg bok', 123.00, '2017-10-07 17:15:42', '2017-10-07 17:15:42'),
(19, 9, 'asd', 123.00, '2017-10-07 17:39:45', '2017-10-07 17:39:45'),
(20, 9, 'qwe', 123.12, '2017-10-07 17:41:25', '2017-10-07 17:41:25');

-- --------------------------------------------------------

--
-- Tabellstruktur `book_packages`
--

CREATE TABLE `book_packages` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fixed_price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `book_packages`
--

INSERT INTO `book_packages` (`id`, `name`, `fixed_price`, `created_at`, `updated_at`) VALUES
(2, 'paket2', 10.00, '2017-10-07 06:19:46', '2017-10-07 06:19:46'),
(3, 'Gratis paket', 0.00, '2017-10-07 06:26:45', '2017-10-07 10:42:29'),
(4, 'paket 333', NULL, '2017-10-07 07:09:38', '2017-10-07 10:10:05'),
(5, 'Paket 4', NULL, '2017-10-07 08:01:32', '2017-10-07 08:01:32'),
(6, 'Paket 5', 15.00, '2017-10-07 16:01:39', '2017-10-07 16:07:06'),
(7, 'Sista paketet nu', NULL, '2017-10-07 17:14:07', '2017-10-07 17:15:51'),
(8, 'Ännu ett paket', NULL, '2017-10-07 17:17:22', '2017-10-07 17:17:22'),
(9, 'coolt paket', 0.12, '2017-10-07 17:39:33', '2017-10-07 17:41:38');

-- --------------------------------------------------------

--
-- Tabellstruktur `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_10_06_150624_create_book_packages_table', 1),
(2, '2017_10_06_150711_create_books_table', 1);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_book_package_id_foreign` (`book_package_id`);

--
-- Index för tabell `book_packages`
--
ALTER TABLE `book_packages`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT för tabell `book_packages`
--
ALTER TABLE `book_packages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT för tabell `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_book_package_id_foreign` FOREIGN KEY (`book_package_id`) REFERENCES `book_packages` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
