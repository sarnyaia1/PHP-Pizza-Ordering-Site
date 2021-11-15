SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/* Adatbázis: `onlinefoodorder */


--
-- Tábla szerkezet ehhez a táblához `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- A tábla adatainak kiíratása `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'Nagy Sándor', 'sanyi', 'E10ADC3949BA59ABBE56E057F20F883E'),
(2, 'Kiss Géza', 'gezuka', 'E10ADC3949BA59ABBE56E057F20F883E'),
(3, 'Kovács Réka', 'rekuci', 'E10ADC3949BA59ABBE56E057F20F883E'),
(4, 'Administrator', 'admin', 'E10ADC3949BA59ABBE56E057F20F883E');


--
-- Tábla szerkezet ehhez a táblához `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `glutenfree` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `glutenfree`) VALUES
(11, 'Capricciosa Pizza', 'paradicsomos alap, sonka, olajbogyó, gomba, sajt', '1890', 'capricciosa.jpeg', 'Igen'),
(12, 'Lazacos Pizza', 'paradicsomos alap, lazac, sajt, kakukkfű', '2190', 'salmon.jpeg', 'Igen'),
(13, 'Magyaros Pizza', 'paradicsomos alap, kolbász, sonka, sajt, hagyma', '1990', 'hungarian.jpeg','Igen'),
(14, 'Húsimádó Pizza', 'paradicsomos alap, kolbász, szalonna, sonka, sajt', '2190', 'husimado.jpeg', 'Igen'),
(15, 'Prosciutto Pizza', 'paradicsomos alap, prosciutto, sajt, rukkola', '2090', 'prosciutto.jpeg', 'Igen'),
(16, 'Négysajtos Pizza', 'paradicsomos alap, parmezán, trappista, edámi, feta', '1890', '4cheese.jpeg', 'Igen'),
(17, 'Toscana', 'paradicsomos alap, sonka, mozzarella, bazsalikom', '1890', 'toscana.jpeg', 'Igen'),
(18, 'Hawaii Pizza', 'paradicsomos alap, sonka, ananász, sajt', '1890', 'hawaii.jpeg', 'Igen'),
(19, 'Margaréta Pizza', 'paradicsomos alap, sonka, sajt', '1790', 'margareta.jpeg', 'Igen'),
(20, 'Szalámis Pizza', 'paradicsomos alap, szalámi, sajt', '1790', 'salami.jpeg', 'Igen');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(101, 'Hawaii Pizza', '1890', 4, '7560', '2020-11-30 03:52:43', 'Szállítva', 'Kiss Ferenc', '301234567', 'kiss.ferenc@gmail.com', '4800 Romai körút 18'),
(102, 'Szalámis Pizza', '1990', 2, '3980', '2020-11-30 04:07:17', 'Szállítva', 'Nagy Béla', '207654321', 'nagy.bela@gmail.com', '6800 Kolozsvári utca 25'),
(103, 'Húsimádó Pizza', '2190', 1, '2190', '2021-05-04 01:35:34', 'Szállítva', 'Kovács Izabella', '701234567', 'kovacs.iza@gmail.com', '6247 Szent István utca 12'),
(104, 'Prosciutto Pizza', '2090', 1, '2090', '2021-07-20 06:10:37', 'Szállítva', 'Jónás István', '501234567', 'jonas.pisti@gmail.com', '7200 Nagy Sándor utca 78'),
(105, 'Margaréta Pizza', '1790', 2, '3580', '2021-07-20 06:40:21', 'Folyamatban', 'Szabó Erika', '201234566', 'szabi.erika@gmail.com', '8600 Szlovák utca 1'),
(106, 'Hawaii Pizza', '1890', 1, '1890', '2021-07-20 06:40:57', 'Megrendelve', 'Varga Rózsa', '201111111', 'varga.rozsa@gmail.com', '7411 Rózsa utca 65'),
(107, 'Magyaros Pizza', '1990', 4, '7960', '2021-07-20 07:06:06', 'Törölve', 'Kovács Károly', '308855224', 'kovacs.karoly@gmail.com', '6555 Kovács utca 18'),
(108, 'Magyaros Pizza', '1990', 4, '7960', '2021-07-20 07:11:06', 'Szállítva', 'Nagy Erzsébet', '302471589', 'nagy.erzsi@gmail.com', '3500 Széles utca 78');




--
-- Tábla szerkezet ehhez a táblához `tbl_response`
--

CREATE TABLE `tbl_response` (
  `id` int(10) UNSIGNED NOT NULL,
  `response_date` datetime NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_response` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);


--
-- A tábla indexei `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `tbl_response`
--
ALTER TABLE `tbl_response`
  ADD PRIMARY KEY (`id`);





--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;


--
-- AUTO_INCREMENT a táblához `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT a táblához `tbl_response`
--
ALTER TABLE `tbl_response`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
