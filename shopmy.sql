-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 09 2023 г., 15:36
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shopmy`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `name` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `name`, `surname`, `email`, `password`) VALUES
(1, 'sdasad', 'sss', 'sss', 'sss'),
(2, 'Karen', 'assa', 'ss', 'sssss'),
(3, 'Karen', 'assa', 'ssaaaaa', 'sssss'),
(4, 'Karen', 'aaa', 'aaa', 'aaa'),
(5, 'Karen', 'aaa', 'aaaaa', 'aaa'),
(6, 'Karen', 'qqq', 'qqq', 'qqq'),
(7, 'Karen', 'ccc', 'ccc', 'cc'),
(8, 'Karen', 'zzz', 'zzz', 'zzz'),
(9, 'Karen', 'aa', 'aa', 'aa'),
(10, 'Karen', 'aaa', 'aaas', 'aa'),
(11, 'Karen', 'Yeghiazaryan', 'karen.eghazaryan.02@mail.ru', 'qqq'),
(12, 'Karen', 'y', '777', 'yyy');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `catImage` longblob NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `catImage`, `status`) VALUES
(64, 'sdadasd', 0x32322d332d3430342d4d6178696d696c69616e2e6a7067, 'inactive'),
(65, 'adsaddsaads', 0x696d616765732e6a7067, 'inactive'),
(66, 'asddsadsa', 0x696d61676573202831292e6a7067, 'inactive'),
(67, 'asddsdsa', 0x677265656e2e6a7067, 'inactive'),
(68, 'sdadsasda', 0x677265656e2e6a7067, 'inactive'),
(69, 'sadsadsdaad', 0x7265642e6a7067, 'inactive'),
(70, 'fggdg', 0x79656c6c6f772e6a7067, 'inactive'),
(71, 'sddffsd', 0x626c75652e6a7067, 'inactive'),
(72, 'DASDSDA', 0x696d61676573202831292e6a7067, 'inactive'),
(73, 'Արագ Սնունդ', 0x66617374666f6f642d353030783333332e6a7067, 'Active'),
(74, 'Արագ Սնունդ', 0x66617374666f6f642d353030783333332e6a7067, 'inactive'),
(75, 'Մանղալ', 0x414e445f3839356161362d312d353030783333332e6a7067, 'Active'),
(76, 'Փուռ', 0x7061726b696e672d332d312d353030783333332e6a7067, 'Active'),
(77, 'Լանչ', 0x61612d312d353030783333332e6a7067, 'Active'),
(78, 'Աղցան', 0x666c61742d6c61792d636f6d706f736974696f6e2d6865616c7468792d766567657461626c65735f32332d323134383139303139362d353030783333332e6a7067, 'Active'),
(79, 'Ըմպելիք', 0x796d70656c69712d353030783333332e6a7067, 'Active'),
(80, 'Ալկոհոլ', 0x616c6b6f686f6c2d353030783333332e706e67, 'Active'),
(81, 'Գարեջուր', 0x626565722d353030783333332e6a7067, 'Active');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `prodId` int(11) NOT NULL,
  `catId` int(25) NOT NULL,
  `prodName` varchar(255) NOT NULL,
  `prodPrice` varchar(255) NOT NULL,
  `prodDesc` varchar(255) NOT NULL,
  `prodImage` longblob NOT NULL,
  `eShow` varchar(20) NOT NULL,
  `estatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`prodId`, `catId`, `prodName`, `prodPrice`, `prodDesc`, `prodImage`, `eShow`, `estatus`) VALUES
