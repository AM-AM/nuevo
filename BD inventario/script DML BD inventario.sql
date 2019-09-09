-- SCRIPT DML BASE DE DATOS INVENTARIO

-- insertando datos en tbl_generos
INSERT INTO `tbl_generos` (`id_genero`, `genero`, `abreviatura`) 
    VALUES (NULL, 'Femenino', 'F');

INSERT INTO `tbl_generos` (`id_genero`, `genero`, `abreviatura`) 
    VALUES (NULL, 'Masculino', 'M');

INSERT INTO `tbl_generos` (`id_genero`, `genero`, `abreviatura`) 
    VALUES (NULL, 'Otro', 'O');

-- insertando datos en tbl_tipo_lugares
INSERT INTO `tbl_tipo_lugares` (`id_tipo_lugar`, `tipo_lugar`) 
    VALUES (NULL, 'Pais');

INSERT INTO `tbl_tipo_lugares` (`id_tipo_lugar`, `tipo_lugar`) 
    VALUES (NULL, 'Departamento');

INSERT INTO `tbl_tipo_lugares` (`id_tipo_lugar`, `tipo_lugar`) 
    VALUES (NULL, 'Municipio');

-- insertando en tbl_lugares
INSERT INTO `tbl_lugares` (`id_lugar`, `id_tipo_lugar`,`id_lugar_padre`,`nombre_lugar`) 
    VALUES (NULL, '1',NULL,'Honduras');

INSERT INTO `tbl_lugares` (`id_lugar`, `id_tipo_lugar`,`id_lugar_padre`,`nombre_lugar`) 
    VALUES (NULL, '2','1','Francisco Morazan');

INSERT INTO `tbl_lugares` (`id_lugar`, `id_tipo_lugar`,`id_lugar_padre`,`nombre_lugar`) 
    VALUES (NULL, '3','2','Tegucigalpa');

INSERT INTO `tbl_lugares` (`id_lugar`, `id_tipo_lugar`,`id_lugar_padre`,`nombre_lugar`) 
    VALUES (NULL, '2','1','Cortes');

INSERT INTO `tbl_lugares` (`id_lugar`, `id_tipo_lugar`,`id_lugar_padre`,`nombre_lugar`) 
    VALUES (NULL, '3','2','San Pedro Sula');

INSERT INTO `tbl_lugares` (`id_lugar`, `id_tipo_lugar`,`id_lugar_padre`,`nombre_lugar`) 
    VALUES (NULL, '2','1','La Esperanza');

INSERT INTO `tbl_lugares` (`id_lugar`, `id_tipo_lugar`,`id_lugar_padre`,`nombre_lugar`) 
    VALUES (NULL, '3','2','Intibuca');

INSERT INTO `tbl_lugares` (`id_lugar`, `id_tipo_lugar`,`id_lugar_padre`,`nombre_lugar`) 
    VALUES (NULL, '1',NULL,'Guatemala');

INSERT INTO `tbl_lugares` (`id_lugar`, `id_tipo_lugar`,`id_lugar_padre`,`nombre_lugar`) 
    VALUES (NULL, '2','1','Esquipulas');

-- insertando en tbl_tipo_usuarios
INSERT INTO `tbl_tipo_usuarios` (`id_tipo_usuario`, `tipo_usuario`) 
    VALUES (NULL, 'Administrador');

INSERT INTO `tbl_tipo_usuarios` (`id_tipo_usuario`, `tipo_usuario`) 
    VALUES (NULL, 'Instructor');

-- insertando en tbl_estado_articulos
INSERT INTO `tbl_estado_articulos` (`id_estado_articulo`, `estado_articulo`) 
    VALUES (NULL, 'Disponible');

INSERT INTO `tbl_estado_articulos` (`id_estado_articulo`, `estado_articulo`) 
    VALUES (NULL, 'No Disponible');

-- insertando en tbl_estado_solicitudes
INSERT INTO `tbl_estado_solicitudes` (`id_estado_solicitud`, `estado_solicitud`) 
    VALUES (NULL, 'Aceptada');

INSERT INTO `tbl_estado_solicitudes` (`id_estado_solicitud`, `estado_solicitud`) 
    VALUES (NULL, 'En espera');

INSERT INTO `tbl_estado_solicitudes` (`id_estado_solicitud`, `estado_solicitud`) 
    VALUES (NULL, 'Rechazada');

