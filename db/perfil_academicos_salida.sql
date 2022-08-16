CREATE TABLE `perfil_academicos_salida` (
  `EMPLEADO_ID` int unsigned NOT NULL COMMENT 'Clave de identificación del estudiante',
  `EMPLEADO` varchar(100) NOT NULL COMMENT 'Nombre estudiante visitante',
  `EMPLEADO_APELLIDO1` varchar(100) NOT NULL COMMENT 'Apellido paterno del estudiante',
  `EMPLEADO_APELLIDO2` varchar(100) NOT NULL COMMENT 'Apellido materno del estudiante',
  `SEXO_ID` tinyint unsigned NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino; 3-otro)',
  `SEXO` varchar(10) NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino; 3-otro)',
  `DISCAPACIDAD` tinyint unsigned NOT NULL COMMENT 'SEXO',
  `HABLANTE_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Hablante de lengua indígena (1-Sí, 2-No)',
  `ORIGEN_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Origen indígena (1-Sí, 2-No)',
  PRIMARY KEY (`EMPLEADO_ID`),
  UNIQUE KEY `EMPLEADO_ID_UNIQUE` (`EMPLEADO_ID`)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;