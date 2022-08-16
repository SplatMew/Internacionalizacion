CREATE TABLE `estudiantes_entrada` (
  `ESTUDIANTE_ID` int unsigned NOT NULL COMMENT 'Clave de identificación del estudiante visitante',
  `ESTUDIANTE` varchar(45) NOT NULL COMMENT 'Nombre estudiante',
  `ESTUDIANTE_APELLIDO1` varchar(45) NOT NULL COMMENT 'Apellido paterno del estudiante',
  `ESTUDIANTE_APELLIDO2` varchar(45) NOT NULL COMMENT 'Apellido materno del estudiante',
  `SEXO` tinyint unsigned NOT NULL COMMENT 'Clave del sexo (1-Femenino; 2-Masculino; 3-otro)',
  `DISCAPACIDAD` tinyint unsigned NOT NULL COMMENT 'Condición de discapacidad (1-Sí, 2-No)',
  `HABLANTE_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Hablante de lengua indígena (1-Sí, 2-No)',
  `ORIGEN_INDIGENA` tinyint unsigned NOT NULL COMMENT 'Origen indígena (1-Sí, 2-No)',
  `NIVEL_ID` tinyint unsigned NOT NULL COMMENT 'desconocido',
  `CAMPUS_ID` tinyint unsigned NOT NULL COMMENT 'desconocido',
  `UNIDAD_ID` tinyint unsigned NOT NULL COMMENT 'desconocido',
  `PROGRAMA_ID` tinyint unsigned NOT NULL COMMENT 'desconocido',
  `PROGRAMA_DESC` varchar(60) NOT NULL COMMENT 'desconocido',
  `AREA_ID` tinyint unsigned NOT NULL COMMENT 'desconocido',
  `AREA` varchar(80) NOT NULL COMMENT 'desconocido',
  PRIMARY KEY (`ESTUDIANTE_ID`),
  UNIQUE KEY `ESTUDIANTE_ID_UNIQUE` (`ESTUDIANTE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

Agregue los campos que hacian falta para esta taabla, en el comentario puse desconocido porque nestor es quien sabe exactamente el porque deben ir Apelli
pero son necesarios para que el sistema funcione sin errpres