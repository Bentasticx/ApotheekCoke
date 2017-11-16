-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2017 at 10:43 AM
-- Server version: 5.7.14-log
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectcoke`
--

-- --------------------------------------------------------

--
-- Table structure for table `apotheker`
--

CREATE TABLE `apotheker` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adres` varchar(100) NOT NULL,
  `tel` varchar(45) NOT NULL,
  `postcode` varchar(45) NOT NULL,
  `woonplaats` varchar(100) NOT NULL,
  `username` varchar(45) NOT NULL,
  `wachtwoord` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apotheker`
--

INSERT INTO `apotheker` (`id`, `naam`, `email`, `adres`, `tel`, `postcode`, `woonplaats`, `username`, `wachtwoord`) VALUES
(1, 'Benu', 'benu@apotheker.nl', 'Bijlmerplein 544', '234', '1102DS', 'Amsterdam', 'Benu', '$2y$10$29bvvyT5jf9CwRc/kZgobOqVgo2DwOf/9OMo24MrvGm5MVrv2nFtm'),
(2, 'Alphega', 'alphega@apotheker.nl', 'Annie Romeinplein 34', '895', '1103JL', 'Amsterdam', 'Alphega', '$2y$10$OrTIWNEx04ec9/g2iKpVxuXMs9P8Mjr5GzSnIqE1EZTTwhE.RKFu6'),
(3, 'Ganzenhoef', 'ganzenhoef@apotheker.nl', 'Bijlmerdreef 1169', '374', '1103TT', 'Amsterdam', 'Ganzenhoef', '$2y$10$OrTIWNEx04ec9/g2iKpVxuXMs9P8Mjr5GzSnIqE1EZTTwhE.RKFu6');

-- --------------------------------------------------------

--
-- Table structure for table `bestellingregels`
--

CREATE TABLE `bestellingregels` (
  `orderid` int(11) NOT NULL,
  `medicijnenid` int(11) NOT NULL,
  `aantal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `patientid` int(11) NOT NULL,
  `patientEmail` varchar(100) NOT NULL,
  `ontvanger` varchar(100) NOT NULL,
  `bericht` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `huisarts`
--

CREATE TABLE `huisarts` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `post` varchar(100) NOT NULL,
  `tel` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `wachtwoord` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `huisarts`
--

INSERT INTO `huisarts` (`id`, `naam`, `email`, `post`, `tel`, `username`, `wachtwoord`) VALUES
(1, 'De Groot', 'degroot@huisarts.nl', 'Kroonhorst', '568', 'groot', '$2y$10$29bvvyT5jf9CwRc/kZgobOqVgo2DwOf/9OMo24MrvGm5MVrv2nFtm'),
(2, 'Born', 'born@huisarts.nl', 'Kroonhorst', '569', 'born', '$2y$10$29bvvyT5jf9CwRc/kZgobOqVgo2DwOf/9OMo24MrvGm5MVrv2nFtm'),
(3, 'Vreendie', 'vreendie@huisarts.nl', 'Huisartsenpost', '612', 'vreendie', '$2y$10$29bvvyT5jf9CwRc/kZgobOqVgo2DwOf/9OMo24MrvGm5MVrv2nFtm');

-- --------------------------------------------------------

--
-- Table structure for table `koerier`
--

CREATE TABLE `koerier` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `apotheker` varchar(100) NOT NULL,
  `tel` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `wachtwoord` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `koerier`
--

