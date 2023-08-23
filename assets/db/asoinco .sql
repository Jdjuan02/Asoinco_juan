-- -----------------------------------------------------
-- Schema asoinco
-- -----------------------------------------------------
CREATE DATABASE asoinco DEFAULT CHARACTER SET utf8 ;
USE asoinco ;

-- -----------------------------------------------------
-- Table asoinco.Rol
-- -----------------------------------------------------
CREATE TABLE Rol (
  idRol INT NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(45) NOT NULL,
  PRIMARY KEY (idRol))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table asoinco.Usuarios
-- -----------------------------------------------------
CREATE TABLE Usuarios (
  idRol INT NOT NULL AUTO_INCREMENT,
  idUsuarios INT NOT NULL,
  Nombre VARCHAR(50) NOT NULL,
  Correo VARCHAR(100) NOT NULL,
  Contrasena VARCHAR(100) NOT NULL,
  Celular VARCHAR(45) NOT NULL,
  Direccion VARCHAR(100) NOT NULL,
  PRIMARY KEY (idRol),
  INDEX ind_usuarios_rol (idRol ASC),
  CONSTRAINT fk_usuarios_rol
    FOREIGN KEY (idRol)
    REFERENCES asoinco.Rol (idRol)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table asoinco.Registrar_asistencia
-- -----------------------------------------------------
CREATE TABLE Registrar_asistencia (
  Codigo_coordinador INT NOT NULL AUTO_INCREMENT,
  Fecha_registro VARCHAR(50) NOT NULL,
  INDEX ind_registrar_usuarios (Codigo_coordinador ASC),
  PRIMARY KEY (Codigo_coordinador),
  CONSTRAINT fk_registrar_usuarios
    FOREIGN KEY (Codigo_coordinador)
    REFERENCES asoinco.Usuarios (idRol)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table asoinco.Factura
-- -----------------------------------------------------
CREATE TABLE Factura (
  idFactura INT NOT NULL AUTO_INCREMENT,
  fecha DATE NOT NULL,
  PRIMARY KEY (idFactura),
  INDEX ind_factura_usuarios (idFactura ASC),
  CONSTRAINT fk_factura_usuarios
    FOREIGN KEY (idFactura)
    REFERENCES asoinco.Usuarios (idRol)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table asoinco.Inventario
-- -----------------------------------------------------
CREATE TABLE Inventario (
  idInventario INT NOT NULL AUTO_INCREMENT,
  tipo_inventario VARCHAR(45) NOT NULL,
  fecha_hora DATE NOT NULL,
  cantidad_tipo_inventario VARCHAR(45) NOT NULL,
  PRIMARY KEY (idInventario),
  INDEX ind_inventario_factura (idInventario ASC),
  CONSTRAINT fk_inventario_factura
    FOREIGN KEY (idInventario)
    REFERENCES asoinco.Factura (idFactura)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table asoinco.Dotacion
-- -----------------------------------------------------
CREATE TABLE Dotacion (
  idDotacion INT NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(45) NOT NULL,
  PRIMARY KEY (idDotacion),
  INDEX ind_dotacion_invetario (idDotacion ASC),
  CONSTRAINT fk_dotacion_inventario
    FOREIGN KEY (idDotacion)
    REFERENCES asoinco.Inventario (idInventario)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table asoinco.No_activos
-- -----------------------------------------------------
CREATE TABLE No_activos (
  idNo_activos INT NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(45) NOT NULL,
  Apellido VARCHAR(45) NOT NULL,
  Correo VARCHAR(45) NOT NULL,
  PRIMARY KEY (idNo_activos),
  INDEX ind_noactivos_inventario (idNo_activos ASC),
  CONSTRAINT fk_noactivos_inventario
    FOREIGN KEY (idNo_activos)
    REFERENCES asoinco.Inventario (idInventario)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table asoinco.Activos_fijos
-- -----------------------------------------------------
CREATE TABLE Activos_fijos (
  idActivos_fijos INT NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(45) NOT NULL,
  Apellido VARCHAR(45) NOT NULL,
  Correo VARCHAR(45) NOT NULL,
  PRIMARY KEY (idActivos_fijos),
  INDEX ind_activos_inventario (idActivos_fijos ASC),
  CONSTRAINT fk_activos_inventario
    FOREIGN KEY (idActivos_fijos)
    REFERENCES asoinco.Inventario (idInventario)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table asoinco.Movimiento
-- -----------------------------------------------------
CREATE TABLE Movimiento (
  idMovimiento INT NOT NULL AUTO_INCREMENT,
  Tipo_inventario VARCHAR(45) NOT NULL,
  Entrada_producto VARCHAR(45) NOT NULL,
  Salida_producto VARCHAR(45) NOT NULL,
  Fecha_hora DATE NOT NULL,
  Registro_diario VARCHAR(45) NOT NULL,
  Registro_mes VARCHAR(45) NOT NULL,
  Cant_tipo_inventario VARCHAR(45) NOT NULL,
  PRIMARY KEY (idMovimiento),
  INDEX ind_movimiento_inventario (idMovimiento ASC),
  CONSTRAINT fk_movimiento_inventario
    FOREIGN KEY (idMovimiento)
    REFERENCES asoinco.Inventario (idInventario)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table asoinco.Informes
-- -----------------------------------------------------
CREATE TABLE Informes (
  idInformes INT NOT NULL AUTO_INCREMENT,
  Registro_diario VARCHAR(45) NOT NULL,
  Registro_mes VARCHAR(45) NOT NULL,
  Tipo_inventario VARCHAR(45) NOT NULL,
  Fecha_hora DATE NOT NULL,
  Cant_disponible VARCHAR(45) NOT NULL,
  Cant_tipo_inventario VARCHAR(45) NOT NULL,
  PRIMARY KEY (idInformes),
  INDEX ind_informes_movimiento (idInformes ASC),
  CONSTRAINT fk_informes_movimiento
    FOREIGN KEY (idInformes)
    REFERENCES asoinco.Movimiento (idMovimiento)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


insert into rol (idRol, Nombre) Values (1, 'Administrador')


Insert into usuarios (idRol,idUsuarios, Nombre, Correo, Contrasena, Celular, Direccion) values (1, 1003642333, 'Juan Diego', 'corredorjuan14@gmail.com', 'Corredor02.', '3219087191', 'Cra10#8-16');