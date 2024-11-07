-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 10:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `bestelling`
--

CREATE TABLE `bestelling` (
  `bestelling_id` int(11) NOT NULL,
  `klant_id` int(11) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `totaal_prijs` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persoon`
--

CREATE TABLE `persoon` (
  `klant_id` int(11) NOT NULL,
  `voornaam` varchar(20) DEFAULT NULL,
  `achternaam` varchar(20) DEFAULT NULL,
  `adres` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `hash` varchar(100) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT 0,
  `verwijderd` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `persoon`
--

INSERT INTO `persoon` (`klant_id`, `voornaam`, `achternaam`, `adres`, `email`, `hash`, `admin`, `verwijderd`) VALUES
(15, 'Robin', 'herickx', 'mechelse steenweg417C', 'ripdood69@gmail.com', '$2y$10$lHb3BQbxGK/Ztp2.lZnsdu7GYoD1RiyQJoqPzEdvlIhVkqibZXrvy', 1, 0),
(21, 'visstick', 'honger', 'mora', 'visstick@gmail.com', '$2y$10$YuhlDWsMxRdz0Ug2pOmk2OSRlQ012IiQU6HQxsAylB2XYMabeZzX2', 0, 0),
(22, 'lipton', 'GreentTea', 'plasticfles', 'lipton@gmail.com', '$2y$10$hjFTalGcq5OnGpkb0hvirOqzZfLk9nxA6.hnvSEyNuzxI7eX6c59a', 0, 1),
(23, 'macbook2', 'idk', 'whoCares420', 'test@gmail.com', '$2y$10$O5/MaOqxKeNZZwsa3FskFu5GARS9TK192LdnF0yyuXUL64GoCjUVi', 0, 0),
(24, 'bob', 'bib', 'bab', 'ripdooferd@gmail.com', '$2y$10$9Qv0V/pvqVlIEFap8h0omu7t6BCSe9PjYT9ClFMD6VOjioRtQuYNS', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `naam` varchar(100) DEFAULT NULL,
  `beschrijving` text DEFAULT NULL,
  `gewicht` decimal(5,2) DEFAULT NULL,
  `vissoort` varchar(50) DEFAULT NULL,
  `prijs` decimal(10,2) DEFAULT NULL,
  `voorraad` int(11) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `naam`, `beschrijving`, `gewicht`, `vissoort`, `prijs`, `voorraad`, `foto`) VALUES
(1, 'Koi Karper', 'Gekleurde Koi karper voor vijvers', 250.00, 'Koi', 25.99, 10, 'Finding-nemo.jpeg'),
(2, 'Goudvis', 'Klassieke goudvis, perfect voor aquaria', 100.00, 'Goudvis', 3.99, 50, 'Finding-nemo.jpeg'),
(3, 'Betta Vis', 'Schitterende Betta met lange vinnen', 30.00, 'Betta', 12.50, 20, 'Finding-nemo.jpeg'),
(4, 'Guppy', 'Kleine kleurrijke guppy', 5.00, 'Guppy', 2.99, 100, 'Finding-nemo.jpeg'),
(5, 'Neon Tetra', 'Kleine, felgekleurde tropische vis', 2.00, 'Tetra', 1.49, 200, 'Finding-nemo.jpeg'),
(6, 'Cichlide', 'Afrikaanse cichlide met unieke kleuren', 50.00, 'Cichlide', 7.99, 30, 'Finding-nemo.jpeg'),
(7, 'Discus Vis', 'Grote kleurrijke discusvis voor aquaria', 100.00, 'Discus', 18.99, 15, 'Finding-nemo.jpeg'),
(8, 'Clownvis', 'Bekende clownvis, geschikt voor zeewater', 20.00, 'Clownvis', 14.50, 25, 'Finding-nemo.jpeg'),
(9, 'Black Molly', 'Zwarte molly, eenvoudig te houden', 10.00, 'Molly', 3.99, 75, 'Finding-nemo.jpeg'),
(10, 'Zwaarddrager', 'Zwaarddrager met lange staartvin', 15.00, 'Zwaarddrager', 4.99, 60, 'Finding-nemo.jpeg'),
(11, 'Regenboogvis', 'Kleurrijke vis met levendige strepen', 15.00, 'Regenboogvis', 6.50, 40, 'Finding-nemo.jpeg'),
(12, 'Zebravis', 'Gestreepte vis, makkelijk te verzorgen', 5.00, 'Zebravis', 1.99, 100, 'Finding-nemo.jpeg'),
(13, 'Engelvis', 'Majestueuze engelvis voor zoetwater', 80.00, 'Engelvis', 10.99, 20, 'Finding-nemo.jpeg'),
(14, 'Plecostomus', 'Algeter, ideaal voor aquariumonderhoud', 150.00, 'Plecostomus', 12.99, 15, 'Finding-nemo.jpeg'),
(15, 'Rode Papegaaivis', 'Heldere, opvallende vis', 120.00, 'Papegaaivis', 9.50, 10, 'Finding-nemo.jpeg'),
(16, 'Oscars', 'Grote, actieve vis voor grote aquaria', 300.00, 'Oscar', 19.99, 8, 'Finding-nemo.jpeg'),
(17, 'Rode Neon Tetra', 'Felle rode neonkleurige vis', 2.00, 'Neon Tetra', 1.59, 200, 'Finding-nemo.jpeg'),
(18, 'Sumatra Barb', 'Actieve vis, geschikt voor aquaria', 10.00, 'Barb', 3.50, 80, 'Finding-nemo.jpeg'),
(19, 'Vuurstaart Labeo', 'Vis met opvallende rode staart', 50.00, 'Labeo', 7.49, 25, 'Finding-nemo.jpeg'),
(20, 'Silver Dollar', 'Ronde zilveren vis', 60.00, 'Silver Dollar', 6.99, 30, 'Finding-nemo.jpeg'),
(21, 'Rode Draakvis', 'Zeldzame vis met rode kleuren', 200.00, 'Draakvis', 45.00, 5, 'Finding-nemo.jpeg'),
(22, 'Arowana', 'Majestueuze vis, geliefd in Azië', 300.00, 'Arowana', 50.00, 3, 'Finding-nemo.jpeg'),
(23, 'Bloedparkeer Cichlide', 'Helderrode vis', 100.00, 'Cichlide', 8.99, 12, 'Finding-nemo.jpeg'),
(24, 'Leporinus', 'Gestreepte vis, erg actief', 80.00, 'Leporinus', 5.99, 15, 'Finding-nemo.jpeg'),
(25, 'Gele Tang', 'Opvallende gele zoutwatervis', 50.00, 'Tang', 24.99, 10, 'Finding-nemo.jpeg'),
(26, 'Chinese Algeneter', 'Ideale vis voor aquariumonderhoud', 120.00, 'Algeneter', 3.99, 35, 'Finding-nemo.jpeg'),
(27, 'Pangasius', 'Zoetwatervis, vaak in groepen gehouden', 250.00, 'Pangasius', 6.50, 25, 'Finding-nemo.jpeg'),
(28, 'Rode Bijlvis', 'Unieke vis met bijlvormige kop', 10.00, 'Bijlvis', 4.49, 60, 'Finding-nemo.jpeg'),
(29, 'Groene Tetra', 'Groen getinte vis, opvallend in scholen', 3.00, 'Tetra', 2.49, 120, 'Finding-nemo.jpeg'),
(30, 'Scalare', 'Elegante zoetwatervis met lange vinnen', 70.00, 'Scalare', 7.50, 18, 'Finding-nemo.jpeg'),
(31, 'Geeloog Tang', 'Mooie gele zoutwatervis', 75.00, 'Tang', 26.99, 8, 'Finding-nemo.jpeg'),
(32, 'Zoetwater Garnaal', 'Kleine garnaal, goed voor waterkwaliteit', 2.00, 'Garnaal', 1.99, 150, 'Finding-nemo.jpeg'),
(33, 'Snoekbaars', 'Zoetwatervis met roofinstincten', 300.00, 'Snoekbaars', 22.50, 7, 'Finding-nemo.jpeg'),
(34, 'Modderkruiper', 'Bodemvis voor zoetwateraquaria', 70.00, 'Modderkruiper', 4.99, 20, 'Finding-nemo.jpeg'),
(35, 'Rode Fantoom Tetra', 'Dieprode vis, actief in groepen', 4.00, 'Tetra', 1.79, 110, 'Finding-nemo.jpeg'),
(36, 'Zeilvin Molly', 'Unieke zeilvinvariant van de Molly', 15.00, 'Molly', 3.99, 40, 'Finding-nemo.jpeg'),
(37, 'Sterrenkijker', 'Speciale zoetwatervis met interessante ogen', 70.00, 'Sterrenkijker', 9.50, 15, 'Finding-nemo.jpeg'),
(38, 'Maanvis', 'Elegante maanvormige vis', 80.00, 'Maanvis', 11.99, 12, 'Finding-nemo.jpeg'),
(39, 'Piranha', 'Exotische vis met scherpe tanden', 100.00, 'Piranha', 29.99, 5, 'Finding-nemo.jpeg'),
(40, 'Gouden Cichlide', 'Heldere gele zoetwatervis', 90.00, 'Cichlide', 6.99, 20, 'Finding-nemo.jpeg'),
(41, 'Vrolijke Blenni', 'Leuke, actieve zoutwatervis', 15.00, 'Blenni', 5.49, 30, 'Finding-nemo.jpeg'),
(42, 'Clown Botia', 'Kleurrijke vis voor bodem schoonmaak', 40.00, 'Botia', 6.99, 25, 'Finding-nemo.jpeg'),
(43, 'Vlinder Pleco', 'Bijzondere pleco met vlindervorm', 50.00, 'Pleco', 8.99, 20, 'Finding-nemo.jpeg'),
(44, 'Lepelvis', 'Grappige vis met een platte kop', 30.00, 'Lepelvis', 7.99, 10, 'Finding-nemo.jpeg'),
(45, 'Blauwe Tetra', 'Felblauwe tetra', 3.00, 'Tetra', 1.59, 100, 'Finding-nemo.jpeg'),
(46, 'Dwerggourami', 'Kleine, kleurrijke gourami', 20.00, 'Gourami', 5.99, 30, 'Finding-nemo.jpeg'),
(47, 'Zwaardvis', 'Vis met zwaardvormige staartvin', 25.00, 'Zwaardvis', 4.49, 40, 'Finding-nemo.jpeg'),
(48, 'Japanse Modderkruiper', 'Vijvervis die goed tegen kou kan', 80.00, 'Modderkruiper', 4.99, 15, 'Finding-nemo.jpeg'),
(49, 'Leporinus Fasciatus', 'Gestreepte Leporinus', 70.00, 'Leporinus', 5.99, 12, 'Finding-nemo.jpeg'),
(50, 'Roodkop Tetra', 'Kleine vis met een rode kop', 3.00, 'Tetra', 1.39, 150, 'Finding-nemo.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `producten_besteld`
--

CREATE TABLE `producten_besteld` (
  `bestelling_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `aantal_besteld` int(11) DEFAULT NULL,
  `prijs` decimal(10,2) DEFAULT NULL,
  `betaald` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bestelling`
--
ALTER TABLE `bestelling`
  ADD PRIMARY KEY (`bestelling_id`),
  ADD KEY `klant_id` (`klant_id`);

--
-- Indexes for table `persoon`
--
ALTER TABLE `persoon`
  ADD PRIMARY KEY (`klant_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `producten_besteld`
--
ALTER TABLE `producten_besteld`
  ADD PRIMARY KEY (`bestelling_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bestelling`
--
ALTER TABLE `bestelling`
  MODIFY `bestelling_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persoon`
--
ALTER TABLE `persoon`
  MODIFY `klant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bestelling`
--
ALTER TABLE `bestelling`
  ADD CONSTRAINT `bestelling_ibfk_1` FOREIGN KEY (`klant_id`) REFERENCES `persoon` (`klant_id`);

--
-- Constraints for table `producten_besteld`
--
ALTER TABLE `producten_besteld`
  ADD CONSTRAINT `producten_besteld_ibfk_1` FOREIGN KEY (`bestelling_id`) REFERENCES `bestelling` (`bestelling_id`),
  ADD CONSTRAINT `producten_besteld_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
