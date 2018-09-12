-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Wrz 2018, 08:23
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
('Jakie sa nazwy typowych poleceń języka zapytań SQL, związane z wykonywaniem operacji na danych SQL DML (np.: umieszczanie danych w bazie, kasowanie dokonywanie zmian w danych)?', 'SELECT, SELECT INTO', 'ALTER, CREATE, DROP', 'DENY, GRANT, REVOKE', 'DELETE, INSERT, UPDATE', 'D', 1),
('Aby odebrać prawa dostępu do serwera MySQL, należy posłużyć się instrukcją', 'USAGE', 'GRANT', 'DELETE', 'REVOKE', 'A', 2),
('W kodzie PHP znak \"//\" oznacza', 'początek skryptu', 'operator alernatywy', 'operator dzielenia całkowitego', 'początek komentarza jednoliniowego', 'D', 3),
('W języku SQL klauzula DISTINCT instrukcji SELECT sprawi, że zwrócone dane', 'zostaną posortowane', 'nie będą zawierały powtórzeń', 'będą spełniały określony warunek', 'będą pogrupowane według określonego pola', 'C', 4),
('W języku PHP pobrano z bazy danych wyniki działania kwerendy za pomocą polecenia mysql_query(). Aby otrzymać ze zwróconej kwerendy wierszy danych, należy zastosować polecenie:', 'mysql_field_len()', 'mysql_list_fields()', 'mysql_fetch_row()', 'mysql_fetch_lengths()', 'C', 5),
('Która ze zdefiniowanych funkcji w języku PHP jako wynik zwraca połowę kwadratu wartości przekazanej?', 'function licz($a) { echo $a*$a/2; }', 'function licz($a) { return $a/2; }', 'function licz($a) { return $a*$a/2; }', 'function licz($a) { echo $a/2; }', 'C', 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odp_uzytkownicy`
--

CREATE TABLE `odp_uzytkownicy` (
  `uzytkownik` text COLLATE utf8_polish_ci NOT NULL,
  `Numer_pytania` int(11) NOT NULL,
  `Odp` varchar(1) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `odp_uzytkownicy`
--

INSERT INTO `odp_uzytkownicy` (`uzytkownik`, `Numer_pytania`, `Odp`) VALUES
('loHHHgin', 0, ''),
('loHHHgin', 0, ''),
('loHHHgin', 0, ''),
('loHHHgin', 0, ''),
('loHHHgin', 0, ''),
('loHHHgin', 0, ''),
('dziala', 1, 'a'),
('dziala', 1, 'a'),
('dziala', 1, 'a'),
('dziala', 1, 'a'),
('dziala', 1, 'a'),
('dziala', 1, 'a'),
('dziala', 1, 'a'),
('dziala', 1, 'a'),
('dziala', 1, 'a'),
('dziala', 1, 'a'),
('dziala', 1, ''),
('dziala', 1, ''),
('dziala', 1, ''),
('dziala', 1, ''),
('dziala', 1, ''),
('dziala', 1, ''),
('dziala', 1, ''),
('dziala', 1, ''),
('dziala', 1, ''),
('dziala', 1, ''),
('dziala', 1, ''),
('dziala', 1, ''),
('dziala', 1, ''),
('dziala', 1, ''),
('dziala', 1, 'w'),
('dziala', 1, 'w'),
('dziala', 1, 'w'),
('dziala', 1, 'w'),
('dziala', 1, ''),
('dzidsala', 1, 'w'),
('dzidsala', 1, 'w'),
('dzidsala', 1, 'q'),
('dzidsala', 1, 'q'),
('dzidsala', 1, 'q'),
('dzidsala', 1, 'q'),
('dzidsala', 1, 'q'),
('dzidsala', 1, 'q'),
('dzidsala', 1, 'q'),
('dzidsala', 1, 'q'),
('dzidsala', 1, 'q'),
('dzidsala', 1, 'q'),
('dzidsala', 1, 'q'),
('dzidsala', 1, 'q'),
('dzidsala', 1, 'q'),
('dzidsala', 1, 'q'),
('dzidsala', 1, 'q');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `pass`, `email`) VALUES
(3, 'Marian', '$2y$10$1vhsKCvS43sZrDrryQsmzOY5rGf8P7vSb6fFJz8qmOkL6m5J9Z86O', 'marcin.musial2@o2.pl');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `egzamin`
--
ALTER TABLE `egzamin`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
