-- Com não foi específicado as configurações do banco, deixei por default. 
CREATE SCHEMA `auesoftware` ;

CREATE TABLE `auesoftware`.`contatos` (
    `codcontato` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(255) NOT NULL,
    `sexo` INT(11) NOT NULL,
    `data` DATE NOT NULL,
    `cidade` INT(11) NOT NULL,
    `data_envio` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`codcontato`));

CREATE TABLE `auesoftware`.`cidades` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `cidade` VARCHAR(255) NOT NULL,
    `insersor` INT NOT NULL,
    `data_envio` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`id`));

CREATE TABLE `auesoftware`.`usuarios` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `usuario_nome` VARCHAR(45) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `data_nascimento` DATE NOT NULL,
    `senha` VARCHAR(255) NOT NULL,
    `permissao` INT NOT NULL,
    `data_envio` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`id`));

ALTER TABLE `auesoftware`.`cidades` 
ADD COLUMN `status` INT(1) NOT NULL DEFAULT 1 AFTER `insersor`;

ALTER TABLE `auesoftware`.`contatos` 
CHANGE COLUMN `sexo` `sexo` CHAR(1) NOT NULL ;
