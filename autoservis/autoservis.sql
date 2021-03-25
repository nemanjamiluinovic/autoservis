/*
Navicat MySQL Data Transfer

Source Server         : AutoServis
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : autoservis

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-03-28 12:55:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) DEFAULT NULL,
  `pass_hash` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `uq_username_admin` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin1', '$2y$10$rP3l9zcmXjRvgQp2RYFZRO8OEKwvr1NPeL2sTRFkKcONfZO5/qz0e', '1');
INSERT INTO `admin` VALUES ('3', 'admin2', 'admin2', '1');

-- ----------------------------
-- Table structure for model
-- ----------------------------
DROP TABLE IF EXISTS `model`;
CREATE TABLE `model` (
  `model_id` int(10) NOT NULL AUTO_INCREMENT,
  `proizvodjac_id` int(10) DEFAULT NULL,
  `naziv` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`model_id`),
  UNIQUE KEY `uq_naziv_model` (`naziv`),
  KEY `fk_model_proizvodjac` (`proizvodjac_id`),
  CONSTRAINT `fk_model_proizvodjac` FOREIGN KEY (`proizvodjac_id`) REFERENCES `proizvodjac` (`proizvodjac_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of model
-- ----------------------------
INSERT INTO `model` VALUES ('4', '1', '520i');
INSERT INTO `model` VALUES ('5', '1', 'M3');
INSERT INTO `model` VALUES ('6', '1', 'M5');
INSERT INTO `model` VALUES ('7', '1', '640i');
INSERT INTO `model` VALUES ('8', '1', 'M6');
INSERT INTO `model` VALUES ('9', '1', '760i');
INSERT INTO `model` VALUES ('10', '1', 'M2');
INSERT INTO `model` VALUES ('11', '1', 'M4');
INSERT INTO `model` VALUES ('12', '1', 'Z4');
INSERT INTO `model` VALUES ('14', '3', 'A3');
INSERT INTO `model` VALUES ('15', '3', 'A4');
INSERT INTO `model` VALUES ('16', '3', 'A5');
INSERT INTO `model` VALUES ('17', '3', 'A6');
INSERT INTO `model` VALUES ('18', '3', 'A7');
INSERT INTO `model` VALUES ('19', '3', 'A8');
INSERT INTO `model` VALUES ('20', '3', 'TT');
INSERT INTO `model` VALUES ('21', '3', 'R8');
INSERT INTO `model` VALUES ('22', '2', 'C class');
INSERT INTO `model` VALUES ('23', '5', 'Ibiza');
INSERT INTO `model` VALUES ('24', '5', 'Leon');
INSERT INTO `model` VALUES ('25', '2', 's class');

-- ----------------------------
-- Table structure for proizvodjac
-- ----------------------------
DROP TABLE IF EXISTS `proizvodjac`;
CREATE TABLE `proizvodjac` (
  `proizvodjac_id` int(10) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`proizvodjac_id`),
  UNIQUE KEY `uq_naziv_proizvodjac` (`naziv`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of proizvodjac
-- ----------------------------
INSERT INTO `proizvodjac` VALUES ('3', 'Audi');
INSERT INTO `proizvodjac` VALUES ('1', 'BMW');
INSERT INTO `proizvodjac` VALUES ('2', 'Mercedes-Benz');
INSERT INTO `proizvodjac` VALUES ('5', 'Seat');

-- ----------------------------
-- Table structure for servis
-- ----------------------------
DROP TABLE IF EXISTS `servis`;
CREATE TABLE `servis` (
  `servis_id` int(10) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `end_at` datetime DEFAULT NULL,
  `vozilo_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `placeno` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`servis_id`),
  KEY `fk_vozilo_servis` (`vozilo_id`),
  KEY `fk_user_servis` (`user_id`),
  CONSTRAINT `fk_user_servis` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_vozilo_servis` FOREIGN KEY (`vozilo_id`) REFERENCES `vozilo` (`vozilo_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of servis
-- ----------------------------
INSERT INTO `servis` VALUES ('1', '2018-11-19 10:09:00', '2018-11-19 10:30:57', '1', '4', '1');
INSERT INTO `servis` VALUES ('5', '2018-11-19 13:59:10', '2018-11-23 13:59:10', '1', '4', '1');
INSERT INTO `servis` VALUES ('6', '2018-11-19 14:00:22', '2018-12-19 12:31:13', '1', '4', '1');
INSERT INTO `servis` VALUES ('8', '2018-11-19 14:03:21', '2018-11-19 22:40:21', '1', '4', '1');
INSERT INTO `servis` VALUES ('9', '2018-11-19 14:03:59', '2018-12-04 12:31:17', '1', '4', '1');
INSERT INTO `servis` VALUES ('10', '2018-11-19 14:04:50', '2018-11-22 18:20:50', '1', '4', '1');
INSERT INTO `servis` VALUES ('11', '2018-11-19 14:05:46', '2018-12-25 12:31:21', '1', '4', '1');
INSERT INTO `servis` VALUES ('12', '2018-11-21 18:38:05', '2018-11-21 18:40:15', '4', '4', '1');
INSERT INTO `servis` VALUES ('13', '2018-11-21 18:43:33', '2018-11-21 18:44:59', '1', '4', '1');
INSERT INTO `servis` VALUES ('14', '2018-11-21 18:44:05', '2018-12-12 12:31:34', '1', '4', '1');
INSERT INTO `servis` VALUES ('15', '2018-11-22 12:34:38', null, '7', '4', '0');
INSERT INTO `servis` VALUES ('16', '2018-11-22 13:52:55', null, '8', '14', '0');
INSERT INTO `servis` VALUES ('17', '2018-11-22 13:54:21', null, '9', '13', '0');
INSERT INTO `servis` VALUES ('18', '2018-11-22 13:56:12', null, '10', '12', '0');
INSERT INTO `servis` VALUES ('19', '2018-11-22 13:56:18', null, '11', '12', '0');
INSERT INTO `servis` VALUES ('20', '2018-11-22 14:07:36', '2018-12-12 12:31:43', '6', '4', '1');
INSERT INTO `servis` VALUES ('100', '2018-07-03 00:40:21', null, '3', '4', '0');
INSERT INTO `servis` VALUES ('101', '2016-03-02 17:40:21', '2016-03-03 17:40:21', '10', '12', '1');
INSERT INTO `servis` VALUES ('102', '2018-10-19 10:16:21', null, '11', '12', '0');
INSERT INTO `servis` VALUES ('103', '2017-01-26 22:16:21', '2017-01-27 12:59:21', '1', '4', '1');
INSERT INTO `servis` VALUES ('104', '2016-07-27 03:04:21', '2016-07-27 12:04:21', '10', '12', '1');
INSERT INTO `servis` VALUES ('106', '2017-09-02 19:52:21', null, '4', '4', '0');
INSERT INTO `servis` VALUES ('107', '2018-02-03 12:40:21', '2018-02-04 12:40:21', '1', '4', '1');
INSERT INTO `servis` VALUES ('108', '2017-10-04 22:16:21', null, '6', '4', '0');
INSERT INTO `servis` VALUES ('109', '2018-03-26 19:52:21', '2018-03-27 08:23:21', '1', '4', '1');
INSERT INTO `servis` VALUES ('110', '2017-08-25 19:52:21', '2017-08-26 06:36:21', '4', '4', '1');
INSERT INTO `servis` VALUES ('111', '2018-10-09 17:28:21', null, '1', '4', '0');
INSERT INTO `servis` VALUES ('112', '2018-12-01 10:16:21', null, '10', '12', '0');
INSERT INTO `servis` VALUES ('113', '2018-07-11 05:28:21', '2018-07-11 14:32:21', '11', '12', '1');
INSERT INTO `servis` VALUES ('114', '2018-11-01 10:16:21', '2018-11-02 00:21:21', '3', '4', '1');
INSERT INTO `servis` VALUES ('115', '2016-12-11 12:40:21', null, '11', '12', '0');
INSERT INTO `servis` VALUES ('117', '2018-11-06 00:40:21', '2018-11-06 03:00:21', '10', '12', '1');
INSERT INTO `servis` VALUES ('118', '2016-08-07 10:16:21', '2016-08-07 19:56:21', '10', '12', '1');
INSERT INTO `servis` VALUES ('120', '2016-08-07 03:04:21', '2016-08-09 03:04:21', '1', '4', '1');
INSERT INTO `servis` VALUES ('121', '2017-04-13 05:28:21', null, '7', '4', '0');
INSERT INTO `servis` VALUES ('122', '2018-01-04 05:28:21', '2018-01-04 14:19:21', '8', '14', '1');
INSERT INTO `servis` VALUES ('126', '2018-04-26 05:28:21', null, '1', '4', '0');
INSERT INTO `servis` VALUES ('127', '2017-03-11 00:40:21', '2017-03-11 12:17:21', '7', '4', '1');
INSERT INTO `servis` VALUES ('128', '2016-08-10 12:40:21', '2016-08-11 12:40:21', '11', '12', '1');
INSERT INTO `servis` VALUES ('129', '2017-07-11 12:40:21', '2017-07-11 21:51:21', '8', '14', '1');
INSERT INTO `servis` VALUES ('131', '2016-02-09 19:52:21', '2016-02-19 19:52:21', '1', '4', '1');
INSERT INTO `servis` VALUES ('135', '2016-12-27 03:04:21', '2016-12-27 08:24:21', '8', '14', '1');
INSERT INTO `servis` VALUES ('137', '2017-03-04 10:16:21', '2017-03-04 23:17:21', '3', '4', '1');
INSERT INTO `servis` VALUES ('138', '2016-11-23 00:40:21', null, '11', '12', '0');
INSERT INTO `servis` VALUES ('139', '2016-12-19 03:04:21', '2016-12-19 04:20:21', '6', '4', '1');
INSERT INTO `servis` VALUES ('141', '2018-11-05 10:16:21', '2018-11-05 11:41:21', '6', '4', '1');
INSERT INTO `servis` VALUES ('142', '2016-06-01 05:28:21', '2016-06-01 06:34:21', '6', '4', '1');
INSERT INTO `servis` VALUES ('143', '2018-03-11 05:28:21', '2018-03-11 10:37:21', '8', '14', '1');
INSERT INTO `servis` VALUES ('144', '2017-03-15 00:40:21', null, '11', '12', '0');
INSERT INTO `servis` VALUES ('145', '2017-12-21 17:28:21', null, '9', '13', '0');
INSERT INTO `servis` VALUES ('146', '2016-08-05 22:16:21', '2016-08-06 12:53:21', '1', '4', '1');
INSERT INTO `servis` VALUES ('148', '2018-09-13 03:04:21', null, '9', '13', '0');
INSERT INTO `servis` VALUES ('150', '2016-06-02 17:28:21', '2016-06-03 06:09:21', '3', '4', '1');
INSERT INTO `servis` VALUES ('151', '2018-03-09 00:40:21', '2018-03-10 00:40:21', '9', '13', '1');
INSERT INTO `servis` VALUES ('152', '2016-08-21 22:16:21', '2016-08-23 22:16:21', '1', '4', '1');
INSERT INTO `servis` VALUES ('153', '2016-06-21 03:04:21', '2016-06-29 03:04:21', '6', '4', '1');
INSERT INTO `servis` VALUES ('154', '2016-10-29 07:52:21', '2016-10-29 08:59:21', '3', '4', '1');
INSERT INTO `servis` VALUES ('156', '2018-08-03 19:52:21', '2018-08-04 07:30:21', '8', '14', '1');
INSERT INTO `servis` VALUES ('157', '2017-12-16 05:28:21', '2017-12-16 10:38:21', '10', '12', '1');
INSERT INTO `servis` VALUES ('158', '2017-03-21 15:04:21', null, '8', '14', '0');
INSERT INTO `servis` VALUES ('159', '2016-11-25 03:04:21', '2016-11-25 17:04:21', '3', '4', '1');
INSERT INTO `servis` VALUES ('160', '2016-08-06 15:04:21', '2016-08-16 15:04:21', '10', '12', '1');
INSERT INTO `servis` VALUES ('161', '2018-07-11 10:16:21', '2018-07-12 03:02:21', '1', '4', '1');
INSERT INTO `servis` VALUES ('162', '2017-11-11 10:16:21', null, '1', '4', '0');
INSERT INTO `servis` VALUES ('163', '2017-11-03 19:52:21', null, '3', '4', '0');
INSERT INTO `servis` VALUES ('165', '2016-04-26 17:28:21', '2016-04-27 07:19:21', '1', '4', '1');
INSERT INTO `servis` VALUES ('166', '2018-09-19 15:04:21', '2018-09-19 16:10:21', '4', '4', '1');
INSERT INTO `servis` VALUES ('167', '2016-11-28 19:52:21', '2016-11-29 06:41:21', '3', '4', '1');
INSERT INTO `servis` VALUES ('168', '2017-07-19 03:04:21', null, '7', '4', '0');
INSERT INTO `servis` VALUES ('169', '2018-08-05 17:28:21', null, '10', '12', '0');
INSERT INTO `servis` VALUES ('170', '2018-10-03 22:16:21', '2018-10-04 12:05:21', '8', '14', '1');
INSERT INTO `servis` VALUES ('171', '2017-09-18 22:16:21', null, '6', '4', '0');
INSERT INTO `servis` VALUES ('172', '2018-10-22 10:16:21', null, '10', '12', '0');
INSERT INTO `servis` VALUES ('173', '2018-09-01 17:28:21', '2018-09-02 01:30:21', '9', '13', '1');
INSERT INTO `servis` VALUES ('174', '2017-09-21 10:16:21', '2017-09-22 00:36:21', '1', '4', '1');
INSERT INTO `servis` VALUES ('175', '2018-09-24 19:52:21', null, '9', '13', '0');
INSERT INTO `servis` VALUES ('176', '2016-08-28 07:52:21', '2016-08-29 07:52:21', '9', '13', '1');
INSERT INTO `servis` VALUES ('177', '2016-03-17 00:40:21', '2016-03-18 22:40:21', '9', '13', '1');
INSERT INTO `servis` VALUES ('178', '2016-05-28 12:40:21', '2016-05-29 03:40:21', '9', '13', '1');
INSERT INTO `servis` VALUES ('179', '2017-10-15 17:28:21', null, '7', '4', '0');
INSERT INTO `servis` VALUES ('180', '2017-12-12 12:40:21', null, '1', '4', '0');
INSERT INTO `servis` VALUES ('181', '2016-04-26 22:16:21', '2016-04-27 22:16:21', '8', '14', '1');
INSERT INTO `servis` VALUES ('182', '2016-12-29 03:04:21', null, '1', '4', '0');
INSERT INTO `servis` VALUES ('183', '2017-05-12 10:16:21', '2017-05-13 01:00:21', '4', '4', '1');
INSERT INTO `servis` VALUES ('185', '2017-09-23 10:16:21', null, '4', '4', '0');
INSERT INTO `servis` VALUES ('187', '2016-06-11 12:40:21', '2016-06-12 05:38:21', '3', '4', '1');
INSERT INTO `servis` VALUES ('188', '2016-05-23 19:52:21', '2016-05-28 19:52:21', '1', '4', '1');
INSERT INTO `servis` VALUES ('189', '2016-11-21 17:28:21', '2016-11-22 04:03:21', '11', '12', '1');
INSERT INTO `servis` VALUES ('191', '2018-08-14 15:04:21', '2018-08-14 16:39:21', '3', '4', '1');
INSERT INTO `servis` VALUES ('192', '2018-03-14 22:16:21', null, '1', '4', '0');
INSERT INTO `servis` VALUES ('193', '2017-08-06 22:16:21', '2017-08-06 23:43:21', '9', '13', '1');
INSERT INTO `servis` VALUES ('194', '2017-12-19 07:52:21', null, '11', '12', '0');
INSERT INTO `servis` VALUES ('195', '2017-06-11 22:16:21', null, '9', '13', '0');
INSERT INTO `servis` VALUES ('196', '2017-05-11 15:04:21', null, '6', '4', '0');
INSERT INTO `servis` VALUES ('197', '2016-09-10 15:04:21', '2016-09-11 00:31:21', '3', '4', '1');
INSERT INTO `servis` VALUES ('198', '2017-12-01 05:28:21', '2017-12-01 12:43:21', '11', '12', '1');
INSERT INTO `servis` VALUES ('199', '2017-10-07 03:04:21', '2017-10-07 05:18:21', '7', '4', '1');
INSERT INTO `servis` VALUES ('200', '2017-09-27 12:40:21', '2017-09-28 04:23:21', '4', '4', '1');
INSERT INTO `servis` VALUES ('202', '2017-10-08 19:52:21', null, '4', '4', '0');
INSERT INTO `servis` VALUES ('203', '2016-05-01 05:28:21', '2016-05-01 22:10:21', '8', '14', '1');
INSERT INTO `servis` VALUES ('204', '2016-03-15 00:40:21', '2016-03-16 12:40:21', '3', '4', '1');
INSERT INTO `servis` VALUES ('206', '2018-12-04 19:52:21', '2018-12-05 09:58:21', '6', '4', '1');
INSERT INTO `servis` VALUES ('207', '2018-01-13 03:04:21', '2018-01-13 04:48:21', '7', '4', '1');
INSERT INTO `servis` VALUES ('209', '2016-08-24 19:52:21', '2016-08-30 19:52:21', '9', '13', '1');
INSERT INTO `servis` VALUES ('210', '2018-06-17 10:16:21', '2018-06-17 21:19:21', '10', '12', '1');
INSERT INTO `servis` VALUES ('211', '2018-02-09 22:16:21', '2018-02-10 12:40:21', '8', '14', '1');
INSERT INTO `servis` VALUES ('212', '2017-02-15 19:52:21', '2017-02-16 13:12:21', '8', '14', '1');
INSERT INTO `servis` VALUES ('213', '2016-08-13 07:52:21', '2016-08-18 07:52:21', '11', '12', '1');
INSERT INTO `servis` VALUES ('215', '2018-10-05 12:40:21', '2018-10-05 16:03:21', '3', '4', '1');
INSERT INTO `servis` VALUES ('216', '2018-07-15 07:52:21', null, '11', '12', '0');
INSERT INTO `servis` VALUES ('217', '2018-03-05 07:52:21', '2018-03-15 07:52:21', '11', '12', '1');
INSERT INTO `servis` VALUES ('218', '2017-04-07 12:40:21', '2017-04-08 03:51:21', '6', '4', '1');
INSERT INTO `servis` VALUES ('219', '2018-04-19 00:40:21', '2018-04-20 13:40:21', '11', '12', '1');
INSERT INTO `servis` VALUES ('222', '2018-04-08 05:28:21', '2018-04-12 05:28:21', '6', '4', '1');
INSERT INTO `servis` VALUES ('223', '2017-12-22 15:04:21', null, '11', '12', '0');
INSERT INTO `servis` VALUES ('224', '2017-05-24 17:28:21', null, '6', '4', '0');
INSERT INTO `servis` VALUES ('226', '2016-04-04 15:04:21', '2016-04-05 07:24:21', '11', '12', '1');
INSERT INTO `servis` VALUES ('227', '2017-07-31 15:04:21', '2017-07-31 21:43:21', '1', '4', '1');
INSERT INTO `servis` VALUES ('228', '2017-11-07 07:52:21', '2017-11-09 07:52:21', '1', '4', '1');
INSERT INTO `servis` VALUES ('229', '2017-01-28 00:40:21', '2017-01-28 06:24:21', '3', '4', '1');
INSERT INTO `servis` VALUES ('230', '2017-05-23 07:52:21', '2017-05-25 07:52:21', '4', '4', '1');
INSERT INTO `servis` VALUES ('231', '2017-09-15 15:04:21', '2017-09-16 04:47:21', '6', '4', '1');
INSERT INTO `servis` VALUES ('232', '2018-09-25 12:40:21', '2018-09-25 14:51:21', '7', '4', '1');
INSERT INTO `servis` VALUES ('233', '2016-08-02 17:28:21', '2016-08-03 06:58:21', '7', '4', '1');
INSERT INTO `servis` VALUES ('234', '2018-04-30 22:16:21', '2018-05-01 12:34:21', '8', '14', '1');
INSERT INTO `servis` VALUES ('235', '2017-01-29 05:28:21', null, '1', '4', '0');
INSERT INTO `servis` VALUES ('236', '2018-11-06 10:16:21', '2018-11-06 15:24:21', '4', '4', '1');
INSERT INTO `servis` VALUES ('237', '2017-06-08 00:40:21', '2017-06-08 09:06:21', '4', '4', '1');
INSERT INTO `servis` VALUES ('238', '2017-03-15 22:16:21', '2017-03-15 23:50:21', '8', '14', '1');
INSERT INTO `servis` VALUES ('239', '2017-11-28 10:16:21', '2017-11-28 18:16:21', '10', '12', '1');
INSERT INTO `servis` VALUES ('240', '2017-09-28 10:16:21', null, '4', '4', '0');
INSERT INTO `servis` VALUES ('241', '2018-03-14 12:40:21', '2018-03-14 20:02:21', '8', '14', '1');
INSERT INTO `servis` VALUES ('242', '2017-10-06 22:16:21', '2017-10-07 12:01:21', '11', '12', '1');
INSERT INTO `servis` VALUES ('243', '2016-01-09 05:28:21', '2016-01-10 05:28:21', '7', '4', '1');
INSERT INTO `servis` VALUES ('244', '2016-07-03 19:52:21', '2016-07-05 13:39:41', '8', '14', '1');
INSERT INTO `servis` VALUES ('245', '2018-10-20 19:52:21', null, '8', '14', '0');
INSERT INTO `servis` VALUES ('246', '2017-09-09 17:28:21', null, '9', '13', '0');
INSERT INTO `servis` VALUES ('247', '2018-06-10 19:52:21', '2018-06-11 03:03:21', '7', '4', '1');
INSERT INTO `servis` VALUES ('248', '2018-02-24 00:40:21', '2018-02-25 20:40:21', '6', '4', '1');
INSERT INTO `servis` VALUES ('249', '2018-01-06 17:28:21', null, '4', '4', '0');

-- ----------------------------
-- Table structure for servis_usluga
-- ----------------------------
DROP TABLE IF EXISTS `servis_usluga`;
CREATE TABLE `servis_usluga` (
  `servis_usluga_id` int(10) NOT NULL AUTO_INCREMENT,
  `servis_id` int(10) DEFAULT NULL,
  `usluga_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`servis_usluga_id`),
  KEY `fk_servis_usluga` (`servis_id`),
  KEY `fk_usluga_servis` (`usluga_id`),
  CONSTRAINT `fk_servis_usluga` FOREIGN KEY (`servis_id`) REFERENCES `servis` (`servis_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_usluga_servis` FOREIGN KEY (`usluga_id`) REFERENCES `usluga` (`usluga_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=321 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of servis_usluga
-- ----------------------------
INSERT INTO `servis_usluga` VALUES ('1', '1', '1');
INSERT INTO `servis_usluga` VALUES ('2', '6', '2');
INSERT INTO `servis_usluga` VALUES ('3', '9', '4');
INSERT INTO `servis_usluga` VALUES ('4', '10', '4');
INSERT INTO `servis_usluga` VALUES ('5', '11', '1');
INSERT INTO `servis_usluga` VALUES ('6', '12', '2');
INSERT INTO `servis_usluga` VALUES ('7', '13', '4');
INSERT INTO `servis_usluga` VALUES ('8', '14', '1');
INSERT INTO `servis_usluga` VALUES ('9', '15', '11');
INSERT INTO `servis_usluga` VALUES ('10', '16', '5');
INSERT INTO `servis_usluga` VALUES ('11', '17', '11');
INSERT INTO `servis_usluga` VALUES ('12', '18', '12');
INSERT INTO `servis_usluga` VALUES ('13', '19', '6');
INSERT INTO `servis_usluga` VALUES ('14', '20', '5');
INSERT INTO `servis_usluga` VALUES ('15', '100', '5');
INSERT INTO `servis_usluga` VALUES ('16', '100', '7');
INSERT INTO `servis_usluga` VALUES ('17', '100', '9');
INSERT INTO `servis_usluga` VALUES ('18', '101', '5');
INSERT INTO `servis_usluga` VALUES ('19', '101', '6');
INSERT INTO `servis_usluga` VALUES ('20', '101', '9');
INSERT INTO `servis_usluga` VALUES ('21', '102', '11');
INSERT INTO `servis_usluga` VALUES ('22', '103', '2');
INSERT INTO `servis_usluga` VALUES ('23', '104', '2');
INSERT INTO `servis_usluga` VALUES ('24', '104', '7');
INSERT INTO `servis_usluga` VALUES ('25', '106', '1');
INSERT INTO `servis_usluga` VALUES ('26', '107', '2');
INSERT INTO `servis_usluga` VALUES ('27', '107', '5');
INSERT INTO `servis_usluga` VALUES ('28', '107', '6');
INSERT INTO `servis_usluga` VALUES ('29', '107', '8');
INSERT INTO `servis_usluga` VALUES ('30', '107', '10');
INSERT INTO `servis_usluga` VALUES ('31', '108', '4');
INSERT INTO `servis_usluga` VALUES ('32', '108', '5');
INSERT INTO `servis_usluga` VALUES ('33', '108', '8');
INSERT INTO `servis_usluga` VALUES ('34', '109', '4');
INSERT INTO `servis_usluga` VALUES ('35', '109', '7');
INSERT INTO `servis_usluga` VALUES ('36', '110', '11');
INSERT INTO `servis_usluga` VALUES ('37', '111', '2');
INSERT INTO `servis_usluga` VALUES ('38', '111', '5');
INSERT INTO `servis_usluga` VALUES ('39', '112', '2');
INSERT INTO `servis_usluga` VALUES ('40', '112', '5');
INSERT INTO `servis_usluga` VALUES ('41', '112', '12');
INSERT INTO `servis_usluga` VALUES ('42', '113', '2');
INSERT INTO `servis_usluga` VALUES ('43', '113', '8');
INSERT INTO `servis_usluga` VALUES ('44', '113', '10');
INSERT INTO `servis_usluga` VALUES ('45', '114', '11');
INSERT INTO `servis_usluga` VALUES ('46', '114', '12');
INSERT INTO `servis_usluga` VALUES ('47', '115', '8');
INSERT INTO `servis_usluga` VALUES ('48', '117', '12');
INSERT INTO `servis_usluga` VALUES ('49', '118', '5');
INSERT INTO `servis_usluga` VALUES ('50', '118', '7');
INSERT INTO `servis_usluga` VALUES ('51', '120', '5');
INSERT INTO `servis_usluga` VALUES ('52', '120', '8');
INSERT INTO `servis_usluga` VALUES ('53', '120', '9');
INSERT INTO `servis_usluga` VALUES ('54', '121', '8');
INSERT INTO `servis_usluga` VALUES ('55', '122', '7');
INSERT INTO `servis_usluga` VALUES ('56', '122', '9');
INSERT INTO `servis_usluga` VALUES ('57', '122', '12');
INSERT INTO `servis_usluga` VALUES ('58', '126', '7');
INSERT INTO `servis_usluga` VALUES ('59', '127', '8');
INSERT INTO `servis_usluga` VALUES ('60', '128', '7');
INSERT INTO `servis_usluga` VALUES ('61', '128', '11');
INSERT INTO `servis_usluga` VALUES ('62', '129', '2');
INSERT INTO `servis_usluga` VALUES ('63', '129', '8');
INSERT INTO `servis_usluga` VALUES ('64', '131', '1');
INSERT INTO `servis_usluga` VALUES ('65', '131', '8');
INSERT INTO `servis_usluga` VALUES ('66', '131', '11');
INSERT INTO `servis_usluga` VALUES ('67', '135', '4');
INSERT INTO `servis_usluga` VALUES ('68', '135', '9');
INSERT INTO `servis_usluga` VALUES ('69', '137', '7');
INSERT INTO `servis_usluga` VALUES ('70', '137', '9');
INSERT INTO `servis_usluga` VALUES ('71', '137', '12');
INSERT INTO `servis_usluga` VALUES ('72', '138', '2');
INSERT INTO `servis_usluga` VALUES ('73', '138', '4');
INSERT INTO `servis_usluga` VALUES ('74', '138', '5');
INSERT INTO `servis_usluga` VALUES ('75', '139', '11');
INSERT INTO `servis_usluga` VALUES ('76', '139', '12');
INSERT INTO `servis_usluga` VALUES ('77', '141', '6');
INSERT INTO `servis_usluga` VALUES ('78', '141', '8');
INSERT INTO `servis_usluga` VALUES ('79', '141', '11');
INSERT INTO `servis_usluga` VALUES ('80', '142', '5');
INSERT INTO `servis_usluga` VALUES ('81', '142', '9');
INSERT INTO `servis_usluga` VALUES ('82', '143', '11');
INSERT INTO `servis_usluga` VALUES ('83', '144', '9');
INSERT INTO `servis_usluga` VALUES ('84', '145', '5');
INSERT INTO `servis_usluga` VALUES ('85', '145', '7');
INSERT INTO `servis_usluga` VALUES ('86', '145', '10');
INSERT INTO `servis_usluga` VALUES ('87', '146', '1');
INSERT INTO `servis_usluga` VALUES ('88', '146', '2');
INSERT INTO `servis_usluga` VALUES ('89', '146', '10');
INSERT INTO `servis_usluga` VALUES ('90', '148', '6');
INSERT INTO `servis_usluga` VALUES ('91', '148', '9');
INSERT INTO `servis_usluga` VALUES ('92', '148', '11');
INSERT INTO `servis_usluga` VALUES ('93', '150', '5');
INSERT INTO `servis_usluga` VALUES ('94', '150', '6');
INSERT INTO `servis_usluga` VALUES ('95', '150', '7');
INSERT INTO `servis_usluga` VALUES ('96', '150', '8');
INSERT INTO `servis_usluga` VALUES ('97', '151', '5');
INSERT INTO `servis_usluga` VALUES ('98', '151', '12');
INSERT INTO `servis_usluga` VALUES ('99', '152', '1');
INSERT INTO `servis_usluga` VALUES ('100', '152', '2');
INSERT INTO `servis_usluga` VALUES ('101', '152', '11');
INSERT INTO `servis_usluga` VALUES ('102', '153', '4');
INSERT INTO `servis_usluga` VALUES ('103', '153', '5');
INSERT INTO `servis_usluga` VALUES ('104', '153', '6');
INSERT INTO `servis_usluga` VALUES ('105', '153', '8');
INSERT INTO `servis_usluga` VALUES ('106', '153', '11');
INSERT INTO `servis_usluga` VALUES ('107', '154', '6');
INSERT INTO `servis_usluga` VALUES ('108', '154', '10');
INSERT INTO `servis_usluga` VALUES ('109', '156', '1');
INSERT INTO `servis_usluga` VALUES ('110', '156', '2');
INSERT INTO `servis_usluga` VALUES ('111', '156', '6');
INSERT INTO `servis_usluga` VALUES ('112', '156', '10');
INSERT INTO `servis_usluga` VALUES ('113', '158', '1');
INSERT INTO `servis_usluga` VALUES ('114', '158', '10');
INSERT INTO `servis_usluga` VALUES ('115', '158', '12');
INSERT INTO `servis_usluga` VALUES ('116', '159', '10');
INSERT INTO `servis_usluga` VALUES ('117', '160', '1');
INSERT INTO `servis_usluga` VALUES ('118', '160', '11');
INSERT INTO `servis_usluga` VALUES ('119', '160', '12');
INSERT INTO `servis_usluga` VALUES ('120', '161', '1');
INSERT INTO `servis_usluga` VALUES ('121', '161', '2');
INSERT INTO `servis_usluga` VALUES ('122', '161', '11');
INSERT INTO `servis_usluga` VALUES ('123', '162', '9');
INSERT INTO `servis_usluga` VALUES ('124', '162', '10');
INSERT INTO `servis_usluga` VALUES ('125', '162', '11');
INSERT INTO `servis_usluga` VALUES ('126', '163', '2');
INSERT INTO `servis_usluga` VALUES ('127', '163', '7');
INSERT INTO `servis_usluga` VALUES ('128', '165', '2');
INSERT INTO `servis_usluga` VALUES ('129', '165', '4');
INSERT INTO `servis_usluga` VALUES ('130', '165', '8');
INSERT INTO `servis_usluga` VALUES ('131', '166', '1');
INSERT INTO `servis_usluga` VALUES ('132', '166', '4');
INSERT INTO `servis_usluga` VALUES ('133', '166', '7');
INSERT INTO `servis_usluga` VALUES ('134', '166', '8');
INSERT INTO `servis_usluga` VALUES ('135', '166', '10');
INSERT INTO `servis_usluga` VALUES ('136', '167', '5');
INSERT INTO `servis_usluga` VALUES ('137', '167', '10');
INSERT INTO `servis_usluga` VALUES ('138', '168', '2');
INSERT INTO `servis_usluga` VALUES ('139', '168', '5');
INSERT INTO `servis_usluga` VALUES ('140', '168', '10');
INSERT INTO `servis_usluga` VALUES ('141', '169', '5');
INSERT INTO `servis_usluga` VALUES ('142', '170', '8');
INSERT INTO `servis_usluga` VALUES ('143', '170', '9');
INSERT INTO `servis_usluga` VALUES ('144', '171', '2');
INSERT INTO `servis_usluga` VALUES ('145', '171', '7');
INSERT INTO `servis_usluga` VALUES ('146', '171', '11');
INSERT INTO `servis_usluga` VALUES ('147', '172', '4');
INSERT INTO `servis_usluga` VALUES ('148', '172', '10');
INSERT INTO `servis_usluga` VALUES ('149', '173', '4');
INSERT INTO `servis_usluga` VALUES ('150', '173', '8');
INSERT INTO `servis_usluga` VALUES ('151', '174', '2');
INSERT INTO `servis_usluga` VALUES ('152', '174', '8');
INSERT INTO `servis_usluga` VALUES ('153', '174', '12');
INSERT INTO `servis_usluga` VALUES ('154', '175', '4');
INSERT INTO `servis_usluga` VALUES ('155', '175', '6');
INSERT INTO `servis_usluga` VALUES ('156', '176', '1');
INSERT INTO `servis_usluga` VALUES ('157', '176', '6');
INSERT INTO `servis_usluga` VALUES ('158', '177', '6');
INSERT INTO `servis_usluga` VALUES ('159', '177', '10');
INSERT INTO `servis_usluga` VALUES ('160', '177', '11');
INSERT INTO `servis_usluga` VALUES ('161', '178', '7');
INSERT INTO `servis_usluga` VALUES ('162', '178', '9');
INSERT INTO `servis_usluga` VALUES ('163', '179', '4');
INSERT INTO `servis_usluga` VALUES ('164', '179', '7');
INSERT INTO `servis_usluga` VALUES ('165', '179', '10');
INSERT INTO `servis_usluga` VALUES ('166', '180', '11');
INSERT INTO `servis_usluga` VALUES ('167', '180', '12');
INSERT INTO `servis_usluga` VALUES ('168', '181', '5');
INSERT INTO `servis_usluga` VALUES ('169', '181', '10');
INSERT INTO `servis_usluga` VALUES ('170', '182', '5');
INSERT INTO `servis_usluga` VALUES ('171', '182', '11');
INSERT INTO `servis_usluga` VALUES ('172', '183', '9');
INSERT INTO `servis_usluga` VALUES ('173', '185', '4');
INSERT INTO `servis_usluga` VALUES ('174', '185', '5');
INSERT INTO `servis_usluga` VALUES ('175', '185', '10');
INSERT INTO `servis_usluga` VALUES ('176', '187', '2');
INSERT INTO `servis_usluga` VALUES ('177', '187', '4');
INSERT INTO `servis_usluga` VALUES ('178', '187', '6');
INSERT INTO `servis_usluga` VALUES ('179', '188', '5');
INSERT INTO `servis_usluga` VALUES ('180', '188', '9');
INSERT INTO `servis_usluga` VALUES ('181', '188', '10');
INSERT INTO `servis_usluga` VALUES ('182', '191', '5');
INSERT INTO `servis_usluga` VALUES ('183', '191', '7');
INSERT INTO `servis_usluga` VALUES ('184', '191', '8');
INSERT INTO `servis_usluga` VALUES ('185', '191', '12');
INSERT INTO `servis_usluga` VALUES ('186', '192', '5');
INSERT INTO `servis_usluga` VALUES ('187', '192', '6');
INSERT INTO `servis_usluga` VALUES ('188', '192', '9');
INSERT INTO `servis_usluga` VALUES ('189', '192', '10');
INSERT INTO `servis_usluga` VALUES ('190', '193', '1');
INSERT INTO `servis_usluga` VALUES ('191', '193', '5');
INSERT INTO `servis_usluga` VALUES ('192', '193', '9');
INSERT INTO `servis_usluga` VALUES ('193', '194', '1');
INSERT INTO `servis_usluga` VALUES ('194', '194', '9');
INSERT INTO `servis_usluga` VALUES ('195', '194', '11');
INSERT INTO `servis_usluga` VALUES ('196', '195', '1');
INSERT INTO `servis_usluga` VALUES ('197', '195', '2');
INSERT INTO `servis_usluga` VALUES ('198', '195', '6');
INSERT INTO `servis_usluga` VALUES ('199', '196', '7');
INSERT INTO `servis_usluga` VALUES ('200', '196', '12');
INSERT INTO `servis_usluga` VALUES ('201', '197', '1');
INSERT INTO `servis_usluga` VALUES ('202', '197', '5');
INSERT INTO `servis_usluga` VALUES ('203', '197', '9');
INSERT INTO `servis_usluga` VALUES ('204', '198', '8');
INSERT INTO `servis_usluga` VALUES ('205', '198', '12');
INSERT INTO `servis_usluga` VALUES ('206', '199', '4');
INSERT INTO `servis_usluga` VALUES ('207', '199', '8');
INSERT INTO `servis_usluga` VALUES ('208', '199', '9');
INSERT INTO `servis_usluga` VALUES ('209', '200', '9');
INSERT INTO `servis_usluga` VALUES ('210', '200', '12');
INSERT INTO `servis_usluga` VALUES ('211', '202', '5');
INSERT INTO `servis_usluga` VALUES ('212', '202', '9');
INSERT INTO `servis_usluga` VALUES ('213', '202', '11');
INSERT INTO `servis_usluga` VALUES ('214', '203', '2');
INSERT INTO `servis_usluga` VALUES ('215', '203', '4');
INSERT INTO `servis_usluga` VALUES ('216', '203', '5');
INSERT INTO `servis_usluga` VALUES ('217', '203', '12');
INSERT INTO `servis_usluga` VALUES ('218', '204', '2');
INSERT INTO `servis_usluga` VALUES ('219', '204', '4');
INSERT INTO `servis_usluga` VALUES ('220', '206', '7');
INSERT INTO `servis_usluga` VALUES ('221', '206', '11');
INSERT INTO `servis_usluga` VALUES ('222', '206', '12');
INSERT INTO `servis_usluga` VALUES ('223', '207', '4');
INSERT INTO `servis_usluga` VALUES ('224', '207', '5');
INSERT INTO `servis_usluga` VALUES ('225', '207', '8');
INSERT INTO `servis_usluga` VALUES ('226', '209', '2');
INSERT INTO `servis_usluga` VALUES ('227', '209', '4');
INSERT INTO `servis_usluga` VALUES ('228', '209', '6');
INSERT INTO `servis_usluga` VALUES ('229', '209', '9');
INSERT INTO `servis_usluga` VALUES ('230', '209', '10');
INSERT INTO `servis_usluga` VALUES ('231', '210', '6');
INSERT INTO `servis_usluga` VALUES ('232', '210', '9');
INSERT INTO `servis_usluga` VALUES ('233', '210', '12');
INSERT INTO `servis_usluga` VALUES ('234', '211', '4');
INSERT INTO `servis_usluga` VALUES ('235', '212', '9');
INSERT INTO `servis_usluga` VALUES ('236', '212', '10');
INSERT INTO `servis_usluga` VALUES ('237', '213', '2');
INSERT INTO `servis_usluga` VALUES ('238', '213', '5');
INSERT INTO `servis_usluga` VALUES ('239', '215', '1');
INSERT INTO `servis_usluga` VALUES ('240', '215', '4');
INSERT INTO `servis_usluga` VALUES ('241', '215', '7');
INSERT INTO `servis_usluga` VALUES ('242', '216', '2');
INSERT INTO `servis_usluga` VALUES ('243', '216', '4');
INSERT INTO `servis_usluga` VALUES ('244', '216', '11');
INSERT INTO `servis_usluga` VALUES ('245', '217', '7');
INSERT INTO `servis_usluga` VALUES ('246', '218', '1');
INSERT INTO `servis_usluga` VALUES ('247', '218', '5');
INSERT INTO `servis_usluga` VALUES ('248', '218', '6');
INSERT INTO `servis_usluga` VALUES ('249', '219', '5');
INSERT INTO `servis_usluga` VALUES ('250', '219', '7');
INSERT INTO `servis_usluga` VALUES ('251', '219', '10');
INSERT INTO `servis_usluga` VALUES ('252', '222', '7');
INSERT INTO `servis_usluga` VALUES ('253', '222', '11');
INSERT INTO `servis_usluga` VALUES ('254', '223', '8');
INSERT INTO `servis_usluga` VALUES ('255', '223', '10');
INSERT INTO `servis_usluga` VALUES ('256', '224', '2');
INSERT INTO `servis_usluga` VALUES ('257', '224', '7');
INSERT INTO `servis_usluga` VALUES ('258', '224', '8');
INSERT INTO `servis_usluga` VALUES ('259', '226', '6');
INSERT INTO `servis_usluga` VALUES ('260', '226', '7');
INSERT INTO `servis_usluga` VALUES ('261', '227', '1');
INSERT INTO `servis_usluga` VALUES ('262', '227', '9');
INSERT INTO `servis_usluga` VALUES ('263', '227', '11');
INSERT INTO `servis_usluga` VALUES ('264', '228', '6');
INSERT INTO `servis_usluga` VALUES ('265', '228', '7');
INSERT INTO `servis_usluga` VALUES ('266', '228', '11');
INSERT INTO `servis_usluga` VALUES ('267', '229', '1');
INSERT INTO `servis_usluga` VALUES ('268', '229', '8');
INSERT INTO `servis_usluga` VALUES ('269', '229', '12');
INSERT INTO `servis_usluga` VALUES ('270', '230', '4');
INSERT INTO `servis_usluga` VALUES ('271', '230', '5');
INSERT INTO `servis_usluga` VALUES ('272', '230', '11');
INSERT INTO `servis_usluga` VALUES ('273', '231', '2');
INSERT INTO `servis_usluga` VALUES ('274', '231', '4');
INSERT INTO `servis_usluga` VALUES ('275', '231', '12');
INSERT INTO `servis_usluga` VALUES ('276', '232', '1');
INSERT INTO `servis_usluga` VALUES ('277', '232', '4');
INSERT INTO `servis_usluga` VALUES ('278', '232', '10');
INSERT INTO `servis_usluga` VALUES ('279', '233', '1');
INSERT INTO `servis_usluga` VALUES ('280', '233', '4');
INSERT INTO `servis_usluga` VALUES ('281', '233', '5');
INSERT INTO `servis_usluga` VALUES ('282', '234', '1');
INSERT INTO `servis_usluga` VALUES ('283', '234', '2');
INSERT INTO `servis_usluga` VALUES ('284', '234', '7');
INSERT INTO `servis_usluga` VALUES ('285', '235', '1');
INSERT INTO `servis_usluga` VALUES ('286', '235', '2');
INSERT INTO `servis_usluga` VALUES ('287', '236', '7');
INSERT INTO `servis_usluga` VALUES ('288', '236', '9');
INSERT INTO `servis_usluga` VALUES ('289', '236', '11');
INSERT INTO `servis_usluga` VALUES ('290', '237', '1');
INSERT INTO `servis_usluga` VALUES ('291', '237', '9');
INSERT INTO `servis_usluga` VALUES ('292', '238', '11');
INSERT INTO `servis_usluga` VALUES ('293', '238', '12');
INSERT INTO `servis_usluga` VALUES ('294', '239', '6');
INSERT INTO `servis_usluga` VALUES ('295', '239', '7');
INSERT INTO `servis_usluga` VALUES ('296', '240', '1');
INSERT INTO `servis_usluga` VALUES ('297', '240', '2');
INSERT INTO `servis_usluga` VALUES ('298', '240', '5');
INSERT INTO `servis_usluga` VALUES ('299', '241', '4');
INSERT INTO `servis_usluga` VALUES ('300', '241', '5');
INSERT INTO `servis_usluga` VALUES ('301', '241', '11');
INSERT INTO `servis_usluga` VALUES ('302', '242', '1');
INSERT INTO `servis_usluga` VALUES ('303', '242', '12');
INSERT INTO `servis_usluga` VALUES ('304', '243', '4');
INSERT INTO `servis_usluga` VALUES ('305', '243', '5');
INSERT INTO `servis_usluga` VALUES ('306', '243', '6');
INSERT INTO `servis_usluga` VALUES ('307', '243', '9');
INSERT INTO `servis_usluga` VALUES ('308', '244', '5');
INSERT INTO `servis_usluga` VALUES ('309', '244', '7');
INSERT INTO `servis_usluga` VALUES ('310', '244', '8');
INSERT INTO `servis_usluga` VALUES ('311', '245', '7');
INSERT INTO `servis_usluga` VALUES ('312', '245', '10');
INSERT INTO `servis_usluga` VALUES ('313', '246', '5');
INSERT INTO `servis_usluga` VALUES ('314', '246', '7');
INSERT INTO `servis_usluga` VALUES ('315', '247', '12');
INSERT INTO `servis_usluga` VALUES ('316', '248', '1');
INSERT INTO `servis_usluga` VALUES ('317', '248', '4');
INSERT INTO `servis_usluga` VALUES ('318', '248', '10');
INSERT INTO `servis_usluga` VALUES ('319', '249', '6');
INSERT INTO `servis_usluga` VALUES ('320', '249', '12');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `pass_hash` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `telefon` varchar(32) NOT NULL,
  `ime_prezime` varchar(64) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `uq_username_user` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('4', 'jelena', '$2y$10$hCzUQaa1fgpd5MYr2m3FR.NqfehfRzlPF8YJ5ktWlsKuiVCHxR7CW', '1', '123456789999', 'Jelena Jelenic');
INSERT INTO `user` VALUES ('6', 'pera', '$2y$10$8k33ryFh6VBRGS9kJmNHNuLdcCSJ5PQ5PVWgTMujcj.cD2QdjeMei', '0', '', '');
INSERT INTO `user` VALUES ('7', 'nemanja', '$2y$10$SyYxRkueI.I0WzouEpzHvelF7Na0UEzsTXoglpH7h.T/mpOKgVA3K', '0', '', '');
INSERT INTO `user` VALUES ('9', 'felka', '$2y$10$htpe.6l0HRkcpU8Tnw429u5i9.5YqbXXIOBNBdFKwdC9QZxLJncVC', '1', '065889977', 'Feli Felic');
INSERT INTO `user` VALUES ('10', 'anka', '$2y$10$4IkXDtfLpuCo7QCoLNkS2.Hdt7MLyD4D9llWQW2l.LemYlLAO5WJC', '1', '063235599', 'Ankica Krstovic');
INSERT INTO `user` VALUES ('12', 'sasa', '$2y$10$uy1QOUOBYmcoe0sCdN.W6ODCzWW3ns5S7M6McT86awwsUaHHTdZrS', '1', '063/877-99-55', 'SaÅ¡a MilutinoviÄ‡');
INSERT INTO `user` VALUES ('13', 'nata', '$2y$10$T1Uh3AbDapdx3SS8IVX6GeSqfQdMwbx9gbQYS64mzCTfPjKaD2Jmu', '1', '066/555-777', 'Natasa Milutinovic');
INSERT INTO `user` VALUES ('14', 'ppetrovic', '$2y$10$PoevtXRJvfb1NtuKTqZsdeiSOXBvHsR.bEKrYALnHr70VYbC6qWZq', '1', '062/777-888', 'Petar Petrovic');
INSERT INTO `user` VALUES ('15', 'zkljajic', '$2y$10$BdXPgDrB6Bn2L1wybTxjX.dv94X96bj0vwigzeRmiCf.9b.svk9Ti', '0', '065/888-788', 'Zagorka Kljajic');

-- ----------------------------
-- Table structure for usluga
-- ----------------------------
DROP TABLE IF EXISTS `usluga`;
CREATE TABLE `usluga` (
  `usluga_id` int(10) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(64) DEFAULT NULL,
  `opis` text,
  `cena` double(10,2) DEFAULT NULL,
  `dostupnost` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`usluga_id`),
  UNIQUE KEY `uq_naziv_usluga` (`naziv`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usluga
-- ----------------------------
INSERT INTO `usluga` VALUES ('1', 'zamena guma - komad', 'Zamenja gume na felni i balansiranje', '500.00', '1');
INSERT INTO `usluga` VALUES ('2', 'zamena kocione tecnosti', 'Zamena se vrsi u vremenskom roku od 15min', '1500.00', '0');
INSERT INTO `usluga` VALUES ('4', 'zamena brisaca', 'Podrazumevano je da se ugradjuju originalni proizvodi po cenama iz kataloga', '500.00', '1');
INSERT INTO `usluga` VALUES ('5', 'mali servis', 'Obuhvata potpuni pregled svih delova vezanih za sigurnost Vašeg vozila, za rad Vašeg motora i za elektroniku, zamenu motornog ulja, filtera ulja, vazduha, kabine i goriva PO PROGRAMU ODRZAVANJA PROIZVODJACA VOZILA', '12000.00', '1');
INSERT INTO `usluga` VALUES ('6', 'veliki servis', 'Da bi se sva četiri takta rada motora sa unutrašnjim sagorevanjem odvijala usklađeno potrebno je da rad kolenastog vratila (radilice) motora bude usklađen sa radom bregastog vratila i ventila. Ova dva mehanička sistema povezuje zupčasti kaiš ili pogonski lanac.\r\n\r\nPeriodični servis pri kojem se menja set zupčastog kaiša (lanca) naziva se „veliki servis“.', '24000.00', '0');
INSERT INTO `usluga` VALUES ('7', 'zamena sijalice komad', 'Zamena neispravne sijalice novom', '250.00', '1');
INSERT INTO `usluga` VALUES ('8', 'obd dijagnostika', 'Utvrdjivanje kvarova na motornom kompjuteru', '1000.00', '1');
INSERT INTO `usluga` VALUES ('9', 'zamena ulja u menjacu', 'Istakanje starog ulja iz menjaca i sipanje novog', '2750.00', '1');
INSERT INTO `usluga` VALUES ('10', 'zamena ulja u diferencijalu', 'Istakanje starog ulja iz diferencijala i sipanje novog. NAPOMENA: SAMO ZA VOZILA SA POGONOM NA ZADNJOJ OSOVINI', '2750.00', '1');
INSERT INTO `usluga` VALUES ('11', 'zamena paknova', 'Zamena paknova na dobos kocnicama', '3000.00', '1');
INSERT INTO `usluga` VALUES ('12', 'zamena kocionih plocica', 'Zamena istrosenih kocionih plocica(par)', '2200.00', '1');

-- ----------------------------
-- Table structure for vozilo
-- ----------------------------
DROP TABLE IF EXISTS `vozilo`;
CREATE TABLE `vozilo` (
  `vozilo_id` int(10) NOT NULL AUTO_INCREMENT,
  `model_id` int(10) DEFAULT NULL,
  `vrsta_goriva` set('elektricni','tng','dizel','benzin') DEFAULT NULL,
  `tip_menjaca` set('manuelni','automatski') DEFAULT NULL,
  `registracija` varchar(64) DEFAULT NULL,
  `broj_sasije` varchar(64) DEFAULT NULL,
  `broj_motora` varchar(64) DEFAULT NULL,
  `boja` varchar(64) DEFAULT NULL,
  `godina_proizvodnje` smallint(4) unsigned DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `vlasnistvo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`vozilo_id`),
  UNIQUE KEY `uq_registracija_vozilo` (`registracija`),
  UNIQUE KEY `uq_broj_sasije_vozilo` (`broj_sasije`),
  UNIQUE KEY `uq_broj_motora_vozilo` (`broj_motora`),
  KEY `fk_model_vozilo` (`model_id`),
  KEY `fk_user_vozilo` (`user_id`),
  CONSTRAINT `fk_model_vozilo` FOREIGN KEY (`model_id`) REFERENCES `model` (`model_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_user_vozilo` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of vozilo
-- ----------------------------
INSERT INTO `vozilo` VALUES ('1', '16', 'benzin', 'automatski', 'BG-1122-JK', 'AA5123456789', 'F123', 'crna', '2018', '4', '1');
INSERT INTO `vozilo` VALUES ('3', '4', 'dizel', 'manuelni', 'BG-1122-OO', 'dfgdfgdf', '154464', 'crvena', '1974', '4', '0');
INSERT INTO `vozilo` VALUES ('4', '17', 'benzin', 'automatski', 'BG-1502-JK', 'wsszzz91865ppp', '1238', 'siva', '2018', '4', '1');
INSERT INTO `vozilo` VALUES ('6', '23', 'benzin', 'manuelni', 'BG-1168-ZZ', 'WSSZZ66667AERTCVB', 'F789', 'Plava', '2017', '4', '1');
INSERT INTO `vozilo` VALUES ('7', '25', 'dizel', 'automatski', 'BG-825-HH', 'WSSZZ66667AERTZZZ', '123456789', 'plava', '2018', '4', '0');
INSERT INTO `vozilo` VALUES ('8', '24', 'benzin', 'manuelni', 'RU-088-ZZ', '123456789AAAOOSST', '12378', 'BELA', '2005', '14', '1');
INSERT INTO `vozilo` VALUES ('9', '14', 'dizel', 'manuelni', 'RU-1111-SS', 'WSSZZ66667AEDDDDD', '789', 'crvena', '2007', '13', '1');
INSERT INTO `vozilo` VALUES ('10', '24', 'dizel', 'manuelni', 'BG-419-FM', 'ASERTYGFD78541297', 'K4M', 'BEZ', '2007', '12', '1');
INSERT INTO `vozilo` VALUES ('11', '7', 'benzin', 'automatski', 'BG-1488-SM', 'WSSZZ66667AATREUS', '1973', 'CRVENA', '2017', '12', '1');
