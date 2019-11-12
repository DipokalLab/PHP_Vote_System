-- phpMyAdmin SQL Dump
-- version 5.0.0-alpha1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 19-11-12 18:28
-- 서버 버전: 5.6.20
-- PHP 버전: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `votesystem`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `stu`
--

CREATE TABLE `stu` (
  `idx` int(11) NOT NULL,
  `Id` varchar(122) NOT NULL,
  `pw` varchar(254) NOT NULL,
  `hakbun` int(12) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `votelist`
--

CREATE TABLE `votelist` (
  `idx` int(3) NOT NULL,
  `teamname` varchar(50) NOT NULL,
  `teamtype` varchar(35) NOT NULL,
  `ck` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `votelog`
--

CREATE TABLE `votelog` (
  `idx` int(9) NOT NULL,
  `Id` varchar(244) NOT NULL,
  `idxq` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `stu`
--
ALTER TABLE `stu`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `votelist`
--
ALTER TABLE `votelist`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `votelog`
--
ALTER TABLE `votelog`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `stu`
--
ALTER TABLE `stu`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `votelist`
--
ALTER TABLE `votelist`
  MODIFY `idx` int(3) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `votelog`
--
ALTER TABLE `votelog`
  MODIFY `idx` int(9) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

