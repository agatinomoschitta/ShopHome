-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 05, 2020 alle 08:30
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shophome`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `categories`
--

CREATE TABLE `categories` (
  `categoryID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `categories`
--

INSERT INTO `categories` (`categoryID`, `description`, `created_at`, `updated_at`) VALUES
('Pasta', 'Pasta secca, fresca, farina senza glutini, farina di riso, ecc.', '2020-04-03 14:16:54', '2020-04-03 14:16:54'),
('Pesce', '', '2020-04-27 13:19:56', '2020-04-27 13:19:56');

-- --------------------------------------------------------

--
-- Struttura della tabella `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_04_03_12_user', 1),
(2, '2020_04_03_13_category', 1),
(3, '2020_04_03_14_product', 1),
(4, '2020_04_03_15_order', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `orderrows`
--

CREATE TABLE `orderrows` (
  `productID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `orderrows`
--

INSERT INTO `orderrows` (`productID`, `orderID`, `quantity`, `amount`, `created_at`, `updated_at`) VALUES
('ES1053-S', '2222222', '2', '12', '2020-05-04 16:55:18', '2020-05-04 16:55:18'),
('ES1053-S', '222225212', '10', '22', '2020-05-04 16:56:01', '2020-05-04 16:56:01'),
('ES1053-S', '2599353', '1', '4', '2020-04-30 10:08:31', '2020-04-30 10:08:31'),
('ES1068-S', '1374600', '1', '12.5', '2020-04-30 10:02:28', '2020-04-30 10:02:28'),
('ES1068-S', '2599353', '1', '12.5', '2020-04-30 10:08:31', '2020-04-30 10:08:31'),
('ES1068-S', '4293394', '1', '12.5', '2020-04-28 05:02:10', '2020-04-28 05:02:10'),
('ES1124-S', '1374600', '1', '1.2', '2020-04-30 10:02:28', '2020-04-30 10:02:28'),
('SB587ZS-45', '1374600', '1', '0.79', '2020-04-30 10:02:28', '2020-04-30 10:02:28'),
('SB587ZS-45', '9577149', '1', '0.79', '2020-04-27 10:38:15', '2020-04-27 10:38:15');

--
-- Trigger `orderrows`
--
DELIMITER $$
CREATE TRIGGER `insertted` AFTER INSERT ON `orderrows` FOR EACH ROW update products set products.quantity_in_stock=products.quantity_in_stock-NEW.quantity
where products.code=NEW.productID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura della tabella `orders`
--

