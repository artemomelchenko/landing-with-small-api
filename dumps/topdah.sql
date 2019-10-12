-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 12 2019 г., 19:14
-- Версия сервера: 5.6.41
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `topdah`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Металочерепиця'),
(2, 'Профнастил'),
(3, 'Євро/Еко Брус'),
(4, 'Секційна огорожа'),
(5, 'Комплектуючі'),
(6, 'Водостічні труби');

-- --------------------------------------------------------

--
-- Структура таблицы `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `hex` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `colors`
--

INSERT INTO `colors` (`id`, `name`, `hex`) VALUES
(1, 'RAL 8019', '#3f3a3a'),
(2, 'RAL 8017', '#44322d'),
(3, 'RAL 9005', '#0a0a0d'),
(4, 'RAL 3005', '#5e2028'),
(5, 'RAL 8004', '#8f4e35'),
(6, 'RAL 6020', '#354733'),
(7, 'RAL 9006', '#a5a8a6'),
(8, 'RAL 7024', '#474a50');

-- --------------------------------------------------------

--
-- Структура таблицы `colors_items`
--

CREATE TABLE `colors_items` (
  `colors_id` int(11) NOT NULL DEFAULT '0',
  `items_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `length` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `full_weight` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `id_categories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `name`, `length`, `height`, `full_weight`, `weight`, `id_categories`) VALUES
(1, 'Класика', '2.5мм', '350мм', '1.19мм', '1.11мм', 1),
(2, 'Ретро+', '3.50мм', '3мм', '1.20мм', '1.12мм', 1),
(3, 'Яспис', '350мм', '3.5см', '1.16см', '1.06см', 1),
(4, 'Модерн', '350мм', '4см', '1.19см', '1.14см', 1),
(5, 'Вена', '350мм', '4см', '1.20см', '1.15см', 1),
(6, 'Мурано', '350мм', '2.5-3.5см', '1.19см', '1.13см', 1),
(7, 'Інтегро', '350мм', '6см', '1.16см', '1.04см', 1),
(8, 'Олімп', '350мм', '3.5см', '1.19см', '1.09см', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `items_img`
--

CREATE TABLE `items_img` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `items_img`
--

INSERT INTO `items_img` (`id`, `img`, `id_color`, `id_item`) VALUES
(1, '_SV3An3kcDg3okS_8cPeuD-DWkUpK4Ep.png', 2, 1),
(2, 'F-TqnKCjm6ln0VK7W__zh5_9Wz9Qwlb_.png', 3, 1),
(3, 'Llh4sG5FWw5DidDN_KvO2aHerYd6rM1D.png', 4, 1),
(4, 'OK7oVLqKEUTwk0ccuK1RjXWO-tvX7I2X.png', 5, 1),
(5, 'GzupPtuSJmVrtoVmaC3FxiD-qN9PoQxu.png', 6, 1),
(6, 'ABDgCanUFo4F9Hzi9q8yWMbjAGCcnv4r.png', 7, 1),
(7, '8BWIJDLf1XPAoqnLn-Z-4sM7cpaul2L0.png', 8, 1),
(8, 'd8ENH3MGySAJFqhR3jNkQXFkETTaNsEZ.png', 1, 1),
(9, 'p5RtGPCfds5xLIxgbe-lwgkhLZGpflsN.png', 2, 2),
(10, 'GHYLg82wqNFPwOkB1qVALmW685dYZC1A.png', 3, 2),
(11, 'GUvUVldkp2vku-DgJEGGm-lg8CIHFcJ6.png', 4, 2),
(12, '8gZPLFxCI_95T3A6OJ1tnvS8uzVQE50X.png', 5, 2),
(13, 'iKuhxCmlYiqtNfygQHpLlXgw47fdJcYq.png', 6, 2),
(14, 'z44th_AmrQSZ-etr_2-ExDT8_PsPTXhD.png', 7, 2),
(15, '4D98BuwOby3KeozzrHHNI_pXdEk_fHCB.png', 8, 2),
(16, 'OnitLAc_sndfweow_VYo9MnfHbisjsqd.png', 1, 3),
(17, 'UzWc7OAryeM7oFTKURESmOhN8M0k85zS.png', 2, 3),
(18, 'kZa5cJNw8_xUSGCkyTd2o9GDyZSRbWVs.png', 3, 3),
(19, 'BbC_h-1CThEKRdayqXuj1tTSniaWdBla.png', 4, 3),
(20, 'C9RhV02M0FYgIEHK_8DXvZLFNC26EBFK.png', 5, 3),
(21, '6PMU-2S5PTgqsPGTDK2dCK0PVwU19ctY.png', 6, 3),
(22, 'H-tyPAHM5wgMfyvw50wvxYODVwRVrq6u.png', 7, 3),
(23, 'E6Lx8IkmMfdsXlY5wn_-SPAA1KeikFN7.png', 8, 3),
(24, 'bRVg5KahGrzA0mnsRXEmu1Bl-uZfZA5Y.png', 1, 4),
(25, 'jZYekaPC1bPrsoiGq1duk4gtLzGXDa2Y.png', 2, 4),
(26, 'kP-A624PgBfO_Q-JNwU25bqs1vYQi723.png', 3, 4),
(27, 'SzBQojRGDjKrG6d7ETsQHheu5W61iSOa.png', 4, 4),
(28, 'AlvreKixI4JbKqiyUzK2YmxaaUOkAHM4.png', 5, 4),
(29, 'WXjXS45VSEqp943ZeUEmi9ELy4lF_ryx.png', 6, 4),
(30, 'XdcizWVe_x6YqsV8Qj4gV1-0hhKjTXzU.png', 7, 4),
(31, 'DSbl8YfHXN4zdh7cicInJk1cVidEtkcI.png', 8, 4),
(32, '58sTufz4QMPFKKQlLRhxiuxGUuIdNzaj.png', 1, 5),
(33, 'SmpExaiZZASVsgHGTDxCQuZR6hVpzhjj.png', 2, 5),
(34, 'Yv4YEa_tf4KyvYtmioDcSK9licjCeA5y.png', 3, 5),
(35, 'x_Y2ztuUXoUqVGceCcCY8hl5kt08sDCC.png', 4, 5),
(36, 'mFlFh51CBjooC2fwm_gEIUgKC8TBaa-l.png', 5, 5),
(37, 'iLwS8a7af0LwZlaXUq0fK321MWSocIyl.png', 6, 5),
(38, '6FKfTP4-ecBBMDkUIBHg9C6CqR7uvsup.png', 7, 5),
(39, 'zrW0_GwbPg81CMCpCYoeSmfTln4bFTOH.png', 8, 5),
(40, '76Y-mT-yYgGEQLF1OBR4_RDDbf_ybeBt.png', 1, 6),
(41, 'W1QVJTnL92H7ZgmW4wFjbewphrLskEz5.png', 2, 6),
(42, 'ml0GV5M0KU9LvOXSp5dRmjnMb_AFvKSf.png', 3, 6),
(43, 'aaWQ2caqBexOtvUmzG-F0I64OUqbWxVM.png', 4, 6),
(44, 'R9_wKaEo2cIA2gpi7Ztk8Qc_oCr-ik5B.png', 5, 6),
(45, 'ftLcLattl3D9fd9CNgMOwlI2bxVq8WQr.png', 6, 6),
(46, 'ipxR3xGR6ywgX1nuvk-YxHd1zHd0NueH.png', 7, 6),
(47, 'uY6jlCEiuFlsYQG9Jlic20fFczCTiyI6.png', 8, 6),
(48, '1nAJHCH8Gge1NwKEr2VFB4gTdib_CZv-.png', 1, 7),
(49, 'NJ8lTPO2R81ufgphPdKN-Cy52SizgS-z.png', 2, 7),
(50, 'RZKFP6INvpGBNFmNVZdv0vN7GZlF1utU.png', 3, 7),
(51, 'G_V-9Di5l9nya-zvfrUcOZNimJ7iPFxX.png', 4, 7),
(52, 'NvgGixSJ-JLu4eCDRpmZXMg7vcAo8E21.png', 5, 7),
(53, 'L-9r6tJNsSaNLpxwRSfo2712hKGOOvCt.png', 6, 7),
(54, 'LR07GXUUzlBs2_2R7ttDf8gDs4CeJP_G.png', 7, 7),
(55, 'apimJtOvEBLuEnByHQWE-of3yE5MinlH.png', 8, 7),
(56, 'QkW2JfMKKz4E7hRzkgQjbY7fOCw6mrsV.png', 1, 8),
(57, 'tZvQ2xSEqh7Jdb5IyYyGsnft6-7JrNEp.png', 2, 8),
(58, 'CEDZl5HisHDImzu9El6fGfK2dZj03em6.png', 3, 8),
(59, 'k9ktHSXmY6zHPFCzuxExh8VFOAQR_tc_.png', 4, 8),
(60, 'qcRSuBard16KAOhUIUcY5z3c08kKTUsb.png', 5, 8),
(61, 'LG1QHYe0AF-uWVsC-JqLFegxMUBBjcd5.png', 6, 8),
(62, 'QhzyE2E4Ixk_hPiVfbEPDWS14kj2N5y6.png', 7, 8),
(63, 'FreciMYUT2k5_OHCCAeYo5a1BuY904Bb.png', 8, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `items_settings`
--

CREATE TABLE `items_settings` (
  `id` int(11) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `garanty` varchar(255) DEFAULT NULL,
  `zinс` varchar(255) DEFAULT NULL,
  `premium` tinyint(1) NOT NULL,
  `premium_text` varchar(255) DEFAULT NULL,
  `id_manufacturer` int(11) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `items_settings`
--

INSERT INTO `items_settings` (`id`, `price`, `garanty`, `zinс`, `premium`, `premium_text`, `id_manufacturer`, `id_item`) VALUES
(1, '138', '20', '225г', 0, NULL, 1, 1),
(2, '136', '20', '225г', 0, NULL, 2, 1),
(3, '200', '30', '275г', 1, 'Lorem ipsum', 3, 1),
(4, '126', '20', '225г', 0, NULL, 4, 1),
(5, '123', '20', '225г', 0, NULL, 5, 1),
(6, '180', '30', '275г', 0, NULL, 6, 1),
(7, '152', '20', '225г', 0, NULL, 7, 1),
(8, '138', '20', '225г', 0, NULL, 1, 2),
(9, '136', '20', '225г', 0, NULL, 2, 2),
(10, '200', '30', '275г', 1, 'Lorem ipsum', 3, 2),
(11, '126', '20', '225г', 0, NULL, 4, 2),
(12, '123', '20', '225г', 0, NULL, 5, 2),
(13, '180', '30', '275г', 0, NULL, 6, 2),
(14, '152', '20', '225г', 0, NULL, 7, 2),
(15, '138', '20', '225г', 0, NULL, 1, 3),
(16, '136', '20', '225г', 0, NULL, 2, 3),
(17, '200', '30', '275г', 1, 'Lorem ipsum', 3, 3),
(18, '126', '20', '225г', 0, NULL, 4, 3),
(19, '123', '20', '225г', 0, NULL, 5, 3),
(20, '180', '30', '275г', 0, NULL, 6, 3),
(21, '152', '20', '225г', 0, NULL, 7, 3),
(22, '138', '20', '225г', 0, NULL, 1, 4),
(23, '136', '20', '225г', 0, NULL, 2, 4),
(24, '200', '30', '275г', 1, 'Lorem ipsum', 3, 4),
(25, '126', '20', '225г', 0, NULL, 4, 4),
(26, '123', '20', '225г', 0, NULL, 5, 4),
(27, '180', '30', '275г', 0, NULL, 6, 4),
(28, '152', '20', '225г', 0, NULL, 7, 4),
(29, '138', '20', '225г', 0, NULL, 1, 5),
(30, '136', '20', '225г', 0, NULL, 2, 5),
(31, '200', '30', '275г', 1, 'Lorem ipsum', 3, 5),
(32, '126', '20', '225г', 0, NULL, 4, 5),
(33, '123', '20', '225г', 0, NULL, 5, 5),
(34, '180', '30', '275г', 0, NULL, 6, 5),
(35, '152', '20', '225г', 0, NULL, 7, 5),
(36, '138', '20', '225г', 0, NULL, 1, 6),
(37, '136', '20', '225г', 0, NULL, 2, 6),
(38, '200', '30', '275г', 1, 'Lorem ipsum', 3, 6),
(39, '126', '20', '225г', 0, NULL, 4, 6),
(40, '123', '20', '225г', 0, NULL, 5, 6),
(41, '180', '30', '275г', 0, NULL, 6, 6),
(42, '152', '20', '225г', 0, NULL, 7, 6),
(43, '138', '20', '225г', 0, NULL, 1, 7),
(44, '136', '20', '225г', 0, NULL, 2, 7),
(45, '200', '30', '275г', 1, 'Lorem ipsum', 3, 7),
(46, '126', '20', '225г', 0, NULL, 4, 7),
(47, '123', '20', '225г', 0, NULL, 5, 7),
(48, '180', '30', '275г', 0, NULL, 6, 7),
(49, '152', '20', '225г', 0, NULL, 7, 7),
(50, '138', '20', '225г', 0, NULL, 1, 8),
(51, '136', '20', '225г', 0, NULL, 2, 8),
(52, '200', '30', '275г', 1, 'Lorem ipsum', 3, 8),
(53, '126', '20', '225г', 0, NULL, 4, 8),
(54, '123', '20', '225г', 0, NULL, 5, 8),
(55, '180', '30', '275г', 0, NULL, 6, 8),
(56, '152', '20', '225г', 0, NULL, 7, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `form_name` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `date_create` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `leads_settings`
--

CREATE TABLE `leads_settings` (
  `id` int(11) NOT NULL,
  `leads_id` int(11) NOT NULL,
  `manufacturer` varchar(255) DEFAULT NULL,
  `thickness` varchar(255) DEFAULT NULL,
  `square` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `img`) VALUES
(1, 'ArcelorMittal (нім.)', 'BzJZ1rQj-1lcuhTu8HfofQx6V3J3Surs.png'),
(2, 'ArcelorMittal (пол.)', 'wWOmSCk0VFZ36W-1HjxhhoAxsIai2JsO.png'),
(3, 'ThyssenKrupp (нім.)', 'e-xPzE-woCfyYeFrGIPS9mvS4fhpONqH.png'),
(4, 'Arvedi (іт.)', 'tbNUd-xskVjK2V3oUitCbTY168TC6iCN.png'),
(5, 'Dongbu', 'Sji9Vw-7FQuMQ6fGCaJnAfS3GnZ3K8Sj.png'),
(6, 'SSAB ', '4gtx-Rs5s8KHjhADGsTDzsrneFz3TtG2.png'),
(7, 'Voestalpine', 'ReZ8Mqk5XXc8ewunh-p-ehZJesfIXZsw.png');

-- --------------------------------------------------------

--
-- Структура таблицы `manufacturers_items`
--

CREATE TABLE `manufacturers_items` (
  `manufacturers_id` int(11) NOT NULL DEFAULT '0',
  `items_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1570113011),
