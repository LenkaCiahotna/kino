-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 24. dub 2023, 23:42
-- Verze serveru: 10.4.25-MariaDB
-- Verze PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `kino`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `filmy`
--

CREATE TABLE `filmy` (
  `id_filmu` int(11) NOT NULL,
  `nazev` varchar(100) COLLATE utf8mb4_czech_ci NOT NULL,
  `zanr` varchar(25) COLLATE utf8mb4_czech_ci NOT NULL,
  `delkaVMinutach` int(11) NOT NULL,
  `popis` text COLLATE utf8mb4_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `filmy`
--

INSERT INTO `filmy` (`id_filmu`, `nazev`, `zanr`, `delkaVMinutach`, `popis`) VALUES
(1, 'DUNGEONS & DRAGONS: ČEST ZLODĚJŮ', 'Akční', 134, 'Potulný zpěvák neboli bard Edgin (Chris Pine) se živí tím, že se svou partou zlodějíčků pomáhá měnit majitele vzácných artefaktů (jednomu ho ukradnou a druhému prodají). Je to práce, při které prakticky neustále strkáte hlavu do oprátky, a ani Edgin nemůže mít věčně kliku. Když se mu podaří šlohnout to, co se nikdy nemělo dostat do nesprávných rukou, a on to navíc do těch rukou dobrovolně vloží, spustí dominový efekt, který může otřást celým světem. Edgin je sice tak trochu zmetek, ale pořád má v sobě kousek cti, a tak se rozhodne napravit, co spískal. Protože však proti němu stojí armáda nelítostných zabijáků, mocných čarodějů a bývalý kamarád Forge Fletcher (Hugh Grant), potřebuje tým, se kterým by mohl mít aspoň nepatrnou šanci v tomhle úkolu obstát. A protože film vychází z legendární hry Dračí doupě, je jasné, že v jeho partě nesmí chybět drsná válečnice (Michelle Rodriguez), ušlechtilý rytíř (Regé-Jean Page), mág (Justice Smith) nebo druidka (Sophia Lillis).'),
(6, 'pokus', 'pokus', 80, 'pokus'),
(7, 'ggseg', 'gesg', 66, 'gsgs'),
(8, 'ggseg', 'gesg', 66, 'gsgs');

-- --------------------------------------------------------

--
-- Struktura tabulky `promitani`
--

CREATE TABLE `promitani` (
  `id_promitani` int(11) NOT NULL,
  `id_filmu` int(11) NOT NULL,
  `id_saly` int(11) NOT NULL,
  `termin` date NOT NULL,
  `cas` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `promitani`
--

INSERT INTO `promitani` (`id_promitani`, `id_filmu`, `id_saly`, `termin`, `cas`) VALUES
(1, 1, 2, '2023-04-11', '15:00:00'),
(2, 1, 2, '2023-04-11', '09:20:00'),
(3, 1, 3, '2023-04-11', '00:00:00'),
(4, 1, 1, '2023-04-07', '07:34:00'),
(6, 6, 3, '2023-04-19', '20:19:00'),
(7, 7, 2, '2023-04-17', '01:26:00'),
(8, 6, 2, '2023-04-10', '21:34:00');

-- --------------------------------------------------------

--
-- Struktura tabulky `saly`
--

CREATE TABLE `saly` (
  `id_saly` int(11) NOT NULL,
  `kapacita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `saly`
--

INSERT INTO `saly` (`id_saly`, `kapacita`) VALUES
(1, 200),
(2, 200),
(3, 150),
(4, 250);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `filmy`
--
ALTER TABLE `filmy`
  ADD PRIMARY KEY (`id_filmu`);

--
-- Indexy pro tabulku `promitani`
--
ALTER TABLE `promitani`
  ADD PRIMARY KEY (`id_promitani`),
  ADD KEY `id_filmu` (`id_filmu`),
  ADD KEY `id_saly` (`id_saly`);

--
-- Indexy pro tabulku `saly`
--
ALTER TABLE `saly`
  ADD PRIMARY KEY (`id_saly`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `filmy`
--
ALTER TABLE `filmy`
  MODIFY `id_filmu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pro tabulku `promitani`
--
ALTER TABLE `promitani`
  MODIFY `id_promitani` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pro tabulku `saly`
--
ALTER TABLE `saly`
  MODIFY `id_saly` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `promitani`
--
ALTER TABLE `promitani`
  ADD CONSTRAINT `promitani_ibfk_1` FOREIGN KEY (`id_saly`) REFERENCES `saly` (`id_saly`),
  ADD CONSTRAINT `promitani_ibfk_2` FOREIGN KEY (`id_filmu`) REFERENCES `filmy` (`id_filmu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
