-- -------------------------------------------------------------------------------------------------------
-- MySQL Workbench Migration
-- Migrated Schemata: treaty
-- Source Schemata: treaty
-- Created Mon Jan 21 12:49:41 2018
-- Workbench Version: 6.3.10
-- -------------------------------------------------------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 0;

-- -------------------------------------------------------------------------------------------------------
-- Schema treaty
-- -------------------------------------------------------------------------------------------------------
DROP SCHEMA IF EXISTS `treaty`;
CREATE SCHEMA IF NOT EXISTS `treaty`;

-- -------------------------------------------------------------------------------------------------------
-- Table treaty.users
-- -------------------------------------------------------------------------------------------------------
DROP TABLE IF EXISTS `treaty`.`user`;
CREATE TABLE IF NOT EXISTS `treaty`.`user` (
`id` BIGINT(20) NOT NULL AUTO_INCREMENT,
`email` VARCHAR(80) CHARACTER SET `utf8` NOT NULL,
`role` VARCHAR(20) CHARACTER SET `utf8` NULL DEFAULT NULL,
`last_login_time` TIMESTAMP NULL DEFAULT NULL,
`encrypted_password` VARCHAR(64) NOT NULL,
`isactive` BIGINT(20) NOT NULL DEFAULT '1',
`modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`modifiedby`BIGINT(20) NULL DEFAULT NULL,
`created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`createdby`BIGINT(20) NULL DEFAULT NULL,
PRIMARY KEY (`id`),
UNIQUE INDEX `ix_user_email` (`email`),
INDEX `ix_user_createdby` (`createdby`),
INDEX `ix_user_lastupdateby` (`modifiedby`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci

-- -------------------------------------------------------------------------------------------------------
