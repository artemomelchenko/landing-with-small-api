-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 14 2019 г., 10:29
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
  `id_categories` int(11) NOT NULL,
  `garanty` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `name`, `length`, `height`, `full_weight`, `weight`, `id_categories`, `garanty`, `price`) VALUES
(1, 'Класика', '2.5мм', '350мм', '1.19мм', '1.11мм', 1, NULL, NULL),
(2, 'Ретро+', '3.50мм', '3мм', '1.20мм', '1.12мм', 1, NULL, NULL),
(3, 'Яспис', '350мм', '3.5см', '1.16см', '1.06см', 1, NULL, NULL),
(4, 'Модерн', '350мм', '4см', '1.19см', '1.14см', 1, NULL, NULL),
(5, 'Вена', '350мм', '4см', '1.20см', '1.15см', 1, NULL, NULL),
(6, 'Мурано', '350мм', '2.5-3.5см', '1.19см', '1.13см', 1, NULL, NULL),
(7, 'Інтегро', '350мм', '6см', '1.16см', '1.04см', 1, NULL, NULL),
(8, 'Олімп', '350мм', '3.5см', '1.19см', '1.09см', 1, NULL, NULL),
(9, 'Т-8', '6м', '0.8см', '', '1.18-1.16см', 2, '20', '100'),
(10, 'Т-10', 'до 6м', '0.8см', '', '1.19-1.15', 2, '20', '100'),
(11, 'Т-14', '6м', '1.4см', '', '1.16', 2, '20', '100'),
(12, 'Т-18', 'до 6м', '1.8см', '', '1.137-1.1', 2, '20', '100'),
(13, 'Т-35', 'до 6м', '3.5см', '', '1.10-1.05', 2, '20', '100'),
(14, 'Т-45', 'до 6м', '4.5', '', '1.05-0.99', 2, '20', '100'),
(15, 'Т-75', 'до 6м', '7.5', '', '0.8-0.75', 2, '20', '100'),
(16, 'Блок-хаус', '', '', '0.38', '0.38', 3, NULL, '140'),
(17, 'Еко Брус', '', '', '0.32', '0.35', 3, NULL, '150'),
(18, 'Штакетник', '', '', '', '', 4, NULL, '18'),
(19, 'Єврожалюзі', '', '', '', '', 4, NULL, '150'),
(20, 'Коник (трикутний)', '', '', '', '', 5, NULL, NULL),
(21, 'Коник (напівкруглий)', '', '', '', '', 5, NULL, NULL),
(22, 'Трикутний з пешкою', '', '', '', '', 5, NULL, NULL),
(23, 'Лобова', '', '', '', '', 5, NULL, NULL),
(24, 'Вітрова', '', '', '', '', 5, NULL, NULL),
(25, 'Йондова (верхня-декоративна)', '', '', '', '', 5, NULL, NULL),
(26, 'Пристінна з вирізом (ST)', '', '', '', '', 5, NULL, NULL),
(27, 'Йондова (нижня)', '', '', '', '', 5, NULL, NULL),
(28, 'Bryza', '3м', '', '125', '90', 6, NULL, NULL),
(29, 'Tigres', NULL, '4м, 2м', '125', '90', 6, NULL, NULL),
(30, 'Струга', '4м, 2м', NULL, '125', '90', 6, NULL, NULL),
(31, 'Raiko', '4м, 2м', NULL, '125', '90', 6, NULL, NULL),
(32, 'Galeco', '4м, 2м', NULL, '125', '90', 6, NULL, NULL);

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
(63, 'FreciMYUT2k5_OHCCAeYo5a1BuY904Bb.png', 8, 8),
(64, 'bs9cNObArp1Q2mfuOSwhJ0JOPTbmc01v.png', 1, 9),
(65, 'X-rkX5RnQaL0NsuyrJft0Yt28qGcgmSG.png', 2, 9),
(66, 'u9pypnrn1KCdQGDG7appTriye55ul_92.png', 3, 9),
(67, 'Ht9FbJW_XOJox_y8WfI7ZyCazhd64NCH.png', 4, 9),
(68, 'hhmqvG5SC-I0PR9ZFodz1GOGFokDCEk3.png', 5, 9),
(69, '1ckCsW6BwAYBaCpMliF8nfejiLH_0MLh.png', 6, 9),
(70, 'fohAu7ziZw7W30_bxCWUEsuWoo8tBV-5.png', 7, 9),
(71, 'urSIkvLT_pQXPhzx7kotoGRadsfM58OY.png', 8, 9),
(72, 'xZWi9o10Qb1k5IFv2ygJqtyupUpl1rHU.png', 1, 10),
(73, 'vF5iL1YgBUFch2JoHssh1mEpXStbu-Ik.png', 2, 10),
(74, '2BvgdnGXUArAD-kVJRN5fdI_sjv-skBe.png', 3, 10),
(75, 'tHsxnbZeuHs3CG-sSwJRCfSOajAiP8AK.png', 4, 10),
(76, 'gMRDWPCCg6_6gQ475RICYHj3u6DX8peE.png', 5, 10),
(77, 'HzPTmKjNPRJHlQIl21_q5R014K-F6l4_.png', 6, 10),
(78, 'YzbRzGmViRH9XkpURvrfYrOwWdSCkViB.png', 7, 10),
(79, 'onEdgtXLum7EuaucSaGCVkKjNgVP3n5V.png', 8, 10),
(80, 'KebM0KCoXcESozotZ7x7NkFYjoDuYs6w.png', 1, 11),
(81, 'OFgAJaUd99cfpblTlOUMnRNCQ0YLURTV.png', 2, 11),
(82, '1AVDhJT2tggqIqGKgv1xcCU60gq24jA_.png', 3, 11),
(83, 'YzqGCObJ82hei7EJSxaPA13zqDS8aKDb.png', 4, 11),
(84, 't4jMuDJp-c7AfTeie5LcQmv9E9zjJMmz.png', 5, 11),
(85, 'irhrPx19Px0ttIg-4Saz9JCuHj4iaOcG.png', 6, 11),
(86, 'lxUOngjp_DXEbGNaEehqwkbIcLtvqGX8.png', 7, 11),
(87, 'VGMrjGL5Nh3LbxU8o_MgQlC9X1hwLF7i.png', 8, 11),
(88, 'H3m4pH6QHE61f-W1r4XyjUTQMI9YOTDg.png', 1, 12),
(89, 'TPllje24MAgMPGAes5TGxnpTOCC_MPEr.png', 2, 12),
(90, '2-LeWuBW-PhL7nrTK2fODhg8V5uRlkAX.png', 3, 12),
(91, '0pFvN0__A6NLr6bcZK_dt4IaxbV3bHtr.png', 4, 12),
(92, 'nGrP926c_hsIkZ7umBNpCdqKQS6UcChJ.png', 5, 12),
(93, '08lb8JVeEQb-6o7jM32RLKfWMJg3wEG0.png', 6, 12),
(94, 'KeUavcVm_BsOCmw_MtOmTragR4HLe_bh.png', 7, 12),
(95, 'ITeYvGFHT_pfEdQpGcvK9qTmJCVKQHkX.png', 8, 12),
(96, 'iu8hcodQP72iLJ2LZkmCkEcogqYA78SL.png', 1, 13),
(97, 'vAe3LPlqXTWpKETLakJNG3PgE4eiZx0D.png', 2, 13),
(98, 'iZnLroP9hlrfAH3_8ORLdJPqhU5uhKs3.png', 3, 13),
(99, 'lfb7zmvcCNe14z9PstnXP6qkomWKjZIW.png', 4, 13),
(100, 'VyDy7hvqGBWqR5_aOIR-N0Db7jtPaEzc.png', 5, 13),
(101, 'VqBKqoMvGA-ZSiczqg5j9h-yGBlHtEHd.png', 6, 13),
(102, 'PaLC9WYSnDD-wMM3KDzSoli3Tfg1lo0_.png', 7, 13),
(103, 'waW-Bbsu02nxqhwvy754khbSNX-y036M.png', 8, 13),
(104, 'R0YzJrgb3SjMEEoI81PchCIN6pPyET-w.png', 1, 14),
(105, 'Qy7rSPXBENKmndaqJpEDNdL6ZsczjRKb.png', 2, 14),
(106, 'glHAmENLCY0c2PKvXIHv7yUvtdFHft1k.png', 3, 14),
(107, 'IAmI9comai957F6fX1gR1__QTs3TB_MZ.png', 4, 14),
(108, 'SX0MrywiSV1b3LWsgadigty5NKqzx-YJ.png', 5, 14),
(109, 'AgiJSSuUKbF4el-TVYOlRueAGD2qYcCU.png', 6, 14),
(110, 'r9yq2e02-Dvghk0jRLxYL7AR6-yNfJTo.png', 7, 14),
(111, 'xWhtlaHEEiIYYRYMx3xbe9XgcdDiJnlD.png', 8, 14),
(112, 'CoSWPMbHKc59c0sA-RJqjLKrS7kienTR.png', 1, 15),
(113, 'noQA41cgk9iXg4rC50bvbD3USize7-T5.png', 2, 15),
(114, 'zt_nR1XT0LnzNGbvu3dauAhEe9efbeLI.png', 3, 15),
(115, 'ryH3wOi1QGan8M2PDVI5j9ha46rtkSY-.png', 4, 15),
(116, '-j3Z23oclu1JpTFpf_P8sexjw9E5NXFy.png', 5, 15),
(117, 'jYWkAqTXR0RvSrFUW3u-YZIIkYFrXYI7.png', 6, 15),
(118, 'sl-l34LvfUQhxlQQD0VDRwlU-wUa01fI.png', 7, 15),
(119, 'tHWxFfDZ_mmf_n1mJlyN3IeTO55Q5uRE.png', 8, 15),
(120, 'rmjNF_YcvL202aOMDj01iVyt2Y0kXxhV.png', 1, 16),
(121, 'yzV1LzptORo0o5MjIS9Q-7_RpqYFVAa2.png', 2, 16),
(122, 'klJadAl9FzcjVKrS1B-U83k6QjEW7yw7.png', 3, 16),
(123, 'CUtgux2ySjqL7ryvS8LSM2xjr-UQYP5e.png', 4, 16),
(124, 'I_8tEf87MfpMzJfRe7lfjY3rg5qXHeND.png', 5, 16),
(125, 'LxcbUOhnXCET7RNYxZzEXt3lmrOP0MVu.png', 6, 16),
(126, 'oLXBAdxlM1x0vviCGsEJhkRKzBdKw7GR.png', 7, 16),
(127, 'ULDYWuRHAe0ESqgR11yiMJzLmhsTa6xb.png', 8, 16),
(128, 'Kyn_NYSDOwJt3vYYh7Keu57WCN1ipdJB.png', 1, 17),
(129, 'tlNQezB1AMmbBwfwMhPPJD3e8kRU1soT.png', 2, 17),
(130, 'PODpZOBZfS4MwFT7PU12crJPmXg5rNCO.png', 3, 17),
(131, 'hp4zECwd7icrnsOEnSQ31C69DcGfgZ-Y.png', 4, 17),
(132, 'stJ8qZlKk5yzRLUFat-2r4bdvGVBgOuV.png', 5, 17),
(133, 'JQ47z_hizQE187dF_fkss6e2h54mXtm5.png', 6, 17),
(134, '85YaxMtGAVxmPE1f93gulqfil7bDeD3e.png', 7, 17),
(135, 'TI-cW-0lMAZYpDCLqUk_LbFkFZHWnljj.png', 8, 17),
(136, 'LRHgVmqaBlxp9L6tsvWnQ23y1Fai9o6P.png', 1, 18),
(137, 'C_YWw4qStkLrT4gVo28EUkbT1MIjLx9-.png', 2, 18),
(138, 'GX4KFj2LaXAeTOYCn3T2KjLmf0icDLYr.png', 3, 18),
(139, '5oeBXk-xIT17sWbHX2VnApKD2EAuv5Jt.png', 4, 18),
(140, 'tSJ9L2ElL9-FQiIuuFDAuUrZoBMJ3pBF.png', 5, 18),
(141, 'Kha0X6aqvTwwoxH2YsK03lCJ9t-FMr75.png', 6, 18),
(142, '9SfoGifHUA0LAjboP8isXHDzW0zHc13a.png', 7, 18),
(143, 'qK1g1QoEemAsFROiOsihGVKMihsTXn5U.png', 8, 18),
(144, '8Kf_1wj2-ci1YTQwKgpbqvNAnRkI-m48.png', 1, 19),
(145, 'hX5ste2s98Uy4EHSCJA_HqK8ESL8S4ar.png', 2, 19),
(146, '-o5RO-44ws66q0nxxC1UMczZQuAw1Di8.png', 3, 19),
(147, '-rG03HxXOoIuoxJRw4eK_T0nkz_XO01Q.png', 4, 19),
(148, 'HpwgqK4zkjhV72AoaDJTjQqE_nF997Cm.png', 5, 19),
(149, 'Z_j8pspbpeL708wIFfWmfXQZM9tQ6C3H.png', 6, 19),
(150, 'I0H2JtI5nu30sgGAnONnqugj1o_WvSk5.png', 7, 19),
(151, 'L2Qk1xkq3u6Z-RYTwaLq38kOgSzOavCL.png', 8, 19),
(152, 'i9Rvu7uu3fC1WWHbZ33JTozkZ6-HUrG0.png', 1, 20),
(153, 'gnZlyp-AO_mbJAl5OV0JaROdd77Xh7s2.png', 2, 20),
(154, 'QZ-Q2EN2di7Qr8a0bwqFp-Joww4QDoBh.png', 3, 20),
(155, 'M4XpJZ42JC_-BFw-F2bMnhIRwNSXsr9B.png', 4, 20),
(156, 'HuSBguloiwHQEwv_vMSEj6r8kc0cQg-c.png', 5, 20),
(157, '1Cr4Tca2JA1Xv5I5N7c94VDwcAGfDk0Y.png', 6, 20),
(158, 'FUYpiQBXj8p1UM3ejvTo3hrrtEYp1Q5G.png', 7, 20),
(159, 'AqaLYKVfRZFlccJedM5OpQjC9CVSuWZn.png', 8, 20),
(160, 'GTbahRL_D2dtQg6XBiViSdXG_eWatGnx.png', 1, 21),
(161, 'OTez6-bZwcl_hOJj3SBHdinHQkI3sZOE.png', 2, 21),
(162, 'vJaAmdoV9boLKF2a60jhwMuZ0HkrvC_p.png', 3, 21),
(163, 'Fjc6n4L18_jp__bEF0KilXcV59OYQHER.png', 4, 21),
(164, 'QEf4aUsH66xE0x5x2DtqsANZPRjNBURu.png', 5, 21),
(165, 'gP9CC2B75QB4E3WYKh85BW-U_0U4Qvzn.png', 6, 21),
(166, 'NyINplZw-4yf7rS6Wz3hD1YVaKuM7fMx.png', 7, 21),
(167, '7tyfYmtSBaY8qM5237JIG8TRsUN-dXo0.png', 8, 21),
(168, 'a3Hznu5a1qzxHRb4BHKDYzwB2l8zinec.png', 1, 22),
(169, 'G1uuuqthkCzXaqPpfXe1n9aPEv2zGcLd.png', 2, 22),
(170, 'pAGisgwFSQLxeRNqQqu76xjWg1hW1vVY.png', 3, 22),
(171, 'N3KbQWTV3k3L-GlJhpbLAPhKhi2-3HAG.png', 4, 22),
(172, 'kmkZMGEfjqVRSa1LVx3nsz700HfaJRHo.png', 5, 22),
(173, 'taStnSuslr9ix7oB1pmP3in2XrxzZQt5.png', 6, 22),
(174, 'KbYmhaCfcrVlCrK23m1wHzd1R3IYsBbK.png', 7, 22),
(175, 'Sdgm6_1sHi_XEVTAVezIfhuQaY2BNHoZ.png', 8, 22),
(176, 'TR8AOgOgN2A3L48E8i0mQ8ehC0q4eyCC.png', 1, 23),
(177, 'QjyqgbCRZxayVcsgz5DE7qwPCquI16yf.png', 2, 23),
(178, '8XkZqrh2ZZ5ogkclumN12KfA_sl1Kcfm.png', 3, 23),
(179, 'wpr5-uPD9W9h3siHxkVc5CCHmtR8HM-3.png', 4, 23),
(180, 'RHIIXXcr1sFOuz3RwzVgkOEsu2kMuLtl.png', 5, 23),
(181, 'jelt7Aj_80aQnHKUhU99NJLKctEpm3Qc.png', 6, 23),
(182, '_WzwugMBesjepmxlOsxeybfQBZk1o9Px.png', 7, 23),
(183, 'n10iy-zJZX1dikB5arBMUj9ZpTqxgdCQ.png', 8, 23),
(184, 'kxXLKDnlrHZE0GykqIiBKbEfC6jcXbWF.png', 1, 24),
(185, 'mDF9z7BPwyCx5Oxoh4lynvqphKaMzByK.png', 2, 24),
(186, 'YPH9VinqEkWwBk9L1dTDzE11wcuHtc1D.png', 3, 24),
(187, 'eXlLq3ssiT7CKUQ5XJZPqj083Nlrvhp0.png', 4, 24),
(188, 'TTQD_PZkeMSyKRIRpxuDePW9et29bIUH.png', 5, 24),
(189, 'gNCFzSvliIdXN2KhZXSZpn98yrR12oYR.png', 6, 24),
(190, 'VlHmZ0162UzZi2qq76GwfYNgZcRJYHwR.png', 7, 24),
(191, '3NzHDntiOagWXd2K8DbLlY6jUyth4YcG.png', 8, 24),
(192, 'OLFBv1Xl_XTj4Ouwzg7hR7ujm2c7pk90.png', 1, 25),
(193, 'Y9uGpWmpsburtFNMUtrkykb1SRjCeZjv.png', 2, 25),
(194, 'e4Fdker2KcxbolR39QfNoFbTGRfnKc8Q.png', 3, 25),
(195, 'LfYiIa7ZU0_iXUAUHICj5bUWafSTYUaK.png', 4, 25),
(196, 'QyI6nmvmfoY-DR3BjF2E8t2U_LnWa6LX.png', 5, 25),
(197, 'mLVswaUGRWeftr-5NO8t71RmpaKHenIF.png', 6, 25),
(198, 'pWQlFZrswJMmkyKBYDNvHJQi0bFJ7Z9u.png', 7, 25),
(199, 'Fkzq57stOlbY_UEno3LqRMN2wrC_9jix.png', 8, 25),
(200, '4U90JR46IUqwqFqgX02N-j8v5zUeid5E.png', 1, 26),
(201, 'gk34kRNGM9ZGoWypgX7Ey5EZGLY0HQpu.png', 2, 26),
(202, '-dxwl7VeCk3vKE_8B7oll0C9119vIB8D.png', 3, 26),
(203, 'Ycyow7B96u6Klk34a8-F-Iq5VqWb-yni.png', 4, 26),
(204, 'avVbHhnkpJTzvFtDDiAvm_oboUpeO5k5.png', 5, 26),
(205, 'TNPF58KfS4sAHIHTIDTaC1FpmgVNfwro.png', 6, 26),
(206, 'UmBaiodrW0dLsc73vIrVyZBSltHoqEBF.png', 7, 26),
(207, 't5tZu0Q1zyvPphDU1Sz_rHdYN7xWYi1t.png', 8, 26),
(208, 'P7JuJ5ZIaWmwm59TbBR_aXzOH7TgrSpH.png', 1, 27),
(209, 'eTS7pvp2Mbf3xJr6kiDfxAhAfVPtN2wH.png', 2, 27),
(210, 'lDt247Gz_S1OnFoVHyw9AEnbutxRsGgR.png', 3, 27),
(211, 'wjZbLLyJYoGiQWnxuOwugFqOtA3wIYWc.png', 4, 27),
(212, 'zLr1SEatCHVPSsSTwazsjtB2lYfOdFbl.png', 5, 27),
(213, '_MakBgtqbkobbV9VVb6Sc6kjH9714ilR.png', 6, 27),
(214, 'sjptHXjPLF4h1rEb6pLrjF7_DoB4G8VF.png', 7, 27),
(215, 'qS6b8SGIq5dXiVA9u_eDUtBk_VQHQIOL.png', 8, 27),
(216, 'vPpZNrk7Tue3lcOz1QcpOo6S5EXO9lQ_.png', 1, 28),
(217, 'MNcEK-6iUvAoZZuQgjkJXHP1YE3Zn-nN.png', 2, 28),
(218, '6V_I9l3Iy-qHOBR9guM0lr9e89ARDLva.png', 3, 28),
(219, 'l45VlWLzsnMJJda9PfWwMy3mTYWG1gP5.png', 4, 28),
(220, 'tHv7UVvM1obC_TUXLTinDViuKQO5vYz8.png', 5, 28),
(221, 'meplUwlL6HlOC97wLO0v3m5-vgLrn2VC.png', 6, 28),
(222, 'sAv6mfri10A0bydMAKwzn0PYYbdjRmVh.png', 7, 28),
(223, 'pj32Z4haEhrCXnKaD-SmiAg4D9LFiIy8.png', 8, 28);

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
(56, '152', '20', '225г', 0, NULL, 7, 8),
(57, '', '30', '275г', 0, NULL, 6, 28),
(58, '', '30', '275г', 0, NULL, 6, 29),
(59, '', '30', '275г', 0, NULL, 6, 30),
(60, '', '30', '275г', 0, NULL, 6, 31),
(61, '', '30', '275г', 0, NULL, 6, 32);

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
('m191004_103840_items_img', 1570520326),
('m191014_064600_items', 1571036115);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `items_img`
--
ALTER TABLE `items_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT для таблицы `items_settings`
--
ALTER TABLE `items_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

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
