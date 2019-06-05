-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2019-06-05 17:20:41
-- 服务器版本： 5.7.24
-- PHP 版本： 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `9c`
--

-- --------------------------------------------------------

--
-- 表的结构 `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `title` varchar(20) NOT NULL COMMENT '标题',
  `intro` varchar(50) NOT NULL COMMENT '简介',
  `classify` char(15) NOT NULL DEFAULT 'web' COMMENT '分类',
  `content` varchar(500) DEFAULT NULL COMMENT '内容',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `name` varchar(20) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `tel` char(11) NOT NULL COMMENT '电话',
  `registration` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `tel` (`tel`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `tel`, `registration`) VALUES
(2, 'AJiu_', '202cb962ac59075b964b07152d234b70', '84682236@qq.com', '18990239906', '2019-06-05 08:19:32');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'AJiu', '846822366@qq.com', 'fc389829a659b0aefdcc73b29ebf8aa1', '2019-06-05 07:41:00', '127.0.0.1'),
(2, 'yolo', '846822367@qq.com', '4fded1464736e77865df232cbcb4cd19', '2019-06-05 07:42:00', '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `yolo`
--

DROP TABLE IF EXISTS `yolo`;
CREATE TABLE IF NOT EXISTS `yolo` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `username` varchar(20) DEFAULT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `age` tinyint(3) UNSIGNED NOT NULL DEFAULT '18' COMMENT '年龄',
  `sex` enum('男','女','保密') NOT NULL DEFAULT '保密' COMMENT '性别',
  `tel` char(11) NOT NULL COMMENT '电话',
  `addr` varchar(50) NOT NULL DEFAULT '自贡' COMMENT '地址',
  `card` char(18) NOT NULL COMMENT '身份证',
  `married` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0表示未婚，1表示已婚',
  `salary` float(8,2) NOT NULL DEFAULT '0.00' COMMENT '薪水',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `tel` (`tel`),
  UNIQUE KEY `card` (`card`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yolo`
--

INSERT INTO `yolo` (`id`, `username`, `password`, `email`, `age`, `sex`, `tel`, `addr`, `card`, `married`, `salary`) VALUES
(1, 'yolo', '123', '846822366@qq.com', 18, '保密', '123', '自贡', '123123123', 0, 0.00),
(2, 'yolo', '123', '846822@qq.com', 22, '男', '11111', '自贡', '11111', 0, 0.00),
(3, 'yolo', '123', '84682236@qq.com', 22, '男', '', '自贡', '123', 0, 0.00),
(4, 'yolo', '111', '8468223@qq.com', 22, '男', '12333', '自贡', '1234', 0, 0.00),
(5, 'yolo', '123', '846822367111111111111111111111111111111111@qq.com', 18, '保密', '1231', '自贡', '15915915915', 0, 0.00);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
