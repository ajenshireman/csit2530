SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `c2530a07proj` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `c2530a07proj` ;

-- -----------------------------------------------------
-- Table `c2530a07proj`.`status`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `c2530a07proj`.`status` (
  `statusId` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(25) NOT NULL ,
  `description` LONGTEXT NULL ,
  `created` BIGINT UNSIGNED NULL ,
  `edited` BIGINT UNSIGNED NULL ,
  PRIMARY KEY (`statusId`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `c2530a07proj`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `c2530a07proj`.`user` (
  `userId` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(255) NOT NULL ,
  `email` VARCHAR(255) NOT NULL ,
  `pstcc_email` VARCHAR(255) NULL DEFAULT NULL ,
  `statusId` BIGINT UNSIGNED NOT NULL DEFAULT 1 ,
  `created` BIGINT UNSIGNED NULL ,
  `edited` BIGINT UNSIGNED NULL ,
  PRIMARY KEY (`userId`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  UNIQUE INDEX `pscc_email_UNIQUE` (`pstcc_email` ASC) ,
  INDEX `fk_user_status` (`statusId` ASC) ,
  CONSTRAINT `fk_user_status`
    FOREIGN KEY (`statusId` )
    REFERENCES `c2530a07proj`.`status` (`statusId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `c2530a07proj`.`role`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `c2530a07proj`.`role` (
  `roleId` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(25) NOT NULL ,
  `description` LONGTEXT NULL DEFAULT NULL ,
  `canBrowse` TINYINT(1) NOT NULL DEFAULT 1 ,
  `canDownload` TINYINT(1) NOT NULL DEFAULT 0 ,
  `canUpload` TINYINT(1) NOT NULL DEFAULT 0 ,
  `canApprove` TINYINT(1) NOT NULL DEFAULT 0 ,
  `isAdmin` TINYINT(1) NOT NULL DEFAULT 0 ,
  `statusId` BIGINT UNSIGNED NOT NULL DEFAULT 2 ,
  `created` BIGINT UNSIGNED NULL ,
  `edited` BIGINT UNSIGNED NULL ,
  PRIMARY KEY (`roleId`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) ,
  INDEX `fk_role_status` (`statusId` ASC) ,
  CONSTRAINT `fk_role_status`
    FOREIGN KEY (`statusId` )
    REFERENCES `c2530a07proj`.`status` (`statusId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `c2530a07proj`.`user_role`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `c2530a07proj`.`user_role` (
  `userId` BIGINT UNSIGNED NOT NULL ,
  `roleId` BIGINT UNSIGNED NOT NULL ,
  `created` BIGINT UNSIGNED NULL ,
  PRIMARY KEY (`userId`, `roleId`) ,
  INDEX `fk_User_Group_User` (`userId` ASC) ,
  INDEX `fk_User_Group_Group` (`roleId` ASC) ,
  CONSTRAINT `fk_User_Group_User`
    FOREIGN KEY (`userId` )
    REFERENCES `c2530a07proj`.`user` (`userId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_Group_Group`
    FOREIGN KEY (`roleId` )
    REFERENCES `c2530a07proj`.`role` (`roleId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `c2530a07proj`.`application`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `c2530a07proj`.`application` (
  `applicationId` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `userId` BIGINT UNSIGNED NOT NULL ,
  `name` VARCHAR(255) NOT NULL ,
  `description` LONGTEXT NULL DEFAULT NULL ,
  `currentVersion` VARCHAR(25) NULL DEFAULT NULL ,
  `statusId` BIGINT UNSIGNED NOT NULL DEFAULT 2 ,
  `created` BIGINT UNSIGNED NULL ,
  `edited` BIGINT UNSIGNED NULL ,
  PRIMARY KEY (`applicationId`) ,
  INDEX `fk_Application_User` (`userId` ASC) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) ,
  INDEX `fk_application_status` (`statusId` ASC) ,
  CONSTRAINT `fk_Application_User`
    FOREIGN KEY (`userId` )
    REFERENCES `c2530a07proj`.`user` (`userId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_application_status`
    FOREIGN KEY (`statusId` )
    REFERENCES `c2530a07proj`.`status` (`statusId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `c2530a07proj`.`platformType`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `c2530a07proj`.`platformType` (
  `platformTypeId` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(25) NOT NULL ,
  `description` LONGTEXT NULL DEFAULT NULL ,
  `statusId` BIGINT UNSIGNED NOT NULL DEFAULT 2 ,
  `created` BIGINT UNSIGNED NULL ,
  `edited` BIGINT UNSIGNED NULL ,
  PRIMARY KEY (`platformTypeId`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) ,
  INDEX `fk_platformType_status` (`statusId` ASC) ,
  CONSTRAINT `fk_platformType_status`
    FOREIGN KEY (`statusId` )
    REFERENCES `c2530a07proj`.`status` (`statusId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `c2530a07proj`.`platform`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `c2530a07proj`.`platform` (
  `platformId` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(60) NOT NULL ,
  `platformTypeId` BIGINT UNSIGNED NOT NULL ,
  `description` LONGTEXT NULL DEFAULT NULL ,
  `statusId` BIGINT UNSIGNED NOT NULL DEFAULT 2 ,
  `created` BIGINT UNSIGNED NULL ,
  `edited` BIGINT UNSIGNED NULL ,
  PRIMARY KEY (`platformId`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) ,
  INDEX `fk_Platform_PlatformType` (`platformTypeId` ASC) ,
  INDEX `fk_platform_status` (`statusId` ASC) ,
  CONSTRAINT `fk_Platform_PlatformType`
    FOREIGN KEY (`platformTypeId` )
    REFERENCES `c2530a07proj`.`platformType` (`platformTypeId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_platform_status`
    FOREIGN KEY (`statusId` )
    REFERENCES `c2530a07proj`.`status` (`statusId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `c2530a07proj`.`file`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `c2530a07proj`.`file` (
  `fileId` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `applicationId` BIGINT UNSIGNED NOT NULL ,
  `platformId` BIGINT UNSIGNED NOT NULL ,
  `version` VARCHAR(25) NULL DEFAULT NULL ,
  `location` VARCHAR(255) NOT NULL ,
  `statusId` BIGINT UNSIGNED NOT NULL DEFAULT 1 ,
  `created` BIGINT UNSIGNED NULL ,
  `edited` BIGINT UNSIGNED NULL ,
  PRIMARY KEY (`fileId`) ,
  INDEX `fk_File_Application` (`applicationId` ASC) ,
  INDEX `fk_File_Platform` (`platformId` ASC) ,
  INDEX `fk_file_status` (`statusId` ASC) ,
  CONSTRAINT `fk_File_Application`
    FOREIGN KEY (`applicationId` )
    REFERENCES `c2530a07proj`.`application` (`applicationId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_File_Platform`
    FOREIGN KEY (`platformId` )
    REFERENCES `c2530a07proj`.`platform` (`platformId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_file_status`
    FOREIGN KEY (`statusId` )
    REFERENCES `c2530a07proj`.`status` (`statusId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `c2530a07proj`.`download`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `c2530a07proj`.`download` (
  `downoadId` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `userId` BIGINT UNSIGNED NOT NULL ,
  `fileId` BIGINT UNSIGNED NOT NULL ,
  `ip` VARCHAR(255) NOT NULL ,
  `created` BIGINT UNSIGNED NULL ,
  PRIMARY KEY (`downoadId`) ,
  INDEX `fk_Download_User` (`userId` ASC) ,
  INDEX `fk_Download_File` (`fileId` ASC) ,
  CONSTRAINT `fk_Download_User`
    FOREIGN KEY (`userId` )
    REFERENCES `c2530a07proj`.`user` (`userId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Download_File`
    FOREIGN KEY (`fileId` )
    REFERENCES `c2530a07proj`.`file` (`fileId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `c2530a07proj`.`login`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `c2530a07proj`.`login` (
  `loginId` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `userId` BIGINT UNSIGNED NOT NULL ,
  `ip` VARCHAR(255) NOT NULL ,
  `succeeded` TINYINT(1) NOT NULL DEFAULT 0 ,
  `created` BIGINT UNSIGNED NULL ,
  PRIMARY KEY (`loginId`) ,
  INDEX `fk_Login_User` (`userId` ASC) ,
  CONSTRAINT `fk_Login_User`
    FOREIGN KEY (`userId` )
    REFERENCES `c2530a07proj`.`user` (`userId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `c2530a07proj`.`application_platform`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `c2530a07proj`.`application_platform` (
  `applicationId` BIGINT UNSIGNED NOT NULL ,
  `platformId` BIGINT UNSIGNED NOT NULL ,
  `created` BIGINT UNSIGNED NULL ,
  PRIMARY KEY (`applicationId`, `platformId`) ,
  INDEX `fk_Application_Platform_Application` (`applicationId` ASC) ,
  CONSTRAINT `fk_Application_Platform_Platform`
    FOREIGN KEY (`platformId` )
    REFERENCES `c2530a07proj`.`platform` (`platformId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Application_Platform_Application`
    FOREIGN KEY (`applicationId` )
    REFERENCES `c2530a07proj`.`application` (`applicationId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `c2530a07proj`.`language`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `c2530a07proj`.`language` (
  `languageId` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(25) NULL ,
  `description` LONGTEXT NULL DEFAULT NULL ,
  `statusId` BIGINT UNSIGNED NOT NULL DEFAULT 2 ,
  `created` BIGINT UNSIGNED NULL ,
  `edited` BIGINT UNSIGNED NULL ,
  PRIMARY KEY (`languageId`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) ,
  INDEX `fk_language_status` (`statusId` ASC) ,
  CONSTRAINT `fk_language_status`
    FOREIGN KEY (`statusId` )
    REFERENCES `c2530a07proj`.`status` (`statusId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `c2530a07proj`.`application_language`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `c2530a07proj`.`application_language` (
  `applicationId` BIGINT UNSIGNED NOT NULL ,
  `languageId` BIGINT UNSIGNED NOT NULL ,
  `created` BIGINT UNSIGNED NULL ,
  PRIMARY KEY (`applicationId`, `languageId`) ,
  INDEX `fk_Application_Language_Language` (`languageId` ASC) ,
  CONSTRAINT `fk_Application_Language_Application`
    FOREIGN KEY (`applicationId` )
    REFERENCES `c2530a07proj`.`application` (`applicationId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Application_Language_Language`
    FOREIGN KEY (`languageId` )
    REFERENCES `c2530a07proj`.`language` (`languageId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `c2530a07proj`.`category`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `c2530a07proj`.`category` (
  `categoryId` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(25) NOT NULL ,
  `description` LONGTEXT NULL DEFAULT NULL ,
  `parentCategoryId` BIGINT UNSIGNED NULL DEFAULT NULL ,
  `statusId` BIGINT UNSIGNED NOT NULL DEFAULT 2 ,
  `created` BIGINT UNSIGNED NOT NULL ,
  `edited` BIGINT UNSIGNED NULL ,
  PRIMARY KEY (`categoryId`) ,
  INDEX `fk_parentCategory` (`parentCategoryId` ASC) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) ,
  INDEX `fk_category_status` (`statusId` ASC) ,
  CONSTRAINT `fk_parentCategory`
    FOREIGN KEY (`parentCategoryId` )
    REFERENCES `c2530a07proj`.`category` (`categoryId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_category_status`
    FOREIGN KEY (`statusId` )
    REFERENCES `c2530a07proj`.`status` (`statusId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `c2530a07proj`.`application_category`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `c2530a07proj`.`application_category` (
  `applicationId` BIGINT UNSIGNED NOT NULL ,
  `categoryId` BIGINT UNSIGNED NOT NULL ,
  `created` BIGINT NULL ,
  PRIMARY KEY (`applicationId`, `categoryId`) ,
  INDEX `fk_application_category_category` (`categoryId` ASC) ,
  CONSTRAINT `fk_application_category_application`
    FOREIGN KEY (`applicationId` )
    REFERENCES `c2530a07proj`.`application` (`applicationId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_application_category_category`
    FOREIGN KEY (`categoryId` )
    REFERENCES `c2530a07proj`.`category` (`categoryId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
