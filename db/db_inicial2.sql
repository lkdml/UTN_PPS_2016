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
CREATE SCHEMA IF NOT EXISTS `tmh` DEFAULT CHARACTER SET latin1 ;
USE `tmh` ;

-- -----------------------------------------------------
-- Table `tmh`.`categorias_anuncios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`categorias_anuncios` (
  `Categoria_ID` INT NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Categoria_ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tmh`.`anuncios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`anuncios` (
  `Anuncio_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Empresa_ID` INT(11) NOT NULL,
  `Categoria_ID` INT NOT NULL,
  `Titulo` VARCHAR(45) NOT NULL,
  `Contenido` VARCHAR(250) CHARACTER SET 'utf8' NOT NULL,
  `Fecha_Creacion` DATETIME NULL,
  `Estado` TINYINT(1) NULL,
  `Fecha_Fin_Publicacion` DATETIME NULL,
  PRIMARY KEY (`Anuncio_ID`, `Empresa_ID`, `Categoria_ID`),
  INDEX `fk_anuncios_categoria_idx` (`Categoria_ID` ASC),
  CONSTRAINT `fk_anuncios_categoria`
    FOREIGN KEY (`Categoria_ID`)
    REFERENCES `tmh`.`categorias_anuncios` (`Categoria_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tmh`.`departamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`departamentos` (
  `Departamento_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(45) NOT NULL,
  `Padre_Depto_ID` INT NOT NULL,
  `Visibilidad_Usuario` SMALLINT NOT NULL,
  `Orden` INT NOT NULL,
  `Operador_Default_ID` INT NULL,
  PRIMARY KEY (`Departamento_ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tmh`.`perfiles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`perfiles` (
  `Perfil_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Estado` BIT(1) NOT NULL,
  PRIMARY KEY (`Perfil_ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tmh`.`empresas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`empresas` (
  `Empresa_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Razon_Social` VARCHAR(45) NOT NULL,
  `Pais` VARCHAR(45) NOT NULL,
  `Direccion` VARCHAR(45) NOT NULL,
  `Ciudad` VARCHAR(45) NULL,
  `Codigo_Postal` VARCHAR(45) NULL,
  `Telefono` VARCHAR(45) NULL,
  `Web` VARCHAR(45) NULL,
  `Ultima_Actualizacion` DATETIME NOT NULL,
  `SLA_Plan_ID` INT NOT NULL,
  `Perfil_Default_ID` INT NOT NULL,
  PRIMARY KEY (`Empresa_ID`, `Perfil_Default_ID`),
  INDEX `fk_perfi_defaultl_idx` (`Perfil_Default_ID` ASC),
  CONSTRAINT `fk_perfi_defaultl`
    FOREIGN KEY (`Perfil_Default_ID`)
    REFERENCES `tmh`.`perfiles` (`Perfil_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tmh`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`usuarios` (
  `Usuario_ID` INT(11) NOT NULL,
  `Nombre_Usuario` VARCHAR(45) NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `Apellido` VARCHAR(45) NOT NULL,
  `Clave` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `FotoHash` VARCHAR(255) NULL DEFAULT NULL,
  `Direccion` VARCHAR(45) NULL DEFAULT NULL,
  `Codigo_Postal` INT(11) NULL DEFAULT NULL,
  `Ciudad_ID` INT(11) NULL DEFAULT NULL,
  `Telefono` VARCHAR(45) NULL DEFAULT NULL,
  `Mail_Adicional` VARCHAR(45) NULL DEFAULT NULL,
  `Perfil_ID` INT(11) NOT NULL,
  `Empresa_ID` INT NOT NULL,
  `Ultima_Actualizacion` DATETIME NOT NULL,
  `Ultima_Actividad` DATETIME NOT NULL,
  `Activo` TINYINT(1) NOT NULL,
  `Eliminado` TINYINT(1) NOT NULL,
  PRIMARY KEY (`Usuario_ID`, `Perfil_ID`, `Empresa_ID`),
  INDEX `FK_Usuarios_Empresa_idx` (`Empresa_ID` ASC),
  INDEX `FK_Usuarios_Perfil_idx` (`Perfil_ID` ASC),
  UNIQUE INDEX `Email_UNIQUE` (`Email` ASC),
  CONSTRAINT `FK_Usuarios_Empresa`
    FOREIGN KEY (`Empresa_ID`)
    REFERENCES `tmh`.`empresas` (`Empresa_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_Usuarios_Perfil`
    FOREIGN KEY (`Perfil_ID`)
    REFERENCES `tmh`.`perfiles` (`Perfil_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tmh`.`estados_tickets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`estados_tickets` (
  `Estado_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(45) NOT NULL,
  `Color` VARCHAR(45) NOT NULL,
  `AutoCierre` TINYINT(1) NOT NULL,
  `Orden` INT NOT NULL,
  PRIMARY KEY (`Estado_ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tmh`.`prioridades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`prioridades` (
  `Prioridad_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(45) NOT NULL,
  `Color` VARCHAR(45) NOT NULL,
  `Orden` INT NOT NULL,
  PRIMARY KEY (`Prioridad_ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tmh`.`operadores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`operadores` (
  `Operador_ID` INT(11) NOT NULL,
  `Perfil_ID` INT(11) NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `Apellido` VARCHAR(45) NOT NULL,
  `Nombre_Usuario` VARCHAR(45) NOT NULL,
  `Clave` VARCHAR(45) NOT NULL,
  `FirmaMensaje` VARCHAR(245) NULL,
  `Email` VARCHAR(225) NOT NULL,
  `Celular` VARCHAR(45) NULL,
  `Ultima_Actualizacion` DATETIME NULL,
  `Ultima_Actividad` DATETIME NULL,
  `Activo` TINYINT(1) NOT NULL,
  `Deptos_Habilitados` INT NOT NULL,
  `Habilita_Notificaciones_Mail` SMALLINT NOT NULL,
  `Filtro_Ticket_ID` INT NOT NULL,
  `HashFoto` VARCHAR(245) NULL,
  `Eliminado` TINYINT(1) NOT NULL,
  PRIMARY KEY (`Operador_ID`, `Perfil_ID`),
  INDEX `fk_operadores_perfil_perfil_idx` (`Perfil_ID` ASC),
  UNIQUE INDEX `Email_UNIQUE` (`Email` ASC),
  CONSTRAINT `fk_operadores_perfil_perfil`
    FOREIGN KEY (`Perfil_ID`)
    REFERENCES `tmh`.`perfiles` (`Perfil_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tmh`.`tickets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`tickets` (
  `Ticket_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Usuario_ID` INT(11) NULL,
  `Operador_ID` INT(11) NULL,
  `Estado_ID` INT(11) NOT NULL,
  `Prioridad_ID` INT(11) NOT NULL,
  `Departamento_ID` INT(11) NOT NULL,
  `Descripcion` VARCHAR(200) NOT NULL,
  `Numero_Ticker` INT NOT NULL,
  `Email_Queue_ID` INT NOT NULL,
  `Asignado` TINYINT(1) NULL,
  `Owner_Operador_ID` INT NULL,
  `Asunto` VARCHAR(45) NOT NULL,
  `Ultima_Actividad` DATETIME NULL,
  `Ultima_Actividad_User` DATETIME NULL,
  `Ultima_Actividad_Operador` DATETIME NULL,
  `Fecha_Creacion` DATETIME NOT NULL,
  `Fecha_Vto` DATETIME NULL,
  `Tiene_Archivos` TINYINT(1) NULL,
  `Editado` TINYINT(1) NULL,
  `Custom_Fields` LONGTEXT NULL,
  PRIMARY KEY (`Ticket_ID`, `Departamento_ID`, `Prioridad_ID`, `Estado_ID`),
  INDEX `fk_ticket_usuario_idx` (`Usuario_ID` ASC),
  INDEX `fk_ticket_estado_idx` (`Estado_ID` ASC),
  INDEX `fk_ticket_prioridad_idx` (`Prioridad_ID` ASC),
  INDEX `fk_ticket_departamento_idx` (`Departamento_ID` ASC),
  INDEX `fk_ticket_operador_idx` (`Operador_ID` ASC),
  CONSTRAINT `fk_ticket_usuario`
    FOREIGN KEY (`Usuario_ID`)
    REFERENCES `tmh`.`usuarios` (`Usuario_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_estado`
    FOREIGN KEY (`Estado_ID`)
    REFERENCES `tmh`.`estados_tickets` (`Estado_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_prioridad`
    FOREIGN KEY (`Prioridad_ID`)
    REFERENCES `tmh`.`prioridades` (`Prioridad_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_departamento`
    FOREIGN KEY (`Departamento_ID`)
    REFERENCES `tmh`.`departamentos` (`Departamento_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_operador`
    FOREIGN KEY (`Operador_ID`)
    REFERENCES `tmh`.`operadores` (`Operador_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tmh`.`detalle_ticket`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`detalle_ticket` (
  `Ticket_ID` INT(11) NOT NULL,
  `Descripcion` VARCHAR(45) NOT NULL,
  `Tiempo_Dedicado` FLOAT NOT NULL,
  INDEX `fk_detalle_ticket_ticket_idx` (`Ticket_ID` ASC),
  PRIMARY KEY (`Ticket_ID`),
  CONSTRAINT `fk_detalle_ticket_ticket`
    FOREIGN KEY (`Ticket_ID`)
    REFERENCES `tmh`.`tickets` (`Ticket_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tmh`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`roles` (
  `Rol_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Descripcion` VARCHAR(45) NOT NULL,
  `Estado` BIT(1) NOT NULL,
  PRIMARY KEY (`Rol_ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tmh`.`perfiles_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`perfiles_roles` (
  `Perfil_ID` INT(11) NOT NULL,
  `Rol_ID` INT(11) NOT NULL,
  PRIMARY KEY (`Perfil_ID`, `Rol_ID`),
  INDEX `fk_perfiles_roles_rol_idx` (`Rol_ID` ASC),
  CONSTRAINT `fk_perfies_roles_perfil`
    FOREIGN KEY (`Perfil_ID`)
    REFERENCES `tmh`.`perfiles` (`Perfil_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_perfiles_roles_rol`
    FOREIGN KEY (`Rol_ID`)
    REFERENCES `tmh`.`roles` (`Rol_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tmh`.`respuestas_enlatadas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`respuestas_enlatadas` (
  `Enlatado_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Respuesta` VARCHAR(250) NOT NULL,
  `Departamento_ID` INT NOT NULL,
  `Operador_ID` INT NULL DEFAULT NULL COMMENT 'El operador id es para saber si la rta enlatada la ve el operador, sino es público(null)',
  PRIMARY KEY (`Enlatado_ID`, `Departamento_ID`),
  INDEX `FK_Respuesta_Enlatada_Departamento_idx` (`Departamento_ID` ASC),
  CONSTRAINT `FK_Respuesta_Enlatada_Departamento`
    FOREIGN KEY (`Departamento_ID`)
    REFERENCES `tmh`.`departamentos` (`Departamento_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tmh`.`email_templates`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`email_templates` (
  `Email_ID` INT NOT NULL,
  `Tipo` VARCHAR(45) NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `Texto` LONGTEXT NOT NULL,
  `Asunto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Email_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tmh`.`sla`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`sla` (
  `SLA_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Departamento_Origen` INT(11) NULL,
  `Estado_Origen` INT(11) NULL,
  `Prioridad_Origen` INT(11) NULL,
  `Horas` INT NOT NULL DEFAULT 1,
  `Condicion_Hora` INT NOT NULL DEFAULT 1,
  `Accion_Departamento` INT NULL,
  `Accion_Prioridad` INT NULL,
  `Accion_Estado` INT NULL,
  `Accion_Operador_Asignado` INT NULL,
  `Estado` INT NOT NULL,
  `Eliminado` TINYINT(1) NOT NULL,
  `Email_Template_ID` INT NOT NULL,
  PRIMARY KEY (`SLA_ID`, `Email_Template_ID`),
  INDEX `FK_Email_SLA_Email_idx` (`Email_Template_ID` ASC),
  CONSTRAINT `FK_Email_SLA_Email`
    FOREIGN KEY (`Email_Template_ID`)
    REFERENCES `tmh`.`email_templates` (`Email_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tmh`.`Log_Modificacion_Ticket`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`Log_Modificacion_Ticket` (
  `Ticket_ID` INT NOT NULL,
  `Usuario_ID` INT NULL,
  `Operador_ID` INT NULL,
  `Accion` VARCHAR(245) NULL,
  `Fecha` DATETIME NULL,
  PRIMARY KEY (`Ticket_ID`),
  CONSTRAINT `FK_Ticket_Log`
    FOREIGN KEY (`Ticket_ID`)
    REFERENCES `tmh`.`tickets` (`Ticket_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tmh`.`anuncios_empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`anuncios_empresa` (
  `Empresa_ID` INT NOT NULL,
  `Anuncio_ID` INT NOT NULL,
  PRIMARY KEY (`Empresa_ID`, `Anuncio_ID`),
  INDEX `Fk_Anuncios_empresa_anuncio_idx` (`Anuncio_ID` ASC),
  CONSTRAINT `Fk_Anuncios_empresa_anuncio`
    FOREIGN KEY (`Anuncio_ID`)
    REFERENCES `tmh`.`anuncios` (`Anuncio_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Fk_anuncios_empresa_empresa`
    FOREIGN KEY (`Empresa_ID`)
    REFERENCES `tmh`.`empresas` (`Empresa_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tmh`.`operadores_departamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`operadores_departamentos` (
  `Operador_ID` INT NOT NULL,
  `Departamento_ID` INT NOT NULL,
  PRIMARY KEY (`Operador_ID`, `Departamento_ID`),
  INDEX `fk_operador_dpto_depto_idx` (`Departamento_ID` ASC),
  CONSTRAINT `fk_operador_dpto_depto`
    FOREIGN KEY (`Departamento_ID`)
    REFERENCES `tmh`.`departamentos` (`Departamento_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_operador_dpto_operador`
    FOREIGN KEY (`Operador_ID`)
    REFERENCES `tmh`.`operadores` (`Operador_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tmh`.`Archivos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`Archivos` (
  `Archivo_ID` INT NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `Hash` VARCHAR(45) NOT NULL,
  `Fecha_Creacion` DATETIME NOT NULL,
  `Directorio` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Archivo_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tmh`.`Archivos_Ticket`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`Archivos_Ticket` (
  `Archivo_Ticket_ID` INT NOT NULL,
  `Ticket_ID` INT NOT NULL,
  PRIMARY KEY (`Archivo_Ticket_ID`, `Ticket_ID`),
  INDEX `fk_archivo_ticket_ticket_idx` (`Ticket_ID` ASC),
  CONSTRAINT `fk_archivo_ticket_ticket`
    FOREIGN KEY (`Ticket_ID`)
    REFERENCES `tmh`.`tickets` (`Ticket_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_archivo_ticket_archivo`
    FOREIGN KEY (`Archivo_Ticket_ID`)
    REFERENCES `tmh`.`Archivos` (`Archivo_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tmh`.`mensajes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`mensajes` (
  `Mensaje_ID` INT NOT NULL,
  `Ticket_ID` INT NOT NULL,
  `Texto` VARCHAR(245) NOT NULL,
  `Fecha` DATETIME NOT NULL,
  `Tipo_Mensaje` INT NOT NULL,
  `Creador_Operador` INT NULL,
  `Creador_Usuario` INT NULL,
  PRIMARY KEY (`Mensaje_ID`, `Ticket_ID`),
  INDEX `FK_Mensajes_Ticket_idx` (`Ticket_ID` ASC),
  CONSTRAINT `FK_Mensajes_Ticket`
    FOREIGN KEY (`Ticket_ID`)
    REFERENCES `tmh`.`tickets` (`Ticket_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tmh`.`mensajes_archivos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`mensajes_archivos` (
  `Mensaje_ID` INT NOT NULL,
  `Archivo_ID` INT NOT NULL,
  PRIMARY KEY (`Mensaje_ID`, `Archivo_ID`),
  INDEX `FK_Mensajes_Archivos_Mensajes_idx` (`Archivo_ID` ASC),
  CONSTRAINT `FK_Mensajes_Archivos_Archivos`
    FOREIGN KEY (`Archivo_ID`)
    REFERENCES `tmh`.`Archivos` (`Archivo_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_Mensaje_Archivos_Mensajes`
    FOREIGN KEY (`Mensaje_ID`)
    REFERENCES `tmh`.`mensajes` (`Mensaje_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tmh`.`filtros_ticket`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`filtros_ticket` (
  `Filtro_ID` INT NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `Departamentos` LONGTEXT NOT NULL,
  `Estados` LONGTEXT NOT NULL,
  `Prioridades` LONGTEXT NOT NULL,
  `Asignado_A_Mi` INT NULL,
  `Operadores` LONGTEXT NULL,
  PRIMARY KEY (`Filtro_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tmh`.`email_queue`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`email_queue` (
  `Queue_ID` INT NOT NULL,
  `Destinatario` LONGTEXT NOT NULL,
  `Remitente` LONGTEXT NOT NULL,
  `Asunto` VARCHAR(45) NOT NULL,
  `Contenido` LONGTEXT NOT NULL,
  `Estado` TINYINT(1) NOT NULL,
  `Fecha_Envio` DATETIME NULL,
  PRIMARY KEY (`Queue_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tmh`.`ticket_Custom_Fields`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`ticket_Custom_Fields` (
  `Field_ID` INT NOT NULL,
  `Ticket_ID` INT NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `Tipo` VARCHAR(45) NOT NULL,
  `Opciones` LONGTEXT NULL,
  `Requerido` TINYINT(1) NOT NULL,
  `Departamentos` LONGTEXT NULL,
  PRIMARY KEY (`Field_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tmh`.`Configuracion_Global`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tmh`.`Configuracion_Global` (
  `Nombre` VARCHAR(45) NOT NULL,
  `valor` LONGTEXT NOT NULL,
  PRIMARY KEY (`Nombre`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
