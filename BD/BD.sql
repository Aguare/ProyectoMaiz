-- MySQL Script generated by MySQL Workbench
-- Sun Apr  9 19:56:40 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema corn_project
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `corn_project` ;

-- -----------------------------------------------------
-- Schema corn_project
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `corn_project` DEFAULT CHARACTER SET utf8 ;
USE `corn_project` ;

-- -----------------------------------------------------
-- Table `corn_project`.`Category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `corn_project`.`Category` (
  `id_category` INT NOT NULL AUTO_INCREMENT,
  `name_category` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_category`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `corn_project`.`Ingredient`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `corn_project`.`Ingredient` (
  `id_ingredient` INT NOT NULL AUTO_INCREMENT,
  `name_ingredient` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_ingredient`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `corn_project`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `corn_project`.`User` (
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(250) NOT NULL,
  `email` VARCHAR(100) NULL,
  PRIMARY KEY (`username`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `corn_project`.`Recipe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `corn_project`.`Recipe` (
  `id_recipe` INT NOT NULL AUTO_INCREMENT,
  `name_recipe` VARCHAR(45) NOT NULL,
  `description` VARCHAR(250) NOT NULL,
  `instruction` LONGTEXT NOT NULL,
  `image` LONGBLOB NULL,
  `preparation_time` TIME NOT NULL,
  `difficulty` INT NOT NULL,
  `portions` INT NOT NULL,
  `fk_username` VARCHAR(45) NOT NULL,
  `fk_id_category` INT NOT NULL,
  PRIMARY KEY (`id_recipe`, `fk_username`, `fk_id_category`),
  INDEX `fk_Recipe_User_idx` (`fk_username` ASC) VISIBLE,
  INDEX `fk_Recipe_Category1_idx` (`fk_id_category` ASC) VISIBLE,
  CONSTRAINT `fk_Recipe_User`
    FOREIGN KEY (`fk_username`)
    REFERENCES `corn_project`.`User` (`username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Recipe_Category1`
    FOREIGN KEY (`fk_id_category`)
    REFERENCES `corn_project`.`Category` (`id_category`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `corn_project`.`list_ingredients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `corn_project`.`list_ingredients` (
  `LI_id_ingredient` INT NOT NULL,
  `LI_id_recipe` INT NOT NULL,
  `quantity` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`LI_id_ingredient`, `LI_id_recipe`),
  INDEX `fk_Ingredient_has_Recipe_Recipe1_idx` (`LI_id_recipe` ASC) VISIBLE,
  INDEX `fk_Ingredient_has_Recipe_Ingredient1_idx` (`LI_id_ingredient` ASC) VISIBLE,
  CONSTRAINT `fk_Ingredient_has_Recipe_Ingredient1`
    FOREIGN KEY (`LI_id_ingredient`)
    REFERENCES `corn_project`.`Ingredient` (`id_ingredient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Ingredient_has_Recipe_Recipe1`
    FOREIGN KEY (`LI_id_recipe`)
    REFERENCES `corn_project`.`Recipe` (`id_recipe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `corn_project`.`Comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `corn_project`.`Comment` (
  `id_comment` INT NOT NULL,
  `comment` VARCHAR(250) NOT NULL,
  `C_id_recipe` INT NOT NULL,
  `C_username` VARCHAR(45) NOT NULL,
  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id_comment`, `C_id_recipe`, `C_username`),
  INDEX `fk_Comment_Recipe1_idx` (`C_id_recipe` ASC) VISIBLE,
  INDEX `fk_Comment_User1_idx` (`C_username` ASC) VISIBLE,
  CONSTRAINT `fk_Comment_Recipe1`
    FOREIGN KEY (`C_id_recipe`)
    REFERENCES `corn_project`.`Recipe` (`id_recipe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comment_User1`
    FOREIGN KEY (`C_username`)
    REFERENCES `corn_project`.`User` (`username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
