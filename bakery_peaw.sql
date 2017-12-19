/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : bakery_peaw

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-12-19 16:27:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bin
-- ----------------------------
-- DROP TABLE IF EXISTS `bin`;
CREATE TABLE `bin` (
  `bin_id` int(6) NOT NULL AUTO_INCREMENT,
  `ref_u_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `active` int(1) DEFAULT '1',
  `ref_status_bin` int(11) DEFAULT '1',
  `pay_status` int(1) DEFAULT '0',
  `ref_pay_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`bin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bin
-- ----------------------------

-- ----------------------------
-- Table structure for message
-- ----------------------------
-- DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `mess_id` int(6) NOT NULL AUTO_INCREMENT,
  `mess_text` text,
  `active` char(1) DEFAULT '0',
  PRIMARY KEY (`mess_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('1', '<span style=\"color:red\">ด่วนพิเศษวันนี้!!!</span> ใบสั่งซื้อที่มียอด 500 บาทขึ้นไป ได้รับส่วนลดพิเศษมากมายหรือสามารถส่ง ลุ้นโทรศัพท์ Iphone 8 plus และลุ้นรางวัลต่างๆมากมาย <span style=\"color:green\">ขอสงวนสิทธิ์สำหรับผู้ที่เป็นสมาชิกเท่านั้น นะจ๊ะ ^_^</span>', '1');

-- ----------------------------
-- Table structure for order
-- ----------------------------
-- DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `order_id` int(6) NOT NULL AUTO_INCREMENT,
  `ref_pro_id` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `ref_bin` int(6) DEFAULT NULL,
  `num` int(10) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------

-- ----------------------------
-- Table structure for payment
-- ----------------------------
-- DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `pay_id` int(6) NOT NULL AUTO_INCREMENT,
  `ref_u_id` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `ref_bin_id` int(6) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of payment
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
-- DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `pro_id` int(6) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(255) DEFAULT NULL,
  `pro_price` decimal(10,0) DEFAULT NULL,
  `pro_pic` varchar(100) DEFAULT NULL,
  `pro_detail` text,
  `pro_type` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deldated_at` datetime DEFAULT NULL,
  `active` char(1) DEFAULT '1',
  `best_seller` char(1) DEFAULT '0',
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'เค้ก1', '12', '171712121414cake1.jpg', 'อร่อยมาก', '2', '2017-12-12 17:23:53', '2017-12-14 20:51:06', null, '1', '1');
INSERT INTO `products` VALUES ('2', 'ขนมปัง1', '12', '171712121313bang1.jpg', 'อร่อยจริงๆนะ', '1', '2017-12-12 17:37:05', '2017-12-13 04:00:14', null, '1', '1');
INSERT INTO `products` VALUES ('4', 'พาย1', '20', '171712121414pay1.jpg', 'พายอร่อยนะ', '3', '2017-12-12 20:37:56', '2017-12-14 20:59:41', null, '1', '0');
INSERT INTO `products` VALUES ('5', 'เดนนิส1', '25', '171712121414son1.jpg', 'ลองแล้วจะติดใจ', '4', '2017-12-12 20:40:57', '2017-12-14 21:03:37', null, '1', '1');
INSERT INTO `products` VALUES ('6', 'ขนมปัง2', '13', '171712121313bang2.jpg', 'ขนมปังชนิดที่ 2', '1', '2017-12-12 20:42:34', '2017-12-13 04:10:47', null, '1', '1');
INSERT INTO `products` VALUES ('7', 'ขนมปัง3', '15', '171712121313bang3.jpg', 'ขนมปังชนิดที่ 3', '1', '2017-12-12 20:43:00', '2017-12-13 04:11:06', null, '1', '0');
INSERT INTO `products` VALUES ('8', 'ขนมปัง4', '17', '171712121313bang4.jpg', 'ขนมปังชนิดที่ 4', '1', '2017-12-12 20:43:31', '2017-12-13 04:11:15', null, '1', '0');
INSERT INTO `products` VALUES ('9', 'เค้ก2', '13', '171712121414cake2.jpg', 'เค้กชนิดที่ 2', '2', '2017-12-12 20:44:17', '2017-12-14 20:51:16', null, '1', '0');
INSERT INTO `products` VALUES ('10', 'พาย2', '15', '171712121414pay2.jpg', 'พายชนิดที่ 1', '3', '2017-12-13 03:37:06', '2017-12-14 20:59:49', null, '1', '0');
INSERT INTO `products` VALUES ('11', 'ขนมปัง5', '30', '171712121313bang5.jpg', 'ขนมปังชนิดที่ 5', '1', '2017-12-13 04:12:01', '2017-12-13 04:12:01', null, '1', '0');
INSERT INTO `products` VALUES ('12', 'เค้ก3', '20', '171712121414cake3.jpg', 'เค้กรสองุ่น เปี้ยวนิดๆ น่าลอง เนอะ', '2', '2017-12-14 20:53:07', '2017-12-14 20:53:21', null, '1', '0');
INSERT INTO `products` VALUES ('13', 'เค้ก4', '15', '171712121414cake4.jpg', 'เค้กรสใบเตย หอมอร่อย ลองเลย', '2', '2017-12-14 20:55:40', '2017-12-14 20:59:10', null, '1', '0');
INSERT INTO `products` VALUES ('14', 'เค้ก5', '20', '171712121414cake5.jpg', 'เค้กวนิลา เห็นแล้วน้ำลายไหลเลยละ', '2', '2017-12-14 20:57:35', '2017-12-14 20:59:22', null, '1', '0');
INSERT INTO `products` VALUES ('15', 'พาย3', '23', '171712121414pay3.jpg', 'พายสับประรส หอมกรอบ ละมุนลิ้น', '3', '2017-12-14 21:01:28', '2017-12-14 21:01:37', null, '1', '1');
INSERT INTO `products` VALUES ('16', 'พาย4', '14', '171712121414pay4.jpg', 'รสชาติ อร่อยต้องขอบอกต่อ', '3', '2017-12-14 21:02:22', '2017-12-14 21:02:22', null, '1', '0');
INSERT INTO `products` VALUES ('17', 'พาย5', '22', '171712121414pay5.jpg', 'พายสตอเบอรี่ น่าริ้มลอง', '3', '2017-12-14 21:03:02', '2017-12-14 21:03:13', null, '1', '0');
INSERT INTO `products` VALUES ('18', 'เดนนิส2', '25', '171712121414son2.jpg', 'ลองสั่งไปทานก่อนไหม แล้วจะติดใจสั่งอีก', '4', '2017-12-14 21:04:32', '2017-12-14 21:04:32', null, '1', '0');
INSERT INTO `products` VALUES ('19', 'ครัวซอง1', '23', '171712121414son3.jpg', 'ไส้ทะละ ครัวซองอ้วนอิ่มไปยังชาติหน้า', '4', '2017-12-14 21:07:03', '2017-12-14 21:07:12', null, '1', '1');
INSERT INTO `products` VALUES ('20', 'ครัวซอง2', '24', '171712121414son4.jpg', 'ลองหน่อยไหมละ แล้วจะรู้ว่ามันอร่อยแค่ไหน', '4', '2017-12-14 21:08:16', '2017-12-14 21:08:16', null, '1', '0');
INSERT INTO `products` VALUES ('21', 'ครัวซอง3', '25', '171712121414son5.jpg', 'ครัวซอง จุตุรัส', '4', '2017-12-14 21:08:46', '2017-12-14 21:08:54', null, '1', '0');

-- ----------------------------
-- Table structure for product_type
-- ----------------------------
-- DROP TABLE IF EXISTS `product_type`;
CREATE TABLE `product_type` (
  `protype_id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`protype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_type
-- ----------------------------
INSERT INTO `product_type` VALUES ('1', 'ขนมปัง');
INSERT INTO `product_type` VALUES ('2', 'เค้ก');
INSERT INTO `product_type` VALUES ('3', 'พายชั้น');
INSERT INTO `product_type` VALUES ('4', 'เดนนิส/ครัวซอง');
INSERT INTO `product_type` VALUES ('5', 'ชอร์ตโด, คุกกี้, พายร่วน และทาร์ต');
INSERT INTO `product_type` VALUES ('6', 'ชูเพสต์ / เอแคร์');
INSERT INTO `product_type` VALUES ('7', 'ครีมคัสตาด ไส้ขนมต่างๆ');

-- ----------------------------
-- Table structure for status_bin
-- ----------------------------
-- DROP TABLE IF EXISTS `status_bin`;
CREATE TABLE `status_bin` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of status_bin
-- ----------------------------
INSERT INTO `status_bin` VALUES ('1', 'รอชำระเงิน');
INSERT INTO `status_bin` VALUES ('2', 'ชำระเงินเรียบร้อยแล้ว');

-- ----------------------------
-- Table structure for users
-- ----------------------------
-- DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(255) DEFAULT NULL,
  `u_phone` varchar(20) DEFAULT NULL,
  `u_email` varchar(255) DEFAULT NULL,
  `u_pass` varchar(255) DEFAULT NULL,
  `u_type` char(1) DEFAULT 'u',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'ชนิกา บุญจันทร์', '091-7635351', 'chanika@gmail.com', 'eaf3c978f6741fd07c7412ec61785cd6165f28b3', 'a', '2017-12-11 01:30:15', '2017-12-11 01:30:15');
INSERT INTO `users` VALUES ('2', 'อธิวัฒน์ ทุ่มสักกะ', '083-002-6006', 'winhackger@gmail.com', 'eaf3c978f6741fd07c7412ec61785cd6165f28b3', 'u', '2017-12-11 01:33:04', '2017-12-11 01:33:04');
INSERT INTO `users` VALUES ('3', 'อำพล ทิวาลัย', '099-9675462', 'm@gmail.com', 'eaf3c978f6741fd07c7412ec61785cd6165f28b3', 'u', '2017-12-10 19:45:55', '2017-12-10 19:45:55');
INSERT INTO `users` VALUES ('4', 'ณิชา อดทนดี', '087-7531319', 'nicha@gmail.com', 'eaf3c978f6741fd07c7412ec61785cd6165f28b3', 'u', '2017-12-10 19:43:31', '2017-12-10 19:43:31');
INSERT INTO `users` VALUES ('5', 'ปัทมาวรรณ', '091-7635351', 'pang@gmail.com', 'f6a51c155d95861c35febb700cb661b34f4a85b5', 'u', '2017-12-16 11:08:36', '2017-12-16 11:08:36');
