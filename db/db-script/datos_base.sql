
--
-- Dumping data for table `Rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES 
                        ('anuncios_crear','Permite crear un anuncio'),
                        ('anuncios_ediar','Permite editar un anuncio'),
                        ('anuncios_eliminar','Permite eliminar un anuncio'),
                        ('anuncios_listar','Permite ver el listado de anuncios'),
                        ('anuncios_ver','Permite ver los anuncios'),
                        ('categorias_crear','Permite crear una categoria de anuncios'),
                        ('categorias_editar','Permite editar una categoría'),
                        ('categorias_eliminar','Permite eliminar una categoría'),
                        ('categorias_ver','Poder ver las categorias existentes'),
                        ('empresas_crear','Permite crear empresas'),
                        ('empresas_editar','Permite editar a una empresa'),
                        ('empresas_eliminar','Permite eliminar empresas'),
                        ('empresas_ver','Permite ver y listar empresas'),
                        ('estados_crear','Permite Crear estados'),
                        ('estados_editar','Permite editar estados'),
                        ('estados_ver','Permite ver y listar los estados'),
                        ('estados_eliminar','Permite eliminar estados'),
                        ('general_parametros','Permite configurar los parámetros generales del sistema'),
                        ('general_plantillas','Permite configurar las plantillas de correo'),
                        ('departamentos_ver','Permite ver los departementos'),
                        ('departamentos_crear','permite crear departamentos'),
                        ('departamentos_editar','permite editar departamentos'),
                        ('departamentos_eliminar','permite eliminar departamentos'),
                        ('informes_ampliados','Permite ampliar la visibilidad a todos los departamentos'),
                        ('informes_operadores','Permite a un operador ver informes de otros operadores'),
                        ('informes_usuarios','Permite a un operador ver informes de usuarios'),
                        ('informes_widgets','Permite usar los widgets de informes'),
                        ('operadores_crear','Permite crear operadores'),
                        ('operadores_editar','Permite editar operadores'),
                        ('operadores_eliminar','Permite eliminar operadores'),
                        ('operadores_ver','Permite ver y listar a operadores'),
                        ('perfiles_crear','Permite crear perfiles'),
                        ('perfiles_editar','Permite editar perfiles'),
                        ('perfiles_eliminar','Permite eliminar los perfiles'),
                        ('perfiles_ver','Permite ver los perfiles'),
                        ('prioridades_crear','Permite Crear prioridades'),
                        ('prioridades_editar','Permite editar Prioridades'),
                        ('prioridades_eliminar','Permite eliminar prioridades'),
                        ('prioridades_ver','Permite ver y listar las prioridades'),
                        ('sla_crear','Permite crear un SLA'),
                        ('sla_editar','Permite editar un SLA'),
                        ('sla_eliminar','Permite eliminar un sla'),
                        ('sla_ver','Permite listar y ver los SLAs'),
                        ('ticket_asignar','Permite hacer hasignaciones de operadores en un ticket'),
                        ('ticket_crear','Para crear un ticket'),
                        ('ticket_departamento','Permite asignar / cambiar de departamento'),
                        ('ticket_editar','Para poder editar/responder un ticket'),
                        ('ticket_listar','Para poder listar los ticket'),
                        ('ticket_sla','Permite cambiar el plan SLA de un ticket'),
                        ('ticket_ver','Para poder ver el contenido de un ticket'),
                        ('tipoTicket_crear','Permite crear nuevos tipos de tickets'),
                        ('tipoTicket_editar','Permite editar un tipo de ticket'),
                        ('tipoTicket_eliminar','Permite eliminar un tipo de ticket'),
                        ('tipoTicket_ver','Permite ver los tipos de tickets existentes'),
                        ('usuarios_asignar','Permite asignar usuarios a empresas'),
                        ('usuarios_crear','Permite crear un usuario'),
                        ('usuarios_editar','Permite editar un usuarios'),
                        ('usuarios_eliminar','Permite eliminar a usuarios'),
                        ('usuarios_ver','Permite ver y listar a los usuarios');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'Administrador','default',1);
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `perfil_roles`
--

LOCK TABLES `perfil_roles` WRITE;
/*!40000 ALTER TABLE `perfil_roles` DISABLE KEYS */;
INSERT INTO `perfil_roles` VALUES (1,'anuncios_crear'),
                                    (1,'anuncios_eliminar'),
                                    (1,'anuncios_listar'),
                                    (1,'anuncios_ver'),
                                    (1,'categorias_crear'),
                                    (1,'categorias_editar'),
                                    (1,'categorias_eliminar'),
                                    (1,'categorias_ver'),
                                    (1,'empresas_crear'),
                                    (1,'empresas_editar'),
                                    (1,'empresas_eliminar'),
                                    (1,'departamentos_ver'),
                                    (1,'departamentos_crear'),
                                    (1,'departamentos_editar'),
                                    (1,'departamentos_eliminar'),
                                    (1,'empresas_ver'),
                                    (1,'estados_crear'),
                                    (1,'estados_editar'),
                                    (1,'estados_ver'),
                                    (1,'general_parametros'),
                                    (1,'general_plantillas'),
                                    (1,'informes_ampliados'),
                                    (1,'informes_operadores'),
                                    (1,'informes_usuarios'),
                                    (1,'informes_widgets'),
                                    (1,'prioridades_crear'),
                                    (1,'prioridades_editar'),
                                    (1,'prioridades_ver'),
                                    (1,'sla_crear'),
                                    (1,'sla_editar'),
                                    (1,'sla_eliminar'),
                                    (1,'sla_ver'),
                                    (1,'ticket_asignar'),
                                    (1,'ticket_crear'),
                                    (1,'ticket_departamento'),
                                    (1,'ticket_editar'),
                                    (1,'ticket_listar'),
                                    (1,'ticket_sla'),
                                    (1,'ticket_ver'),
                                    (1,'tipoTicket_crear'),
                                    (1,'tipoTicket_editar'),
                                    (1,'tipoTicket_eliminar'),
                                    (1,'tipoTicket_ver'),
                                    (1,'usuarios_asignar'),
                                    (1,'usuarios_crear'),
                                    (1,'usuarios_editar'),
                                    (1,'usuarios_eliminar'),
                                    (1,'usuarios_ver');
/*!40000 ALTER TABLE `perfil_roles` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Dumping data for table `operador`
--

LOCK TABLES `operador` WRITE;
/*!40000 ALTER TABLE `operador` DISABLE KEYS */;
INSERT INTO `operador` VALUES (1,1,'administrador','administrador','admin','$2y$12$6/1I/icTUyqYkRR3ICrv1OfsI.fBkXWnGEdtWPNNxqN/eQXcdhI8a','<p>test</p>\r\n','admin@admin.com','','2016-05-09 18:05:51','2016-05-09 18:05:51',1,1,1,null,'',0);
/*!40000 ALTER TABLE `operador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
insert into departamento values (1,'Soporte N2','Soporte de 2do nivel',null,0,1,null),
                                (2,'Soporte N1','Soporte de primer nivel',null,0,1,null),
                                (3,'Ventas','Asesoramiento comercial',null,0,1,null);
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `ticket_estado` WRITE;
/*!40000 ALTER TABLE `ticket_estado` DISABLE KEYS */;
insert into ticket_estado values (1,'Abierto','Para tickets nuevos o respondidos','#fd8f00',0,null),
                                (2,'En Curso','Para cuando se está trabajando con el ticket','#f44f00',0,null),
                                (3,'Cerrado','Cuando se finalizaron los trabajos relacionados.','#234f00',0,null);
