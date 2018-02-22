/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100130
 Source Host           : localhost:3306
 Source Schema         : oswa_inv

 Target Server Type    : MySQL
 Target Server Version : 100130
 File Encoding         : 65001

 Date: 21/02/2018 23:28:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for agencies
-- ----------------------------
DROP TABLE IF EXISTS `agencies`;
CREATE TABLE `agencies`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name_BN` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `head_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `head_designation` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `contact_info` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of agencies
-- ----------------------------
INSERT INTO `agencies` VALUES (1, 'JMS', 'জাতীয় মহিলা সংস্থা', NULL, NULL, NULL);
INSERT INTO `agencies` VALUES (2, 'DWA', 'মহিলা বিষয়ক অধিদপ্তর', NULL, NULL, NULL);
INSERT INTO `agencies` VALUES (3, 'BSA', 'বাংলাদেশ শিশু একাডেমী', NULL, NULL, NULL);
INSERT INTO `agencies` VALUES (4, 'MOWCA', 'মহিলা ও শিশু বিষয়ক মন্ত্রণালয়', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `name_BN` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `department_head` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `department_head_designation` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `total_manpower` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for media
-- ----------------------------
DROP TABLE IF EXISTS `media`;
CREATE TABLE `media`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `file_type` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of media
-- ----------------------------
INSERT INTO `media` VALUES (1, 'Enamul_haq.jpg', 'image/jpeg');
INSERT INTO `media` VALUES (2, 'Enamul_Haque.JPG', 'image/jpeg');

-- ----------------------------
-- Table structure for months
-- ----------------------------
DROP TABLE IF EXISTS `months`;
CREATE TABLE `months`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_BN` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of months
-- ----------------------------
INSERT INTO `months` VALUES (1, 'January', 'জানুয়ারী');

-- ----------------------------
-- Table structure for partners
-- ----------------------------
DROP TABLE IF EXISTS `partners`;
CREATE TABLE `partners`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name_BN` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `is_active` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of partners
-- ----------------------------
INSERT INTO `partners` VALUES (1, 'মহিলা ও শিশু বিষয়ক মন্ত্রণালয়', 'মহিলা ও শিশু বিষয়ক মন্ত্রণালয়', '1');
INSERT INTO `partners` VALUES (2, 'মহিলা বিষয়ক অধিদপ্তর', 'মহিলা বিষয়ক অধিদপ্তর', '1');
INSERT INTO `partners` VALUES (3, 'জাতীয় মহিলা সংস্থা', 'জাতীয় মহিলা সংস্থা', '1');
INSERT INTO `partners` VALUES (4, 'স্বর্ণ কিশোরী নেটওয়ার্ক ফাউন্ডেশন', 'স্বর্ণ কিশোরী নেটওয়ার্ক ফাউন্ডেশন', '1');

-- ----------------------------
-- Table structure for program_reports
-- ----------------------------
DROP TABLE IF EXISTS `program_reports`;
CREATE TABLE `program_reports`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL,
  `agency_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `other_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `beneficiaries` bigint(20) NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `month_id` int(11) NULL DEFAULT NULL,
  `month_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `year_id` int(11) NULL DEFAULT NULL,
  `year_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `is_active` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for project_maintypes
-- ----------------------------
DROP TABLE IF EXISTS `project_maintypes`;
CREATE TABLE `project_maintypes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name_BN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of project_maintypes
-- ----------------------------
INSERT INTO `project_maintypes` VALUES (1, 'Project', 'প্রকল্প');
INSERT INTO `project_maintypes` VALUES (2, 'Program', 'কর্মসুচি');

-- ----------------------------
-- Table structure for project_reports
-- ----------------------------
DROP TABLE IF EXISTS `project_reports`;
CREATE TABLE `project_reports`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NULL DEFAULT NULL,
  `agency_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `project_id` int(11) NULL DEFAULT NULL,
  `project_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `other_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `is_training` tinyint(1) NULL DEFAULT NULL,
  `implementing_body` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `beneficiaries` bigint(20) NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `month_id` int(11) NULL DEFAULT NULL,
  `month_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `year_id` int(11) NULL DEFAULT NULL,
  `year_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `is_active` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of project_reports
-- ----------------------------
INSERT INTO `project_reports` VALUES (2, 2, 'মহিলা বিষয়ক অধিদপ্তর', 1, 'ইনভেস্টমেন্ট কম্পোনেন্ট ফর ভালনারেবল গ্রুপ ডেভেলপমেন্ট প্রোগ্রাম', '', 0, 'xcxcxcx', 20, '', 1, 'জানুয়ারী', 1, '২০১৮', '2018-02-16 16:38:15', 1);
INSERT INTO `project_reports` VALUES (3, 1, 'জাতীয় মহিলা সংস্থা', 1, 'ইনভেস্টমেন্ট কম্পোনেন্ট ফর ভালনারেবল গ্রুপ ডেভেলপমেন্ট প্রোগ্রাম', '', 1, '', 888, '', 1, 'জানুয়ারী', 1, '২০১৮', '2018-02-21 01:09:06', 1);

-- ----------------------------
-- Table structure for project_types
-- ----------------------------
DROP TABLE IF EXISTS `project_types`;
CREATE TABLE `project_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name_BN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of project_types
-- ----------------------------
INSERT INTO `project_types` VALUES (1, 'Revenue', 'রাজস্ব');
INSERT INTO `project_types` VALUES (2, 'Development', 'উন্নয়ন');

-- ----------------------------
-- Table structure for projects
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name_BN` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `type_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `type_BN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `main_type_id` int(11) NULL DEFAULT NULL,
  `main_type_BN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `agency_id` tinyint(4) NULL DEFAULT NULL,
  `agency_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `partner_id` int(11) NULL DEFAULT NULL,
  `partner_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `project_director_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `project_director_designation` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `project_director_phone_no` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `project_director_email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `start_month_id` int(11) NULL DEFAULT NULL,
  `start_month_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `end_month_id` int(11) NULL DEFAULT NULL,
  `end_month_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `start_year_id` int(11) NULL DEFAULT NULL,
  `start_year_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `end_year_id` int(11) NULL DEFAULT NULL,
  `end_year_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `is_active` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of projects
-- ----------------------------
INSERT INTO `projects` VALUES (1, 'ইনভেস্টমেন্ট কম্পোনেন্ট ফর ভালনারেবল গ্রুপ ডেভেলপমেন্ট প্রোগ্রাম', 'ইনভেস্টমেন্ট কম্পোনেন্ট ফর ভালনারেবল গ্রুপ ডেভেলপমেন্ট প্রোগ্রাম', '1', 'রাজস্ব', 1, 'প্রকল্প', 1, 'জাতীয় মহিলা সংস্থা', 1, 'মহিলা ও শিশু বিষয়ক মন্ত্রণালয়', 'মাহ্ মুদা শারমিন বেনু', 'ফগফগ', '০১০১০১০১০', 'eer@fhd.com', 1, '2018', 1, '2018', 1, '2018', 1, '2018', 1);

-- ----------------------------
-- Table structure for training_reports
-- ----------------------------
DROP TABLE IF EXISTS `training_reports`;
CREATE TABLE `training_reports`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NULL DEFAULT NULL,
  `agency_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `month_id` int(11) NULL DEFAULT NULL,
  `month_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `year_id` int(11) NULL DEFAULT NULL,
  `year_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `training_development` int(11) NULL DEFAULT NULL,
  `training_program` int(11) NULL DEFAULT NULL,
  `training_revenue_budget` int(11) NULL DEFAULT NULL,
  `training_staff` int(11) NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `is_active` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of training_reports
-- ----------------------------
INSERT INTO `training_reports` VALUES (1, 1, 'জাতীয় মহিলা সংস্থা', 1, 'জানুয়ারী', 1, '২০১৮', 100, 100, 100, 100, NULL, '2018-02-21 22:52:17', 1);

-- ----------------------------
-- Table structure for user_groups
-- ----------------------------
DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE `user_groups`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `group_level`(`group_level`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_groups
-- ----------------------------
INSERT INTO `user_groups` VALUES (1, 'Admin', 1, 1);
INSERT INTO `user_groups` VALUES (2, 'special', 2, 1);
INSERT INTO `user_groups` VALUES (3, 'User', 3, 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'no_image.jpg',
  `agency_id` tinyint(4) NULL DEFAULT NULL,
  `status` int(1) NOT NULL,
  `last_login` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_level`(`user_level`) USING BTREE,
  CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, ' Admin User', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'no_image.jpg', NULL, 1, '2018-02-21 18:12:49');
INSERT INTO `users` VALUES (2, 'Special User', 'special', '942078ca2d04f25545a316c123a392c4d5d339fd', 2, 'no_image.jpg', NULL, 1, '2018-02-02 11:53:54');
INSERT INTO `users` VALUES (3, 'Default User', 'user', '12dea96fec20593566ab75692c9949596833adc9', 3, 'no_image.jpg', NULL, 1, '2018-01-25 16:42:21');
INSERT INTO `users` VALUES (4, 'Mir Umme towhida', 'jms', '8cb2237d0679ca88db6464eac60da96345513964', 2, 'fn44z3oj4.jpg', 1, 1, '2018-02-21 18:12:22');
INSERT INTO `users` VALUES (5, 'Ayesha Binte Haque', 'dwa', '8cb2237d0679ca88db6464eac60da96345513964', 2, 'no_image.jpg', 2, 1, NULL);

-- ----------------------------
-- Table structure for years
-- ----------------------------
DROP TABLE IF EXISTS `years`;
CREATE TABLE `years`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_BN` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of years
-- ----------------------------
INSERT INTO `years` VALUES (1, '2018', '২০১৮');

SET FOREIGN_KEY_CHECKS = 1;
