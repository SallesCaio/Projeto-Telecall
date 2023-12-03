-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema usuarios
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema usuarios
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `usuarios` DEFAULT CHARACTER SET utf8 ;
USE `usuarios` ;

-- -----------------------------------------------------
-- Table `usuarios`.`log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuarios`.`log` (
  `id_log` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `data_hora` VARCHAR(45) NOT NULL,
  `log_mensagem` VARCHAR(100) NOT NULL,
  `id_usuario` INT(11) NOT NULL,
  PRIMARY KEY (`id_log`))
ENGINE = InnoDB
AUTO_INCREMENT = 83
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `usuarios`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuarios`.`usuario` (
  `cpf` VARCHAR(12) NOT NULL,
  `nome` VARCHAR(80) NOT NULL,
  `data_nascimento` DATE NOT NULL,
  `sexo` VARCHAR(15) NOT NULL,
  `nome_materno` VARCHAR(45) NOT NULL,
  `telefone_celular` VARCHAR(18) NOT NULL,
  `telefone_fixo` VARCHAR(18) NOT NULL,
  `endereço` VARCHAR(145) NOT NULL,
  `login` VARCHAR(6) NOT NULL,
  `senha` VARCHAR(8) NOT NULL,
  `cep` INT(11) NULL DEFAULT NULL,
  `bairro` VARCHAR(45) NULL DEFAULT NULL,
  `cidade` VARCHAR(45) NULL DEFAULT NULL,
  `uf` VARCHAR(2) NOT NULL,
  `num` INT(11) NULL DEFAULT NULL,
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `role` VARCHAR(15) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 28
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
