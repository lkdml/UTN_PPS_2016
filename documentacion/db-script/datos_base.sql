
--
-- Dumping data for table `Rol`
--

LOCK TABLES `Rol` WRITE;
/*!40000 ALTER TABLE `Rol` DISABLE KEYS */;
INSERT INTO `Rol` VALUES ('anuncios_crear','Permite crear un anuncio'),('anuncios_ediar','Permite editar un anuncio'),('anuncios_eliminar','Permite eliminar un anuncio'),('anuncios_listar','Permite ver el listado de anuncios'),('anuncios_ver','Permite ver los anuncios'),('categorias_crear','Permite crear una categoria de anuncios'),('categorias_editar','Permite editar una categoría'),('categorias_eliminar','Permite eliminar una categoría'),('categorias_ver','Poder ver las categorias existentes'),('empresas_crear','Permite crear empresas'),('empresas_editar','Permite editar a una empresa'),('empresas_eliminar','Permite eliminar empresas'),('empresas_ver','Permite ver y listar empresas'),('estados_crear','Permite Crear estados'),('estados_editar','Permite editar estados'),('estados_ver','Permite ver y listar los estados'),('estadoss_eliminar','Permite eliminar estados'),('general_parametros','Permite configurar los parámetros generales del sistema'),('general_plantillas','Permite configurar las plantillas de correo'),('informes_ampliados','Permite ampliar la visibilidad a todos los departamentos'),('informes_operadores','Permite a un Operador ver informes de otros operadores'),('informes_usuarios','Permite a un operador ver informes de usuarios'),('informes_widgets','Permite usar los widgets de informes'),('operadores_crear','Permite crear operadores'),('operadores_editar','Permite editar operadores'),('operadores_eliminar','Permite eliminar operadores'),('operadores_ver','Permite ver y listar a operadores'),('perfiles_crear','Permite crear perfiles'),('perfiles_editar','Permite editar perfiles'),('perfiles_eliminar','Permite eliminar los perfiles'),('perfiles_ver','Permite ver los perfiles'),('prioridades_crear','Permite Crear prioridades'),('prioridades_editar','Permite editar Prioridades'),('prioridades_eliminar','Permite eliminar prioridades'),('prioridades_ver','Permite ver y listar las prioridades'),('sla_crear','Permite crear un SLA'),('sla_editar','Permite editar un SLA'),('sla_eliminar','Permite eliminar un sla'),('sla_ver','Permite listar y ver los SLAs'),('ticket_asignar','Permite hacer hasignaciones de operadores en un ticket'),('ticket_crear','Para crear un ticket'),('ticket_departamento','Permite asignar / cambiar de departamento'),('ticket_editar','Para poder editar/responder un ticket'),('ticket_listar','Para poder listar los ticket'),('ticket_sla','Permite cambiar el plan SLA de un ticket'),('ticket_ver','Para poder ver el contenido de un ticket'),('tipoTicket_crear','Permite crear nuevos tipos de tickets'),('tipoTicket_editar','Permite editar un tipo de ticket'),('tipoTicket_eliminar','Permite eliminar un tipo de ticket'),('tipoTicket_ver','Permite ver los tipos de tickets existentes'),('usuarios_asignar','Permite asignar usuarios a empresas'),('usuarios_crear','Permite crear un usuario'),('usuarios_editar','Permite editar un usuarios'),('usuarios_eliminar','Permite eliminar a usuarios'),('usuarios_ver','Permite ver y listar a los usuarios');
/*!40000 ALTER TABLE `Rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Perfil`
--

LOCK TABLES `Perfil` WRITE;
/*!40000 ALTER TABLE `Perfil` DISABLE KEYS */;
INSERT INTO `Perfil` VALUES (1,'Administrador','default',1);
/*!40000 ALTER TABLE `Perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `perfiles_roles`
--

LOCK TABLES `perfiles_roles` WRITE;
/*!40000 ALTER TABLE `perfiles_roles` DISABLE KEYS */;
INSERT INTO `perfiles_roles` VALUES (1,'anuncios_crear'),(1,'anuncios_eliminar'),(1,'anuncios_listar'),(1,'anuncios_ver'),(1,'categorias_crear'),(1,'categorias_editar'),(1,'categorias_eliminar'),(1,'categorias_ver'),(1,'empresas_crear'),(1,'empresas_editar'),(1,'empresas_eliminar'),(1,'empresas_ver'),(1,'estados_crear'),(1,'estados_editar'),(1,'estados_ver'),(1,'general_parametros'),(1,'general_plantillas'),(1,'informes_ampliados'),(1,'informes_operadores'),(1,'informes_usuarios'),(1,'informes_widgets'),(1,'prioridades_crear'),(1,'prioridades_editar'),(1,'prioridades_ver'),(1,'sla_crear'),(1,'sla_editar'),(1,'sla_eliminar'),(1,'sla_ver'),(1,'ticket_asignar'),(1,'ticket_crear'),(1,'ticket_departamento'),(1,'ticket_editar'),(1,'ticket_listar'),(1,'ticket_sla'),(1,'ticket_ver'),(1,'tipoTicket_crear'),(1,'tipoTicket_editar'),(1,'tipoTicket_eliminar'),(1,'tipoTicket_ver'),(1,'usuarios_asignar'),(1,'usuarios_crear'),(1,'usuarios_editar'),(1,'usuarios_eliminar'),(1,'usuarios_ver');
/*!40000 ALTER TABLE `perfiles_roles` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Dumping data for table `Operador`
--

LOCK TABLES `Operador` WRITE;
/*!40000 ALTER TABLE `Operador` DISABLE KEYS */;
INSERT INTO `Operador` VALUES (1,'administrador','administrador','admin','$2y$11$aGynaXEVX.AsfH68AQcxh.NdDwmuiUEY9vqhI8BKwyL/oBZJxbY72','<p>test</p>\r\n','admin@admin.com','','2016-05-09 18:05:51','2016-05-09 18:05:51',1,1,'',0,1);
/*!40000 ALTER TABLE `Operador` ENABLE KEYS */;
UNLOCK TABLES;
