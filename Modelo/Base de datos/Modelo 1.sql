CREATE TABLE `ID` (
`idproyectonext` varchar(255) NOT NULL,
`idsprintnext` varchar(255) NOT NULL,
`idtareanext` varchar(255) NOT NULL
);

CREATE TABLE `Usuarios` (
`nick_usuario` varchar(255) NOT NULL,
`email_usuario` varchar(255) NOT NULL,
PRIMARY KEY (`nick_usuario`) 
);

CREATE TABLE `Datos` (
`nick_usuario` varchar(255) NOT NULL,
`password` varchar(255) NOT NULL,
`nombre` varchar(255) NULL,
`apellido` varchar(255) NULL,
PRIMARY KEY (`nick_usuario`) 
);

CREATE TABLE `Proyectos` (
`idproyecto` varchar(255) NOT NULL,
`nombre` varchar(255) NULL,
`fecha_inicio` varchar(255) NULL,
PRIMARY KEY (`idproyecto`) 
);

CREATE TABLE `Participacion` (
`nick_usuario` varchar(255) NULL,
`idproyecto` varchar(255) NULL
);

CREATE TABLE `Sprint` (
`idproyecto` varchar(255) NULL,
`idsprint` varchar(255) NOT NULL,
`nombre` varchar(255) NULL,
`fecha_inicio` date NULL,
`fecha_final` date NULL,
PRIMARY KEY (`idsprint`) 
);

CREATE TABLE `Tareas` (
`idtareas` varchar(255) NOT NULL,
`descripcion` varchar(255) NULL,
`valor` decimal NULL,
`estado` decimal NULL,
PRIMARY KEY (`idtareas`) 
);

CREATE TABLE `Trabajos` (
`nick_usuario` varchar(255) NULL,
`idtarea` varchar(255) NULL
);

CREATE TABLE `tarea_sprint` (
`idtarea` varchar(255) NULL,
`idsrpint` varchar(255) NULL
);


ALTER TABLE `Datos` ADD CONSTRAINT `fk_Datos_Usuarios_1` FOREIGN KEY (`nick_usuario`) REFERENCES `Usuarios` (`nick_usuario`);
ALTER TABLE `Proyectos` ADD CONSTRAINT `fk_Proyectos_Participacion_1` FOREIGN KEY (`idproyecto`) REFERENCES `Participacion` (`idproyecto`);
ALTER TABLE `Participacion` ADD CONSTRAINT `fk_Participacion_Usuarios_1` FOREIGN KEY (`nick_usuario`) REFERENCES `Usuarios` (`nick_usuario`);
ALTER TABLE `Proyectos` ADD CONSTRAINT `fk_Proyectos_Sprint_1` FOREIGN KEY (`idproyecto`) REFERENCES `Sprint` (`idproyecto`);
ALTER TABLE `Usuarios` ADD CONSTRAINT `fk_Usuarios_Trabajos_1` FOREIGN KEY (`nick_usuario`) REFERENCES `Trabajos` (`nick_usuario`);
ALTER TABLE `Tareas` ADD CONSTRAINT `fk_Tareas_Trabajos_1` FOREIGN KEY (`idtareas`) REFERENCES `Trabajos` (`idtarea`);
ALTER TABLE `Sprint` ADD CONSTRAINT `fk_Sprint_tarea_sprint_1` FOREIGN KEY (`idsprint`) REFERENCES `tarea_sprint` (`idsrpint`);
ALTER TABLE `Tareas` ADD CONSTRAINT `fk_Tareas_tarea_sprint_1` FOREIGN KEY (`idtareas`) REFERENCES `tarea_sprint` (`idtarea`);

