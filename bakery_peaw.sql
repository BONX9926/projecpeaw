/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : bakery_peaw

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-12-15 03:24:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bin
-- ----------------------------
DROP TABLE IF EXISTS `bin`;
CREATE TABLE `bin` (
  `bin_id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ref_u_id` varchar(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `active` char(1) DEFAULT '1',
  PRIMARY KEY (`bin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bin
-- ----------------------------

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `order_id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ref_pro_id` varchar(10) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `ref_bin` varchar(10) DEFAULT NULL,
  `num` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `pro_id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(255) DEFAULT NULL,
  `pro_price` decimal(10,0) DEFAULT NULL,
  `pro_pic` varchar(100) DEFAULT NULL,
  `pro_detail` text,
  `pro_type` varchar(10) DEFAULT NULL,
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
INSERT INTO `products` VALUES ('000001', 'เค้ก1', '12', '171712121414cake1.jpg', 'อร่อยมาก', '000002', '2017-12-12 17:23:53', '2017-12-14 20:51:06', null, '1', '1');
INSERT INTO `products` VALUES ('000002', 'ขนมปัง1', '12', '171712121313bang1.jpg', 'อร่อยจริงๆนะ', '000001', '2017-12-12 17:37:05', '2017-12-13 04:00:14', null, '1', '1');
INSERT INTO `products` VALUES ('000004', 'พาย1', '20', '171712121414pay1.jpg', 'พายอร่อยนะ', '000003', '2017-12-12 20:37:56', '2017-12-14 20:59:41', null, '1', '0');
INSERT INTO `products` VALUES ('000005', 'เดนนิส1', '25', '171712121414son1.jpg', 'ลองแล้วจะติดใจ', '000004', '2017-12-12 20:40:57', '2017-12-14 21:03:37', null, '1', '0');
INSERT INTO `products` VALUES ('000006', 'ขนมปัง2', '13', '171712121313bang2.jpg', 'ขนมปังชนิดที่ 2', '000001', '2017-12-12 20:42:34', '2017-12-13 04:10:47', null, '1', '1');
INSERT INTO `products` VALUES ('000007', 'ขนมปัง3', '15', '171712121313bang3.jpg', 'ขนมปังชนิดที่ 3', '000001', '2017-12-12 20:43:00', '2017-12-13 04:11:06', null, '1', '0');
INSERT INTO `products` VALUES ('000008', 'ขนมปัง4', '17', '171712121313bang4.jpg', 'ขนมปังชนิดที่ 4', '000001', '2017-12-12 20:43:31', '2017-12-13 04:11:15', null, '1', '0');
INSERT INTO `products` VALUES ('000009', 'เค้ก2', '13', '171712121414cake2.jpg', 'เค้กชนิดที่ 2', '000002', '2017-12-12 20:44:17', '2017-12-14 20:51:16', null, '1', '0');
INSERT INTO `products` VALUES ('000010', 'พาย2', '15', '171712121414pay2.jpg', 'พายชนิดที่ 1', '000003', '2017-12-13 03:37:06', '2017-12-14 20:59:49', null, '1', '0');
INSERT INTO `products` VALUES ('000011', 'ขนมปัง5', '30', '171712121313bang5.jpg', 'ขนมปังชนิดที่ 5', '000001', '2017-12-13 04:12:01', '2017-12-13 04:12:01', null, '1', '0');
INSERT INTO `products` VALUES ('000012', 'เค้ก3', '20', '171712121414cake3.jpg', 'เค้กรสองุ่น เปี้ยวนิดๆ น่าลอง เนอะ', '000002', '2017-12-14 20:53:07', '2017-12-14 20:53:21', null, '1', '0');
INSERT INTO `products` VALUES ('000013', 'เค้ก4', '15', '171712121414cake4.jpg', 'เค้กรสใบเตย หอมอร่อย ลองเลย', '000002', '2017-12-14 20:55:40', '2017-12-14 20:59:10', null, '1', '0');
INSERT INTO `products` VALUES ('000014', 'เค้ก5', '20', '171712121414cake5.jpg', 'เค้กวนิลา เห็นแล้วน้ำลายไหลเลยละ', '000002', '2017-12-14 20:57:35', '2017-12-14 20:59:22', null, '1', '0');
INSERT INTO `products` VALUES ('000015', 'พาย3', '23', '171712121414pay3.jpg', 'พายสับประรส หอมกรอบ ละมุนลิ้น', '000003', '2017-12-14 21:01:28', '2017-12-14 21:01:37', null, '1', '0');
INSERT INTO `products` VALUES ('000016', 'พาย4', '14', '171712121414pay4.jpg', 'รสชาติ อร่อยต้องขอบอกต่อ', '000003', '2017-12-14 21:02:22', '2017-12-14 21:02:22', null, '1', '0');
INSERT INTO `products` VALUES ('000017', 'พาย5', '22', '171712121414pay5.jpg', 'พายสตอเบอรี่ น่าริ้มลอง', '000003', '2017-12-14 21:03:02', '2017-12-14 21:03:13', null, '1', '0');
INSERT INTO `products` VALUES ('000018', 'เดนนิส2', '25', '171712121414son2.jpg', 'ลองสั่งไปทานก่อนไหม แล้วจะติดใจสั่งอีก', '000004', '2017-12-14 21:04:32', '2017-12-14 21:04:32', null, '1', '0');
INSERT INTO `products` VALUES ('000019', 'ครัวซอง1', '23', '171712121414son3.jpg', 'ไส้ทะละ ครัวซองอ้วนอิ่มไปยังชาติหน้า', '000004', '2017-12-14 21:07:03', '2017-12-14 21:07:12', null, '1', '0');
INSERT INTO `products` VALUES ('000020', 'ครัวซอง2', '24', '171712121414son4.jpg', 'ลองหน่อยไหมละ แล้วจะรู้ว่ามันอร่อยแค่ไหน', '000004', '2017-12-14 21:08:16', '2017-12-14 21:08:16', null, '1', '0');
INSERT INTO `products` VALUES ('000021', 'ครัวซอง3', '25', '171712121414son5.jpg', 'ครัวซอง จุตุรัส', '000004', '2017-12-14 21:08:46', '2017-12-14 21:08:54', null, '1', '0');

-- ----------------------------
-- Table structure for product_type
-- ----------------------------
DROP TABLE IF EXISTS `product_type`;
CREATE TABLE `product_type` (
  `protype_id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`protype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_type
-- ----------------------------
INSERT INTO `product_type` VALUES ('000001', 'ขนมปัง');
INSERT INTO `product_type` VALUES ('000002', 'เค้ก');
INSERT INTO `product_type` VALUES ('000003', 'พายชั้น');
INSERT INTO `product_type` VALUES ('000004', 'เดนนิส/ครัวซอง');
INSERT INTO `product_type` VALUES ('000005', 'ชอร์ตโด, คุกกี้, พายร่วน และทาร์ต');
INSERT INTO `product_type` VALUES ('000006', 'ชูเพสต์ / เอแคร์');
INSERT INTO `product_type` VALUES ('000007', 'ครีมคัสตาด ไส้ขนมต่างๆ');

-- ----------------------------
-- Table structure for status_bin
-- ----------------------------
DROP TABLE IF EXISTS `status_bin`;
CREATE TABLE `status_bin` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of status_bin
-- ----------------------------
INSERT INTO `status_bin` VALUES ('000001', 'รอชำระเงิน');
INSERT INTO `status_bin` VALUES ('000002', 'ชำระเงินเรียบร้อยแล้ว');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `u_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `u_name` varchar(255) DEFAULT NULL,
  `u_phone` varchar(20) DEFAULT NULL,
  `u_email` varchar(255) DEFAULT NULL,
  `u_pass` varchar(255) DEFAULT NULL,
  `u_type` char(1) DEFAULT 'u',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('00000000001', 'ชนิกา บุญจันทร์', '091-7635351', 'chanika@gmail.com', 'eaf3c978f6741fd07c7412ec61785cd6165f28b3', 'a', '2017-12-11 01:30:15', '2017-12-11 01:30:15');
INSERT INTO `users` VALUES ('00000000002', 'อธิวัฒน์ ทุ่มสักกะ', '083-002-6006', 'winhackger@gmail.com', 'eaf3c978f6741fd07c7412ec61785cd6165f28b3', 'u', '2017-12-11 01:33:04', '2017-12-11 01:33:04');
INSERT INTO `users` VALUES ('00000000003', 'อำพล ทิวาลัย', '099-9675462', 'm@gmail.com', 'eaf3c978f6741fd07c7412ec61785cd6165f28b3', 'u', '2017-12-10 19:45:55', '2017-12-10 19:45:55');
INSERT INTO `users` VALUES ('00000000004', 'ณิชา อดทนดี', '087-7531319', 'nicha@gmail.com', 'eaf3c978f6741fd07c7412ec61785cd6165f28b3', 'u', '2017-12-10 19:43:31', '2017-12-10 19:43:31');
