-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 23-06-09 12:29
-- 서버 버전: 10.4.27-MariaDB
-- PHP 버전: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `test`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `board`
--

CREATE TABLE `board` (
  `bid` int(11) NOT NULL,
  `userid` varchar(45) DEFAULT NULL,
  `subject` varchar(245) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `regdate` datetime DEFAULT current_timestamp(),
  `modifydate` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `parent_id` int(11) DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`bid`, `userid`, `subject`, `content`, `regdate`, `modifydate`, `status`, `parent_id`, `likes`) VALUES
(1, 'example_user', 'Example Subject', 'This is an example content.', '2023-05-30 09:43:06', NULL, 1, NULL, 1),
(6, 'hong', '두 번째 글..', '하이', '2023-05-31 00:11:44', NULL, 1, NULL, 0),
(7, 'hong', '두 번째 글..', '하이', '2023-05-31 00:11:51', NULL, 1, NULL, 0),
(8, 'hong', '세번째 글입니다만?', '하이..', '2023-05-31 00:19:47', NULL, 1, NULL, 1),
(9, 'hong', '네번째ㅑ요..', 'ㅅㅅㅅㅅ', '2023-05-31 00:20:07', NULL, 1, NULL, 0),
(10, 'jew123', '[e-learning 개론 수업 시간 외의 과제 수행 질문 - 02분반 4조] 수정됨', '크하하하!!!fsadfsda', '2023-05-31 00:45:39', NULL, 1, NULL, 1),
(11, 'jew123', '최신으로 만들어주지!', '얍', '2023-05-31 00:53:10', NULL, 1, NULL, 0),
(12, 'jew123', 'fsadfsda', 'fsdafsdafdsa', '2023-05-31 01:16:36', NULL, 1, NULL, 0),
(13, 'jew123', '[RE]최신으로 만들어주지!', '얍', '2023-05-31 01:20:00', NULL, 1, 11, 0),
(14, 'jew123', '[RE][e-learning 개론 수업 시간 외의 과ㄹㅁㄴㅇㄹㅇㄴㅁ제 수행 질문 - 02분반 4조] 수정됨', '크하하하!!!fsadfsda', '2023-05-31 01:20:09', NULL, 1, 10, 0),
(15, 'pas4976', 'sex', 'sex', '2023-05-31 10:59:03', NULL, 0, NULL, 0),
(16, 'seung', '한 번만', '만져주세요', '2023-05-31 15:04:38', NULL, 1, NULL, 7),
(17, 'jew123', 'gdㅎㅇ', 'ㅎㅇㅎㅇ', '2023-06-03 13:00:42', NULL, 0, NULL, 0),
(18, 'jew123', '글 등록하기', '안녕!', '2023-06-03 14:56:09', NULL, 1, NULL, 2),
(19, 'jew123', 'fsdafasdf', 'sdafdsfsdaf', '2023-06-05 00:37:46', NULL, 1, NULL, 6),
(20, 'jew123', '나는 바보야', 'ㄹ언마ㅣ러아님렁ㄴ마', '2023-06-06 03:27:27', NULL, 1, NULL, 1),
(21, 'jew123', '안녕하숑?', '하이루하이루', '2023-06-06 14:57:11', NULL, 1, NULL, 1),
(22, 'jewoo010', '오늘은 React 공부를 했습니다.', '정말 정말 재밌어요.', '2023-06-06 19:38:40', '2023-06-06 19:43:41', 1, NULL, 0),
(23, 'jewoo010', '[RE]오늘은 React 공부를 했습니다.', '저도 해봤는데 너무 재밌어요', '2023-06-06 19:46:38', NULL, 1, 22, 0),
(24, 'jaewoo123', '자바스크립트는 정말 재밌다.', '오늘은 콜백함수를 공부해보았다.', '2023-06-06 21:13:59', NULL, 1, NULL, 1),
(25, 'jew123', '[RE]자바스크립트는 정말 재밌다.', '오늘은 콜백함수를 공부해보았다.', '2023-06-09 17:29:13', NULL, 0, 24, 0),
(26, 'jewoo010', '텀 프로젝트 글 테스트', '테스트 입니다.', '2023-06-09 17:37:17', NULL, 0, NULL, 1),
(27, 'jewoo010', '텀프로젝트 테스트 글', '텀프로젝트 발표중입니다!', '2023-06-09 17:53:04', NULL, 1, NULL, 1),
(28, 'jewoo010', '[RE]텀프로젝트 테스트 글', '텀프로젝트 발표중입니다!', '2023-06-09 17:53:18', NULL, 0, 27, 0);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`bid`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
