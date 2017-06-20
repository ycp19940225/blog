/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-06-20 14:46:09
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of blog_admin
-- ----------------------------
INSERT INTO `blog_admin` VALUES ('20', 'test2ssd', '447910ff7241c373129b8761cc312c78', '', '1496653451', '1496827637', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('27', 'test2ssrrr', 'fed6fb05c04e7e31bc5a91b25834281f', '', '1496818749', '1496823066', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('28', 'afafa', '220a942773547a88f1aa3b73938103f5', '', '1496818812', '1496818812', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('29', 'afafad', '220a942773547a88f1aa3b73938103f5', '', '1496818822', '1496818822', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('30', 'fa', 'a964973f5c5d142c6c23c6809d8bfd46', '', '1496818829', '1496818829', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('31', 'ddd', '8870e3955bd21061393b59c7ed98de25', '', '1496818849', '1496818849', '0', '0', '0', '0');

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
INSERT INTO `blog_admin_role` VALUES ('20', '5');

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
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8 COMMENT='权限表';

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
INSERT INTO `blog_privilege` VALUES ('86', '刷新权限', '刷新权限', 'Admin', 'Privilege', 'addOperate', '1497927205', '1497940866', '0');
INSERT INTO `blog_privilege` VALUES ('90', '后台角色首页', '后台角色首页', 'Admin', 'Role', 'index', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('91', '添加角色页面', '添加角色', 'Admin', 'Role', 'add', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('92', '添加操作', '添加操作', 'Admin', 'Role', 'addOperate', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('93', '修改页面', '修改页面', 'Admin', 'Role', 'edit', '1497927205', '1497941141', '0');
INSERT INTO `blog_privilege` VALUES ('94', '修改操作', '修改操作', 'Admin', 'Role', 'editOperate', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('95', '删除角色', '删除角色', 'Admin', 'Role', 'delete', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('96', '为管理员分配角色', '为管理员分配角色', 'Admin', 'Role', 'addUser', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('98', '为管理员分配角色', '为管理员分配角色', 'Admin', 'Role', 'addUserOperate', '1497930208', '1497941079', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='角色表';

-- ----------------------------
-- Records of blog_role
-- ----------------------------
INSERT INTO `blog_role` VALUES ('5', 'ffff', '1497939509', '1497939509', '0', '0');

-- ----------------------------
-- Table structure for blog_role_pri
-- ----------------------------
DROP TABLE IF EXISTS `blog_role_pri`;
CREATE TABLE `blog_role_pri` (
  `pri_id` mediumint(8) unsigned NOT NULL COMMENT '权限Id',
  `role_id` mediumint(8) unsigned NOT NULL COMMENT '角色Id',
  KEY `pri_id` (`pri_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色权限表';

-- ----------------------------
-- Records of blog_role_pri
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2', '2017_06_08_061045_create_role_table', '1');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
