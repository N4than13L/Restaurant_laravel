-- MySQL Workbench Synchronization
-- Generated: 2024-06-18 10:38
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: natha

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER SCHEMA `restaurante_laravel`  DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_general_ci ;

ALTER TABLE `restaurante_laravel`.`tables` 
DROP FOREIGN KEY `fk_tables_clients1`,
DROP FOREIGN KEY `fk_tables_users1`;

ALTER TABLE `restaurante_laravel`.`clients` 
DROP FOREIGN KEY `fk_clients_users`;

ALTER TABLE `restaurante_laravel`.`menus` 
DROP FOREIGN KEY `fk_menus_users1`;

ALTER TABLE `restaurante_laravel`.`bills` 
DROP FOREIGN KEY `fk_bills_users1`,
DROP FOREIGN KEY `fk_sales_menus1`,
DROP FOREIGN KEY `fk_sales_clients1`;

ALTER TABLE `restaurante_laravel`.`users` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `restaurante_laravel`.`tables` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `restaurante_laravel`.`clients` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `restaurante_laravel`.`menus` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `restaurante_laravel`.`bills` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
CHANGE COLUMN `users_id` `users_id` INT(11) NOT NULL AFTER `id`,
ADD INDEX `fk_bills_menus1_idx` (`menus_id` ASC) VISIBLE,
ADD INDEX `fk_bills_clients1_idx` (`clients_id` ASC) VISIBLE,
DROP INDEX `fk_sales_clients1_idx` ,
DROP INDEX `fk_sales_menus1_idx` ;
;

ALTER TABLE `restaurante_laravel`.`tables` 
ADD CONSTRAINT `fk_tables_clients1`
  FOREIGN KEY (`clients_id`)
  REFERENCES `restaurante_laravel`.`clients` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tables_users1`
  FOREIGN KEY (`users_id`)
  REFERENCES `restaurante_laravel`.`users` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `restaurante_laravel`.`clients` 
ADD CONSTRAINT `fk_clients_users`
  FOREIGN KEY (`users_id`)
  REFERENCES `restaurante_laravel`.`users` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `restaurante_laravel`.`menus` 
ADD CONSTRAINT `fk_menus_users1`
  FOREIGN KEY (`users_id`)
  REFERENCES `restaurante_laravel`.`users` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `restaurante_laravel`.`bills` 
ADD CONSTRAINT `fk_bills_users1`
  FOREIGN KEY (`users_id`)
  REFERENCES `restaurante_laravel`.`users` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_bills_menus1`
  FOREIGN KEY (`menus_id`)
  REFERENCES `restaurante_laravel`.`menus` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_bills_clients1`
  FOREIGN KEY (`clients_id`)
  REFERENCES `restaurante_laravel`.`clients` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
