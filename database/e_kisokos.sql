-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Már 09. 14:19
-- Kiszolgáló verziója: 10.1.36-MariaDB
-- PHP verzió: 7.2.10

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
  `biztKerdes` varchar(255) DEFAULT NULL,
  `biztValasz` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `adminisztracio_adatok`
--

INSERT INTO `adminisztracio_adatok` (`userId`, `adminE`, `aktivE`, `regisztracio`, `betegE`, `biztKerdes`, `biztValasz`) VALUES
('7574a21b-416d-4462-8b42-7684926984b7', 0, 1, '2019-02-21 18:06:19', 1, '0', ''),
('7f47fe6a-b642-4850-b529-bdba785745c1', 0, 1, '2019-02-23 15:24:06', 1, '0', ''),
('80438ad4-5de3-413c-b0a3-cfc6d47054e0', 0, 1, '2019-02-21 18:02:51', 1, '0', ''),
('8746ce53-cd88-46ab-9ca8-48cd6598a0b3', 0, 1, '2019-03-09 11:04:14', 1, '0', ''),
('b4dbbd05-e33b-4eef-9d51-be7a2040e15e', 0, 1, '2019-02-21 17:59:55', 1, '0', ''),
('dc9e4eb5-b022-45fa-b911-20560b3aeec3', 0, 1, '2019-02-19 16:08:40', 1, '0', ''),
('f97b432f-a823-4a46-b86e-cffe3d26c62f', 1, 1, '2019-02-18 15:44:21', 0, '0', '');

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

--
-- A tábla adatainak kiíratása `bejelentkezo_adatok`
--

INSERT INTO `bejelentkezo_adatok` (`userId`, `userName`, `userEmail`, `userPwd`, `token`) VALUES
('7574a21b-416d-4462-8b42-7684926984b7', 'test5', 'test@test.com', '$2y$10$7p.Omr4PZz9bDfqgqzjCyua9lNQiSlXW/UxWXq6ZbHUeY6tvJIMbe', NULL),
('7f47fe6a-b642-4850-b529-bdba785745c1', 'test', 'test@test.com', '$2y$10$KCKijZTrBjGKhPnfT4x48unaFkXUU/mLMIj3CAscu6fsJemWLYNlq', NULL),
('80438ad4-5de3-413c-b0a3-cfc6d47054e0', 'Laura9952', 'neil1977@yahoo.com', '$2y$10$iBClkPl20CDYac7fC2oGWegvSbJRRj4tDJXnY6aLJM9lFfiGyM9hC', NULL),
('8746ce53-cd88-46ab-9ca8-48cd6598a0b3', 'bizttest', 'bizt@test.com', '$2y$10$gN2sl5BecQCP.bMl4SaOYOzViHJ9C9ucnCDYXIacEq9VzDskXWzDO', NULL),
('b4dbbd05-e33b-4eef-9d51-be7a2040e15e', 'partik01', 'patrikthebest@freemail.hu', '$2y$10$8NoNwOoLi9QttLvqjR6v0e0w3wtskjq4C0VuxLJqqsz02TA6DAJ4i', NULL),
('dc9e4eb5-b022-45fa-b911-20560b3aeec3', 'benoke22', 'benike@asd.hu', '$2y$10$WVFtLG8LGIA7Cud1jwPhouELmEOOJ0UBoK/D45RsC6OO0kF82pGtC', NULL),
('f97b432f-a823-4a46-b86e-cffe3d26c62f', 'admin', 'r.barnabas96@gmail.com', '$2y$10$IDMIQidZFwUu09QEjskf7uCGGopFJIkx6SuLj.CnEbgUt3nBET/8C', NULL);

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

--
-- A tábla adatainak kiíratása `comments`
--

INSERT INTO `comments` (`userId`, `username`, `content`, `comment_id`, `parentId`, `date`) VALUES
('f97b432f-a823-4a46-b86e-cffe3d26c62f', 'admin', 'Oh wow!!', 16, 5, '2019-02-23 13:02:41'),
('8746ce53-cd88-46ab-9ca8-48cd6598a0b3', 'bizttest', 'Jaj ez nagyon rossz!!!4', 17, 12, '2019-02-24 15:10:08'),
('f97b432f-a823-4a46-b86e-cffe3d26c62f', 'admin', 'Te vagy a buta!', 18, 12, '2019-02-24 15:10:32'),
('dc9e4eb5-b022-45fa-b911-20560b3aeec3', 'benoke22', 'Hello', 19, 2, '2019-03-08 09:04:35'),
('dc9e4eb5-b022-45fa-b911-20560b3aeec3', 'benoke22', 'Aztaaa', 20, 5, '2019-03-09 12:28:03');

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