(20, 58, 'ssaaavok', 'ssalvi', 'ssibir', 0x313638383238343432305f696d61676573202831292e6a7067, 'show', 'inActive'),
(30, 58, 'dd', 'dd', 'dd', 0x7265642e6a7067, 'show', 'inActive'),
(31, 58, '444', '444', '444', 0x313638383238373135355f696d616765732e6a7067, 'show', 'Active'),
(32, 58, 'qqq', 'qqq', 'qqq', 0x79656c6c6f772e6a7067, 'dontshow', 'Active'),
(33, 58, 'dsaasd', 'adssadd', 'sdadsadsa', 0x79656c6c6f772e6a7067, 'show', 'Active'),
(34, 58, 'wedssd', 'dffds', 'dffds', 0x32322d332d3430342d4d6178696d696c69616e2e6a7067, 'show', 'Active'),
(35, 58, 'asdds', 'sadsd', 'sdsda', 0x696d61676573202831292e6a7067, 'show', 'Active'),
(36, 58, 'asa', 'sasa', 'saas', 0x696d616765732e6a7067, 'show', 'Active'),
(37, 58, 'asdsda', 'sadsad', 'sadsad', 0x696d61676573202831292e6a7067, 'show', 'Active'),
(38, 58, 'sadsad', 'sadsad', 'sadsad', 0x696d616765732e6a7067, 'show', 'Active'),
(39, 58, 'asdasd', 'asdsad', 'sdaasd', 0x696d61676573202831292e6a7067, 'show', 'Active'),
(40, 64, 'sddsa', 'asddas', 'dsadsa', 0x6d616e2e6a7067, 'show', 'Active'),
(41, 64, 'asdasd', 'asdsad', 'sdasad', 0x32322d332d3430342d4d6178696d696c69616e2e6a7067, 'show', 'Active'),
(42, 65, 'sddsa', 'saddsa', 'sdadsa', 0x313638383336373330305f696d61676573202831292e6a7067, 'show', 'inActive'),
(43, 65, 'dads', 'fdsdfs', 'fdsfds', 0x313638383336373830305f6d616e2e6a7067, 'show', 'inActive'),
(44, 65, 'asdsa', 'sadsda', 'dsasda', 0x696d61676573202831292e6a7067, 'dontshow', 'inActive'),
(45, 65, 'asdsad', 'sadsda', 'sadsda', 0x677265656e2e6a7067, 'show', 'Active'),
(46, 65, 'sadad', 'sadsda', 'sdadsa', 0x79656c6c6f772e6a7067, 'show', 'Active'),
(47, 73, 'Շաուրմա լավաշով', '950', '', 0x414e445f383336302d353030783333332e6a7067, 'show', 'Active'),
(48, 73, 'Շաուրմա լավաշով մեծ', '1300', '', 0x414e445f383336302d35303078333333202831292e6a7067, 'show', 'Active'),
(49, 73, 'Շաուրմա հացով', '950', '', 0x414e445f393037392d312d353030783333332e6a7067, 'show', 'Active'),
(50, 73, 'Շաուրմա հացով մեծ', '1300', '', 0x414e445f393038342d312d353030783334322e6a7067, 'show', 'Active'),
(51, 73, 'Բուրգեր', '850', '', 0x6275726765722d353030783333332e6a7067, 'show', 'Active'),
(52, 73, 'Լանգետ', '850', '', 0x313638383831303636395f6c616e6765742d312d353030783333332e6a7067, 'show', 'Active'),
(53, 73, 'Հոթ-դոգ', '350', '', 0x414e445f383531382d353030783333332e6a7067, 'show', 'Active'),
(54, 73, 'Հոթ-դոգ դաբլ', '550', '', 0x414e445f383535322d373030783436362e6a7067, 'show', 'Active'),
(55, 73, 'Հոթ-դոգ լավաշով', '350', '', 0x414e445f393231332d353030783333332e6a7067, 'show', 'Active'),
(56, 73, 'Հոթ-դոգ լավաշով դաբլ', '550', '', 0x414e445f393232372e6a7067, 'show', 'Active'),
(57, 73, 'Գրիլ', '3000', '', 0x414e445f383933312d353030783333332e6a7067, 'show', 'Active'),
(58, 73, 'Ֆրի', '400', '', 0x414e445f383434362d353030783333332e6a7067, 'show', 'Active'),
(59, 75, 'Պլեճ', '350', '', 0x414e445f383936352d353030783333332e6a7067, 'show', 'Active'),
(60, 75, 'Խորոված բանջարեղեն', '950', '', 0x766567657461626c65732d353030783333332e6a7067, 'show', 'Active'),
(61, 75, 'Խորոված խոզի չալաղաջ', '3200', '', 0x414e445f383838352d353030783333332e6a7067, 'show', 'Active'),
(62, 75, 'Խորոված խոզի մատեր', '2100', '', 0x414e445f383930312d353030783333332e6a7067, 'show', 'Active'),
(63, 75, 'Խորոված խոզի փափուկ', '1800', '', 0x414e445f383839332d353030783333332e6a7067, 'show', 'Active'),
(64, 75, 'Խորոված հավ', '3500', '', 0x414e445f383932322d312d353030783333332e6a7067, 'show', 'Active'),
(65, 75, 'Խորոված բուդ', '900', '', 0x414e445f383735332d353030783333332e6a7067, 'show', 'Active'),
(66, 75, 'Խորոված հավի թևեր', '900', '', 0x414e445f383737322d353030783333332e6a7067, 'show', 'Active'),
(67, 75, 'Տավարի քաբաբ', '900', '', 0x414e445f383538382d353030783333332e6a7067, 'show', 'Active'),
(68, 75, 'Հավի քաբաբ', '800', '', 0x414e445f383537362d353030783333332e6a7067, 'show', 'Active'),
(69, 75, 'Հավի իքիբիր', '1000', '', 0x494d475f333039352d353030783337352e6a7067, 'show', 'Active'),
(70, 75, 'Խոզի իքիբիր', '1100', '', 0x494d475f333130322d353030783337352e6a7067, 'show', 'Active'),
(71, 75, 'Խորոված սունկ', '800', '', 0x414e445f383738382d353030783333332e6a7067, 'show', 'Active'),
(72, 75, 'Խորոված տավարի թոք', '1000', '', 0x494d475f333038332d353030783337352e6a7067, 'show', 'Active'),
(73, 75, 'Խորոված տավարի սիրտ', '900', '', 0x494d475f333039302d353030783337352e6a7067, 'show', 'Active'),
(74, 75, 'Փարդա', '1100', '', 0x494d475f333037392d353030783337352e6a7067, 'show', 'Active'),
(75, 76, 'Լահմաջո', '250', '', 0x414e445f383439392d353030783333332e6a7067, 'show', 'Active'),
(76, 76, 'Լահմաջո մեծ', '450', '', 0x414e445f383937332d353030783333372e6a7067, 'show', 'Active'),
(77, 76, 'Լահմաջո պանրով', '800', '', 0x414e445f383933382d353030783333332e6a7067, 'show', 'Active'),
(78, 76, 'Աջարական 1 ձվով', '750', '', 0x414e445f383432342d353030783333332e6a7067, 'show', 'Active'),
(79, 76, 'Աջարական 2 ձվով', '950', '', 0x414e445f383435392d353030783333332e6a7067, 'show', 'Active'),
(80, 76, 'Իմերիթական', '1500', '', 0x696d65726974616b616e2d332d353030783333332e6a7067, 'show', 'Active'),
(81, 76, 'Մեգրելական', '1900', '', 0x6d656772656c616b616e2d322d353030783333332e6a7067, 'show', 'Active'),
(82, 76, 'Պիցցա Կալզոնե', '1200', '', 0x414e445f393033372d353030783333332e6a7067, 'show', 'Active'),
(83, 76, 'Պիցցետտա Parking', '950', '', 0x7061726b696e672d322d353030783333332e6a7067, 'show', 'Active'),
(84, 76, 'Պիցցետտա Մարգարիտա', '900', '', 0x6d61726761726974612d322d353030783333332e6a7067, 'show', 'Active'),
(85, 76, 'Պիցցետտա Եվրոպա', '950', '', 0x6d61726761726974612d322d353030783333332e6a7067, 'show', 'Active'),
(86, 76, 'Պիցցետտա Ասորտի', '900', '', 0x6173736f7274692d322d353030783333332e6a7067, 'show', 'Active'),
(87, 76, 'Պիցցետտա Պեպերոնի', '950', '', 0x70657065726f6e692d353030783333342e6a7067, 'show', 'Active'),
(88, 76, 'Պիցցետտա Ալպռոշուտո', '900', '', 0x616c7072757368746f2d322d353030783333332e6a7067, 'show', 'Active'),
(89, 77, 'Իքիբիր լանչ', '1500', '', 0x6971696269722d6c756e63682d353030783333332e6a7067, 'show', 'Active'),
(90, 77, 'Հավի քաբաբ լանչ', '1200', '', 0x414e445f383634342d353030783333332e6a7067, 'show', 'Active'),
(91, 77, 'Տավարի քաբաբ լանչ', '1300', '', 0x414e445f383636342d353030783333332e6a7067, 'show', 'Active'),
(92, 77, 'Շաուրմա լանչ', '1600', '', 0x73686175726d612d6c756e63682d353030783333332e6a7067, 'show', 'Active'),
(93, 77, 'Հոթ-դոգ լանչ', '800', '', 0x414e445f383639322d353030783333332e6a7067, 'show', 'Active'),
(94, 77, 'Բուրգեր լանչ', '1200', '', 0x6275726765722d6c756e63682d353030783333332e6a7067, 'show', 'Active'),
(95, 77, 'Լանգետ լանչ', '1200', '', 0x414e445f383832392d353030783333332e6a7067, 'show', 'Active'),
(96, 77, 'Սրտի լանչ', '1400', '', 0x737274692d6c756e63682d353030783333332e6a7067, 'show', 'Active'),
(97, 77, 'Թոքի լանչ', '1400', '', 0x746f71692d6c756e63682d353030783333332e6a7067, 'show', 'Active'),
(98, 77, 'Սնկի լանչ', '1200', '', 0x414e445f383830392d353030783333332e6a7067, 'show', 'Active'),
(99, 78, 'Ամառային աղցան', '700', '', 0x494d475f333131312d353030783337352e6a7067, 'show', 'Active'),
(100, 78, 'Տոմատի սոուս', '550', '', 0x494d475f333133342d353030783337352e6a7067, 'show', 'Active'),
(101, 78, 'Զեյթուն', '800', '', 0x494d475f333132302d353030783337352e6a7067, 'show', 'Active'),
(102, 78, 'Թթու տնական', '900', '', 0x494d475f333131302d353030783337352e6a7067, 'show', 'Active'),
(103, 78, 'Լիմոն', '400', '', 0x494d475f333132392d353030783337352e6a7067, 'show', 'Active'),
(104, 78, 'Կաղամբ-գազարով աղցան', '600', '', 0x494d475f333131362d353030783337352e6a7067, 'show', 'Active'),
(105, 78, 'Կանաչու տեսականի', '750', '', 0x494d475f333134302d353030783337352e6a7067, 'show', 'Active'),
(106, 78, 'Պանիր լոռի', '850', '', 0x494d475f333131382d353030783337352e6a7067, 'show', 'Active'),
(107, 79, 'Կոկա-Կոլա 0.5լ', '400', '', 0x436f63612d436f6c612d373638783736382e706e67, 'show', 'Active'),
(108, 79, 'Կոկա-Կոլա 1լ', '600', '', 0x636f6c61332e6a7067, 'show', 'Active'),
(109, 79, 'Կոկա-Կոլա 1.5լ', '750', '', 0x436f63612d436f6c612d312d356c5f363030783630302e6a7067, 'show', 'Active'),
(110, 79, 'Ֆանտա 0.5լ', '400', '', 0x6e617069746f6b5f67617a69726f76616e6e79795f66616e74615f66616e74615f305f355f6c5f706c617374696b6f766179615f627574796c6b615f315f66756c6c2e6a7067, 'show', 'Active'),
(111, 79, 'Ֆանտա 1լ', '600', '', 0xd091d0b5d0b720d0bdd0b0d0b7d0b2d0b0d0bdd0b8d18f202831292e6a706567, 'show', 'Active'),
(112, 79, 'Սփրայթ 0.5լ', '400', '', 0x7370726974655f30352e6a7067, 'show', 'Active'),
(113, 79, 'Դոբրիյ 0.33լ', '350', '', 0x76336c53546a7733456932477350414268512e6a7067, 'show', 'Active'),
(114, 80, 'Օղի Московские новости 0.25լ', '1500', '', 0x323030783230302e6a706567, 'show', 'Active'),
(115, 80, 'Օղի Русская 0.5լ', '3000', '', 0x34353232663363393631343232653364656435346238353639643136363239612e6a706567, 'show', 'Active'),
(116, 80, 'Օղի Finsky 0.5լ', '3500', '', 0xd091d0b5d0b720d0bdd0b0d0b7d0b2d0b0d0bdd0b8d18f202832292e6a706567, 'show', 'Active'),
(117, 80, 'Օղի Королевская награда 0.5լ', '3500', '', 0x373634783630302e6a706567, 'show', 'Active'),
(118, 80, 'Օղի Norppa 0.5լ', '5000', '', 0x33663936623734306332656135636662376438396131393434393964396134342e6a706567, 'show', 'Active'),
(119, 80, 'Օղի Saimaa 0.5լ', '5000', '', 0xd091d0b5d0b720d0bdd0b0d0b7d0b2d0b0d0bdd0b8d18f202833292e6a706567, 'show', 'Active'),
(120, 80, 'Գարեջուր Կիլիկիա ', '600', '', 0x31333837382e6a7067, 'show', 'inActive'),
(121, 81, 'Գարեջուր Կիլիկիա', '600', '', 0x31333837382e6a7067, 'show', 'Active'),
(122, 81, 'Գարեջուր Heineken 0.33լ', '700', '', 0x6865696e656b656e2d6f726967696e616c2d626f74746c652e706e67, 'show', 'Active'),
(123, 81, 'Պիստակ (Ֆստխ)', '1000', '', 0x7069737461686f73726177322d353030783337352e6a7067, 'show', 'Active'),
(124, 81, 'Սիսեռ', '450', '', 0x313034383332312e706e67, 'show', 'Active'),
(125, 81, 'Ջերկի', '800', '', 0x4e65772d50726f6a6563742d323032302d30372d3130543131303833392e3039322e6a7067, 'show', 'Active');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `number` varchar(100) NOT NULL,
  `email` varchar(155) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `number`, `email`, `password`) VALUES
