/*
 Navicat Premium Data Transfer

 Source Server         : loaclhost
 Source Server Type    : MySQL
 Source Server Version : 50714
 Source Host           : localhost:3306
 Source Schema         : blog

 Target Server Type    : MySQL
 Target Server Version : 50714
 File Encoding         : 65001

 Date: 12/10/2018 15:41:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for zan_admin
-- ----------------------------
DROP TABLE IF EXISTS `zan_admin`;
CREATE TABLE `zan_admin`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0' COMMENT '操作者备注名称',
  `account` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '登录账号',
  `password` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '登录密码',
  `last_login_time` int(10) NOT NULL DEFAULT 0 COMMENT '最后登录时间',
  `pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0' COMMENT '头像地址',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0正常 9删除',
  `created_at` int(10) NOT NULL DEFAULT 0,
  `updated_at` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 43 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '网站的管理员信息' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of zan_admin
-- ----------------------------
INSERT INTO `zan_admin` VALUES (10, '超级管理员', 'admin', 'c6d8e5b18624f32bc940706294e0eb8d', 1539136051, '20181008\\28c4e013e359e49dc1935da77d8a0a40.png', 0, 1537954423, 1537954423);
INSERT INTO `zan_admin` VALUES (42, '管理员1', 'admin1', '1', 1539328472, '', 0, 0, 0);
INSERT INTO `zan_admin` VALUES (41, '管理员', '1', '48e81464369d200a1cddca8082a6d077', 1539046622, '', 9, 1538128075, 1538128078);

-- ----------------------------
-- Table structure for zan_article
-- ----------------------------
DROP TABLE IF EXISTS `zan_article`;
CREATE TABLE `zan_article`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '文章封面图',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '文章标题',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '文章内容',
  `desc` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '文章描述',
  `author` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '网站作者',
  `look` int(255) NOT NULL DEFAULT 0 COMMENT '文章浏览量',
  `sort` tinyint(4) NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '网站关键词',
  `class_id` int(11) NOT NULL COMMENT '网站分类的id',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` int(10) NOT NULL DEFAULT 0,
  `updated_at` int(10) NOT NULL DEFAULT 0,
  `deleted_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '网站的资讯信息' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of zan_article
-- ----------------------------
INSERT INTO `zan_article` VALUES (1, '20181011/2018-10-11-08-20-595bbf07eb5904f.png', 'test111', '<p>1</p>', '1', 'admin', 0, 1, '1', 32, 0, 0, 1539308782, '1539308782');
INSERT INTO `zan_article` VALUES (2, '', '等等1', '<p>11</p>', '1', '1', 1, 1, '1', 32, 0, 0, 0, NULL);
INSERT INTO `zan_article` VALUES (3, '20181011/2018-10-11-08-14-025bbf064a955ca.jpg', '1133', '<p>1111</p>', '1', '1', 1, 1, '1', 31, 0, 0, 0, NULL);
INSERT INTO `zan_article` VALUES (4, '20181011/2018-10-11-08-22-325bbf08489d376.png', 'dafdsa', '<p>12d</p>', '1', 'admin', 0, 1, '1', 32, 0, 0, 0, NULL);
INSERT INTO `zan_article` VALUES (5, '', '等等111', '<p>111</p>', '1', 'admin', 0, 1, '1', 31, 0, 0, 0, NULL);
INSERT INTO `zan_article` VALUES (6, '', '天津赞普股份有限公司', '<p>11大是大非</p>', '阿斯蒂芬', 'admin', 0, 1, '1', 31, 0, 0, 0, NULL);
INSERT INTO `zan_article` VALUES (7, '', '第三方', '<p>的高发地方</p>', '1', 'admin', 0, 1, '1', 31, 0, 0, 0, NULL);
INSERT INTO `zan_article` VALUES (8, '20181011/2018-10-11-08-43-395bbf0d3b3d9f4.png', '121等等', '<p>1212</p>', '12', 'admin', 0, 1, '1', 31, 0, 1539247419, 1539308760, '1539308760');

-- ----------------------------
-- Table structure for zan_class
-- ----------------------------
DROP TABLE IF EXISTS `zan_class`;
CREATE TABLE `zan_class`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_name` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '分类名称',
  `sort` tinyint(4) NOT NULL COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) NOT NULL,
  `deleted_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 35 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '网站文章的分类' ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of zan_class
-- ----------------------------
INSERT INTO `zan_class` VALUES (30, 'PHP', 1, 0, 1539242355, 1539306668, NULL);
INSERT INTO `zan_class` VALUES (31, 'Mysql', 2, 0, 1539242386, 1539242386, NULL);
INSERT INTO `zan_class` VALUES (32, 'Nginx', 3, 0, 1539242392, 1539242392, NULL);
INSERT INTO `zan_class` VALUES (33, 'Linux', 4, 0, 1539242768, 1539242768, NULL);
INSERT INTO `zan_class` VALUES (34, 'DDD', 1, 0, 1539329285, 1539329285, NULL);

-- ----------------------------
-- Table structure for zan_config
-- ----------------------------
DROP TABLE IF EXISTS `zan_config`;
CREATE TABLE `zan_config`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '网站的标题',
  `keys` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '网站的关键字',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '网站的描述',
  `tel` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '电话',
  `postcode` varbinary(255) NOT NULL DEFAULT '' COMMENT '公司邮箱',
  `website_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '网站备案信息',
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '关于我们',
  `contact_me` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '联系我们',
  `status` tinyint(255) NOT NULL DEFAULT 0,
  `created_at` int(10) NULL DEFAULT 0,
  `updated_at` int(10) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '网站相关配置信息' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of zan_config
-- ----------------------------
INSERT INTO `zan_config` VALUES (1, '天津赞普', 'dsfadf', 'ddsfasd', '022-525555', 0x7A616E7075403136332E636F6D, '津88888', '<p>dddd</p>', '<p>adfadf</p>', 0, 0, 1539251967);

-- ----------------------------
-- Table structure for zan_friend_link
-- ----------------------------
DROP TABLE IF EXISTS `zan_friend_link`;
CREATE TABLE `zan_friend_link`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '友链名称',
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '链接地址',
  `sort` tinyint(4) NOT NULL COMMENT '友链的排序',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` int(10) NULL DEFAULT 0,
  `updated_at` int(10) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '友情链接' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of zan_friend_link
-- ----------------------------
INSERT INTO `zan_friend_link` VALUES (1, '1', '1', 0, 0, 1538101070, 1538101070);
INSERT INTO `zan_friend_link` VALUES (2, '的1', 'http://www.simengphp.com1', 0, 0, 1538101490, 1538101882);
INSERT INTO `zan_friend_link` VALUES (3, 'd', 'http://www.simengphp.com', 0, 0, 1538102078, 1538102078);
INSERT INTO `zan_friend_link` VALUES (4, 'd1', 'http://www.simengphp.com11', 2, 0, 1538102100, 1538126226);
INSERT INTO `zan_friend_link` VALUES (5, '的', 'http://www.simengphp.coml', 2, 0, 1538102556, 1538126234);
INSERT INTO `zan_friend_link` VALUES (6, '超级管理员1221', 'http://www.simengphp.com1100', 8, 9, 1538103585, 1538213128);

-- ----------------------------
-- Table structure for zan_member
-- ----------------------------
DROP TABLE IF EXISTS `zan_member`;
CREATE TABLE `zan_member`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0' COMMENT '操作者备注名称',
  `account` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '登录账号',
  `password` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '登录密码',
  `pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0' COMMENT '头像地址',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0正常 9删除',
  `last_login_time` int(10) NOT NULL DEFAULT 0,
  `created_at` int(10) NOT NULL DEFAULT 0,
  `updated_at` int(10) NOT NULL DEFAULT 0,
  `deleted_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 47 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '网站用户信息管理' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of zan_member
-- ----------------------------
INSERT INTO `zan_member` VALUES (10, '超级管理员', 'admin', '123456', '20181008\\28c4e013e359e49dc1935da77d8a0a40.png', 0, 1539328659, 1537954423, 1537954423, NULL);
INSERT INTO `zan_member` VALUES (42, '管理员1', 'admin1', '123456', '', 0, 0, 0, 0, NULL);
INSERT INTO `zan_member` VALUES (41, '管理员', '1', '123456', '', 9, 0, 1538128075, 1538128078, NULL);
INSERT INTO `zan_member` VALUES (43, '0', 'admin', '123456', '0', 0, 0, 1539316160, 1539316160, NULL);
INSERT INTO `zan_member` VALUES (44, '0', 'admin112', '123456', '0', 0, 0, 1539325829, 1539325829, NULL);
INSERT INTO `zan_member` VALUES (45, '0', '1111', '123456', '0', 0, 0, 1539328154, 1539328154, NULL);
INSERT INTO `zan_member` VALUES (46, '0', '11111', '111111', '0', 0, 0, 1539328380, 1539328380, NULL);

-- ----------------------------
-- Table structure for zan_message
-- ----------------------------
DROP TABLE IF EXISTS `zan_message`;
CREATE TABLE `zan_message`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '留言者姓名',
  `tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '留言人电话',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '留言人的电话',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '留言标题',
  `content` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '留言内容',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` int(10) NOT NULL DEFAULT 0,
  `updated_at` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '网站的留言板' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of zan_message
-- ----------------------------
INSERT INTO `zan_message` VALUES (1, '等等', '18522713541', '476319748@qq.com', '的', '的', 0, 0, 1538205584);

-- ----------------------------
-- Table structure for zan_pic
-- ----------------------------
DROP TABLE IF EXISTS `zan_pic`;
CREATE TABLE `zan_pic`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `alt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '图片地址',
  `sort` int(11) NULL DEFAULT 0 COMMENT '排序',
  `class_id` int(11) NOT NULL DEFAULT 0 COMMENT '分类的id\r\n1、banner\r\n2、公司荣誉\r\n3、关于我们\r\n',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '9删除 0正常',
  `created_at` int(10) NOT NULL DEFAULT 0,
  `updated_at` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '网站的图片' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of zan_pic
-- ----------------------------
INSERT INTO `zan_pic` VALUES (1, 'alt1', '20180928\\2603b9862b221e883ce1f0b064e407a4.png', 1, 2, 0, 1538271092, 1538271092);
INSERT INTO `zan_pic` VALUES (2, 'alt11', '20180930\\003c360baab9b2b1d23be1b7f2676e4c.png', 12, 2, 0, 1538273182, 1539051395);

-- ----------------------------
-- Table structure for zan_simple
-- ----------------------------
DROP TABLE IF EXISTS `zan_simple`;
CREATE TABLE `zan_simple`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL DEFAULT 0 COMMENT '分类的id',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '标题',
  `pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '图片',
  `key` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '关键字',
  `is_key` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否是关键字 1是 0不是',
  `sort` int(11) NOT NULL COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `updated_at` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '单页面数据管理' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of zan_simple
-- ----------------------------
INSERT INTO `zan_simple` VALUES (1, 1, '数据接入', '20181009\\c1cd1efff3db9d0732dd42e7a347343d.png', '优势|客户故障|业务响应速度快|专业客服团队1', 1, 1, 0, 1539056902, 1539066204);
INSERT INTO `zan_simple` VALUES (2, 1, 'IDC业务', '20181009\\778b417d3a54a54dcbfeb32cd583863b.png', '服务|托管|租赁', 1, 2, 0, 1539057099, 1539066027);

-- ----------------------------
-- Table structure for zan_stack
-- ----------------------------
DROP TABLE IF EXISTS `zan_stack`;
CREATE TABLE `zan_stack`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '名字',
  `pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '头像',
  `stack` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '技术栈',
  `desc` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '描述',
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '个人网站博客github',
  `contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '联系方式',
  `sort` int(11) NOT NULL COMMENT '排序',
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) NOT NULL,
  `deleted_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '成员' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of zan_stack
-- ----------------------------
INSERT INTO `zan_stack` VALUES (1, '刘柱', '', 'php', '讲师', 'www.simengphp.com', '476319748@qq.com', 1, 1539308171, 1539308643, '1539308643');

SET FOREIGN_KEY_CHECKS = 1;