INSERT INTO `koerier` (`id`, `naam`, `apotheker`, `tel`, `username`, `wachtwoord`) VALUES
(1, 'Ali', '1', '323', 'Ali', '$2y$10$29bvvyT5jf9CwRc/kZgobOqVgo2DwOf/9OMo24MrvGm5MVrv2nFtm'),
(2, 'Bart', '2', '812', 'Bart', '$2y$10$29bvvyT5jf9CwRc/kZgobOqVgo2DwOf/9OMo24MrvGm5MVrv2nFtm'),
(99, 'Onbekend Koerier', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `medicijnen`
--

CREATE TABLE `medicijnen` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `omschrijving` varchar(100) DEFAULT NULL,
  `aantal` int(255) DEFAULT NULL,
  `levertijd` int(255) DEFAULT NULL,
  `default` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicijnen`
--

INSERT INTO `medicijnen` (`id`, `naam`, `omschrijving`, `aantal`, `levertijd`, `default`) VALUES
(1, 'Diclofenac (Cataflam, Voltaren)', 'Werkt als ontstekingsremmende pijnstiller', 100, 1, 1),
(2, 'Amoxicilline (Clamoxyl)', 'Antibioticum', 100, 1, 1),
(3, 'Omeprazol (Losec-mups)', 'Remt productie overvloedig maagzuur', 100, 1, 1),
(4, 'Doxycycline (Vibramycin)', 'Antibioticum', 100, 1, 1),
(5, 'Ibuprofen (Brufen)', 'Pijnstiller', 100, 1, 1),
(6, 'Metoprolol (Selokeen-zoc)', 'Bètablokker welke de bloeddruk verlaagt', 100, 1, 1),
(7, 'Augmentin', 'Amoxicilline met enzymremmer clavulaanzuur, antiparkinsonmiddel', 100, 1, 1),
(8, 'Salbutamol (Ventolin)', 'Luchtwegverwijders', 98, 1, 1),
(9, 'Simvastatin (Zocor)', 'Cholesterolsyntheseremmer (verlaagt het cholesterol- en vetgehalte in het bloed)', 98, 1, 1),
(10, 'Oxazepam (Seresta)', 'Kalmeringsmiddel', 87, 1, 1),
(11, 'Codeine', 'Actief tegen overmatig hoesten', 73, 1, 1),
(12, 'Daktacort', 'Hydrocortison met overige middelen', 92, 1, 1),
(13, 'Acetylsalicylzuur (Aspirine-protect) ', 'Pijnstiller', 97, 1, 1),
(14, 'Overige emollientia en protectiva', '', 95, 2, 1),
(15, 'Triamcinolon', '', 95, 1, 1),
(16, ' Nitrofurantoine (Furadantine)', '', 98, 1, 1),
(17, 'Fusidinezuur (Fucidin)', '', 100, 1, 1),
(18, 'Pantoprazol (Pantozol)', '', 100, 2, 1),
(19, 'Temazepam (Normison', '', 100, 1, 1),
(20, 'Carbasalaatcalcium (Ascal-cardio)', '', 100, 1, 1),
(21, 'Macrogol combinatiepreparaten (Movicolon)', '', 100, 2, 1),
(22, 'Naproxen (Naprovite)', '', 100, 1, 1),
(23, 'Hydrochloorthiazide', '', 100, 1, 1),
(24, 'Metformine (Glucophage)', '', 100, 2, 1),
(25, 'Atorvastatine (Lipitor)', '', 100, 1, 1),
(26, 'Desloratadine (Aerius)', '', 100, 3, 1),
(27, 'Duratears', 'Kunsttranen en andere indifferente preparaten', 100, 1, 1),
(28, 'Fluticason (propionaat) (Flixonase)', '', 100, 1, 1),
(29, 'Levocetirizine (Xyzal)', '', 100, 1, 1),
(30, 'Hydrocortison', '', 100, 1, 1),
(31, 'Diazepam (Stesolid)', '', 100, 1, 1),
(32, 'Fusidinezuur (Fucithalmic)', '', 100, 1, 1),
(33, 'Seretide', 'Salmeterol met andere astma/copd-middelen', 100, 1, 1),
(34, 'Prednisolon (Diadreson-f)', '', 100, 1, 1),
(35, 'Azitromycine (Zithromax)', '', 100, 1, 1),
(36, 'Furosemide (Lasix)', '', 100, 1, 1),
(37, 'Claritromycine (Klacid)', '', 100, 1, 1),
(38, 'Mometason (Nasonex)', '', 100, 1, 1),
(39, 'Levothyroxine (Thyrax)', '', 100, 1, 1),
(40, 'Paracetemol', 'combinatiepreparaten excl psycholeptica', 100, 1, 1),
(41, 'Microgynon ', 'Oestrogeen met levonorgestrel', 100, 1, 1),
(42, 'Amlodipine (Norvasc )', '', 100, 1, 1),
(43, 'Tramadol (Tramagetic )', '', 100, 1, 1),
(44, 'Fluticason (Flixotide )', '', 100, 1, 1),
(45, 'Enalapril/enalaprilaat (Renitec )', '', 100, 1, 1),
(46, 'Ketoconazol (Nizoral )', '', 100, 2, 1),
(47, 'Esomeprazol (Nexium )', '', 100, 1, 1),
(48, 'Arthrotec ', 'Diclofenac combinatiepreparaten ', 100, 1, 1),
(49, 'Acenocoumarol', '', 100, 1, 1),
(50, 'Chlooramfenicol (Minims chlooramfenicol)', '', 100, 2, 1),
(51, 'Betamethason (Diprosone )', '', 100, 1, 1),
(52, 'Miconazol (Gyno-daktarin )', '', 100, 1, 1),
(53, 'Paroxetine (Seroxat )', '', 100, 1, 1),
(54, 'Feneticilline (Broxil )', '', 100, 1, 1),
(55, 'Sofradex', 'Dexamethason met antimicrobiele middelen', 100, 1, 1),
(56, 'Symbicort', 'Formoterol met andere astma/copd-middelen', 100, 1, 1),
(57, 'Ciprofloxacine (Ciproxin)', '', 100, 1, 1),
(58, 'Flucloxacilline (Floxapen)', '', 100, 1, 1),
(59, 'Codeine combinatiepreparaten', '', 100, 1, 1),
(60, 'Lactulose (Legendal)', '', 100, 1, 1),
(61, 'Ranitidine (Zantac)', '', 100, 1, 1),
(62, 'Cyproteron met oestrogeen (Diane-35 )', '', 100, 1, 1),
(63, 'Levocabastine (Livocab )', '', 100, 1, 1),
(64, 'Losartan (Cozaar )', '', 100, 1, 1),
(65, 'Rosuvastatine (Crestor )', '', 100, 1, 1),
(66, 'Trimethoprim (Monotrim )', '', 100, 2, 1),
(67, 'Atenolol (Tenormin )', '', 100, 1, 1),
(68, 'Ferrofumaraat', '', 100, 1, 1),
(69, 'Bisoprolol (Emcor )', '', 100, 1, 1),
(70, 'Tiotropium (Spiriva )', '', 100, 1, 1),
(71, 'Clobetasol (Dermovate )', '', 100, 1, 1),
(72, 'Calcium met andere middelen', '', 100, 1, 1),
(73, 'Pravastatine (Selektine )', '', 100, 3, 1),
(74, 'Perindopril (Coversyl )', '', 100, 1, 1),
(75, 'Hydrocortison met antimicrobiele middelen', '', 100, 1, 1),
(76, 'Triamcinolon (Kenacort-a)', '', 100, 1, 1),
(77, 'Dexamethason (Tobradex)', '', 100, 1, 1),
(78, 'Nifedipine (Adalat-oros)', '', 100, 1, 1),
(79, 'Isosorbidemononitraat (Mono-cedocard)', '', 100, 1, 1),
(80, 'Lisinopril (Zestril)', '', 100, 1, 1),
(81, 'Metoclopramide (Primperan)', '', 100, 1, 1),
(82, 'Psylliumzaad (Metamucil)', '', 100, 1, 1),
(83, 'Amitriptyline (Tryptizol)', '', 100, 1, 1),
(84, 'Loperamide (Imodium en Diacure)', 'Werkt tegen diarree', 100, 1, 1),
(85, 'Budesonide (Rhinocort', '', 100, 1, 1),
(86, 'Tamsulosine (Omnic-ocas)', '', 100, 1, 1),
(87, 'Hydrocortisonbutyraat (Locoid)', '', 100, 1, 1),
(88, 'Metronidazol (Flagyl)', '', 100, 1, 1),
(89, 'Sulfamethoxazol met trimethoprim (Bactrimel)', '', 100, 1, 1),
(90, 'Alendroninezuur (Fosamax)', '', 100, 1, 1),
(91, 'Meloxicam (Movicox)', '', 100, 1, 1),
(92, 'Mebeverine (Duspatal)', '', 100, 1, 1),
(93, 'Citalopram (Cipramil)', '', 100, 1, 1),
(94, 'Glimepiride (Amaryl)', '', 100, 1, 1),
(95, 'Lidocaine', '', 100, 3, 1),
(96, 'Fluconazol (Diflucan)', '', 100, 1, 1),
(97, 'Etoricoxib (Arcoxia)', '', 100, 1, 1),
(98, 'Norfloxacine (Noroxin)', '', 100, 1, 1),
(99, 'Lidocaine (Xylocaine)', '', 100, 1, 1),
(100, 'Nitroglycerine (Nitrolingual)', '', 100, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `huisarts` int(11) NOT NULL,
  `apotheker` int(11) NOT NULL,
  `koerier` int(11) NOT NULL DEFAULT '99',
  `leverdatum` date DEFAULT NULL,
  `levertijd` time DEFAULT NULL,
  `bestelling_gemaakt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `patientid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `completed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patientdata`
--

CREATE TABLE `patientdata` (
  `id` int(11) NOT NULL,
  `verznr` int(11) NOT NULL,
  `achternaam` varchar(100) NOT NULL,
  `geboorteplaats` varchar(100) NOT NULL,
  `woonplaats` varchar(100) NOT NULL,
  `adres` varchar(100) NOT NULL,
  `tel` varchar(45) NOT NULL,
  `postcode` varchar(45) NOT NULL,
  `post` varchar(45) NOT NULL,
  `apotheker` int(100) NOT NULL,
  `huisarts` int(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patientdata`
--

INSERT INTO `patientdata` (`id`, `verznr`, `achternaam`, `geboorteplaats`, `woonplaats`, `adres`, `tel`, `postcode`, `post`, `apotheker`, `huisarts`, `email`) VALUES
(1, 311, 'Peters', 'Amsterdam', 'Amsterdam', 'Dreef 11', '123', '1123GH', 'Kroonhorst', 1, 2, 'peters@gmail.com'),
(2, 323, 'Mouni', 'Delphi', 'Delphi', 'Reigersbos 23', '456', '1189IJ', 'Kroonhorst', 3, 1, 'mouni@gmail.com'),
(3, 334, 'Van Veen', 'Amsterdam', 'Amsterdam', 'Made 5', '789', '1190UJ', 'Kroonhorst', 3, 2, 'vanveen@gmail.com'),
(4, 355, 'Verwaaij', 'Utrecht', 'Utrecht', 'Vink 14', '900', '1109AS', 'Kroonhorst', 2, 1, 'verwaaij@gmail.com'),
(5, 412, 'Ketam', 'Kaapstad', 'Kaapsatad', 'Dreef 34', '897', '1123GH', 'Kroonhorst', 1, 2, 'ketam@gmail.com'),
(6, 423, 'Sinu', 'Bali', 'Bali', 'Zaan 39', '563', '1187YU', 'Huisartsenpost', 2, 3, 'sinu@gmail.com'),
(7, 466, 'Kauq', 'Ankara', 'Ankara', 'Doorloop 45', '566', '1126CV', 'Kroonhorst', 1, 1, 'kauq@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Moet nog bezorgd worden'),
(2, 'Bezorgd'),
(3, 'Niet thuis, eerste poging'),
(4, 'Niet thuis, tweede poging'),
(5, 'Niet thuis, derde poging');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apotheker`
--
ALTER TABLE `apotheker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bestellingregels`
--
ALTER TABLE `bestellingregels`
  ADD KEY `fk_medijnenid_idx` (`medicijnenid`),
  ADD KEY `fk_orderid_idx` (`orderid`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `huisarts`
--
ALTER TABLE `huisarts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `koerier`
--
ALTER TABLE `koerier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicijnen`
--
ALTER TABLE `medicijnen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_huisarts_idx` (`huisarts`),
  ADD KEY `fk_koerier_idx` (`koerier`),
  ADD KEY `fk_status` (`status`),
  ADD KEY `patientid` (`patientid`),
  ADD KEY `apotheker` (`apotheker`);

--
-- Indexes for table `patientdata`
--
ALTER TABLE `patientdata`
  ADD PRIMARY KEY (`id`,`verznr`),
  ADD KEY `fk_apotheker_idx` (`apotheker`),
  ADD KEY `fk_huisarts_idx` (`huisarts`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apotheker`
--
ALTER TABLE `apotheker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `huisarts`
--
ALTER TABLE `huisarts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `koerier`
--
ALTER TABLE `koerier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `medicijnen`
--
ALTER TABLE `medicijnen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `patientdata`
--
ALTER TABLE `patientdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bestellingregels`
--
ALTER TABLE `bestellingregels`
  ADD CONSTRAINT `fk_medijnenid` FOREIGN KEY (`medicijnenid`) REFERENCES `medicijnen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orderid` FOREIGN KEY (`orderid`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_apothekers` FOREIGN KEY (`apotheker`) REFERENCES `apotheker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_huisarts1` FOREIGN KEY (`huisarts`) REFERENCES `huisarts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_koerier` FOREIGN KEY (`koerier`) REFERENCES `koerier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_patientid` FOREIGN KEY (`patientid`) REFERENCES `patientdata` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `patientdata`
--
ALTER TABLE `patientdata`
  ADD CONSTRAINT `fk_apotheker` FOREIGN KEY (`apotheker`) REFERENCES `apotheker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_huisarts` FOREIGN KEY (`huisarts`) REFERENCES `huisarts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
