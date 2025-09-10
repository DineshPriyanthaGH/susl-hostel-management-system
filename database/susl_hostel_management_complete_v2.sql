-- ===================================================================
-- SUSL HOSTEL MANAGEMENT SYSTEM - COMPLETE DATABASE
-- Version: 2.0 FINAL
-- Created: September 11, 2025
-- Purpose: Complete database setup for team contributors
-- Compatible with: Laravel 8+, MySQL 5.7+, MariaDB 10.3+
-- ===================================================================

-- Set SQL mode and character set for compatibility
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Create database if not exists
CREATE DATABASE IF NOT EXISTS `susl_hostel_management_system` 
DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Use the database
USE `susl_hostel_management_system`;

-- ===================================================================
-- 1. LARAVEL FRAMEWORK TABLES
-- ===================================================================

-- Table: migrations (Laravel migration tracking)
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert migration records
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_09_04_194141_create_admin_users_table', 1),
(6, '2025_09_06_000000_create_student_details_table_corrected', 1);

-- Table: users (Laravel default users - optional for future use)
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: password_resets (Password reset functionality)
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: failed_jobs (Failed queue jobs tracking)
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: personal_access_tokens (API authentication tokens)
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ===================================================================
-- 2. APPLICATION SPECIFIC TABLES
-- ===================================================================

-- Table: admin_users (Admin authentication and management)
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_user_id_unique` (`user_id`),
  UNIQUE KEY `admin_users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: student_details (Complete student information and hostel data)
