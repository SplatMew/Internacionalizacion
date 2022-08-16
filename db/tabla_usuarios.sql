CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `apellido_paterno` varchar(45) ,
  `apellido_materno` varchar(45)  NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint NOT NULL,
  `matricula` int unsigned NOT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
