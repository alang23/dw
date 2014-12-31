/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : dewei

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-12-30 18:23:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for dw_department
-- ----------------------------
DROP TABLE IF EXISTS `dw_department`;
CREATE TABLE `dw_department` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dw_department
-- ----------------------------
INSERT INTO `dw_department` VALUES ('1', '技术部');
INSERT INTO `dw_department` VALUES ('2', '策划部');
INSERT INTO `dw_department` VALUES ('3', '产品部');

-- ----------------------------
-- Table structure for dw_expert
-- ----------------------------
DROP TABLE IF EXISTS `dw_expert`;
CREATE TABLE `dw_expert` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) DEFAULT NULL COMMENT '用户名',
  `realname` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL COMMENT '手机号',
  `check_mobile` varchar(20) DEFAULT NULL COMMENT '核实电话号码',
  `passwd` varchar(200) DEFAULT NULL COMMENT '密码',
  `headerurl` varchar(120) DEFAULT NULL,
  `depid` int(8) DEFAULT NULL COMMENT '部门id',
  `profession` varchar(80) CHARACTER SET utf8 DEFAULT NULL COMMENT '专业',
  `industry` varchar(80) CHARACTER SET utf8 DEFAULT NULL COMMENT '行业',
  `content` text CHARACTER SET utf8 COMMENT '简介',
  `lastlogin` int(8) DEFAULT NULL COMMENT '最后登录时间',
  `createtime` int(8) DEFAULT NULL COMMENT '创建时间',
  `token` varchar(80) DEFAULT NULL COMMENT 'token',
  `enabled` tinyint(2) DEFAULT '0' COMMENT '帐号状态，0-不可用，1-正常使用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dw_expert
-- ----------------------------
INSERT INTO `dw_expert` VALUES ('23', 'admin', '巴斯滕', '13800138000', '13800138000', '4297f44b13955235245b2497399d7a93', null, '1', '计算机', '软件开发', '123123', null, '1418874703', null, '127');

-- ----------------------------
-- Table structure for dw_member
-- ----------------------------
DROP TABLE IF EXISTS `dw_member`;
CREATE TABLE `dw_member` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) DEFAULT NULL COMMENT '用户名',
  `realname` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL COMMENT '手机号',
  `check_mobile` varchar(20) DEFAULT NULL COMMENT '核实电话号码',
  `passwd` varchar(200) DEFAULT NULL COMMENT '密码',
  `headerurl` varchar(120) DEFAULT NULL,
  `depid` int(8) DEFAULT NULL COMMENT '部门id',
  `roleid` int(8) DEFAULT NULL COMMENT '角色，1-员工，2-专家，3，领导',
  `profession` varchar(80) CHARACTER SET utf8 DEFAULT NULL COMMENT '专业',
  `industry` varchar(80) CHARACTER SET utf8 DEFAULT NULL COMMENT '行业',
  `content` text CHARACTER SET utf8 COMMENT '简介',
  `total` int(4) DEFAULT '0',
  `lastlogin` int(8) DEFAULT NULL COMMENT '最后登录时间',
  `createtime` int(8) DEFAULT NULL COMMENT '创建时间',
  `token` varchar(80) DEFAULT NULL COMMENT 'token',
  `enabled` tinyint(2) DEFAULT '0' COMMENT '帐号状态，0-不可用，1-正常使用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dw_member
