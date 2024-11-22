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
        `id_miembro` INT(10) NOT NULL,
        `nombre` TEXT NOT NULL,
        `direccion` TEXT NOT NULL,
        `telefono` VARCHAR(10) NOT NULL,
        `email` TEXT NOT NULL,
        `fecha_nacimiento` DATE NOT NULL,
        `fecha_registro` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `tipo_membresia` VARCHAR(20) NOT NULL COMMENT 'Ejemplo: Basica, Premium, VIP',
        `estado_cuenta` VARCHAR(15) NOT NULL DEFAULT 'Activa' COMMENT 'Activa, Suspendida, Cancelada',
        `password` VARCHAR(20) NOT NULL,
        
        PRIMARY KEY (`id_miembro`)
);

INSERT INTO `miembro` (`id_miembro`, `nombre`, `direccion`, `telefono`, `email`, `fecha_nacimiento`, `tipo_membresia`, `estado_cuenta`, `password`)
VALUES
(1234567890, 'ADMIN', 'Calle Aragon 333', '5583862755', 'juangurey@gmail.com', '2004-06-05', 'VIP', 'Activa', 'chillguy123'),
(1501574874, 'Juan Pérez', 'Calle Aragon 123', '5551234567', 'juan.perez@email.com', '1990-05-15', 'Basica', 'Activa', 'password123'),
(1458697165, 'Ana Gómez', 'Avenida Siempre Viva 456', '5552345678', 'ana.gomez@email.com', '1985-02-20', 'Premium', 'Activa', 'password456'),
(1312574104, 'Carlos López', 'Calle del Sol 789', '5553456789', 'carlos.lopez@email.com', '1992-08-10', 'VIP', 'Suspendida', 'password789'),
(1584123452, 'Laura Sánchez', 'Calle Luna 101', '5554567890', 'laura.sanchez@email.com', '1988-11-30', 'Basica', 'Activa', 'password321'),
(1656500541, 'Luis Martínez', 'Calle Estrella 202', '5555678901', 'luis.martinez@email.com', '1994-07-25', 'Premium', 'Cancelada', 'password654'),
(1899754163, 'María Rodríguez', 'Calle Cielo 303', '5556789012', 'maria.rodriguez@email.com', '1991-03-12', 'VIP', 'Activa', 'password987'),
(1651651527, 'José Ramírez', 'Avenida Principal 404', '5557890123', 'jose.ramirez@email.com', '1987-01-18', 'Basica', 'Suspendida', 'password654'),
(1663522552, 'Elena Torres', 'Calle Río 505', '5558901234', 'elena.torres@email.com', '1995-09-05', 'VIP', 'Activa', 'password789');
SELECT * FROM miembro;