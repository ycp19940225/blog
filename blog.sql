/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-07-11 16:12:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog_admin
-- ----------------------------
DROP TABLE IF EXISTS `blog_admin`;
CREATE TABLE `blog_admin` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `adminname` varchar(32) NOT NULL DEFAULT '' COMMENT '管理员名',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '密码',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `input_id` int(10) NOT NULL DEFAULT '0' COMMENT '录入人员Id',
  `token` varchar(20) NOT NULL DEFAULT '0' COMMENT 'token',
  `deleted_at` tinyint(5) NOT NULL DEFAULT '0',
  `role_id` tinyint(5) NOT NULL DEFAULT '0' COMMENT '角色ID',
  PRIMARY KEY (`id`),
  UNIQUE KEY `adminname` (`adminname`),
  KEY `role_id` (`role_id`) COMMENT '角色'
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of blog_admin
-- ----------------------------
INSERT INTO `blog_admin` VALUES ('1', 'ycp', '447910ff7241c373129b8761cc312c78', 'http://oskmbo3g0.bkt.clouddn.com/2017/07/05-17:53:55-/V7oZMskqLiep33XLHdfMZHCqI9SYKc7FGbbFhYO7.jpeg', '', '1498118813', '1499248436', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('20', 'test2ssdkfffff', '79729544f5269e36f51cf9c18b1a9a72', '', '', '1496653451', '1499161319', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('27', 'test2ssrrr', 'fed6fb05c04e7e31bc5a91b25834281f', '', '', '1496818749', '1496823066', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('28', 'afafa', '220a942773547a88f1aa3b73938103f5', '', '', '1496818812', '1496818812', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('29', 'afafad', '220a942773547a88f1aa3b73938103f5', '', '', '1496818822', '1496818822', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('30', 'fa22233333ff', 'a964973f5c5d142c6c23c6809d8bfd46', '', '', '1496818829', '1498816152', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('33', 'test', 'cb3b3845bf2402c6f436aac097332517', '', '', '1498188532', '1498203875', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('35', 'dd', 'cfcda2fb6e3d1f00505962a486e9c5ae', '', '', '1498201721', '1498201721', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for blog_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `blog_admin_role`;
CREATE TABLE `blog_admin_role` (
  `admin_id` mediumint(9) NOT NULL COMMENT '管理员Id',
  `role_id` mediumint(9) NOT NULL COMMENT '角色Id',
  KEY `admin_id` (`admin_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员角色表';

-- ----------------------------
-- Records of blog_admin_role
-- ----------------------------
INSERT INTO `blog_admin_role` VALUES ('29', '4');
INSERT INTO `blog_admin_role` VALUES ('20', '4');
INSERT INTO `blog_admin_role` VALUES ('78', '5');
INSERT INTO `blog_admin_role` VALUES ('20', '5');
INSERT INTO `blog_admin_role` VALUES ('1', '1');
INSERT INTO `blog_admin_role` VALUES ('33', '6');

-- ----------------------------
-- Table structure for blog_article
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `title` varchar(32) NOT NULL DEFAULT '' COMMENT '标题',
  `intro` varchar(255) NOT NULL DEFAULT '' COMMENT '简介',
  `content` text NOT NULL COMMENT '内容',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `input_id` int(10) NOT NULL DEFAULT '0' COMMENT '录入人员Id',
  `deleted_at` tinyint(5) NOT NULL DEFAULT '0',
  `tag_id` tinyint(5) NOT NULL DEFAULT '0' COMMENT '标签ID',
  `views` tinyint(5) NOT NULL DEFAULT '0' COMMENT '访问次数',
  PRIMARY KEY (`id`),
  KEY `tag_id` (`tag_id`) COMMENT '标签ID'
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of blog_article
-- ----------------------------
INSERT INTO `blog_article` VALUES ('36', 'test', 'test', 'test![\\145f2234f781de21d1305617ebf5acd2.jpg][0.1659161953890318]\r\n\r\n  [0.1659161953890318]: http://www.blog.com/uploads/2017-07-11/29e4aa85e2a03c7958aeddd15dc9256c.jpg', '1499758458', '1499759889', '0', '1', '0', '0');
INSERT INTO `blog_article` VALUES ('37', 'test2', 'test2', 'ss', '1499758651', '1499759883', '0', '1', '0', '0');
INSERT INTO `blog_article` VALUES ('38', 'tttt', 'tttt', 'ttttt', '1499758694', '1499759863', '1', '1', '0', '0');
INSERT INTO `blog_article` VALUES ('39', 'dd', 'ddd', '![\\3fc8df313a6edcfc93b0429fcb127b1a.jpg][0.00934975749531719]dddd\r\n\r\n  [0.00934975749531719]: http://www.blog.com/uploads/2017-07-11/8969e3d3b6f89de9beaf908dec3abdee.jpg', '1499759897', '1499760114', '1', '0', '0', '0');
INSERT INTO `blog_article` VALUES ('40', 'dd', 'ddddd', 'dddddd![\\7d62a6ea44c8a8b38ac04c4e3f0154eb.jpg][0.8360272161167559]\r\n\r\n  [0.8360272161167559]: http://www.blog.com/uploads/2017-07-11/d8b7c5fc78243556554a4bcf3c76a2a5.jpg', '1499760131', '1499760147', '1', '1', '0', '0');

-- ----------------------------
-- Table structure for blog_category
-- ----------------------------
DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE `blog_category` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '分类名',
  `intro` varchar(255) NOT NULL DEFAULT '' COMMENT '简介',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `input_id` int(10) NOT NULL DEFAULT '0' COMMENT '录入人员Id',
  `deleted_at` tinyint(5) NOT NULL DEFAULT '0',
  `article_id` tinyint(5) NOT NULL DEFAULT '0' COMMENT '文章ID',
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`) COMMENT '文章ID'
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='文章分类表';

-- ----------------------------
-- Records of blog_category
-- ----------------------------

-- ----------------------------
-- Table structure for blog_privilege
-- ----------------------------
DROP TABLE IF EXISTS `blog_privilege`;
CREATE TABLE `blog_privilege` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `pri_name` varchar(30) NOT NULL DEFAULT '' COMMENT '权限名称',
  `pri_desc` varchar(30) NOT NULL DEFAULT '' COMMENT '权限描述',
  `module_name` varchar(30) NOT NULL DEFAULT '' COMMENT '权限名称',
  `controller` varchar(30) NOT NULL DEFAULT '' COMMENT '控制器名称',
  `action_name` varchar(30) NOT NULL DEFAULT '' COMMENT '方法名称',
  `created_at` int(10) NOT NULL DEFAULT '0',
  `updated_at` int(10) NOT NULL DEFAULT '0',
  `deleted_at` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8 COMMENT='权限表';

-- ----------------------------
-- Records of blog_privilege
-- ----------------------------
INSERT INTO `blog_privilege` VALUES ('77', '后台管理员首页', '后台管理员首页', 'Admin', 'Admin', 'index', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('78', '添加管理员页面', '添加管理员', 'Admin', 'Admin', 'add', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('79', '添加操作', '添加操作', 'Admin', 'Admin', 'addOperate', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('80', '修改页面', '修改页面', 'Admin', 'Admin', 'edit', '1497927205', '1497927324', '0');
INSERT INTO `blog_privilege` VALUES ('81', '修改操作', '修改操作', 'Admin', 'Admin', 'editOperate', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('82', '删除用户', '删除用户', 'Admin', 'Admin', 'delete', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('83', '后台首页', '后台首页', 'Admin', 'Index', 'index', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('84', '权限首页', '权限首页', 'Admin', 'Privilege', 'index', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('90', '后台角色首页', '后台角色首页', 'Admin', 'Role', 'index', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('91', '添加角色页面', '添加角色', 'Admin', 'Role', 'add', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('92', '添加操作', '添加操作', 'Admin', 'Role', 'addOperate', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('93', '修改页面', '修改页面', 'Admin', 'Role', 'edit', '1497927205', '1497941141', '0');
INSERT INTO `blog_privilege` VALUES ('94', '修改操作', '修改操作', 'Admin', 'Role', 'editOperate', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('95', '删除角色', '删除角色', 'Admin', 'Role', 'delete', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('96', '为管理员分配角色列表', '为管理员分配角色', 'Admin', 'Role', 'addUser', '1497927205', '1497946911', '0');
INSERT INTO `blog_privilege` VALUES ('100', '刷新权限', '刷新权限', 'Admin', 'Privilege', 'refresh', '1497946735', '1497946735', '0');
INSERT INTO `blog_privilege` VALUES ('102', '为管理员分配角色操作', '为管理员分配角色', 'Admin', 'Role', 'addUserOperate', '1497946855', '1497946911', '0');
INSERT INTO `blog_privilege` VALUES ('103', '更新添加角色权限', '更新添加角色权限', 'Admin', 'Privilege', 'updateRolePri', '1498008120', '1498008120', '0');

-- ----------------------------
-- Table structure for blog_role
-- ----------------------------
DROP TABLE IF EXISTS `blog_role`;
CREATE TABLE `blog_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `created_at` int(10) NOT NULL DEFAULT '0',
  `updated_at` int(10) NOT NULL DEFAULT '0',
  `input_id` int(11) NOT NULL DEFAULT '0' COMMENT '录入人ID',
  `deleted_at` tinyint(5) NOT NULL DEFAULT '0' COMMENT '删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='角色表';

-- ----------------------------
-- Records of blog_role
-- ----------------------------
INSERT INTO `blog_role` VALUES ('1', '超级管理员', '1497939509', '1498025253', '0', '0');
INSERT INTO `blog_role` VALUES ('6', 'test', '1498188946', '1498188946', '0', '0');

-- ----------------------------
-- Table structure for blog_role_pri
-- ----------------------------
DROP TABLE IF EXISTS `blog_role_pri`;
CREATE TABLE `blog_role_pri` (
  `pri_id` mediumint(8) unsigned NOT NULL COMMENT '权限Id',
  `role_id` mediumint(8) unsigned NOT NULL COMMENT '角色Id',
  `status` tinyint(5) NOT NULL DEFAULT '0',
  KEY `pri_id` (`pri_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色权限表';

-- ----------------------------
-- Records of blog_role_pri
-- ----------------------------
INSERT INTO `blog_role_pri` VALUES ('77', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('78', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('79', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('80', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('81', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('82', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('83', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('84', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('90', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('91', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('92', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('93', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('94', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('95', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('96', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('100', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('102', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('103', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('77', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('78', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('79', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('80', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('81', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('82', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('83', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('84', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('90', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('91', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('92', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('93', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('94', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('95', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('96', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('100', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('102', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('103', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('77', '6', '0');
INSERT INTO `blog_role_pri` VALUES ('78', '6', '0');
INSERT INTO `blog_role_pri` VALUES ('79', '6', '0');
INSERT INTO `blog_role_pri` VALUES ('80', '6', '0');
INSERT INTO `blog_role_pri` VALUES ('81', '6', '0');
INSERT INTO `blog_role_pri` VALUES ('82', '6', '0');

-- ----------------------------
-- Table structure for blog_tag
-- ----------------------------
DROP TABLE IF EXISTS `blog_tag`;
CREATE TABLE `blog_tag` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '标签名',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `input_id` int(10) NOT NULL DEFAULT '0' COMMENT '录入人员Id',
  `deleted_at` tinyint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='文章标签表';

-- ----------------------------
-- Records of blog_tag
-- ----------------------------

-- ----------------------------
-- Table structure for blog_tag_article
-- ----------------------------
DROP TABLE IF EXISTS `blog_tag_article`;
CREATE TABLE `blog_tag_article` (
  `tag_id` int(11) NOT NULL DEFAULT '0',
  `article_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_tag_article
-- ----------------------------

-- ----------------------------
-- Table structure for chat_messages
-- ----------------------------
DROP TABLE IF EXISTS `chat_messages`;
CREATE TABLE `chat_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of chat_messages
-- ----------------------------
INSERT INTO `chat_messages` VALUES ('1', 'Howdy everyone', '2', '2017-07-03 16:43:42', '2017-07-03 16:43:42');
INSERT INTO `chat_messages` VALUES ('2', 'Howdy everyone', '2', '2017-07-03 16:44:42', '2017-07-03 16:44:42');
INSERT INTO `chat_messages` VALUES ('3', 'Howdy everyone', '2', '2017-07-03 16:47:07', '2017-07-03 16:47:07');
INSERT INTO `chat_messages` VALUES ('4', 'Howdy everyone', '2', '2017-07-03 16:47:28', '2017-07-03 16:47:28');
INSERT INTO `chat_messages` VALUES ('5', 'Howdy everyone', '2', '2017-07-03 16:48:52', '2017-07-03 16:48:52');
INSERT INTO `chat_messages` VALUES ('6', 'Howdy everyone', '2', '2017-07-03 16:49:02', '2017-07-03 16:49:02');
INSERT INTO `chat_messages` VALUES ('7', 'Howdy everyone', '2', '2017-07-03 16:49:26', '2017-07-03 16:49:26');
INSERT INTO `chat_messages` VALUES ('8', 'Howdy everyone', '2', '2017-07-03 16:50:33', '2017-07-03 16:50:33');
INSERT INTO `chat_messages` VALUES ('9', 'Howdy everyone', '2', '2017-07-03 16:51:16', '2017-07-03 16:51:16');
INSERT INTO `chat_messages` VALUES ('10', 'Howdy everyone', '2', '2017-07-03 17:03:21', '2017-07-03 17:03:21');
INSERT INTO `chat_messages` VALUES ('11', 'Howdy everyone', '2', '2017-07-03 17:05:54', '2017-07-03 17:05:54');
INSERT INTO `chat_messages` VALUES ('12', 'Howdy everyone', '2', '2017-07-03 17:07:04', '2017-07-03 17:07:04');
INSERT INTO `chat_messages` VALUES ('13', 'Howdy everyone', '2', '2017-07-03 17:07:14', '2017-07-03 17:07:14');
INSERT INTO `chat_messages` VALUES ('14', 'Howdy everyone', '2', '2017-07-03 17:08:06', '2017-07-03 17:08:06');
INSERT INTO `chat_messages` VALUES ('15', 'Howdy everyone', '2', '2017-07-03 17:11:05', '2017-07-03 17:11:05');
INSERT INTO `chat_messages` VALUES ('16', 'Howdy everyone', '2', '2017-07-03 17:11:41', '2017-07-03 17:11:41');
INSERT INTO `chat_messages` VALUES ('17', 'Howdy everyone', '2', '2017-07-03 17:14:19', '2017-07-03 17:14:19');
INSERT INTO `chat_messages` VALUES ('18', 'Howdy everyone', '2', '2017-07-03 17:14:57', '2017-07-03 17:14:57');
INSERT INTO `chat_messages` VALUES ('19', 'Howdy everyone', '2', '2017-07-03 17:15:10', '2017-07-03 17:15:10');
INSERT INTO `chat_messages` VALUES ('20', 'Howdy everyone', '2', '2017-07-03 17:15:21', '2017-07-03 17:15:21');
INSERT INTO `chat_messages` VALUES ('21', 'Howdy everyone', '2', '2017-07-03 17:15:45', '2017-07-03 17:15:45');
INSERT INTO `chat_messages` VALUES ('22', 'Howdy everyone', '2', '2017-07-03 17:18:44', '2017-07-03 17:18:44');
INSERT INTO `chat_messages` VALUES ('23', 'Howdy everyone', '2', '2017-07-03 17:30:13', '2017-07-03 17:30:13');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2', '2017_06_08_061045_create_role_table', '1');
INSERT INTO `migrations` VALUES ('3', '2017_07_03_163619_create_chat_messages_table', '2');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('2', 'ycp', '820363773@qq.com', '$2y$10$De1MgZ4mmCTBnk071DAbNe4U0rV4rQBh9h7ef4MRCJjX5goNCMep.', 'AeVgvdf1mS6udHrPNAbZEsn00nepdeqrH07RN11cmIXCJ38lYNUyVYABVw9I', '2017-06-20 09:53:51', '2017-06-20 09:53:51');
