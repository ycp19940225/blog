/*
Navicat MySQL Data Transfer

Source Server         : phpstudy
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-06-02 00:04:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog_admin
-- ----------------------------
DROP TABLE IF EXISTS `blog_admin`;
CREATE TABLE `blog_admin` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `adminname` varchar(32) NOT NULL DEFAULT '' COMMENT '管理员名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `input_id` int(10) NOT NULL DEFAULT '0' COMMENT '录入人员Id',
  `token` varchar(20) NOT NULL DEFAULT '0' COMMENT 'token',
  PRIMARY KEY (`id`),
  UNIQUE KEY `adminname` (`adminname`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_admin
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'ycp', '820363773@qq.com', '$2y$10$BlBRpf1ZSGPAtL/P5yREFuV65CVvuh3jqP81kwmcm2DhkwGqn1WpG', 'CFI1HhDEjMdpMr9Gjfri2Huh4ZOk018S1vwdRC3aswR6n60EJQF9EpEVJm9h', '2017-01-26 14:59:06', '2017-01-26 14:59:06');
INSERT INTO `users` VALUES ('2', 'Mr. Hayley Blanda', 'josefa.beer@example.net', '$2y$10$wAxOXp/pfYI9ndQCIzMZ..Ixz8R2DTHr/tch4Eq0TEMMuqEMC8EEO', 'Mn0iWLBZQd', '2017-01-26 18:52:53', '2017-01-26 18:52:53');
INSERT INTO `users` VALUES ('3', 'Prof. Madelyn Schmitt III', 'nkessler@example.com', '$2y$10$wAxOXp/pfYI9ndQCIzMZ..Ixz8R2DTHr/tch4Eq0TEMMuqEMC8EEO', 'ceVTv4wTHc', '2017-01-26 18:52:54', '2017-01-26 18:52:54');
INSERT INTO `users` VALUES ('4', 'Sydnee Wuckert', 'turcotte.dylan@example.org', '$2y$10$wAxOXp/pfYI9ndQCIzMZ..Ixz8R2DTHr/tch4Eq0TEMMuqEMC8EEO', 'jXcfj38XUI', '2017-01-26 18:52:54', '2017-01-26 18:52:54');
INSERT INTO `users` VALUES ('5', 'Julia Durgan', 'judge67@example.org', '$2y$10$wAxOXp/pfYI9ndQCIzMZ..Ixz8R2DTHr/tch4Eq0TEMMuqEMC8EEO', 'q10ErR6Gcj', '2017-01-26 18:52:54', '2017-01-26 18:52:54');
INSERT INTO `users` VALUES ('6', 'Ebony Reichert', 'joana.gorczany@example.org', '$2y$10$wAxOXp/pfYI9ndQCIzMZ..Ixz8R2DTHr/tch4Eq0TEMMuqEMC8EEO', 'Fu2QljBue7', '2017-01-26 18:52:54', '2017-01-26 18:52:54');
INSERT INTO `users` VALUES ('7', 'Fleta Lesch', 'gthompson@example.com', '$2y$10$wAxOXp/pfYI9ndQCIzMZ..Ixz8R2DTHr/tch4Eq0TEMMuqEMC8EEO', 'RsZBRldtJy', '2017-01-26 18:52:54', '2017-01-26 18:52:54');
INSERT INTO `users` VALUES ('8', 'Prof. Braxton Hills II', 'heather47@example.net', '$2y$10$wAxOXp/pfYI9ndQCIzMZ..Ixz8R2DTHr/tch4Eq0TEMMuqEMC8EEO', 'TJ7cbwhWgN', '2017-01-26 18:52:54', '2017-01-26 18:52:54');
INSERT INTO `users` VALUES ('9', 'Dr. Willard Pagac DDS', 'gutkowski.marge@example.com', '$2y$10$wAxOXp/pfYI9ndQCIzMZ..Ixz8R2DTHr/tch4Eq0TEMMuqEMC8EEO', 'kUTzQzXgP4', '2017-01-26 18:52:54', '2017-01-26 18:52:54');
INSERT INTO `users` VALUES ('10', 'Kiera Roob', 'acassin@example.org', '$2y$10$wAxOXp/pfYI9ndQCIzMZ..Ixz8R2DTHr/tch4Eq0TEMMuqEMC8EEO', 'v3HqopeH0J', '2017-01-26 18:52:54', '2017-01-26 18:52:54');
INSERT INTO `users` VALUES ('11', 'Wilma Lemke', 'yundt.karine@example.org', '$2y$10$wAxOXp/pfYI9ndQCIzMZ..Ixz8R2DTHr/tch4Eq0TEMMuqEMC8EEO', 'q41aE6W1Wt', '2017-01-26 18:52:54', '2017-01-26 18:52:54');