CREATE TABLE `orders` (
  `contactNumber` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `orderID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `orders`
--

INSERT INTO `orders` (`contactNumber`, `orderID`, `address`, `country`, `city`, `state`, `amount`, `created_at`, `updated_at`) VALUES
('3471984348', '2599353', 'Antonio Gramsci 17', 'Adrano', 'Catania', 'Italia', 12.00, '2020-04-30 10:08:31', '2020-04-30 10:08:31');

-- --------------------------------------------------------

--
-- Struttura della tabella `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('agatinomoschitta@gmail.com', '$2y$10$Z2ryo7CqAKbeWjf8BJM1k.zlheoHmLZVVqc1cSu8SSHTH/5YI/mNm', '2020-04-05 11:27:24');

-- --------------------------------------------------------

--
-- Struttura della tabella `products`
--

CREATE TABLE `products` (
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity_in_stock` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `products`
--

INSERT INTO `products` (`code`, `title`, `description`, `img_url`, `category`, `price`, `quantity_in_stock`, `created_at`, `updated_at`) VALUES
('ES1053-S', 'Petto di pollo amadori', 'Il miglior petto di pollo', 'product_images/27b466da60204068a8ddc23940d288e7.png', 'Pasta', 14.00, 88, '2020-04-30 10:07:26', '2020-05-04 14:44:51'),
('ES1068-S', 'Gamberetti di mazancolle', 'Gamberetti vivi vivi', 'product_images/a913c94fff509466eb0110499cd6f64e.png', 'Pesce', 12.50, 500, '2020-04-27 11:23:25', '2020-04-29 08:12:07'),
('ES1124-S', 'Riso scotti', 'Il miglior riso del mondo', 'product_images/cc2f612040a4ad57aa0b051c48dce444.png', 'Pasta', 1.20, 100, '2020-04-29 08:18:07', '2020-05-04 13:19:53'),
('SB587ZS-45', 'Spaghetti barilla BIOLOGICI', 'Spaghetti barilla bio, integrali, numero 7, 1 kg', 'product_images/f6196c06699378e134d327d502cbcf39.png', 'Pasta', 1.20, 250, '2020-04-04 07:03:08', '2020-05-04 12:56:47');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `contactNumber` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `id` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `cap` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`name`, `contactNumber`, `password`, `remember_token`, `updated_at`, `created_at`, `id`, `surname`, `address`, `cap`, `country`, `city`, `state`, `role`) VALUES
('agato', '3203538936', '$2y$10$ZUaXfkMPOgsxSVB42EB34uztYR0jkunEmMeSlwwct2u5VMgwEzNBq', NULL, '2020-04-20 07:22:04', '2020-04-20 07:22:04', NULL, 'moschetz', 'pzz san francy', '95031', 'Aderno', 'Ct', 'IT', 0),
('Agatino', '3296623128', '$2y$10$1F7iRHLwBhb6JsiDGoAmAuhSutVdJE2RBaBl5r5JLmAC1AkWjuArG', 'xgQybuhKPQnK0cFU6PpGsa3jxhLKWry2nGrHx5disjcBvuHf2ZxqNqheFXlO', '2020-04-27 08:41:36', '2020-04-05 14:36:32', NULL, 'Moschittaa', 'Piazza San Francesco 31', '95031', 'Adrano', 'Catania', 'Italia', 1),
('Pietro', '3471984348', '$2y$10$S6QnZLeLdFprzg1m3duDougg2PkZImRghAhB0kc3rNdmhVqcGDJ8.', NULL, '2020-04-20 07:56:01', '2020-04-20 07:14:32', NULL, 'Moschitta', 'Antonio Gramsci 17', '95031', 'Adrano', 'Catania', 'Italia', 0),
('dsafdsf', '359849964', '$2y$10$HkqcauLnT.jcaUQdfBohb.7edCLDAgOj1hiUnwloPCFCF5CLundOC', NULL, '2020-04-20 07:29:49', '2020-04-20 07:29:49', NULL, 'dsfdsf', 'dsfdsf', 'dfsfsdf', 'dfssdf', 'dsfsd', 'dsfsdf', 0),
('Federico', '3658774123', '$2y$10$ggzWgUMSxvcAfUmrSeXpouglT3GJBtWE4DnpdeRgecmmvHL4SGjpG', NULL, '2020-04-27 08:45:45', '2020-04-27 08:44:33', NULL, 'Fausto', 'sddfsds', '51525', 'sdfdsfds', 'dsfdsfds', 'sdfsdfsd', 0),
('asdasdfads', '4654654654', '$2y$10$OFtT.Tv0psjdKxKKw8NnqehFR8SwMH7Gj.5LxXcOwfj1Mfz16DKxC', NULL, '2020-04-20 07:32:45', '2020-04-20 07:32:45', NULL, 'asdasdasd', 'asdasdasd', '95031', 'sadasd', 'asdasdas', 'asdas', 0),
('sadasdsdas\\', '5655466656', '$2y$10$vtUDOekD3wAhe4aKkWATyOIldPBHohV23Sj4HkQ01kzHvcMa4.78K', NULL, '2020-04-20 07:37:33', '2020-04-20 07:37:33', NULL, 'hjg', 'hvhj', 'hjjhghj', 'hjgjh', 'hghjgjh', 'hjhjjhhg', 0),
('dsffdsdsf', '654654465', '$2y$10$b32I3jvWUCtrinBUqD0zWOpkJU0G.JXzO49twC8HKHCPTnSHCRGeC', NULL, '2020-04-20 07:35:13', '2020-04-20 07:35:13', NULL, 'dfsdfdsfs', 'dsfsddfsd', 'sdfsdfsd', 'sdfsdfsd', 'sdfdsf', 'sdfdsf', 0),
('sadfasf', '65465465465', '$2y$10$5QqHCsLCnCgpOPRcoz.7veuzI2B80Zmk5905DjLBxEohJyFXMpvCy', NULL, '2020-04-20 07:30:36', '2020-04-20 07:30:36', NULL, 'dsafdsf', 'sdfsd', 'sdfdsds', 'dsdds', 'dssddsds', 'dssdsdds', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indici per le tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `orderrows`
--
ALTER TABLE `orderrows`
  ADD PRIMARY KEY (`productID`,`orderID`);

--
-- Indici per le tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`contactNumber`,`orderID`),
  ADD KEY `orders_contactnumber_index` (`contactNumber`);

--
-- Indici per le tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`code`),
  ADD KEY `products_category_index` (`category`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`contactNumber`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `orderrows`
--
ALTER TABLE `orderrows`
  ADD CONSTRAINT `orderrows_productid_foreign` FOREIGN KEY (`productID`) REFERENCES `products` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
