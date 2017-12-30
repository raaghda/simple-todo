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

INSERT INTO `todos` (`todoid`, `title`, `completed`, `createdby`, `priority`) VALUES
(533, 'Pick up Christmas gifts', 1, 'Ralph', 1),
(534, 'Borrow some books from Library', 1, 'Diana', 0),
(535, 'Shop for new gloves', 0, 'Raghda', 0),
(536, 'Buy some groceries', 0, 'John Doe', 1);
