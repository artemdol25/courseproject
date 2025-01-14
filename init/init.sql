CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'localhost' IDENTIFIED BY 'password';
GRANT ALL ON appDB.* TO 'user'@'localhost';
FLUSH PRIVILEGES;

USE appDB;

CREATE TABLE IF NOT EXISTS Workers (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) CHARACTER SET utf8 NOT NULL,
    `position` ENUM('Admin', 'Manager', 'Worker') NOT NULL,
    `password` VARCHAR(125) NOT NULL,
    `email` VARCHAR(125) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS Tasks (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `text` VARCHAR(300) CHARACTER SET utf8 NOT NULL,
    `deadline_date` VARCHAR(20) NOT NULL,
    `owner_of_task` INT(11) NOT NULL,
    `is_completed` INT(11) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `Tasks_FK` (`owner_of_task`),
    CONSTRAINT `Tasks_FK` FOREIGN KEY (`owner_of_task`) REFERENCES `Workers` (`id`)
);

LOCK TABLES `Workers` WRITE;
-- Вставка данных (если требуется)
-- INSERT INTO Workers
-- VALUES
UNLOCK TABLES;

LOCK TABLES `Tasks` WRITE;
-- Вставка данных (если требуется)
-- /*!40000 ALTER TABLE `Tasks` DISABLE KEYS */;
-- INSERT INTO `Tasks`
-- VALUES 
--     (1, 'Make course work', '29.11.2021', 3, 1),
--     (2, 'faf', '2021-11-13', 1, 1),
--     (3, 'faf', '2021-11-13', 1, 1);
-- /*!40000 ALTER TABLE `Tasks` ENABLE KEYS */;
UNLOCK TABLES;