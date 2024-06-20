-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;




-- Dumping structure for table test.account_transactions
CREATE TABLE IF NOT EXISTS `account_transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `from_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint NOT NULL,
  `current_balance` decimal(24,2) NOT NULL,
  `amount` decimal(24,2) NOT NULL,
  `method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'collected',
  `created_by` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.account_transactions: ~0 rows (approximately)

-- Dumping structure for table test.addon_settings
CREATE TABLE IF NOT EXISTS `addon_settings` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `test_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `settings_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'live',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  PRIMARY KEY (`id`),
  KEY `payment_settings_id_index` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.addon_settings: ~47 rows (approximately)
INSERT INTO `addon_settings` (`id`, `key_name`, `live_values`, `test_values`, `settings_type`, `mode`, `is_active`, `created_at`, `updated_at`, `additional_data`) VALUES
	('070c6bbd-d777-11ed-96f4-0c7a158e4469', 'twilio', '{"gateway":"twilio","mode":"live","status":0,"sid":"","messaging_service_sid":"","token":"","from":"","otp_template":""}', '{"gateway":"twilio","mode":"live","status":0,"sid":"","messaging_service_sid":"","token":"","from":"","otp_template":""}', 'sms_config', 'live', 0, NULL, '2024-05-03 18:32:27', NULL),
	('070c766c-d777-11ed-96f4-0c7a158e4469', '2factor', '{"gateway":"2factor","mode":"live","status":0,"api_key":""}', '{"gateway":"2factor","mode":"live","status":0,"api_key":""}', 'sms_config', 'live', 0, NULL, '2024-05-03 18:32:27', NULL),
	('0d8a9308-d6a5-11ed-962c-0c7a158e4469', 'mercadopago', '{"gateway":"mercadopago","mode":"live","status":1,"access_token":"","public_key":""}', '{"gateway":"mercadopago","mode":"live","status":1,"access_token":"","public_key":""}', 'payment_config', 'live', 0, NULL, '2023-04-12 03:37:50', '{"gateway_title":"Mercadopago","gateway_image":null}'),
	('0d8a9e49-d6a5-11ed-962c-0c7a158e4469', 'liqpay', '{"gateway":"liqpay","mode":"live","status":"1","private_key":null,"public_key":null}', '{"gateway":"liqpay","mode":"live","status":"1","private_key":null,"public_key":null}', 'payment_config', 'live', 0, NULL, NULL, '{"gateway_title":"Liqpay","gateway_image":null}'),
	('101befdf-d44b-11ed-8564-0c7a158e4469', 'paypal', '{"gateway":"paypal","mode":"live","status":"0","client_id":null,"client_secret":null}', '{"gateway":"paypal","mode":"live","status":"0","client_id":null,"client_secret":null}', 'payment_config', 'live', 0, NULL, NULL, '{"gateway_title":"Paypal","gateway_image":null}'),
	('133d9647-cabb-11ed-8fec-0c7a158e4469', 'hyper_pay', '{"gateway":"hyper_pay","mode":"live","status":"0","entity_id":"","access_code":""}', '{"gateway":"hyper_pay","mode":"live","status":"0","entity_id":"","access_code":""}', 'payment_config', 'test', 0, NULL, '2023-04-08 22:59:22', NULL),
	('1821029f-d776-11ed-96f4-0c7a158e4469', 'msg91', '{"gateway":"msg91","mode":"live","status":0,"template_id":"","auth_key":""}', '{"gateway":"msg91","mode":"live","status":0,"template_id":"","auth_key":""}', 'sms_config', 'live', 0, NULL, '2024-05-03 18:32:27', NULL),
	('18210f2b-d776-11ed-96f4-0c7a158e4469', 'nexmo', '{"gateway":"nexmo","mode":"live","status":0,"api_key":"","api_secret":"","token":"","from":"","otp_template":""}', '{"gateway":"nexmo","mode":"live","status":0,"api_key":"","api_secret":"","token":"","from":"","otp_template":""}', 'sms_config', 'live', 0, NULL, '2024-05-03 18:32:27', NULL),
	('18fbb21f-d6ad-11ed-962c-0c7a158e4469', 'foloosi', '{"gateway":"foloosi","mode":"live","status":"0","merchant_key":""}', '{"gateway":"foloosi","mode":"test","status":"0","merchant_key":""}', 'payment_config', 'test', 0, NULL, NULL, NULL),
	('2767d142-d6a1-11ed-962c-0c7a158e4469', 'paytm', '{"gateway":"paytm","mode":"live","status":"1","merchant_key":null,"merchant_id":null,"merchant_website_link":null}', '{"gateway":"paytm","mode":"live","status":"1","merchant_key":null,"merchant_id":null,"merchant_website_link":null}', 'payment_config', 'live', 0, NULL, NULL, '{"gateway_title":"Paytm","gateway_image":null}'),
	('3201d2e6-c937-11ed-a424-0c7a158e4469', 'amazon_pay', '{"gateway":"amazon_pay","mode":"test","status":"0","pass_phrase": "","access_code": "","merchant_identifier": ""}', '{"gateway":"amazon_pay","mode":"test","status":"0","pass_phrase": "","access_code": "","merchant_identifier": ""}', 'payment_config', 'test', 0, NULL, NULL, NULL),
	('4593b25c-d6a1-11ed-962c-0c7a158e4469', 'paytabs', '{"gateway":"paytabs","mode":"live","status":"1","profile_id":null,"server_key":null,"base_url":null}', '{"gateway":"paytabs","mode":"live","status":"1","profile_id":null,"server_key":null,"base_url":null}', 'payment_config', 'live', 0, NULL, '2023-04-09 02:23:25', '{"gateway_title":"Paytabs","gateway_image":null}'),
	('4e9b8dfb-e7d1-11ed-a559-0c7a158e4469', 'bkash', '{"gateway":"bkash","mode":"live","status":"1","app_key":"5tunt4masn6pv2hnvte1sb5n3j","app_secret":"1vggbqd4hqk9g96o9rrrp2jftvek578v7d2bnerim12a87dbrrka","username":"sandboxTestUser","password":"hWD@8vtzw0"}', '{"gateway":"bkash","mode":"live","status":"1","app_key":"5tunt4masn6pv2hnvte1sb5n3j","app_secret":"1vggbqd4hqk9g96o9rrrp2jftvek578v7d2bnerim12a87dbrrka","username":"sandboxTestUser","password":"hWD@8vtzw0"}', 'payment_config', 'live', 0, NULL, '2023-04-08 23:08:40', '{"gateway_title":"Bkash","gateway_image":null}'),
	('544a24a4-c872-11ed-ac7a-0c7a158e4469', 'fatoorah', '{"gateway":"fatoorah","mode":"live","status":"0","api_key":""}', '{"gateway":"fatoorah","mode":"test","status":"0","api_key":""}', 'payment_config', 'test', 0, NULL, NULL, NULL),
	('58c1bc8a-d6ac-11ed-962c-0c7a158e4469', 'ccavenue', '{"gateway":"ccavenue","mode":"test","status":"0","merchant_id":"","working_key":"","access_code":""}', '{"gateway":"ccavenue","mode":"test","status":"0","merchant_id":"","working_key":"","access_code":""}', 'payment_config', 'test', 0, NULL, '2023-04-12 22:24:16', '{"gateway_title":"","gateway_image":""}'),
	('5e2d2ef9-d6ab-11ed-962c-0c7a158e4469', 'thawani', '{"gateway":"thawani","mode":"live","status":"0","public_key":"","private_key":""}', '{"gateway":"thawani","mode":"live","status":"0","public_key":"","private_key":""}', 'payment_config', 'test', 0, NULL, '2023-04-12 23:14:00', '{"gateway_title":"","gateway_image":""}'),
	('60cc83cc-d5b9-11ed-b56f-0c7a158e4469', 'sixcash', '{"gateway":"sixcash","mode":"test","status":"0","public_key":"","secret_key":"","merchant_number":"", "base_url":""}', '{"gateway":"sixcash","mode":"test","status":"0","public_key":"","secret_key":"","merchant_number":"", "base_url":""}', 'payment_config', 'test', 0, NULL, '2023-04-12 03:18:06', '{"gateway_title":"","gateway_image":""}'),
	('68579846-d8e8-11ed-8249-0c7a158e4469', 'alphanet_sms', '{"gateway":"alphanet_sms","mode":"live","status":0,"api_key":"","otp_template":""}', '{"gateway":"alphanet_sms","mode":"live","status":0,"api_key":"","otp_template":""}', 'sms_config', 'live', 0, NULL, '2024-05-03 18:32:27', NULL),
	('6857a2e8-d8e8-11ed-8249-0c7a158e4469', 'sms_to', '{"gateway":"sms_to","mode":"live","status":0,"api_key":"","sender_id":"","otp_template":""}', '{"gateway":"sms_to","mode":"live","status":0,"api_key":"","sender_id":"","otp_template":""}', 'sms_config', 'live', 0, NULL, '2024-05-03 18:32:27', NULL),
	('74c30c00-d6a6-11ed-962c-0c7a158e4469', 'hubtel', '{"gateway":"hubtel","mode":"live","status":"0","account_number":"","api_id":"","api_key":""}', '{"gateway":"hubtel","mode":"test","status":"0","account_number":"","api_id":"","api_key":""}', 'payment_config', 'test', 0, NULL, NULL, NULL),
	('74e46b0a-d6aa-11ed-962c-0c7a158e4469', 'tap', '{"gateway":"tap","mode":"live","status":"0","secret_key":""}', '{"gateway":"tap","mode":"test","status":"0","secret_key":""}', 'payment_config', 'test', 0, NULL, NULL, NULL),
	('761ca96c-d1eb-11ed-87ca-0c7a158e4469', 'swish', '{"gateway":"swish","mode":"test","status":"0","number": ""}', '{"gateway":"swish","mode":"test","status":"0","number": ""}', 'payment_config', 'test', 0, NULL, NULL, NULL),
	('7b1c3c5f-d2bd-11ed-b485-0c7a158e4469', 'payfast', '{"gateway":"payfast","mode":"test","status":"0","merchant_id":"","secured_key":""}', '{"gateway":"payfast","mode":"test","status":"0","merchant_id":"","secured_key":""}', 'payment_config', 'test', 0, NULL, NULL, NULL),
	('8592417b-d1d1-11ed-a984-0c7a158e4469', 'esewa', '{"gateway":"esewa","mode":"test","status":"0","merchantCode": ""}', '{"gateway":"esewa","mode":"test","status":"0","merchantCode": "EPAYTEST"}', 'payment_config', 'test', 0, NULL, NULL, NULL),
	('9162a1dc-cdf1-11ed-affe-0c7a158e4469', 'viva_wallet', '{"gateway":"viva_wallet","mode":"test","status":"0","client_id": "","client_secret": ""}\n', '{"gateway":"viva_wallet","mode":"test","status":"0","client_id": "","client_secret": ""}', 'payment_config', 'test', 0, NULL, NULL, NULL),
	('998ccc62-d6a0-11ed-962c-0c7a158e4469', 'stripe', '{"gateway":"stripe","mode":"live","status":"0","api_key":null,"published_key":null}', '{"gateway":"stripe","mode":"live","status":"0","api_key":null,"published_key":null}', 'payment_config', 'live', 0, NULL, '2023-04-12 22:26:31', '{"gateway_title":"Stripe","gateway_image":null}'),
	('a3313755-c95d-11ed-b1db-0c7a158e4469', 'iyzi_pay', '{"gateway":"iyzi_pay","mode":"test","status":"0","api_key": "","secret_key": "","base_url": ""}', '{"gateway":"iyzi_pay","mode":"test","status":"0","api_key": "","secret_key": "","base_url": ""}', 'payment_config', 'test', 0, NULL, NULL, NULL),
	('a76c8993-d299-11ed-b485-0c7a158e4469', 'momo', '{"gateway":"momo","mode":"live","status":"0","api_key":"","api_user":"","subscription_key":""}', '{"gateway":"momo","mode":"live","status":"0","api_key":"","api_user":"","subscription_key":""}', 'payment_config', 'test', 0, NULL, '2023-04-08 22:39:19', NULL),
	('a8608119-cc76-11ed-9bca-0c7a158e4469', 'moncash', '{"gateway":"moncash","mode":"test","status":"0","client_id":"","secret_key": ""}\n', '{"gateway":"moncash","mode":"test","status":"0","client_id":"","secret_key": ""}\n', 'payment_config', 'test', 0, NULL, NULL, NULL),
	('ad5af1c1-d6a2-11ed-962c-0c7a158e4469', 'razor_pay', '{"gateway":"razor_pay","mode":"test","status":1,"api_key":"rzp_test_XZKJkxZxNQpGQd","api_secret":"dHu6evz9RzBILKhWQObaodoj"}', '{"gateway":"razor_pay","mode":"test","status":1,"api_key":"rzp_test_XZKJkxZxNQpGQd","api_secret":"dHu6evz9RzBILKhWQObaodoj"}', 'payment_config', 'test', 1, NULL, '2024-05-08 00:28:39', '{"gateway_title":"Razor pay","gateway_image":"2024-05-08-663b5adfc95c5.png"}'),
	('ad5b02a0-d6a2-11ed-962c-0c7a158e4469', 'senang_pay', '{"gateway":"senang_pay","mode":"live","status":"1","callback_url":null,"secret_key":null,"merchant_id":null}', '{"gateway":"senang_pay","mode":"live","status":"1","callback_url":null,"secret_key":null,"merchant_id":null}', 'payment_config', 'live', 0, NULL, NULL, '{"gateway_title":"Senang pay","gateway_image":null}'),
	('b0fb3df5-c9cc-4d32-973a-45c2d5741f91', 'fast2sms', '{"gateway":"fast2sms","mode":"live","status":"1","api_key":"FzlT7qiGUub1PfaRXW6wemo5sxvtdQ9SA0YgJjkypHrInOV2DEWX8drMcfHVFLSzCsmjlwo2GYD7h4J6"}', '{"gateway":"fast2sms","mode":"live","status":"1","api_key":"FzlT7qiGUub1PfaRXW6wemo5sxvtdQ9SA0YgJjkypHrInOV2DEWX8drMcfHVFLSzCsmjlwo2GYD7h4J6"}', 'sms_config', 'live', 1, NULL, '2024-05-03 18:32:27', NULL),
	('b6c333f6-d8e9-11ed-8249-0c7a158e4469', 'akandit_sms', '{"gateway":"akandit_sms","mode":"live","status":0,"username":"","password":"","otp_template":""}', '{"gateway":"akandit_sms","mode":"live","status":0,"username":"","password":"","otp_template":""}', 'sms_config', 'live', 0, NULL, '2024-05-03 18:32:27', NULL),
	('b6c33c87-d8e9-11ed-8249-0c7a158e4469', 'global_sms', '{"gateway":"global_sms","mode":"live","status":0,"user_name":"","password":"","from":"","otp_template":""}', '{"gateway":"global_sms","mode":"live","status":0,"user_name":"","password":"","from":"","otp_template":""}', 'sms_config', 'live', 0, NULL, '2024-05-03 18:32:27', NULL),
	('b8992bd4-d6a0-11ed-962c-0c7a158e4469', 'paymob_accept', '{"gateway":"paymob_accept","mode":"live","status":"0","callback_url":null,"api_key":null,"iframe_id":null,"integration_id":null,"hmac":null}', '{"gateway":"paymob_accept","mode":"live","status":"0","callback_url":null,"api_key":null,"iframe_id":null,"integration_id":null,"hmac":null}', 'payment_config', 'live', 0, NULL, NULL, '{"gateway_title":"Paymob accept","gateway_image":null}'),
	('c41c0dcd-d119-11ed-9f67-0c7a158e4469', 'maxicash', '{"gateway":"maxicash","mode":"test","status":"0","merchantId": "","merchantPassword": ""}', '{"gateway":"maxicash","mode":"test","status":"0","merchantId": "","merchantPassword": ""}', 'payment_config', 'test', 0, NULL, NULL, NULL),
	('c9249d17-cd60-11ed-b879-0c7a158e4469', 'pvit', '{"gateway":"pvit","mode":"test","status":"0","mc_tel_merchant": "","access_token": "", "mc_merchant_code": ""}', '{"gateway":"pvit","mode":"test","status":"0","mc_tel_merchant": "","access_token": "", "mc_merchant_code": ""}', 'payment_config', 'test', 0, NULL, NULL, NULL),
	('cb0081ce-d775-11ed-96f4-0c7a158e4469', 'releans', '{"gateway":"releans","mode":"live","status":0,"api_key":"","from":"","otp_template":""}', '{"gateway":"releans","mode":"live","status":0,"api_key":"","from":"","otp_template":""}', 'sms_config', 'live', 0, NULL, '2024-05-03 18:32:27', NULL),
	('d4f3f5f1-d6a0-11ed-962c-0c7a158e4469', 'flutterwave', '{"gateway":"flutterwave","mode":"live","status":1,"secret_key":"FLWSECK_TEST-ec27426eb062491500a9eb95723b5436-X","public_key":"FLWPUBK_TEST-3f6a0b6c3d621c4ecbb9beeff516c92b-X","hash":"FLWSECK_TEST951e36220f66"}', '{"gateway":"flutterwave","mode":"live","status":1,"secret_key":"FLWSECK_TEST-ec27426eb062491500a9eb95723b5436-X","public_key":"FLWPUBK_TEST-3f6a0b6c3d621c4ecbb9beeff516c92b-X","hash":"FLWSECK_TEST951e36220f66"}', 'payment_config', 'live', 0, NULL, NULL, '{"gateway_title":"Flutterwave","gateway_image":null}'),
	('d822f1a5-c864-11ed-ac7a-0c7a158e4469', 'paystack', '{"gateway":"paystack","mode":"live","status":"0","public_key":null,"secret_key":null,"merchant_email":null}', '{"gateway":"paystack","mode":"live","status":"0","public_key":null,"secret_key":null,"merchant_email":null}', 'payment_config', 'live', 0, NULL, NULL, '{"gateway_title":"Paystack","gateway_image":null}'),
	('daec8d59-c893-11ed-ac7a-0c7a158e4469', 'xendit', '{"gateway":"xendit","mode":"test","status":"0","api_key":""}', '{"gateway":"xendit","mode":"test","status":"0","api_key":""}', 'payment_config', 'test', 0, NULL, NULL, NULL),
	('dc0f5fc9-d6a5-11ed-962c-0c7a158e4469', 'worldpay', '{"gateway":"worldpay","mode":"live","status":"0","OrgUnitId":"","jwt_issuer":"","mac":"","merchantCode":"","xml_password":""}', '{"gateway":"worldpay","mode":"test","status":"0","OrgUnitId":"","jwt_issuer":"","mac":"","merchantCode":"","xml_password":""}', 'payment_config', 'test', 0, NULL, NULL, NULL),
	('e0450278-d8eb-11ed-8249-0c7a158e4469', 'signal_wire', '{"gateway":"signal_wire","mode":"live","status":0,"project_id":"","token":"","space_url":"","from":"","otp_template":""}', '{"gateway":"signal_wire","mode":"live","status":0,"project_id":"","token":"","space_url":"","from":"","otp_template":""}', 'sms_config', 'live', 0, NULL, '2024-05-03 18:32:27', NULL),
	('e0450b40-d8eb-11ed-8249-0c7a158e4469', 'paradox', '{"gateway":"paradox","mode":"live","status":0,"api_key":""}', '{"gateway":"paradox","mode":"live","status":0,"api_key":""}', 'sms_config', 'live', 0, NULL, '2024-05-03 18:32:27', NULL),
	('ea346efe-cdda-11ed-affe-0c7a158e4469', 'ssl_commerz', '{"gateway":"ssl_commerz","mode":"live","status":"0","store_id":null,"store_password":null}', '{"gateway":"ssl_commerz","mode":"live","status":"0","store_id":null,"store_password":null}', 'payment_config', 'live', 0, NULL, '2023-07-31 13:14:48', '{"gateway_title":"Ssl commerz","gateway_image":null}'),
	('eed88336-d8ec-11ed-8249-0c7a158e4469', 'hubtel', '{"gateway":"hubtel","mode":"live","status":0,"sender_id":"","client_id":"","client_secret":"","otp_template":""}', '{"gateway":"hubtel","mode":"live","status":0,"sender_id":"","client_id":"","client_secret":"","otp_template":""}', 'sms_config', 'live', 0, NULL, '2024-05-03 18:32:27', NULL),
	('f149c546-d8ea-11ed-8249-0c7a158e4469', 'viatech', '{"gateway":"viatech","mode":"live","status":0,"api_url":"","api_key":"","sender_id":"","otp_template":""}', '{"gateway":"viatech","mode":"live","status":0,"api_url":"","api_key":"","sender_id":"","otp_template":""}', 'sms_config', 'live', 0, NULL, '2024-05-03 18:32:27', NULL),
	('f149cd9c-d8ea-11ed-8249-0c7a158e4469', '019_sms', '{"gateway":"019_sms","mode":"live","status":0,"password":"","username":"","username_for_token":"","sender":"","otp_template":""}', '{"gateway":"019_sms","mode":"live","status":0,"password":"","username":"","username_for_token":"","sender":"","otp_template":""}', 'sms_config', 'live', 0, NULL, '2024-05-03 18:32:27', NULL);

-- Dumping structure for table test.add_ons
CREATE TABLE IF NOT EXISTS `add_ons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(24,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_id` bigint unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.add_ons: ~0 rows (approximately)

-- Dumping structure for table test.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint unsigned NOT NULL,
  `zone_id` bigint unsigned DEFAULT NULL,
  `is_logged_in` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.admins: ~2 rows (approximately)
INSERT INTO `admins` (`id`, `f_name`, `l_name`, `phone`, `email`, `image`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `zone_id`, `is_logged_in`) VALUES
	(1, 'Test', 'Admin', '01500000000', 'admin@admin.com', NULL, '$2y$10$VfktRD62HSKO2/wOHDFyKO04d0nFtE6UtMpb5o/l8QSWE0uC/WLni', NULL, '2023-08-16 23:34:18', '2023-08-16 23:34:18', 1, NULL, 1),
	(2, 'akhil', 'jinu', '9655804621', 'admin@gmail.com', NULL, '$2y$10$9rz8xT.Q7.bUiorvsK6BquxfE22DzK7D6RRYULFPnTUf2vvSvfqqu', NULL, '2024-05-01 18:10:23', '2024-05-01 18:10:23', 1, NULL, 1);

-- Dumping structure for table test.admin_features
CREATE TABLE IF NOT EXISTS `admin_features` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.admin_features: ~0 rows (approximately)
INSERT INTO `admin_features` (`id`, `title`, `sub_title`, `image`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Demo Feature Title', 'Demo Feature  Sub Title', '2023-08-16-64dcaa268d2d0.png', 1, '2023-08-15 23:51:18', '2023-08-15 23:51:18');

-- Dumping structure for table test.admin_promotional_banners
CREATE TABLE IF NOT EXISTS `admin_promotional_banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.admin_promotional_banners: ~2 rows (approximately)
INSERT INTO `admin_promotional_banners` (`id`, `title`, `sub_title`, `image`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Demo Title', 'Demo Promotional Subtitle', '2023-08-16-64dca9d76d4f4.png', 1, '2023-08-15 23:49:59', '2023-08-15 23:49:59'),
	(2, 'cxcxcxzc', 'zxc', '2024-05-02-663358025a326.png', 1, '2024-05-01 22:38:18', '2024-05-01 22:38:18');

-- Dumping structure for table test.admin_roles
CREATE TABLE IF NOT EXISTS `admin_roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `modules` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.admin_roles: ~0 rows (approximately)
INSERT INTO `admin_roles` (`id`, `name`, `modules`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Master admin', NULL, 1, NULL, NULL);

-- Dumping structure for table test.admin_special_criterias
CREATE TABLE IF NOT EXISTS `admin_special_criterias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.admin_special_criterias: ~0 rows (approximately)
INSERT INTO `admin_special_criterias` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Demo Title', '2023-08-16-64dcaaa5b0d37.png', 1, '2023-08-15 23:53:25', '2023-08-15 23:53:25');

-- Dumping structure for table test.admin_testimonials
CREATE TABLE IF NOT EXISTS `admin_testimonials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `reviewer_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.admin_testimonials: ~0 rows (approximately)
INSERT INTO `admin_testimonials` (`id`, `name`, `designation`, `review`, `reviewer_image`, `company_image`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'John Doe', 'CTO', 'Very good service.', '2024-05-22-664d8cc241f5f.png', '2024-05-22-664d8cc24288b.png', 1, '2023-08-15 23:54:26', '2024-05-21 19:42:18'),
	(2, 'Manoj', 'Manager', 'This rental service was too good', '2024-05-22-664d8c8e54d53.png', '2024-05-22-664d8c8e5870a.png', 1, '2024-05-21 19:41:26', '2024-05-21 19:41:26');

-- Dumping structure for table test.admin_wallets
CREATE TABLE IF NOT EXISTS `admin_wallets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` bigint unsigned NOT NULL,
  `total_commission_earning` decimal(24,2) NOT NULL DEFAULT '0.00',
  `digital_received` decimal(24,2) NOT NULL DEFAULT '0.00',
  `manual_received` decimal(24,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_charge` decimal(24,3) NOT NULL DEFAULT '0.000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.admin_wallets: ~0 rows (approximately)
INSERT INTO `admin_wallets` (`id`, `admin_id`, `total_commission_earning`, `digital_received`, `manual_received`, `created_at`, `updated_at`, `delivery_charge`) VALUES
	(1, 1, 1500.00, 15000.00, 0.00, '2024-05-28 18:33:29', '2024-05-28 18:33:29', 0.000);

-- Dumping structure for table test.attributes
CREATE TABLE IF NOT EXISTS `attributes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.attributes: ~0 rows (approximately)

-- Dumping structure for table test.banners
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `data` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `zone_id` bigint unsigned NOT NULL,
  `module_id` bigint unsigned NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `default_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`id`),
  KEY `banners_module_id_foreign` (`module_id`),
  CONSTRAINT `banners_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.banners: ~0 rows (approximately)

-- Dumping structure for table test.business_settings
CREATE TABLE IF NOT EXISTS `business_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.business_settings: ~137 rows (approximately)
INSERT INTO `business_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
	(1, 'cash_on_delivery', '{"status":null}', '2021-07-01 15:51:17', '2024-05-01 18:47:18'),
	(2, 'stripe', '{"status":"0","api_key":null,"published_key":null}', '2021-05-11 03:57:02', '2022-03-23 04:22:00'),
	(4, 'mail_config', '{"status":"1","name":"6am Mart","host":"mail.6amtech.com","driver":"smtp","port":"587","username":"info@6amtech.com","email_id":"info@6amtech.com","encryption":"tls","password":"password"}', NULL, '2024-05-21 02:31:22'),
	(5, 'fcm_project_id', 'e-food-9e6e3', NULL, NULL),
	(6, 'push_notification_key', NULL, NULL, NULL),
	(7, 'order_pending_message', '{"status":1,"message":"Your order is successfully placed"}', NULL, NULL),
	(8, 'order_confirmation_msg', '{"status":1,"message":"Your order is confirmed"}', NULL, NULL),
	(9, 'order_processing_message', '{"status":1,"message":"Your order is started for cooking"}', NULL, NULL),
	(10, 'out_for_delivery_message', '{"status":1,"message":"Your food is ready for delivery"}', NULL, NULL),
	(11, 'order_delivered_message', '{"status":1,"message":"Your order is delivered"}', NULL, NULL),
	(12, 'delivery_boy_assign_message', '{"status":1,"message":"Your order has been assigned to a delivery man"}', NULL, NULL),
	(13, 'delivery_boy_start_message', '{"status":1,"message":"Your order is picked up by delivery man"}', NULL, NULL),
	(14, 'delivery_boy_delivered_message', '{"status":1,"message":"Order delivered successfully"}', NULL, NULL),
	(15, 'terms_and_conditions', '<p>This is a test Teams &amp; Conditions<br />\r\n<br />\r\nThese terms of use (the &quot;Terms of Use&quot;) govern your use of our website www.evaly.com.bd (the &quot;Website&quot;) and our &quot;StackFood&quot; application for mobile and handheld devices (the &quot;App&quot;). The Website and the App are jointly referred to as the &quot;Platform&quot;. Please read these Terms of Use carefully before you use the services. If you do not agree to these Terms of Use, you may not use the services on the Platform, and we request you to uninstall the App. By installing, downloading and/or even merely using the Platform, you shall be contracting with StackFood and you provide your acceptance to the Terms of Use and other StackFood policies (including but not limited to the Cancellation &amp; Refund Policy, Privacy Policy etc.) as posted on the Platform from time to time, which takes effect on the date on which you download, install or use the Services, and create a legally binding arrangement to abide by the same. The Platforms will be used by (i) natural persons who have reached 18 years of age and (ii) corporate legal entities, e.g companies. Where applicable, these Terms shall be subject to country-specific provisions as set out herein.</p>\r\n\r\n<h3>USE OF PLATFORM AND SERVICES</h3>\r\n\r\n<p>All commercial/contractual terms are offered by and agreed to between Buyers and Merchants alone. The commercial/contractual terms include without limitation to price, taxes, shipping costs, payment methods, payment terms, date, period and mode of delivery, warranties related to products and services and after sales services related to products and services. StackFood does not have any kind of control or does not determine or advise or in any way involve itself in the offering or acceptance of such commercial/contractual terms between the Buyers and Merchants. StackFood may, however, offer support services to Merchants in respect to order fulfilment, payment collection, call centre, and other services, pursuant to independent contracts executed by it with the Merchants. eFood is not responsible for any non-performance or breach of any contract entered into between Buyers and Merchants on the Platform. eFood cannot and does not guarantee that the concerned Buyers and/or Merchants shall perform any transaction concluded on the Platform. eFood is not responsible for unsatisfactory services or non-performance of services or damages or delays as a result of products which are out of stock, unavailable or back ordered.</p>\r\n\r\n<p>StackFood&nbsp;is operating an e-commerce platform and assumes and operates the role of facilitator, and does not at any point of time during any transaction between Buyer and Merchant on the Platform come into or take possession of any of the products or services offered by Merchant. At no time shall StackFood hold any right, title or interest over the products nor shall StackFood have any obligations or liabilities in respect of such contract entered into between Buyer and Merchant. You agree and acknowledge that we shall not be responsible for:</p>\r\n\r\n<ul>\r\n	<li>The goods provided by the shops or restaurants including, but not limited, serving of food orders suiting your requirements and needs;</li>\r\n	<li>The Merchant&quot;s goods not being up to your expectations or leading to any loss, harm or damage to you;</li>\r\n	<li>The availability or unavailability of certain items on the menu;</li>\r\n	<li>The Merchant serving the incorrect orders.</li>\r\n</ul>\r\n\r\n<p>The details of the menu and price list available on the Platform are based on the information provided by the Merchants and we shall not be responsible for any change or cancellation or unavailability. All Menu &amp; Food Images used on our platforms are only representative and shall/might not match with the actual Menu/Food Ordered, StackFood shall not be responsible or Liable for any discrepancies or variations on this aspect.</p>\r\n\r\n<h3>Personal Information that you provide</h3>\r\n\r\n<p>If you want to use our service, you must create an account on our Site. To establish your account, we will ask for personally identifiable information that can be used to contact or identify you, which may include your name, phone number, and e-mail address. We may also collect demographic information about you, such as your zip code, and allow you to submit additional information that will be part of your profile. Other than basic information that we need to establish your account, it will be up to you to decide how much information to share as part of your profile. We encourage you to think carefully about the information that you share and we recommend that you guard your identity and your sensitive information. Of course, you can review and revise your profile at any time.</p>\r\n\r\n<p>You understand that delivery periods quoted to you at the time of confirming the order is an approximate estimate and may vary. We shall not be responsible for any delay in the delivery of your order due to the delay at seller/merchant end for order processing or any other unavoidable circumstances.</p>\r\n\r\n<p>Your order shall be only delivered to the address designated by you at the time of placing the order on the Platform. We reserve the right to cancel the order, in our sole discretion, in the event of any change to the place of delivery and you shall not be entitled to any refund for the same. Delivery in the event of change of the delivery location shall be at our sole discretion and reserve the right to charge with additional delivery fee if required.</p>\r\n\r\n<p>You shall undertake to provide adequate directions, information and authorizations to accept delivery. In the event of any failure to accept delivery, failure to deliver within the estimated time due to your failure to provide appropriate instructions, or authorizations, then such goods shall be deemed to have been delivered to you and all risk and responsibility in relation to such goods shall pass to you and you shall not be entitled to any refund for the same. Our decision in relation to this shall be final and binding. You understand that our liability ends once your order has been delivered to you.</p>\r\n\r\n<p>You might be required to provide your credit or debit card details to the approved payment gateways while making the payment. In this regard, you agree to provide correct and accurate credit/ debit card details to the approved payment gateways for availing the Services. You shall not use the credit/ debit card which is not lawfully owned by you, i.e. in any transaction, you must use your own credit/ debit card. The information provided by you shall not be utilized or shared with any third party unless required in relation to fraud verifications or by law, regulation or court order. You shall be solely responsible for the security and confidentiality of your credit/ debit card details. We expressly disclaim all liabilities that may arise as a consequence of any unauthorized use of your credit/ debit card. You agree that the Services shall be provided by us only during the working hours of the relevant Merchants.</p>\r\n\r\n<h3>ACTIVITIES PROHIBITED ON THE PLATFORM</h3>\r\n\r\n<p>The following is a partial list of the kinds of conduct that are illegal or prohibited on the Websites. StackFood reserves the right to investigate and take appropriate legal action/s against anyone who, in StackFood sole discretion, engages in any of the prohibited activities. Prohibited activities include &mdash; but are not limited to &mdash; the following:</p>\r\n\r\n<ul>\r\n	<li>Using the Websites for any purpose in violation of laws or regulations;</li>\r\n	<li>Posting Content that infringes the intellectual property rights, privacy rights, publicity rights, trade secret rights, or any other rights of any party;</li>\r\n	<li>Posting Content that is unlawful, obscene, defamatory, threatening, harassing, abusive, slanderous, hateful, or embarrassing to any other person or entity as determined by StackFood in its sole discretion or pursuant to local community standards;</li>\r\n	<li>Posting Content that constitutes cyber-bullying, as determined by StackFood in its sole discretion;</li>\r\n	<li>Posting Content that depicts any dangerous, life-threatening, or otherwise risky behavior;</li>\r\n	<li>Posting telephone numbers, street addresses, or last names of any person;</li>\r\n	<li>Posting URLs to external websites or any form of HTML or programming code;</li>\r\n	<li>Posting anything that may be &quot;spam,&quot; as determined by StackFood in its sole discretion;</li>\r\n	<li>Impersonating another person when posting Content;</li>\r\n	<li>Harvesting or otherwise collecting information about others, including email addresses, without their consent;</li>\r\n	<li>Allowing any other person or entity to use your identification for posting or viewing comments;</li>\r\n	<li>Harassing, threatening, stalking, or abusing any person;</li>\r\n	<li>Engaging in any other conduct that restricts or inhibits any other person from using or enjoying the Websites, or which, in the sole discretion of StackFood , exposes eFood or any of its customers, suppliers, or any other parties to any liability or detriment of any type; or</li>\r\n	<li>Encouraging other people to engage in any prohibited activities as described herein.</li>\r\n</ul>\r\n\r\n<p>StackFood&nbsp;reserves the right but is not obligated to do any or all of the following:</p>\r\n\r\n<ul>\r\n	<li>Investigate an allegation that any Content posted on the Websites does not conform to these Terms of Use and determine in its sole discretion to remove or request the removal of the Content;</li>\r\n	<li>Remove Content which is abusive, illegal, or disruptive, or that otherwise fails to conform with these Terms of Use;</li>\r\n	<li>Terminate a user&#39;s access to the Websites upon any breach of these Terms of Use;</li>\r\n	<li>Monitor, edit, or disclose any Content on the Websites; and</li>\r\n	<li>Edit or delete any Content posted on the Websites, regardless of whether such Content violates these standards.</li>\r\n</ul>\r\n\r\n<h3>AMENDMENTS</h3>\r\n\r\n<p>StackFood&nbsp;reserves the right to change or modify these Terms (including our policies which are incorporated into these Terms) at any time by posting changes on the Platform. You are strongly recommended to read these Terms regularly. You will be deemed to have agreed to the amended Terms by your continued use of the Platforms following the date on which the amended Terms are posted.</p>\r\n\r\n<h3>PAYMENT</h3>\r\n\r\n<p>StackFood&nbsp;reserves the right to offer additional payment methods and/or remove existing payment methods at any time in its sole discretion. If you choose to pay using an online payment method, the payment shall be processed by our third party payment service provider(s). With your consent, your credit card / payment information will be stored with our third party payment service provider(s) for future orders. StackFood does not store your credit card or payment information. You must ensure that you have sufficient funds on your credit and debit card to fulfil payment of an Order. Insofar as required, StackFood takes responsibility for payments made on our Platforms including refunds, chargebacks, cancellations and dispute resolution, provided if reasonable and justifiable and in accordance with these Terms.</p>\r\n\r\n<h3>CANCELLATION</h3>\r\n\r\n<p>StackFood&nbsp;can cancel any order anytime due to the foods/products unavailability, out of coverage area and any other unavoidable circumstances.</p>', NULL, '2021-08-22 01:48:01'),
	(16, 'business_name', 'onnwheels', NULL, NULL),
	(17, 'currency', 'INR', NULL, NULL),
	(18, 'logo', '2024-05-02-6633571cb94fd.png', NULL, NULL),
	(19, 'phone', '9655804621', NULL, NULL),
	(20, 'email_address', 'admin@gmail.com', NULL, NULL),
	(21, 'address', 'test', NULL, NULL),
	(22, 'footer_text', 'onnwheels @ 2021', NULL, NULL),
	(23, 'customer_verification', '1', NULL, NULL),
	(24, 'map_api_key', 'AIzaSyCMxaJblkLSkT-va8n5q0QlmbygJn9G7yc', NULL, NULL),
	(25, 'about_us', '<p>Lorem <strong>ipsum </strong>dolor sit amet, <em><strong>consectetur </strong></em>adipiscing elit. <em>Cras </em>dictum massa et dolor porta, rhoncus faucibus magna elementum. Sed porta mattis mollis. Donec ut est pretium, pretium nibh porttitor, <a href="http://google.com">suscipit </a>metus. Sed viverra felis sed elit vehicula sodales. Nullam ante ante, tristique vel tincidunt ac, egestas eget sem. Sed lorem nunc, pellentesque vel ipsum venenatis, pellentesque interdum orci. Suspendisse mauris dui, accumsan at dapibus sed, volutpat quis erat. Nam fringilla nisl eu nunc lobortis, feugiat posuere libero venenatis. Nunc risus lorem, ornare eget congue in, pretium quis enim. Pellentesque elit elit, pharetra eget nunc at, maximus pellentesque diam.</p>\r\n\r\n<p>Praesent fermentum finibus lacus. Nulla tincidunt lectus sed purus facilisis hendrerit. Maecenas volutpat elementum orci, tincidunt euismod ante facilisis ac. Integer dignissim iaculis varius. Mauris iaculis elit vel posuere pellentesque. Praesent a mi sed neque ullamcorper dignissim sed ut nibh. Sed purus dui, sodales in varius in, accumsan at libero. Vestibulum posuere dui et orci tincidunt, ac consequat felis venenatis.</p>\r\n\r\n<p>Morbi sodales, nisl iaculis fringilla imperdiet, metus tortor semper quam, a fringilla nulla dui nec dolor. Phasellus lacinia aliquam ligula sed porttitor. Cras feugiat eros ut arcu commodo dictum. Integer tincidunt nisl id nisl consequat molestie. Integer elit tortor, ultrices sit amet nunc vitae, feugiat tempus mauris. Morbi volutpat consectetur felis sed porttitor. Praesent in urna erat.</p>\r\n\r\n<p>Aenean mollis luctus dolor, eu interdum velit faucibus eu. Suspendisse vitae efficitur erat. In facilisis nisi id arcu scelerisque bibendum. Nunc a placerat enim. Donec pharetra, velit quis facilisis tempus, lectus est imperdiet nisl, in tempus tortor dolor iaculis dolor. Nunc vitae molestie turpis. Nam vitae lobortis massa. Nam pharetra non felis in porta.</p>\r\n\r\n<p>Vivamus pulvinar diam vel felis dignissim tincidunt. Donec hendrerit non est sed volutpat. In egestas ex tortor, at convallis nunc porttitor at. Fusce sed cursus risus. Nam metus sapien, viverra eget felis id, maximus convallis lacus. Donec nec lacus vitae ex hendrerit ultricies non vel risus. Morbi malesuada ipsum iaculis augue convallis vehicula. Proin eget dolor dignissim, volutpat purus ac, ultricies risus. Pellentesque semper, mauris et pharetra accumsan, ante velit faucibus ex, a mattis metus odio vel ligula. Pellentesque elementum suscipit laoreet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer a turpis sed massa blandit iaculis. Sed aliquet, justo vestibulum euismod rhoncus, nisi dui fringilla sapien, non tempor nunc lectus vitae dolor. Suspendisse potenti.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dictum massa et dolor porta, rhoncus faucibus magna elementum. Sed porta mattis mollis. Donec ut est pretium, pretium nibh porttitor, suscipit metus. Sed viverra felis sed elit vehicula sodales. Nullam ante ante, tristique vel tincidunt ac, egestas eget sem. Sed lorem nunc, pellentesque vel ipsum venenatis, pellentesque interdum orci. Suspendisse mauris dui, accumsan at dapibus sed, volutpat quis erat. Nam fringilla nisl eu nunc lobortis, feugiat posuere libero venenatis. Nunc risus lorem, ornare eget congue in, pretium quis enim. Pellentesque elit elit, pharetra eget nunc at, maximus pellentesque diam.</p>\r\n\r\n<p>Praesent fermentum finibus lacus. Nulla tincidunt lectus sed purus facilisis hendrerit. Maecenas volutpat elementum orci, tincidunt euismod ante facilisis ac. Integer dignissim iaculis varius. Mauris iaculis elit vel posuere pellentesque. Praesent a mi sed neque ullamcorper dignissim sed ut nibh. Sed purus dui, sodales in varius in, accumsan at libero. Vestibulum posuere dui et orci tincidunt, ac consequat felis venenatis.</p>\r\n\r\n<p>Morbi sodales, nisl iaculis fringilla imperdiet, metus tortor semper quam, a fringilla nulla dui nec dolor. Phasellus lacinia aliquam ligula sed porttitor. Cras feugiat eros ut arcu commodo dictum. Integer tincidunt nisl id nisl consequat molestie. Integer elit tortor, ultrices sit amet nunc vitae, feugiat tempus mauris. Morbi volutpat consectetur felis sed porttitor. Praesent in urna erat.</p>\r\n\r\n<p>Aenean mollis luctus dolor, eu interdum velit faucibus eu. Suspendisse vitae efficitur erat. In facilisis nisi id arcu scelerisque bibendum. Nunc a placerat enim. Donec pharetra, velit quis facilisis tempus, lectus est imperdiet nisl, in tempus tortor dolor iaculis dolor. Nunc vitae molestie turpis. Nam vitae lobortis massa. Nam pharetra non felis in porta.</p>\r\n\r\n<p>Vivamus pulvinar diam vel felis dignissim tincidunt. Donec hendrerit non est sed volutpat. In egestas ex tortor, at convallis nunc porttitor at. Fusce sed cursus risus. Nam metus sapien, viverra eget felis id, maximus convallis lacus. Donec nec lacus vitae ex hendrerit ultricies non vel risus. Morbi malesuada ipsum iaculis augue convallis vehicula. Proin eget dolor dignissim, volutpat purus ac, ultricies risus. Pellentesque semper, mauris et pharetra accumsan, ante velit faucibus ex, a mattis metus odio vel ligula. Pellentesque elementum suscipit laoreet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer a turpis sed massa blandit iaculis. Sed aliquet, justo vestibulum euismod rhoncus, nisi dui fringilla sapien, non tempor nunc lectus vitae dolor. Suspendisse potenti.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dictum massa et dolor porta, rhoncus faucibus magna elementum. Sed porta mattis mollis. Donec ut est pretium, pretium nibh porttitor, suscipit metus. Sed viverra felis sed elit vehicula sodales. Nullam ante ante, tristique vel tincidunt ac, egestas eget sem. Sed lorem nunc, pellentesque vel ipsum venenatis, pellentesque interdum orci. Suspendisse mauris dui, accumsan at dapibus sed, volutpat quis erat. Nam fringilla nisl eu nunc lobortis, feugiat posuere libero venenatis. Nunc risus lorem, ornare eget congue in, pretium quis enim. Pellentesque elit elit, pharetra eget nunc at, maximus pellentesque diam.</p>\r\n\r\n<p>Praesent fermentum finibus lacus. Nulla tincidunt lectus sed purus facilisis hendrerit. Maecenas volutpat elementum orci, tincidunt euismod ante facilisis ac. Integer dignissim iaculis varius. Mauris iaculis elit vel posuere pellentesque. Praesent a mi sed neque ullamcorper dignissim sed ut nibh. Sed purus dui, sodales in varius in, accumsan at libero. Vestibulum posuere dui et orci tincidunt, ac consequat felis venenatis.</p>\r\n\r\n<p>Morbi sodales, nisl iaculis fringilla imperdiet, metus tortor semper quam, a fringilla nulla dui nec dolor. Phasellus lacinia aliquam ligula sed porttitor. Cras feugiat eros ut arcu commodo dictum. Integer tincidunt nisl id nisl consequat molestie. Integer elit tortor, ultrices sit amet nunc vitae, feugiat tempus mauris. Morbi volutpat consectetur felis sed porttitor. Praesent in urna erat.</p>\r\n\r\n<p>Aenean mollis luctus dolor, eu interdum velit faucibus eu. Suspendisse vitae efficitur erat. In facilisis nisi id arcu scelerisque bibendum. Nunc a placerat enim. Donec pharetra, velit quis facilisis tempus, lectus est imperdiet nisl, in tempus tortor dolor iaculis dolor. Nunc vitae molestie turpis. Nam vitae lobortis massa. Nam pharetra non felis in porta.</p>\r\n\r\n<p>Vivamus pulvinar diam vel felis dignissim tincidunt. Donec hendrerit non est sed volutpat. In egestas ex tortor, at convallis nunc porttitor at. Fusce sed cursus risus. Nam metus sapien, viverra eget felis id, maximus convallis lacus. Donec nec lacus vitae ex hendrerit ultricies non vel risus. Morbi malesuada ipsum iaculis augue convallis vehicula. Proin eget dolor dignissim, volutpat purus ac, ultricies risus. Pellentesque semper, mauris et pharetra accumsan, ante velit faucibus ex, a mattis metus odio vel ligula. Pellentesque elementum suscipit laoreet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer a turpis sed massa blandit iaculis. Sed aliquet, justo vestibulum euismod rhoncus, nisi dui fringilla sapien, non tempor nunc lectus vitae dolor. Suspendisse potenti.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dictum massa et dolor porta, rhoncus faucibus magna elementum. Sed porta mattis mollis. Donec ut est pretium, pretium nibh porttitor, suscipit metus. Sed viverra felis sed elit vehicula sodales. Nullam ante ante, tristique vel tincidunt ac, egestas eget sem. Sed lorem nunc, pellentesque vel ipsum venenatis, pellentesque interdum orci. Suspendisse mauris dui, accumsan at dapibus sed, volutpat quis erat. Nam fringilla nisl eu nunc lobortis, feugiat posuere libero venenatis. Nunc risus lorem, ornare eget congue in, pretium quis enim. Pellentesque elit elit, pharetra eget nunc at, maximus pellentesque diam.</p>\r\n\r\n<p>Praesent fermentum finibus lacus. Nulla tincidunt lectus sed purus facilisis hendrerit. Maecenas volutpat elementum orci, tincidunt euismod ante facilisis ac. Integer dignissim iaculis varius. Mauris iaculis elit vel posuere pellentesque. Praesent a mi sed neque ullamcorper dignissim sed ut nibh. Sed purus dui, sodales in varius in, accumsan at libero. Vestibulum posuere dui et orci tincidunt, ac consequat felis venenatis.</p>\r\n\r\n<p>Morbi sodales, nisl iaculis fringilla imperdiet, metus tortor semper quam, a fringilla nulla dui nec dolor. Phasellus lacinia aliquam ligula sed porttitor. Cras feugiat eros ut arcu commodo dictum. Integer tincidunt nisl id nisl consequat molestie. Integer elit tortor, ultrices sit amet nunc vitae, feugiat tempus mauris. Morbi volutpat consectetur felis sed porttitor. Praesent in urna erat.</p>\r\n\r\n<p>Aenean mollis luctus dolor, eu interdum velit faucibus eu. Suspendisse vitae efficitur erat. In facilisis nisi id arcu scelerisque bibendum. Nunc a placerat enim. Donec pharetra, velit quis facilisis tempus, lectus est imperdiet nisl, in tempus tortor dolor iaculis dolor. Nunc vitae molestie turpis. Nam vitae lobortis massa. Nam pharetra non felis in porta.</p>\r\n\r\n<p>Vivamus pulvinar diam vel felis dignissim tincidunt. Donec hendrerit non est sed volutpat. In egestas ex tortor, at convallis nunc porttitor at. Fusce sed cursus risus. Nam metus sapien, viverra eget felis id, maximus convallis lacus. Donec nec lacus vitae ex hendrerit ultricies non vel risus. Morbi malesuada ipsum iaculis augue convallis vehicula. Proin eget dolor dignissim, volutpat purus ac, ultricies risus. Pellentesque semper, mauris et pharetra accumsan, ante velit faucibus ex, a mattis metus odio vel ligula. Pellentesque elementum suscipit laoreet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer a turpis sed massa blandit iaculis. Sed aliquet, justo vestibulum euismod rhoncus, nisi dui fringilla sapien, non tempor nunc lectus vitae dolor. Suspendisse potenti.</p>', NULL, '2021-07-28 07:09:19'),
	(26, 'privacy_policy', '<h2>This is a Demo Privacy Policy</h2>\r\n\r\n<p>This policy explains how StackFood&nbsp;website and related applications (the &ldquo;Site&rdquo;, &ldquo;we&rdquo; or &ldquo;us&rdquo;) collects, uses, shares and protects the personal information that we collect through this site or different channels. StackFood has established the site to link up the users who need foods or grocery items to be shipped or delivered by the riders from the affiliated restaurants or shops to the desired location. This policy also applies to any mobile applications that we develop for use with our services on the Site, and references to this &ldquo;Site&rdquo;, &ldquo;we&rdquo; or &ldquo;us&rdquo; is intended to also include these mobile applications. Please read below to learn more about our information policies. By using this Site, you agree to these policies.</p>\r\n\r\n<h2>How the Information is collected</h2>\r\n\r\n<h3>Information provided by web browser</h3>\r\n\r\n<p>You have to provide us with personal information like your name, contact no, mailing address and email id, our app will also fetch your location information in order to give you the best service. Like many other websites, we may record information that your web browser routinely shares, such as your browser type, browser language, software and hardware attributes, the date and time of your visit, the web page from which you came, your Internet Protocol address and the geographic location associated with that address, the pages on this Site that you visit and the time you spent on those pages. This will generally be anonymous data that we collect on an aggregate basis.</p>\r\n\r\n<h3>Personal Information that you provide</h3>\r\n\r\n<p>If you want to use our service, you must create an account on our Site. To establish your account, we will ask for personally identifiable information that can be used to contact or identify you, which may include your name, phone number, and e-mail address. We may also collect demographic information about you, such as your zip code, and allow you to submit additional information that will be part of your profile. Other than basic information that we need to establish your account, it will be up to you to decide how much information to share as part of your profile. We encourage you to think carefully about the information that you share and we recommend that you guard your identity and your sensitive information. Of course, you can review and revise your profile at any time.</p>\r\n\r\n<h3>Payment Information</h3>\r\n\r\n<p>To make the payment online for availing our services, you have to provide the bank account, mobile financial service (MFS), debit card, credit card information to the StackFood platform.</p>\r\n\r\n<h2>How the Information is collected</h2>\r\n\r\n<h3>Session and Persistent Cookies</h3>\r\n\r\n<p>Cookies are small text files that are placed on your computer by websites that you visit. They are widely used in order to make websites work, or work more efficiently, as well as to provide information to the owners of the site. As is commonly done on websites, we may use cookies and similar technology to keep track of our users and the services they have elected. We use both &ldquo;session&rdquo; and &ldquo;persistent&rdquo; cookies. Session cookies are deleted after you leave our website and when you close your browser. We use data collected with session cookies to enable certain features on our Site, to help us understand how users interact with our Site, and to monitor at an aggregate level Site usage and web traffic routing. We may allow business partners who provide services to our Site to place cookies on your computer that assist us in analyzing usage data. We do not allow these business partners to collect your personal information from our website except as may be necessary for the services that they provide.</p>\r\n\r\n<h3>Web Beacons</h3>\r\n\r\n<p>We may also use web beacons or similar technology to help us track the effectiveness of our communications.</p>\r\n\r\n<h3>Advertising Cookies</h3>\r\n\r\n<p>We may use third parties, such as Google, to serve ads about our website over the internet. These third parties may use cookies to identify ads that may be relevant to your interest (for example, based on your recent visit to our website), to limit the number of times that you see an ad, and to measure the effectiveness of the ads.</p>\r\n\r\n<h3>Google Analytics</h3>\r\n\r\n<p>We may also use Google Analytics or a similar service to gather statistical information about the visitors to this Site and how they use the Site. This, also, is done on an anonymous basis. We will not try to associate anonymous data with your personally identifiable data. If you would like to learn more about Google Analytics, please click here.</p>', NULL, '2021-08-22 01:49:58'),
	(27, 'minimum_shipping_charge', '10', NULL, NULL),
	(28, 'per_km_shipping_charge', '2', NULL, NULL),
	(29, 'digital_payment', '{"status":"1"}', '2021-07-01 14:27:38', '2024-05-01 18:47:14'),
	(30, 'ssl_commerz_payment', '{"status":"0","store_id":null,"store_password":null}', '2021-07-04 15:41:24', '2022-03-23 04:21:28'),
	(31, 'razor_pay', '{"status":"0","razor_key":null,"razor_secret":null}', '2021-07-04 15:41:28', '2022-03-23 04:21:38'),
	(32, 'paypal', '{"status":"0","paypal_client_id":null,"paypal_secret":null}', '2021-07-04 15:41:34', '2022-03-23 04:21:49'),
	(33, 'paystack', '{"status":"0","publicKey":null,"secretKey":null,"paymentUrl":null,"merchantEmail":null}', '2021-07-04 15:41:42', '2022-03-23 04:22:15'),
	(34, 'senang_pay', '{"status":"1","secret_key":null,"published_key":null,"merchant_id":null}', '2021-07-04 15:41:48', '2022-03-23 04:22:25'),
	(35, 'order_handover_message', '{"status":1,"message":"Delivery man is on the way"}', NULL, NULL),
	(36, 'order_cancled_message', '{"status":1,"message":"Order is canceled by your request"}', NULL, NULL),
	(37, 'timezone', 'Asia/Calcutta', NULL, NULL),
	(38, 'order_delivery_verification', NULL, NULL, NULL),
	(39, 'currency_symbol_position', 'left', NULL, NULL),
	(40, 'schedule_order', NULL, NULL, NULL),
	(41, 'app_minimum_version', '0', NULL, NULL),
	(42, 'tax', NULL, NULL, NULL),
	(43, 'admin_commission', '10', NULL, NULL),
	(44, 'country', 'IN', NULL, NULL),
	(45, 'app_url', 'https://www.google.com', NULL, NULL),
	(46, 'default_location', '{"lat":"11.005630705394983","lng":"76.99195165092134"}', NULL, NULL),
	(47, 'twilio_sms', '{"status":"0","sid":null,"messaging_service_id":null,"token":null,"from":null,"otp_template":"Your otp is #OTP#."}', '2022-03-23 15:16:08', '2022-03-23 15:16:08'),
	(48, 'nexmo_sms', '{"status":"0","api_key":null,"api_secret":null,"signature_secret":"","private_key":"","application_id":"","from":null,"otp_template":"Your otp is #OTP#."}', '2022-03-23 15:16:18', '2022-03-23 15:16:18'),
	(49, '2factor_sms', '{"status":"0","api_key":null}', '2022-03-23 15:16:26', '2022-03-23 15:16:26'),
	(50, 'msg91_sms', '{"status":"0","template_id":null,"authkey":null}', '2022-03-23 15:16:33', '2022-03-23 15:16:33'),
	(51, 'free_delivery_over', NULL, NULL, NULL),
	(52, 'maintenance_mode', '0', '2021-09-08 15:44:28', '2021-09-08 15:44:28'),
	(53, 'app_minimum_version_ios', NULL, '2021-09-21 22:54:10', '2021-09-21 22:54:10'),
	(54, 'app_minimum_version_android', NULL, '2021-09-21 22:54:10', '2021-09-21 22:54:10'),
	(55, 'app_url_ios', NULL, '2021-09-21 22:54:10', '2021-09-21 22:54:10'),
	(56, 'app_url_android', NULL, '2021-09-21 22:54:10', '2021-09-21 22:54:10'),
	(57, 'flutterwave', '{"status":1,"public_key":"FLWPUBK_TEST-3f6a0b6c3d621c4ecbb9beeff516c92b-X","secret_key":"FLWSECK_TEST-ec27426eb062491500a9eb95723b5436-X","hash":"FLWSECK_TEST951e36220f66"}', '2021-09-21 22:54:10', '2021-09-21 22:54:10'),
	(58, 'dm_maximum_orders', '2', '2021-09-24 17:46:13', '2021-09-24 17:46:13'),
	(59, 'order_confirmation_model', 'deliveryman', '2021-10-17 00:05:08', '2021-10-17 00:05:08'),
	(60, 'popular_food', '1', '2021-10-17 00:05:08', '2021-10-17 00:05:08'),
	(61, 'popular_restaurant', '1', '2021-10-17 00:05:08', '2021-10-17 00:05:08'),
	(62, 'new_restaurant', '1', '2021-10-17 00:05:08', '2021-10-17 00:05:08'),
	(63, 'mercadopago', '{"status":1,"public_key":"","access_token":""}', '2021-10-17 00:05:08', '2021-10-17 00:05:08'),
	(64, 'map_api_key_server', 'AIzaSyCMxaJblkLSkT-va8n5q0QlmbygJn9G7yc', NULL, NULL),
	(66, 'most_reviewed_foods', '1', '2021-11-15 15:55:37', '2021-11-15 15:55:37'),
	(67, 'landing_page_text', '{"header_title_1":"Food App","header_title_2":"Why stay hungry when you can order from StackFood","header_title_3":"Get 10% OFF on your first order","about_title":"StackFood is Best Delivery Service Near You","why_choose_us":"Why Choose Us?","why_choose_us_title":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","testimonial_title":"Trusted by Customer & Restaurant Owner","footer_article":"Suspendisse ultrices at diam lectus nullam. Nisl, sagittis viverra enim erat tortor ultricies massa turpis. Arcu pulvinar."}', '2021-11-15 15:55:37', '2021-11-15 15:55:37'),
	(68, 'landing_page_links', '{"app_url_android_status":"1","app_url_android":"https:\\/\\/play.google.com","app_url_ios_status":"1","app_url_ios":"https:\\/\\/www.apple.com\\/app-store","web_app_url_status":"1","web_app_url":"https:\\/\\/stackfood.6amtech.com\\/"}', '2021-11-15 15:55:37', '2021-11-15 15:55:37'),
	(69, 'speciality', '[{"img":"clean_&_cheap_icon.png","title":"Clean & Cheap Price"},{"img":"best_dishes_icon.png","title":"Best Dishes Near You"},{"img":"virtual_restaurant_icon.png","title":"Your Own Virtual Restaurant"}]', '2021-11-15 15:55:37', '2021-11-15 15:55:37'),
	(70, 'testimonial', '[{"img":"img-1.png","name":"Barry Allen","position":"Web Designer","detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit. A\\r\\n                    aliquam amet animi blanditiis consequatur debitis dicta\\r\\n                    distinctio, enim error eum iste libero modi nam natus\\r\\n                    perferendis possimus quasi sint sit tempora voluptatem. Est,\\r\\n                    exercitationem id ipsa ipsum laboriosam perferendis temporibus!"},{"img":"img-2.png","name":"Sophia Martino","position":"Web Designer","detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam amet animi blanditiis consequatur debitis dicta distinctio, enim error eum iste libero modi nam natus perferendis possimus quasi sint sit tempora voluptatem. Est, exercitationem id ipsa ipsum laboriosam perferendis temporibus!"},{"img":"img-3.png","name":"Alan Turing","position":"Web Designer","detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam amet animi blanditiis consequatur debitis dicta distinctio, enim error eum iste libero modi nam natus perferendis possimus quasi sint sit tempora voluptatem. Est, exercitationem id ipsa ipsum laboriosam perferendis temporibus!"},{"img":"img-4.png","name":"Ann Marie","position":"Web Designer","detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam amet animi blanditiis consequatur debitis dicta distinctio, enim error eum iste libero modi nam natus perferendis possimus quasi sint sit tempora voluptatem. Est, exercitationem id ipsa ipsum laboriosam perferendis temporibus!"}]', '2021-11-15 15:55:37', '2021-11-15 15:55:37'),
	(71, 'landing_page_images', '{"top_content_image":"double_screen_image.png","about_us_image":"about_us_image.png"}', '2021-11-15 15:55:37', '2021-11-15 15:55:37'),
	(72, 'paymob_accept', '{"status":"0","api_key":null,"iframe_id":null,"integration_id":null,"hmac":null}', '2021-11-15 15:55:37', '2021-11-15 15:55:37'),
	(73, 'admin_order_notification', '1', NULL, NULL),
	(74, 'swish_payment', '{"status":"1"}', NULL, '2021-12-28 12:02:40'),
	(76, 'service_charge', '12', NULL, NULL),
	(77, 'social_login', '[{"login_medium":"google","client_id":"sad","client_secret":"sadsad","status":"1"},{"login_medium":"facebook","client_id":null,"client_secret":null,"status":"0"}]', NULL, '2024-05-05 20:36:22'),
	(78, 'language', '["en"]', NULL, NULL),
	(79, 'timeformat', '12', NULL, NULL),
	(80, 'canceled_by_restaurant', '0', NULL, NULL),
	(81, 'canceled_by_deliveryman', '0', NULL, NULL),
	(82, 'show_dm_earning', NULL, NULL, NULL),
	(83, 'recaptcha', '{"status":"1","site_key":null,"secret_key":null}', '2022-03-23 15:17:39', '2022-03-23 15:17:39'),
	(84, 'toggle_veg_non_veg', NULL, NULL, NULL),
	(85, 'toggle_dm_registration', '1', NULL, NULL),
	(86, 'toggle_restaurant_registration', '1', NULL, NULL),
	(87, 'order_refunded_message', '{"status":1,"message":"Order is refunded successfully"}', NULL, NULL),
	(88, 'liqpay', '{"status":"1","public_key":null,"private_key":null}', NULL, '2022-02-27 05:15:40'),
	(89, 'klarna', '{"status":"1","region":"america","username":"PN06804_1a368db08f6d","password":"6ljrP6BDJNKT6F2y"}', NULL, '2022-01-26 08:30:51'),
	(90, 'fatoorah', '{"status":"1","api_key":"rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL"}', NULL, '2022-02-20 11:05:26'),
	(91, 'bkash', '{"status":"1","api_key":"5tunt4masn6pv2hnvte1sb5n3j","api_secret":"1vggbqd4hqk9g96o9rrrp2jftvek578v7d2bnerim12a87dbrrka","username":"sandboxTestUser","password":"hWD@8vtzw0"}', NULL, '2022-02-27 04:37:26'),
	(92, 'paytabs', '{"status":"1","profile_id":null,"server_key":null,"base_url":null}', NULL, '2022-02-27 06:06:19'),
	(93, 'paytm', '{"status":"1","paytm_merchant_key":null,"paytm_merchant_mid":null,"paytm_merchant_website":null,"paytm_refund_url":null}', NULL, '2022-02-27 06:06:37'),
	(94, 'schedule_order_slot_duration', NULL, NULL, NULL),
	(95, 'digit_after_decimal_point', '0', NULL, NULL),
	(96, 'icon', '2024-05-02-6633571cbaf7f.png', NULL, NULL),
	(97, 'toggle_store_registration', '1', NULL, NULL),
	(98, 'canceled_by_store', '0', NULL, NULL),
	(99, 'parcel_per_km_shipping_charge', '0', NULL, NULL),
	(100, 'parcel_minimum_shipping_charge', '0', NULL, NULL),
	(101, 'parcel_commission_dm', '0', NULL, NULL),
	(102, 'landing_page_links', '{"app_url_android_status":"1","app_url_android":"https:\\/\\/play.google.com","app_url_ios_status":"1","app_url_ios":"https:\\/\\/www.apple.com\\/app-store","web_app_url_status":"1","web_app_url":"https:\\/\\/stackfood.6amtech.com\\/"}', NULL, NULL),
	(103, 'wallet_status', '0', '2022-07-05 03:26:19', '2022-07-05 03:26:19'),
	(104, 'loyalty_point_status', '0', '2022-07-05 03:26:19', '2022-07-05 03:26:19'),
	(105, 'ref_earning_status', '0', '2022-07-05 03:26:19', '2022-07-05 03:26:19'),
	(106, 'wallet_add_refund', '0', '2022-07-05 03:26:19', '2022-07-05 03:26:19'),
	(107, 'loyalty_point_exchange_rate', '0', '2022-07-05 03:26:20', '2022-07-05 03:26:20'),
	(108, 'ref_earning_exchange_rate', '0', '2022-07-05 03:26:20', '2022-07-05 03:26:20'),
	(109, 'loyalty_point_item_purchase_point', '0', '2022-07-05 03:26:20', '2022-07-05 03:26:20'),
	(110, 'loyalty_point_minimum_point', '0', '2022-07-05 03:26:20', '2022-07-05 03:26:20'),
	(111, 'refund_active_status', '0', '2022-07-05 03:26:20', '2022-07-05 03:26:20'),
	(112, 'dm_tips_status', NULL, '2022-07-05 03:26:20', '2022-07-05 03:26:20'),
	(113, 'system_language', '[{"id":1,"direction":"ltr","code":"en","status":1,"default":true}]', '2023-08-15 23:29:41', '2023-08-15 23:29:41'),
	(114, 'site_direction', NULL, NULL, NULL),
	(115, 'cookies_text', 'Demo cookie text', NULL, NULL),
	(116, 'tax_included', '1', NULL, NULL),
	(117, 'partial_payment_status', NULL, NULL, NULL),
	(118, 'partial_payment_method', 'digital_payment', NULL, NULL),
	(119, 'order_notification_type', 'manual', NULL, NULL),
	(120, 'free_delivery_over_status', NULL, NULL, NULL),
	(121, 'additional_charge_status', NULL, NULL, NULL),
	(122, 'additional_charge_name', 'Additional Charge', NULL, NULL),
	(123, 'additional_charge', NULL, NULL, NULL),
	(124, 'prescription_order_status', NULL, NULL, NULL),
	(125, 'delivery_charge_comission', '0', NULL, NULL),
	(126, 'opening_time', NULL, NULL, NULL),
	(127, 'closing_time', NULL, NULL, NULL),
	(128, 'landing_page', '1', '2023-08-15 23:56:24', '2023-08-15 23:56:24'),
	(129, 'landing_integration_type', 'file_upload', '2023-08-15 23:56:24', '2023-08-15 23:56:24'),
	(130, 'mobile_app_section_heading', 'Download the App for Enjoy Best Restaurant Test', '2023-08-17 00:26:56', '2023-08-17 00:26:56'),
	(131, 'mobile_app_section_text', 'Default Text Mobile App Section', '2023-08-17 00:26:56', '2023-08-17 00:26:56'),
	(132, 'feature_section_description', 'Feature section description', '2023-08-17 00:26:56', '2023-08-17 00:26:56'),
	(133, 'Feature section description', '{"app_url_android_status":"0","app_url_android":"https:\\/\\/play.google.com","app_url_ios_status":"0","app_url_ios":"https:\\/\\/www.apple.com\\/app-store","web_app_url_status":"0","web_app_url":"https:\\/\\/6ammart-web.6amtech.com\\/"}', '2023-08-17 00:26:56', '2023-08-17 00:26:56'),
	(134, 'home_delivery_status', '1', '2023-08-17 00:26:56', '2023-08-17 00:26:56'),
	(135, 'takeaway_status', '1', '2023-08-17 00:26:56', '2023-08-17 00:26:56'),
	(136, 'dm_picture_upload_status', '1', NULL, NULL),
	(137, 'offline_payment_status', NULL, NULL, '2023-10-16 20:16:58'),
	(138, 'apple_login', '[{"login_medium":"apple","client_id":"","client_secret":"","team_id":"","key_id":"","service_file":"","redirect_url":"","status":""}]', '2024-05-01 18:30:55', '2024-05-01 18:30:55'),
	(139, 'guest_checkout_status', '0', NULL, NULL),
	(140, 'backgroundChange', '{"primary_1_hex":"#003361","primary_1_rgb":"0, 51, 97","primary_2_hex":"#333e4f","primary_2_rgb":"51, 62, 79"}', NULL, NULL),
	(141, 'kycconfig', '{"prod_url":"https:\\/\\/api.eko.in:25002\\/ekoicici","developer_key":"793db230ef4ac2eb691e3087f73fe749","secret_key":"y4k0KzCD1cCfUNnOqz7WsshrduUZC51YH61sxj8zxdM","secret_key_timestamp":"1704791808198","initiator_id":"7708080885","customer_id":null,"authenticator_key":null,"user_code":"34870001"}', '2024-05-06 23:57:05', '2024-05-06 23:57:05');

-- Dumping structure for table test.campaigns
CREATE TABLE IF NOT EXISTS `campaigns` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `admin_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `module_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `campaigns_module_id_foreign` (`module_id`),
  CONSTRAINT `campaigns_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.campaigns: ~0 rows (approximately)

-- Dumping structure for table test.campaign_store
CREATE TABLE IF NOT EXISTS `campaign_store` (
  `campaign_id` bigint unsigned NOT NULL,
  `store_id` bigint unsigned NOT NULL,
  `campaign_status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.campaign_store: ~0 rows (approximately)

-- Dumping structure for table test.carts
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `module_id` bigint unsigned NOT NULL,
  `item_id` bigint unsigned NOT NULL,
  `is_guest` tinyint(1) NOT NULL DEFAULT '0',
  `add_on_ids` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `add_on_qtys` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `item_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(24,3) NOT NULL,
  `quantity` int NOT NULL,
  `variation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.carts: ~0 rows (approximately)

-- Dumping structure for table test.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def.png',
  `parent_id` int NOT NULL,
  `position` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `priority` int NOT NULL DEFAULT '0',
  `module_id` bigint unsigned NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `categories_module_id_foreign` (`module_id`),
  CONSTRAINT `categories_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.categories: ~6 rows (approximately)
INSERT INTO `categories` (`id`, `name`, `image`, `parent_id`, `position`, `status`, `created_at`, `updated_at`, `priority`, `module_id`, `slug`, `featured`) VALUES
	(5, 'Best Rental Bike', '2024-05-22-664d86116fec1.png', 0, 0, 1, '2024-05-02 22:19:12', '2024-05-21 19:13:45', 0, 1, 'best-rental-bike', 1),
	(6, 'Best Milage Bike', '2024-05-22-664d8600ba216.png', 0, 0, 1, '2024-05-02 22:19:46', '2024-05-21 19:13:28', 0, 1, 'best-milage-bike', 1),
	(7, 'Sport Bike', '2024-05-22-664d85eed23dc.png', 0, 0, 1, '2024-05-02 22:20:45', '2024-05-21 19:13:10', 0, 1, 'sport-bike', 1),
	(8, 'Scooty', '2024-05-22-664d85de8d66a.png', 0, 0, 1, '2024-05-02 22:21:30', '2024-05-21 19:12:54', 0, 1, 'scooty', 1),
	(9, 'Honda', '2024-05-22-664d85ce8f046.png', 0, 0, 1, '2024-05-03 00:30:29', '2024-05-21 19:12:38', 0, 1, 'honda', 1),
	(10, 'Hero', '2024-05-22-664d85ba769b6.png', 0, 0, 1, '2024-05-03 00:30:55', '2024-05-29 22:51:11', 0, 1, 'hero', 1);

-- Dumping structure for table test.common_conditions
CREATE TABLE IF NOT EXISTS `common_conditions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.common_conditions: ~0 rows (approximately)

-- Dumping structure for table test.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen` tinyint NOT NULL DEFAULT '0',
  `feedback` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `reply` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.contacts: ~0 rows (approximately)

-- Dumping structure for table test.conversations
CREATE TABLE IF NOT EXISTS `conversations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` bigint unsigned NOT NULL,
  `sender_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_id` bigint unsigned NOT NULL,
  `receiver_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_message_id` bigint unsigned DEFAULT NULL,
  `last_message_time` timestamp NULL DEFAULT NULL,
  `unread_message_count` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.conversations: ~0 rows (approximately)

-- Dumping structure for table test.coupons
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `min_purchase` decimal(24,2) NOT NULL DEFAULT '0.00',
  `max_discount` decimal(24,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(24,2) NOT NULL DEFAULT '0.00',
  `discount_type` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percentage',
  `coupon_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `limit` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `data` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_uses` bigint DEFAULT '0',
  `module_id` bigint unsigned NOT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'admin',
  `customer_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '["all"]',
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `coupons_code_unique` (`code`),
  KEY `coupons_module_id_foreign` (`module_id`),
  CONSTRAINT `coupons_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.coupons: ~0 rows (approximately)

-- Dumping structure for table test.currencies
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchange_rate` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.currencies: ~119 rows (approximately)
INSERT INTO `currencies` (`id`, `country`, `currency_code`, `currency_symbol`, `exchange_rate`, `created_at`, `updated_at`) VALUES
	(1, 'US Dollar', 'USD', '$', 1.00, NULL, NULL),
	(2, 'Canadian Dollar', 'CAD', 'CA$', 1.00, NULL, NULL),
	(3, 'Euro', 'EUR', '€', 1.00, NULL, NULL),
	(4, 'United Arab Emirates Dirham', 'AED', 'د.إ.‏', 1.00, NULL, NULL),
	(5, 'Afghan Afghani', 'AFN', '؋', 1.00, NULL, NULL),
	(6, 'Albanian Lek', 'ALL', 'L', 1.00, NULL, NULL),
	(7, 'Armenian Dram', 'AMD', '֏', 1.00, NULL, NULL),
	(8, 'Argentine Peso', 'ARS', '$', 1.00, NULL, NULL),
	(9, 'Australian Dollar', 'AUD', '$', 1.00, NULL, NULL),
	(10, 'Azerbaijani Manat', 'AZN', '₼', 1.00, NULL, NULL),
	(11, 'Bosnia-Herzegovina Convertible Mark', 'BAM', 'KM', 1.00, NULL, NULL),
	(12, 'Bangladeshi Taka', 'BDT', '৳', 1.00, NULL, NULL),
	(13, 'Bulgarian Lev', 'BGN', 'лв.', 1.00, NULL, NULL),
	(14, 'Bahraini Dinar', 'BHD', 'د.ب.‏', 1.00, NULL, NULL),
	(15, 'Burundian Franc', 'BIF', 'FBu', 1.00, NULL, NULL),
	(16, 'Brunei Dollar', 'BND', 'B$', 1.00, NULL, NULL),
	(17, 'Bolivian Boliviano', 'BOB', 'Bs', 1.00, NULL, NULL),
	(18, 'Brazilian Real', 'BRL', 'R$', 1.00, NULL, NULL),
	(19, 'Botswanan Pula', 'BWP', 'P', 1.00, NULL, NULL),
	(20, 'Belarusian Ruble', 'BYN', 'Br', 1.00, NULL, NULL),
	(21, 'Belize Dollar', 'BZD', '$', 1.00, NULL, NULL),
	(22, 'Congolese Franc', 'CDF', 'FC', 1.00, NULL, NULL),
	(23, 'Swiss Franc', 'CHF', 'CHf', 1.00, NULL, NULL),
	(24, 'Chilean Peso', 'CLP', '$', 1.00, NULL, NULL),
	(25, 'Chinese Yuan', 'CNY', '¥', 1.00, NULL, NULL),
	(26, 'Colombian Peso', 'COP', '$', 1.00, NULL, NULL),
	(27, 'Costa Rican Colón', 'CRC', '₡', 1.00, NULL, NULL),
	(28, 'Cape Verdean Escudo', 'CVE', '$', 1.00, NULL, NULL),
	(29, 'Czech Republic Koruna', 'CZK', 'Kč', 1.00, NULL, NULL),
	(30, 'Djiboutian Franc', 'DJF', 'Fdj', 1.00, NULL, NULL),
	(31, 'Danish Krone', 'DKK', 'Kr.', 1.00, NULL, NULL),
	(32, 'Dominican Peso', 'DOP', 'RD$', 1.00, NULL, NULL),
	(33, 'Algerian Dinar', 'DZD', 'د.ج.‏', 1.00, NULL, NULL),
	(34, 'Estonian Kroon', 'EEK', 'kr', 1.00, NULL, NULL),
	(35, 'Egyptian Pound', 'EGP', 'E£‏', 1.00, NULL, NULL),
	(36, 'Eritrean Nakfa', 'ERN', 'Nfk', 1.00, NULL, NULL),
	(37, 'Ethiopian Birr', 'ETB', 'Br', 1.00, NULL, NULL),
	(38, 'British Pound Sterling', 'GBP', '£', 1.00, NULL, NULL),
	(39, 'Georgian Lari', 'GEL', 'GEL', 1.00, NULL, NULL),
	(40, 'Ghanaian Cedi', 'GHS', 'GH¢', 1.00, NULL, NULL),
	(41, 'Guinean Franc', 'GNF', 'FG', 1.00, NULL, NULL),
	(42, 'Guatemalan Quetzal', 'GTQ', 'Q', 1.00, NULL, NULL),
	(43, 'Hong Kong Dollar', 'HKD', 'HK$', 1.00, NULL, NULL),
	(44, 'Honduran Lempira', 'HNL', 'L', 1.00, NULL, NULL),
	(45, 'Croatian Kuna', 'HRK', 'kn', 1.00, NULL, NULL),
	(46, 'Hungarian Forint', 'HUF', 'Ft', 1.00, NULL, NULL),
	(47, 'Indonesian Rupiah', 'IDR', 'Rp', 1.00, NULL, NULL),
	(48, 'Israeli New Sheqel', 'ILS', '₪', 1.00, NULL, NULL),
	(49, 'Indian Rupee', 'INR', '₹', 1.00, NULL, NULL),
	(50, 'Iraqi Dinar', 'IQD', 'ع.د', 1.00, NULL, NULL),
	(51, 'Iranian Rial', 'IRR', '﷼', 1.00, NULL, NULL),
	(52, 'Icelandic Króna', 'ISK', 'kr', 1.00, NULL, NULL),
	(53, 'Jamaican Dollar', 'JMD', '$', 1.00, NULL, NULL),
	(54, 'Jordanian Dinar', 'JOD', 'د.ا‏', 1.00, NULL, NULL),
	(55, 'Japanese Yen', 'JPY', '¥', 1.00, NULL, NULL),
	(56, 'Kenyan Shilling', 'KES', 'Ksh', 1.00, NULL, NULL),
	(57, 'Cambodian Riel', 'KHR', '៛', 1.00, NULL, NULL),
	(58, 'Comorian Franc', 'KMF', 'FC', 1.00, NULL, NULL),
	(59, 'South Korean Won', 'KRW', 'CF', 1.00, NULL, NULL),
	(60, 'Kuwaiti Dinar', 'KWD', 'د.ك.‏', 1.00, NULL, NULL),
	(61, 'Kazakhstani Tenge', 'KZT', '₸.', 1.00, NULL, NULL),
	(62, 'Lebanese Pound', 'LBP', 'ل.ل.‏', 1.00, NULL, NULL),
	(63, 'Sri Lankan Rupee', 'LKR', 'Rs', 1.00, NULL, NULL),
	(64, 'Lithuanian Litas', 'LTL', 'Lt', 1.00, NULL, NULL),
	(65, 'Latvian Lats', 'LVL', 'Ls', 1.00, NULL, NULL),
	(66, 'Libyan Dinar', 'LYD', 'د.ل.‏', 1.00, NULL, NULL),
	(67, 'Moroccan Dirham', 'MAD', 'د.م.‏', 1.00, NULL, NULL),
	(68, 'Moldovan Leu', 'MDL', 'L', 1.00, NULL, NULL),
	(69, 'Malagasy Ariary', 'MGA', 'Ar', 1.00, NULL, NULL),
	(70, 'Macedonian Denar', 'MKD', 'Ден', 1.00, NULL, NULL),
	(71, 'Myanma Kyat', 'MMK', 'K', 1.00, NULL, NULL),
	(72, 'Macanese Pataca', 'MOP', 'MOP$', 1.00, NULL, NULL),
	(73, 'Mauritian Rupee', 'MUR', 'Rs', 1.00, NULL, NULL),
	(74, 'Mexican Peso', 'MXN', '$', 1.00, NULL, NULL),
	(75, 'Malaysian Ringgit', 'MYR', 'RM', 1.00, NULL, NULL),
	(76, 'Mozambican Metical', 'MZN', 'MT', 1.00, NULL, NULL),
	(77, 'Namibian Dollar', 'NAD', 'N$', 1.00, NULL, NULL),
	(78, 'Nigerian Naira', 'NGN', '₦', 1.00, NULL, NULL),
	(79, 'Nicaraguan Córdoba', 'NIO', 'C$', 1.00, NULL, NULL),
	(80, 'Norwegian Krone', 'NOK', 'kr', 1.00, NULL, NULL),
	(81, 'Nepalese Rupee', 'NPR', 'Re.', 1.00, NULL, NULL),
	(82, 'New Zealand Dollar', 'NZD', '$', 1.00, NULL, NULL),
	(83, 'Omani Rial', 'OMR', 'ر.ع.‏', 1.00, NULL, NULL),
	(84, 'Panamanian Balboa', 'PAB', 'B/.', 1.00, NULL, NULL),
	(85, 'Peruvian Nuevo Sol', 'PEN', 'S/', 1.00, NULL, NULL),
	(86, 'Philippine Peso', 'PHP', '₱', 1.00, NULL, NULL),
	(87, 'Pakistani Rupee', 'PKR', 'Rs', 1.00, NULL, NULL),
	(88, 'Polish Zloty', 'PLN', 'zł', 1.00, NULL, NULL),
	(89, 'Paraguayan Guarani', 'PYG', '₲', 1.00, NULL, NULL),
	(90, 'Qatari Rial', 'QAR', 'ر.ق.‏', 1.00, NULL, NULL),
	(91, 'Romanian Leu', 'RON', 'lei', 1.00, NULL, NULL),
	(92, 'Serbian Dinar', 'RSD', 'din.', 1.00, NULL, NULL),
	(93, 'Russian Ruble', 'RUB', '₽.', 1.00, NULL, NULL),
	(94, 'Rwandan Franc', 'RWF', 'FRw', 1.00, NULL, NULL),
	(95, 'Saudi Riyal', 'SAR', 'ر.س.‏', 1.00, NULL, NULL),
	(96, 'Sudanese Pound', 'SDG', 'ج.س.', 1.00, NULL, NULL),
	(97, 'Swedish Krona', 'SEK', 'kr', 1.00, NULL, NULL),
	(98, 'Singapore Dollar', 'SGD', '$', 1.00, NULL, NULL),
	(99, 'Somali Shilling', 'SOS', 'Sh.so.', 1.00, NULL, NULL),
	(100, 'Syrian Pound', 'SYP', 'LS‏', 1.00, NULL, NULL),
	(101, 'Thai Baht', 'THB', '฿', 1.00, NULL, NULL),
	(102, 'Tunisian Dinar', 'TND', 'د.ت‏', 1.00, NULL, NULL),
	(103, 'Tongan Paʻanga', 'TOP', 'T$', 1.00, NULL, NULL),
	(104, 'Turkish Lira', 'TRY', '₺', 1.00, NULL, NULL),
	(105, 'Trinidad and Tobago Dollar', 'TTD', '$', 1.00, NULL, NULL),
	(106, 'New Taiwan Dollar', 'TWD', 'NT$', 1.00, NULL, NULL),
	(107, 'Tanzanian Shilling', 'TZS', 'TSh', 1.00, NULL, NULL),
	(108, 'Ukrainian Hryvnia', 'UAH', '₴', 1.00, NULL, NULL),
	(109, 'Ugandan Shilling', 'UGX', 'USh', 1.00, NULL, NULL),
	(110, 'Uruguayan Peso', 'UYU', '$', 1.00, NULL, NULL),
	(111, 'Uzbekistan Som', 'UZS', 'so\'m', 1.00, NULL, NULL),
	(112, 'Venezuelan Bolívar', 'VEF', 'Bs.F.', 1.00, NULL, NULL),
	(113, 'Vietnamese Dong', 'VND', '₫', 1.00, NULL, NULL),
	(114, 'CFA Franc BEAC', 'XAF', 'FCFA', 1.00, NULL, NULL),
	(115, 'CFA Franc BCEAO', 'XOF', 'CFA', 1.00, NULL, NULL),
	(116, 'Yemeni Rial', 'YER', '﷼‏', 1.00, NULL, NULL),
	(117, 'South African Rand', 'ZAR', 'R', 1.00, NULL, NULL),
	(118, 'Zambian Kwacha', 'ZMK', 'ZK', 1.00, NULL, NULL),
	(119, 'Zimbabwean Dollar', 'ZWL', 'Z$', 1.00, NULL, NULL);

-- Dumping structure for table test.customer_addresses
CREATE TABLE IF NOT EXISTS `customer_addresses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `address_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `contact_person_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `zone_id` bigint unsigned NOT NULL,
  `floor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `road` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.customer_addresses: ~0 rows (approximately)

-- Dumping structure for table test.data_settings
CREATE TABLE IF NOT EXISTS `data_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.data_settings: ~87 rows (approximately)
INSERT INTO `data_settings` (`id`, `key`, `value`, `type`, `created_at`, `updated_at`) VALUES
	(1, 'admin_login_url', 'admin', 'login_admin', '2023-06-11 14:34:59', '2023-06-11 14:34:59'),
	(2, 'admin_employee_login_url', 'admin-employee', 'login_admin_employee', '2023-06-11 14:34:59', '2023-06-11 14:34:59'),
	(3, 'store_login_url', 'vendor', 'login_store', '2023-06-11 14:34:59', '2023-06-11 14:34:59'),
	(4, 'store_employee_login_url', 'store-employee', 'login_store_employee', '2023-06-11 14:34:59', '2023-06-11 14:34:59'),
	(5, 'fixed_header_title', 'Manage Your  Daily Life in one platform', 'admin_landing_page', '2023-06-11 15:06:27', '2023-06-11 15:06:27'),
	(6, 'fixed_header_sub_title', 'More than just a reliable  eCommerce platform', 'admin_landing_page', '2023-06-11 15:06:27', '2023-06-11 15:06:27'),
	(7, 'fixed_module_title', 'Your eCommerce venture starts here !', 'admin_landing_page', '2023-06-11 15:06:27', '2023-06-11 15:06:27'),
	(8, 'fixed_module_sub_title', 'Enjoy all services in one platform', 'admin_landing_page', '2023-06-11 15:06:27', '2023-06-11 15:06:27'),
	(9, 'fixed_referal_title', 'Earn point by', 'admin_landing_page', '2023-06-11 15:06:27', '2023-06-11 15:06:27'),
	(10, 'fixed_referal_sub_title', 'Refer Your Friend', 'admin_landing_page', '2023-06-11 15:06:27', '2023-06-11 15:06:27'),
	(11, 'fixed_newsletter_title', 'Sign Up to Our Newsletter', 'admin_landing_page', '2023-06-11 15:06:27', '2023-06-11 15:06:27'),
	(12, 'fixed_newsletter_sub_title', 'Receive Latest News, Updates and Many Other News Every Week', 'admin_landing_page', '2023-06-11 15:06:27', '2023-06-11 15:06:27'),
	(13, 'fixed_footer_article_title', '6amMart is a complete package!  It\'s time to empower your multivendor online business with  powerful features!', 'admin_landing_page', '2023-06-11 15:06:27', '2023-06-11 15:06:27'),
	(14, 'feature_title', 'Remarkable Features that You Can Count!', 'admin_landing_page', '2023-06-11 15:14:25', '2023-06-11 15:14:25'),
	(15, 'feature_short_description', 'Jam-packed with outstanding features to elevate your online ordering and delivery easier, and smarter than ever before. It\'s time to empower your multivendor online business with 6amMart\'s powerful features!', 'admin_landing_page', '2023-06-11 15:14:25', '2023-06-11 15:14:25'),
	(16, 'earning_title', 'Earn Money', 'admin_landing_page', '2023-06-11 15:26:01', '2023-06-11 15:26:01'),
	(17, 'earning_sub_title', 'Earn money  by using different platform', 'admin_landing_page', '2023-06-11 15:26:01', '2023-06-11 15:26:01'),
	(18, 'earning_seller_image', '2023-08-16-64dcaa6634ab5.png', 'admin_landing_page', '2023-06-11 15:27:29', '2023-08-15 23:52:22'),
	(19, 'seller_app_earning_links', '{"playstore_url_status":null,"playstore_url":null,"apple_store_url_status":null,"apple_store_url":null}', 'admin_landing_page', NULL, NULL),
	(20, 'earning_delivery_image', '2023-08-16-64dcaa7ba5b80.png', 'admin_landing_page', '2023-06-11 15:28:48', '2023-08-15 23:52:43'),
	(21, 'dm_app_earning_links', '{"playstore_url_status":null,"playstore_url":null,"apple_store_url_status":null,"apple_store_url":null}', 'admin_landing_page', NULL, NULL),
	(22, 'why_choose_title', 'What so Special About 6amMart ?', 'admin_landing_page', '2023-06-11 15:30:30', '2023-06-11 15:32:08'),
	(23, 'counter_section', '{"app_download_count_numbers":"300","seller_count_numbers":"85","deliveryman_count_numbers":"150","customer_count_numbers":"10000","status":"1"}', 'admin_landing_page', NULL, NULL),
	(24, 'download_user_app_title', 'Let’s  Manage', 'admin_landing_page', '2023-06-11 15:38:17', '2023-06-11 15:38:17'),
	(25, 'download_user_app_sub_title', 'Your business  Smartly or Earn.', 'admin_landing_page', '2023-06-11 15:38:17', '2023-06-11 15:38:17'),
	(26, 'download_user_app_image', '2023-08-16-64dcaab460ac2.png', 'admin_landing_page', '2023-06-11 15:38:17', '2023-08-15 23:53:40'),
	(27, 'download_user_app_links', '{"playstore_url_status":"1","playstore_url":"https:\\/\\/play.google.com\\/store\\/apps\\/details?id=com.sixamtech.sixam_mart_store_app","apple_store_url_status":"1","apple_store_url":"https:\\/\\/www.apple.com\\/app-store"}', 'admin_landing_page', NULL, NULL),
	(28, 'testimonial_title', 'People Who Shared Love with us?', 'admin_landing_page', '2023-06-11 15:42:04', '2023-06-11 15:42:04'),
	(29, 'contact_us_title', 'Contact Us', 'admin_landing_page', '2023-06-11 15:53:22', '2023-06-11 15:53:22'),
	(30, 'contact_us_sub_title', 'Any question or remarks? Just write us a message!', 'admin_landing_page', '2023-06-11 15:53:22', '2023-06-11 15:53:22'),
	(31, 'contact_us_image', '2023-08-16-64dcab0c7b434.png', 'admin_landing_page', '2023-06-11 15:53:23', '2023-08-15 23:55:08'),
	(32, 'refund_policy_status', '1', 'admin_landing_page', '2023-06-11 20:10:58', '2023-06-11 20:10:58'),
	(33, 'refund_policy', NULL, 'admin_landing_page', '2023-06-11 20:10:59', '2023-06-11 20:10:59'),
	(34, 'header_title', '$Your e-Commerce!$', 'react_landing_page', '2023-06-12 16:30:53', '2023-06-12 19:41:19'),
	(35, 'header_sub_title', 'Venture Starts Here', 'react_landing_page', '2023-06-12 16:30:53', '2023-06-12 17:55:14'),
	(36, 'header_tag_line', 'More than just a reliable $eCommerce$ platform', 'react_landing_page', '2023-06-12 16:30:53', '2023-06-12 17:45:24'),
	(37, 'header_icon', '2023-08-16-64dcac0088f46.png', 'react_landing_page', '2023-06-12 16:30:53', '2023-08-15 23:59:12'),
	(38, 'header_banner', '2023-08-20-64e1e31738bbc.png', 'react_landing_page', '2023-06-12 16:30:53', '2023-08-19 22:55:35'),
	(39, 'company_title', '$6amMart$', 'react_landing_page', '2023-06-12 16:35:07', '2023-06-12 17:46:19'),
	(40, 'company_sub_title', 'is Best Delivery Service Near You', 'react_landing_page', '2023-06-12 16:35:07', '2023-06-12 16:35:07'),
	(41, 'company_description', '6amMart is a one-stop shop for all your daily necessities. You can shop for groceries, and pharmacy items, order food, and send important parcels from one place to another from the comfort of your home.', 'react_landing_page', '2023-06-12 16:35:07', '2023-06-12 16:35:07'),
	(42, 'company_button_name', 'Order Now', 'react_landing_page', '2023-06-12 16:35:07', '2023-06-12 17:46:52'),
	(43, 'company_button_url', 'https://6ammart-react.6amtech.com/', 'react_landing_page', '2023-06-12 16:35:07', '2023-06-12 16:35:07'),
	(44, 'download_user_app_title', 'Complete Multipurpose eBusiness Solution', 'react_landing_page', '2023-06-12 16:40:30', '2023-06-12 16:40:30'),
	(45, 'download_user_app_sub_title', '6amMart is a Laravel and Flutter Framework-based multi-vendor food, grocery, eCommerce, parcel, and pharmacy delivery system. It has six modules to cover all your business function', 'react_landing_page', '2023-06-12 16:40:30', '2023-06-12 16:40:30'),
	(46, 'download_user_app_image', NULL, 'react_landing_page', '2023-06-12 16:40:30', '2023-06-12 16:40:30'),
	(47, 'download_user_app_links', '{"playstore_url_status":"1","playstore_url":"https:\\/\\/play.google.com\\/store\\/","apple_store_url_status":"1","apple_store_url":"https:\\/\\/www.apple.com\\/app-store\\/"}', 'react_landing_page', NULL, NULL),
	(48, 'earning_title', 'Let’s Start Earning with $6amMart$', 'react_landing_page', '2023-06-12 16:43:22', '2023-06-12 16:43:22'),
	(49, 'earning_sub_title', 'Join our online marketplace revolution and boost your income.', 'react_landing_page', '2023-06-12 16:43:22', '2023-06-12 16:43:22'),
	(50, 'earning_seller_title', 'Become a Seller', 'react_landing_page', '2023-06-12 16:45:07', '2023-06-12 16:45:07'),
	(51, 'earning_seller_sub_title', 'Register as seller & open shop in 6amMart to start your business', 'react_landing_page', '2023-06-12 16:45:07', '2023-06-12 16:45:07'),
	(52, 'earning_seller_button_name', 'Register', 'react_landing_page', '2023-06-12 16:45:07', '2023-06-12 16:45:07'),
	(53, 'earning_seller_button_url', 'https://6ammart-admin.6amtech.com/store/apply', 'react_landing_page', '2023-06-12 16:45:07', '2023-06-12 16:45:07'),
	(54, 'earning_dm_title', 'Become a $Delivery Man$', 'react_landing_page', '2023-06-12 16:45:55', '2023-06-12 17:53:01'),
	(55, 'earning_dm_sub_title', 'Register as delivery man and earn money', 'react_landing_page', '2023-06-12 16:45:55', '2023-06-12 16:45:55'),
	(56, 'earning_dm_button_name', 'Register', 'react_landing_page', '2023-06-12 16:45:55', '2023-06-12 16:45:55'),
	(57, 'earning_dm_button_url', 'https://6ammart-admin.6amtech.com/deliveryman/apply', 'react_landing_page', '2023-06-12 16:45:55', '2023-06-12 16:45:55'),
	(58, 'promotion_banner', '[{"img":"2023-08-16-64dcac89cd0fa.png"},{"img":"2023-08-16-64dcac93a324a.png"},{"img":"2023-08-16-64dcad5a24940.png"}]', 'react_landing_page', NULL, '2023-08-16 00:01:02'),
	(59, 'business_title', '$Let’s$', 'react_landing_page', '2023-06-12 16:52:29', '2023-06-12 16:52:29'),
	(60, 'business_sub_title', 'Manage your business  Smartly', 'react_landing_page', '2023-06-12 16:52:29', '2023-06-12 17:54:18'),
	(61, 'business_image', '2023-08-16-64dcad66585e9.png', 'react_landing_page', '2023-06-12 16:52:29', '2023-08-16 00:05:10'),
	(62, 'download_business_app_links', '{"seller_playstore_url_status":"1","seller_playstore_url":"https:\\/\\/play.google.com\\/store","seller_appstore_url_status":"1","seller_appstore_url":"https:\\/\\/www.apple.com\\/app-store\\/","dm_playstore_url_status":"1","dm_playstore_url":"https:\\/\\/play.google.com\\/store","dm_appstore_url_status":"1","dm_appstore_url":"https:\\/\\/www.apple.com\\/app-store\\/"}', 'react_landing_page', NULL, NULL),
	(63, 'testimonial_title', 'We $satisfied$ some Customer & Restaurant Owners', 'react_landing_page', '2023-06-12 16:53:04', '2023-06-12 16:53:04'),
	(64, 'fixed_promotional_banner', '2023-08-16-64dcadedb4fac.png', 'react_landing_page', '2023-06-12 17:18:24', '2023-08-16 00:07:25'),
	(65, 'fixed_footer_description', 'Connect with our social media and other sites to keep up to date', 'react_landing_page', '2023-06-12 17:21:12', '2023-06-12 17:21:12'),
	(66, 'fixed_newsletter_title', 'Join Us!', 'react_landing_page', '2023-06-12 17:23:45', '2023-06-12 17:23:45'),
	(67, 'fixed_newsletter_sub_title', 'Subscribe to our weekly newsletter and be a part of our journey to self discovery and love.', 'react_landing_page', '2023-06-12 17:23:45', '2023-06-12 17:23:45'),
	(68, 'fixed_header_title', '6amMart', 'flutter_landing_page', '2023-06-12 17:31:35', '2023-06-12 17:31:35'),
	(69, 'fixed_header_sub_title', 'More than just reliable eCommerce platform', 'flutter_landing_page', '2023-06-12 17:31:35', '2023-06-12 17:32:30'),
	(70, 'fixed_header_image', '2023-08-16-64dcae3571b9a.png', 'flutter_landing_page', '2023-06-12 17:31:35', '2023-08-16 00:08:37'),
	(71, 'fixed_location_title', 'Choose your location', 'flutter_landing_page', '2023-06-12 17:35:02', '2023-06-12 17:35:02'),
	(72, 'fixed_module_title', 'Your eCommerce venture starts here !', 'flutter_landing_page', '2023-06-12 17:37:29', '2023-06-12 17:37:29'),
	(73, 'fixed_module_sub_title', 'Enjoy all services in one platform', 'flutter_landing_page', '2023-06-12 17:37:29', '2023-06-12 17:37:29'),
	(74, 'join_seller_title', 'Become a Seller', 'flutter_landing_page', '2023-06-12 18:12:56', '2023-06-12 18:12:56'),
	(75, 'join_seller_sub_title', 'Registered as a seller and open shop for start your business', 'flutter_landing_page', '2023-06-12 18:12:56', '2023-06-12 18:12:56'),
	(76, 'join_seller_button_name', 'Register', 'flutter_landing_page', '2023-06-12 18:12:56', '2023-06-12 18:12:56'),
	(77, 'join_seller_button_url', 'https://6ammart-admin.6amtech.com/store/apply', 'flutter_landing_page', '2023-06-12 18:12:56', '2023-06-12 18:12:56'),
	(78, 'join_delivery_man_title', 'Join as  Deliveryman', 'flutter_landing_page', '2023-06-12 18:16:03', '2023-06-12 18:16:03'),
	(79, 'join_delivery_man_sub_title', 'Registered as a deliveryman and earn money', 'flutter_landing_page', '2023-06-12 18:16:03', '2023-06-12 18:16:03'),
	(80, 'join_delivery_man_button_name', 'Register', 'flutter_landing_page', '2023-06-12 18:16:03', '2023-06-12 18:16:03'),
	(81, 'join_delivery_man_button_url', 'https://6ammart-admin.6amtech.com/deliveryman/apply', 'flutter_landing_page', '2023-06-12 18:16:03', '2023-06-12 18:16:03'),
	(82, 'download_user_app_title', 'Download app and enjoy more!', 'flutter_landing_page', '2023-06-12 18:17:56', '2023-06-12 18:17:56'),
	(83, 'download_user_app_sub_title', 'Download app from', 'flutter_landing_page', '2023-06-12 18:17:56', '2023-06-12 18:17:56'),
	(84, 'download_user_app_image', '2023-08-16-64dcae82675b2.png', 'flutter_landing_page', '2023-06-12 18:17:56', '2023-08-16 00:09:54'),
	(85, 'download_user_app_links', '{"playstore_url_status":"1","playstore_url":"https:\\/\\/play.google.com\\/store\\/","apple_store_url_status":"1","apple_store_url":"https:\\/\\/www.apple.com\\/app-store\\/"}', 'flutter_landing_page', NULL, NULL),
	(86, 'about_us', '<p>We, a group of millennials, are dedicated to establishing India&#39;s premier mobility solutions provider. Our dedication has driven us to create a platform offering rentals across 14 states, 43 cities, and 3 international locations.</p>\r\n\r\n<p>The realm of transportation and mobility solutions remains one of the least comprehended and disorganized sectors. We perceive this as an untapped opportunity to develop a reliable system accessible to all, transcending barriers.</p>\r\n\r\n<p>In our realm of two-wheelers, we embrace diversity, catering to everything from scooters to superbikes, accessible via both our website and mobile application.</p>\r\n\r\n<p><strong>&quot;Why buy when you can rent&quot;</strong></p>', 'admin_landing_page', '2024-05-02 02:07:01', '2024-05-02 02:22:57'),
	(87, 'about_title', 'About Us', 'admin_landing_page', '2024-05-02 02:07:01', '2024-05-02 02:07:01'),
	(88, 'customer_login_url', 'customer', 'login_customer', '2024-05-04 11:46:48', '2024-05-04 11:46:49');

-- Dumping structure for table test.delivery_histories
CREATE TABLE IF NOT EXISTS `delivery_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned DEFAULT NULL,
  `delivery_man_id` bigint unsigned DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.delivery_histories: ~0 rows (approximately)

-- Dumping structure for table test.delivery_man_wallets
CREATE TABLE IF NOT EXISTS `delivery_man_wallets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `delivery_man_id` bigint unsigned NOT NULL,
  `collected_cash` decimal(24,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_earning` decimal(24,2) NOT NULL DEFAULT '0.00',
  `total_withdrawn` decimal(24,2) NOT NULL DEFAULT '0.00',
  `pending_withdraw` decimal(24,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.delivery_man_wallets: ~0 rows (approximately)

-- Dumping structure for table test.delivery_men
CREATE TABLE IF NOT EXISTS `delivery_men` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_number` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcm_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `earning` tinyint(1) NOT NULL DEFAULT '1',
  `current_orders` int NOT NULL DEFAULT '0',
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'zone_wise',
  `store_id` bigint DEFAULT NULL,
  `application_status` enum('approved','denied','pending') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'approved',
  `order_count` int unsigned NOT NULL DEFAULT '0',
  `assigned_order_count` int unsigned NOT NULL DEFAULT '0',
  `vehicle_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `delivery_men_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.delivery_men: ~0 rows (approximately)
INSERT INTO `delivery_men` (`id`, `f_name`, `l_name`, `phone`, `email`, `identity_number`, `identity_type`, `identity_image`, `image`, `password`, `auth_token`, `fcm_token`, `zone_id`, `created_at`, `updated_at`, `status`, `active`, `earning`, `current_orders`, `type`, `store_id`, `application_status`, `order_count`, `assigned_order_count`, `vehicle_id`) VALUES
	(1, 'Demo', 'Driver', '+919655804621', 'portforwarding03@gmail.com', 'DH-2338678', 'driving_license', '["2024-05-08-663b4575313a1.png"]', '2024-05-08-663b45752a1df.png', '$2y$10$J7sFnWHLId3sIQl528GtVu2hZXomLMeds.KOXFlxB02wHOi7bKf4m', NULL, NULL, 2, '2024-05-07 22:57:17', '2024-05-07 22:57:17', 1, 0, 0, 0, 'zone_wise', NULL, 'approved', 0, 0, 1),
	(2, 'jana', 'Chandru', '+919025075398', 'jana@gmail.com', 'DH-2338678', 'passport', '["2024-05-28-6655c52f0868a.png"]', '2024-05-28-6655c52f00bb5.png', '$2y$10$J1eggRk4SWijzoJP.lrPPOnQCP47QMQJUtPEOSX/j2tyzdgzEfrpe', NULL, NULL, 2, '2024-05-28 01:21:11', '2024-05-28 01:21:11', 1, 0, 1, 0, 'zone_wise', NULL, 'approved', 0, 0, 1);

-- Dumping structure for table test.disbursements
CREATE TABLE IF NOT EXISTS `disbursements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `total_amount` double(23,3) NOT NULL DEFAULT '0.000',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_for` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.disbursements: ~0 rows (approximately)

-- Dumping structure for table test.disbursement_details
CREATE TABLE IF NOT EXISTS `disbursement_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `disbursement_id` bigint unsigned NOT NULL,
  `store_id` bigint unsigned DEFAULT NULL,
  `delivery_man_id` bigint unsigned DEFAULT NULL,
  `disbursement_amount` double(23,3) NOT NULL DEFAULT '0.000',
  `payment_method` bigint unsigned NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.disbursement_details: ~0 rows (approximately)

-- Dumping structure for table test.disbursement_withdrawal_methods
CREATE TABLE IF NOT EXISTS `disbursement_withdrawal_methods` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `store_id` bigint unsigned DEFAULT NULL,
  `delivery_man_id` bigint unsigned DEFAULT NULL,
  `withdrawal_method_id` bigint unsigned NOT NULL,
  `method_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_fields` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.disbursement_withdrawal_methods: ~0 rows (approximately)

-- Dumping structure for table test.discounts
CREATE TABLE IF NOT EXISTS `discounts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `min_purchase` decimal(24,2) NOT NULL DEFAULT '0.00',
  `max_discount` decimal(24,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(24,2) NOT NULL DEFAULT '0.00',
  `discount_type` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percentage',
  `store_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.discounts: ~0 rows (approximately)

-- Dumping structure for table test.d_m_reviews
CREATE TABLE IF NOT EXISTS `d_m_reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `delivery_man_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `order_id` bigint unsigned NOT NULL,
  `comment` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `attachment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.d_m_reviews: ~0 rows (approximately)

-- Dumping structure for table test.d_m_vehicles
CREATE TABLE IF NOT EXISTS `d_m_vehicles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_coverage_area` double(16,2) NOT NULL,
  `maximum_coverage_area` double(16,2) NOT NULL,
  `extra_charges` double(16,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.d_m_vehicles: ~0 rows (approximately)
INSERT INTO `d_m_vehicles` (`id`, `type`, `starting_coverage_area`, `maximum_coverage_area`, `extra_charges`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Bike', 1.00, 100.00, 100.00, 1, '2024-05-07 22:44:09', '2024-05-07 22:44:09');

-- Dumping structure for table test.email_templates
CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `background_image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_template` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy` tinyint(1) NOT NULL DEFAULT '0',
  `refund` tinyint(1) NOT NULL DEFAULT '0',
  `cancelation` tinyint(1) NOT NULL DEFAULT '0',
  `contact` tinyint(1) NOT NULL DEFAULT '0',
  `facebook` tinyint(1) NOT NULL DEFAULT '0',
  `instagram` tinyint(1) NOT NULL DEFAULT '0',
  `twitter` tinyint(1) NOT NULL DEFAULT '0',
  `linkedin` tinyint(1) NOT NULL DEFAULT '0',
  `pinterest` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.email_templates: ~30 rows (approximately)
INSERT INTO `email_templates` (`id`, `title`, `body`, `background_image`, `image`, `logo`, `icon`, `button_name`, `button_url`, `footer_text`, `copyright_text`, `type`, `email_type`, `email_template`, `privacy`, `refund`, `cancelation`, `contact`, `facebook`, `instagram`, `twitter`, `linkedin`, `pinterest`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Change Password Request', '<p>The following user has forgotten his password &amp; requested to change/reset their password.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>User Name: {userName}</strong></p>', NULL, NULL, NULL, '2023-06-12-6486f303174e0.png', '', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'admin', 'forget_password', '5', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 16:26:24', '2023-06-12 19:40:28'),
	(2, 'New Store Registration Request', '<p>Please find below the details of the new Store registration:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Store Name: {storeName}</strong></p>\r\n\r\n<p>To review the store from the respective Module, go to:&nbsp;</p>\r\n\r\n<p><strong>Module Section</strong><strong>&rarr;Store Management&rarr;New Stores</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Or you can directly review the store here &rarr;</p>\r\n\r\n<p>&nbsp;</p>', NULL, '2023-06-12-6486f4420b5c1.png', '2023-06-12-6486f4420d61d.png', NULL, 'Review Request', 'https://www.facebook.com/', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'admin', 'store_registration', '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 16:32:34', '2023-06-12 19:59:26'),
	(3, 'New Deliveryman Registration Request', '<p>Please find below the details of the new Deliveryman registration:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Deliveryman Name: {deliveryManName}</strong></p>\r\n\r\n<p>To review the store from the respective Module, go to:&nbsp;</p>\r\n\r\n<p><strong>Users</strong><strong>&rarr;Deliveryman Management&rarr;New Deliveryman</strong></p>\r\n\r\n<p>&nbsp;</p>', NULL, '2023-06-12-6486f4fe20b2c.png', '2023-06-12-6486f528877fe.png', NULL, 'Review Request', 'https://www.facebook.com/', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'admin', 'dm_registration', '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 16:35:42', '2023-06-12 20:04:49'),
	(4, 'New Withdraw Request', '<p>Please find below the details of the new Withdraw Request:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Store Name: {storeName}</strong></p>\r\n\r\n<p>To review the Refund Request, go to:&nbsp;</p>\r\n\r\n<p><strong>Transactions &amp; Reports</strong><strong>&rarr;Withdraw Requests</strong></p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, NULL, '2023-06-12-6486f5b6a24a4.png', 'Review Request', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'admin', 'withdraw_request', '6', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 16:38:46', '2023-06-12 20:04:17'),
	(5, '“BUY ONE GET ONE” Campaign Join Request', '<p>Please find below the details of the new Campaign Join Request:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Store Name: {storeName}</strong></p>\r\n\r\n<p>To review the Refund Request, go to:&nbsp;</p>\r\n\r\n<p><strong>Module Section</strong><strong>&rarr;Choose Module&rarr;Promotion Management&rarr;Campaigns&rarr;Basic Campaigns&rarr;Buy One Get One</strong></p>\r\n\r\n<p>&nbsp;</p>', NULL, '2023-06-12-6486f611cfb9b.png', '2023-06-12-6486f611cfdf0.png', NULL, 'Review Request', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'admin', 'campaign_request', '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 16:40:17', '2023-06-12 20:06:04'),
	(6, 'You Have A Refund Request.', '<p>Please find below the details of the new Refund Request:</p>\r\n\r\n<p><strong>Customer Name: {userName}</strong></p>\r\n\r\n<p><strong>Order ID: {orderId}</strong></p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, '2023-06-12-6486fb27a6a00.png', NULL, 'Review Request', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'admin', 'refund_request', '2', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 17:01:59', '2023-06-12 20:14:43'),
	(7, 'Mart Morning [ID 1234] Just Signed In', '<p>Mart Morning [ID 1234] just signed in from the Store Panel.&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>Login Time:</strong> 12.00pm</p>', NULL, NULL, '2023-06-12-6486fbdeb92d6.png', NULL, 'Check Status', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'admin', 'login', '2', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 17:05:02', '2023-06-12 17:05:02'),
	(8, 'Your Registration is Submitted Successfully!', '<p>Dear User,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We&rsquo;ve received your Store Registration Request.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Soon you&rsquo;ll know if your store registration is accepted or declined by the Admin.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Stay Tuned!</p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, NULL, '2023-06-12-6487024230762.png', '', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'store', 'registration', '5', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 17:32:18', '2023-06-12 17:32:18'),
	(9, 'Congratulations! Your Registration is Approved!', '<p>Dear User,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Your registration is approved by the Admin.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>First</strong>, you need to log in to your store panel.&nbsp;</p>\r\n\r\n<p><strong>After that,</strong> please set up your store and start selling!&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>Click here</strong><strong> &rarr; </strong><a href="https://6ammart-admin.6amtech.com/store-panel/business-settings/store-setup">https://6ammart-admin.6amtech.com/store-panel/business-settings/store-setup</a></p>', NULL, NULL, NULL, '2023-06-12-648702fb014dd.png', '', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'store', 'approve', '5', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 17:35:23', '2023-06-12 20:01:31'),
	(10, 'Your Registration is Rejected', '<p>Dear User,&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We&rsquo;re sorry to announce that your store registration was rejected by the Admin.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>To find out more please contact us.</p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, NULL, '2023-06-12-648706ce4d5fb.png', '', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'store', 'deny', '5', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 17:47:03', '2023-06-12 17:51:42'),
	(11, 'Congratulations! Your Withdrawal is Approved!', '<p>Dear User,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The amount you requested to withdraw is approved by the Admin and transferred to you bank account.</p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, NULL, '2023-06-12-64870788562d9.png', 'See details', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'store', 'withdraw_approve', '6', 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, '2023-06-12 17:54:48', '2023-06-12 17:54:48'),
	(12, 'Your Withdraw Request was Rejected.', '<p>Dear User,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The amount you requested to withdraw is rejected by the Admin.</p>\r\n\r\n<p>Reason: Insufficient Balance.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, NULL, '2023-06-12-648708244930a.png', 'See Details', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'store', 'withdraw_deny', '6', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 17:57:24', '2023-06-12 17:57:24'),
	(13, 'Your Request is Completed!', '<p>Dear User,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We&rsquo;ve received your Campaign Request.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Soon you&rsquo;ll know if your request is approved or rejected by the Admin.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Stay Tuned!</p>\r\n\r\n<p>&nbsp;</p>', NULL, '2023-06-12-648708d132665.png', '2023-06-12-6487088da18cb.png', NULL, 'See Status', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'store', 'campaign_request', '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 17:59:09', '2023-06-12 18:00:17'),
	(14, 'Congratulations! Your Campaign Request is Approved!', '<p>Dear User,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Your request to join campaign is approved by the Admin.</p>\r\n\r\n<p>&nbsp;</p>', NULL, '2023-06-12-6487091d3ee5a.png', '2023-06-12-6487091d3f0b3.png', NULL, 'View Status', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'store', 'campaign_approve', '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 18:01:33', '2023-06-12 20:04:45'),
	(15, 'Your Campaign Join Request Was Rejected.', '<p>Dear User,</p>\r\n\r\n<p>Your request to join the&nbsp;campaign was rejected by the admin.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', NULL, '2023-06-12-648709ce3e893.png', '2023-06-12-648709ce3ead2.png', NULL, '', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'store', 'campaign_deny', '7', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 18:04:30', '2023-06-12 20:06:55'),
	(16, 'Your Registration is Completed!', '<p>Dear User,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We&rsquo;ve received your Deliveryman Registration Request.</p>\r\n\r\n<p>Soon you&rsquo;ll know if your Deliveryman registration is accepted or declined by the Admin.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Stay Tuned!</p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, NULL, '2023-06-12-64870c80bb7bb.png', '', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'dm', 'registration', '5', 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, '2023-06-12 18:16:00', '2023-06-12 18:16:00'),
	(17, 'Congratulations! Your Registration is Approved!', '<p>Dear User,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Your registration is approved by the Admin.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Here&rsquo;s what to do next:&nbsp;</strong></p>\r\n\r\n<ol>\r\n	<li>Download the Deliveryman app</li>\r\n	<li>Login with below credentials.</li>\r\n</ol>\r\n\r\n<p><strong>After that,</strong> please set up your account and start delivery!&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>Click here</strong><strong> to download the app&rarr; </strong><a href="https://play.google.com/store/apps/details?id=com.sixamtech.sixam_mart_delivery_app&amp;pli=1">https://play.google.com/store/apps/details?id=com.sixamtech.sixam_mart_delivery_app&amp;pli=1</a></p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, NULL, '2023-06-12-64870cebc5fc6.png', '', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'dm', 'approve', '5', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 18:17:47', '2023-06-12 20:09:23'),
	(18, 'Your Registration is Rejected', '<p>Dear User,&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We&rsquo;re sorry to announce that your Deliveryman registration was rejected by the Admin.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>To find out more please contact us.</p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, NULL, '2023-06-12-64870da0bf819.png', '', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'dm', 'deny', '5', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 18:20:48', '2023-06-12 18:20:48'),
	(19, 'Your Account is Suspended.', '<p>Dear User,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Your Deliveryman account has been suspended by the Admin/Store.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Please contact related person to know more.</p>\r\n\r\n<p>&nbsp;</p>', NULL, '2023-06-12-64870e1ba4908.png', '2023-06-12-64870e1ba4cd1.png', NULL, '', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'dm', 'suspend', '7', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 18:22:51', '2023-06-12 18:22:51'),
	(20, 'Cash Collected.', '<p>Dear User,</p>\r\n\r\n<p>The Admin has collected cash from you.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, NULL, '2023-06-12-64870ecf8ef10.png', 'See Details', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'dm', 'cash_collect', '6', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 18:25:51', '2023-06-12 20:11:22'),
	(21, 'Reset Your Password', '<p>Please use this OTP to reset your Password&nbsp;&rarr;</p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, NULL, '2023-06-12-64870f8dcfcc5.png', '', '', 'Please contact us for any queries; we’re always happy to help.', 'Copyright 2023 6amMart. All right reserved.', 'dm', 'forget_password', '4', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 18:29:01', '2023-06-12 20:12:27'),
	(22, 'Your Registration is Successful!', '<p>Congratulations!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You&rsquo;ve successfully registered.</p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, NULL, '2023-06-12-64871218e4c0e.png', '', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'user', 'registration', '5', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 18:39:52', '2023-06-12 18:39:52'),
	(23, 'Please Register with The OTP', '<p>ONE MORE STEP:&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Please copy the following OTP &amp; paste in on your sign-up page to complete your registration.</p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, NULL, '2023-06-12-648712f6a5196.png', '', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'user', 'registration_otp', '4', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 18:43:34', '2023-06-12 20:13:03'),
	(24, 'Confirm Your Login.', '<p>Please copy the following OTP &amp; paste in on your Log in page to confirm your account.</p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, NULL, '2023-06-12-648713d7b9612.png', '', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'user', 'login_otp', '4', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 18:46:46', '2023-06-12 20:13:41'),
	(25, 'Please Verify Your Delivery.', '<p>Please give the following OTP to your Deliveryman to ensure your order.</p>\r\n\r\n<p><strong>7 5 8 9 4 3 </strong></p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, NULL, '2023-06-12-648714cf7f15a.png', '', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'user', 'order_verification', '4', 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, '2023-06-12 18:51:27', '2023-06-12 18:51:27'),
	(26, 'Your Order is Successful', '<p>Hi <strong>{userName}</strong>,</p>\r\n\r\n<p>Your order is successful. Please find your invoice below.</p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, NULL, NULL, 'Track Order', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'user', 'new_order', '3', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 18:52:36', '2023-06-12 20:16:37'),
	(27, 'Refund Order', '<p>Hi <strong>{userName}</strong>,</p>\r\n\r\n<p>We&rsquo;ve refunded your requested amount. Please find your refund invoice below.</p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, NULL, NULL, '', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'user', 'refund_order', '9', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 18:53:40', '2023-06-12 20:18:12'),
	(28, 'Reset Your Password', '<p>Please copy the following OTP &amp; paste in on your Log in page to&nbsp;reset your Password.</p>', NULL, NULL, NULL, '2023-06-12-64872af38ecfb.png', '', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved..', 'user', 'forget_password', '4', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 18:54:59', '2023-06-12 20:25:55'),
	(29, 'Your Refund Request was Rejected.', '<p>Dear User,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The amount you request for a refund was rejected by the Admin.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>To know more please contact us.</p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, '2023-06-12-648716141b3fd.png', NULL, '', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'user', 'refund_request_deny', '8', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 18:56:52', '2023-06-12 18:56:52'),
	(30, 'Fund Added to your Wallet.', '<p>Dear <strong>{userName}</strong>,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The Admin has sent fund to your Wallet. Please check your wallet.</p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, NULL, '2023-06-12-64871653198e0.png', 'Check Status', '', 'Please contact us for any queries; we’re always happy to help.', '© 2023 6amMart. All rights reserved.', 'user', 'add_fund', '6', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-12 18:57:55', '2023-06-12 20:23:47');

-- Dumping structure for table test.email_verifications
CREATE TABLE IF NOT EXISTS `email_verifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.email_verifications: ~0 rows (approximately)

-- Dumping structure for table test.employee_roles
CREATE TABLE IF NOT EXISTS `employee_roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `modules` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.employee_roles: ~0 rows (approximately)

-- Dumping structure for table test.expenses
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'custom',
  `amount` decimal(23,3) NOT NULL DEFAULT '0.000',
  `order_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'admin',
  `store_id` bigint unsigned DEFAULT NULL,
  `delivery_man_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.expenses: ~0 rows (approximately)

-- Dumping structure for table test.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table test.flash_sales
CREATE TABLE IF NOT EXISTS `flash_sales` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `module_id` bigint unsigned NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_publish` tinyint(1) NOT NULL DEFAULT '1',
  `admin_discount_percentage` double(24,3) NOT NULL,
  `vendor_discount_percentage` double(24,3) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.flash_sales: ~0 rows (approximately)

-- Dumping structure for table test.flash_sale_items
CREATE TABLE IF NOT EXISTS `flash_sale_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `flash_sale_id` bigint unsigned NOT NULL,
  `item_id` bigint unsigned NOT NULL,
  `stock` int NOT NULL,
  `sold` int NOT NULL DEFAULT '0',
  `available_stock` int NOT NULL,
  `discount_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double(23,3) NOT NULL DEFAULT '0.000',
  `discount_amount` double(23,3) NOT NULL DEFAULT '0.000',
  `price` double(23,3) NOT NULL DEFAULT '0.000',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.flash_sale_items: ~0 rows (approximately)

-- Dumping structure for table test.flutter_special_criterias
CREATE TABLE IF NOT EXISTS `flutter_special_criterias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.flutter_special_criterias: ~0 rows (approximately)
INSERT INTO `flutter_special_criterias` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Demo Feature Title', '2023-08-16-64dcae4ca0594.png', 1, '2023-08-16 00:09:00', '2023-08-16 00:09:00');

-- Dumping structure for table test.guests
CREATE TABLE IF NOT EXISTS `guests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcm_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.guests: ~0 rows (approximately)

-- Dumping structure for table test.items
CREATE TABLE IF NOT EXISTS `items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `category_ids` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variations` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `add_ons` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choice_options` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `price` decimal(24,2) NOT NULL DEFAULT '0.00',
  `tax` decimal(24,2) NOT NULL DEFAULT '0.00',
  `tax_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percent',
  `discount` decimal(24,2) NOT NULL DEFAULT '0.00',
  `discount_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percent',
  `available_time_starts` time DEFAULT NULL,
  `available_time_ends` time DEFAULT NULL,
  `veg` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `store_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_count` int NOT NULL DEFAULT '0',
  `avg_rating` double(16,14) NOT NULL DEFAULT '0.00000000000000',
  `rating_count` int NOT NULL DEFAULT '0',
  `rating` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_id` bigint unsigned NOT NULL,
  `stock` int DEFAULT '0',
  `unit_id` bigint unsigned DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `food_variations` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recommended` tinyint(1) NOT NULL DEFAULT '0',
  `organic` tinyint(1) NOT NULL DEFAULT '0',
  `maximum_cart_quantity` int DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '1',
  `hours_price` json DEFAULT NULL,
  `distance_price` json DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `items_module_id_foreign` (`module_id`),
  CONSTRAINT `items_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.items: ~8 rows (approximately)
INSERT INTO `items` (`id`, `name`, `description`, `image`, `category_id`, `category_ids`, `variations`, `add_ons`, `attributes`, `choice_options`, `price`, `tax`, `tax_type`, `discount`, `discount_type`, `available_time_starts`, `available_time_ends`, `veg`, `status`, `store_id`, `created_at`, `updated_at`, `order_count`, `avg_rating`, `rating_count`, `rating`, `module_id`, `stock`, `unit_id`, `images`, `food_variations`, `slug`, `recommended`, `organic`, `maximum_cart_quantity`, `is_approved`, `hours_price`, `distance_price`) VALUES
	(19, 'Yamaha v3', 'The Yamaha v3 is a high-performance sport bike manufactured by Honda. It\'s renowned for its lightweight chassis, sharp handling, and powerful inline-four engine. This motorcycle is popular among riders who appreciate its track-focused design and agility, making it a favorite for both street riding and racing enthusiasts.', '2024-05-22-664d7fc57d231.png', 5, '[{"id":"5","position":1}]', '[]', '[]', '[]', '[]', 500.00, 0.00, 'percent', 0.00, 'percent', '00:00:00', '23:59:59', 0, 1, 3, '2024-05-08 13:42:44', '2024-05-21 18:47:03', 0, 0.00000000000000, 0, NULL, 1, 10, NULL, '["2024-05-22-664d7fc578d3f.png","2024-05-22-664d7fc57c4d4.png","2024-05-22-664d7fc57cab5.png"]', '[]', 'cbr-600-r', 0, 0, 1, 1, '"{\\"1\\":\\"500\\"}"', '"{\\"\\":null}"'),
	(20, 'Royal Enfield Classic 350', 'The Royal Enfield Classic 350 is an iconic motorcycle known for its retro styling and timeless appeal. It features a classic design reminiscent of vintage British motorcycles with modern reliability. The bike is powered by a 346cc single-cylinder engine, delivering a smooth and torquey performance suitable for city commuting and leisurely rides.', '2024-05-22-664d7f680a630.png', 5, '[{"id":"5","position":1}]', '[]', '[]', '[]', '[]', 150.00, 0.00, 'percent', 0.00, 'percent', '00:00:00', '23:59:59', 0, 1, 3, '2024-05-08 13:45:51', '2024-05-21 18:45:36', 0, 0.00000000000000, 0, NULL, 1, 15, NULL, '["2024-05-22-664d7f68063e1.png","2024-05-22-664d7f6809134.png","2024-05-22-664d7f68096dc.png"]', '[]', 'royal-enfield-classic-350', 0, 0, 1, 1, '"{\\"1\\":\\"150\\"}"', '"{\\"\\":null}"'),
	(21, 'Bajaj Pulsar NS200', 'The Bajaj Pulsar NS200 is a popular naked sportbike known for its striking design and agile performance. It features a 199.5cc liquid-cooled single-cylinder engine that delivers around 24 horsepower, paired with a six-speed gearbox for smooth acceleration and flexibility. The NS200 stands out with its aggressive styling, highlighted by sharp lines, a muscular fuel tank, and a distinctive front headlamp design.', '2024-05-22-664d7f222821e.png', 5, '[{"id":"5","position":1}]', '[]', '[]', '[]', '[]', 250.00, 0.00, 'percent', 0.00, 'percent', '00:00:00', '23:59:59', 0, 1, 3, '2024-05-08 15:00:19', '2024-05-28 18:33:29', 1, 0.00000000000000, 0, NULL, 1, 10, NULL, '["2024-05-22-664d7f2223ae7.png","2024-05-22-664d7f2226f9e.png","2024-05-22-664d7f222758a.png"]', '[]', 'bajaj-pulsar-ns200', 0, 0, 1, 1, '"{\\"48\\":\\"600\\"}"', '"{\\"1\\":\\"100\\"}"'),
	(22, 'KTM 250', 'The KTM is powered by a 250 cc single-cylinder, air-cooled engine (with oil cooler in some variants), delivering good power and torque. It\'s known for its refinement and linear power delivery.', '2024-05-22-664d7e77bb0ce.png', 5, '[{"id":"5","position":1}]', '[]', '[]', '[]', '[]', 250.00, 0.00, 'percent', 0.00, 'percent', '00:00:00', '23:59:59', 0, 1, 3, '2024-05-08 15:04:28', '2024-05-21 18:41:31', 0, 0.00000000000000, 0, NULL, 1, 10, NULL, '["2024-05-22-664d7e77b6a6c.png","2024-05-22-664d7e77b9524.png","2024-05-22-664d7e77b9b54.png"]', '[]', 'apache-rtr-160', 0, 0, 1, 1, '"{\\"1\\":\\"250\\"}"', '"{\\"\\":null}"'),
	(23, 'Pulsar 180', 'Hero MotoCorp was originally founded as Hero Cycles in 1956 in Ludhiana, India. In 1984, Hero collaborated with Honda of Japan to establish Hero Honda Motors Limited, which became one of the most successful joint ventures in India\'s automotive industry. In 2011, Hero MotoCorp was formed after the split from Honda, and it continues to be a dominant player in the Indian two-wheeler market.', '2024-05-22-664d7dd54dc8a.png', 5, '[{"id":"5","position":1}]', '[]', '[]', '[]', '[]', 200.00, 0.00, 'percent', 0.00, 'percent', '00:00:00', '23:59:59', 0, 1, 3, '2024-05-08 15:06:57', '2024-05-21 18:39:38', 0, 0.00000000000000, 0, NULL, 1, 15, NULL, '["2024-05-22-664d7dd549fc9.png","2024-05-22-664d7dd54c76a.png","2024-05-22-664d7dd54cd5d.png","2024-05-22-664d7dd54d3ae.png"]', '[]', 'hero-motocorp', 0, 0, 1, 1, '"{\\"1\\":\\"200\\"}"', '"{\\"\\":null}"'),
	(24, 'Apache RTR', 'The Ninja brand was introduced in the 1980s and quickly gained popularity for its high-performance sport bikes. Over the years, Kawasaki has continuously updated and expanded the Ninja lineup, offering a range of models catering to different riding styles and skill levels.', '2024-05-22-664d7d86c4946.png', 5, '[{"id":"5","position":1}]', '[]', '[]', '[]', '[]', 260.00, 0.00, 'percent', 0.00, 'percent', '00:00:00', '23:59:59', 0, 1, 3, '2024-05-08 15:20:33', '2024-05-21 18:38:49', 0, 0.00000000000000, 0, NULL, 1, 10, NULL, '["2024-05-22-664d7d86bf895.png","2024-05-22-664d7d86c2b16.png","2024-05-22-664d7d86c3373.png"]', '[]', 'kawasaki-ninja', 0, 0, 1, 1, '"{\\"1\\":\\"260\\"}"', '"{\\"\\":null}"'),
	(25, 'Honda SP 125', 'The SP 125 is powered by a 124cc, single-cylinder, fuel-injected engine. This engine is known for its smooth power delivery, good low-end torque, and fuel efficiency. It meets BS6 emission norms, ensuring cleaner and greener performance.', '2024-05-22-664d7c9fa0451.png', 5, '[{"id":"5","position":1}]', '[]', '[]', '[]', '[]', 320.00, 0.00, 'percent', 0.00, 'percent', '00:00:00', '23:59:59', 0, 1, 3, '2024-05-08 15:27:55', '2024-05-26 23:00:53', 0, 0.00000000000000, 0, NULL, 1, 10, NULL, '["2024-05-22-664d7c9f9c91b.png","2024-05-22-664d7c9f9fd52.png","2024-05-22-664d7cd4e4123.png"]', '[]', 'honda-sp-125', 0, 0, 1, 1, '"{\\"1\\":\\"320\\"}"', '"{\\"\\":null}"'),
	(26, 'Ducati 360', 'Ducati is an Italian motorcycle manufacturing company headquartered in Bologna, Italy. The company is directly owned by Italian automotive manufacturer Lamborghini, whose German parent company is Audi.', '2024-05-27-66545a6e068b3.png', 7, '[{"id":"7","position":1}]', '[]', '[]', '[]', '[]', 1000.00, 0.00, 'percent', 0.00, 'percent', '00:00:00', '23:59:59', 0, 1, 3, '2024-05-26 23:33:26', '2024-05-27 00:30:22', 0, 0.00000000000000, 0, NULL, 1, 0, NULL, '["2024-05-27-66545a6df34a2.png","2024-05-27-66545a6e06174.png"]', '[]', 'ducati-360', 0, 0, NULL, 1, '"{\\"24\\":\\"1000\\"}"', '"{\\"1\\":\\"500\\"}"');

-- Dumping structure for table test.item_campaigns
CREATE TABLE IF NOT EXISTS `item_campaigns` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `admin_id` bigint unsigned NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `category_ids` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variations` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `add_ons` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choice_options` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `price` decimal(24,2) NOT NULL DEFAULT '0.00',
  `tax` decimal(24,2) NOT NULL DEFAULT '0.00',
  `tax_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percent',
  `discount` decimal(24,2) NOT NULL DEFAULT '0.00',
  `discount_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percent',
  `store_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `veg` tinyint(1) NOT NULL DEFAULT '0',
  `module_id` bigint unsigned NOT NULL,
  `stock` int DEFAULT '0',
  `unit_id` bigint unsigned DEFAULT NULL,
  `food_variations` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maximum_cart_quantity` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_campaigns_module_id_foreign` (`module_id`),
  CONSTRAINT `item_campaigns_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.item_campaigns: ~0 rows (approximately)

-- Dumping structure for table test.item_station
CREATE TABLE IF NOT EXISTS `item_station` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `item_id` bigint unsigned NOT NULL,
  `station_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_station_item_id_foreign` (`item_id`),
  KEY `item_station_station_id_foreign` (`station_id`),
  CONSTRAINT `item_station_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  CONSTRAINT `item_station_station_id_foreign` FOREIGN KEY (`station_id`) REFERENCES `stations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.item_station: ~0 rows (approximately)

-- Dumping structure for table test.item_tag
CREATE TABLE IF NOT EXISTS `item_tag` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `item_id` bigint unsigned NOT NULL,
  `tag_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.item_tag: ~3 rows (approximately)
INSERT INTO `item_tag` (`id`, `item_id`, `tag_id`) VALUES
	(1, 2, 1),
	(2, 3, 2),
	(3, 4, 3);

-- Dumping structure for table test.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.jobs: ~0 rows (approximately)

-- Dumping structure for table test.loyalty_point_transactions
CREATE TABLE IF NOT EXISTS `loyalty_point_transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `transaction_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` decimal(24,3) NOT NULL DEFAULT '0.000',
  `debit` decimal(24,3) NOT NULL DEFAULT '0.000',
  `balance` decimal(24,3) NOT NULL DEFAULT '0.000',
  `reference` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.loyalty_point_transactions: ~0 rows (approximately)

-- Dumping structure for table test.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `conversation_id` bigint unsigned DEFAULT NULL,
  `sender_id` bigint unsigned DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `file` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.messages: ~0 rows (approximately)

-- Dumping structure for table test.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.migrations: ~132 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2016_06_01_000001_create_oauth_auth_codes_table', 30),
	(2, '2016_06_01_000002_create_oauth_access_tokens_table', 30),
	(3, '2016_06_01_000003_create_oauth_refresh_tokens_table', 30),
	(4, '2016_06_01_000004_create_oauth_clients_table', 30),
	(5, '2016_06_01_000005_create_oauth_personal_access_clients_table', 30),
	(8, '2021_06_17_054551_create_soft_credentials_table', 31),
	(9, '2022_04_10_030533_create_newsletters_table', 32),
	(10, '2022_04_12_015827_create_social_media_table', 32),
	(11, '2022_04_12_215009_create_jobs_table', 32),
	(12, '2022_04_21_145207_add_column_to_modules_table', 32),
	(13, '2022_05_12_170027_add_column_to_customer_addresses_table', 33),
	(14, '2022_05_14_155444_add_all_zones_column_to_modules_table', 33),
	(15, '2022_05_26_120821_change_data_column_to_user_notifiations_table', 33),
	(16, '2022_03_31_103418_create_wallet_transactions_table', 34),
	(17, '2022_03_31_103827_create_loyalty_point_transactions_table', 34),
	(18, '2022_04_09_161150_add_wallet_point_columns_to_users_table', 34),
	(19, '2022_05_14_122133_add_dm_tips_column_to_orders_table', 34),
	(20, '2022_05_14_122603_add_dm_tips_column_to_order_transactions_table', 34),
	(21, '2022_05_17_153333_add_ref_code_to_users_table', 34),
	(22, '2022_07_31_103626_add_free_delivery_by_column_to_orders_table', 35),
	(23, '2022_09_10_112137_create_user_infos_table', 36),
	(24, '2022_09_10_112203_create_conversations_table', 36),
	(25, '2022_09_10_112220_create_messages_table', 36),
	(26, '2022_10_18_092639_create_refunds_table', 37),
	(27, '2022_10_18_093323_add_refund_request_cancel_column_to_orders_table', 37),
	(28, '2022_10_18_093529_create_refund_reasons_table', 37),
	(29, '2022_10_19_150319_add_delivery_column_to_parcel_categories_table', 37),
	(30, '2022_10_19_165501_add_default_link_column_to_banners_table', 37),
	(31, '2022_10_20_105050_module_zone', 37),
	(32, '2022_10_22_115553_add_is_logged_column_to_admins_table', 37),
	(33, '2022_10_22_122336_add_is_logged_column_to_vendor_employees_table', 37),
	(34, '2022_10_25_153214_add_payment_method_columns_to_zones_table', 37),
	(35, '2022_10_31_165427_add_rename_delivery_charge_column_to_stores_table', 37),
	(36, '2022_11_05_094404_add_delivery_fee_comission_to_order_transactions_table', 37),
	(37, '2022_11_13_130054_create_contacts_table', 37),
	(38, '2022_11_15_111925_create_expenses_table', 37),
	(39, '2022_11_15_112413_add_expense_column_to_order_transactions_table', 37),
	(40, '2022_12_20_104455_add_food_variations_column_to_items_table', 38),
	(41, '2022_12_21_154227_alter_table_order_details_change_variation', 38),
	(42, '2022_12_29_103803_add_order_id_column_to_expenses_table', 38),
	(43, '2022_12_29_105321_add_maximum_cod_order_amount_column_to_module_zone_table', 38),
	(44, '2022_12_29_114005_add_prescription_order_column_to_orders_table', 38),
	(45, '2022_12_31_111437_create_notification_messages_table', 38),
	(46, '2023_01_02_112948_create_tags_table', 38),
	(47, '2023_01_02_113235_item_tag', 38),
	(48, '2023_01_03_093510_add_current_language_key_column_to_users_table', 38),
	(49, '2023_01_07_115354_add_prescription_order_to_stores_table', 38),
	(50, '2023_01_07_180000_add_description_to_expenses_table', 38),
	(51, '2023_01_10_124723_add_food_variations_column_to_item_campaigns_table', 38),
	(52, '2023_01_10_145928_change_refund_amount_column_type', 38),
	(53, '2023_01_10_150108_change_amount_column_type', 38),
	(54, '2023_01_23_144828_add_tax_status_column_to_orders_table', 39),
	(55, '2023_01_30_114113_change_delivery_charge_column_type_to_admin_wallets_table', 39),
	(56, '2023_01_23_103943_add_slug_to_items_table', 40),
	(57, '2023_01_23_144001_add_slug_to_categories_table', 40),
	(58, '2023_01_23_144119_add_slug_to_item_campaigns_table', 40),
	(59, '2023_01_23_144232_add_slug_to_stores_table', 40),
	(60, '2023_02_25_133200_create_d_m_vehicles_table', 40),
	(61, '2023_02_25_133302_add_vehicle_id_column_to_delivery_men_table', 40),
	(62, '2023_02_25_133409_add_vehicle_id_column_to_orders_table', 40),
	(63, '2023_02_25_163329_add_maximum_delivery_charge_column_to_module_zone_table', 40),
	(64, '2023_02_25_175825_add_otp_hit_count_cols_in_phone_verifications_table', 40),
	(65, '2023_02_25_175912_add_hit_count_at_col_in_password_resets_table', 40),
	(66, '2023_02_26_144503_add_campaign_status_to_campaign_store_table', 40),
	(67, '2023_02_26_162224_add_recommened_to_items_table', 40),
	(68, '2023_02_27_102931_add_ref_by_col_to_users_table', 40),
	(69, '2023_02_27_111635_create_order_cancel_reasons_table', 40),
	(70, '2023_02_27_111937_add_cancellation_reason_col_to_orders_table', 40),
	(71, '2023_02_27_161418_add_created_by_columns_to_coupons_table', 40),
	(72, '2023_02_27_161533_add_created_by_columns_to_expenses_table', 40),
	(73, '2023_02_27_162252_add_store_expense_columns_to_order_transactions_table', 40),
	(74, '2023_02_27_162357_add_coupon_created_by_columns_to_orders_table', 40),
	(75, '2023_03_01_154319_add_maximum_delivery_charge_column_to_stores_table', 40),
	(76, '2023_03_02_103114_add_discount_on_product_by_column_to_orders_table', 40),
	(77, '2023_03_02_143919_change_amount_column_to_expenses_table', 40),
	(78, '2023_03_02_144258_add_discount_amount_by_store_col_to_order_transactions_table', 40),
	(79, '2023_03_11_120645_add_temp_block_time_col_to_phone_verifications_table', 41),
	(80, '2023_03_11_121000_add_temp_block_time_col_to_password_resets_table', 41),
	(81, '2023_03_13_181502_add_temp_token_column_to_users_table', 41),
	(82, '2023_04_05_112916_add_created_by_col_to_password_resets_table', 42),
	(83, '2023_05_04_100012_create_data_settings_table', 42),
	(84, '2023_05_04_100930_create_admin_promotional_banners_table', 42),
	(85, '2023_05_04_101825_create_admin_features_table', 42),
	(86, '2023_05_04_102015_create_admin_special_criterias_table', 42),
	(87, '2023_05_07_152523_create_admin_testimonials_table', 42),
	(88, '2023_05_07_173609_create_flutter_special_criterias_table', 42),
	(89, '2023_05_08_125811_create_react_testimonials_table', 42),
	(90, '2023_05_09_170006_create_email_templates_table', 42),
	(91, '2023_05_16_104129_add_cutlery_processing_time_unavailable_product_note_col_to_orders_table', 42),
	(92, '2023_05_18_093438_add_featured_col_to_categories_table', 42),
	(93, '2023_05_18_143530_add_delivery_instruction_col_to_orders_table', 42),
	(94, '2023_05_18_163841_add_organic_col_to_items_table', 42),
	(95, '2023_05_28_153920_add_tax_percentage_col_to_orders_table', 42),
	(96, '2023_06_11_172741_add_cutlery_col_to_stores_table', 42),
	(97, '2023_07_05_104537_add_maximum_cart_quantity_col_to_items_table', 43),
	(98, '2023_07_05_135741_add_service_charge_col_to_orders_table', 43),
	(99, '2023_07_05_145800_add_service_charge_col_to_order_transactions_table', 43),
	(100, '2023_07_05_155429_add_order_proof_col_to_orders_table', 43),
	(101, '2023_07_06_124530_add_partially_paid_amount_col_to_orders_table', 43),
	(102, '2023_07_06_144944_create_order_payments_table', 43),
	(103, '2023_07_09_120533_add_meta_cols_to_stores_table', 43),
	(104, '2023_07_09_143746_create_wallet_payments_table', 43),
	(105, '2023_07_10_121938_create_wallet_bonuses_table', 43),
	(106, '2023_07_10_153950_add_user_id_col_to_expenses_table', 43),
	(107, '2023_07_19_124016_add_maximum_cart_quantity_col_to_item_campaigns_table', 43),
	(108, '0000_00_00_000000_create_websockets_statistics_entries_table', 44),
	(109, '2023_08_10_131937_create_offline_payment_methods_table', 44),
	(110, '2023_08_10_132315_create_offline_payments_table', 44),
	(111, '2023_08_14_123526_create_temp_products_table', 44),
	(112, '2023_08_14_153229_add_is_approved_col_to_items_table', 44),
	(113, '2023_08_20_143852_add_created_by_col_to_banners_table', 44),
	(114, '2023_08_21_115610_add_announcement_cols_to_stores_table', 44),
	(115, '2023_08_21_173527_create_guests_table', 44),
	(116, '2023_08_22_102914_add_is_guest_col_to_orders_table', 44),
	(117, '2023_08_24_123045_create_common_conditions_table', 44),
	(118, '2023_08_24_151032_create_pharmacy_item_details_table', 44),
	(119, '2023_08_26_164947_create_module_wise_banners_table', 44),
	(120, '2023_08_27_123438_create_module_wise_why_chooses_table', 44),
	(121, '2023_08_28_114316_create_flash_sales_table', 44),
	(122, '2023_08_28_134428_create_flash_sale_items_table', 44),
	(123, '2023_09_07_131829_create_carts_table', 44),
	(124, '2023_09_20_122921_create_store_configs_table', 44),
	(125, '2023_09_23_184806_add_flash_sale_cols_to_orders_table', 44),
	(126, '2023_10_08_103818_add_increased_delivery_fee_in_zones_table', 44),
	(127, '2023_11_21_123038_create_withdrawal_methods_table', 45),
	(128, '2023_11_21_123229_create_disbursement_withdrawal_methods_table', 45),
	(129, '2023_11_21_123320_create_disbursements_table', 45),
	(130, '2023_11_21_123742_add_cols_to_withdraw_requests_table', 45),
	(131, '2023_11_21_124049_create_disbursement_details_table', 45),
	(132, '2023_11_21_160728_add_created_by_col_to_account_transactions_table', 45),
	(133, '2023_11_23_093859_create_parcel_delivery_instructions_table', 45),
	(134, '2024_01_17_105010_create_order_references_table', 46),
	(135, '2024_04_29_065936_add_location_to_users_table', 47),
	(136, '2024_06_07_165550_create_stations_table', 48);

-- Dumping structure for table test.modules
CREATE TABLE IF NOT EXISTS `modules` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `module_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `stores_count` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_id` int NOT NULL DEFAULT '1',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `all_zone_service` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.modules: ~0 rows (approximately)
INSERT INTO `modules` (`id`, `module_name`, `module_type`, `thumbnail`, `status`, `stores_count`, `created_at`, `updated_at`, `icon`, `theme_id`, `description`, `all_zone_service`) VALUES
	(1, 'onnwheels', 'rental', '2024-05-02-66334f7a09b9d.png', 1, 5, '2023-08-15 23:31:17', '2024-05-09 21:23:04', '2024-05-02-66334f7a08dc2.png', 1, '<p>Demo module description.</p>', 0);

-- Dumping structure for table test.module_types
CREATE TABLE IF NOT EXISTS `module_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.module_types: ~0 rows (approximately)

-- Dumping structure for table test.module_wise_banners
CREATE TABLE IF NOT EXISTS `module_wise_banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `module_id` bigint unsigned NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.module_wise_banners: ~0 rows (approximately)

-- Dumping structure for table test.module_wise_why_chooses
CREATE TABLE IF NOT EXISTS `module_wise_why_chooses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `module_id` bigint unsigned NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.module_wise_why_chooses: ~0 rows (approximately)

-- Dumping structure for table test.module_zone
CREATE TABLE IF NOT EXISTS `module_zone` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `module_id` bigint unsigned NOT NULL,
  `zone_id` bigint unsigned NOT NULL,
  `per_km_shipping_charge` double(23,2) DEFAULT NULL,
  `minimum_shipping_charge` double(23,2) DEFAULT NULL,
  `maximum_cod_order_amount` double(23,2) DEFAULT NULL,
  `maximum_shipping_charge` double(23,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.module_zone: ~0 rows (approximately)
INSERT INTO `module_zone` (`id`, `module_id`, `zone_id`, `per_km_shipping_charge`, `minimum_shipping_charge`, `maximum_cod_order_amount`, `maximum_shipping_charge`) VALUES
	(1, 1, 1, 10.00, 10.00, 10.00, 10.00),
	(2, 1, 2, 100.00, 40.00, 2000.00, 200.00),
	(3, 1, 4, 100.00, 56.00, NULL, NULL);

-- Dumping structure for table test.newsletters
CREATE TABLE IF NOT EXISTS `newsletters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Subscribers email',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `newsletters_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.newsletters: ~0 rows (approximately)

-- Dumping structure for table test.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tergat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.notifications: ~0 rows (approximately)

-- Dumping structure for table test.notification_messages
CREATE TABLE IF NOT EXISTS `notification_messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `module_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.notification_messages: ~51 rows (approximately)
INSERT INTO `notification_messages` (`id`, `module_type`, `key`, `message`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'grocery', 'order_pending_message', '{userName}, Your  order {orderId} is successfully placed', 1, '2023-01-17 16:53:45', '2023-06-12 18:33:40'),
	(2, 'grocery', 'order_confirmation_msg', '{userName}, Your order {orderId} is confirmed', 1, '2023-01-17 16:53:45', '2023-06-12 18:33:40'),
	(3, 'grocery', 'order_processing_message', '{userName}, Your order is Processing by {storeName}', 1, '2023-01-17 16:53:45', '2023-06-12 18:33:40'),
	(4, 'grocery', 'order_handover_message', 'Delivery man is on the way. For this order {orderId}', 1, '2023-01-17 16:53:45', '2023-06-12 18:33:40'),
	(5, 'grocery', 'order_refunded_message', 'Order {orderId} Refunded successfully', 1, '2023-01-17 16:53:45', '2023-06-12 18:33:40'),
	(6, 'grocery', 'refund_request_canceled', 'Order {orderId}  Refund request is canceled', 1, '2023-01-17 16:53:45', '2023-06-12 18:33:40'),
	(7, 'grocery', 'out_for_delivery_message', '{userName}, Your order {orderId} is ready for delivery', 1, '2023-01-17 16:53:45', '2023-06-12 18:33:41'),
	(8, 'grocery', 'order_delivered_message', 'Your order {orderId} is delivered', 1, '2023-01-17 16:53:45', '2023-06-12 18:33:41'),
	(9, 'grocery', 'delivery_boy_assign_message', 'Your order {orderId} has been assigned to a delivery man', 1, '2023-01-17 16:53:45', '2023-06-12 18:33:41'),
	(10, 'grocery', 'delivery_boy_delivered_message', 'Order {orderId} delivered successfully', 1, '2023-01-17 16:53:45', '2023-06-12 18:33:41'),
	(11, 'grocery', 'order_cancled_message', 'Order {orderId} is canceled by your request', 1, '2023-01-17 16:53:45', '2023-06-12 18:33:41'),
	(12, 'food', 'order_pending_message', '{userName}, Your  order {orderId} is successfully placed', 1, '2023-01-17 16:56:00', '2023-06-12 19:19:14'),
	(13, 'food', 'order_confirmation_msg', '{userName}, Your order {orderId} is confirmed', 1, '2023-01-17 16:56:00', '2023-06-12 19:19:14'),
	(14, 'food', 'order_processing_message', '{userName}, Your food is started for cooking by {storeName}', 1, '2023-01-17 16:56:00', '2023-06-12 19:19:14'),
	(15, 'food', 'order_handover_message', 'Delivery man is on the way. For this order {orderId}', 1, '2023-01-17 16:56:00', '2023-06-12 19:19:14'),
	(16, 'food', 'order_refunded_message', 'Order {orderId} Refunded successfully', 1, '2023-01-17 16:56:00', '2023-06-12 19:19:14'),
	(17, 'food', 'refund_request_canceled', 'Order {orderId}  Refund request is canceled', 1, '2023-01-17 16:56:00', '2023-06-12 19:19:14'),
	(18, 'food', 'out_for_delivery_message', '{userName}, Your order {orderId}  is ready for delivery', 1, '2023-01-17 16:56:00', '2023-06-12 19:19:14'),
	(19, 'food', 'order_delivered_message', 'Your order {orderId} is delivered', 1, '2023-01-17 16:56:00', '2023-06-12 19:19:15'),
	(20, 'food', 'delivery_boy_assign_message', 'Your order {orderId} has been assigned to a delivery man', 1, '2023-01-17 16:56:00', '2023-06-12 19:19:15'),
	(21, 'food', 'delivery_boy_delivered_message', 'Order {orderId} delivered successfully', 1, '2023-01-17 16:56:00', '2023-06-12 19:19:15'),
	(22, 'food', 'order_cancled_message', 'Order {orderId} is canceled by your request', 1, '2023-01-17 16:56:00', '2023-06-12 19:19:15'),
	(23, 'pharmacy', 'order_pending_message', '{userName}, Your  order {orderId} is successfully placed', 1, '2023-01-17 16:57:46', '2023-06-12 19:22:20'),
	(24, 'pharmacy', 'order_confirmation_msg', '{userName}, Your order {orderId} is confirmed', 1, '2023-01-17 16:57:46', '2023-06-12 19:22:20'),
	(25, 'pharmacy', 'order_processing_message', '{userName}, Your order is Processing by {storeName}', 1, '2023-01-17 16:57:46', '2023-06-12 19:22:20'),
	(26, 'pharmacy', 'order_handover_message', 'Delivery man is on the way. For this order {orderId}', 1, '2023-01-17 16:57:46', '2023-06-12 19:22:20'),
	(27, 'pharmacy', 'order_refunded_message', 'Order {orderId} Refunded successfully', 1, '2023-01-17 16:57:46', '2023-06-12 19:22:20'),
	(28, 'pharmacy', 'refund_request_canceled', 'Order {orderId}  Refund request is canceled', 1, '2023-01-17 16:57:46', '2023-06-12 19:22:20'),
	(29, 'pharmacy', 'out_for_delivery_message', '{userName}, Your order {orderId} is ready for delivery', 1, '2023-01-17 16:57:46', '2023-06-12 19:22:20'),
	(30, 'pharmacy', 'order_delivered_message', 'Your order {orderId} is delivered', 1, '2023-01-17 16:57:46', '2023-06-12 19:22:20'),
	(31, 'pharmacy', 'delivery_boy_assign_message', 'Your order {orderId} has been assigned to a delivery man', 1, '2023-01-17 16:57:46', '2023-06-12 19:22:20'),
	(32, 'pharmacy', 'delivery_boy_delivered_message', 'Order {orderId} delivered successfully', 1, '2023-01-17 16:57:46', '2023-06-12 19:22:20'),
	(33, 'pharmacy', 'order_cancled_message', 'Order {orderId} is canceled by your request', 1, '2023-01-17 16:57:46', '2023-06-12 19:22:20'),
	(34, 'ecommerce', 'order_pending_message', '{userName}, Your  order {orderId} is successfully placed', 1, '2023-01-17 16:59:24', '2023-06-12 19:25:02'),
	(35, 'ecommerce', 'order_confirmation_msg', '{userName}, Your order {orderId} is confirmed', 1, '2023-01-17 16:59:24', '2023-06-12 19:25:02'),
	(36, 'ecommerce', 'order_processing_message', '{userName}, Your order is Processing by {storeName}', 1, '2023-01-17 16:59:24', '2023-06-12 19:25:02'),
	(37, 'ecommerce', 'order_handover_message', 'Delivery man is on the way. For this order {orderId}', 1, '2023-01-17 16:59:24', '2023-06-12 19:25:02'),
	(38, 'ecommerce', 'order_refunded_message', 'Order {orderId} Refunded successfully', 1, '2023-01-17 16:59:24', '2023-06-12 19:25:02'),
	(39, 'ecommerce', 'refund_request_canceled', 'Order {orderId}  Refund request is canceled', 1, '2023-01-17 16:59:24', '2023-06-12 19:25:02'),
	(40, 'ecommerce', 'out_for_delivery_message', '{userName}, Your order {orderId} is ready for delivery', 1, '2023-01-17 16:59:24', '2023-06-12 19:25:02'),
	(41, 'ecommerce', 'order_delivered_message', 'Your order {orderId} is delivered', 1, '2023-01-17 16:59:24', '2023-06-12 19:25:02'),
	(42, 'ecommerce', 'delivery_boy_assign_message', 'Your order {orderId} has been assigned to a delivery man', 1, '2023-01-17 16:59:24', '2023-06-12 19:25:02'),
	(43, 'ecommerce', 'delivery_boy_delivered_message', 'Order {orderId} delivered successfully', 1, '2023-01-17 16:59:24', '2023-06-12 19:25:02'),
	(44, 'ecommerce', 'order_cancled_message', 'Order {orderId} is canceled by your request', 1, '2023-01-17 16:59:24', '2023-06-12 19:25:02'),
	(45, 'parcel', 'order_pending_message', '{userName}, Your parcel order is successfully placed', 1, '2023-01-17 17:01:02', '2023-06-12 19:29:42'),
	(46, 'parcel', 'order_confirmation_msg', 'Your order {orderId} is confirmed', 1, '2023-01-17 17:01:02', '2023-06-12 19:29:42'),
	(47, 'parcel', 'out_for_delivery_message', 'Your parcel order  {orderId}  is ready for delivery', 1, '2023-01-17 17:01:02', '2023-06-12 19:29:42'),
	(48, 'parcel', 'order_delivered_message', 'Your parcel id  {orderId}  is delivered', 1, '2023-01-17 17:01:02', '2023-06-12 19:29:42'),
	(49, 'parcel', 'delivery_boy_assign_message', 'Your order {orderId}  has been assigned to a delivery man', 1, '2023-01-17 17:01:02', '2023-06-12 19:29:42'),
	(50, 'parcel', 'delivery_boy_delivered_message', 'parcel id  {orderId}  delivered successfully', 1, '2023-01-17 17:01:02', '2023-06-12 19:29:42'),
	(51, 'parcel', 'order_cancled_message', 'Order is canceled by your request', 1, '2023-01-17 17:01:02', '2023-01-17 17:01:02');

-- Dumping structure for table test.oauth_access_tokens
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `client_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.oauth_access_tokens: ~22 rows (approximately)
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
	('072cb62032eb247cbe5d588139acc4d88a4405b34ee6b0c4ed53011e657423ef9e9f34066806c64f', 26, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-10 20:39:10', '2024-05-10 20:39:10', '2025-05-11 02:09:10'),
	('19945962d133f6fa14f0d2347a0eb60f98e15619ae107303edd27b264634ed4f5b48549757230e8f', 25, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-06 00:50:02', '2024-05-06 00:50:02', '2025-05-06 06:20:02'),
	('2051f4ac3ca0836d7e60b8d2cba902deb1bd3ab257e77d1f35e1a0e912e738b13f04e7597d47cb59', 26, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-10 21:13:45', '2024-05-10 21:13:45', '2025-05-11 02:43:45'),
	('253753c00f92df0f6ef4af4d424c55bed61bfea7bb04f78d0952cecdac43b5c10b7407be2a49750b', 26, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-10 20:32:10', '2024-05-10 20:32:10', '2025-05-11 02:02:10'),
	('2b0dad1e0b67faa210a92c674fbb7f66a05256dbfc256d353312837cf160e1b0845db5bf308d871e', 26, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-10 20:36:59', '2024-05-10 20:36:59', '2025-05-11 02:06:59'),
	('3ddd41531a438b1e4aa16a98ae21b89fcc913cf5d23cf2b77c0fe9c33373383bd070012c9dfe9c5b', 26, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-10 20:37:48', '2024-05-10 20:37:48', '2025-05-11 02:07:48'),
	('4d34ea2a1d79b087ba5718b865199ef398af9e0380fb5e0361bab8c17998ac44f4c2cdbc9f19b1e5', 25, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-06 00:51:28', '2024-05-06 00:51:28', '2025-05-06 06:21:28'),
	('502c420379b243f1e8f57b1f39dcbf03c722beeb3509415d9d24cbe462040e8fe0eebab953b6c089', 26, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-10 20:34:03', '2024-05-10 20:34:03', '2025-05-11 02:04:03'),
	('607a68605ee9b7772316a6b46a19d8a0bdd18048c9a5a72703bedc7b3f3e5eedc149e6fc98e4c0d8', 26, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-10 20:45:23', '2024-05-10 20:45:23', '2025-05-11 02:15:23'),
	('6241e6b462c696a147559e8975f19cfb6ea49ef177b9d59a558f2b9a15b2bff29a3c6db017049437', 26, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-10 20:36:06', '2024-05-10 20:36:06', '2025-05-11 02:06:06'),
	('624392519ee4032b2c216c993f11cfd26dde258b37d64ff9f8081fa2a1ab53231a9b94f9ba86a446', 26, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-10 20:43:28', '2024-05-10 20:43:28', '2025-05-11 02:13:28'),
	('6eab738f5371f0094fbce27228bd6289285bdfa51bfe35c590b175ff5739312629c741e0fac1e8db', 26, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-10 21:14:28', '2024-05-10 21:14:28', '2025-05-11 02:44:28'),
	('6fb40da8759d81aad1de12db7379fc4d251c8788b85c26ddad6d157c23b3ea954c9f629aa4c6c941', 26, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-10 20:42:39', '2024-05-10 20:42:39', '2025-05-11 02:12:39'),
	('75016fe79d273ee59de181c67771ab970c132a723349d35a7610f0430b03b770a56163d9c3862a90', 26, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-10 21:16:24', '2024-05-10 21:16:24', '2025-05-11 02:46:24'),
	('762fd2fe0fce720b1cdc15d2cdd0b86bb25ce27f8d3eb4c8652529840625bb715cfc935eb22e70ed', 24, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-05 22:36:21', '2024-05-05 22:36:21', '2025-05-06 04:06:21'),
	('7e8108b2256addb1393e019592c1eb268bf5879db0910213857e07387caea9b49e8b4f854d8c0cca', 26, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-10 20:23:51', '2024-05-10 20:23:51', '2025-05-11 01:53:51'),
	('88d8dc679b2b002c9d500cd3f6647277b5fdb6a98710a8b90e6f52fd91b87504068e8b8d0f86a481', 25, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-06 02:24:57', '2024-05-06 02:24:57', '2025-05-06 07:54:57'),
	('b8579a28b56ac5a6a8b377a75e50fdcc451281e402b5487e4a1d9c281ab04158ddd73d6b0ecbbccb', 24, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-05 23:34:58', '2024-05-05 23:34:58', '2025-05-06 05:04:58'),
	('cf2071271dbc9211f09d2b2259a5c90374dca2f5e3370b34156534972326c98fccb98adfe1099dd1', 26, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-10 21:12:06', '2024-05-10 21:12:06', '2025-05-11 02:42:06'),
	('d285c84c52237a6dc24ce971637f720284fec4d3a545657d7101f52787b7e793b631f59b324fd985', 26, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-10 20:20:38', '2024-05-10 20:20:39', '2025-05-11 01:50:38'),
	('d79570ed4cef8fc6c46451699084ee2084fa74f53b230027049583b2308382281346404730aec7ac', 26, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-10 20:33:55', '2024-05-10 20:33:55', '2025-05-11 02:03:55'),
	('e1c83a702d7203bdd20179221723b4c508006d5076565e767f96d8e76d6da5010be33f654231f6e4', 24, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-08 18:54:03', '2024-05-08 18:54:03', '2025-05-09 00:24:03'),
	('e3886611dd1722454e9ff7d45707bfa56f73a6123e9198ddce882bc3c27e4e86a110e4e31a913277', 26, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-10 20:34:21', '2024-05-10 20:34:21', '2025-05-11 02:04:21'),
	('f06de702ae06a2d71ab6a41de19cfc6c91d2c72c56f017ed31754d1fa1112c966d77036b484770e9', 26, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-10 20:20:56', '2024-05-10 20:20:56', '2025-05-11 01:50:56'),
	('f32467cde78a08136baae42ff7915ac40ac30b68558eec31f1eb4be4773e4a838e3d1ce33ebb9503', 26, 3, 'RestaurantCustomerAuth', '[]', 0, '2024-05-10 20:39:35', '2024-05-10 20:39:35', '2025-05-11 02:09:35');

-- Dumping structure for table test.oauth_auth_codes
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `client_id` bigint unsigned NOT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.oauth_auth_codes: ~0 rows (approximately)

-- Dumping structure for table test.oauth_clients
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.oauth_clients: ~4 rows (approximately)
INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Laravel Personal Access Client', 'qBN0j6SW6nIf47748tgxaKxnqKqCacTxa6gii8yc', NULL, 'http://localhost', 1, 0, 0, '2021-08-19 20:44:50', '2021-08-19 20:44:50'),
	(2, NULL, 'Laravel Password Grant Client', 'oqQ90HOU0egjgQ01LRzHo9rADUavq16jzWm1TrjT', 'users', 'http://localhost', 0, 1, 0, '2021-08-19 20:44:50', '2021-08-19 20:44:50'),
	(3, NULL, 'stackfood Personal Access Client', 'iRxXixYp4CDo7TWbWNCMelAUwgtScaEMGudnbHQk', NULL, 'http://localhost', 1, 0, 0, '2022-01-05 10:22:36', '2022-01-05 10:22:36'),
	(4, NULL, 'stackfood Password Grant Client', 'FzGJ1vSlbfGP2mWqF6V575QgVCEfbBHVNA41ApeC', 'users', 'http://localhost', 0, 1, 0, '2022-01-05 10:22:36', '2022-01-05 10:22:36');

-- Dumping structure for table test.oauth_personal_access_clients
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.oauth_personal_access_clients: ~2 rows (approximately)
INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2021-08-19 20:44:50', '2021-08-19 20:44:50'),
	(2, 3, '2022-01-05 10:22:36', '2022-01-05 10:22:36');

-- Dumping structure for table test.oauth_refresh_tokens
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.oauth_refresh_tokens: ~0 rows (approximately)

-- Dumping structure for table test.offline_payments
CREATE TABLE IF NOT EXISTS `offline_payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `payment_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `customer_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `method_fields` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.offline_payments: ~0 rows (approximately)

-- Dumping structure for table test.offline_payment_methods
CREATE TABLE IF NOT EXISTS `offline_payment_methods` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `method_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_fields` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_informations` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.offline_payment_methods: ~0 rows (approximately)

-- Dumping structure for table test.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `order_amount` decimal(24,2) NOT NULL DEFAULT '0.00',
  `coupon_discount_amount` decimal(24,2) NOT NULL DEFAULT '0.00',
  `coupon_discount_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `order_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `total_tax_amount` decimal(24,2) NOT NULL DEFAULT '0.00',
  `payment_method` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_reference` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_address_id` bigint DEFAULT NULL,
  `delivery_man_id` bigint unsigned DEFAULT NULL,
  `coupon_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `order_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'delivery',
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  `store_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_charge` decimal(24,2) NOT NULL DEFAULT '0.00',
  `schedule_at` timestamp NULL DEFAULT NULL,
  `callback` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pending` timestamp NULL DEFAULT NULL,
  `accepted` timestamp NULL DEFAULT NULL,
  `confirmed` timestamp NULL DEFAULT NULL,
  `processing` timestamp NULL DEFAULT NULL,
  `handover` timestamp NULL DEFAULT NULL,
  `picked_up` timestamp NULL DEFAULT NULL,
  `delivered` timestamp NULL DEFAULT NULL,
  `canceled` timestamp NULL DEFAULT NULL,
  `refund_requested` timestamp NULL DEFAULT NULL,
  `refunded` timestamp NULL DEFAULT NULL,
  `delivery_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `scheduled` tinyint(1) NOT NULL DEFAULT '0',
  `store_discount_amount` decimal(24,2) NOT NULL DEFAULT '0.00',
  `original_delivery_charge` decimal(24,2) NOT NULL DEFAULT '0.00',
  `failed` timestamp NULL DEFAULT NULL,
  `adjusment` decimal(24,2) NOT NULL DEFAULT '0.00',
  `edited` tinyint(1) NOT NULL DEFAULT '0',
  `delivery_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone_id` bigint unsigned DEFAULT NULL,
  `module_id` bigint unsigned NOT NULL DEFAULT '1',
  `order_attachment` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parcel_category_id` bigint unsigned DEFAULT NULL,
  `receiver_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `charge_payer` enum('sender','receiver') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distance` double(16,3) NOT NULL DEFAULT '0.000',
  `dm_tips` double(24,2) NOT NULL DEFAULT '0.00',
  `free_delivery_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refund_request_canceled` timestamp NULL DEFAULT NULL,
  `prescription_order` tinyint(1) NOT NULL DEFAULT '0',
  `tax_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dm_vehicle_id` bigint unsigned DEFAULT NULL,
  `cancellation_reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `canceled_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_on_product_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vendor',
  `processing_time` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unavailable_item_note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cutlery` tinyint(1) NOT NULL DEFAULT '0',
  `delivery_instruction` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tax_percentage` double(24,3) DEFAULT NULL,
  `additional_charge` double(23,3) NOT NULL DEFAULT '0.000',
  `order_proof` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partially_paid_amount` double(23,3) NOT NULL DEFAULT '0.000',
  `is_guest` tinyint(1) NOT NULL DEFAULT '0',
  `flash_admin_discount_amount` double(24,3) NOT NULL DEFAULT '0.000',
  `flash_store_discount_amount` double(24,3) NOT NULL DEFAULT '0.000',
  PRIMARY KEY (`id`),
  KEY `zone_id` (`zone_id`),
  KEY `orders_module_id_foreign` (`module_id`),
  CONSTRAINT `orders_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100020 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.orders: ~8 rows (approximately)
INSERT INTO `orders` (`id`, `user_id`, `order_amount`, `coupon_discount_amount`, `coupon_discount_title`, `payment_status`, `order_status`, `total_tax_amount`, `payment_method`, `transaction_reference`, `delivery_address_id`, `delivery_man_id`, `coupon_code`, `order_note`, `order_type`, `checked`, `store_id`, `created_at`, `updated_at`, `delivery_charge`, `schedule_at`, `callback`, `otp`, `pending`, `accepted`, `confirmed`, `processing`, `handover`, `picked_up`, `delivered`, `canceled`, `refund_requested`, `refunded`, `delivery_address`, `scheduled`, `store_discount_amount`, `original_delivery_charge`, `failed`, `adjusment`, `edited`, `delivery_time`, `zone_id`, `module_id`, `order_attachment`, `parcel_category_id`, `receiver_details`, `charge_payer`, `distance`, `dm_tips`, `free_delivery_by`, `refund_request_canceled`, `prescription_order`, `tax_status`, `dm_vehicle_id`, `cancellation_reason`, `canceled_by`, `coupon_created_by`, `discount_on_product_by`, `processing_time`, `unavailable_item_note`, `cutlery`, `delivery_instruction`, `tax_percentage`, `additional_charge`, `order_proof`, `partially_paid_amount`, `is_guest`, `flash_admin_discount_amount`, `flash_store_discount_amount`) VALUES
	(100012, 27, 250.00, 0.00, NULL, 'paid', 'pending', 0.00, NULL, 'pay_ODRWm4CiEMpf91', NULL, NULL, NULL, NULL, 'delivery', 0, NULL, '2024-05-21 20:06:15', '2024-05-21 20:06:15', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LuLu Hypermarket Coimbatore, Avinashi Road, GM Nagar, Pudur, Pappanaickenpalayam, Tamil Nadu, India', 0, 0.00, 0.00, NULL, 0.00, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0.000, 0.00, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'vendor', NULL, NULL, 0, NULL, NULL, 0.000, NULL, 0.000, 0, 0.000, 0.000),
	(100013, 27, 6250.00, 0.00, NULL, 'paid', 'pending', 0.00, NULL, 'pay_ODRgZjJhwFo8Au', NULL, NULL, NULL, NULL, 'delivery', 0, NULL, '2024-05-21 20:15:32', '2024-05-21 20:15:32', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LuLu Hypermarket Coimbatore, Avinashi Road, GM Nagar, Pudur, Pappanaickenpalayam, Tamil Nadu, India', 0, 0.00, 0.00, NULL, 0.00, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0.000, 0.00, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'vendor', NULL, NULL, 0, NULL, NULL, 0.000, NULL, 0.000, 0, 0.000, 0.000),
	(100014, 27, 400.00, 0.00, NULL, 'paid', 'pending', 0.00, NULL, 'pay_ODVosNk08hD3aB', NULL, NULL, NULL, NULL, 'delivery', 0, NULL, '2024-05-22 00:18:09', '2024-05-22 00:18:09', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LuLu Hypermarket Coimbatore, Avinashi Road, GM Nagar, Pudur, Coimbatore, Pappanaickenpalayam, Tamil Nadu, India', 0, 0.00, 0.00, NULL, 0.00, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0.000, 0.00, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'vendor', NULL, NULL, 0, NULL, NULL, 0.000, NULL, 0.000, 0, 0.000, 0.000),
	(100015, 27, 3750.00, 0.00, NULL, 'paid', 'pending', 0.00, NULL, 'pay_ODVtiUcSMbxJ2H', NULL, NULL, NULL, NULL, 'delivery', 0, 2, '2024-05-22 00:22:43', '2024-05-22 00:22:43', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Lulu Mall, Lucknow, Amar Shaheed Path, Golf City, Sector B Ansal API, Lucknow, Uttar Pradesh, India', 0, 0.00, 0.00, NULL, 0.00, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0.000, 0.00, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'vendor', NULL, NULL, 0, NULL, NULL, 0.000, NULL, 0.000, 0, 0.000, 0.000),
	(100016, 27, 1500.00, 0.00, NULL, 'paid', 'confirmed', 0.00, 'null', 'pay_OFUqlQXjv3xKkC', NULL, NULL, NULL, NULL, 'delivery', 1, 3, '2024-05-27 00:39:12', '2024-05-28 01:08:36', 0.00, NULL, NULL, NULL, NULL, NULL, '2024-05-28 01:08:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LuLu Hypermarket Coimbatore, Avinashi Road, GM Nagar, Pudur, Pappanaickenpalayam, Tamil Nadu, India', 0, 0.00, 0.00, NULL, 0.00, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0.000, 0.00, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, 'vendor', NULL, NULL, 0, NULL, NULL, 0.000, NULL, 0.000, 0, 0.000, 0.000),
	(100017, 27, 15000.00, 0.00, NULL, 'paid', 'delivered', 0.00, NULL, 'pay_OGBeX8378OylBN', NULL, NULL, NULL, NULL, 'delivery', 1, 3, '2024-05-28 18:31:25', '2024-05-30 20:56:21', 0.00, NULL, NULL, NULL, NULL, NULL, '2024-05-28 18:33:18', NULL, NULL, NULL, '2024-05-28 18:33:29', NULL, NULL, NULL, 'Lulu Mall Bengaluru, Gopalapura, Binnipete, Bengaluru, Karnataka, India', 0, 0.00, 0.00, NULL, 0.00, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0.000, 0.00, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'vendor', NULL, NULL, 0, NULL, NULL, 0.000, NULL, 0.000, 0, 0.000, 0.000),
	(100018, 27, 300.00, 0.00, NULL, 'paid', 'pending', 0.00, NULL, 'pay_OH09J0dM1xxx0l', NULL, NULL, NULL, NULL, 'delivery', 1, 3, '2024-05-30 19:55:12', '2024-05-30 20:56:21', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LuLu Forex, Mother Teresa Sarani, Park Street area, Kolkata, West Bengal, India', 0, 0.00, 0.00, NULL, 0.00, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0.000, 0.00, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'vendor', NULL, NULL, 0, NULL, NULL, 0.000, NULL, 0.000, 0, 0.000, 0.000),
	(100019, 27, 200.00, 0.00, NULL, 'paid', 'pending', 0.00, NULL, 'pay_OH0fjIVVFhkfB0', NULL, NULL, NULL, NULL, 'delivery', 1, 3, '2024-05-30 20:25:54', '2024-05-30 20:56:21', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{"contact_person_name":"Keerthi","contact_person_number":"9384955593","contact_person_email":"kiruthika4301@gmail.com","address_type":"Delivery","address":"LuLu Hypermarket Coimbatore, Avinashi Road, GM Nagar, Pudur, Coimbatore, Pappanaickenpalayam, Tamil Nadu, India","road":"","house":"","longitude":"76.987876","latitude":"11.0123154"}', 0, 0.00, 0.00, NULL, 0.00, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0.000, 0.00, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'vendor', NULL, NULL, 0, NULL, NULL, 0.000, NULL, 0.000, 0, 0.000, 0.000);

-- Dumping structure for table test.order_cancel_reasons
CREATE TABLE IF NOT EXISTS `order_cancel_reasons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.order_cancel_reasons: ~0 rows (approximately)

-- Dumping structure for table test.order_delivery_histories
CREATE TABLE IF NOT EXISTS `order_delivery_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned DEFAULT NULL,
  `delivery_man_id` bigint unsigned DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `start_location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.order_delivery_histories: ~0 rows (approximately)

-- Dumping structure for table test.order_details
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `item_id` bigint unsigned DEFAULT NULL,
  `order_id` bigint unsigned DEFAULT NULL,
  `price` decimal(24,2) NOT NULL DEFAULT '0.00',
  `item_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `variation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `add_ons` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `discount_on_item` decimal(24,2) DEFAULT NULL,
  `discount_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'amount',
  `quantity` int NOT NULL DEFAULT '1',
  `tax_amount` decimal(24,2) NOT NULL DEFAULT '1.00',
  `variant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_campaign_id` bigint unsigned DEFAULT NULL,
  `total_add_on_price` decimal(24,2) NOT NULL DEFAULT '0.00',
  `start_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distance` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.order_details: ~8 rows (approximately)
INSERT INTO `order_details` (`id`, `item_id`, `order_id`, `price`, `item_details`, `variation`, `add_ons`, `discount_on_item`, `discount_type`, `quantity`, `tax_amount`, `variant`, `created_at`, `updated_at`, `item_campaign_id`, `total_add_on_price`, `start_date`, `end_date`, `distance`) VALUES
	(81, 22, 100012, 250.00, NULL, NULL, NULL, NULL, 'amount', 1, 1.00, NULL, '2024-05-21 20:06:15', '2024-05-21 20:06:15', NULL, 0.00, 'May 22, 2024  3:00 PM', 'May 22, 2024  4:00 PM', NULL),
	(82, 22, 100013, 6250.00, NULL, NULL, NULL, NULL, 'amount', 1, 1.00, NULL, '2024-05-21 20:15:32', '2024-05-21 20:15:32', NULL, 0.00, 'May 22, 2024  12:00 PM', 'May 23, 2024  1:00 PM', NULL),
	(83, 21, 100014, 400.00, NULL, NULL, NULL, NULL, 'amount', 1, 1.00, NULL, '2024-05-22 00:18:09', '2024-05-22 00:18:09', NULL, 0.00, NULL, NULL, 4),
	(84, 20, 100015, 3750.00, NULL, NULL, NULL, NULL, 'amount', 1, 1.00, NULL, '2024-05-22 00:22:44', '2024-05-22 00:22:44', NULL, 0.00, 'May 22, 2024  4:00 PM', 'May 23, 2024  5:00 PM', NULL),
	(85, 26, 100016, 1500.00, NULL, NULL, NULL, NULL, 'amount', 1, 1.00, NULL, '2024-05-27 00:39:12', '2024-05-27 00:39:12', NULL, 0.00, NULL, NULL, 3),
	(86, 21, 100017, 15000.00, NULL, NULL, NULL, NULL, 'amount', 1, 1.00, NULL, '2024-05-28 18:31:25', '2024-05-28 18:31:25', NULL, 0.00, 'May 29, 2024  10:00 AM', 'May 30, 2024  11:00 AM', NULL),
	(87, 21, 100018, 300.00, NULL, NULL, NULL, NULL, 'amount', 1, 1.00, NULL, '2024-05-30 19:55:12', '2024-05-30 19:55:12', NULL, 0.00, NULL, NULL, 3),
	(88, 21, 100019, 200.00, NULL, NULL, NULL, NULL, 'amount', 1, 1.00, NULL, '2024-05-30 20:25:54', '2024-05-30 20:25:54', NULL, 0.00, NULL, NULL, 2);

-- Dumping structure for table test.order_payments
CREATE TABLE IF NOT EXISTS `order_payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `transaction_ref` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `payment_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.order_payments: ~8 rows (approximately)
INSERT INTO `order_payments` (`id`, `order_id`, `transaction_ref`, `amount`, `payment_status`, `payment_method`, `created_at`, `updated_at`) VALUES
	(4, 100012, 'pay_ODRWm4CiEMpf91', 250.00, 'Paid', 'Razorpay', '2024-05-21 20:06:15', '2024-05-21 20:06:15'),
	(5, 100013, 'pay_ODRgZjJhwFo8Au', 6250.00, 'Paid', 'Razorpay', '2024-05-21 20:15:32', '2024-05-21 20:15:32'),
	(6, 100014, 'pay_ODVosNk08hD3aB', 400.00, 'Paid', 'Razorpay', '2024-05-22 00:18:09', '2024-05-22 00:18:09'),
	(7, 100015, 'pay_ODVtiUcSMbxJ2H', 3750.00, 'Paid', 'Razorpay', '2024-05-22 00:22:44', '2024-05-22 00:22:44'),
	(8, 100016, 'pay_OFUqlQXjv3xKkC', 1500.00, 'Paid', 'Razorpay', '2024-05-27 00:39:12', '2024-05-27 00:39:12'),
	(9, 100017, 'pay_OGBeX8378OylBN', 15000.00, 'Paid', 'Razorpay', '2024-05-28 18:31:25', '2024-05-28 18:31:25'),
	(10, 100018, 'pay_OH09J0dM1xxx0l', 300.00, 'Paid', 'Razorpay', '2024-05-30 19:55:12', '2024-05-30 19:55:12'),
	(11, 100019, 'pay_OH0fjIVVFhkfB0', 200.00, 'Paid', 'Razorpay', '2024-05-30 20:25:54', '2024-05-30 20:25:54');

-- Dumping structure for table test.order_references
CREATE TABLE IF NOT EXISTS `order_references` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `is_reviewed` tinyint(1) NOT NULL DEFAULT '0',
  `is_review_canceled` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.order_references: ~4 rows (approximately)
INSERT INTO `order_references` (`id`, `order_id`, `is_reviewed`, `is_review_canceled`, `created_at`, `updated_at`) VALUES
	(12, 100012, 0, 0, '2024-05-21 20:06:15', '2024-05-21 20:06:15'),
	(13, 100013, 0, 0, '2024-05-21 20:15:32', '2024-05-21 20:15:32'),
	(14, 100014, 0, 0, '2024-05-22 00:18:09', '2024-05-22 00:18:09'),
	(15, 100015, 0, 0, '2024-05-22 00:22:44', '2024-05-22 00:22:44'),
	(16, 100016, 0, 0, '2024-05-27 00:39:12', '2024-05-27 00:39:12'),
	(17, 100017, 0, 0, '2024-05-28 18:31:25', '2024-05-28 18:31:25'),
	(18, 100018, 0, 0, '2024-05-30 19:55:12', '2024-05-30 19:55:12'),
	(19, 100019, 0, 0, '2024-05-30 20:25:54', '2024-05-30 20:25:54');

-- Dumping structure for table test.order_transactions
CREATE TABLE IF NOT EXISTS `order_transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `vendor_id` bigint unsigned DEFAULT NULL,
  `delivery_man_id` bigint unsigned DEFAULT NULL,
  `order_id` bigint unsigned NOT NULL,
  `order_amount` decimal(24,2) NOT NULL,
  `store_amount` decimal(24,2) NOT NULL DEFAULT '0.00',
  `admin_commission` decimal(24,2) NOT NULL,
  `received_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_charge` decimal(24,2) NOT NULL DEFAULT '0.00',
  `original_delivery_charge` decimal(24,2) NOT NULL DEFAULT '0.00',
  `tax` decimal(24,2) NOT NULL DEFAULT '0.00',
  `zone_id` bigint unsigned DEFAULT NULL,
  `module_id` bigint unsigned NOT NULL,
  `parcel_catgory_id` bigint unsigned DEFAULT NULL,
  `dm_tips` double(24,2) NOT NULL DEFAULT '0.00',
  `delivery_fee_comission` double(24,2) NOT NULL DEFAULT '0.00',
  `admin_expense` decimal(23,3) DEFAULT '0.000',
  `store_expense` double(23,3) DEFAULT '0.000',
  `discount_amount_by_store` double(23,3) DEFAULT '0.000',
  `additional_charge` double(23,3) NOT NULL DEFAULT '0.000',
  PRIMARY KEY (`id`),
  KEY `order_transactions_zone_id_index` (`zone_id`),
  KEY `order_transactions_module_id_foreign` (`module_id`),
  CONSTRAINT `order_transactions_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.order_transactions: ~0 rows (approximately)
INSERT INTO `order_transactions` (`id`, `vendor_id`, `delivery_man_id`, `order_id`, `order_amount`, `store_amount`, `admin_commission`, `received_by`, `status`, `created_at`, `updated_at`, `delivery_charge`, `original_delivery_charge`, `tax`, `zone_id`, `module_id`, `parcel_catgory_id`, `dm_tips`, `delivery_fee_comission`, `admin_expense`, `store_expense`, `discount_amount_by_store`, `additional_charge`) VALUES
	(1, 3, NULL, 100017, 15000.00, 13500.00, 1500.00, 'admin', NULL, '2024-05-28 18:33:29', '2024-05-28 18:33:29', 0.00, 0.00, 0.00, NULL, 1, NULL, 0.00, 0.00, 0.000, 0.000, 0.000, 0.000);

-- Dumping structure for table test.parcel_categories
CREATE TABLE IF NOT EXISTS `parcel_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `orders_count` int NOT NULL DEFAULT '0',
  `module_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parcel_per_km_shipping_charge` double(23,2) DEFAULT NULL,
  `parcel_minimum_shipping_charge` double(23,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `parcel_categories_name_unique` (`name`),
  KEY `parcel_categories_module_id_foreign` (`module_id`),
  CONSTRAINT `parcel_categories_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.parcel_categories: ~0 rows (approximately)

-- Dumping structure for table test.parcel_delivery_instructions
CREATE TABLE IF NOT EXISTS `parcel_delivery_instructions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `instruction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.parcel_delivery_instructions: ~0 rows (approximately)

-- Dumping structure for table test.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `otp_hit_count` tinyint NOT NULL DEFAULT '0',
  `is_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `is_temp_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `temp_block_time` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.password_resets: ~0 rows (approximately)
INSERT INTO `password_resets` (`email`, `token`, `created_at`, `otp_hit_count`, `is_blocked`, `is_temp_blocked`, `temp_block_time`, `created_by`) VALUES
	('admin@admin.com', 'P5WJXA1DXGBWFDP', '2024-05-21 02:10:07', 0, 0, 0, NULL, 'admin');

-- Dumping structure for table test.payment_requests
CREATE TABLE IF NOT EXISTS `payment_requests` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_id` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_id` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_amount` decimal(24,2) NOT NULL DEFAULT '0.00',
  `gateway_callback_url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `success_hook` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `failure_hook` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USD',
  `payment_method` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payer_information` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `external_redirect_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_information` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `attribute_id` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_platform` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.payment_requests: ~0 rows (approximately)

-- Dumping structure for table test.pharmacy_item_details
CREATE TABLE IF NOT EXISTS `pharmacy_item_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `item_id` bigint unsigned DEFAULT NULL,
  `common_condition_id` bigint unsigned DEFAULT NULL,
  `is_basic` tinyint(1) NOT NULL DEFAULT '0',
  `temp_product_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.pharmacy_item_details: ~0 rows (approximately)

-- Dumping structure for table test.phone_verifications
CREATE TABLE IF NOT EXISTS `phone_verifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `otp_hit_count` tinyint NOT NULL DEFAULT '0',
  `is_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `is_temp_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `temp_block_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone_verifications_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.phone_verifications: ~4 rows (approximately)
INSERT INTO `phone_verifications` (`id`, `phone`, `token`, `created_at`, `updated_at`, `otp_hit_count`, `is_blocked`, `is_temp_blocked`, `temp_block_time`) VALUES
	(4, '9655800621', '7110', '2024-05-04 02:20:14', '2024-05-04 02:20:14', 0, 0, 0, NULL),
	(6, '9655804621', '5259', '2024-05-08 18:53:26', '2024-05-08 18:53:26', 0, 0, 0, NULL),
	(8, '9597755160', '8203', '2024-05-06 02:24:34', '2024-05-06 02:24:34', 0, 0, 0, NULL),
	(9, '9655804620', '9055', '2024-05-10 20:20:39', '2024-05-10 20:20:39', 0, 0, 0, NULL);

-- Dumping structure for table test.provide_d_m_earnings
CREATE TABLE IF NOT EXISTS `provide_d_m_earnings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `delivery_man_id` bigint unsigned NOT NULL,
  `amount` decimal(24,2) NOT NULL DEFAULT '0.00',
  `method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.provide_d_m_earnings: ~0 rows (approximately)

-- Dumping structure for table test.react_testimonials
CREATE TABLE IF NOT EXISTS `react_testimonials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `reviewer_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.react_testimonials: ~0 rows (approximately)
INSERT INTO `react_testimonials` (`id`, `name`, `designation`, `review`, `reviewer_image`, `company_image`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'John Doe', 'CTO', 'Very good Service.', '2023-08-16-64dcad86217a2.png', 'def.png', 1, '2023-08-16 00:05:42', '2023-08-16 00:05:42');

-- Dumping structure for table test.refunds
CREATE TABLE IF NOT EXISTS `refunds` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `order_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `admin_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `refund_amount` decimal(23,3) NOT NULL DEFAULT '0.000',
  `refund_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `refund_method` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.refunds: ~0 rows (approximately)

-- Dumping structure for table test.refund_reasons
CREATE TABLE IF NOT EXISTS `refund_reasons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.refund_reasons: ~0 rows (approximately)

-- Dumping structure for table test.reviews
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `item_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `comment` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `attachment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int NOT NULL DEFAULT '0',
  `order_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_campaign_id` bigint unsigned DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `module_id` bigint(20) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_module_id_foreign` (`module_id`),
  CONSTRAINT `reviews_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.reviews: ~0 rows (approximately)

-- Dumping structure for table test.social_media
CREATE TABLE IF NOT EXISTS `social_media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.social_media: ~0 rows (approximately)

-- Dumping structure for table test.soft_credentials
CREATE TABLE IF NOT EXISTS `soft_credentials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.soft_credentials: ~0 rows (approximately)

-- Dumping structure for table test.stations
CREATE TABLE IF NOT EXISTS `stations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone_id` int NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lon` decimal(11,8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.stations: ~1 rows (approximately)
INSERT INTO `stations` (`id`, `name`, `address`, `zone_id`, `lat`, `lon`, `created_at`, `updated_at`) VALUES
	(1, 'new station', 'banagalore, koramnagala', 4, 12.93989902, 77.55959439, '2024-06-07 11:50:40', '2024-06-07 11:50:40'),
	(2, 'new station', 'koranmagala, bakgalore', 4, 12.95462118, 77.56096768, '2024-06-07 11:55:04', '2024-06-07 11:55:04');

-- Dumping structure for table test.stores
CREATE TABLE IF NOT EXISTS `stores` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `footer_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `minimum_order` decimal(24,2) NOT NULL DEFAULT '0.00',
  `comission` decimal(24,2) DEFAULT NULL,
  `schedule_order` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `vendor_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `free_delivery` tinyint(1) NOT NULL DEFAULT '0',
  `rating` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery` tinyint(1) NOT NULL DEFAULT '1',
  `take_away` tinyint(1) NOT NULL DEFAULT '1',
  `item_section` tinyint(1) NOT NULL DEFAULT '1',
  `tax` decimal(24,2) NOT NULL DEFAULT '0.00',
  `zone_id` bigint unsigned DEFAULT NULL,
  `reviews_section` tinyint(1) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `off_day` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `gst` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `self_delivery_system` tinyint(1) NOT NULL DEFAULT '0',
  `pos_system` tinyint(1) NOT NULL DEFAULT '0',
  `minimum_shipping_charge` decimal(24,2) NOT NULL DEFAULT '0.00',
  `delivery_time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '30-40',
  `veg` tinyint(1) NOT NULL DEFAULT '1',
  `non_veg` tinyint(1) NOT NULL DEFAULT '1',
  `order_count` int unsigned NOT NULL DEFAULT '0',
  `total_order` int unsigned NOT NULL DEFAULT '0',
  `module_id` bigint unsigned NOT NULL,
  `order_place_to_schedule_interval` int DEFAULT '0',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `per_km_shipping_charge` double(16,3) unsigned NOT NULL DEFAULT '0.000',
  `prescription_order` tinyint(1) NOT NULL DEFAULT '0',
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maximum_shipping_charge` double(23,3) DEFAULT NULL,
  `cutlery` tinyint(1) NOT NULL DEFAULT '0',
  `meta_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `announcement` tinyint(1) NOT NULL DEFAULT '0',
  `announcement_message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `restaurants_phone_unique` (`phone`),
  KEY `stores_module_id_foreign` (`module_id`),
  CONSTRAINT `stores_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.stores: ~1 rows (approximately)
INSERT INTO `stores` (`id`, `name`, `phone`, `email`, `logo`, `latitude`, `longitude`, `address`, `footer_text`, `minimum_order`, `comission`, `schedule_order`, `status`, `vendor_id`, `created_at`, `updated_at`, `free_delivery`, `rating`, `cover_photo`, `delivery`, `take_away`, `item_section`, `tax`, `zone_id`, `reviews_section`, `active`, `off_day`, `gst`, `self_delivery_system`, `pos_system`, `minimum_shipping_charge`, `delivery_time`, `veg`, `non_veg`, `order_count`, `total_order`, `module_id`, `order_place_to_schedule_interval`, `featured`, `per_km_shipping_charge`, `prescription_order`, `slug`, `maximum_shipping_charge`, `cutlery`, `meta_title`, `meta_description`, `meta_image`, `announcement`, `announcement_message`) VALUES
	(3, 'Kiruthika', '+919384955593', 'kiruthika@gmail.com', '2024-05-08-663b291a9d99e.png', '11.00437789209159', '76.99087068631663', 'puliyakulam, coimbatore', NULL, 0.00, NULL, 0, 1, 3, '2024-05-07 20:56:18', '2024-05-28 18:33:29', 0, NULL, '2024-05-08-663b291aa788e.png', 1, 1, 1, 20.00, 2, 1, 1, ' ', NULL, 0, 0, 0.00, '30-40 min', 1, 1, 1, 0, 1, 0, 0, 0.000, 0, 'kiruthika', NULL, 0, NULL, NULL, NULL, 0, NULL);

-- Dumping structure for table test.store_configs
CREATE TABLE IF NOT EXISTS `store_configs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `store_id` bigint unsigned NOT NULL,
  `is_recommended` tinyint(1) NOT NULL DEFAULT '0',
  `is_recommended_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.store_configs: ~0 rows (approximately)

-- Dumping structure for table test.store_schedule
CREATE TABLE IF NOT EXISTS `store_schedule` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `store_id` bigint unsigned NOT NULL,
  `day` int NOT NULL,
  `opening_time` time DEFAULT NULL,
  `closing_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.store_schedule: ~0 rows (approximately)

-- Dumping structure for table test.store_wallets
CREATE TABLE IF NOT EXISTS `store_wallets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `vendor_id` bigint unsigned NOT NULL,
  `total_earning` decimal(24,2) NOT NULL DEFAULT '0.00',
  `total_withdrawn` decimal(24,2) NOT NULL DEFAULT '0.00',
  `pending_withdraw` decimal(24,2) NOT NULL DEFAULT '0.00',
  `collected_cash` decimal(24,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.store_wallets: ~0 rows (approximately)
INSERT INTO `store_wallets` (`id`, `vendor_id`, `total_earning`, `total_withdrawn`, `pending_withdraw`, `collected_cash`, `created_at`, `updated_at`) VALUES
	(1, 2, 0.00, 0.00, 0.00, 0.00, '2024-05-07 17:30:34', '2024-05-07 17:30:34'),
	(2, 3, 13500.00, 0.00, 0.00, 0.00, '2024-05-07 21:52:30', '2024-05-28 18:33:29');

-- Dumping structure for table test.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.tags: ~3 rows (approximately)
INSERT INTO `tags` (`id`, `tag`, `created_at`, `updated_at`) VALUES
	(1, 'bike', '2024-05-02 18:50:41', '2024-05-02 18:50:41'),
	(2, 'hero', '2024-05-02 22:14:05', '2024-05-02 22:14:05'),
	(3, 'KTM', '2024-05-02 22:30:18', '2024-05-02 22:30:18');

-- Dumping structure for table test.temp_products
CREATE TABLE IF NOT EXISTS `temp_products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `store_id` bigint unsigned NOT NULL,
  `module_id` bigint unsigned NOT NULL,
  `unit_id` bigint unsigned DEFAULT NULL,
  `item_id` bigint unsigned DEFAULT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `category_ids` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_ids` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variations` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `food_variations` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `add_ons` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choice_options` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `price` decimal(24,2) NOT NULL DEFAULT '0.00',
  `tax` decimal(24,2) NOT NULL DEFAULT '0.00',
  `tax_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percent',
  `discount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `discount_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percent',
  `veg` tinyint(1) NOT NULL DEFAULT '0',
  `recommended` tinyint(1) NOT NULL DEFAULT '0',
  `organic` tinyint(1) NOT NULL DEFAULT '0',
  `common_condition_id` bigint unsigned DEFAULT NULL,
  `basic` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `stock` int DEFAULT '0',
  `maximum_cart_quantity` int DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_rejected` tinyint(1) NOT NULL DEFAULT '0',
  `available_time_ends` time DEFAULT NULL,
  `available_time_starts` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.temp_products: ~0 rows (approximately)

-- Dumping structure for table test.track_deliverymen
CREATE TABLE IF NOT EXISTS `track_deliverymen` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned DEFAULT NULL,
  `delivery_man_id` bigint unsigned DEFAULT NULL,
  `longitude` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.track_deliverymen: ~0 rows (approximately)

-- Dumping structure for table test.translations
CREATE TABLE IF NOT EXISTS `translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `translationable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `translationable_id` bigint unsigned NOT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `translations_translationable_id_index` (`translationable_id`),
  KEY `translations_locale_index` (`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.translations: ~60 rows (approximately)
INSERT INTO `translations` (`id`, `translationable_type`, `translationable_id`, `locale`, `key`, `value`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Models\\Module', 1, 'en', 'module_name', 'onnwheels', NULL, NULL),
	(2, 'App\\Models\\Module', 1, 'en', 'description', '<p>Demo module description.</p>', NULL, NULL),
	(6, 'App\\Models\\Store', 1, 'en', 'name', 'Demo Store', NULL, NULL),
	(7, 'App\\Models\\Store', 1, 'en', 'address', 'House, road', NULL, NULL),
	(10, 'App\\Models\\AdminPromotionalBanner', 1, 'en', 'title', 'Demo Title', NULL, NULL),
	(11, 'App\\Models\\AdminPromotionalBanner', 1, 'en', 'sub_title', 'Demo Promotional Subtitle', NULL, NULL),
	(12, 'App\\Models\\AdminFeature', 1, 'en', 'title', 'Demo Feature Title', NULL, NULL),
	(13, 'App\\Models\\AdminFeature', 1, 'en', 'sub_title', 'Demo Feature  Sub Title', NULL, NULL),
	(14, 'App\\Models\\AdminSpecialCriteria', 1, 'en', 'title', 'Demo Title', NULL, NULL),
	(15, 'App\\Models\\DataSetting', 24, 'en', 'download_user_app_title', 'Let’s  Manage', NULL, NULL),
	(16, 'App\\Models\\DataSetting', 25, 'en', 'download_user_app_sub_title', 'Your business  Smartly or Earn.', NULL, NULL),
	(17, 'App\\Models\\DataSetting', 29, 'en', 'contact_us_title', 'Contact Us', NULL, NULL),
	(18, 'App\\Models\\DataSetting', 30, 'en', 'contact_us_sub_title', 'Any question or remarks? Just write us a message!', NULL, NULL),
	(19, 'App\\Models\\DataSetting', 34, 'en', 'header_title', '$Your e-Commerce!$', NULL, NULL),
	(20, 'App\\Models\\DataSetting', 35, 'en', 'header_sub_title', 'Venture Starts Here', NULL, NULL),
	(21, 'App\\Models\\DataSetting', 36, 'en', 'header_tag_line', 'More than just a reliable $eCommerce$ platform', NULL, NULL),
	(22, 'App\\Models\\DataSetting', 59, 'en', 'business_title', '$Let’s$', NULL, NULL),
	(23, 'App\\Models\\DataSetting', 60, 'en', 'business_sub_title', 'Manage your business  Smartly', NULL, NULL),
	(24, 'App\\Models\\DataSetting', 68, 'en', 'fixed_header_title', '6amMart', NULL, NULL),
	(25, 'App\\Models\\DataSetting', 69, 'en', 'fixed_header_sub_title', 'More than just reliable eCommerce platform', NULL, NULL),
	(26, 'App\\Models\\FlutterSpecialCriteria', 1, 'en', 'title', 'Demo Feature Title', NULL, NULL),
	(27, 'App\\Models\\DataSetting', 82, 'en', 'download_user_app_title', 'Download app and enjoy more!', NULL, NULL),
	(28, 'App\\Models\\DataSetting', 83, 'en', 'download_user_app_sub_title', 'Download app from', NULL, NULL),
	(31, 'App\\Models\\Store', 2, 'en', 'name', 'Mekala', NULL, NULL),
	(32, 'App\\Models\\Store', 2, 'en', 'address', 'sadsad', NULL, NULL),
	(33, 'App\\Models\\AdminPromotionalBanner', 2, 'en', 'title', 'cxcxcxzc', NULL, NULL),
	(34, 'App\\Models\\AdminPromotionalBanner', 2, 'en', 'sub_title', 'zxc', NULL, NULL),
	(35, 'App\\Models\\DataSetting', 86, 'en', 'about_us', '<p>We, a group of millennials, are dedicated to establishing India&#39;s premier mobility solutions provider. Our dedication has driven us to create a platform offering rentals across 14 states, 43 cities, and 3 international locations.</p>\r\n\r\n<p>The realm of transportation and mobility solutions remains one of the least comprehended and disorganized sectors. We perceive this as an untapped opportunity to develop a reliable system accessible to all, transcending barriers.</p>\r\n\r\n<p>In our realm of two-wheelers, we embrace diversity, catering to everything from scooters to superbikes, accessible via both our website and mobile application.</p>\r\n\r\n<p><strong>&quot;Why buy when you can rent&quot;</strong></p>', NULL, NULL),
	(36, 'App\\Models\\DataSetting', 87, 'en', 'about_title', 'About Us', NULL, NULL),
	(37, 'App\\Models\\Item', 2, 'en', 'name', 'Test Bike', NULL, NULL),
	(38, 'App\\Models\\Item', 2, 'en', 'description', 'qwertyuiasdfghjk', NULL, NULL),
	(39, 'App\\Models\\Item', 3, 'en', 'name', 'Hero', NULL, NULL),
	(40, 'App\\Models\\Item', 3, 'en', 'description', 'asdfghjk', NULL, NULL),
	(43, 'App\\Models\\Category', 5, 'en', 'name', 'Best Rental Bike', NULL, NULL),
	(44, 'App\\Models\\Category', 6, 'en', 'name', 'Best Milage Bike', NULL, NULL),
	(45, 'App\\Models\\Category', 7, 'en', 'name', 'Sport Bike', NULL, NULL),
	(46, 'App\\Models\\Category', 8, 'en', 'name', 'Scooty', NULL, NULL),
	(47, 'App\\Models\\Item', 4, 'en', 'name', 'KTM', NULL, NULL),
	(48, 'App\\Models\\Item', 4, 'en', 'description', 'test KTM', NULL, NULL),
	(49, 'App\\Models\\Item', 5, 'en', 'name', 'Aprilia', NULL, NULL),
	(50, 'App\\Models\\Item', 5, 'en', 'description', 'qwertyuiop', NULL, NULL),
	(51, 'App\\Models\\Item', 6, 'en', 'name', 'Hero Splendor+', NULL, NULL),
	(52, 'App\\Models\\Item', 6, 'en', 'description', 'qwertyjjbvcx vb', NULL, NULL),
	(53, 'App\\Models\\Item', 7, 'en', 'name', '2023 Ducati', NULL, NULL),
	(54, 'App\\Models\\Item', 7, 'en', 'description', 'wertghj', NULL, NULL),
	(55, 'App\\Models\\Category', 9, 'en', 'name', 'Honda', NULL, NULL),
	(56, 'App\\Models\\Category', 10, 'en', 'name', 'Hero', NULL, NULL),
	(57, 'App\\Models\\Store', 3, 'en', 'name', 'Kiruthika', NULL, NULL),
	(58, 'App\\Models\\Store', 3, 'en', 'address', 'puliyakulam, coimbatore', NULL, NULL),
	(59, 'App\\Models\\DMVehicle', 1, 'en', 'type', 'Bike', NULL, NULL),
	(61, 'App\\Models\\Item', 25, 'en', 'name', 'Honda SP 125', NULL, NULL),
	(62, 'App\\Models\\Item', 25, 'en', 'description', 'The SP 125 is powered by a 124cc, single-cylinder, fuel-injected engine. This engine is known for its smooth power delivery, good low-end torque, and fuel efficiency. It meets BS6 emission norms, ensuring cleaner and greener performance.', NULL, NULL),
	(63, 'App\\Models\\Item', 24, 'en', 'name', 'Apache RTR', NULL, NULL),
	(64, 'App\\Models\\Item', 24, 'en', 'description', 'The Ninja brand was introduced in the 1980s and quickly gained popularity for its high-performance sport bikes. Over the years, Kawasaki has continuously updated and expanded the Ninja lineup, offering a range of models catering to different riding styles and skill levels.', NULL, NULL),
	(65, 'App\\Models\\Item', 23, 'en', 'name', 'Hero MotoCorp', NULL, NULL),
	(66, 'App\\Models\\Item', 23, 'en', 'description', 'Hero MotoCorp was originally founded as Hero Cycles in 1956 in Ludhiana, India. In 1984, Hero collaborated with Honda of Japan to establish Hero Honda Motors Limited, which became one of the most successful joint ventures in India\'s automotive industry. In 2011, Hero MotoCorp was formed after the split from Honda, and it continues to be a dominant player in the Indian two-wheeler market.', NULL, NULL),
	(67, 'App\\Models\\Item', 22, 'en', 'name', 'KTM 250', NULL, NULL),
	(68, 'App\\Models\\Item', 22, 'en', 'description', 'The KTM is powered by a 250 cc single-cylinder, air-cooled engine (with oil cooler in some variants), delivering good power and torque. It\'s known for its refinement and linear power delivery.', NULL, NULL),
	(69, 'App\\Models\\Item', 21, 'en', 'name', 'Bajaj Pulsar NS200', NULL, NULL),
	(70, 'App\\Models\\Item', 21, 'en', 'description', 'The Bajaj Pulsar NS200 is a popular naked sportbike known for its striking design and agile performance. It features a 199.5cc liquid-cooled single-cylinder engine that delivers around 24 horsepower, paired with a six-speed gearbox for smooth acceleration and flexibility. The NS200 stands out with its aggressive styling, highlighted by sharp lines, a muscular fuel tank, and a distinctive front headlamp design.', NULL, NULL),
	(71, 'App\\Models\\Item', 20, 'en', 'name', 'Royal Enfield Classic 350', NULL, NULL),
	(72, 'App\\Models\\Item', 20, 'en', 'description', 'The Royal Enfield Classic 350 is an iconic motorcycle known for its retro styling and timeless appeal. It features a classic design reminiscent of vintage British motorcycles with modern reliability. The bike is powered by a 346cc single-cylinder engine, delivering a smooth and torquey performance suitable for city commuting and leisurely rides.', NULL, NULL),
	(73, 'App\\Models\\Item', 19, 'en', 'name', 'Yamaha v3', NULL, NULL),
	(74, 'App\\Models\\Item', 19, 'en', 'description', 'The Yamaha v3 is a high-performance sport bike manufactured by Honda. It\'s renowned for its lightweight chassis, sharp handling, and powerful inline-four engine. This motorcycle is popular among riders who appreciate its track-focused design and agility, making it a favorite for both street riding and racing enthusiasts.', NULL, NULL),
	(75, 'App\\Models\\Item', 26, 'en', 'name', 'Ducati 360', NULL, NULL),
	(76, 'App\\Models\\Item', 26, 'en', 'description', 'Ducati is an Italian motorcycle manufacturing company headquartered in Bologna, Italy. The company is directly owned by Italian automotive manufacturer Lamborghini, whose German parent company is Audi.', NULL, NULL),
	(77, 'App\\Models\\Zone', 4, 'en', 'name', 'bangalore', NULL, NULL);

-- Dumping structure for table test.units
CREATE TABLE IF NOT EXISTS `units` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `unit` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.units: ~0 rows (approximately)

-- Dumping structure for table test.userkycs
CREATE TABLE IF NOT EXISTS `userkycs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `aadhar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_front` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_back` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint unsigned NOT NULL DEFAULT '0',
  `is_reject` tinyint unsigned NOT NULL DEFAULT '0',
  `status` varchar(299) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userkycs_user_id_foreign` (`user_id`),
  CONSTRAINT `userkycs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.userkycs: ~2 rows (approximately)
INSERT INTO `userkycs` (`id`, `user_id`, `aadhar`, `pan`, `license_front`, `license_back`, `is_verified`, `is_reject`, `status`, `created_at`, `updated_at`) VALUES
	(36, 28, '4444 4444 4444', 'METPS1334C', '/uploads/user/kyc/1716553558_front.webp', '/uploads/user/kyc/1716553558_back.webp', 1, 0, NULL, '2024-05-24 01:55:58', '2024-05-24 01:57:41'),
	(37, 27, '4444 4444 4444', 'HXOPK3749G', '/uploads/user/kyc/1717151666_front.webp', '/uploads/user/kyc/1717151666_back.webp', 1, 0, 'invalid license', '2024-05-29 22:39:24', '2024-05-31 13:09:36');

-- Dumping structure for table test.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_phone_verified` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `interest` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cm_firebase_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `order_count` int NOT NULL DEFAULT '0',
  `login_medium` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone_id` bigint unsigned DEFAULT NULL,
  `wallet_balance` decimal(24,3) NOT NULL DEFAULT '0.000',
  `loyalty_point` decimal(24,3) NOT NULL DEFAULT '0.000',
  `ref_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_language_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'en',
  `ref_by` bigint unsigned DEFAULT NULL,
  `temp_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_phone_unique` (`phone`),
  UNIQUE KEY `users_ref_code_unique` (`ref_code`),
  KEY `users_zone_id_index` (`zone_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.users: ~5 rows (approximately)
INSERT INTO `users` (`id`, `f_name`, `l_name`, `phone`, `email`, `image`, `is_phone_verified`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `interest`, `cm_firebase_token`, `status`, `order_count`, `login_medium`, `social_id`, `zone_id`, `wallet_balance`, `loyalty_point`, `ref_code`, `current_language_key`, `ref_by`, `temp_token`, `latitude`, `longitude`) VALUES
	(24, 'John', 'Doe', '9655804621', '3mo8rts@example.com', NULL, 1, NULL, '$2y$10$YVJ4d0zGDhhruMHt5tvIB.1N9ht7J45TgRRjDo6gemEOq5vPQ2SZa', NULL, '2024-05-05 22:16:19', '2024-05-06 00:19:35', NULL, NULL, 1, 0, NULL, NULL, NULL, 0.000, 0.000, 'KPZNDPJKUG', 'en', NULL, NULL, 11.0027796, 76.9936588),
	(25, 'John', 'Doe', '9597755160', 'jana@example.com', NULL, 1, NULL, '$2y$10$R2unxKgJ02Ef1UxCJ5WVieuCR3es1TDhAOoFmHU12ZPYsr4rPUDk2', NULL, '2024-05-06 00:50:02', '2024-05-06 00:50:35', NULL, NULL, 1, 0, NULL, NULL, NULL, 0.000, 0.000, 'PEVB9OOB55', 'en', NULL, NULL, NULL, NULL),
	(26, 'akhil', NULL, '9655804620', 'akhil@example.com', NULL, 0, NULL, '$2y$10$Xghhj/SkTqdsAXxlcW1UeunruMCJ3bjWo4K9ZTGBv6A.xhw3L8V9y', NULL, '2024-05-10 20:20:37', '2024-05-10 22:40:39', NULL, NULL, 1, 0, NULL, NULL, 2, 0.000, 0.000, '1VOKB7JCEY', 'en', NULL, NULL, 11.0027796, 76.9936588),
	(27, 'Keerthi', NULL, '9384955593', 'kiruthika4301@gmail.com', NULL, 1, NULL, '$2y$10$5uJSaGvTObokZuh4BZASj.C33Z3IFZyT26gOpSXnzlvmxgBK2gEkq', NULL, '2024-05-15 19:34:32', '2024-05-28 18:33:29', NULL, NULL, 1, 1, NULL, NULL, NULL, 0.000, 0.000, 'BV2OITVIFU', 'en', NULL, NULL, 11.0042343, 76.9988557),
	(28, 'jana', NULL, '9025075398', 'jana@gmail.com', NULL, 1, NULL, '$2y$10$f5XW04j.zSiL/A8AkuHGwurgBC0JaekXEJvFWHbzr9bv9i7gvDFqu', NULL, '2024-05-24 01:19:14', '2024-05-24 01:19:27', NULL, NULL, 1, 0, NULL, NULL, NULL, 0.000, 0.000, 'MFQ7VIDJST', 'en', NULL, NULL, NULL, NULL);

-- Dumping structure for table test.user_infos
CREATE TABLE IF NOT EXISTS `user_infos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `vendor_id` bigint unsigned DEFAULT NULL,
  `deliveryman_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.user_infos: ~0 rows (approximately)

-- Dumping structure for table test.user_notifications
CREATE TABLE IF NOT EXISTS `user_notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint unsigned DEFAULT NULL,
  `vendor_id` bigint unsigned DEFAULT NULL,
  `delivery_man_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.user_notifications: ~0 rows (approximately)
INSERT INTO `user_notifications` (`id`, `data`, `status`, `user_id`, `vendor_id`, `delivery_man_id`, `created_at`, `updated_at`) VALUES
	(1, '{"title":"Order push title","description":"New order push description","order_id":100016,"image":"","type":"new_order"}', 1, NULL, 3, NULL, '2024-05-28 01:08:37', '2024-05-28 01:08:37'),
	(2, '{"title":"Order push title","description":"New order push description","order_id":100017,"image":"","type":"new_order"}', 1, NULL, 3, NULL, '2024-05-28 18:33:19', '2024-05-28 18:33:19');

-- Dumping structure for table test.vendors
CREATE TABLE IF NOT EXISTS `vendors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holder_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `firebase_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vendors_phone_unique` (`phone`),
  UNIQUE KEY `vendors_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.vendors: ~4 rows (approximately)
INSERT INTO `vendors` (`id`, `f_name`, `l_name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `bank_name`, `branch`, `holder_name`, `account_no`, `image`, `status`, `firebase_token`, `auth_token`) VALUES
	(2, 'mekala', 'nagaraj', '+918989787878', 'mekala@gmail.com', NULL, '$2y$10$hqmNDsBj4mGsmYtC6/t.pu7TCpmqU9kRMAP/SPhRspEYBM/1jJn2K', NULL, '2024-05-01 19:05:19', '2024-05-01 19:05:19', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
	(3, 'kiruthika', 'kiruthika', '+919384955593', 'kiruthika@gmail.com', NULL, '$2y$10$5uJSaGvTObokZuh4BZASj.C33Z3IFZyT26gOpSXnzlvmxgBK2gEkq', NULL, '2024-05-07 20:56:18', '2024-05-28 22:57:14', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'vr2jtqwvsJENkKN50SxkqAIrj4J4Yrhwje82nbVlQMKzxGPuhsyPrPW8k7PMwxtM8OIdAFQ2vfkrDYCS54o9mjFIvHydBTSt9dJr0WZ6X91MIUkKhEpVy5VU'),
	(4, 'John', 'Doe', '1234567890', 'johndoe@example.com', NULL, '$2y$10$N87i9o0pr1hfCPyhYGrFuOSn9cy1OxenMByBYQbY1ZzD/prwEJJdS', NULL, '2024-05-09 21:22:32', '2024-05-09 21:22:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 'John', 'Doe', '1230567890', 'johndsoe@example.com', NULL, '$2y$10$jaPxvkNcv.fGBnOvH2VUAek8qNGhsCPu9pcGtBgXZLekmvL.CQHle', NULL, '2024-05-09 21:23:04', '2024-05-09 21:23:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Dumping structure for table test.vendor_employees
CREATE TABLE IF NOT EXISTS `vendor_employees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_role_id` bigint unsigned NOT NULL,
  `vendor_id` bigint unsigned NOT NULL,
  `store_id` bigint unsigned NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firebase_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_logged_in` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `vendor_employees_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.vendor_employees: ~0 rows (approximately)

-- Dumping structure for table test.wallet_bonuses
CREATE TABLE IF NOT EXISTS `wallet_bonuses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `bonus_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bonus_amount` double(23,3) NOT NULL DEFAULT '0.000',
  `minimum_add_amount` double(23,3) NOT NULL DEFAULT '0.000',
  `maximum_bonus_amount` double(23,3) NOT NULL DEFAULT '0.000',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.wallet_bonuses: ~0 rows (approximately)

-- Dumping structure for table test.wallet_payments
CREATE TABLE IF NOT EXISTS `wallet_payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `transaction_ref` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `payment_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.wallet_payments: ~0 rows (approximately)

-- Dumping structure for table test.wallet_transactions
CREATE TABLE IF NOT EXISTS `wallet_transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `transaction_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` decimal(24,3) NOT NULL DEFAULT '0.000',
  `debit` decimal(24,3) NOT NULL DEFAULT '0.000',
  `admin_bonus` decimal(24,3) NOT NULL DEFAULT '0.000',
  `balance` decimal(24,3) NOT NULL DEFAULT '0.000',
  `transaction_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.wallet_transactions: ~0 rows (approximately)

-- Dumping structure for table test.websockets_statistics_entries
CREATE TABLE IF NOT EXISTS `websockets_statistics_entries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `app_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int NOT NULL,
  `websocket_message_count` int NOT NULL,
  `api_message_count` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.websockets_statistics_entries: ~0 rows (approximately)

-- Dumping structure for table test.wishlists
CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `item_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.wishlists: ~0 rows (approximately)

-- Dumping structure for table test.withdrawal_methods
CREATE TABLE IF NOT EXISTS `withdrawal_methods` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `method_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_fields` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint NOT NULL DEFAULT '0',
  `is_active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.withdrawal_methods: ~0 rows (approximately)

-- Dumping structure for table test.withdraw_requests
CREATE TABLE IF NOT EXISTS `withdraw_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `vendor_id` bigint unsigned DEFAULT NULL,
  `admin_id` bigint unsigned DEFAULT NULL,
  `transaction_note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(23,3) NOT NULL DEFAULT '0.000',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_man_id` bigint unsigned DEFAULT NULL,
  `withdrawal_method_id` bigint unsigned DEFAULT NULL,
  `withdrawal_method_fields` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'manual',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.withdraw_requests: ~0 rows (approximately)

-- Dumping structure for table test.zones
CREATE TABLE IF NOT EXISTS `zones` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinates` polygon NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_wise_topic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_wise_topic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliveryman_wise_topic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cash_on_delivery` tinyint(1) NOT NULL DEFAULT '0',
  `digital_payment` tinyint(1) NOT NULL DEFAULT '0',
  `increased_delivery_fee` double(8,2) NOT NULL DEFAULT '0.00',
  `increased_delivery_fee_status` tinyint(1) NOT NULL DEFAULT '0',
  `increase_delivery_charge_message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offline_payment` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `zones_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.zones: ~2 rows (approximately)
INSERT INTO `zones` (`id`, `name`, `coordinates`, `status`, `created_at`, `updated_at`, `store_wise_topic`, `customer_wise_topic`, `deliveryman_wise_topic`, `cash_on_delivery`, `digital_payment`, `increased_delivery_fee`, `increased_delivery_fee_status`, `increase_delivery_charge_message`, `offline_payment`) VALUES
	(4, 'bangalore', _binary 0x00000000010300000001000000100000005890119034645340b4861daf39072a4050901110896253400aa98f15af052a4060fcb2d32160534079bb6d408bfe29406efcb213795f5340b0aba63417fa294034fcb253845f5340c5cae29a79e929406efcb213e16053400f8b563499db294058fcb253466153406bb70f6775d6294065fcb2936d6353405c7a52dc2cd229405efcb2f3bb695340bac36ac4e9da294069fcb253d5685340b3381c1f63ec294044fcb2733d685340d57ff0d1faf5294067fcb27397685340a79aeceda8fc294069fcb253216853402db801b6b5042a4042fcb2934b6753401d5da1660d052a403dfcb2d367655340909e19891b072a405890119034645340b4861daf39072a40, 1, '2024-06-04 09:17:44', '2024-06-04 09:20:06', 'zone_3_store', 'zone_3_customer', 'zone_3_delivery_man', 0, 1, 0.00, 0, NULL, 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
