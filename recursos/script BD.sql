CREATE SCHEMA IF NOT EXISTS `bdMarketSur` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `bdMarketSur` ;

-- -----------------------------------------------------
-- Table `bdMarketSur`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdMarketSur`.`categorias` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT,
  `nombreCategoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdMarketSur`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdMarketSur`.`usuarios` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nombreUsuario` VARCHAR(15) NOT NULL,
  `apellidoUsuario` VARCHAR(15) NOT NULL,
  `fotoPerfilUsuario` VARCHAR(100) NOT NULL,
  `fonoUsuario` VARCHAR(15) NOT NULL,
  `contrasenaUsuario` INT NOT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdMarketSur`.`avisos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdMarketSur`.`avisos` (
  `idAviso` INT NOT NULL AUTO_INCREMENT,
  `tituloAviso` VARCHAR(45) NOT NULL,
  `precioAviso` INT NOT NULL,
  `descripcionAviso` VARCHAR(255) NOT NULL,
  `imagenAviso` VARCHAR(100) NOT NULL,
  `fechaPublicacionAviso` DATE NOT NULL,
  `idCategoria` INT NOT NULL,
  `idUsuario` INT NOT NULL,
  PRIMARY KEY (`idAviso`),
  CONSTRAINT `fk_avisos_categorias`
    FOREIGN KEY (`idCategoria`)
    REFERENCES `bdMarketSur`.`categorias` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_avisos_usuarios1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `bdMarketSur`.`usuarios` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
