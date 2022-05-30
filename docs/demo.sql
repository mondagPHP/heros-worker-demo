CREATE TABLE `demo_user` (
     `id` int unsigned NOT NULL AUTO_INCREMENT,
     `name` varchar(50) DEFAULT NULL,
     `account` varchar(100) DEFAULT NULL,
     `password` varchar(255) DEFAULT NULL,
     `created_at` datetime DEFAULT NULL,
     `updated_at` datetime DEFAULT NULL,
     PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT into demo_user (id, `name`, `account`, `password`) values (1, 'admin', 'admin', '123456');