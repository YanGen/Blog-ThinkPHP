/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50640
Source Host           : localhost:3306
Source Database       : amazon

Target Server Type    : MYSQL
Target Server Version : 50640
File Encoding         : 65001

Date: 2018-08-26 21:59:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for brands
-- ----------------------------
DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rootCategory` varchar(255) DEFAULT NULL,
  `secondaryCategory` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=497 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rootCategory` varchar(255) DEFAULT NULL,
  `secondaryCategory` varchar(255) DEFAULT NULL,
  `asin` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `sales` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12165 DEFAULT CHARSET=utf8;
