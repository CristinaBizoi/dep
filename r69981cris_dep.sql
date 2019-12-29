-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: localhost:3306
-- Timp de generare: dec. 29, 2019 la 02:57 PM
-- Versiune server: 10.2.27-MariaDB-cll-lve
-- Versiune PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `r69981cris_dep`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `diagnostice`
--

CREATE TABLE `diagnostice` (
  `id` int(255) NOT NULL,
  `cod` varchar(255) NOT NULL,
  `denumire` varchar(255) NOT NULL,
  `data_adaugare` datetime NOT NULL DEFAULT current_timestamp(),
  `id_fisa` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `diagnostice`
--

INSERT INTO `diagnostice` (`id`, `cod`, `denumire`, `data_adaugare`, `id_fisa`) VALUES
(1, 'd1', 'diagnostic1', '2019-04-12 05:33:48', 13),
(2, 'd2', 'diagnostic2', '2019-04-12 05:33:48', 13),
(3, 'd1', 'diagnostic1', '2019-04-12 05:33:48', 14),
(4, 'd2', 'diagnostic2', '2019-04-12 05:33:48', 14),
(5, '123', 'Diagnostic', '2019-04-19 17:31:41', 15),
(6, '1234', 'Diagnostic 2', '2019-04-19 17:31:41', 15),
(7, '1233', 'TEST', '2019-04-19 20:02:50', 16),
(8, '1233', '', '2019-04-19 20:02:50', 16);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `fise_medicale`
--

CREATE TABLE `fise_medicale` (
  `id` int(255) NOT NULL,
  `data_adaugare` datetime NOT NULL DEFAULT current_timestamp(),
  `observatii` text NOT NULL,
  `tip_fisa` int(10) NOT NULL,
  `id_pacient` int(255) NOT NULL,
  `trimisa` tinyint(1) NOT NULL DEFAULT 0,
  `id_spital` int(255) DEFAULT NULL,
  `id_utilizator` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `fise_medicale`
--

INSERT INTO `fise_medicale` (`id`, `data_adaugare`, `observatii`, `tip_fisa`, `id_pacient`, `trimisa`, `id_spital`, `id_utilizator`) VALUES
(3, '2019-04-12 05:33:48', 'TEST', 2, 1, 0, 1, 1),
(4, '2019-04-12 05:33:48', 'TEST', 2, 1, 0, 1, 1),
(5, '2019-04-12 05:33:48', 'TEST', 2, 1, 0, 1, 1),
(6, '2019-04-12 05:33:48', 'TEST', 2, 1, 0, 1, 1),
(7, '2019-04-12 05:33:48', 'TEST', 2, 1, 0, 1, 1),
(8, '2019-04-12 05:33:48', 'TEST', 2, 1, 0, 1, 1),
(9, '2019-04-12 05:33:48', 'TEST', 2, 1, 0, 1, 1),
(10, '2019-04-12 05:33:48', 'TEST externare', 2, 1, 0, 1, 1),
(11, '2019-04-12 05:33:48', 'TEST externare', 2, 1, 0, 1, 1),
(12, '2019-04-12 05:33:48', 'TEST externare', 2, 1, 0, 1, 1),
(13, '2019-04-12 05:33:48', 'TEST fisa adaugare', 1, 1, 0, 1, 1),
(14, '2019-04-12 05:33:48', 'TEST fisa adaugare', 1, 1, 0, 1, 1),
(15, '2019-04-19 17:31:41', 'Fisa DEP', 3, 1, 0, 2, 1),
(16, '2019-04-19 20:02:50', 'TEST', 2, 201, 0, 2, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `pacienti`
--

CREATE TABLE `pacienti` (
  `id` int(255) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `cnp` varchar(10) NOT NULL,
  `data_nastere` date NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pin` varchar(32) NOT NULL,
  `acord_fisa` tinyint(1) NOT NULL,
  `grupa_sange` varchar(10) NOT NULL,
  `rh` tinyint(1) NOT NULL,
  `donator` tinyint(1) NOT NULL,
  `avertizari` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `pacienti`
--

INSERT INTO `pacienti` (`id`, `nume`, `prenume`, `cnp`, `data_nastere`, `sex`, `telefon`, `email`, `pin`, `acord_fisa`, `grupa_sange`, `rh`, `donator`, `avertizari`) VALUES
(1, 'Bernadene', 'Ingre', '2592224310', '1969-04-29', 1, '626-335-9479', 'bingre0@cyberchimps.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'B2', 0, 0, ''),
(2, 'Loren', 'Coats', '1494146568', '1979-11-01', 2, '494-451-2607', 'lcoats1@microsoft.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'B2', 0, 0, ''),
(3, 'Kylie', 'Tinwell', '2587708789', '1981-12-12', 2, '375-822-5018', 'ktinwell2@statcounter.com', '', 0, 'B2', 0, 0, ''),
(4, 'Romain', 'Skey', '195914058', '1964-12-16', 2, '410-497-9854', 'rskey3@squidoo.com', '', 0, 'B2', 0, 0, ''),
(5, 'Karalynn', 'Gartery', '2746894896', '1958-08-16', 1, '354-321-6986', 'kgartery4@prnewswire.com', '', 0, 'B2', 0, 0, ''),
(6, 'Jeralee', 'Heard', '68070131', '1956-03-22', 1, '347-922-4869', 'jheard5@acquirethisname.com', '', 0, 'B2', 0, 0, ''),
(7, 'Dawna', 'Elmhirst', '1162191663', '1989-06-25', 1, '229-338-1135', 'delmhirst6@ycombinator.com', '', 0, 'B2', 0, 0, ''),
(8, 'Felicle', 'Duly', '1806671377', '1981-09-15', 1, '191-948-8194', 'fduly7@tamu.edu', '', 0, 'B2', 0, 0, ''),
(9, 'Janine', 'Cawcutt', '2860307685', '1988-06-26', 2, '104-638-3664', 'jcawcutt8@macromedia.com', '', 0, 'B2', 0, 0, ''),
(10, 'Hugo', 'Capstack', '182578081', '1984-08-27', 1, '380-216-7550', 'hcapstack9@feedburner.com', '', 0, 'B2', 0, 0, ''),
(11, 'Hunter', 'Filintsev', '515466080', '1983-04-23', 2, '396-906-4402', 'hfilintseva@google.nl', '', 0, 'B2', 0, 0, ''),
(12, 'Nisse', 'Strathdee', '1058426261', '1950-08-05', 2, '651-974-4022', 'nstrathdeeb@telegraph.co.uk', '', 0, 'B2', 0, 0, ''),
(13, 'Kanya', 'Penniell', '1573116781', '1952-01-10', 2, '262-612-5198', 'kpenniellc@columbia.edu', '', 0, 'B2', 0, 0, ''),
(14, 'Giles', 'Brislawn', '999481678', '1977-05-10', 2, '873-189-0523', 'gbrislawnd@mozilla.com', '', 0, 'B2', 0, 0, ''),
(15, 'Washington', 'Cheyenne', '2025402413', '1993-04-05', 2, '872-170-3161', 'wcheyennee@chron.com', '', 0, 'B2', 0, 0, ''),
(16, 'Alvinia', 'Jacobs', '1600136732', '1997-07-19', 2, '568-358-2392', 'ajacobsf@rakuten.co.jp', '', 0, 'B2', 0, 0, ''),
(17, 'Alistair', 'Kerr', '593522460', '1975-05-09', 1, '484-826-4025', 'akerrg@statcounter.com', '', 0, 'B2', 0, 0, ''),
(18, 'Abbie', 'Barszczewski', '252743696', '1964-10-05', 2, '708-596-0273', 'abarszczewskih@cpanel.net', '', 0, 'B2', 0, 0, ''),
(19, 'Pip', 'Isles', '314805219', '1974-11-20', 2, '198-852-0975', 'pislesi@netlog.com', '', 0, 'B2', 0, 0, ''),
(20, 'Matthias', 'Kingcote', '1495995331', '1962-09-01', 1, '899-702-6644', 'mkingcotej@tinyurl.com', '', 0, 'B2', 0, 0, ''),
(21, 'Felecia', 'Caesman', '2803582220', '1950-10-12', 1, '381-537-9330', 'fcaesmank@amazonaws.com', '', 0, 'B2', 0, 0, ''),
(22, 'Sollie', 'Simpson', '2277232746', '1982-03-27', 1, '958-109-1279', 'ssimpsonl@e-recht24.de', '', 0, 'B2', 0, 0, ''),
(23, 'Beryle', 'Inkin', '927564630', '1974-05-30', 1, '198-677-9418', 'binkinm@wp.com', '', 0, 'B2', 0, 0, ''),
(24, 'Staffard', 'Degoey', '2546381979', '1982-03-07', 2, '382-931-1055', 'sdegoeyn@geocities.com', '', 0, 'B2', 0, 0, ''),
(25, 'Delia', 'Esler', '2885366452', '1951-06-29', 2, '433-378-6367', 'deslero@usatoday.com', '', 0, 'B2', 0, 0, ''),
(26, 'Lanny', 'Stockdale', '2640613495', '1984-03-17', 2, '385-989-0709', 'lstockdalep@accuweather.com', '', 0, 'B2', 0, 0, ''),
(27, 'Patrice', 'Douce', '1821609717', '1990-03-27', 1, '258-471-7697', 'pdouceq@jugem.jp', '', 0, 'B2', 0, 0, ''),
(28, 'Vasili', 'Tointon', '1594821667', '1993-06-10', 1, '288-820-0831', 'vtointonr@live.com', '', 0, 'B2', 0, 0, ''),
(29, 'Wendi', 'Lochead', '840772928', '1999-02-22', 1, '476-439-2711', 'wlocheads@blogspot.com', '', 0, 'B2', 0, 0, ''),
(30, 'Murdock', 'Bonwick', '2425055234', '1975-01-11', 1, '771-187-4025', 'mbonwickt@ed.gov', '', 0, 'B2', 0, 0, ''),
(31, 'Birk', 'Kaman', '599184419', '1988-12-17', 2, '367-199-5400', 'bkamanu@ezinearticles.com', '', 0, 'B2', 0, 0, ''),
(32, 'Marylinda', 'Demonge', '2335768340', '1955-09-14', 2, '166-713-7951', 'mdemongev@themeforest.net', '', 0, 'B2', 0, 0, ''),
(33, 'Jane', 'Tezure', '1113810984', '1980-05-18', 2, '622-471-2725', 'jtezurew@zimbio.com', '', 0, 'B2', 0, 0, ''),
(34, 'Carmina', 'Canepe', '1101953999', '1977-07-22', 1, '575-524-4070', 'ccanepex@foxnews.com', '', 0, 'B2', 0, 0, ''),
(35, 'Malena', 'Enrigo', '1822159093', '1985-06-17', 2, '484-651-7093', 'menrigoy@icio.us', '', 0, 'B2', 0, 0, ''),
(36, 'Chauncey', 'Cluitt', '1936268017', '1979-12-04', 2, '262-939-2813', 'ccluittz@hexun.com', '', 0, 'B2', 0, 0, ''),
(37, 'Jerrome', 'Senescall', '486732078', '1986-08-04', 1, '561-892-8274', 'jsenescall10@tripod.com', '', 0, 'B2', 0, 0, ''),
(38, 'Cymbre', 'Rosendale', '425459348', '1952-03-31', 2, '404-606-8828', 'crosendale11@wordpress.org', '', 0, 'B2', 0, 0, ''),
(39, 'Loleta', 'Hinrich', '1168811034', '1994-07-03', 1, '902-570-9851', 'lhinrich12@ifeng.com', '', 0, 'B2', 0, 0, ''),
(40, 'Penn', 'Housego', '1026077187', '1969-02-18', 1, '161-982-4199', 'phousego13@bbc.co.uk', '', 0, 'B2', 0, 0, ''),
(41, 'Viole', 'Ahrend', '163042882', '1962-03-31', 2, '989-663-8307', 'vahrend14@java.com', '', 0, 'B2', 0, 0, ''),
(42, 'Kareem', 'Chesman', '2403017305', '1989-04-11', 2, '269-411-8227', 'kchesman15@toplist.cz', '', 0, 'B2', 0, 0, ''),
(43, 'Bernardine', 'Carden', '2532503506', '1995-09-01', 2, '322-452-3507', 'bcarden16@wikia.com', '', 0, 'B2', 0, 0, ''),
(44, 'Cordelie', 'Grancher', '2851166021', '1991-02-23', 1, '250-462-1022', 'cgrancher17@boston.com', '', 0, 'B2', 0, 0, ''),
(45, 'Obadiah', 'Parzizek', '179095087', '1987-09-14', 1, '857-802-8593', 'oparzizek18@sbwire.com', '', 0, 'B2', 0, 0, ''),
(46, 'Thornton', 'Altamirano', '1995485391', '1965-06-23', 1, '604-961-2949', 'taltamirano19@shinystat.com', '', 0, 'B2', 0, 0, ''),
(47, 'Ronnie', 'Chern', '804261405', '1991-09-25', 1, '913-685-0476', 'rchern1a@forbes.com', '', 0, 'B2', 0, 0, ''),
(48, 'Bronson', 'Vanyukov', '1416096377', '1968-12-22', 2, '589-430-2397', 'bvanyukov1b@adobe.com', '', 0, 'B2', 0, 0, ''),
(49, 'Bibi', 'Worthington', '750597511', '1976-06-15', 1, '413-337-0273', 'bworthington1c@narod.ru', '', 0, 'B2', 0, 0, ''),
(50, 'Ethe', 'Dolman', '298841737', '1979-08-12', 2, '686-643-8872', 'edolman1d@etsy.com', '', 0, 'B2', 0, 0, ''),
(51, 'Klarrisa', 'Comfort', '478136819', '1953-08-28', 1, '297-859-5618', 'kcomfort1e@arstechnica.com', '', 0, 'B2', 0, 0, ''),
(52, 'Concordia', 'Copnar', '15090271', '1975-01-20', 1, '926-280-4054', 'ccopnar1f@smh.com.au', '', 0, 'B2', 0, 0, ''),
(53, 'Brendan', 'Tharme', '2792764143', '1978-08-21', 2, '180-692-4929', 'btharme1g@buzzfeed.com', '', 0, 'B2', 0, 0, ''),
(54, 'Stoddard', 'Levick', '2732146759', '1952-02-22', 1, '688-514-7070', 'slevick1h@usatoday.com', '', 0, 'B2', 0, 0, ''),
(55, 'Sascha', 'Hoffmann', '1729449987', '1972-02-10', 2, '452-509-3370', 'shoffmann1i@yale.edu', '', 0, 'B2', 0, 0, ''),
(56, 'Cate', 'Ferras', '1181803451', '1984-04-01', 1, '959-941-4763', 'cferras1j@ebay.co.uk', '', 0, 'B2', 0, 0, ''),
(57, 'Norris', 'Slewcock', '2006381553', '1989-09-13', 1, '527-970-3371', 'nslewcock1k@constantcontact.com', '', 0, 'B2', 0, 0, ''),
(58, 'Alexei', 'Korejs', '1228039893', '1977-09-26', 2, '710-867-9314', 'akorejs1l@livejournal.com', '', 0, 'B2', 0, 0, ''),
(59, 'Vernon', 'Bentzen', '155172493', '1993-03-24', 1, '698-308-7445', 'vbentzen1m@gizmodo.com', '', 0, 'B2', 0, 0, ''),
(60, 'Leigh', 'Mesnard', '1522274752', '1950-08-27', 1, '350-241-0179', 'lmesnard1n@ucsd.edu', '', 0, 'B2', 0, 0, ''),
(61, 'Hughie', 'Kelk', '665364884', '1966-07-09', 2, '730-446-1009', 'hkelk1o@newsvine.com', '', 0, 'B2', 0, 0, ''),
(62, 'Berkley', 'Aire', '1079482234', '1966-11-13', 2, '292-940-2171', 'baire1p@mapquest.com', '', 0, 'B2', 0, 0, ''),
(63, 'Issi', 'Sickert', '2057595065', '1959-08-04', 1, '124-818-9599', 'isickert1q@baidu.com', '', 0, 'B2', 0, 0, ''),
(64, 'Chickie', 'Heikkinen', '1775388979', '1955-12-31', 1, '492-561-3388', 'cheikkinen1r@infoseek.co.jp', '', 0, 'B2', 0, 0, ''),
(65, 'Marmaduke', 'Prescot', '2965693614', '1999-09-12', 2, '912-955-4585', 'mprescot1s@mapy.cz', '', 0, 'B2', 0, 0, ''),
(66, 'Trumaine', 'Hollows', '2657805149', '1994-10-04', 2, '444-276-7946', 'thollows1t@artisteer.com', '', 0, 'B2', 0, 0, ''),
(67, 'Koo', 'Stood', '987929581', '1986-07-31', 2, '570-270-9307', 'kstood1u@upenn.edu', '', 0, 'B2', 0, 0, ''),
(68, 'Zarah', 'Barnes', '1772230817', '1986-07-14', 1, '624-945-4097', 'zbarnes1v@scientificamerican.com', '', 0, 'B2', 0, 0, ''),
(69, 'Nolly', 'Browncey', '1173086142', '1951-03-06', 2, '449-496-4769', 'nbrowncey1w@senate.gov', '', 0, 'B2', 0, 0, ''),
(70, 'Hilary', 'Daber', '58620791', '1992-10-20', 1, '575-798-8459', 'hdaber1x@biglobe.ne.jp', '', 0, 'B2', 0, 0, ''),
(71, 'Renee', 'Andrews', '1799626442', '1969-02-01', 1, '681-341-4888', 'randrews1y@addtoany.com', '', 0, 'B2', 0, 0, ''),
(72, 'Lockwood', 'Whiles', '141173162', '1996-04-24', 2, '108-816-9863', 'lwhiles1z@ycombinator.com', '', 0, 'B2', 0, 0, ''),
(73, 'Humfrid', 'Bilbey', '1091235819', '1961-10-31', 2, '571-865-4470', 'hbilbey20@360.cn', '', 0, 'B2', 0, 0, ''),
(74, 'Carolann', 'Ringe', '2000464693', '1999-02-09', 2, '133-435-9947', 'cringe21@ft.com', '', 0, 'B2', 0, 0, ''),
(75, 'Verne', 'Bargery', '1735628954', '1982-07-10', 2, '102-791-3775', 'vbargery22@amazon.co.jp', '', 0, 'B2', 0, 0, ''),
(76, 'Pernell', 'Cockerham', '2148624408', '1994-01-16', 2, '774-580-9085', 'pcockerham23@hubpages.com', '', 0, 'B2', 0, 0, ''),
(77, 'Theda', 'Buchan', '121456742', '1997-05-29', 2, '796-464-5510', 'tbuchan24@disqus.com', '', 0, 'B2', 0, 0, ''),
(78, 'Lannie', 'Aldham', '2530311391', '1954-10-23', 1, '596-994-9497', 'laldham25@sina.com.cn', '', 0, 'B2', 0, 0, ''),
(79, 'Free', 'Melanaphy', '113475588', '1980-11-24', 2, '442-209-3378', 'fmelanaphy26@live.com', '', 0, 'B2', 0, 0, ''),
(80, 'Caralie', 'Eivers', '733651827', '1999-10-26', 1, '567-386-7712', 'ceivers27@alibaba.com', '', 0, 'B2', 0, 0, ''),
(81, 'Wenona', 'Summerfield', '569590136', '1975-02-14', 2, '324-458-1268', 'wsummerfield28@hubpages.com', '', 0, 'B2', 0, 0, ''),
(82, 'Mirelle', 'Vayro', '2810446348', '1962-12-30', 2, '554-171-2437', 'mvayro29@google.pl', '', 0, 'B2', 0, 0, ''),
(83, 'Katine', 'Buesnel', '1055186804', '1965-03-30', 1, '341-584-5763', 'kbuesnel2a@mysql.com', '', 0, 'B2', 0, 0, ''),
(84, 'Drud', 'Wharrier', '1461952947', '1961-06-15', 2, '972-779-2362', 'dwharrier2b@disqus.com', '', 0, 'B2', 0, 0, ''),
(85, 'Charyl', 'Jeste', '2718982087', '1967-11-08', 1, '400-452-5124', 'cjeste2c@marriott.com', '', 0, 'B2', 0, 0, ''),
(86, 'Dorolice', 'Hagan', '496015119', '1985-07-05', 1, '808-473-8720', 'dhagan2d@github.io', '', 0, 'B2', 0, 0, ''),
(87, 'Alaine', 'Llewellen', '374749886', '1953-10-23', 1, '915-230-9039', 'allewellen2e@feedburner.com', '', 0, 'B2', 0, 0, ''),
(88, 'Jessi', 'Longworth', '1683908319', '1986-11-19', 1, '133-942-5615', 'jlongworth2f@usda.gov', '', 0, 'B2', 0, 0, ''),
(89, 'Mariam', 'Brevetor', '2073138450', '1995-01-31', 2, '919-146-3480', 'mbrevetor2g@nationalgeographic.com', '', 0, 'B2', 0, 0, ''),
(90, 'Stormy', 'Yegorchenkov', '2933602210', '1954-11-21', 2, '134-933-5886', 'syegorchenkov2h@phpbb.com', '', 0, 'B2', 0, 0, ''),
(91, 'Aindrea', 'Pullinger', '1693959701', '1983-03-09', 1, '425-574-3661', 'apullinger2i@friendfeed.com', '', 0, 'B2', 0, 0, ''),
(92, 'Alma', 'Wyley', '248425389', '1959-06-26', 1, '575-207-8124', 'awyley2j@vinaora.com', '', 0, 'B2', 0, 0, ''),
(93, 'Joice', 'Baudone', '1227186596', '1955-09-28', 1, '598-532-1725', 'jbaudone2k@jimdo.com', '', 0, 'B2', 0, 0, ''),
(94, 'Vally', 'Lamdin', '2030846986', '1955-09-24', 2, '755-284-6996', 'vlamdin2l@netlog.com', '', 0, 'B2', 0, 0, ''),
(96, 'Garrard', 'Boutwell', '680632740', '1993-10-20', 2, '371-661-4343', 'gboutwell2n@earthlink.net', '', 0, 'B2', 0, 0, ''),
(97, 'Amie', 'Costanza', '2371940933', '1996-02-03', 1, '754-799-9855', 'acostanza2o@vinaora.com', '', 0, 'B2', 0, 0, ''),
(98, 'Shelley', 'Foldes', '1742750582', '1975-04-21', 1, '290-693-6859', 'sfoldes2p@biglobe.ne.jp', '', 0, 'B2', 0, 0, ''),
(99, 'Filide', 'Avrahamy', '1204833085', '1966-09-14', 1, '798-906-1555', 'favrahamy2q@istockphoto.com', '', 0, 'B2', 0, 0, ''),
(100, 'Sherman', 'Cheek', '2316943703', '1963-07-21', 2, '703-612-4378', 'scheek2r@xrea.com', '', 0, 'B2', 0, 0, ''),
(101, 'Bernelle', 'O\' Connell', '1176924551', '1984-11-29', 1, '364-171-4886', 'boconnell2s@addtoany.com', '', 0, 'B2', 0, 0, ''),
(102, 'Garry', 'Saye', '2840055810', '1996-08-21', 1, '969-872-1460', 'gsaye2t@creativecommons.org', '', 0, 'B2', 0, 0, ''),
(103, 'Kalvin', 'Kirsche', '1823749936', '1964-07-08', 2, '923-829-7435', 'kkirsche2u@wikimedia.org', '', 0, 'B2', 0, 0, ''),
(104, 'Mirella', 'Plaunch', '1881791415', '1987-03-02', 2, '220-907-2878', 'mplaunch2v@feedburner.com', '', 0, 'B2', 0, 0, ''),
(105, 'Fernande', 'Chesson', '409167947', '1954-04-10', 1, '235-600-2225', 'fchesson2w@hc360.com', '', 0, 'B2', 0, 0, ''),
(106, 'Quill', 'Magenny', '2717318989', '1962-02-18', 2, '376-637-2716', 'qmagenny2x@tripadvisor.com', '', 0, 'B2', 0, 0, ''),
(107, 'Emlyn', 'Jachtym', '1337122276', '1954-06-09', 1, '892-834-4015', 'ejachtym2y@abc.net.au', '', 0, 'B2', 0, 0, ''),
(108, 'Brew', 'Guisby', '156703008', '1996-07-25', 1, '352-502-5127', 'bguisby2z@wufoo.com', '', 0, 'B2', 0, 0, ''),
(109, 'Allegra', 'Fri', '497861692', '1969-04-12', 1, '782-878-2877', 'afri30@google.de', '', 0, 'B2', 0, 0, ''),
(110, 'Rog', 'Shills', '312986827', '1984-12-23', 1, '941-197-9392', 'rshills31@sitemeter.com', '', 0, 'B2', 0, 0, ''),
(111, 'Ian', 'Ilchuk', '2241899221', '1999-07-11', 1, '317-291-1642', 'iilchuk32@dell.com', '', 0, 'B2', 0, 0, ''),
(112, 'Fanchon', 'Sey', '2155978687', '1985-03-09', 1, '685-131-6772', 'fsey33@constantcontact.com', '', 0, 'B2', 0, 0, ''),
(113, 'Tawnya', 'Labusquiere', '673267866', '1969-12-06', 1, '939-393-5948', 'tlabusquiere34@usda.gov', '', 0, 'B2', 0, 0, ''),
(114, 'Dewain', 'Jantel', '1093119396', '1967-01-11', 2, '127-791-7287', 'djantel35@google.it', '', 0, 'B2', 0, 0, ''),
(115, 'Nilson', 'Regglar', '2568576128', '1976-08-06', 1, '363-736-6342', 'nregglar36@ted.com', '', 0, 'B2', 0, 0, ''),
(116, 'Meredithe', 'Lowres', '240015199', '1959-03-01', 2, '453-532-2974', 'mlowres37@google.pl', '', 0, 'B2', 0, 0, ''),
(117, 'Jonie', 'Drakers', '594422336', '1960-05-21', 1, '475-339-1068', 'jdrakers38@feedburner.com', '', 0, 'B2', 0, 0, ''),
(118, 'Mora', 'Rehme', '1477349431', '1987-06-18', 1, '894-356-1943', 'mrehme39@seattletimes.com', '', 0, 'B2', 0, 0, ''),
(119, 'Una', 'Verlinden', '1111044010', '1976-11-21', 2, '155-994-5113', 'uverlinden3a@miitbeian.gov.cn', '', 0, 'B2', 0, 0, ''),
(120, 'Nat', 'McPake', '2789869396', '1954-03-07', 2, '172-722-9572', 'nmcpake3b@globo.com', '', 0, 'B2', 0, 0, ''),
(121, 'Kerwinn', 'Weatherhead', '966006201', '1989-10-25', 2, '808-827-9145', 'kweatherhead3c@4shared.com', '', 0, 'B2', 0, 0, ''),
(122, 'Nichol', 'Lempke', '178444251', '1958-06-25', 2, '343-678-1528', 'nlempke3d@yahoo.com', '', 0, 'B2', 0, 0, ''),
(123, 'Curran', 'Kurt', '964768555', '1971-09-06', 1, '791-596-8943', 'ckurt3e@ow.ly', '', 0, 'B2', 0, 0, ''),
(124, 'Enrique', 'Teenan', '190720789', '1980-05-22', 1, '290-152-4033', 'eteenan3f@arstechnica.com', '', 0, 'B2', 0, 0, ''),
(125, 'Cassy', 'Hedman', '298828551', '1966-09-30', 1, '144-954-6973', 'chedman3g@google.cn', '', 0, 'B2', 0, 0, ''),
(126, 'Mufi', 'Francesch', '513370548', '1955-01-05', 2, '987-228-0073', 'mfrancesch3h@wired.com', '', 0, 'B2', 0, 0, ''),
(127, 'Mab', 'Reeders', '1846751730', '1975-04-23', 2, '994-837-4253', 'mreeders3i@wisc.edu', '', 0, 'B2', 0, 0, ''),
(128, 'Tristan', 'Gyngell', '72983875', '1962-08-05', 2, '440-332-7249', 'tgyngell3j@storify.com', '', 0, 'B2', 0, 0, ''),
(129, 'Frieda', 'Vallery', '1866456099', '1968-02-20', 1, '631-588-4685', 'fvallery3k@tamu.edu', '', 0, 'B2', 0, 0, ''),
(130, 'Ardyth', 'Lavielle', '2675573546', '1986-07-31', 2, '138-704-5620', 'alavielle3l@comcast.net', '', 0, 'B2', 0, 0, ''),
(131, 'Shelagh', 'Gerram', '1013320304', '1961-11-14', 2, '757-818-0235', 'sgerram3m@51.la', '', 0, 'B2', 0, 0, ''),
(132, 'Cindelyn', 'Davidovic', '225129773', '1971-06-30', 1, '546-280-0557', 'cdavidovic3n@nih.gov', '', 0, 'B2', 0, 0, ''),
(133, 'Balduin', 'Heitz', '363445218', '1987-02-07', 2, '637-236-4343', 'bheitz3o@ca.gov', '', 0, 'B2', 0, 0, ''),
(134, 'Antonia', 'Layborn', '797646798', '1991-08-09', 1, '939-169-8851', 'alayborn3p@yolasite.com', '', 0, 'B2', 0, 0, ''),
(135, 'Kristel', 'Taaffe', '2256059851', '1968-06-27', 1, '140-716-6883', 'ktaaffe3q@e-recht24.de', '', 0, 'B2', 0, 0, ''),
(136, 'Alain', 'Odegaard', '2079332285', '1968-01-06', 1, '868-822-6437', 'aodegaard3r@google.ru', '', 0, 'B2', 0, 0, ''),
(137, 'Modestine', 'Pinkard', '2910426036', '1989-12-16', 1, '912-625-1439', 'mpinkard3s@xinhuanet.com', '', 0, 'B2', 0, 0, ''),
(138, 'Miguelita', 'Seager', '1793466175', '1980-03-16', 1, '239-827-5390', 'mseager3t@geocities.com', '', 0, 'B2', 0, 0, ''),
(139, 'Georgie', 'Armfield', '1811370568', '1981-01-31', 1, '788-645-7531', 'garmfield3u@xing.com', '', 0, 'B2', 0, 0, ''),
(140, 'Jerrilyn', 'Gummer', '1132253501', '1971-12-12', 2, '614-235-9546', 'jgummer3v@xrea.com', '', 0, 'B2', 0, 0, ''),
(141, 'Shela', 'Whiscard', '2377041266', '1984-05-01', 2, '644-486-0200', 'swhiscard3w@telegraph.co.uk', '', 0, 'B2', 0, 0, ''),
(142, 'Dori', 'Priest', '616588468', '1960-10-25', 1, '885-409-0145', 'dpriest3x@last.fm', '', 0, 'B2', 0, 0, ''),
(143, 'Reider', 'Prator', '810716534', '1963-09-01', 2, '206-471-9729', 'rprator3y@joomla.org', '', 0, 'B2', 0, 0, ''),
(144, 'Tonnie', 'Orum', '2909151455', '1962-09-04', 1, '400-746-1718', 'torum3z@dropbox.com', '', 0, 'B2', 0, 0, ''),
(145, 'Augustus', 'Stirman', '1101183618', '1978-11-26', 1, '606-956-3931', 'astirman40@imageshack.us', '', 0, 'B2', 0, 0, ''),
(146, 'Jefferey', 'Van De Cappelle', '677512665', '1986-01-07', 1, '118-710-9592', 'jvandecappelle41@irs.gov', '', 0, 'B2', 0, 0, ''),
(147, 'Reggi', 'Maldin', '1350709220', '1963-08-20', 2, '372-510-9018', 'rmaldin42@theglobeandmail.com', '', 0, 'B2', 0, 0, ''),
(148, 'Marcile', 'Clute', '2755962161', '1957-12-23', 2, '255-709-8457', 'mclute43@pbs.org', '', 0, 'B2', 0, 0, ''),
(149, 'Austine', 'Skerm', '397685734', '1988-10-21', 2, '220-258-1609', 'askerm44@discovery.com', '', 0, 'B2', 0, 0, ''),
(150, 'Archibald', 'Brittlebank', '454539324', '1956-10-05', 1, '513-323-9545', 'abrittlebank45@jalbum.net', '', 0, 'B2', 0, 0, ''),
(151, 'Hazel', 'Dood', '1757012855', '1959-07-20', 2, '766-210-0798', 'hdood46@fema.gov', '', 0, 'B2', 0, 0, ''),
(152, 'Abbie', 'Bunney', '1589409611', '1955-02-21', 1, '431-529-4657', 'abunney47@squidoo.com', '', 0, 'B2', 0, 0, ''),
(153, 'Helaine', 'Leyninye', '2112961503', '1959-08-10', 1, '154-601-9218', 'hleyninye48@businessinsider.com', '', 0, 'B2', 0, 0, ''),
(154, 'Harrie', 'Betteriss', '1518326864', '1985-11-15', 1, '243-978-0584', 'hbetteriss49@icio.us', '', 0, 'B2', 0, 0, ''),
(155, 'Ninon', 'Cobby', '2498386030', '1985-09-21', 2, '414-772-9565', 'ncobby4a@amazon.com', '', 0, 'B2', 0, 0, ''),
(156, 'Brendis', 'Charlwood', '2889709148', '1990-02-08', 1, '306-994-9511', 'bcharlwood4b@newsvine.com', '', 0, 'B2', 0, 0, ''),
(157, 'Ky', 'Innocent', '1063116982', '1963-09-27', 2, '953-497-3108', 'kinnocent4c@devhub.com', '', 0, 'B2', 0, 0, ''),
(158, 'Claudell', 'Adamik', '1758825296', '1970-11-23', 1, '990-754-8763', 'cadamik4d@vistaprint.com', '', 0, 'B2', 0, 0, ''),
(159, 'Elvin', 'Scarf', '2938368515', '1982-03-18', 1, '801-755-1082', 'escarf4e@nih.gov', '', 0, 'B2', 0, 0, ''),
(160, 'Marcelo', 'Langhorn', '1349607491', '1967-08-09', 2, '841-289-0666', 'mlanghorn4f@samsung.com', '', 0, 'B2', 0, 0, ''),
(161, 'Shannon', 'Clemson', '1756035784', '1981-11-10', 1, '552-797-5665', 'sclemson4g@creativecommons.org', '', 0, 'B2', 0, 0, ''),
(162, 'Ann', 'Cristea', '2203148799', '1985-02-02', 1, '324-699-3166', 'acristea4h@macromedia.com', '', 0, 'B2', 0, 0, ''),
(163, 'Burke', 'Scoble', '219627447', '1999-04-06', 1, '931-685-8474', 'bscoble4i@google.co.uk', '', 0, 'B2', 0, 0, ''),
(164, 'Svend', 'Petchell', '316045375', '1983-04-06', 1, '529-263-2856', 'spetchell4j@istockphoto.com', '', 0, 'B2', 0, 0, ''),
(165, 'Michelle', 'Hinkley', '194454677', '1951-03-06', 1, '834-414-7343', 'mhinkley4k@businesswire.com', '', 0, 'B2', 0, 0, ''),
(166, 'Paxon', 'Murra', '48911185', '1964-08-19', 2, '188-973-5041', 'pmurra4l@123-reg.co.uk', '', 0, 'B2', 0, 0, ''),
(167, 'Genni', 'Skokoe', '815889985', '1987-05-06', 2, '422-791-5234', 'gskokoe4m@furl.net', '', 0, 'B2', 0, 0, ''),
(168, 'Addie', 'Gianotti', '2856040389', '1951-10-03', 1, '528-828-4004', 'agianotti4n@bandcamp.com', '', 0, 'B2', 0, 0, ''),
(169, 'Eveleen', 'Antonomoli', '445923305', '1983-04-23', 1, '871-159-5189', 'eantonomoli4o@delicious.com', '', 0, 'B2', 0, 0, ''),
(170, 'Elyssa', 'Brocket', '2862420722', '1977-03-21', 2, '633-313-8373', 'ebrocket4p@cpanel.net', '', 0, 'B2', 0, 0, ''),
(171, 'Quinton', 'Coggles', '660805025', '1963-05-13', 1, '693-228-2119', 'qcoggles4q@java.com', '', 0, 'B2', 0, 0, ''),
(172, 'Waring', 'Squelch', '2178398578', '1956-06-28', 1, '999-663-0890', 'wsquelch4r@rambler.ru', '', 0, 'B2', 0, 0, ''),
(173, 'Albertina', 'Orrett', '1459888894', '1987-01-20', 1, '861-339-1667', 'aorrett4s@deliciousdays.com', '', 0, 'B2', 0, 0, ''),
(174, 'Graham', 'Sayce', '1813835040', '1978-05-26', 2, '131-744-9012', 'gsayce4t@123-reg.co.uk', '', 0, 'B2', 0, 0, ''),
(175, 'Stacy', 'Hedan', '1837640630', '1956-07-01', 1, '606-424-1481', 'shedan4u@furl.net', '', 0, 'B2', 0, 0, ''),
(176, 'Othilie', 'Quipp', '2080199060', '1965-01-16', 1, '474-746-5709', 'oquipp4v@msu.edu', '', 0, 'B2', 0, 0, ''),
(177, 'Moritz', 'Franchioni', '1575495576', '1988-08-25', 2, '927-991-4318', 'mfranchioni4w@skype.com', '', 0, 'B2', 0, 0, ''),
(178, 'Vance', 'Spinetti', '1002644179', '1957-01-04', 2, '953-167-8874', 'vspinetti4x@jiathis.com', '', 0, 'B2', 0, 0, ''),
(179, 'Janifer', 'Bilbie', '2951271535', '1980-10-15', 2, '985-662-5080', 'jbilbie4y@archive.org', '', 0, 'B2', 0, 0, ''),
(180, 'Blake', 'Branton', '2051807509', '1974-08-05', 1, '158-457-8914', 'bbranton4z@mozilla.org', '', 0, 'B2', 0, 0, ''),
(181, 'Druci', 'Ottey', '2147784395', '1953-10-23', 1, '411-729-5811', 'dottey50@latimes.com', '', 0, 'B2', 0, 0, ''),
(182, 'Cello', 'McKeurtan', '1353152130', '1975-10-24', 1, '995-980-7691', 'cmckeurtan51@sciencedirect.com', '', 0, 'B2', 0, 0, ''),
(183, 'Felice', 'Nurny', '1795036216', '1953-10-01', 1, '612-479-1028', 'fnurny52@surveymonkey.com', '', 0, 'B2', 0, 0, ''),
(184, 'Darelle', 'Bratchell', '656156312', '1978-10-23', 2, '390-107-9586', 'dbratchell53@usatoday.com', '', 0, 'B2', 0, 0, ''),
(185, 'Monty', 'Wissbey', '2673915651', '1971-12-28', 1, '469-777-8219', 'mwissbey54@senate.gov', '', 0, 'B2', 0, 0, ''),
(186, 'Aviva', 'Pagett', '2393292610', '1963-09-04', 1, '496-487-5584', 'apagett55@zdnet.com', '', 0, 'B2', 0, 0, ''),
(187, 'Sammy', 'Neggrini', '2190892683', '1980-12-09', 2, '454-643-8753', 'sneggrini56@sun.com', '', 0, 'B2', 0, 0, ''),
(188, 'Sonny', 'Fawdry', '1661192655', '1994-08-23', 2, '688-977-0784', 'sfawdry57@prnewswire.com', '', 0, 'B2', 0, 0, ''),
(189, 'Thorin', 'Stiggles', '276388352', '1995-07-26', 2, '761-650-0983', 'tstiggles58@ustream.tv', '', 0, 'B2', 0, 0, ''),
(190, 'Timothy', 'Posner', '262890457', '1961-07-04', 1, '830-611-6654', 'tposner59@ameblo.jp', '', 0, 'B2', 0, 0, ''),
(191, 'Stefan', 'Keepin', '1576084687', '1963-05-10', 2, '843-745-7553', 'skeepin5a@fema.gov', '', 0, 'B2', 0, 0, ''),
(192, 'Obie', 'Jaukovic', '2713824382', '1976-01-20', 1, '330-426-7799', 'ojaukovic5b@ebay.com', '', 0, 'B2', 0, 0, ''),
(193, 'Catina', 'Bernot', '1894790820', '1998-05-28', 1, '333-611-2748', 'cbernot5c@salon.com', '', 0, 'B2', 0, 0, ''),
(194, 'Elroy', 'Urien', '1640803767', '1978-06-15', 2, '216-504-7114', 'eurien5d@rediff.com', '', 0, 'B2', 0, 0, ''),
(195, 'Lewiss', 'Inglish', '1305410026', '1956-06-13', 2, '300-561-9496', 'linglish5e@state.tx.us', '', 0, 'B2', 0, 0, ''),
(196, 'Gunner', 'Goodge', '846653691', '1991-11-19', 1, '606-777-4611', 'ggoodge5f@msn.com', '', 0, 'B2', 0, 0, ''),
(197, 'Junette', 'Oxnam', '2925795945', '1968-02-24', 2, '642-614-7238', 'joxnam5g@squidoo.com', '', 0, 'B2', 0, 0, ''),
(198, 'Therine', 'Lotte', '778820625', '1950-09-13', 1, '732-447-2617', 'tlotte5h@flavors.me', '', 0, 'B2', 0, 0, ''),
(199, 'Raye', 'Hogben', '1966831815', '1998-02-10', 1, '180-219-5538', 'rhogben5i@amazon.de', '', 0, 'B2', 0, 0, ''),
(200, 'Filmer', 'Blackleech', '2805432756', '1994-02-14', 2, '469-268-8426', 'fblackleech5j@home.pl', '', 0, 'B2', 0, 0, ''),
(201, 'Popescu', 'Ionel', '1234567890', '2019-04-10', 1, '0234323', 'stefan.nedelcu@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 1, 'A1', 1, 0, '');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `spitale`
--

CREATE TABLE `spitale` (
  `id` int(11) NOT NULL,
  `nume` varchar(255) DEFAULT NULL,
  `oras` varchar(255) DEFAULT NULL,
  `telefon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `spitale`
--

INSERT INTO `spitale` (`id`, `nume`, `oras`, `telefon`) VALUES
(1, 'Spitalul Judetean Constanta', 'Constanta', '0722332333'),
(2, 'Institutul National de Boli Prof. Matei Bals', 'Bucuresti', '0722332333'),
(3, 'Spitalul Universitar de Urgență București', 'Bucuresti', '021 318 0523'),
(4, 'Spitalul Clinic Județean de Urgență Cluj-Napoca', 'Cluj-Napoca', '0264 597 852'),
(5, 'Spitalul Clinic Judeţean de Urgenţă Sibiu', 'Sibiu', '0269 215 050'),
(6, 'Spitalul Clinic Județean de Urgență Brasov', 'Brasov', '0268 320 022'),
(99, 'Casa Nationala de Asigurari de Sanatate', 'Bucuresti', '0722222222');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tratamente`
--

CREATE TABLE `tratamente` (
  `id` int(255) NOT NULL,
  `cod` varchar(255) NOT NULL,
  `denumire` varchar(255) NOT NULL,
  `data_adaugare` datetime NOT NULL DEFAULT current_timestamp(),
  `id_fisa` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `tratamente`
--

INSERT INTO `tratamente` (`id`, `cod`, `denumire`, `data_adaugare`, `id_fisa`) VALUES
(6, '1111', 'test tratament', '2019-04-12 05:33:48', 12),
(7, '2222', 'test tratament2', '2019-04-12 05:33:48', 12),
(8, 't1', 'tratament1', '2019-04-12 05:33:48', 13),
(9, 't2', 'tratament2', '2019-04-12 05:33:48', 13),
(10, 't1', 'tratament1', '2019-04-12 05:33:48', 14),
(11, 't2', 'tratament2', '2019-04-12 05:33:48', 14),
(12, '123', '2123', '2019-04-19 17:31:41', 15),
(13, '', '', '2019-04-19 17:31:41', 15),
(14, '', '', '2019-04-19 17:31:41', 15),
(15, '122', '2132', '2019-04-19 20:02:50', 16);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `utilizatori`
--

CREATE TABLE `utilizatori` (
  `id` int(255) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `rol` int(3) NOT NULL,
  `specializare` varchar(100) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `parola` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_spital` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `utilizatori`
--

INSERT INTO `utilizatori` (`id`, `nume`, `prenume`, `rol`, `specializare`, `telefon`, `parola`, `email`, `id_spital`) VALUES
(1, 'Bizoi', 'Cristina', 2, '', '232', '68eacb97d86f0c4621fa2b0e17cabd8c', 'bizoi.cristina95@gmail.com', 2),
(2, 'Ionescu', 'Vasile', 2, 'Pediatrie', '0723524257', '68eacb97d86f0c4621fa2b0e17cabd8c', 'ioescu@gmail.ro', 1),
(3, 'demo', 'demo', 2, 'Genral', '072323827', '68eacb97d86f0c4621fa2b0e17cabd8c', 'demo@cristinabizoi.ro', 2);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `diagnostice`
--
ALTER TABLE `diagnostice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key` (`id_fisa`);

--
-- Indexuri pentru tabele `fise_medicale`
--
ALTER TABLE `fise_medicale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilizator` (`id_utilizator`),
  ADD KEY `id_utilizator_2` (`id_utilizator`);

--
-- Indexuri pentru tabele `pacienti`
--
ALTER TABLE `pacienti`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `spitale`
--
ALTER TABLE `spitale`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `tratamente`
--
ALTER TABLE `tratamente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key_tratamente` (`id_fisa`);

--
-- Indexuri pentru tabele `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `diagnostice`
--
ALTER TABLE `diagnostice`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pentru tabele `fise_medicale`
--
ALTER TABLE `fise_medicale`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pentru tabele `pacienti`
--
ALTER TABLE `pacienti`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT pentru tabele `spitale`
--
ALTER TABLE `spitale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT pentru tabele `tratamente`
--
ALTER TABLE `tratamente`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pentru tabele `utilizatori`
--
ALTER TABLE `utilizatori`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `diagnostice`
--
ALTER TABLE `diagnostice`
  ADD CONSTRAINT `foreign_key` FOREIGN KEY (`id_fisa`) REFERENCES `fise_medicale` (`id`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `fise_medicale`
--
ALTER TABLE `fise_medicale`
  ADD CONSTRAINT `medic` FOREIGN KEY (`id_utilizator`) REFERENCES `utilizatori` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `tratamente`
--
ALTER TABLE `tratamente`
  ADD CONSTRAINT `foreign_key_tratamente` FOREIGN KEY (`id_fisa`) REFERENCES `fise_medicale` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
