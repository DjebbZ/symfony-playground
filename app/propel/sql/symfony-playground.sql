
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- ticket
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ticket`;

CREATE TABLE `ticket`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(100),
    `description` TEXT,
    `user_id` INTEGER,
    `created_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `ticket_FI_1` (`user_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(30),
    `created_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
