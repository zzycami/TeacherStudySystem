-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2013 年 04 月 25 日 14:41
-- 服务器版本: 5.5.27
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `teacher_study_system`
--

-- --------------------------------------------------------

--
-- 表的结构 `tss_course`
--

CREATE TABLE IF NOT EXISTS `tss_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text COMMENT '课程简介',
  `create_time` int(11) DEFAULT NULL COMMENT '新增日期',
  `grade` varchar(255) DEFAULT NULL COMMENT '课程所属年级',
  `subject` varchar(255) DEFAULT NULL COMMENT '课程所属学科',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='记录每个教师的课程名称、所属年级、所属学科等信息。' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tss_department`
--

CREATE TABLE IF NOT EXISTS `tss_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '部门名称',
  `description` varchar(255) DEFAULT NULL COMMENT '部门描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='部门' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tss_resource_file`
--

CREATE TABLE IF NOT EXISTS `tss_resource_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '文件名称',
  `extension` varchar(255) DEFAULT NULL COMMENT '文件后缀名',
  `folder_id` int(11) DEFAULT NULL COMMENT '文件夹Id',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `size` int(11) DEFAULT NULL COMMENT '文件大小',
  `department` int(11) DEFAULT NULL COMMENT '所属部门',
  `subject` int(11) DEFAULT NULL COMMENT '所属学科',
  `file_type_id` int(11) DEFAULT NULL COMMENT '文件类型Id',
  `url` varchar(255) DEFAULT NULL COMMENT '文件url地址',
  `share` bit(1) DEFAULT NULL COMMENT '是否共享',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='资源文件夹' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tss_resource_file_type`
--

CREATE TABLE IF NOT EXISTS `tss_resource_file_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文件类型' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tss_resource_folder`
--

CREATE TABLE IF NOT EXISTS `tss_resource_folder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folder` varchar(255) DEFAULT NULL COMMENT '文件夹名称',
  `parent_id` int(11) DEFAULT NULL COMMENT '父级文件夹Id',
  `index` int(11) DEFAULT NULL COMMENT '文件夹层次',
  `share` bit(1) DEFAULT NULL COMMENT '是否共享',
  `user_id` int(11) DEFAULT NULL COMMENT '教师ID',
  `create_time` int(11) DEFAULT NULL COMMENT '新增时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='资源文件夹' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tss_subcourse`
--

CREATE TABLE IF NOT EXISTS `tss_subcourse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '课程子栏目名称',
  `type_id` varchar(255) DEFAULT NULL COMMENT '课程子栏目类型ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='课程子栏目表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tss_subcourse_type`
--

CREATE TABLE IF NOT EXISTS `tss_subcourse_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '课程子栏目类型名称',
  `url` varchar(255) DEFAULT NULL COMMENT '课程子栏目类型模板URl',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='课程子栏目类型表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tss_subject`
--

CREATE TABLE IF NOT EXISTS `tss_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学科表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tss_user`
--

CREATE TABLE IF NOT EXISTS `tss_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `password` varchar(255) NOT NULL,
  `gender` tinyint(3) DEFAULT NULL COMMENT '性别',
  `description` text COMMENT '个人资料介绍',
  `photo` varchar(255) DEFAULT NULL COMMENT '照片地址',
  `create_time` int(11) DEFAULT NULL COMMENT '新增时间',
  `subject_id` int(11) DEFAULT NULL COMMENT '学科ID',
  `department_id` varchar(255) DEFAULT NULL COMMENT '部门Id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tss_user`
--

INSERT INTO `tss_user` (`id`, `username`, `email`, `password`, `gender`, `description`, `photo`, `create_time`, `subject_id`, `department_id`) VALUES
(1, 'Zhou.Zeyong', 'zzycami@foxmail.com', 'b9c986b8ccbd0c3826bd0ea645089ae7', NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