-- ----------------------------
INSERT INTO `dw_member` VALUES ('12', 'root', '黎明', '13800138000', '13800138000', 'e10adc3949ba59abbe56e057f20f883e', '20141216085140.jpg', '1', '2', '计算机', 'it', '计算机计算机', '0', null, '1418716300', null, '0');
INSERT INTO `dw_member` VALUES ('13', 'admin', '测试', '13800138001', '13800138000', 'e10adc3949ba59abbe56e057f20f883e', '20141216085314.jpg', '1', '2', '计算机', 'it', '计算机', '0', null, '1418716394', null, '0');
INSERT INTO `dw_member` VALUES ('14', 'alang', '黎明', '13800138007', '13800138000', 'e10adc3949ba59abbe56e057f20f883e', '20141216091037.jpg', '2', '1', '计算机', 'it', '13800138007', '0', null, '1418717437', null, '127');
INSERT INTO `dw_member` VALUES ('15', 'dep', '巴斯滕', '13418856987', '13800138000', 'e10adc3949ba59abbe56e057f20f883e', '20141216113922.jpg', '3', '2', '计算机', '软件开发', '行业专家', '0', null, '1418726362', null, '0');

-- ----------------------------
-- Table structure for dw_mod
-- ----------------------------
DROP TABLE IF EXISTS `dw_mod`;
CREATE TABLE `dw_mod` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `pid` int(8) DEFAULT NULL,
  `m_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `rank` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dw_mod
-- ----------------------------
INSERT INTO `dw_mod` VALUES ('1', '10', 'test', '0');
INSERT INTO `dw_mod` VALUES ('2', '10', 'test', '0');
INSERT INTO `dw_mod` VALUES ('3', '9', 'test', '0');
INSERT INTO `dw_mod` VALUES ('4', '10', 'test2', '1');

-- ----------------------------
-- Table structure for dw_opinion
-- ----------------------------
DROP TABLE IF EXISTS `dw_opinion`;
CREATE TABLE `dw_opinion` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `uid` int(8) DEFAULT NULL COMMENT '用户id',
  `u_type` tinyint(4) DEFAULT NULL COMMENT '用户类型',
  `content` text CHARACTER SET utf8 COMMENT '内容',
  `createtime` int(4) DEFAULT NULL COMMENT '创建时间',
  `stats` tinyint(2) DEFAULT '0' COMMENT '状态，0-未处理，1-已处理',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dw_opinion
-- ----------------------------

-- ----------------------------
-- Table structure for dw_project
-- ----------------------------
DROP TABLE IF EXISTS `dw_project`;
CREATE TABLE `dw_project` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `t_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT '项目名称',
  `t_type` int(8) DEFAULT NULL COMMENT '类型',
  `t_depid` int(8) DEFAULT NULL,
  `t_days` int(4) DEFAULT '0' COMMENT '预计天数',
  `t_degree` varchar(255) DEFAULT NULL COMMENT '难度',
  `t_cost` decimal(8,2) DEFAULT NULL COMMENT '费用',
  `createtime` int(4) DEFAULT NULL,
  `rank` int(4) DEFAULT NULL COMMENT '排序',
  `status` tinyint(1) DEFAULT '0' COMMENT '状态,1-启用，2-停止',
  `t_content` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dw_project
-- ----------------------------
INSERT INTO `dw_project` VALUES ('5', '项目五', '2', '1', '20', '8', '1000.00', '1418897826', null, '1', '');
INSERT INTO `dw_project` VALUES ('7', '项目四', '2', '3', '20', '8', '1000.00', '1418897978', null, '1', '');
INSERT INTO `dw_project` VALUES ('8', '项目三', '2', '3', '20', '8', '1000.00', '1418898209', null, '1', '');
INSERT INTO `dw_project` VALUES ('9', '项目二', '1', '2', '30', '9', '10010.00', '1418898222', null, '1', '');
INSERT INTO `dw_project` VALUES ('10', '项目一', '1', '1', '20', '8', '1000.00', '1418898823', null, '1', '年内打新最后一战 12只新股今日起陆续申购\r\n股市抢钱赎回暴增 互联网金融苦战提现潮\r\nP2P平台恶意竞争：利用搜索竞价劫对手流量\r\n平安保代当街刺死宜信业务员 因抢客户争执\r\n国家队发布P2P最新评级 三季度规模快速增长\r\n难懂黄金的任性：金市多头归来 投行再失准');

