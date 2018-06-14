-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018 年 6 朁E14 日 05:54
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE IF NOT EXISTS `gs_bm_table` (
`id` int(12) NOT NULL,
  `book_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `book_URL` text COLLATE utf8_unicode_ci NOT NULL,
  `book_comment` text COLLATE utf8_unicode_ci NOT NULL,
  `book_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `registered_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `book_name`, `book_URL`, `book_comment`, `book_detail`, `lid`, `lpw`, `registered_date`) VALUES
(1, 'PHP本', 'php@php.php', 'php-php-php-php-php-php-php-php-php-php', 'id1の詳細な内容です。id1の詳細な内容です。id1の詳細な内容です。id1の詳細な内容です。', 'php', 'php', '2018-05-29 01:46:25'),
(2, 'JS本', 'js@js.js', 'js-js-js-js-js-js-js-js-js-js-js-js-js-js-js', 'id２の詳細な内容です。id２の詳細な内容です。id２の詳細な内容です。', 'js', 'js', '2018-05-29 01:46:25'),
(3, 'やさしい本', 'easy@easy.easy', 'やさしいやさしいやさしいやさしいやさしいやさしいやさしいやさしい', 'id３の詳細な内容です。id３の詳細な内容です。id３の詳細な内容です。', 'easy', 'easy', '2018-05-29 01:46:25'),
(4, '普通の本', 'dif@dif.dif', '普通ー普通ー普通ー普通ー普通ー普通', 'id４の詳細な内容です。id４の詳細な内容です。id４の詳細な内容です。', 'general', 'general', '2018-05-29 01:46:25'),
(5, '難しい本', 'diff@diff.diff', '難しい難しい難しい難しい難しい難しい難しい', 'id５の詳細な内容です。id５の詳細な内容です。id５の詳細な内容です。', 'difficult', 'difficult', '2018-05-29 01:46:25'),
(6, 'てすと本１', 'test1@test.test', 'test1test1-test1-test-test1-test1-test1-test1-test1-test1', 'id６の詳細な内容です。id６の詳細な内容です。id６の詳細な内容です。', 'test1', 'test1', '2018-05-29 01:46:25'),
(7, 'てすと本２', 'test2@test.test', 'test2-test2-test2-test2-test2-test2-test2-test2-test2-test2', 'id７の詳細な内容です。id７の詳細な内容です。id７の詳細な内容です。', 'test2', 'test2', '2018-05-29 01:46:25'),
(8, 'てすと本３', 'test3@test.test', 'test3-test3-test3-test3-test3-test3-test3-test3-test3-test3', 'id８の詳細な内容です。id８の詳細な内容です。id８の詳細な内容です。', 'test3', 'test3', '2018-05-29 01:46:25'),
(9, 'てすと本４', 'test4@test.test', 'test4-test4-test4-test4-test4-test4-test4-test4-test4-test4', 'id９の詳細な内容です。id９の詳細な内容です。id９の詳細な内容です。', 'test4', 'test4', '2018-05-29 01:46:25'),
(10, 'てすと本５', 'test5@test.test', 'test5-test5-test5-test5-test5-test5-test5-test5-test5-test5-test5', 'id１０の詳細な内容です。id１０の詳細な内容です。id１０の詳細な内容です。', 'test5', 'test5', '2018-05-29 01:46:25'),
(11, '登録テスト本', 'test@test@test', '登録のテスト本です。', '登録のテスト本の詳細です。', '', '', '2018-06-14 04:48:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