-- Insertando en tbl_personas
INSERT INTO `tbl_personas` (`id_persona`,     
                            `id_lugar_nacimiento`,
                            `id_lugar_residencia`,
                            `id_genero`,
                            `primer_nombre`,
                            `segundo_nombre`,
                            `primer_apellido`,
                            `segundo_apellido`,
                            `identidad`,
                            `telefono`,
                            `email`,
                            `fecha_nacimiento`) 
      VALUES (     NULL, 
                        '1', 
                      '3', 
                        '2',
                        'Pedro',
                           NULL,
                        'Perez',
                           NULL,
                        '0801199500045',
                         NULL,
                        'pedrop@gmail.com',
                         NULL);

-- insertando en tbl_usuarios
INSERT INTO `tbl_usuarios` (`id_persona_usuario`,     
                            `id_tipo_usuario`,
                            `nombre_usuario`,
                            `clave_usuario`,
                            `fotografia`,
                            `fecha_registro`) 
             VALUES (   '1', 
                        '1', 
                      'pedro1', 
                        '123456',
                         NULL,
                        '2019-07-25');

-- ----------------------------------------------------------------------------------------------------------
-- ACTUALIZACION 1 DE SCRIPT DML

-- insertando en tbl_categoria_articulos
INSERT INTO `tbl_categoria_articulos` (`id_categoria_articulos`,     
                            `nombre_categoria`) 
             VALUES (   NULL, 
                        'Computadoras');

INSERT INTO `tbl_categoria_articulos` (`id_categoria_articulos`,     
                            `nombre_categoria`) 
             VALUES (   NULL, 
                        'Proyectores');

INSERT INTO `tbl_categoria_articulos` (`id_categoria_articulos`,     
                            `nombre_categoria`) 
             VALUES (   NULL, 
                        'Cables');

<<<<<<< HEAD
INSERT INTO `tbl_categoria_articulos` (`id_categoria_articulos`,     
                            `nombre_categoria`) 
             VALUES (   NULL, 
                        'Mobiliario y Equipos');

=======


-- insertando en tbl_articulos
INSERT INTO `tbl_articulos` (`id_articulos`, 
                            `id_estado_articulo`, 
                            `id_persona_usuario_registra`, 
                            `id_categoria_articulos`,
                            `nombre_articulo`, 
                            `precio_articulo`, 
                            `cantidad`, `fecha_registro_art`, 
                            `fecha_salida_art`, 
                            `descripcion_articulo`) 
            VALUES (NULL, 
                    '2', 
                    '1', 
                    '1',
                    'Computadora de Escritorio', 
                    NULL, 
                    '2', 
                    '2019-08-05', 
                    NULL, 
                    'Computadora de escritorio marca DELL para uso exclusivo de laboratorios');
    

INSERT INTO `tbl_articulos` (`id_articulos`, 
                            `id_estado_articulo`, 
                            `id_persona_usuario_registra`,
                            `id_categoria_articulos`, 
                            `nombre_articulo`, 
                            `precio_articulo`, 
                            `cantidad`, 
                            `fecha_registro_art`, 
                            `fecha_salida_art`, 
                            `descripcion_articulo`) 
            VALUES(NULL, 
                  '1', 
                  '1',
                  '2', 
                  'Proyector', 
                  NULL, 
                  '2', 
                  '2019-08-05', 
                  NULL, 
                  'proyector grande con todos sus componentes incluidos'); 



>>>>>>> origin/master
-- insertando en tbl_estado_reporte
INSERT INTO `tbl_estado_reporte` (`id_estado_reporte`, 
                                  `estado_reporte`) 
          VALUES (NULL, 'En revision');

INSERT INTO `tbl_estado_reporte` (`id_estado_reporte`, 
                                  `estado_reporte`) 
          VALUES(NULL, 'Aceptado');

INSERT INTO `tbl_estado_reporte` (`id_estado_reporte`, 
                                  `estado_reporte`) 
          VALUES (NULL, 'Rechazado');

-- insertando en tbl_tipo_reportes
INSERT INTO `tbl_tipo_reportes` (`id_tipo_reporte`,
                                 `tipo_reporte`) 
          VALUES (NULL, 'Estado de Equipos');

INSERT INTO `tbl_tipo_reportes` (`id_tipo_reporte`, 
                                  `tipo_reporte`) 
          VALUES (NULL, 'Solicitudes de Equipo');

-- ---------------------------------------------------------------------------------------------------------
<<<<<<< HEAD
=======

>>>>>>> origin/master
-- ACTUALIZACION SCRIPT DML
-- insertando en tbl_ubicacion_articulos
INSERT INTO `tbl_ubicacion_articulos` (`id_ubicacion_articulo`, `ubicacion_articulo`, `Abreviatura`) 
          VALUES (NULL, 'Laboratorio1', 'Lab-1');

INSERT INTO `tbl_ubicacion_articulos` (`id_ubicacion_articulo`, `ubicacion_articulo`, `Abreviatura`)          
          VALUES(NULL, 'Laboratorio2', 'Lab-2');

