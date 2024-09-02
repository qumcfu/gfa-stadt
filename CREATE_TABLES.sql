-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Erstellungszeit: 30. Aug 2024 um 14:20
-- Server-Version: 10.6.8-MariaDB-log
-- PHP-Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `color_codes`
--

CREATE TABLE `color_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `red` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `green` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `blue` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `alpha` int(10) UNSIGNED NOT NULL DEFAULT 255,
  `is_bright` tinyint(1) DEFAULT NULL,
  `customizable` tinyint(1) NOT NULL DEFAULT 1,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `editor_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `color_codes`
--

INSERT INTO `color_codes` (`id`, `name`, `hex`, `red`, `green`, `blue`, `alpha`, `is_bright`, `customizable`, `category`, `editor_id`, `created_at`, `updated_at`) VALUES
(1, 'IndianRed', '#CD5C5C', 205, 92, 92, 255, NULL, 1, 'red', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(2, 'LightCoral', '#F08080', 240, 128, 128, 255, NULL, 1, 'red', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(3, 'Salmon', '#FA8072', 250, 128, 114, 255, NULL, 1, 'red', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(4, 'DarkSalmon', '#E9967A', 233, 150, 122, 255, NULL, 1, 'red', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(5, 'LightSalmon', '#FFA07A', 255, 160, 122, 255, NULL, 1, 'red', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(6, 'Crimson', '#DC143C', 220, 20, 60, 255, NULL, 1, 'red', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(7, 'Red', '#FF0000', 255, 0, 0, 255, NULL, 1, 'red', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(8, 'FireBrick', '#B22222', 178, 34, 34, 255, 0, 1, 'red', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(9, 'DarkRed', '#8B0000', 139, 0, 0, 255, 0, 1, 'red', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(10, 'PoppyRed*', '#DC343B', 220, 52, 59, 255, NULL, 1, 'red', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(11, 'Vermilion*', '#E34234', 227, 66, 52, 255, NULL, 1, 'red', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(12, 'Pink', '#FFC0CB', 255, 192, 203, 255, 1, 1, 'pink', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(13, 'LightPink', '#FFB6C1', 255, 182, 193, 255, 1, 1, 'pink', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(14, 'HotPink', '#FF69B4', 255, 105, 180, 255, NULL, 1, 'pink', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(15, 'DeepPink', '#FF1493', 255, 20, 147, 255, NULL, 1, 'pink', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(16, 'MediumVioletRed', '#C71585', 199, 21, 133, 255, NULL, 1, 'pink', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(17, 'PaleVioletRed', '#DB7093', 219, 112, 147, 255, NULL, 1, 'pink', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(18, 'ParadisePink*', '#E63E62', 230, 62, 98, 255, NULL, 1, 'pink', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(19, 'LightSalmon', '#FFA07A', 255, 160, 122, 255, NULL, 1, 'orange', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(20, 'Coral', '#FF7F50', 255, 127, 80, 255, NULL, 1, 'orange', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(21, 'Tomato', '#FF6347', 255, 99, 71, 255, NULL, 1, 'orange', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(22, 'OrangeRed', '#FF4500', 255, 69, 0, 255, NULL, 1, 'orange', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(23, 'Tangerine*', '#F08000', 240, 128, 0, 255, 0, 1, 'orange', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(24, 'DarkOrange', '#FF8C00', 255, 140, 0, 255, NULL, 1, 'orange', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(25, 'Orange', '#FFA500', 255, 165, 0, 255, NULL, 1, 'orange', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(26, 'Gold', '#FFD700', 255, 215, 0, 255, NULL, 1, 'yellow', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(27, 'Yellow', '#FFFF00', 255, 255, 0, 255, NULL, 1, 'yellow', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(28, 'LightYellow', '#FFFFE0', 255, 255, 224, 255, 1, 1, 'yellow', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(29, 'LemonChiffon', '#FFFACD', 255, 250, 205, 255, 1, 1, 'yellow', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(30, 'LightGoldenrodYellow', '#FAFAD2', 250, 250, 210, 255, 1, 1, 'yellow', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(31, 'PapayaWhip', '#FFEFD5', 255, 239, 213, 255, 1, 1, 'yellow', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(32, 'Moccasin', '#FFE4B5', 255, 228, 181, 255, 1, 1, 'yellow', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(33, 'PeachPuff', '#FFDAB9', 255, 218, 185, 255, 1, 1, 'yellow', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(34, 'PaleGoldenrod', '#EEE8AA', 238, 232, 170, 255, 1, 1, 'yellow', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(35, 'Khaki', '#F0E68C', 240, 230, 140, 255, 1, 1, 'yellow', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(36, 'DarkKhaki', '#BDB76B', 189, 183, 107, 255, NULL, 1, 'yellow', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(37, 'Sunflower*', '#FFDA03', 255, 218, 3, 255, NULL, 1, 'yellow', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(38, 'CyberYellow*', '#FFD300', 255, 211, 0, 255, NULL, 1, 'yellow', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(39, 'MellowYellow*', '#F8DE7E', 248, 222, 126, 255, 1, 1, 'yellow', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(40, 'Lavender', '#E6E6FA', 230, 230, 250, 255, 1, 1, 'purple', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(41, 'Thistle', '#D8BFD8', 216, 191, 216, 255, NULL, 1, 'purple', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(42, 'Plum', '#DDA0DD', 221, 160, 221, 255, NULL, 1, 'purple', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(43, 'Violet', '#EE82EE', 238, 130, 238, 255, NULL, 1, 'purple', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(44, 'Orchid', '#DA70D6', 218, 112, 214, 255, NULL, 1, 'purple', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(45, 'Magenta', '#FF00FF', 255, 0, 255, 255, NULL, 1, 'purple', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(46, 'MediumOrchid', '#BA55D3', 186, 85, 211, 255, NULL, 1, 'purple', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(47, 'MediumPurple', '#9370DB', 147, 112, 219, 255, NULL, 1, 'purple', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(48, 'RebeccaPurple', '#663399', 102, 51, 153, 255, 0, 1, 'purple', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(49, 'BlueViolet', '#8A2BE2', 138, 43, 226, 255, 0, 1, 'purple', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(50, 'DarkViolet', '#9400D3', 148, 0, 211, 255, 0, 1, 'purple', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(51, 'DarkOrchid', '#9932CC', 153, 50, 204, 255, 0, 1, 'purple', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(52, 'DarkMagenta', '#8B008B', 139, 0, 139, 255, 0, 1, 'purple', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(53, 'Purple', '#800080', 128, 0, 128, 255, 0, 1, 'purple', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(54, 'Indigo', '#4B0082', 75, 0, 130, 255, 0, 1, 'purple', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(55, 'SlateBlue', '#6A5ACD', 106, 90, 205, 255, 0, 1, 'purple', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(56, 'DarkSlateBlue', '#483D8B', 72, 61, 139, 255, 0, 1, 'purple', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(57, 'MediumSlateBlue', '#7B68EE', 123, 104, 238, 255, 0, 1, 'purple', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(58, 'GreenYellow', '#ADFF2F', 173, 255, 47, 255, 1, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(59, 'Chartreuse', '#7FFF00', 127, 255, 0, 255, 1, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(60, 'LawnGreen', '#7CFC00', 124, 252, 0, 255, 1, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(61, 'Lime', '#00FF00', 0, 255, 0, 255, NULL, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(62, 'LimeGreen', '#32CD32', 50, 205, 50, 255, NULL, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(63, 'PaleGreen', '#98FB98', 152, 251, 152, 255, 1, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(64, 'LightGreen', '#90EE90', 144, 238, 144, 255, 1, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(65, 'MediumSpringGreen', '#00FA9A', 0, 250, 154, 255, NULL, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(66, 'SpringGreen', '#00FF7F', 0, 255, 127, 255, NULL, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(67, 'MediumSeaGreen', '#3CB371', 60, 179, 113, 255, NULL, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(68, 'SeaGreen', '#2E8B57', 46, 139, 87, 255, 0, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(69, 'ForestGreen', '#228B22', 34, 139, 34, 255, 0, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(70, 'Green', '#008000', 0, 128, 0, 255, 0, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(71, 'DarkGreen', '#006400', 0, 100, 0, 255, 0, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(72, 'YellowGreen', '#9ACD32', 154, 205, 50, 255, 1, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(73, 'OliveDrab', '#6B8E23', 107, 142, 35, 255, 0, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(74, 'Olive', '#808000', 128, 128, 0, 255, 0, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(75, 'DarkOliveGreen', '#556B2F', 85, 107, 47, 255, 0, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(76, 'MediumAquamarine', '#66CDAA', 102, 205, 170, 255, NULL, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(77, 'DarkSeaGreen', '#8FBC8B', 143, 188, 139, 255, NULL, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(78, 'LightSeaGreen', '#20B2AA', 32, 178, 170, 255, NULL, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(79, 'DarkCyan', '#008B8B', 0, 139, 139, 255, 0, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(80, 'Teal', '#008080', 0, 128, 128, 255, 0, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(81, 'Fern*', '#63B76C', 99, 183, 108, 255, NULL, 1, 'green', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(82, 'Cyan', '#00FFFF', 0, 255, 255, 255, NULL, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(83, 'LightCyan', '#E0FFFF', 224, 255, 255, 255, 1, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(84, 'PaleTurquoise', '#AFEEEE', 175, 238, 238, 255, 1, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(85, 'Aquamarine', '#7FFFD4', 127, 255, 212, 255, NULL, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(86, 'Turquoise', '#40E0D0', 64, 224, 208, 255, NULL, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(87, 'MediumTurquoise', '#48D1CC', 72, 209, 204, 255, NULL, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(88, 'DarkTurquoise', '#00CED1', 0, 206, 209, 255, NULL, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(89, 'CadetBlue', '#5F9EA0', 95, 158, 160, 255, NULL, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(90, 'SteelBlue', '#4682B4', 70, 130, 180, 255, NULL, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(91, 'LightSteelBlue', '#B0C4DE', 176, 196, 222, 255, 1, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(92, 'PowderBlue', '#B0E0E6', 176, 224, 230, 255, 1, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(93, 'LightBlue', '#ADD8E6', 173, 216, 230, 255, 1, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(94, 'SkyBlue', '#87CEEB', 135, 206, 235, 255, 1, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(95, 'LightSkyBlue', '#87CEFA', 135, 206, 250, 255, 1, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(96, 'DeepSkyBlue', '#00BFFF', 0, 191, 255, 255, NULL, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(97, 'DodgerBlue', '#1E90FF', 30, 144, 255, 255, NULL, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(98, 'CornflowerBlue', '#6495ED', 100, 149, 237, 255, NULL, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(99, 'RoyalBlue', '#4169E1', 65, 105, 225, 255, 0, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(100, 'Blue', '#0000FF', 0, 0, 255, 255, 0, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(101, 'MediumBlue', '#0000CD', 0, 0, 205, 255, 0, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(102, 'DarkBlue', '#00008B', 0, 0, 139, 255, 0, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(103, 'Navy', '#000080', 0, 0, 128, 255, 0, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(104, 'MidnightBlue', '#191970', 25, 25, 112, 255, 0, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(105, 'CoolBlack*', '#002E63', 0, 46, 99, 255, 0, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(106, 'Liberty*', '#545AA7', 84, 90, 167, 255, 0, 1, 'blue', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(107, 'Cornsilk', '#FFF8DC', 255, 248, 220, 255, 1, 1, 'brown', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(108, 'BlanchedAlmond', '#FFEBCD', 255, 235, 205, 255, 1, 1, 'brown', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(109, 'Bisque', '#FFE4C4', 255, 228, 196, 255, 1, 1, 'brown', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(110, 'NavajoWhite', '#FFDEAD', 255, 222, 173, 255, 1, 1, 'brown', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(111, 'Wheat', '#F5DEB3', 245, 222, 179, 255, 1, 1, 'brown', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(112, 'BurlyWood', '#DEB887', 222, 184, 135, 255, NULL, 1, 'brown', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(113, 'Tan', '#D2B48C', 210, 180, 140, 255, NULL, 1, 'brown', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(114, 'RosyBrown', '#BC8F8F', 188, 143, 143, 255, NULL, 1, 'brown', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(115, 'SandyBrown', '#F4A460', 244, 164, 96, 255, NULL, 1, 'brown', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(116, 'Goldenrod', '#DAA520', 218, 165, 32, 255, NULL, 1, 'brown', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(117, 'DarkGoldenrod', '#B8860B', 184, 134, 11, 255, NULL, 1, 'brown', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(118, 'Peru', '#CD853F', 205, 133, 63, 255, NULL, 1, 'brown', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(119, 'Chocolate', '#D2691E', 210, 105, 30, 255, 0, 1, 'brown', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(120, 'SaddleBrown', '#8B4513', 139, 69, 19, 255, 0, 1, 'brown', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(121, 'Sienna', '#A0522D', 160, 82, 45, 255, 0, 1, 'brown', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(122, 'Brown', '#A52A2A', 165, 42, 42, 255, 0, 1, 'brown', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(123, 'Maroon', '#800000', 128, 0, 0, 255, 0, 1, 'brown', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(124, 'White', '#FFFFFF', 255, 255, 255, 255, 1, 1, 'white', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(125, 'Snow', '#FFFAFA', 255, 250, 250, 255, 1, 1, 'white', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(126, 'HoneyDew', '#F0FFF0', 240, 255, 240, 255, 1, 1, 'white', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(127, 'MintCream', '#F5FFFA', 245, 255, 250, 255, 1, 1, 'white', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(128, 'Azure', '#F0FFFF', 240, 255, 255, 255, 1, 1, 'white', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(129, 'AliceBlue', '#F0F8FF', 240, 248, 255, 255, 1, 1, 'white', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(130, 'GhostWhite', '#F8F8FF', 248, 248, 255, 255, 1, 1, 'white', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(131, 'WhiteSmoke', '#F5F5F5', 245, 245, 245, 255, 1, 1, 'white', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(132, 'SeaShell', '#FFF5EE', 255, 245, 238, 255, 1, 1, 'white', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(133, 'Beige', '#F5F5DC', 245, 245, 220, 255, 1, 1, 'white', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(134, 'OldLace', '#FDF5E6', 253, 245, 230, 255, 1, 1, 'white', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(135, 'FloralWhite', '#FFFAF0', 255, 250, 240, 255, 1, 1, 'white', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(136, 'Ivory', '#FFFFF0', 255, 255, 240, 255, 1, 1, 'white', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(137, 'AntiqueWhite', '#FAEBD7', 250, 235, 215, 255, 1, 1, 'white', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(138, 'Linen', '#FAF0E6', 250, 240, 230, 255, 1, 1, 'white', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(139, 'LavenderBlush', '#FFF0F5', 255, 240, 245, 255, 1, 1, 'white', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(140, 'MistyRose', '#FFE4E1', 255, 228, 225, 255, 1, 1, 'white', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(141, 'Gainsboro', '#DCDCDC', 220, 220, 220, 255, 1, 1, 'gray', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(142, 'LightGray', '#D3D3D3', 211, 211, 211, 255, 1, 1, 'gray', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(143, 'Silver', '#C0C0C0', 192, 192, 192, 255, 1, 1, 'gray', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(144, 'DarkGray', '#A9A9A9', 169, 169, 169, 255, NULL, 1, 'gray', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(145, 'Gray', '#808080', 128, 128, 128, 255, NULL, 1, 'gray', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(146, 'DimGray', '#696969', 105, 105, 105, 255, NULL, 1, 'gray', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(147, 'LightSlateGray', '#778899', 119, 136, 153, 255, NULL, 1, 'gray', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(148, 'SlateGray', '#708090', 112, 128, 144, 255, NULL, 1, 'gray', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(149, 'DarkSlateGray', '#2F4F4F', 47, 79, 79, 255, 0, 1, 'gray', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(150, 'Black', '#000000', 0, 0, 0, 255, 0, 1, 'gray', NULL, '2023-05-08 15:35:26', NULL),
(151, 'Einstellungen', '#606070', 96, 96, 112, 255, 0, 1, 'custom', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(152, 'Einstellungen (Alternativ)', '#646474', 100, 100, 116, 255, 0, 1, 'custom', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(153, 'Daten', '#609890', 96, 152, 144, 255, 0, 1, 'custom', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(154, 'Daten (Alternativ)', '#509c94', 80, 156, 148, 255, 0, 1, 'custom', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(155, 'Dateiverwaltung', '#90a060', 144, 160, 96, 255, 0, 1, 'custom', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(156, 'Dateiverwaltung (Alternativ)', '#94a450', 148, 164, 80, 255, 0, 1, 'custom', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(157, 'Mitgliedschaften', '#906090', 144, 96, 144, 255, 0, 1, 'custom', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(158, 'Mitgliedschaften (Alternativ)', '#945094', 148, 80, 148, 255, 0, 1, 'custom', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(159, 'Vorhaben', '#a06060', 160, 96, 96, 255, 0, 1, 'custom', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(160, 'Vorhaben (Alternativ)', '#a85050', 168, 80, 80, 255, 0, 1, 'custom', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(161, 'Fragebögen', '#c0a060', 192, 160, 96, 255, 0, 1, 'custom', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(162, 'Fragebögen (Alternativ)', '#c4a450', 196, 164, 80, 255, 0, 1, 'custom', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(163, 'Skripte', '#589870', 88, 152, 112, 255, 0, 1, 'custom', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(164, 'Skripte (Alternativ)', '#48a060', 72, 160, 96, 255, 0, 1, 'custom', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(165, 'Benutzerverwaltung', '#5878a0', 88, 120, 160, 255, 0, 1, 'custom', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(166, 'Benutzerverwaltung (Alternativ)', '#5070a8', 80, 112, 168, 255, 0, 1, 'custom', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(167, 'Benutzergruppen', '#6060a0', 96, 96, 160, 255, 0, 1, 'custom', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(168, 'Benutzergruppen (Alternativ)', '#5050a5', 80, 80, 165, 255, 0, 1, 'custom', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(169, 'Dunkelblau (Grundfarbe FHE, Pant 281)', '#003366', 0, 51, 102, 255, 0, 1, 'fhe', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(170, 'Blau (Bauingenieurwesen, Pant 300)', '#0088CC', 0, 136, 204, 255, 0, 1, 'fhe', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(171, 'Graublau (Angewandte Informatik, Pant 5415)', '#7799BB', 119, 153, 187, 255, 0, 1, 'fhe', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(172, 'Mint (Gebäude- und Energietechnik, Pant 326)', '#009999', 0, 153, 153, 255, 0, 1, 'fhe', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(173, 'Petrol (Verkehrs- und Transportwesen, Pant 3155)', '#007788', 0, 119, 136, 255, 0, 1, 'fhe', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(174, 'Graugrün (Landschaftsarchitektur, Pant 5555)', '#558877', 85, 136, 119, 255, 0, 1, 'fhe', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(175, 'Dunkelgrün (Forstwirtschaft, Pant 3415)', '#007733', 0, 119, 51, 255, 0, 1, 'fhe', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(176, 'Hellgrün (Gartenbau, Pant 362)', '#339933', 51, 153, 51, 255, 0, 1, 'fhe', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(177, 'Grüngelb (Pant 5757)', '#666600', 102, 102, 0, 255, 0, 1, 'fhe', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(178, 'Gold (Bildung und Erziehung von Kindern, Pant 118)', '#a88624', 168, 134, 36, 255, 0, 1, 'fhe', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(179, 'Ockergelb (Pant 139)', '#cc9900', 204, 153, 0, 255, 0, 1, 'fhe', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(180, 'Gelb (Pant 104)', '#bbaa00', 187, 170, 0, 255, 0, 1, 'fhe', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(181, 'Sonnengelb (Wirtschaftswissenschaften, Pant 137)', '#ff9900', 255, 153, 0, 255, 0, 1, 'fhe', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(182, 'Orange (Soziale Arbeit, Pant orange 021)', '#ff6600', 255, 102, 0, 255, 0, 1, 'fhe', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(183, 'Rot (Spotfarbe für alle Bereiche, Pant 1795)', '#cc0000', 204, 0, 0, 255, 0, 1, 'fhe', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(184, 'Rotbraun (Konservierung und Restaurierung, Pant 194)', '#990000', 153, 0, 0, 255, 0, 1, 'fhe', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(185, 'Purpur (Pant 206)', '#cc0066', 204, 0, 102, 255, 0, 1, 'fhe', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(186, 'Grau (Architektur, Pant Warm Gray 8)', '#999088', 153, 144, 136, 255, 0, 1, 'fhe', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(187, 'Kieselgrau (Stadt- und Raumplanung, Pant 431)', '#60686b', 96, 104, 107, 255, 0, 1, 'fhe', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(188, 'BS_Primary', '#0d6efd', 13, 110, 253, 255, 0, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(189, 'BS_Primary_Border_Subtle', '#9ec5fe', 158, 197, 254, 255, 1, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(190, 'BS_Primary_BG_Subtle', '#cfe2ff', 207, 226, 255, 255, 1, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(191, 'BS_Success', '#198754', 25, 135, 84, 255, 0, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(192, 'BS_Success_Border_Subtle', '#a3cfbb', 163, 207, 187, 255, 1, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(193, 'BS_Success_BG_Subtle', '#d1e7dd', 209, 231, 221, 255, 1, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(194, 'BS_Info', '#0dcaf0', 13, 202, 240, 255, NULL, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(195, 'BS_Info_Border_Subtle', '#9eeaf9', 158, 234, 249, 255, 1, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(196, 'BS_Info_BG_Subtle', '#cff4fc', 207, 244, 252, 255, 1, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(197, 'BS_Warning', '#ffc107', 255, 193, 7, 255, NULL, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(198, 'BS_Warning_Border_Subtle', '#ffe69c', 255, 230, 156, 255, 1, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(199, 'BS_Warning_BG_Subtle', '#fff3cd', 255, 243, 205, 255, 1, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(200, 'BS_Danger', '#dc3545', 220, 53, 69, 255, 0, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(201, 'BS_Danger_Border_Subtle', '#f1aeb5', 241, 174, 181, 255, 1, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(202, 'BS_Danger_BG_Subtle', '#f8d7da', 248, 215, 218, 255, 1, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(203, 'BS_Light', '#f8f9fa', 248, 249, 250, 255, 1, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(204, 'BS_Secondary_Border_Subtle', '#c4c8cb', 196, 200, 203, 255, 1, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(205, 'BS_Secondary_BG_Subtle', '#e2e3e5', 226, 227, 229, 255, 1, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(206, 'BS_Gray200', '#e9ecef', 233, 236, 239, 255, 1, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(207, 'BS_Gray300', '#dee2e6', 222, 226, 230, 255, 1, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(208, 'BS_Gray400', '#ced4da', 206, 212, 218, 255, 1, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(209, 'BS_Gray500', '#adb5bd', 173, 181, 189, 255, NULL, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(210, 'BS_Gray600 (BS_Secondary)', '#6c757d', 108, 117, 125, 255, 0, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(211, 'BS_Gray700', '#495057', 73, 80, 87, 255, 0, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(212, 'BS_Gray800', '#343a40', 52, 58, 64, 255, 0, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26'),
(213, 'BS_Dark', '#212529', 33, 37, 41, 255, 0, 1, 'bootstrap', NULL, '2023-05-08 15:35:26', '2023-05-08 15:35:26');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entry_id` int(10) UNSIGNED DEFAULT NULL,
  `comment_id` int(10) UNSIGNED DEFAULT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `configurations`
--

CREATE TABLE `configurations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `chart_active` tinyint(1) NOT NULL DEFAULT 0,
  `chart_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bar',
  `chart_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `value_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mean',
  `screening_mode` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `interpolation_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `questionnaire_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `type_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `screening_id` int(10) UNSIGNED DEFAULT NULL,
  `priority` int(10) UNSIGNED NOT NULL DEFAULT 3,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `editor_id` int(10) UNSIGNED DEFAULT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `contents`
--

INSERT INTO `contents` (`id`, `questionnaire_id`, `order_id`, `type_id`, `screening_id`, `priority`, `text`, `short`, `info`, `author_id`, `editor_id`, `data`, `created_at`, `updated_at`) VALUES
(1,1,1,1,NULL,3,'Hat das Vorhaben Auswirkungen auf das Angebot des ÖPNV?','Angebot des ÖPNV','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Erreichbarkeit der ÖPNV-Haltestellen</li><li>Deckung des ÖPNV-Bedarfs verschiedener Bevölkerungsgruppen</li><li>Alternative Mobilitätssysteme</li><li>Barrierefreiheit der Verkehrssysteme und Haltestellen</li><li>Ausstattung der ÖPNV-Haltestellen</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(2,1,2,1,NULL,3,'Hat das Vorhaben Auswirkungen auf die Abhängigkeit vom Autoverkehr und Anreize zur aktiven Fortbewegung (Gehen, Radfahren)?','Abhängigkeit vom Autoverkehr und Anreize zu aktiver Fortbewegung','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Intensität der Autonutzung</li><li>Zugangsmöglichkeiten zu Autos und Parkplätzen</li><li>Nutzungsmöglichkeiten der Fuß- und Radwege, z.B. durch Geschwindigkeitsveränderungen</li><li>Motivation zur aktiven Fortbewegung</li><li>Nutzungsmöglichkeiten alternativer Fortbewegungsmittel</li><li>Share-Angebote für alternative Fortbewegungsmittel</li><li>Stellplätze für alternative Fortbewegungsmittel und „Park and Bike“ Angebote</li><li>Barrierefreiheit der Fußgehbereiche (Fußgängerzone, Gehwege, Einkaufsstraßen und -plätze)</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(3,1,3,1,NULL,3,'Hat das Vorhaben Auswirkungen auf die Verkehrssicherheit (insbesondere für Fußgänger:innen und Radfahrer:innen)?','Verkehrssicherheit für Fußgänger:innen und Radfahrer:innen','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Frequentierung des Autoverkehrs</li><li>Quantität und Qualität von Straßen- und Bahnübergängen</li><li>Beschaffenheit der Infrastruktur für Fußgänger:innen und Radfahrer:innen</li><li>Markierung von Fuß- und Radwegen auf Parkplätzen</li><li>Fahrbahnverengung oder -erweiterung </li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(5,1,4,1,NULL,3,'Hat das Vorhaben Auswirkungen auf den Anschluss an bestehende Verkehrsinfrastrukturen?','Anschluss an bestehende Verkehrsinfrastrukturen','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Anschluss des Straßennetzes (einschließlich Fuß- und Radwegen) an bestehende Netze</li><li>Verbindungen zu bestehenden Netzen</li><li>Größe der Baublöcke für Fuß- und Radverkehr</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(11,2,1,1,NULL,3,'Hat das Vorhaben Auswirkungen auf die Standorte von Beschäftigungsverhältnissen in Bezug auf Wohnen und Pendeln?','Standorte von Beschäftigungsverhältnissen','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Pendelzeiten</li><li>Verfügbarkeit  von Arbeitsplätzen in Wohnortnähe</li><li>Möglichkeiten aktiver Fortbewegung zur Arbeit</li><li>Erreichbarkeit der Arbeit mit ÖPNV</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(12,2,2,1,NULL,3,'Hat das Vorhaben Auswirkungen auf den Zugang zu gesunden Arbeitsverhältnissen?','Zugang zu gesunden Arbeitsverhältnissen','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Vielfältigkeit an Beschäftigungsmöglichkeiten, etwa bezüglich Berufsfeld und Qualifizierung</li><li>Angebote der Kinderbetreuung</li><li>Arbeitsplatzbezogene Maßnahmen zur Stressreduktion und Gesundheitsförderung</li><li>Barrierefreie und inklusive Gestaltung des Arbeitsplatzes</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(21,3,1,1,NULL,3,'Hat das Vorhaben Auswirkungen auf die Luftqualität?','Luftqualität','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Autofreier Verkehr etwa durch ÖPNV-Infrastruktur und Nahmobilitätsinfrastruktur</li><li>Emissionen aus Industrie- und Gewerbeanlagen</li><li>Grünräume zur Reduktion von Lärm- und Staubbelastung</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(22,3,2,1,NULL,3,'Hat das Vorhaben Auswirkungen auf die Wasserqualität, -sicherheit und -versorgung?','Wasserqualität, -sicherheit und -versorgung','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Vorbeugung von verunreinigtem Wasser</li><li>Regenwasserbewirtschaftung</li><li>Kommunale Wasseraufbereitung</li><li>nachhaltiges Gewässermanagement</li><li>Konzepte zum Umgang mit Starkregen und Überschwemmungen</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(23,3,3,1,NULL,3,'Hat das Vorhaben Auswirkungen auf Belästigungen und gesundheitsschädigende Effekte durch z.B. Lärm, Gerüche oder nächtliche Lichtemissionen?','Belästigungen und gesundheitsschädigende Effekte','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Berücksichtigung der Themen Lärm, Geruch, Lichtverschmutzung bei der Entscheidung über Nutzungsmischung/-trennung</li><li>Trennung/ Pufferzonen zwischen lärmempfindlicher Nutzung (Wohn- und Erholungsgebiete) und Gewerbegebieten, Industrie, Landwirtschaft, Bahnhöfe/Flughäfen</li><li>Einhalten von Lärmobergrenzen</li><li>Pufferzonen zu agrarischen lärm- und geruchsintensiven Nutzungen</li><li>Lärmkontrolle und -reduktion durch Gebäudeisolierung und Mehrfachverglasung und während der Konstruktions- und Betriebsphase</li><li>Nächtliche Beleuchtung zur Reduktion der negativen Auswirkungen in benachbarten Nutzungen</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(24,3,4,1,NULL,3,'Hat das Vorhaben Auswirkungen auf die Berücksichtigung von Gefahrenpotentialen (natürlich oder anthropogen verursacht) und von Maßnahmen zur Gefahrenminderung (Hochwasser und Waldbrandschutz, Altlastenuntersuchung)?','Berücksichtigung von Gefahrenpotentialen','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Berücksichtigung gesetzlicher Regularien bezüglich Hochwasser- und Waldbrandschutz</li><li>Ausarbeitung von Katastrophenschutz und Bevölkerungsschutzplänen</li><li>Untersuchung auf Altlasten und Involvierung der zuständigen Aufsichtsbehörden</li><li>Reduzierung des Gesundheitsrisikos elektromagnetischer Felder</li><li>Management- oder Minderungsplanung von möglichen Gefährdungen der umweltbezogenen Nachhaltigkeit</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(25,3,5,1,NULL,3,'Hat das Vorhaben Auswirkungen auf die Klimafolgenanpassung (z.B. Hitze)?','Klimafolgenanpassung (z.B. Hitze)','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Hitzebelastung im Quartier</li><li>Kühlungseffekte durch Bepflanzung und Wasserflächen</li><li>Schattenspendende Objekte</li><li>Durchlüftung</li><li>Versiegelungsgrad</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(31,4,1,1,NULL,3,'Hat das Vorhaben Auswirkungen auf den Zugang zu Grün- und Naturräumen?','Zugang zu Grün- und Naturräumen','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Grün- und Naturräume – Parks, Grünzüge, Felder, Wiesen, Wälder, Spielplätze – in unmittelbarer Wohnumgebung, bzw. gute Erreichbarkeit fußläufig, mit Fahrrad oder durch ÖPNV.</li><li>Grünanteil des Quartiers/Stadtteils</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(32,4,2,1,NULL,3,'Hat das Vorhaben Auswirkungen auf den Zugang zu öffentlichen Räumen mit hoher Aufenthaltsqualität unter Beachtung von Aspekten der Sicherheit, Gesundheitsförderlichkeit, Attraktivität und leichter Instandhaltung öffentlicher Freiräume?','Zugang zu öffentlichen Räumen','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Erfüllung der Bedürfnisse der Nutzenden (aktive/passive Erholung, Spiel, Sport, Veranstaltungen, Ruhezonen, Schattenplätze, Bänke) in öffentlichen Räumen, auch nicht grüne Räume, wie Plätze, in unmittelbarer Wohnumgebung</li><li>Berücksichtigung vulnerabler Gruppen</li><li>barrierefreier Zugang (Betretbarkeit mit Rollstuhl und Kinderwagen)</li><li>Beachtung von Sicherheitsaspekten: Schutz vor Verkehr, Unfällen, Verbrechen, Gewalt</li><li>Regelungen für Rauchen und Alkoholkonsum</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(33,4,3,1,NULL,3,'Hat das Vorhaben Auswirkungen auf die Aufenthaltsqualität von Straßenräumen im Sinne der Anregung zu körperlichen Aktivitäten?','Aufenthaltsqualität von Straßenräumen','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Attraktivität der Wohnumgebung: Gestaltung der Straßen und öffentlichen Plätze (z.B. Begleitgrün, Sitzgelegenheiten, Sehenswürdigkeiten, künstlerische Darstellungen)</li><li>Fassadengestaltung</li><li>Belebtheit der Erdgeschosszonen</li><li>Sicherstellung des Raumbedarfs und der Zugänglichkeit für Fußgänger und Radfahrer (auch zu beachten: Durchgangsverkehr)</li><li>Beleuchtung</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(41,5,1,1,NULL,3,'Hat das Vorhaben Auswirkungen auf die Möglichkeiten zu körperlicher Aktivität, insbesondere zu Fuß zu gehen, Fahrrad zu fahren oder andere Formen aktiver Fortbewegung?','Körperliche Aktivität','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Anreize zur körperlichen Aktivität sowie Förderung aktiver Fortbewegung</li><li>Flächennutzungen zur aktiven Fortbewegung</li><li>Konnektivität: direkte Wege, verknüpftes Straßen- und Gehwegenetze, beidseitige Fußwege</li><li>Beschaffenheit von Fuß- und Radwegen (z.B. Breite der Wege, Qualität der Wege, Pufferzonen zwischen Straßen und Gehwegen, Markierung der Wege, Barrierefreiheit)</li><li>attraktive Straßengestaltung für das Gehen und Radfahren (z.B. angemessene Ausstattung, Schutz vor Witterungseinflüssen)</li><li>Berücksichtigung der Topografie, Reduzierung von steilen Abhängen, Bereitstellung von Alternativen zu Treppenstufen, Rampen für Bordsteinkanten</li><li>Förderung einer sicheren aktiven Fortbewegung (Verkehrsberuhigung, Beschilderung, Beleuchtung, Vermeidung von Hindernissen)</li><li>Bereitstellung von Fahrradparkplätzen</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(51,6,1,1,NULL,3,'Hat das Vorhaben Auswirkungen auf die Wohnraumvielfalt?','Wohnraumvielfalt','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Vielfalt von Grundstücksgrößen/Wohnungstypen für unterschiedliche Lebensphasen/finanzielle Ressourcen</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(52,6,2,1,NULL,3,'Hat das Vorhaben Auswirkungen auf bezahlbaren Wohnraum?','Bezahlbarer Wohnraum','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Wohnmöglichkeiten für Haushalte mit niedrigen bis mittleren Einkommen</li><li>Bedarfsgerechtigkeit hinsichtlich Art/Größe/Lage</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(53,6,3,1,NULL,3,'Hat das Vorhaben Auswirkungen auf Wohnraum, der für die Gesundheit von Menschen und der Umwelt zuträglich ist?','Gesundheitsförderlicher Wohnraum','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Erreichbarkeit von Dienstleistungen, Schulen und Einrichtungen zu Fuß/Rad/ÖPNV</li><li>kompakte, wegstreckenverringernde Bauweise</li><li>Mindestanforderungen gesunder Wohnraum (Sicherheit, Abwassersystem, Belüftung)</li><li>Einhaltung von Bewertungssystemen für Energieeffizienz und Nachhaltigkeit beim Bauen</li><li>Vermeidung von kontaminierten Flächen</li><li>Anpassbarkeit auf veränderte Bedürfnisse (Alter, körperliche/psychische Einschränkungen)</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(61,7,1,1,NULL,3,'Hat das Vorhaben Auswirkungen auf die Bereitstellung und den Zugang zu Einrichtungen der sozialen Infrastruktur, um eine heterogene Bevölkerung zu erreichen und zu unterstützen?','Zugang zu Einrichtungen soz. Infrastruktur','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>bedarfsgerechte soziale Infrastruktur (demographisches Profil und Bedürfnisse)</li><li>Gesundheitsangebote</li><li>Kinderbetreuungsangebote</li><li>Bildungs- und Weiterbildungseinrichtungen universell und gleichberechtigt zugänglich (Bezahlbarkeit, Erreichbarkeit, Bedürfnisse verschiedener Bevölkerungsgruppen)</li><li>inklusive Gestaltung, Einbindung privater/gemeinwohlorientierter Akteur:innen</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(62,7,2,1,NULL,3,'Berücksichtigt das Vorhaben die Bedürfnisse der Gemeinschaft und deckt es aktuelle Bedarfslücken in Einrichtungen und/oder Angeboten ab?','Bedürfnisse der Gemeinschaft','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Berücksichtigung bestehender Dienstleistungsangebote, Angebotslücken, Bedürfnisse, Standorte, Einrichtungsmodelle</li><li>Berücksichtigung der verschiedenen Bedürfnisse der ansässigen Bevölkerungsanteile</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(71,8,1,1,NULL,3,'Hat das Vorhaben Auswirkungen auf ein Wohnumfeld, welches die soziale Interaktion und Verbindung unter den Menschen fördert?','Förderung sozialer Interaktion','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Gemeinschaftlich nutzbare Flächen/Einrichtungen/Treffpunkte</li><li>Veranstaltungsorte für gemeinschaftliche/kulturelle Events (Märkte, Feiern, Konzerte)</li><li>Ressourcen für gemeinschaftliche Events/Selbsthilfegruppen/gemeinschaftliche Organisationen</li><li>Unterstützung nachbarschaftlicher Initiativen</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(72,8,2,1,NULL,3,'Hat das Vorhaben Auswirkungen auf das Gemeinschaftsgefühl und die Ortsbindung?','Gemeinschaftsgefühl/Ortsbindung','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Berücksichtigung des Natur- und Kulturerbes</li><li>Kunst oder Designelemente mit Verbindung zum Ort</li><li>Unterstützung für gemeinschaftliche/kulturelle Initiativen</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(73,8,3,1,NULL,3,'Hat das Vorhaben Auswirkungen auf die lokale Beteiligung an Planung und am gemeinschaftlichen Leben?','Lokale Beteiligung','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Anhörung und Beteiligung der Bewohnerschaft bei der Umsetzung der Planung</li><li>Ermutigung zur Beteiligung und zum Eigenengagement im nachbarschaftlichen Leben</li><li>Möglichkeiten für Gemeinschaftsprojekte (z.B. Gemeinschaftsgärten)</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(74,8,4,1,NULL,3,'Hat das Vorhaben Auswirkungen auf soziale Benachteiligung und den gleichberechtigten Zugang zu Einrichtungen?','Soziale Benachteiligung','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Verbesserung der sozialen und gesundheitlichen Gerechtigkeit</li><li>Beachtung sozioökonomischer Unterschiede / Vermeidung einer Konzentration von sozioökonomisch benachteiligten Personen</li><li>Vielfalt an Wohnungsangeboten zur Förderung sozialer Mischung</li><li>Förderung der Inklusion/Integration von sozio-demografisch unterschiedlichen Gruppen und gleicher Zugang zu Angeboten/ Einrichtungen/ Beschäftigungsverhältnissen/ Verkehrsmitteln für benachteiligte Gruppen</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(75,8,5,1,NULL,3,'Hat das Vorhaben Auswirkungen auf eine Isolation oder Abtrennung der Gemeinschaft/des Quartiers?','Isolation oder Abtrennung der Gemeinschaft/des Quartiers','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Strategien zur Unterstützung der Integration benachteiligter Gruppen</li><li>Förderung der Verknüpfung mit benachbarten Gebieten/Bauvorhaben</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(81,9,1,1,NULL,3,'Berücksichtigt das Vorhaben Kriminalprävention und Fragen des Sicherheitsempfindens unterschiedlicher Bevölkerungsgruppen?','Kriminalprävention und Sicherheitsempfinden','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Grundsätze zur Kriminalprävention und Fragen zur Sicherheit im Quartier</li><li>Sicherheitsbedürfnisse verschiedener Bevölkerungsanteile</li><li>Sichtbeziehungen im Quartier</li><li>sichere/einfache Bewegung im Raum, z.B. deutliche Kennzeichnung und leichte Erreichbarkeit der Ein- und Ausgangsbereiche im öffentlichen Raum, klare/direkte Verbindung der öffentlichen Bereiche, Möglichkeit Umgebung zu beobachten, sichere/gut beleuchtete Wege, Berücksichtigung der Anzahl und Typen von Verbindungen)</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(91,10,1,1,NULL,3,'Hat das Vorhaben Auswirkungen auf den Zugang zu frischen, nahrhaften und bezahlbaren Lebensmitteln?','Zugang zu nahrhaften und bezahlbaren Lebensmitteln','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Zugang zu gesunden Lebensmitteln, z.B. Laufweite zwischen Wohngebäuden und Geschäften mit gesunden Lebensmittelangeboten</li><li>Reduzierung des Angebots und Verhinderung eines Überangebotes an Fastfood-Restaurants</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(92,10,2,1,NULL,3,'Hat das Vorhaben Auswirkungen auf die Unterstützung der lokalen Lebensmittelproduktion?','Unterstützung der lokalen Lebensmittelproduktion','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Förderung lokaler Lebensmittelproduktion</li><li>private Flächen für den Anbau von Obst und Gemüse</li><li>Unterstützung von Gemeinschaftsgärten/Kleingärten</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(93,10,3,1,NULL,3,'Hat das Vorhaben Auswirkungen auf den Erhalt von landwirtschaftlich genutzten Flächen?','Erhalt landwirtschaftlich genutzter Flächen','Diese Hinweise könnten bei der Bewertung helfen:<ul><li>Befassung mit potenziellen Konflikten zwischen städtischer und ländlicher Landnutzung</li><li>Pufferzonen zwischen agrarwirtschaftlichen Flächen und Wohnbaugebieten</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(101,11,1,2,NULL,3,'Kinder / Jugendliche','Kinder / Jugendliche',NULL,1,NULL,'{}','2024-08-28 15:40:40',NULL),
(102,11,2,2,NULL,3,'Schwangere','Schwangere',NULL,1,NULL,'{}','2024-08-28 15:40:40',NULL),
(103,11,3,2,NULL,3,'Alleinerziehende','Alleinerziehende',NULL,1,NULL,'{}','2024-08-28 15:40:40',NULL),
(104,11,4,2,NULL,3,'Ältere Menschen','Ältere Menschen',NULL,1,NULL,'{}','2024-08-28 15:40:40',NULL),
(105,11,5,2,NULL,3,'Migrant:innen','Migrant:innen',NULL,1,NULL,'{}','2024-08-28 15:40:40',NULL),
(106,11,6,2,NULL,3,'Armutsbetroffene/-gefährdete','Armutsbetroffene/-gefährdete',NULL,1,NULL,'{}','2024-08-28 15:40:40',NULL),
(107,11,7,2,NULL,3,'Arbeitslose / nicht Erwerbstätige','Arbeitslose / nicht Erwerbstätige',NULL,1,NULL,'{}','2024-08-28 15:40:40',NULL),
(108,11,8,2,NULL,3,'Bildungsferne Gruppen','Bildungsferne Gruppen',NULL,1,NULL,'{}','2024-08-28 15:40:40',NULL),
(109,11,9,2,NULL,3,'Menschen mit Behinderung','Menschen mit Behinderung',NULL,1,NULL,'{}','2024-08-28 15:40:40',NULL),
(110,11,10,2,NULL,3,'Psychisch oder chronisch Kranke','Psychisch oder chronisch Kranke',NULL,1,NULL,'{}','2024-08-28 15:40:40',NULL),
(111,11,11,2,NULL,3,'Besonders benachteiligte/gefährdete Gruppen, z.B. Wohnungslose, Suchterkrankte, Menschen ohne gesicherten Aufenthaltsstatus','Besonders benachteiligte/gefährdete Gruppen',NULL,1,NULL,'{}','2024-08-28 15:40:40',NULL),
(112,11,12,2,NULL,3,'Weitere benachteiligte/gefährdete Gruppen (bitte Gruppe in Begründung nennen)','Weitere Gruppen',NULL,1,NULL,'{}','2024-08-28 15:40:40',NULL),
(201,12,1,3,1,3,'Wird das Angebot von Öffentlichem Personennahverkehr (ÖPNV) als Priorität identifiziert?','ÖPNV als Priorität','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(202,12,2,3,1,3,'Werden ÖPNV-Linien vorgesehen, um das entsprechende Plangebiet an die nähere und weitere Umgebung anzuschließen?','ÖPNV-Linien zum Anschluss an Umgebung','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(203,12,3,3,1,2,'Weist der Plan ÖPNV-Linien mit einer ausreichenden Taktung aus, die verschiedene Bedürfnisse der Bevölkerung berücksichtigen?','Bedürfnisgerechte Taktung der ÖPNV-Linien','Die Bedürfnisse der Bevölkerung können u.a. den Verkehr zu Schulen, zum Einkaufen, zur Erholung oder zu Arbeitsstätten beinhalten.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(204,12,4,3,1,2,'Unterstützt das Projekt alternative Mobilitätssysteme, sowie Car-Sharing, e-Mobilität oder Leihradsysteme?','Unterstützung alternativer Mobilitätssysteme','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(205,12,5,3,1,3,'Sind Haltepunkte des ÖPNV in einer zumutbaren Entfernung von Wohnungen, Arbeitsstätten oder anderen örtlichen Zielen gelegen?','Haltepunkte des ÖPNV in näherer Umgebung','Als zumutbare Entfernungen zu Bushaltestellen sind 600m, zu Bahnhöfen 1200m ausreichend [7]. Um den Anforderungen an Barrierefreiheit für mobilitätseingeschränkte Personen an zumutbare Entfernungen gerecht zu werden, ist es empfehlenswert, diese folgendermaßen zu senken: 300-350m für Innenstadtbereiche, 350-400m für Vorortbereiche und 450-500m für Außengebiete [4,12].',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(206,12,6,3,1,3,'Sind öffentliche Verkehrssysteme und ihre Haltestellen so gestaltet, dass sie barrierefrei zugänglich sind?','Barrierefreiheit von Verkehrssystemen und Haltestellen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(207,12,7,3,1,2,'Stehen an Haltestellen des ÖPNV Fahrradstellplätze und/oder -leihstationen bereit?','Verfügbarkeit von Fahrradstellplätzen und -leihstationen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(208,12,8,3,1,1,'Können Fahrräder in Bussen, Zügen, Straßen- sowie S- und U-Bahnen mitgenommen werden?','Mitnahme von Fahrrädern im ÖPNV','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(209,12,9,3,1,1,'Sind an ÖPNV-Haltestellen der Nutzung entsprechende Einrichtungen vorgesehen?','Ausstattung von Haltestellen','Beispielhaft zu nennen seien:<ul><li>Schutzdächer</li><li>Sitzmöglichkeiten</li><li>angemessene Beleuchtung</li><li>Fahrgastinformationen</li><li>Routenplaner bzw. Karten</li><li>Fahrradparkplätze sowie ggf. Waschräume</li><li>Toiletten</li><li>Sanitärräume</li><li>Erfrischungen</li><li>Steckdosen und Internetzugang</li><li>Informationen zu der angrenzenden Umgebung und Verkehrsmöglichkeiten (einschließlich Fuß- und Radverkehr) für die weitere Fahrt</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(210,12,10,3,2,3,'Wurde in dem Projekt das Ziel formuliert, die Abhängigkeit vom Auto und die Nutzung des Autos einzuschränken und zu aktiveren Formen der Fortbewegung zu motivieren?','Abhängigkeit vom Auto','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(211,12,11,3,2,2,'Fördert das Projekt Fahrgemeinschaften oder Car-Sharing, beispielsweise durch ausgewiesene Parkplätze für Car-Sharing-Betreibende?','Förderung von Fahrgemeinschaften oder Car-Sharing','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(212,12,12,3,2,2,'Fördert das Projekt die Verringerung von Parkraum in städtischen Gebieten einschließlich der Umnutzung von Pkw-Parkplätzen zu Fahrradstellplätzen oder Radwegen?','Verringerung oder Umnutzung von Parkflächen','Hervorzuheben sei die Verringerung von Parkraum in städtischen Gebieten, in denen gute ÖPNV-Angebote verfügbar sind.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(213,12,13,3,3,3,'Gibt es besondere Merkmale, die eine Gefährdung der Sicherheit darstellen, so wie stark befahrene Straßen, die Schulen von Wohnbebauung trennen, Bahnübergänge etc.?','Sicherheitsgefährdende Merkmale','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(214,12,14,3,3,2,'Gibt es im Plangebiet Orte sowohl mit hohem Fuß- und Radverkehrsaufkommen als auch hohem Kraftfahrzeugaufkommen, die von zusätzlichen Sicherheitsmaßnahmen profitieren können?','Sicherheitsmaßnahmen für Orte mit hohem Verkehrsaufkommen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(215,12,15,3,3,3,'Wird bei der Planung von Gebäudezugängen und Einfahrten die Sicherheit von Radfahrer:innen und Fußgänger:innen priorisiert?','Planung und Sicherheit von Gebäudezugängen und Einfahrten','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(216,12,16,3,3,3,'Gibt es an Punkten, in denen die Fahrspuren verengt werden, Möglichkeiten für Fahrradfahrer:innen, ungehindert und gefahrenfrei fahren zu können?','Gefahrenfreiheit von Radfahrer:innen bei Fahrspurverengungen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(217,12,17,3,3,2,'Beinhaltet das Projekt Maßnahmen mit positiven Auswirkungen auf eine sichere Fortbewegung für Fußgänger:innen oder Fahrradfahrer:innen?','Sichere Fortbewegung von Fußgänger:innen und Radfahrenden','Beispielhaft zu nennen seien:<ul><li>Verkehrsberuhigungen</li><li>eindeutige und gut sichtbare Beschilderung</li><li>angemessene Beleuchtung</li><li>Vermeidung von Hindernissen wie z.B. Pfosten etc.</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(218,12,18,3,5,3,'Schlägt das Projekt Maßnahmen zur Förderung von Fuß- und Radverkehr vor?','Maßnahmen zur Förderung von Fuß- und Radverkehr','Beispielhaft zu nennen seien:<ul><li>Ausbau des Fahrrad- und Fußwegenetzes</li><li>Geschwindigkeitsbeschränkungen</li><li>strikte Parkraumbewirtschaftung</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(219,12,19,3,5,1,'Enthält das Projekt Anreize, um Fahrradnutzungen wie „Bike and Ride“ oder gemeinsame Fahrradnutzungssysteme oder Ähnliches zu fördern?','Anreize zur Förderung von Fahrradnutzungen','Das Konzept Bike and Ride kann beispielsweise Fahrradparkhäuser an ÖPNV-Haltepunkten beinhalten.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(220,12,20,3,5,2,'Gibt es dort, wo mehr Fuß- und Radverkehr gewünscht ist, Straßenbegleitgrün wie Bäume?','Straßenbegleitgrün an Orten, an denen Fuß- und Radverkehr gewünscht ist','Straßenbegleitgrün dient als Maßnahme zur Verbesserung der Aufenthalts- und Bewegungsqualität, zum Hitzeschutz und zur Reduktion von Verkehrsgeschwindigkeiten.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(221,12,21,3,5,3,'Sind Fußgängerbereiche so gestaltet, dass sie barrierefrei zugänglich sind?','Barrierefreiheit von Fußgängerbereichen','Unter Fußgängerbereichen werden u.a. Fußgängerzonen, Gehwege, Einkaufsstraßen und -plätze verstanden.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(222,12,22,3,5,3,'Fördert das Projekt eine Integration von neuen Entwicklungen in bestehende räumliche Strukturen oder zentrale Zielorte der Bevölkerung?','Integration neuer Entwicklungen in bestehende räumliche Strukturen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(223,12,23,3,5,2,'Schließt das Straßennetz, einschließlich der Fuß- und Radwege, an bestehende Strukturen an und schafft es neue Verbindungen?','Anschluss des Straßennetzes und neue Verbindungen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(231,13,1,3,11,3,'Behindert das Vorhaben den Zugang der Wohnbevölkerung zu einer Vielzahl an Beschäftigungsmöglichkeiten in einer annehmbaren Pendelzeit?','Behinderung des Zugangs zu Beschäftigungsmöglichkeiten','Die angestrebte Pendelzeit der aktuellen/zukünftigen Wohnbevölkerung zu Beschäftigungsmöglichkeiten sollte dabei eine Fahrtzeit von 30 Minuten nicht überschreiten [3].',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(232,13,2,3,11,3,'Fördert das Projekt, dass Arbeitnehmer:innen den Öffentlichen Personennahverkehr (ÖPNV) oder Formen der aktiven Fortbewegung für den Arbeitsweg nutzen können?','Förderung von ÖPNV oder aktiver Fortbewegung für den Arbeitsweg','Arbeitsplätze sind möglichst in der Nähe zu Wohnstandorten anzusiedeln, um die Nutzung des motorisierten Individualverkehrs deutlich zu reduzieren und aktivere Formen der Fortbewegung (zu Fuß, mit dem Fahrrad) und/oder die Nutzung des ÖPNV zu fördern [3].',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(235,13,3,3,11,2,'Sind Quartiers- und Stadtteilzentren so gestaltet, dass sie vielfältig genutzt werden können?','Vielfältige Nutzbarkeit von Quartiers- und Stadtteilzentren','Ermöglicht wird dies beispielsweise, indem Quartiers-/Stadtteilzentren eine räumliche Konzentration und Durchmischung von Arbeitsstätten, Wohngebieten, Öffentlichen (Frei-)Räumen und Flächen sowie Bildungs- und Weiterbildungseinrichtungen aufweisen [3].',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(236,13,4,3,11,3,'Befördert das Vorhaben, dass Bildungseinrichtungen und Arbeitsstätten sowohl in unmittelbarer Nähe zu Wohngebieten als auch an den ÖPNV angebunden sind?','Lage und Anbindung von Bildungseinrichtungen und Arbeitsstätten','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(237,13,5,3,12,3,'Sieht das Vorhaben Einrichtungen zur Kinderbetreuung für Arbeitnehmer:innen vor?','Einrichtungen zur Kinderbetreuung für Arbeitnehmer:innen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(238,13,6,3,12,3,'Schließen geplante Vorhaben für Arbeitsstellen Maßnahmen zur Stressreduktion und Gesundheitsförderung ein?','Maßnahmen zur Stressreduktion und Gesundheitsförderung an Arbeitsstellen','Ermöglicht wird dies durch Pausenplätze, Plätze für soziale Interaktionen und Netzwerke, Fitnessgeräte, Freiflächen und Ruhebereiche sowie den Zugang zu gesunden Mahlzeiten und Snacks [3].',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(239,13,7,3,12,3,'Sind die vorhandenen/geplanten Arbeitsstätten barrierefrei und inklusiv gestaltet?','Barrierefreie und inklusive Arbeitsstätten','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(240,13,8,3,12,3,'Sind vorhandene/geplante berufliche Ausbildungseinrichtungen barrierefrei und inklusiv gestaltet?','Barrierefreie und inklusive Ausbildungseinrichtungen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(252,14,1,3,21,1,'Beinhaltet das Projekt die frühzeitige Bereitstellung einer ÖPNV-Infrastruktur sowie einer Nahmobilitätsinfrastruktur?','Frühzeitige Bereitstellung von ÖPNV- und Nahmobilitätsinfrastruktur','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(253,14,2,3,21,3,'Sind öffentliche Verkehrsmittel, Geh- und Fahrradwege in der Gestaltung des Projekts enthalten?','Öffentliche Verkehrsmittel, Gehwege und Fahrradwege','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(254,14,3,3,21,2,'Fördert das Projekt die Reduktion luftqualitätsmindernder Emissionen aus Industrie- und Gewerbeanlagen?','Reduktion von Emissionen aus Industrie- und Gewerbeanlagen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(255,14,4,3,21,3,'Gibt es Grünräume, um die Lärm- und Staubbelastung zu reduzieren?','Reduktion von Lärm- und Staubbelastung durch Grünräume','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(256,14,5,3,22,3,'Bestehen Maßnahmenpläne, um der Verunreinigung von Wasser und dem potenziellen Ausbruch von wasserbedingten Infektionskrankheiten vorzubeugen?','Vorbeugung der Verunreinigung von Wasser','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(257,14,6,3,22,3,'Bestehen konkrete Konzepte zum Umgang mit Starkregenereignissen und Überschwemmungen?','Konzepte zum Umgang mit Starkregenereignissen und Überschwemmungen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(258,14,7,3,23,3,'Zeigt das Projekt ein Bewusstsein für die Themen Lärm, Geruch und Lichtverschmutzung und berücksichtigt es diese bei der Entscheidung über Nutzungsmischung oder Nutzungstrennung?','Bewusstsein für Lärm, Gerüche und Lichtverschmutzung','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(259,14,8,3,23,2,'Wenn Industrie oder andere Quellen für Lärm-, Geruchs- oder Lichtemissionen in der Nähe von Wohngebieten angesiedelt werden: Wurden angemessene Untersuchungen unternommen und wurden angemessene Schutzmaßnahmen zur Reduzierung der Exposition ergriffen, um schädlichen Auswirkungen vorzubeugen?','Untersuchungen und Schutzmaßnahmen zu naher Industrie','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(260,14,9,3,23,3,'Fördert das Projekt Vorkehrungen, um Lärm zu kontrollieren oder zu reduzieren?','Kontrolle oder Reduktion von Lärm','Vorkehrungen, um Lärm zu kontrollieren oder zu reduzieren, können beispielsweise Gebäudeisolierung und Mehrfachverglasung sein. ',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(261,14,10,3,23,2,'Werden angemessene Pufferzonen zwischen Wohngebieten und Nutzungen, die Lärm, Gestank oder Lichtverschmutzung verursachen, wie zum Beispiel Industriegebiete, Abfallentsorgungsanlagen oder Flughäfen, eingehalten?','Einhaltung von Pufferzonen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(262,14,11,3,23,2,'Haben öffentliche Bereiche negative Auswirkungen auf benachbarte Nutzungen einschließlich Wohnnutzung durch ihre nächtliche Beleuchtung?','Negative Auswirkungen öffentlicher Bereiche auf benachbarte Nutzungen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(263,14,12,3,24,3,'Wurden im Projekt die gesetzlichen Regularien und Vorschriften bezüglich Hochwasser- und Waldbrandschutz im Rahmen der Katastrophenvorsorge berücksichtigt?','Berücksichtigung der Vorschriften bezüglich Hochwasser- und Waldbrandschutz','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(264,14,13,3,24,3,'Wurden für den Fall von Naturkatastrophen und anderen Gefahren Katastrophenschutz- und Bevölkerungsschutzpläne ausgearbeitet?','Ausarbeitung von Katastrophenschutz- und Bevölkerungsschutzplänen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(265,14,14,3,25,3,'Sieht das Planungsvorhaben den Erhalt von bestehenden Grün- und Wasserflächen vor, die als Kalt- und Frischluftentstehungsgebiete zur Verfügung stehen?','Erhalt von bestehenden Grün- und Wasserflächen','<p>Kaltluftentstehungsgebiete sind Flächen, die nachts die auf ihnen ruhende Luft abkühlen, wobei dieser Effekt von den Bodeneigenschaften und Vegetation abhängt. Solche Gebiete sind Teil von Kaltluftbahnen, durch die bodennahe Luftschichten mit Kaltluft aufgrund eines Gefälles ungehindert in Siedlungsgebiete strömen können.</p><p>Siedlungsklimatisch relevante Frischluftentstehungsgebiete sind zusammenhängende ausgedehnte, siedlungsnahe Waldflächen, die sich positiv auf die Luftqualität und -austausch sowie auf das Klima umliegender Siedlungsgebiete auswirken. Die produzierte Frischluft gelangt mithilfe von Frischluftbahnen, wie beispielsweise linearen Gewässerstrukturen, oder durch Kaltluftbahnen, die durch Gefälle entstehen, in die Siedlungsgebiete [8,22].</p>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(266,14,15,3,25,3,'Ist die Schaffung neuer oder die Erweiterung bestehender grüner und blauer Infrastruktur vorgesehen?','Schaffung oder Erweiterung grüner und blauer Infrastruktur','Bei blauer und grüner Infrastruktur handelt es sich sowohl um natürlich gewachsene als auch um naturnah angelegte Grün- und Wasserflächen. Beispielsweise zu nennen seien: Parks, Straßenbäume, Gründächer, innerstädtische Wassergebiete [23].',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(267,14,16,3,25,2,'Werden durch das Vorhaben bestehende Frischluftschneisen beeinträchtigt?','Beeinträchtigung bestehender Frischluftschneisen','Als <b>Frischluftbahnen bzw. -schneisen</b> werden freigehaltene Flächen in Städten bezeichnet, welche die inneren Stadtbezirke mit zirkulierender Luft aus dem Umland versorgen. Sie stellen ein wichtiges Instrument in der Klimaregulierung dar. Dabei kann es sich beispielsweise um lineare Gewässerstrukturen handeln [22,24].',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(268,14,17,3,25,2,'Befördert/erweitert das geplante Vorhaben bestehende Frischluftschneisen?','Beförderung und Erweiterung bestehender Frischluftschneisen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(269,14,18,3,25,1,'Ist die Pflanzung und Pflege klimatisch angepasster und resilienter Vegetation vorgesehen?','Pflanzung und Pflege klimatisch angepasster Vegetation','Als klimatisch angepasste und resiliente Vegetation zählen u.a. Bäume, Sträucher, Fassaden- und/oder Dachbegrünungen [1].',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(270,14,19,3,25,3,'Ist die Ausstattung mit Verschattungselementen im Vorhaben vorgesehen?','Ausstattung mit Verschattungselementen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(271,14,20,3,25,3,'Ist die Ausstattung mit Trinkwasserspendern im Vorhaben vorgesehen?','Ausstattung mit Trinkwasserspendern','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(282,15,1,3,31,3,'Hat die Bevölkerung Zugang zu Grün- oder Naturräumen innerhalb ihrer unmittelbaren Wohnumgebung und befinden diese sich in einer zumutbaren Entfernung?','Grün- oder Naturräume in unmittelbarer Entfernung zu Wohnumgebungen','Um den Zugang zu Grün- und Freiräumen für alle Bevölkerungsgruppen zu gewährleisten, sollten diese in „zumutbaren Entfernungen“ zu den Wohnstandorten verortet sein. Der Orientierungswert zur Beurteilung einer solchen „zumutbaren, fußläufigen“ Entfernung entspricht einem <b>Fußweg von ca. 5 Gehminuten</b> oder einer <b>räumlichen Entfernung zwischen 400-500 Metern</b> (Radius um den Wohnstandort). Diese Kennwerte sollten nach Möglichkeit nicht überschritten werden. Der Orientierungswert für das Einzugsgebiet von Grün- und Naturräumen kann angehoben werden, wenn sich diese in der Nähe zu Haltestellen des ÖPNV befinden [1].',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(283,15,2,3,31,3,'Sind die demografischen Prognosen bezüglich der Bevölkerungsgröße und deren Nachfrage nach Öffentlichen (Frei-)Räumen berücksichtigt worden?','Berücksichtigung demografischer Prognosen der Bevölkerungsgröße','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(284,15,3,3,31,3,'Sind die Öffentlichen (Frei-)Räume an Fuß- und Radwege und an Verkehrsnetze des ÖPNV angebunden?','Anbindung der Öffentlichen (Frei-)Räume an Verkehrsnetze des ÖPNV','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(285,15,4,3,31,2,'Kann die Bevölkerung größerer Wohnsiedlungen, inkl. ihrer Kinder, einen Öffentlichen Park, Spielplatz oder Naturraum zu Fuß oder mit dem Fahrrad erreichen?','Erreichbarkeit Öffentlicher Räume zu Fuß oder mit dem Fahrrad','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(286,15,5,3,31,3,'Werden Maßnahmen ergriffen, um bestehende Öffentliche (Frei-)Räume zu erhalten und ggfs. zu verbessern?','Maßnahmen zu Erhalt und Verbesserung bestehender Öffentlicher Räume','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(287,15,6,3,31,3,'Wurden wichtige Naturräume erkannt und erhalten und werden diese durch planerische Maßnahmen entsprechend geschützt?','Erhalt und Schutz wichtiger Naturräume','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(288,15,7,3,32,3,'Kann der geplante oder zu entwickelnde Öffentliche (Frei-)Raum möglichst viele/alle Bedürfnisse der Zielgruppen im Quartier erfüllen und werden Anreize für Nutzung und Aufenthalt geschaffen?','Erfüllung der Bedürfnisse der Zielgruppen des Quartiers','Hierzu zählen Ausstattungselemente wie Sitzgelegenheiten, öffentliche Toiletten, Trinkwasserspender, Verschattungselemente oder Wickelräume für Kleinkinder.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(289,15,8,3,32,2,'Bietet der Öffentliche (Frei-)Raum möglichst viele Angebote für aktive und passive Erholung sowie für spielerisches Lernen und Erleben?','Angebote für Erholung und spielerisches Lernen','Der Zugang zu nutzbaren Öffentlichen (Frei-)Räumen, etwa Parkanlagen, ist besonders für die <b>Entwicklung von Kindern</b> notwendig. Es sollten Gelegenheiten angeboten werden, die natürliche Umgebung eines Wohnortes frei und phantasievoll erleben zu können sowie spielerisch kennen zu lernen. Ein reines Angebot von Spielplätzen mit fest verbauten Geräten ist für die Förderung von Kreativität zwar eine gute Grundlage, aber nicht ausreichend. Anders bieten (Frei-)Räume mit viel Vegetationsbewuchs und kleinen Wasserläufen vielseitige Möglichkeiten, dort gemeinschaftlich und kreativ zu spielen sowie zu lernen (LZG NRW 2019: 93).',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(291,15,9,3,32,1,'Wird bei der Planung auf die Einhaltung von Sicherheitsaspekten geachtet, sodass niemand bei der Ausübung seiner Freizeitaktivitäten eingeschränkt wird?','Einhaltung von Sicherheitsaspekten bei der Planung','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(292,15,10,3,32,2,'Ist der Öffentliche (Frei-)Raum in andere Nutzungen eingebunden, etwa in kommerzielle Einkaufseinrichtungen und kommunale Einrichtungen oder in Bibliotheken, Schulen oder Kinderbetreuungseinrichtungen?','Einbindung des Öffentlichen Raums in andere Nutzungen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(293,15,11,3,32,3,'Ist der Öffentliche (Frei-)Raum barrierefrei zugänglich und integrativ?','Barrierefreiheit von Öffentlichen Räumen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(294,15,12,3,32,1,'Unterstützt der Öffentliche (Frei-)Raum viele abwechslungsreiche Nutzungsmöglichkeiten zu jeder Tages- und auch Nachtzeit?','Unterstützung abwechslungsreicher Nutzungsmöglichkeiten zu jeder Zeit','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(295,15,13,3,32,3,'Schließt das Projekt Aspekte, Überlegungen oder Planungen ein, die vor Verkehr, Unfällen, Verbrechen und Gewalt sowie klimatischen Extremen (Hitze, Wind, Niederschlag) schützen?','Schutz vor Verkehr, Unfällen, Verbrechen, Gewalt und klimatischen Extremen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(296,15,14,3,32,1,'Bestehen Regelungen oder Verbote für das Rauchen und den Alkoholgenuss in den Öffentlichen (Frei-)Räumen?','Regelungen für das Rauchen und den Alkoholgenuss','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(297,15,15,3,32,2,'Sind Spielzonen/-bereiche so ausgestaltet, dass eine Aufsicht der spielenden Kinder zu gewährleisten ist?','Ausgestaltung von Spielbereichen zur Gewährleistung einer Aufsicht der spielenden Kinder','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(298,15,16,3,32,2,'Sind Spielzonen/-bereiche ausreichend mit Sitzgelegenheiten für Begleit-/Aufsichtspersonen ausgestattet?','Ausstattung von Spielbereichen mit Sitzgelegenheiten für Begleitpersonen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(299,15,17,3,32,3,'Ist der Öffentliche (Frei-)Raum effektiv vom Verkehr und dessen Lärm, Abgasen und Gefahren für die Nutzer:innen getrennt?','Effektive Trennung des Öffentlichen Raums vom Verkehr','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(300,15,18,3,32,1,'Bietet der Öffentliche (Frei-)Raum Rückzugsorte für Ruhe und Besinnung?','Verfügbarkeit von Rückzugsorten für Ruhe und Besinnung ','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(301,15,19,3,32,1,'Sind die Öffentlichen (Frei-)Räume so gestaltet, dass dort sozio-kulturelle Veranstaltungen stattfinden können?','Ermöglichung von sozio-kulturellen Veranstaltungen','Bietet der (Frei-)Raum beispielsweise die Möglichkeit zur Unterbringung und Durchführung von Märkten, (Stadt-)Festen und/oder Konzerten.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(302,15,20,3,33,3,'Werden innerhalb des Vorhabens Öffentliche (Frei-)Räume, etwa Straßen oder Öffentliche Plätze, so gestaltet, dass diese die Bevölkerung zum Aufenthalt/zur Nutzung anregen?','Gestaltung Öffentlicher Räume zur Anregung der Nutzung durch die Bevölkerung','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(303,15,21,3,33,3,'Sieht das Vorhaben eine Ausgestaltung des Öffentlichen Straßenraumes vor, welcher den Raumbedarf von Fußgänger- sowie Radfahrer:innen berücksichtigt und sicherstellt?','Sicherstellung des Raumbedarfs von Fußgänger:innen und Radfahrer:innen','Beispielsweise durch die Ausgestaltung von breiteren Fuß- und/oder Radwegen, die ohne Hindernisse nutzbar sind.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(304,15,22,3,33,2,'Sieht das Vorhaben eine Ertüchtigung/Öffnung von Erdgeschosszonen hin zum Öffentlichen (Frei-)Raum vor?','Ertüchtigung/Öffnung von Erdgeschosszonen hin zum Öffentlichen Raum','Zu diesen Ertüchtigungen/Öffnungen zählen beispielsweise ausgestaltete Schaufenster, Ladenlokale oder Erweiterungen von Außensitzflächen gastronomischer Einrichtungen.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(305,15,23,3,33,3,'Wird der Durchgangsverkehr des motorisierten Individualverkehrs eingeschränkt, wo das Leben im Öffentlichen (Frei-)Raum gefördert werden sollte?','Einschränkung des MIV zur Förderung des Lebens im Öffentlichen Raum','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(306,15,24,3,33,3,'Ermöglichen die vorhandenen und/oder geplanten Fuß- und Radwege eine Nutzung ohne ständige Unterbrechungen?','Nutzung von Fuß- und Radwegen ohne Unterbrechungen','Zu Unterbrechungen zählen beispielsweise Straßenüberführungen mit Ampelanlagen, welche mit langen Wartezeiten für Fußgänger:innen sowie Radfahrer:innen verbunden sind. Ein Lösungsansatz hierfür ist die Verwendung von Vorrangschaltungen für Fußgänger:innen sowie Fahradfahrer:innen, um sowohl die Wartezeiten zu verkürzen als auch die Attraktivität für diese beiden Fortbewegungsformen zu steigern.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(307,15,25,3,33,3,'Sind die Straßen und andere Öffentliche (Frei-)Räume gut beleuchtet, sodass sie auch bei Dunkelheit sicher zu nutzen sind?','Ausleuchtung von Straßen und Öffentlicher Räume zur sicheren Nutzbarkeit','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(308,15,26,3,33,3,'Sieht das Vorhaben eine hochwertige Gestaltung im Sinne von Klimaanpassungen vor?','Hochwertige Gestaltung im Sinne von Klimaanpassungen','Hierzu können beispielsweise die Verwendung/Installation von Verschattungselementen, Fassadenbegrünungen oder Wasserelementen zählen.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(309,15,27,3,33,2,'Wird der Bevölkerung die Möglichkeit gegeben, sich in die Gestaltung und die Pflege der Öffentlichen (Frei-)Räume einzubringen?','Möglichkeit der Bevölkerung, sich in Gestaltung und Pflege einzubringen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(310,15,28,3,33,1,'Sieht das Vorhaben Bereiche in den Öffentlichen (Frei-)Räumen vor, welche für soziale Interaktionen wie Picknicks, Grillveranstaltungen o.ä. genutzt werden können?','Bereiche in Öffentlichen Räumen zur Nutzung für soziale Interaktionen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(321,16,1,3,41,3,'Umschließt das Projekt Ziele, die körperliche Aktivität zu steigern und dazu zu ermutigen?','Steigerung von und Ermutigung zu körperlicher Aktivität','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(322,16,2,3,41,2,'Hat das Projekt positive Auswirkungen auf Risikogruppen, die den Empfehlungen der WHO für körperliche Aktivität nicht nachkommen können?','Positive Auswirkungen auf Risikogruppen','<b>Hinweis</b>: Die Weltgesundheitsorganisation (WHO) empfiehlt 150 bis 300 Minuten moderate bis intensive Ausdaueraktivität oder 75 bis 150 Minuten intensives Training pro Woche [14,15].',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(323,16,3,3,41,3,'Befinden sich die meisten Wohngebäude und Arbeitsplätze innerhalb einer zu Fuß zumutbaren Entfernung zu häufig angelaufenen Zielen zur Befriedigung der täglichen Grundbedürfnisse (wie Geschäften, Schulen, Parks und Haltestellen für öffentliche Verkehrsmittel)?','Annehmbare Wegstrecken zu häufig angelaufenen Zielen','<b>Hinweis</b>: 400 bis 500 Meter sind als zumutbare Entfernung bis zu den nächsten Einrichtungen des täglichen Bedarfs zu betrachten [37] zit. n. [6] . Als zumutbare Entfernung zu Bushaltestellen sind 600 Meter, zu Bahnhöfen 1200 Meter ausreichend [36]. Um den Anforderungen an Barrierefreiheit für mobilitätseingeschränkte Personen an zumutbare Entfernungen gerecht zu werden, ist es empfehlenswert, diese folgendermaßen zu senken: 300 bis 350 Meter für Innenstadtbereiche, 350 bis 400 Meter für Vorortbereiche und 450 bis 500 Meter für Außengebiete [38,39].',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(324,16,4,3,41,2,'Sind Fuß- und Radwege vorhanden, die die aktive Fortbewegung zu den Zielorten fördern?','Vorhandensein von Fuß- und Radwegen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(325,16,5,3,41,1,'Sind Straßen, einschließlich Fahrrad- und Fußwege, gut verbunden und bieten direkte Wege zum Zielort?','Direkte Wege zum Zielort','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(326,16,6,3,41,2,'Sind die Straßen so gestaltet, dass sie attraktiv, interessant und einladend für Fußgänger:innen sowie Radfahrer:innen sind und schließen sie eine als angenehm empfundene Landschaft und angemessene Ausstattung ein?','Attraktivität und Ausstattung von Straßen','<b>Hinweis</b>: Garagentore, leere Wandflächen, leere Parkplätze und zu viele Auffahrten entlang der Straße können Menschen hemmen, zu Fuß zu gehen oder Fahrrad zu fahren.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(327,16,7,3,41,1,'Sind die Einzelhandels- und Gewerbegebiete so gestaltet, dass zu aktiver Fortbewegung ermutigt wird?','Gestaltung von Einzelhandels- und Gewerbegebieten','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(328,16,8,3,41,1,'Sind Einzelhandels- und Gewerbegebiete mit öffentlichen Verkehrsmitteln, Fuß- und Fahrradwegen verbunden?','Verbindungen zu Einzelhandels- und Gewerbegebieten','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(329,16,9,3,41,3,'Sind Bereiche für Fußgänger:innen (wie öffentliche Plätze, Wege, Wanderwege, Einkaufszonen etc.) für alle zugänglich bzw. barrierefrei und so gestaltet, dass eine möglichst große Anzahl potenzieller Nutzer:innen angesprochen wird?','Zugänglichkeit zu Bereichen für Fußgänger:innen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(330,16,10,3,41,3,'Werden Fuß- und Fahrradwege im gesamten Projektgebiet angelegt?','Anlegen von Fuß- und Radwegen im Projektgebiet','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(331,16,12,3,41,1,'Berücksichtigen die Wege die Topografie, die Reduzierung von steilen Straßenzügen und das Bereitstellen von Alternativen zu Treppenstufen?','Berücksichtigung der Topografie bei der Wegplanung','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(332,16,13,3,41,2,'Sind Fußwege und gemeinsam mit Fahrrädern genutzte Fußwege so gestaltet, dass sie das Fahren und Gehen bequem ermöglichen?','Bequemes Gehen und Radfahren','<b>Hinweis</b>: Breite Wege in Gebieten, in denen eine große Anzahl von Menschen diese nutzen, wie zum Beispiel im Umfeld von Schulen, Haltestellen öffentlicher Verkehrsmittel und Plätzen in der Innenstadt.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(333,16,14,3,41,3,'Beinhaltet das Projekt genug Öffentlichen (Frei-)Raum für die zukünftige Gemeinschaft?','Öffentlicher Freiraum für die zukünftige Gemeinschaft','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(334,16,15,3,41,2,'Sind die geplanten Ressourcen angemessen und geeignet für alle Gruppen der künftigen Bevölkerung, vor allem für die vulnerablen Gruppen und diejenigen, die das höchste Risiko haben, nicht die WHO-Empfehlungen zur körperlichen Aktivität zu erreichen?','Angemessenheit und Eignung der geplanten Ressourcen','<b>Hinweis</b>: Die Weltgesundheitsorganisation (WHO) empfiehlt 150 bis 300 Minuten moderate bis intensive Ausdaueraktivität oder 75 bis 150 Minuten intensives Training pro Woche [14,15].',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(335,16,16,3,41,3,'Werden durch die Gestaltung Öffentlicher (Frei-)Räume viele Möglichkeiten zur körperlichen Aktivität geschaffen?','Möglichkeiten zur körperlichen Aktivität durch Gestaltung öffentlicher Freiräume','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(336,16,17,3,41,1,'Gibt es in Wohngebieten einen Quartiersplatz innerhalb einer zumutbaren Entfernung?','Vorhandensein eines fußläufigen Quartiersplatzes','<p><b>Hinweis</b>: Ein Quartiersplatz ist ein gemeinschaftlich genutzter öffentlicher Raum innerhalb eines städtischen Wohngebiets und stellt das urbane Equivalent zu einem traditionellen Dorfplatz dar. Er dient als zentraler Treffpunkt für soziale Interaktionen und Aktivitäten. Gestalterische Elemente wie Grün- oder Freiflächen, Sitzgelegenheiten oder Wasseranlagen sind typische Bestandteile von Quartiersplätzen. Letztendlich steht die Schaffung eines lebendigen und ansprechenden öffentlichen Raums im Mittelpunkt, der zur Stärkung des sozialen Zusammenhalts und der Lebensqualität in der Nachbarschaft beiträgt [40].</p><p>400 bis 500 Meter sind als zumutbare Entfernung bis zu den nächsten Einrichtungen des täglichen Bedarfs zu betrachten [37] zit. n. [6].</p>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(337,16,18,3,41,1,'Sind öffentliche Plätze und Erholungseinrichtungen sicher und komfortabel für Fußgänger:innen und Radfahrer:innen erreichbar?','Komfortable Erreichbarkeit öffentlicher Plätze','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(338,16,19,3,41,2,'Schließen Parks und Öffentliche (Frei-)Räume der Nutzung entsprechende Ausstattungsmerkmale mit ein? (Plätze zur Entspannung, Ruhezonen, Plätze für Versammlungen, Trinkbrunnen, Schattenräume, öffentliche Toiletten)','Ausstattung von Parks und öffentlichen Räumen','Als Ausstattungsmerkmale kommen in Frage:<ul><li>Plätze zur Entspannung</li><li>Ruhezonen</li><li>Plätze für Versammlungen</li><li>Trinkbrunnen</li><li>Schattenräume</li><li>öffentliche Toiletten</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(339,16,20,3,41,3,'Sind Parks und öffentliche Plätze so gestaltet, dass sie barrierefrei zugänglich und für alle Altersklassen geeignet sind?','Barrierefreiheit von Parks und öffentlichen Plätzen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(340,16,21,3,41,1,'Sind Turn- und Fitnessgeräte entlang der Wege bereitgestellt, um dazu zu ermutigen, die Wege für körperliche Aktivität zu nutzen (zusätzlich zu der Förderung dynamischerer Formen beiläufiger körperlicher Aktivität)?','Bereitstellung von Fitnessgeräten entlang der Wege','<b>Hinweis</b>: Turn- und Fitnessgeräte sind als Ergänzung zu der Förderung dynamischerer Formen beiläufiger körperlicher Aktivität zu sehen.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(347,16,11,3,41,2,'Verbinden Fuß- und Fahrradwege Schulen und Einkaufszentren mit Wohngebieten?','Fuß- und Radwege zwischen Schulen/Einkaufszentren und Wohngebieten','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(351,17,1,3,51,1,'Fördert das Vorhaben modifizierbaren Wohnraum, welcher an die Bedürfnisse unterschiedlicher Zielgruppen angepasst werden kann?','Förderung von modifizierbarem Wohnraum','Die Bedürfnisse beziehen sich hierbei besonders auf Personengruppen die älter, temporär/dauerhaft körperlich und/oder psychisch eingeschränkt sind.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(352,17,2,3,51,3,'Fördert das Vorhaben die Vielfalt von Grundstücksgrößen sowie von Haus- und Wohnungstypen in Wohngegenden, passend für Haushalte in unterschiedlichen Lebensphasen und mit unterschiedlichen finanziellen Ressourcen?','Förderung der Vielfalt von Grundstücksgrößen sowie Haus- und Wohnungstypen','Dies kann auch die Vielfalt innerhalb eines vorgeschlagenen Bauprojektes selbst betreffen. Vielfalt kann außerdem durch das Angebot eines relativ einheitlichen Bauprojektes erhöht werden, das sich vom Bestand in der Umgebung unterscheidet [2].',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(353,17,3,3,52,3,'Bietet das Projekt bezahlbare Wohnmöglichkeiten für Haushalte mit niedrigen und mittleren Einkommen?','Bezahlbare Wohnmöglichkeiten','Unter der Anforderung an „bezahlbaren Wohnraum“ ist zu verstehen, dass für eine Mietwohnung, inklusiver aller Betriebskosten, dauerhaft <span class=\'fst-italic\'>nicht mehr als ein Drittel des Haushaltseinkommens</span> aufgebracht werden sollte und ein Restbetrag für die Lebensführung vorhanden bleibt. Diese Herangehensweise ist unabhängig von der individuellen Einkommenssituation und universell anwendbar. Voraussetzung für „bezahlbares Wohnen“ ist dabei, dass die Anforderungen der Mieter:innen (Familien, Wohngemeinschaften, Singles, usw.) an die Wohnung, z.B. in Form, Lage und Größe, erfüllt werden [38].',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(354,17,4,3,52,3,'Entspricht das vorgeschlagene Wohnraumangebot den Anforderungen an bezahlbaren Wohnraum hinsichtlich Art, Größe und Lage?','Erfüllung der Anforderungen an bezahlbaren Wohnraum hinsichtlich Art, Größe und Lage','Unter der Anforderung an „bezahlbaren Wohnraum“ ist zu verstehen, dass für eine Mietwohnung, inklusiver aller Betriebskosten, dauerhaft <span class=\'fst-italic\'>nicht mehr als ein Drittel des Haushaltseinkommens</span> aufgebracht werden sollte und ein Restbetrag für die Lebensführung vorhanden bleibt. Diese Herangehensweise ist unabhängig von der individuellen Einkommenssituation und universell anwendbar. Voraussetzung für „bezahlbares Wohnen“ ist dabei, dass die Anforderungen der Mieter:innen (Familien, Wohngemeinschaften, Singles, usw.) an die Wohnung, z.B. in Form, Lage und Größe, erfüllt werden [38].',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(355,17,5,3,52,2,'Sieht das Vorhaben bezahlbaren Wohnraum über das Entwicklungsgebiet verteilt vor?','Verteilung von bezahlbarem Wohnraum über das Entwicklungsgebiet','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(356,17,6,3,52,1,'Ist bezahlbarer Wohnraum so gestaltet, dass er nicht von anderen Wohnformen zu unterscheiden ist?','Unterschiedslosigkeit der Gestaltung von bezahlbarem Wohnraum und anderen Wohnformen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(357,17,7,3,53,3,'Bietet das Vorhaben Wohnraum an Orten, die es der Bevölkerung erlauben, zu Fuß, mit dem Fahrrad oder mit dem Öffentlichen Personennahverkehr (ÖPNV) zur Arbeit oder zu Dienstleistungsangeboten zu gelangen?','Anbindung des Wohnraums an Arbeitsstätten und Dienstleistungsangebote','400–500m sind als zumutbare Entfernung bis zu den nächsten Einrichtungen des täglichen Bedarfs zu betrachten [39] zit. n. [2]. Als zumutbare Entfernung zu Bushaltestellen sind 600m, zu Bahnhöfen 1200m ausreichend [40]. Um den Anforderungen an Barrierefreiheit für mobilitätseingeschränkte Personen an zumutbare Entfernungen gerecht zu werden, ist es empfehlenswert, diese folgendermaßen zu senken: 300–350m für Innenstadtbereiche, 350–400m für Vorortbereiche und 450–500m für Außengebiete [41,42].',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(358,17,8,3,53,3,'Liegt der vorhandene und/oder geplante Wohnraum in angemessener und zumutbarer Entfernung / Laufweite zu Geschäften, Schulen, zentralen Haltestellen des ÖPNV sowie zu anderen wichtigen Versorgungsangeboten und Grünräumen?','Angemessene Entfernung des Wohnraums zu Geschäften, Schulen, Grünräumen etc.','400–500m sind als zumutbare Entfernung bis zu den nächsten Einrichtungen des täglichen Bedarfs zu betrachten [39] zit. n. [2]. Als zumutbare Entfernung zu Bushaltestellen sind 600m, zu Bahnhöfen 1200m ausreichend [40]. Um den Anforderungen an Barrierefreiheit für mobilitätseingeschränkte Personen an zumutbare Entfernungen gerecht zu werden, ist es empfehlenswert, diese folgendermaßen zu senken: 300–350m für Innenstadtbereiche, 350–400m für Vorortbereiche und 450–500m für Außengebiete [41,42].',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(359,17,9,3,53,3,'Verstärkt das Vorhaben die Abhängigkeit vom motorisierten Individualverkehr (MIV)?','Verstärkung der Abhängigkeit vom MIV','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(360,17,10,3,53,3,'Wird Menschen ohne eigenen PKW durch das Vorhaben der Zugang zu Beschäftigungsstellen, Versorgungseinrichtungen, sozialen Infrastrukturen sowie Erholungsmöglichkeiten erschwert?','Erschwerung des Zugangs zu essenziellen Orten für Menschen ohne eigenen PKW','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(361,17,11,3,53,3,'Fördert das Vorhaben eine kompakte und damit energieeffizientere sowie wegstreckenverringernde Bauweise und/oder Wohnraum, welche/r sich in bestehende Siedlungsstrukturen integriert (einschließlich Baulückenschließung)?','Förderung einer kompakten, energieeffizienteren und wegstreckenverringernden Bauweise','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(362,17,12,3,53,2,'Fördert das Vorhaben Wohnraum, der den Mindestanforderungen an „gesunden Wohnraum“ entspricht?','Förderung von Wohnraum, der den Mindestanforderungen an „gesunden Wohnraum“ entspricht','Zu den Mindestanforderungen für gesunden Wohnraum zählen [2]:<ul><li>Gewährleistung der menschlichen Unversehrtheit</li><li>Sicherheit</li><li>Beständigkeit</li><li>private Nutzbarkeit</li><li>Komfortabilität (Ausstattung, Temperatur, Belüftung)</li></ul>Diese Mindestanforderungen können mit den Themen Barrierefreiheit und der Ermöglichung von Selbstständigkeit verschränkt werden, um einen verstärkten Beitrag zur Gesundheitsförderung zu leisten.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(363,17,13,3,53,3,'Verhindert oder vermeidet das Projekt Wohnungsbau auf kontaminierten Flächen, die noch nicht aufbereitet wurden?','Vermeidung von Wohnungsbau auf nicht aufbereiteten, kontaminierten Flächen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(401,18,1,3,61,3,'Wird die zukünftige Bevölkerung Zugang zu adäquater sozialer Infrastruktur entweder im Bereich des Planungsvorhabens oder in der näheren Umgebung haben?','Zugang zu adäquater sozialer Infrastruktur','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(402,18,2,3,61,2,'Sieht das Planungsvorhaben vor, dass wichtige soziale Infrastruktur zentral im Quartier verortet ist, um so Raum für gemeinschaftliche Aktivitäten zu bieten?','Zentrale Verortung wichtiger sozialer Infrastruktur im Quartier','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(403,18,3,3,61,2,'Entsprechen die geplanten Einrichtungen dem demografischen Profil und den voraussichtlichen Bedürfnissen der zukünftigen Bevölkerung?','Planung der Einrichtungen gemäß demografischem Profil und voraussichtlichen Bedürfnissen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(404,18,7,3,61,3,'Sind zentrale Einrichtungen (Schulen, Kitas) so geplant, dass diese zu Fuß, mit dem Fahrrad und/oder dem ÖPNV gut erreichbar sind?','Erreichbarkeit zentraler Einrichtungen (Schulen, Kitas)','Indem zentrale soziale Einrichtungen gut zu Fuß, mit dem Fahrrad oder per ÖPNV erreichbar sind, werden die Notwendigkeit des MIV und alle damit einhergehenden negativen Auswirkungen reduziert.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(405,18,8,3,61,1,'Ist die geplante soziale Infrastruktur mit anderen Angeboten verbunden?','Verbindung sozialer Infrastruktur mit anderen Angeboten','Zu diesen Angeboten zählen <b>Einrichtungen der lokalen Ökonomie</b> sowie <b>Öffentliche (Frei-)Räume</b> wie Plätze oder Grünflächen.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(406,18,4,3,61,2,'Gewährleistet das Vorhaben den Zugang zu Gesundheitsangeboten, einschließlich Krankenhäusern, ambulanten Gesundheitszentren, Allgemeinmediziner:innen (als Erstanlaufstellen für die Bevölkerung) sowie weiteren Akteur:innen im Gesundheitswesen?','Zugang zu Gesundheitsangeboten','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(407,18,5,3,61,4,'Unterstützt das Vorhaben den Zugang zu kostengünstigen und gut erreichbaren Kinderbetreuungsangeboten?','Zugang zu kostengünstigen und gut erreichbaren Kinderbetreuungsangeboten','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(408,18,6,3,61,4,'Unterstützt das Vorhaben den Zugang zu gut erreichbaren Bildungs- und Weiterbildungseinrichtungen?','Zugang zu gut erreichbaren Bildungs- und Weiterbildungseinrichtungen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(409,18,9,3,61,3,'Sind geplante Einrichtungen universell zugänglich und inklusiv gestaltet?','Universelle Zugänglichkeit und inklusive Gestaltung geplanter Einrichtungen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(410,18,10,3,61,3,'Fördert das Vorhaben den gleichberechtigten Zugang zu Angeboten und Einrichtungen?','Gleichberechtigter Zugang zu Angeboten und Einrichtungen','Dies beinhaltet beispielsweise die Bezahlbarkeit, die Berücksichtigung von Bedürfnissen möglichst vieler/aller Bevölkerungsgruppen oder die Erreichbarkeit zu Angeboten und/oder Einrichtungen.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(411,18,11,3,61,1,'Für größere Planungsvorhaben: Schließt das Projekt lokale Geschäfte, Gemeinschafts-, Gesundheits-, Erholungs-, Freizeit-, Unterhaltungs- und Kultureinrichtungen ein?','Einschluss lokaler Geschäfte und Einrichtungen','U. a. das Amt für Statistik oder ggf. ein Quartiersmanagement könnten mit der Bereitstellung von Informationen zu Bevölkerungsstandards und Maßstäben zur Berücksichtigung einer Vielzahl sozialer Infrastruktur unterstützend tätig werden [1].',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(412,18,12,3,61,2,'Für kleinere Planungsvorhaben: Wird es einen angemessenen Zugang zu einem Mix von Einrichtungen einschließlich lokaler Einkaufsmöglichkeiten, Gemeinschafts-, Gesundheits-, Erholungs-, Freizeit- und Kultureinrichtungen geben?','Angemessener Zugang zu einem Mix von Einrichtungen','U. a. das Amt für Statistik oder ggf. ein Quartiersmanagement könnten mit der Bereitstellung von Informationen zu Bevölkerungsstandards und Maßstäben zur Berücksichtigung einer Vielzahl sozialer Infrastruktur unterstützend tätig werden [1].',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(421,18,13,3,62,3,'Berücksichtigt das Vorhaben eine Bedarfsanalyse oder einen Sozialplan?','Berücksichtigung einer Bedarfsanalyse oder eines Sozialplans','Von Relevanz ist, dass die Bedarfsanalyse oder der Sozialplan folgende Aussagen beinhaltet [1]:<ul><li>bestehende (soziale) Dienstleistungsangebote bzw. Angebotslücken, Merkmale sowie voraussichtliche Bedürfnisse der aktuellen/zukünftigen Bevölkerung</li><li>Übertragung prognostizierter Bevölkerungsbedürfnisse bezüglich der Dienstleistungsnachfrage</li><li>Identifizierung zukünftig (potentiell) nachgefragter Einrichtungen der sozialen Infrastruktur</li><li>mögliche Standorte und Einrichtungsmodelle sozialer Infrastrukturen</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(422,18,14,3,62,3,'Wurden Einrichtungen so geplant, dass die vielfältigen Bedürfnisse der ansässigen Bevölkerungsgruppen eine Berücksichtigung erhalten?','Berücksichtigung der vielfältigen Bedürfnisse der ansässigen Bevölkerungsgruppen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(423,18,15,3,62,1,'Bestehen Mechanismen, um eine frühzeitige Realisierung der sozialen Infrastruktur zu ermöglichen?','Mechanismen zur frühzeitigen Realisierung sozialer Infrastruktur','Schließen diese Mechanismen beispielsweise <b>Finanzierungsstrategien</b> ein, um zu gewährleisten, dass soziale Infrastruktureinrichtungen vom frühestmöglichen Zeitpunkt im Projekt- oder Vorhabengebiet zugänglich sowie nutzbar sind [1]?',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(424,18,16,3,62,3,'Werden, zur Gewährleistung eines integrativen, gemeinwohlorientierten Ansatzes, eine große Bandbreite an möglichen Träger:innen für soziale Infrastruktureinrichtungen und -projekte an der Planung des Vorhabens beteiligt?','Beteiligung einer großen Bandbreite an möglichen Träger:innen für soziale Infrastruktureinrichtungen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(425,18,17,3,62,3,'Bestehen Mechanismen, die eine Beteiligung von lokalen Akteur:innen der Kommune an Planungs- und Gestaltungsprozessen der sozialen Infrastruktur vorsehen?','Mechanismen zur Beteiligung lokaler Akteur:innen der Kommune','Zu den lokalen Akteur:innen der Kommune zählen gemeinwohlorientierte und private Dienstleister:innen sowie andere Interessensvertretungen.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(426,18,18,3,62,3,'Sind die Einrichtungen der sozialen Infrastruktur so geplant, dass sie für vielfältige Zwecke genutzt werden können?','Vielfältige Nutzbarkeit der geplanten Einrichtungen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(451,19,1,3,71,3,'Unterstützt das Projekt die Etablierung von gemeinschaftlich nutzbaren Einrichtungen oder Treffpunkten, die ein Gemeinschaftsgefühl fördern?','Etablierung gemeinschaftlich genutzter Einrichtungen','Gemeinschaftlich nutzbare Einrichtungen oder Treffpunkte können u.a. ein gemeinsamer Standort für Einzelhandel, ein Sportplatz oder ein Jugendzentrum sein.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(452,19,2,3,71,2,'Unterstützt das Projekt die Etablierung kleinräumiger Nachbarschaften, die soziale Interaktion und lokale Identität fördern?','Etablierung kleinräumiger Nachbarschaften','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(453,19,3,3,71,2,'Bestehen Regelungen für die rechtzeitige Bereitstellung von zentralen gemeinschaftlichen Einrichtungen, wie zum Beispiel ein Gemeindezentrum und eine Grundschule?','Bereitstellung von zentralen gemeinschaftlichen Einrichtungen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(454,19,4,3,71,3,'Sind attraktive Plätze geplant, an denen Menschen sich begegnen, treffen und versammeln können, wie zum Beispiel Parks mit Spielplätzen oder Grillplätzen, Geschäftsbereichen und Cafés?','Planung attraktiver Plätze','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(455,19,5,3,71,1,'Sind Geschäftsbereiche so gestaltet und platziert, dass soziale Interaktion und nachbarschaftliche Aktivitäten gefördert werden?','Förderung sozialer Interaktion in Geschäftsbereichen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(456,19,6,3,71,1,'Fördert das Projekt durch die Quartiersgestaltung und die Lage von wichtigen Zielen das zu Fuß gehen?','Förderung der Fortbewegung zu Fuß durch Quartiersgestaltung','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(457,19,7,3,71,2,'Sind bei größeren Wohnbebauungen gemeinschaftlich nutzbare Flächen vorgesehen?','Gemeinschaftlich nutzbare Flächen bei Wohnbauungen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(458,19,8,3,71,3,'Unterstützt das Projekt lokale Arbeitsplatzmöglichkeiten, sodass es Menschen ermöglicht wird, in der Nähe ihrer Wohnorte zu arbeiten und Pendelzeiten zu minimieren?','Unterstützung lokaler Arbeitsplatzmöglichkeiten','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(459,19,9,3,72,3,'Sind im öffentlichen Raum Kunst oder Designelemente geplant, um die Verbindung zum Ort zu fördern?','Kunst oder Designelemente im öffentlichen Raum','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(460,19,10,3,72,1,'Wird Unterstützung für gemeinschaftliche oder kulturelle Initiativen bereitgestellt, durch die das Gemeinschaftsgefühl gefördert wird?','Unterstützung kultureller Initiativen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(461,19,11,3,73,3,'Ermutigt das Projekt zur lokalen Beteiligung im gemeinschaftlichen und bürgerlichen Leben?','Ermutigung zur lokalen Beteiligung im gemeinschaftlichen und bürgerlichen Leben','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(462,19,12,3,74,3,'Verschlechtert das Projekt die sozioökonomischen Unterschiede und kann dies zu einer Konzentration von sozioökonomisch benachteiligten Personen führen?','Verschlechterung der sozioökonomischen Unterschiede','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(463,19,13,3,74,3,'Wird die soziale Mischung durch eine Vielfalt an Wohnungsangeboten gefördert?','Soziale Mischung durch Wohnangebotsvielfalt','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(464,19,14,3,74,2,'Fördert das Projekt die Inklusion und Integration einer Bandbreite an lokalen sozio-demografisch unterschiedlichen Gruppen?','Förderung von Inklusion und Integration','Beispielhaft zu nennen seien Gruppen mit einem niedrigen sozioökonomischen Status sowie kulturell und sprachlich diverse Gruppen.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(465,19,15,3,74,2,'Haben benachteiligte Gruppen den gleichen Zugang zu Angeboten und Einrichtungen, Beschäftigungsverhältnissen und Verkehrsmitteln?','Zugang zu Angeboten für benachteiligte Gruppen','Zu benachteiligten Gruppen zählen z.B. Haushalte mit geringem Einkommen, Alleinerziehende, Arbeitslose, Migrant:innen, Geflüchtete, Menschen mit Behinderung, ältere Menschen.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(466,19,16,3,75,3,'Können benachteiligte Gruppen durch die Planung oder die Strategie ausgeschlossen oder vernachlässigt werden?','Ausschluss von benachteiligten Gruppen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(467,19,17,3,75,2,'Fördert das Projekt die Verknüpfung mit benachbarten Gebieten und anderen Bauvorhaben?','Verknüpfung mit benachbarten Gebieten und anderen Bauvorhaben','Eine Verknüpfung benachbarter Gebiete und anderer Bauvorhaben kann z.B. durch Straßenverbindungen, Freiraumgestaltung und Gestaltung des Öffentlichen Raums geschehen.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(468,19,18,3,75,2,'Gibt es Strukturen wie z. B. Hauptstraßen, Bahnlinien oder Industriegebiete, die Hindernisse für den Austausch und die Verbindung von Quartieren sein könnten?','Vorhandensein von infrastrukturellen Hindernissen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(469,19,19,3,75,1,'Ermutigt das Projekt die soziale Integration zwischen den Quartieren, zum Beispiel durch die Bereitstellung von Gemeinschaftseinrichtungen, von denen ebenfalls benachbarte Gebiete profitieren?','Soziale Integration zwischen den Quartieren','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(501,20,1,3,81,3,'Beinhaltet die Zielsetzung des Vorhabens die Grundsätze der Kriminalprävention und Fragen zur Sicherheit im Quartier?','Kriminalprävention und Sicherheit im Quartier','Durch die Umsetzung von kriminalpräventiven Siedlungsgestaltungen können Kriminalität und Kriminalitätsfurcht reduziert werden. Hierbei sollten beispielsweise Planungen für Wegeverbindungen oder Freiflächen u.a. zum Ziel haben, die Bildung potentieller Angsträume zu vermeiden. Ermöglicht wird dies, indem der Ausbau sowie die Verbesserung vorhandener Beleuchtungselemente forciert, Eingangs- und Zugangsbereiche besser einsehbar gestaltet oder vandalismusresistente Materialien verwendet werden (LZG NRW 2019).',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(502,20,2,3,81,1,'Beruft sich das Projekt auf die lokale Polizeibehörde oder bezieht es sich alternativ auf andere Stellen, die sich mit Fragen der öffentlichen Sicherheit oder Kriminalprävention beschäftigen?','Beschäftigung mit Fragen der öffentlichen Sicherheit','Wenn die Antwort ja lautet, müssen seitens der Gesundheitsbehörden keine weiteren Stellungnahmen zur Kriminalprävention und öffentlichen Sicherheit ergänzt werden. Sollte die Antwort nein lauten, sollte ggf. eine Überprüfung der Strategie, der Planung oder des Vorhabens durch die örtliche Polizeibehörde stattfinden.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(503,20,3,3,81,2,'Fördert / Ermöglicht das Projekt die soziale Kontrolle, Einsehbarkeit sowie deutliche Sichtbeziehungen?','Förderung von sozialer Kontrolle und Einsehbarkeit','Relevante Möglichkeiten hierzu sind:<ul><li>Gestaltungsformen Öffentlicher Räume, welche Versteckmöglichkeiten und Tatgelegenheiten verhindern</li><li>Verbesserung der Sichtbeziehungen von Straßen- und Landschaftsräumen durch Art und Weise von Begrenzungen</li><li>Nutzung geeigneter Beleuchtungselemente.</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(504,20,4,3,81,3,'Fördert das Projekt eine sichere und einfache Bewegung im Öffentlichen (Frei-)Raum?','Förderung einer sicheren und einfachen Bewegung im Öffentlichen Raum','Eine sichere und einfache Bewegung im Öffentlichen (Frei-)Raum wird beispielsweise gewährleistet durch:<ul><li>einfache und logische Gestaltungen sowie Nutzung von Beschilderungen und Wegweisern</li><li>deutliche Kennzeichnung und leichte Erreichbarkeit von Ein- und Ausgangsbereichen Öffentlicher (Frei-)Räume</li><li>Anlegen klarer, direkt und gut einsehbarer Öffentlicher Bereiche sowie deren unmittelbarer Umgebung</li><li>sichere und gut beleuchtete Wege zwischen den wichtigen Elementen / Zielen des (Frei-)Raums</li><li>Berücksichtigung der Anzahl und Typen von Wegeverbindungen</li><li>Gefühl von objektiv sowie subjektiv wahrgenommener Sicherheit im Quartier.</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(505,20,5,3,81,3,'Fördert das Projekt eine aktive Nutzungsmischung im Öffentlichen (Frei-)Raum?','Förderung einer aktiven Nutzungsmischung im Öffentlichen Raum','Eine aktive Nutzungsmischung Öffentlicher (Frei-)Räume wird beispielsweise ermöglicht durch:<ul><li>Berücksichtigung von Motivationen & Ansprüchen unterschiedlicher Zielgruppen für verstärkte Aktivitäten im Öffentlichen (Frei-)Raum sowie in angeschlossenen Einrichtungen</li><li>Möglichkeiten für multifunktionale Nutzungen von Flächen</li><li>Berücksichtigung einer zumutbaren und angemessenen nächtlichen Nutzung von Flächen im Öffentlichen (Frei-)Raum</li><li>Gewährleistung der objektiven sowie subjektiven Sicherheitswahrnehmung.</li></ul>',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(506,20,6,3,81,2,'Können räumliche Bereiche anhand ihres Verwendungszwecks identifiziert werden?','Identifizierbarkeit räumlicher Bereiche anhand ihres Verwendungszwecks','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(507,20,7,3,81,2,'Können potenzielle Nutzer:innen erkennen, ob der Raum oder die Fläche öffentlich zugänglich oder in privatem Besitz ist sowie wer diese/n nutzen darf?','Erkennbarkeit der Nutzungserlaubnis von Räumen und Flächen','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(551,21,1,3,91,3,'Unterstützt oder stärkt das Projekt die Möglichkeiten, sich mit gesunden Lebensmitteln in Supermärkten, Obst- und Gemüseläden, kleinen Einzelhandelsgeschäften und auf Wochenmärkten zu versorgen?','Möglichkeiten der Versorgung mit gesunden Lebensmitteln','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(552,21,2,3,91,3,'Verhindert das Projekt ein Überangebot von Fastfood-Restaurants?','Verhinderung eines Überangebots von Fastfood-Restaurants','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(553,21,3,3,91,2,'Liegen die meisten Wohngebäude innerhalb einer zumutbaren Entfernung zu Geschäften mit gesunden Lebensmittelangeboten wie Supermärkten und Obst- und Gemüseläden?','Bequeme Laufweite zu gesunden Lebensmittelangeboten','Eine Entfernung von 400-500 Metern bis zu den nächsten Einrichtungen des täglichen Bedarfs wird als zumutbar erachtet [19] zit. n. [6].',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(554,21,4,3,92,3,'Fördert das Projekt die lokale Lebensmittelproduktion zur Verbesserung des Zugangs zu gesunden Lebensmitteln für Anwohner:innen im Zielgebiet?','Förderung der lokalen Lebensmittelproduktion','Dies wäre beispielsweise durch den <b>Zugang zu Gemeinschaftsgärten und Kleingärten</b> sowie die <b>Bereitstellung von ungenutzten Flächen</b> für den Anbau von Obst und Gemüse möglich.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(555,21,5,3,92,1,'Beinhaltet das Projekt private Grünflächen, die für den Anbau von Gemüse und Obst geeignet sind?','Private Grünflächen für Anbau von Obst und Gemüse','Es gibt <b>keine Minimalstandards</b> für den Anbau von Gemüse und Obst am eigenen Wohnort. Demnach können <b>verschiedene Flächenarten für unterschiedliche Wohnformen</b> geeignet sein.',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(556,21,6,3,92,2,'Unterstützt das Projekt Gemeinschaftsgärten und Kleingärten, in denen Flächen für eine solche Nutzung angeboten werden?','Unterstützung von Gemeinschaftsgärten und Kleingärten','',1,NULL,'{}','2024-08-28 15:40:40',NULL),
(557,21,7,3,93,3,'Hat das Projekt negative Auswirkungen auf wichtiges Agrarland mit hoher Qualität?','Negative Auswirkungen auf hochqualitatives Agrarland','',1,NULL,'{}','2024-08-28 15:40:40',NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `content_states`
--

CREATE TABLE `content_states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `original_id` int(10) UNSIGNED NOT NULL,
  `questionnaire_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `weight` double(8,2) UNSIGNED NOT NULL DEFAULT 1.00,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `editor_id` int(10) UNSIGNED DEFAULT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `content_types`
--

CREATE TABLE `content_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stage_type_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `content_types`
--

INSERT INTO `content_types` (`id`, `stage_type_id`, `shortname`, `name`, `description`, `icon`, `color`, `type`, `category`, `created_at`, `updated_at`) VALUES
(1, 2, 'screening-item', 'Screening Item', 'A dynamic module that asks screening-related questions. The user\'s answer to a question decides whether and which question is displayed next.', 'question-circle-fill', 'primary', 'default', 'module', '2024-05-26 20:35:19', NULL),
(2, 2, 'vulnerable-group-item', 'Vulnerable Group Item', 'A dynamic module that asks for expected impacts on a vulnerable group.', 'person-circle', 'primary', 'default', 'module', '2024-05-26 20:35:19', NULL),
(3, 4, 'appraisal-item', 'Appraisal Item', 'A dynamic module that asks appraisal-related questions.', 'search', 'success', 'default', 'module', '2024-05-26 20:35:19', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `effects`
--

CREATE TABLE `effects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content_id` int(10) UNSIGNED NOT NULL,
  `effect_type_id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `editor_id` int(10) UNSIGNED DEFAULT NULL,
  `size_y` int(11) NOT NULL DEFAULT 1,
  `size_n` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `effects`
--

INSERT INTO `effects` (`id`, `content_id`, `effect_type_id`, `author_id`, `editor_id`, `size_y`, `size_n`, `created_at`, `updated_at`) VALUES
(1,201,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(2,201,4,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(3,201,3,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(4,202,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(5,202,4,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(6,202,3,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(7,203,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(8,203,4,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(9,203,3,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(10,203,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(11,204,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(12,204,4,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(13,204,3,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(14,205,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(15,206,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(16,207,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(17,208,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(18,209,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(19,210,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(20,210,4,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(21,210,3,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(22,210,5,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(23,211,4,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(24,211,3,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(25,212,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(26,212,4,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(27,212,3,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(28,213,5,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(29,214,5,1,NULL,1,0,'2024-06-06 22:10:17',NULL),
(30,215,5,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(31,216,5,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(32,217,5,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(33,218,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(34,219,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(35,220,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(36,220,6,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(37,220,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(38,220,5,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(39,221,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(40,222,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(41,223,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(42,223,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(43,231,8,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(44,231,10,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(45,231,11,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(46,231,13,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(47,232,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(48,232,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(49,232,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(50,232,13,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(51,235,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(52,235,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(53,236,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(54,236,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(55,236,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(56,236,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(57,237,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(58,237,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(59,237,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(60,238,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(61,238,9,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(62,238,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(63,238,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(64,239,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(65,239,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(66,239,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(67,240,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(68,240,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(69,252,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(70,252,4,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(71,252,3,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(72,253,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(73,253,4,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(74,253,3,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(75,254,4,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(76,255,4,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(77,255,3,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(78,256,7,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(79,257,7,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(80,258,3,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(81,258,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(82,258,15,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(83,259,3,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(84,259,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(85,259,15,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(86,260,3,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(87,261,3,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(88,261,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(89,261,15,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(90,262,15,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(91,263,7,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(92,264,7,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(93,265,4,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(94,265,6,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(95,266,4,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(96,266,6,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(97,266,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(98,266,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(99,267,4,1,NULL,-1,0,'2024-06-06 22:10:17',NULL),
(100,267,6,1,NULL,1,0,'2024-06-06 22:10:17',NULL),
(101,268,6,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(102,269,4,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(103,269,6,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(104,270,6,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(105,271,6,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(106,282,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(107,282,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(108,282,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(109,282,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(110,283,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(111,283,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(112,283,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(113,284,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(114,284,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(115,284,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(116,284,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(117,285,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(118,285,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(119,285,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(120,286,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(121,286,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(122,286,13,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(123,287,4,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(124,287,7,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(125,287,13,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(126,288,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(127,288,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(128,288,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(129,289,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(130,289,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(131,289,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(132,291,12,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(133,291,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(134,292,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(135,292,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(136,292,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(137,292,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(138,293,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(139,293,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(140,293,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(141,294,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(142,294,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(143,294,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(144,294,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(145,295,12,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(146,295,5,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(147,295,13,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(148,296,12,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(149,296,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(150,297,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(151,297,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(152,297,12,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(153,298,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(154,298,12,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(155,299,4,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(156,299,3,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(157,299,12,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(158,300,3,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(159,300,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(160,300,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(161,300,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(162,301,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(163,301,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(164,301,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(165,301,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(166,302,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(167,302,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(168,303,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(169,303,12,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(170,303,5,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(171,304,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(172,304,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(173,304,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(174,304,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(175,305,4,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(176,305,3,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(177,305,12,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(178,306,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(179,306,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(180,306,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(181,306,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(182,307,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(183,307,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(184,307,12,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(185,307,5,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(186,308,4,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(187,308,6,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(188,308,13,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(189,309,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(190,309,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(191,309,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(192,309,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(193,310,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(194,310,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(195,310,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(196,310,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(197,321,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(198,322,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(199,322,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(200,323,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(201,324,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(202,325,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(203,326,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(204,327,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(205,328,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(206,328,4,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(207,328,3,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(208,329,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(209,330,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(210,331,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(211,332,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(212,332,5,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(213,333,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(214,333,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(215,334,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(216,334,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(217,335,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(218,336,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(219,336,8,1,NULL,1,0,'2024-06-06 22:10:17',NULL),
(220,336,10,1,NULL,1,0,'2024-06-06 22:10:17',NULL),
(221,337,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(222,337,12,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(223,337,5,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(224,338,6,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(225,338,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(226,338,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(227,338,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(228,338,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(229,339,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(230,340,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(231,340,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(232,347,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(233,351,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(234,351,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(235,352,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(236,352,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(237,352,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(238,353,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(239,353,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(240,353,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(241,354,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(242,354,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(243,354,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(244,355,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(245,355,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(246,355,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(247,356,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(248,356,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(249,356,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(250,357,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(251,357,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(252,357,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(253,358,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(254,358,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(255,358,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(256,359,1,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(257,359,8,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(258,360,1,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(259,360,2,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(260,360,8,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(261,361,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(262,361,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(263,361,13,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(264,362,7,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(265,362,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(266,362,15,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(267,363,7,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(268,363,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(269,401,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(270,401,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(271,401,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(272,401,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(273,402,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(274,402,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(275,402,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(276,403,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(277,403,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(278,403,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(279,404,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(280,404,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(281,404,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(282,404,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(283,405,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(284,405,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(285,406,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(286,406,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(287,406,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(288,406,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(289,407,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(290,407,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(291,407,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(292,408,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(293,408,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(294,408,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(295,408,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(296,409,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(297,409,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(298,409,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(299,409,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(300,410,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(301,410,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(302,410,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(303,411,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(304,411,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(305,411,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(306,412,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(307,412,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(308,412,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(309,421,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(310,421,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(311,421,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(312,422,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(313,422,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(314,422,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(315,423,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(316,423,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(317,423,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(318,424,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(319,424,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(320,425,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(321,425,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(322,425,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(323,426,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(324,426,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(325,426,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(326,426,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(327,451,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(328,452,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(329,453,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(330,454,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(331,455,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(332,456,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(333,456,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(334,457,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(335,458,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(336,459,2,1,NULL,1,0,'2024-06-06 22:10:17',NULL),
(337,460,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(338,461,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(339,462,2,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(340,463,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(341,463,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(342,464,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(343,464,14,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(344,465,2,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(345,466,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(346,467,2,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(347,468,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(348,501,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(349,501,12,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(350,502,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(351,502,12,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(352,503,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(353,503,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(354,503,12,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(355,504,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(356,504,10,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(357,504,11,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(358,504,12,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(359,505,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(360,505,8,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(361,505,12,1,NULL,-1,1,'2024-06-06 22:10:17',NULL),
(362,506,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(363,507,1,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(364,507,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(365,551,9,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(366,552,9,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(367,553,9,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(368,554,9,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(369,555,9,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(370,556,2,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(371,556,9,1,NULL,1,-1,'2024-06-06 22:10:17',NULL),
(372,557,9,1,NULL,-1,1,'2024-06-06 22:10:17',NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `effect_types`
--

CREATE TABLE `effect_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `icon_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_positive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `effect_types`
--

INSERT INTO `effect_types` (`id`, `order_id`, `icon_id`, `name`, `shortname`, `is_positive`, `created_at`, `updated_at`) VALUES
(1, 1, 86, 'Activity', 'activity', 1, '2023-12-07 17:08:58', NULL),
(2, 2, 343, 'Social participation', 'social-participation', 1, '2023-12-07 17:08:58', NULL),
(3, 3, 410, 'Noise', 'noise', 0, '2023-12-07 17:08:58', NULL),
(4, 4, 153, 'Air quality', 'air-quality', 1, '2023-12-07 17:08:58', NULL),
(5, 5, 403, 'Traffic hazards', 'traffic-hazards', 0, '2023-12-07 17:08:58', NULL),
(6, 6, 231, 'Heat', 'heat', 0, '2023-12-07 17:08:58', NULL),
(7, 7, 157, 'Environmental hazards', 'environmental-hazards', 0, '2023-12-07 17:08:58', NULL),
(8, 8, 442, 'Quality of life', 'quality-of-life', 1, '2023-12-07 17:08:58', NULL),
(9, 9, 270, 'Healthy nutrition', 'healthy-nutrition', 1, '2023-12-07 17:08:58', NULL),
(10, 10, 159, 'Relaxation', 'relaxation', 1, '2023-12-07 17:08:58', NULL),
(11, 11, 24, 'Stress', 'stress', 0, '2023-12-07 17:08:58', NULL),
(12, 12, 345, 'Fear and insecurity', 'fear', 0, '2023-12-07 17:08:58', NULL),
(13, 13, 450, 'Climate impacts', 'climate', 0, '2023-12-07 17:08:58', NULL),
(14, 14, 350, 'Inclusion', 'inclusion', 1, '2023-12-07 17:08:58', NULL),
(15, 15, 296, 'Light pollution', 'light-pollution', 0, '2023-12-07 17:08:58', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `entries`
--

CREATE TABLE `entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stage_id` int(10) UNSIGNED NOT NULL,
  `content_id` int(10) UNSIGNED NOT NULL,
  `positive` double(8,2) DEFAULT NULL,
  `negative` double(8,2) DEFAULT NULL,
  `potential` int(11) DEFAULT NULL,
  `importance` int(10) UNSIGNED DEFAULT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_global` tinyint(1) NOT NULL DEFAULT 0,
  `size` int(10) UNSIGNED NOT NULL,
  `width` int(10) UNSIGNED DEFAULT NULL,
  `height` int(10) UNSIGNED DEFAULT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `editor_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `file_links`
--

CREATE TABLE `file_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `file_id` int(10) UNSIGNED NOT NULL,
  `default` tinyint(1) NOT NULL DEFAULT 0,
  `author_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `file_types`
--

CREATE TABLE `file_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon_id` int(10) UNSIGNED NOT NULL,
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extensions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `file_types`
--

INSERT INTO `file_types` (`id`, `icon_id`, `shortname`, `name`, `folder`, `extensions`, `created_at`, `updated_at`) VALUES
(1, 371, 'unknown', 'Unknown Type', '/other', '', '2024-07-24 14:09:24', NULL),
(2, 282, 'image', 'Image', '/images', 'jpg|jpeg|png|gif|bmp|svg', '2024-07-24 14:09:24', NULL),
(3, 322, 'audio', 'Audio', '/audio', 'mp3|m4a|wav', '2024-07-24 14:09:24', NULL),
(4, 501, 'video', 'Video', '/video', 'mp4', '2024-07-24 14:09:24', NULL),
(5, 486, 'word', 'Document', '/documents', 'docx|doc', '2024-07-24 14:09:24', NULL),
(6, 487, 'excel', 'Document', '/documents', 'xlsx|xls', '2024-07-24 14:09:24', NULL),
(7, 485, 'pdf', 'Document', '/documents', 'pdf', '2024-07-24 14:09:24', NULL),
(8, 488, 'archive', 'Archive', '/archives', 'zip|rar', '2024-07-24 14:09:24', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `focused_items`
--

CREATE TABLE `focused_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `content_id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `is_focused` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `glossaries`
--

CREATE TABLE `glossaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `glossaries`
--

INSERT INTO `glossaries` (`id`, `name`, `shortname`, `created_at`, `updated_at`) VALUES
(1, 'Allgemeine Stadtplanungsbegriffe', 'general', '2024-07-24 13:33:24', NULL),
(2, 'Leitbilder & Konzepte', 'concepts', '2024-07-24 13:33:24', NULL),
(3, 'Infrastruktur', 'infrastructure', '2024-07-24 13:33:24', NULL),
(4, 'Wohnraum', 'living', '2024-07-24 13:33:24', NULL),
(5, 'Städtebauliche Typologien', 'urban', '2024-07-24 13:33:24', NULL),
(6, 'Verkehrsassoziierte Begriffe', 'traffic', '2024-07-24 13:33:24', NULL),
(7, 'Klimaassoziierte Begriffe', 'climate', '2024-07-24 13:33:24', NULL),
(8, 'Raum', 'space', '2024-07-24 13:33:24', NULL),
(9, 'Siedlungsstruktur', 'settlement', '2024-07-24 13:33:24', NULL),
(10, 'Management', 'management', '2024-07-24 13:33:24', NULL),
(11, 'Gesellschaftsassoziierte Begriffe', 'community', '2024-07-24 13:33:24', NULL),
(12, 'Sonstige Stadtplanungsbegriffe', 'other', '2024-07-24 13:33:24', NULL),
(13, 'Epidemiologische Maßzahlen der Gesundheit', 'health', '2024-07-24 13:33:24', NULL),
(14, 'Sonstige Gesundheitsbegriffe', 'other2', '2024-07-24 13:33:24', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `glossary_terms`
--

CREATE TABLE `glossary_terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `glossary_id` int(10) UNSIGNED NOT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `glossary_terms`
--

INSERT INTO `glossary_terms` (`id`, `glossary_id`, `term`, `description`, `created_at`, `updated_at`) VALUES
(1,1,'Formelle Planung & Instrumente','Formelle Planungen sind rechtsverbindlich vorgeschrieben und obliegen einem festgelegten Ablauf hinsichtlich der Inhalte, der beteiligten Akteur:innen und des (zeitlichen) Umfangs. Neben Flächennutzungsplänen und Bebauungsplänen sind auch z.B. Planfeststellungsverfahren und Plangenehmigungen formelle Instrumente [1].','2024-08-30 14:25:20',NULL),
(2,1,'Bauleitplanung/B-Plan','Die Bauleitplanung ist dafür verantwortlich, frühzeitig die Nutzung von kommunalen Grundstücken festzulegen. Als Instrumente stehen einerseits der Flächennutzungsplan (FNP) als vorbereitender Bauleitplan und andererseits der Bebauungsplan (B-Plan) als verbindlicher Bauleitplan zur Verfügung. Im Baugesetzbuch (BauGB) werden in §1 die Aufgaben und Grundsätze näher beschrieben, zu denen auch das Abwägungsgebot zählt. Die Bauleitplanung hat sich an den Grundsätzen der Raumordnung zu orientieren [1].','2024-08-30 14:25:20',NULL),
(3,1,'Informelle Planung & Instrumente','Im Gegensatz zu formellen Planungen weist die informelle Planung keine Regulierung im Planungsrecht auf. Die Verpflichtung zur Umsetzung der Ziele können jedoch durch eine Selbstbindung erreicht werden, z.B. durch einen Beschluss im Stadtrat. Zudem besitzen informelle planerische Instrumente keine genauen Vorgaben zu einzelnen Verfahrungsschritten und dem Ziel der Planung, trotzdem ist das Verfahren bei einer Selbstbindung gemeinsam mit allen beteiligten Akteur:innen zu organisieren. Durch diese Struktur sind informelle Instrumente zeitlich flexibler einsetzbar. Ein Nachteil besteht allerdings darin, dass keine Sicherheit darin besteht, dass die Planungen tatsächlich umgesetzt werden [1].','2024-08-30 14:25:20',NULL),
(4,1,'Rahmenplanung/Rahmenplan','Die Rahmenplanung ist ein Instrument, welches als Vorbereitung für die Bauleitplanung gilt. Ein Rahmenplan hat allerdings keinen verbindlichen Rechtsrahmen, in dem bestimmte Inhalte vorgegeben sind, und ist dadurch als informell einzuordnen. Durch einen Gemeindebeschluss kann jedoch eine Selbstbindung entstehen. Der Rahmenplan kann einen unterschiedlichen Umfang des Stadt- bzw. Gemeindegebiets in verschiedenen Maßstäben darstellen. Durch den vorbereitenden Charakter des Rahmenplans eignet sich das Instrument für eine frühzeitige Beteiligung der Bürger:innen und der weiteren involvierten Akteur:innen [2].','2024-08-30 14:25:20',NULL),
(5,1,'Baurecht','Das Baurecht umfasst die rechtliche Vorschriften und Regelungen, die sich mit der Errichtung, Nutzung, Änderung und dem Rückbau von Bauwerken beschäftigen. Es umfasst sowohl öffentliche als auch private Aspekte. Zum privaten Baurecht zählen bspw. genauere Vorgaben zur Gestaltung und Bebauung eines Grundstückes, aber auch Nachbarrechtsgesetze sowie das Bauvertragsrecht. Das öffentliche Baurecht hingegen beinhaltet das Bauplanungsrecht, zu denen die Flächennutzungsplanung (FNP) sowie die Bebauungsplanung (B-Plan) zählen, und das Bauordnungsrecht. Das Bauordnungsrecht der Länder ist objektbezogen, während das Bauplanungsrecht flächenbezogen ist [2].','2024-08-30 14:25:20',NULL),
(6,1,'Planungsebenen','Die Planung in der Bundesrepublik Deutschland ist auf mehrere Ebenen aufgeteilt. Es gibt die Bundesebene, die Landesebene und die Kommunalebene. Je nach Darstellung wird auch die EU-Ebene als eine weitere Ebene ergänzt. Als Oberbegriff dieses mehrgliedrigen Systems dient der Begriff Raumplanung. Das Subsidiaritätsprinzip gibt dabei vor, dass die Kompetenzen auf der möglichst niedrigsten Planungsebene bearbeitet werden sollen. Die Kommunen besitzen aufgrund der kommunalen Selbstverwaltung eine besondere Rolle. Aufgrund der Zweckmäßigkeit sind auf der Bundesebene daher insbesondere rechtliche Vorgaben zu treffen, die die Länder und Kommunen zu befolgen haben. Durch das Gegenstromprinzip sind die einzelnen abgegrenzten Ebenen miteinander vernetzt [2].','2024-08-30 14:25:20',NULL),
(7,2,'Funktionsgemischte Stadt','Im Leitbild der kompakten Stadt ist die Nutzungsmischung ein zentraler Bestandteil. In kleinräumigen Strukturen sollen die verschiedenen Funktionen, z.B. das Wohnen und Arbeiten sowie die Erholung, miteinander kombiniert werden, womit die Erreichbarkeiten verbessert werden sollen.','2024-08-30 14:25:20',NULL),
(8,2,'15-Minuten-Stadt','Das Konzept der 15-Minuten-Stadt besteht darin, dass Stadtbewohner:innen ihre alltäglichen Bedürfnisse innerhalb eines Radius von 15 Minuten zu Fuß oder mit dem Fahrrad erledigen können sollten. Gleichzeitig ermöglicht ihnen das Konzept, schnell andere Stadtteile zu erreichen und größere Entfernungen mittels nachhaltiger Verkehrsmittel, etwa dem ÖPNV, zurückzulegen [3]. Voraussetzung für eine gelungene Umsetzung ist die Realisierung einer funktionsgemischten Stadt (siehe oben).','2024-08-30 14:25:20',NULL),
(9,2,'Stadt der kurzen Wege','Das Konzept verbindet die drei wesentlichen Elemente der Nutzungsmischung, der Dichte und einer hohen Qualität Öffentlicher (Frei-)Räume. Die Stadt der kurzen Wege hält Distanzen zwischen Wohnort, Arbeitsplatz, Nahversorgung und Dienstleistungen gering und wirkt dadurch einem großen Verkehrsaufkommen entgegen. Durch die kurzen Wege erreicht man alles bequem zu Fuß, mit dem Fahrrad oder Öffentlichen Verkehrsmitteln. Gleichzeitig nehmen Abgas- und Lärmbelästigung ab. Etwaige Strukturprinzipien einer solche Stadt sind unter anderem eine bahnorientierte städtebauliche Entwicklung, kompakte Stadtkörper sowie die Erhaltung großer zusammenhängender freier Naturlandschaften [4].','2024-08-30 14:25:20',NULL),
(10,2,'Essbare Stadt','Idee und Ziel des Konzepts ist die Entwicklung von multifunktionalen, öffentlich zugänglichen Grünflächen, die zum Anbau von Lebensmitteln genutzt werden. Hierdurch werden sowohl die Transportwege und -ketten von Lebensmittel reduziert sowie eine ortsnahe Produktion und Verfügbarkeit dieser ermöglicht als auch soziale Interaktion und Bildungsfunktionen verknüpft. Die so produzierten Lebensmittel sollen zudem kostenlos für die Bewohner:innen des Quartiers zur Verfügung gestellt werden [5].','2024-08-30 14:25:20',NULL),
(11,2,'Walkability','Der Begriff Walkability beschreibt die bewegungsfördernde Gestaltung von Wohnumgebungen, welche die persönliche Mobilität sowie die freizeitlichen Bewegungsaktivitäten begünstigen [6].','2024-08-30 14:25:20',NULL),
(12,2,'Barrierefrei und barrierearm','<p>Die Begriffe „barrierefrei“ und „barrierearm“ werden oft synonym verwendet, obwohl sie unterschiedliche bauliche Merkmale beschreiben.</p><ul><li><b>Barrierefreiheit</b> ist in Deutschland im Bundesgleichstellungsgesetz (BGG) von 2002, bzw. der Neufassung von 2016, im Paragraf 4 rechtlich definiert. „Barrierefrei“ bedeutet, dass eine Wohnung alle baulichen Voraussetzungen erfüllt, um Menschen mit verschiedenen Behinderungen uneingeschränkten Zugang und Nutzung zu ermöglichen. Barrierefreie Wohnungen müssen strenge Kriterien erfüllen, wie stufenlose Zugänge, ausreichend Bewegungsfläche und angepasste Sanitäranlagen.</li><li>Der Begriff „<b>barrierearm</b>“ spiegelt die Herausforderung wider, dass es schwierig ist, alle Barrieren für die unterschiedlichen Bedürfnisse verschiedener Zielgruppen zu beseitigen. Im Gegensatz zur Barrierefreiheit, für die es klare Regeln und Richtlinien gibt, existieren für Barrierearmut keine festen Maßstäbe. Eine barrierearme Wohnung weist einige bauliche Anpassungen auf, die den Zugang und die Nutzung erleichtern, ist jedoch nicht vollständig barrierefrei. Eine barrierearme Wohnung kann zum Beispiel über einige Hilfsmittel wie Rampen oder breitere Türen verfügen, aber dennoch Stufen oder schmale Durchgänge haben, die für manche Menschen mit Behinderungen ein Hindernis darstellen [57].</li></ul>','2024-08-30 14:25:20',NULL),
(13,3,'Infrastruktur','Der Begriff Infrastruktur ist ein Oberbegriff für die einzelnen infrastrukturellen Teilbereiche, zu denen die unten erklärten Begriffe technische Infrastruktur, soziale Infrastruktur sowie grüne und blaue Infrastruktur zählen. Die technische und die soziale Infrastrukturen stellen dabei die Basis für Daseinsvorsorge dar und werden von staatlicher Seite bereitgestellt, die für ein funktionierenden Zusammenleben unabdingbar sind [2].','2024-08-30 14:25:20',NULL),
(14,3,'Technische Infrastruktur','<p>Technische Infrastrukturen sind technisch und organisatorisch komplexe, kostenintensive und raumwirksame materielle und/oder institutionelle Einrichtungen. Sie sichern über die Bereitstellung von kritischen Infrastrukturen die Funktionsfähigkeit moderner Gesellschaften. Als Bereiche lassen sich die Folgenden unterteilen [2, S. 2650]:</p><ul class=\"mb-0\"><li>Ver- und Entsorgung (z.B. Abwasserentsorgung)</li><li>Verkehr (z.B. Straßenverkehr)</li><li>Information & Telekommunikation (z.B. Internet)</li></ul>','2024-08-30 14:25:20',NULL),
(15,3,'Soziale Infrastruktur','<p>Soziale Infrastruktur ermöglicht grundsätzlich Begegnungen und stellt Treffpunkte für die Bewohner:innen dar. Die Nutzung erfolgt durch Menschen verschiedenen</p><ul><li>Alters,</li><li>Geschlechts,</li><li>Milieus und</li><li>ethnischer Herkunft.</li></ul><p>Einige soziale Infrastrukturen, wie beispielsweise Spielplätze, haben eine zweckgebundene Funktion, sodass hier bestimmte Gruppen für einen bestimmten Zweck zusammenkommen. Dennoch folgt dadurch i.d.R. keine milieuspezifische Selektion und der Ort kann auch für andere Ziel- und Altersgruppen für Begegnung und/oder Interaktion zur Verfügung stehen. Ein breites Angebot sozialer Infrastrukturen ermöglicht es, auf die Vielfalt der Gesellschaft einzugehen und nicht nur Begegnungen ausgewählter Gruppen hervorzurufen. Mögliche Orte für diverse Begegnungen bilden u.a.</p><ul class=\"mb-0\"><li>Gastronomien und Einzelhandel,<li>Feste, Aktionen und organisierte Treffen,</li><li>Kneipen und Bars sowie</li><li>Bildungs- und Kulturstätten [7].</li></ul>','2024-08-30 14:25:20',NULL),
(16,3,'Grüne und blaue Infrastruktur','Im städtischen Kontext wird zwischen grünen (Hausgärten, Parks, Grünverbindungen, Gründächer) und blauen (Gewässer, Überflutungsbereiche, Entwässerungssysteme) Infrastrukturen unterschieden. Bei blauer und grüner Infrastruktur handelt es sich sowohl um natürlich gewachsene als auch um naturnah angelegte Grün- und Wasserflächen [8].','2024-08-30 14:25:20',NULL),
(17,4,'Wohnraum','Unter Wohnraum werden alle Wohn-, Schlaf- und Esszimmer sowie andere separate Räume verstanden. Bäder, Toiletten, Abstellräume, Flure, Balkone sowie gewerblich genutzte Räume zählen nicht dazu [9]. ','2024-08-30 14:25:20',NULL),
(18,4,'Bezahlbarer Wohnraum','Unter der Anforderung an „bezahlbareren Wohnraum“ ist zu verstehen, dass für eine Mietwohnung, inklusiver aller Betriebskosten, dauerhaft nicht mehr als ein Drittel des Haushaltseinkommens aufgebracht werden sollte und ein Restbetrag für die Lebensführung vorhanden bleibt. Diese Herangehensweise ist unabhängig von der individuellen Einkommenssituation und universell anwendbar. Voraussetzung für „bezahlbares Wohnen“ ist dabei, dass die Anforderungen der Mieter:innen (Familien, Wohngemeinschaften, Singles, usw.) an die Wohnung, z.B. in Form, Lage und Größe, erfüllt werden [10].','2024-08-30 14:25:20',NULL),
(19,4,'Gesunder Wohnraum','<p>Zu den Mindestanforderungen für gesunden Wohnraum zählen [11]:</p><ul><li>Gewährleistung der menschlichen Unversehrtheit</li><li>Sicherheit</li><li>Beständigkeit</li><li>private Nutzbarkeit</li><li>Komfort (Ausstattung, Temperatur, Belüftung)</li></ul><p class=\"mb-0\">Diese Mindestanforderungen können mit den Themen Barrierefreiheit und der Ermöglichung von Selbstständigkeit verschränkt werden, um einen verstärkten Beitrag zur Gesundheitsförderung zu leisten.</p>','2024-08-30 14:25:20',NULL),
(20,4,'Wohnumfeld','<p>Unter dem Wohnumfeld wird der unmittelbar an ein Wohngebäude angrenzende Raum verstanden [12].</p><ul class=\"mb-0\"><li>Hausvorbereich</li><li>Wohn- und Vorgärten</li><li>Hinter- und Innenhöfe</li><li>Wege, Straßen, Plätze</li><li>öffentliches/halböffentliches nutzbares Grün</li></ul>','2024-08-30 14:25:20',NULL),
(21,5,'Städtebauliche Typologien','<p>Bei städtebaulichen Typologien bzw. Gebäudetypologien handelt es sich um ein räumliches Gefüge von Einzelbauten und/oder Baugruppen. Sie ergibt sich u.a. aus [13]:</p><ul class=\"mb-0\"><li>Eigentümer:innen</li><li>Benutzer:innen</li><li>Funktion</li><li>Erschließung</li><li>Bezug zu Freiraum und Öffentlichkeit</li></ul>','2024-08-30 14:25:20',NULL),
(22,5,'Block(rand)bebauung','Bei der Blockrandbebauung handelt es sich um eine allseitig von Straßen umgebene Bebauung. Es gibt eine klare Orientierung zu einem öffentlichen vorderen (Straße) und einem privaten hinteren Bereich (Hof) [13].','2024-08-30 14:25:20',NULL),
(23,5,'Hofbebauung','Die Hofbebauung ist die Umkehrung der Blockbebauung. Die Gebäude werden von der Hofseite erschlossen, d. h. die Vorderseite der Gebäude geht zum Hof, die Rückseite weist nach außen [13].','2024-08-30 14:25:20',NULL),
(24,5,'Reihenbebauung','Bei der Reihenbebauung sind die Gebäudezugänge zur Straße hin orientiert. Die Bebauung erfolgt straßenbegleitend (parallel) [13].','2024-08-30 14:25:20',NULL),
(25,5,'Zeilenbebauung','Bei der Zeilenbebauung sind die Gebäude stirnseitig zur Erschließungsstraße ausgerichtet. Die Erschließung erfolgt über sekundäre Zugänge bzw. Zugangswege [13].','2024-08-30 14:25:20',NULL),
(26,5,'Solitär','Solitäre sind isoliert stehende Gebäude. Sie haben einen Abstand zu allen ihrer Nachbargebäude, daher sind alle Gebäudeseiten sichtbar. In ihrer Größe, Grundrissgeometrie, Architektur sowie ihrem Material sind sie autonom [13].','2024-08-30 14:25:20',NULL),
(27,5,'Cluster- & Gruppenbauweise','In die Cluster- und Gruppenbauweise fallen all jene Anordnungen von Gebäuden, die zu keiner der oben beschriebenen Gebäudetypologien passen. Es handelt sich um eine kompositorische Gruppierung der Gebäude nach einer inneren Logik. Cluster sind dabei eine sehr konzentrierte Gruppierung, bei einer Gruppe bestehen zwischen den Gebäuden größere Abstände [13].','2024-08-30 14:25:20',NULL),
(28,6,'Personenverkehr','Unter Personenverkehr wird die Beförderung von Menschen zwischen diversen Orten verstanden. Er unterteilt sich in den Individualverkehr (z.B. Auto) und den öffentlichen Verkehr (z.B. Bus) [14].','2024-08-30 14:25:20',NULL),
(29,6,'Verkehrsströme','Als Verkehrsströme lassen sich unterscheiden: Fußverkehr, Radverkehr, Öffentlicher Personennahverkehr, Motorisierter Individualverkehr. Sie gehen dabei mit unterschiedlichen Nutzungsansprüchen einher. Während Fußgänger:innen im Vergleich zu anderen Verkehrsteilnehmenden deutlich langsamer unterwegs sind und einige Flächen im Straßenraum als Aufenthaltsorte nutzen, streben der MIV und Radverkehr meist eine schnelle Fortbewegung ohne Unterbrechungen an.','2024-08-30 14:25:20',NULL),
(30,6,'Hierarchisierung der Verkehrsteilnehmer:innen','Derzeit kommt dem motorisierten Individualverkehr im Verkehrsraum die größte Priorität zu. Fußgänger:innen, Radfahrer:innen sowie Nutzer:innen des Öffentlichen Personennahverkehrs (ÖPNV) kommt eine untergeordnete Rolle zu. Dies entspricht dem Leitbild der autogerechten Stadt, also der Orientierung der Stadtentwicklung an den Bedürfnissen des motorisierten Individualverkehrs (MIV).','2024-08-30 14:25:20',NULL),
(31,6,'Motorisierter Individualverkehr (MIV)','Unter dem motorisierten Individualverkehr wird die Nutzung von Personenkraftwagen (Pkw) sowie Krafträdern im Personenverkehr verstanden. Nutzer:innen sind frei in der Bestimmung von Fahrweg sowie –ziel und Zeit [15].','2024-08-30 14:25:20',NULL),
(32,6,'Öffentlicher Personennahverkehr (ÖPNV)','Unter den Öffentlichen Personennahverkehr (ÖPNV) fällt der gesamte Öffentliche Verkehr mit einer mittleren Reiseweite unter 50km, alles darüber hinaus ist dem Öffentlichen Personenfernverkehr zuzuschreiben [14].','2024-08-30 14:25:20',NULL),
(33,6,'Bauliche Maßnahmen zur Verkehrsberuhigung','<p>Es kann zwischen straßenverkehrsrechtlichen und baulichen Maßnahmen zur Verkehrsberuhigung unterschieden werden. Bauliche Maßnahmen zielen v.a. auf eine Geschwindigkeitsreduzierung des Kraftfahrzeugverkehrs ab. Geeignete Maßnahmen können u.a. sein [16]:</p><ul class=\"mb-0\"><li>Versätze (Verschwenkungen in der Straßenführung)</li><li>Aufpflasterungen</li><li>Anordnung von Mittelinseln</li><li>Anordnung von Schwellen</li></ul>','2024-08-30 14:25:20',NULL),
(34,7,'Klimaschutz','Klimaschutz beinhaltet alle Maßnahmen die dazu dienen, den Ausstoß von klimarelevanten Treibhausgasen (z.B. Kohlendioxid) zu reduzieren, um das Voranschreiten des Klimawandels auszubremsen [17].','2024-08-30 14:25:20',NULL),
(35,7,'Klimaanpassung','Klimaanpassung beinhaltet alle Maßnahmen die dem vorsorgenden Umgang mit den nicht mehr abwendbaren Folgen des Klimawandels und Extremwetterereignissen dienen. Es geht dabei um die Anpassung an die zu erwartenden Veränderungen, die Minimierung von Risiken sowie die Vermeidung von (weiteren) Schäden [17].','2024-08-30 14:25:20',NULL),
(36,7,'Klimaanpassungsmaßnahmen','<p>Zu Klimaanpassungsmaßnahmen zählen u.a. [18]:</p><ul><li>Dach- und Fassadenbegrünung</li><li>Planung und Bau von technischen Hochwasserrückhaltemaßnahmen</li><li>Dezentrale Regenwasserbewirtschaftung</li><li>Förderung von natürlichem Wasserrückhalt</li><li>Entwicklung klimaangepasster Wasserversorgungskonzepte</li><li>Verbesserung der Luftqualität</li><li>Sicherung des Biotopverbunds</li></ul>','2024-08-30 14:25:20',NULL),
(37,7,'Extremwetterereignis','<p>Bei Extremwetterereignissen handelt es sich um das Auftreten eines Ereignisses, das örtlich und jahreszeitlich selten bzw. ungewöhnlich ist [19].</p><p>Mit dem Klimawandel steigen sowohl die Durchschnitts-, als auch die Extremtemperaturen. Dabei werden Hitzewellen, sowie heiße Tage und Nächte häufiger und extremer.</p>','2024-08-30 14:25:20',NULL),
(38,7,'Hitzewelle','Dabei handelt es sich um eine längere Periode ungewöhnlich hoher atmosphärischer Hitzebelastung, welche temporär die Lebensweise der Bevölkerung verändert und negative gesundheitliche Folgen für diese haben kann [20].','2024-08-30 14:25:20',NULL),
(39,7,'Urban Heat Island Effekt','<p>Urban Heat Islands sind städtische Gebiete, in denen erhöhte Temperaturen im Vergleich zu außenliegenden Gebieten festgestellt werden. Städtische, dicht bebaute Infrastrukturen, unter anderem Gebäude und Straßen, nehmen die Sonnenwärme stärker auf und strahlen sie wieder ab – im Gegensatz zu natürlichen Umgebungen wie Wiesen, Wälder und Gewässer. Städtische Gebiete, in denen diese Strukturen stark konzentriert sind und es nur wenig Grün gibt, werden zu \"Inseln\" mit höheren Temperaturen im Vergleich zu außenliegenden Gebieten. Wärmeinseln können unter verschiedenen Bedingungen zu jeder Jahreszeit entstehen, sowohl tagsüber als auch nachts, in kleinen oder großen Städten, in Vorstädten und in nördlichen oder südlichen Klimazonen.</p><p>Die Forschung prognostiziert, dass sich der Wärmeinseleffekt in Zukunft noch verstärken wird, da sich die Struktur, die räumliche Ausdehnung und die Bevölkerungsdichte der städtischen Gebiete verändern und wachsen wird [21].</p>','2024-08-30 14:25:20',NULL),
(40,7,'Starkregenereignis','<p>Starkregen bezeichnet eine große Niederschlagsmenge in einer bestimmten Zeitspanne. Der Deutsche Wetterdienst unterscheidet dabei drei Stufen von Starkregen [22]:</p><ul><li>Regenmengen 15 bis 25 l/m² in 1 Stunde oder 20 bis 35 l/m² in 6 Stunden (Markante Wetterwarnung)</li><li>Regenmengen > 25 bis 40 l/m² in 1 Stunde oder > 35 l/m² bis 60 l/m² in 6 Stunden (Unwetterwarnung)</li><li>Regenmengen > 40 l/m² in 1 Stunde oder > 60 l/m² in 6 Stunden (Warnung vor extremem Unwetter)</li></ul>','2024-08-30 14:25:20',NULL),
(41,7,'Tropennacht','Bei diesen handelt es sich um Nächte mit Nachtmindesttemperaturen über 20°C.','2024-08-30 14:25:20',NULL),
(42,7,'Kaltluftentstehungsgebiet','Kaltluftentstehungsgebiete sind Flächen, die nachts die auf ihnen ruhende Luft abkühlen, wobei dieser Effekt von den Bodeneigenschaften und Vegetation abhängt. Solche Gebiete sind Teil von Kaltluftbahnen, durch die bodennahe Luftschichten mit Kaltluft aufgrund eines Gefälles ungehindert in Siedlungsgebiete strömen können [8,23].','2024-08-30 14:25:20',NULL),
(43,7,'Frischluftentstehungsgebiet','Frischluftentstehungsgebiete sind zusammenhängende ausgedehnte, siedlungsnahe Waldflächen, die sich positiv auf die Luftqualität und -austausch sowie auf das Klima umliegender Siedlungsgebiete auswirken. Die produzierte Frischluft gelangt mithilfe von Frischluftbahnen, wie beispielsweise linearen Gewässerstrukturen, oder durch Kaltluftbahnen, die durch Gefälle entstehen, in die Siedlungsgebiete [8,23].','2024-08-30 14:25:20',NULL),
(44,7,'Frischluftschneise/-bahn','Als Frischluftbahnen bzw. -schneisen werden freigehaltene Flächen in Städten bezeichnet, welche die inneren Stadtbezirke mit zirkulierender Luft aus dem Umland versorgen. Sie stellen ein wichtiges Instrument in der Klimaregulierung dar. Dabei kann es sich beispielsweise um lineare Gewässerstrukturen handeln [23,24]','2024-08-30 14:25:20',NULL),
(45,7,'Emissionen','Emittenten verursachen Immissionen (siehe unten). Beispiele hierfür sind Industrieanlagen oder der Verkehr. Sie können bspw. Geräusche und Luftverunreinigungen produzieren, die auf die Umwelt einwirken [2].','2024-08-30 14:25:20',NULL),
(46,7,'Immissionen','Immissionen sind Schadstoffe oder Energie, die von einer Emissionsquelle (siehe oben) auf Menschen, Tiere, Pflanzen oder Materialien einwirken. Es handelt sich also um die tatsächliche Belastung oder Beeinträchtigung, die durch die Emissionen entstehen. Beispiele für Immissionen sind Luftverunreinigungen, Geräusche, Erschütterungen, Licht, Wärme und Strahlen [2].','2024-08-30 14:25:20',NULL),
(47,7,'Verschattungselemente','Durch den anthropogenen Klimawandel werden sich Urban Heat Island Effekte (siehe oben) in den verdichteten und stark versiegelten städtischen Räumen in Zukunft stark bemerkbar machen. Um den Folgen etwas entgegenzuwirken, werden in diesen Räumen künftig mehr Verschattungselemente benötigt, damit die Menschen vor starker Hitze und Sonneneinstrahlung geschützt werden können. Dafür eignet sich z.B. Großvegetation in Form von Bäumen, aber auch Markisen oder Schirme [25].','2024-08-30 14:25:20',NULL),
(48,7,'Resilienz','Resilienz beschreibt die Widerstandsfähigkeit eines Systems oder eines Individuums, sich trotz großer Herausforderungen an Veränderungen anzupassen. Der Begriff der Robustheit dabei wird häufig als Synonym verwendet. Im sozio-ökonomischen Verständnis wird die Anpassungskapazität einer Gesellschaft an sich verändernden Lebensbedingungen betrachtet. Die Anpassungsstrategien der einzelnen Individuen können dabei sehr unterschiedlich ausfallen, da die Herausforderungen ebenso unterschiedlich wahrgenommen und empfunden werden [2].','2024-08-30 14:25:20',NULL),
(49,8,'Raum','Raum ist ein Begriff, der in der Raumplanung auf verschiedene Weisen benutzt wird. Er reicht von Stadtplanung, die sich auf die verschiedene Nutzung von Flächen konzentriert, bis hin zur Bundesraumordnung, welche die gesamte Entwicklung Deutschlands und die Struktur von verschiedenen Regionen betrachtet. Dabei kann Raum sowohl konkrete Teile der Erdoberfläche als auch gesellschaftliche Konzepte bedeuten. Daher gibt es keine umfassende, geschlossene planungsbezogene Raumtheorie. Raumordnung und Landesplanung stehen vor der Herausforderung die vielen Aspekte des Raums in Theorie und Praxis zu berücksichtigen [2].','2024-08-30 14:25:20',NULL),
(50,8,'Öffentlicher (Frei-)Raum','Öffentliche (Frei-)Räume stellen das Gegenstück zu privaten (Frei-)Räumen dar. Diese können grundsätzlich von jeder Person ohne Einschränkungen genutzt werden. Öffentliche Räume bilden sich aus der gebauten städtischen Umwelt heraus und umfassen dabei Park- und Platzanlagen, Gärten, Sportanlagen, Straßenräume sowie Wegeverbindungen [12,26].','2024-08-30 14:25:20',NULL),
(51,8,'Grüne & blaue Naturräume','Grüne und blaue Naturräume sind Netzwerke aus natürlichen und naturnahen Gebieten. Diese Flächen umfassen sowohl Land- als auch Wasserflächen und sind so gestaltet, dass sie wichtige Dienstleistungen wie sauberes Wasser, gute Luft, Erholungsräume und Schutz vor Klimawandel bieten. Sie verbessern die Umwelt, die Gesundheit und die Lebensqualität der Menschen und fördern die Artenvielfalt. Ein Beispiel für ein weitreichenden, internationalen Bestandteil dieser grünen Infrastruktur ist das Natura 2000-Netzwerk. Lokale Grünflächen wiederum umfassen u.a. Teiche, Hecken und auch weniger natürliche Elemente wie Gründächer oder begrünte Fassaden [55].','2024-08-30 14:25:20',NULL),
(52,8,'Angsträume','Ein Angstraum ist ein Bereich in der Stadt, der besonders bei Nacht als unsicher empfunden wird, insbesondere von vulnerablen Gruppen, wie Frauen und Kindern. Oftmals sind es Orte mit schlechter Beleuchtung und wenigen Menschen, wie leere, abgelegene oder unübersichtliche Plätze. Wer sich dort aufhält und wie der Ort gestaltet ist, spielt eine Rolle für das (subjektive) Sicherheitsgefühl. Um Angsträume zu vermeiden, gibt es in der Stadtplanung verschiedene Ansätze. Dazu gehören gute Beleuchtung, übersichtliche Straßen und Gehwege oder niedrige Hecken, die helfen, die Stadt sicherer und freundlicher zu gestalten [56].','2024-08-30 14:25:20',NULL),
(53,8,'Aneignung von Räumen','Die Aneignung oder das „Sich-nutzbar-machen“ ist als Prozess zu verstehen, der beschreibt, wie Menschen sich die gegebenen räumlichen Strukturen und Ausstattungen aneignen [27]. Diese Nutzung kann dem geplanten Zweck folgen oder die Ausstattung/Gestaltung „zweckentfremden“, beispielsweise indem eine Sitzbank sowohl für den Aufenthalt oder als Sportgerät Verwendung findet [28].','2024-08-30 14:25:20',NULL),
(54,9,'Siedlungsstruktur','Der Begriff Siedlungsstruktur ist ein Oberbegriff für verschiedenste Ausprägungen einer Siedlung, zu denen u.a. die nachfolgenden Begriffe kompakte Siedlungsstruktur, disperse Siedlungsstruktur und resiliente Siedlungsstruktur zählen.','2024-08-30 14:25:20',NULL),
(55,9,'Kompakte Siedlungsstruktur','Eine kompakte Siedlungsstruktur orientiert sich am Leitbild der funktionsgemischten Stadt und weist somit kleinräumige Strukturen und einen hohen Grad an Nutzungsmischung auf. Im Vergleich zu der dispersen Siedlungsstruktur sind die (Nach)Verdichtung und eine reduzierte Flächenneuinanspruchnahme wichtige Elemente [2].','2024-08-30 14:25:20',NULL),
(56,9,'Disperse Siedlungsstruktur','Eine disperse Siedlungsstruktur stellt einen Gegenentwurf zu einer kompakten Siedlungsstruktur dar. Sie weist u.a. eine geringe Verdichtung und eine Zersiedelung mit einem hohen Flächenverbrauch auf [2].','2024-08-30 14:25:20',NULL),
(57,9,'Resiliente Siedlungsstruktur','Ähnlich wie auch die kompakte Siedlungsstrukur ist auch die resiliente Siedlungsstruktur mit einer Funktionsmischung verbunden und orientiert sich am Leitbild der 15-Minuten-Stadt mit kleinräumigen Strukturen. Durch diese Strukturen verkürzen sich die alltäglichen Wege, wodurch die Attraktivität des Fuß- und Radverkehrs gesteigert und die Abhängigkeit zum motorisierten Individualverkehr reduziert wird. Dies trägt zu einer Verbesserung der Aufenthaltsqualität und einer Reduzierung des CO²-Ausstoßes bei. Gleichzeitig werden in resilienten Siedlungsstrukturen die Grün- und Freiräume mitbedacht, die u.a. Versickerungsmöglichkeiten bei Starkregenereignissen in Folge des anthropogenen Klimawandels bieten [29].','2024-08-30 14:25:20',NULL),
(58,9,'Quartier','Ein Quartier ist ein Gebiet innerhalb einer Stadt, das von der lokalen Bevölkerung sozial konstruiert ist und sowohl innerhalb des Gebietes durch vorhandene Beziehungen als auch von diversen externen Akteur:innen geprägt ist. Innerhalb des Quartiers befindet sich der Lebensmittelpunkt der dort wohnhaften Menschen. Durch die individuell unterschiedlich wahrgenommenen Wohnumfelder kann jedoch keine klare Abgrenzung bestimmt werden [2, S. 1837].','2024-08-30 14:25:20',NULL),
(59,9,'Quartierszentrum','Das Quartierszentrum stellt den sozialen und funktionalen Mittelpunkt eines Quartiers dar. An diesem Ort gibt es gebündelt verschiedene Begegnungsorte und Angebote der Daseinsvorsorge, bspw. Lebensmittelgeschäfte, Bäckereien oder ärztliche Versorgung, die die dort wohnhaften Menschen in ihrem Wohnumfeld alltäglich nutzen können.','2024-08-30 14:25:20',NULL),
(60,9,'Quartiersplatz','Ein Quartiersplatz ist ein gemeinschaftlich genutzter öffentlicher Raum innerhalb eines städtischen Wohngebiets und stellt das urbane Äquivalent zu einem traditionellen Dorfplatz dar. Er dient als zentraler Treffpunkt für soziale Interaktionen und Aktivitäten. Gestalterische Elemente wie Grün- oder Freiflächen, Sitzgelegenheiten oder Wasseranlagen sind typische Bestandteile von Quartiersplätzen. Letztendlich steht die Schaffung eines lebendigen und ansprechenden öffentlichen Raums im Mittelpunkt, der zur Stärkung des sozialen Zusammenhalts und der Lebensqualität in der Nachbarschaft beiträgt [30].','2024-08-30 14:25:20',NULL),
(61,10,'Sozialmanagement','Ein Sozialmanagement wird vor allem von wohnungswirtschaftlichen Akteur:innen, wie Wohngesellschaften, Wohneigentümer:innen oder Eigentümergemeinschaften, betrieben. Zur Erhöhung der lokalen Sicherheit werden häufig Hausmeister:innen und Concierge als Ansprechpersonen eingesetzt [31].','2024-08-30 14:25:20',NULL),
(62,10,'Sozialplan','Die Sozialplanung wird durch verschiedene Gesetze auf Bundesebene umgesetzt, z.B. durch das Raumordnungsgesetz (ROG), die Bauleitplanung oder durch Steuerungsmöglichkeiten nach dem Sozialgesetzbuch. Die dort verankerten Regelungen beeinflussen die Stadt- und Raumplanung maßgeblich mit. Mit der Behindertenrechtskonvention der Vereinten Nationen hat sich die Bundesrepublik Deutschland verpflichtet, die Gesellschaft inklusiv zu gestalten. Dies betrifft nicht nur die lokalen Umgestaltungsmöglichkeiten, sondern auch die Planungskommunikation der einzelnen Prozesse [2].','2024-08-30 14:25:20',NULL),
(63,10,'Bedarfsanalyse','Eine Bedarfsanalyse ist ein wichtiges Instrument für eine fundierte Einschätzung, welche planerischen Ansprüche die Zukunft in einzelnen Teilbereichen erfordert. Oft sind Bedarfsanalysen verbunden mit Prognosen, z.B. Bevölkerungsprognosen. Sie dienen als Basis für die Abschätzung des Bedarfes, z.B. für soziale Infrastruktur oder die Anzahl an notwendigen Wohneinheiten [32].','2024-08-30 14:25:20',NULL),
(64,10,'Gewässermanagement','Nachhaltiges Gewässermanagement bringt verschiedene Vorteile mit sich, unter anderem kann dieses durch die Vermeidung von Gewässerverunreinigungen eine bessere Wasserqualität und eine höhere Verfügbarkeit von hochwertigem Trinkwasser bewirken. Daneben können durch nachhaltiges Gewässermanagement die Auswirkungen von Naturkatastrophen wie Dürren oder Überschwemmungen minimiert werden [11].','2024-08-30 14:25:20',NULL),
(65,11,'Sozialer Zusammenhalt','Der Begriff sozialer Zusammenhalt beschreibt das Ausmaß an Verbundenheit und Solidarität zwischen Gruppen in der Gesellschaft. Als Hauptdimensionen werden dabei das Zugehörigkeitsgefühl und die Beziehungen zwischen den Gesellschaftsmitgliedern beschrieben [33].','2024-08-30 14:25:20',NULL),
(66,11,'Soziale Unterstützung','Soziale Unterstützung ist eine qualitative Eigenschaft sozialer Beziehungen und kann durch Eingliederung in soziale Netzwerke und soziale Teilhabe stattfinden. Die Unterstützung von Individuen aus sozialen Beziehungen lässt sich quantitativ durch die Anzahl und Frequenz sozialer Kontakte sowie qualitativ durch die soziale Unterstützung bewerten [34].','2024-08-30 14:25:20',NULL),
(67,11,'Gemeinschaftsgefühl','Das Gemeinschaftsgefühl oder der Gemeinschaftssinn wird häufig als Zugehörigkeitsgefühl, Gefühl der gegenseitigen Anerkennung und einem gemeinsamen Glauben, dass Bedürfnisse durch das Zusammensein erfüllt werden, innerhalb einer Gruppe definiert [35].','2024-08-30 14:25:20',NULL),
(68,11,'Benachteiligte Gruppen','Zu benachteiligten Gruppen zählen z.B. Haushalte mit geringem Einkommen, Alleinerziehende, Arbeitslose, Migrant:innen, Geflüchtete, Menschen mit Behinderung, ältere Menschen.','2024-08-30 14:25:20',NULL),
(69,11,'Vulnerable Gruppen','<p>Der Begriff Vulnerabilität bedeutet so viel wie Verwundbarkeit bzw. Empfindlichkeit. In der Bevölkerung gibt es verschiedene Gruppen, die vulnerabel sind und dadurch besondere Berücksichtigung benötigen. Die Vulnerabilität prägt sich dabei unterschiedlich aus. Kleinkinder im Alter von bis zu fünf Jahren sind beispielsweise besonders anfällig für Atemwegserkrankungen. Auch Schwangere und ältere Personen weisen spezielle Bedürfnisse auf, die jedoch nicht zu pauschalisieren sind.</p><p class=\"mb-0\">Auch Personen mit einem geringeren Einkommen und einem geringeren Bildungsabschluss gelten als vulnerabel, da diese überwiegend an Orten mit umweltbedingten Belastungen leben und zusätzlich mit individuellen Belastungen konfrontiert sein können [36].</p>','2024-08-30 14:25:20',NULL),
(70,11,'Soziale Chancengleichheit','Chancengleichheit meint, dass alle Bürger:innen die gleichen Chancen besitzen, ihr individuelles Leben nach ihren Wünschen und Vorstellungen zu gestalten. Aufgrund von Konkurrenzsituationen, z.B. im Bereich der Bildung und des Berufs, werden jedoch viele Menschen aufgrund von persönlichen Indikatoren wie die soziale Herkunft oder das Geschlecht gegenüber anderen strukturell benachteiligt, womit eine Chancenungerechtigkeit entsteht [37].','2024-08-30 14:25:20',NULL),
(71,11,'Sozio-Kultur','Sozio-Kultur meint die Verbindung zwischen Kultur und Gesellschaft. Sie umfasst jene Kultur, die von allen Bevölkerungsgruppen lokal gestaltet und umgesetzt wird. Sozio-kultuelle Angebote können dabei u.a. aus dem Bereich der Sozial-, Bildungs- und Jugendarbeit stammen und sich an eine breite Zielgruppe richten. Ziel ist dabei auch die Demokratisierung des kulturellen Angebotes [38].','2024-08-30 14:25:20',NULL),
(72,12,'Zumutbare Entfernung','400-500 Meter sind als zumutbare Entfernung bis zu den nächsten Einrichtungen des täglichen Bedarfs zu betrachten [39] zit. n. [11]. Als zumutbare Entfernung zu Bushaltestellen sind 600m, zu Bahnhöfen 1200m ausreichend [40]. Um den Anforderungen an Barrierefreiheit für mobilitätseingeschränkte Personen an zumutbare Entfernungen gerecht zu werden, ist es empfehlenswert, diese folgendermaßen zu senken: 300-350m für Innenstadtbereiche, 350-400m für Vorortbereiche und 450-500m für Außengebiete [41,42].','2024-08-30 14:25:20',NULL),
(73,12,'Lichtverschmutzung','<p>Der Sammelbegriff Lichtverschmutzung bezeichnet die nicht intendierten Auswirkungen künstlicher Beleuchtung [43].</p><p class=\"mb-0\">Wenngleich öffentliche Beleuchtung einen wichtigen Beitrag zum Schutz, Sicherheit und visuellen Attraktivität der Umgebung leistet, können bei schlechter Platzierung Beeinträchtigungen wie Schlafstörungen, störendes Licht auf Anwohnergrundstücken, Verschwendung von Licht in den Nachthimmel und starke Blendung auftreten [11].</p>','2024-08-30 14:25:20',NULL),
(74,12,'Städtebauförderung','Die Städtebauförderung ist eine gesamtstaatliche Förderung von Bundes-, Landes- und Kommunalebene, die seit 1971 im Städtebauförderungsgesetz festgelegt ist und bei der grundsätzlich eine Drittelfinanzierung vorgesehen ist. Sie dient dazu, städtebauliche und soziale Missstände zu beheben. Die Förderung gliedert sich dabei in verschiedene Programme mit unterschiedlichen Schwerpunkten, die in der Vergangenheit mehrfach umgestaltet wurden [2, S. 2395f.]. Derzeitig bietet die Städtebauförderung die folgenden drei Programme an: Lebendige Zentren, Sozialer Zusammenhalt sowie Wachstum und nachhaltige Erneuerung [44].','2024-08-30 14:25:20',NULL),
(75,13,'Gesundheitsförderung','Gesundheitsförderung bezeichnet Maßnahmen mit der Zielsetzung, die Gesundheit und das Wohlbefinden zu stärken. Dies beinhaltet die Förderung eines gesunden Lebensstils, die Schaffung gesundheitsfördernder Umgebungen, die Stärkung individueller Ressourcen und die Vermittlung von Gesundheitskompetenz [45].','2024-08-30 14:25:20',NULL),
(76,13,'Gesundheitsmonitoring','Unter Gesundheitsmonitoring wird im Allgemeinen ein kontinuierlicher Prozess der systematischen Sammlung, Analyse und Bewertung von Daten im Gesundheitsbereich verstanden. Ziel des Gesundheitsmonitorings ist es, relevante Informationen über den Gesundheitszustand von Bevölkerungsgruppen oder spezifischen Zielgruppen zu sammeln, um Trends zu erkennen, Probleme frühzeitig zu erkennen, Risikogruppen zu identifizieren und Maßnahmen zur Gesundheitsförderung und Krankheitsprävention zu entwickeln. Hierzu können verschiedene Methoden wie Befragungen oder epidemiologische Studien eingesetzt werden [46].','2024-08-30 14:25:20',NULL),
(77,13,'Herz-Kreislauf-Erkrankungen','<p>Zu den häufigsten Herz-Kreislauf-Erkrankungen zählen [47,48]:</p><ul class=\"mb-0\"><li>Arteriosklerose</li><li>Hypertonie (Bluthochdruck)</li><li>Herzinfarkt</li><li>Schlaganfall</li><li>Koronare Herz-Krankheit</li><li>Periphere arterielle Verschlusskrankheit</li></ul>','2024-08-30 14:25:20',NULL),
(78,13,'Lungenerkrankungen','<p>Zu den häufigsten Lungenerkrankungen zählen [49]:</p><ul class=\"mb-0\"><li>Chronisch obstruktive Lungenerkrankung (COPD)</li><li>Asthma</li><li>Lungenentzündung</li><li>Lungenkrebs</li><li>Lungenfibrose</li></ul>','2024-08-30 14:25:20',NULL),
(79,13,'Morbidität','Unter Morbidität wird die Häufigkeit einer Erkrankung innerhalb einer Bevölkerung(-sgruppe) verstanden [50].','2024-08-30 14:25:20',NULL),
(80,13,'Mortalität','Mortalität beschreibt die Sterblichkeitsrate in Bezug auf eine bestimmte Krankheit. Sie gibt an, wie viele Patient:innen bezogen auf die Gesamtbevölkerung bzw. bestimmte Bevölkerungsgruppen innerhalb eines bestimmten Zeitraumes an einer Krankheit verstorben sind [51].','2024-08-30 14:25:20',NULL),
(81,13,'Prävalenz','Der Begriff Prävalenz beschreibt die Anzahl an Krankheitsfällen in einer Bevölkerung (bzw. einem Teil dieser) in einem definierten Zeitraum oder zu einem bestimmten Zeitpunkt [52].','2024-08-30 14:25:20',NULL),
(82,13,'Prävention','Unter Prävention werden Maßnahmen verstanden, die darauf abzielen, Gesundheitsprobleme wie Krankheiten oder Verletzungen vor dem Auftreten zu verhindern. Inhalte von Präventionsmaßnahmen können somit Aktivitäten wie Impfungen, Vermeidung von gesundheitlichen Risikofaktoren, Screening-Programme oder Aufklärungskampagnen sein [53].','2024-08-30 14:25:20',NULL),
(83,14,'Körperliche Aktivität','Der Begriff körperliche Aktivität umfasst jede durch die Skelettmuskulatur hervorgebrachte Bewegung, die zu einem Anstieg des Energieverbrauchs führt. Die Bandbreite körperlicher Aktivität reicht von alltäglichen Tätigkeiten bis hin zu sportlichen Betätigungen [54].','2024-08-30 14:25:20',NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `health_impacts`
--

CREATE TABLE `health_impacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `effect_type_id` int(10) UNSIGNED NOT NULL,
  `health_impact_type_id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `editor_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `health_impacts`
--

INSERT INTO `health_impacts` (`id`, `effect_type_id`, `health_impact_type_id`, `author_id`, `editor_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, '2024-05-26 20:34:25', NULL),
(2, 1, 2, 1, NULL, '2024-05-26 20:34:25', NULL),
(3, 1, 4, 1, NULL, '2024-05-26 20:34:25', NULL),
(4, 1, 5, 1, NULL, '2024-05-26 20:34:25', NULL),
(5, 1, 6, 1, NULL, '2024-05-26 20:34:25', NULL),
(6, 1, 7, 1, NULL, '2024-05-26 20:34:25', NULL),
(7, 1, 13, 1, NULL, '2024-05-26 20:34:25', NULL),
(8, 2, 1, 1, NULL, '2024-05-26 20:34:25', NULL),
(9, 2, 2, 1, NULL, '2024-05-26 20:34:25', NULL),
(10, 2, 13, 1, NULL, '2024-05-26 20:34:25', NULL),
(11, 3, 1, 1, NULL, '2024-05-26 20:34:25', NULL),
(12, 3, 2, 1, NULL, '2024-05-26 20:34:25', NULL),
(13, 3, 11, 1, NULL, '2024-05-26 20:34:25', NULL),
(14, 3, 9, 1, NULL, '2024-05-26 20:34:25', NULL),
(15, 3, 12, 1, NULL, '2024-05-26 20:34:25', NULL),
(16, 4, 1, 1, NULL, '2024-05-26 20:34:25', NULL),
(17, 4, 3, 1, NULL, '2024-05-26 20:34:25', NULL),
(18, 5, 10, 1, NULL, '2024-05-26 20:34:25', NULL),
(19, 6, 1, 1, NULL, '2024-05-26 20:34:25', NULL),
(20, 6, 2, 1, NULL, '2024-05-26 20:34:25', NULL),
(21, 6, 11, 1, NULL, '2024-05-26 20:34:25', NULL),
(22, 6, 8, 1, NULL, '2024-05-26 20:34:25', NULL),
(23, 7, 6, 1, NULL, '2024-05-26 20:34:25', NULL),
(24, 8, 1, 1, NULL, '2024-05-26 20:34:25', NULL),
(25, 8, 7, 1, NULL, '2024-05-26 20:34:25', NULL),
(26, 8, 2, 1, NULL, '2024-05-26 20:34:25', NULL),
(27, 9, 2, 1, NULL, '2024-05-26 20:34:25', NULL),
(28, 9, 5, 1, NULL, '2024-05-26 20:34:25', NULL),
(29, 9, 7, 1, NULL, '2024-05-26 20:34:25', NULL),
(30, 9, 4, 1, NULL, '2024-05-26 20:34:25', NULL),
(31, 10, 12, 1, NULL, '2024-05-26 20:34:25', NULL),
(32, 11, 1, 1, NULL, '2024-05-26 20:34:25', NULL),
(33, 11, 2, 1, NULL, '2024-05-26 20:34:25', NULL),
(34, 11, 13, 1, NULL, '2024-05-26 20:34:25', NULL),
(35, 12, 1, 1, NULL, '2024-05-26 20:34:25', NULL),
(36, 12, 2, 1, NULL, '2024-05-26 20:34:25', NULL),
(37, 12, 13, 1, NULL, '2024-05-26 20:34:25', NULL),
(38, 13, 1, 1, NULL, '2024-05-26 20:34:25', NULL),
(39, 13, 2, 1, NULL, '2024-05-26 20:34:25', NULL),
(40, 13, 11, 1, NULL, '2024-05-26 20:34:25', NULL),
(41, 13, 8, 1, NULL, '2024-05-26 20:34:25', NULL),
(42, 14, 12, 1, NULL, '2024-05-26 20:34:25', NULL),
(43, 15, 11, 1, NULL, '2024-05-26 20:34:25', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `health_impact_types`
--

CREATE TABLE `health_impact_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `icon_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_positive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `health_impact_types`
--

INSERT INTO `health_impact_types` (`id`, `order_id`, `icon_id`, `name`, `shortname`, `is_positive`, `created_at`, `updated_at`) VALUES
(1, 1, 300, 'Mortality', 'mortality', 0, '2024-05-26 20:34:18', NULL),
(2, 2, 265, 'Cardiovascular diseases', 'cardio', 0, '2024-05-26 20:34:18', NULL),
(3, 3, 0, 'Pulmonary diseases', 'pulmonary', 0, '2024-05-26 20:34:18', NULL),
(4, 4, 366, 'Overweight and obesity', 'overweight', 0, '2024-05-26 20:34:18', NULL),
(5, 5, 366, 'Diabetes', 'diabetes', 0, '2024-05-26 20:34:18', NULL),
(6, 6, 471, 'Infectious diseases', 'infectious', 0, '2024-05-26 20:34:18', NULL),
(7, 7, 366, 'Cancerous diseases', 'cancer', 0, '2024-05-26 20:34:18', NULL),
(8, 8, 231, 'Exhaustion symptoms and heat stroke', 'exhaustion', 0, '2024-05-26 20:34:18', NULL),
(9, 9, 0, 'Tinnitus and hearing loss', 'tinnitus', 0, '2024-05-26 20:34:18', NULL),
(10, 10, 70, 'Injuries and accidents', 'injuries', 0, '2024-05-26 20:34:18', NULL),
(11, 11, 159, 'Sleep disorders', 'sleep', 0, '2024-05-26 20:34:18', NULL),
(12, 12, 161, 'Mental health', 'mental-health', 1, '2024-05-26 20:34:18', NULL),
(13, 13, 153, 'Depressions', 'depression', 0, '2024-05-26 20:34:18', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `icons`
--

CREATE TABLE `icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fill` tinyint(1) NOT NULL DEFAULT 0,
  `available` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `icons`
--

INSERT INTO `icons` (`id`, `name`, `fill`, `available`, `created_at`, `updated_at`) VALUES
(1, '1-circle', 0, 1, '2024-07-24 14:09:18', NULL),
(2, '1-circle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(3, '1-square', 0, 1, '2024-07-24 14:09:18', NULL),
(4, '1-square-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(5, '2-circle', 0, 1, '2024-07-24 14:09:18', NULL),
(6, '2-circle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(7, '2-square', 0, 1, '2024-07-24 14:09:18', NULL),
(8, '2-square-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(9, '3-circle', 0, 1, '2024-07-24 14:09:18', NULL),
(10, '3-circle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(11, '3-square', 0, 1, '2024-07-24 14:09:18', NULL),
(12, '3-square-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(13, '4-circle', 0, 1, '2024-07-24 14:09:18', NULL),
(14, '4-circle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(15, '4-square', 0, 1, '2024-07-24 14:09:18', NULL),
(16, '4-square-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(17, '5-circle', 0, 1, '2024-07-24 14:09:18', NULL),
(18, '5-circle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(19, '5-square', 0, 1, '2024-07-24 14:09:18', NULL),
(20, '5-square-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(21, 'activity', 0, 1, '2024-07-24 14:09:18', NULL),
(22, 'airplane', 0, 1, '2024-07-24 14:09:18', NULL),
(23, 'airplane-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(24, 'alarm', 0, 1, '2024-07-24 14:09:18', NULL),
(25, 'alarm-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(26, 'app', 0, 1, '2024-07-24 14:09:18', NULL),
(27, 'app-indicator', 0, 1, '2024-07-24 14:09:18', NULL),
(28, 'arrow-left', 0, 1, '2024-07-24 14:09:18', NULL),
(29, 'arrow-left-circle', 0, 1, '2024-07-24 14:09:18', NULL),
(30, 'arrow-left-circle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(31, 'arrow-up-left', 0, 1, '2024-07-24 14:09:18', NULL),
(32, 'arrow-up-left-circle', 0, 1, '2024-07-24 14:09:18', NULL),
(33, 'arrow-up-left-circle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(34, 'arrow-up', 0, 1, '2024-07-24 14:09:18', NULL),
(35, 'arrow-up-circle', 0, 1, '2024-07-24 14:09:18', NULL),
(36, 'arrow-up-circle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(37, 'arrow-up-right', 0, 1, '2024-07-24 14:09:18', NULL),
(38, 'arrow-up-right-circle', 0, 1, '2024-07-24 14:09:18', NULL),
(39, 'arrow-up-right-circle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(40, 'arrow-right', 0, 1, '2024-07-24 14:09:18', NULL),
(41, 'arrow-right-circle', 0, 1, '2024-07-24 14:09:18', NULL),
(42, 'arrow-right-circle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(43, 'arrow-down-right', 0, 1, '2024-07-24 14:09:18', NULL),
(44, 'arrow-down-right-circle', 0, 1, '2024-07-24 14:09:18', NULL),
(45, 'arrow-down-right-circle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(46, 'arrow-down', 0, 1, '2024-07-24 14:09:18', NULL),
(47, 'arrow-down-circle', 0, 1, '2024-07-24 14:09:18', NULL),
(48, 'arrow-down-circle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(49, 'arrow-down-left', 0, 1, '2024-07-24 14:09:18', NULL),
(50, 'arrow-down-left-circle', 0, 1, '2024-07-24 14:09:18', NULL),
(51, 'arrow-down-left-circle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(52, 'asterisk', 1, 1, '2024-07-24 14:09:18', NULL),
(53, 'award', 0, 1, '2024-07-24 14:09:18', NULL),
(54, 'award-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(55, 'back', 0, 1, '2024-07-24 14:09:18', NULL),
(56, 'backpack', 0, 1, '2024-07-24 14:09:18', NULL),
(57, 'backpack-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(58, 'backpack2', 0, 1, '2024-07-24 14:09:18', NULL),
(59, 'backpack2-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(60, 'backpack3', 0, 1, '2024-07-24 14:09:18', NULL),
(61, 'backpack3-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(62, 'bag', 0, 1, '2024-07-24 14:09:18', NULL),
(63, 'bag-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(64, 'balloon', 0, 1, '2024-07-24 14:09:18', NULL),
(65, 'balloon-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(66, 'balloon-heart', 0, 1, '2024-07-24 14:09:18', NULL),
(67, 'balloon-heart-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(68, 'ban', 0, 1, '2024-07-24 14:09:18', NULL),
(69, 'ban-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(70, 'bandaid', 0, 1, '2024-07-24 14:09:18', NULL),
(71, 'bandaid-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(72, 'bank', 0, 1, '2024-07-24 14:09:18', NULL),
(73, 'bank2', 1, 1, '2024-07-24 14:09:18', NULL),
(74, 'bar-chart', 0, 1, '2024-07-24 14:09:18', NULL),
(75, 'bar-chart-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(76, 'battery', 0, 1, '2024-07-24 14:09:18', NULL),
(77, 'battery-half', 0, 1, '2024-07-24 14:09:18', NULL),
(78, 'battery-full', 1, 1, '2024-07-24 14:09:18', NULL),
(79, 'battery-charging', 0, 1, '2024-07-24 14:09:18', NULL),
(80, 'bell', 0, 1, '2024-07-24 14:09:18', NULL),
(81, 'bell-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(82, 'bell-slash', 0, 1, '2024-07-24 14:09:18', NULL),
(83, 'bell-slash-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(84, 'bezier', 0, 1, '2024-07-24 14:09:18', NULL),
(85, 'bezier2', 0, 1, '2024-07-24 14:09:18', NULL),
(86, 'bicycle', 0, 1, '2024-07-24 14:09:18', NULL),
(87, 'bookshelf', 0, 1, '2024-07-24 14:09:18', NULL),
(88, 'boombox', 0, 1, '2024-07-24 14:09:18', NULL),
(89, 'boombox-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(90, 'border', 0, 1, '2024-07-24 14:09:18', NULL),
(91, 'border-all', 0, 1, '2024-07-24 14:09:18', NULL),
(92, 'border-inner', 0, 1, '2024-07-24 14:09:18', NULL),
(93, 'border-outer', 0, 1, '2024-07-24 14:09:18', NULL),
(94, 'box', 0, 1, '2024-07-24 14:09:18', NULL),
(95, 'box-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(96, 'box-seam', 0, 1, '2024-07-24 14:09:18', NULL),
(97, 'box-seam-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(98, 'boxes', 0, 1, '2024-07-24 14:09:18', NULL),
(99, 'briefcase', 0, 1, '2024-07-24 14:09:18', NULL),
(100, 'briefcase-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(101, 'brightness-alt-high', 0, 1, '2024-07-24 14:09:18', NULL),
(102, 'brightness-alt-high-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(103, 'broadcast', 0, 1, '2024-07-24 14:09:18', NULL),
(104, 'broadcast-pin', 0, 1, '2024-07-24 14:09:18', NULL),
(105, 'building', 0, 1, '2024-07-24 14:09:18', NULL),
(106, 'building-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(107, 'buildings', 0, 1, '2024-07-24 14:09:18', NULL),
(108, 'buildings-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(109, 'bullseye', 0, 1, '2024-07-24 14:09:18', NULL),
(110, 'bus-front', 0, 1, '2024-07-24 14:09:18', NULL),
(111, 'bus-front-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(112, 'cake', 0, 1, '2024-07-24 14:09:18', NULL),
(113, 'cake-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(114, 'cake2', 0, 1, '2024-07-24 14:09:18', NULL),
(115, 'cake2-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(116, 'calendar-week', 0, 1, '2024-07-24 14:09:18', NULL),
(117, 'calendar-week-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(118, 'calendar2-date', 0, 1, '2024-07-24 14:09:18', NULL),
(119, 'calendar2-date-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(120, 'calendar3', 0, 1, '2024-07-24 14:09:18', NULL),
(121, 'camera', 0, 1, '2024-07-24 14:09:18', NULL),
(122, 'camera-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(123, 'capsule', 0, 1, '2024-07-24 14:09:18', NULL),
(124, 'capsule-pill', 0, 1, '2024-07-24 14:09:18', NULL),
(125, 'car-front', 0, 1, '2024-07-24 14:09:18', NULL),
(126, 'car-front-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(127, 'caret-left', 0, 1, '2024-07-24 14:09:18', NULL),
(128, 'caret-left-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(129, 'caret-up', 0, 1, '2024-07-24 14:09:18', NULL),
(130, 'caret-up-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(131, 'caret-right', 0, 1, '2024-07-24 14:09:18', NULL),
(132, 'caret-right-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(133, 'caret-down', 0, 1, '2024-07-24 14:09:18', NULL),
(134, 'caret-down-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(135, 'cart4', 0, 1, '2024-07-24 14:09:18', NULL),
(136, 'cash-coin', 0, 1, '2024-07-24 14:09:18', NULL),
(137, 'cash-stack', 0, 1, '2024-07-24 14:09:18', NULL),
(138, 'cassette', 0, 1, '2024-07-24 14:09:18', NULL),
(139, 'cassette-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(140, 'chat', 0, 1, '2024-07-24 14:09:18', NULL),
(141, 'chat-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(142, 'chat-quote', 0, 1, '2024-07-24 14:09:18', NULL),
(143, 'chat-quote-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(144, 'chat-text', 0, 1, '2024-07-24 14:09:18', NULL),
(145, 'chat-text-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(146, 'circle', 0, 1, '2024-07-24 14:09:18', NULL),
(147, 'circle-half', 1, 1, '2024-07-24 14:09:18', NULL),
(148, 'circle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(149, 'clipboard', 0, 1, '2024-07-24 14:09:18', NULL),
(150, 'clipboard-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(151, 'clipboard-data', 0, 1, '2024-07-24 14:09:18', NULL),
(152, 'clipboard-data-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(153, 'cloud', 0, 1, '2024-07-24 14:09:18', NULL),
(154, 'cloud-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(155, 'cloud-drizzle', 0, 1, '2024-07-24 14:09:18', NULL),
(156, 'cloud-drizzle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(157, 'cloud-lightning-rain', 0, 1, '2024-07-24 14:09:18', NULL),
(158, 'cloud-lightning-rain-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(159, 'cloud-moon', 0, 1, '2024-07-24 14:09:18', NULL),
(160, 'cloud-moon-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(161, 'cloud-sun', 0, 1, '2024-07-24 14:09:18', NULL),
(162, 'cloud-sun-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(163, 'clouds', 0, 1, '2024-07-24 14:09:18', NULL),
(164, 'clouds-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(165, 'coin', 0, 1, '2024-07-24 14:09:18', NULL),
(166, 'compass', 0, 1, '2024-07-24 14:09:18', NULL),
(167, 'compass-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(168, 'cone-striped', 1, 1, '2024-07-24 14:09:18', NULL),
(169, 'controller', 0, 1, '2024-07-24 14:09:18', NULL),
(170, 'cookie', 0, 1, '2024-07-24 14:09:18', NULL),
(171, 'cpu', 0, 1, '2024-07-24 14:09:18', NULL),
(172, 'cpu-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(173, 'crosshair', 0, 1, '2024-07-24 14:09:18', NULL),
(174, 'crosshair2', 1, 1, '2024-07-24 14:09:18', NULL),
(175, 'cup-hot', 0, 1, '2024-07-24 14:09:18', NULL),
(176, 'cup-hot-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(177, 'diagram-3', 0, 1, '2024-07-24 14:09:18', NULL),
(178, 'diagram-3-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(179, 'diamond', 0, 1, '2024-07-24 14:09:18', NULL),
(180, 'diamond-half', 1, 1, '2024-07-24 14:09:18', NULL),
(181, 'diamond-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(182, 'dice-1', 0, 1, '2024-07-24 14:09:18', NULL),
(183, 'dice-1-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(184, 'dice-2', 0, 1, '2024-07-24 14:09:18', NULL),
(185, 'dice-2-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(186, 'dice-3', 0, 1, '2024-07-24 14:09:18', NULL),
(187, 'dice-3-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(188, 'dice-4', 0, 1, '2024-07-24 14:09:18', NULL),
(189, 'dice-4-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(190, 'dice-5', 0, 1, '2024-07-24 14:09:18', NULL),
(191, 'dice-5-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(192, 'dice-6', 0, 1, '2024-07-24 14:09:18', NULL),
(193, 'dice-6-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(194, 'display', 0, 1, '2024-07-24 14:09:18', NULL),
(195, 'display-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(196, 'door-closed', 0, 1, '2024-07-24 14:09:18', NULL),
(197, 'door-closed-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(198, 'duffle', 0, 1, '2024-07-24 14:09:18', NULL),
(199, 'duffle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(200, 'ear', 0, 1, '2024-07-24 14:09:18', NULL),
(201, 'ear-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(202, 'easel2', 0, 1, '2024-07-24 14:09:18', NULL),
(203, 'easel2-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(204, 'emoji-astonished', 0, 1, '2024-07-24 14:09:18', NULL),
(205, 'emoji-astonished-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(206, 'emoji-expressionless', 0, 1, '2024-07-24 14:09:18', NULL),
(207, 'emoji-expressionless-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(208, 'emoji-frown', 0, 1, '2024-07-24 14:09:18', NULL),
(209, 'emoji-frown-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(210, 'emoji-grimace', 0, 1, '2024-07-24 14:09:18', NULL),
(211, 'emoji-grimace-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(212, 'emoji-grin', 0, 1, '2024-07-24 14:09:18', NULL),
(213, 'emoji-grin-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(214, 'emoji-neutral', 0, 1, '2024-07-24 14:09:18', NULL),
(215, 'emoji-neutral-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(216, 'emoji-smile', 0, 1, '2024-07-24 14:09:18', NULL),
(217, 'emoji-smile-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(218, 'envelope', 0, 1, '2024-07-24 14:09:18', NULL),
(219, 'envelope-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(220, 'exclamation-circle', 0, 1, '2024-07-24 14:09:18', NULL),
(221, 'exclamation-circle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(222, 'exclamation-square', 0, 1, '2024-07-24 14:09:18', NULL),
(223, 'exclamation-square-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(224, 'exclamation-triangle', 0, 1, '2024-07-24 14:09:18', NULL),
(225, 'exclamation-triangle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(226, 'exclude', 1, 1, '2024-07-24 14:09:18', NULL),
(227, 'eyedropper', 0, 1, '2024-07-24 14:09:18', NULL),
(228, 'eyeglasses', 0, 1, '2024-07-24 14:09:18', NULL),
(229, 'fan', 0, 1, '2024-07-24 14:09:18', NULL),
(230, 'feather', 0, 1, '2024-07-24 14:09:18', NULL),
(231, 'film', 0, 1, '2024-07-24 14:09:18', NULL),
(232, 'fingerprint', 0, 1, '2024-07-24 14:09:18', NULL),
(233, 'fire', 1, 1, '2024-07-24 14:09:18', NULL),
(234, 'floppy', 0, 1, '2024-07-24 14:09:18', NULL),
(235, 'floppy2-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(236, 'flower1', 0, 1, '2024-07-24 14:09:18', NULL),
(237, 'flower2', 0, 1, '2024-07-24 14:09:18', NULL),
(238, 'flower3', 0, 1, '2024-07-24 14:09:18', NULL),
(239, 'forward', 0, 1, '2024-07-24 14:09:18', NULL),
(240, 'forward-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(241, 'gem', 0, 1, '2024-07-24 14:09:18', NULL),
(242, 'geo', 0, 1, '2024-07-24 14:09:18', NULL),
(243, 'geo-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(244, 'geo-alt', 0, 1, '2024-07-24 14:09:18', NULL),
(245, 'geo-alt-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(246, 'gift', 0, 1, '2024-07-24 14:09:18', NULL),
(247, 'gift-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(248, 'globe', 0, 1, '2024-07-24 14:09:18', NULL),
(249, 'globe-americas', 0, 1, '2024-07-24 14:09:18', NULL),
(250, 'globe-asia-australia', 1, 1, '2024-07-24 14:09:18', NULL),
(251, 'globe-central-south-asia', 1, 1, '2024-07-24 14:09:18', NULL),
(252, 'globe-europe-africa', 1, 1, '2024-07-24 14:09:18', NULL),
(253, 'graph-down-arrow', 0, 1, '2024-07-24 14:09:18', NULL),
(254, 'graph-up-arrow', 0, 1, '2024-07-24 14:09:18', NULL),
(255, 'hammer', 1, 1, '2024-07-24 14:09:18', NULL),
(256, 'hand-thumbs-down', 0, 1, '2024-07-24 14:09:18', NULL),
(257, 'hand-thumbs-down-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(258, 'hand-thumbs-up', 0, 1, '2024-07-24 14:09:18', NULL),
(259, 'hand-thumbs-up-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(260, 'headphones', 1, 1, '2024-07-24 14:09:18', NULL),
(261, 'headset-vr', 1, 1, '2024-07-24 14:09:18', NULL),
(262, 'heart', 0, 1, '2024-07-24 14:09:18', NULL),
(263, 'heart-half', 1, 1, '2024-07-24 14:09:18', NULL),
(264, 'heart-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(265, 'heartbreak', 0, 1, '2024-07-24 14:09:18', NULL),
(266, 'heartbreak-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(267, 'heart-pulse', 0, 1, '2024-07-24 14:09:18', NULL),
(268, 'heart-pulse-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(269, 'hearts', 1, 1, '2024-07-24 14:09:18', NULL),
(270, 'hexagon', 0, 1, '2024-07-24 14:09:18', NULL),
(271, 'hexagon-half', 1, 1, '2024-07-24 14:09:18', NULL),
(272, 'hexagon-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(273, 'highlighter', 0, 1, '2024-07-24 14:09:18', NULL),
(274, 'highlights', 1, 1, '2024-07-24 14:09:18', NULL),
(275, 'hourglass-split', 0, 1, '2024-07-24 14:09:18', NULL),
(276, 'house', 0, 1, '2024-07-24 14:09:18', NULL),
(277, 'house-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(278, 'houses', 0, 1, '2024-07-24 14:09:18', NULL),
(279, 'houses-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(280, 'hypnotize', 0, 1, '2024-07-24 14:09:18', NULL),
(281, 'image', 0, 1, '2024-07-24 14:09:18', NULL),
(282, 'image-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(283, 'images', 0, 1, '2024-07-24 14:09:18', NULL),
(284, 'info-circle', 0, 1, '2024-07-24 14:09:18', NULL),
(285, 'info-circle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(286, 'intersect', 0, 1, '2024-07-24 14:09:18', NULL),
(287, 'joystick', 0, 1, '2024-07-24 14:09:18', NULL),
(288, 'keyboard', 0, 1, '2024-07-24 14:09:18', NULL),
(289, 'keyboard-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(290, 'ladder', 0, 1, '2024-07-24 14:09:18', NULL),
(291, 'lamp', 0, 1, '2024-07-24 14:09:18', NULL),
(292, 'lamp-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(293, 'laptop', 0, 1, '2024-07-24 14:09:18', NULL),
(294, 'laptop-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(295, 'layer-backward', 1, 1, '2024-07-24 14:09:18', NULL),
(296, 'layer-forward', 1, 1, '2024-07-24 14:09:18', NULL),
(297, 'life-preserver', 0, 1, '2024-07-24 14:09:18', NULL),
(298, 'lightbulb', 0, 1, '2024-07-24 14:09:18', NULL),
(299, 'lightbulb-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(300, 'lightbulb-off', 0, 1, '2024-07-24 14:09:18', NULL),
(301, 'lightbulb-off-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(302, 'lightning', 0, 1, '2024-07-24 14:09:18', NULL),
(303, 'lightning-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(304, 'lock', 0, 1, '2024-07-24 14:09:18', NULL),
(305, 'lock-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(306, 'luggage', 0, 1, '2024-07-24 14:09:18', NULL),
(307, 'luggage-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(308, 'lungs', 0, 1, '2024-07-24 14:09:18', NULL),
(309, 'lungs-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(310, 'magic', 0, 1, '2024-07-24 14:09:18', NULL),
(311, 'magnet', 0, 1, '2024-07-24 14:09:18', NULL),
(312, 'magnet-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(313, 'mailbox', 0, 1, '2024-07-24 14:09:18', NULL),
(314, 'mailbox-flag', 0, 1, '2024-07-24 14:09:18', NULL),
(315, 'map', 0, 1, '2024-07-24 14:09:18', NULL),
(316, 'map-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(317, 'marker-tip', 0, 1, '2024-07-24 14:09:18', NULL),
(318, 'mask', 1, 1, '2024-07-24 14:09:18', NULL),
(319, 'megaphone', 0, 1, '2024-07-24 14:09:18', NULL),
(320, 'megaphone-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(321, 'mic', 0, 1, '2024-07-24 14:09:18', NULL),
(322, 'mic-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(323, 'moon', 0, 1, '2024-07-24 14:09:18', NULL),
(324, 'moon-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(325, 'moon-stars', 0, 1, '2024-07-24 14:09:18', NULL),
(326, 'moon-stars-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(327, 'mortarboard', 0, 1, '2024-07-24 14:09:18', NULL),
(328, 'mortarboard-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(329, 'mouse2', 0, 1, '2024-07-24 14:09:18', NULL),
(330, 'mouse2-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(331, 'music-note', 0, 1, '2024-07-24 14:09:18', NULL),
(332, 'music-note-beamed', 0, 1, '2024-07-24 14:09:18', NULL),
(333, 'music-player', 0, 1, '2024-07-24 14:09:18', NULL),
(334, 'music-player-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(335, 'newspaper', 0, 1, '2024-07-24 14:09:18', NULL),
(336, 'noise-reduction', 0, 1, '2024-07-24 14:09:18', NULL),
(337, 'paperclip', 0, 1, '2024-07-24 14:09:18', NULL),
(338, 'passport', 0, 1, '2024-07-24 14:09:18', NULL),
(339, 'passport-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(340, 'pc', 1, 1, '2024-07-24 14:09:18', NULL),
(341, 'pc-display-horizontal', 0, 1, '2024-07-24 14:09:18', NULL),
(342, 'pen', 0, 1, '2024-07-24 14:09:18', NULL),
(343, 'pen-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(344, 'pentagon', 0, 1, '2024-07-24 14:09:18', NULL),
(345, 'pentagon-half', 1, 1, '2024-07-24 14:09:18', NULL),
(346, 'pentagon-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(347, 'people', 0, 1, '2024-07-24 14:09:18', NULL),
(348, 'people-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(349, 'person-arms-up', 1, 1, '2024-07-24 14:09:18', NULL),
(350, 'person-raised-hand', 1, 1, '2024-07-24 14:09:18', NULL),
(351, 'person-standing', 1, 1, '2024-07-24 14:09:18', NULL),
(352, 'person-standing-dress', 1, 1, '2024-07-24 14:09:18', NULL),
(353, 'person-walking', 1, 1, '2024-07-24 14:09:18', NULL),
(354, 'person-wheelchair', 1, 1, '2024-07-24 14:09:18', NULL),
(355, 'pie-chart', 0, 1, '2024-07-24 14:09:18', NULL),
(356, 'pie-chart-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(357, 'piggy-bank', 0, 1, '2024-07-24 14:09:18', NULL),
(358, 'piggy-bank-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(359, 'plug', 0, 1, '2024-07-24 14:09:18', NULL),
(360, 'plug-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(361, 'plugin', 0, 1, '2024-07-24 14:09:18', NULL),
(362, 'postage', 0, 1, '2024-07-24 14:09:18', NULL),
(363, 'postage-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(364, 'printer', 0, 1, '2024-07-24 14:09:18', NULL),
(365, 'printer-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(366, 'puzzle', 0, 1, '2024-07-24 14:09:18', NULL),
(367, 'puzzle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(368, 'qr-code', 0, 1, '2024-07-24 14:09:18', NULL),
(369, 'qr-code-scan', 0, 1, '2024-07-24 14:09:18', NULL),
(370, 'question-circle', 0, 1, '2024-07-24 14:09:18', NULL),
(371, 'question-circle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(372, 'question-square', 0, 1, '2024-07-24 14:09:18', NULL),
(373, 'question-square-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(374, 'quote', 1, 1, '2024-07-24 14:09:18', NULL),
(375, 'radar', 0, 1, '2024-07-24 14:09:18', NULL),
(376, 'radioactive', 0, 1, '2024-07-24 14:09:18', NULL),
(377, 'rainbow', 0, 1, '2024-07-24 14:09:18', NULL),
(378, 'receipt', 0, 1, '2024-07-24 14:09:18', NULL),
(379, 'reception-0', 1, 1, '2024-07-24 14:09:18', NULL),
(380, 'reception-1', 1, 1, '2024-07-24 14:09:18', NULL),
(381, 'reception-2', 1, 1, '2024-07-24 14:09:18', NULL),
(382, 'reception-3', 1, 1, '2024-07-24 14:09:18', NULL),
(383, 'reception-4', 1, 1, '2024-07-24 14:09:18', NULL),
(384, 'recycle', 0, 1, '2024-07-24 14:09:18', NULL),
(385, 'repeat', 0, 1, '2024-07-24 14:09:18', NULL),
(386, 'rocket', 0, 1, '2024-07-24 14:09:18', NULL),
(387, 'rocket-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(388, 'rocket-takeoff', 0, 1, '2024-07-24 14:09:18', NULL),
(389, 'rocket-takeoff-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(390, 'safe2', 0, 1, '2024-07-24 14:09:18', NULL),
(391, 'safe2-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(392, 'scissors', 0, 1, '2024-07-24 14:09:18', NULL),
(393, 'send', 0, 1, '2024-07-24 14:09:18', NULL),
(394, 'send-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(395, 'shadows', 0, 1, '2024-07-24 14:09:18', NULL),
(396, 'shield', 0, 1, '2024-07-24 14:09:18', NULL),
(397, 'shield-shaded', 1, 1, '2024-07-24 14:09:18', NULL),
(398, 'shield-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(399, 'shield-check', 0, 1, '2024-07-24 14:09:18', NULL),
(400, 'shield-fill-check', 1, 1, '2024-07-24 14:09:18', NULL),
(401, 'shield-lock', 0, 1, '2024-07-24 14:09:18', NULL),
(402, 'shield-lock-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(403, 'shield-slash', 0, 1, '2024-07-24 14:09:18', NULL),
(404, 'shield-slash-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(405, 'shift', 0, 1, '2024-07-24 14:09:18', NULL),
(406, 'shift-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(407, 'sign-stop', 0, 1, '2024-07-24 14:09:18', NULL),
(408, 'sign-stop-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(409, 'signpost-split', 0, 1, '2024-07-24 14:09:18', NULL),
(410, 'signpost-split-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(411, 'snow', 0, 1, '2024-07-24 14:09:18', NULL),
(412, 'snow2', 0, 1, '2024-07-24 14:09:18', NULL),
(413, 'snow3', 0, 1, '2024-07-24 14:09:18', NULL),
(414, 'soundwave', 0, 1, '2024-07-24 14:09:18', NULL),
(415, 'speaker', 0, 1, '2024-07-24 14:09:18', NULL),
(416, 'speaker-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(417, 'speedometer', 0, 1, '2024-07-24 14:09:18', NULL),
(418, 'spellcheck', 0, 1, '2024-07-24 14:09:18', NULL),
(419, 'square', 0, 1, '2024-07-24 14:09:18', NULL),
(420, 'square-half', 1, 1, '2024-07-24 14:09:18', NULL),
(421, 'square-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(422, 'stack', 1, 1, '2024-07-24 14:09:18', NULL),
(423, 'star', 0, 1, '2024-07-24 14:09:18', NULL),
(424, 'star-half', 1, 1, '2024-07-24 14:09:18', NULL),
(425, 'star-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(426, 'stars', 1, 1, '2024-07-24 14:09:18', NULL),
(427, 'stoplights', 0, 1, '2024-07-24 14:09:18', NULL),
(428, 'stoplights-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(429, 'stopwatch', 0, 1, '2024-07-24 14:09:18', NULL),
(430, 'stopwatch-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(431, 'subtract', 0, 1, '2024-07-24 14:09:18', NULL),
(432, 'suit-club', 0, 1, '2024-07-24 14:09:18', NULL),
(433, 'suit-club-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(434, 'suit-diamond', 0, 1, '2024-07-24 14:09:18', NULL),
(435, 'suit-diamond-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(436, 'suit-heart', 0, 1, '2024-07-24 14:09:18', NULL),
(437, 'suit-heart-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(438, 'suit-spade', 0, 1, '2024-07-24 14:09:18', NULL),
(439, 'suit-spade-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(440, 'suitcase', 0, 1, '2024-07-24 14:09:18', NULL),
(441, 'suitcase-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(442, 'suitcase2', 0, 1, '2024-07-24 14:09:18', NULL),
(443, 'suitcase2-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(444, 'suitcase-lg', 0, 1, '2024-07-24 14:09:18', NULL),
(445, 'suitcase-lg-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(446, 'sun', 0, 1, '2024-07-24 14:09:18', NULL),
(447, 'sun-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(448, 'sunrise', 0, 1, '2024-07-24 14:09:18', NULL),
(449, 'sunrise-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(450, 'sunset', 0, 1, '2024-07-24 14:09:18', NULL),
(451, 'sunset-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(452, 'table', 0, 1, '2024-07-24 14:09:18', NULL),
(453, 'thermometer-snow', 0, 1, '2024-07-24 14:09:18', NULL),
(454, 'thermometer-sun', 0, 1, '2024-07-24 14:09:18', NULL),
(455, 'tools', 0, 1, '2024-07-24 14:09:18', NULL),
(456, 'translate', 0, 1, '2024-07-24 14:09:18', NULL),
(457, 'transparency', 0, 1, '2024-07-24 14:09:18', NULL),
(458, 'tree', 0, 1, '2024-07-24 14:09:18', NULL),
(459, 'tree-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(460, 'triangle', 0, 1, '2024-07-24 14:09:18', NULL),
(461, 'triangle-half', 1, 1, '2024-07-24 14:09:18', NULL),
(462, 'triangle-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(463, 'trophy', 0, 1, '2024-07-24 14:09:18', NULL),
(464, 'trophy-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(465, 'truck', 0, 1, '2024-07-24 14:09:18', NULL),
(466, 'umbrella', 0, 1, '2024-07-24 14:09:18', NULL),
(467, 'umbrella-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(468, 'union', 1, 1, '2024-07-24 14:09:18', NULL),
(469, 'universal-access', 1, 1, '2024-07-24 14:09:18', NULL),
(470, 'universal-access-circle', 0, 1, '2024-07-24 14:09:18', NULL),
(471, 'valentine', 0, 1, '2024-07-24 14:09:18', NULL),
(472, 'vignette', 0, 1, '2024-07-24 14:09:18', NULL),
(473, 'vinyl', 0, 1, '2024-07-24 14:09:18', NULL),
(474, 'vinyl-fill', 1, 1, '2024-07-24 14:09:18', NULL),
(475, 'virus', 1, 1, '2024-07-24 14:09:18', NULL),
(476, 'watch', 0, 1, '2024-07-24 14:09:18', NULL),
(477, 'wifi', 0, 1, '2024-07-24 14:09:18', NULL),
(478, 'wifi-off', 0, 1, '2024-07-24 14:09:18', NULL),
(479, 'wind', 0, 1, '2024-07-24 14:09:18', NULL),
(480, 'wrench-adjustable', 1, 1, '2024-07-24 14:09:18', NULL),
(481, 'zoom-in', 0, 1, '2024-07-24 14:09:18', NULL),
(482, 'zoom-out', 0, 1, '2024-07-24 14:09:18', NULL),
(483, 'clipboard-check', 0, 0, '2024-07-24 14:09:18', NULL),
(484, 'code-slash', 0, 0, '2024-07-24 14:09:18', NULL),
(485, 'file-pdf-fill', 1, 0, '2024-07-24 14:09:18', NULL),
(486, 'file-word-fill', 1, 0, '2024-07-24 14:09:18', NULL),
(487, 'file-excel-fill', 1, 0, '2024-07-24 14:09:18', NULL),
(488, 'file-zip-fill', 1, 0, '2024-07-24 14:09:18', NULL),
(489, 'folder', 0, 0, '2024-07-24 14:09:18', NULL),
(490, 'folder-fill', 1, 0, '2024-07-24 14:09:18', NULL),
(491, 'gear', 0, 0, '2024-07-24 14:09:18', NULL),
(492, 'hdd', 0, 0, '2024-07-24 14:09:18', NULL),
(493, 'journal-bookmark-fill', 1, 0, '2024-07-24 14:09:18', NULL),
(494, 'journal-richtext', 0, 0, '2024-07-24 14:09:18', NULL),
(495, 'kanban', 0, 0, '2024-07-24 14:09:18', NULL),
(496, 'patch-check-fill', 1, 0, '2024-07-24 14:09:18', NULL),
(497, 'patch-question-fill', 1, 0, '2024-07-24 14:09:18', NULL),
(498, 'person', 0, 0, '2024-07-24 14:09:18', NULL),
(499, 'person-check', 0, 0, '2024-07-24 14:09:18', NULL),
(500, 'person-fill', 1, 0, '2024-07-24 14:09:18', NULL),
(501, 'play-btn-fill', 1, 0, '2024-07-24 14:09:18', NULL),
(502, 'question-circle', 1, 0, '2024-07-24 14:09:18', NULL),
(503, 'question-circle-fill', 1, 0, '2024-07-24 14:09:18', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `memberships`
--

CREATE TABLE `memberships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `author_id` int(10) UNSIGNED NOT NULL,
  `editor_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `memories`
--

CREATE TABLE `memories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7411,'2014_10_12_000000_create_users_table',6),
(7412,'2014_10_12_100000_create_password_resets_table',6),
(7414,'2019_12_14_000001_create_personal_access_tokens_table',6),
(7421,'2022_02_25_221237_create_user_groups_table',6),
(7423,'2022_03_21_102700_create_privileges_table',6),
(7425,'2022_03_30_143253_create_projects_table',6),
(7428,'2022_04_18_183752_create_colors_table',6),
(7432,'2022_06_10_121449_create_memberships_table',6),
(7434,'2022_07_08_165704_create_scripts_table',6),
(7436,'2022_08_19_141144_create_memories_table',6),
(7437,'2022_08_25_154720_create_entries_table',6),
(7438,'2022_08_26_183718_project_stages_table',6),
(7448,'2022_04_06_164629_create_configurations_table',14),
(7449,'2023_01_26_163220_create_project_settings_table',15),
(7450,'2023_01_13_153318_create_comments_table',16),
(7451,'2023_01_15_185447_create_upvotes_table',17),
(7456,'2023_02_01_164645_create_color_codes_table',21),
(7457,'2022_03_21_104918_create_permissions_table',22),
(7461,'2023_03_23_160823_create_files_table',26),
(7462,'2023_03_23_195905_create_file_links_table',27),
(7467,'2022_05_12_170410_create_project_stage_types_table',32),
(7468,'2022_02_06_110742_create_content_types_table',33),
(7471,'2023_07_28_201422_create_focused_items_table',36),
(7488,'2022_09_27_195206_create_roles_table',49),
(7495,'2024_04_05_161517_create_health_impact_types_table',55),
(7496,'2024_04_05_161432_create_health_impacts_table',56),
(7499,'2023_02_01_164638_create_icons_table',58),
(7500,'2022_03_21_102620_create_sections_table',59),
(7518,'2023_06_29_122517_create_effects_table',72),
(7521,'2024_07_18_172748_create_glossary_terms_table',75),
(7522,'2024_07_18_172740_create_glossaries_table',76),
(7525,'2022_02_04_180203_create_questionnaires_table',78),
(7526,'2022_07_15_142420_create_content_states_table',79),
(7527,'2022_03_31_125508_create_contents_table',80),
(7528,'2023_05_05_150533_create_topics_table',81),
(7529,'2023_08_11_231535_create_references_table',82),
(7530,'2023_03_23_160604_create_file_types_table',83),
(7531,'2023_06_28_124423_create_effect_types_table',84);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privilege` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `permissions`
--

INSERT INTO `permissions` (`id`, `section`, `privilege`, `created_at`, `updated_at`) VALUES
(1, 'projects', 'create', '2023-05-08 15:36:13', NULL),
(2, 'projects', 'edit', '2023-05-08 15:36:13', NULL),
(3, 'projects', 'delete', '2023-05-08 15:36:13', NULL),
(4, 'memberships', 'create', '2023-05-08 15:36:13', NULL),
(5, 'memberships', 'edit', '2023-05-08 15:36:13', NULL),
(6, 'memberships', 'delete', '2023-05-08 15:36:13', NULL),
(7, 'questionnaires', 'create', '2023-05-08 15:36:13', NULL),
(8, 'questionnaires', 'edit', '2023-05-08 15:36:13', NULL),
(9, 'questionnaires', 'delete', '2023-05-08 15:36:13', NULL),
(10, 'users', 'create', '2023-05-08 15:36:13', NULL),
(11, 'users', 'edit', '2023-05-08 15:36:13', NULL),
(12, 'users', 'disable', '2023-05-08 15:36:13', NULL),
(13, 'users', 'delete', '2023-05-08 15:36:13', NULL),
(14, 'user-groups', 'create', '2023-05-08 15:36:13', NULL),
(15, 'user-groups', 'edit', '2023-05-08 15:36:13', NULL),
(16, 'user-groups', 'disable', '2023-05-08 15:36:13', NULL),
(17, 'user-groups', 'delete', '2023-05-08 15:36:13', NULL),
(18, 'files', 'create', '2023-05-08 15:36:13', NULL),
(19, 'files', 'edit', '2023-05-08 15:36:13', NULL),
(20, 'files', 'delete', '2023-05-08 15:36:13', NULL),
(21, 'data', 'export', '2023-05-08 15:36:13', NULL),
(22, 'configurations', 'create', '2023-05-08 15:36:13', NULL),
(23, 'configurations', 'edit', '2023-05-08 15:36:13', NULL),
(24, 'configurations', 'delete', '2023-05-08 15:36:13', NULL),
(25, 'scripts', 'create', '2023-05-08 15:36:13', NULL),
(26, 'scripts', 'edit', '2023-05-08 15:36:13', NULL),
(27, 'scripts', 'delete', '2023-05-08 15:36:13', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `privileges`
--

CREATE TABLE `privileges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `privileges`
--

INSERT INTO `privileges` (`id`, `shortname`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'access', 'Access', 'Access section', NULL, NULL),
(2, 'create', 'Create', 'Create new entry', NULL, NULL),
(3, 'edit', 'Edit', 'Edit existing entry', NULL, NULL),
(4, 'delete', 'Delete', 'Delete entry', NULL, NULL),
(5, 'disable', 'Disable', 'Disable and enable entries', NULL, NULL),
(6, 'export', 'Export', 'Export data', NULL, NULL),
(7, 'access-other', 'Access questionnaires from other users', '...', NULL, NULL),
(8, 'edit-other', 'Edit questionnaires from other users', '...', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `color_id` int(10) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `change` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enrollment_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scr_count` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `scr_changes` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `app_mode` int(10) UNSIGNED NOT NULL DEFAULT 2,
  `app_active` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `app_count` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `app_changes` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `scr_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`scr_data`)),
  `app_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`app_data`)),
  `author_id` int(10) UNSIGNED NOT NULL,
  `editor_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `project_settings`
--

CREATE TABLE `project_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `mean_positive_th` double(8,2) NOT NULL DEFAULT 2.00,
  `mean_negative_th` double(8,2) NOT NULL DEFAULT 1.00,
  `mean_potential_th` double(8,2) NOT NULL DEFAULT 1.00,
  `max_positive_th` int(10) UNSIGNED NOT NULL DEFAULT 4,
  `max_negative_th` int(10) UNSIGNED NOT NULL DEFAULT 2,
  `max_potential_th` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `min_met_conditions` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `mean_pos_effects_th` double(8,2) NOT NULL DEFAULT 5.00,
  `mean_neg_effects_th` double(8,2) NOT NULL DEFAULT 1.00,
  `max_pos_effects_th` int(11) UNSIGNED NOT NULL DEFAULT 10,
  `max_neg_effects_th` int(11) UNSIGNED NOT NULL DEFAULT 5,
  `operator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '>=',
  `editor_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `project_stages`
--

CREATE TABLE `project_stages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `membership_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED DEFAULT NULL,
  `entry_count` int(10) NOT NULL DEFAULT 0,
  `complete` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL,
  `needs_update` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `project_stage_types`
--

CREATE TABLE `project_stage_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_id` int(10) UNSIGNED DEFAULT NULL,
  `color_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `project_stage_types`
--

INSERT INTO `project_stage_types` (`id`, `shortname`, `name`, `icon_id`, `color_id`, `created_at`, `updated_at`) VALUES
(1, 'undefined', 'Undefined', 493, NULL, '2023-11-05 17:26:58', NULL),
(2, 'screening', 'Screening', 492, 188, '2023-11-05 17:26:58', NULL),
(3, 'scoping', 'Scoping', 492, 200, '2023-11-05 17:26:58', NULL),
(4, 'appraisal', 'Appraisal', 492, 191, '2023-11-05 17:26:58', NULL),
(5, 'public', 'Public', 366, NULL, '2023-11-05 17:26:58', NULL),
(6, 'backup', 'Backup', 366, NULL, '2023-11-05 17:26:58', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `questionnaires`
--

CREATE TABLE `questionnaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `screening_id` int(10) UNSIGNED DEFAULT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_id` int(10) UNSIGNED DEFAULT NULL,
  `color_id` int(10) UNSIGNED DEFAULT NULL,
  `stage_order_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `author_id` int(10) UNSIGNED NOT NULL,
  `editor_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `questionnaires`
--

INSERT INTO `questionnaires` (`id`, `type_id`, `screening_id`, `order_id`, `name`, `description`, `icon_id`, `color_id`, `stage_order_id`, `author_id`, `editor_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 1, 'Mobilität und Erschließungsqualität', 'Bitte beurteilen Sie die voraussichtlichen Auswirkungen des Vorhabens auf die folgenden gesundheitsrelevanten Kriterien für die Stadtentwicklung (Gesundheitsdeterminanten).', 353, 98, 1, 1, NULL, '2024-08-22 14:44:02', NULL),
(2, 2, NULL, 2, 'Gesunde Arbeitsverhältnisse', 'Bitte beurteilen Sie die voraussichtlichen Auswirkungen des Vorhabens auf die folgenden gesundheitsrelevanten Kriterien für die Stadtentwicklung (Gesundheitsdeterminanten).', 455, 89, 2, 1, NULL, '2024-08-22 14:44:02', NULL),
(3, 2, NULL, 3, 'Umwelt und Gesundheit', 'Bitte beurteilen Sie die voraussichtlichen Auswirkungen des Vorhabens auf die folgenden gesundheitsrelevanten Kriterien für die Stadtentwicklung (Gesundheitsdeterminanten).', 458, 81, 3, 1, NULL, '2024-08-22 14:44:02', NULL),
(4, 2, NULL, 4, 'Öffentliche (Frei-)Räume', 'Bitte beurteilen Sie die voraussichtlichen Auswirkungen des Vorhabens auf die folgenden gesundheitsrelevanten Kriterien für die Stadtentwicklung (Gesundheitsdeterminanten).', 244, 72, 4, 1, NULL, '2024-08-22 14:44:02', NULL),
(5, 2, NULL, 5, 'Körperliche Aktivität', 'Bitte beurteilen Sie die voraussichtlichen Auswirkungen des Vorhabens auf die folgenden gesundheitsrelevanten Kriterien für die Stadtentwicklung (Gesundheitsdeterminanten).', 267, 37, 5, 1, NULL, '2024-08-22 14:44:02', NULL),
(6, 2, NULL, 6, 'Gesunde Wohnverhältnisse', 'Bitte beurteilen Sie die voraussichtlichen Auswirkungen des Vorhabens auf die folgenden gesundheitsrelevanten Kriterien für die Stadtentwicklung (Gesundheitsdeterminanten).', 278, 25, 6, 1, NULL, '2024-08-22 14:44:02', NULL),
(7, 2, NULL, 7, 'Soziale Infrastruktur', 'Dies betrifft Einrichtungen z.B. für Gesundheit, Kinderbetreuung, Bildung, Schulen, Sozialdienste, Senioren, Einkauf, Erholung, Freizeit, Unterhaltung, Kultur, …', 347, 20, 7, 1, NULL, '2024-08-22 14:44:02', NULL),
(8, 2, NULL, 8, 'Sozialer Zusammenhalt und Integration', 'Bitte beurteilen Sie die voraussichtlichen Auswirkungen des Vorhabens auf die folgenden gesundheitsrelevanten Kriterien für die Stadtentwicklung (Gesundheitsdeterminanten).', 350, 11, 8, 1, NULL, '2024-08-22 14:44:03', NULL),
(9, 2, NULL, 9, 'Sicherheit und Schutz', 'Bitte beurteilen Sie die voraussichtlichen Auswirkungen des Vorhabens auf die folgenden gesundheitsrelevanten Kriterien für die Stadtentwicklung (Gesundheitsdeterminanten).', 401, 16, 9, 1, NULL, '2024-08-22 14:44:03', NULL),
(10, 2, NULL, 10, 'Zugang zu gesunden Lebensmitteln', 'Bitte beurteilen Sie die voraussichtlichen Auswirkungen des Vorhabens auf die folgenden gesundheitsrelevanten Kriterien für die Stadtentwicklung (Gesundheitsdeterminanten).', NULL, 46, 10, 1, NULL, '2024-08-22 14:44:03', NULL),
(11, 3, NULL, 11, 'Gefährdete Gruppen', 'Sind von den potenziellen Auswirkungen des Vorhabens besonders schutzbedürftige, benachteiligte oder gefährdete Personengruppen betroffen?', 224, 57, 11, 1, NULL, '2024-08-22 14:44:03', NULL),
(12, 4, 1, 12, 'Mobilität und Erschließungsqualität', 'Bitte beantworten Sie die folgenden weitergehenden Fragen, um die voraussichtlichen direkten Effekte des Vorhabens zu ermitteln.', 353, 98, 1, 1, NULL, '2024-08-22 14:44:03', NULL),
(13, 4, 2, 13, 'Gesunde Arbeitsverhältnisse', 'Bitte beantworten Sie die folgenden weitergehenden Fragen, um die voraussichtlichen direkten Effekte des Vorhabens zu ermitteln.', 455, 89, 2, 1, NULL, '2024-08-22 14:44:03', NULL),
(14, 4, 3, 14, 'Umwelt und Gesundheit', 'Bitte beantworten Sie die folgenden weitergehenden Fragen, um die voraussichtlichen direkten Effekte des Vorhabens zu ermitteln.', 458, 81, 3, 1, NULL, '2024-08-22 14:44:03', NULL),
(15, 4, 4, 15, 'Öffentliche (Frei-)Räume', 'Bitte beantworten Sie die folgenden weitergehenden Fragen, um die voraussichtlichen direkten Effekte des Vorhabens zu ermitteln.', 244, 72, 4, 1, NULL, '2024-08-22 14:44:03', NULL),
(16, 4, 5, 16, 'Körperliche Aktivität', 'Bitte beantworten Sie die folgenden weitergehenden Fragen, um die voraussichtlichen direkten Effekte des Vorhabens zu ermitteln.', 267, 37, 5, 1, NULL, '2024-08-22 14:44:03', NULL),
(17, 4, 6, 17, 'Gesunde Wohnverhältnisse', 'Bitte beantworten Sie die folgenden weitergehenden Fragen, um die voraussichtlichen direkten Effekte des Vorhabens zu ermitteln.', 278, 25, 6, 1, NULL, '2024-08-22 14:44:03', NULL),
(18, 4, 7, 18, 'Soziale Infrastruktur', 'Bitte beantworten Sie die folgenden weitergehenden Fragen, um die voraussichtlichen direkten Effekte des Vorhabens zu ermitteln.', 347, 20, 7, 1, NULL, '2024-08-22 14:44:03', NULL),
(19, 4, 8, 19, 'Sozialer Zusammenhalt und Integration', 'Bitte beantworten Sie die folgenden weitergehenden Fragen, um die voraussichtlichen direkten Effekte des Vorhabens zu ermitteln.', 350, 11, 8, 1, NULL, '2024-08-22 14:44:03', NULL),
(20, 4, 9, 20, 'Sicherheit und Schutz', 'Bitte beantworten Sie die folgenden weitergehenden Fragen, um die voraussichtlichen direkten Effekte des Vorhabens zu ermitteln.', 401, 16, 9, 1, NULL, '2024-08-22 14:44:03', NULL),
(21, 4, 10, 21, 'Zugang zu gesunden Lebensmitteln', 'Bitte beantworten Sie die folgenden weitergehenden Fragen, um die voraussichtlichen direkten Effekte des Vorhabens zu ermitteln.', NULL, 46, 10, 1, NULL, '2024-08-22 14:44:03', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `questionnaire_types`
--

CREATE TABLE `questionnaire_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `questionnaire_types`
--

INSERT INTO `questionnaire_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'undefined', NULL, NULL),
(2, 'screening', NULL, NULL),
(3, 'scoping', NULL, NULL),
(4, 'undefined', NULL, NULL),
(5, 'screening', NULL, NULL),
(6, 'scoping', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `references`
--

CREATE TABLE `references` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `questionnaire_id` int(10) UNSIGNED NOT NULL,
  `index` int(10) UNSIGNED NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `journal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `editor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accessed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `references`
--

INSERT INTO `references` (`id`, `questionnaire_id`, `index`, `author`, `title`, `journal`, `volume`, `issue`, `page`, `editor`, `book`, `publisher`, `year`, `url`, `doi`, `accessed`, `created_at`, `updated_at`) VALUES
(1,12,1,'Umweltbundesamt','Auf dem Weg zu einer nachhaltigen urbanen Mobilität',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021','https://www.umweltbundesamt.de/sites/default/files/medien/479/publikationen/uba_auf_dem_weg_zu_einer_nachhaltigen_urbanen_mobilitaet.pdf',NULL,'Mar 29, 2023','2024-08-28 15:40:51',NULL),
(2,12,2,'Umweltbundesamt','Mobilitätskonzepte für einen nachhaltigen Stadtverkehr 2050: Metaanalyse, Maßnahmen und Strategien',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022','https://www.umweltbundesamt.de/sites/default/files/medien/479/publikationen/texte_108-2022_mobilitaetskonzepte_fuer_einen_nachhaltigen_stadtverkehr_2050.pdf',NULL,'Sep 19, 2023','2024-08-28 15:40:51',NULL),
(3,12,3,'Baumeister, H., Köckler, H., Rüdiger, A., Claßen, T., Hamilton, J., Rüweler, M., et al.','Leitfaden Gesunde Stadt: Hinweise für Stellungnahmen zur Stadtentwicklung aus dem Öffentlichen Gesundheitsdienst','Bielefeld: Landeszentrum Gesundheit Nordrhein-Westfalen',NULL,NULL,NULL,NULL,NULL,NULL,'2019','https://www.lzg.nrw.de/_php/login/dl.php?u=/_media/pdf/service/Pub/2019_df/lzg-nrw_leitfaden_gesunde_stadt_2019.pdf',NULL,'Sep 19, 2023','2024-08-28 15:40:51',NULL),
(4,12,4,'Bundesministerium für Wohnen, Stadtentwicklung und Bauwesen','Der Deutschlandatlas - Karten - Erreichbarkeit des Öffentlichen Verkehrs (Haltestellen)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'https://www.deutschlandatlas.bund.de/DE/Karten/Wie-wir-uns-bewegen/103-Erreichbarkeit-Nahverkehr-Haltestellen.html',NULL,'May 10, 2023','2024-08-28 15:40:51',NULL),
(5,12,5,NULL,'Walkability: das Handbuch zur Bewegungsförderung in der Kommune',NULL,NULL,NULL,NULL,'Bucksch, J. & Schneider, S.',NULL,'1. Auflage. Bern: Verlag Hans Huber','2014','https://www.bisp-surf.de/Record/PU201602000791',NULL,NULL,'2024-08-28 15:40:51',NULL),
(6,12,6,'Forschungsinformationssystem Mobilität und Verkehr','Barrierefreier Zugang zum ÖPNV',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'https://www.forschungsinformationssystem.de/servlet/is/31013/',NULL,'May 10, 2023','2024-08-28 15:40:51',NULL),
(7,12,7,NULL,'Verkehrsbild Deutschland: Angebotsqualitäten und Erreichbarkeiten im öffentlichen Verkehr',NULL,NULL,NULL,NULL,'Bundesinstitut für Bau-, Stadt- und Raumforschung',NULL,'Bonn: Bundesamt für Bauwesen und Raumordnung','2018',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(8,12,8,'Lee, V., Mikkelsen, L., Srikantharajah, J., & Cohen, L.','Promising Strategies for Creating Healthy Eating and Active Living Environments',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2008','https://www.preventioninstitute.org/sites/default/files/publications/promisingstrategies.pdf',NULL,'Sep 19, 2023','2024-08-28 15:40:51',NULL),
(9,12,9,'Nieuwenhuijsen, M. J. & Khreis, H.','Car free cities: Pathway to healthy urban living','Environ Int','94',NULL,'251–262',NULL,NULL,NULL,'Sep 2016',NULL,'https://doi.org/10.1016/j.envint.2016.05.032',NULL,'2024-08-28 15:40:51',NULL),
(10,12,10,'European Environment Agency','Monitoring CO2 emissions from passenger cars and vans in 2018',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020','https://www.eea.europa.eu//publications/co2-emissions-from-cars-and-vans-2018',NULL,'Apr 25, 2023','2024-08-28 15:40:51',NULL),
(11,12,11,'OECD & WHO','Step Up! Tackling the Burden of Insufficient Physical Activity in Europe',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023','https://www.oecd-ilibrary.org/content/publication/500a9601-en',NULL,NULL,'2024-08-28 15:40:51',NULL),
(12,12,12,'Bucksch, J., Claßen, T., Geuter, G., & Budde, S.','Bewegungs- und gesundheitsförderliche Kommune. Evidenzen und Handlungskonzept für die Kommunalentwicklung – ein Leitfaden',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2012','https://pub.uni-bielefeld.de/record/2561990',NULL,'Mar 2, 2023','2024-08-28 15:40:51',NULL),
(13,12,13,'Great Britain Department for Transport','Manual for streets',NULL,NULL,NULL,NULL,NULL,NULL,'London: Telford','2007',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(14,12,14,'Hajna, S., Ross, N. A., Brazeau, A.-S., Bélisle, P., Joseph, L., Dasgupta, K.','Associations between neighbourhood walkability and daily steps in adults: a systematic review and meta-analysis','BMC Public Health','15',NULL,'768',NULL,NULL,NULL,'Aug 2015',NULL,'https://doi.org/10.1186/s12889-015-2082-x',NULL,'2024-08-28 15:40:51',NULL),
(15,12,15,'Siqueira Reis, R., Hino, A. A. F., Ricardo Rech, C., Kerr, J., & Curi Hallal, P.','Walkability and Physical Activity','American Journal of Preventive Medicine','45','3','269–275',NULL,NULL,NULL,'Sep 2013',NULL,'https://doi.org/10.1016/j.amepre.2013.04.020',NULL,'2024-08-28 15:40:51',NULL),
(16,12,16,'Wackerhage et al.','WHO-Leitlinien zu körperlicher Aktivität und sitzendem Verhalten','Bayrisches Ärzteblatt','3/2021',NULL,NULL,NULL,NULL,NULL,'2021','https://www.bayerisches-aerzteblatt.de/fileadmin/aerzteblatt/ausgaben/2021/03/einzelpdf/BAB_3_2021_91_93.pdf',NULL,'Feb 15, 2023','2024-08-28 15:40:51',NULL),
(17,12,17,'Finger, J., Mensink, G. B. M., Lange, C., & Manz, K.','Gesundheitsfördernde körperliche Aktivität in der Freizeit bei Erwachsenen in Deutschland','Journal of Health Monitoring','2','2',NULL,NULL,NULL,NULL,'2017',NULL,'https://doi.org/10.17886/RKI-GBE-2017-027',NULL,'2024-08-28 15:40:51',NULL),
(18,12,18,'Kurt O. K., Zhang, J., & Pinkerton, K. E.','Pulmonary health effects of air pollution','Curr Opin Pulm Med','22','2','138–143',NULL,NULL,NULL,'2016',NULL,'https://doi.org/10.1097/MCP.0000000000000248',NULL,'2024-08-28 15:40:51',NULL),
(19,12,19,'Umweltbundesamt','Luftqualität 2022',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023','https://www.umweltbundesamt.de/sites/default/files/medien/479/publikationen/2023_uba_hgp_luftqualitaet_dt_neu_bf.pdf',NULL,'May 30, 2023','2024-08-28 15:40:51',NULL),
(20,12,20,'Schubert, S., Steindorf, A., & Appelhans, J.','Verbesserung der Luftqualität und Verringerung des Lärms in Städten',NULL,NULL,NULL,'pp. 240–246','Lozán, J. L., Breckle, S.-W., Graßl, H., Kuttler, W., & Matzarakis, A.','Warnsignal Klima: die Städte: wissenschaftliche Fakten, Hamburg: Wissenschaftliche Auswertungen',NULL,'2019','https://www.klima-warnsignale.uni-hamburg.de/wp-content/uploads/pdf/de/staedte/warnsignal_klima-die_staedte-kapitel-6_7.pdf',NULL,'Sep 19, 2023','2024-08-28 15:40:51',NULL),
(21,12,21,'Claßen, T.','Lärm macht krank! – Gesundheitliche Wirkungen von Lärmbelastungen in Städten','Informationen zur Raumentwicklung','2013','3','223–234',NULL,NULL,NULL,'2013','https://www.researchgate.net/publication/259582182_Larm_macht_krank_-_Gesundheitliche_Wirkungen_von_Larmbelastungen_in_Stadten',NULL,NULL,'2024-08-28 15:40:51',NULL),
(22,12,22,'Bull, F. C., Al-Ansari, S. S., Biddle, S., et al.','World Health Organization 2020 guidelines on physical activity and sedentary behaviour','British Journal of Sports Medicine','54',NULL,'1451–1462',NULL,NULL,NULL,'2020',NULL,'https://doi.org/10.1136/bjsports-2020-102955',NULL,'2024-08-28 15:40:51',NULL),
(23,12,23,'Vögele, C.','Herz-Kreislauf-Erkrankungen',NULL,NULL,NULL,'139–152','Ehlert, U.','Verhaltensmedizin. Springer-Lehrbuch','Springer, Berlin, Heidelberg','2016',NULL,'https://doi.org/10.1007/978-3-662-48035-9_7',NULL,'2024-08-28 15:40:51',NULL),
(24,12,24,'Gößwald, A., Schienkiewitz, A., Nowossadeck, E., et al.','Prävalenz von Herzinfarkt und koronarer Herzkrankheit bei Erwachsenen im Alter von 40 bis 79 Jahren in Deutschland','Bundesgesundheitsbl','56',NULL,'650–655',NULL,NULL,NULL,'2013',NULL,'https://doi.org/10.1007/s00103-013-1666-9',NULL,'2024-08-28 15:40:51',NULL),
(25,12,25,'Bertz, J., et al.','Verbreitung von Krebserkrankungen in Deutschland. Entwicklung der Prävalenzen zwischen 1990 und 2010','Beiträge zur Gesundheitsberichterstattung des Bundes',NULL,NULL,NULL,NULL,NULL,'Robert Koch-Institut, Berlin','2010','https://edoc.rki.de/bitstream/handle/176904/3226/23GSS31yB0GKUhU.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(26,12,26,'Delbrück, H.','Körperliche Aktivität und Tumorkrankheiten','Internist','53',NULL,'688–697',NULL,NULL,NULL,'2012',NULL,'https://doi.org/10.1007/s00108-011-2934-0',NULL,'2024-08-28 15:40:51',NULL),
(27,12,27,'Schmidt, C., Reitzle, L., Dreß, J., et al.','Prävalenz und Inzidenz des dokumentierten Diabetes mellitus – Referenzauswertung für die Diabetes-Surveillance auf Basis von Daten aller gesetzlich Krankenversicherten','Bundesgesundheitsblatt','63',NULL,'93–102',NULL,NULL,NULL,'2020',NULL,'https://doi.org/10.1007/s00103-019-03068-9',NULL,'2024-08-28 15:40:51',NULL),
(28,12,28,'Zhao, F., Wu, W., Feng, X., et al.','Physical Activity Levels and Diabetes Prevalence in US Adults: Findings from NHANES 2015–2016','Diabetes Ther','11',NULL,'1303–16',NULL,NULL,NULL,'2020',NULL,'https://doi.org/10.1007/s13300-020-00817-x',NULL,'2024-08-28 15:40:51',NULL),
(29,12,29,'Colberg, S. R., Sigal, R. J., Yardley, J. E., Riddell, M. C., Dunstan, D. W., Dempsey, P. C., et al.','Physical Activity/Exercise and Diabetes: A Position Statement of the American Diabetes Association','Diabetes Care','39','11','2065–79',NULL,NULL,NULL,'2016',NULL,'https://doi.org/10.2337/dc16-1728',NULL,'2024-08-28 15:40:51',NULL),
(30,12,30,'Thom, J., Kuhnert, R., Born, S., & Hapke, U.','12-Monats-Prävalenz der selbstberichteten ärztlich diagnostizierten Depression in Deutschland','J Health Monit','2','3','72–80',NULL,NULL,NULL,'2017',NULL,'https://doi.org/10.17886/RKI-GBE-2017-057',NULL,'2024-08-28 15:40:51',NULL),
(31,12,31,'Krien, D.','Therapeutische Effekte körperlicher Aktivität bei depressiven Patienten','Universität Ulm (Dissertation)',NULL,NULL,NULL,NULL,NULL,NULL,'2016',NULL,'https://doi.org/10.18725/OPARU-3799',NULL,'2024-08-28 15:40:51',NULL),
(32,12,32,'Huber, G.','Adipositas entsteht durch Bewegungsmangel – Epidemiologie und Entstehung','B&G Bewegungstherapie und Gesundheitssport','26','2','46–51',NULL,NULL,NULL,'2010',NULL,'https://doi.org/10.1055/s-0030-1247308',NULL,'2024-08-28 15:40:51',NULL),
(33,12,33,'Robert Koch-Institut','Gesundheit in Deutschland aktuell – GEDA 2019/2020',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021',NULL,'https://doi.org/10.25646/9362',NULL,'2024-08-28 15:40:51',NULL),
(34,12,34,'Schienkiewitz, A., Brettschneider, A-K., Damerow, S., & Rosario, A. S.','Übergewicht und Adipositas im Kindes- und Jugendalter in Deutschland – Querschnittergebnisse aus KiGGS Welle 2 und Trends','J Health Monit','3','1',NULL,NULL,NULL,'Robert Koch-Institut, Berlin','2018',NULL,'https://doi.org/10.17886/RKI-GBE-2018-005',NULL,'2024-08-28 15:40:51',NULL),
(35,12,35,'Williams, E. P., Mesidor, M., Winters, K., et al.','Overweight and Obesity: Prevalence, Consequences, and Causes of a Growing Public Health Problem','Curr Obes Rep','4',NULL,'363–370',NULL,NULL,NULL,'2015',NULL,'https://doi.org/10.1007/s13679-015-0169-4',NULL,'2024-08-28 15:40:51',NULL),
(36,12,36,'Konnopka, A., Bödemann, M., & König, H. H.','Health burden and costs of obesity and overweight in Germany','Eur J Health Econ','12',NULL,'345–352',NULL,NULL,NULL,'2011',NULL,'https://doi.org/10.1007/s10198-010-0242-6',NULL,'2024-08-28 15:40:51',NULL),
(37,12,37,'Internationale Gesellschaft für Umweltepidemiologie, European Respiratory Society','Rolle der Luftschadstoffe für die Gesundheit – Expertise',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019','https://www.swisstph.ch/fileadmin/user_upload/SwissTPH/Institute/Ludok/Aktuelle_Berichte/Rolle_der_Luftschadstoffe_f%C3%BCr_die_Geundheit_Expertise_ISEE_ERS_Final.pdf',NULL,'May 30, 2023','2024-08-28 15:40:51',NULL),
(38,12,38,'Umweltbundesamt','Luftqualität in der Stadt – gemeinsam weiterdenken',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022','https://www.umweltbundesamt.de/publikationen/luftqualitaet-in-der-stadt-gemeinsam-weiterdenken',NULL,'Sep 19, 2023','2024-08-28 15:40:51',NULL),
(39,12,39,'European Environment Agency','Air quality in Europe – 2020 report',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020','https://www.eea.europa.eu/publications/air-quality-in-europe-2020-report/',NULL,'May 30, 2023','2024-08-28 15:40:51',NULL),
(40,12,40,'Peden, M.','World Report on Road Traffic Injury Prevention',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2004','https://www.who.int/publications/i/item/world-report-on-road-traffic-injury-prevention',NULL,'Sep 19, 2023','2024-08-28 15:40:51',NULL),
(41,13,1,'Waddell, G. & Burton, A.','Is work good for your health and well-being?',NULL,NULL,NULL,NULL,NULL,NULL,'TSO, London','2006',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(42,13,2,'Capon, A. G.','Health impacts of urban development: key considerations',NULL,'18','10','155–156',NULL,NULL,'TSO, London','2007',NULL,'https://doi.org/10.1071/NB07087',NULL,'2024-08-28 15:40:51',NULL),
(43,13,3,'Baumeister, H., Köckler, H., Rüdiger, A., Claßen, T., Hamilton, J., Rüweler, M., et al.','Leitfaden Gesunde Stadt: Hinweise für Stellungnahmen zur Stadtentwicklung aus dem Öffentlichen Gesundheitsdienst','Bielefeld: Landeszentrum Gesundheit Nordrhein-Westfalen',NULL,NULL,NULL,NULL,NULL,NULL,'2019','https://www.lzg.nrw.de/_php/login/dl.php?u=/_media/pdf/service/Pub/2019_df/lzg-nrw_leitfaden_gesunde_stadt_2019.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(44,13,4,'Bundesministerium der Justiz, Bundesamt für Justiz','Verordnung über Arbeitsstätten (Arbeitsstättenverordnung - ArbStättV)','BGBl. I',NULL,NULL,'2179',NULL,NULL,NULL,'2004',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(45,13,5,'Domhardt, H.-J., Mangels, K., Wahrhusen, N., Wieschmann, S., & Jacoby, C.','Kompakte, umweltverträgliche Siedlungsstrukturen im regionalen Kontext. Potenziale, Hemmnisse und Handlungsansätze einer integrierten Siedlungs- und Verkehrsplanung im Zusammenhang von Stadt und Region',NULL,NULL,NULL,NULL,NULL,NULL,'Umweltbundesamt','2021','https://www.umweltbundesamt.de/sites/default/files/medien/479/publikationen/texte_175-2021_kompakte_umweltvertraegliche_siedlungsstrukturen_im_regionalen_kontext_abschlussbericht.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(46,13,6,'Penn-Bressel, G.','„Urban, kompakt, durchgrünt“ – Strategien für eine nachhaltige Stadtentwicklung',NULL,NULL,NULL,NULL,NULL,NULL,'Umweltbundesamt','2004','https://www.umweltbundesamt.de/sites/default/files/medien/378/dokumente/urban-kompakt_durchgruent_penn-bressel.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(47,13,7,'Deutsches Institut für Urbanistik','Stadt der kurzen Wege',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(48,13,8,'Rohs, M., Flore, G., & Cavagna, M.','Auf dem Weg zu einer nachhaltigen urbanen Mobilität in der Stadt für Morgen',NULL,NULL,NULL,NULL,NULL,NULL,'Umweltbundesamt','2021','https://www.umweltbundesamt.de/sites/default/files/medien/479/publikationen/uba_auf_dem_weg_zu_einer_nachhaltigen_urbanen_mobilitaet.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(49,13,9,'Bundesministerium für Bildung und Forschung','Bekanntmachung. Förderziel, Zuwendungszweck, Rechtsgrundlagen',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022','https://www.bmbf.de/bmbf/shareddocs/bekanntmachungen/de/2022/10/2022-10-28-Bekanntmachung-BOF.html?view=renderNewsletterHtml',NULL,NULL,'2024-08-28 15:40:51',NULL),
(50,13,10,'Beckmann, K. J., Gies, J., Thiemann-Linden, J., & Preuß, T.','Leitkonzept - Stadt und Region der kurzen Wege. Gutachen im Kontext der Biodiversitätsstrategie',NULL,NULL,NULL,NULL,NULL,NULL,'Umweltbundesamt','2011','https://www.umweltbundesamt.de/sites/default/files/medien/461/publikationen/4151.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(51,13,11,'Bundesministerium für Wohnen, Stadtentwicklung und Bauwesen','Erreichbarkeit des Öffentlichen Verkehrs (Haltestellen)','Deutschlandatlas',NULL,NULL,NULL,NULL,NULL,'Umweltbundesamt','n.d.','https://www.deutschlandatlas.bund.de/DE/Karten/Wie-wir-uns-bewegen/103-Erreichbarkeit-Nahverkehr-Haltestellen.html',NULL,NULL,'2024-08-28 15:40:51',NULL),
(52,13,12,'Patterson, R., Panther, J., Vamos, E. P., Cummins, S., Millett, C., & Laverty, A. A.','Associations between commute mode and cardiovascular disease, cancer, and all-cause mortality, and cancer incidence, using linked Census data over 25 years in England and Wales: a cohort study','Lancet','4','5','E186–E194',NULL,NULL,NULL,'2020',NULL,'https://doi.org/10.1016/S2542-5196(20)30079-6',NULL,'2024-08-28 15:40:51',NULL),
(53,13,13,'Meschik, M.','Planungshandbuch Radverkehr',NULL,NULL,NULL,NULL,NULL,NULL,'Springer Vienna','2008',NULL,'https://doi.org/10.1007/978-3-211-76751-1',NULL,'2024-08-28 15:40:51',NULL),
(54,13,14,'Deutsches Institut für Urbanistik','Radfahrer und Fußgänger auf gemeinsamen Flächen',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011','https://backend.orlis.difu.de/server/api/core/bitstreams/b6654ab9-3287-4021-bb74-7ca7bd68edb7/content',NULL,NULL,'2024-08-28 15:40:51',NULL),
(55,13,15,'Untiedt, G., Karl, H., Rosche, J., Kersting, M., & Alecke, B.','Aufgaben, Struktur und mögliche Ausgestaltung eines gesamtdeutschen Systems zur Förderung von strukturschwachen Regionen ab 2020',NULL,NULL,NULL,NULL,NULL,NULL,'Bundesministerium für Wirtschaft und Energie','2016','https://www.bmwk.de/Redaktion/DE/Downloads/G/gutachten-regionalpolitik-2020-kurzfassung.pdf?__blob=publicationFile',NULL,NULL,'2024-08-28 15:40:51',NULL),
(56,13,16,'Commission on Social Determinants of Health','Closing the gap in a generation: health equity through action on the social determinants of health. Final Report of the Commission on Social Determinants of Health',NULL,NULL,NULL,NULL,NULL,NULL,'Geneva, World Health Organization','2008','https://iris.who.int/bitstream/handle/10665/43943/9789241563703_eng.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(57,13,17,'Ministerium für Arbeit, Integration und Soziales des Landes Nordrhein-Westfalen','Fachkräfte sichern! Landesinitiative zur Fachkräftesicherung – Nordrhein-Westfalen handelt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013','https://www.fachkraefteinitiative-nrw.de/fachkraefteinitiative-nrw/broschuere-landesinitiative-fachkraeftesicherung-finish-2013-02-19-barrierefrei.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(58,13,18,'Inoue, S., Yorifuji, T., Takao, S., Doi, H., & Kawachi, I.','Social Cohesion and Mortality: A Survival Analysis of Older Adults in Japan','Am J Public Health','103','12','e60–e66',NULL,NULL,NULL,'2013',NULL,'https://doi.org/10.2105/AJPH.2013.301311',NULL,'2024-08-28 15:40:51',NULL),
(59,13,19,'Sugisawa, H., Liang, J., & Liu, X.','Social Networks, Social Support, and Mortality Among Older People in Japan','J Gerontol','49','1','3–13',NULL,NULL,NULL,'1994',NULL,'https://doi.org/10.1093/geronj/49.1.S3',NULL,'2024-08-28 15:40:51',NULL),
(60,13,20,'Blazer, D. G.','Social Support and Mortality in an Elderly Community Population','Am J Epidemiol','115','5','684–694',NULL,NULL,NULL,'1982',NULL,'https://doi.org/10.1093/oxfordjournals.aje.a113351',NULL,'2024-08-28 15:40:51',NULL),
(61,13,21,'Berkman, L. F.','Social Support, Social Networks, Social Cohesion and Health','Soc Work Health Care','31','2','3–14',NULL,NULL,'Routledge','2000',NULL,'https://doi.org/10.1300/J010v31n02_02',NULL,'2024-08-28 15:40:51',NULL),
(62,13,22,'Gerber, M. & Schilling, R.','Stress als Risikofaktor für körperliche und psychische Gesundheitsbeeinträchtigungen',NULL,NULL,NULL,'93–122','Fuchs, R. & Gerber, M.','Handbuch Stressregulation und Sport','Springer Berlin, Heidelberg','2018',NULL,'https://doi.org/10.1007/978-3-662-49322-9_5',NULL,'2024-08-28 15:40:51',NULL),
(63,13,23,'Phyo, A. Z. Z., Freak-Poli, R., Craig, H., et al.','Quality of life and mortality in the general population: a systematic review and meta-analysis','BMC Public Health','20',NULL,'1596',NULL,NULL,NULL,'2020',NULL,'https://doi.org/10.1186/s12889-020-09639-9',NULL,'2024-08-28 15:40:51',NULL),
(64,13,24,'Mikkelsen, S. S., Mortensen, E. L., & Flensborg-Madsen, T.','A prospective cohort study of quality of life and ischemic heart disease','Scand J Public Health','42','1','60–66',NULL,NULL,NULL,'2014',NULL,'https://doi.org/10.1177/1403494813504504',NULL,'2024-08-28 15:40:51',NULL),
(65,13,25,'Claßen, T.','Lärm macht krank! – Gesundheitliche Wirkungen von Lärmbelastungen in Städten','Informationen zur Raumentwicklung','2013','3','223–234',NULL,NULL,NULL,'2013','https://www.researchgate.net/publication/259582182_Larm_macht_krank_-_Gesundheitliche_Wirkungen_von_Larmbelastungen_in_Stadten',NULL,NULL,'2024-08-28 15:40:51',NULL),
(66,13,26,'Winklmayr, C., et al.','Hitze in Deutschland: Gesundheitliche Risiken und Maßnahmen zur Prävention','J Health Monit','8',NULL,NULL,NULL,NULL,NULL,'2023',NULL,'https://doi.org/10.25646/11645',NULL,'2024-08-28 15:40:51',NULL),
(67,13,27,'Fischer, M., Dröge, J., Braun, M. et al.','Die Feinstaubbelastung Radfahrender im innerstädtischen Straßenverkehr','Zbl Arbeitsmed','73',NULL,'136–146',NULL,NULL,NULL,'2023',NULL,'https://doi.org/10.1007/s40664-023-00494-0',NULL,'2024-08-28 15:40:51',NULL),
(68,13,28,'Kurt O. K., Zhang, J., & Pinkerton, K. E.','Pulmonary health effects of air pollution','Curr Opin Pulm Med','22','2','138–143',NULL,NULL,NULL,'2016',NULL,'https://doi.org/10.1097/MCP.0000000000000248',NULL,'2024-08-28 15:40:51',NULL),
(69,13,29,'Degreif, S., Minnich, L., Fischer, H., Ruther-Mehlis, A., Wursthorn, H., & Diegmann, V.','Luftqualität in der Stadt – gemeinsam weiterdenken',NULL,NULL,NULL,NULL,NULL,NULL,'Umweltbundesamt','2022',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(70,13,30,NULL,'Air quality in Europe - 2020 report',NULL,NULL,NULL,NULL,NULL,NULL,'European Environment Agency','2022',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(71,13,31,'Nieuwenhuijsen, M. J. & Khreis, H.','Car free cities: Pathway to healthy urban living','Environ Int','94',NULL,'251–262',NULL,NULL,NULL,'2016',NULL,'https://doi.org/10.1016/j.envint.2016.05.032',NULL,'2024-08-28 15:40:51',NULL),
(72,13,32,'Flensborg-Madsen, T., Johansen, C., Grønbæk, M., & Mortensen, E. L.','A prospective association between quality of life and risk for cancer','Eur J Cancer','47','16','2446–52',NULL,NULL,NULL,'2011',NULL,'https://doi.org/10.1016/j.ejca.2011.06.005',NULL,'2024-08-28 15:40:51',NULL),
(73,13,33,'Klineberg, E., Clark, C., Bhui, K.S., et al.','Social support, ethnicity and mental health in adolescents','Soc Psychiat Epidemiol','41',NULL,'755–760',NULL,NULL,NULL,'2006',NULL,'https://doi.org/10.1007/s00127-006-0093-8',NULL,'2024-08-28 15:40:51',NULL),
(74,13,34,'Mair, C., Diez Roux, A. V., & Morenoff, J. D.','Neighborhood stressors and social support as predictors of depressive symptoms in the Chicago Community Adult Health Study','Health & Place','16','5','811–819',NULL,NULL,NULL,'2010',NULL,'https://doi.org/10.1016/j.healthplace.2010.04.006',NULL,'2024-08-28 15:40:51',NULL),
(75,13,35,'Fowler, K., Wareham-Fowler, S., & Barnes, C.','Social context and depression severity and duration in Canadian men and women: exploring the influence of social support and sense of community belongingness','J Appl Soc Psychol','43','S1','E85–E96',NULL,NULL,NULL,'2013',NULL,'https://doi.org/10.1111/jasp.12050',NULL,'2024-08-28 15:40:51',NULL),
(76,13,36,'Bucksch, J., Claßen, T., Geuter, G., & Budde, S.','Bewegungs- und gesundheitsförderliche Kommune. Evidenzen und Handlungskonzept für die Kommunalentwicklung – ein Leitfaden',NULL,NULL,NULL,NULL,NULL,NULL,'Bielefeld: Landeszentrum Gesundheit Nordrhein-Westfalen','2012',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(77,13,37,NULL,'World Report on Road Traffic Injury Prevention',NULL,NULL,NULL,NULL,'Peden, M.',NULL,NULL,'2004',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(78,14,1,'Baumeister, H., Köckler, H., Rüdiger, A., Claßen, T., Hamilton, J., Rüweler, M., et al.','Leitfaden Gesunde Stadt: Hinweise für Stellungnahmen zur Stadtentwicklung aus dem Öffentlichen Gesundheitsdienst','Bielefeld: Landeszentrum Gesundheit Nordrhein-Westfalen',NULL,NULL,NULL,NULL,NULL,NULL,'2019','https://www.lzg.nrw.de/_php/login/dl.php?u=/_media/pdf/service/Pub/2019_df/lzg-nrw_leitfaden_gesunde_stadt_2019.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(79,14,2,'Winklmayr, C., et al.','Hitze in Deutschland: Gesundheitliche Risiken und Maßnahmen zur Prävention','J Health Monit','8',NULL,NULL,NULL,NULL,NULL,'2023',NULL,'https://doi.org/10.25646/11645',NULL,'2024-08-28 15:40:51',NULL),
(80,14,3,'Meyer, R. & Sauter, A.','Umwelt und Gesundheit. Endbericht zum TA-Projekt','Büro für Technikfolgen-Abschätzung beim Deutschen Bundestag (TAB)',NULL,NULL,NULL,NULL,NULL,NULL,'1999',NULL,'https://doi.org/10.5445/IR/1000103004',NULL,'2024-08-28 15:40:51',NULL),
(81,14,4,'Schubert, S., Steindorf, A., & Appelhans, J.','Verbesserung der Luftqualität und Verringerung des Lärms in Städten',NULL,NULL,NULL,'240–246','Lozán, J. L., Breckle, S.-W., Graßl, H., Kuttler, W., & Matzarakis, A.','Warnsignal Klima: Die Städte','Hamburg: Wissenschaftliche Auswertungen','2019','https://www.klima-warnsignale.uni-hamburg.de/wp-content/uploads/pdf/de/staedte/warnsignal_klima-die_staedte-kapitel-6_7.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(82,14,5,'Beaudoin, J., Farzin, Y. H., Lin Lawell, C.-Y. C.','Public transit investment and sustainable transportation: A review of studies of transit’s impact on traffic congestion and air quality','Res Transp Econ','52',NULL,'15–22',NULL,NULL,NULL,'2015',NULL,'https://doi.org/10.1016/j.retrec.2015.10.004',NULL,'2024-08-28 15:40:51',NULL),
(83,14,6,'Saelens, B. E., Vernez Moudon, A., Kang, B., Hurvitz, P. M., & Zhou, C.','Relation Between Higher Physical Activity and Public Transit Use','Am J Public Health','104',NULL,'854–859',NULL,NULL,NULL,'2014',NULL,'https://doi.org/10.2105/AJPH.2013.301696',NULL,'2024-08-28 15:40:51',NULL),
(84,14,7,'Freeland, A. L., Banerjee, S. N., Dannenberg, A. L., & Wendel, A. M.','Walking Associated With Public Transit: Moving Toward Increased Physical Activity in the United States','Am J Public Health','103',NULL,'536–542',NULL,NULL,NULL,'2013',NULL,'https://doi.org/10.2105/AJPH.2012.300912',NULL,'2024-08-28 15:40:51',NULL),
(85,14,8,'Bundesministerium für Digitales und Verkehr','Blaue und grüne Infrastruktur zur Regulierung des Stadtklimas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023','https://www.forschungsinformationssystem.de/servlet/is/542870/',NULL,NULL,'2024-08-28 15:40:51',NULL),
(86,14,9,'Andersson, E., et al.','Enabling Green and Blue Infrastructure to Improve Contributions to Human Well-Being and Equity in Urban Systems','BioScience','69','7','566–574',NULL,NULL,NULL,'2019',NULL,'https://doi.org/10.1093/biosci/biz058',NULL,'2024-08-28 15:40:51',NULL),
(87,14,10,'Matzarakis, A. & Endler, C.','Climate change and thermal bioclimate in cities: impacts and options for adaptation in Freiburg, Germany','Int J Biometeorol','54',NULL,'479–483',NULL,NULL,NULL,'2010',NULL,'https://doi.org/10.1007/s00484-009-0296-2',NULL,'2024-08-28 15:40:51',NULL),
(88,14,11,'Kurt O. K., Zhang, J., & Pinkerton, K. E.','Pulmonary health effects of air pollution','Curr Opin Pulm Med','22','2','138–143',NULL,NULL,NULL,'2016',NULL,'https://doi.org/10.1097/MCP.0000000000000248',NULL,'2024-08-28 15:40:51',NULL),
(89,14,12,'Claßen, T.','Lärm macht krank! – Gesundheitliche Wirkungen von Lärmbelastungen in Städten','Informationen zur Raumentwicklung','2013','3','223–234',NULL,NULL,NULL,'2013','https://www.researchgate.net/publication/259582182_Larm_macht_krank_-_Gesundheitliche_Wirkungen_von_Larmbelastungen_in_Stadten',NULL,NULL,'2024-08-28 15:40:51',NULL),
(90,14,13,'Kuechly, H., Meier, J., Kyba, C., & Hänel, A.','Ausmaß der Lichtverschmutzung und Optionen zur Minderung der negativen Auswirkungen','LUP – Luftbild Umwelt Planung GmbH, Deutsches GeoForschungsZentrum GFZ',NULL,NULL,NULL,NULL,NULL,NULL,'2018',NULL,'https://doi.org/10.48440/GFZ.1.4.2020.002',NULL,'2024-08-28 15:40:51',NULL),
(91,14,14,'Robinson, P. J.','On the Definition of a Heat Wave','J Appl Meteorol','40','4','762–775',NULL,NULL,NULL,'2001',NULL,'https://doi.org/10.1175/1520-0450(2001)040<0762:OTDOAH>2.0.CO;2',NULL,'2024-08-28 15:40:51',NULL),
(92,14,15,'Gronwald, M., Aleksandrowicz, P., Fischer, V., Sinning, H., Keydel, A., Reinfried, F., et al.','Hitze-Handbuch: Gut vorbereitet auf Hitze',NULL,NULL,NULL,NULL,NULL,NULL,'Landeshauptstadt Dresden','2023','https://www.dresden.de/media/pdf/gesundheit/WHO/SGP_Hitze-Handbuch.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(93,14,16,'Nationale Akademie der Wissenschaften Leopoldina','Klimawandel: Ursachen, Folgen und Handlungsmöglichkeiten (Factsheet)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021',NULL,'https://doi.org/10.26164/LEOPOLDINA_03_00327',NULL,'2024-08-28 15:40:51',NULL),
(94,14,17,'Winklmayr, C. & an der Heiden, M.','Hitzebedingte Mortalität in Deutschland 2022','Epid Bull','42',NULL,'3–9',NULL,NULL,NULL,'2022',NULL,'https://doi.org/10.25646/10695.3',NULL,'2024-08-28 15:40:51',NULL),
(95,14,18,'World Health Organization, Regional Office for Europe','Burden of disease from environmental noise: quantification of healthy life years lost in Europe',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011','https://iris.who.int/handle/10665/326424',NULL,NULL,'2024-08-28 15:40:51',NULL),
(96,14,19,'Kaspar-Ott, I., Hertig, E., Traidl-Hoffmann, C., & Fairweather, V.','Wie sich der Klimawandel auf unsere Gesundheit auswirkt','Pneumo News','2020','4',NULL,NULL,NULL,NULL,'2020',NULL,'https://doi.org/10.1007/s15033-020-1836-z',NULL,'2024-08-28 15:40:51',NULL),
(97,14,20,'Kantermann, T.','Humanmedizinisch relevante Wirkungen von Lichtverschmutzung','SynOpus',NULL,NULL,NULL,NULL,NULL,NULL,'2018',NULL,'https://doi.org/10.48440/GFZ.1.4.2020.004',NULL,'2024-08-28 15:40:51',NULL),
(98,14,21,'Ragettli, M. S. & Röösli, M.','Hitze-Massnahmen-Toolbox 2021. Ein Massnahmenkatalog für den Schutz der menschlichen Gesundheit vor Hitze',NULL,NULL,NULL,NULL,NULL,NULL,'SwissTPH, Basel','2021','https://edoc.unibas.ch/91378/1/20221212132242_63971d121ee19.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(99,14,22,'Decker, A. & Grunewald, K.','Klima, Luft und Lärm. Fachbeitrag zum Landschaftsprogramm',NULL,NULL,NULL,NULL,NULL,NULL,'Sächsisches Landesamt für Umwelt, Landwirtschaft und Geologie','2014','https://www.natur.sachsen.de/download/sekt_Ziel_Klima_Luft_Laerm.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(100,14,23,'Great Britain Department for Transport','Manual for streets',NULL,NULL,NULL,NULL,NULL,NULL,'London: Telford','2007',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(101,14,24,'GeoDZ','Frischluftschneise',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2010','http://www.geodz.com/deu/d/Frischluftschneise',NULL,NULL,'2024-08-28 15:40:51',NULL),
(102,15,1,'Baumeister, H., Köckler, H., Rüdiger, A., Claßen, T., Hamilton, J., Rüweler, M., et al.','Leitfaden Gesunde Stadt: Hinweise für Stellungnahmen zur Stadtentwicklung aus dem Öffentlichen Gesundheitsdienst','Bielefeld: Landeszentrum Gesundheit Nordrhein-Westfalen',NULL,NULL,NULL,NULL,NULL,NULL,'2019','https://www.lzg.nrw.de/_php/login/dl.php?u=/_media/pdf/service/Pub/2019_df/lzg-nrw_leitfaden_gesunde_stadt_2019.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(103,15,2,'Hauck, T. E., Hennecke, S., & Körner, S.','Aneignung urbaner Freiräume: ein Diskurs über städtischen Raum','Bielefeld: Transcript',NULL,NULL,NULL,NULL,NULL,NULL,'2017',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(104,15,3,'Deinet, U. & Reutlinger, C.','Aneignung',NULL,NULL,NULL,'1719–28','Bollweg, P., Buchna, J., Coelen, T., & Otto, H. U.','Handbuch Ganztagsbildung','Springer VS, Wiesbaden','2020',NULL,'https://doi.org/10.1007/978-3-658-23230-6_127',NULL,'2024-08-28 15:40:51',NULL),
(105,15,4,'Koch, R.','Loose Space: Possibility and Diversity in Urban Life – Edited by Karen A. Franck and Quentin Stevens',' N Z Geogr','66','2','174–176',NULL,NULL,NULL,'2010',NULL,'https://doi.org/10.1111/j.1745-7939.2010.01183_6.x',NULL,'2024-08-28 15:40:51',NULL),
(106,15,5,'Great Britain Department for Transport','Manual for streets',NULL,NULL,NULL,NULL,NULL,NULL,'London: Telford','2007',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(107,15,6,'Beckmann, K., Gies, J., Thiemann-Linden, J., & Preuß, T.','Leitkonzept – Stadt und Region der kurzen Wege',NULL,NULL,NULL,NULL,NULL,NULL,'Umweltbundesamt','2011',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(108,15,7,'Moreno, C., Allam, Z., Chabaud, D., Gall, C., & Pratlong, F.','Introducing the “15-Minute City”: Sustainability, Resilience and Place Identity in Future Post-Pandemic Cities','Smart Cities','4','1','93–111',NULL,NULL,NULL,'2021',NULL,'https://doi.org/10.3390/smartcities4010006',NULL,'2024-08-28 15:40:51',NULL),
(109,15,8,'Welge, A. & Munzinger, T.','An den Klimawandel angepasste Stadtentwicklung. Städte nachhaltig und lebenswert machen','Klimaanpassung Stadtentwickl. Kommunen Weltweit Engag. Sich Gem. Für Eine Nachhalt. Transform',NULL,NULL,NULL,NULL,NULL,NULL,'2020',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(110,15,9,'Arens, S.','in Heimspiel für Dortmund. Die Stadt Dortmund hat gute Voraussetzungen dafür, Klimaanpassung in der Verwaltung zu verankern','Klimaanpassung Stadtentwickl. Kommunen Weltweit Engag. Sich Gem. Für Eine Nachhalt. Transform',NULL,NULL,NULL,NULL,NULL,NULL,'2020',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(111,15,10,NULL,NULL,NULL,NULL,NULL,NULL,'Kost, S. & Petrow, C. A.','Kulturelle Vielfalt in Freiraum und Landschaft: Wahrnehmung, Partizipation, Aneignung und Gestaltung','Springer VS Wiesbaden','2022',NULL,'https://doi.org/10.1007/978-3-658-37518-8',NULL,'2024-08-28 15:40:51',NULL),
(112,15,11,NULL,NULL,NULL,'37',NULL,NULL,'Fugmann, F., Karow-Kluge, D., & Selle, K.','Öffentliche Räume in stadtgesellschaftlich vielfältigen Quartieren: Nutzung, Wahrnehmung und Bedeutung','Bundesverband für Wohnen und Stadtentwicklung e.V. (vhw)','2017',NULL,'https://doi.org/10.18154/RWTH-2017-02663',NULL,'2024-08-28 15:40:51',NULL),
(113,15,12,'CABE Space',NULL,NULL,NULL,NULL,NULL,NULL,'Public space lessons: Designing and planning for play','CABE Lond','2011',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(114,15,13,'Araújo, M. C. B. & Costa, M. F.','From Plant to Waste: The Long and Diverse Impact Chain Caused by Tobacco Smoking','Int J Environ Res Public Health','16','15','2690',NULL,NULL,NULL,'2019',NULL,'https://doi.org/10.3390/ijerph16152690',NULL,'2024-08-28 15:40:51',NULL),
(115,15,14,'Ministerium für Bauen und Verkehr des Landes Nordrhein-Westfalen','Stadt und Sicherheit im demographischen Wandel. Bericht über die Ergebnisse der Arbeitsgruppe des Landespräventionsrates Nordrhein-Westfalen',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2009',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(116,15,15,'Weicht, C.','Checklisten zur Überprüfung von Sicherheitsbelangen in Neubaugebieten und ihre Anwendung im Verfahren der örtlichen Bauleitplanung',NULL,NULL,NULL,NULL,NULL,'Sicherheit planen und gestalten','Niedersächsisches Ministerium für Soziales, Frauen, Familie und Gesundheit','2004','https://www.sipa-niedersachsen.de/html/download.cms?id=19&datei=Sicherheit-planen-und-gestalten-19.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(117,15,16,'NSW Department of Urban Affairs and Planning','Integrating Land Use and Transport. Improving Transport Choice — Guidelines for Planning and Development',NULL,NULL,NULL,NULL,NULL,NULL,'Sydney: Department of Urban Affairs and Planning','2001',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(118,15,17,NULL,'Verkehrsbild Deutschland: Angebotsqualitäten und Erreichbarkeiten im öffentlichen Verkehr',NULL,NULL,NULL,NULL,'Bundesinstitut für Bau-, Stadt- und Raumforschung',NULL,'Bonn: Bundesamt für Bauwesen und Raumordnung','2018',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(119,15,18,'Nolde, H.','Von der Pflicht zur Kür','Soz Extra','37',NULL,'44–45',NULL,NULL,NULL,'2013',NULL,'https://doi.org/10.1007/s12054-012-0118-y',NULL,'2024-08-28 15:40:51',NULL),
(120,15,19,'Koohsari, M. J., Mavoa, S., Villanueva, K., Sugiyama, T., Badland, H., Kaczynski, A. T., et al.','Public open space, physical activity, urban design and public health: Concepts, methods and research agenda','Health & Place','33',NULL,'75-82',NULL,NULL,NULL,'2015',NULL,'https://doi.org/10.1016/j.healthplace.2015.02.009',NULL,'2024-08-28 15:40:51',NULL),
(121,15,20,'Bundesamt für Statistik','Indikatoren der Lebensqualität',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'n.d.',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(122,15,21,'Heise, P. & Hallermayr, S.','Wirkungen von Natur auf den Menschen',NULL,NULL,NULL,NULL,NULL,'Grüne Stadt - Gesunder Mensch. essentials','Springer Spektrum, Berlin, Heidelberg','2022',NULL,'https://doi.org/10.1007/978-3-662-65317-3_2',NULL,'2024-08-28 15:40:51',NULL),
(123,15,22,'Selmi, W., Weber, C., Rivière, E., Blond, N., Mehdi, L., & Nowak, D.','Air pollution removal by trees in public green spaces in Strasbourg city, France','Urban For Urban Green','17',NULL,'192–201',NULL,NULL,NULL,'2016',NULL,'https://doi.org/10.1016/j.ufug.2016.04.010',NULL,'2024-08-28 15:40:51',NULL),
(124,15,23,'Rakhshandehroo, M., Yusof, M. J. M., Arabi, R., Parva, M., & Nochian, A.','The environmental benefits of urban open green spaces','Alam Cipta','10',NULL,'10–16',NULL,NULL,NULL,'2017',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(125,15,24,'Robinson, P. J.','On the Definition of a Heat Wave','J Appl Meteorol Climatol','40',NULL,'762–775',NULL,NULL,NULL,'2001',NULL,'https://doi.org/10.1175/1520-0450(2001)040<0762:OTDOAH>2.0.CO;2',NULL,'2024-08-28 15:40:51',NULL),
(126,15,25,'Matzarakis, A. & Endler, C.','Climate change and thermal bioclimate in cities: impacts and options for adaptation in Freiburg, Germany','Int J Biometeorol','54',NULL,'479–483',NULL,NULL,NULL,'2010',NULL,'https://doi.org/10.1007/s00484-009-0296-2',NULL,'2024-08-28 15:40:51',NULL),
(127,15,26,'Andersson, E., Langemeyer, J., Borgström, S., McPhearson, T., Haase, D., Kronenberg, J., et al.','Enabling Green and Blue Infrastructure to Improve Contributions to Human Well-Being and Equity in Urban Systems','BioScience','69','7','566–574',NULL,NULL,NULL,'2019',NULL,'https://doi.org/10.1093/biosci/biz058',NULL,'2024-08-28 15:40:51',NULL),
(128,15,27,'Salih, S. A. & Ismail, S.','Criteria for Public Open Space Enhancement to Achieve Social Interaction: a Review Paper','IOP Conf Ser Mater Sci Eng','291 012001',NULL,NULL,NULL,NULL,NULL,'2017',NULL,'https://doi.org/10.1088/1757-899X/291/1/012001',NULL,'2024-08-28 15:40:51',NULL),
(129,15,28,'Winklmayr, C. & an der Heiden, M.','Hitzebedingte Mortalität in Deutschland 2022','Epid Bull','42',NULL,'3–9',NULL,NULL,NULL,'2022',NULL,'https://doi.org/10.25646/10695.3',NULL,'2024-08-28 15:40:51',NULL),
(130,15,29,'Inoue, S., Yorifuji, T., Takao, S., Doi, H., & Kawachi, I.','Social Cohesion and Mortality: A Survival Analysis of Older Adults in Japan','Am J Public Health','103','12','e60–e66',NULL,NULL,NULL,'2013',NULL,'https://doi.org/10.2105/AJPH.2013.301311',NULL,'2024-08-28 15:40:51',NULL),
(131,15,30,'Sugisawa, H., Liang, J., & Liu, X.','Social Networks, Social Support, and Mortality Among Older People in Japan','J Gerontol','49','1','3–13',NULL,NULL,NULL,'1994',NULL,'https://doi.org/10.1093/geronj/49.1.S3',NULL,'2024-08-28 15:40:51',NULL),
(132,15,31,'Blazer, D. G.','Social Support and Mortality in an Elderly Community Population','Am J Epidemiol','115','5','684–694',NULL,NULL,NULL,'1982',NULL,'https://doi.org/10.1093/oxfordjournals.aje.a113351',NULL,'2024-08-28 15:40:51',NULL),
(133,15,32,'Berkman, L. F.','Social Support, Social Networks, Social Cohesion and Health','Soc Work Health Care','31','2','3–14',NULL,NULL,'Routledge','2000',NULL,'https://doi.org/10.1300/J010v31n02_02',NULL,'2024-08-28 15:40:51',NULL),
(134,15,33,'Gerber, M. & Schilling, R.','Stress als Risikofaktor für körperliche und psychische Gesundheitsbeeinträchtigungen',NULL,NULL,NULL,'93–122','Fuchs, R. & Gerber, M.','Handbuch Stressregulation und Sport','Springer Berlin, Heidelberg','2018',NULL,'https://doi.org/10.1007/978-3-662-49322-9_5',NULL,'2024-08-28 15:40:51',NULL),
(135,15,34,'Phyo, A. Z. Z., Freak-Poli, R., Craig, H., et al.','Quality of life and mortality in the general population: a systematic review and meta-analysis','BMC Public Health','20',NULL,'1596',NULL,NULL,NULL,'2020',NULL,'https://doi.org/10.1186/s12889-020-09639-9',NULL,'2024-08-28 15:40:51',NULL),
(136,15,35,'Claßen, T.','Lärm macht krank. Gesundheitliche Wirkungen von Lärmbelastungen in Städten','Informationen zur Raumentwicklung','3',NULL,'223–234',NULL,NULL,NULL,'2013','https://www.bbsr.bund.de/BBSR/DE/veroeffentlichungen/izr/2013/3/Inhalt/DL_Classen.pdf?__blob=publicationFile&v=6',NULL,'Nov 12, 2023','2024-08-28 15:40:51',NULL),
(137,15,36,'Winklmayr, C., Matthies-Wiesler, F., Muthers, S., Buchien, S., Kuch, B., an Der Heiden, M., et al.','Hitze in Deutschland: Gesundheitliche Risiken und Maßnahmen zur Prävention','J Health Monit','8','S4','3–34',NULL,NULL,NULL,'2023',NULL,'https://doi.org/10.25646/11645',NULL,'2024-08-28 15:40:51',NULL),
(138,15,37,'Mikkelsen, S. S., Mortensen, E. L., & Flensborg-Madsen, T.','A prospective cohort study of quality of life and ischemic heart disease','Scand J Public Health','42','1','60–66',NULL,NULL,NULL,'2014',NULL,'https://doi.org/10.1177/1403494813504504',NULL,'2024-08-28 15:40:51',NULL),
(139,15,38,'Fischer, M., Dröge, J., Braun, M. et al.','Die Feinstaubbelastung Radfahrender im innerstädtischen Straßenverkehr','Zbl Arbeitsmed','73',NULL,'136–146',NULL,NULL,NULL,'2023',NULL,'https://doi.org/10.1007/s40664-023-00494-0',NULL,'2024-08-28 15:40:51',NULL),
(140,15,39,'Kurt, O. K., Zhang, J., & Pinkerton, K. E.','Pulmonary health effects of air pollution','Curr Opin Pulm Med','22','2','138–143',NULL,NULL,NULL,'2016',NULL,'https://doi.org/10.1097/MCP.0000000000000248',NULL,'2024-08-28 15:40:51',NULL),
(141,15,40,'Degreif, S., Minnich, L., Fischer, H., Ruther-Mehlis, A., Wursthorn, H., & Diegmann, V.','Luftqualität in der Stadt – gemeinsam weiterdenken',NULL,NULL,NULL,NULL,NULL,NULL,'Umweltbundesamt','2022',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(142,15,41,NULL,'Air quality in Europe - 2020 report',NULL,NULL,NULL,NULL,NULL,NULL,'European Environment Agency','2022',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(143,15,42,'Nieuwenhuijsen, M. J. & Khreis, H.','Car free cities: Pathway to healthy urban living','Environ Int','94',NULL,'251–262',NULL,NULL,NULL,'2016',NULL,'https://doi.org/10.1016/j.envint.2016.05.032',NULL,'2024-08-28 15:40:51',NULL),
(144,15,43,'Flensborg-Madsen, T., Johansen, C., Grønbæk, M., & Mortensen, E. L.','A prospective association between quality of life and risk for cancer','Eur J Cancer','47','16','2446–52',NULL,NULL,NULL,'2011',NULL,'https://doi.org/10.1016/j.ejca.2011.06.005',NULL,'2024-08-28 15:40:51',NULL),
(145,15,44,'van Bergen, A. P. L., Wolf, J. R. L. M., Badou, M., de Wilde-Schutten, K., IJzelenberg, W., Schreurs, H., et al.','The association between social exclusion or inclusion and health in EU and OECD countries: a systematic review','Eur J Public Health','29','3','575–582',NULL,NULL,NULL,'2019',NULL,'https://doi.org/10.1093/eurpub/cky143',NULL,'2024-08-28 15:40:51',NULL),
(146,15,45,NULL,'Burden of disease from environmental noise. Quantification of healthy life years lost in Europe',NULL,NULL,NULL,NULL,'World Health Organization. Regional Office for Europe',NULL,NULL,'2011',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(147,15,46,'Kaspar-Ott, I., Hertig, E., Traidl-Hoffmann, C., & Fairweather, V.','Wie sich der Klimawandel auf unsere Gesundheit auswirkt','Pneumo News','12','4','38–41',NULL,NULL,NULL,'2020',NULL,'https://doi.org/10.1007/s15033-020-1836-z',NULL,'2024-08-28 15:40:51',NULL),
(148,15,47,'Bucksch, J., Claßen, T., Geuter, G., & Budde, S.','Bewegungs- und gesundheitsförderliche Kommune. Evidenzen und Handlungskonzept für die Kommunalentwicklung – ein Leitfaden',NULL,NULL,NULL,NULL,NULL,NULL,'Bielefeld: Landeszentrum Gesundheit Nordrhein-Westfalen','2012',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(149,15,48,NULL,'World Report on Road Traffic Injury Prevention',NULL,NULL,NULL,NULL,'Peden, M.',NULL,NULL,'2004',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(150,16,1,'Smith, M., Hosking, J., Woodward, A., et al.','Systematic literature review of built environment effects on physical activity and active transport – an update and new findings on health equity','Int J Behav Nutr Phys Act','14',NULL,'158',NULL,NULL,NULL,'2017',NULL,'https://doi.org/10.1186/s12966-017-0613-9',NULL,'2024-08-28 15:40:51',NULL),
(151,16,2,'OECD, WHO','Step Up! Tackling the Burden of Insufficient Physical Activity in Europe',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023','https://www.oecd-ilibrary.org/social-issues-migration-health/step-up-tackling-the-burden-of-insufficient-physical-activity-in-europe_500a9601-en',NULL,NULL,'2024-08-28 15:40:51',NULL),
(152,16,3,'Inoue, S., Murase, N., Shimomitsu, T., Ohya, Y., Odagiri, Y., Takamiya, T., et al.','Association of physical activity and neighborhood environment among Japanese adults','Prev Med','48','4','321–325',NULL,NULL,NULL,'2009',NULL,'https://doi.org/10.1016/j.ypmed.2009.01.014',NULL,'2024-08-28 15:40:51',NULL),
(153,16,4,'Saelens, B. E., Vernez Moudon, A., Kang, B., Hurvitz, P. M., & Zhou, C.','Relation Between Higher Physical Activity and Public Transit Use','Am J Public Health','104','5','854–859',NULL,NULL,NULL,'2014',NULL,'https://doi.org/10.2105/AJPH.2013.301696',NULL,'2024-08-28 15:40:51',NULL),
(154,16,5,'Freeland, A. L., Banerjee, S. N., Dannenberg, A. L., & Wendel, A. M.','Walking Associated With Public Transit: Moving Toward Increased Physical Activity in the United States','Am J Public Health','103','3','536–542',NULL,NULL,NULL,'2013',NULL,'https://doi.org/10.2105/AJPH.2012.300912',NULL,'2024-08-28 15:40:51',NULL),
(155,16,6,'Baumeister, H., Köckler, H., Rüdiger, A., Claßen, T., Hamilton, J., Rüweler, M., et al.','Leitfaden Gesunde Stadt: Hinweise für Stellungnahmen zur Stadtentwicklung aus dem Öffentlichen Gesundheitsdienst','Bielefeld: Landeszentrum Gesundheit Nordrhein-Westfalen',NULL,NULL,NULL,NULL,NULL,NULL,'2019','https://www.lzg.nrw.de/_php/login/dl.php?u=/_media/pdf/service/Pub/2019_df/lzg-nrw_leitfaden_gesunde_stadt_2019.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(156,16,7,NULL,'Walkability: das Handbuch zur Bewegungsförderung in der Kommune',NULL,NULL,NULL,NULL,'Bucksch, J. & Schneider, S.',NULL,'1. Auflage. Bern: Verlag Hans Huber','2014','https://www.bisp-surf.de/Record/PU201602000791',NULL,NULL,'2024-08-28 15:40:51',NULL),
(157,16,8,'Reis, R. S., Hino, A. A. F., Rech, C. R., Kerr J, & Hallal P. C.','Walkability and Physical Activity','Am J Prev Med','45','3','269–275',NULL,NULL,NULL,'2013',NULL,'https://doi.org/10.1016/j.amepre.2013.04.020',NULL,'2024-08-28 15:40:51',NULL),
(158,16,9,'Hajna, S., Ross, N. A., Brazeau, A-S., et al.','Associations between neighbourhood walkability and daily steps in adults: a systematic review and meta-analysis','BMC Public Health','15',NULL,'768',NULL,NULL,NULL,'2015',NULL,'https://doi.org/10.1186/s12889-015-2082-x',NULL,'2024-08-28 15:40:51',NULL),
(159,16,10,'Heath, G. W., Parra, D. C., Sarmiento, O. L., Andersen, L. B., Owen, N., Goenka, S., et al.','Evidence-based intervention in physical activity: lessons from around the world','Lancet','380','9838','272–281',NULL,NULL,NULL,'2012',NULL,'https://doi.org/10.1016/S0140-6736(12)60816-2',NULL,'2024-08-28 15:40:51',NULL),
(160,16,11,'McCormack, G. R., Rock, M., Toohey, A. M., & Hignell, D.','Characteristics of urban parks associated with park use and physical activity: A review of qualitative research','Health & Place','16','4','712–726',NULL,NULL,NULL,'2010',NULL,'https://doi.org/10.1016/j.healthplace.2010.03.003',NULL,'2024-08-28 15:40:51',NULL),
(161,16,12,'Koohsari, M. J., Mavoa, S., Villanueva, K., Sugiyama, T., Badland, H., Kaczynski, A. T., et al.','Public open space, physical activity, urban design and public health: Concepts, methods and research agenda','Health & Place','33',NULL,'75–82',NULL,NULL,NULL,'2015',NULL,'https://doi.org/10.1016/j.healthplace.2015.02.009',NULL,'2024-08-28 15:40:51',NULL),
(162,16,13,'Pfeifer, K. & Rütten, A.','Nationale Empfehlungen für Bewegung und Bewegungsförderung','Gesundheitswesen','79',NULL,'2–3',NULL,NULL,NULL,'2017',NULL,'https://doi.org/10.1055/s-0042-123346',NULL,'2024-08-28 15:40:51',NULL),
(163,16,14,'Bull, F. C., Al-Ansari, S. S., Biddle, S., et al.','World Health Organization 2020 guidelines on physical activity and sedentary behaviour','British Journal of Sports Medicine','54',NULL,'1451–1462',NULL,NULL,NULL,'2020',NULL,'https://doi.org/10.1136/bjsports-2020-102955',NULL,'2024-08-28 15:40:51',NULL),
(164,16,15,'Wackerhage, H., Sitzberger, C., Kreuzpointner, F., & Oberhoffer-Fritz, R.','WHO-Leitlinien zu körperlicher Aktivität und sitzendem Verhalten.','Bayerisches Ärzteblatt','3/2021',NULL,'91–93',NULL,NULL,NULL,'2021','https://www.bayerisches-aerzteblatt.de/fileadmin/aerzteblatt/ausgaben/2021/03/einzelpdf/BAB_3_2021_91_93.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(165,16,16,'Le-Masurier, G. C., Sidman, C. L., Corbin, C. B.','Accumulating 10,000 Steps: Does this Meet Current Physical Activity Guidelines?','Res Q Exerc Sport','74',NULL,'389–394',NULL,NULL,NULL,'2003',NULL,'https://doi.org/10.1080/02701367.2003.10609109',NULL,'2024-08-28 15:40:51',NULL),
(166,16,17,'Finger, J. D., Mensink, G., Lange, C., Manz, K.','Gesundheitsfördernde körperliche Aktivität in der Freizeit bei Erwachsenen in Deutschland','J Health Monit','2','2',NULL,NULL,NULL,'Robert Koch-Institut, Berlin','2017',NULL,'https://doi.org/10.17886/RKI-GBE-2017-027',NULL,'2024-08-28 15:40:51',NULL),
(167,16,18,'Mensink, G.','Bundes-Gesundheitssurvey: Körperliche Aktivität. Aktive Freizeitgestaltung in Deutschland',NULL,NULL,NULL,NULL,NULL,NULL,'Robert Koch-Institut, Berlin','2003','https://edoc.rki.de/bitstream/handle/176904/3204/206ee9py9oog_18.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(168,16,19,'Vögele, C.','Herz-Kreislauf-Erkrankungen',NULL,NULL,NULL,'139–152','Ehlert, U.','Verhaltensmedizin. Springer-Lehrbuch','Springer, Berlin, Heidelberg','2016',NULL,'https://doi.org/10.1007/978-3-662-48035-9_7',NULL,'2024-08-28 15:40:51',NULL),
(169,16,20,'Gößwald, A., Schienkiewitz, A., Nowossadeck, E., et al.','Prävalenz von Herzinfarkt und koronarer Herzkrankheit bei Erwachsenen im Alter von 40 bis 79 Jahren in Deutschland','Bundesgesundheitsbl','56',NULL,'650–655',NULL,NULL,NULL,'2013',NULL,'https://doi.org/10.1007/s00103-013-1666-9',NULL,'2024-08-28 15:40:51',NULL),
(170,16,21,'Bertz, J., et al.','Verbreitung von Krebserkrankungen in Deutschland. Entwicklung der Prävalenzen zwischen 1990 und 2010','Beiträge zur Gesundheitsberichterstattung des Bundes',NULL,NULL,NULL,NULL,NULL,'Robert Koch-Institut, Berlin','2010','https://edoc.rki.de/bitstream/handle/176904/3226/23GSS31yB0GKUhU.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(171,16,22,'Delbrück, H.','Körperliche Aktivität und Tumorkrankheiten','Internist','53',NULL,'688–697',NULL,NULL,NULL,'2012',NULL,'https://doi.org/10.1007/s00108-011-2934-0',NULL,'2024-08-28 15:40:51',NULL),
(172,16,23,'Schmidt, C., Reitzle, L., Dreß, J., et al.','Prävalenz und Inzidenz des dokumentierten Diabetes mellitus – Referenzauswertung für die Diabetes-Surveillance auf Basis von Daten aller gesetzlich Krankenversicherten','Bundesgesundheitsbl','63',NULL,'93–102',NULL,NULL,NULL,'2020',NULL,'https://doi.org/10.1007/s00103-019-03068-9',NULL,'2024-08-28 15:40:51',NULL),
(173,16,24,'Zhao, F., Wu, W., Feng, X., et al.','Physical Activity Levels and Diabetes Prevalence in US Adults: Findings from NHANES 2015–2016','Diabetes Ther','11',NULL,'1303–16',NULL,NULL,NULL,'2020',NULL,'https://doi.org/10.1007/s13300-020-00817-x',NULL,'2024-08-28 15:40:51',NULL),
(174,16,25,'Colberg, S. R., Sigal, R. J., Yardley, J. E., Riddell, M. C., Dunstan, D. W., Dempsey, P. C., et al.','Physical Activity/Exercise and Diabetes: A Position Statement of the American Diabetes Association','Diabetes Care','39','11','2065–79',NULL,NULL,NULL,'2016',NULL,'https://doi.org/10.2337/dc16-1728',NULL,'2024-08-28 15:40:51',NULL),
(175,16,26,'Thom, J., Kuhnert, R., Born, S., & Hapke, U.','12-Monats-Prävalenz der selbstberichteten ärztlich diagnostizierten Depression in Deutschland','J Health Monit','2','3','72–80',NULL,NULL,NULL,'2017',NULL,'https://doi.org/10.17886/RKI-GBE-2017-057',NULL,'2024-08-28 15:40:51',NULL),
(176,16,27,'Krien, D.','Therapeutische Effekte körperlicher Aktivität bei depressiven Patienten','Universität Ulm (Dissertation)',NULL,NULL,NULL,NULL,NULL,NULL,'2016',NULL,'https://doi.org/10.18725/OPARU-3799',NULL,'2024-08-28 15:40:51',NULL),
(177,16,28,'Huber, G.','Adipositas entsteht durch Bewegungsmangel – Epidemiologie und Entstehung','B&G Bewegungstherapie und Gesundheitssport','26','2','46–51',NULL,NULL,NULL,'2010',NULL,'https://doi.org/10.1055/s-0030-1247308',NULL,'2024-08-28 15:40:51',NULL),
(178,16,29,'Robert Koch-Institut','Gesundheit in Deutschland aktuell – GEDA 2019/2020',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021',NULL,'https://doi.org/10.25646/9362',NULL,'2024-08-28 15:40:51',NULL),
(179,16,30,'Schienkiewitz, A., Brettschneider, A-K., Damerow, S., & Rosario, A. S.','Übergewicht und Adipositas im Kindes- und Jugendalter in Deutschland – Querschnittergebnisse aus KiGGS Welle 2 und Trends','J Health Monit','3','1',NULL,NULL,NULL,'Robert Koch-Institut, Berlin','2018',NULL,'https://doi.org/10.17886/RKI-GBE-2018-005',NULL,'2024-08-28 15:40:51',NULL),
(180,16,31,'Williams, E. P., Mesidor, M., Winters, K., et al.','Overweight and Obesity: Prevalence, Consequences, and Causes of a Growing Public Health Problem','Curr Obes Rep','4',NULL,'363–370',NULL,NULL,NULL,'2015',NULL,'https://doi.org/10.1007/s13679-015-0169-4',NULL,'2024-08-28 15:40:51',NULL),
(181,16,32,'Konnopka, A., Bödemann, M., & König, H. H.','Health burden and costs of obesity and overweight in Germany','Eur J Health Econ','12',NULL,'345–352',NULL,NULL,NULL,'2011',NULL,'https://doi.org/10.1007/s10198-010-0242-6',NULL,'2024-08-28 15:40:51',NULL),
(182,16,33,'Sallis, R., Young, D. R., Tartof, S. Y., et al.','Physical inactivity is associated with a higher risk for severe COVID-19 outcomes: a study in 48 440 adult patients','Br J Sports Med','55',NULL,'1099–1105',NULL,NULL,NULL,'2021',NULL,'https://doi.org/10.1136/bjsports-2021-104080',NULL,'2024-08-28 15:40:51',NULL),
(183,16,34,'Knoll, K-P. & Hauner, H.','Kosten der Adipositas in der Bundesrepublik Deutschland. Eine aktuelle Krankheitskostenstudie','Adipositas – Ursachen, Folgeerkrankungen, Therapie','2','4','204–210',NULL,NULL,NULL,'2008',NULL,'https://doi.org/10.1055/s-0037-1618649',NULL,'2024-08-28 15:40:51',NULL),
(184,16,35,'Müller, D. & Stock, S.','Diabetes und Krankheitskosten','Diabetologe','15',NULL,'504–513',NULL,NULL,NULL,'2019',NULL,'https://doi.org/10.1007/s11428-019-0515-3',NULL,'2024-08-28 15:40:51',NULL),
(185,16,36,'Statistisches Bundesamt','Herz-Kreislauf-Erkrankungen verursachen die höchsten Kosten',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017','https://www.destatis.de/DE/Presse/Pressemitteilungen/2017/09/PD17_347_236.html',NULL,NULL,'2024-08-28 15:40:51',NULL),
(186,16,37,'NSW Department of Urban Affairs and Planning','Integrating Land Use and Transport. Improving Transport Choice — Guidelines for Planning and Development',NULL,NULL,NULL,NULL,NULL,NULL,'Sydney: Department of Urban Affairs and Planning','2001',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(187,16,38,'Bucksch, J., Claßen, T., Geuter, G., & Budde, S.','Bewegungs- und gesundheitsförderliche Kommune. Evidenzen und Handlungskonzept für die Kommunalentwicklung – ein Leitfaden',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2012','https://pub.uni-bielefeld.de/record/2561990',NULL,'Mar 2, 2023','2024-08-28 15:40:51',NULL),
(188,16,39,'Bundesministerium für Wohnen, Stadtentwicklung und Bauwesen','Der Deutschlandatlas. Erreichbarkeit des Öffentlichen Verkehrs (Haltestellen)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'n.d.','https://www.deutschlandatlas.bund.de/DE/Karten/Wie-wir-uns-bewegen/103-Erreichbarkeit-Nahverkehr-Haltestellen.html',NULL,'May 10, 2023','2024-08-28 15:40:51',NULL),
(189,16,40,'ABES Public Design','Urbane Quartiersplätze',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'n.d.','https://abes-online.com/publikationen/ratgeber/urbane-quartiersplaetze',NULL,NULL,'2024-08-28 15:40:51',NULL),
(190,17,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A Guide to indoor air quality in the home for buyers, builders and renovators','Department of Health and Ageing. Canberra','2002','https://catalogue.nla.gov.au/catalog/866003',NULL,NULL,'2024-08-28 15:40:51',NULL),
(191,17,2,'Baumeister, H., Köckler, H., Rüdiger, A., Claßen, T., Hamilton, J., Rüweler, M., et al.','Leitfaden Gesunde Stadt: Hinweise für Stellungnahmen zur Stadtentwicklung aus dem Öffentlichen Gesundheitsdienst','Bielefeld: Landeszentrum Gesundheit Nordrhein-Westfalen',NULL,NULL,NULL,NULL,NULL,NULL,'2019','https://www.lzg.nrw.de/_php/login/dl.php?u=/_media/pdf/service/Pub/2019_df/lzg-nrw_leitfaden_gesunde_stadt_2019.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(192,17,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'WHO Housing and health guidelines','Geneva: World Health Organization','2018','https://www.who.int/publications/i/item/9789241550376',NULL,'Nov 17, 2023','2024-08-28 15:40:51',NULL),
(193,17,4,'Hulse, K. & Saugeres, L.',NULL,NULL,NULL,NULL,NULL,NULL,'Housing insecurity and precarious living: an Australian exploration. AHURI Final Report No. 124','Australian Housing and Urban Research Institute','2008','https://www.ahuri.edu.au/sites/default/files/migration/documents/AHURI_Final_Report_No124-Housing-insecurity-and-precarious-living.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(194,17,5,'Hoffmann, R., Niebert, K., Ludewig, D., Müller, M., Schroeder, C., Ribbe, L., et al.','Drei Fragen zum Thema Umweltbelastung und Gesundheit','Movum Debatten zur Transformation','2',NULL,NULL,NULL,NULL,NULL,'2018',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(195,17,6,'Bridge, C., Flatau, P., Whelan, S., Wood, G., & Yates, J.',NULL,NULL,NULL,NULL,NULL,NULL,'Housing assistance and non-shelter outcomes. AHURI Final Report No. 40','Australian Housing and Urban Research Institute','2003','https://www.ahuri.edu.au/sites/default/files/migration/documents/AHURI_Final_Report_No40_Housing_assistance_and_non_shelter_outcomes.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(196,17,7,NULL,'Neue Studie mit Daten für alle 77 Großstädte. Miete: Fast die Hälfte der Haushalte in deutschen Großstädten tragen eine prekär hohe Belastung – mehr als 1,5 Millionen leistbare und angemessene Wohnungen fehlen',NULL,NULL,NULL,NULL,NULL,NULL,'Hans-Böckler-Stiftung','2021','https://www.boeckler.de/de/pressemitteilungen-2675-33590.htm',NULL,'Nov 17, 2023','2024-08-28 15:40:51',NULL),
(197,17,8,NULL,'Nachhaltig barrierefreien/ -reduzierten Wohnraum schaffen in einer älter werdenden Gesellschaft',NULL,NULL,NULL,NULL,NULL,NULL,'Bundesministerium für Umwelt, Naturschutz, Bau und Reaktorsicherheit (BMUB), Bundesministerium für Arbeit und Soziales (BMAS), Bundesfachstelle Barrierefreiheit','2017','https://www.bundesfachstelle-barrierefreiheit.de/SharedDocs/Downloads/DE/Veroeffentlichungen/broschuere-wohnraum-2017.pdf?__blob=publicationFile&v=22',NULL,'Nov 17, 2023','2024-08-28 15:40:51',NULL),
(198,17,9,NULL,'Open Space Strategy',NULL,NULL,NULL,NULL,NULL,NULL,'North Lanarkshire Council','2004','https://www.northlanarkshire.gov.uk/sites/default/files/2020-06/Open%20Space%20Strategy.pdf',NULL,'Dec 8, 2023','2024-08-28 15:40:51',NULL),
(199,17,10,NULL,'Wohnungs- und Immobilienmärkte in Deutschland 2011',NULL,NULL,NULL,NULL,NULL,NULL,'Bundesinstitut für Bau-, Stadt- und Raumforschung (BBSR)','2011','https://www.bbsr.bund.de/BBSR/DE/veroeffentlichungen/analysen-kompakt/2012/DL_1_2012.pdf?__blob=publicationFile&v=1',NULL,'Dec 8, 2023','2024-08-28 15:40:51',NULL),
(200,17,11,NULL,'Wohngeld- und Mietenbericht. Unterrichtung durch die Bundesregierung',NULL,NULL,NULL,NULL,NULL,NULL,'Deutscher Bundestag','2011','https://dserver.bundestag.de/btd/17/062/1706280.pdf',NULL,'Dec 8, 2023','2024-08-28 15:40:51',NULL),
(201,17,12,NULL,'Optimierung der Gebietskulissen für die regionale Differenzierung der Wohnraumförderung in Nordrhein-Westfalen. Endbericht für das Ministerium für Wirtschaft, Energie, Bauen, Wohnen und Verkehr des Landes Nordrhein-Westfalen',NULL,NULL,NULL,NULL,NULL,NULL,'F + B Forschung und Beratung für Wohnen, Immobilien und Umwelt GmbH','2014',NULL,NULL,'Dec 8, 2023','2024-08-28 15:40:51',NULL),
(202,17,13,'Deutscher Verband für Wohnungswesen, Städtebau und Raumordnung e.V.','Zur Ökonomisierung der Immobilienwirtschaft – Entwicklungen und Perspektiven',NULL,NULL,NULL,NULL,'Eekhoff, J.',NULL,NULL,'2007','https://nbn-resolving.org/urn:nbn:de:kobv:109-opus-64682',NULL,'Feb 9, 2024','2024-08-28 15:40:51',NULL),
(203,17,14,'empirica ag','Entwicklung der quantitativen und qualitativen Neubaunachfrage auf den Wohnungsmärkten in NRW bis 2030',NULL,NULL,NULL,NULL,NULL,NULL,'Auftraggeber: Ministerium für Wirtschaft, Energie, Bauen, Wohnen und Verkehr des Landes NRW. Bonn: 2010','2010',NULL,NULL,'Feb 9, 2024','2024-08-28 15:40:51',NULL),
(204,17,15,'Blazer, D. G.','Social Support and Mortality in an Elderly Community Population','Am J Epidemiol','115','5','684–694',NULL,NULL,NULL,'1982',NULL,'https://doi.org/10.1093/oxfordjournals.aje.a113351',NULL,'2024-08-28 15:40:51',NULL),
(205,17,16,'Inoue, S., Yorifuji, T., Takao, S., Doi, H., & Kawachi, I.','Social Cohesion and Mortality: A Survival Analysis of Older Adults in Japan','Am J Public Health','103','12','e60–e66',NULL,NULL,NULL,'2013',NULL,'https://doi.org/10.2105/AJPH.2013.301311',NULL,'2024-08-28 15:40:51',NULL),
(206,17,17,'Berkman, L. F.','Social Support, Social Networks, Social Cohesion and Health','Soc Work Health Care','31','2','3–14',NULL,NULL,NULL,'2000',NULL,'https://doi.org/10.1300/J010v31n02_02',NULL,'2024-08-28 15:40:51',NULL),
(207,17,18,'Gerber, M. & Schilling, R.','Stress als Risikofaktor für körperliche und psychische Gesundheitsbeeinträchtigungen',NULL,NULL,NULL,'93–122','Fuchs, R. & Gerber, M.','Handbuch Stressregulation und Sport','Springer Berlin, Heidelberg','2018',NULL,'https://doi.org/10.1007/978-3-662-49322-9_5',NULL,'2024-08-28 15:40:51',NULL),
(208,17,19,'Phyo, A. Z. Z., Freak-Poli, R., Craig, H., et al.','Quality of life and mortality in the general population: a systematic review and meta-analysis','BMC Public Health','20',NULL,'1596',NULL,NULL,NULL,'2020',NULL,'https://doi.org/10.1186/s12889-020-09639-9',NULL,'2024-08-28 15:40:51',NULL),
(209,17,20,'Mikkelsen, S. S., Mortensen, E. L., & Flensborg-Madsen, T.','A prospective cohort study of quality of life and ischemic heart disease','Scand J Public Health','42','1','60–66',NULL,NULL,NULL,'2014',NULL,'https://doi.org/10.1177/1403494813504504',NULL,'2024-08-28 15:40:51',NULL),
(210,17,21,'Claßen, T.','Lärm macht krank! – Gesundheitliche Wirkungen von Lärmbelastungen in Städten','Informationen zur Raumentwicklung','2013','3','223–234',NULL,NULL,NULL,'2013','https://www.researchgate.net/publication/259582182_Larm_macht_krank_-_Gesundheitliche_Wirkungen_von_Larmbelastungen_in_Stadten',NULL,NULL,'2024-08-28 15:40:51',NULL),
(211,17,22,'Winklmayr, C., et al.','Hitze in Deutschland: Gesundheitliche Risiken und Maßnahmen zur Prävention','J Health Monit','8',NULL,NULL,NULL,NULL,NULL,'2023',NULL,'https://doi.org/10.25646/11645',NULL,'2024-08-28 15:40:51',NULL),
(212,17,23,'Fischer, M., Dröge, J., Braun, M. et al.','Die Feinstaubbelastung Radfahrender im innerstädtischen Straßenverkehr','Zbl Arbeitsmed','73',NULL,'136–146',NULL,NULL,NULL,'2023',NULL,'https://doi.org/10.1007/s40664-023-00494-0',NULL,'2024-08-28 15:40:51',NULL),
(213,17,24,'Kurt O. K., Zhang, J., & Pinkerton, K. E.','Pulmonary health effects of air pollution','Curr Opin Pulm Med','22','2','138–143',NULL,NULL,NULL,'2016',NULL,'https://doi.org/10.1097/MCP.0000000000000248',NULL,'2024-08-28 15:40:51',NULL),
(214,17,25,'Umweltbundesamt','Luftqualität in der Stadt – gemeinsam weiterdenken',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022','https://www.umweltbundesamt.de/publikationen/luftqualitaet-in-der-stadt-gemeinsam-weiterdenken',NULL,'Sep 19, 2023','2024-08-28 15:40:51',NULL),
(215,17,26,'European Environment Agency','Air quality in Europe – 2020 report',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020','https://www.eea.europa.eu/publications/air-quality-in-europe-2020-report/',NULL,'May 30, 2023','2024-08-28 15:40:51',NULL),
(216,17,27,'Degreif, S., Minnich, L., Fischer, H., Ruther-Mehlis, A., Wursthorn, H., & Diegmann, V.','Luftqualität in der Stadt – gemeinsam weiterdenken',NULL,NULL,NULL,NULL,NULL,NULL,'Umweltbundesamt','2022',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(217,17,28,'Flensborg-Madsen, T., Johansen, C., Grønbæk, M., & Mortensen, E. L.','A prospective association between quality of life and risk for cancer','Eur J Cancer','47','16','2446–52',NULL,NULL,NULL,'2011',NULL,'https://doi.org/10.1016/j.ejca.2011.06.005',NULL,'2024-08-28 15:40:51',NULL),
(218,17,29,'van Bergen, A. P. L., Wolf, J. R. L. M., Badou, M., de Wilde-Schutten, K., IJzelenberg, W., Schreurs, H., et al.','The association between social exclusion or inclusion and health in EU and OECD countries: a systematic review','Eur J Public Health','29','3','575–582',NULL,NULL,NULL,'2019',NULL,'https://doi.org/10.1093/eurpub/cky143',NULL,'2024-08-28 15:40:51',NULL),
(219,17,30,'Klineberg, E., Clark, C., Bhui, K.S., et al.','Social support, ethnicity and mental health in adolescents','Soc Psychiat Epidemiol','41',NULL,'755–760',NULL,NULL,NULL,'2006',NULL,'https://doi.org/10.1007/s00127-006-0093-8',NULL,'2024-08-28 15:40:51',NULL),
(220,17,31,'Mair, C., Diez Roux, A. V., & Morenoff, J. D.','Neighborhood stressors and social support as predictors of depressive symptoms in the Chicago Community Adult Health Study','Health & Place','16','5','811–819',NULL,NULL,NULL,'2010',NULL,'https://doi.org/10.1016/j.healthplace.2010.04.006',NULL,'2024-08-28 15:40:51',NULL),
(221,17,32,'Fowler, K., Wareham-Fowler, S., & Barnes, C.','Social context and depression severity and duration in Canadian men and women: exploring the influence of social support and sense of community belongingness','J Appl Soc Psychol','43','S1','E85–E96',NULL,NULL,NULL,'2013',NULL,'https://doi.org/10.1111/jasp.12050',NULL,'2024-08-28 15:40:51',NULL),
(222,17,33,'Deutsches Institut für Urbanistik','Radfahrer und Fußgänger auf gemeinsamen Flächen',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011','https://backend.orlis.difu.de/server/api/core/bitstreams/b6654ab9-3287-4021-bb74-7ca7bd68edb7/content',NULL,NULL,'2024-08-28 15:40:51',NULL),
(223,17,34,'Bucksch, J., Claßen, T., Geuter, G., & Budde, S.','Bewegungs- und gesundheitsförderliche Kommune. Evidenzen und Handlungskonzept für die Kommunalentwicklung – ein Leitfaden',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2012','https://pub.uni-bielefeld.de/record/2561990',NULL,'Mar 2, 2023','2024-08-28 15:40:51',NULL),
(224,17,35,'Peden, M.','World Report on Road Traffic Injury Prevention',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2004','https://www.who.int/publications/i/item/world-report-on-road-traffic-injury-prevention',NULL,'Sep 19, 2023','2024-08-28 15:40:51',NULL),
(225,17,36,'Kuechly, H., Meier, J., Kyba, C., & Hänel, A.','Ausmaß der Lichtverschmutzung und Optionen zur Minderung der negativen Auswirkungen','LUP – Luftbild Umwelt Planung GmbH, Deutsches GeoForschungsZentrum GFZ',NULL,NULL,NULL,NULL,NULL,NULL,'2018',NULL,'https://doi.org/10.48440/GFZ.1.4.2020.002',NULL,'2024-08-28 15:40:51',NULL),
(226,17,37,'Kantermann, T.','Humanmedizinisch relevante Wirkungen von Lichtverschmutzung','SynOpus',NULL,NULL,NULL,NULL,NULL,NULL,'2018',NULL,'https://doi.org/10.48440/GFZ.1.4.2020.004',NULL,'2024-08-28 15:40:51',NULL),
(227,17,38,NULL,'„Bezahlbares Wohnen“ – was bedeutet das?',NULL,NULL,NULL,NULL,NULL,NULL,'Friedrich-Ebert-Stiftung','2019','https://www.fes.de/kommunalakademie/artikelseite-kommunalakademie/bezahlbareswohnen','https://doi.org/10.48440/GFZ.1.4.2020.004',NULL,'2024-08-28 15:40:51',NULL),
(228,17,39,'NSW Department of Urban Affairs and Planning','Integrating Land Use and Transport. Improving Transport Choice — Guidelines for Planning and Development',NULL,NULL,NULL,NULL,NULL,NULL,'Sydney: Department of Urban Affairs and Planning','2001',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(229,17,40,NULL,'Verkehrsbild Deutschland: Angebotsqualitäten und Erreichbarkeiten im öffentlichen Verkehr',NULL,NULL,NULL,NULL,'Bundesinstitut für Bau-, Stadt- und Raumforschung',NULL,'Bonn: Bundesamt für Bauwesen und Raumordnung','2018',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(230,17,41,NULL,'Walkability: das Handbuch zur Bewegungsförderung in der Kommune',NULL,NULL,NULL,NULL,'Bucksch, J. & Schneider, S.',NULL,'1. Auflage. Bern: Verlag Hans Huber','2014','https://www.bisp-surf.de/Record/PU201602000791',NULL,NULL,'2024-08-28 15:40:51',NULL),
(231,17,42,'Bundesministerium für Wohnen, Stadtentwicklung und Bauwesen','Der Deutschlandatlas - Karten - Erreichbarkeit des Öffentlichen Verkehrs (Haltestellen)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'https://www.deutschlandatlas.bund.de/DE/Karten/Wie-wir-uns-bewegen/103-Erreichbarkeit-Nahverkehr-Haltestellen.html',NULL,'May 10, 2023','2024-08-28 15:40:51',NULL),
(232,18,1,'Baumeister, H., Köckler, H., Rüdiger, A., Claßen, T., Hamilton, J., Rüweler, M., et al.','Leitfaden Gesunde Stadt: Hinweise für Stellungnahmen zur Stadtentwicklung aus dem Öffentlichen Gesundheitsdienst','Bielefeld: Landeszentrum Gesundheit Nordrhein-Westfalen',NULL,NULL,NULL,NULL,NULL,NULL,'2019','https://www.lzg.nrw.de/_php/login/dl.php?u=/_media/pdf/service/Pub/2019_df/lzg-nrw_leitfaden_gesunde_stadt_2019.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(233,18,2,'Heyn, T., Heckenroth, M., Schmandt, M., Hänsel, K., & Röder-Löhr, J.','Einsamkeit in der Sozialen Stadt – kann Digitalisierung eine Brücke schlagen? Kurzexpertise der Bundestransferstelle Sozialer Zusammenhalt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021','https://www.staedtebaufoerderung.info/SharedDocs/downloads/DE/Programme/SozialerZusammenhalt/2021_03_11_Einsamkeit_in_der_Sozialen_Stadt_Download.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(234,18,3,'Fugmann, F.','Lebendige Plätze im Stadtquartier',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017','https://www.treffpunkt-kommune.de/lebendige-plaetze-im-stadtquartier',NULL,NULL,'2024-08-28 15:40:51',NULL),
(235,18,4,'Altgeld, T.','Diversity und Diversity-Management / Vielfalt gestalten',NULL,NULL,NULL,NULL,NULL,'Leitbegriffe der Gesundheitsförderung und Prävention. Glossar zu Konzepten, Strategien und Methoden','Bundeszentrale für gesundheitliche Aufklärung (BZgA)','2022',NULL,'https://dx.doi.org/10.17623/BZGA:Q4-i127-2.0',NULL,'2024-08-28 15:40:51',NULL),
(236,18,5,'Borgetto, B.','Soziale Beziehungen und Gesundheit. Betriebliche Gesundheitspolitik. Der Weg zur gesunden Organisation',NULL,NULL,NULL,NULL,NULL,NULL,'Springer Berlin Heidelberg','2010',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(237,18,6,NULL,'In Form. Deutschlands Initiative für gesunde Ernährung und mehr Bewegung',NULL,NULL,NULL,NULL,NULL,NULL,'Bundesministerium für Ernährung, Landwirtschaft und Verbraucherschutz (BMELV), Bundesministerium für Gesundheit (BMG)','2008',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(238,18,7,'Blazer, D. G.','Social Support and Mortality in an Elderly Community Population','Am J Epidemiol','115','5','684–694',NULL,NULL,NULL,'1982',NULL,'https://doi.org/10.1093/oxfordjournals.aje.a113351',NULL,'2024-08-28 15:40:51',NULL),
(239,18,8,'Inoue, S., Yorifuji, T., Takao, S., Doi, H., & Kawachi, I.','Social Cohesion and Mortality: A Survival Analysis of Older Adults in Japan','Am J Public Health','103','12','e60–e66',NULL,NULL,NULL,'2013',NULL,'https://doi.org/10.2105/AJPH.2013.301311',NULL,'2024-08-28 15:40:51',NULL),
(240,18,9,'Sugisawa, H., Liang, J., & Liu, X.','Social Networks, Social Support, and Mortality Among Older People in Japan','J Gerontol','49','1','3–13',NULL,NULL,NULL,'1994',NULL,'https://doi.org/10.1093/geronj/49.1.S3',NULL,'2024-08-28 15:40:51',NULL),
(241,18,10,'Berkman, L. F.','Social Support, Social Networks, Social Cohesion and Health','Soc Work Health Care','31','2','3–14',NULL,NULL,NULL,'2000',NULL,'https://doi.org/10.1300/J010v31n02_02',NULL,'2024-08-28 15:40:51',NULL),
(242,18,11,'Phyo, A. Z. Z., Freak-Poli, R., Craig, H., et al.','Quality of life and mortality in the general population: a systematic review and meta-analysis','BMC Public Health','20',NULL,'1596',NULL,NULL,NULL,'2020',NULL,'https://doi.org/10.1186/s12889-020-09639-9',NULL,'2024-08-28 15:40:51',NULL),
(243,18,12,'Gerber, M. & Schilling, R.','Stress als Risikofaktor für körperliche und psychische Gesundheitsbeeinträchtigungen',NULL,NULL,NULL,'93–122','Fuchs, R. & Gerber, M.','Handbuch Stressregulation und Sport','Springer Berlin, Heidelberg','2018',NULL,'https://doi.org/10.1007/978-3-662-49322-9_5',NULL,'2024-08-28 15:40:51',NULL),
(244,18,13,'Ikeda, A., Iso, H., Kawachi, I., Yamagishi, K., Inoue, M., & Tsugane, S.','Social Support and Stroke and Coronary Heart Disease: The JPHC Study Cohorts II','Stroke','39',NULL,'768–775',NULL,NULL,NULL,'2008',NULL,'https://doi.org/10.1161/STROKEAHA.107.496695',NULL,'2024-08-28 15:40:51',NULL),
(245,18,14,'Kim, E. S., Park, N., & Peterson, C.','Perceived neighborhood social cohesion and stroke','Soc Sci Med','97',NULL,'49–55',NULL,NULL,NULL,'2013',NULL,'https://doi.org/10.1016/j.socscimed.2013.08.001',NULL,'2024-08-28 15:40:51',NULL),
(246,18,15,'Claßen, T.','Lärm macht krank! – Gesundheitliche Wirkungen von Lärmbelastungen in Städten','Informationen zur Raumentwicklung','2013','3','223–234',NULL,NULL,NULL,'2013','https://www.researchgate.net/publication/259582182_Larm_macht_krank_-_Gesundheitliche_Wirkungen_von_Larmbelastungen_in_Stadten',NULL,NULL,'2024-08-28 15:40:51',NULL),
(247,18,16,'Winklmayr, C., et al.','Hitze in Deutschland: Gesundheitliche Risiken und Maßnahmen zur Prävention','J Health Monit','8',NULL,NULL,NULL,NULL,NULL,'2023',NULL,'https://doi.org/10.25646/11645',NULL,'2024-08-28 15:40:51',NULL),
(248,18,17,'Mikkelsen, S. S., Mortensen, E. L., & Flensborg-Madsen, T.','A prospective cohort study of quality of life and ischemic heart disease','Scand J Public Health','42','1','60–66',NULL,NULL,NULL,'2014',NULL,'https://doi.org/10.1177/1403494813504504',NULL,'2024-08-28 15:40:51',NULL),
(249,18,18,'Flensborg-Madsen, T., Johansen, C., Grønbæk, M., & Mortensen, E. L.','A prospective association between quality of life and risk for cancer','Eur J Cancer','47','16','2446–52',NULL,NULL,NULL,'2011',NULL,'https://doi.org/10.1016/j.ejca.2011.06.005',NULL,'2024-08-28 15:40:51',NULL),
(250,18,19,'Klineberg, E., Clark, C., Bhui, K.S., et al.','Social support, ethnicity and mental health in adolescents','Soc Psychiat Epidemiol','41',NULL,'755–760',NULL,NULL,NULL,'2006',NULL,'https://doi.org/10.1007/s00127-006-0093-8',NULL,'2024-08-28 15:40:51',NULL),
(251,18,20,'Mair, C., Diez Roux, A. V., & Morenoff, J. D.','Neighborhood stressors and social support as predictors of depressive symptoms in the Chicago Community Adult Health Study','Health & Place','16','5','811–819',NULL,NULL,NULL,'2010',NULL,'https://doi.org/10.1016/j.healthplace.2010.04.006',NULL,'2024-08-28 15:40:51',NULL),
(252,18,21,'Fowler, K., Wareham-Fowler, S., & Barnes, C.','Social context and depression severity and duration in Canadian men and women: exploring the influence of social support and sense of community belongingness','J Appl Soc Psychol','43','S1','E85–E96',NULL,NULL,NULL,'2013',NULL,'https://doi.org/10.1111/jasp.12050',NULL,'2024-08-28 15:40:51',NULL),
(253,18,22,'Wick, K., Schwarz, M., Schwager, S., Gläser, A., Kirschner, H., Muehleck, J., et al.','Zusammenhang von sozialer Teilhabe, globalem Selbstwert sowie physischer und psychischer Gesundheit in einer repräsentativen deutschen Stichprobe','Psychother Psychosom Med Psychol','73','03/04','121–129',NULL,NULL,NULL,'2023',NULL,'https://doi.org/10.1055/a-1928-4479',NULL,'2024-08-28 15:40:51',NULL),
(254,18,23,'van Bergen, A. P. L., Wolf, J. R. L. M., Badou, M., de Wilde-Schutten, K., IJzelenberg, W., Schreurs, H., et al.','The association between social exclusion or inclusion and health in EU and OECD countries: a systematic review','Eur J Public Health','29','3','575–582',NULL,NULL,NULL,'2019',NULL,'https://doi.org/10.1093/eurpub/cky143',NULL,'2024-08-28 15:40:51',NULL),
(255,19,1,'Baumeister, H., Köckler, H., Rüdiger, A., Claßen, T., Hamilton, J., Rüweler, M., et al.','Leitfaden Gesunde Stadt: Hinweise für Stellungnahmen zur Stadtentwicklung aus dem Öffentlichen Gesundheitsdienst','Bielefeld: Landeszentrum Gesundheit Nordrhein-Westfalen',NULL,NULL,NULL,NULL,NULL,NULL,'2019','https://www.lzg.nrw.de/_php/login/dl.php?u=/_media/pdf/service/Pub/2019_df/lzg-nrw_leitfaden_gesunde_stadt_2019.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(256,19,2,'Butterworth, I.','The Relationship Between the Built Environment and Wellbeing: a Literature Review','Urban Aff Rev','4',NULL,'3–19',NULL,NULL,NULL,'2000','https://www.academia.edu/48881859/The_Relationship_Between_the_Built_Environment_and_Wellbeing_a_Literature_Review',NULL,NULL,'2024-08-28 15:40:51',NULL),
(257,19,3,'Francis, J., Giles-Corti, B., Wood, L., & Knuiman, M.','Creating sense of community: The role of public space','Environ Psychol','32','4','401–409',NULL,NULL,NULL,'2012',NULL,'https://doi.org/10.1016/j.jenvp.2012.07.002',NULL,'2024-08-28 15:40:51',NULL),
(258,19,4,'Zhu, X., Yu, C-Y., Lee, C., Lu, Z., & Mann, G.','A retrospective study on changes in residents’ physical activities, social interactions, and neighborhood cohesion after moving to a walkable community','Prev Med','69',NULL,'93–97',NULL,NULL,NULL,'2014',NULL,'https://doi.org/10.1016/j.ypmed.2014.08.013',NULL,'2024-08-28 15:40:51',NULL),
(259,19,5,'Peters, K., Elands, B., & Buijs, A.','Social interactions in urban parks: Stimulating social cohesion?','Urban Forestry & Urban Greening','9','2','93–100',NULL,NULL,NULL,'2010',NULL,'https://doi.org/10.1016/j.ufug.2009.11.003',NULL,'2024-08-28 15:40:51',NULL),
(260,19,6,'Besser, L. M., Marcus, M., & Frumkin, H.','Commute Time and Social Capital in the U.S.','Am J Prev Med','34','3','207–211',NULL,NULL,NULL,'2008',NULL,'https://doi.org/10.1016/j.amepre.2007.12.004',NULL,'2024-08-28 15:40:51',NULL),
(261,19,7,'Delmelle, E. C., Haslauer, E., & Prinz, T.','Social satisfaction, commuting and neighborhoods','J Transp Geogr','30',NULL,'110–116',NULL,NULL,NULL,'2013',NULL,'https://doi.org/10.1016/j.jtrangeo.2013.03.006',NULL,'2024-08-28 15:40:51',NULL),
(262,19,8,'Manca, A. R.','Social Cohesion',NULL,NULL,NULL,'6026–8','Michalos, A. C.','Encyclopedia of Quality of Life and Well-Being Research','Springer, Dordrecht','2014',NULL,'https://doi.org/10.1007/978-94-007-0753-5_2739',NULL,'2024-08-28 15:40:51',NULL),
(263,19,9,'Vonneilich, N. & Franzkowiak, P.','Soziale Unterstützung',NULL,NULL,NULL,NULL,'Bundeszentrale für gesundheitliche Aufklärung (BZgA)','Leitbegriffe der Gesundheitsförderung und Prävention. Glossar zu Konzepten, Strategien und Methoden',NULL,'2022',NULL,'https://doi.org/10.17623/BZGA:Q4-I110-3.0',NULL,'2024-08-28 15:40:51',NULL),
(264,19,10,'Helgeson, V. S.','Social support and quality of life','Qual Life Res','12','Suppl 1','25–31',NULL,NULL,NULL,'2003',NULL,'https://doi.org/10.1023/A:1023509117524',NULL,'2024-08-28 15:40:51',NULL),
(265,19,11,'Inoue, S., Yorifuji, T., Takao, S., Doi, H., & Kawachi, I.','Social Cohesion and Mortality: A Survival Analysis of Older Adults in Japan','Am J Public Health','103','12','e60–e66',NULL,NULL,NULL,'2013',NULL,'https://doi.org/10.2105/AJPH.2013.301311',NULL,'2024-08-28 15:40:51',NULL),
(266,19,12,'Sugisawa, H., Liang, J., & Liu, X.','Social Networks, Social Support, and Mortality Among Older People in Japan','J Gerontol','49','1','3–13',NULL,NULL,NULL,'1994',NULL,'https://doi.org/10.1093/geronj/49.1.S3',NULL,'2024-08-28 15:40:51',NULL),
(267,19,13,'Blazer, D. G.','Social Support and Mortality in an Elderly Community Population','Am J Epidemiol','115','5','684–694',NULL,NULL,NULL,'1982',NULL,'https://doi.org/10.1093/oxfordjournals.aje.a113351',NULL,'2024-08-28 15:40:51',NULL),
(268,19,14,'Berkman, L. F.','Social Support, Social Networks, Social Cohesion and Health','Soc Work Health Care','31','2','3–14',NULL,NULL,NULL,'2000',NULL,'https://doi.org/10.1300/J010v31n02_02',NULL,'2024-08-28 15:40:51',NULL),
(269,19,15,'Kim, E. S., Park, N., & Peterson, C.','Perceived neighborhood social cohesion and stroke','Soc Sci Med','97',NULL,'49–55',NULL,NULL,NULL,'2013',NULL,'https://doi.org/10.1016/j.socscimed.2013.08.001',NULL,'2024-08-28 15:40:51',NULL),
(270,19,16,'Ikeda, A., Iso, H., Kawachi, I., Yamagishi, K., Inoue, M., & Tsugane, S.','Social Support and Stroke and Coronary Heart Disease: The JPHC Study Cohorts II','Stroke','39',NULL,'768–775',NULL,NULL,NULL,'2008',NULL,'https://doi.org/10.1161/STROKEAHA.107.496695',NULL,'2024-08-28 15:40:51',NULL),
(271,19,17,'Glass, T. A., Matchar, D. B., Belyea, M., & Feussner, J. R.','Impact of social support on outcome in first stroke','Stroke','24',NULL,'64–70',NULL,NULL,NULL,'1993',NULL,'https://doi.org/10.1161/01.STR.24.1.64',NULL,'2024-08-28 15:40:51',NULL),
(272,19,18,'Klineberg, E., Clark, C., Bhui, K.S., et al.','Social support, ethnicity and mental health in adolescents','Soc Psychiat Epidemiol','41',NULL,'755–760',NULL,NULL,NULL,'2006',NULL,'https://doi.org/10.1007/s00127-006-0093-8',NULL,'2024-08-28 15:40:51',NULL),
(273,19,19,'Mair, C., Diez Roux, A. V., & Morenoff, J. D.','Neighborhood stressors and social support as predictors of depressive symptoms in the Chicago Community Adult Health Study','Health & Place','16','5','811–819',NULL,NULL,NULL,'2010',NULL,'https://doi.org/10.1016/j.healthplace.2010.04.006',NULL,'2024-08-28 15:40:51',NULL),
(274,19,20,'Fowler, K., Wareham-Fowler, S., & Barnes, C.','Social context and depression severity and duration in Canadian men and women: exploring the influence of social support and sense of community belongingness','J Appl Soc Psychol','43','S1','E85–E96',NULL,NULL,NULL,'2013',NULL,'https://doi.org/10.1111/jasp.12050',NULL,'2024-08-28 15:40:51',NULL),
(275,19,21,'van Bergen, A. P. L., Wolf, J. R. L. M., Badou, M., de Wilde-Schutten, K., IJzelenberg, W., Schreurs, H., et al.','The association between social exclusion or inclusion and health in EU and OECD countries: a systematic review','Eur J Public Health','29','3','575–582',NULL,NULL,NULL,'2019',NULL,'https://doi.org/10.1093/eurpub/cky143',NULL,'2024-08-28 15:40:51',NULL),
(276,20,1,'Baumeister, H., Köckler, H., Rüdiger, A., Claßen, T., Hamilton, J., Rüweler, M., et al.','Leitfaden Gesunde Stadt: Hinweise für Stellungnahmen zur Stadtentwicklung aus dem Öffentlichen Gesundheitsdienst','Bielefeld: Landeszentrum Gesundheit Nordrhein-Westfalen',NULL,NULL,NULL,NULL,NULL,NULL,'2019','https://www.lzg.nrw.de/_php/login/dl.php?u=/_media/pdf/service/Pub/2019_df/lzg-nrw_leitfaden_gesunde_stadt_2019.pdf',NULL,'Sep 19, 2023','2024-08-28 15:40:51',NULL),
(277,20,2,'Fux, C. & Schrör, S.','Angst',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(278,20,3,'Kearns, A. & Parkes, A.','Living in and leaving poor neighbourhood conditions in England','Housing Studies','18','6','827–851',NULL,NULL,NULL,'2003',NULL,'https://doi.org/10.1080/0267303032000135456',NULL,'2024-08-28 15:40:51',NULL),
(279,20,4,'Ministerium für Bauen und Verkehr des Landes Nordrhein-Westfalen','Stadt und Sicherheit im demographischen Wandel. Bericht über die Ergebnisse der Arbeitsgruppe des Landespräventionsrates Nordrhein-Westfalen',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2009',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(280,20,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Sicherheit planen und gestalten. Realisierung der städtebaulichen und wohnungswirtschaftlichen Kriminalprävention durch Leitbilder und Verfahren. Dokumentation eines Werkstattgesprächs am 11. Februar 2004','Niedersächsisches Ministerium für Soziales, Frauen, Familie und Gesundheit','2004','https://www.sipa-niedersachsen.de/html/download.cms?id=19&datei=Sicherheit-planen-und-gestalten-19.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(281,20,6,NULL,'Bewegungsmangel ist ein Gesundheitsrisiko',NULL,NULL,NULL,NULL,NULL,NULL,'AOK','2023','https://www.aok.de/pk/magazin/sport/fitness/bewegungsmangel-und-seine-gesundheitlichen-folgen',NULL,NULL,'2024-08-28 15:40:51',NULL),
(282,20,7,NULL,'National guidelines for crime prevention through environmental design in New Zealand',NULL,NULL,NULL,NULL,NULL,NULL,'Wellington, N.Z.: Ministry of Justice','2005','https://environment.govt.nz/publications/national-guidelines-for-crime-prevention-through-environmental-design-in-new-zealand',NULL,NULL,'2024-08-28 15:40:51',NULL),
(283,20,8,NULL,'Liveable neighbourhoods: a Western Australian Government sustainable cities initiative',NULL,NULL,NULL,NULL,NULL,NULL,'Perth, W.A.: Western Australian Planning Commission','2009','https://www.wa.gov.au/system/files/2021-05/FUT_LN_Liveable_Neighbourhoods_update_02.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(284,20,9,NULL,'Designing out crime (Supplementary Planning Document)',NULL,NULL,NULL,NULL,NULL,NULL,'The Rural Borough of Kensington and Chelsea','2008','https://www.rbkc.gov.uk/planning-and-building-control/planning-policy/designing-out-crime',NULL,NULL,'2024-08-28 15:40:51',NULL),
(285,20,10,'Bartl, G., Creemers, N., & Floeting, H.','Sicherheit und Vielfalt im Quartier. Herausforderungen für Kommunen und Beispiele aus der Praxis',NULL,NULL,NULL,NULL,NULL,NULL,'Deutsches Institut für Urbanistik','2019','https://difu.de/publikationen/2019/sicherheit-und-vielfalt-im-quartier',NULL,NULL,'2024-08-28 15:40:51',NULL),
(286,20,11,NULL,'Nutzungsmischung und soziale Vielfalt im Stadtquartier – Bestandsaufnahme, Beispiele, Steuerungsbedarf',NULL,NULL,NULL,NULL,NULL,NULL,'Deutsches Institut für Urbanistik & Bergische Universität Wuppertal','2015','https://difu.de/sites/difu.de/files/archiv/projekte/2015_09_endbericht-nutzungsmischung-und-soziale-vielfalt.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(287,20,12,NULL,'Forschung Radverkehr international – Radfahrer und Fußgänger auf gemeinsamen Flächen',NULL,NULL,NULL,NULL,NULL,NULL,'Deutsches Institut für Urbanistik','2011',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(288,20,13,'Great Britain Department for Transport','Manual for streets',NULL,NULL,NULL,NULL,NULL,NULL,'London: Telford','2007',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(289,20,14,'Tran, M. C.','Walkability als ein Baustein gesundheitsförderlicher Stadtentwicklung und -gestaltung',NULL,NULL,NULL,'284–296','Baumgart, S., Köckler, H., Ritzinger, A., & Rüdiger, A.','Planung für gesundheitsfördernde Städte','Hannover: Akademie für Raumforschung und Landesplanung','2018','https://www.arl-net.de/system/files/media-shop/pdf/fb/fb_008/fb_008_gesamt.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(290,20,15,'Lee, V., Mikkelsen, L., Srikantharajah, J., & Cohen, L.','Strategies for Enhancing the Built Environment to Support Healthy Eating and Active Living',NULL,NULL,NULL,NULL,NULL,NULL,'Oakland: Prevention Institute, Healthy Eating Active Living Convergence Partnership, and PolicyLink','2008',NULL,NULL,'Jul 25, 2024','2024-08-28 15:40:51',NULL),
(291,20,16,'Bals, N.','Kriminalität als Stress: Bedingungen der Entstehung von Kriminalitätsfurcht','Soziale Probleme','15','1','54–76',NULL,NULL,NULL,'2004','https://nbn-resolving.org/urn:nbn:de:0168-ssoar-248654',NULL,NULL,'2024-08-28 15:40:51',NULL),
(292,20,17,'Gerber, M. & Schilling, R.','Stress als Risikofaktor für körperliche und psychische Gesundheitsbeeinträchtigungen',NULL,NULL,NULL,'93–122','Fuchs, R. & Gerber, M.','Handbuch Stressregulation und Sport','Springer Berlin, Heidelberg','2018',NULL,'https://doi.org/10.1007/978-3-662-49322-9_5',NULL,'2024-08-28 15:40:51',NULL),
(293,20,18,'Inoue, S., Yorifuji, T., Takao, S., Doi, H., & Kawachi, I.','Social Cohesion and Mortality: A Survival Analysis of Older Adults in Japan','Am J Public Health','103','12','e60–e66',NULL,NULL,NULL,'2013',NULL,'https://doi.org/10.2105/AJPH.2013.301311',NULL,'2024-08-28 15:40:51',NULL),
(294,20,19,'Sugisawa, H., Liang, J., & Liu, X.','Social Networks, Social Support, and Mortality Among Older People in Japan','J Gerontol','49','1','3–13',NULL,NULL,NULL,'1994',NULL,'https://doi.org/10.1093/geronj/49.1.S3',NULL,'2024-08-28 15:40:51',NULL),
(295,20,20,'Blazer, D. G.','Social Support and Mortality in an Elderly Community Population','Am J Epidemiol','115','5','684–694',NULL,NULL,NULL,'1982',NULL,'https://doi.org/10.1093/oxfordjournals.aje.a113351',NULL,'2024-08-28 15:40:51',NULL),
(296,20,21,'Vögele, C.','Herz-Kreislauf-Erkrankungen',NULL,NULL,NULL,'139–152','Ehlert, U.','Verhaltensmedizin. Springer-Lehrbuch','Springer, Berlin, Heidelberg','2016',NULL,'https://doi.org/10.1007/978-3-662-48035-9_7',NULL,'2024-08-28 15:40:51',NULL),
(297,20,22,'Klineberg, E., Clark, C., Bhui, K.S., et al.','Social support, ethnicity and mental health in adolescents','Soc Psychiat Epidemiol','41',NULL,'755–760',NULL,NULL,NULL,'2006',NULL,'https://doi.org/10.1007/s00127-006-0093-8',NULL,'2024-08-28 15:40:51',NULL),
(298,20,23,'Mair, C., Diez Roux, A. V., & Morenoff, J. D.','Neighborhood stressors and social support as predictors of depressive symptoms in the Chicago Community Adult Health Study','Health & Place','16','5','811–819',NULL,NULL,NULL,'2010',NULL,'https://doi.org/10.1016/j.healthplace.2010.04.006',NULL,'2024-08-28 15:40:51',NULL),
(299,20,24,'Fowler, K., Wareham-Fowler, S., & Barnes, C.','Social context and depression severity and duration in Canadian men and women: exploring the influence of social support and sense of community belongingness','J Appl Soc Psychol','43','S1','E85–E96',NULL,NULL,NULL,'2013',NULL,'https://doi.org/10.1111/jasp.12050',NULL,'2024-08-28 15:40:51',NULL),
(300,20,25,'Bucksch, J., Claßen, T., Geuter, G., & Budde, S.','Bewegungs- und gesundheitsförderliche Kommune. Evidenzen und Handlungskonzept für die Kommunalentwicklung – ein Leitfaden',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2012','https://pub.uni-bielefeld.de/record/2561990',NULL,'Mar 2, 2023','2024-08-28 15:40:51',NULL),
(301,20,26,'Peden, M.','World Report on Road Traffic Injury Prevention',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2004','https://www.who.int/publications/i/item/world-report-on-road-traffic-injury-prevention',NULL,'Sep 19, 2023','2024-08-28 15:40:51',NULL),
(302,21,1,'Food and Agriculture Organization of the United Nations (FAO)','Sustainable Diets and Biodiversity. Directions and Solutions for Policy, Research and Action',NULL,NULL,NULL,NULL,'Burlingame, B. & Dernini, S.',NULL,'FAO Headquarters, Rome','2012','https://www.fao.org/3/i3004e/i3004e.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(303,21,2,'Renner, B., Arens-Azevêdo, U., Watzl, B., Richter, M., Virmani, K., & Linseisen, J. for the German Nutrition Society (DGE)','DGE position statement on a more sustainable diet','Ernährungs Umschau','68','7','144–154',NULL,NULL,NULL,'2021',NULL,'https://doi.org/10.4455/eu.2021.030',NULL,'2024-08-28 15:40:51',NULL),
(304,21,3,'Geffert, K., Klinger, C., & von Philipsborn, P.','Ernährungspolitik und soziale Ungleichheit hängen zusammen – Handlungsfelder für die Politik','Soziale Sicherheit','12/2021',NULL,NULL,NULL,NULL,NULL,'2021','https://www.en.ibe.med.uni-muenchen.de/mitarbeiter/mitarbeiter/philipsborn1e/geffert_2021.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(305,21,4,'Kuntz, B., Waldhauer, J., Zeiher, J., Finger, J. D., & Lampert, T.','Soziale Unterschiede im Gesundheitsverhalten von Kindern und Jugendlichen in Deutschland – Querschnittergebnisse aus KiGGS Welle 2','Journal of Health Monitoring','2/2018',NULL,'45–63',NULL,NULL,'Robert Koch-Institut','2018',NULL,'https://doi.org/10.17886/RKI-GBE-2018-067',NULL,'2024-08-28 15:40:51',NULL),
(306,21,5,'Bundesministerium für Ernährung und Landwirtschaft (BFEM)','Ernährungsstrategie',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023','https://www.bmel.de/DE/themen/ernaehrung/ernaehrungsstrategie.html',NULL,'Mar 29, 2023','2024-08-28 15:40:51',NULL),
(307,21,6,'Baumeister, H., Köckler, H., Rüdiger, A., Claßen, T., Hamilton, J., Rüweler, M., et al.','Leitfaden Gesunde Stadt: Hinweise für Stellungnahmen zur Stadtentwicklung aus dem Öffentlichen Gesundheitsdienst','Bielefeld: Landeszentrum Gesundheit Nordrhein-Westfalen',NULL,NULL,NULL,NULL,NULL,NULL,'2019','https://www.lzg.nrw.de/_php/login/dl.php?u=/_media/pdf/service/Pub/2019_df/lzg-nrw_leitfaden_gesunde_stadt_2019.pdf',NULL,'Sep 19, 2023','2024-08-28 15:40:51',NULL),
(308,21,7,'Moosburger, R., Lage Barbosa, C., Haftenberger, M., Brettschneider, A-K., Lehmann, F., Kroke, A., & Mensink, G. B. M.','Fast Food-Konsum der Jugendlichen in Deutschland – Ergebnisse aus EsKiMo II','Journal of Health Monitoring','1/2020',NULL,'3–19',NULL,NULL,'Robert Koch-Institut','2020',NULL,'https://doi.org/10.17886/RKI-GBE-2018-067',NULL,'2024-08-28 15:40:51',NULL),
(309,21,8,'Moore, L. V., Diez Roux, A. V., Nettleton, J. A., Jacobs, D. R., & Franco, M.','Fast-Food Consumption, Diet Quality, and Neighborhood Exposure to Fast Food: The Multi-Ethnic Study of Atherosclerosis','American Journal of Epidemiology','170','1','29–36',NULL,NULL,NULL,'2009',NULL,'https://doi.org/10.1093/aje/kwp090',NULL,'2024-08-28 15:40:51',NULL),
(310,21,9,'Bundesministerium für Ernährung und Landwirtschaft (BFEM)','Landwirtschaftliche Flächenverluste',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022','https://www.bmel.de/DE/themen/landwirtschaft/flaechennutzung-und-bodenmarkt/flaechenverluste-landwirtschaft.html',NULL,'Jun 7, 2023','2024-08-28 15:40:51',NULL),
(311,21,10,'Hanke, B.','Bio-Lebensmittel: Marktentwicklung und freiwillige Instrumente zur besseren Marktdurchdringung',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021','https://www.oeko.de/publikationen/p-details/bio-lebensmittel-marktentwicklung-und-freiwillige-instrumente-zur-besseren-marktdurchdringung',NULL,NULL,'2024-08-28 15:40:51',NULL),
(312,21,11,'Die Bundesregierung','Deutsche Nachhaltigkeitsstrategie. Weiterentwicklung 2021',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021','https://www.bundesregierung.de/resource/blob/998194/1875176/3d3b15cd92d0261e7a0bcdc8f43b7839/deutschenachhaltigkeitsstrategie-2021-langfassung-download-bpa-data.pdf',NULL,'Oct 13, 2023','2024-08-28 15:40:51',NULL),
(313,21,12,'Müller, C.','Guerilla Gardening und andere Strategien der Aneignung des städtischen Raums',NULL,NULL,NULL,'281–288','Bergmann, M. & Lange, B.','Eigensinnige Geographien','VS Verlag für Sozialwissenschaften, Wiesbaden','2011',NULL,'https://doi.org/10.1007/978-3-531-93176-0_14',NULL,'2024-08-28 15:40:51',NULL),
(314,21,13,NULL,'Essbare Städte. Steckbrief des Projekts „Sozial-ökologische Transformation des Ernährungssystems',NULL,NULL,NULL,NULL,NULL,NULL,'NAHhaft e.V.','n.d.','https://www.ernaehrungswandel.org/vernetzen/nischeninnovationen-in-europa/essbare-staedte',NULL,'Jul 24, 2024','2024-08-28 15:40:51',NULL),
(315,21,14,'Jungvogel, A., Michel, M., Bechthold, A., & Wendt, I.','Die lebensmittelbezogenen Ernährungsempfehlungen der DGE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016','https://www.ernaehrungs-umschau.de/print-artikel/15-08-2016-die-lebensmittelbezogenen-ernaehrungsempfehlungen-der-dge/',NULL,'Sep 28, 2023','2024-08-28 15:40:51',NULL),
(316,21,15,'Deutsche Gesellschaft für Ernährung (DGE)','Vollwertig essen und trinken nach den 10 Regeln der DGE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'n.d.','https://www.dge.de/gesunde-ernaehrung/dge-ernaehrungsempfehlungen/10-regeln/',NULL,'Sep 28, 2023','2024-08-28 15:40:51',NULL),
(317,21,16,'Weltgesundheitsorganisation (WHO)','Diet, nutrition, and the prevention of chronic diseases: report of a WHO-FAO expert consultation',NULL,NULL,NULL,NULL,'WHO & FAO',NULL,NULL,'2003','https://www.who.int/publications/i/item/924120916X',NULL,'Oct 13, 2023','2024-08-28 15:40:51',NULL),
(318,21,17,'Maretzke, F., Schmidt, A., Lehmann, A., Amiri, A. M., Kalotai, N., Bechthold, A., et al.','Prävention chronischer Erkrankungen durch Ernährung: Gemüse-, Obst- und Fleischverzehr und das Risiko für ausgewählte ernährungsmitbedingte Erkrankungen: Ein Umbrella Review von Metaanalysen',NULL,NULL,NULL,'355–389','Deutsche Gesellschaft für Ernährung','14. DGE-Ernährungsbericht. 1. Auflage','Bonn: DGE','2020','https://www.openagrar.de/receive/openagrar_mods_00065518',NULL,'Oct 13, 2023','2024-08-28 15:40:51',NULL),
(319,21,18,'Reynolds, A., Mann, J., Cummings, J., Winter, N., Mete, E., & Te Morenga, L.','Carbohydrate quality and human health: a series of systematic reviews and meta-analyses','Lancet','393','10170','434–445',NULL,NULL,NULL,'2019',NULL,'https://doi.org/10.1016/S0140-6736(18)31809-9',NULL,'2024-08-28 15:40:51',NULL),
(320,21,19,'NSW Department of Urban Affairs and Planning','Integrating Land Use and Transport. Improving Transport Choice — Guidelines for Planning and Development',NULL,NULL,NULL,NULL,NULL,NULL,'Sydney: Department of Urban Affairs and Planning','2001',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(321,0,1,NULL,'Handwörterbuch der Raumordnung',NULL,NULL,NULL,NULL,NULL,NULL,'Hannover: Akademie für Raumforschung und Landesplanung','2005','https://www.arl-net.de/de/content/handwoerterbuch-der-raumordnung',NULL,NULL,'2024-08-28 15:40:51',NULL),
(322,0,2,NULL,'Handwörterbuch der Stadt- und Raumentwicklung',NULL,NULL,NULL,NULL,NULL,NULL,'Hannover: Akademie für Raumforschung und Landesplanung','2018',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(323,0,3,NULL,'Bekanntmachung. Förderziel, Zuwendungszweck, Rechtsgrundlage',NULL,NULL,NULL,NULL,NULL,NULL,'Bundesministerium für Bildung und Forschung','2022','https://www.bmbf.de/bmbf/shareddocs/bekanntmachungen/de/2022/09/2022-09-28-Bekanntmachung-FONA.html',NULL,NULL,'2024-08-28 15:40:51',NULL),
(324,0,4,NULL,'Leitkonzept – Stadt und Region der kurzen Wege. Gutachten im Kontext der Biodiversitätsstrategie',NULL,NULL,NULL,NULL,NULL,NULL,'Umweltbundesamt','2011','https://www.umweltbundesamt.de/sites/default/files/medien/461/publikationen/4151.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(325,0,5,NULL,'Essbare Städte. Steckbrief des Projekts „Sozial-ökologische Transformation des Ernährungssystems',NULL,NULL,NULL,NULL,NULL,NULL,'NAHhaft e.V.','n.d.','https://www.ernaehrungswandel.org/vernetzen/nischeninnovationen-in-europa/essbare-staedte',NULL,'Jul 24, 2024','2024-08-28 15:40:51',NULL),
(326,0,6,NULL,'Walkability: das Handbuch zur Bewegungsförderung in der Kommune',NULL,NULL,NULL,NULL,'Bucksch, J. & Schneider, S.',NULL,'1. Auflage. Bern: Verlag Hans Huber','2014','https://www.bisp-surf.de/Record/PU201602000791',NULL,NULL,'2024-08-28 15:40:51',NULL),
(327,0,7,'Fugmann, F.','Lebendige Plätze im Stadtquartier',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017','https://www.treffpunkt-kommune.de/lebendige-plaetze-im-stadtquartier',NULL,NULL,'2024-08-28 15:40:51',NULL),
(328,0,8,'Bundesministerium für Digitales und Verkehr','Blaue und grüne Infrastruktur zur Regulierung des Stadtklimas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023','https://www.forschungsinformationssystem.de/servlet/is/542870/',NULL,NULL,'2024-08-28 15:40:51',NULL),
(329,0,9,NULL,'Wohnraum',NULL,NULL,NULL,NULL,NULL,NULL,'Statistisches Bundesamt','n.d.','https://www.destatis.de/DE/Themen/Gesellschaft-Umwelt/Wohnen/Glossar/wohnraum.html',NULL,NULL,'2024-08-28 15:40:51',NULL),
(330,0,10,NULL,'„Bezahlbares Wohnen“ – was bedeutet das?',NULL,NULL,NULL,NULL,NULL,NULL,'Friedrich-Ebert-Stiftung','2019','https://www.fes.de/kommunalakademie/artikelseite-kommunalakademie/bezahlbareswohnen','https://doi.org/10.48440/GFZ.1.4.2020.004',NULL,'2024-08-28 15:40:51',NULL),
(331,0,11,'Baumeister, H., Köckler, H., Rüdiger, A., Claßen, T., Hamilton, J., Rüweler, M., et al.','Leitfaden Gesunde Stadt: Hinweise für Stellungnahmen zur Stadtentwicklung aus dem Öffentlichen Gesundheitsdienst','Bielefeld: Landeszentrum Gesundheit Nordrhein-Westfalen',NULL,NULL,NULL,NULL,NULL,NULL,'2019','https://www.lzg.nrw.de/_php/login/dl.php?u=/_media/pdf/service/Pub/2019_df/lzg-nrw_leitfaden_gesunde_stadt_2019.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(332,0,12,NULL,'Wohnumfeld als Schutzgegenstand des Landesraumordnungsprogramms gemäß LROP 4.2 07 Satz 6',NULL,NULL,NULL,NULL,NULL,NULL,'Amt für regionale Landesentwicklung Lüneburg et al.','2017','https://www.ml.niedersachsen.de/download/189119/Arbeitshilfe_Wohnumfeldschutz_gleichwertiger_vorsorgender_Wohnumfeldschutz_nicht_vollstaendig_barrierefrei.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(333,0,13,NULL,'Grundlagen Städtebau',NULL,NULL,NULL,NULL,NULL,NULL,'TU Dresden','n.d.','https://tu-dresden.de/bu/architektur/istb/stbe/ressourcen/dateien/studium/VL_Grundlagen-Staedtebau_Skript.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(334,0,14,NULL,'Personenverkehr',NULL,NULL,NULL,NULL,NULL,NULL,'Statistisches Bundesamt','n.d.','https://www.destatis.de/DE/Themen/Branchen-Unternehmen/Transport-Verkehr/Personenverkehr/_inhalt.html',NULL,NULL,'2024-08-28 15:40:51',NULL),
(335,0,15,NULL,'Motorisierter Individualverkehr',NULL,NULL,NULL,NULL,NULL,NULL,'Bundesministerium für Digitales und Verkehr (BMDV)','2017','https://www.forschungsinformationssystem.de/servlet/is/25653',NULL,NULL,'2024-08-28 15:40:51',NULL),
(336,0,16,NULL,'Bauliche Maßnahmen zur Verkehrsberuhigung',NULL,NULL,NULL,NULL,NULL,NULL,'Bundesministerium für Digitales und Verkehr (BMDV)','2023','https://www.forschungsinformationssystem.de/servlet/is/83756',NULL,NULL,'2024-08-28 15:40:51',NULL),
(337,0,17,'Deutsches Institut für Urbanistik','Was ist eigentlich... Klimaanpassung/Klimaschutz?',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021','https://difu.de/nachrichten/was-ist-eigentlich-klimaanpassung-klimaschutz',NULL,NULL,'2024-08-28 15:40:51',NULL),
(338,0,18,NULL,'Klimaanpassungsmaßnahmen',NULL,NULL,NULL,NULL,NULL,NULL,'Bayrische Staatsregierung','n.d.','https://klimainformationssystem.bayern.de/klimaanpassung/klimaanpassungsmassnahmen',NULL,NULL,'2024-08-28 15:40:51',NULL),
(339,0,19,NULL,'Extremwetterereignis','Wetter- und Klimalexikon',NULL,NULL,NULL,NULL,NULL,'Deutscher Wetterdienst','2008','https://www.dwd.de/DE/service/lexikon/begriffe/E/Extremwetterereignis.html',NULL,NULL,'2024-08-28 15:40:51',NULL),
(340,0,20,'Robinson, P. J.','On the Definition of a Heat Wave','J Appl Meteorol','40','4','762–775',NULL,NULL,NULL,'2001',NULL,'https://doi.org/10.1175/1520-0450(2001)040<0762:OTDOAH>2.0.CO;2',NULL,'2024-08-28 15:40:51',NULL),
(341,0,21,NULL,'Learn About Heat Islands',NULL,NULL,NULL,NULL,NULL,NULL,'United States Environmental Protection Agency','2023','https://www.epa.gov/heatislands/learn-about-heat-islands',NULL,NULL,'2024-08-28 15:40:51',NULL),
(342,0,22,NULL,'Starkregen','Wetter- und Klimalexikon',NULL,NULL,NULL,NULL,NULL,'Deutscher Wetterdienst','n.d.','https://www.dwd.de/DE/service/lexikon/begriffe/S/Starkregen.html',NULL,NULL,'2024-08-28 15:40:51',NULL),
(343,0,23,'Decker, A. & Grunewald, K.','Klima, Luft und Lärm. Fachbeitrag zum Landschaftsprogramm',NULL,NULL,NULL,NULL,NULL,NULL,'Sächsisches Landesamt für Umwelt, Landwirtschaft und Geologie','2014','https://www.natur.sachsen.de/download/sekt_Ziel_Klima_Luft_Laerm.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(344,0,24,'GeoDZ','Frischluftschneise',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2010','http://www.geodz.com/deu/d/Frischluftschneise',NULL,NULL,'2024-08-28 15:40:51',NULL),
(345,0,25,NULL,'Hitze in der Innenstadt: mehr Bäume und Schatten nötig',NULL,NULL,NULL,NULL,NULL,NULL,'Umweltbundesamt','2022','https://www.umweltbundesamt.de/presse/pressemitteilungen/hitze-in-der-innenstadt-mehr-baeume-schatten-noetig',NULL,NULL,'2024-08-28 15:40:51',NULL),
(346,0,26,'Hauck, T. E., Hennecke, S., & Körner, S.','Aneignung urbaner Freiräume: ein Diskurs über städtischen Raum','Bielefeld: Transcript',NULL,NULL,NULL,NULL,NULL,NULL,'2017',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(347,0,27,'Deinet, U. & Reutlinger, C.','Aneignung',NULL,NULL,NULL,'1719–28','Bollweg, P., Buchna, J., Coelen, T., & Otto, H. U.','Handbuch Ganztagsbildung','Springer VS, Wiesbaden','2020',NULL,'https://doi.org/10.1007/978-3-658-23230-6_127',NULL,'2024-08-28 15:40:51',NULL),
(348,0,28,'Koch, R.','Loose Space: Possibility and Diversity in Urban Life – Edited by Karen A. Franck and Quentin Stevens',' N Z Geogr','66','2','174–176',NULL,NULL,NULL,'2010',NULL,'https://doi.org/10.1111/j.1745-7939.2010.01183_6.x',NULL,'2024-08-28 15:40:51',NULL),
(349,0,29,'Wittowsky, D.','Resilienz durch kompakte städtische Strukturen',NULL,NULL,NULL,NULL,NULL,NULL,'Forschungs-Informations-System für Mobilität und Verkehr','2023','https://www.forschungsinformationssystem.de/servlet/is/542860',NULL,NULL,'2024-08-28 15:40:51',NULL),
(350,0,30,'ABES Public Design','Urbane Quartiersplätze',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'n.d.','https://abes-online.com/publikationen/ratgeber/urbane-quartiersplaetze',NULL,NULL,'2024-08-28 15:40:51',NULL),
(351,0,31,NULL,'Nutzungsmischung und soziale Vielfalt im Stadtquartier – Bestandsaufnahme, Beispiele, Steuerungsbedarf',NULL,NULL,NULL,NULL,NULL,NULL,'Deutsches Institut für Urbanistik & Bergische Universität Wuppertal','2015','https://difu.de/sites/difu.de/files/archiv/projekte/2015_09_endbericht-nutzungsmischung-und-soziale-vielfalt.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(352,0,32,'Müller, E., Couné, B., Goebel, S., Stoller, F., & Becker, G.','Die Bedarfsanalyse als wichtiges Instrument in der Angebotsentwicklung',NULL,NULL,NULL,NULL,NULL,'Modulare wissenschaftliche Weiterbildung für heterogene Zielgruppen entwickeln. Formate – Methoden – Herausforderung','Besters-Dilger, J. & Neuhaus, G.','2015','https://www.researchgate.net/publication/336939933_Die_Bedarfsanalyse_als_wichtiges_Instrument_in_der_Angebotsentwicklung',NULL,NULL,'2024-08-28 15:40:51',NULL),
(353,0,33,'Manca, A. R.','Social Cohesion',NULL,NULL,NULL,'6026–8','Michalos, A. C.','Encyclopedia of Quality of Life and Well-Being Research','Springer, Dordrecht','2014',NULL,'https://doi.org/10.1007/978-94-007-0753-5_2739',NULL,'2024-08-28 15:40:51',NULL),
(354,0,34,'Vonneilich, N. & Franzkowiak, P.','Soziale Unterstützung',NULL,NULL,NULL,NULL,'Bundeszentrale für gesundheitliche Aufklärung (BZgA)','Leitbegriffe der Gesundheitsförderung und Prävention. Glossar zu Konzepten, Strategien und Methoden',NULL,'2022',NULL,'https://doi.org/10.17623/BZGA:Q4-I110-3.0',NULL,'2024-08-28 15:40:51',NULL),
(355,0,35,'Francis, J., Giles-Corti, B., Wood, L., & Knuiman, M.','Creating sense of community: The role of public space','Environ Psychol','32','4','401–409',NULL,NULL,NULL,'2012',NULL,'https://doi.org/10.1016/j.jenvp.2012.07.002',NULL,'2024-08-28 15:40:51',NULL),
(356,0,36,'Hornberg, C. & Maschke, J.','Soziale Vulnerabilität im Kontext von Umwelt, Gesundheit und sozialer Lage',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017','https://www.umweltbundesamt.de/sites/default/files/medien/3240/publikationen/umid_02-2017_uba_hornberg_0.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(357,0,37,'Hopf, W. & Edelstein, B.','Chancengleichheit zwischen Anspruch und Wirklichkeit',NULL,NULL,NULL,NULL,NULL,NULL,'Bundeszentrale für politische Bildung','2018','https://www.bpb.de/themen/bildung/dossier-bildung/174634/chancengleichheit-zwischen-anspruch-und-wirklichkeit',NULL,NULL,'2024-08-28 15:40:51',NULL),
(358,0,38,'Knoblich, T. J.','Soziokultur und kulturelle Bildung',NULL,NULL,NULL,NULL,NULL,NULL,'Bundeszentrale für politische Bildung','2007','https://www.bpb.de/lernen/kulturelle-bildung/60034/soziokultur-und-kulturelle-bildung',NULL,NULL,'2024-08-28 15:40:51',NULL),
(359,0,39,'NSW Department of Urban Affairs and Planning','Integrating Land Use and Transport. Improving Transport Choice — Guidelines for Planning and Development',NULL,NULL,NULL,NULL,NULL,NULL,'Sydney: Department of Urban Affairs and Planning','2001',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(360,0,40,'Statistisches Bundesamt','Herz-Kreislauf-Erkrankungen verursachen die höchsten Kosten',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017','https://www.destatis.de/DE/Presse/Pressemitteilungen/2017/09/PD17_347_236.html',NULL,NULL,'2024-08-28 15:40:51',NULL),
(361,0,41,'Bundesministerium für Wohnen, Stadtentwicklung und Bauwesen','Der Deutschlandatlas - Karten - Erreichbarkeit des Öffentlichen Verkehrs (Haltestellen)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'https://www.deutschlandatlas.bund.de/DE/Karten/Wie-wir-uns-bewegen/103-Erreichbarkeit-Nahverkehr-Haltestellen.html',NULL,'May 10, 2023','2024-08-28 15:40:51',NULL),
(362,0,42,'Bucksch, J., Claßen, T., Geuter, G., & Budde, S.','Bewegungs- und gesundheitsförderliche Kommune. Evidenzen und Handlungskonzept für die Kommunalentwicklung – ein Leitfaden',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2012','https://pub.uni-bielefeld.de/record/2561990',NULL,'Mar 2, 2023','2024-08-28 15:40:51',NULL),
(363,0,43,'Kuechly, H., Meier, J., Kyba, C., & Hänel, A.','Ausmaß der Lichtverschmutzung und Optionen zur Minderung der negativen Auswirkungen','LUP – Luftbild Umwelt Planung GmbH, Deutsches GeoForschungsZentrum GFZ',NULL,NULL,NULL,NULL,NULL,NULL,'2018',NULL,'https://doi.org/10.48440/GFZ.1.4.2020.002',NULL,'2024-08-28 15:40:51',NULL),
(364,0,44,NULL,'Städtebauförderung',NULL,NULL,NULL,NULL,NULL,NULL,'Bundesministerium für Wohnen, Stadtentwicklung und Bauwesen','n.d.','https://www.staedtebaufoerderung.info/DE/Startseite/startseite_node.html',NULL,'Jul 23, 2024','2024-08-28 15:40:51',NULL),
(365,0,45,NULL,'Gesundheitsförderung',NULL,NULL,NULL,NULL,NULL,NULL,'Robert Koch-Institut','2023','https://www.rki.de/DE/Content/GesundAZ/G/Gesundheitsfoerderung/Gesundheitsfoerderung_node.html',NULL,NULL,'2024-08-28 15:40:51',NULL),
(366,0,46,'Verschuuren, M. & van Oers, H.','Population health monitoring: an essential public health field in motion','Bundesgesundheitsbl','63',NULL,'1134–1142',NULL,NULL,NULL,'2020','https://www.rki.de/DE/Content/Kommissionen/Bundesgesundheitsblatt/Downloads/2020_09_Verschuuren.pdf?__blob=publicationFile','https://doi.org/10.1007/s00103-020-03205-9',NULL,'2024-08-28 15:40:51',NULL),
(367,0,47,'Vögele, C.','Herz-Kreislauf-Erkrankungen',NULL,NULL,NULL,'139–152','Ehlert, U.','Verhaltensmedizin. Springer-Lehrbuch','Springer, Berlin, Heidelberg','2016',NULL,'https://doi.org/10.1007/978-3-662-48035-9_7',NULL,'2024-08-28 15:40:51',NULL),
(368,0,48,NULL,'Herz-Kreislauf-Erkrankungen',NULL,NULL,NULL,NULL,NULL,NULL,'Bundesverband Niedergelassener Kardiologen (BNK)','n.d.','https://www.bnk.de/herz-kreislauf-erkrankungen.html',NULL,'Jul 23, 2024','2024-08-28 15:40:51',NULL),
(369,0,49,NULL,'Lungenkrankheiten',NULL,NULL,NULL,NULL,NULL,NULL,'Lungeninformationsdienst von Helmholtz Munich','n.d.','https://www.lungeninformationsdienst.de/krankheiten',NULL,'Jul 23, 2024','2024-08-28 15:40:51',NULL),
(370,0,50,NULL,'Morbidität (Eintrag im Duden)',NULL,NULL,NULL,NULL,NULL,NULL,'Cornelsen Verlag','n.d.','https://www.duden.de/rechtschreibung/Morbiditaet',NULL,'Jul 23, 2024','2024-08-28 15:40:51',NULL),
(371,0,51,NULL,'Sterblichkeit',NULL,NULL,NULL,NULL,NULL,NULL,'Bundesministerium für Soziales, Gesundheit, Pflege und Konsumentenschutz (Österreich)','n.d.','https://www.gesundheit.gv.at/lexikon/S/mortalitaet-hk.html',NULL,'Jul 23, 2024','2024-08-28 15:40:51',NULL),
(372,0,52,NULL,'Inzidenz und Prävalenz',NULL,NULL,NULL,NULL,NULL,NULL,'Bundeszentrale für gesundheitliche Aufklärung (BZgA)','n.d.','https://www.bzga-essstoerungen.de/was-sind-essstoerungen/inzidenz-und-praevalenz',NULL,'Jul 23, 2024','2024-08-28 15:40:51',NULL),
(373,0,53,NULL,'Gesund bleiben: Prävention und Gesundheitsförderung',NULL,NULL,NULL,NULL,NULL,NULL,'Bundesministerium für Gesundheit','2024','https://www.bundesgesundheitsministerium.de/krankenversicherung-praevention.html',NULL,'Jul 23, 2024','2024-08-28 15:40:51',NULL),
(374,0,54,'Mensink, G.','Bundes-Gesundheitssurvey: Körperliche Aktivität. Aktive Freizeitgestaltung in Deutschland',NULL,NULL,NULL,NULL,NULL,NULL,'Robert Koch-Institut, Berlin','2003','https://edoc.rki.de/bitstream/handle/176904/3204/206ee9py9oog_18.pdf',NULL,NULL,'2024-08-28 15:40:51',NULL),
(375,0,55,'Danzinger, F., John, H., Marrs, C., Neubert, M., Riedl, S., Uhlemann, K., et al.','Handbuch Grüne Infrastruktur – Konzeptioneller und theoretischer Hintergrund, Begriffe und Definitionen, deutsche Kurzfassung',NULL,NULL,NULL,NULL,'John, H., Marrs, C., & Neubert, M.',NULL,'Interreg Central Europe Projekt MaGICLandscapes. Output O.T1.1, Dresden','2019','https://www.interreg-central.eu/Content.Node/MaGICLandscapes.html#Outputs',NULL,NULL,'2024-08-28 15:40:51',NULL),
(376,0,56,'Kelm, T., Becker, A., & Klein, U.','Automatisierte Detektion von Angsträumen und ihre Auswirkungen auf die nachhaltige Stadtentwicklung',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL),
(377,0,57,'Wilkens, L., Maskut, N., & Lueg, M.-C.','Barrierefrei, zugänglich oder doch barrierearm? Eine Argumentation für den Begriff Barrierefreiheit',NULL,NULL,NULL,'141–154','Heitplatz, V. & Wilkens, L.','Die Rehabilitationstechnologie im Wandel: Eine Mensch-Technik-Umwelt Betrachtung','Dortmund: Eldorado','2024',NULL,NULL,NULL,'2024-08-28 15:40:51',NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_level` int(10) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `roles`
--

INSERT INTO `roles` (`id`, `shortname`, `name`, `access_level`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'lead', 'Project manager', 3, 'person-fill-check', '2024-02-22 17:49:30', NULL),
(2, 'co-lead', 'Co-leader', 2, 'person-add', '2024-02-22 17:49:30', NULL),
(3, 'participant', 'Participant', 1, 'person', '2024-02-22 17:49:30', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `scripts`
--

CREATE TABLE `scripts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `editor_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_id` int(10) UNSIGNED NOT NULL,
  `color_id` int(10) UNSIGNED DEFAULT NULL,
  `editor_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `sections`
--

INSERT INTO `sections` (`id`, `order_id`, `shortname`, `name`, `description`, `icon_id`, `color_id`, `editor_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'users', 'User Management', 'Create and manage user accounts with individual access permissions.', 498, 165, NULL, '2024-05-26 20:52:13', NULL),
(2, 2, 'user-groups', 'User Groups', 'Define which areas users can see and which actions they are allowed to perform.', 499, 167, NULL, '2024-05-26 20:52:13', NULL),
(3, 3, 'memberships', 'Memberships', 'Assign users to projects to allow them to contribute to the screening.', 483, 157, NULL, '2024-05-26 20:52:13', NULL),
(4, 4, 'projects', 'Projects', 'Create projects, conduct screenings, and review evaluations.', 495, 159, NULL, '2024-05-26 20:52:13', NULL),
(5, 5, 'questionnaires', 'Questionnaires', 'Combine your questions into items and questionnaires and define evaluation criteria.', 370, 161, NULL, '2024-05-26 20:52:13', NULL),
(6, 6, 'files', 'File Management', '...', 489, 155, NULL, '2024-05-26 20:52:13', NULL),
(7, 7, 'scripts', 'Scripts', 'Create and edit R scripts to gain control over formulas and define their outputs.', 484, 163, NULL, '2024-05-26 20:52:13', NULL),
(8, 8, 'data', 'Data', '...', 492, 153, NULL, '2024-05-26 20:52:13', NULL),
(9, 9, 'configurations', 'Configurations', 'Set the scope of screening and manage your scores.', 491, 151, NULL, '2024-05-26 20:52:13', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `questionnaire_id` int(10) UNSIGNED DEFAULT NULL,
  `topic_id` int(10) UNSIGNED DEFAULT NULL,
  `origin_id` int(10) UNSIGNED DEFAULT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `editor_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `draw_arrow` tinyint(1) NOT NULL DEFAULT 0,
  `width` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `topics`
--

INSERT INTO `topics` (`id`, `questionnaire_id`, `topic_id`, `origin_id`, `author_id`, `editor_id`, `name`, `description`, `notes`, `type`, `draw_arrow`, `width`, `created_at`, `updated_at`) VALUES
(1,12,NULL,NULL,1,NULL,'Welche Bedeutung hat das Schwerpunktthema für eine gesundheitsfördernde Stadtentwicklung?',NULL,NULL,'container',0,1,'2024-08-30 14:25:25',NULL),
(2,NULL,1,NULL,1,NULL,'Mobilität als Faktor für Bewegung und Lebensqualität',NULL,'<h5 class=\'fst-italic\'>Welche Bedeutung hat das Schwerpunktthema Mobilität für eine gesundheitsfördernde Stadtentwicklung?</h5><p>Mobilität ist eine zentrale Voraussetzung, um am gesellschaftlichen Leben teilzunehmen und liefert einen wesentlichen Beitrag zu einer hohen Lebensqualität. Gleichzeitig ist der städtische Personen- und Güterverkehr ein Hauptverursacher von Luftverschmutzung, Lärm und Flächenverbrauch [1,2].</p><p><b>Die Gestaltung der gebauten Umwelt hat Einfluss auf das Angebot der Mobilitätsmöglichkeiten und damit auch auf die Verkehrsmittelwahl.</b> Dabei ist es im städtischen Umfeld aus vielen Gründen erstrebenswert einen Großteil der Mobilitätsbedürfnisse über den öffentlichen Personennahverkehr, das Fahrrad und zu Fuß zu decken. Eine Reduzierung motorisierter Individualverkehre – insbesondere privater Pkws – ist gut für das Klima, verringert Luftschadstoffe, senkt die Lärmbelastung, schafft mehr Platz im öffentlichen Raum und steigert die <b>Aufenthalts- und Wohnqualität</b> in der Stadt [3].</p><p>Es gilt, die Mobilität nachhaltiger und umweltfreundlicher zu gestalten, ohne die Bewegungsmöglichkeiten der Bevölkerung und den Transport von Gütern einzuschränken.</p><p>Darüber hinaus sind verkehrsplanerische Maßnahmen auf ihre sozialen Auswirkungen hin zu überprüfen (z. B. Chancengleichheit hinsichtlich Mobilität). In der konkreten Ausgestaltung der Verkehrsplanung spielen <b>soziale Aspekte von Mobilität</b> in Deutschland vielfach eine untergeordnete Rolle. Einzelne Zielgruppen (z. B. Kinder und Jugendliche, Menschen mit körperlichen Einschränkungen) werden oft zu wenig berücksichtigt [3].</p><p>Ein wichtiges Ziel in einer gesundheitsfördernden Stadtentwicklung und einer dauerhaft umweltgerechten Entwicklung ist es, den Anteil der gefahrenen Kilometer mit Privat-Kfz zu verringern, zugunsten aktiverer Fortbewegungsformen, einschließlich des Öffentlichen Personennahverkehrs.</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(3,NULL,1,1,1,NULL,'Was sind relevante Schlüsselfaktoren für eine gesundheitsfördernde Stadtentwicklung?',NULL,NULL,'container',1,1,'2024-08-30 14:25:25',NULL),
(4,NULL,3,NULL,1,NULL,'Verbesserung des ÖPNV-Angebots',NULL,'<h5 class=\'fst-italic\'>Welche Bedeutung hat die Bereitstellung eines guten ÖPNV-Angebots?</h5><p>Die Bereitstellung eines guten Öffentlichen Personennahverkehrs (ÖPNV) hat eine große Bedeutung für das Mobilitätsangebot einer Stadt und Region. Ein guter ÖPNV kann dazu beitragen,<ul><li>die Verkehrsbelastung zu reduzieren,</li><li>die Umweltverschmutzung und Lärmbelastung zu verringern und</li><li>die Mobilität für alle Menschen zugänglicher zu machen.</li></ul></p><p>Richtwerte für Haltestelleneinzugsbereiche werden in Abhängigkeit von Siedlungsstruktur und der jeweiligen Qualität des ÖPNV-Angebots festgelegt. <b>Die Qualität des jeweiligen ÖPNV-Angebots wird hierbei über das Mindestangebot an Fahrtmöglichkeiten im Verlauf eines Tages sowie die Bedienungshäufigkeit von Haltestellen ermittelt</b> [4]. <b>Je höher diese beiden Faktoren ausgeprägt sind, desto positiver ist die Qualität der einzelnen ÖPNV-Haltestelle zu bewerten.</b></p><p>Hinsichtlich der Einzugsbereiche zu Haltestellen sind die Anforderungen der Barrierefreiheit heranzuziehen. Hierbei werden für mobilitätseingeschränkte Personen maximale Einzugsbereiche für Bus- und Straßenbahnhaltestellen<ul><li>von 300 bis 350 Meter für Innenstadtbereiche,</li><li>350 bis 400 Meter für Vorortbereiche und</li><li>450 bis 500 Meter für Außengebiete empfohlen [4,5].</li></ul></p><p>Des Weiteren sind im Interesse von mobilitätseingeschränkten Personen unnötige Umstiege zu vermeiden sowie anfallende Umstiegswege möglichst barrierefrei zu gestalten. Hierzu sollten beispielsweise Höhendifferenzen möglichst vermieden, Anlagen optisch übersichtlich gestaltet sowie ÖPNV-bezogene Daten leicht zugänglich gemacht werden [6].</p><p>In der Planungspraxis hat sich eine Entfernung von 600m zu Bushaltestellen und von 1200m zu Bahnhöfen als zumutbar etabliert [7].</p><p>Menschen, die den ÖPNV nutzen, legen mehr Entfernungen zu Fuß oder mit dem Fahrrad zurück, denn die Nutzung des ÖPNV ist automatisch an mehr Bewegung gekoppelt als die Nutzung des eigenen Autos [8].</p><p>Ein gut ausgebauter ÖPNV ermöglicht es Menschen, leichter zu Arbeitsplätzen und Bildungseinrichtungen zu gelangen. Dies kann dazu beitragen, den Zugang zu Beschäftigungsmöglichkeiten zu verbessern und die soziale Mobilität zu erhöhen. Dies kann für Menschen mit niedrigem Einkommen oder Mobilitätseinschränkungen besonders wichtig sein. <b>Ein mangelndes ÖPNV-Angebot kann zu einem unzureichenden Zugang zu Gütern und Dienstleistungen des täglichen Bedarfs, einschließlich Arbeitsplätzen, Gesundheitsversorgung und (regionalen) Lebensmitteln, beitragen</b> [3].</p><p>Ein guter ÖPNV kann nicht zuletzt dazu beitragen, die Umweltbelastungen zu verringern, indem er eine Alternative zum Autofahren bietet. Dies kann besonders wichtig sein, um die Ziele des Klimaschutzes zu erreichen.</p><p>Insgesamt ist ein guter ÖPNV ein wichtiger Faktor für eine nachhaltige und zugängliche Mobilität.</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(5,NULL,3,NULL,1,NULL,'Anreize zur aktiven Fortbewegung',NULL,'<h5 class=\'fst-italic\'>Wie können im Städtebau Anreize zur aktiven Fortbewegung geschaffen werden?</h5><p>Unzureichende körperliche Aktivität, insbesondere hinsichtlich aktiver Fortbewegung, hängt auch kausal mit der gebauten Umwelt zusammen. Menschen, die in diesbezüglich attraktiveren Umgebungen leben, nutzen eher die aktive Fortbewegung, z.B. Gehen oder Radfahren und haben ein höheres Maß an körperlicher Aktivität. Die Wahl der aktiven Fortbewegung ist nicht nur eine persönliche Entscheidung. <b>Die Gestaltung von Städten und die Effizienz ihres Verkehrsnetzes sind entscheidend für die Begünstigung oder Beeinträchtigung des aktiven Verkehrs und damit für das Ausmaß der körperlichen Aktivität</b> [11].</p><p>Gegenden mit einer hohen Bevölkerungsdichte, Nutzungsmischung, erkennbaren Ortszentren und einer guten Erschließungsqualität sind geeignet, um aktive Fortbewegung zu fördern [12] zit n. [3].</p><p>Eine gute <b>Interkonnektivität von Wegeverbindungen</b> zwischen den bestehenden Verkehrswegen wird als förderlich angesehen, um geringere Entfernungen zwischen Zielorten zu realisieren und damit Fuß- und Radverkehr zu fördern. Dabei sind zudem Gestaltungsaspekte wie Straßenbelag, Straßenbreite, separate Fuß- und Radwege, die Vermeidung von Sackgassen für Fuß- und Radverkehr sowie die Qualität von Straßenräumen zu berücksichtigen [3].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(6,NULL,3,NULL,1,NULL,'Verringerung des motorisierten Individualverkehrs (MIV)',NULL,'<h5 class=\'fst-italic\'>Welchen Einfluss hat der motorisierte Individualverkehr und warum ist eine Verringerung wünschenswert?</h5><p>Der motorisierte Individualverkehr (MIV) hat einen erheblichen Einfluss auf die Stadt. Dieser<ul><li>verursacht Luftverschmutzung und Lärm,</li><li>beeinträchtigt die Gesundheit der Bewohner:innen,</li><li>führt zu Staus und Verkehrsbehinderungen,</li><li>verursacht Platzmangel und</li><li>erhöht den Energieverbrauch und den CO2-Ausstoß.</li></ul></p><p>Eine Verringerung des Verkehrs ist daher wünschenswert, um<ul><li>die Luftqualität zu verbessern,</li><li>die Verkehrssicherheit zu erhöhen,</li><li>Öffentliche (Frei-)Räume mit Aufenthaltsqualität zu gestalten sowie</li><li>die Attraktivität des Öffentlichen Personennahverkehrs zu steigern.</li></ul></p><p>Dabei kann durch die Verringerung der Anzahl von Autos und damit weniger Park- und Straßenraum, mehr Platz für den Ausbau von Infrastruktur für Fahrradfahrer:innen und Fußgänger:innen sowie für den Öffentlichen (Frei-)Raum und Grünflächen gewonnen werden [9]. <b>Insgesamt trägt eine Verringerung des MIV zur Steigerung der Aufenthalts- und Wohnqualität in der Stadt und zu vielen positiven gesundheitlichen Auswirkungen bei.</b></p><p>Es kann ebenfalls dazu beitragen, den CO2-Ausstoß zu senken und damit zum Klimaschutz beitragen [10].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(7,NULL,3,NULL,1,NULL,'Sicherheit für Fußgänger:innen und Radfahrer:innen',NULL,'<h5 class=\'fst-italic\'>Welche Aspekte sind hinsichtlich der Sicherheit für Fußgänger:innen und Radfahrer:innen wichtig?</h5><p>Eine sichere Verkehrsinfrastruktur ist entscheidend für die Gesundheit und das Wohlbefinden der Menschen. <b>Fuß- und Fahrradwege, sichere Überwege, gut beleuchtete Straßen und eine angemessene Verkehrsregelung tragen dazu bei, das Risiko von Verkehrsunfällen und Verletzungen zu reduzieren.</b> Durch Maßnahmen der Umgestaltung von Öffentlichen Verkehrsräumen können Unfälle im Straßenverkehr zwischen den verschiedenen Verkehrsteilnehmenden, etwa dem motorisierten Individualverkehr, Öffentlichen Personennahverkehr, Fahrrad- sowie Fußverkehr, deutlich reduziert werden. Begünstigt wird dies durch:<ul><li>eine optische und bauliche Trennung der Verkehrsströme</li><li>die Schaffung von barrierefreien, gut einsehbaren Querungsmöglichkeiten</li><li>die Reduzierung der Anzahl von Stellplätzen des ruhenden Verkehrs</li></ul></p><p>Sowohl faktische als auch individuell empfundene Gefahren des Verkehrs können Menschen daran hindern, sich zu Fuß oder mit dem Fahrrad fortzubewegen. Ein schnelles und unproblematisches Überqueren von Straßen sind besonders wichtige Anliegen von Kindern, Älteren oder Menschen mit Bewegungseinschränkungen [8] zit. n. [3].</p><p>Eine Zunahme des Fuß- und Radverkehrs kann die Verkehrssicherheit in Gebieten erhöhen, da Autofahrer:innen in solchen Gebieten mit vielen anderen nicht motorisierten Verkehrsteilnehmer:innen vorsichtiger fahren [3].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(8,NULL,3,NULL,1,NULL,'Veränderung von Prioritäten',NULL,'<h5 class=\'fst-italic\'>Wie sollten die Prioritäten in Öffentlichen (Straßen-)Räumen gesetzt werden?</h5><p>In Anlehnung an das in Großbritannien entwickelte „Manual for Streets“ soll bei der Entwicklung und Neuplanung von Verkehrsräumen, wie Straßen und deren zugeordneten Räumen, eine <b>veränderte Hierarchisierung der Verkehrsteilnehmer:innen</b> zur Anwendung kommen [13] zit. n.[3]. Diese sollte folgende Punkte umfassen:<ul><li>Schwächung des motorisierten Individualverkehrs (MIV) bei gleichzeitiger Stärkung anderer Verkehrsteilnehmer:innen/Fortbewegungsformen</li><li>Rücknahme der Nutzung und Unterbringung des MIV im Straßenraum (Reduzierung von Stellplätzen)</li><li>Erschließung von Aufenthalts- und Nutzungspotentialen in Straßen- und angrenzenden, öffentlichen Räumen</li><li>Erhöhung der Verkehrssicherheit durch strikte (bauliche oder optische) Trennung der Verkehrsteilnehmer:innen</li><li>Schaffung von kompakteren, städtischen Strukturen (Stadt der kurzen Wege, 15-Minuten-Stadt) zur Erhöhung der Alltagsaktivität bei gleichzeitiger Abkehr vom Prinzip der autogerechten Stadt</li></ul></p><p>Die daraus resultierende Neuordnung der Hierarchie von Verkehrsteilnehmer:innen würde demnach folgendem Schema folgen:</p><p class=\'text-center\'>Fußgänger: innen => Radfahrer:innen / Öffentlicher Personennahverkehr => Sonderfahrzeuge => MIV</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(9,NULL,1,3,1,NULL,'Welche direkten Effekte sind durch die Förderung der Schlüsselfaktoren zu erwarten?',NULL,NULL,'container',1,1,'2024-08-30 14:25:25',NULL),
(10,NULL,9,9,1,NULL,'Verbesserte Walkability',NULL,'<h5 class=\'fst-italic\'>Was ist Walkability und inwiefern wird dadurch gesundheitsförderndes Verhalten gefördert?</h5><p>Der Begriff Walkability beschreibt die <b>bewegungsfreundliche und -fördernde Gestaltung einer Wohnumgebung</b>. Durch eine Kombination von städtebaulichen Merkmalen wie dem Verdichtungsgrad und der Nutzungsmischung, aber auch dem Vorhandensein von hochwertigen Bürgersteigen und einem attraktiven Straßenbild kann aktiver Transport und kleinräumige Mobilität [5], also beispielsweise das Zurücklegen von Arbeitswegen zu Fuß und per Fahrrad, begünstigt werden. In einer Wohnumgebung mit höherer Walkability zu leben, steht in einem Zusammenhang mit mehr körperlicher Aktivität im Alltag [14,15].</p>','column',0,2,'2024-08-30 14:25:25',NULL),
(11,NULL,10,10,1,NULL,'Steigerung der Bewegung durch aktiven Transport (Fahrradfahren und Zufußgehen)',NULL,'<h5 class=\'fst-italic\'>Wie ist das Ausmaß an Bewegung einzuordnen?</h5><p>Das vorhandene Verkehrsmittelangebot sowie die individuelle Verkehrsmittelwahl beeinflussen die menschliche Gesundheit sowie das Wohlbefinden auf vielfältige Weise. So kann eine übermäßige Nutzung des motorisierten Individualverkehrs Menschen daran hindern, ein gesundheitsförderndes Mindestmaß an Bewegung zu erreichen.</p><p class=\'color-box fw-bold\'>Die Weltgesundheitsorganisation (WHO) empfiehlt <b>150-300 Minuten moderate bis intensive Ausdaueraktivität oder 75 bis 150 Minuten intensives Training pro Woche</b>, sowie sitzendes Verhalten durch möglichst viele Alltagsaktivitäten zu ersetzen.</p><p>Die Mindestempfehlungen der WHO [11,16] für körperliche Aktivität ließen sich beispielsweise durch eine 15-minütige Fahrradfahrt zur Arbeit und zurück an fünf Tagen der Woche umsetzen. Auch eine Kombination von moderaten und intensiven Aktivitäten ist möglich.</p><p>Trotz der enormen Gesundheitseffekte erreichen weniger als die Hälfte der Erwachsenen in Deutschland diese WHO-Mindestempfehlungen [17].</p><p>Die aktive Mobilität von Stadtbewohner:innen, wie Gehen, Fahrradfahren oder den Öffentlichen Personennahverkehr für die täglichen Wege nutzen, kann ein wichtiger Beitrag für eine gesundheitsfördernde körperliche Aktivität sein.</p>','default',1,1,'2024-08-30 14:25:25',NULL),
(12,NULL,9,NULL,1,NULL,'Verbesserte Luftqualität',NULL,'<h5 class=\'fst-italic\'>Was wird im Allgemeinen unter Luftverschmutzung verstanden und wie kommt diese zustande?</h5><p>Der Begriff Luftverschmutzung bezeichnet eine Mischung aus anthropogenen Schadstoffen und natürlichen Quellen, welche insbesondere in städtischen Gebieten häufig auftritt. Etwa neun von zehn Menschen, die weltweit in städtischen Gebieten leben, sind von Luftverschmutzung betroffen [18]</p><p><b>Der Straßenverkehr ist einer der wichtigsten Faktoren für die Entstehung von Luftschadstoffbelastungen</b>, insbesondere ist er Hauptverursacher von Stickstoffdioxidbelastungen und eine entscheidende Quelle von Feinstaub [19].</p>','column',0,1,'2024-08-30 14:25:25',NULL),
(13,NULL,9,NULL,1,NULL,'Verringerung verkehrsbedingter Gesundheitsrisiken',NULL,'<p>Die Art und Weise der Fortbewegung und die genutzten Mobilitätsformen haben einen erheblichen Einfluss auf die menschliche Gesundheit sowie das Wohlbefinden. <b>Eine aktive Fortbewegung zu Fuß, mit dem Fahrrad oder dem Öffentlichen Personennahverkehr bewirkt positive Einflüsse auf die menschliche Gesundheit.</b> Der motorisierte Individualverkehr (MIV) verursacht hingegen nachteilige Auswirkungen für die menschliche Gesundheit, unter anderem durch die damit einhergehenden Faktoren:<ul><li>Lärmbelastung,</li><li>Luftverschmutzung und</li><li>globaler Klimawandel.</li></ul></p>','default',0,1,'2024-08-30 14:25:25',NULL),
(14,NULL,12,12,1,NULL,'Verringerte Lärmbelastung',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf die Lärmbelastung zu erwarten?</h5><p>Eine der wichtigsten Arten von Umgebungslärm ist der Verkehrslärm, welcher durch Straßen-, Schienen-, und Luftverkehr entsteht.</p><p>Lärmschutz kann unter anderem durch geschlossene bauliche Strukturen umgesetzt werden. Vor allem aber spielt die <b>Reduktion des motorisierten Individualverkehrs</b> eine maßgebliche Rolle für eine verringerte Lärmbelastung [20].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(15,NULL,1,9,1,NULL,'Welche gesundheitlichen Auswirkungen sind durch die direkten Effekte zu erwarten?',NULL,'','container',1,1,'2024-08-30 14:25:25',NULL),
(16,NULL,15,NULL,1,NULL,'Verringerte Mortalität',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Mortalität/Krankheitsrisiken durch Inaktivität zu erwarten?</h5><p>Die Weltgesundheitsorganisation (WHO) empfiehlt 150-300 Minuten moderate bis intensive Ausdaueraktivität oder 75 bis 150 Minuten intensives Training pro Woche [16,22].</p><p>In Deutschland sind jährlich etwa 1500 vorzeitige Todesfälle körperlicher Inaktivität zuzuschreiben. Durch eine Steigerung des Aktivitätslevels der bislang inaktiven Personen in Deutschland auf die Mindestempfehlungen würden positive Effekte entstehen, u.a.:<ul><li>Die Lebenserwartung der bisher Inaktiven würde im Durchschnitt um etwa sieben Monate ansteigen, bei 300 Minuten moderatem bzw. 150 Minuten intensivem Training um noch einmal weitere sieben Monate [11].</li><li>In den EU-Mitgliedsländern könnte eine Erhöhung der Aktivitätslevel auf die Mindestempfehlungen insgesamt 11,5 Mio. neue Fälle von nichtübertragbaren Krankheiten verhindern, darunter 3,8 Mio. Fälle von Herz-Kreislauf-Erkrankungen, 3,5 Mio. Depressionserkrankungen, 1 Mio. Typ-2-Diabetesfälle und mehr als 400 Tsd. Krebserkrankungen [11].</li></ul></p>','default',0,2,'2024-08-30 14:25:25',NULL),
(17,NULL,15,NULL,1,NULL,'Weniger Herz-Kreislauf-Erkrankungen',NULL,'<p>Herz-Kreislauf-Erkrankungen zählen weltweit sowie in Deutschland als die häufigste Todesursache. Die wichtigste Störung dabei ist die Arteriosklerose (Gefäßverengung der Arterien), welche zu verschiedenen Krankheitsbildern wie Herzinfarkt, koronarer Herz-Krankheit oder Schlaganfall führen kann [23].</p><p>Die Lebenszeitprävalenz des Herzinfarktes bei unter 80-Jährigen liegt in Deutschland bei 4,7&nbsp;%, für koronare Herzkrankheit liegt sie bei 9,3&nbsp;% [24].</p><p><b>Körperliche Inaktivität stellt neben anderen einen der wichtigsten Risikofaktoren für die Arteriosklerose dar [23].</b></p>','default',0,2,'2024-08-30 14:25:25',NULL),
(18,NULL,15,NULL,1,NULL,'Weniger Krebserkrankungen',NULL,'<p>Krebserkrankungen sind weltweit und deutschlandweit eine häufige Todesursache. Der Anteil an Personen in Deutschland, welche in den letzten fünf Jahren an Krebs erkrankt sind, liegt bei 1,6&nbsp;% - die Zahlen sind dabei ansteigend [25].</p><p><b>Regelmäßig körperlich aktiv zu sein kann das Risiko für verschiedene Arten von Krebserkrankungen verringern.</b> Auch in der onkologischen Akutbehandlung bringt Bewegung unter anderem Vorteile für Erschöpfungsbeschwerden, den verringerten Abbau von Muskelmasse und das Immunsystem mit sich [26].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(19,NULL,15,NULL,1,NULL,'Weniger Diabeteserkrankungen',NULL,'<p>Ebenso steigend sind die mit körperlicher Inaktivität in Zusammenhang stehenden Diabetesfälle in Deutschland. Etwa 9 – 10&nbsp;% der deutschen Bevölkerung haben diagnostizierten Diabetes mellitus, der überwiegende Anteil der Personen davon leidet unter Typ-2-Diabetes [27]. <b>Regelmäßig körperlich aktiv zu sein senkt das Risiko, an Diabetes zu erkranken</b>, darüber hinaus kann Bewegung verschiedene gesundheitliche Parameter bei bestehendem Diabetes verbessern [28,29].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(20,NULL,15,NULL,1,NULL,'Weniger Depressionen',NULL,'<p>Depressionen sind eine häufig auftretende psychische Störung, welche das allgemeine Wohlbefinden und die Lebensqualität erheblich beeinträchtigt. Etwa 8&nbsp;% der Personen in Deutschland erhalten pro Jahr die ärztliche Diagnose der Depression [30].</p><p><b>Die regelmäßige Ausübung von körperlicher Aktivität zeigt eine förderliche und positiv beeinflussende Wirkung auf die mentale Gesundheit.</b> Sie kann sowohl präventiv als auch therapeutisch eingesetzt werden. Die Ausübung körperlicher Aktivität führt sowohl zu Verbesserungen der Stimmungslage als auch der kognitiven Funktionen [31].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(21,NULL,15,NULL,1,NULL,'Weniger Übergewicht und Adipositas',NULL,'<p><b>Zentrale Risikofaktoren, die durch körperliche Inaktivität entstehen, sind die Entwicklung von Übergewicht und Adipositas.</b> Diese entstehen durch eine längerfristige unausgeglichene Energiebilanz, wenn die Energiezufuhr (Kalorienaufnahme) den Energieverbrauch übersteigt [32].</p><p>Die Prävalenz von Adipositas ist in den letzten Jahren maßgeblich angestiegen. 53&nbsp;% der Erwachsenen in Deutschland sind als übergewichtig einzustufen, davon 19&nbsp;% als adipös [33].</p><p>Bei Kindern und Jugendlichen gelten 15,4&nbsp;% als übergewichtig, davon 5,9&nbsp;% als adipös [34].</p><p><b>Adipositas steht im Zusammenhang mit verschiedenen Krankheitsrisiken, unter anderem Herz-Kreislauf-Erkrankungen, bestimmten Krebsarten und Typ 2-Diabetes</b> [35].</p><p>In Deutschland geht man von jährlich fast 37.000 Todesfällen aufgrund von Übergewicht aus [36].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(22,NULL,15,NULL,1,NULL,'Weniger Atemwegserkrankungen',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Atemwegserkrankungen zu erwarten?</h5><p>Die <b>Exposition mit Luftschadstoffen</b> steht im Zusammenhang mit dem Auftreten verschiedener Erkrankungen. Die Wirkungen beginnen in der Lunge und führen häufig zu Atemwegserkrankungen, darüber hinaus weisen sie Auswirkungen auf den gesamten Körper auf [37]. Dazu zählen:<ul><li>Erkrankungen der Atemwege, z.B. Asthma, COPD, Lungenkrebs</li><li>Kopfschmerzen und Konzentrationsschwäche</li><li>Einschränkung der Leistungsfähigkeit</li><li>Herz-Kreislauf-Erkrankungen</li></ul></p><p>Insbesondere vulnerable Zielgruppen, etwa Kinder und Ältere, sind dabei stärker empfänglich für die gesundheitsschädigenden Effekte von Luftschadstoffen.</p><p>In Deutschland wurden im Jahr 2018 in einer mittleren Abschätzung statistisch <b>63.100 vorzeitige Todesfälle durch Feinstaub</b> (PM2.5) und 9.200 durch Stickstoffdioxid (NO2) verursacht [38] zit. n. [39]. Luftschadstoffe stellen somit eine <b>erhebliche Gesundheitsgefahr</b> dar.</p><p>Die deutliche Verringerung der verkehrsbedingten Luftverschmutzung, des Lärms und der Temperatur in städtischen Quartieren wird sich erheblich auf die Gesundheit der Bewohner:innen auswirken und kann zu einer Verringerung der vorzeitigen Sterblichkeit und Morbidität führen [9].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(23,NULL,16,NULL,1,NULL,'Weniger Unfälle und Verletzungen',NULL,'<h5 class=\'fst-italic\'>Inwiefern beeinflussen die Schlüsselfaktoren die Anzahl an Verkehrsunfällen?</h5><p>Eine <b>Verlagerung der täglichen, aktiven Fortbewegung vom motorisierten Individualverkehr hin zur Nutzung des Öffentlichen Personennahverkehrs, des Fahrrads oder des Zufußgehens</b>, wird zu einem Rückgang von Unfällen und Verletzungen im Straßenverkehr führen [40].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(51,13,NULL,NULL,1,NULL,'Welche Bedeutung hat das Schwerpunktthema für eine gesundheitsfördernde Stadtentwicklung?',NULL,NULL,'container',0,1,'2024-08-30 14:25:25',NULL),
(52,NULL,51,NULL,1,NULL,'Gesunde Arbeitsverhältnisse haben einen Einfluss auf die psychische & physische Gesundheit, das Einkommen, den beruflichen Stress und den Arbeitsweg.',NULL,'<h5 class=\'fst-italic\'>Welche Bedeutung hat das Schwerpunktthema für eine gesundheitsfördernde Stadtentwicklung?</h5><p>Die <b>Erwerbstätigkeit</b> von Menschen hat sowohl auf die psychische als auch auf die physische Gesundheit positive Auswirkungen [1]. Unter schlechten Rahmenbedingungen kann sich der positive Einfluss jedoch ins Negative kehren [2] zit. n. [3]. Durch die <b>Arbeitsstättenverordnung</b> (ArbStättV) werden die Anforderungen an einen sicheren, gesunden Arbeitsplatz festgeschrieben. Diese umfassen insbesondere die Ausstattung sowie die nötigen Sicherheitsvorkehrungen eines Arbeitsplatzes, beispielsweise der ausreichende Zugang zu Tageslicht oder geeignete Brandschutzmaßnahmen [4].</p><p>Darüber hinaus besitzt der <b>Weg zur Arbeitsstätte</b> eine Bedeutung für die Gesundheit des Menschen. Beträgt beispielsweise die Pendelzeit zur Arbeitsstelle mehr als 30 Minuten und findet diese passiv im Sitzen statt, kann sich das negativ auf die körperliche Aktivität, die Zeit der Arbeitnehmenden für gesellschaftliche Teilhabe und soziale Kontakte auswirken [2] zit. n. [3]. Gleichzeitig kann das Pendeln zur Arbeit zur Stresssteigerung beitragen [3].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(53,NULL,51,51,1,NULL,'Was sind relevante Schlüsselfaktoren für eine gesundheitsfördernde Stadtentwicklung?',NULL,NULL,'container',1,1,'2024-08-30 14:25:25',NULL),
(54,NULL,53,NULL,1,NULL,'Kompakte Siedlungsstrukturen',NULL,'<h5 class=\'fst-italic\'>Wie befördern kompakte Siedlungsstrukturen eine gesundheitsfördernde Stadtentwicklung?</h5><p>Durch <b>räumlich entzerrte Siedlungsstrukturen</b> entstehen größere Distanzen zwischen dem Wohn- und Arbeitsort. Diese lassen sich oftmals nicht zu Fuß oder mit dem Fahrrad bewältigen, sondern nur mit dem eigenen Personenkraftwagen (PKW) [5,6]. Überschreiten die Pendelzeiten dabei 30 Minuten, kann dies negative Auswirkungen auf die Zeit der Arbeitnehmer:innen für gesellschaftliche Teilhabe und körperliche Aktivität haben [3].</p><p><b>Im Sinne kleinteiliger, kompakter Siedlungsstrukturen und geeigneter Nutzungsmischungen</b> sollten Alltagsziele, zu denen Arbeitsplätze zählen, in Ort- und Quartierszentren verortet werden. Infolgedessen wäre die Nutzung des PKWs aufgrund der kürzeren Arbeitswege nicht zwingend notwendig. Wenn gleichzeitig der Ausbau des Öffentlichen Personenverkehrs (ÖPNV), der Rad- und Fußmobilität sowie weiterer Mobilitätsangebote wie etwa Carsharing erfolgt, können die körperliche Aktivität und Gesundheit gefördert und lange Pendelzeiten im Alltag vermieden werden [7,8].</p><p>Das <b>Konzept der 15-Minuten-Stadt</b> knüpft an diese Überlegungen an. Es besteht darin, dass Stadtbewohner:innen ihre alltäglichen Bedürfnisse innerhalb eines Radius von 15 Minuten zu Fuß oder mit dem Fahrrad erledigen können sollten. Gleichzeitig ermöglicht ihnen das Konzept, schnell andere Stadtteile zu erreichen und größere Entfernungen mittels nachhaltiger Verkehrsmittel, etwa dem ÖPNV, zurückzulegen [9].</p><p>Ein weiteres daran anknüpfendes Konzept ist die <b>Stadt der kurzen Wege</b>. Das Konzept verbindet die drei wesentlichen Elemente der Nutzungsmischung, der Dichte und einer hohen Qualität Öffentlicher (Frei-)Räume. Die Stadt der kurzen Wege hält Distanzen zwischen Wohnort, Arbeitsplatz, Nahversorgung und Dienstleistungen gering und wirkt dadurch einem großen Verkehrsaufkommen entgegen. Durch die kurzen Wege erreicht man alles bequem zu Fuß, mit dem Fahrrad oder Öffentlichen Verkehrsmitteln. Gleichzeitig nehmen Abgas- und Lärmbelästigung ab. Etwaige Strukturprinzipien einer solchen Stadt sind unter anderem eine bahnorientierte städtebauliche Entwicklung, kompakte Stadtkörper sowie die Erhaltung großer zusammenhängender freier Naturlandschaften [10].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(55,NULL,53,NULL,1,NULL,'Soziale und technische Infrastruktur',NULL,'<h5 class=\'fst-italic\'>Wie beeinflusst der Ausbau der sozialen und technischen Infrastruktur den Zugang zu einem gesunden Arbeitsplatz?</h5><p>Eine <b>große Entfernung zu Arbeitsplätzen</b> kann dazu führen, dass mehr Menschen mit dem Auto pendeln, was sich wiederum negativ auf die Gesundheit auswirken kann. Deshalb unterstützt die Bundesregierung den Ausbau von Breitbandanschlüssen und -netzen in ländlichen und strukturschwachen Regionen, um eine <b>leistungsstarke Telekommunikationsinfrastruktur</b> zu schaffen [15]. Diese kann Arbeitnehmer:innen die Möglichkeit bieten, im Homeoffice zu arbeiten oder auch flexiblere Arbeitszeiten wahrzunehmen. Der gesundheitlichen Belastung langer Pendelfahrten kann damit entgegengewirkt werden [8].</p><p>In der Stadtentwicklung ist der <b>Zeitplan für den Aufbau von Verkehrsinfrastrukturen</b>, wie zum Beispiel einer Bahnlinie, von großer Bedeutung, da Verzögerungen die Verkehrsgewohnheiten der Menschen beeinflussen können. Es ist schwierig, einmal <b>etablierte Verhaltensmuster in der Verkehrsnutzung zu ändern</b>. Die rechtzeitige Bereitstellung sowie der Ausbau des Öffentlichen Personennahverkehrs ist in der Stadtentwicklung von großer Bedeutung, um die Notwendigkeit für den Besitz sowie die Nutzung eines eigenen Personenkraftfahrezeugs zu negieren. Dies wirkt sich dann, aufgrund der <b>Erhöhung der körperlichen Aktivität</b>, auf die Gesundheit der Menschen sowie die Umwelt positiv aus [2].</p><p>Damit Menschen <b>Zugang zu gesunden Arbeitsverhältnissen</b> haben, ist es wichtig, dass sie dabei unterstützt werden, die notwendigen Fähigkeiten für solche Beschäftigungen zu erwerben. Um dies zu erreichen, sollten berufliche Ausbildungen angeboten werden, die sowohl den Bedürfnissen der Gemeinschaft als auch der Umschulung älterer Menschen entsprechen. Hierbei ist es von Bedeutung, auch die <b>erforderliche Infrastruktur</b> bereitzustellen [16,17] zit. n. [3].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(56,NULL,53,NULL,1,NULL,'Maßnahmen zur Stressreduktion im direkten Arbeitsumfeld',NULL,'<h5 class=\'fst-italic\'>Welche Bedeutung hat die Einrichtung gesundheitsfördernder Arbeitsstellen für die Stadtentwicklung?</h5><p>Gesundheitsfördernde Arbeitsstellen sind Arbeitsplätze, welche <b>auf die Bedürfnisse der Arbeitnehmer:innen abgestimmt sind und eine gesunde Arbeitsumgebung fördern</b>. In der Stadtentwicklung kann dies durch die Schaffung geeigneter Gebäude und Arbeitsplätze sowie durch die Förderung gesunder Arbeitsweisen und Lebensstilen unterstützt werden. Ermöglich wird dies beispielsweise durch [3]:<ul><li>Bereitstellung / Versorgung mit Tageslicht,</li><li>Möglichkeiten der Belüftung und</li><li>Temperaturregulierungsoptionen.</li></ul></p><p>Weiterhin kann durch Maßnahmen wie<ul><li>der Bereitstellung von Bereichen für soziale Interaktionen (z.B. Pausenplätze),</li><li>Fitnessgeräte,</li><li>Freiflächen und Ruhebereichen oder</li><li>der Zugang zu gesunden Mahlzeiten und Snacks</li></ul>zur Stressreduktion und Gesundheitsförderung der Arbeitnehmer:innen beigetragen werden [3].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(57,NULL,53,NULL,1,NULL,'Alternativen zum motorisierten Individualverkehr',NULL,'<h5 class=\'fst-italic\'>Welchen Einfluss hat die Förderung von alternativen Mobilitätsangeboten auf gesunde Arbeitsverhältnisse?</h5><p>Zur Bewertung gesunder Arbeitsverhältnisse spielt die <b>Erreichbarkeit der Arbeitsstelle mit öffentlichen Verkehrsmitteln</b> eine wichtige Rolle [3]. Besonders Menschen ohne Zugriff auf privat nutzbare Personenkraftwagen (PKW) sind in diesem Zusammenhang auf ein gut ausgebautes Angebot des Öffentlichen Personennahverkehrs (ÖPNV) angewiesen. Im Sinne der <b>sozialen Chancengleichheit</b> ist die Möglichkeit, mit dem ÖPNV etwa Arbeitsplätze und Bildungseinrichtungen zu erreichen, unerlässlich [11]. Durch eine gut koordinierte Siedlungs- und Verkehrsplanung können auch im Stadtumland <b>umfassende Mobilitätsangebote</b> verwirklicht werden. Besonders bei der Ausweisung und Planung von Neubaugebieten an ÖPNV-fernen Standorten sollte diese Anwendung finden [8].</p><p>Auch die <b>Förderung des Radverkehrs</b> hat einen großen Einfluss auf die Gesundheit. Eine Studie aus dem Jahr 2020 ergab, dass das Pendeln mit dem Fahrrad mit<ul><li>einer 20&nbsp;% geringeren Gesamtmortalität,</li><li>einer 16&nbsp;% geringeren Krebsmortalität,</li><li>einer 24&nbsp;% geringeren Sterblichkeit durch Herz-Kreislauf-Erkrankungen sowie</li><li>einer 11&nbsp;% geringeren Krebsinzidenz</li></ul>im Vergleich zum Pendeln mit dem PKW verbunden ist [12]. Denkbare Ansätze zur Radverkehrsförderung sind unter anderem:<ul><li>die Öffnung von Einbahnstraßen, Bau von Anlagen für den Radverkehr,</li><li>Angebote bewachter Parkhäuser,</li><li>Bau von Abstellanlagen und</li><li>Bike & Ride-Angebote [13].</li></ul></p><p>Von Seiten der Arbeitgeber:innen kann beispielsweise eine Förderung des Radverkehrs durch das Angebot eines Dienstfahrrads ermöglicht werden.</p><p>Die derzeitige Ausgestaltung der Pendlerpauschale bewirkt durch die Förderung langer Pendelstrecken einen Anstieg des Verkehrsaufkommens. Ebenso ermutigt die gegenwärtige Regelung der Dienstwagenbesteuerung zum Kauf von Fahrzeugen. Eine alternative Lösung, um mit diesen Problematiken umzugehen, ist das Mobilitätsbudget-Konzept, das Arbeitnehmer:innen ein Budget für unterschiedliche Mobilitätsangebote zur Verfügung stellt [9].</p><p>Weiterhin sollten <b>Anreize zur aktiven Fortbewegung zu Fuß</b> geschaffen werden. Hierzu zählen eine verbesserte Interkonnektivität von Wegeverbindungen zwischen bestehenden Verkehrswegen, um beispielsweise geringere Entfernungen zwischen Zielorten zu realisieren [3]. Des Weiteren sind <b>Sicherheitsmaßnahmen für den Fuß- und Radverkehr</b> zu verstärken, etwa indem Unfallrisiken durch die gemeinsame Nutzung von Verkehrsflächen durch unterschiedliche Verkehrsteilnehmer:innen (Fußgänger:innen, Radfahrer:innen, Autofahrer:innen) berücksichtigt und vermieden werden. Ermöglicht wird dies beispielsweise durch eine optische oder bauliche Trennung der Verkehrsströme, die zu einer Reduzierung von Verkehrsunfällen führen [14].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(58,NULL,51,53,1,NULL,'Welche direkten Effekte sind durch die Förderung der Schlüsselfaktoren zu erwarten?',NULL,NULL,'container',1,1,'2024-08-30 14:25:25',NULL),
(59,NULL,58,NULL,1,NULL,'Förderung der Bewegung (Alltagsaktivität)',NULL,'<h5 class=\'fest-italic\'>Welchen Einfluss haben kompakte Siedlungsstrukturen auf die Alltagsaktivität?</h5><p>Durch die <b>Umsetzung kompakter Siedlungsstrukturen</b> sind die Wege zwischen Wohnort und Arbeitsstätten im Idealfall so gering, dass sie problemlos zu Fuß, mit dem Fahrrad oder mit dem Öffentlichen Personennahverkehr überwunden werden können. Durch diese <b>Bewegungsförderung</b> wird eine gesteigerte körperliche Alltagsaktivität der Menschen gewährleistet. Diese gesetzten Anreize können durch Angebote zusätzlich gefördert werden, beispielsweise durch die Einrichtung von Bike-Sharing-Angeboten oder sogenannten „Jobfahrräder“-Leihsystemen.</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(60,NULL,58,NULL,1,NULL,'Steigerung der Lebensqualität',NULL,'<h5 class=\'fest-italic\'>Inwiefern beeinflussen kompakte Siedlungsstrukturen die Lebensqualität?</h5><p>Indem die Wegstrecke zwischen dem Wohn- und Arbeitsort durch die <b>Umsetzung kompakter Siedlungsstrukturen</b> möglichst auf ein Minimum reduziert wird, werden lange Pendelstrecken und der damit verbundene Zeitverlust minimiert. Die Möglichkeit zum Homeoffice und die sich daraus ergebende Flexibilität können zu einer Verbesserung der <b>Work-Life-Balance sowie der subjektiv wahrgenommenen Lebensqualitäts-Steigerung</b> beitragen. Mit der Einsparung von Pendelstrecken und -zeiten verfügen die Menschen über mehr zeitliche Kapazitäten für Freizeitaktivitäten sowie sozio-kulturelle/gesellschaftliche Teilhabe.</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(61,NULL,58,NULL,1,NULL,'Reduzierung Stress/Förderung der Erholung',NULL,'<h5 class=\'fest-italic\'>Inwieweit kann der Stress reduziert werden und die Erholung gefördert werden?</h5><p>Indem die Wegstrecke zwischen Wohn- und Arbeitsort durch die <b>Umsetzung kompakter Siedlungsstrukturen</b> möglichst auf ein Minimum reduziert wird, werden lange Pendelstrecken und der damit verbundene <b>Zeitverlust minimiert</b>. Die Möglichkeit zum Homeoffice und die sich daraus ergebende Flexibilität machen ein Pendeln und damit verbundenen Stress überflüssig. Hierdurch verfügen die Menschen zudem über <b>mehr zeitliche Kapazitäten für Freizeitaktivitäten sowie sozio-kulturelle Teilhabe</b>.</p><p>Durch <b>Maßnahmen am Arbeitsplatz</b>, etwa durch Schaffung und Erhalt qualitätsvoller Grünflächen und Ruhebereiche können Stressfaktoren reduziert und die Erholung der Arbeitnehmer:innen gefördert werden.</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(62,NULL,58,NULL,1,NULL,'Verbesserung der Luftqualität',NULL,'<h5 class=\'fest-italic\'>Inwiefern kann durch kompakte Siedlungsstrukturen die Luftqualität verbessert werden?</h5><p>Durch <b>kompakt gestaltete Siedlungsstrukturen</b> werden Arbeitswege reduziert und die Notwendigkeit für den motorisierten Individualverkehr wird minimiert. Die damit einhergehende <b>Reduzierung verkehrsbedingter Abgase</b> führt zu einer Verbesserung der Luftqualität.</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(63,NULL,58,NULL,1,NULL,'Reduzierung der Lärmbelästigung',NULL,'<h5 class=\'fest-italic\'>Welche Auswirkungen auf die Lärmemissionen sind zu erwarten?</h5><p>Durch <b>kompakt gestaltete Siedlungsstrukturen</b> werden Arbeitswege kurzgehalten und die Notwendigkeit für den motorisierten Individualverkehr wird minimiert. Die damit einhergehende <b>Reduzierung verkehrsbedingter Geräuschemissionen</b> führt zu einer Verringerung der Lärmbelastung für die direkt und indirekt betroffenen Anwohner:innen.</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(64,NULL,58,NULL,1,NULL,'Stärkung sozialer Zusammenhalt, Interaktion & Teilhabe',NULL,'<h5 class=\'fest-italic\'>Inwiefern beeinflussen kompakte Siedlungsstrukturen die gesellschaftliche Teilhabe?</h5><p>Durch die <b>Umsetzung kompakter Siedlungsstrukturen</b> werden die Wegstrecken zwischen dem Wohn- und Arbeitsorten möglichst geringgehalten. Pendelstrecken und der damit verbundene Zeitverlust werden minimiert. Es bleibt <b>mehr Zeit für Freizeitaktivitäten und gesellschaftliche Teilhabe</b>. Durch die Möglichkeiten der beruflichen Tätigkeiten in Teilen oder gänzlich aus dem Homeoffice nachzugehen, sorgt für eine deutliche Reduzierung bis zum Wegfall von Wegstrecken zwischen dem Wohn- und Arbeitsort. Die daraus resultierenden freien Zeitfenster ermöglichen Freizeitaktivitäten sowie sozio-kulturelle Teilhabe.</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(65,NULL,58,NULL,1,NULL,'Reduzierung verkehrsbedingter Unfallrisiken',NULL,'<h5 class=\'fest-italic\'>Inwieweit wirken sich minimierte Arbeitswege auf die Risiken im Straßenverkehr aus?</h5><p>Indem die Arbeitswege durch <b>möglichst kompakte Siedlungsstrukturen</b> minimiert werden, sodass diese bequem zu Fuß, mit dem Fahrrad oder mit dem Öffentlichen Personennahverkehr überwunden werden können, wird motorisierter Individualverkehr (MIV) weniger relevant. <b>Durch die reduzierte Anzahl von motorisierten Fahrzeugen im Straßen-/Verkehrsraum wird das Risiko für Verkehrsunfälle gesenkt.</b></p>','default',0,2,'2024-08-30 14:25:25',NULL),
(66,NULL,51,58,1,NULL,'Welche gesundheitlichen Auswirkungen sind durch die direkten Effekte zu erwarten?',NULL,'<h5 class=\'fest-italic\'></h5><p></p>','container',1,1,'2024-08-30 14:25:25',NULL),
(67,NULL,66,NULL,1,NULL,'Verringerte Mortalität',NULL,'<h5 class=\'fest-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Mortalität durch Inaktivität zu erwarten?</h5><p>Faktoren wie eine <b>erhöhte soziale Unterstützung, sozialer Zusammenhalt und soziale Teilhabe</b> verringern das Mortalitätsrisiko [18–20]. Bei <b>Personen in sozialer Isolation</b> ist das Mortalitätsrisiko weitestgehend unabhängig von Verhaltensfaktoren erhöht [21].</p><p>Eine hohe Stressbelastung steht in einem Zusammenhang mit einem um etwa 55&nbsp;% erhöhten Mortalitätsrisiko [22].</p><p>Auch eine höher wahrgenommene Lebensqualität steht in einem Zusammenhang mit geringerem Mortalitätsrisiko [23].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(68,NULL,66,NULL,1,NULL,'Weniger Herz-Kreislauf-Erkrankungen',NULL,'<h5 class=\'fest-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Herz-Kreislauf-Erkrankungen zu erwarten?</h5><p>Mit erhöhter Stressbelastung steigt das Risiko für Herz-Kreislauf-Erkrankungen wie Bluthochdruck, Schlaganfälle oder Herzinfarkte [22]. Auch eine <b>geringere wahrgenommene Lebensqualität</b> kann bei Frauen langfristig das Risiko für das Auftreten von Herz-Kreislauf-Erkrankungen erhöhen [24]. Eine <b>anhaltende Lärmexposition</b> kann außerdem zu einem schnelleren Puls, Bluthochdruck und anderen gesundheitsschädlichen Auswirkungen führen. Die Folge hiervon können beispielsweise Herzinfarkte sein [25]. Auch <b>Arbeitsstätten sind von den Folgen der klimatischen Veränderungen betroffen</b>, welche mit dem Anstieg von Extremwetterereignissen sowie gestiegenen Temperaturen einhergehen. Gerade <b>hohe Temperaturen</b> steigern das Risiko für Herzinfarkte, Herzinsuffizienz und Schlaganfälle. Etwa ein Prozent der jährlich auftretenden Todesfälle durch Herz-Kreislauf-Erkrankungen sind auf Hitze in Folge von klimatischen Veränderungen zurückzuführen. Insbesondere gefährdet sind hochaltrige Personen mit bestehenden kardiovaskulären Vorerkrankungen [26].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(69,NULL,66,NULL,1,NULL,'Weniger Lungenerkrankungen',NULL,'<h5 class=\'fest-italic\'>Inwieweit beeinflussen gesunde Arbeitsverhältnisse das Auftreten von Lungenerkrankungen?</h5><p>Indem Menschen sich auf dem Arbeitsweg in Verkehrsräumen bewegen, werden diese mehr oder weniger von Luftschadstoffen beeinträchtigt. Dies ist dabei abhängig von der <b>Wahl des Fortbewegungsmittels</b> (zu Fuß, Fahrrad, Personenkraftwagen, Öffentlicher Personennahverkehr) sowie der <b>Zusammensetzung der Verkehrsströme</b> (Anteil der jeweiligen Verkehrsmittel) ) [27]. Die Exposition mit Luftschadstoffen steht hierbei im Zusammenhang mit dem Auftreten verschiedener Lungenkrankheiten, wie Asthma, chronisch obstruktiven Lungenerkrankungen (COPD), Lungenkrebs und Atemwegsinfektionen. Insbesondere Kinder und ältere Erwachsene sind dabei stärker empfänglich für die gesundheitsschädigenden Effekte dieser Luftschadstoffe [28].</p><p>In Deutschland wurden im Jahr 2018 in einer mittleren Abschätzung statistisch 63.100 vorzeitige Todesfälle durch Feinstaub (PM2.5) und 9.200 durch Stickstoffdioxid (NO2) verursacht [29] zit. n. [30]. <b>Luftschadstoffe stellen somit eine erhebliche Gesundheitsgefahr dar.</b></p><p>Die deutliche Verringerung der verkehrsbedingten Luftverschmutzung, des Lärms und der Temperatur in städtischen Quartieren kann sich erheblich positiv auf die Gesundheit der Bewohner:innen auswirken und zu einer <b>Verringerung der vorzeitigen Sterblichkeit und Morbidität</b> führen [31].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(70,NULL,66,NULL,1,NULL,'Weniger Krebserkrankungen',NULL,'<h5 class=\'fest-italic\'>Wie beeinflussen gesunde Arbeitsverhältnisse das Auftreten von Krebserkrankungen?</h5><p>Eine geringere wahrgenommene Lebensqualität kann langfristig das Risiko für das Auftreten von verschiedenen Krebserkrankungen erhöhen [32].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(71,NULL,66,NULL,1,NULL,'Verbesserte mentale Gesundheit',NULL,'<h5 class=\'fest-italic\'>Wie wird die mentale Gesundheit durch gesunde Arbeitsverhältnisse beeinflusst?</h5><p>Eine <b>anhaltende Lärmexposition</b> kann zu Unruhe und Angstzuständen führen [25]. Eine <b>erhöhte Stressbelastung</b> steigert das Risiko für Depressionserkrankungen [22]. Zudem steigert das Gefühl einer als <b>geringer wahrgenommenen soziale Unterstützung</b> das Risiko für psychologische Belastungen, insbesondere zeigt sich hier ein Zusammenhang mit depressiven Symptomen und erhöhtem Stressempfinden [33,34]. Die Schwere und Dauer von Depressionserkrankungen ist dann geringer, wenn Personen vermehrt positive soziale Interaktionen erfahren und ein stärkeres Gemeinschaftsgefühl aufweisen [35].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(72,NULL,66,NULL,1,NULL,'Weniger Unfälle/Verletzungen',NULL,'<h5 class=\'fest-italic\'>Wie beeinflussen gesunde Arbeitsverhältnisse die Anzahl an Unfällen/Verletzungen?</h5><p>Indem die Verkehrsräume in einem Quartier für Fußgänger:innen sowie Fahrradfahrer:innen sicherer gestaltet sowie eine <b>Trennung der Verkehrsströmen</b> erfolgt, können die <b>Unfallraten reduziert</b> werden [14,36,37]. Verlagert man zudem die tägliche, aktive Fortbewegung vom motorisierten Individualverkehr hin zur Nutzung des Öffentlichen Personennahverkehrs, des Fahrrads oder des zu Fußgehens, können Unfälle und Verletzungen reduziert werden [37].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(101,14,NULL,NULL,1,NULL,'Welche Bedeutung hat das Schwerpunktthema für eine gesundheitsfördernde Stadtentwicklung?',NULL,NULL,'container',0,1,'2024-08-30 14:25:25',NULL),
(102,NULL,101,NULL,1,NULL,'Umwelt und Gesundheit',NULL,'<h5 class=\'fst-italic\'>Welche Bedeutung hat das Schwerpunktthema für eine gesundheitsfördernde Stadtentwicklung?</h5><p><b>Die Gesundheit ist von der Qualität und Gestaltung der Umwelt abhängig.</b> Stadtplanung und -entwicklung spielen somit eine wichtige Rolle beim Aufbau gesunder und zukunftsfähiger Quartiere, denn durch sie kann die umweltbezogene Gesundheit maßgeblich beeinflusst werden.</p><p>Gesundheitliche Effekte von Umwelteinflüssen zeigen sich in verschiedenen Bereichen: Es bestehen Zusammenhänge zwischen der Luftqualität in Innenstädten und dem Auftreten von Atemwegserkrankungen, dazu gibt es Auswirkungen von Gewässerverunreinigungen auf die menschliche Gesundheit [1]. Ebenso können stationäre Krankenhausaufenthalte aufgrund von Hitze eine potenzielle Folge der erhöhten Temperaturen für die Gesundheit darstellen [2]. Zudem stehen Herz-Kreislauf-Erkrankungen und psychosoziale Belastungen in einem Zusammenhang mit Umgebungslärm [1].</p><p>Die umweltbezogene Gesundheit beschreibt dabei Aspekte menschlicher Gesundheit, die durch <b>physische, biologische und soziale Faktoren</b> der Umwelt beeinflusst werden [3].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(103,NULL,101,101,1,NULL,'Was sind relevante Schlüsselfaktoren für eine gesundheitsfördernde Stadtentwicklung?',NULL,NULL,'container',1,1,'2024-08-30 14:25:25',NULL),
(104,NULL,103,NULL,1,NULL,'Autofreier Verkehr',NULL,'<h5 class=\'fst-italic\'>Welche Effekte entstehen durch eine Reduktion des motorisierten Individualverkehrs (MIV)?</h5><p><b>Der Straßenverkehr ist einer der wichtigsten Faktoren für die Entstehung von Luftschadstoffbelastungen</b>, insbesondere ist er Hauptverursacher von Stickstoffdioxidbelastungen und eine entscheidende Quelle von Feinstaub. <b>Darüber hinaus ist der Autoverkehr eine der größten Quellen für Lärmbelastungen in Städten.</b> Weniger MIV wirkt sich positiv auf beide Umweltprobleme aus. Darüber hinaus wäre es mit dem gewonnenen Platz durch eine reduzierte Autonutzung möglich, wertvolle innerstädtische Flächen für Wohnen und Grün zu schaffen [4].</p><p>Um den MIV zu reduzieren, sind verschiedene Maßnahmen erforderlich. Dazu gehören insbesondere eine strategische Umsetzung des Leitbilds einer funktionsgemischten Stadt mit kurzen Wegen, die Verkehrsentwicklungsplanung, die Gestaltung von Nahverkehrskonzepten sowie eine Parkraumbewirtschaftung. Diese Maßnahmen spielen eine entscheidende Rolle bei der Förderung umweltschonender Verkehrsmittel [4].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(105,NULL,103,NULL,1,NULL,'Verbesserung der ÖPNV-Infrastruktur',NULL,'<h5 class=\'fst-italic\'>Welche Effekte entstehen durch guten Öffentlichen Personennahverkehr (ÖPNV)?</h5><p>ÖPNV ist in der Lage, die Verkehrsbelastung in Städten und damit auch die Luftqualität dieser zu verbessern [5].</p><p>Zudem fördert das Zurücklegen von Wegstrecken durch öffentliche Verkehrsmittel bei den Nutzer:innen das Zufußgehen, somit begünstigt der Zugang zum ÖPNV die Erreichung der Mindestempfehlungen für körperliche Aktivität [6,7].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(106,NULL,103,NULL,1,NULL,'Nachhaltiges Gewässermanagement',NULL,'<h5 class=\'fst-italic\'>Welche Effekte entstehen durch nachhaltiges Gewässermanagement?</h5><p>Nachhaltiges Gewässermanagement bringt verschiedene Vorteile mit sich, unter anderem kann dieses durch die Vermeidung von Gewässerverunreinigungen eine <b>bessere Wasserqualität und eine höhere Verfügbarkeit von hochwertigem Trinkwasser</b> bewirken. Daneben können durch nachhaltiges Gewässermanagement die Auswirkungen von Naturkatastrophen wie Dürren oder Überschwemmungen minimiert werden [1].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(107,NULL,103,NULL,1,NULL,'Klimaangepasste Infrastruktur',NULL,'<h5 class=\'fst-italic\'>Welche Effekte entstehen durch klimaangepasste Infrastruktur?</h5><p>Im städtischen Kontext wird zwischen grünen (Hausgärten, Parks, Grünverbindungen, Gründächer) und blauen (Gewässer, Überflutungsbereiche, Entwässerungssysteme) Infrastrukturen unterschieden. Bei blauer und grüner Infrastruktur handelt es sich sowohl um natürlich gewachsene als auch um naturnah angelegte Grün- und Wasserflächen [8]. Diese haben bei der Entwicklung klimaangepasster Städte eine wichtige Funktion, da sie beispielsweise die <b>Umgebung auf natürliche Weise kühl halten, die Luftqualität verbessern und Begegnungsräume für soziale Interaktionen und zur Freizeitgestaltung schaffen</b> [9].</p><p>Darüber hinaus ist es über die Bereitstellung von Schattenplätzen, beispielsweise durch Straßenbäume, möglich, den Hitzestress in Städten zu reduzieren [10].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(108,NULL,103,NULL,1,NULL,'Verbesserung des Lärmschutzes',NULL,'<h5 class=\'fst-italic\'>Inwiefern kann Lärmschutz zur Reduktion von Umgebungslärm beitragen?</h5><p>Es gibt verschiedene Arten von Umgebungslärm. Eine der wichtigsten davon ist der Verkehrslärm, welcher durch Straßen-, Schienen- und Luftverkehr entsteht.</p><p>Lärmschutz kann unter anderem durch geschlossene bauliche Strukturen, wie <b>Blockrandbebauung oder lärmabschirmende Maßnahmen</b>, umgesetzt werden.</p><p>Darüber hinaus spielt die <b>Reduktion des motorisierten Individualverkehrs</b> eine maßgebliche Rolle, welcher für einen großen Anteil des Umgebungslärms in Städten verantwortlich ist [4].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(109,NULL,103,NULL,1,NULL,'Thematisierung potenzieller Gefahren',NULL,'<h5 class=\'fst-italic\'>Welche Effekte entstehen durch die Thematisierung potenzieller Gefahren?</h5><p>Potenzielle Gefahren durch Naturkatastrophen, wie Waldbrände oder Überschwemmungen sollten im Rahmen der Katastrophenvorsorge berücksichtigt werden.</p><p>Im Falle des möglichen Eintritts ist es wichtig, auf bestehende <b>Katastrophenschutz- und Bevölkerungsschutzpläne</b> zurückzugreifen und dadurch die Bevölkerung vor den Effekten der potenziellen Katastrophen zu schützen [1].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(110,NULL,101,103,1,NULL,'Welche direkten Effekte sind durch die Förderung der Schlüsselfaktoren zu erwarten?',NULL,NULL,'container',1,1,'2024-08-30 14:25:25',NULL),
(111,NULL,110,NULL,1,NULL,'Weniger Emissionen',NULL,'<h5 class=\'fst-italic\'>Welche Emissionen können im Kontext gesundheitsfördernder Stadtentwicklung reduziert werden?</h5><p>Durch die Förderung der stadtplanerischen Schlüsselfaktoren ist es möglich, gesundheitsschädliche Emissionen zu reduzieren. Dazu zählen im Einzelnen die <b>Luftverschmutzung, Umgebungslärm, Geruchsemissionen, Lichtverschmutzung und Wasserverunreinigungen</b>.</p><p>Der Begriff Luftverschmutzung bezeichnet eine Mischung aus anthropogenen Schadstoffen und natürlichen Quellen, welche insbesondere in städtischen Gebieten häufig auftritt. Etwa neun von zehn Menschen, die weltweit in städtischen Gebieten leben, sind von Luftverschmutzung betroffen [11].</p><p>In zahlreichen Ländern Europas und weltweit ist Lärm zu einem weit verbreiteten Phänomen geworden, insbesondere in städtischen Wohngebieten. Der Verkehrslärm allein stört tagsüber ein Drittel der Bevölkerung in Europa, während ein Fünftel unter durch Lärm verursachten Schlafstörungen leidet [12].</p><p>Der Sammelbegriff Lichtverschmutzung bezeichnet die nicht intendierten Auswirkungen künstlicher Beleuchtung [13].</p><p>Wenngleich öffentliche Beleuchtung einen wichtigen Beitrag zum Schutz, Sicherheit und visuellen Attraktivität der Umgebung leistet, können bei schlechter Platzierung Beeinträchtigungen wie Schlafstörungen, störendes Licht auf Anwohnergrundstücken, Verschwendung von Licht in den Nachthimmel und starke Blendung auftreten [1].</p><p>Wasserverunreinigungen können durch Verunreinigungen von Bade- und Freizeitgewässern entstehen, im Wasser überdauernde Parasiten, Hepatitis-Viren und Bakterien können außerdem durch ungenügend desinfiziertes Trinkwasser und/oder Wasser in Schwimmbädern übertragen werden [1].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(112,NULL,110,NULL,1,NULL,'Weniger Hitzebelastung',NULL,'<h5 class=\'fst-italic\'>Wie definiert sich Hitzeexposition und wie ist die Entwicklung hinsichtlich des Klimawandels?</h5><p><b>Bei einer Hitzewelle handelt es sich um eine längere Periode ungewöhnlich hoher atmosphärischer Hitzebelastung</b>, welche temporär die Lebensweise der Bevölkerung verändert und negative gesundheitliche Folgen für diese haben kann [14]. Besonders gefährdet sind bei Hitzebelastung ältere Personen, Kinder und Schwangere [15].</p><p>Mit dem Klimawandel steigen sowohl die Durchschnitts- als auch die Extremtemperaturen. Dabei werden Hitzewellen sowie heiße Tage  und Tropennächte häufiger und extremer.</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(113,NULL,110,NULL,1,NULL,'Reduktion der Gefahrenpotentiale',NULL,'<h5 class=\'fst-italic\'>Welche Umweltgefahren können im Kontext gesundheitsfördernder Stadtentwicklung entstehen?</h5><p>Der Klimawandel und der damit verbundene Anstieg von Extremwetterereignissen begünstigt Gefahrenpotentiale, wie <b>Hitzewellen, Überschwemmungen und Waldbrände</b> [16].</p><p>Solche Umweltereignisse können sich negativ auf die menschliche Gesundheit auswirken, da Betroffene sowohl körperlich als auch psychisch beeinträchtigt werden können.</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(114,NULL,101,110,1,NULL,'Welche gesundheitlichen Auswirkungen sind durch die direkten Effekte zu erwarten?',NULL,'','container',1,1,'2024-08-30 14:25:25',NULL),
(115,NULL,114,NULL,1,NULL,'Verringerte Mortalität',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf die Mortalität zu erwarten?</h5><p>Während der Sommermonate führen <b>Hitzewellen</b> regelmäßig zu einer signifikanten Steigerung der Sterberaten, insbesondere bei älteren Menschen [17].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(116,NULL,114,NULL,1,NULL,'Weniger Herz-Kreislauf-Erkrankungen',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Herz-Kreislauf-Erkrankungen zu erwarten?</h5><p>Eine <b>anhaltende Lärmexposition</b> kann zu schnellerem Puls, Bluthochdruck und anderen gesundheitsschädigenden Auswirkungen wie Herzinfarkt führen [12].</p><p>Dem <b>Umgebungslärm</b> sind jährlich in allen EU-Ländern unter anderem 61.000 verlorene gesunde Lebensjahre durch koronare Herzkrankheiten zuzuschreiben [18].</p><p>Bei <b>hohen Temperaturen</b> steigt das Risiko für Herzinfarkte, Herzinsuffizienz und Schlaganfälle. Etwa ein Prozent der jährlich auftretenden Todesfälle durch Herz-Kreislauf-Erkrankungen sind auf Hitze zurückzuführen. Insbesondere gefährdet sind hochaltrige Personen mit bestehenden kardiovaskulären Vorerkrankungen [2].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(117,NULL,114,NULL,1,NULL,'Weniger Lungenerkrankungen',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Lungenerkrankungen zu erwarten?</h5><p>Die <b>Exposition mit Luftschadstoffen</b> steht im Zusammenhang mit dem Auftreten verschiedener Lungenkrankheiten, wie Asthma, COPD, Lungenkrebs und Atemwegsinfektionen.</p><p>Insbesondere Kinder und ältere Personen sind dabei stärker empfänglich für die gesundheitsschädigenden Effekte dieser Luftschadstoffe [11].</p><p>Wenngleich lästige Gerüche meist nicht gesundheitsschädlich sind, können durch Feinstaube und Gase Krankheiten und Atemwegsprobleme hervorgerufen werden.</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(118,NULL,114,NULL,1,NULL,'Weniger Schlafstörungen',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Schlafstörungen zu erwarten?</h5><p>Durch unangenehme Gerüche können sekundäre Effekte wie Schlaflosigkeit oder Unbehagen entstehen.</p><p>Durch <b>Lichtverschmutzung</b> können Schlafstörungen entstehen [19]. Die negativen Effekte auf Wachheit und Schlaf entstehen dabei, indem das zirkadiane System sowie das Hormon Melatonin beeinflusst werden. [20].</p><p>Dem <b>Umgebungslärm</b> sind jährlich in allen EU-Ländern unter ca. 900.000 verlorene gesunde Lebensjahre durch Schlafstörungen zuzuschreiben. Die Hauptlast trägt dabei der Verkehrslärm, welcher maßgeblich für Schlafstörungen verantwortlich ist [18].</p><p><b>Tropennächte (Nachtmindesttemperaturen über 20 °C)</b> können Schlafstörungen verursachen und stellen eine erhebliche thermophysiologische Belastung dar [19].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(119,NULL,114,NULL,1,NULL,'Verringerung von Tinnitus',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Hörschädigungen/Tinnitus zu erwarten?</h5><p>Eine <b>anhaltende Lärmexposition</b> kann zu Tinnitus und Hörverlust führen [12].</p><p>Dem <b>Umgebungslärm</b> sind jährlich in allen EU-Ländern unter 22.000 verlorene gesunde Lebensjahre durch Tinnitus zuzuschreiben [18].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(120,NULL,114,NULL,1,NULL,'Weniger Infektionskrankheiten',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Infektionskrankheiten zu erwarten?</h5><p>Durch <b>Verunreinigungen von Bade- und Freizeitgewässern</b> können Ausbrüche von Infektionskrankheiten in Kommunen entstehen. Dabei geht das größte Risiko von Verunreinigungen des Wassers durch Bakterien, Viren und Algen aus [1].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(121,NULL,114,NULL,1,NULL,'Verringerung psychischer Beeinträchtigung',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf psychische Beeinträchtigungen zu erwarten?</h5><p>Eine <b>anhaltende Lärmexposition</b> kann zu Unruhe und Angstzuständen führen [12].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(122,NULL,114,NULL,1,NULL,'Verbesserte Krankheitskontrolle',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf bestehende Krankheiten zu erwarten?</h5><p><b>Hitze</b> kann Erschöpfungssymptome und Hitzschlag auslösen, dazu können bestehende Erkrankungen wie Herz-Kreislauf-, Atemwegs-, Nieren- oder psychische Erkrankungen verschlimmert werden. Insbesondere ab einer Tageshöchsttemperatur von 30 °C steigt das Risiko für temperaturbedingte Gesundheitsauswirkungen [21].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(151,15,NULL,NULL,1,NULL,'Welche Bedeutung hat das Schwerpunktthema für eine gesundheitsfördernde Stadtentwicklung?',NULL,NULL,'container',0,1,'2024-08-30 14:25:25',NULL),
(152,NULL,151,NULL,1,NULL,'Öffentliche (Frei-)Räume sind Orte der Aneignung, Nutzung, Bewegung, Entspannung, Erholung, Interaktion, Begegnung und Teilhabe.',NULL,'<h5 class=\'fst-italic\'>Welche Bedeutung hat das Schwerpunktthema für eine gesundheitsfördernde Stadtentwicklung?</h5><p>Öffentliche (Frei-)Räume stellen das Gegenstück zu privaten (Frei-)Räumen dar. Diese können grundsätzlich von jeder Person ohne Einschränkungen genutzt werden. Öffentliche Räume bilden sich aus der gebauten städtischen Umwelt heraus und umfassen dabei Park- und Platzanlagen, Gärten, Sportanlagen, Straßenräume sowie Wegeverbindungen [1,2].</p><p>Öffentlichen (Frei-)Räumen werden in der Regel <b>positive Auswirkungen auf die physische sowie psychische Gesundheit des Menschen</b> zugeschrieben. Sie sind Orte:<ul><li>der Aneignung</li><li>der Begegnung</li><li>der Entspannung</li><li>des Spiels und Sports</li><li>der Durchquerung, um zu einer Zieldestination zu gelangen</li></ul></p><p><b>Voraussetzung für die Aneignung und Nutzbarkeit</b> dieser Räume, die eine Verbesserung der Gesundheit und sozialen Teilhabe begünstigen können, sind jedoch bestimmte Faktoren. Dazu zählen:<ul><li>die physische Zugänglichkeit</li><li>qualitativ hochwertige und ansprechende Gestaltung</li><li>Sicherheit</li></ul></p><p>Sind diese Faktoren oder Bedingungen nicht oder nur teilweise erfüllt, werden diese Räume weniger genutzt und haben hierdurch indirekte, negative Auswirkungen auf die menschliche Gesundheit [1]. Diese nachteiligen Effekte werden an entsprechender Stelle ausgeführt. <b>Die Aneignung oder das „Sich-nutzbar-machen“ ist als Prozess zu verstehen, der beschreibt, wie Menschen sich die gegebenen räumlichen Strukturen und Ausstattungen aneignen</b> [3]. Diese Nutzung kann dem geplanten Zweck folgen oder die Ausstattung/Gestaltung „zweckentfremden“, beispielsweise indem eine Sitzbank sowohl für den Aufenthalt oder als Sportgerät Verwendung findet [4].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(153,NULL,151,151,1,NULL,'Was sind relevante Schlüsselfaktoren für eine gesundheitsfördernde Stadtentwicklung?',NULL,NULL,'container',1,1,'2024-08-30 14:25:25',NULL),
(154,NULL,153,NULL,1,NULL,'Schaffung und Erhalt von (Frei-)Räumen',NULL,'<h5 class=\'fst-italic\'>Warum ist es von Bedeutung, dass Öffentliche (Frei-)Räume erhalten und neu geschaffen werden?</h5><p>Öffentliche (Frei-)Räume sind ein unerlässlicher Bestandteil von Städten, die mit einer Fülle von positiven Eigenschaften sowie Wirkungen für die Stadtbewohner:innen assoziiert sind. Aus diesem Grund ist es wichtig, <b>bestehende Öffentliche (Frei-)Räume zu erhalten und qualitativ aufzuwerten sowie das Angebot dieser stetig zu erweitern und untereinander zu vernetzen</b>. Dabei sind verschiedene, grundlegende Aspekte zu beachten, etwa die zugrundeliegende Hierarchie der Öffentlichen (Frei-)Räume oder die Anpassung an sich verändernde klimatische Verhältnisse.</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(155,NULL,153,NULL,1,NULL,'Veränderung von Prioritäten',NULL,'<h5 class=\'fst-italic\'>Wie sollten die Prioritäten in Öffentlichen (Straßen-)Räumen gesetzt werden?</h5><p>In Anlehnung an das in Großbritannien entwickelte „Manual for Streets“ soll bei der Entwicklung und Neuplanung von Verkehrsräumen, wie Straßen und deren zugeordneten Räumen, eine <b>veränderte Hierarchisierung der Verkehrsteilnehmer:innen</b> zur Anwendung kommen [5] zit. n. [1]. Diese sollte folgende Punkte umfassen:<ul><li>Schwächung des motorisierten Individualverkehrs (MIV) bei gleichzeitiger Stärkung anderer Verkehrsteilnehmer:innen/Fortbewegungsformen</li><li>Rücknahme der Nutzung und Unterbringung des MIV im Straßenraum (Reduzierung von Stellplätzen)</li><li>Erschließung von Aufenthalts- und Nutzungspotentialen in Straßen- und angrenzenden, öffentlichen Räumen</li><li>Erhöhung der Verkehrssicherheit durch strikte (bauliche oder optische) Trennung der Verkehrsteilnehmer:innen</li><li>Schaffung von kompakteren, städtischen Strukturen (Stadt der kurzen Wege, 15-Minuten-Stadt) zur Erhöhung der Alltagsaktivität bei gleichzeitiger Abkehr vom Prinzip der autogerechten Stadt [6,7]</li></ul></p><p>Die daraus resultierende <b>Neuordnung der Hierarchie von Verkehrsteilnehmer:innen</b> würde demnach diesem Schema folgen:</p><p class=\'text-center fw-bold\'>Fußgänger:innen <i class=\'bi-arrow-right\'></i> Radfahrer:innen / Öffentlicher Personennahverkehr <i class=\'bi-arrow-right\'></i> Sonderfahrzeuge <i class=\'bi-arrow-right\'></i> MIV</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(156,NULL,153,NULL,1,NULL,'Verbesserung der Klimaanpassung',NULL,'<h5 class=\'fst-italic\'>Welche Rolle spielen Klimaanpassungsmaßnahmen im Kontext einer gesundheitsförderlichen Stadtentwicklung? // Wie wirken sich Klimaanpassungsmaßnahmen auf die menschliche Gesundheit aus?</h5><p>Durch den Anstieg von Extremwetterereignissen sowie von heißen, sonnigen Tagen im Jahresdurchschnitt als Folge des zunehmenden, anthropogen verstärkten Klimawandels, sind Klimaanpassungsmaßnahmen zu ergreifen, um Öffentliche (Frei-)Räume dauerhaft für alle Bevölkerungsgruppen nutzbar zu gestalten.</p><p><b>Gerade vulnerable Gruppen</b>, wie ältere Menschen, Kinder, Jugendliche, Menschen mit körperlichen Einschränkungen sowie Schwangere, <b>werden in ihrem Alltag durch extreme Temperaturen stärker beeinflusst</b>. Durch die Nutzung von Klimaanpassungsmaßnahmen bei Neuplanungen oder der Umgestaltung bestehender Öffentlicher (Frei-)Räume kann den negativen Auswirkungen von Hitzestress aktiv begegnet werden. Selbstverständlich profitieren alle anderen Bevölkerungsgruppen, welche nicht zu den oben genannten Gruppen zählen, ebenfalls von klimaangepassten öffentlichen (Frei-)Räumen, die durch die Verschattungs- und Wasserelemente sowohl für den Aufenthalt sowie die Durchquerung besser nutzbar werden [1].</p><p>Zu sinnvollen <b>Klimaanpassungsmaßnahmen</b> zählen [1,8,9]:<ul><li>Erhalt bzw. Schaffung von Grün- und Wasserflächen, u.a. als Kalt- und Frischluftentstehungsgebiete</li><li>Pflanzung und Pflege von klimatisch angepasster und resilienter Vegetation</li><li>Installation von Verschattungs- und Wasserelementen sowie von Trinkwasserspendern</li><li>Vorhalten von Retentionsflächen (Wasserrückhalteflächen)</li></ul></p>','default',0,1,'2024-08-30 14:25:25',NULL),
(157,NULL,153,NULL,1,NULL,'Förderung sozialer Begegnung und Interaktion',NULL,'<h5 class=\'fst-italic\'>Welche Bedeutung haben Öffentliche (Frei-)Räume für die soziale Begegnung und Interaktion zwischen einzelnen Individuen sowie Bevölkerungsgruppen?</h5><p>Indem Öffentliche (Frei-)Räume Bereiche oder Flächen für den Aufenthalt sowie für zwischenmenschliche Interaktionen vorhalten, können positive Gesundheitseffekte erzielt werden. Berücksichtigen diese Räume zudem verschiedene ethnische oder sozio-kulturelle Ansprüche von Anwohner:innen, können diese Wirkungen verstärkt werden [10]. Zu diesen zählen etwa die Durchführung von verschiedenen Aktivitäten in Öffentlichen (Frei-)Räumen, beispielsweise das Grillen einer Großfamilie oder die Durchführung von i.d.R. eher als privat wahrgenommenen Tätigkeiten wie dem Stricken während das Kind / die Kinder auf dem Spielplatz spielen [11]. Werden diese Tätigkeiten in Öffentlichen (Frei-)Räumen ermöglicht, können verschiedene Zielgruppen profitieren.</p><p>Darüber hinaus sind <b>besonders für die Zielgruppe der Kinder und Jugendlichen Räume für Spielen, Bewegung und Zusammentreffen zu planen und bestehende weiterzuentwickeln</b>. Es empfiehlt sich, entgegen der Planungstradition, diesen Zielgruppen mehr Freiheiten einzuräumen. Dies bedeutet konkret, den Kindern und Jugendlichen die Möglichkeiten einzuräumen, das Spiel nicht nur in vorgeschriebenen Bereichen, sondern innerhalb eines gesamten Quartiersumfeldes selbstständig zu erkunden und zu nutzen. Dabei kommen neben Plätzen und Parkanlagen auch der Straßenraum und diesem angeschlossene Flächen zum Einsatz. Grundvoraussetzung hierfür sind jedoch <b>Maßnahmen der Verkehrsberuhigung oder ein gänzliches Verbot des motorisierten Individualverkehrs</b> [1,12].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(158,NULL,153,NULL,1,NULL,'Einschränkung gesundheitsschädlicher Nutzungen',NULL,'<h5 class=\'fst-italic\'>Welche Nutzungen sollten aus Gründen des Schutzes vulnerabler Gruppen sowie zur Gesundheitsprävention in Öffentlichen (Frei-)Räumen eingeschränkt werden?</h5><p>Um eine gesundheitsförderliche Stadtentwicklung zu begünstigen sowie besonders vulnerable Bevölkerungsgruppen zu schützen, ist es sinnvoll, über das <b>Verbot oder zumindest eine starke Reglementierung bestimmter Verhaltensweisen in Öffentlichen (Frei-)Räumen</b> zu diskutieren. Hierzu zählt der <b>Konsum von Alkohol und Tabakwaren</b>, da diese direkte sowie indirekte negative gesundheitliche Auswirkungen auf verschiedene, besonders aber auf vulnerable, Bevölkerungsgruppen aufweisen. Aktives und passives Rauchen zählen in Deutschland zu den Hauptursachen für Erkrankungen und Todesfälle. Ebenso sind Überlegungen zur räumlichen Einschränkung oder einem Verbot des Alkoholkonsums in Öffentlichen (Frei-)Räumen, insbesondere <b>zum Schutz sowie zur Prävention für Kinder und Jugendliche</b>, relevant. Gerade diese Gruppe wird durch Beobachtung von Alkoholkonsum für diesen desensibilisiert und Konsum von Alkohol in Öffentlichen (Frei-)Räumen normalisiert.</p><p>Über die unmittelbaren gesundheitlichen Schäden hinaus sind Kommunen zudem mit der Problematik von Zigarettenabfällen konfrontiert. Durch eine stärkere Reglementierung oder Verbote des Rauchens auf öffentlichen Plätzen, in Kombination mit anderen Maßnahmen, wie Informationskampagnen oder Strafgebühren, könnte die Problematik abgemildert werden. Des Weiteren weisen Zigarettenabfälle sozio-ökonomische, umweltrelevante sowie ästhetische Negativfolgen für den Menschen, aber auch den Stadtraum auf. Durch die ordnungsgemäße Entsorgung von Zigarettenabfällen im Öffentlichen (Frei-)Raum kann verhindert werden, dass umweltschädliche und giftige Chemikalien in den Boden gelangen [13].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(159,NULL,153,NULL,1,NULL,'Verbesserung des Sicherheitsgefühls',NULL,'<h5 class=\'fst-italic\'>Wie befördert die Ausgestaltung von Öffentlichen (Frei-)Räumen das Sicherheitsgefühl?</h5><p>Durch eine angepasste Stadtgestaltung sowie städtebauliche Entwicklung können Angsträume und Tatgelegenheiten vermieden werden und ein verbessertes Sicherheitsgefühl entstehen. Zu den Möglichkeiten, dies städtebaulich zu gewährleisten, zählen beispielsweise:<ul><li>Verwendung verbesserter Beleuchtung im öffentlichen Raum</li><li>Schaffung übersichtlicher, gut einsehbarer Wege, Hauseingänge und Freiflächen [14] zit. n. [1].</li><li>Verwendung vandalismusresistenter Materialien [15] zit. n. [1].</li></ul></p><p>Finden zudem verschiedene Nutzungen in Öffentlichen (Frei-)Räumen durch vielfältige Aneignungsmöglichkeiten oder Anreize zur diversen Nutzung in einem verträglichen Maß statt, wird Aktivität hervorgerufen oder erhöht. <b>Durch diese Belebung des Raumes sinkt das Kriminalitätsrisiko und das allgemeine Sicherheitsgefühl wird verbessert</b> [12] zit. n. [1].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(160,NULL,153,NULL,1,NULL,'Verbesserung der Zugänglichkeit',NULL,'<h5 class=\'fst-italic\'>Inwiefern wirken sich optische Gestaltung und physische Zugänglichkeit eines Freiraums auf die menschliche Gesundheit aus?</h5><p>Für die Nutzung, den Aufenthalt sowie das „Sich-nutzbar-machen“ [3] von Öffentlichen (Frei-)Räumen ist es unerlässlich, dass diese zugänglich gestaltet sind. Grundlegendes Ziel von Stadtentwicklungsvorhaben, die direkt oder indirekt Einfluss auf Öffentliche (Frei-)Räume nehmen, sollte es sein, die <b>Fußgängerfreundlichkeit und Bewegungsförderung zu verstärken</b> [1]. Ermöglicht wird dies, indem Freiräume optisch und physisch ansprechender sowie zugänglicher ausgestaltet werden. Dabei werden Öffentliche (Frei-)Räume für mehr Zielgruppen (Senioren, Schwangere, Menschen mit körperlichen Einschränkungen, Kinder, Jugendliche) nutz- und erlebbar und tragen gleichermaßen zur Verbesserung der gesundheitlichen Entwicklung bei. Wichtige Kenngrößen der Verbesserung von Zugänglichkeit und Nutzbarkeit Öffentlicher (Frei-)Räume umfassen [1]:<ul><li>Barrierefreiheit</li><li>Anzahl von Wegeverbindungen</li><li>Belag und Beschaffenheit von Wegeverbindungen</li><li>Zugangspunkte zu öffentlichen (Frei-)Räumen (Zugangswege und -möglichkeiten).</li></ul></p>','default',0,1,'2024-08-30 14:25:25',NULL),
(161,NULL,153,NULL,1,NULL,'Verbesserung der Erreichbarkeit',NULL,'<h5 class=\'fst-italic\'>Welche Bedeutung haben Erreichbarkeit und Entfernung zu Öffentlichen (Frei-)Räumen für die Gesundheitsförderung?</h5><p>Des Weiteren ist das Angebot an Öffentlichen (Frei-)Räumen so zu entwickeln, dass es für alle Zielgruppen in zumutbaren, fußläufigen Entfernungen zur Verfügung steht.</p><p><b>Öffentliche Frei- und Grünräume sollten bei Stadtentwicklungsvorhaben, ausgehend von Wohn- und Arbeitsorten, in geringen sowie zumutbaren Entfernungen fußläufig erreichbar sein.</b> Dadurch werden diese wichtigen Räume für vulnerable Gruppen, wie ältere Menschen, Menschen mit Beeinträchtigungen, Schwangere sowie Kinder und Jugendliche, zur Verfügung gestellt. Gerade Kinder profitieren von qualitativ hochwertigen sowie aneignungsfähigen (Frei-)Räumen, da diese Kreativität sowie eine gesündere Entwicklung durch ein erhöhtes Aktivitätsniveau ermöglichen [1].</p><p>In der Planungspraxis hat sich eine <b>Entfernung von 400-500m, welche einem Fußweg von ungefähr fünf Minuten entspricht, als zumutbar etabliert</b> [16] zit. n. [1]. Diese Entfernung kann auf 600m erweitert werden, sollten sich im unmittelbaren Einzugsgebiet ÖPNV-Haltestellen befinden [17], da diese Anreize schaffen, auch größere Entfernungen in Kombination mit Fußwegen zurückzulegen. Wenn die Öffentlichen Frei- und Grünanlagen zudem an ein bestehendes Fahrradnetz angebunden sind, können diese auch über Quartiers- und Stadtteilgrenzen hinaus für die Naherholung genutzt werden [1].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(162,NULL,153,NULL,1,NULL,'Hochwertige Gestaltungsqualität',NULL,'<h5 class=\'fst-italic\'>Was zeichnet eine hochwertige Gestaltungsqualität Öffentlicher (Frei-)Räume aus und inwiefern nehmen sie Einfluss auf die menschliche Gesundheit?</h5><p>Der Grad an potentiellen positiven Auswirkungen Öffentlicher (Frei-)Räume ist eng mit der Qualität der vorhandenen Ausstattung verbunden. Dabei ist es entscheidend, hochwertige, vielfältige Gestaltungen anzustreben, welche dabei möglichst umfängliche positive, gesundheitliche Effekte für die Nutzer:innen hervorrufen.</p><p><b>Hierbei spielen das Vorhandensein, die Ausstattung sowie die Mischung verschiedener, abwechslungsreicher Freiraumtypen, -arten und -gestaltungen eine Rolle.</b> Dazu zählen:<ul><li>Große, weitläufige Öffentliche (Frei-)Räume mit guten Wegeverbindungen, Sport- und Spielgeräten, die vor allem für Bewegung (Fahrradfahren und Spazierengehen) sowie für den Aufenthalt genutzt werden [12].</li><li>Kleine Park- und Grünanlagen, bspw. Pocket Parks, als Möglichkeit den öffentlichen Straßenraum aufzulockern und diese zu „Plätzen“ weiterzuentwickeln anstatt sie nur als Durchgangswege wahrzunehmen [12].</li><li>Abwechslungsreichtum, guter Pflegezustand, Beschaffenheit und technische Ausstattung sind ebenso von Bedeutung.</li><li>Naturnahe Gestaltung, begünstigt Erholungswirkungen sowie Stressabbau.</li><li>Ausreichende Sitzmöglichkeiten, welche grundsätzlich Entspannung und Erholung in den (Frei-)Räumen, sowie Pausen von Spaziergängen insbesondere für ältere Menschen ermöglichen [18].</li><li>Angebot an zugänglichen und gepflegten öffentlichen Toiletten, ein insbesondere für ältere Menschen wichtiger Gestaltungsfaktor, der einen bedenkenlosen Aufenthalt in Öffentlichen (Frei-)Räumen ermöglicht [18].</li></ul></p>','default',0,1,'2024-08-30 14:25:25',NULL),
(163,NULL,153,NULL,1,NULL,'Verbesserung der Aneignung',NULL,'<h5 class=\'fst-italic\'>Wie befördert eine breites Aneignungs- und Angebotsspektrum in Öffentlichen (Frei-)räumen eine gesundheitsförderliche Planung?</h5><p>Ein <b>breites Angebotsspektrum befördert die Alltagsaktivität</b> von Menschen in einem Quartier. Indem verschiedene Angebote sowie Aneignungsmöglichkeiten geschaffen werden, entstehen <b>Anreize, sich körperlich den eigenen Ansprüchen und Präferenzen entsprechend zu betätigen</b>. Die Erhöhung der Alltagsaktivität wird zudem durch Angebote des Vereinssports, beispielsweise durch Sportplätze mit spezifischen Ausstattungen oder durch die Installation von Geräten oder Ausstattungen in Öffentlichen Räumen, welche für die Ausführung von Individualsportarten (Kraftsport, Spazierengehen, Joggen, Radfahren) genutzt werden kann, gewährleistet [1].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(166,NULL,151,153,1,NULL,'Welche direkten Effekte sind durch die Förderung der Schlüsselfaktoren zu erwarten?',NULL,NULL,'container',1,1,'2024-08-30 14:25:25',NULL),
(167,NULL,166,NULL,1,NULL,'Förderung der Bewegung (Alltagsaktivität)',NULL,'<h5 class=\'fst-italic\'>Inwiefern können die Schlüsselfaktoren die Alltagsaktivität beeinflussen?</h5><p>Öffentliche (Frei-)Räume wie Parks und Grünanlagen gelten als zentrale Infrastrukturelemente, die zu körperlicher Aktivität anregen. Indem diese <b>optisch ansprechend und physisch zugänglich gestaltet</b> werden, fördern diese die Bewegung und Fußgängerfreundlichkeit. Wenn die <b>Ansprüche verschiedener Nutzer:innengruppen berücksichtigt</b> werden, wird ein gesteigertes Maß an körperlicher Alltagsaktivität (Bewegung) ermöglicht. Auch die <b>Nähe des Wohnorts zu Öffentlichen (Frei-)Räumen</b>, wie Parks und öffentlichen Erholungs- und Sporträumen, ist im Allgemeinen mit mehr körperlicher Aktivität verbunden, da die Erreichbarkeit verbessert und der damit verbundene Zeitaufwand reduziert wird [19].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(168,NULL,166,NULL,1,NULL,'Steigerung der Lebensqualität',NULL,'<h5 class=\'fst-italic\'>Lässt sich die Lebensqualität durch die Förderung der Schlüsselfaktoren verbessern?</h5><p>Durch den Erhalt und die Schaffung vielfältig ausgestalteter, qualitativ hochwertiger Öffentlicher (Frei-)Räume, welche darüber hinaus den <b>Ansprüchen der verschiedensten Ziel- und Nutzer:innengruppen entsprechen</b>, tragen diese zur Verbesserung der Lebensqualität und dem Wohlbefinden bei. Besonders vulnerable Gruppen, wie Kinder, ältere und/oder beeinträchtige Personen, können von den vielfältigen Vorteilen Öffentlicher (Frei-)Räume profitieren.</p><p>Dabei werden besonders folgende, <b>immaterielle Dimensionen von Lebensqualität</b> beeinflusst [20]:<ul><li>Gesundheit</li><li>Qualität der Umwelt</li><li>Persönliche Sicherheit</li><li>Work-Life-Balance</li></ul></p>','default',0,1,'2024-08-30 14:25:25',NULL),
(169,NULL,166,NULL,1,NULL,'Reduzierung von Stress / Förderung der Erholung',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Stress und Erholung zu erwarten?</h5><p>Als Orte der Entspannung tragen Öffentliche (Frei-)Räume direkt und indirekt zur Reduzierung von Stressfaktoren sowie zur Förderung der Erholung von Stadtbewohner:innen bei. <b>Insbesondere grüne und blaue Naturräume sind hier von Bedeutung</b>, da sie eine beruhigende Wirkung haben und als Rückzugsorte für Erholung und Entspannung dienen. Damit tragen sie maßgeblich zur Reduzierung von Stress bei und <b>fördern die psychische Gesundheit der städtischen Bevölkerung</b> [21].</p><p>Dabei nehmen verschiedenste Aspekte der Öffentlichen (Frei-)Räume Einfluss auf die <b>Stressreduzierung sowie Erholungsförderung</b>. Dazu zählen:<ul><li>Vielfältigkeit und Ausprägungen</li><li>Anpassungen an klimatische Veränderungen</li><li>Berücksichtigung verschiedener Ziel- und Altersgruppen</li><li>Zugänglichkeit und Erreichbarkeit</li><li>Stärkung des Fußverkehrs, Radverkehrs und Öffentlichen Personennahverkehrs bei gleichzeitiger Reduzierung des motorisierten Individualverkehrs</li><li>Senkung der Lärm- und Schadstoffbelastung</li></ul></p>','default',0,1,'2024-08-30 14:25:25',NULL),
(170,NULL,166,NULL,1,NULL,'Verbesserung der Luftqualität',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf die Luftqualität zu erwarten?</h5><p>Indem die <b>Nutzungsprioritäten in öffentlichen Straßenräumen</b> verändert werden und der motorisierte Individualverkehr und dessen ruhender Verkehr gegenüber dem Fuß-, Rad- sowie Öffentlichen Personennahverkehr (ÖPNV) an Bedeutungszuschreibung verliert, ist eine Verbesserung der Luftqualität zu erwarten. Begründet liegt dies in der <b>Verringerung der Luftschadstoffemissionen</b>, da weniger PKW und dafür mehr Fußgänger:innen, Radfahrer:innen sowie Fahrzeuge des ÖPNV den Straßen- und dessen angrenzenden Räume, beispielsweise Gehwege, nutzen [1].</p><p>Öffentliche (Frei-)Räume in städtischen Gebieten können durch die Integration von grüner Vegetation einen wichtigen Beitrag zur <b>Reduzierung von Luftverschmutzung</b> und zur <b>Bindung von Kohlenstoff</b> leisten. Dies trägt sowohl zur Verbesserung der innerstädtischen Luftqualität als auch zur <b>Bewältigung der aktuellen Herausforderungen im Zusammenhang mit dem Klimawandel</b> bei [22,23].</p><p>Die Verbesserung der Luftqualität kann zudem durch die Nutzung von ehemaligem Flächen des Ruhenden Verkehrs für Bepflanzungen weiter gefördert werden. Diese können Luftschadstoffe binden und durch <b>Verdunstungskühle sowie Verschattungen</b> zu einer Verbesserung beitragen.</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(171,NULL,166,NULL,1,NULL,'Reduzierung der Lärmbelastung',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Lärmbelastung zu erwarten?</h5><p>Indem die <b>Prioritäten in Öffentlichen Straßenräumen verändert</b> werden und der motorisierte Individualverkehr und dessen ruhender Verkehr gegenüber dem Fuß-, Rad- sowie Öffentlichen Personennahverkehr (ÖPNV) an Bedeutungszuschreibung verliert, ist eine <b>Reduzierung der Lärmbelastung</b> zu erwarten. Grund hierfür ist die Verringerung der Anzahl von Lärm emittierenden Fahrzeugen im Straßenverkehr bei gleichzeitigem Anstieg von Fußgänger:innen, Radfahrer:innen sowie Fahrzeugen des ÖPNV, welche stattdessen den Straßenraum nutzen [1].</p><p>Durch die <b>Schaffung von Pufferzonen</b> tragen Öffentliche (Frei-)Räume zudem maßgeblich zur Reduzierung von Lärmbelastungen in städtischen Umgebungen bei [23]. Zusätzlich bieten sie den Bewohner:innen der Stadt Erholungsmöglichkeiten, wobei die <b>Abwesenheit von Umgebungslärm</b> eine entscheidende Rolle spielt.</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(172,NULL,166,NULL,1,NULL,'Anpassung an Hitzeereignisse',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf die Anpassung an Hitzeereignisse zu erwarten?</h5><p>Indem Öffentliche (Frei-)Räume an die sich verändernden klimatischen Gegebenheiten angepasst werden, bleiben diese <b>langfristig für verschiedenste Ziel- und Nutzer:innengruppen nutzbar</b>. Infolgedessen können die vielfältigen positiven Gesundheitseffekte erhalten und mit anderen Themenbereichen, beispielsweise der Anpassung an Extremwetterereignisse oder daraus resultierenden Katastrophen, verschränkt werden. <b>Klimaanpassungen Öffentlicher (Frei-)Räume sind damit für die Schaffung resilienterer Stadtstrukturen unerlässlich</b> [1]. Beispiele für Ursachen negativer, gesundheitlicher Wirkungen sind beispielsweise Hitzewellen. Dabei handelt es sich um eine längere Periode ungewöhnlich hoher atmosphärischer Hitzebelastung, welche temporär die Lebensweise der Bevölkerung verändert und negative gesundheitliche Folgen für diese haben kann [24]. Mit dem <b>Klimawandel</b> steigen sowohl die Durchschnitts-, als auch die Extremtemperaturen. Dabei werden Hitzewellen, sowie heiße Tage und Nächte häufiger und extremer.</p><p>Bäume, Park- und Grünanlagen bieten Schatten, welcher das direkte Sonnenlicht blockiert und hiermit die Umgebungstemperatur senkt. Darüber hinaus kühlt diese Vegetation die Umwelt durch Verdunstungskälte [23]. <b>Grüne Infrastruktur</b> ist damit durch den Einsatz von Gründächern, begrünten Fassaden und Baumpflanzungen in Öffentlichen (Frei-)Räumen <b>in der Lage, die Umgebung auf natürliche Art und Weise kühl zu halten</b>. Damit können in dicht bebauten städtischen Gebieten auftretende Hitzeinseln reduziert werden [25,26]. Auch <b>blaue Infrastruktur in Form öffentlicher Gewässer ist in der Lage, die Umgebung durch Verdunstungseffekte zu kühlen</b> und trägt damit zur Hitzeregulierung in Städten bei [21].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(173,NULL,166,NULL,1,NULL,'Stärkung sozialer Zusammenhalt, Interaktion & Teilhabe',NULL,'<h5 class=\'fst-italic\'>Welche Auswirkungen sind im Hinblick auf die soziale Teilhabe zu erwarten?</h5><p>Werden Öffentliche Frei- und Grünräume an die Anforderungen und Wünsche von verschiedenen Zielvorstellungen angepasst, erfahren diese eine <b>höhere Nutzungsintensität</b>. Indem sich verschiedene Zielgruppen den (Frei-)Raum aufgrund dessen hoher Gestaltungsqualität vermehrt aktiv (Durchquerung, Sport, Treffpunkt) oder passiv (Erholungswirkung) aneignen und diesen nutzen, <b>steigt die Wahrscheinlichkeit der Interaktion und des Austausches mit anderen Menschen an</b> [27].</p><p>Freiräume fungieren daher als Orte der:<ul><li>Begegnung</li><li>Akzeptanz von Diversität und Heterogenität</li><li>sozialer Interaktion & Vernetzung</li><li>erhöhte körperlichen Aktivität (individuell; in der Gruppe)</li></ul></p>','default',0,1,'2024-08-30 14:25:25',NULL),
(174,NULL,166,NULL,1,NULL,'Rückgang von Angst und Unsicherheit',NULL,'<h5 class=\'fst-italic\'>Inwiefern lässt sich das Sicherheitsgefühl stärken?</h5><p>Indem Öffentliche (Frei-)Räume hochwertig ausgestaltet und für verschiedenen Zielgruppen zugänglich zur Verfügung gestellt werden, wird eine <b>Belebung und Nutzung sowie ein Verantwortungsgefühl und rücksichtsvoller Umgang begünstigt</b>. Geht diese Gestaltung mit einer <b>Reduzierung von Unsicherheits- sowie angstauslösenden Faktoren</b> einher, etwa durch die verbesserte Beleuchtung, Übersichtlichkeit, Einsehbarkeit oder der Verwendung von vandalismusresistenten Materialien, werden Räume vermehrt als „sicher“ wahrgenommen. Durch eine zielgerichtete Planung können so Angsträume vermieden oder bereits bestehende abgebaut sowie das allgemeine Sicherheitsgefühl für Anwohner:innen deutlich verbessert werden.</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(175,NULL,166,NULL,1,NULL,'Reduzierung verkehrsbedingter Unfallrisiken',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf verkehrsbedingte Unfallrisiken zu erwarten?</h5><p><b>Durch Maßnahmen der Umgestaltung von Öffentlichen Verkehrsräumen können Unfälle im Straßenverkehr</b> zwischen den verschiedenen Verkehrsteilnehmenden, etwa dem motorisierten Individualverkehr, Öffentlichen Personennahverkehr, Fahrrad- sowie Fußverkehr, <b>deutlich reduziert werden</b>. Begünstigt wird dies durch:<ul><li>eine optische und bauliche Trennung der Verkehrsströme</li><li>Schaffung von barrierefreien, gut einsehbaren Querungsmöglichkeiten</li><li>Reduzierung der Anzahl von Stellplätzen des ruhenden Verkehrs</li></ul></p>','default',0,1,'2024-08-30 14:25:25',NULL),
(176,NULL,166,NULL,1,NULL,'Inklusion vulnerabler Gruppen',NULL,'<h5 class=\'fst-italic\'>Inwiefern lässt sich die Inklusion vulnerabler Gruppen verbessern?</h5><p>Indem bei der Entwicklung, Schaffung sowie dem Erhalt von Öffentlichen (Frei-)Räumen die Wünsche und Anforderungen möglichst vieler verschiedener Nutzungsgruppen erfüllt werden, können diese Räume gemeinschaftlich genutzt werden und Menschen in diesen in Interaktionen treten. Hierbei ist besonders wichtig, dass die <b>Ausgestaltung hinsichtlich der Anforderungen einer Zielgruppe ebenfalls anderen Nutzenden direkt oder indirekt zum Vorteil sind</b>; beispielsweise indem auf die Anforderungen der Klimaanpassung Rücksicht genommen wird, profitieren alle Gruppen von Stadtbewohner:innen.</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(181,NULL,151,166,1,NULL,'Welche gesundheitlichen Auswirkungen sind durch die direkten Effekte zu erwarten?',NULL,'','container',1,1,'2024-08-30 14:25:25',NULL),
(182,NULL,181,NULL,1,NULL,'Verringerte Mortalität',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Mortalität zu erwarten?</h5><p>Während der Sommermonate <b>führen Hitzewellen</b> regelmäßig zu einer signifikanten <b>Steigerung der Sterberaten, insbesondere bei älteren Menschen</b> [28].</p><p>Faktoren wie eine erhöhte <b>soziale Unterstützung, sozialer Zusammenhalt und soziale Teilhabe</b> verringern das Mortalitätsrisiko [29–31]. Bei Personen in sozialer Isolation ist das Mortalitätsrisiko weitestgehend unabhängig von Verhaltensfaktoren erhöht [32].</p><p>Eine hohe Stressbelastung steht in einem Zusammenhang mit einem um etwa 55&nbsp;% erhöhten Mortalitätsrisiko [33].</p><p>Eine <b>höher wahrgenommene Lebensqualität</b> steht dagegen in einem Zusammenhang mit geringerem Mortalitätsrisiko [34].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(183,NULL,181,NULL,1,NULL,'Weniger Herz-Kreislauf-Erkrankungen',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Herz-Kreislauf-Erkrankungen zu erwarten?</h5><p>Eine <b>anhaltende Lärmexposition</b> kann zu schnellerem Puls, Bluthochdruck und anderen <b>gesundheitsschädigenden Auswirkungen</b> wie Herzinfarkt führen [35].</p><p>Mit <b>erhöhter Stressbelastung steigt das Risiko für Herz-Kreislauf-Erkrankungen</b> wie Bluthochdruck, Schlaganfälle oder Herzinfarkte [33].</p><p>Bei hohen Temperaturen steigt das Risiko für Herzinfarkte, Herzinsuffizienz und Schlaganfälle. Etwa ein Prozent der jährlich auftretenden Todesfälle durch Herz-Kreislauf-Erkrankungen sind auf Hitze zurückzuführen. Insbesondere gefährdet sind hochaltrige Personen mit bestehenden kardiovaskulären Vorerkrankungen [36].</p><p>Eine <b>geringer wahrgenommene Lebensqualität kann bei Frauen</b> langfristig das Risiko für das Auftreten von Herz-Kreislauf-Erkrankungen erhöhen [37].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(184,NULL,181,NULL,1,NULL,'Weniger Lungenerkrankungen',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Lungenerkrankungen zu erwarten?</h5><p>Indem Menschen sich auf dem Arbeitsweg in Verkehrsräumen bewegen, werden diese mehr oder weniger von Luftschadstoffen beeinträchtigt. Dies ist sowohl abhängig von der <b>Wahl des Fortbewegungsmittels</b> (zu Fuß, Fahrrad, Personenkraftfahrzeug, Öffentlicher Personennahverkehr) sowie der <b>Zusammensetzung der Verkehrsströme</b> (Anteil der jeweiligen Verkehrsmittel) [38]. Die Exposition mit Luftschadstoffen steht hierbei im Zusammenhang mit dem Auftreten verschiedener Lungenkrankheiten, wie Asthma, chronisch obstruktiven Lungenerkrankungen (COPD), Lungenkrebs und Atemwegsinfektionen. Insbesondere Kinder und ältere Erwachsene sind dabei stärker empfänglich für die gesundheitsschädigenden Effekte dieser Luftschadstoffe [39].</p><p>In Deutschland wurden im Jahr 2018 in einer mittleren Abschätzung statistisch 63.100 vorzeitige Todesfälle durch Feinstaub (PM2.5) und 9.200 durch Stickstoffdioxid (NO2) verursacht [40] zit. n. [41]. <b>Luftschadstoffe stellen somit eine erhebliche Gesundheitsgefahr dar.</b></p><p>Die deutliche Verringerung der verkehrsbedingten Luftverschmutzung, des Lärms und der Temperatur in städtischen Quartieren kann sich positiv auf die Gesundheit der Bewohner:innen auswirken und zu einer <b>Verringerung der vorzeitigen Sterblichkeit und Morbidität</b> führen [42].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(185,NULL,181,NULL,1,NULL,'Weniger Krebserkrankungen',NULL,'Eine <b>geringer wahrgenommene Lebensqualität</b> kann langfristig das Risiko für das Auftreten von verschiedenen Krebserkrankungen erhöhen [43].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(186,NULL,181,NULL,1,NULL,'Verbesserte mentale Gesundheit',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf die mentale Gesundheit zu erwarten?</h5><p>Eine <b>anhaltende Lärmexposition</b> kann zu Unruhe und Angstzuständen führen [35].</p><p>Eine <b>erhöhte Stressbelastung</b> steigert das Risiko für Depressionserkrankungen [33].</p><p>Verschiedene Indikatoren von <b>sozialer Exklusion, bzw. geringer Inklusion benachteiligter Gruppen</b> stehen in einem Zusammenhang mit schlechterer mentaler Gesundheit [44].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(187,NULL,181,NULL,1,NULL,'Weniger Schlafstörungen',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Schlafstörungen zu erwarten?</h5><p>Dem <b>Umgebungslärm</b> sind jährlich in allen EU-Ländern unter ca. 900.000 verlorene gesunde Lebensjahre durch Schlafstörungen zuzuschreiben. Die Hauptlast trägt dabei der <b>Verkehrslärm</b>, welcher maßgeblich für Schlafstörungen verantwortlich ist [45].</p><p>Tropennächte (Nachtmindesttemperaturen über 20 °C) können Schlafstörungen verursachen und stellen eine erhebliche <b>thermophysiologische Belastung</b> dar [46].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(188,NULL,181,NULL,1,NULL,'Weniger Unfälle/Verletzungen',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Unfälle/Verletzungen zu erwarten?</h5><p>Die Nutzung des motorisierten Individualverkehrs (MIV) erhöht das Risiko für <b>verkehrsbedingte Unfälle und Todesfälle</b> [1,47].</p><p>Eine Verlagerung der täglichen, aktiven Fortbewegung vom MIV hin zur Nutzung des Öffentlichen Personennahverkehrs, des Fahrrads oder des Zufußgehens, wird zu einem <b>Rückgang von Unfällen und Verletzungen im Straßenverkehr</b> führen [48].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(201,16,NULL,NULL,1,NULL,'Welche Bedeutung hat das Schwerpunktthema für eine gesundheitsfördernde Stadtentwicklung?',NULL,NULL,'container',0,1,'2024-08-30 14:25:25',NULL),
(202,NULL,201,NULL,1,NULL,'Bewegungsfördernde Wohnumgebung',NULL,'<h5 class=\'fst-italic\'>Welche Bedeutung hat das Schwerpunktthema für eine gesundheitsfördernde Stadtentwicklung?</h5><p>Eine <b>bewegungsfreundliche Umgebung kann die körperliche Aktivität von Erwachsenen und Kindern erhöhen</b>, indem sie das Gehen und Radfahren erleichtert und Umweltrisiken verringert [1].</p><p>Die Entscheidung für aktive Mobilität hängt von persönlichen Faktoren sowie von der Stadtgestaltung und der Effizienz des Verkehrsnetzes ab [2]. Bewegungsfreundlich und -fördernd ausgestaltete Stadtquartiere führen zu einem höheren Maß an körperlicher Aktivität, beispielsweise indem bestehende Infrastrukturen Barrierefreiheit, oder zumindest -armut, aufweisen, aktive Mobilität zu Fuß oder mit dem Fahrrad gefördert wird und die räumliche Nähe zu Einkaufsmöglichkeiten sowie Haltestellen des Öffentlichen Personennahverkehrs (ÖPNV) gegeben sind [1,3–5].</p><p>Verschiedene Faktoren können die aktive Mobilität fördern, dazu zählen bauliche Dichte, attraktive Straßengestaltungen, ein gut ausgebautes ÖPNV-Netz, rad- und fußgängerfreundliche Straßenräume sowie freizeit- und erholungsorientierte Freiraumplanung [6].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(203,NULL,201,201,1,NULL,'Was sind relevante Schlüsselfaktoren für eine gesundheitsfördernde Stadtentwicklung?',NULL,NULL,'container',1,1,'2024-08-30 14:25:25',NULL),
(204,NULL,203,NULL,1,NULL,'Walkability',NULL,'<h5 class=\'fst-italic\'>Was ist Walkability und inwiefern wird dadurch gesundheitsförderndes Verhalten begünstigt?</h5><p>Der Begriff Walkability beschreibt die <b>bewegungsfördernde Gestaltung von Wohnumgebungen</b>, welche die persönliche Mobilität sowie die freizeitlichen Bewegungsaktivitäten begünstigen [7].</p><p>Durch eine Kombination von städtebaulichen Merkmalen, etwa dem Verdichtungsgrad, der Nutzungsmischung, dem Vorhandensein von hochwertigen Bürgersteigen und einem ästhetisch-attraktiven Straßenbild eines Stadtquartiers kann die aktive Mobilität, also beispielsweise das Zurücklegen von Arbeitswegen zu Fuß und per Fahrrad, begünstigt werden. In einer Wohnumgebung mit höherer Walkability zu leben, steht in einem Zusammenhang mit mehr körperlicher Aktivität im Alltag [8,9]. Eine Untersuchung zeigt zudem, dass eine Implementierung von Walkability durch städtebauliche Maßnahmen möglich ist und zu einer Steigerung der Bewegungsaktivität von Menschen führen kann [10].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(205,NULL,203,NULL,1,NULL,'Hochwertiger Öffentlicher (Frei-)Raum',NULL,'<h5 class=\'fst-italic\'>Inwiefern kann attraktiver Öffentlicher (Frei-)Raum gesundheitsförderndes Verhalten fördern?</h5><p>Wichtige Eigenschaften für attraktiven <span class=\'fw-bold\'>Öffentlichen (Frei-)Raum</span>* sind eine hohe Sicherheit sowie die Ästhetik, Ausstattung und Wohnortnähe [11]. <b>Öffentliche (Frei-)Räume wie Parks und Grünanlagen gelten als zentrale Infrastrukturelemente, die zu körperlicher Aktivität anregen.</b></p><p>Auch die Nähe des Wohnorts zu Parks und öffentlichen Erholungs- und Sporträumen ist im Allgemeinen mit mehr körperlicher Aktivität verbunden [12], da die Erreichbarkeit besser und damit der Zeitaufwand niedriger ist.</p><hr><p class=\'fst-italic\'>* Unter dem Begriff „Öffentlicher Freiraum“ werden im räumlichen Sinne Parks, Gärten, Sportplätze, Straßen, Fußgängerzonen und Einkaufsstraßen, Spazier- und Fahrradwege, Stadt- und Spielplätze sowie Naturräume zusammengefasst, die für die Bevölkerung öffentlich zugänglich sind.</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(206,NULL,201,203,1,NULL,'Welche direkten Effekte sind durch die Förderung der Schlüsselfaktoren zu erwarten?',NULL,NULL,'container',1,1,'2024-08-30 14:25:25',NULL),
(207,NULL,206,NULL,1,NULL,'Steigerung der körperlichen Aktivität',NULL,'<h5 class=\'fst-italic\'>Was beschreibt der Begriff körperliche Aktivität und welcher Umfang ist für gesundheitsfördernde Effekte nötig?</h5><p>Für den Begriff <span class=\'fw-bold\'>körperliche Aktivität</span>* kann zwischen freizeitbezogener, arbeitsbezogener körperlicher Aktivität und körperlicher Aktivität zur aktiven Mobilität (z.B. zurückgelegte Pendelstrecken per Fuß oder Fahrrad) unterschieden werden [13].</p><ul><li><b>Die Weltgesundheitsorganisation (WHO) empfiehlt 150-300 Minuten moderate bis intensive Ausdaueraktivität oder 75 bis 150 Minuten intensives Training pro Woche</b> [14,15]. Diese Mindestempfehlungen ließen sich beispielsweise durch drei 25-minütige Joggingeinheiten pro Woche oder eine 15-minütige Fahrradfahrt zur Arbeit und zurück an fünf Tagen der Woche umsetzen. Auch eine Kombination von moderaten und intensiven Aktivitäten ist möglich.</li><li>Das Zurücklegen von 10.000 Schritten am Tag begünstigt die Erreichung dieser Mindestempfehlungen für körperliche Aktivität [16].</li><li>Trotz der nachweislich positiven Gesundheitseffekte erreichen in Deutschland über die Hälfte der Bevölkerung nicht die von der WHO ausgegebenen Mindestempfehlungen für körperliche Aktivität [17].</li></ul><hr><p class=\'fst-italic\'>* Der Begriff körperliche Aktivität umfasst jede durch die Skelettmuskulatur hervorgebrachte Bewegung, die zu einem Anstieg des Energieverbrauchs führt. Die Bandbreite körperlicher Aktivität reicht von alltäglichen Tätigkeiten bis hin zu sportlichen Betätigungen [18].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(208,NULL,201,206,1,NULL,'Welche gesundheitlichen Auswirkungen sind durch die direkten Effekte zu erwarten?',NULL,'','container',1,1,'2024-08-30 14:25:25',NULL),
(211,NULL,208,NULL,1,NULL,'Verringerte Mortalität',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Mortalität/Krankheitsrisiken durch Inaktivität zu erwarten?</h5><p>Die Weltgesundheitsorganisation (WHO) empfiehlt 150 bis 300 Minuten moderate bis intensive Ausdaueraktivität oder 75 bis 150 Minuten intensives Training pro Woche [14,15].</p><p>In Deutschland sind jährlich 1584 vorzeitige Todesfälle körperlicher Inaktivität zuzuschreiben [2]. <b>Durch eine Steigerung des Aktivitätslevels der bislang inaktiven Personen in Deutschland auf die WHO-Mindestempfehlungen würden positive Effekte entstehen.</b> Dazu zählen u.a.:</p><ul><li>Die Lebenserwartung der bisher Inaktiven würde nach Modellrechnungen im Durchschnitt um etwa 7 Monate ansteigen, bei 300 Minuten moderatem bzw. 150 Minuten intensivem Training um noch einmal weitere 7 Monate [2].</li><li>In den EU-Mitgliedsländern könnte eine Erhöhung der Aktivitätslevel in Form der Einhaltung der WHO-Mindestempfehlungen insgesamt 11,5 Millionen. neue Fälle nichtübertragbarer Krankheiten verhindern. Diese umfassen 3,8 Millionen Fälle von Herz-Kreislauf-Erkrankungen, 3,5 Millionen Depressionserkrankungen, eine Million Typ-2-Diabetesfälle und mehr als 400.000 Krebserkrankungen [2].</li></ul>','default',0,1,'2024-08-30 14:25:25',NULL),
(212,NULL,208,NULL,1,NULL,'Weniger Herz-Kreislauf-Erkrankungen',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Herz-Kreislauf-Erkrankungen zu erwarten?</h5><p>Herz-Kreislauf-Erkrankungen zählen weltweit sowie in Deutschland als die häufigste Todesursache. Die wichtigste Störung dabei ist die Arteriosklerose (Gefäßverengung der Arterien), welche zu verschiedenen Krankheitsbildern wie Herzinfarkt, koronarer Herz-Krankheit oder Schlaganfall führen kann [19].</p><p>Die Lebenszeitprävalenz des Herzinfarktes bei unter 80-Jährigen liegt in Deutschland bei 4,7&nbsp;%, für koronare Herzkrankheit liegt sie bei 9,3&nbsp;% [20].</p><p><b>Körperliche Inaktivität stellt neben anderen einen der wichtigsten Risikofaktoren für die Arteriosklerose dar</b> [19].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(213,NULL,208,NULL,1,NULL,'Weniger Krebserkrankungen',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Krebserkrankungen zu erwarten?</h5><p>Krebserkrankungen sind weltweit und deutschlandweit eine häufige Todesursache. Der Anteil an Personen in Deutschland, welche in den letzten fünf Jahren an Krebs erkrankt sind, liegt bei 1,6&nbsp;% - die Zahlen sind dabei ansteigend [21].</p><p><b>Regelmäßig körperlich aktiv zu sein kann das Risiko für verschiedene Arten von Krebserkrankungen verringern.</b> Auch in der onkologischen Akutbehandlung bringt Bewegung unter anderem Vorteile für Erschöpfungsbeschwerden, den verringerten Abbau von Muskelmasse und das Immunsystem mit sich [22].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(214,NULL,208,NULL,1,NULL,'Weniger Diabeteserkrankungen',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Diabetes mellitus zu erwarten?</h5><p>Ebenso steigend sind die mit körperlicher Inaktivität in Zusammenhang stehenden Diabetesfälle in Deutschland. Etwa 9–10&nbsp;% der deutschen Bevölkerung haben diagnostizierten Diabetes mellitus, der überwiegende Anteil der Personen davon leidet unter Typ-2-Diabetes [23]. <b>Regelmäßig körperlich aktiv zu sein senkt das Risiko an Diabetes zu erkranken</b>, darüber hinaus kann Bewegung verschiedene gesundheitliche Parameter bei bestehendem Diabetes verbessern [24,25].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(215,NULL,208,NULL,1,NULL,'Weniger Depressionen',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Depressionen zu erwarten?</h5><p>Depressionen sind eine häufig auftretende psychische Störung, welche das allgemeine Wohlbefinden und die Lebensqualität erheblich beeinträchtigt. Etwa 8&nbsp;% der Personen in Deutschland erhalten pro Jahr die ärztliche Diagnose der Depression [26].</p><p><b>Die regelmäßige Ausübung von körperlicher Aktivität zeigt eine förderliche und positiv beeinflussende Wirkung auf die mentale Gesundheit.</b> Sie kann sowohl präventiv als auch therapeutisch eingesetzt werden. Die Ausübung körperlicher Aktivität führt sowohl zu Verbesserungen der Stimmungslage als auch der kognitiven Funktionen [27].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(216,NULL,208,NULL,1,NULL,'Weniger Übergewicht und Adipositas',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Übergewicht und Adipositas zu erwarten?</h5><p><b>Zentrale Risikofaktoren, die durch körperliche Inaktivität entstehen, sind die Entwicklung von Übergewicht und Adipositas.</b> Diese entstehen durch eine längerfristige unausgeglichene Energiebilanz, wenn die Energiezufuhr (Kalorienaufnahme) den Energieverbrauch übersteigt [28].</p><p>Die Prävalenz von Adipositas ist in den letzten Jahren maßgeblich angestiegen. 53&nbsp;% der Erwachsenen in Deutschland sind als übergewichtig einzustufen, davon 19&nbsp;% als adipös [29].</p><p>Bei Kindern und Jugendlichen gelten 15,4&nbsp;% als übergewichtig, davon 5,9&nbsp;% als adipös [30].</p><p><b>Adipositas steht im Zusammenhang mit verschiedenen Krankheitsrisiken, unter anderem Herz-Kreislauf-Erkrankungen, bestimmten Krebsarten und Typ 2-Diabetes</b> [31].</p><p>In Deutschland geht man von jährlich fast 37.000 Todesfällen aufgrund von Übergewicht aus [32].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(217,NULL,208,NULL,1,NULL,'Verringerte Auswirkung von Infektionen',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Infektionen wie Covid-19 zu erwarten?</h5><p>Durch ausreichende körperliche Aktivität und die damit einhergehenden positiven Effekte kann die Bevölkerung zudem resistenter gegen die Auswirkungen von Erkrankungen werden, beispielsweise gegenüber Covid-19 [33].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(218,NULL,208,NULL,1,NULL,'Reduzierte Gesundheitskosten',NULL,'<h5 class=\'fst-italic\'>Welche Kosten entstehen durch körperliche Inaktivität und die assoziierten Folgekrankheiten?</h5><p>Die jährlichen Ausgaben des Staates für das Gesundheitswesen, welche direkt mit den <b>Auswirkungen von körperlicher Inaktivität</b> in Verbindung stehen, belaufen sich auf <b>etwa zwei Milliarden Euro</b>.</p><p>Neben den gesteigerten gesundheitlichen Risiken verursachen Übergewicht und dessen Krankheitsfolgen, beispielsweise Herz-Kreislauf- und Krebserkrankungen oder Adipositas, beträchtliche Kosten für das deutsche Gesundheitssystem. So belaufen sich die Gesamtkosten von Adipositas und deren assoziierten Krankheiten in Deutschland jährlich auf etwa 13 Milliarden Euro. Im Bereich des Arbeits- und Berufswesens zeigten sich annähernd 49.000 Invaliditätsfälle sowie 478.000 verlorene Erwerbsjahre aufgrund von Adipositas [34].</p><p>In Deutschland liegen die direkten jährlichen Krankheitskosten / Kosten des Gesundheitssystems, die im Zusammenhang mit Typ-2-Diabetes stehen zwischen 28 und 33 Milliarden Euro [35].</p><p>Herz-Kreislauf-Erkrankungen verursachen mit 46 Milliarden Euro die höchsten Krankheitskosten in Deutschland [36].</p><p><b>Eine Steigerung der körperlichen Aktivitätslevel auf Bevölkerungsebene kann diese Kosten maßgeblich reduzieren und damit erhebliche Beträge einsparen.</b></p>','default',0,1,'2024-08-30 14:25:25',NULL),
(251,17,NULL,NULL,1,NULL,'Welche Bedeutung hat das Schwerpunktthema für eine gesundheitsfördernde Stadtentwicklung?',NULL,NULL,'container',0,1,'2024-08-30 14:25:25',NULL),
(252,NULL,251,NULL,1,NULL,'Die Wohnverhältnisse haben Einfluss auf das persönliche Wohlbefinden, die psychische & physische Gesundheit die Alltagsaktivität sowie die soziale Teilhabe.',NULL,'<h5 class=\'fst-italic\'>Welche Bedeutung hat das Schwerpunktthema für eine gesundheitsfördernde Stadtentwicklung?</h5><p>Schädliche Substanzen wie Pestizidrückstände, Schimmelpilze, Zigarettenrauch und Giftstoffe im unmittelbaren Wohnumfeld haben <b>negative Auswirkungen auf die menschliche Gesundheit. Bevölkerungsgruppen, die in mangelhaftem Wohnraum leben</b>, sind zudem einem höheren Risiko von Elektrounfällen, Nagetierbissen, Stürzen sowie anderen Verletzungen und Krankheiten ausgesetzt [1] zit. n. [2]. Untersuchungen haben gezeigt, dass auch überbelegte Wohnverhältnisse mit negativen Auswirkungen auf die Gesundheit verbunden sind, darunter:<ul><li>psychische Gesundheitsprobleme,</li><li>Infektionskrankheiten und</li><li>Atemwegserkrankungen [3].</li></ul></p><p>Sicherheit in Bezug aufs Wohnen bedeutet in diesem Zusammenhang also über Wohnraum zu verfügen, der privat, sicher, beständig und hinsichtlich seiner Ausstattung und Temperatur komfortabel ist [4] zit. n. [2].</p><p>Die <b>Lage und Barrierefreiheit der Wohnung</b> sind entscheidend für die Alltagsaktivität, auch in Hinblick auf den zu überwindenden Arbeitsweg. Entsprechend kann die Lage der Wohnung auch über die Wahl der Arbeitsstelle entscheiden [4] zit. n. [2]. Die <b>Zugänglichkeit, Ausstattung und Gestaltung des unmittelbaren Wohnumfelds</b> spielen hierbei eine wesentliche Rolle. Das Wohnen an einer vielbefahrenen Straße geht aufgrund der hohen Feinstaub- und Lärmbelastung mit einem höheren Gesundheitsrisiko einher als das Wohnen an einer Grünfläche [5]. Gleichzeitig bestimmt die Lage der Wohnung auch über die <b>soziale Teilhabe</b> [6] zit. n. [2].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(253,NULL,251,251,1,NULL,'Was sind relevante Schlüsselfaktoren für eine gesundheitsfördernde Stadtentwicklung?',NULL,NULL,'container',1,1,'2024-08-30 14:25:25',NULL),
(254,NULL,253,NULL,1,NULL,'Verbesserung von Sicherheit & Hygiene',NULL,'<h5 class=\'fst-italic\'>Welche Aspekte sind für die Bereitstellung von sicherem und hygienischem Wohnraum zu beachten?</h5><p>Um sichere und hygienische Wohnverhältnisse zu gewährleisten, gilt es, folgende grundlegende Elemente zu beachten:</p><ul><li>die Wohnung schützt vor negativen Umwelteinflüssen, jegliche unmittelbar lebensbedrohlichen Gefahren wie etwa Feuer oder Elektrizität sind beachtet,</li><li>es sind angemessene Waschgelegenheiten und funktionierende Toiletten bereitgestellt,</li><li>es ist angemessen Platz für die Zubereitung und Lagerung von Lebensmitteln bereitgestellt,</li><li>Schädlingsbefall wird bekämpft,</li><li>die Wohnungen werden nicht überbelegt,</li><li>die Belastung mit Staub wird reduziert,</li><li>angemessene Zimmertemperaturen sind sichergestellt,</li>Schadstoffbelastung im Innenraum durch etwa Schimmel sind nach Möglichkeit nicht oder nur in geringfügiger Konzentration vorhanden [2].</li></ul>','default',0,1,'2024-08-30 14:25:25',NULL),
(255,NULL,253,NULL,1,NULL,'Wohnungspolitik statt Bauweise',NULL,'<h5 class=\'fst-italic\'>Weshalb sollte der Fokus auf einer umfassenden Wohnungspolitik liegen?</h5><p>Der <b>kommunale Wohnungsbestand</b> ist sehr wichtig, um kommunalpolitische Ziele in den Bereichen Wohnen, Stadtentwicklung und Klimapolitik zu erreichen [10] zit. n. [2].</p><p>Auch bei der sozialen Absicherung durch Wohngeld und Kostenübernahme für Unterkunft und Heizung spielt die <b>Wohnungspolitik</b> eine bedeutende Rolle [10,11] zit. n. [2].</p><p>Wenn die sich die öffentliche Hand zurückzieht, indem sie<ul><li>Wohnraum verkauft,</li><li>die Eigenheimzulage abschafft und</li><li>den sozialen Wohnungsbau reduziert</li></ul>kann dies insbesondere bei steigender Nachfrage dazu führen, dass es in den Kommunen weniger preisgünstigen Wohnraum gibt und Haushalte mit niedrigem Einkommen ausgegrenzt werden [12,13] zit. n. [2]. <b>Es ist notwendig, die Wohnungspolitik neu auszurichten, um je nach Marktlage Anreize für bestimmte Handlungen zu setzen</b> [14] zit. n. [2]. Hierbei sollten insbesondere die <b>Bedürfnisse von vulnerablen Gruppen</b>, wie Haushalte mit geringem Einkommen, berücksichtigt werden [2].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(256,NULL,253,NULL,1,NULL,'Vielfältiger Wohnungsbestand',NULL,'<h5 class=\'fst-italic\'>Welche Bedeutung hat die Schaffung eines vielfältigen Wohnungsbestands für eine gesundheitsfördernde Stadtentwicklung?</h5><p>Es ist wichtig, dass im Bereich des Wohnungsbaus die unterschiedlichen Größen und Zusammensetzungen von Haushalten sowie die Bedürfnisse von vulnerablen Gruppen wie</p><ul><li>älteren Menschen,</li><li>wirtschaftlich benachteiligten Menschen und</li><li>Menschen mit Behinderungen</li></ul><p>berücksichtigt werden. Ein <b>vielfältiger Wohnungsbestand</b> verhindert eine unausgewogene Bevölkerungszusammensetzung, die die Bereitstellung öffentlicher Einrichtungen und Dienstleistungen erschweren kann. Zusätzlich ist eine <b>Vielfalt hinsichtlich Art und Kosten von Wohnraum</b> wünschenswert, um den unterschiedlichen Wohnbedürfnissen im Lebenszyklus eines Menschen gerecht zu werden [2]. Die <b>Bezahlbarkeit von Wohnraum</b> hat außerdem Auswirkungen auf die psychische Gesundheit. Die Höhe der Miete beeinflusst die Verfügbarkeit finanzieller Mittel für andere Anschaffungen, wie Lebensmittel oder Freizeitaktivitäten [7]. <b>Hohe Mietbelastungen führen zu einer höheren Stressbelastung</b> und haben somit direkte negative gesundheitliche Auswirkungen.</p><p>Ein begrenztes Angebot an unterschiedlichen Wohnungsformen/-typen kann dazu führen, dass</p><ul><li>Menschen gezwungen sind, ihr gewohntes Umfeld zu verlassen oder</li><li>sich an eine unzureichende Wohnsituation anzupassen, obwohl sich ihre Wohnbedürfnisse ändern.</li></ul><p>Dies kann wiederum negative Auswirkungen auf die Gesundheit und das Wohlbefinden haben, da so soziale Beziehungen und Unterstützungsnetzwerke beeinträchtigt werden [6] zit. n. [2].</p><p>Durch einen vielfältigen Wohnungsbestand wird Menschen die freie Wahl von Lage, Ort und Wohnungstyp ermöglicht. Idealerweise sollten sie innerhalb einer Region durch eine hohe Qualität und Vielfalt des Wohnungsangebots<ul><li>den Standort,</li><li>den Typ und</li><li>die Ausstattung ihrer Wohnung</li></ul>entsprechend ihren Bedürfnissen und Ressourcen auswählen können [2].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(257,NULL,253,NULL,1,NULL,'Gewährleistung von Barrierefreiheit',NULL,'<h5 class=\'fst-italic\'>Welche Rolle spielen die Berücksichtigung und Schaffung von Barrierefreiheit für eine gesundheitsfördernde Stadtentwicklung?</h5><p>Bei der <b>Berücksichtigung der Bedürfnisse vulnerabler Bevölkerungsgruppen</b> spielt Barrierefreiheit eine wichtige Rolle. Wenn sowohl die <b>Wohnung als auch das direkte Wohnumfeld barrierefrei gestaltet</b> sind, ist es möglich, dass Menschen auch mit zunehmendem Alter in ihrem gewohnten Umfeld wohnen bleiben können. Dies ermöglicht es ihnen, unabhängig von<ul><li>ihren eigenen Fähigkeiten,</li><li>eigenverantwortlich und</li><li>sicher</li></ul>in ihrer Wohnumgebung älter zu werden [2]. Von einer barrierearmen/-freien Umgestaltung des Wohnungsbestandes und -umfeldes profitieren nicht nur ältere Menschen, sondern auch Menschen mit Behinderungen sowie Eltern mit Kinderwagen [8].</p><p>Gemäß <b>Artikel 19 der UN-Behindertenrechtskonvention</b> soll Menschen mit Behinderungen die Möglichkeit gegeben werden, ihren Wohnort frei zu wählen. Hierfür ist eine ausreichende Anzahl an barrierefreien Wohnungen und eine entsprechende Umgebung erforderlich. Die barrierearme Gestaltung des Wohnumfeldes umfasst dabei<ul><li>die Zugänglichkeit von öffentlichen Gebäuden, Dienstleistungen, Arztpraxen und Lebensmittelgeschäften sowie</li><li>die Schaffung barrierefreier Mobilität [8].</li></ul><p>Beispielhafte städtebauliche <b>Instrumente zur Umsetzung von mehr Barrierearmut/-freiheit</b> in Wohnungen/im direkten Wohnumfeld sind<ul><li>die soziale Wohnraumförderung,</li><li>die Städtebauförderung,</li><li>die Landesbauordnung und</li><li>die professionelle Wohnberatung [8].</li></ul></p>','default',0,1,'2024-08-30 14:25:25',NULL),
(258,NULL,253,NULL,1,NULL,'Freiraumversorgung im Wohnumfeld',NULL,'<h5 class=\'fst-italic\'>Warum sind Freiräume im Wohnumfeld für eine gesundheitsfördernde Stadtentwicklung von Bedeutung?</h5><p>Für die Bewertung eines vielfältigen Wohnungsbestands ist das <b>Angebot an Freiräumen im direkten Wohnumfeld</b> zu beachten. Private Freiflächen, einschließlich gemeinschaftlicher Bereiche, können dazu beitragen, die körperliche Gesundheit zu verbessern und Stress sowie andere psychische Gesundheitsprobleme zu lindern [9] zit. n. [2]. Im direkten Wohnumfeld können Menschen gesundheitlich von schnell erreichbaren, gut zugänglichen sowie ausreichend ausgestatteten Öffentlichen (Frei-)Räumen profitieren.</p><p>Besonders <b>Öffentliche Frei- und Grünräume</b> sollten somit bei Stadtentwicklungsvorhaben, ausgehend <b>von Wohn- und Arbeitsorten</b>, in geringen sowie zumutbaren Zeiträumen <b>fußläufig erreichbar</b> sein. Dadurch werden diese wichtigen Räume für vulnerable Gruppen, wie ältere Menschen, Menschen mit Beeinträchtigungen, Schwangere sowie Kinder und Jugendliche, zur Verfügung gestellt. Gerade Kinder profitieren von <b>qualitativ hochwertigen sowie aneignungsfähigen Öffentlichen (Frei-)Räumen</b>, da diese Kreativität sowie eine gesündere Entwicklung durch ein erhöhtes Aktivitätsniveau ermöglichen [2].</p><p><b>Das Angebot an nutzbaren Öffentlichen (Frei-)räumen ist aktuell sozial ungleich verteilt.</b> Gemessen an Bildung, Einkommen und Berufsstatus sind Menschen unterer sozialer Schichten einer höheren Feinstaubbelastung ausgesetzt als bessergestellte Bevölkerungsgruppen. Sie haben ihren Wohnsitz zudem häufiger an stark befahrenen Straßen und verfügen seltener über den direkten Zugang zu Grünflächen [5].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(259,NULL,251,253,1,NULL,'Welche direkten Effekte sind durch die Förderung der Schlüsselfaktoren zu erwarten?',NULL,NULL,'container',1,1,'2024-08-30 14:25:25',NULL),
(260,NULL,259,NULL,1,NULL,'Förderung der Bewegung (Alltagsaktivität)',NULL,'<h5 class=\'fst-italic\'>Inwiefern beeinflusst das Wohnumfeld die Alltagsaktivität?</h5><p>Eine große Anzahl an qualitativ hochwertigem, bezahlbarem Wohnungsbestand ermöglicht es, eine <b>Wohnung in der Nähe der Arbeitsstätte</b> zu finden und halten zu können. Durch einen verkürzten Arbeitsweg kann Pendelverkehr mit Quell- und Zielströmen vermieden oder zumindest abgebaut und die aktive Bewegung zur Arbeit zu Fuß oder mit dem Fahrrad gefördert werden. Eine <b>barrierefreie Gestaltung der Wohnung und des unmittelbaren Wohnumfeldes</b> fördert die Mobilität vulnerabler Bevölkerungsgruppen und ermöglicht es ihnen, ihre täglichen Wege selbständig und sicher zurückzulegen.</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(261,NULL,259,NULL,1,NULL,'Steigerung der Lebensqualität',NULL,'<h5 class=\'fst-italic\'>Welche Rolle spielen die Wohnverhältnisse in Bezug auf die Lebensqualität?</h5><p>Hygienische und sichere Wohnverhältnisse mit ausreichend individueller Wohnfläche steigern die Wohnqualität und beeinflussen dadurch die Lebensqualität positiv. Durch <b></b>vielfältige, qualitativ hochwertige Wohnungsbestände sowie Wohnumgebungen</b> ist Wohnen entsprechend der eigenen Bedürfnisse und Wünsche möglich.</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(262,NULL,259,NULL,1,NULL,'Reduzierung von Stress / Förderung der Erholung',NULL,'<h5 class=\'fst-italic\'>Inwiefern beeinflussen Wohnverhältnisse Stressfaktoren?</h5><p>Durch qualitativ hochwertigen Wohnungsbestand mit ausreichend individueller Wohnfläche kann dieser als <b>individuell nutzbarer Rückzugs- und Erholungsort</b> zur Verfügung gestellt werden.</p><p>Anliegende Grün- und Freiflächen im Wohnumfeld, etwa Gemeinschaftsgärten, fördern die Erholung zusätzlich. Als <b>Orte der Entspannung</b> tragen sie direkt und indirekt zur <b>Reduzierung von Stressfaktoren sowie zur Förderung der Erholung</b> bei.</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(263,NULL,259,NULL,1,NULL,'Schutz vor Umweltgefahren',NULL,'<h5 class=\'fst-italic\'>Können angepasste Wohnverhältnisse vor Umweltgefahren schützen?</h5><p>Sichere und hygienische Wohnverhältnisse schützen vor negativen Umwelteinflüssen, etwa vor Hitze und Niederschlägen, bedingt durch Extremwetterereignisse sowie vor unmittelbar lebensbedrohlichen Gefahren wie Feuer oder Elektrizität. Gleichzeitig dienen sie im Idealfall als Schutz vor verkehrsbedingten Umweltgefahren wie Lärm- und Feinstaubbelastung.</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(264,NULL,259,NULL,1,NULL,'Reduzierung von Lichtverschmutzung',NULL,'<h5 class=\'fst-italic\'>Lässt sich bei einer Neustrukturierung der Wohnverhältnisse die Lichtverschmutzung reduzieren?</h5><p>Indem bei der Entwicklung des aktuellen sowie zukünftigen Wohnbestandes auf die z.T. negativen Auswirkungen sowie Beeinträchtigungen durch Lichtemissionen, beispielsweise verursacht durch schlecht platzierte Beleuchtungselemente im Öffentlichen (Straßen-)Raum [2], Rücksicht genommen wird, können positive gesundheitliche Auswirkungen für die Anwohner:innen ermöglicht werden.</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(265,NULL,259,NULL,1,NULL,'Inklusion vulnerabler Gruppen',NULL,'<h5 class=\'fst-italic\'>Wie wird die Inklusion vulnerabler Gruppen gewährleistet?</h5><p>Barrierearme oder barrierefreie Wohnverhältnisse und das dazugehörige unmittelbare Wohnumfeld ermöglichen vulnerablen Bevölkerungsgruppen das <b>langfristige Wohnen in vertrauter Umgebung</b>. Sie können sich eigenständig und sicher im Wohnumfeld bewegen und profitieren von kurzen Wegen zu Familie und Freund:innen. <b>Die erhöhte Alltagsaktivität trägt zur Gesundheitsförderung bei.</b></p>','default',0,2,'2024-08-30 14:25:25',NULL),
(266,NULL,259,NULL,1,NULL,'Stärkung sozialer Zusammenhalt, Interaktion & Teilhabe',NULL,'<h5 class=\'fst-italic\'>Wie können Wohnverhältnisse die soziale Interaktion fördern?</h5><p>Bezahlbarer Wohnraum und ein ausreichend vielfältiger Wohnungsbestand sorgen auch bei sich ändernden Lebensumständen dafür, dass im vertrauten Wohn- sowie sozialen Umfeld verblieben werden kann. Gemeinschaftlich genutzte Grün- und Freiflächen, etwa Gemeinschaftsgärten, <b>unterstützen die soziale Interaktion</b> zusätzlich. Als Orte der Entspannung tragen sie direkt und indirekt zur <b>Reduzierung von Stressfaktoren sowie zur Förderung der Erholung</b> bei.</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(267,NULL,251,259,1,NULL,'Welche gesundheitlichen Auswirkungen sind durch die direkten Effekte zu erwarten?',NULL,'','container',1,1,'2024-08-30 14:25:25',NULL),
(268,NULL,267,NULL,1,NULL,'Verringerte Mortalität',NULL,'<h5 class=\'fst-italic\'>Welche Faktoren können das Mortalitätsrisiko reduzieren?</h5><p>Faktoren wie eine erhöhte <b>soziale Unterstützung, sozialer Zusammenhalt und soziale Teilhabe</b> verringern das Mortalitätsrisiko [15,16]. Bei Personen in sozialer Isolation ist das Mortalitätsrisiko weitestgehend unabhängig von Verhaltensfaktoren erhöht [17].</p><p>Eine hohe Stressbelastung steht in einem Zusammenhang mit einem um etwa 55&nbsp;% erhöhten Mortalitätsrisiko [18].</p><p>Eine <b>höher wahrgenommene Lebensqualität</b> steht in einem Zusammenhang mit geringerem Mortalitätsrisiko [19].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(269,NULL,267,NULL,1,NULL,'Weniger Herz-Kreislauf-Erkrankungen',NULL,'<h5 class=\'fst-italic\'>Wodurch lassen sich Herz-Kreislauf-Erkrankungen reduzieren?</h5><p><b>Mit erhöhter Stressbelastung steigt das Risiko für Herz-Kreislauf-Erkrankungen</b> wie Bluthochdruck, Schlaganfälle oder Herzinfarkte [20]. Diese können etwa durch eine anhaltende Lärmexposition hervorgerufen werden, welche einen schnelleren Puls, Bluthochdruck und/oder anderen gesundheitsschädigenden Auswirkungen herbeiführt. Die Folge hiervon können beispielsweise Herzinfarkte sein [21].</p><p>Auch Wohnstätten sind von den Folgen der klimatischen Veränderungen betroffen, welche mit dem Anstieg von Extremwetterereignissen sowie Temperaturen einhergehen. Gerade <b>hohe Temperaturen steigern das Risiko für Herzinfarkte, Herzinsuffizienz und Schlaganfälle</b>. Etwa ein Prozent der jährlich auftretenden Todesfälle durch Herz-Kreislauf-Erkrankungen sind auf Hitze in Folge von klimatischen Veränderungen zurückzuführen. Insbesondere gefährdet sind hochaltrige Personen mit bestehenden kardiovaskulären Vorerkrankungen [22].</p><p>Eine <b>geringere wahrgenommene Lebensqualität</b> kann bei Frauen langfristig das Risiko für das Auftreten von Herz-Kreislauf-Erkrankungen erhöhen [20].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(270,NULL,267,NULL,1,NULL,'Weniger Lungenerkrankungen',NULL,'<h5 class=\'fst-italic\'>Wie beeinflussen die Wohnverhältnisse das Auftreten von Lungenerkrankungen?</h5><p>Indem Menschen sich auf dem Arbeitsweg in Verkehrsräumen bewegen, werden diese mehr oder weniger von Luftschadstoffen beeinträchtigt. Dies ist sowohl abhängig von der <b>Wahl des Fortbewegungsmittels</b> (zu Fuß, Fahrrad, Personenkraftfahrzeug, Öffentlicher Personennahverkehr) sowie der <b>Zusammensetzung der Verkehrsströme</b> (Anteil der jeweiligen Verkehrsmittel) [23]. Die Exposition mit Luftschadstoffen steht hierbei im Zusammenhang mit dem Auftreten verschiedener Lungenkrankheiten wie Asthma, chronisch obstruktiven Lungenerkrankungen (COPD), Lungenkrebs und Atemwegsinfektionen. Insbesondere Kinder und ältere Personen sind dabei stärker empfänglich für die gesundheitsschädigenden Effekte dieser Luftschadstoffe [24].</p><p>In Deutschland wurden im Jahr 2018 in einer mittleren Abschätzung statistisch 63.100 vorzeitige Todesfälle durch Feinstaub (PM2.5) und 9.200 durch Stickstoffdioxid (NO2) verursacht [25] zit. n. [26]. <b>Luftschadstoffe stellen somit eine erhebliche Gesundheitsgefahr dar.</b></p><p>Die deutliche Verringerung der verkehrsbedingten Luftverschmutzung, des Lärms und der Temperatur in städtischen Quartieren kann sich positiv auf die Gesundheit der Bewohner:innen auswirken und zu einer <b>Verringerung der vorzeitigen Sterblichkeit und Morbidität</b> führen [27].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(271,NULL,267,NULL,1,NULL,'Weniger Krebserkrankungen',NULL,'<p>Eine <b>geringere wahrgenommene Lebensqualität</b> kann langfristig das Risiko für das Auftreten von verschiedenen Krebserkrankungen erhöhen [28].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(272,NULL,267,NULL,1,NULL,'Verbesserte mentale Gesundheit',NULL,'<h5 class=\'fst-italic\'>Lässt sich durch angepasste Wohnverhältnisse die mentale Gesundheit der Bevölkerung beeinflussen?</h5><p>Eine <b>anhaltende Lärmexposition</b> kann zu Unruhe und Angstzuständen führen [29]. Eine erhöhte Stressbelastung steigert das Risiko für Depressionserkrankungen [18]. Zudem steigert das <b>Gefühl einer als geringer wahrgenommenen soziale Unterstützung</b> das Risiko für psychologische Belastungen, insbesondere zeigt sich hier ein Zusammenhang mit depressiven Symptomen und erhöhtem Stressempfinden [30,31]. Die Schwere und Dauer von Depressionserkrankungen ist dann geringer, <b>wenn Personen vermehrt positive soziale Interaktionen erfahren und ein stärkeres Gemeinschaftsgefühl aufweisen</b> [32].</p><p>Verschiedene Indikatoren von <b>sozialer Exklusion, bzw. geringer Inklusion benachteiligter Gruppen</b> stehen in einem Zusammenhang mit schlechterer mentaler Gesundheit [29].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(273,NULL,267,NULL,1,NULL,'Weniger Unfälle/Verletzungen',NULL,'<h5 class=\'fst-italic\'>Können durch die Berücksichtigung der Schlüsselfaktoren die Anzahl an Unfällen/Verletzungen reduziert werden?</h5><p>Indem die Verkehrsräume in einem Quartier für Fußgänger:innen sowie Fahradfahrer:innen sicherer gestaltet sowie eine <b>Trennung der Verkehrsströme</b> erfolgt, können die <b>Unfallraten reduziert</b> werden [1,33,34]. Verlagert man zudem die tägliche, aktive Fortbewegung vom motorisierten Individualverkehr hin zur Nutzung des Öffentlichen Personenverkehrs, des Fahrrads oder des zu Fußgehens, können Unfälle und Verletzungen reduziert werden [35].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(274,NULL,267,NULL,1,NULL,'Reduzierung von Schlafstörungen',NULL,'<h5 class=\'fst-italic\'>Wie wirken sich eine Anpassung der Schlüsselfaktoren auf das Auftreten von Schlafstörungen aus?</h5><p>Der Sammelbegriff Lichtverschmutzung bezeichnet die nicht intendierten Auswirkungen künstlicher Beleuchtung [36]. Wenngleich öffentliche Beleuchtung einen wichtigen Beitrag zum Schutz, Sicherheit und visuellen Attraktivität der Umgebung leistet, können bei <b>schlechter Platzierung Beeinträchtigungen wie Schlafstörungen, störendes Licht auf Anwohner:innengrundstücken, Verschwendung von Licht in den Nachthimmel und starke Blendung</b> auftreten. Durch Lichtverschmutzung können Schlafstörungen entstehen [2].</p><p>Die negativen Effekte auf Wachheit und Schlaf entstehen dabei, indem das zirkadiane System sowie das Hormon Melatonin beeinflusst werden [37].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(301,18,NULL,NULL,1,NULL,'Welche Bedeutung hat das Schwerpunktthema für eine gesundheitsfördernde Stadtentwicklung?',NULL,NULL,'container',0,1,'2024-08-30 14:25:25',NULL),
(302,NULL,301,NULL,1,NULL,'Soziale Infrastruktur umfasst Orte der Gemeinschaft, der kulturellen Vielfalt und des Austauschs, der sozialen Unterstützung, der Gesundheit, der Bildung, der Erholung, der sozialen Interaktion sowie der kommunalen Entwicklung',NULL,'<h5 class=\'fst-italic\'>Welche Bedeutung hat das Schwerpunktthema für eine gesundheitsfördernde Stadtentwicklung?</h5><p>Soziale Infrastruktur umfasst eine Bandbreite an Dienstleistungen und Einrichtungen, die das Wohlergehen des Menschen fördern. Darunter fallen grundlegende Angebote, wie<ul><li>Apotheken,</li><li>Postfilialen,</li><li>lokale Geschäfte,</li><li>Geldinstitute,</li></ul>welche für die Gewährleistung der selbstständigen Funktion eines Quartiers von Bedeutung sind. Weiterhin sind Orte für gemeinschaftliche Aktivitäten und Austausch wesentlich. Dazu zählen:<ul><li>Spielplätze,</li><li>Gemeinschaftszentren,</li><li>Bibliotheken und</li><li>Erholungseinrichtungen [1].</li></ul><b>Ein soziales Leben trägt zur mentalen und körperlichen Gesundheit des Menschen bei</b>, indem sozialer Stress durch Ausschluss oder Ablehnung vermieden wird [2]. <b>Dadurch kann die Bereitstellung von vielfältiger sozialer Infrastruktur Einsamkeit vorbeugen und den miteinhergehenden negativen, gesundheitlichen Folgen entgegenwirken.</b> Eine Annahme und erfolgreiche Etablierung der Angebote kann durch die nachfolgenden städtebaulichen Schlüsselfaktoren erzielt werden.</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(303,NULL,301,301,1,NULL,'Was sind relevante Schlüsselfaktoren für eine gesundheitsfördernde Stadtentwicklung?',NULL,NULL,'container',1,1,'2024-08-30 14:25:25',NULL),
(304,NULL,303,NULL,1,NULL,'Bereitstellung von Plätzen und Orten',NULL,'<h5 class=\'fst-italic\'>Wie befördern bereitgestellte Plätze und Orte die menschliche Gesundheit?</h5><p>Plätze und Treffpunkte können dazu beitragen, <b>Verbindungen innerhalb der Nachbarschaft aufzubauen und bestehende mit neuen Gruppen zu vernetzen</b>. Sie tragen somit zu lebhaften und nachhaltigen Quartieren bei [1]. Wichtige Faktoren für die Nutzung und Annahme von Orten und Plätzen sind:<ul><li>Intensität von Pflege und Instandhaltung,</li><li>Sicherheitsgefühl,</li><li>vielfältige Nutzungsangebote,</li><li>Zugänglichkeit und Erreichbarkeit,</li><li>Bündelung räumlicher und finanzieller Ressourcen sowie</li><li>Flexibilität in der Gestaltung und Nutzung [1,3].</li></ul></p>','default',0,1,'2024-08-30 14:25:25',NULL),
(305,NULL,303,NULL,1,NULL,'Akzeptanz und Förderung von Diversität',NULL,'<h5 class=\'fst-italic\'>Welche Bedeutung hat die Akzeptanz von Diversität für die Gesundheitsförderung?</h5><p>Um ein nachhaltiges Gemeinschaftsgefühl zu erzeugen, ist <b>Diversität innerhalb des Quartiers zu akzeptieren und zu ermöglichen</b>. Diversität bedeutet Vielfalt oder Heterogenität und bezieht sich sowohl auf die Unterschiede als auch Ähnlichkeiten zwischen Menschen an einem Ort. Diversität kann anhand von sechs primären Dimensionen beschrieben werden:<ol><li>Alter,</li><li>Geschlecht,</li><li>Ethnie/kulturelle Herkunft,</li><li>Behinderung,</li><li>sexuelle Orientierung und</li><li>Religion/Weltanschauung [4].</li></ol>Hochwertige soziale Infrastruktur kann dazu beitragen, den <b>individuellen Bedürfnissen und Interessen im Quartier</b> gerecht zu werden, das Gemeinschaftsgefühl zu stärken und darüber für Menschen <b>über die Quartiersgrenzen hinaus anziehend</b> zu wirken. [1]. Wird die Heterogenität in Quartieren bei Planungsmaßnahmen berücksichtigt, kann ein passendes Angebot/Programm für Gesundheitsförderung entwickelt werden, um die Bewohner:innen zu erreichen [3].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(306,NULL,303,NULL,1,NULL,'Gestaltung frühzeitiger und interdisziplinärer Planungen',NULL,'<h5 class=\'fst-italic\'>Welche Bedeutung hat die frühzeitige und interdisziplinäre Planung für die Gesundheitsförderung?</h5><p><b>Soziale Infrastruktur sollte strategisch/frühzeitig, vorausschauend und interdisziplinär geplant, bereitgestellt und gesichert werden.</b> Aussagen hinsichtlich der sozialen Infrastrukturanforderungen sowie -gegebenheiten, beispielsweise aus vorhandenen Quartiers- oder Sozialplanungen, können in Planungsvorhaben als strategische Ansätze genutzt werden. Dabei sollte erkennbar sein, was für die Etablierung oder Verbesserung der sozialen Infrastruktur benötigt wird, wer sie bereitstellt und auf welches Finanzierungsmodell zurückgegriffen wird. <b>Von Bedeutung ist hierbei eine zeitnahe und effiziente Umsetzung.</b> Empfehlenswert ist eine vertragliche Verpflichtung der Eigentümer:innen/Investor:innen, sich an den gebietsbezogenen Folgekosten zu beteiligen und Fristen zur Errichtung sozialer Infrastrukturen zu setzen [1].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(307,NULL,303,NULL,1,NULL,'Berücksichtigung von Bedürfnissen',NULL,'<h5 class=\'fst-italic\'>Welchen Einfluss hat die Berücksichtigung von Bedürfnissen im Gebiet auf die gesundheitsfördernde Planung?</h5><p>Eine Aufgabe der Daseinsvorsorge ist es, bestehende und erwartete Bedürfnisse von Bewohner:innen des Quartiers zu identifizieren und zu thematisieren. Soziale Infrastruktur, die diesen Bedürfnissen entspricht, kann Bewohner:innen in und außerhalb des Quartiers in das Gebiet ziehen und somit <b>die Integration sowie den Abbau physischer und sozialer Barrieren befördern</b> [1].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(308,NULL,303,NULL,1,NULL,'Förderung sozialer Begegnung und Interaktion',NULL,'<h5 class=\'fst-italic\'>Welche Bedeutung hat soziale Infrastruktur für die soziale Begegnung und Interaktion zwischen Bewohner:innen?</h5><p>Soziale Infrastruktur ermöglicht grundsätzlich Begegnungen und stellt Treffpunkte für die Bewohner:innen dar. Die Nutzung erfolgt durch Menschen verschiedenen<ul><li>Alters,</li><li>Geschlechts,</li><li>Milieus und</li><li>ethnischer Herkunft.</li></ul>Einige soziale Infrastrukturen, wie beispielsweise Spielplätze, haben eine zweckgebundene Funktion, sodass hier bestimmte Gruppen für einen bestimmten Zweck zusammenkommen. Dennoch folgt dadurch i.d.R. keine milieuspezifische Selektion und der Ort kann auch <b>für andere Ziel- und Altersgruppen für Begegnung und/oder Interaktion zur Verfügung stehen</b>.</p><p>Der <b>Begriff der Begegnung</b> ist hierbei zu differenzieren. Er beschreibt die Sichtbarkeit bei gleichzeitiger Anwesenheit mehrerer Personen sowie die Interaktion zwischen Personen, beispielsweise durch die Verwendung von Handzeichen oder geführte Gespräche. Ein <b>breites Angebot sozialer Infrastrukturen ermöglicht es, auf die Vielfalt der Gesellschaft einzugehen</b> und nicht nur Begegnungen ausgewählter Gruppen hervorzurufen. Mögliche Orte für diverse Begegnungen bilden u.a.<ul><li>Gastronomien und Einzelhandel,</li><li>Feste, Aktionen und organisierte Treffen,</li><li>Kneipen und Bars sowie</li><li>Bildungs- und Kulturstätten [3].</li></ul></p>','default',0,1,'2024-08-30 14:25:25',NULL),
(309,NULL,301,303,1,NULL,'Welche direkten Effekte sind durch die Förderung der Schlüsselfaktoren zu erwarten?',NULL,NULL,'container',1,1,'2024-08-30 14:25:25',NULL),
(310,NULL,309,NULL,1,NULL,'Förderung der Bewegung (Alltagsaktivität)',NULL,'<h5 class=\'fst-italic\'>Inwiefern können die Schlüsselfaktoren die Alltagsaktivität beeinflussen?</h5><p>Durch <b>gut erreichbare Begegnungsmöglichkeiten</b> (zu Fuß, Fahrrad, Öffentlicher Personennahverkehr) und entstehende, untereinander vernetzte Gruppen wird das grundlegende Bedürfnis nach sozialer Nähe gestillt, was sich <b>positiv auf die psychische Gesundheit und das Stresslevel auswirkt</b> [5]. Durch das bewusste Aufsuchen von Orten kommt es zudem zu einer <b>erhöhten körperlichen Aktivität</b>, was physischen Erkrankungen vorbeugt [6].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(311,NULL,309,NULL,1,NULL,'Steigerung der Lebensqualität',NULL,'<h5 class=\'fst-italic\'>Wie lässt sich die Lebensqualität der Bevölkerung verbessern?</h5><p>Qualitativ hochwertige sowie vielfältige soziale Infrastrukturen beeinflussen die Lebensqualität von Menschen inner- sowie außerhalb der Quartiersgrenzen positiv. Durch ein <b></b>breites, vielfältiges Angebot</b> kann die <b>Freizeitgestaltung entsprechend der eigenen Bedürfnisse</b> ermöglicht und hierdurch <b>verstärkende Stressreduzierungs- sowie Erholungsförderungseffekte</b> ermöglicht werden.</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(312,NULL,309,NULL,1,NULL,'Reduzierung von Stress / Förderung der Erholung',NULL,'<h5 class=\'fst-italic\'>Wie lässt sich durch Berücksichtigung der Schlüsselfaktoren Stress reduzieren?</h5><p>Durch qualitativ hochwertige soziale Infrastruktur mit ausreichend individuellen Ausgestaltungsmöglichkeiten können <b>Rückzugs- und/oder Erholungsorte</b> zur Verfügung gestellt werden. Sie können dazu beitragen, den <b>individuellen Bedürfnissen und Interessen</b> der Bewohner:innen eines Quartiers gerecht zu werden sowie das bestehende <b>Gemeinschaftsgefühl zu stärken</b>. Hierdurch können Stressfaktoren reduziert und Erholungswirkungen gefördert werden.</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(313,NULL,309,NULL,1,NULL,'Stärkung des sozialen Zusammenhalts, der Interaktion und Teilhabe',NULL,'<h5 class=\'fst-italic\'>Inwieweit lässt sich durch die Schlüsselfaktoren der soziale Zusammenhalt stärken?</h5><p>Soziale Infrastruktur, die den vielfältigen <b>Bedürfnissen und Anforderungen verschiedenster Ziel- und Nutzer:innengruppen</b> entspricht, kann eine Interaktion sowohl von Quartierbewohner:innen als auch Menschen außerhalb der Quartiersgrenzen begünstigen. Zu den positiven Effekten zählen hierbei die Verstärkung von Integrationsbestrebungen sowie der <b>Abbau physischer und sozialer Barrieren</b>. Indem Menschen sich integriert und wahrgenommen fühlen, können <b>Stressfaktoren reduziert</b> sowie positive Effekte aus zwischenmenschlichen Interaktionen genutzt werden.</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(314,NULL,309,NULL,1,NULL,'Inklusion vulnerabler Gruppen',NULL,'<h5 class=\'fst-italic\'>Wie lässt sich die Inklusion vulnerabler Gruppen verbessern?</h5><p>Soziale Infrastruktur, die den vielfältigen Bedürfnissen und Anforderungen verschiedenster Ziel- und Nutzer:innengruppen entspricht, kann die Interaktion und das Zusammenleben von Quartiersbewohner:innen begünstigen. <b>Durch eine erfolgreiche Inklusion verschiedenster vulnerabler Gruppen werden die Teilhabe am sozialen und kulturellen Leben ermöglicht</b> und positive gesundheitliche Effekte, etwa die Reduzierung von Stressfaktoren, befördert. Sie können sich zudem eigenständig/er und sicher/er im Wohnumfeld bewegen und profitieren von kurzen Wegen zu Familie und Freund:innen. <b>Die erhöhte Alltagsaktivität trägt zur Gesundheitsförderung bei.</b></p>','default',0,1,'2024-08-30 14:25:25',NULL),
(315,NULL,301,309,1,NULL,'Welche gesundheitlichen Auswirkungen sind durch die direkten Effekte zu erwarten?',NULL,'','container',1,1,'2024-08-30 14:25:25',NULL),
(316,NULL,315,NULL,1,NULL,'Verringerte Mortalität',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Mortalität/Krankheitsrisiken durch Inaktivität zu erwarten?</h5><p>Ein soziales Leben sowie die Möglichkeiten zur Interaktion mit anderen Menschen führt dazu, dass sozialer Stress, welcher durch Ausschluss oder Ablehnung entstehen kann, vermieden wird [2]. <b>Werden Stressfaktoren reduziert oder gänzlich abgebaut</b>, etwa indem die soziale Unterstützung, Zusammenhalt, Teilhabe gefördert sowie Maßnahmen zur Erhöhung der Sicherheit getroffen werden, <b>verringert sich das Mortalitätsrisiko für die Quartiersbewohner:innen</b> [7–9]. Bei Personen in sozialer Isolation ist das Mortalitätsrisiko weitestgehend unabhängig von Verhaltensfaktoren erhöht [10].</p><p>Eine <b>höher wahrgenommene Lebensqualität</b> steht in einem Zusammenhang mit geringerem Mortalitätsrisiko [11].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(317,NULL,315,NULL,1,NULL,'Einfluss auf Schlaganfallrisiken',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick Schlaganfallrisiken zu erwarten?</h5><p><b>Durch soziale Isolation und das Ausbleiben sozialer Interaktion</b> oder Teilhabe, kann sich die Stressbelastung erhöhen. Damit einhergehend <b>steigt das Risiko für Herz-Kreislauf-Erkrankungen</b> wie Bluthochdruck, Schlaganfälle oder Herzinfarkte [12]. Darüber hinaus erhöhen eine geringe soziale Unterstützung sowie soziale Isolationen mitunter die <b>Mortalitätsrate bei Schlaganfallpatient:innen</b> [13].</p><p><b>Indem die Wahrnehmung für sozialen Zusammenhalt gesteigert wird</b>, etwa durch die zuvor benannten städtebaulichen Maßnahmen, <b>kann das Schlaganfallrisiko um bis zu 15&nbsp;% verringert werden</b> [14].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(318,NULL,315,NULL,1,NULL,'Weniger Herz-Kreislauf-Erkrankungen',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Herz-Kreislauf-Erkrankungen zu erwarten?</h5><p>Eine <b>anhaltende Lärmexposition</b> kann zu schnellerem Puls, Bluthochdruck und anderen gesundheitsschädigenden Auswirkungen wie Herzinfarkt führen [15].</p><p><b>Mit erhöhter Stressbelastung steigt das Risiko für Herz-Kreislauf-Erkrankungen</b> wie Bluthochdruck, Schlaganfälle oder Herzinfarkte [12].</p><p>Bei <b>hohen Temperaturen</b> steigt das Risiko für Herzinfarkte, Herzinsuffizienzen und Schlaganfälle. Etwa ein Prozent der jährlich auftretenden Todesfälle durch Herz-Kreislauf-Erkrankungen sind auf Hitze zurückzuführen. Insbesondere gefährdet sind hochaltrige Personen mit bestehenden kardiovaskulären Vorerkrankungen [16].</p><p>Eine <b>geringere wahrgenommene Lebensqualität</b> kann bei Frauen langfristig das Risiko für das Auftreten von Herz-Kreislauf-Erkrankungen erhöhen [17].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(319,NULL,315,NULL,1,NULL,'Weniger Krebserkrankungen',NULL,'<p>Eine geringere wahrgenommene Lebensqualität kann langfristig das Risiko für das Auftreten von verschiedenen Krebserkrankungen erhöhen [18].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(320,NULL,315,NULL,1,NULL,'Verbesserte mentale Gesundheit',NULL,'<h5 class=\'fst-italic\'>Welche Auswirkungen sind im Hinblick auf die mentale Gesundheit zu erwarten?</h5><p><b>Eine erhöhte Stressbelastung steigert das Risiko für Depressionserkrankungen</b> [12]. Zudem steigert das <b>Gefühl einer geringer wahrgenommenen sozialen Unterstützung</b> das Risiko für psychologische Belastungen, insbesondere zeigt sich hier ein <b>Zusammenhang mit depressiven Symptomen und erhöhtem Stressempfinden</b> [19,20]. Die Schwere und Dauer von Depressionserkrankungen ist dann geringer, wenn Personen vermehrt positive soziale Interaktionen erfahren und ein stärkeres Gemeinschaftsgefühl aufweisen [21].</p><p>Ein <b>verbessertes Gemeinschaftsgefühl und soziale Teilhabe</b> wirkt sich neben der psychischen und körperlichen Gesundheit auch positiv auf das individuelle Selbstwertgefühl aus [22].</p><p>Verschiedene Indikatoren von <b>sozialer Exklusion, bzw. geringer Inklusion benachteiligter Gruppen</b> stehen in einem Zusammenhang mit schlechterer mentaler Gesundheit [23].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(351,19,NULL,NULL,1,NULL,'Welche Bedeutung hat das Schwerpunktthema für eine gesundheitsfördernde Stadtentwicklung?',NULL,NULL,'container',0,1,'2024-08-30 14:25:25',NULL),
(352,NULL,351,NULL,1,NULL,'Sozialer Zusammenhalt und Integration',NULL,'<h5 class=\'fst-italic\'>Welche Bedeutung hat das Schwerpunktthema für eine gesundheitsfördernde Stadtentwicklung?</h5><p>Wenngleich Stadtentwicklung allein keine Quartiere mit funktionierenden sozialen Netzwerken und gemeinschaftlichen Aktivitäten bewirken kann, ist es möglich, <b>sozialen Zusammenhalt durch einige Aspekte der gebauten Wohnumgebung zu fördern und zu unterstützen</b>. Im Gegenzug ist es möglich, dass Bebauungsformen dem sozialen Zusammenhalt schaden. Hier können monostrukturierte Siedlungen Benachteiligte isolieren oder Verkehrskorridore soziale Verbindungen erschweren und als Barrieren wirken [1].</p><p>Die Möglichkeit der Teilhabe am gemeinschaftlichen Leben gilt als <b>zentrales menschliches Bedürfnis</b> und stellt einen grundlegenden Baustein für die psychische Gesundheit von Individuen und Gemeinschaften dar [2]. Dabei kann hochwertig gestalteter Öffentlicher (Frei-)Raum das Gemeinschaftsgefühl positiv beeinflussen [3]. Die Teilhabe kann von den geografischen und baulichen Merkmalen eines bestimmten Gebietes, Ortes oder Platzes, den demografischen Merkmalen des Quartiers und nachbarschaftlichen Netzwerken beeinflusst werden [1].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(353,NULL,351,351,1,NULL,'Was sind relevante Schlüsselfaktoren für eine gesundheitsfördernde Stadtentwicklung?',NULL,NULL,'container',1,1,'2024-08-30 14:25:25',NULL),
(354,NULL,353,NULL,1,NULL,'Bewegungsförderliche Quartiere',NULL,'<h5 class=\'fst-italic\'>Inwiefern können bewegungsfreundliche Quartiere soziale Parameter begünstigen?</h5><p>Wenn Quartiere bewegungsfördernd gestaltet werden, wird die Fortbewegung zu Fuß oder mit dem Fahrrad in der lokalen Umgebung begünstigt. Dadurch können informelle Kontakte entstehen und es kann zu zufälligen Begegnungen mit anderen Anwohner:innen kommen [1].</p><p>Bewohner:innen von fußgänger:innenfreundlichen Wohnumgebungen zeigen im Vergleich zu Personen in weniger bewegungsfreundlichen Gegenden <b>erhöhte Werte in den Bereichen der sozialen Interaktionen und dem nachbarschaftlichen Zusammenhalt</b> [4].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(355,NULL,353,NULL,1,NULL,'Gemeinschaftliche Begegnungsräume',NULL,'<h5 class=\'fst-italic\'>Inwiefern können gemeinschaftliche Begegnungsräume soziale Parameter begünstigen?</h5><p>Ein attraktiver Öffentlicher (Frei-)Raum sowie öffentlich zugängliche Einrichtungen, die sich in der Nähe der Gemeinschaft befinden, zusammen mit privaten Angeboten wie Cafés, tragen dazu bei, <b>dass Menschen sich leichter treffen und Kontakte knüpfen, sowie an gemeinschaftlichen Aktivitäten teilnehmen können</b> [1].</p><p>So können zum Beispiel lebendige Orte wie städtische Parks durch die Begünstigung sozialer Interaktionen den sozialen Zusammenhalt in der Stadtgesellschaft stärken [5].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(356,NULL,353,NULL,1,NULL,'Kurze Arbeitswege',NULL,'<h5 class=\'fst-italic\'>Inwiefern können kurze Arbeitswege soziale Parameter begünstigen?</h5><p>Kurze Distanzen zwischen Wohnort und Arbeitsplatz können die benötigte Zeit zum Pendeln reduzieren und <b>ermöglichen es, mehr Energie und Zeit in soziale Netzwerke und gemeinschaftliche Aktivitäten zu investieren</b>.</p><p>Personen mit höheren Pendelzeiten weisen häufiger eine geringere soziale Teilhabe und höhere soziale Unzufriedenheit auf [6,7].</p><p>Insofern können stadtplanerische Ansätze zur Förderung kurzer Arbeitswege sich positiv auf verschiedene soziale Parameter auswirken [1].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(357,NULL,353,NULL,1,NULL,'Vermeidung von Dispersion und Barrieren',NULL,'<h5 class=\'fst-italic\'>Inwiefern kann die Vermeidung von dispersen Siedlungsstrukturen soziale Parameter begünstigen?</h5><p>Durch disperse, baulich sowie verkehrlich, wenig angebundene Siedlungsstrukturen können neben den physischen Barrieren auch soziale Barrieren im Hinblick auf existierende Gemeinschaften einhergehen, da das Wohnen in diesen Siedlungsstrukturen oft in einem Zusammenhang mit einem geringen Gemeinschaftsgefühl steht.</p><p><b>Diese Dispersion (Zergliederung) von Quartieren durch dauerhafte Barrieren wie stark befahrene Straßen oder Bahngleise können den Zugang zu Gemeinschaftsnetzwerken und -einrichtungen maßgeblich einschränken.</b></p><p>Vorhaben der Neuplanung von Quartieren sollten dementsprechend an gewachsene Strukturen angebunden werden, um die gemeinschaftliche Nutzung von vorhandenen Angeboten wie Geschäften, Cafés, Nachbarschaftszentren, Schulen, Bibliotheken oder Sportvereinen zu ermöglichen und damit die soziale Teilhabe und das Gemeinschaftsgefühl zu stärken [1].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(358,NULL,351,353,1,NULL,'Welche direkten Effekte sind durch die Förderung der Schlüsselfaktoren zu erwarten?',NULL,NULL,'container',1,1,'2024-08-30 14:25:25',NULL),
(359,NULL,358,NULL,1,NULL,'Verbesserter sozialer Zusammenhalt',NULL,'<h5 class=\'fst-italic\'>Was ist mit sozialem Zusammenhalt gemeint und wie kann dieser gefördert werden?</h5><p><b>Der Begriff sozialer Zusammenhalt beschreibt das Ausmaß an Verbundenheit und Solidarität zwischen Gruppen in der Gesellschaft.</b> Als Hauptdimensionen werden dabei das Zugehörigkeitsgefühl und die Beziehungen zwischen den Gesellschaftsmitgliedern beschrieben [8].</p><p>Fußgängerfreundliche Wohnumgebung oder lebendige Orte wie städtische Parks können zur Stärkung des sozialen Zusammenhalts beitragen [4,5].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(360,NULL,358,NULL,1,NULL,'Mehr soziale Unterstützung',NULL,'<h5 class=\'fst-italic\'>Was ist mit sozialer Unterstützung gemeint und wie kann diese gefördert werden?</h5><p>Soziale Unterstützung ist eine <b>qualitative Eigenschaft sozialer Beziehungen und kann durch Eingliederung in soziale Netzwerke und soziale Teilhabe stattfinden</b>. Die Unterstützung von Individuen aus sozialen Beziehungen lässt sich quantitativ durch die Anzahl und Frequenz sozialer Kontakte sowie qualitativ durch die soziale Unterstützung bewerten [9].</p><p>Vermehrt soziale Unterstützung zu erfahren, geht häufig mit einer höheren Lebensqualität einher [10].</p><p>Kurze Distanzen zwischen Wohnort und Arbeitsplatz können die benötigte Zeit zum Pendeln reduzieren und ermöglichen es, mehr Energie und Zeit für die Pflege sozialer Netzwerke zu schaffen, was soziale Unterstützung begünstigt.</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(361,NULL,358,NULL,1,NULL,'Verbessertes Gemeinschaftsgefühl',NULL,'<h5 class=\'fst-italic\'>Was ist mit dem Gemeinschaftsgefühl gemeint und wie kann dieses gefördert werden?</h5><p>Das Gemeinschaftsgefühl oder der Gemeinschaftssinn wird häufig als <b>Zugehörigkeitsgefühl, Gefühl der gegenseitigen Anerkennung und einem gemeinsamen Glauben, dass Bedürfnisse durch das Zusammensein erfüllt werden</b>, innerhalb einer Gruppe definiert [3].</p><p>Durch disperse Siedlungsstrukturen können neben physischen Barrieren auch soziale Barrieren im Hinblick auf existierende Gemeinschaften einhergehen, denn das Wohnen in diesen Siedlungsstrukturen steht, aufgrund fehlenden Zugangs zu Gemeinschaftsnetzwerken- und Einrichtungen, oft in einem Zusammenhang mit einem geringen Gemeinschaftsgefühl. Vorhaben der Neuplanung von Quartieren sollten dementsprechend an gewachsene Strukturen angebunden werden, um die gemeinschaftliche Nutzung von vorhandenen Angeboten wie Geschäften, Cafés, Nachbarschaftszentren, Schulen, Bibliotheken oder Sportvereinen zu ermöglichen und damit die soziale Teilhabe und das Gemeinschaftsgefühl zu stärken [1].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(362,NULL,351,358,1,NULL,'Welche gesundheitlichen Auswirkungen sind durch die direkten Effekte zu erwarten?',NULL,'','container',1,1,'2024-08-30 14:25:25',NULL),
(363,NULL,362,NULL,1,NULL,'Verringerte Mortalität',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf die Mortalität zu erwarten?</h5><p>Faktoren wie eine <b>erhöhte soziale Unterstützung, sozialer Zusammenhalt und soziale Teilhabe</b> verringern das Mortalitätsrisiko [11–13].</p><p>Bei Personen in sozialer Isolation ist das Mortalitätsrisiko weitestgehend unabhängig von Verhaltensfaktoren erhöht [14].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(364,NULL,362,NULL,1,NULL,'Weniger Herz-Kreislauf-Erkrankungen',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Herz-Kreislauf-Erkrankungen zu erwarten?</h5><p>Ein <b>höherer wahrgenommener sozialer Zusammenhalt</b> kann das Schlaganfallrisiko um 15&nbsp;% verringern [15].</p><p><b>Geringe soziale Unterstützung und soziale Isolation</b> erhöhen mitunter die Mortalitätsrate bei Schlaganfallpatient:innen [16].</p><p>Ein <b>hohes Maß an sozialer Unterstützung</b> steht zudem in einem Zusammenhang mit einer schnelleren Genesung nach erlittenen Schlaganfällen [17].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(365,NULL,362,NULL,1,NULL,'Verbesserte mentale Gesundheit',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf die mentale Gesundheit zu erwarten?</h5><p><b>Geringe soziale Unterstützung</b> erhöht das Risiko für psychologische Belastungen, insbesondere zeigt sich hier ein Zusammenhang mit depressiven Symptomen und erhöhtem Stressempfinden [18,19].</p><p>Die Schwere und Dauer von Depressionserkrankungen ist dann geringer, wenn Personen <b>vermehrt positive soziale Interaktionen erfahren und ein stärkeres Gemeinschaftsgefühl aufweisen</b> [20].</p><p>Verschiedene <b>Indikatoren von sozialer Exklusion, bzw. geringer Inklusion</b> benachteiligter Gruppen stehen in einem Zusammenhang mit schlechterer mentaler Gesundheit [21].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(401,20,NULL,NULL,1,NULL,'Welche Bedeutung hat das Schwerpunktthema für eine gesundheitsfördernde Stadtentwicklung?',NULL,NULL,'container',0,1,'2024-08-30 14:25:25',NULL),
(402,NULL,401,NULL,1,NULL,'Sicherheit und Schutz beeinflussen das soziale Wohlbefinden, den Städtebau, die Kriminalitätsrate sowie die psychische und physische Gesundheit',NULL,'<h5 class=\'fst-italic\'>Welche Bedeutung hat das Schwerpunktthema für eine gesundheitsfördernde Stadtentwicklung?</h5><p>Gesundheit und Wohlbefinden hängen u.a. von den sozialen Rahmenbedingungen der Wohnumgebung ab. Entscheidend ist, ob ein Gefühl von Sicherheit und Schutz vermittelt werden kann [1], denn <b>Sicherheit ist nicht nur Prävention vor Bedrohung, sondern auch die individuell wahrgenommene Sicherheit</b> [2]. Dabei variiert das empfundene Sicherheitsgefühl innerhalb der Bevölkerungsgruppen, geprägt durch z.B.<ul><li>Wohnlage,</li><li>Alter,</li><li>Geschlecht.</li></ul>In manchen Quartieren tritt Kriminalität temporär auf, andere sind von strukturellen Problemen und schlechtem Image betroffen. <b>Kriminalität und Gewalt können einerseits Angst und körperliche Verletzungen verursachen, anderseits das Stressniveau erhöhen sowie das Selbstvertrauen und Selbstwertgefühl beeinflussen.</b> Dadurch wird dem Menschen das Gefühl vermittelt, verwundbar zu sein [1].</p><p>Durch Stadtentwicklung können verschiedene Maßnahmen ergriffen werden, um Kriminalität und ihre gesundheitlichen Folgen zu verringern. Dazu gehören die<ul><li>Beseitigung von Angsträumen,</li><li>Beteiligung der Anwohnenden,</li><li>Gewährleistung einer qualitätsvollen Nutzungsvielfalt</li><li>und Sicherheitsstärkung durch Sozialmanagement.</li></ul><b>Werden der Zusammenhalt und die sozialen Netzwerke im Quartier gefördert, kann das insbesondere die psychische Gesundheit positiv beeinflussen</b> [3] zit. n. [1].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(403,NULL,401,401,1,NULL,'Was sind relevante Schlüsselfaktoren für eine gesundheitsfördernde Stadtentwicklung?',NULL,NULL,'container',1,1,'2024-08-30 14:25:25',NULL),
(404,NULL,403,NULL,1,NULL,'Abbau und Vermeidung von Angsträumen',NULL,'<h5 class=\'fst-italic\'>Wie befördert die Stadtgestaltung die Sicherheit in Quartieren?</h5><p><b>Durch angepasste Stadtgestaltung und städtebauliche Planung werden Angsträume und Tatgelegenheiten vermieden.</b> Dadurch kann ein Sicherheitsgefühl entstehen. Möglichkeiten bilden beispielsweise<ul><li>eine verbesserte Beleuchtung im öffentlichen Raum,</li><li>das Schaffen von übersichtlichen, gut einsehbaren Wegen, Hauseingängen und Freiflächen [4] zit. n. [1] oder</li><li>auch die Verwendung vandalismusresistenter Materialien [5] zit. n. [1].</li></ul>Die Gestaltung allein ist jedoch nicht ausreichend für das Sicherheitsgefühl vor Ort, sondern geht mit weiteren sozialen Faktoren einher. Dabei ist eine <b>Zusammenarbeit zwischen den unterschiedlichen Akteur:innen erforderlich</b>, dazu zählen:<ul><li>soziale Institutionen,</li><li>lokale Gewerbetreibende,</li><li>Wohnungsunternehmen,</li><li>Polizei,</li><li>die kommunale Verwaltung,</li><li>die Bürger:innen [2].</li></ul></p>','default',0,2,'2024-08-30 14:25:25',NULL),
(405,NULL,403,NULL,1,NULL,'Beteiligung und Sensibilisierung der Anwohner:innen',NULL,'<h5 class=\'fst-italic\'>Welche Bedeutung hat die Beteiligung und Sensibilisierung der Anwohner:innen für die Gesundheitsförderung und Kriminalitätsprävention?</h5><p>Die <b>Beteiligung ansässiger Personen oder Organisationen</b> kann Kriminalität und Kriminalitätsfurcht in geplanten und bestehenden Gebieten verringern oder sogar verhindern. Durch die Einbindung in Prozesse werden Maßnahmen und Strategien gemeinsam diskutiert und entwickelt [1]. <b>Dadurch wird die bewusste Wahrnehmung des Lebensumfeldes und die Identifikation mit dem eigenen Quartier gefördert.</b> Durch Teilhabe fühlen sich die Bewohner:innen zugehörig und begreifen sich als Teil der Entwicklung [6]. Um die Menschen in den Quartieren zu sensibilisieren, sind Beteiligungsformate denkbar. Dazu gehören beispielsweise Informationsveranstaltungen wie Podiumsdiskussionen oder Zukunftswerkstätten, welche durch Schulungen oder Vorträge ergänzt werden [1].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(406,NULL,403,NULL,1,NULL,'Sozialmanagement',NULL,'<h5 class=\'fst-italic\'>Welche Bedeutung hat ein qualitativ hochwertiges Sozialmanagement für die Gesundheitsförderung und das Sicherheitsempfinden?</h5><p>Ein Sozialmanagement wird vor allem von wohnungswirtschaftlichen Akteur:innen, wie Wohngesellschaften, Wohneigentümer:innen oder Eigentümergemeinschaften, betrieben. Zur Erhöhung der lokalen Sicherheit werden häufig Hausmeister:innen und Concierge als Ansprechpersonen eingesetzt. Durch das <b>Einbeziehen der Bewohnerschaft und eine angepasste städtebauliche Gestaltung</b>, beispielsweise durch die Ausrichtung der Fenster, wird die <b>soziale Kontrolle</b>, also das Gefühl, im Falle einer Notsituation nicht allein zu sein, gefördert sowie <b>Kriminalitätsprävention</b> betrieben. Soziale Kontrollaktivitäten der Polizei in Öffentlichen (Frei-)Räumen können hierbei das Sozialmanagement im privaten Raum ergänzen [11].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(407,NULL,403,NULL,1,NULL,'Qualitätsvolle Nutzungsvielfalt und Akzeptanz von Diversität',NULL,'<h5 class=\'fst-italic\'>Welchen Einfluss haben die Nutzungsvielfalt und -qualität sowie die Akzeptanz von Diversität eines Quartiers auf die gesundheitsfördernde Stadtentwicklung?</h5><p>Finden verschiedene Nutzungen in Öffentlichen Räumen, beispielsweise durch <b>Aneignungsmöglichkeiten oder Anreize zur diversen Nutzung</b> in einem verträglichen Maß statt, wird Aktivität hervorgerufen oder erhöht. Dadurch ist ein besseres Sicherheitsgefühl gegeben, da eine Belebung des Raumes mit einhergehender Senkung des Kriminalitätsrisikos auftritt [7] zit. n. [1]. <b>Fühlen sich die Anwohner:innen für ihre Öffentlichen (Frei-)Räume mitverantwortlich, geht daraus ein rücksichtsvollerer Umgang hervor</b> [8] zit. n. [1].</p><p>Gleichzeitig begünstigen qualitätsvolle und vielfältig ausgestaltete Räume bzw. Orte die Sicherheit [9]. Sie können helfen, gesellschaftliche Diversität positiv wahrzunehmen und Verunsicherungen sowie negative Beeinflussung des subjektiven Sicherheitsempfindens vorzubeugen [10]. Eine <b>hohe Nutzungsvielfalt</b> bietet dabei Möglichkeiten für gelungene Begegnung und Austausch zwischen den Quartiersbewohner:innen. Dadurch können Vorurteile und Ängste abgebaut werden, indem Vertrauen und soziale Beziehungen entstehen. Dies trägt zu einer Verstärkung des wahrgenommenen Sicherheitsgefühls bei. <b>Da auch gegensätzliche Effekte und Konflikte auftreten können, spielen Maßnahmen der Integration eine wesentliche Rolle, um die Nachbarschaft zu stärken.</b> Insbesondere bei hohen Anteilen von Migrant:innen besteht Integrationsbedarf, dem durch soziale und städtebauliche Projekte begegnet werden kann [11].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(408,NULL,403,NULL,1,NULL,'Trennung von Verkehrsströmen',NULL,'<h5 class=\'fst-italic\'>Welchen Beitrag leistet die Trennung von Verkehrsströmen in einer Stadt für die Sicherheit und den Schutz des Menschen?</h5><p>Sicherheit und Schutz spielen auch im Straßenverkehr eine wesentliche Rolle. Die Verkehrsströme<ul><li>Fußverkehr,</li><li>Radverkehr,</li><li>Öffentlicher Personennahverkehr (ÖPNV) und</li><li>Motorisierter Individualverkehr (MIV)</li></ul>gehen dabei mit unterschiedlichen Nutzungsansprüchen einher. Während Fußgänger:innen im Vergleich zu anderen Verkehrsteilnehmenden deutlich langsamer unterwegs sind und einige Flächen im Straßenraum als Aufenthaltsorte nutzen, streben der MIV und Radverkehr meist eine schnelle Fortbewegung ohne Unterbrechungen an. <b>Durch das gemeinsame Nutzen von Verkehrsflächen entstehen folglich ein höheres Unfallrisiko und Konflikte, die durch Trennung der Verkehrswege vermieden werden können.</b> Beispielsweise zeigen sich auf gemischten Rad- und Fußwegen Probleme zwischen Fußgänger:innen und Radfahrer:innen. Während 6&nbsp;% aller Radverkehrsunfälle mit Personenschaden unter Beteiligung von Fußgänger:innen geschehen, sind an etwa 15&nbsp;% aller Fußverkehrsunfälle mit Personenschaden Radfahrer:innen beteiligt [12]. Eine Trennung in Bereiche hoher Radverkehrs- und Fußgängerströme kann in diesen Fällen Unfallraten reduzieren. Möglichkeiten bestehen durch eine lenkende Wirkung mithilfe von unterschiedlichen Bodenbelägen, Markierungen oder begrenzten Freigaben von z.B. Fußgängerzonen abseits der Stoßzeiten für den Radverkehr [12].</p><p>In Straßenräumen mit hoher Fußverkehrsfrequenz kann das Unfallrisiko durch reduzierte Geschwindigkeiten für Kraftfahrzeuge und sichere Querungsmöglichkeiten für Fußgänger:innen minimiert werden. In Anlehnung an das in Großbritannien entwickelte „Manual for Streets“ sollte bei der Entwicklung und Neuplanung von Verkehrsräumen, wie Straßen und deren zugeordneten Räumen, eine <b>veränderte Hierarchisierung der Verkehrsteilnehmer:innen</b> zur Anwendung kommen [13] zit. n. [1]. Diese umfasst folgende Punkte:<ul><li>Schwächung des motorisierten Individualverkehrs (MIV) bei gleichzeitiger Stärkung anderer Verkehrsteilnehmer:innen/Fortbewegungsformen,</li><li>Rücknahme der Nutzung und Unterbringung des MIV im Straßenraum (Reduzierung von Stellplätzen),</li><li>Erschließung von Aufenthalts- und Nutzungspotentialen in Straßen- und angrenzenden, öffentlichen Räumen,</li><li>Erhöhung der Verkehrssicherheit durch strikte (bauliche oder optische) Trennung der Verkehrsteilnehmer:innen und</li><li>Schaffung von kompakteren, städtischen Strukturen <em>(Stadt der kurzen Wege, 15-Minuten-Stadt)</em> zur Erhöhung der Alltagsaktivität bei gleichzeitiger Abkehr vom Prinzip der autogerechten Stadt.</li></ul>Die daraus resultierende Neuordnung der Hierarchie von Verkehrsteilnehmer:innen würde demnach folgendem Schema folgen, in welchem die Fußgänger:innen an erster Stelle stehen [14]:</p><p class=\'text-center fw-bold\'>Fußgänger:innen > Radfahrende / ÖPNV > Sonderfahrzeuge > MIV</p><p>Durch „hochwertige Fußwege, abgetrennte Bürgersteige, verkehrsberuhigte Bereiche, die Trennung von Fußwegen und motorisiertem Verkehr sowie der verstärkte Einsatz von aufwertenden Gestaltungsmaßnahmen (Bäume, Sitzbänke und Kunst im öffentlichen Raum)“ [15] zit. n. [1] kann die wahrgenommene und tatsächliche Sicherheit befördert werden. Dadurch können vor allem vulnerable Zielgruppen, wie ältere Menschen, Kinder und Jugendliche, effektiver geschützt werden.</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(409,NULL,401,403,1,NULL,'Welche direkten Effekte sind durch die Förderung der Schlüsselfaktoren zu erwarten?',NULL,NULL,'container',1,1,'2024-08-30 14:25:25',NULL),
(410,NULL,409,NULL,1,NULL,'Förderung der Bewegung (Alltagsaktivität)',NULL,'<h5 class=\'fst-italic\'>Inwiefern beeinflussen die Schlüsselfaktoren die Alltagsaktivität?</h5><p>Finden verschiedene Nutzungen in Öffentlichen (Frei-)Räumen, beispielsweise durch Aneignungsmöglichkeiten oder Anreize zur diversen Nutzung in einem verträglichen Maß statt, wird <b>(körperliche) Aktivität hervorgerufen oder erhöht</b>. Fühlen sich die Anwohner:innen zudem für ihre Öffentlichen (Frei-)Räume mitverantwortlich, geht daraus ein <b>rücksichtsvollerer Umgang</b> mit diesen und den Nutzer:innen hervor [8] zit. n. [1].</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(411,NULL,409,NULL,1,NULL,'Reduzierung von Stress / Förderung der Erholung',NULL,'<h5 class=\'fst-italic\'>Inwiefern beeinflussen die Schlüsselfaktoren das Auftreten von Stress?</h5><p>Treten in Quartieren <b>Gefühle der Unsicherheit oder Angst</b> auf, dann können diese das <b>Stressniveau erhöhen</b> [16] und die Erholungswirkung deutlich schwächen. Sind darüber hinaus Kriminalität und körperliche/tätliche Übergriffe in Verbindung mit strukturellen und/oder schlechter Innen- und Außendarstellung (=Image) feststellbar, können <b>Angst und Stressniveaus verstärkt</b> werden und <b>Selbstvertrauen und Selbstwertgefühl</b> der Quartiersbewohner:innen negativ beeinflussen. Die genannten Faktoren nehmen direkt und indirekt Einfluss auf die menschliche Gesundheit.</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(412,NULL,409,NULL,1,NULL,'Stärkung sozialer Zusammenhalt, Interaktion & Teilhabe',NULL,'<h5 class=\'fst-italic\'>Inwiefern beeinflussen die Schlüsselfaktoren die Stärkung des sozialen Zusammenhalts?</h5><p>Faktoren wie die Gestaltung und Teilhabe an der Entwicklung von Räumen in einem Quartier können zu einer <b>Verbesserung des wahrgenommenen sowie tatsächlichen Sicherheitsgefühls</b> beitragen. Um diese zu gewährleisten gilt es jedoch, dass die verschiedenen kommunalen, wirtschaftlichen sowie sozio-kulturellen Akteur:innen <b>gemeinsam</b> mit den Quartiersbewohner:innen <b>an Lösungen arbeiten</b>. Mit der <b>Erhöhung des Sicherheitsgefühls</b> geht eine Förderung der Gesundheit einher, beispielsweise durch die Reduzierung von Stresssituationen sowie das Ermöglichen von Entspannung und Erholung.</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(413,NULL,409,NULL,1,NULL,'Rückgang von Angst und Unsicherheit',NULL,'<h5 class=\'fst-italic\'>Wie können die Schlüsselfaktoren Unsicherheit und Angst beeinflussen?</h5><p>Qualitätsvolle und vielfältig ausgestaltete Räume oder Orte begünstigen die Sicherheit und das wahrgenommene Sicherheitsgefühl [9]. Dadurch können <b>Vorurteile und Ängste abgebaut werden, indem Vertrauen und soziale Beziehungen entstehen</b>. Diese Faktoren nehmen direkt und indirekt Einfluss auf die menschliche Gesundheit.</p><p>Durch eine angepasste Stadtentwicklung und städtebauliche Planungen können <b>potentielle Angsträume und Orte für Tatgelegenheiten vermieden werden</b>. Dadurch kann ein Sicherheitsgefühl entstehen und <b>stressinduzierende Situationen reduziert</b> oder vermieden werden. Durch eine Beteiligung ansässiger Personen oder Organisationen kann <b>Kriminalität und Kriminalitätsfurcht</b> in geplanten und bestehenden Gebieten <b>verringert oder sogar verhindert</b> werden. Diese Faktoren wirken sich gesundheitsfördernd auf die Quartiersbewohner:innen aus.</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(414,NULL,409,NULL,1,NULL,'Reduzierung verkehrsbedingter Unfallrisiken',NULL,'<h5 class=\'fst-italic\'>Inwiefern beeinflussen die Schlüsselfaktoren die verkehrsbedingten Unfallrisiken?</h5><p>Die gemeinsame Nutzung von Verkehrsflächen durch die verschiedenen Verkehrsteilnehmer:innen (Fußgänger:innen, Fahrradfahrer:innen, motorisierter Individualverkehr und Öffentlicher Personennahverkehr) führt zu Konflikten und einem höheren Unfallrisiko, die durch <b>Trennung der Verkehrswege</b> vermieden werden können. Die damit einhergehenden <b>Senkungen von Unfallzahlen sowie die gesundheitlichen Vorteile</b> liegen hierbei auf der Hand.</p>','default',0,2,'2024-08-30 14:25:25',NULL),
(415,NULL,409,NULL,1,NULL,'Verbesserung von Image & Raumwahrnehmung',NULL,'<h5 class=\'fst-italic\'>Inwiefern beeinflussen die Schlüsselfaktoren das Image und die Raumwahrnehmung?</h5><p>Treten in Quartieren Gefühle der Unsicherheit oder Angst auf, dann können diese das Stressniveau erhöhen und die Erholungswirkung deutlich schwächen. Treten darüber hinaus Kriminalität und körperliche/tätliche Übergriffe in Verbindung mit strukturellen und/oder schlechter Innen- und Außendarstellung (=Image) auf, können Angst und Stressniveaus verstärkt werden und Selbstvertrauen und Selbstwertgefühl beeinflussen. <b>Diese Faktoren beeinflussen direkt und indirekt die menschliche Gesundheit.</b></p>','default',0,2,'2024-08-30 14:25:25',NULL),
(416,NULL,401,409,1,NULL,'Welche gesundheitlichen Auswirkungen sind durch die direkten Effekte zu erwarten?',NULL,'','container',1,1,'2024-08-30 14:25:25',NULL),
(417,NULL,416,NULL,1,NULL,'Verringerte Mortalität',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Mortalität/Krankheitsrisiken durch Inaktivität zu erwarten?</h5><p>Als unsicher wahrgenommene Räume in Quartieren führen zu einer höheren Stressbelastung für die Nutzer:innen, welche sich wiederum negativ auf deren Gesundheit auswirken kann [1]. <b>Eine hohe Stressbelastung steht dabei in einem Zusammenhang mit einem um annähernd 55&nbsp;% erhöhten Mortalitätsrisiko</b> [17].</p><p><b>Werden die Stressfaktoren reduziert oder gänzlich abgebaut</b>, etwa indem die soziale Unterstützung, Zusammenhalt, Teilhabe gefördert sowie Maßnahmen zur Erhöhung der Sicherheit getroffen werden, <b>verringert sich das Mortalitätsrisiko</b> [18–20].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(418,NULL,416,NULL,1,NULL,'Weniger Herz-Kreislauf-Erkrankungen',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf Herz-Kreislauf-Erkrankungen zu erwarten?</h5><p><b>Mit erhöhter Stressbelastung steigt das Risiko für Herz-Kreislauf-Erkrankungen</b> wie Bluthochdruck, Schlaganfälle oder Herzinfarkte [17]. Herz-Kreislauf-Erkrankungen zählen weltweit zu den häufigsten Todesursachen. Die wichtigste Störung dabei ist die Arteriosklerose (Gefäßverengung der Arterien), welche zu verschiedenen Krankheitsbildern wie Herzinfarkt, koronarer Herzkrankheit oder Schlaganfall führen kann [21].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(419,NULL,416,NULL,1,NULL,'Verbesserte mentale Gesundheit',NULL,'<h5 class=\'fst-italic\'>Welche Auswirkungen sind im Hinblick die mentale Gesundheit zu erwarten?</h5><p><b>Eine erhöhte Stressbelastung steigert das Risiko für Depressionserkrankungen</b> [17]. Zudem steigert das Gefühl einer als geringer wahrgenommenen sozialen Unterstützung das Risiko für psychologische Belastungen, insbesondere zeigt sich hier ein Zusammenhang mit depressiven Symptomen und erhöhtem Stressempfinden [22,23]. Die <b>Schwere und Dauer von Depressionserkrankungen</b> ist dann geringer, wenn Personen vermehrt positive soziale Interaktionen erfahren und ein stärkeres Gemeinschaftsgefühl aufweisen [24].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(420,NULL,416,NULL,1,NULL,'Weniger Unfälle/Verletzungen',NULL,'<h5 class=\'fst-italic\'>Welche gesundheitlichen Auswirkungen sind im Hinblick auf die Anzahl an Unfällen/Verletzungen zu erwarten?</h5><p><b>Indem die Verkehrsräume</b> in einem Quartier für Fußgänger:innen sowie Fahradfahrer:innen <b>sicherer gestaltet werden sowie eine Trennung der Verkehrsströme erfolgt, können die Unfallraten reduziert werden</b> [12,25,26]. Verlagert man zudem die tägliche, aktive Fortbewegung vom motorisierten Individualverkehr (MIV) hin zur Nutzung des Öffentlichen Personenverkehrs, des Fahrrads oder des Zufußgehens, werden weiterhin Unfälle und Verletzungen, welche teilweise tödlich enden, reduziert [26].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(451,21,NULL,NULL,1,NULL,'Welche Bedeutung hat das Schwerpunktthema für eine gesundheitsfördernde Stadtentwicklung?',NULL,NULL,'container',0,1,'2024-08-30 14:25:25',NULL),
(452,NULL,451,NULL,1,NULL,'Die Verfügbarkeit gesunder Lebensmittel als Voraussetzung für eine gesunde Ernährung',NULL,'<h5 class=\'fst-italic\'>Welche Bedeutung hat das Schwerpunktthema für eine gesundheitsfördernde Stadtentwicklung?</h5><p><b>Der Zugang zu frischen, nahrhaften und bezahlbaren Lebensmitteln wird als Ernährungssicherheit bezeichnet. Diese hat einen entscheidenden Einfluss auf unsere Gesundheit und unser Wohlbefinden</b> [1,2].</p><p class=\'color-box\'>Eine <b>ausgewogene Ernährung</b> ist reich an Obst, Gemüse, Vollkornprodukten, magerem Eiweiß und gesunden Fetten.</p><p>Neben der Versorgung mit Energie- und Nährstoffen und damit der Gewährleistung physiologischer Gesundheit, spielt Essen auch im sozialen und kulturellen Kontext eine Rolle für das Wohlbefinden.</p><p>Deutschland verfügt im Allgemeinen zu jeder Jahreszeit über ein reichhaltiges und relativ preiswertes Lebensmittelangebot. Allerdings gibt es sozial- und einkommensabhängige Unterschiede im Zugang zu gesunden Lebensmitteln. Aus gesundheitlicher Perspektive ist dies relevant, weil Menschen mit niedrigem Einkommen und geringerer formaler Bildung in verschiedener Hinsicht ungünstigere Ernährungsmuster aufweisen als Menschen mit mittlerem und hohem Einkommen und Bildung [3,4].</p><p>In diesem Zusammenhang umfasst eine politische Zielsetzung die „...Förderung einer gesünderen, ressourcenschonenden und pflanzenbetonten Ernährung und von mehr Bewegung – auch unter Berücksichtigung aktueller Probleme wie z.B. steigender Lebensmittelkosten...“ [5]. Des Weiteren sollen allen Bevölkerungs-, sozialen sowie Einkommensgruppen nachhaltige sowie gesunde Ernährungsangebote zur Verfügung gestellt werden [3].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(453,NULL,451,451,1,NULL,'Was sind relevante Schlüsselfaktoren für eine gesundheitsfördernde Stadtentwicklung?',NULL,NULL,'container',1,1,'2024-08-30 14:25:25',NULL),
(454,NULL,453,NULL,1,NULL,'Verfügbarkeit gesunder Lebensmittel',NULL,'<h5 class=\'fst-italic\'>Welchen Beitrag leistet die Verfügbarkeit gesunder Lebensmittel für eine gesundheitsfördernde Stadtentwicklung?</h5><p>Im Kontext von Stadtplanung und -entwicklung stehen vor allem die <b>ortsnahe Erreichbarkeit von Verkaufsstellen gesunder Lebensmittel (physische Infrastruktur)</b> mit bezahlbaren Lebensmittelangeboten, sowie Geschäfte und Wochenmärkte mit verschiedenen sozial und kulturell passenden gesunden Lebensmitteln in der Nachbarschaft [6].</p><p>Der Zugang zu qualitativ hochwertigem sowie bezahlbarem Obst und Gemüse wird von der Lebensmittelproduktion und -transport, der Einzelhandelsstruktur und dessen Preispolitik beeinflusst.</p><p>Die gute Erreichbarkeit von Wochenmärkten und anderen Verkaufsstellen, die frisches Obst und Gemüse anbieten, kann dazu beitragen, den Konsum von Obst und Gemüse zu erhöhen. Wochenmärkte bieten oft eine breite Palette von Produkten an, die von lokalen Erzeugern stammen und in der Regel frischer und qualitativ hochwertiger sind als die im Supermarkt erhältlichen Produkte [6].</p><p>Eine Möglichkeit, den Zugang zu Geschäften mit gesundem Lebensmittelangebot zu erleichtern, besteht darin, den <b>Öffentlichen Personennahverkehr und fußläufige Wegeverbindungen besser darauf auszurichten</b> [6]. Einkaufs-Shuttles, Liefer-Services und Förderung kleiner Einzelhandelsgeschäfte sowie kleiner Lebensmittelläden könnte den Zugang zu gesunden Lebensmitteln für spezifische Bevölkerungsgruppen ebenfalls fördern [6].</p><p>Auch die Verfügbarkeit und das Angebot in Settings wie Kindertagesstätten, Schulen und Arbeitsplätzen beeinflussen in der Wahl der Lebensmittel.</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(455,NULL,453,NULL,1,NULL,'Beschränkung der Fast-Food-Gastronomie',NULL,'<h5 class=\'fst-italic\'>Welchen Einfluss hat die Fast-Food-Gastronomie auf die menschliche Gesundheit und wie kann diese stadtplanerisch gehandhabt werden?</h5><p>Die Verbreitung von Fast-Food-Gastronomie hat negativen Einfluss auf Essgewohnheiten von Kindern, Jugendlichen [7] und Erwachsenen [8]. Knapp ein Viertel der 12- bis 17-Jährigen konsumiert täglich mindestens zehn Prozent der Gesamtenergie durch Fast Food [7]. Eine hohe Fast-Food-Verfügbarkeit in der Nähe des Wohnortes oder Schulen und Arbeitsplätzen führt zu ungünstigerem Essverhalten. [7,8]. Daher erscheint eine <b>Beschränkung von Fast-Food-Gastronomie in der unmittelbaren Umgebung zu Kindertagesstätten, Schulen, sozialen sowie kulturellen Einrichtungen oder Pflegeeinrichtungen und Krankenhäusern</b> sinnvoll.</p><p>Daneben sollte der Ausbau von Gemeinschaftsverpflegungseinrichtungen verstärkt werden. Dadurch können besonders Kinder und Jugendliche sowie Menschen mit niedrigem Einkommen mit qualitativ hochwertigen Lebensmitteln versorgt und ein Beitrag zu einer verminderten Lebensmittelverschwendung geleistet werden.</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(456,NULL,453,NULL,1,NULL,'Unterstützung lokaler Lebensmittelproduktion',NULL,'<h5 class=\'fst-italic\'>Warum ist die Unterstützung der lokalen Lebensmittelproduktion wichtig?</h5><p>Hierbei sind zwei Aspekte wesentlich: <b>die Nutzung und der Erhalt agrarwirtschaftlicher Flächen und die regionale kommerzielle Lebensmittelproduktion, sowie der Anbau von Obst und Gemüse im privaten Bereich.</b></p><p>Der Erhalt agrarwirtschaftlicher Flächen in Deutschland ist aus verschiedenen Gründen wichtig: Zum einen tragen landwirtschaftliche Flächen zur Ernährungssicherheit und zur regionalen Versorgung mit gesunden Lebensmitteln bei. Eine Reduzierung dieser Flächen würde die Nahrungsmittelproduktion einschränken und somit die Ernährungssicherheit gefährden [9].</p><p>Regionale Produkte, insbesondere solche aus biologischem Anbau, erfreuen sich bei den Verbraucher:innen eines größeren Vertrauens, was zu einem stetigen Anstieg der Nachfrage nach Bioprodukten in den vergangenen Jahren geführt hat [10].</p><p>Ein weiterer Vorteil von regionalen Lebensmitteln sind <b>kurze Transportwege</b>, die zur Reduktion von Treibhausgasemissionen beitragen und somit einen Beitrag zum Umweltschutz leisten.</p><p>Zum anderen spielen agrarwirtschaftliche Flächen auch eine wichtige Rolle im ökologischen Gleichgewicht. Sie dienen als Lebensraum für Tiere und Pflanzen und tragen zur <b>Biodiversität</b> bei. Eine Umwandlung dieser Flächen in Siedlungs- oder Gewerbegebiete würde zu einem Verlust dieser Funktionen führen.</p><p>Darüber hinaus haben landwirtschaftliche Flächen auch eine wirtschaftliche Bedeutung, da sie als Grundlage für die Produktion von Rohstoffen für die Lebensmittel- und Energieindustrie dienen. Der Erhalt dieser Flächen trägt somit auch zur <b>Sicherung von Arbeitsplätzen und zur Stärkung der regionalen Wirtschaft</b> bei. Die Novelle des Baugesetzbuches von 2013 hat den Schutz von landwirtschaftlichen Nutzflächen verbessert, indem sie die Möglichkeiten zur Umwandlung von Agrarflächen in Bauland eingeschränkt hat. Dadurch soll der Verlust von landwirtschaftlichen Flächen begrenzt und eine nachhaltige Raumplanung gefördert werden [9,11].</p><p>Der Anbau von Obst und Gemüse zu Hause, in Gemeinschaftsgärten oder in Kleingärtnervereinen hat positive Auswirkungen auf die Gesundheit und das Wohlbefinden. Dies geht über die bloße Selbstversorgung mit frischen, lokalen und gesunden Lebensmitteln hinaus. Es hat zudem eine <b>soziale und partizipative Dimension</b>, denn der Garten wird zu einem Ort für Gemeinschaft [12].</p><p>Ein interessanter stadtplanerischer Ansatz ist das Konzept der <b>„Essbaren Städte“</b>. Idee und Ziel des Konzepts ist die Entwicklung von multifunktionalen, öffentlich zugänglichen Grünflächen, die zum Anbau von Lebensmitteln genutzt werden. Hierdurch werden sowohl die Transportwege und -ketten von Lebensmittel reduziert sowie eine ortsnahe Produktion und Verfügbarkeit dieser ermöglicht als auch soziale Interaktion und Bildungsfunktionen verknüpft. Die so produzierten Lebensmittel sollen zudem kostenlos für die Bewohnenden des Quartieres zur Verfügung gestellt werden [13].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(457,NULL,451,453,1,NULL,'Welche direkten Effekte sind durch die Förderung der Schlüsselfaktoren zu erwarten?',NULL,NULL,'container',1,1,'2024-08-30 14:25:25',NULL),
(458,NULL,457,NULL,1,NULL,'Gesunde ausgewogene Ernährung',NULL,'<h5 class=\'fst-italic\'>Was ist eine gesunde ausgewogene Ernährung?</h5><p>Die Ernährung hat einen <b>wesentlichen Einfluss auf unsere Gesundheit und unser Wohlbefinden</b>. Das, was wir essen und trinken, ist wichtig für die tägliche Nährstoffversorgung und zur Aufrechterhaltung der Körperfunktionen sowie zur Stärkung des Immunsystems und spielt langfristig eine bedeutende Rolle bei der Vermeidung von Krankheiten.</p><p class=\'color-box\'>Eine <b>ausgewogene Ernährung</b> ist reich an Obst, Gemüse, Vollkornprodukten, Hülsenfrüchten, Nüssen, mageren Eiweißlieferanten und gesunden Fetten.</p><p class=\'color-box\'>Eine <b>eher ungünstige Ernährung</b> ist hingegen reich an Zucker, tierischen Fetten, Salz und raffinierten, verarbeiteten Getreideprodukten.</p><p>Die Deutsche Gesellschaft für Ernährung e.V. erarbeitet dazu wissenschaftlich gesicherte, lebensmittelbezogene Ernährungsempfehlungen, um eine bedarfsgerechte Ernährung zu fördern, die zur Prävention ernährungsmitbedingter Krankheiten beiträgt und einen nachhaltigeren Ernährungsstil fördert [14,15].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(459,NULL,451,457,1,NULL,'Welche gesundheitlichen Auswirkungen sind durch die direkten Effekte zu erwarten?',NULL,'','container',1,1,'2024-08-30 14:25:25',NULL),
(460,NULL,459,NULL,1,NULL,'Weniger Herz-Kreislauf-Erkrankungen',NULL,'<p>Eine ausgewogene, pflanzenbasierte Ernährung, die reich an Obst, Gemüse, Vollkornprodukten, Hülsenfrüchten, Nüssen, mageren Eiweißlieferanten und pflanzlichen Ölen ist, kann das <b>Risiko für Herz-Kreislauf-Erkrankungen reduzieren</b> [16,17]. Es wird verringert, da diese Ernährungsweise dazu beiträgt, den Blutdruck und negative Blutfettwerte zu senken.</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(461,NULL,459,NULL,1,NULL,'Weniger Diabeteserkrankungen',NULL,'<p>ine ausgewogene, pflanzenbasierte Ernährung, die reich an Obst, Gemüse, Vollkornprodukten, Hülsenfrüchten, Nüssen, mageren Eiweißlieferanten und pflanzlichen Ölen ist, kann das <b>Risiko für Diabetes reduzieren</b> [16,17]. Das Risiko für Diabetes Typ 2 kann dabei durch eine bessere Blutzuckerregulation reduziert werden.</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(462,NULL,459,NULL,1,NULL,'Weniger Krebserkrankungen',NULL,'<p>Eine ausgewogene, pflanzenbasierte Ernährung, die reich an Obst, Gemüse, Vollkornprodukten, Hülsenfrüchten, Nüssen, mageren Eiweißlieferanten und pflanzlichen Ölen ist, kann das <b>Krebsrisiko reduzieren</b> [16,17].</p><p>Sie kann dazu beitragen, das Risiko für bestimmte Krebsarten wie Darmkrebs zu verringern. Hierbei spielen Ballaststoffe eine wichtige Rolle, da sie die Verdauung unterstützen und das Wachstum von Krebszellen hemmen können [18].</p>','default',0,1,'2024-08-30 14:25:25',NULL),
(463,NULL,459,NULL,1,NULL,'Weniger Übergewicht und Adipositas',NULL,'<p>Eine gesunde Ernährung kann dabei helfen, <b>Übergewicht zu vermeiden oder zu reduzieren</b>, welches ebenfalls mit einem erhöhten Risiko für Erkrankungen wie Diabetes, Herz-Kreislauf-Erkrankungen und Krebs verbunden ist [18].</p>','default',0,1,'2024-08-30 14:25:25',NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `upvotes`
--

CREATE TABLE `upvotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `impersonate_id` int(10) UNSIGNED DEFAULT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `editor_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `order_id`, `username`, `email`, `email_verified_at`, `password`, `group_id`, `active`, `impersonate_id`, `author_id`, `editor_id`, `remember_token`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin', NULL, '$2y$10$8a/mBgQN17QuLrprSqtg1uXWPnTpoEnlsfm5zmLNpzZxSHrhj0ybG', 1, 1, NULL, 1, NULL, NULL, NULL, '2022-10-04 14:09:20', NULL);
--
-- Initial pw is same as username – please change immediately!
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_groups`
--

CREATE TABLE `user_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`permissions`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `user_groups`
--

INSERT INTO `user_groups` (`id`, `shortname`, `name`, `status`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', 'hidden', '{\"users\":{\"name\":\"User Management\",\"color\":\"#5878a0\",\"access\":true,\"privileges\":{\"create\":{\"status\":true},\"edit\":{\"status\":true},\"disable\":{\"status\":true},\"delete\":{\"status\":true}}},\"user-groups\":{\"name\":\"User Groups\",\"color\":\"#6060a0\",\"access\":true,\"privileges\":{\"create\":{\"status\":true},\"edit\":{\"status\":true},\"disable\":{\"status\":true},\"delete\":{\"status\":true}}},\"memberships\":{\"name\":\"Memberships\",\"color\":\"#906090\",\"access\":true,\"privileges\":{\"create\":{\"status\":true},\"edit\":{\"status\":true},\"delete\":{\"status\":true}}},\"projects\":{\"name\":\"Projects\",\"color\":\"#a06060\",\"access\":true,\"privileges\":{\"create\":{\"status\":true},\"edit\":{\"status\":true},\"delete\":{\"status\":true}}},\"questionnaires\":{\"name\":\"Questionnaires\",\"color\":\"#c0a060\",\"access\":true,\"privileges\":{\"create\":{\"status\":true},\"edit\":{\"status\":true},\"delete\":{\"status\":true}}},\"files\":{\"name\":\"File Management\",\"color\":\"#90a060\",\"access\":true,\"privileges\":{\"create\":{\"status\":true},\"edit\":{\"status\":true},\"delete\":{\"status\":true}}},\"scripts\":{\"name\":\"Scripts\",\"color\":\"#589870\",\"access\":true,\"privileges\":{\"create\":{\"status\":true},\"edit\":{\"status\":true},\"delete\":{\"status\":true}}},\"data\":{\"name\":\"Data\",\"color\":\"#609890\",\"access\":true,\"privileges\":{\"export\":{\"status\":true}}},\"configurations\":{\"name\":\"Configurations\",\"color\":\"#606070\",\"access\":true,\"privileges\":{\"create\":{\"status\":true},\"edit\":{\"status\":true},\"delete\":{\"status\":true}}}}', '2024-02-15 17:39:31', NULL),
(2, 'dev', 'Developer', 'active', '{\"users\":{\"name\":\"User Management\",\"color\":\"#5878a0\",\"access\":true,\"privileges\":{\"create\":{\"status\":true},\"edit\":{\"status\":true},\"disable\":{\"status\":true},\"delete\":{\"status\":true}}},\"user-groups\":{\"name\":\"User Groups\",\"color\":\"#6060a0\",\"access\":true,\"privileges\":{\"create\":{\"status\":true},\"edit\":{\"status\":true},\"disable\":{\"status\":true},\"delete\":{\"status\":true}}},\"memberships\":{\"name\":\"Memberships\",\"color\":\"#906090\",\"access\":true,\"privileges\":{\"create\":{\"status\":true},\"edit\":{\"status\":true},\"delete\":{\"status\":true}}},\"projects\":{\"name\":\"Projects\",\"color\":\"#a06060\",\"access\":true,\"privileges\":{\"create\":{\"status\":true},\"edit\":{\"status\":true},\"delete\":{\"status\":true}}},\"questionnaires\":{\"name\":\"Questionnaires\",\"color\":\"#c0a060\",\"access\":true,\"privileges\":{\"create\":{\"status\":true},\"edit\":{\"status\":true},\"delete\":{\"status\":true}}},\"files\":{\"name\":\"File Management\",\"color\":\"#90a060\",\"access\":true,\"privileges\":{\"create\":{\"status\":true},\"edit\":{\"status\":true},\"delete\":{\"status\":true}}},\"scripts\":{\"name\":\"Scripts\",\"color\":\"#589870\",\"access\":true,\"privileges\":{\"create\":{\"status\":true},\"edit\":{\"status\":true},\"delete\":{\"status\":true}}},\"data\":{\"name\":\"Data\",\"color\":\"#609890\",\"access\":true,\"privileges\":{\"export\":{\"status\":true}}},\"configurations\":{\"name\":\"Configurations\",\"color\":\"#606070\",\"access\":true,\"privileges\":{\"create\":{\"status\":true},\"edit\":{\"status\":true},\"delete\":{\"status\":true}}}}', '2024-02-15 17:39:31', NULL),
(3, 'operator', 'Operator', 'active', '{\"users\":{\"name\":\"User Management\",\"color\":\"#5878a0\",\"access\":true,\"privileges\":{\"create\":{\"status\":true},\"edit\":{\"status\":true},\"disable\":{\"status\":false},\"delete\":{\"status\":false}}},\"user-groups\":{\"name\":\"User Groups\",\"color\":\"#6060a0\",\"access\":false,\"privileges\":{\"create\":{\"status\":false},\"edit\":{\"status\":false},\"disable\":{\"status\":false},\"delete\":{\"status\":false}}},\"memberships\":{\"name\":\"Memberships\",\"color\":\"#906090\",\"access\":true,\"privileges\":{\"create\":{\"status\":true},\"edit\":{\"status\":true},\"delete\":{\"status\":false}}},\"projects\":{\"name\":\"Projects\",\"color\":\"#a06060\",\"access\":true,\"privileges\":{\"create\":{\"status\":true},\"edit\":{\"status\":true},\"delete\":{\"status\":false}}},\"questionnaires\":{\"name\":\"Questionnaires\",\"color\":\"#c0a060\",\"access\":false,\"privileges\":{\"create\":{\"status\":false},\"edit\":{\"status\":false},\"delete\":{\"status\":false}}},\"files\":{\"name\":\"File Management\",\"color\":\"#90a060\",\"access\":false,\"privileges\":{\"create\":{\"status\":false},\"edit\":{\"status\":false},\"delete\":{\"status\":false}}},\"scripts\":{\"name\":\"Scripts\",\"color\":\"#589870\",\"access\":false,\"privileges\":{\"create\":{\"status\":false},\"edit\":{\"status\":false},\"delete\":{\"status\":false}}},\"data\":{\"name\":\"Data\",\"color\":\"#609890\",\"access\":false,\"privileges\":{\"export\":{\"status\":false}}},\"configurations\":{\"name\":\"Configurations\",\"color\":\"#606070\",\"access\":false,\"privileges\":{\"create\":{\"status\":false},\"edit\":{\"status\":false},\"delete\":{\"status\":false}}}}', '2024-02-15 17:39:31', NULL),
(4, 'participant', 'Participant', 'active', '{\"users\":{\"name\":\"User Management\",\"color\":\"#5878a0\",\"access\":false,\"privileges\":{\"create\":{\"status\":false},\"edit\":{\"status\":false},\"disable\":{\"status\":false},\"delete\":{\"status\":false}}},\"user-groups\":{\"name\":\"User Groups\",\"color\":\"#6060a0\",\"access\":false,\"privileges\":{\"create\":{\"status\":false},\"edit\":{\"status\":false},\"disable\":{\"status\":false},\"delete\":{\"status\":false}}},\"memberships\":{\"name\":\"Memberships\",\"color\":\"#906090\",\"access\":false,\"privileges\":{\"create\":{\"status\":false},\"edit\":{\"status\":false},\"delete\":{\"status\":false}}},\"projects\":{\"name\":\"Projects\",\"color\":\"#a06060\",\"access\":false,\"privileges\":{\"create\":{\"status\":false},\"edit\":{\"status\":false},\"delete\":{\"status\":false}}},\"questionnaires\":{\"name\":\"Questionnaires\",\"color\":\"#c0a060\",\"access\":false,\"privileges\":{\"create\":{\"status\":false},\"edit\":{\"status\":false},\"delete\":{\"status\":false}}},\"files\":{\"name\":\"File Management\",\"color\":\"#90a060\",\"access\":false,\"privileges\":{\"create\":{\"status\":false},\"edit\":{\"status\":false},\"delete\":{\"status\":false}}},\"scripts\":{\"name\":\"Scripts\",\"color\":\"#589870\",\"access\":false,\"privileges\":{\"create\":{\"status\":false},\"edit\":{\"status\":false},\"delete\":{\"status\":false}}},\"data\":{\"name\":\"Data\",\"color\":\"#609890\",\"access\":false,\"privileges\":{\"export\":{\"status\":false}}},\"configurations\":{\"name\":\"Configurations\",\"color\":\"#606070\",\"access\":false,\"privileges\":{\"create\":{\"status\":false},\"edit\":{\"status\":false},\"delete\":{\"status\":false}}}}', '2024-02-15 17:39:31', NULL),
(5, 'guest', 'Guest', 'active', '{\"data\":{\"name\":\"Data\",\"color\":\"#667\",\"access\":false,\"privileges\":{\"export\":false}},\"files\":{\"name\":\"Files\",\"color\":\"#6b6\",\"access\":false,\"privileges\":[]},\"questionnaires\":{\"name\":\"Questionnaires\",\"color\":\"#b86\",\"access\":true,\"privileges\":{\"read\":true,\"edit\":false,\"create\":false,\"delete\":false}},\"users\":{\"name\":\"User Management\",\"color\":\"#66b\",\"access\":false,\"privileges\":{\"read\":false,\"edit\":false,\"create\":false,\"delete\":false}},\"user-groups\":{\"name\":\"User Groups\",\"color\":\"#68b\",\"access\":false,\"privileges\":{\"create\":false,\"edit\":false,\"disable\":false,\"delete\":false}}}', '2024-02-15 17:39:31', NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `color_codes`
--
ALTER TABLE `color_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `content_states`
--
ALTER TABLE `content_states`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `content_types`
--
ALTER TABLE `content_types`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `effects`
--
ALTER TABLE `effects`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `effect_types`
--
ALTER TABLE `effect_types`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `file_links`
--
ALTER TABLE `file_links`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `file_types`
--
ALTER TABLE `file_types`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `focused_items`
--
ALTER TABLE `focused_items`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `glossaries`
--
ALTER TABLE `glossaries`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `glossary_terms`
--
ALTER TABLE `glossary_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `health_impacts`
--
ALTER TABLE `health_impacts`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `health_impact_types`
--
ALTER TABLE `health_impact_types`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `memories`
--
ALTER TABLE `memories`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indizes für die Tabelle `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indizes für die Tabelle `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `project_settings`
--
ALTER TABLE `project_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `project_stages`
--
ALTER TABLE `project_stages`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `project_stage_types`
--
ALTER TABLE `project_stage_types`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `questionnaires`
--
ALTER TABLE `questionnaires`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `questionnaire_types`
--
ALTER TABLE `questionnaire_types`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `scripts`
--
ALTER TABLE `scripts`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `upvotes`
--
ALTER TABLE `upvotes`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indizes für die Tabelle `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `color_codes`
--
ALTER TABLE `color_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT für Tabelle `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=601;

--
-- AUTO_INCREMENT für Tabelle `content_states`
--
ALTER TABLE `content_states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `content_types`
--
ALTER TABLE `content_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `effects`
--
ALTER TABLE `effects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;

--
-- AUTO_INCREMENT für Tabelle `effect_types`
--
ALTER TABLE `effect_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT für Tabelle `entries`
--
ALTER TABLE `entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `file_links`
--
ALTER TABLE `file_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `file_types`
--
ALTER TABLE `file_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `focused_items`
--
ALTER TABLE `focused_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `glossaries`
--
ALTER TABLE `glossaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT für Tabelle `glossary_terms`
--
ALTER TABLE `glossary_terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT für Tabelle `health_impacts`
--
ALTER TABLE `health_impacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT für Tabelle `health_impact_types`
--
ALTER TABLE `health_impact_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `icons`
--
ALTER TABLE `icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=504;

--
-- AUTO_INCREMENT für Tabelle `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `memories`
--
ALTER TABLE `memories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7521;

--
-- AUTO_INCREMENT für Tabelle `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT für Tabelle `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `project_settings`
--
ALTER TABLE `project_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `project_stages`
--
ALTER TABLE `project_stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `project_stage_types`
--
ALTER TABLE `project_stage_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `questionnaires`
--
ALTER TABLE `questionnaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT für Tabelle `questionnaire_types`
--
ALTER TABLE `questionnaire_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `references`
--
ALTER TABLE `references`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=375;

--
-- AUTO_INCREMENT für Tabelle `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `scripts`
--
ALTER TABLE `scripts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=464;

--
-- AUTO_INCREMENT für Tabelle `upvotes`
--
ALTER TABLE `upvotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
