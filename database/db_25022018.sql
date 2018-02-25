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

 Date: 25/02/2018 00:15:56
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
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of months
-- ----------------------------
INSERT INTO `months` VALUES (1, 'January', 'জানুয়ারী');
INSERT INTO `months` VALUES (2, 'February', 'ফেব্রুয়ারী');
INSERT INTO `months` VALUES (3, 'March', 'মার্চ');
INSERT INTO `months` VALUES (4, 'April', 'এপ্রিল');
INSERT INTO `months` VALUES (5, 'May', 'মে');
INSERT INTO `months` VALUES (6, 'June', 'জুন');
INSERT INTO `months` VALUES (7, 'July', 'জুলাই');
INSERT INTO `months` VALUES (8, 'August', 'আগস্ট');
INSERT INTO `months` VALUES (9, 'September', 'সেপ্টেম্বর');
INSERT INTO `months` VALUES (10, 'October', 'অক্টোবর');
INSERT INTO `months` VALUES (11, 'November', 'নভেম্বর');
INSERT INTO `months` VALUES (12, 'December', 'ডিসেম্বর');

-- ----------------------------
-- Table structure for partners
-- ----------------------------
DROP TABLE IF EXISTS `partners`;
CREATE TABLE `partners`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name_BN` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `partner_head_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `partner_head_phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `partner_head_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `address` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `is_active` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of partners
-- ----------------------------
INSERT INTO `partners` VALUES (1, 'মহিলা ও শিশু বিষয়ক মন্ত্রণালয়', 'মহিলা ও শিশু বিষয়ক মন্ত্রণালয়', NULL, NULL, NULL, NULL, '1');
INSERT INTO `partners` VALUES (2, 'মহিলা বিষয়ক অধিদপ্তর', 'মহিলা বিষয়ক অধিদপ্তর', NULL, NULL, NULL, NULL, '1');
INSERT INTO `partners` VALUES (3, 'জাতীয় মহিলা সংস্থা', 'জাতীয় মহিলা সংস্থা', NULL, NULL, NULL, NULL, '1');
INSERT INTO `partners` VALUES (4, 'স্বর্ণ কিশোরী নেটওয়ার্ক ফাউন্ডেশন', 'স্বর্ণ কিশোরী নেটওয়ার্ক ফাউন্ডেশন', NULL, NULL, NULL, NULL, '1');
INSERT INTO `partners` VALUES (5, 'বাংলাদেশ শিশু একাডেমী', 'বাংলাদেশ শিশু একাডেমী', NULL, NULL, NULL, NULL, '1');
INSERT INTO `partners` VALUES (6, 'বি ডব্লিউ সি সি আই', 'বি ডব্লিউ সি সি আই', NULL, NULL, NULL, NULL, '1');
INSERT INTO `partners` VALUES (7, 'কেয়ার ফর মাদার এন্ড চিলড্রেন ফাউন্ডেশন', 'কেয়ার ফর মাদার এন্ড চিলড্রেন ফাউন্ডেশন', NULL, NULL, NULL, NULL, '1');
INSERT INTO `partners` VALUES (8, 'আইসিএইচড', 'আইসিএইচডি', '', '', '', '', '1');
INSERT INTO `partners` VALUES (9, 'জয়িতা ফাউন্ডেশন', 'জয়িতা ফাউন্ডেশন', '', '', '', '', '1');
INSERT INTO `partners` VALUES (10, 'স্পন্দন-বি', 'স্পন্দন-বি', '', '', '', '', '1');
INSERT INTO `partners` VALUES (11, 'সুচনা ফাউন্ডেশন', 'সুচনা ফাউন্ডেশন', '', '', '', '', '1');
INSERT INTO `partners` VALUES (12, 'এফপিএবি', 'এফপিএবি', '', '', '', '', '1');
INSERT INTO `partners` VALUES (13, 'এআরপি', 'এআরপি', '', '', '', '', '1');

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
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `month_id` int(11) NULL DEFAULT NULL,
  `month_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `year_id` int(11) NULL DEFAULT NULL,
  `year_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `is_active` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of project_reports
-- ----------------------------
INSERT INTO `project_reports` VALUES (1, 1, 'জাতীয় মহিলা সংস্থা', 11, 'নগর ভিত্তিক প্রান্তিক মহিলা উন্নয়ন প্রকল্প', '', 0, '', 938, '৯৩৮ জন প্রান্তিক মহিলাকে দক্ষতা উন্নয়ন মুলক প্রশিক্ষণ প্রদান করা হয়েছে', 1, 'জানুয়ারী', 10, '২০১৮', '2018-02-24 23:17:13', 1);
INSERT INTO `project_reports` VALUES (2, 1, 'জাতীয় মহিলা সংস্থা', 10, 'জেলা ভিত্তিক মহিলা কম্পিউটার প্রশিক্ষণ প্রকল্প (৬৪ জেলা)', '', 0, '', 3096, '', 1, 'জানুয়ারী', 10, '২০১৮', '2018-02-24 23:22:27', 1);