-- ----------------------------
-- Table structure for dw_project_type
-- ----------------------------
DROP TABLE IF EXISTS `dw_project_type`;
CREATE TABLE `dw_project_type` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dw_project_type
-- ----------------------------
INSERT INTO `dw_project_type` VALUES ('1', '开放型');
INSERT INTO `dw_project_type` VALUES ('2', '内部型');

-- ----------------------------
-- Table structure for dw_task
-- ----------------------------
DROP TABLE IF EXISTS `dw_task`;
CREATE TABLE `dw_task` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `t_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT '项目名称',
  `icon` varchar(150) DEFAULT NULL,
  `t_score` int(4) DEFAULT '0',
  `mid` int(8) DEFAULT NULL,
  `t_pople` int(4) DEFAULT '0',
  `t_type` int(8) DEFAULT NULL COMMENT '类型',
  `t_days` int(4) DEFAULT '0' COMMENT '预计天数',
  `t_degree` varchar(255) DEFAULT NULL COMMENT '难度',
  `t_cost` decimal(8,2) DEFAULT NULL COMMENT '费用',
  `createtime` int(4) DEFAULT NULL,
  `rank` int(4) DEFAULT NULL COMMENT '排序',
  `status` tinyint(1) DEFAULT '0' COMMENT '状态,1-启用，2-停止',
  `t_content` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dw_task
-- ----------------------------
INSERT INTO `dw_task` VALUES ('5', '卢布狂贬购物打2折 华人扫空莫斯科奢侈品', null, '0', '4', '0', '2', '20', '8', '1000.00', '1418897826', null, '1', null);
INSERT INTO `dw_task` VALUES ('7', '年内打新最后一战 12只新股今日起陆续申购', null, '0', '4', '0', '2', '20', '8', '1000.00', '1418897978', null, '1', null);
INSERT INTO `dw_task` VALUES ('8', '年内打新最后一战 12只新股今日起陆续申购', null, '0', '4', '0', '2', '20', '8', '1000.00', '1418898209', null, '1', null);
INSERT INTO `dw_task` VALUES ('9', '如何倒水123123123', null, '0', '4', '0', '1', '30', '9', '10010.00', '1418898222', null, '1', null);
INSERT INTO `dw_task` VALUES ('10', '卢布狂贬购物打2折 华人扫空莫斯科奢侈品', null, '0', '2', '0', '1', '20', '8', '1000.00', '1418898823', null, '1', '年内打新最后一战 12只新股今日起陆续申购\r\n股市抢钱赎回暴增 互联网金融苦战提现潮\r\nP2P平台恶意竞争：利用搜索竞价劫对手流量\r\n平安保代当街刺死宜信业务员 因抢客户争执\r\n国家队发布P2P最新评级 三季度规模快速增长\r\n难懂黄金的任性：金市多头归来 投行再失准');

-- ----------------------------
-- Table structure for dw_task_type
-- ----------------------------
DROP TABLE IF EXISTS `dw_task_type`;
CREATE TABLE `dw_task_type` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dw_task_type
-- ----------------------------
INSERT INTO `dw_task_type` VALUES ('1', '开放型');
INSERT INTO `dw_task_type` VALUES ('2', '内部型');

-- ----------------------------
-- Table structure for dw_trouble
-- ----------------------------
DROP TABLE IF EXISTS `dw_trouble`;
CREATE TABLE `dw_trouble` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `task_id` int(8) DEFAULT NULL,
  `tr_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `tr_num` int(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dw_trouble
-- ----------------------------

-- ----------------------------
-- Table structure for dw_user
-- ----------------------------
DROP TABLE IF EXISTS `dw_user`;
CREATE TABLE `dw_user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `pwd` varchar(120) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `createtime` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dw_user
-- ----------------------------
INSERT INTO `dw_user` VALUES ('8', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'test@163.com', '');
