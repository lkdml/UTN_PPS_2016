-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema tmh
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tmh
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tmh` DEFAULT CHARACTER SET utf8 ;
USE `tmh` ;

-- -----------------------------------------------------
-- Table `tmh`.`categoria_anuncios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`categoria_anuncios` (
  `categoria_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `icono` VARCHAR(60) NULL,
  PRIMARY KEY (`categoria_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`anuncio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`anuncio` (
  `anuncio_id` INT(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` INT NOT NULL,
  `titulo` VARCHAR(45) NOT NULL,
  `contenido` VARCHAR(250) CHARACTER SET 'utf8' NOT NULL,
  `fecha_Creacion` DATETIME NOT NULL,
  `estado` TINYINT(1) NOT NULL,
  `fecha_fin_publicacion` DATETIME NULL,
  `operador_id` INT NOT NULL,
  PRIMARY KEY (`anuncio_id`),
  INDEX `fk_anuncios_categoria_idx` (`categoria_id` ASC),
  CONSTRAINT `fk_anuncios_categoria`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `tmh`.`categoria_anuncios` (`categoria_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`departamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`departamento` (
  `departamento_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `padre_depto_id` INT NULL,
  `visibilidad_usuario` SMALLINT NOT NULL,
  `orden` INT NULL,
  `operador_default_id` INT NULL,
  PRIMARY KEY (`departamento_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`empresa` (
  `empresa_id` INT(11) NOT NULL AUTO_INCREMENT,
  `razon_social` VARCHAR(45) NOT NULL,
  `pais` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `ciudad` VARCHAR(45) NULL,
  `codigo_postal` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  `web` VARCHAR(45) NULL,
  `ultima_actualizacion` DATETIME NOT NULL,
  PRIMARY KEY (`empresa_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`ticket_estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`ticket_estado` (
  `estado_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `color` VARCHAR(45) NOT NULL,
  `icono` VARCHAR(60) NOT NULL ,
  `autocierre` TINYINT(1) NOT NULL,
  `estadoFinal` TINYINT(1) NOT NULL,
  `orden` INT NULL,
  PRIMARY KEY (`estado_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`perfil` (
  `perfil_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `estado` TINYINT(1) NOT NULL,
  PRIMARY KEY (`perfil_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`operador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`operador` (
  `operador_id` INT(11) NOT NULL AUTO_INCREMENT,
  `perfil_id` INT(11) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `nombre_usuario` VARCHAR(45) NOT NULL,
  `clave` VARCHAR(60) NOT NULL,
  `firma_mensaje` VARCHAR(245) NULL,
  `email` VARCHAR(225) NOT NULL,
  `celular` VARCHAR(45) NULL,
  `ultima_actualizacion` DATETIME NULL,
  `ultima_actividad` DATETIME NULL,
  `activo` TINYINT(1) NOT NULL,
  `deptos_habilitados` INT NULL,
  `habilita_notificaciones_mail` SMALLINT NOT NULL,
  `filtro_ticket_id` INT NULL,
  `hash_foto` VARCHAR(245) NULL,
  `eliminado` TINYINT(1) NOT NULL,
  PRIMARY KEY (`operador_id`),
  INDEX `fk_operadores_perfil_perfil_idx` (`perfil_id` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  CONSTRAINT `fk_operadores_perfil_perfil`
    FOREIGN KEY (`perfil_id`)
    REFERENCES `tmh`.`perfil` (`perfil_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`rol` (
  `nombre` VARCHAR(45) NOT NULL ,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`nombre`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`perfil_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`perfil_roles` (
  `perfil_id` INT(11) NOT NULL ,
  `rol_nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`perfil_id`, `rol_nombre`),
  INDEX `fk_nombre_rol_perfil_idx` (`rol_nombre` ASC),
  CONSTRAINT `fk_perfiles_roles_perfil`
    FOREIGN KEY (`perfil_id`)
    REFERENCES `tmh`.`perfil` (`perfil_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_nombre_rol_perfil`
    FOREIGN KEY (`rol_nombre`)
    REFERENCES `tmh`.`rol` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`prioridad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`prioridad` (
  `prioridad_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `color` VARCHAR(45) NOT NULL,
  `orden` INT NULL,
  PRIMARY KEY (`prioridad_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`respuesta_enlatada`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`respuesta_enlatada` (
  `enlatado_id` INT(11) NOT NULL AUTO_INCREMENT,
  `respuesta` VARCHAR(250) NOT NULL,
  `departamento_id` INT NOT NULL,
  `operador_id` INT NULL DEFAULT NULL COMMENT 'El operador id es para saber si la rta enlatada la ve el operador, sino es público(null)',
  PRIMARY KEY (`enlatado_id`, `departamento_id`),
  INDEX `FK_respuesta_enlatada_departamento_idx` (`departamento_id` ASC),
  CONSTRAINT `FK_respuesta_enlatada_departamento`
    FOREIGN KEY (`departamento_id`)
    REFERENCES `tmh`.`departamento` (`departamento_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`email_templates`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`email_templates` (
  `email_id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `texto` LONGTEXT NOT NULL,
  `asunto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`email_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`ticket_tipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`ticket_tipo` (
  `tipo_ticket_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `icono` VARCHAR(60) NULL,
  PRIMARY KEY (`tipo_ticket_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`sla`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`sla` (
  `sla_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `departamento_origen` INT(11) NULL,
  `estado_origen` INT(11) NULL,
  `prioridad_origen` INT(11) NULL,
  `condicion_hora` INT NOT NULL DEFAULT 1,
  `accion_departamento` INT NULL,
  `accion_prioridad` INT NULL,
  `accion_estado` INT NULL,
  `accion_operador_asignado` INT NULL,
  `estado` INT NOT NULL,
  `eliminado` TINYINT(1) NOT NULL,
  `email_template_id` INT NOT NULL,
  `tipo_ticket_origen` INT NOT NULL,
  PRIMARY KEY (`sla_id`),
  INDEX `FK_email_sla_email_idx` (`email_template_id` ASC),
  INDEX `fk_sla_tipo_ticket_idx` (`tipo_ticket_origen` ASC),
  CONSTRAINT `FK_email_sla_email`
    FOREIGN KEY (`email_template_id`)
    REFERENCES `tmh`.`email_templates` (`email_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sla_tipo_ticket`
    FOREIGN KEY (`tipo_ticket_origen`)
    REFERENCES `tmh`.`ticket_tipo` (`tipo_ticket_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`usuario` (
  `usuario_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NULL DEFAULT NULL,
  `Clave` VARCHAR(60) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `foto_hash` VARCHAR(255) NULL DEFAULT NULL,
  `direccion` VARCHAR(80) NULL DEFAULT NULL,
  `codigo_postal` INT(11) NULL DEFAULT NULL,
  `ciudad` VARCHAR(30) NULL DEFAULT NULL,
  `telefono` VARCHAR(45) NULL DEFAULT NULL,
  `mail_adicional` VARCHAR(45) NULL DEFAULT NULL,
  `empresa_id` INT NOT NULL,
  `ultima_actualizacion` DATETIME NOT NULL,
  `ultima_actividad` DATETIME NOT NULL,
  `activo` TINYINT(1) NOT NULL DEFAULT 0,
  `eliminado` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`usuario_id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  CONSTRAINT `FK_usuarios_empresa`
    FOREIGN KEY (`empresa_id`)
    REFERENCES `tmh`.`empresa` (`empresa_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`ticket`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`ticket` (
  `ticket_id` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` INT(11) NULL,
  `operador_id` INT(11) NULL,
  `estado_id` INT(11) NOT NULL,
  `prioridad_id` INT(11) NOT NULL,
  `departamento_id` INT(11) NOT NULL,
  `descripcion` VARCHAR(200) NULL,
  `numero_Ticket` VARCHAR(10) NOT NULL,
  `email_queue_id` INT NOT NULL,
  `asignado` TINYINT(1) NULL,
  `asignado_a_operador_id` INT(11) NULL,
  `asunto` VARCHAR(45) NOT NULL,
  `ultima_actividad` DATETIME NULL,
  `ultima_actividad_User` DATETIME NULL,
  `ultima_actividad_operador` DATETIME NULL,
  `fecha_creacion` DATETIME NOT NULL,
  `fecha_vto` DATETIME NULL,
  `editado` TINYINT(1) NULL,
  `custom_fields` LONGTEXT NULL,
  `tipo_ticket_id` INT NOT NULL,
  PRIMARY KEY (`ticket_id`),
  INDEX `fk_ticket_usuario_idx` (`usuario_id` ASC),
  INDEX `fk_ticket_estado_idx` (`estado_id` ASC),
  INDEX `fk_ticket_prioridad_idx` (`prioridad_id` ASC),
  INDEX `fk_ticket_departamento_idx` (`departamento_id` ASC),
  INDEX `fk_ticket_operador_idx` (`operador_id` ASC),
  INDEX `fk_ticket_operador_asignado_idx` (`asignado_a_operador_id` ASC),
  INDEX `fk_ticket_tipo_ticket_idx` (`tipo_ticket_id` ASC),
  CONSTRAINT `fk_ticket_usuario`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `tmh`.`usuario` (`usuario_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_estado`
    FOREIGN KEY (`estado_id`)
    REFERENCES `tmh`.`ticket_estado` (`estado_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_prioridad`
    FOREIGN KEY (`prioridad_id`)
    REFERENCES `tmh`.`prioridad` (`prioridad_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_departamento`
    FOREIGN KEY (`departamento_id`)
    REFERENCES `tmh`.`departamento` (`departamento_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_operador_asignado`
    FOREIGN KEY (`operador_id`)
    REFERENCES `tmh`.`operador` (`operador_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_operador`
    FOREIGN KEY (`asignado_a_operador_id`)
    REFERENCES `tmh`.`operador` (`operador_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_tipo_ticket`
    FOREIGN KEY (`tipo_ticket_id`)
    REFERENCES `tmh`.`ticket_tipo` (`tipo_ticket_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`Log_Modificacion_ticket`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`log_modificacion_ticket` (
  `ticket_id` INT NOT NULL AUTO_INCREMENT,
  `usuario_id` INT NULL,
  `operador_id` INT NULL,
  `accion` VARCHAR(245) NULL,
  `fecha` DATETIME NULL,
  PRIMARY KEY (`ticket_id`),
  CONSTRAINT `FK_ticket_Log`
    FOREIGN KEY (`ticket_id`)
    REFERENCES `tmh`.`ticket` (`ticket_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`anuncios_empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`anuncios_empresa` (
  `empresa_id` INT NOT NULL,
  `anuncio_id` INT NOT NULL,
  PRIMARY KEY (`empresa_id`, `anuncio_id`),
  INDEX `Fk_anuncios_empresa_anuncio_idx` (`anuncio_id` ASC),
  CONSTRAINT `Fk_anuncios_empresa_anuncio`
    FOREIGN KEY (`anuncio_id`)
    REFERENCES `tmh`.`anuncio` (`anuncio_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Fk_anuncios_empresa_empresa`
    FOREIGN KEY (`empresa_id`)
    REFERENCES `tmh`.`empresa` (`empresa_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`operador_departamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`operador_departamentos` (
  `operador_id` INT NOT NULL,
  `departamento_id` INT NOT NULL,
  PRIMARY KEY (`operador_id`, `departamento_id`),
  INDEX `fk_operador_dpto_depto_idx` (`departamento_id` ASC),
  CONSTRAINT `fk_operador_dpto_operador`
    FOREIGN KEY (`operador_id`)
    REFERENCES `tmh`.`operador` (`operador_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_operador_dpto_depto`
    FOREIGN KEY (`departamento_id`)
    REFERENCES `tmh`.`departamento` (`departamento_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`archivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`archivo` (
  `archivo_id` INT NOT NULL AUTO_INCREMENT,
  `mensaje_id` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `Hash` VARCHAR(255) NOT NULL,
  `fecha_creacion` DATETIME NOT NULL,
  `directorio` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`archivo_id`),
  INDEX `FK_archivo_mensaje_idx` (`mensaje_id` ASC),
  CONSTRAINT `FK_archivo_mensaje`
    FOREIGN KEY (`mensaje_id`)
    REFERENCES `tmh`.`mensaje` (`mensaje_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



-- -----------------------------------------------------
-- Table `tmh`.`mensaje`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`mensaje` (
  `mensaje_id` INT NOT NULL AUTO_INCREMENT,
  `ticket_id` INT NOT NULL,
  `Texto` VARCHAR(245)  NULL,
  `fecha` DATETIME NOT NULL,
  `tipo_mensaje` INT NOT NULL,
  `creador_operador` INT NULL,
  `creador_usuario` INT NULL,
  PRIMARY KEY (`mensaje_id`),
  INDEX `FK_mensaje_ticket_idx` (`ticket_id` ASC),
  CONSTRAINT `FK_mensaje_ticket`
    FOREIGN KEY (`ticket_id`)
    REFERENCES `tmh`.`ticket` (`ticket_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;




-- -----------------------------------------------------
-- Table `tmh`.`ticket_filtros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`ticket_filtros` (
  `Filtro_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `departamentos` LONGTEXT NOT NULL,
  `estados` LONGTEXT NOT NULL,
  `prioridades` LONGTEXT NOT NULL,
  `asignado_a_mi` INT NULL,
  `operadores` LONGTEXT NULL,
  PRIMARY KEY (`filtro_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`email_queue`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`email_queue` (
  `queue_id` INT NOT NULL AUTO_INCREMENT,
  `destinatario` LONGTEXT NOT NULL,
  `remitente` LONGTEXT NOT NULL,
  `asunto` VARCHAR(45) NOT NULL,
  `contenido` LONGTEXT NOT NULL,
  `estado` TINYINT(1) NOT NULL,
  `fecha_envio` DATETIME NULL,
  PRIMARY KEY (`queue_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`ticket_Custom_fields`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`ticket_custom_fields` (
  `field_id` INT NOT NULL AUTO_INCREMENT,
  `ticket_id` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `opciones` LONGTEXT NULL,
  `requerido` TINYINT(1) NOT NULL,
  `departamentos` LONGTEXT NULL,
  PRIMARY KEY (`field_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tmh`.`configuracion_global`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`configuracion_global` (
  `nombre` VARCHAR(128) NOT NULL,
  `valor` LONGTEXT NOT NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