('m130524_201442_init', 1570113013),
('m190124_110200_add_verification_token_column_to_user_table', 1570113013),
('m190910_163020_create_leads_table', 1570113013),
('m190910_163213_create_leads_settings_table', 1570113013),
('m190916_101724_add_data_create_column_to_leads_table', 1570113013),
('m190925_094048_create_categories_table', 1570113013),
('m190925_094247_create_colors_table', 1570113013),
('m190925_094430_create_manufacturers_table', 1570113014),
('m190925_094556_create_items_table', 1570113014),
('m190925_101232_create_items_settings_table', 1570113014),
('m190925_132509_create_junction_table_for_colors_and_items_tables', 1570113014),
('m190925_132549_create_junction_table_for_manufacturers_and_items_tables', 1570113014),
('m191004_103840_items_img', 1570520326);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'dev-bm', 'WYLBDXufwkHi1UUrIieaBiNKiHO8bOHH', '$2y$13$618LbUY6D23gCZNaVLpbZ.xnrsIe0pccM/z6mGgWW2jpmUdvio7dC', NULL, 'info@bizmental.pro', 10, 1561550913, 1565777495, 'ORNOpkEvdIxXwnMMdf-WyUB34r6Z5qTu_1561550913');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `colors_items`
--
ALTER TABLE `colors_items`
  ADD PRIMARY KEY (`colors_id`,`items_id`),
  ADD KEY `idx-colors_items-colors_id` (`colors_id`),
  ADD KEY `idx-colors_items-items_id` (`items_id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-items-id_category` (`id_categories`);

--
-- Индексы таблицы `items_img`
--
ALTER TABLE `items_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-items_img-id_color` (`id_color`),
  ADD KEY `idx-items_img-id_item` (`id_item`);

--
-- Индексы таблицы `items_settings`
--
ALTER TABLE `items_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-items_settings-id_manufacturer` (`id_manufacturer`),
  ADD KEY `idx-items_settings-id_item` (`id_item`);

--
-- Индексы таблицы `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `leads_settings`
--
ALTER TABLE `leads_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-leads_settings-leads_id` (`leads_id`);

--
-- Индексы таблицы `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `manufacturers_items`
--
ALTER TABLE `manufacturers_items`
  ADD PRIMARY KEY (`manufacturers_id`,`items_id`),
  ADD KEY `idx-manufacturers_items-manufacturers_id` (`manufacturers_id`),
  ADD KEY `idx-manufacturers_items-items_id` (`items_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `items_img`
--
ALTER TABLE `items_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT для таблицы `items_settings`
--
ALTER TABLE `items_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT для таблицы `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `leads_settings`
--
ALTER TABLE `leads_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `colors_items`
--
ALTER TABLE `colors_items`
  ADD CONSTRAINT `fk-colors_items-colors_id` FOREIGN KEY (`colors_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-colors_items-items_id` FOREIGN KEY (`items_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk-items-id_category` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `items_img`
--
ALTER TABLE `items_img`
  ADD CONSTRAINT `fk-items_img-id_color` FOREIGN KEY (`id_color`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-items_img-id_item` FOREIGN KEY (`id_item`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `items_settings`
--
ALTER TABLE `items_settings`
  ADD CONSTRAINT `fk-items_settings-id_item` FOREIGN KEY (`id_item`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `leads_settings`
--
ALTER TABLE `leads_settings`
  ADD CONSTRAINT `fk-leads_settings-leads_id` FOREIGN KEY (`leads_id`) REFERENCES `leads` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `manufacturers_items`
--
ALTER TABLE `manufacturers_items`
  ADD CONSTRAINT `fk-manufacturers_items-items_id` FOREIGN KEY (`items_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-manufacturers_items-manufacturers_id` FOREIGN KEY (`manufacturers_id`) REFERENCES `manufacturers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