INSERT INTO `tbl_ubicacion_articulos` (`id_ubicacion_articulo`, `ubicacion_articulo`, `Abreviatura`)          
          VALUES(NULL, 'Laboratorio3', 'Lab-3');

INSERT INTO `tbl_ubicacion_articulos` (`id_ubicacion_articulo`, `ubicacion_articulo`, `Abreviatura`)          
          VALUES(NULL, 'Laboratorio4', 'Lab-4');

INSERT INTO `tbl_ubicacion_articulos` (`id_ubicacion_articulo`, `ubicacion_articulo`, `Abreviatura`)          
          VALUES(NULL, 'Laboratorio de Investigación', 'Lab-Investigación');

-- insertando en tbl_articulos
INSERT INTO `tbl_articulos` (`id_articulos`, 
                            `id_estado_articulo`, 
                            `id_persona_usuario_registra`,
                            `id_categoria_articulos`, 
                            `id_ubicacion_articulo`, 
                            `nombre_articulo`, 
                            `precio_articulo`, 
                            `cantidad`, 
                            `fecha_registro_art`, 
                            `fecha_salida_art`, 
                            `descripcion_articulo`) 
          VALUES(NULL, 
                  '2', 
                  '1', 
                  '1', 
                  '1', 
                  'Computadora de Escritorio DELL ', 
                  '8500.00', 
                  '1', 
                  '2019-08-07', 
                  NULL, 
                  'computadoras ubicadas en el laboratorio1 para impartir clases, marca DELL core i7');

INSERT INTO `tbl_articulos` (`id_articulos`, 
                            `id_estado_articulo`, 
                            `id_persona_usuario_registra`,
                            `id_categoria_articulos`, 
                            `id_ubicacion_articulo`, 
                            `nombre_articulo`, 
                            `precio_articulo`, 
                            `cantidad`, 
                            `fecha_registro_art`, 
                            `fecha_salida_art`, 
                            `descripcion_articulo`) 
          VALUES(NULL, 
                  '2', 
                  '1', 
                  '1', 
                  '5', 
                  'Computadora portatil marca DELL', 
                  '12500.00', 
                  '1', 
                  '2019-08-08', 
                  NULL, 
                  'Laptop Dell core i7, para uso exclusivo de los instructores de laboratorio');

INSERT INTO `tbl_articulos` (`id_articulos`, 
                            `id_estado_articulo`, 
                            `id_persona_usuario_registra`, 
                            `id_categoria_articulos`, 
                            `id_ubicacion_articulo`, 
<<<<<<< HEAD
=======

-- ACTUALIZACION 2 DE SCRIPT DML
-- insertando en tbl_articulos




        INSERT INTO `tbl_articulos` (`id_articulos`, 
                            `id_estado_articulo`, 
                            `id_persona_usuario_registra`,
                            `id_categoria_articulos`, 

>>>>>>> origin/master
                            `nombre_articulo`, 
                            `precio_articulo`, 
                            `cantidad`, 
                            `fecha_registro_art`, 
                            `fecha_salida_art`, 
                            `descripcion_articulo`) 
          VALUES (NULL, 
                  '1', 
                  '1', 
<<<<<<< HEAD
=======

>>>>>>> origin/master
                  '2', 
                  '5', 
                  'Proyector Grande', 
                  '6550.00', 
                  '1', 
                  '2019-08-15', 
                  NULL, 
                  'proyector disponible para prestamo');
<<<<<<< HEAD
=======

                  'computadora portatil', 
                  NULL, 
                  '2', 
                  '2019-08-05', 
                  NULL, 
                  'laptop marca hp para uso de los instructores');

>>>>>>> origin/master

INSERT INTO `tbl_articulos` (`id_articulos`, 
                            `id_estado_articulo`, 
<<<<<<< HEAD
                            `id_persona_usuario_registra`, 
                            `id_categoria_articulos`, 
                            `id_ubicacion_articulo`, 
=======

                            `id_persona_usuario_registra`, 
                            `id_categoria_articulos`, 
                            `id_ubicacion_articulo`, 

                            `id_persona_usuario_registra`,
                            `id_categoria_articulos`, 

>>>>>>> origin/master
                            `nombre_articulo`, 
                            `precio_articulo`, 
                            `cantidad`, 
                            `fecha_registro_art`, 
                            `fecha_salida_art`, 
                            `descripcion_articulo`) 
<<<<<<< HEAD
=======

>>>>>>> origin/master
          VALUES (NULL, 
                  '1', 
                  '1', 
                  '2', 
                  '5', 
                  'Pantalla para proyectar', 
                  '2500.00', 
                  '1', 
                  '2019-08-08', 
                  NULL, 
                  'pantalla para proyectar, disponible para prestamo');

