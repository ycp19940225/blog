/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-08-01 11:32:23
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of blog_admin
-- ----------------------------
INSERT INTO `blog_admin` VALUES ('1', 'ycp', '447910ff7241c373129b8761cc312c78', 'http://oskmbo3g0.bkt.clouddn.com/2017/07/17-14:53:19-/dS3Rx22BQb1Nxp8qGKe8XMPULBOj5Qm1jD70WqmM.jpeg', '', '1498118813', '1500274401', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('20', 'test2ssdkfffff', '79729544f5269e36f51cf9c18b1a9a72', '', '', '1496653451', '1499161319', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('27', 'test2ssrrr', 'fed6fb05c04e7e31bc5a91b25834281f', '', '', '1496818749', '1496823066', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('28', 'afafa', '220a942773547a88f1aa3b73938103f5', '', '', '1496818812', '1496818812', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('29', 'afafad', '220a942773547a88f1aa3b73938103f5', '', '', '1496818822', '1496818822', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('30', 'fa22233333ff', 'a964973f5c5d142c6c23c6809d8bfd46', '', '', '1496818829', '1498816152', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('33', 'test', 'cb3b3845bf2402c6f436aac097332517', '', '', '1498188532', '1498203875', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('35', 'dd', 'cfcda2fb6e3d1f00505962a486e9c5ae', '', '', '1498201721', '1498201721', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('36', 'test_blog', 'fed6fb05c04e7e31bc5a91b25834281f', 'http://oskmbo3g0.bkt.clouddn.com/2017/07/14-17:57:34-/BLSXBaSrIRQ3vV231hAXCL0pJrz1ahjwzloW0AqS.jpeg', '', '1500026032', '1500026256', '0', '0', '0', '0');

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
INSERT INTO `blog_admin_role` VALUES ('36', '7');

-- ----------------------------
-- Table structure for blog_article
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `intro` varchar(255) NOT NULL DEFAULT '' COMMENT '简介',
  `content` text NOT NULL COMMENT '内容',
  `cat_id` int(10) NOT NULL DEFAULT '0',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `input_id` int(10) NOT NULL DEFAULT '0' COMMENT '录入人员Id',
  `deleted_at` tinyint(5) NOT NULL DEFAULT '0',
  `views` tinyint(5) NOT NULL DEFAULT '0' COMMENT '访问次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=116 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of blog_article
-- ----------------------------

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COMMENT='文章分类表';

-- ----------------------------
-- Records of blog_category
-- ----------------------------

-- ----------------------------
-- Table structure for blog_comments
-- ----------------------------
DROP TABLE IF EXISTS `blog_comments`;
CREATE TABLE `blog_comments` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `content` text CHARACTER SET utf8mb4 NOT NULL COMMENT '内容',
  `user_id` int(10) NOT NULL DEFAULT '0',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `article_id` int(10) NOT NULL DEFAULT '0' COMMENT '文章Id',
  `deleted_at` tinyint(5) NOT NULL DEFAULT '0',
  `parent_id` int(255) NOT NULL DEFAULT '0' COMMENT '父评论ID',
  `reviewed` tinyint(5) NOT NULL DEFAULT '1' COMMENT '是否通过审核',
  `comment_info` varchar(255) NOT NULL DEFAULT '' COMMENT '没有注册登录时的评论人信息',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=248 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of blog_comments
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
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8 COMMENT='权限表';

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
INSERT INTO `blog_privilege` VALUES ('104', '博客首页', '博客首页', 'Admin', 'Article', 'index', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('105', '添加文章页面', '添加文章页面', 'Admin', 'Article', 'add', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('106', '添加文章操作', '添加文章操作', 'Admin', 'Article', 'addOperate', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('107', '修改页面', '修改页面', 'Admin', 'Article', 'edit', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('108', '修改操作', '修改操作', 'Admin', 'Article', 'editOperate', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('109', '删除文章', '删除文章', 'Admin', 'Article', 'delete', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('110', '获取全部标签', '获取全部标签', 'Admin', 'Article', 'getTags', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('111', '分类首页', '分类首页', 'Admin', 'Cat', 'index', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('112', '添加分类页面', '添加分类页面', 'Admin', 'Cat', 'add', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('113', '添加分类操作', '添加分类操作', 'Admin', 'Cat', 'addOperate', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('114', '修改页面', '修改页面', 'Admin', 'Cat', 'edit', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('115', '修改操作', '修改操作', 'Admin', 'Cat', 'editOperate', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('116', '删除分类', '删除分类', 'Admin', 'Cat', 'delete', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('117', '标签首页', '标签首页', 'Admin', 'Tag', 'index', '1500025996', '1500025996', '0');
INSERT INTO `blog_privilege` VALUES ('118', '添加标签页面', '添加标签页面', 'Admin', 'Tag', 'add', '1500025996', '1500025996', '0');
INSERT INTO `blog_privilege` VALUES ('119', '添加标签操作', '添加标签操作', 'Admin', 'Tag', 'addOperate', '1500025996', '1500025996', '0');
INSERT INTO `blog_privilege` VALUES ('120', '修改页面', '修改页面', 'Admin', 'Tag', 'edit', '1500025996', '1500025996', '0');
INSERT INTO `blog_privilege` VALUES ('121', '修改操作', '修改操作', 'Admin', 'Tag', 'editOperate', '1500025996', '1500025996', '0');
INSERT INTO `blog_privilege` VALUES ('122', '删除标签', '删除标签', 'Admin', 'Tag', 'delete', '1500025996', '1500025996', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='角色表';

-- ----------------------------
-- Records of blog_role
-- ----------------------------
INSERT INTO `blog_role` VALUES ('1', '超级管理员', '1497939509', '1498025253', '0', '0');
INSERT INTO `blog_role` VALUES ('6', 'test', '1498188946', '1498188946', '0', '0');
INSERT INTO `blog_role` VALUES ('7', 'blog_test', '1500026048', '1500026048', '0', '0');

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
INSERT INTO `blog_role_pri` VALUES ('83', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('104', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('105', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('106', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('107', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('108', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('109', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('110', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('111', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('112', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('113', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('114', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('115', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('116', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('117', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('118', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('119', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('120', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('121', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('122', '7', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COMMENT='文章标签表';

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
-- Table structure for blog_users
-- ----------------------------
DROP TABLE IF EXISTS `blog_users`;
CREATE TABLE `blog_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  `avatar_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of blog_users
-- ----------------------------
INSERT INTO `blog_users` VALUES ('11', 'ycp19940225', '820363773@qq.com', '', null, '1501055645', '1501055645', 'https://avatars0.githubusercontent.com/u/21313827?v=4');
INSERT INTO `blog_users` VALUES ('5', 'ycp', '820363772@qq.com', '$2y$10$oFAlAIWs0dfjOzsxXKbbc.QVMUr4Lus6Pi1kAa18TAM61ihjzPQbW', null, '1501034553', '1501034553', '');
INSERT INTO `blog_users` VALUES ('6', 'yyy', '820363771@qq.com', '$2y$10$JQoyfhsm7yuPfpnt8IaMIOdpFIWR8oQYHntC2iyzmcq2SBDfQsHVW', null, '1501036665', '1501036665', '');
INSERT INTO `blog_users` VALUES ('7', '也一样一样', '820363770@qq.com', '$2y$10$DcHkJlgrLtFVhUDgnN7DoudyGK5Gbvu/dl41Kou3RCnn4gr.2B/YK', null, '1501036990', '1501036990', '');
INSERT INTO `blog_users` VALUES ('8', '恩恩', '120363773@qq.com', '$2y$10$Usno297Bcx183IWiKBEzi.MigX70u6VI.iUUP9E2Hkgtg4mJCBxAq', null, '1501037131', '1501037131', '');
INSERT INTO `blog_users` VALUES ('9', '点', '829363773@qq.com', '$2y$10$XoY15IP58u5Gr74Rr.Aem.kCw022VoOEe3bRscPDIDBFz2t6QM/Va', null, '1501037210', '1501037210', '');
INSERT INTO `blog_users` VALUES ('10', '电放费', '820343773@qq.com', '$2y$10$ZUXcPpWBTwVK24f8yGLhRO6YmZwYqELnFAzBT1RE8.tHZ3kMbioyC', null, '1501037742', '1501037742', '');
INSERT INTO `blog_users` VALUES ('12', '订单', '820363779@qq.com', '$2y$10$RvpjiNdxMkgeL8IO/zOFLO.Glazgzv65qTJ4hpRxYaqWTpvBwkb6S', 'qiE8bVxAuLr70dRhEOMtER0nyYtx6AIeXEjCgbaDIBT4ZMrznbJrfIRdb2cR', '1501055898', '1501055898', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2', '2017_06_08_061045_create_role_table', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('820363773@qq.com', '$2y$10$V0g.jq/blgm9yyeSmTTWEuP5GGtJfi5bfUTLE9YEpYXn8hEZ2vJe2', '2017-07-26 12:56:27');

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