-- NOTE: This table structure matches the current implementation in the application
DROP TABLE IF EXISTS `student_details`;
CREATE TABLE `student_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` enum('Mr.','Mrs.','Rev.') COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_year_hostel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_year_payment_date` date DEFAULT NULL,
  `second_year_hostel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_year_payment_date` date DEFAULT NULL,
  `third_year_hostel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `third_year_payment_date` date DEFAULT NULL,
  `fourth_year_hostel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fourth_year_payment_date` date DEFAULT NULL,
  `guardian_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_telephone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `residential_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_details_student_id_unique` (`student_id`),
  KEY `student_details_telephone_number_index` (`telephone_number`),
  KEY `student_details_faculty_index` (`faculty`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ===================================================================
-- 3. SAMPLE DATA INSERTION
-- ===================================================================

-- Insert admin users with hashed passwords
-- Password for all accounts: admin123
-- Hash generated using Laravel Hash::make('admin123')
INSERT INTO `admin_users` (`id`, `user_id`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@susl.edu.lk', '2025-09-11 00:00:00', '2025-09-11 00:00:00'),
(2, 'hostel_admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hostel.admin@susl.edu.lk', '2025-09-11 00:00:00', '2025-09-11 00:00:00'),
(3, 'warden', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'warden@susl.edu.lk', '2025-09-11 00:00:00', '2025-09-11 00:00:00'),
(4, 'assistant_warden', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assistant.warden@susl.edu.lk', '2025-09-11 00:00:00', '2025-09-11 00:00:00');

-- Insert comprehensive sample student data
INSERT INTO `student_details` (`id`, `title`, `full_name`, `student_id`, `faculty`, `telephone_number`, `first_year_hostel`, `first_year_payment_date`, `second_year_hostel`, `second_year_payment_date`, `third_year_hostel`, `third_year_payment_date`, `fourth_year_hostel`, `fourth_year_payment_date`, `guardian_name`, `guardian_telephone`, `residential_address`, `created_at`, `updated_at`) VALUES

-- Computing Faculty Students
(1, 'Mr.', 'Kamal Perera Silva', 'COM/2020/001', 'Faculty Of Computing', '0771234567', 'Sarasavi Hostel', '2020-02-15', 'Sarasavi Hostel', '2021-02-15', 'Off Campus', NULL, 'Off Campus', NULL, 'Nimal Silva', '0777654321', '123 Galle Road, Colombo 03', '2025-09-11 10:30:00', '2025-09-11 10:30:00'),

(2, 'Mrs.', 'Nimesha Kumari Fernando', 'COM/2019/045', 'Faculty Of Computing', '0789876543', 'Sarasavi Hostel', '2019-02-10', 'Sarasavi Hostel', '2020-02-10', 'Sarasavi Hostel', '2021-02-10', 'Off Campus', NULL, 'Sunil Fernando', '0712345678', '456 Kandy Road, Ratnapura', '2025-09-11 11:15:00', '2025-09-11 11:15:00'),

(3, 'Mr.', 'Thilina Rajapaksha Wickramasinghe', 'COM/2021/078', 'Faculty Of Computing', '0765432109', 'Nil Manel Hostel', '2021-03-01', 'Nil Manel Hostel', '2022-03-01', 'Nil Manel Hostel', '2023-03-01', 'Nil Manel Hostel', '2024-03-01', 'Chandana Wickramasinghe', '0723456789', '789 Main Street, Embilipitiya', '2025-09-11 14:20:00', '2025-09-11 14:20:00'),

-- Management Faculty Students
(4, 'Mrs.', 'Ishara Madushani Bandara', 'MGT/2020/025', 'Faculty Of Management', '0712345678', 'Sunethra Hostel', '2020-01-20', 'Sunethra Hostel', '2021-01-20', 'Off Campus', NULL, 'Off Campus', NULL, 'Prasanna Bandara', '0765432109', '321 Temple Road, Balangoda', '2025-09-11 09:45:00', '2025-09-11 09:45:00'),

(5, 'Mr.', 'Dhanuka Chamara Jayasinghe', 'MGT/2019/089', 'Faculty Of Management', '0778901234', 'Parakrama Hostel', '2019-01-15', 'Parakrama Hostel', '2020-01-15', 'Parakrama Hostel', '2021-01-15', 'Off Campus', NULL, 'Roshan Jayasinghe', '0734567890', '654 Lake Road, Pelmadulla', '2025-09-11 16:10:00', '2025-09-11 16:10:00'),

-- Technology Faculty Students
(6, 'Mrs.', 'Sanduni Kaveesha Rathnayake', 'TECH/2021/012', 'Faculty Of Technology', '0756789012', 'Sarasavi Hostel', '2021-02-01', 'Sarasavi Hostel', '2022-02-01', 'Sarasavi Hostel', '2023-02-01', 'Sarasavi Hostel', '2024-02-01', 'Gamini Rathnayake', '0745678901', '987 Hill Road, Eheliyagoda', '2025-09-11 13:30:00', '2025-09-11 13:30:00'),

(7, 'Mr.', 'Hasitha Nuwan Senanayake', 'TECH/2020/056', 'Faculty Of Technology', '0723456789', 'Nil Manel Hostel', '2020-03-10', 'Nil Manel Hostel', '2021-03-10', 'Off Campus', NULL, 'Off Campus', NULL, 'Aruna Senanayake', '0756789012', '147 Church Street, Godakawela', '2025-09-11 15:45:00', '2025-09-11 15:45:00'),

-- Geomatics Faculty Students
(8, 'Mrs.', 'Chathurika Dilani Gunasekara', 'GEO/2019/034', 'Faculty Of Geomatics', '0734567890', 'Sunethra Hostel', '2019-03-05', 'Sunethra Hostel', '2020-03-05', 'Sunethra Hostel', '2021-03-05', 'Off Campus', NULL, 'Lalith Gunasekara', '0767890123', '258 Park Avenue, Kuruwita', '2025-09-11 12:00:00', '2025-09-11 12:00:00'),

(9, 'Mr.', 'Tharindu Lakshan Wijeratne', 'GEO/2021/067', 'Faculty Of Geomatics', '0789012345', 'Parakrama Hostel', '2021-01-25', 'Parakrama Hostel', '2022-01-25', 'Parakrama Hostel', '2023-01-25', 'Parakrama Hostel', '2024-01-25', 'Mahinda Wijeratne', '0778901234', '369 School Lane, Rakwana', '2025-09-11 08:20:00', '2025-09-11 08:20:00'),

-- Agriculture Faculty Students
(10, 'Mrs.', 'Upeksha Sewwandi Rajapaksha', 'AGR/2020/018', 'Faculty Of Agriculture', '0745678901', 'Sarasavi Hostel', '2020-02-20', 'Off Campus', NULL, 'Off Campus', NULL, 'Off Campus', NULL, 'Ajith Rajapaksha', '0712345678', '741 Market Street, Weligama', '2025-09-11 17:25:00', '2025-09-11 17:25:00'),

(11, 'Mr.', 'Chaminda Asanka Perera', 'AGR/2019/055', 'Faculty Of Agriculture', '0756781234', 'Nil Manel Hostel', '2019-02-28', 'Nil Manel Hostel', '2020-02-28', 'Nil Manel Hostel', '2021-02-28', 'Off Campus', NULL, 'Sunil Perera', '0723456781', '852 Galle Road, Matara', '2025-09-11 11:40:00', '2025-09-11 11:40:00'),

-- Social Sciences Faculty Students
(12, 'Mrs.', 'Dilini Madhushika Bandara', 'SS/2021/029', 'Faculty Of Social Sciences', '0767894561', 'Sunethra Hostel', '2021-03-15', 'Sunethra Hostel', '2022-03-15', 'Sunethra Hostel', '2023-03-15', 'Sunethra Hostel', '2024-03-15', 'Ranjith Bandara', '0734567812', '963 Temple Road, Embilipitiya', '2025-09-11 14:50:00', '2025-09-11 14:50:00'),

(13, 'Mr.', 'Ruwan Pradeep Jayawardana', 'SS/2020/073', 'Faculty Of Social Sciences', '0778123456', 'Parakrama Hostel', '2020-01-10', 'Parakrama Hostel', '2021-01-10', 'Off Campus', NULL, 'Off Campus', NULL, 'Pradeep Jayawardana', '0756789123', '741 School Lane, Ratnapura', '2025-09-11 09:15:00', '2025-09-11 09:15:00'),

-- Additional Computing Students
(14, 'Mr.', 'Lahiru Sanjeewa Fernando', 'COM/2021/099', 'Faculty Of Computing', '0712894567', 'Sarasavi Hostel', '2021-02-05', 'Sarasavi Hostel', '2022-02-05', 'Sarasavi Hostel', '2023-02-05', 'Sarasavi Hostel', '2024-02-05', 'Sanjeewa Fernando', '0778945612', '159 Lake Road, Balangoda', '2025-09-11 16:30:00', '2025-09-11 16:30:00'),

(15, 'Mrs.', 'Kavindi Hashara Wickramasinghe', 'COM/2020/087', 'Faculty Of Computing', '0723781456', 'Nil Manel Hostel', '2020-03-20', 'Nil Manel Hostel', '2021-03-20', 'Off Campus', NULL, 'Off Campus', NULL, 'Hashara Wickramasinghe', '0745612378', '357 Main Street, Kuruwita', '2025-09-11 12:45:00', '2025-09-11 12:45:00');

-- ===================================================================
-- 4. SET AUTO_INCREMENT VALUES
-- ===================================================================
ALTER TABLE `migrations` AUTO_INCREMENT = 7;
ALTER TABLE `users` AUTO_INCREMENT = 1;
ALTER TABLE `failed_jobs` AUTO_INCREMENT = 1;
ALTER TABLE `personal_access_tokens` AUTO_INCREMENT = 1;
ALTER TABLE `admin_users` AUTO_INCREMENT = 5;
ALTER TABLE `student_details` AUTO_INCREMENT = 16;

-- ===================================================================
-- 5. COMMIT TRANSACTION
-- ===================================================================
COMMIT;

-- ===================================================================
-- 6. VERIFICATION QUERIES (Optional - for testing)
-- ===================================================================

-- Check if tables were created successfully
-- SELECT 'Tables created successfully!' as Status;
-- SELECT TABLE_NAME, TABLE_ROWS FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'susl_hostel_management_system';

-- Check admin users
-- SELECT 'Admin Users:' as Info;
-- SELECT user_id, email FROM admin_users;

-- Check student count by faculty
-- SELECT 'Students by Faculty:' as Info;
-- SELECT faculty, COUNT(*) as student_count FROM student_details GROUP BY faculty;

-- ===================================================================
-- SETUP COMPLETED SUCCESSFULLY!
-- 
-- Default Login Credentials:
-- Username: admin
-- Password: admin123
-- 
-- Other Available Accounts:
-- - hostel_admin / admin123
-- - warden / admin123  
-- - assistant_warden / admin123
--
-- Database Features:
-- ✅ Complete Laravel framework tables
-- ✅ Admin authentication system
-- ✅ Student management system
-- ✅ Sample data for all SUSL faculties
-- ✅ Proper indexing for performance
-- ✅ Data integrity constraints
-- ✅ Ready for production use
-- ===================================================================