--
-- A tábla adatainak kiíratása `rendelesek`
--

INSERT INTO `rendelesek` (`rendelesId`, `userId`, `termekId`, `rendelesIdopontja`, `teljesitve`) VALUES
(1, 'dc9e4eb5-b022-45fa-b911-20560b3aeec3', 1, '2019-03-02 16:18:14', 1),
(2, 'dc9e4eb5-b022-45fa-b911-20560b3aeec3', 3, '2019-03-02 16:19:13', 0),
(1000000, 'dc9e4eb5-b022-45fa-b911-20560b3aeec3', 4, '2019-03-03 15:27:43', 0),
(1000001, 'dc9e4eb5-b022-45fa-b911-20560b3aeec3', 4, '2019-03-08 18:33:00', 1);

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

--
-- A tábla adatainak kiíratása `szemelyes_adatok`
--

INSERT INTO `szemelyes_adatok` (`userId`, `knev`, `vnev`, `nem`, `telszam`, `szuldatum`, `lakcim`) VALUES
('7574a21b-416d-4462-8b42-7684926984b7', 'Kiss', 'BenÅ‘', 0, '007777722', '1995-02-02', 'Budapest'),
('7f47fe6a-b642-4850-b529-bdba785745c1', 'Kiss', 'BenÅ‘', 0, '007777722', '1995-02-02', 'Budapest'),
('80438ad4-5de3-413c-b0a3-cfc6d47054e0', 'Kiss', 'BenÅ‘', 0, '007777722', '1995-02-02', 'Budapest'),
('8746ce53-cd88-46ab-9ca8-48cd6598a0b3', 'Kiss', 'BenÅ‘', 0, '007777722', '1995-02-02', 'Budapest'),
('b4dbbd05-e33b-4eef-9d51-be7a2040e15e', 'Kiss', 'BenÅ‘', 0, '007777722', '1995-02-02', 'Budapest'),
('dc9e4eb5-b022-45fa-b911-20560b3aeec3', 'Kiss', 'BenÅ‘', 0, '007777722', '1995-02-02', 'Budapest'),
('f97b432f-a823-4a46-b86e-cffe3d26c62f', 'Radován', 'Barnabás', 0, '306381864', '1996-03-17', 'Budapest');

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
-- A tábla adatainak kiíratása `tornazok`
--

INSERT INTO `tornazok` (`userId`, `tornaId`, `nap`, `idopont`) VALUES
('dc9e4eb5-b022-45fa-b911-20560b3aeec3', 1, '2019-02-25', '15-16'),
('f97b432f-a823-4a46-b86e-cffe3d26c62f', 2, '2019-02-25', '8-9'),
('f97b432f-a823-4a46-b86e-cffe3d26c62f', 1, '2019-02-26', '10-11'),
('f97b432f-a823-4a46-b86e-cffe3d26c62f', 1, '2019-02-28', '12-13'),
('dc9e4eb5-b022-45fa-b911-20560b3aeec3', 1, '2019-03-01', '13-14'),
('f97b432f-a823-4a46-b86e-cffe3d26c62f', 3, '2019-03-02', '11-12'),
('dc9e4eb5-b022-45fa-b911-20560b3aeec3', 1, '2019-03-02', '14-15'),
('f97b432f-a823-4a46-b86e-cffe3d26c62f', 1, '2019-03-02', '9-10'),
('f97b432f-a823-4a46-b86e-cffe3d26c62f', 4, '2019-03-03', '12-13'),
('f97b432f-a823-4a46-b86e-cffe3d26c62f', 2, '2019-03-06', '10-11'),
('f97b432f-a823-4a46-b86e-cffe3d26c62f', 4, '2019-03-06', '11-12'),
('f97b432f-a823-4a46-b86e-cffe3d26c62f', 3, '2019-03-06', '9-10'),
('dc9e4eb5-b022-45fa-b911-20560b3aeec3', 1, '2019-03-07', '11-12'),
('f97b432f-a823-4a46-b86e-cffe3d26c62f', 2, '2019-03-10', '10-11'),
('dc9e4eb5-b022-45fa-b911-20560b3aeec3', 1, '2019-03-10', '13-14');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `adminisztracio_adatok`
--
ALTER TABLE `adminisztracio_adatok`
  ADD PRIMARY KEY (`userId`);

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
  ADD PRIMARY KEY (`comment_id`,`parentId`),
  ADD KEY `parentId` (`parentId`);

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `rendelesek`
--
ALTER TABLE `rendelesek`
  MODIFY `rendelesId` int(36) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000002;

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
