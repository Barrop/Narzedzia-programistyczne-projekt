-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Wrz 2018, 15:53
-- Wersja serwera: 10.1.35-MariaDB
-- Wersja PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `egzamin`
--

CREATE TABLE `egzamin` (
  `pytanie` text COLLATE utf8_polish_ci NOT NULL,
  `A` text COLLATE utf8_polish_ci NOT NULL,
  `B` text COLLATE utf8_polish_ci NOT NULL,
  `C` text COLLATE utf8_polish_ci NOT NULL,
  `D` text COLLATE utf8_polish_ci NOT NULL,
  `Poprawna` varchar(1) COLLATE utf8_polish_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `egzamin`
--

INSERT INTO `egzamin` (`pytanie`, `A`, `B`, `C`, `D`, `Poprawna`, `id`) VALUES
('Jaka a aaa?', 'a', 'b', 'c', 'd', '', 1),
('Drugie pytanie', 'AAA', 'BBBB', 'CCCC', 'DDDD', '', 2),
('Trzecie pytanie', 'a', 'b', 'c', 'd', '', 3),
('Czwarte pytanie', 'a', 'b', 'c', 'd', 'd', 4),
('Piąte pytanie', 'a', 'b', 'c', 'd', 'd', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
