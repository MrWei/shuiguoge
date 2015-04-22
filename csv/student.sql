/*
Navicat MySQL Data Transfer

Source Server         : server
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : excel

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2015-04-22 12:37:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `student`
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `age` smallint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('1', '张三', '1', '20');
INSERT INTO `student` VALUES ('2', '张三', '1', '20');
INSERT INTO `student` VALUES ('3', '李四', '1', '20');
INSERT INTO `student` VALUES ('4', '李四', '1', '20');
INSERT INTO `student` VALUES ('5', '李四', '1', '20');
INSERT INTO `student` VALUES ('6', '李四', '1', '20');
INSERT INTO `student` VALUES ('7', '李四', '1', '20');
INSERT INTO `student` VALUES ('8', '李四', '1', '20');
INSERT INTO `student` VALUES ('9', '李四', '1', '20');
INSERT INTO `student` VALUES ('10', '李四', '1', '20');
INSERT INTO `student` VALUES ('11', '李四', '1', '20');
INSERT INTO `student` VALUES ('12', '李四', '1', '20');
INSERT INTO `student` VALUES ('13', '李四', '1', '20');
INSERT INTO `student` VALUES ('14', '李四', '1', '20');
INSERT INTO `student` VALUES ('15', '李四', '1', '20');
INSERT INTO `student` VALUES ('16', '李四', '1', '20');
INSERT INTO `student` VALUES ('17', '李四', '1', '20');
INSERT INTO `student` VALUES ('18', '李四', '1', '20');
INSERT INTO `student` VALUES ('19', '李四', '1', '20');
INSERT INTO `student` VALUES ('20', '李四', '1', '20');
INSERT INTO `student` VALUES ('21', '李四', '1', '20');
INSERT INTO `student` VALUES ('22', '李四', '1', '20');
