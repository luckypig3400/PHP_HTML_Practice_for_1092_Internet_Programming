-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-05-23 02:10:33
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db_note`
--

-- --------------------------------------------------------

--
-- 資料表結構 `note`
--

CREATE TABLE `note` (
  `ID` int(11) NOT NULL,
  `Title` varchar(64) NOT NULL,
  `Description` mediumtext NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `note`
--

INSERT INTO `note` (`ID`, `Title`, `Description`, `Time`) VALUES
(1, 'test1', 'fdsgsdf\r\nfg\r\nfdsgfkgfd\r\nfgdsgfd\r\nfdsgripkgtrht\r\nfdghdh', '2021-05-14 07:16:22'),
(5, 'test3', 'wow Cool\r\nＥｄｉｔｅｄ　ｗｉｔｈ　ＰＨＰ\r\n', '2021-05-14 10:59:21'),
(6, '666', 'Finished ~完成惹\r\n留言板ＯｗＯ', '2021-05-14 11:04:47');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`ID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `note`
--
ALTER TABLE `note`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
