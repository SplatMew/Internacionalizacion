CREATE TABLE `academicos_entrada` (
  `VISITANTE_ID` int unsigned unsigned NOT NULL COMMENT 'Clave de identificación del visitante',
  `VISITANTE` varchar(45) NOT NULL COMMENT 'Nombre del visitante',
  `VISITANTE_APELLIDO1` varchar(45) NOT NULL COMMENT 'Apellido paterno del visitante',
  `VISITANTE_APELLIDO2` varchar(45) NOT NULL COMMENT 'Apellido materno del visitante',
  `SEXO_ID` tinyint unsigned NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino)',
  `NIVEL_ID` tinyint unsigned NOT NULL COMMENT ' Clave del nivel de estudios (1-Licencatura; 2-Especialidad; 3-Maestría; 4-Doctorado)',
  `DISCAPACIDAD` tinyint unsigned NOT NULL COMMENT 'Condición de discapacidad (1-Sí, 2-No)',
  `HABLANTE_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Hablante de lengua indígena (1-Sí, 2-No)',
  `ORIGEN_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Origen indígena (1-Sí, 2-No)',
  PRIMARY KEY (`VISITANTE_ID`),
  UNIQUE KEY `VISITANTE_ID_UNIQUE` (`VISITANTE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
