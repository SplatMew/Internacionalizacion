CREATE TABLE `unidades_academicas` (
  `ID` mediumint unsigned NOT NULL AUTO_INCREMENT COMMENT 'Número de empleado',
  `CIUDAD` tinyint unsigned NOT NULL COMMENT 'Nombre del empleado',
  `CLAVE` tinyint unsigned NOT NULL COMMENT 'Apellido paterno del empleado',
  `Nombre` varchar(80) NOT NULL COMMENT 'Apellido materno del empleado',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;