(1, 'aa', 'aa', 'aa', 'aa', 'aa'),
(2, 'aaaaa', 'aaaaa', 'aaaaaa', 'aaaaa', 'aaaaa'),
(3, 'qqq', 'qq', 'qqq', 'qq', 'qq'),
(4, 'qqq', 'qq', 'qqq', 'qqqqq', 'qq'),
(5, 'qqq', 'qq', 'qqq', 'qqqqqwwwww', 'qq'),
(6, 'rr', 'rr', 'rr', 'rr', 'rr'),
(7, 'աա', 'աա', 'աա', 'աա', 'աա'),
(8, 'աաք', 'աա', 'աա', 'աաք', 'աա'),
(9, 'ա', 'ա', 'ա', 'ա', 'ա'),
(10, 'ք', 'ք', 'ք', 'ք', 'ք'),
(11, 'ե', 'ե', 'ե', 'ե', 'ե'),
(12, 'ee', 'ee', '22', 'eeee@', 'ee'),
(13, 'qqq', 'qqq', 'qqq', 'qqq@', 'qqqqqqqqqq');

-- --------------------------------------------------------

--
-- Структура таблицы `userorder`
--

CREATE TABLE `userorder` (
  `id` int(11) NOT NULL,
  `userId` int(25) NOT NULL,
  `prodId` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `userorder`
--

INSERT INTO `userorder` (`id`, `userId`, `prodId`) VALUES
(1, 3, 41),
(2, 3, 41),
(3, 3, 41),
(4, 3, 40),
(5, 3, 40),
(6, 3, 44),
(7, 3, 44),
(8, 3, 44),
(9, 3, 44),
(10, 3, 47),
(11, 3, 47),
(12, 3, 47),
(13, 3, 47),
(14, 3, 47),
(15, 3, 47),
(16, 3, 50),
(17, 3, 49);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prodId`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `userorder`
--
ALTER TABLE `userorder`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `prodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `userorder`
--
ALTER TABLE `userorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