/*!40000 ALTER TABLE `ticket_estado` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `categoria_anuncios` WRITE;
/*!40000 ALTER TABLE `categoria_anuncios` DISABLE KEYS */;
insert into categoria_anuncios values (1,'Publica','glyphicon-lock');
/*!40000 ALTER TABLE `categoria_anuncios` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
insert into empresa values (1,'tmh corp','arg','','','','','http://tmh.com.ar','2016-05-22 23:30');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `prioridad` WRITE;
/*!40000 ALTER TABLE `prioridad` DISABLE KEYS */;
insert into prioridad values (1,'Alta','Prioridad alta','#fd8f00',null),
                                (2,'Media','Prioridad media','#f44f00',null),
                                (3,'Baja','Prioridad baja','#234f00',null);
/*!40000 ALTER TABLE `prioridad` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `ticket_tipo` WRITE;
/*!40000 ALTER TABLE `ticket_tipo` DISABLE KEYS */;
insert into ticket_tipo values (1,'Tarea','Tarea a realizar'),
                                (2,'Consulta','Duda o consulta'),
                                (3,'Problema','Tengo un problema');
/*!40000 ALTER TABLE `ticket_tipo` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
insert into usuario values (1,'user','mi nombre','mi apellido','$2y$12$6/1I/icTUyqYkRR3ICrv1OfsI.fBkXWnGEdtWPNNxqN/eQXcdhI8a','marianolopezsenes@gmail.com',null,'mi direccion','1875',1,'5555-5555','adicional mail',1,'2016-05-23 12:30','2016-05-23 12:31',1,0);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;