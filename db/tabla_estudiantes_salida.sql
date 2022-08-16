CREATE TABLE `estudiantes_salida` (
  `ESTUDIANTE_ID` int unsigned NOT NULL COMMENT 'Clave de identificación del estudiante (matricula)',
  `ESTUDIANTE` varchar(45) NOT NULL COMMENT 'Nombre estudiante',
  `ESTUDIANTE_APELLIDO1` varchar(45) NOT NULL COMMENT 'Apellido paterno del estudiante',
  `ESTUDIANTE_APELLIDO2` varchar(45) NOT NULL COMMENT 'Apellido materno del estudiante',
  `SEXO_ID` tinyint unsigned NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino)',
  `DISCAPACIDAD` tinyint unsigned NOT NULL COMMENT 'Condición de discapacidad (1-Sí, 2-No)',
  `HABLANTE_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Hablante de lengua indígena (1-Sí, 2-No)',
  `ORIGEN_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Origen indígena (1-Sí, 2-No)',
  PRIMARY KEY (`ESTUDIANTE_ID`),
  UNIQUE KEY `ESTUDIANTE_ID_UNIQUE` (`ESTUDIANTE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
