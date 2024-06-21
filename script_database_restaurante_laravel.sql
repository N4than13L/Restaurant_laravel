-- MySQL Workbench Synchronization
-- Generated: 2024-06-21 11:22
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: natha

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `Restaurante_laravel` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `Restaurante_laravel`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `surname` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `password` CHAR(255) NULL DEFAULT NULL,
  `role` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `Restaurante_laravel`.`tables` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `clients_id` INT(11) NOT NULL,
  `users_id` INT(11) NOT NULL,
  `menus_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tables_clients1_idx` (`clients_id` ASC) VISIBLE,
  INDEX `fk_tables_users1_idx` (`users_id` ASC) VISIBLE,
  INDEX `fk_tables_menus1_idx` (`menus_id` ASC) VISIBLE,
  CONSTRAINT `fk_tables_clients1`
    FOREIGN KEY (`clients_id`)
    REFERENCES `Restaurante_laravel`.`clients` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tables_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `Restaurante_laravel`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tables_menus1`
    FOREIGN KEY (`menus_id`)
    REFERENCES `Restaurante_laravel`.`menus` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `Restaurante_laravel`.`clients` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `fullname` VARCHAR(45) NULL DEFAULT NULL,
  `address` VARCHAR(45) NULL DEFAULT NULL,
  `phone` VARCHAR(45) NULL DEFAULT NULL,
  `users_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_clients_users_idx` (`users_id` ASC) VISIBLE,
  CONSTRAINT `fk_clients_users`
    FOREIGN KEY (`users_id`)
    REFERENCES `Restaurante_laravel`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `Restaurante_laravel`.`menus` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `amount` FLOAT(11) NULL DEFAULT NULL,
  `users_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_menus_users1_idx` (`users_id` ASC) VISIBLE,
  CONSTRAINT `fk_menus_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `Restaurante_laravel`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `Restaurante_laravel`.`bills` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `users_id` INT(11) NOT NULL,
  `menus_id` INT(11) NOT NULL,
  `clients_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_bills_users1_idx` (`users_id` ASC) VISIBLE,
  INDEX `fk_bills_menus1_idx` (`menus_id` ASC) VISIBLE,
  INDEX `fk_bills_clients1_idx` (`clients_id` ASC) VISIBLE,
  CONSTRAINT `fk_bills_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `Restaurante_laravel`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bills_menus1`
    FOREIGN KEY (`menus_id`)
    REFERENCES `Restaurante_laravel`.`menus` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bills_clients1`
    FOREIGN KEY (`clients_id`)
    REFERENCES `Restaurante_laravel`.`clients` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
