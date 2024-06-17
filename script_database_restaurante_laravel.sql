-- MySQL Workbench Synchronization
-- Generated: 2024-06-17 10:30
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: natha

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER SCHEMA `restaurante_laravel`  DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_general_ci ;

ALTER TABLE `restaurante_laravel`.`tables` 
DROP FOREIGN KEY `fk_tables_users1`;

ALTER TABLE `restaurante_laravel`.`clients` 
DROP FOREIGN KEY `fk_clients_users`;

ALTER TABLE `restaurante_laravel`.`menus` 
DROP FOREIGN KEY `fk_menus_users1`;

ALTER TABLE `restaurante_laravel`.`CXC` 
DROP FOREIGN KEY `fk_CXC_users1`;

ALTER TABLE `restaurante_laravel`.`CXP` 
DROP FOREIGN KEY `fk_CXP_users1`;

ALTER TABLE `restaurante_laravel`.`bill` 
DROP FOREIGN KEY `fk_sales_clients1`;

ALTER TABLE `restaurante_laravel`.`users` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `restaurante_laravel`.`tables` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
ADD INDEX `fk_tables_users1_idx` (`users_id` ASC) VISIBLE,
DROP INDEX `fk_tables_users1_idx` ;
;

ALTER TABLE `restaurante_laravel`.`clients` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
ADD INDEX `fk_clients_users_idx` (`users_id` ASC) VISIBLE,
DROP INDEX `fk_clients_users_idx` ;
;

ALTER TABLE `restaurante_laravel`.`menus` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
ADD INDEX `fk_menus_users1_idx` (`users_id` ASC) VISIBLE,
DROP INDEX `fk_menus_users1_idx` ;
;

ALTER TABLE `restaurante_laravel`.`CXC` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
ADD INDEX `fk_CXC_users1_idx` (`users_id` ASC) VISIBLE,
DROP INDEX `fk_CXC_users1_idx` ;
;

ALTER TABLE `restaurante_laravel`.`CXP` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
ADD INDEX `fk_CXP_users1_idx` (`users_id` ASC) VISIBLE,
DROP INDEX `fk_CXP_users1_idx` ;
;

ALTER TABLE `restaurante_laravel`.`bill` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
ADD INDEX `fk_sales_menus1_idx` (`menus_id` ASC) VISIBLE,
ADD INDEX `fk_sales_clients1_idx` (`clients_id` ASC) VISIBLE,
DROP INDEX `fk_sales_clients1_idx` ,
DROP INDEX `fk_sales_menus1_idx` ;
;

ALTER TABLE `restaurante_laravel`.`tables` 
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

ALTER TABLE `restaurante_laravel`.`CXC` 
ADD CONSTRAINT `fk_CXC_users1`
  FOREIGN KEY (`users_id`)
  REFERENCES `restaurante_laravel`.`users` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `restaurante_laravel`.`CXP` 
ADD CONSTRAINT `fk_CXP_users1`
  FOREIGN KEY (`users_id`)
  REFERENCES `restaurante_laravel`.`users` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `restaurante_laravel`.`bill` 
DROP FOREIGN KEY `fk_sales_menus1`;

ALTER TABLE `restaurante_laravel`.`bill` ADD CONSTRAINT `fk_sales_menus1`
  FOREIGN KEY (`menus_id`)
  REFERENCES `restaurante_laravel`.`menus` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_sales_clients1`
  FOREIGN KEY (`clients_id`)
  REFERENCES `restaurante_laravel`.`clients` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
