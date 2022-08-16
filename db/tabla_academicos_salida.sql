CREATE TABLE `academicos_salida` (
  `EMPLEADO_ID` int unsigned NOT NULL COMMENT 'Número de empleado',
  `EMPLEADO` varchar(45) NOT NULL COMMENT 'Nombre del empleado',
  `EMPLEADO_APELLIDO1` varchar(45) NOT NULL COMMENT 'Apellido paterno del empleado',
  `EMPLEADO_APELLIDO2` varchar(45) NOT NULL COMMENT 'Apellido materno del empleado',
  `SEXO_ID` tinyint unsigned NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino; 3-Otro)',
  PRIMARY KEY (`EMPLEADO_ID`),
  UNIQUE KEY `EMPLEADO_ID_UNIQUE` (`EMPLEADO_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
