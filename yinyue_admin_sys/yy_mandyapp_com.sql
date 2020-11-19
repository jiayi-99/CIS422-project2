/*
Navicat MySQL Data Transfer

Source Server         : yy_mandyapp_com
Source Server Version : 50731
Source Host           : 47.92.219.96:3306
Source Database       : yy_mandyapp_com

Target Server Type    : MYSQL
Target Server Version : 50731
File Encoding         : 65001

Date: 2020-11-18 14:03:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for jw_admin
-- ----------------------------
DROP TABLE IF EXISTS `jw_admin`;
CREATE TABLE `jw_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID自增',
  `account` varchar(40) NOT NULL COMMENT '账号',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `name` varchar(50) NOT NULL COMMENT '名称',
  `number` varchar(20) DEFAULT NULL COMMENT '编号',
  `phone` varchar(255) DEFAULT NULL COMMENT '电话号码',
  `icon` varchar(150) DEFAULT NULL COMMENT '头像',
  `auth_group_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色ID',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态：0 在职，1 离职',
  `work_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '工作状态：0 在职，1 离职',
  `last_time` int(11) DEFAULT NULL COMMENT '最后登录时间',
  `last_ip` varchar(255) DEFAULT NULL COMMENT '最后登录IP',
  `createtime` int(11) NOT NULL COMMENT '建立时间',
  `type` int(2) DEFAULT '0' COMMENT '类型：0-管理员；1-学生；2-教师；3-审批人',
  `approver_id` int(11) DEFAULT NULL COMMENT '审批人id',
  `approver_type` int(2) DEFAULT NULL COMMENT '审批人类型:1-班级审批人；2-学院审批人；3-学校审批人',
  PRIMARY KEY (`id`),
  KEY `loginName` (`account`),
  KEY `staffStatus` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='后台管理员表';

-- ----------------------------
-- Records of jw_admin
-- ----------------------------
INSERT INTO `jw_admin` VALUES ('8', 'aaa', 'e10adc3949ba59abbe56e057f20f883e', '开发', null, null, null, '15', '0', '0', null, null, '1596436992', '0', null, null);
INSERT INTO `jw_admin` VALUES ('14', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '系统管理', null, null, null, '15', '0', '0', null, null, '1596436992', '0', null, null);
INSERT INTO `jw_admin` VALUES ('15', 'admin1', 'e10adc3949ba59abbe56e057f20f883e', 'test', null, null, null, '18', '0', '0', null, null, '1596436992', '0', null, null);

-- ----------------------------
-- Table structure for jw_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `jw_auth_group`;
CREATE TABLE `jw_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID自增',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '名称标题',
  `icon` varchar(255) DEFAULT NULL COMMENT '头像',
  `describe` varchar(255) DEFAULT NULL COMMENT '描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `rules` text NOT NULL COMMENT '规则',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='权限角色组表';

-- ----------------------------
-- Records of jw_auth_group
-- ----------------------------
INSERT INTO `jw_auth_group` VALUES ('15', '超级管理员', null, null, '1', '50,349,350,351,359,360,361,362,363,364,486,527,530,594,595,596,597,598,599,600,602,603,604,605,606,607,608,');
INSERT INTO `jw_auth_group` VALUES ('18', '普通管理员', null, null, '1', '567,568,569,573,574,575,576,577,');

-- ----------------------------
-- Table structure for jw_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `jw_auth_group_access`;
CREATE TABLE `jw_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL COMMENT '管理员id',
  `group_id` mediumint(8) unsigned NOT NULL COMMENT '角色组ID',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='角色成员关系表';

-- ----------------------------
-- Records of jw_auth_group_access
-- ----------------------------
INSERT INTO `jw_auth_group_access` VALUES ('8', '15');
INSERT INTO `jw_auth_group_access` VALUES ('14', '15');
INSERT INTO `jw_auth_group_access` VALUES ('15', '18');
INSERT INTO `jw_auth_group_access` VALUES ('25', '19');
INSERT INTO `jw_auth_group_access` VALUES ('26', '19');
INSERT INTO `jw_auth_group_access` VALUES ('27', '20');
INSERT INTO `jw_auth_group_access` VALUES ('28', '21');
INSERT INTO `jw_auth_group_access` VALUES ('29', '19');
INSERT INTO `jw_auth_group_access` VALUES ('30', '21');
INSERT INTO `jw_auth_group_access` VALUES ('31', '20');
INSERT INTO `jw_auth_group_access` VALUES ('32', '20');
INSERT INTO `jw_auth_group_access` VALUES ('33', '20');
INSERT INTO `jw_auth_group_access` VALUES ('34', '21');
INSERT INTO `jw_auth_group_access` VALUES ('35', '18');
INSERT INTO `jw_auth_group_access` VALUES ('36', '18');
INSERT INTO `jw_auth_group_access` VALUES ('37', '18');
INSERT INTO `jw_auth_group_access` VALUES ('38', '18');
INSERT INTO `jw_auth_group_access` VALUES ('39', '18');
INSERT INTO `jw_auth_group_access` VALUES ('42', '18');
INSERT INTO `jw_auth_group_access` VALUES ('43', '23');
INSERT INTO `jw_auth_group_access` VALUES ('44', '23');
INSERT INTO `jw_auth_group_access` VALUES ('45', '23');
INSERT INTO `jw_auth_group_access` VALUES ('46', '22');
INSERT INTO `jw_auth_group_access` VALUES ('47', '18');
INSERT INTO `jw_auth_group_access` VALUES ('48', '18');
INSERT INTO `jw_auth_group_access` VALUES ('49', '18');
INSERT INTO `jw_auth_group_access` VALUES ('50', '18');

-- ----------------------------
-- Table structure for jw_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `jw_auth_rule`;
CREATE TABLE `jw_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID自增',
  `parentid` int(11) DEFAULT '0' COMMENT '父类ID',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '名称',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `auth_mark` int(11) DEFAULT '0' COMMENT '权限标识',
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '类型',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态：1 默认',
  `condition` char(100) NOT NULL DEFAULT '' COMMENT '约束',
  `parameter` text COMMENT '参数',
  `view_model` tinyint(4) DEFAULT '0' COMMENT '视图模型：0 无视图，1 表格，2 表单，3 详情',
  `view_parameter` text COMMENT '视图参数-text',
  `function_model` tinyint(4) DEFAULT '0' COMMENT '方法模型：0 无方法，1 表格，2 表单，3 详情，4 添加，5 编辑，6 删除',
  `function_parameter` text COMMENT '方法参数-text',
  `view_code` text COMMENT '视图代码-text',
  `function_code` text COMMENT '方法代码-text',
  `if_in_generate` tinyint(4) DEFAULT '0' COMMENT '是否参与生成：0 是，1 否',
  `if_show_sidebar` tinyint(4) DEFAULT '0' COMMENT '是否侧边栏显示：0 显示，1 不显示',
  `createtime` int(11) DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=609 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='权限规则表';

-- ----------------------------
-- Records of jw_auth_rule
-- ----------------------------
INSERT INTO `jw_auth_rule` VALUES ('50', '0', 'System', '系统管理', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '1533192557');
INSERT INTO `jw_auth_rule` VALUES ('349', '50', 'System/auth_rule_operation', '规则列表操作', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '1581262841');
INSERT INTO `jw_auth_rule` VALUES ('350', '50', 'System/auth_rule_add', '规则添加', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '1581262841');
INSERT INTO `jw_auth_rule` VALUES ('351', '50', 'System/auth_rule_edit', '规则编辑', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '1581262841');
INSERT INTO `jw_auth_rule` VALUES ('359', '50', 'System/auth_group', '账号管理编辑', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '1581262841');
INSERT INTO `jw_auth_rule` VALUES ('360', '50', 'System/admin_operation', '管理员操作', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '1581262841');
INSERT INTO `jw_auth_rule` VALUES ('361', '50', 'System/admin', '管理列表', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '1581262841');
INSERT INTO `jw_auth_rule` VALUES ('362', '50', 'System/auth_group_operation', '角色管理操作', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '1581262841');
INSERT INTO `jw_auth_rule` VALUES ('363', '50', 'System/auth_group_edit', '角色管理编辑', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '1581262841');
INSERT INTO `jw_auth_rule` VALUES ('364', '50', 'System/auth_rule', '规则列表', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '1581262841');
INSERT INTO `jw_auth_rule` VALUES ('486', '50', 'System/admin_edit', '管理员编辑', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '0');
INSERT INTO `jw_auth_rule` VALUES ('527', '50', 'System/auth_group_add', '添加角色', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '0');
INSERT INTO `jw_auth_rule` VALUES ('530', '50', 'System/admin_add', '添加管理员', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '0');
INSERT INTO `jw_auth_rule` VALUES ('594', '0', 'User', '用户管理', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '0');
INSERT INTO `jw_auth_rule` VALUES ('595', '594', 'User/list1', '用户列表', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '0');
INSERT INTO `jw_auth_rule` VALUES ('596', '0', 'Singer', '歌手管理', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '0');
INSERT INTO `jw_auth_rule` VALUES ('597', '596', 'Singer/list1', '歌手列表', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '0');
INSERT INTO `jw_auth_rule` VALUES ('598', '596', 'Singer/Singer_operation', '歌手操作', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '1605413995');
INSERT INTO `jw_auth_rule` VALUES ('599', '596', 'Singer/add_Singer', '添加歌手', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '1605414017');
INSERT INTO `jw_auth_rule` VALUES ('600', '596', 'Singer/edit_Singer', '编辑歌手', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '1605414047');
INSERT INTO `jw_auth_rule` VALUES ('602', '596', 'Singer/del_Singer', '删除歌手', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '1605414116');
INSERT INTO `jw_auth_rule` VALUES ('603', '0', 'Song', '歌曲管理', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '0');
INSERT INTO `jw_auth_rule` VALUES ('604', '603', 'Song/list1', '歌曲列表', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '0');
INSERT INTO `jw_auth_rule` VALUES ('605', '603', 'Song/Song_operation', '歌曲操作', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '1605414832');
INSERT INTO `jw_auth_rule` VALUES ('606', '603', 'Song/add_Song', '添加歌曲', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '1605414857');
INSERT INTO `jw_auth_rule` VALUES ('607', '603', 'Song/edit_Song', '编辑歌曲', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '1605414892');
INSERT INTO `jw_auth_rule` VALUES ('608', '603', 'Song/del_Song', '删除歌曲', '0', '1', '0', '1', '', null, '0', null, '0', null, null, null, '0', '0', '1605414913');

-- ----------------------------
-- Table structure for jw_log_admin
-- ----------------------------
DROP TABLE IF EXISTS `jw_log_admin`;
CREATE TABLE `jw_log_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL,
  `content` text COMMENT '操作内容',
  `login_time` datetime DEFAULT NULL COMMENT '操作时间',
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_log_admin
-- ----------------------------
INSERT INTO `jw_log_admin` VALUES ('3', '14', null, '2020-11-15 19:31:23', '127.0.0.1');
INSERT INTO `jw_log_admin` VALUES ('4', '14', null, '2020-11-16 12:49:59', '202.100.225.87');
INSERT INTO `jw_log_admin` VALUES ('5', '14', null, '2020-11-16 15:15:49', '73.96.126.119');
INSERT INTO `jw_log_admin` VALUES ('6', '14', null, '2020-11-16 15:15:49', '73.96.126.119');

-- ----------------------------
-- Table structure for jw_singer
-- ----------------------------
DROP TABLE IF EXISTS `jw_singer`;
CREATE TABLE `jw_singer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COMMENT='singer table';

-- ----------------------------
-- Records of jw_singer
-- ----------------------------
INSERT INTO `jw_singer` VALUES ('4', 'SLANDER', '1605655066');
INSERT INTO `jw_singer` VALUES ('5', 'twocolors', '1605655112');
INSERT INTO `jw_singer` VALUES ('6', 'Sasha Sloan', '1605655127');
INSERT INTO `jw_singer` VALUES ('7', 'Hawk Nelson', '1605655141');
INSERT INTO `jw_singer` VALUES ('8', 'Vicetone', '1605655155');

-- ----------------------------
-- Table structure for jw_song
-- ----------------------------
DROP TABLE IF EXISTS `jw_song`;
CREATE TABLE `jw_song` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `singer_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COMMENT='song table';

-- ----------------------------
-- Records of jw_song
-- ----------------------------
INSERT INTO `jw_song` VALUES ('3', '4', 'Love Is Gone', '1605655175');
INSERT INTO `jw_song` VALUES ('4', '5', 'Lovefool', '1605655188');
INSERT INTO `jw_song` VALUES ('5', '6', 'Dancing With Your Ghost', '1605655208');
INSERT INTO `jw_song` VALUES ('6', '7', 'Sold Out', '1605655219');
INSERT INTO `jw_song` VALUES ('7', '8', 'Walk Thru Fire', '1605655243');

-- ----------------------------
-- Table structure for jw_user
-- ----------------------------
DROP TABLE IF EXISTS `jw_user`;
CREATE TABLE `jw_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增序号',
  `nickname` varchar(255) DEFAULT NULL COMMENT '昵称',
  `sex` varchar(255) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COMMENT='user table';

-- ----------------------------
-- Records of jw_user
-- ----------------------------
INSERT INTO `jw_user` VALUES ('1', 'qqq', '女', 'admin', 'e10adc3949ba59abbe56e057f20f883e', null);
INSERT INTO `jw_user` VALUES ('2', 'test', '男', 'aa', 'e10adc3949ba59abbe56e057f20f883e', '1605436568');
INSERT INTO `jw_user` VALUES ('3', 'L', 'male', 'qwer', '81dc9bdb52d04dc20036dbd8313ed055', '1605505765');
INSERT INTO `jw_user` VALUES ('4', 'balabala', 'male', 'balabala', '004d6139e67ad1a9b3833061abc562fd', '1605568209');
INSERT INTO `jw_user` VALUES ('5', 'Lambert', 'male', 'lambert', 'e10adc3949ba59abbe56e057f20f883e', '1605655443');

-- ----------------------------
-- Table structure for jw_user_favorites
-- ----------------------------
DROP TABLE IF EXISTS `jw_user_favorites`;
CREATE TABLE `jw_user_favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增序号',
  `user_id` int(11) DEFAULT NULL,
  `song_id` int(11) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COMMENT='user favorites table';

-- ----------------------------
-- Records of jw_user_favorites
-- ----------------------------
INSERT INTO `jw_user_favorites` VALUES ('4', '1', '1', '1605436520');
INSERT INTO `jw_user_favorites` VALUES ('8', '2', '1', '1605437662');
INSERT INTO `jw_user_favorites` VALUES ('10', '5', '3', '1605655491');
