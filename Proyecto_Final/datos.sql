-- Validar si está la DB
DROP SCHEMA IF EXISTS `gimnasio_db`;

-- Crear la DB
CREATE SCHEMA IF NOT EXISTS `gimnasio_db` 
-- Asignar el tipo de caracteres 
DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;

-- Usar la base de datos
USE `gimnasio_db`;

-- Crear una tabla para los miembros del gimnasio
CREATE TABLE `miembro`(
        `id_miembro` INT(10) NOT NULL AUTO_INCREMENT,
        `nombre` TEXT NOT NULL,
        `direccion` TEXT NOT NULL,
        `telefono` VARCHAR(10) NOT NULL,
        `email` TEXT NOT NULL,
        `fecha_nacimiento` DATE NOT NULL,
        `fecha_registro` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `tipo_membresia` VARCHAR(20) NOT NULL COMMENT 'Ejemplo: Basica, Premium, VIP',
        `estado_cuenta` VARCHAR(15) NOT NULL DEFAULT 'Activa' COMMENT 'Activa, Suspendida, Cancelada',
        `password` VARCHAR(10) NOT NULL,
        
        PRIMARY KEY (`id_miembro`)
);

