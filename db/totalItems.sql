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
-- 테이블 구조 `totalItems`
--

CREATE TABLE `totalItems` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `tag` varchar(10) DEFAULT NULL,
  `sellerId` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `totalItems`
--

INSERT INTO `totalItems` (`id`, `name`, `description`, `price`, `image_url`, `created_at`, `tag`, `sellerId`) VALUES
(1, '맥북 13인치 노트북 파우치 ', '텐바이텐에서 구매했습니다. 상태 좋아요! ', '12000', 'https://contents.sixshop.com/thumbnails/uploadedFiles/56465/product/image_1567333518415_1000.jpg', '2023-06-01', '전자기기', 'jaewoo'),
(2, '아이패드 에어 5세대', '깔끔하게 사용해서 거의 새거입니다. 네고 가능요', '700000', 'https://post-phinf.pstatic.net/MjAyMjA0MjFfMjcy/MDAxNjUwNTQyNjg2NTYx.UutMwQB2p8dQSPYhjoT6dRAxC0rFTYhA2-A7I-AYnx8g.nmWER_i4y3q65x0zbVcorz4Opha_muDY6IIvLMO3Svgg.JPEG/DSC02160.JPG?type=w1200', '2023-06-02', '전자기기', 'jaewoo'),
(3, 'Modoo전기자전거', '수업 이동할 때 편리합니다. 속도 빠르고 충전도 금방돼요', '150000', 'https://blog.kakaocdn.net/dn/cqFeVC/btrzdagBmRS/V1kQYGUjajNz58FgnxVN7k/img.jpg', '2023-06-03', '운동기구', 'jaeowo'),
(7, '악력 강화 스프링 핸드 그립', '악력 강화용 스프링 핸드 그립입니다. 손 작은사람도 충분히 사용 가능해요. 알리익스프레스에서 구매했고 2주 정도 사용했습니다. ', '10000', 'https://ae01.alicdn.com/kf/Sac7ff89683d44405af72863da5f0dbac3/-.jpg_Q90.jpg_.webp', '2023-06-03', '헬스/운동용품', NULL),
(8, 'LG 룸앤티비 27TN600S 팝니다', 'TV 박스포함 풀셋 전용가방 전용거치대 포함해서 판매합니다 네고 죄송합니다', '320000', 'https://media.bunjang.co.kr/product/214559785_2_1685535391_w856.jpg', '2023-06-04', '전자기기', NULL),
(9, '구글 크롬캐스트 4k', '구글 크롬캐스트 4k 현재 박스에 보관 중, 2개 있어서 하나 정리합니다', '62000', 'https://media.bunjang.co.kr/product/225677834_1_1685706688_w856.jpg', '2023-06-05', '전자기기', NULL),
(10, '스투시 후드티', '상태는 좋은편이구요 소매끝 헤짐 있습니다', '55000', 'https://media.bunjang.co.kr/product/225583959_5_1685445411_w856.jpg', '2023-06-04', '패션', 'dndnd'),
(11, '폴로 랄프로렌 니트', '사이즈:s 니트 깔끔하고 무난하게 입기 좋아요 하자 없고 핏 정말 이쁩니당!!', '20000', 'https://media.bunjang.co.kr/product/223134275_4_1685356150_w856.jpg', '2023-06-07', '패션', NULL),
(12, '스투시 후드티', '상태는 좋은편이구요 소매끝 헤짐 있습니다', '55000', 'https://media.bunjang.co.kr/product/225583959_5_1685445411_w856.jpg', '2023-06-04', '패션', NULL),
(14, '카시오 시계팝니다요', '2만원에 쿨거해요', '20000', 'https://image.msscdn.net/images/goods_img/20220126/2329969/2329969_1_500.jpg', '2023-06-04', '패션', 'jew123'),
(15, '다이슨 진공 청소기 팔아요', '다이슨이잖아요 말이 필요없습니다. 1년정도 사용했고 반값에 팔아봅니다.', '590000', 'https://www.fnnews.com/resource/media/image/2019/11/13/201911131010049636_l.jpg', '2023-06-04', '생활용품', 'jew123'),
(16, '필립스 블렌더 팔아요', '다 갈아버리는 블렌더입니다. 딱딱한 과일도 잘 갈려요. 새거같습니다.', '60000', 'https://images.philips.com/is/image/philipsconsumer/b82352e184864fe5b02cad2801245f47?$jpglarge$&wid=1250', '2023-06-06', '생활용품', 'jew123'),
(17, '카리스 스탠드 다림판', '셔츠 다림용으로 자주 쓰던 다림판 팔아봅니다.', '42900', 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcS1sT83Q4qvVI7WSj_Zfkv_jeSbZpreAlDdU-bSSfKiPUDcjWVmlFQd5LiDXjsCuoL87AJnWPbk3oz9KwaHrI02kIARFpE3aQ&usqp=CAE', '2023-06-06', '생활용품', 'jew123'),
(18, '운영체제 책(공룡책) 팝니다', '공룡책이라 불리는 가장 유명한 OS책입니다. 이 책의 단점은 어렵다는거 말곤 없습니다. 저는 라면 받침판으로 썼네요.', '29000', 'https://image.yes24.com/goods/89496122/XL', '2023-06-06', '책', 'jew123'),
(19, '컴퓨터구조 책 팝니다', '혼자 공부할라고 샀다가 안보게 돼서 팝니다.\r\n완전 깨끗해요 정가 3.5인데 2.9에 팔아봅니다', '29000', 'https://image.aladin.co.kr/product/5264/19/cover500/s422635174_1.jpg', '2023-06-06', '책', 'jew123'),
(20, '자료구조 책 팔아요', ' 필기감 살짝 있지만 상태 좋습니다. 파이썬으로 하는 자료구조에용', '10000', 'https://image.yes24.com/goods/74971408/XL', '2023-06-06', '책', 'jew123'),
(21, '허먼밀러 의자 팝니다', '회사에서 몰래 가져왔습니다.', '1800000', 'https://img.danawa.com/prod_img/500000/280/855/img/16855280_1.jpg?_v=20230112170402', '2023-06-06', '가구', 'jew123'),
(22, '매트리스 팔아요', '자취생 필수템인거 아시죠?\r\n반값에 팝니다. 네고는 안대요', '120000', 'https://image.ohou.se/i/bucketplace-v2-development/uploads/productions/1554432441250_K6wX5dopzz.jpg?gif=1&w=720&h=480&c=c', '2023-06-06', '가구', 'jew123'),
(23, '아령 팝니다.', '8kg 아령 팔아봅니다. \r\n네고는 안됩니다.', '10000', 'https://egojin.com/web/product/big/202111/c37c514606310b0fd2b826d5ff6c6240.jpg', '2023-06-06', '헬스/운동용품', 'jaewoo123');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `totalItems`
--
ALTER TABLE `totalItems`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `totalItems`
--
ALTER TABLE `totalItems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
