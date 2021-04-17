-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               8.0.22-0ubuntu0.20.04.3 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table svara.boards
CREATE TABLE IF NOT EXISTS `boards` (
                                        `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                        `pipeline_entity_id` bigint unsigned NOT NULL,
                                        `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`),
    KEY `boards_pipeline_entity_id_foreign` (`pipeline_entity_id`),
    CONSTRAINT `boards_pipeline_entity_id_foreign` FOREIGN KEY (`pipeline_entity_id`) REFERENCES `project_pipelines_to_entities` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.boards: ~0 rows (approximately)
DELETE FROM `boards`;
/*!40000 ALTER TABLE `boards` DISABLE KEYS */;
INSERT INTO `boards` (`id`, `pipeline_entity_id`, `name`) VALUES
(1, 59, 'Project Dev Board');
/*!40000 ALTER TABLE `boards` ENABLE KEYS */;

-- Dumping structure for table svara.board_cards
CREATE TABLE IF NOT EXISTS `board_cards` (
                                             `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                             `created_at` timestamp NULL DEFAULT NULL,
                                             `updated_at` timestamp NULL DEFAULT NULL,
                                             `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description` text COLLATE utf8mb4_unicode_ci,
    `column_id` bigint unsigned NOT NULL,
    `assigned_user_id` bigint unsigned DEFAULT NULL,
    `label_id` bigint unsigned DEFAULT NULL,
    `created_by_id` bigint unsigned DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `board_cards_column_id_foreign` (`column_id`),
    KEY `board_cards_assigned_user_id_foreign` (`assigned_user_id`),
    KEY `board_cards_label_id_foreign` (`label_id`),
    KEY `board_cards_created_by_id_foreign` (`created_by_id`),
    CONSTRAINT `board_cards_assigned_user_id_foreign` FOREIGN KEY (`assigned_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
    CONSTRAINT `board_cards_column_id_foreign` FOREIGN KEY (`column_id`) REFERENCES `board_columns` (`id`) ON DELETE CASCADE,
    CONSTRAINT `board_cards_created_by_id_foreign` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
    CONSTRAINT `board_cards_label_id_foreign` FOREIGN KEY (`label_id`) REFERENCES `board_card_labels` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.board_cards: ~9 rows (approximately)
DELETE FROM `board_cards`;
/*!40000 ALTER TABLE `board_cards` DISABLE KEYS */;
INSERT INTO `board_cards` (`id`, `created_at`, `updated_at`, `name`, `description`, `column_id`, `assigned_user_id`, `label_id`, `created_by_id`) VALUES
(1, '2021-03-27 12:00:24', '2021-04-12 22:48:33', 'Refactor Router', 'The router is a mess of 8 or 9 different router classes that all get called one after the other. This needs to be refactored to be one main router that describes all the available routes. This will help with extensibility in the future. Add some text to it.', 1, 1, NULL, NULL),
(2, '2021-03-30 14:00:40', '2021-03-30 14:00:40', 'New Class', NULL, 1, NULL, NULL, NULL),
(3, '2021-03-30 18:54:24', '2021-03-30 18:54:24', 'Replace db_query with an ORM', NULL, 1, NULL, NULL, NULL),
(4, '2021-03-30 18:58:56', '2021-03-30 18:58:56', 'Restructure core folders', NULL, 1, NULL, NULL, NULL),
(5, '2021-03-30 21:30:10', '2021-03-30 21:30:10', 'A new title', NULL, 1, NULL, NULL, NULL),
(7, '2021-03-30 21:45:02', '2021-03-30 21:45:02', 'A Piece of Work', NULL, 2, NULL, NULL, NULL),
(12, '2021-04-04 13:42:21', '2021-04-04 13:42:21', 'In Progress Task', NULL, 2, 1, NULL, NULL),
(14, '2021-04-04 13:50:00', '2021-04-04 13:50:00', 'New Navigation Prototype', NULL, 3, 1, NULL, NULL),
(15, '2021-04-04 13:53:07', '2021-04-04 14:53:01', 'Footer spacing adjustments', 'The footer needs padding around the left and right sizes. The footer links need larger margins on the bottom. Update payment logos.', 3, 1, NULL, 1);
/*!40000 ALTER TABLE `board_cards` ENABLE KEYS */;

-- Dumping structure for table svara.board_card_attachments
CREATE TABLE IF NOT EXISTS `board_card_attachments` (
                                                        `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                                        `card_id` bigint unsigned NOT NULL,
                                                        `uploaded_user_id` bigint unsigned DEFAULT NULL,
                                                        `created_at` timestamp NULL DEFAULT NULL,
                                                        `updated_at` timestamp NULL DEFAULT NULL,
                                                        `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `file_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `board_card_attachments_uploaded_user_id_foreign` (`uploaded_user_id`),
    KEY `board_card_attachments_card_id_foreign` (`card_id`),
    CONSTRAINT `board_card_attachments_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `board_cards` (`id`) ON DELETE CASCADE,
    CONSTRAINT `board_card_attachments_uploaded_user_id_foreign` FOREIGN KEY (`uploaded_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.board_card_attachments: ~0 rows (approximately)
DELETE FROM `board_card_attachments`;
/*!40000 ALTER TABLE `board_card_attachments` DISABLE KEYS */;
INSERT INTO `board_card_attachments` (`id`, `card_id`, `uploaded_user_id`, `created_at`, `updated_at`, `name`, `path`, `file_type`) VALUES
(1, 1, NULL, '2021-03-27 12:08:04', '2021-03-27 12:08:04', 'project-proposal', '/a-legit/file-path/proposal.pdf', 'PDF');
/*!40000 ALTER TABLE `board_card_attachments` ENABLE KEYS */;

-- Dumping structure for table svara.board_card_labels
CREATE TABLE IF NOT EXISTS `board_card_labels` (
                                                   `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                                   `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `colour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.board_card_labels: ~0 rows (approximately)
DELETE FROM `board_card_labels`;
/*!40000 ALTER TABLE `board_card_labels` DISABLE KEYS */;
/*!40000 ALTER TABLE `board_card_labels` ENABLE KEYS */;

-- Dumping structure for table svara.board_card_messages
CREATE TABLE IF NOT EXISTS `board_card_messages` (
                                                     `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                                     `user_id` bigint unsigned NOT NULL,
                                                     `card_id` bigint unsigned NOT NULL,
                                                     `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
                                                     `created_at` timestamp NULL DEFAULT NULL,
                                                     `updated_at` timestamp NULL DEFAULT NULL,
                                                     PRIMARY KEY (`id`),
    KEY `board_card_messages_user_id_foreign` (`user_id`),
    KEY `board_card_messages_card_id_foreign` (`card_id`),
    CONSTRAINT `board_card_messages_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `board_cards` (`id`) ON DELETE CASCADE,
    CONSTRAINT `board_card_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.board_card_messages: ~0 rows (approximately)
DELETE FROM `board_card_messages`;
/*!40000 ALTER TABLE `board_card_messages` DISABLE KEYS */;
INSERT INTO `board_card_messages` (`id`, `user_id`, `card_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'Have started refactoring this class, now gone from 7 classes to 2. Need to unit test before complete', '2021-03-27 12:19:14', '2021-03-27 12:19:14');
/*!40000 ALTER TABLE `board_card_messages` ENABLE KEYS */;

-- Dumping structure for table svara.board_columns
CREATE TABLE IF NOT EXISTS `board_columns` (
                                               `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                               `board_id` bigint unsigned NOT NULL,
                                               `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`),
    KEY `board_columns_board_id_foreign` (`board_id`),
    CONSTRAINT `board_columns_board_id_foreign` FOREIGN KEY (`board_id`) REFERENCES `boards` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.board_columns: ~5 rows (approximately)
DELETE FROM `board_columns`;
/*!40000 ALTER TABLE `board_columns` DISABLE KEYS */;
INSERT INTO `board_columns` (`id`, `board_id`, `name`) VALUES
(1, 1, 'Backlog'),
(2, 1, 'In Progress'),
(3, 1, 'Test'),
(4, 1, 'Complete'),
(6, 1, 'Refactor');
/*!40000 ALTER TABLE `board_columns` ENABLE KEYS */;

-- Dumping structure for table svara.checklists
CREATE TABLE IF NOT EXISTS `checklists` (
                                            `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                            `created_at` timestamp NULL DEFAULT NULL,
                                            `updated_at` timestamp NULL DEFAULT NULL,
                                            `pipeline_entity_id` bigint unsigned NOT NULL,
                                            `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`),
    KEY `checklists_pipeline_entity_id_foreign` (`pipeline_entity_id`),
    CONSTRAINT `checklists_pipeline_entity_id_foreign` FOREIGN KEY (`pipeline_entity_id`) REFERENCES `project_pipelines_to_entities` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.checklists: ~3 rows (approximately)
DELETE FROM `checklists`;
/*!40000 ALTER TABLE `checklists` DISABLE KEYS */;
INSERT INTO `checklists` (`id`, `created_at`, `updated_at`, `pipeline_entity_id`, `name`) VALUES
(1, '2021-04-13 21:32:48', '2021-04-13 21:32:50', 62, 'Proposal Feature List'),
(2, '2021-04-15 19:22:24', '2021-04-15 19:22:24', 62, 'New Checklist'),
(3, '2021-04-15 23:14:32', '2021-04-15 23:14:32', 62, 'A whole new checklist');
/*!40000 ALTER TABLE `checklists` ENABLE KEYS */;

-- Dumping structure for table svara.checklist_items
CREATE TABLE IF NOT EXISTS `checklist_items` (
                                                 `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                                 `assigned_user_id` bigint unsigned DEFAULT NULL,
                                                 `checklist_id` bigint unsigned NOT NULL,
                                                 `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description` text COLLATE utf8mb4_unicode_ci,
    `complete` tinyint(1) NOT NULL DEFAULT '0',
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `checklist_items_assigned_user_id_foreign` (`assigned_user_id`),
    KEY `checklist_items_checklist_id_foreign` (`checklist_id`),
    CONSTRAINT `checklist_items_assigned_user_id_foreign` FOREIGN KEY (`assigned_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
    CONSTRAINT `checklist_items_checklist_id_foreign` FOREIGN KEY (`checklist_id`) REFERENCES `checklists` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.checklist_items: ~8 rows (approximately)
DELETE FROM `checklist_items`;
/*!40000 ALTER TABLE `checklist_items` DISABLE KEYS */;
INSERT INTO `checklist_items` (`id`, `assigned_user_id`, `checklist_id`, `name`, `description`, `complete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Add all items from proposal to board', NULL, 1, '2021-04-14 20:19:50', '2021-04-15 08:24:14'),
(2, NULL, 1, 'Inform client the project is in development', NULL, 1, '2021-04-14 20:20:18', '2021-04-14 21:12:46'),
(3, NULL, 1, 'Put together new module documentation', 'The new routing module has been built but needs thoroughly documenting. Planning to reuse this with quite a few other sites.', 1, '2021-04-14 20:21:53', '2021-04-15 23:14:09'),
(4, 2, 1, 'Something else that needs doing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras gravida turpis sit amet augue commodo, vel mollis justo faucibus. Nullam posuere libero blandit odio dapibus, et mattis magna hendrerit. Aenean vitae dolor et risus mollis imperdiet. Sed eros nulla, facilisis sed mollis a, aliquet eu lorem. Sed ornare accumsan erat vel condimentum. Vestibulum lacinia enim ultricies odio mattis ultrices. ', 0, '2021-04-14 20:22:40', '2021-04-14 20:22:42'),
(5, NULL, 1, 'Another new task 2', NULL, 0, '2021-04-15 18:29:16', '2021-04-15 18:41:06'),
(6, NULL, 1, 'A sixth task', NULL, 0, '2021-04-15 18:41:23', '2021-04-15 18:41:33'),
(7, NULL, 2, 'The first item', NULL, 0, '2021-04-15 19:22:34', '2021-04-15 19:22:40'),
(8, NULL, 1, 'New ones', NULL, 0, '2021-04-15 23:14:20', '2021-04-15 23:14:20');
/*!40000 ALTER TABLE `checklist_items` ENABLE KEYS */;

-- Dumping structure for table svara.clients
CREATE TABLE IF NOT EXISTS `clients` (
                                         `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                         `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `logo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `main_contact_id` bigint unsigned DEFAULT NULL,
    `account_manager_id` bigint unsigned DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `clients_main_contact_id_foreign` (`main_contact_id`),
    KEY `clients_account_manager_id_foreign` (`account_manager_id`),
    CONSTRAINT `clients_account_manager_id_foreign` FOREIGN KEY (`account_manager_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
    CONSTRAINT `clients_main_contact_id_foreign` FOREIGN KEY (`main_contact_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.clients: ~4 rows (approximately)
DELETE FROM `clients`;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id`, `name`, `logo_path`, `contact_number`, `contact_email`, `main_contact_id`, `account_manager_id`) VALUES
(1, 'Pied Piper', 'storage/avatars/pied-piper-logo.jpg', '01234 567890', 'info@piedpiper.com', 5, 4),
(2, 'Hooli', 'storage/avatars/hooli-logo.png', '01234 567890', 'gavin.belson@hooli.io', 5, 4),
(3, 'Aviato', 'storage/avatars/aviato-logo.png', '01234 567890', 'erlich@aviato.com', 5, 3),
(5, 'Svara', NULL, '07834854831', 'charlesbjerg@gmail.com', 31, 1);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Dumping structure for table svara.companies
CREATE TABLE IF NOT EXISTS `companies` (
                                           `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                           `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `logo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `account_owner_id` bigint unsigned NOT NULL,
    PRIMARY KEY (`id`),
    KEY `companies_account_owner_id_foreign` (`account_owner_id`),
    CONSTRAINT `companies_account_owner_id_foreign` FOREIGN KEY (`account_owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.companies: ~0 rows (approximately)
DELETE FROM `companies`;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;

-- Dumping structure for table svara.documents
CREATE TABLE IF NOT EXISTS `documents` (
                                           `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                           `pipeline_entity_id` bigint unsigned NOT NULL,
                                           `created_at` timestamp NULL DEFAULT NULL,
                                           `updated_at` timestamp NULL DEFAULT NULL,
                                           `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `file_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`),
    KEY `documents_pipeline_entity_id_foreign` (`pipeline_entity_id`),
    CONSTRAINT `documents_pipeline_entity_id_foreign` FOREIGN KEY (`pipeline_entity_id`) REFERENCES `project_pipelines_to_entities` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.documents: ~7 rows (approximately)
DELETE FROM `documents`;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
INSERT INTO `documents` (`id`, `pipeline_entity_id`, `created_at`, `updated_at`, `name`, `file_type`, `path`) VALUES
(1, 60, '2021-04-04 19:42:43', '2021-04-04 19:42:43', 'meerkats.jpg', '', 'uploads/60/aac6943110ff09c4de8cffc72bad5c48978d83bd'),
(2, 60, '2021-04-04 20:45:20', '2021-04-04 20:45:20', 'hvc-golive.md', '', 'uploads/60/d789e1c5a0d54640f7cb9cde3ad35771c6da2d03'),
(3, 60, '2021-04-04 20:45:51', '2021-04-04 20:45:51', 'meerkats.jpg', '', 'uploads/60/1f18db5610dc060b8843c8dc1fb462f58e34007a'),
(4, 55, '2021-04-04 21:48:59', '2021-04-04 21:48:59', 'hvc-golive.md', '', 'uploads/55/5147d9d2f4fcdaa08b129f3f7273b5b152f2b207'),
(5, 55, '2021-04-04 21:48:59', '2021-04-04 21:48:59', 'in-progress.md', '', 'uploads/55/5147d9d2f4fcdaa08b129f3f7273b5b152f2b207'),
(6, 55, '2021-04-04 21:49:00', '2021-04-04 21:49:00', 'meerkats.jpg', '', 'uploads/55/5f77035b7f280f19f4f9ae82cf26e60baa344bf6'),
(7, 55, '2021-04-04 21:49:00', '2021-04-04 21:49:00', 'monkeys.jpg', '', 'uploads/55/5f77035b7f280f19f4f9ae82cf26e60baa344bf6'),
(8, 60, '2021-04-06 16:30:20', '2021-04-06 16:30:20', 'meerkats.jpg', 'jpg', 'uploads/60/eFf6vqbCvO6IDudaHKvoPfyRzsTQ2pZ4kHp41h7G.jpg'),
(9, 61, '2021-04-09 09:38:00', '2021-04-09 09:38:00', 'RWWD - Part Two.md', 'txt', 'uploads/61/iaaO93vVqZ1uZf0Tr7dQpLhhNWOBULHtfGlKsxxW.txt'),
(10, 60, '2021-04-12 22:34:16', '2021-04-12 22:34:16', 'CKSource_Certificate_LGROED770.AJC105WPA732.pdf', 'pdf', 'uploads/60/a1mDSWJlIhU39TQEETDYjjG1pSVlL6yv41NCKGzo.pdf');
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;

-- Dumping structure for table svara.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
                                             `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                             `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
    `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
    `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table svara.message_threads
CREATE TABLE IF NOT EXISTS `message_threads` (
                                                 `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                                 `created_at` timestamp NULL DEFAULT NULL,
                                                 `updated_at` timestamp NULL DEFAULT NULL,
                                                 `project_id` bigint unsigned NOT NULL,
                                                 `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `shared_with_client` tinyint(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    KEY `message_threads_project_id_foreign` (`project_id`),
    CONSTRAINT `message_threads_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.message_threads: ~5 rows (approximately)
DELETE FROM `message_threads`;
/*!40000 ALTER TABLE `message_threads` DISABLE KEYS */;
INSERT INTO `message_threads` (`id`, `created_at`, `updated_at`, `project_id`, `title`, `shared_with_client`) VALUES
(1, '2021-04-04 23:48:21', '2021-04-04 23:48:21', 22, 'Project Update', 0),
(2, '2021-04-06 11:43:01', '2021-04-06 11:43:01', 22, 'Thread name', 0),
(3, '2021-04-06 12:15:11', '2021-04-06 12:15:11', 22, 'A New Thread', 0),
(4, '2021-04-06 12:17:15', '2021-04-06 12:17:15', 22, 'Final Thread', 0),
(5, '2021-04-06 12:17:43', '2021-04-06 12:17:43', 22, 'Final Thread +1', 0),
(6, '2021-04-12 22:34:39', '2021-04-12 22:34:39', 22, 'Your Mum', 0);
/*!40000 ALTER TABLE `message_threads` ENABLE KEYS */;

-- Dumping structure for table svara.message_thread_attachments
CREATE TABLE IF NOT EXISTS `message_thread_attachments` (
                                                            `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                                            `message_id` bigint unsigned NOT NULL,
                                                            `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`),
    KEY `message_thread_attachments_message_id_foreign` (`message_id`),
    CONSTRAINT `message_thread_attachments_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `message_thread_messages` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.message_thread_attachments: ~0 rows (approximately)
DELETE FROM `message_thread_attachments`;
/*!40000 ALTER TABLE `message_thread_attachments` DISABLE KEYS */;
/*!40000 ALTER TABLE `message_thread_attachments` ENABLE KEYS */;

-- Dumping structure for table svara.message_thread_messages
CREATE TABLE IF NOT EXISTS `message_thread_messages` (
                                                         `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                                         `created_at` timestamp NULL DEFAULT NULL,
                                                         `updated_at` timestamp NULL DEFAULT NULL,
                                                         `thread_id` bigint unsigned NOT NULL,
                                                         `user_id` bigint unsigned NOT NULL,
                                                         `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
                                                         PRIMARY KEY (`id`),
    KEY `message_thread_messages_thread_id_foreign` (`thread_id`),
    KEY `message_thread_messages_user_id_foreign` (`user_id`),
    CONSTRAINT `message_thread_messages_thread_id_foreign` FOREIGN KEY (`thread_id`) REFERENCES `message_threads` (`id`) ON DELETE CASCADE,
    CONSTRAINT `message_thread_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.message_thread_messages: ~9 rows (approximately)
DELETE FROM `message_thread_messages`;
/*!40000 ALTER TABLE `message_thread_messages` DISABLE KEYS */;
INSERT INTO `message_thread_messages` (`id`, `created_at`, `updated_at`, `thread_id`, `user_id`, `message`) VALUES
(1, '2021-04-05 19:57:33', '2021-04-05 19:57:35', 1, 1, 'This is the very first message of them all.\n'),
(2, '2021-04-05 20:59:14', '2021-04-05 20:59:14', 1, 1, '<p>Test Message</p>'),
(3, '2021-04-05 21:08:24', '2021-04-05 21:08:24', 1, 1, '<p>Here is a multi-line project update.&nbsp;</p>\n<p>It is spanning <strong>multiple</strong> lines.&nbsp;</p>\n<p><em>But only just.&nbsp;</em></p>'),
(4, '2021-04-05 21:13:50', '2021-04-05 21:13:50', 1, 1, '<p>Yet another message.</p>'),
(5, '2021-04-05 21:33:34', '2021-04-05 21:33:34', 1, 2, '<p>I also wanted to contribute to this message thread.&nbsp;</p>'),
(6, '2021-04-06 12:19:12', '2021-04-06 12:19:12', 5, 1, '<p>This is the first message of the thread.&nbsp;</p>'),
(7, '2021-04-06 16:10:02', '2021-04-06 16:10:02', 2, 1, '<p>awooooooooga</p>'),
(8, '2021-04-12 22:34:49', '2021-04-12 22:34:49', 6, 1, '<p>My name a jeff</p>'),
(9, '2021-04-12 22:35:36', '2021-04-12 22:35:36', 6, 4, '<p>Your mum</p>');
/*!40000 ALTER TABLE `message_thread_messages` ENABLE KEYS */;

-- Dumping structure for table svara.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
                                            `id` int unsigned NOT NULL AUTO_INCREMENT,
                                            `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `batch` int NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.migrations: ~32 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_02_01_235702_create_clients_table', 1),
(6, '2021_02_02_000149_create_project_states_table', 1),
(7, '2021_02_02_001432_create_projects_table', 1),
(8, '2021_02_19_163134_create_companies_table', 1),
(9, '2021_02_19_163141_create_teams_table', 1),
(10, '2021_02_24_212811_users_to_clients', 1),
(11, '2021_02_24_212835_users_to_projects', 1),
(12, '2021_02_26_163530_users_to_teams', 1),
(13, '2021_03_07_133929_create_pipeline_entities_table', 1),
(14, '2021_03_07_134011_create_pipeline_phases_table', 1),
(15, '2021_03_07_134729_add_project_pipelines_to_entities', 1),
(16, '2021_03_18_110005_add_current_pipeline_id_to_projects', 1),
(20, '2021_03_26_181510_create_boards_table', 2),
(21, '2021_03_26_181527_create_board_columns_table', 2),
(22, '2021_03_26_181548_create_board_card_labels_table', 2),
(23, '2021_03_26_181549_create_board_cards_table', 2),
(24, '2021_03_26_181612_create_board_card_messages_table', 2),
(25, '2021_03_26_181618_create_board_card_attachments_table', 2),
(26, '2021_04_04_133507_add_created_by_id_to_board_cards', 3),
(27, '2021_04_04_160754_create_documents_table', 4),
(29, '2021_04_04_220425_create_message_threads_table', 5),
(30, '2021_04_04_220433_create_message_thread_messages_table', 5),
(31, '2021_04_04_221112_create_message_thread_attachments_table', 5),
(32, '2021_04_06_153339_add_completed_to_pipeline_phases', 6),
(33, '2021_04_09_131021_create_project_metas_table', 7),
(34, '2021_04_09_163432_add_project_meta_options_table', 8),
(35, '2021_04_11_101207_create_user_types_table', 9),
(37, '2021_04_11_110315_add_activated_deactivated_to_users', 10),
(38, '2021_04_11_121311_add_user_activations_table', 11),
(39, '2021_04_13_195247_create_checklists_table', 12),
(40, '2021_04_13_195256_create_checklist_items_table', 12),
(41, '2021_04_16_151606_create_project_signoffs_table', 13),
(42, '2021_04_16_152522_create_project_signoff_templates_table', 13);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table svara.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
    `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    KEY `password_resets_email_index` (`email`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mariah84@example.net', '$2y$10$Sc3FXpVsFxuVxoBfZEr63.sxG6F4ledNz0TWsldrDIZRNmqeAjECm', '2021-04-12 20:33:56');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table svara.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
                                                        `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                                        `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `tokenable_id` bigint unsigned NOT NULL,
    `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `abilities` text COLLATE utf8mb4_unicode_ci,
    `last_used_at` timestamp NULL DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
    KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.personal_access_tokens: ~0 rows (approximately)
DELETE FROM `personal_access_tokens`;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table svara.pipeline_entities
CREATE TABLE IF NOT EXISTS `pipeline_entities` (
                                                   `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                                   `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `component_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `icon_large` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `icon_small` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.pipeline_entities: ~4 rows (approximately)
DELETE FROM `pipeline_entities`;
/*!40000 ALTER TABLE `pipeline_entities` DISABLE KEYS */;
INSERT INTO `pipeline_entities` (`id`, `name`, `component_name`, `icon_large`, `icon_small`, `description`) VALUES
(1, 'Project Sign-off', 'sign-off', 'sign-off', 'fa-file-signature', 'Adding a sign off requires the phase to be signed off before the project can continue'),
(2, 'Documents', 'documents', 'documents', 'fa-folder-open', 'Adds a folder for file storage to this phase of the project'),
(3, 'Boards', 'boards', 'boards', 'fa-columns', 'Adds a set of fully customisable kanban style boards to the phase'),
(4, 'Checklists', 'checklists', 'checklist', 'fa-clipboard-list', 'Adds a simple checklist to the phase');
/*!40000 ALTER TABLE `pipeline_entities` ENABLE KEYS */;

-- Dumping structure for table svara.pipeline_phases
CREATE TABLE IF NOT EXISTS `pipeline_phases` (
                                                 `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                                 `project_id` bigint unsigned NOT NULL,
                                                 `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `sort_order` int DEFAULT NULL,
    `complete` tinyint(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    KEY `pipeline_phases_project_id_foreign` (`project_id`),
    CONSTRAINT `pipeline_phases_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.pipeline_phases: ~4 rows (approximately)
DELETE FROM `pipeline_phases`;
/*!40000 ALTER TABLE `pipeline_phases` DISABLE KEYS */;
INSERT INTO `pipeline_phases` (`id`, `project_id`, `name`, `sort_order`, `complete`) VALUES
(22, 21, 'Example', 0, 0),
(23, 21, 'Part Two', 1, 0),
(24, 22, 'Example', 0, 1),
(25, 22, 'Part Two', 1, 0),
(26, 23, 'Discovery', 0, 0),
(27, 24, 'Example', 0, 0),
(28, 25, 'Design', 0, 0);
/*!40000 ALTER TABLE `pipeline_phases` ENABLE KEYS */;

-- Dumping structure for table svara.projects
CREATE TABLE IF NOT EXISTS `projects` (
                                          `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                          `created_at` timestamp NULL DEFAULT NULL,
                                          `updated_at` timestamp NULL DEFAULT NULL,
                                          `client_id` bigint unsigned NOT NULL,
                                          `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `project_lead_id` bigint unsigned DEFAULT NULL,
    `project_state_id` bigint unsigned NOT NULL,
    `current_phase_id` bigint unsigned DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `projects_client_id_foreign` (`client_id`),
    KEY `projects_project_lead_id_foreign` (`project_lead_id`),
    KEY `projects_project_state_id_foreign` (`project_state_id`),
    KEY `projects_current_phase_id_foreign` (`current_phase_id`),
    CONSTRAINT `projects_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
    CONSTRAINT `projects_current_phase_id_foreign` FOREIGN KEY (`current_phase_id`) REFERENCES `pipeline_phases` (`id`) ON DELETE CASCADE,
    CONSTRAINT `projects_project_lead_id_foreign` FOREIGN KEY (`project_lead_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
    CONSTRAINT `projects_project_state_id_foreign` FOREIGN KEY (`project_state_id`) REFERENCES `project_states` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.projects: ~5 rows (approximately)
DELETE FROM `projects`;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` (`id`, `created_at`, `updated_at`, `client_id`, `name`, `project_lead_id`, `project_state_id`, `current_phase_id`) VALUES
(21, '2021-03-22 20:14:15', '2021-03-22 20:14:18', 1, 'Example Project', 1, 5, 22),
(22, '2021-03-25 09:13:44', '2021-04-06 16:18:17', 1, 'Example Project', 2, 5, 25),
(23, '2021-04-09 21:12:50', '2021-04-09 21:12:50', 2, 'The new project', 3, 11, 26),
(24, '2021-04-10 21:40:44', '2021-04-10 21:40:44', 1, 'Example Project', 1, 1, 27),
(25, '2021-04-12 22:40:38', '2021-04-12 22:40:38', 2, 'Super Cool Project', 4, 1, 28);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;

-- Dumping structure for table svara.project_metas
CREATE TABLE IF NOT EXISTS `project_metas` (
                                               `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                               `project_id` bigint unsigned NOT NULL,
                                               `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `value_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `sortable` tinyint(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    KEY `project_metas_project_id_foreign` (`project_id`),
    CONSTRAINT `project_metas_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.project_metas: ~2 rows (approximately)
DELETE FROM `project_metas`;
/*!40000 ALTER TABLE `project_metas` DISABLE KEYS */;
INSERT INTO `project_metas` (`id`, `project_id`, `key`, `value`, `value_type`, `sortable`) VALUES
(1, 22, 'Project Completion Date', '2021-06-04', 'date', 1),
(2, 22, 'Project Value', '£2500.00', 'number', 1);
/*!40000 ALTER TABLE `project_metas` ENABLE KEYS */;

-- Dumping structure for table svara.project_meta_options
CREATE TABLE IF NOT EXISTS `project_meta_options` (
                                                      `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                                      `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `value_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `sortable` tinyint(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.project_meta_options: ~2 rows (approximately)
DELETE FROM `project_meta_options`;
/*!40000 ALTER TABLE `project_meta_options` DISABLE KEYS */;
INSERT INTO `project_meta_options` (`id`, `key`, `value_type`, `sortable`) VALUES
(1, 'Project Value', 'number', 1),
(2, 'Project Completion Date', 'date', 1);
/*!40000 ALTER TABLE `project_meta_options` ENABLE KEYS */;

-- Dumping structure for table svara.project_pipelines_to_entities
CREATE TABLE IF NOT EXISTS `project_pipelines_to_entities` (
                                                               `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                                               `pipeline_id` bigint unsigned NOT NULL,
                                                               `entity_id` bigint unsigned NOT NULL,
                                                               PRIMARY KEY (`id`),
    KEY `project_pipelines_to_entities_pipeline_id_foreign` (`pipeline_id`),
    KEY `project_pipelines_to_entities_entity_id_foreign` (`entity_id`),
    CONSTRAINT `project_pipelines_to_entities_entity_id_foreign` FOREIGN KEY (`entity_id`) REFERENCES `pipeline_entities` (`id`) ON DELETE CASCADE,
    CONSTRAINT `project_pipelines_to_entities_pipeline_id_foreign` FOREIGN KEY (`pipeline_id`) REFERENCES `pipeline_phases` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.project_pipelines_to_entities: ~10 rows (approximately)
DELETE FROM `project_pipelines_to_entities`;
/*!40000 ALTER TABLE `project_pipelines_to_entities` DISABLE KEYS */;
INSERT INTO `project_pipelines_to_entities` (`id`, `pipeline_id`, `entity_id`) VALUES
(54, 22, 3),
(55, 22, 2),
(56, 23, 2),
(57, 23, 3),
(58, 23, 1),
(59, 24, 3),
(60, 24, 2),
(61, 25, 2),
(62, 25, 4),
(63, 25, 1);
/*!40000 ALTER TABLE `project_pipelines_to_entities` ENABLE KEYS */;

-- Dumping structure for table svara.project_signoffs
CREATE TABLE IF NOT EXISTS `project_signoffs` (
                                                  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                                  `pipeline_entity_id` bigint unsigned NOT NULL,
                                                  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `signature` text COLLATE utf8mb4_unicode_ci,
    `signoff_timestamp` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `project_signoffs_pipeline_entity_id_foreign` (`pipeline_entity_id`),
    CONSTRAINT `project_signoffs_pipeline_entity_id_foreign` FOREIGN KEY (`pipeline_entity_id`) REFERENCES `project_pipelines_to_entities` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.project_signoffs: ~0 rows (approximately)
DELETE FROM `project_signoffs`;
/*!40000 ALTER TABLE `project_signoffs` DISABLE KEYS */;
INSERT INTO `project_signoffs` (`id`, `pipeline_entity_id`, `name`, `message`, `signature`, `signoff_timestamp`) VALUES
(1, 63, 'Signoff', 'Message sent to client.', NULL, NULL);
/*!40000 ALTER TABLE `project_signoffs` ENABLE KEYS */;

-- Dumping structure for table svara.project_signoff_templates
CREATE TABLE IF NOT EXISTS `project_signoff_templates` (
                                                           `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                                           `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.project_signoff_templates: ~1 rows (approximately)
DELETE FROM `project_signoff_templates`;
/*!40000 ALTER TABLE `project_signoff_templates` DISABLE KEYS */;
INSERT INTO `project_signoff_templates` (`id`, `name`, `message`) VALUES
(1, 'Design Sign Off', 'Hello {client},\n\nWe are happy to present you with these designs for your project {projectName}.\n\nYou are required to sign off on these designs before they can be passed over to the development team for the build. \n\nIf you are happy with the designs we have presented, please sign off below. \n\nOnce these designs have been signed off change cannot be made, and the project will be built as close to the given designs as possible. \n\nMany Thanks,\n{companyName}');
/*!40000 ALTER TABLE `project_signoff_templates` ENABLE KEYS */;

-- Dumping structure for table svara.project_states
CREATE TABLE IF NOT EXISTS `project_states` (
                                                `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                                `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.project_states: ~10 rows (approximately)
DELETE FROM `project_states`;
/*!40000 ALTER TABLE `project_states` DISABLE KEYS */;
INSERT INTO `project_states` (`id`, `state`) VALUES
(1, 'Sales Lead'),
(2, 'Awaiting Sign Off'),
(3, 'To Be Scheduled'),
(4, 'Scheduled'),
(5, 'In Progress'),
(6, 'Beta'),
(7, 'Awaiting Testing'),
(8, 'Awaiting Deployment'),
(9, 'Ongoing'),
(10, 'Complete'),
(11, 'Behind Schedule');
/*!40000 ALTER TABLE `project_states` ENABLE KEYS */;

-- Dumping structure for table svara.teams
CREATE TABLE IF NOT EXISTS `teams` (
                                       `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                       `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.teams: ~2 rows (approximately)
DELETE FROM `teams`;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` (`id`, `name`) VALUES
(1, 'Development'),
(2, 'Marketing'),
(3, 'Sales');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;

-- Dumping structure for table svara.users
CREATE TABLE IF NOT EXISTS `users` (
                                       `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                       `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email_verified_at` timestamp NULL DEFAULT NULL,
    `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `job_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `type_id` bigint unsigned NOT NULL,
    `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    `activated` timestamp NULL DEFAULT NULL,
    `deactivated` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_email_unique` (`email`)
    ) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.users: ~16 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `job_role`, `type_id`, `remember_token`, `created_at`, `updated_at`, `activated`, `deactivated`) VALUES
(1, 'Charlie Underhill', 'charlie@charlesbjerg.com', '2021-03-22 19:33:46', '$2y$10$5NJE5eoyZsR6t2rYNIeSyeaFVfv4AAZibpAu9DCL5cZ4LqPKHixqu', 'Frontend Developer', 2, NULL, '2021-03-22 19:33:46', '2021-03-22 19:33:46', '2021-04-11 12:34:09', NULL),
(2, 'Sophie Hibberd', 'sophie@svara.io', '2021-03-22 19:33:46', '$2y$10$dA65EzkjxGDSwooIioX/Iect2ZKgHFehEFDYDlnNK0cKwaauPJ4E2', 'Graphic Designer', 0, NULL, '2021-03-22 19:33:46', '2021-03-22 19:33:46', '2021-04-11 12:34:11', NULL),
(3, 'Sam Benge', 'sam@svara.io', '2021-03-22 19:33:46', '$2y$10$hta/JjzsaJuW45YPyf31yuV1lm9.sDWoBodSgQuowA9MCkr3/4.JW', 'Lead Developer', 1, NULL, '2021-03-22 19:33:46', '2021-03-22 19:33:46', '2021-04-11 12:34:12', NULL),
(4, 'Ryan Hissey', 'ryan@svara.io', '2021-03-22 19:33:46', '$2y$10$C1BCZU6YnmwSrn7ph9LjEO91Dj6Sw.L3cYPYczcc1hKCP1CFgZgpC', 'Account Manager', 1, NULL, '2021-03-22 19:33:46', '2021-03-22 19:33:46', '2021-04-11 12:34:13', NULL),
(5, 'Steve Jobs', 'steve@apple.com', '2021-03-22 19:33:46', '$2y$10$61gfq7k8oSK4VJS/oY8fveoBcFz76Nt5aW0.TBXKZnZuzPwEfI39O', 'CEO', 3, NULL, '2021-03-22 19:33:46', '2021-03-22 19:33:46', '2021-04-11 12:34:13', NULL),
(6, 'Mr. Joseph Mohr Sr.', 'sadie10@example.net', '2021-03-22 19:33:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 0, 'bjoL8ffWI8', '2021-03-22 19:33:47', '2021-03-22 19:33:47', '2021-04-11 12:34:14', NULL),
(7, 'Minerva Buckridge', 'madelynn.denesik@example.com', '2021-03-22 19:33:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 0, 'dyU8wPrkAg', '2021-03-22 19:33:47', '2021-03-22 19:33:47', '2021-04-11 12:34:15', NULL),
(8, 'Haylee Zieme', 'hbeier@example.net', '2021-03-22 19:33:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 0, 'sC3q3ZCLTX', '2021-03-22 19:33:47', '2021-03-22 19:33:47', '2021-04-11 12:34:15', NULL),
(9, 'Hazle Predovic', 'angelina.purdy@example.com', '2021-03-22 19:33:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 0, 'T6Xjs5W6ZD', '2021-03-22 19:33:47', '2021-03-22 19:33:47', '2021-04-11 12:34:16', NULL),
(10, 'Michel Sipes MD', 'mayer.anita@example.net', '2021-03-22 19:33:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 0, 'w5LBtDTnCF', '2021-03-22 19:33:47', '2021-03-22 19:33:47', '2021-04-11 12:34:17', NULL),
(11, 'Mrs. Mariam Lynch DDS', 'pmurray@example.org', '2021-03-22 19:33:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 0, 'lo61Gy8qU5', '2021-03-22 19:33:47', '2021-03-22 19:33:47', '2021-04-11 12:34:17', NULL),
(12, 'Danial Murazik', 'fstamm@example.com', '2021-03-22 19:33:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 0, 'JuZkVEFJx4', '2021-03-22 19:33:48', '2021-03-22 19:33:48', '2021-04-11 12:34:18', NULL),
(13, 'Bianka Brakus', 'rlang@example.com', '2021-03-22 19:33:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 0, 'o8OBQJLALG', '2021-03-22 19:33:48', '2021-03-22 19:33:48', '2021-04-11 12:34:19', NULL),
(14, 'Miss Carmella Harber', 'mariah84@example.net', '2021-03-22 19:33:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 0, 'rUqnZ4Smpj', '2021-03-22 19:33:48', '2021-03-22 19:33:48', '2021-04-11 12:34:19', NULL),
(15, 'Dr. Jonathon Deckow I', 'marley.hartmann@example.org', '2021-03-22 19:33:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 0, 'Yhe9DNstoX', '2021-03-22 19:33:48', '2021-04-12 20:02:18', NULL, '2021-04-12 20:02:18'),
(25, 'Henry Price', 'TheShimzu@gmail.com', NULL, '$2y$10$7HFdpQX5/akYmJGbwZCo6uY5EolTqJTQ5xxwbba9rgf57imOaheX.', 'Digital Marketer', 1, NULL, '2021-04-12 21:12:36', '2021-04-12 21:12:36', NULL, NULL),
(31, 'Charlie Underhill', 'charlie45@live.co.uk', NULL, '$2y$10$wrrSA1jnbqpM/GIt3SZwXO5poKl9tkef7m9swzteyBaoPxZ6o7g6e', 'CEO & Founder', 3, NULL, '2021-04-13 16:22:35', '2021-04-13 16:22:35', NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table svara.users_to_clients
CREATE TABLE IF NOT EXISTS `users_to_clients` (
                                                  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                                  `user_id` bigint unsigned NOT NULL,
                                                  `client_id` bigint unsigned NOT NULL,
                                                  `role` enum('main_contact','standard') COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`),
    KEY `users_to_clients_user_id_foreign` (`user_id`),
    KEY `users_to_clients_client_id_foreign` (`client_id`),
    CONSTRAINT `users_to_clients_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
    CONSTRAINT `users_to_clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.users_to_clients: ~0 rows (approximately)
DELETE FROM `users_to_clients`;
/*!40000 ALTER TABLE `users_to_clients` DISABLE KEYS */;
INSERT INTO `users_to_clients` (`id`, `user_id`, `client_id`, `role`) VALUES
(1, 5, 1, 'main_contact'),
(2, 31, 5, 'main_contact');
/*!40000 ALTER TABLE `users_to_clients` ENABLE KEYS */;

-- Dumping structure for table svara.users_to_projects
CREATE TABLE IF NOT EXISTS `users_to_projects` (
                                                   `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                                   `user_id` bigint unsigned NOT NULL,
                                                   `project_id` bigint unsigned NOT NULL,
                                                   PRIMARY KEY (`id`),
    KEY `users_to_projects_user_id_foreign` (`user_id`),
    KEY `users_to_projects_project_id_foreign` (`project_id`),
    CONSTRAINT `users_to_projects_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
    CONSTRAINT `users_to_projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.users_to_projects: ~22 rows (approximately)
DELETE FROM `users_to_projects`;
/*!40000 ALTER TABLE `users_to_projects` DISABLE KEYS */;
INSERT INTO `users_to_projects` (`id`, `user_id`, `project_id`) VALUES
(93, 1, 21),
(94, 3, 21),
(95, 12, 21),
(96, 13, 21),
(97, 1, 22),
(98, 3, 22),
(99, 12, 22),
(100, 13, 22),
(101, 1, 23),
(102, 2, 23),
(103, 3, 23),
(104, 4, 23),
(105, 12, 23),
(106, 13, 23),
(107, 1, 24),
(108, 3, 24),
(109, 12, 24),
(110, 13, 24),
(111, 1, 25),
(112, 3, 25),
(113, 4, 25),
(114, 12, 25),
(115, 13, 25);
/*!40000 ALTER TABLE `users_to_projects` ENABLE KEYS */;

-- Dumping structure for table svara.users_to_teams
CREATE TABLE IF NOT EXISTS `users_to_teams` (
                                                `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                                `user_id` bigint unsigned NOT NULL,
                                                `team_id` bigint unsigned NOT NULL,
                                                PRIMARY KEY (`id`),
    KEY `users_to_teams_user_id_foreign` (`user_id`),
    KEY `users_to_teams_team_id_foreign` (`team_id`),
    CONSTRAINT `users_to_teams_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
    CONSTRAINT `users_to_teams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.users_to_teams: ~13 rows (approximately)
DELETE FROM `users_to_teams`;
/*!40000 ALTER TABLE `users_to_teams` DISABLE KEYS */;
INSERT INTO `users_to_teams` (`id`, `user_id`, `team_id`) VALUES
(1, 2, 2),
(2, 3, 1),
(3, 4, 2),
(10, 12, 1),
(11, 13, 1),
(13, 15, 2),
(21, 25, 2),
(23, 1, 1),
(24, 10, 1),
(26, 14, 1),
(27, 8, 1),
(28, 9, 1),
(29, 11, 1),
(30, 7, 3);
/*!40000 ALTER TABLE `users_to_teams` ENABLE KEYS */;

-- Dumping structure for table svara.user_activations
CREATE TABLE IF NOT EXISTS `user_activations` (
                                                  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                                  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `user_id` bigint unsigned NOT NULL,
    PRIMARY KEY (`id`),
    KEY `user_activations_user_id_foreign` (`user_id`),
    CONSTRAINT `user_activations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.user_activations: ~1 rows (approximately)
DELETE FROM `user_activations`;
/*!40000 ALTER TABLE `user_activations` DISABLE KEYS */;
INSERT INTO `user_activations` (`id`, `key`, `user_id`) VALUES
(8, 'QkdWZVE0M3VqdWRuTElRcmk3UWtsRUh1eWNEczJ5dGY=', 25),
(10, 'NFJMRWVQNjh5U3E2RlBrSUVVNHlRTGpMRnNicUpnRE0=', 31);
/*!40000 ALTER TABLE `user_activations` ENABLE KEYS */;

-- Dumping structure for table svara.user_types
CREATE TABLE IF NOT EXISTS `user_types` (
                                            `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                                            `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `permissions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table svara.user_types: ~3 rows (approximately)
DELETE FROM `user_types`;
/*!40000 ALTER TABLE `user_types` DISABLE KEYS */;
INSERT INTO `user_types` (`id`, `type`, `permissions`) VALUES
(1, 'Standard', ''),
(2, 'Manager', ''),
(3, 'Owner', '');
/*!40000 ALTER TABLE `user_types` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
