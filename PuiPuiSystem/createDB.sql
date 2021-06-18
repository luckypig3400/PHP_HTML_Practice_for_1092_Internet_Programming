-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-06-18 06:24:21
-- 伺服器版本： 10.4.19-MariaDB
-- PHP 版本： 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE puipuisystemdb;
USE puipuisystemdb;

--
-- 資料庫： `puipuisystemdb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `userID` varchar(60) NOT NULL,
  `FName` varchar(30) NOT NULL,
  `LName` varchar(30) NOT NULL,
  `Email` varchar(66) NOT NULL,
  `Password` varbinary(512) NOT NULL,
  `LastLoginTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lastLoginIP` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`userID`, `FName`, `LName`, `Email`, `Password`, `LastLoginTime`, `lastLoginIP`) VALUES
('adminPuiPui', 'admin', 'PuiPui', 'adminPuiPui@puipui.com', 0x7a16313879aca1a7c3d0fa2b744c17e7c3d8326ec596b9dca48e136a6bd2eb8b12ed32018b8a010a4b39ae7152c7899857b2482200438ce8c49f4416c9494257, '2021-06-17 15:42:14', 'localhost');

-- --------------------------------------------------------

--
-- 資料表結構 `userquestions`
--

CREATE TABLE `userquestions` (
  `QID` int(11) NOT NULL,
  `ownerID` varchar(60) NOT NULL,
  `EditorID` varchar(60) NOT NULL,
  `Subject` varchar(60) NOT NULL,
  `Title` varchar(2048) NOT NULL,
  `Chapter` varchar(96),
  `Correct_Ans` varchar(30),
  `Question` text,
  `Answer1` text,
  `Answer2` text,
  `Answer3` text,
  `Answer4` text,
  `Detailed1` text,
  `Detailed2` text,
  `Detailed3` text,
  `Detailed4` text,
  `CreatedTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastUPDtime` timestamp NOT NULL DEFAULT current_timestamp(),
  `PublishStatus` varchar(3) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `editrecord` (
  `QID` int(11) NOT NULL,
  `publicQID` int(11),
  `ownerID` varchar(60) NOT NULL,
  `LastEditorID` varchar(60) NOT NULL,
  `Subject` varchar(60),
  `Title` varchar(2048),
  `Chapter` varchar(96),
  `Correct_Ans` varchar(30),
  `Question` text,
  `Answer1` text,
  `Answer2` text,
  `Answer3` text,
  `Answer4` text,
  `Detailed1` text,
  `Detailed2` text,
  `Detailed3` text,
  `Detailed4` text,
  `LastUPDtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `publicquestions` (
  `publicQID` int(11),
  `QID` int(11) NOT NULL,
  `ownerID` varchar(60) NOT NULL,
  `PublishTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- 資料表索引 `userquestions`
--
ALTER TABLE `userquestions`
  ADD PRIMARY KEY (`QID`);
  
--
-- 資料表索引 `publicquestions`
--
ALTER TABLE `publicquestions`
  ADD PRIMARY KEY (`publicQID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `userquestions`
--
ALTER TABLE `userquestions`
  MODIFY `QID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `userquestions`
--
ALTER TABLE `publicquestions`
  MODIFY `publicQID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
