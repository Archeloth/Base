-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Már 15. 20:01
-- Kiszolgáló verziója: 10.1.38-MariaDB
-- PHP verzió: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `e_kisokos`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `adminisztracio_adatok`
--

CREATE TABLE `adminisztracio_adatok` (
  `userId` varchar(36) NOT NULL,
  `adminE` tinyint(1) NOT NULL,
  `aktivE` tinyint(1) NOT NULL,
  `regisztracio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `betegE` tinyint(1) NOT NULL,
  `biztKerdes` int(11) NOT NULL,
  `biztValasz` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `theme` tinytext NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `articles`
--

INSERT INTO `articles` (`article_id`, `theme`, `title`, `content`, `created`) VALUES
(1, 'nyaktorna', 'A legjobb nyaktorna', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque aliquam risus eu lectus pharetra egestas. Morbi sagittis mauris eu tortor aliquam, pretium lobortis velit rutrum. Nulla sagittis libero quam, id ultrices augue ultrices id. Suspendisse orci sem, iaculis non tortor eget, porta mattis ante. Proin eget tortor sed felis egestas sagittis. Maecenas nec pulvinar leo. Aliquam sagittis dignissim diam ac viverra. Integer eget enim eros. Cras venenatis feugiat porttitor. Quisque dapibus sem turpis, sed molestie est suscipit in. Nam porta tempus lacus, ac tristique purus pharetra ac. Quisque dignissim, eros a tristique dignissim, felis elit ultricies augue, quis suscipit lacus tellus at urna. Aenean non nisi vitae leo rutrum eleifend eget blandit dolor. Suspendisse vel sodales velit. Sed tincidunt at lectus id accumsan. Aliquam erat volutpat. lectus pharetra egestas. Morbi sagittis mauris eu tortor aliquam, pretium lobortis velit rutrum. Nulla sagittis libero quam, id ultrices augue ultrices id. Suspendisse orci sem, iaculis non tortor eget, porta mattis ante. Proin eget tortor sed felis egestas sagittis. Maecenas nec  lectus pharetra egestas. Morbi sagittis mauris eu tortor aliquam, pretium lobortis velit rutrum. Nulla sagittis libero quam, id ultrices augue ultrices id. Suspendisse orci sem, iaculis non tortor eget, porta mattis ante. Proin eget tortor sed felis egestas sagittis. Maecenas nec  lectus pharetra egestas. Morbi sagittis mauris eu tortor aliquam, pretium lobortis velit rutrum. Nulla sagittis libero quam, id ultrices augue ultrices id. Suspendisse orci sem, iaculis non tortor eget, porta mattis ante. Proin eget tortor sed felis egestas sagittis. Maecenas nec  lectus pharetra egestas. Morbi sagittis mauris eu tortor aliquam, pretium lobortis velit rutrum. Nulla sagittis libero quam, id ultrices augue ultrices id. Suspendisse orci sem, iaculis non tortor eget, porta mattis ante. Proin eget tortor sed felis egestas sagittis. Maecenas nec ', '2019-02-02 11:22:35'),
(2, 'lábtorna', 'A lábfejlesztése', '<h3>Lorem\r\n isum</h3>\r\n<img src=\"images/artic_2_20190221175604.jpg\" class=\"img-fluid\">\r\n<p>dolor sit amet, consectetur adipiscing elit. Quisque aliquam risus eu lectus pharetra egestas. Morbi sagittis mauris eu tortor aliquam, pretium lobortis velit rutrum. Nulla sagittis libero quam, id ultrices augue ultrices id. Suspendisse orci sem, iaculis non tortor eget, porta mattis ante. Proin eget tortor sed felis egestas sagittis. Maecenas nec pulvinar leo. Aliquam sagittis dignissim diam ac viverra. Integer eget enim eros. Cras venenatis feugiat porttitor. Quisque dapibus sem turpis, sed molestie est suscipit in. Nam porta tempus lacus, ac.</p>\r\n\r\n<p>it rutrum. Nulla sagittis libero quam, id ultrices augue ultrices id. Suspendisse orci sem, iaculis non tortor eget, porta mattis ante. Proin eget tortor sed felis egestas sagittis. Maecenas nec pulvinar leo. Aliquam sagittis dignissim diam ac viverra. Integer eget enim eros. Cras venenatis feugiat porttitor. Quisit rutrum. Nulla sagittis libero quam, id ultrices augue ultrices id. Suspendisse orci sem, iaculis non tortor eget, porta mattis ante. Proin eget tortor sed felis egestas sagittis. Maecenas nec pulvinar leo. Aliquam sagittis dignissim diam ac viverra.</p>I<p>nteger eget enim eros. Cras venenatis feugiat porttitor. Quisit rutrum. Nulla sagittis libero quam, id ultrices augue ultrices id. Suspendisse orci sem, iaculis non tortor eget, porta mattis ante. Proin eget tortor sed felis egestas sagittis. Maecenas nec pulvinar leo. Aliquam sagittis dignissim diam ac viverra. Integer eget enim eros. Cras venenatis feugiat porttitor. Quisit rutrum. Nulla sagittis libero quam, id ultrices augue ultrices id. Suspendisse orci sem, iaculis non tortor eget, porta mattis ante. Proin eget tortor sed felis egestas sagittis. Maecenas nec pulvinar leo. Aliquam sagittis dignissim diam ac viverra. Integer eget enim eros. Cras venenatis feugiat porttitor. Quisit rutrum. Nulla sagittis libero quam, id ultrices augue ultrices id. Suspendisse orci sem, iaculis non tortor eget, porta mattis ante. Proin eget tortor sed felis egestas sagittis. Maecenas nec pulvinar leo. Aliquam sagittis dignissim diam ac viverra. Integer eget enim eros. Cras venenatis feugiat porttitor. Quis</p>', '2019-03-09 10:57:04'),
(5, 'háttorna', 'A hátizmok legfontosabb tulajdonságai', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n\r\nQuisque aliquam risus eu lectus pharetra egestas. Morbi sagittis mauris eu tortor aliquam, pretium lobortis velit rutrum. Nulla sagittis libero quam, id ultrices augue ultrices id. Suspendisse orci sem, iaculis non tortor eget, porta mattis ante. Proin eget tortor sed felis egestas sagittis. Maecenas nec pulvinar leo.\r\nAliquam sagittis dignissim diam ac viverra.\r\nInteger eget enim eros. Cras venenatis feugiat porttitor.\r\nQuisque dapibus sem turpis, sed molestie est suscipit in.\r\n\r\n\r\nNam porta tempus lacus, ac tristique purus pharetra ac. Quisque dignissim, eros a tristique dignissim, felis elit ultricies augue, quis suscipit lacus tellus at urna. Aenean non nisi vitae leo rutrum eleifend eget blandit dolor. Suspendisse vel sodales velit. Sed tincidunt at lectus id accumsan. Aliquam erat volutpat.\r\n', '2019-03-09 10:57:23'),
(8, 'test', 'test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque aliquam risus eu lectus pharetra egestas. Morbi sagittis mauris eu tortor aliquam, pretium lobortis velit rutrum. Nulla sagittis libero quam, id ultrices augue ultrices id. Suspendisse orci sem, iaculis non tortor eget, porta mattis ante. Proin eget tortor sed felis egestas sagittis. Maecenas nec pulvinar leo. Aliquam sagittis dignissim diam ac viverra. Integer eget enim eros. Cras venenatis feugiat porttitor. Quisque dapibus sem turpis, sed molestie est suscipit in. Nam porta tempus lacus, ac tristique purus pharetra ac. Quisque dignissim, eros a tristique dignissim, felis elit ultricies augue, quis suscipit lacus tellus at urna. Aenean non nisi vitae leo rutrum eleifend eget blandit dolor. Suspendisse vel sodales velit. Sed tincidunt at lectus id accumsan. Aliquam erat volutpat.', '2019-02-02 10:59:29'),
(9, 'test', 'test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque aliquam risus eu lectus pharetra egestas. Morbi sagittis mauris eu tortor aliquam, pretium lobortis velit rutrum. Nulla sagittis libero quam, id ultrices augue ultrices id. Suspendisse orci sem, iaculis non tortor eget, porta mattis ante. Proin eget tortor sed felis egestas sagittis. Maecenas nec pulvinar leo. Aliquam sagittis dignissim diam ac viverra. Integer eget enim eros. Cras venenatis feugiat porttitor. Quisque dapibus sem turpis, sed molestie est suscipit in. Nam porta tempus lacus, ac tristique purus pharetra ac. Quisque dignissim, eros a tristique dignissim, felis elit ultricies augue, quis suscipit lacus tellus at urna. Aenean non nisi vitae leo rutrum eleifend eget blandit dolor. Suspendisse vel sodales velit. Sed tincidunt at lectus id accumsan. Aliquam erat volutpat.', '2019-02-02 10:59:39'),
(10, 'test', 'test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque aliquam risus eu lectus pharetra egestas. Morbi sagittis mauris eu tortor aliquam, pretium lobortis velit rutrum. Nulla sagittis libero quam, id ultrices augue ultrices id. Suspendisse orci sem, iaculis non tortor eget, porta mattis ante. Proin eget tortor sed felis egestas sagittis. Maecenas nec pulvinar leo. Aliquam sagittis dignissim diam ac viverra. Integer eget enim eros. Cras venenatis feugiat porttitor. Quisque dapibus sem turpis, sed molestie est suscipit in. Nam porta tempus lacus, ac tristique purus pharetra ac. Quisque dignissim, eros a tristique dignissim, felis elit ultricies augue, quis suscipit lacus tellus at urna. Aenean non nisi vitae leo rutrum eleifend eget blandit dolor. Suspendisse vel sodales velit. Sed tincidunt at lectus id accumsan. Aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque aliquam risus eu lectus pharetra egestas. Morbi sagittis mauris eu tortor aliquam, pretium lobortis velit rutrum. Nulla sagittis libero quam, id ultrices augue ultrices id. Suspendisse orci sem, iaculis non tortor eget, porta mattis ante. Proin eget tortor sed felis egestas sagittis. Maecenas nec pulvinar leo. Aliquam sagittis dignissim diam ac viverra. Integer eget enim eros. Cras venenatis feugiat porttitor. Quisque dapibus sem turpis, sed molestie est suscipit in. Nam porta tempus lacus, ac tristique purus pharetra ac. Quisque dignissim, eros a tristique dignissim, felis elit ultricies augue, quis suscipit lacus tellus at urna. Aenean non nisi vitae leo rutrum eleifend eget blandit dolor. Suspendisse vel sodales velit. Sed tincidunt at lectus id accumsan. Aliquam erat volutpat.', '2019-02-02 10:59:46'),
(12, 'fejfájás', 'A fejfájás kellemetlen hatásai', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tincidunt lorem sed orci ultrices volutpat. Suspendisse tempor augue at tempus varius. Phasellus ut aliquam risus. Pellentesque euismod vulputate efficitur. Quisque urna mauris, pretium a sem at, varius tristique mi. Phasellus eros lectus, sollicitudin ut luctus vel, semper sit amet leo. Nam condimentum mi ut blandit dignissim. Fusce dui lacus, vestibulum ut purus sit amet, maximus hendrerit justo. Pellentesque ut posuere erat. Mauris ullamcorper est metus, id eleifend diam semper vitae. Suspendisse at maximus neque. Nullam vulputate id urna id pulvinar. Ut vel lacus quam.\r\n\r\nFusce luctus eu leo vel rhoncus. Phasellus sodales sem ac ipsum consectetur, ac fermentum est porttitor. Pellentesque quis interdum urna. Vivamus condimentum venenatis turpis, in iaculis dui consequat ut. Curabitur egestas nibh nibh, eu tincidunt turpis faucibus et. Suspendisse in molestie magna, nec luctus nunc. Nullam consectetur nibh eu est pellentesque, nec suscipit velit tempus. Nunc at eros felis. Nam pellentesque venenatis augue et venenatis. Pellentesque iaculis purus a ipsum semper aliquet sit amet non urna.', '2019-03-09 10:56:45');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `bejelentkezo_adatok`
--

CREATE TABLE `bejelentkezo_adatok` (
  `userId` varchar(36) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userEmail` tinytext NOT NULL,
  `userPwd` longtext NOT NULL,
  `token` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `biztonsagi_kerdesek`
--

CREATE TABLE `biztonsagi_kerdesek` (
  `biztId` int(11) NOT NULL,
  `biztonsagi_kerdes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `biztonsagi_kerdesek`
--

INSERT INTO `biztonsagi_kerdesek` (`biztId`, `biztonsagi_kerdes`) VALUES
(1, 'Mi volt a gyermekkori beceneved?'),
(2, 'Mi a neve a legjobb barátodnak?'),
(3, 'Mi volt az általános iskolád neve?'),
(4, 'Melyik hónapban van a testvéred születésnapja?'),
(5, 'Melyik városban dolgoztál először?'),
(6, 'Mi volt az első háziállatod neve?');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `comments`
--

CREATE TABLE `comments` (
  `userId` varchar(36) NOT NULL,
  `username` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `comment_id` int(11) NOT NULL,
  `parentId` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kepek`
--

CREATE TABLE `kepek` (
  `kepnev` varchar(30) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `kepek`
--

INSERT INTO `kepek` (`kepnev`, `article_id`) VALUES
('artic_2_20190221175604.jpg', 2),
('artic_12_20190308192253.jpg', 12);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendelesek`
--

CREATE TABLE `rendelesek` (
  `rendelesId` int(36) NOT NULL,
  `userId` varchar(36) NOT NULL,
  `termekId` int(11) NOT NULL,
  `rendelesIdopontja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `teljesitve` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szemelyes_adatok`
--

CREATE TABLE `szemelyes_adatok` (
  `userId` varchar(36) NOT NULL,
  `knev` tinytext NOT NULL,
  `vnev` tinytext NOT NULL,
  `nem` tinyint(1) NOT NULL,
  `telszam` tinytext NOT NULL,
  `szuldatum` date DEFAULT NULL,
  `lakcim` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek`
--

CREATE TABLE `termekek` (
  `termekId` int(11) NOT NULL,
  `megnevezes` varchar(100) NOT NULL,
  `nettoAr` int(10) NOT NULL,
  `raktaron` int(10) NOT NULL,
  `kep` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `termekek`
--

INSERT INTO `termekek` (`termekId`, `megnevezes`, `nettoAr`, `raktaron`, `kep`) VALUES
(1, 'Gimnasztikai gumi labda', 4000, 9, 'fitness_ball.jpg'),
(2, 'Redos massazs labda', 1000, 20, 'massage_ball.jpg'),
(3, 'Gumi szallag', 1200, 24, 'fitness_rubber_band.jpg'),
(4, 'Gumi labda', 500, 23, 'rubber_ball.png');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tornak`
--

CREATE TABLE `tornak` (
  `tornaId` int(11) NOT NULL,
  `tipus` tinytext NOT NULL,
  `megnevezes` text NOT NULL,
  `maxFo` tinyint(3) UNSIGNED NOT NULL,
  `ar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `tornak`
--

INSERT INTO `tornak` (`tornaId`, `tipus`, `megnevezes`, `maxFo`, `ar`) VALUES
(1, 'egyeni, szemelyes', 'Egyeni torna', 1, 2000),
(2, 'csoport, gyerek', 'Csoportos gyerek torna', 10, 1200),
(3, 'csoport, felnott', 'Felnott csoport', 20, 1500),
(4, 'csoport, idos, felnott', 'Idos csoportos torna', 20, 1400);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tornazok`
--

CREATE TABLE `tornazok` (
  `userId` varchar(36) NOT NULL,
  `tornaId` int(11) NOT NULL,
  `nap` date NOT NULL,
  `idopont` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `adminisztracio_adatok`
--
ALTER TABLE `adminisztracio_adatok`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `biztKerdes` (`biztKerdes`);

--
-- A tábla indexei `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- A tábla indexei `bejelentkezo_adatok`
--
ALTER TABLE `bejelentkezo_adatok`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userName` (`userName`),
  ADD KEY `token` (`token`);

--
-- A tábla indexei `biztonsagi_kerdesek`
--
ALTER TABLE `biztonsagi_kerdesek`
  ADD PRIMARY KEY (`biztId`);

--
-- A tábla indexei `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`,`parentId`);

--
-- A tábla indexei `kepek`
--
ALTER TABLE `kepek`
  ADD PRIMARY KEY (`kepnev`),
  ADD KEY `article_id` (`article_id`);

--
-- A tábla indexei `rendelesek`
--
ALTER TABLE `rendelesek`
  ADD PRIMARY KEY (`rendelesId`),
  ADD KEY `termekId` (`termekId`),
  ADD KEY `userId` (`userId`);

--
-- A tábla indexei `szemelyes_adatok`
--
ALTER TABLE `szemelyes_adatok`
  ADD PRIMARY KEY (`userId`);

--
-- A tábla indexei `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`termekId`);

--
-- A tábla indexei `tornak`
--
ALTER TABLE `tornak`
  ADD PRIMARY KEY (`tornaId`);

--
-- A tábla indexei `tornazok`
--
ALTER TABLE `tornazok`
  ADD PRIMARY KEY (`nap`,`idopont`),
  ADD KEY `tornaId` (`tornaId`),
  ADD KEY `userId` (`userId`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT a táblához `biztonsagi_kerdesek`
--
ALTER TABLE `biztonsagi_kerdesek`
  MODIFY `biztId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `rendelesek`
--
ALTER TABLE `rendelesek`
  MODIFY `rendelesId` int(36) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `termekek`
--
ALTER TABLE `termekek`
  MODIFY `termekId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `tornak`
--
ALTER TABLE `tornak`
  MODIFY `tornaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `adminisztracio_adatok`
--
ALTER TABLE `adminisztracio_adatok`
  ADD CONSTRAINT `adminisztracio_adatok_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `bejelentkezo_adatok` (`userId`);

--
-- Megkötések a táblához `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`parentId`) REFERENCES `articles` (`article_id`);

--
-- Megkötések a táblához `kepek`
--
ALTER TABLE `kepek`
  ADD CONSTRAINT `kepek_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`);

--
-- Megkötések a táblához `rendelesek`
--
ALTER TABLE `rendelesek`
  ADD CONSTRAINT `rendelesek_ibfk_1` FOREIGN KEY (`termekId`) REFERENCES `termekek` (`termekId`),
  ADD CONSTRAINT `rendelesek_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `bejelentkezo_adatok` (`userId`);

--
-- Megkötések a táblához `szemelyes_adatok`
--
ALTER TABLE `szemelyes_adatok`
  ADD CONSTRAINT `szemelyes_adatok_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `bejelentkezo_adatok` (`userId`);

--
-- Megkötések a táblához `tornazok`
--
ALTER TABLE `tornazok`
  ADD CONSTRAINT `tornazok_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `bejelentkezo_adatok` (`userId`),
  ADD CONSTRAINT `tornazok_ibfk_2` FOREIGN KEY (`tornaId`) REFERENCES `tornak` (`tornaId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
