-- -----------------------------------------------------
-- Schema todos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `todos` DEFAULT CHARACTER SET utf8 ;
USE `todos` ;

-- -----------------------------------------------------
-- Table `todos`.`todos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `todos`.`todos` (
  `todoid` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `completed` TINYINT NOT NULL DEFAULT 0,
  `createdby` VARCHAR(50) NOT NULL,
  `priority` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`todoid`),
  UNIQUE INDEX `title_UNIQUE` (`title` ASC))
ENGINE = InnoDB;