-- ----------------------------
-- Table structure for project_types
-- ----------------------------
DROP TABLE IF EXISTS `project_types`;
CREATE TABLE `project_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name_BN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of project_types
-- ----------------------------
INSERT INTO `project_types` VALUES (1, 'Revenue', 'রাজস্ব বাজেটের কর্মসূচী');
INSERT INTO `project_types` VALUES (2, 'Development', 'উন্নয়ন প্রকল্প');
INSERT INTO `project_types` VALUES (3, 'Other Program Under Revenue Budget', 'রাজস্ব বাজেটের আওতায় অন্যান্য কার্যক্রম');

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
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of projects
-- ----------------------------
INSERT INTO `projects` VALUES (1, 'ইনভেস্টমেন্ট কম্পোনেন্ট ফর ভালনারেবল গ্রুপ ডেভেলপমেন্ট প্রোগ্রাম', 'ইনভেস্টমেন্ট কম্পোনেন্ট ফর ভালনারেবল গ্রুপ ডেভেলপমেন্ট প্রোগ্রাম', '2', 'উন্নয়ন প্রকল্প', 1, 'প্রকল্প', 4, 'মহিলা ও শিশু বিষয়ক মন্ত্রণালয়', 1, 'মহিলা ও শিশু বিষয়ক মন্ত্রণালয়', 'মাহমুদা শারমিন বেনু', 'অতিরিক্ত সচিব', '০১৫৫২৩৬১৮৪২', '', 7, '২০১৫', 6, '২০১৪', 7, '২০১৫', 1, '২০০৯', 1);
INSERT INTO `projects` VALUES (2, 'নারী নির্যাতন প্রতিরোধকল্পে মাল্টিসেক্টরাল প্রোগ্রাম (৪র্থ পর্ব)', 'নারী নির্যাতন প্রতিরোধকল্পে মাল্টিসেক্টরাল প্রোগ্রাম (৪র্থ পর্ব)', '2', 'উন্নয়ন প্রকল্প', 1, 'প্রকল্প', 4, 'মহিলা ও শিশু বিষয়ক মন্ত্রণালয়', 1, 'মহিলা ও শিশু বিষয়ক মন্ত্রণালয়', 'ডঃ আবুল হোসেন', '', '০১৫৫২৩৬১৮৪২', '', 7, '২০১৫', 6, '২০১৪', 8, '২০১৬', 13, '২০২১', 1);
INSERT INTO `projects` VALUES (3, 'শিশুর বিকাশে প্রারম্ভিক শিক্ষা (২য় পর্যায়)', 'শিশুর বিকাশে প্রারম্ভিক শিক্ষা (২য় পর্যায়)', '2', 'উন্নয়ন প্রকল্প', 1, 'প্রকল্প', 3, 'বাংলাদেশ শিশু একাডেমী', 1, 'মহিলা ও শিশু বিষয়ক মন্ত্রণালয়', 'জনাব সুলতান আলম', '', '০১৭১৬২৭৯৬৫৮', '', 1, '২০০৯', 12, '২০২০', 6, '২০১৪', 9, '২০১৭', 1);
INSERT INTO `projects` VALUES (4, 'ন্যাশনাল হার্ট ফাওউন্ডেশনে নার্সেস হোস্টেল স্থাপন', 'ন্যাশনাল হার্ট ফাওউন্ডেশনে নার্সেস হোস্টেল স্থাপন', '2', 'উন্নয়ন প্রকল্প', 1, 'প্রকল্প', 2, 'মহিলা বিষয়ক অধিদপ্তর', 2, 'মহিলা বিষয়ক অধিদপ্তর', 'জনাব মোঃ আব্দুস সোবহান ভুঁইয়া', '', '০১৫৫২৪১০৫০১', '', 7, '২০১৫', 6, '২০১৪', 7, '২০১৫', 10, '২০১৮', 1);
INSERT INTO `projects` VALUES (5, '৪৩৩১-গ্রামীণ নারী উদ্যোক্তাদের দক্ষতা বিকাশ প্রশিক্ষণ (উপজেলা পর্যায়) শীর্ষক কর্মসূচী', '৪৩৩১-গ্রামীণ নারী উদ্যোক্তাদের দক্ষতা বিকাশ প্রশিক্ষণ (উপজেলা পর্যায়) শীর্ষক কর্মসূচী', '1', 'রাজস্ব বাজেটের কর্মসূচী', 2, 'কর্মসুচি', 4, 'মহিলা ও শিশু বিষয়ক মন্ত্রণালয়', 6, 'বি ডব্লিউ সি সি আই', 'বেগম ফারহানা আক্তার', 'গবেষণা কর্মকর্তা', '০১৯১১২৮৫৫০০', '', 0, '', 0, '', 0, '', 0, '', 1);
INSERT INTO `projects` VALUES (6, 'নালিতাবাড়ি উপজেলায় কর্মজীবী মহিলা হোস্টেল কাম ট্রেনিং সেন্টার', 'নালিতাবাড়ি উপজেলায় কর্মজীবী মহিলা হোস্টেল কাম ট্রেনিং সেন্টার', '2', 'উন্নয়ন প্রকল্প', 1, 'প্রকল্প', 2, 'মহিলা বিষয়ক অধিদপ্তর', 2, 'মহিলা বিষয়ক অধিদপ্তর', 'জনাব মোঃ আইনুল কবীর', 'যুগ্ম সচিব', '', '', 6, '২০১৪', 6, '২০১৪', 4, '২০১২', 9, '২০১৭', 1);
INSERT INTO `projects` VALUES (7, 'পঞ্চাশ শয্যা বিশিষ্ট মহিলা ও শিশু ডায়াবেটিস, এন্ডোক্রিন ও মেটাবলিক হাসপাতাল স্থাপন, উত্তরা,ঢাকা', 'পঞ্চাশ শয্যা বিশিষ্ট মহিলা ও শিশু ডায়াবেটিস, এন্ডোক্রিন ও মেটাবলিক হাসপাতাল স্থাপন, উত্তরা,ঢাকা', '2', 'উন্নয়ন প্রকল্প', 1, 'প্রকল্প', 2, 'মহিলা বিষয়ক অধিদপ্তর', 2, 'মহিলা বিষয়ক অধিদপ্তর', 'জনাব গোলাম কিবরিয়া ভুঁইয়া', '', '', '', 7, '২০১৫', 7, '২০১৫', 6, '২০১৪', 9, '২০১৭', 1);
INSERT INTO `projects` VALUES (8, '২০ টি শিশু দিবাযত্ন কেন্দ্র স্থাপন', '২০ টি শিশু দিবাযত্ন কেন্দ্র স্থাপন', '2', 'উন্নয়ন প্রকল্প', 1, 'প্রকল্প', 2, 'মহিলা বিষয়ক অধিদপ্তর', 2, 'মহিলা বিষয়ক অধিদপ্তর', 'শবনম মোস্তারী', '', '', '', 3, '২০১১', 2, '২০১০', 8, '২০১৬', 13, '২০২১', 1);
INSERT INTO `projects` VALUES (9, 'সোনাইমুড়ী, কালীগঞ্জ, আড়াইহাজার ও মঠবাড়ীয়া উপজেলায় ট্রেনিং সেন্টার ও হোষ্টেল নির্মাণ', 'সোনাইমুড়ী, কালীগঞ্জ, আড়াইহাজার ও মঠবাড়ীয়া উপজেলায় ট্রেনিং সেন্টার ও হোষ্টেল নির্মাণ', '2', 'উন্নয়ন প্রকল্প', 1, 'প্রকল্প', 2, 'মহিলা বিষয়ক অধিদপ্তর', 1, 'মহিলা ও শিশু বিষয়ক মন্ত্রণালয়', 'জনাব মোঃ আবুল কাশেম', '', '', '', 7, '২০১৫', 6, '২০১৪', 6, '২০১৪', 11, '২০১৯', 1);
INSERT INTO `projects` VALUES (10, 'জেলা ভিত্তিক মহিলা কম্পিউটার প্রশিক্ষণ প্রকল্প (৬৪ জেলা)', 'জেলা ভিত্তিক মহিলা কম্পিউটার প্রশিক্ষণ প্রকল্প (৬৪ জেলা)', '2', 'উন্নয়ন প্রকল্প', 1, 'প্রকল্প', 1, 'জাতীয় মহিলা সংস্থা', 3, 'জাতীয় মহিলা সংস্থা', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 1);
INSERT INTO `projects` VALUES (11, 'নগর ভিত্তিক প্রান্তিক মহিলা উন্নয়ন প্রকল্প', 'নগর ভিত্তিক প্রান্তিক মহিলা উন্নয়ন প্রকল্প', '2', 'উন্নয়ন প্রকল্প', 1, 'প্রকল্প', 1, 'জাতীয় মহিলা সংস্থা', 3, 'জাতীয় মহিলা সংস্থা', 'জনাব নুরুন্নাহার হেনা', '', '', '', 0, '', 0, '', 0, '', 0, '', 1);
INSERT INTO `projects` VALUES (12, 'অথনৈতিক ক্ষমতায়নে নারী উদ্যোক্তাদের বিকাশ সাধন প্রকল্প (৩য় পর্যায়)', 'অথনৈতিক ক্ষমতায়নে নারী উদ্যোক্তাদের বিকাশ সাধন প্রকল্প (৩য় পর্যায়)', '2', 'উন্নয়ন প্রকল্প', 1, 'প্রকল্প', 1, 'জাতীয় মহিলা সংস্থা', 3, 'জাতীয় মহিলা সংস্থা', 'জনাব আনোয়ারা বেগম', '', '', '', 0, '', 0, '', 0, '', 0, '', 1);
INSERT INTO `projects` VALUES (13, 'তথ্য আপা : ডিজিটাল বাংলাদেশ গড়ার লক্ষ্যে তথ্য প্রযুক্তির মাধ্যমে নারীর ক্ষমতায়ন প্রকল্প (২য় পর্যায়)', 'তথ্য আপা : ডিজিটাল বাংলাদেশ গড়ার লক্ষ্যে তথ্য প্রযুক্তির মাধ্যমে নারীর ক্ষমতায়ন প্রকল্প (২য় পর্যায়)', '2', 'উন্নয়ন প্রকল্প', 1, 'প্রকল্প', 1, 'জাতীয় মহিলা সংস্থা', 3, 'জাতীয় মহিলা সংস্থা', 'জনাব মীনা পারভিন', '', '', '', 0, '', 0, '', 0, '', 0, '', 1);
INSERT INTO `projects` VALUES (14, 'মিরপুর ও খিলগাঁও কর্মজীবী মহিলা হোস্টেল সম্প্রসারন', 'মিরপুর ও খিলগাঁও কর্মজীবী মহিলা হোস্টেল সম্প্রসারন', '2', 'উন্নয়ন প্রকল্প', 1, 'প্রকল্প', 2, 'মহিলা বিষয়ক অধিদপ্তর', 2, 'মহিলা বিষয়ক অধিদপ্তর', 'জনাব শাহিন সুলতানা', '', '', '', 0, '', 0, '', 0, '', 0, '', 1);
INSERT INTO `projects` VALUES (15, 'গাজীপুর জেলার কালিগঞ্জ উপজেলায় কর্মজীবী মহিলা হোস্টেল স্থাপন', 'গাজীপুর জেলার কালিগঞ্জ উপজেলায় কর্মজীবী মহিলা হোস্টেল স্থাপন', '2', 'উন্নয়ন প্রকল্প', 1, 'প্রকল্প', 2, 'মহিলা বিষয়ক অধিদপ্তর', 2, 'মহিলা বিষয়ক অধিদপ্তর', 'জনাব শামিমা আখতার বানু', '', '', '', 0, '', 0, '', 0, '', 0, '', 1);
INSERT INTO `projects` VALUES (16, 'আমার ইন্টারনেট আমার আয়', 'আমার ইন্টারনেট আমার আয়', '1', 'রাজস্ব বাজেটের কর্মসূচী', 2, 'কর্মসুচি', 1, 'জাতীয় মহিলা সংস্থা', 1, 'মহিলা ও শিশু বিষয়ক মন্ত্রণালয়', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 1);
INSERT INTO `projects` VALUES (17, 'মহিলাদের আত্মকর্মসংস্থান এর জন্য ক্ষুদ্র ঋণ কার্যক্রম', 'মহিলাদের আত্মকর্মসংস্থান এর জন্য ক্ষুদ্র ঋণ কার্যক্রম', '3', 'রাজস্ব বাজেটের আওতায় অন্যান্য কার্যক্রম', 0, '', 1, 'জাতীয় মহিলা সংস্থা', 1, 'মহিলা ও শিশু বিষয়ক মন্ত্রণালয়', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 1);
INSERT INTO `projects` VALUES (18, 'মহিলাদের আত্মকর্মসংস্থান এর জন্য শ্স্ব কর্ম সহায়ক ঋণ কার্যক্রম', 'মহিলাদের আত্মকর্মসংস্থান এর জন্য শ্স্ব কর্ম সহায়ক ঋণ কার্যক্রম', '3', 'রাজস্ব বাজেটের আওতায় অন্যান্য কার্যক্রম', 0, '', 1, 'জাতীয় মহিলা সংস্থা', 3, 'জাতীয় মহিলা সংস্থা', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 1);
INSERT INTO `projects` VALUES (19, 'আইনগত সহায়তা প্রদান', 'আইনগত সহায়তা প্রদান', '3', 'রাজস্ব বাজেটের আওতায় অন্যান্য কার্যক্রম', 0, '', 1, 'জাতীয় মহিলা সংস্থা', 3, 'জাতীয় মহিলা সংস্থা', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 1);
INSERT INTO `projects` VALUES (20, 'যৌতুক ও বাল্য বিবাহ রোধকল্পে উঠান বৈঠক', 'যৌতুক ও বাল্য বিবাহ রোধকল্পে উঠান বৈঠক', '3', 'রাজস্ব বাজেটের আওতায় অন্যান্য কার্যক্রম', 0, '', 1, 'জাতীয় মহিলা সংস্থা', 3, 'জাতীয় মহিলা সংস্থা', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 1);
INSERT INTO `projects` VALUES (21, 'নারী ও শিশু পাচার রোধকল্পে উঠান বৈঠক', 'নারী ও শিশু পাচার রোধকল্পে উঠান বৈঠক', '3', 'রাজস্ব বাজেটের আওতায় অন্যান্য কার্যক্রম', 0, '', 1, 'জাতীয় মহিলা সংস্থা', 3, 'জাতীয় মহিলা সংস্থা', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 1);
INSERT INTO `projects` VALUES (22, 'দর্জি বিজ্ঞান ও এমব্রয়ডারি', 'দর্জি বিজ্ঞান ও এমব্রয়ডারি', '3', 'রাজস্ব বাজেটের আওতায় অন্যান্য কার্যক্রম', 0, '', 1, 'জাতীয় মহিলা সংস্থা', 3, 'জাতীয় মহিলা সংস্থা', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 1);

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
  `name` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
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
INSERT INTO `users` VALUES (1, 'Ministry Admin', 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'w19i5my51.png', NULL, 1, '2018-02-24 18:34:19');
INSERT INTO `users` VALUES (2, 'বাংলাদেশ শিশু একডেমী', 'bsa', '942078ca2d04f25545a316c123a392c4d5d339fd', 2, 'no_image.jpg', 1, 1, '2018-02-02 11:53:54');
INSERT INTO `users` VALUES (3, 'মহিলা ও শিশু বিষয়ক মন্ত্রণালয়', 'mowca', '12dea96fec20593566ab75692c9949596833adc9', 2, 'no_image.jpg', 4, 1, '2018-01-25 16:42:21');
INSERT INTO `users` VALUES (4, 'জাতীয় মহিলা সংস্থা', 'Jms', '8cb2237d0679ca88db6464eac60da96345513964', 2, 'fn44z3oj4.jpg', 1, 1, '2018-02-24 18:31:24');
INSERT INTO `users` VALUES (5, 'মহিলা বিষয়ক অধিদপ্তর', 'Dwa', '8cb2237d0679ca88db6464eac60da96345513964', 2, 'no_image.jpg', 2, 1, '2018-02-24 18:30:58');

-- ----------------------------
-- Table structure for years
-- ----------------------------
DROP TABLE IF EXISTS `years`;
CREATE TABLE `years`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_BN` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of years
-- ----------------------------
INSERT INTO `years` VALUES (1, '2009', '২০০৯');
INSERT INTO `years` VALUES (2, '2010', '২০১০');
INSERT INTO `years` VALUES (3, '2011', '২০১১');
INSERT INTO `years` VALUES (4, '2012', '২০১২');
INSERT INTO `years` VALUES (5, '2013', '২০১৩');
INSERT INTO `years` VALUES (6, '2014', '২০১৪');
INSERT INTO `years` VALUES (7, '2015', '২০১৫');
INSERT INTO `years` VALUES (8, '2016', '২০১৬');
INSERT INTO `years` VALUES (9, '2017', '২০১৭');
INSERT INTO `years` VALUES (10, '2018', '২০১৮');
INSERT INTO `years` VALUES (11, '2019', '২০১৯');
INSERT INTO `years` VALUES (12, '2020', '২০২০');
INSERT INTO `years` VALUES (13, '2021', '২০২১');
INSERT INTO `years` VALUES (14, '2022', '২০২২');
INSERT INTO `years` VALUES (15, '2023', '২০২৩');
INSERT INTO `years` VALUES (16, '2024', '২০২৪');

SET FOREIGN_KEY_CHECKS = 1;