INSERT INTO `tbl_articulos` (`id_articulos`, 
                            `id_estado_articulo`, 
                            `id_persona_usuario_registra`, 
                            `id_categoria_articulos`, 
                            `id_ubicacion_articulo`, 
                            `nombre_articulo`, 
                            `precio_articulo`, 
                            `cantidad`, 
                            `fecha_registro_art`, 
                            `fecha_salida_art`, 
                            `descripcion_articulo`) 
        VALUES (NULL, 
                '2', 
                '1', 
                '3', 
                '5', 
                'Cables USB', 
                '50.00', 
                '1', 
                '2019-08-09', 
                NULL, 
                'Cables usb varios tamaños de extension');

INSERT INTO `tbl_articulos` (`id_articulos`, 
                            `id_estado_articulo`, 
                            `id_persona_usuario_registra`, 
                            `id_categoria_articulos`, 
                            `id_ubicacion_articulo`, 
                            `nombre_articulo`, 
                            `precio_articulo`, 
                            `cantidad`, 
                            `fecha_registro_art`, 
                            `fecha_salida_art`, 
                            `descripcion_articulo`) 
        VALUES (NULL, 
                '2', 
                '1', 
                '3', 
                '5', 
                'Mouses con conector USB', 
                '200.00', 
                '1', 
                '2019-08-07', 
                NULL, 
                'Mouses con conector con cable usb');

INSERT INTO `tbl_articulos` (`id_articulos`, 
                            `id_estado_articulo`, 
                            `id_persona_usuario_registra`, 
                            `id_categoria_articulos`, 
                            `id_ubicacion_articulo`, 
                            `nombre_articulo`, 
                            `precio_articulo`, 
                            `cantidad`, 
                            `fecha_registro_art`, 
                            `fecha_salida_art`, 
                            `descripcion_articulo`) 
        VALUES (NULL, 
                '1', 
                '1', 
                '3', 
                '5', 
                'Mouses Inalambricos', 
                '300.00', 
                '1', 
                '2019-08-07', 
                NULL, 
                'mouses inalambricos disponibles para prestamos');

 INSERT INTO `tbl_articulos` (`id_articulos`, 
                            `id_estado_articulo`, 
                            `id_persona_usuario_registra`, 
                            `id_categoria_articulos`, 
                            `id_ubicacion_articulo`, 
                            `nombre_articulo`, 
                            `precio_articulo`, 
                            `cantidad`, 
                            `fecha_registro_art`, 
                            `fecha_salida_art`, 
                            `descripcion_articulo`)
        VALUES (NULL, 
                '1', 
                '1', 
                '2', 
                '5', 
                'Proyector pequeño', 
                NULL, 
                '1', 
                '2019-08-10', 
                NULL, 
                'Proyector pequeño, disponible para prestamo');
<<<<<<< HEAD

INSERT INTO `tbl_articulos` (`id_articulos`, 
                            `id_estado_articulo`, 
                            `id_persona_usuario_registra`, 
                            `id_categoria_articulos`, 
                            `id_ubicacion_articulo`, 
                            `nombre_articulo`, 
                            `precio_articulo`, 
                            `cantidad`, 
                            `fecha_registro_art`, 
                            `fecha_salida_art`, 
                            `descripcion_articulo`)
        VALUES (NULL, 
                '1', 
                '1', 
                '3', 
                '5', 
                'Cable USB', 
                NULL, 
                '1', 
                '2019-08-10', 
                NULL, 
                'Cable con conectos USB');

INSERT INTO `tbl_articulos` (`id_articulos`, 
                            `id_estado_articulo`, 
                            `id_persona_usuario_registra`, 
                            `id_categoria_articulos`, 
                            `id_ubicacion_articulo`, 
                            `nombre_articulo`, 
                            `precio_articulo`, 
                            `cantidad`, 
                            `fecha_registro_art`, 
                            `fecha_salida_art`, 
                            `descripcion_articulo`)
        VALUES (NULL, 
                '1', 
                '1', 
                '4', 
                '5', 
                'Pantalla TV LCD', 
                NULL, 
                '1', 
                '2019-08-10', 
                NULL, 
                'Televisor LCD para instructores');
-- ----------------------------------------------------------
=======
            VALUES(NULL, 
                  '1', 
                  '1',
                  '2', 
                  'pantalla para proyectar', 
                  NULL, 
                  '2', 
                  '2019-08-05', 
                  NULL, 
                  'pantalla para proyeccion con todos sus accesorios, disponible para el prestamo');
>>>>>>> origin/master

