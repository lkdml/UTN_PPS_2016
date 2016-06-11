
--
-- Dumping data for table `Rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES 
                        ('anuncios_crear','Permite crear un anuncio'),
                        ('anuncios_editar','Permite editar un anuncio'),
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

LOCK TABLES `email_templates` WRITE;
/*!40000 ALTER TABLE `email_templates` DISABLE KEYS */;
INSERT INTO `email_templates` VALUES (1,'usuario','Nuevo Ticket abierto','Estimado {$user_full_name}:Â <br />\r\n<br />\r\nHemos recibido su solicitud, a la brevedad serÃ¡ respondida. Nos comprometemos a resolver todas las solicitudes tan pronto como sea posible. RecibirÃ¡ un correo electrÃ³nico cada vez que haya una modificaciÃ³n en su solicitud.Â <br />\r\n<strong><span style=\"color: red\">Por favor no responda a este correo. Para brindar informaciÃ³n adicional, ingrese en SUR - MIS SOLICITUDES - VERÂ  -> AGREGAR MENSAJE.</span></strong><br />\r\nÂ \r\n<hr />\r\n<h3>Detalles de la Solicitud</h3>\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Solicitud NÂ°</span></b><strong>:</strong> {$ticket_number}<br />\r\n<strong>Asunto:</strong> {$ticket_subject}<br />\r\n<strong>Departamento:</strong> {$ticket_department}<br />\r\n<strong>Estado:</strong> {$ticket_status}<br />\r\n<strong>Prioridad:</strong> {$ticket_priority}\r\n\r\n<h3>Mensaje de la SolicitudÂ </h3>\r\n{$message_text}<br />\r\n<br />\r\n{if $user_registered}<span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Ud. puede ver el estado de esta solicitud haciendo click en</span>:{else}<span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Para poder ver el estado de esta solicitud debe estar registrado</span>:{/if}<br />\r\nhttp://sur.agn.gov.ar/\r\n<hr /><br />\r\nSaludos cordiales,<br />\r\n<strong>{$company}</strong>','NO RESPONDER - [#{$ticket_number}] {$ticket_s'),
                                    (2,'usuario','Nueva respuesta a ticket','{$ticket_reply}<br />\r\n<span class=\"marker\"><strong>Por favor no responda a este correo. Para brindar informaciÃ³n adicional, ingrese en SUR - MIS SOLICITUDES - VERÂ  -> AGREGAR MENSAJE.</strong></span><br />\r\nÂ \r\n<hr />\r\n<h3>Detalles de la Solicitud</h3>\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Solicitud NÂ°:</span></b> {$ticket_number}<br />\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Asunto:</span></b> {$ticket_subject}<br />\r\n<strong>Departamento:</strong> {$ticket_department}<br />\r\n<strong>Estado:</strong> {$ticket_status}<br />\r\n<strong>Prioridad:</strong> {$ticket_priority}<br />\r\n<br />\r\n<span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Ud. puede ver el estado de esta solicitud haciendo click en</span><br />\r\nhttp://sur.agn.gov.ar','RE: [#{$ticket_number}] {$ticket_subject}'),
                                    (3,'usuario','Respuesta a un ticket cerrado','Estimado {$user_full_name}:<br />\r\n<br />\r\nLa solicitud que ha ingresado se encuentra clasificada como resuelta. Si quiere ingresar una nueva solicitud, ingrese a http://sur.agn.gov.ar, para generar un nuevo ticket. O bien envie un correo electrÃ³nico con un nuevo asunto.Â <br />\r\n<span class=\"marker\"><strong>Por favor no responda a este correo. Para brindar informaciÃ³n adicional, ingrese en SUR - MIS SOLICITUDES - VERÂ  -> AGREGAR MENSAJE.</strong></span><br />\r\n<br />\r\nSaludos cordiales,<br />\r\n<strong>{$company}</strong>','Realice una nueva solicitud'),
                                    (4,'usuario','Cambio de clave','Estimado {$user_full_name}:<br />\r\n<br />\r\nPara blanquear la clave debe comunicarse con el Ã¡rea de sistemas y solicitar el cambio de la misma.<br />\r\n<br />\r\n<span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Le sugerimos que modifique la clave luego de ingresar, puede realizar esta operaciÃ³n ingresando al perfil de su cuenta.Â </span><br />\r\n<br />\r\nSaludos cordiales,<br />\r\n<strong>{$company}</strong>','Blanqueo de clave'),
                                    (5,'usuario','Registración de nuevo usuario','Estimado {$user_full_name}:Â <br />\r\n<br />\r\nSe ha creado una cuenta para Ud. en el Sistema Unico de Requerimientos de la Gerencia de AdministraciÃ³n y Finanzas. A continuaciÃ³n encontrarÃ¡ los detalles de la misma:Â <br />\r\n<br />\r\n<strong>DirecciÃ³n de correo:</strong> {$user_email}<br />\r\n<strong>Clave: (misma clave de red)</strong><br />\r\n<br />\r\nTendrÃ¡ ingreso haciendo click en el siguiente vÃ­nculo:Â <br />\r\nhttp://sur.agn.gov.ar/<br />\r\n<br />\r\nSaludos cordiales.Â <br />\r\n<br />\r\n<strong>{$company}</strong>','Se ha creado su cuenta para el sistema SUR'),
                                    (6,'usuario','Respuesta a comentario','Estimado {$user_full_name}:<br />\r\n<br />\r\n<br />\r\nSe realizÃ³ una publicaciÃ³n en su comentario.Â <br />\r\nÂ \r\n<hr />\r\n<h3>Comentario</h3>\r\n{$comment_message}<br />\r\nÂ \r\n<hr />\r\n<p>Puedes ver y responder al comentario haciendo click en el vÃ­nculo que figura a continuaciÃ³n:Â <span style=\"font-size:8pt;font-family:Arial, sans-serif;\">Â </span></p>\r\nhttp://sur.agn.gov.ar<br />\r\n<span class=\"marker\"><strong>Por favor no responda a este correo. Para brindar informaciÃ³n adicional, ingrese en SUR - MIS SOLICITUDES - VERÂ  -> AGREGAR MENSAJE.</strong></span><br />\r\n<br />\r\nSaludos cordiales.<br />\r\n<br />\r\n<strong>{$company}</strong>','Una respuesta ha sido publicada para su comen'),
                                    (7,'usuario','Su ticket fue escalado','Estimado {$user_full_name}:<br />\r\n<br />\r\nSu solicitud estÃ¡ siendo gestionada. Una persona de nuestro equipo se contactarÃ¡ con Ud. a la brevedad.Â <br />\r\n<span class=\"marker\"><strong>Por favor no responda a este correo. Para brindar informaciÃ³n adicional, ingrese en SUR - MIS SOLICITUDES - VERÂ  -> AGREGAR MENSAJE.</strong></span><br />\r\nÂ \r\n<hr />\r\n<h3>Detalles de la Solicitud</h3>\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Solicitud NÂ°</span></b><strong>:</strong> {$ticket_number}<br />\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Asunto:</span></b> {$ticket_subject}<br />\r\n<strong>Departamento:</strong> {$ticket_department}<br />\r\n<strong>Estado:</strong> {$ticket_status}<br />\r\n<strong>Prioridad:</strong> {$ticket_priority}<br />\r\nÂ \r\n<hr /><br />\r\nSaludos cordiales,<br />\r\n<strong>{$company}</strong>','[#{$ticket_number}] Su solicitud ha sido esca'),
                                    (8,'usuario','Ticket cerrado por inactividad','Estimado {$user_full_name}:<br />\r\n<br />\r\nSu solicitud fue cerrada automÃ¡ticamente porque no registraba actividad. En caso que, Ud considere que el tema no fue resuelto adecuadamente, puede volver a enviar esta solicitud, y un agente le responderÃ¡ a la brevedad.Â <br />\r\n<span class=\"marker\"><strong>Por favor no responda a este correo. Para brindar informaciÃ³n adicional, ingrese en SUR - MIS SOLICITUDES - VERÂ  -> AGREGAR MENSAJE.</strong></span>\r\n<hr />\r\n<h3>Detalles de la Solicitud</h3>\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Solicitud NÂ°</span></b><strong>:</strong> {$ticket_number}<br />\r\n<strong>Asunto:</strong> {$ticket_subject}<br />\r\n<strong>Departamento:</strong> {$ticket_department}<br />\r\n<strong>Estado:</strong> {$ticket_status}<br />\r\n<strong>Prioridad:</strong> {$ticket_priority}<br />\r\nÂ \r\n<hr /><br />\r\nSaludos cordiales.Â <br />\r\n<br />\r\n<strong>{$company}</strong>','[#{$ticket_number}] La solicitud fue cerrada '),
                                    (9,'usuario','Registración automática de usaurio','Estimado {$user_full_name}:<br />\r\n<br />\r\nSe creÃ³ una cuenta a su nombre en nuestra mesa de ayuda. A continuaciÃ³n encontrarÃ¡ la informaciÃ³n de la cuenta:Â <br />\r\n<br />\r\n<strong>DirecciÃ³n de correo:</strong> {$user_email}<br />\r\n<strong>Clave:</strong> (la misma de la red)<br />\r\n<br />\r\nPuede acceder a la mesa de ayuda haciendo click en el siguiente vÃ­nculo:Â <br />\r\nhttp://sur.agn.gov.ar<br />\r\n<br />\r\nTodas las solicitud anteriores han sido eliminadas de nuestro sistema. Le recomendamos que ingrese y modifique la contraseÃ±a inmediatamente.Â <br />\r\n<br />\r\nSaludos cordiales.<br />\r\n<br />\r\n<strong>{$company}</strong>','Se creÃ³ su cuenta en el sistema S.U.R. '),
                                    (10,'usuario','Ticket cerrado por Operador','Estimado {$user_full_name},<br />\r\n<br />\r\nSu solicitud ha sido cerrada por un miembro de nuestro equipo. <span style=\"font-size:10pt;font-family:Arial, sans-serif;\">En caso que, Ud considere que el tema no fue resuelto adecuadamente, puede volver a enviar esta solicitud, y un agente le responderÃ¡ a la brevedad.</span><br />\r\n<strong><span style=\"color: red\">Por favor no responda a este correo. Para brindar informaciÃ³n adicional, ingrese en SUR - MIS SOLICITUDES - VERÂ  -> AGREGAR MENSAJE.</span></strong>\r\n\r\n<hr />\r\n<h3>Detalles de la Solicitud</h3>\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Solicitud NÂ°</span></b><strong>:</strong> {$ticket_number}<br />\r\n<strong>Asunto:</strong> {$ticket_subject}<br />\r\n<strong>Departamento:</strong> {$ticket_department}<br />\r\n<strong>Estado:</strong> Closed<br />\r\n<strong>Prioridad:</strong> {$ticket_priority}<br />\r\n<br />\r\n<span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Ud. puede ver el estado de esta solicitud haciendo click en</span><br />\r\nhttp://sur.agn.gov.ar<br />\r\nÂ \r\n<hr /><br />\r\nSaludos cordiales.<br />\r\n<br />\r\n<strong>{$company}</strong>','NO RESPONDER - [#{$ticket_number}] La solicit'),
                                    (11,'usuario','Adjunto rechazado','Estimado {$user_full_name}:Â <br />\r\n<br />\r\nEl correo electrÃ³nico enviado a los administradores no fue remitido en su totalidad. El siguiente archivo ha sido rechazado por el sistema: <strong>{$filename}</strong><br />\r\n<br />\r\nPor favor, intente enviar nuevamente el adjunto utilizando uno de los siguientes tipos de archivo permitidos: {$ticket_allowed_attachments}.<br />\r\nÂ \r\n<hr /><br />\r\nSaludos cordiales.<br />\r\n<br />\r\n<strong>{$company}</strong>','Se rechazÃ³ el adjunto'),
                                    (12,'operador','Operador asignado a ticket','{if isset($assigning_name)}{$assigning_name} le asignÃ³ una solicitud.{else}Se le ha asignado una solicitud.{/if}<br />\r\n<br />\r\n{if isset($ticket_due_time) AND !empty($ticket_due_time)}Por favor, gestione esta solicitud antes de su vencimiento (<strong>{$ticket_due_time}</strong>).{/if} SerÃ¡ notificado de cualquier acciÃ³n relacionada a esta solicitud.<br />\r\n<strong><span style=\"color: red\">Por favor no responda a este correo. Para brindar informaciÃ³n adicional, ingrese en SUR - MIS SOLICITUDES - VERÂ  -> AGREGAR MENSAJE.</span></strong><br />\r\nÂ \r\n<hr />\r\n<h3>Detalles de la Solicitud</h3>\r\n<strong>Solicitud NÂ°:</strong> {$ticket_number}<br />\r\n{if isset($user_full_name)}<strong>Usuario:</strong> {$user_full_name} ({$user_email})<br />\r\n{/if}<br />\r\n<strong>Asunto:</strong> {$ticket_subject}<br />\r\n<strong>Departamento:</strong> {$ticket_department}<br />\r\n<strong>Estado:</strong> {$ticket_status}<br />\r\n<strong>Prioridad:</strong> {$ticket_priority}\r\n\r\n<h3>Mensaje de la SolicitudÂ </h3>\r\n{$message_text}{if isset($ticket_fields)}\r\n\r\n<h3>Campos Involucrados</h3>\r\n{section name=i loop=$ticket_fields}{$ticket_fields[i].field_name}: {$ticket_fields[i].field_value}<br />\r\n{/section}{else}<br />\r\n{/if}\r\n<hr /><br />\r\nUd. puede ver el estado de esta solicitud haciendo click en:Â <br />\r\n{$operator_url}','NO RESPONDER - [#{$ticket_number}] Se le asig'),
                                    (13,'operador','Nuevo ticket abierto','Se ha ingresado una nueva solicitud para el departamento, {$ticket_department}. {if isset($ticket_due_time) AND !empty($ticket_due_time)}Por favor, responda esta solicitud antes del dÃ­a {$ticket_due_time}.{/if} <span style=\"font-size:10pt;font-family:Arial, sans-serif;\">SerÃ¡ notificado de cualquier acciÃ³n relacionada a esta solicitud</span>.<br />\r\n<span class=\"marker\"><strong>Por favor no responda a este correo. Para brindar informaciÃ³n adicional, ingrese en SUR - MIS SOLICITUDES - VERÂ  -> AGREGAR MENSAJE.</strong></span><br />\r\nÂ \r\n<hr />\r\n<h3>Detalles de la Solicitud</h3>\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Solicitud NÂ°</span></b><strong>:</strong> {$ticket_number}<br />\r\n{if isset($user_full_name)}<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Usuario:</span></b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Â </span> {$user_full_name} ({$user_email})<br />\r\n{/if}<br />\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Asunto:</span></b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Â </span>{$ticket_subject}<br />\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Departamento:</span></b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\"> </span>{$ticket_department}<br />\r\n<b>Estado<span style=\"font-size:10pt;font-family:Arial, sans-serif;\">:</span></b> {$ticket_status}<br />\r\n<strong>Prioridad</strong><strong>:</strong> {$ticket_priority}\r\n\r\n<h3>Mensaje de la SolicitudÂ </h3>\r\n{$message_text}{if isset($ticket_fields)}\r\n\r\n<h3>Campos Involucrados</h3>\r\n{section name=i loop=$ticket_fields}{$ticket_fields[i].field_name}: {$ticket_fields[i].field_value}<br />\r\n{/section}{else}<br />\r\n{/if}\r\n<hr /><br />\r\n<span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Ud. puede ver el estado de esta solicitud haciendo click en</span><br />\r\n{$operator_url}','[#{$ticket_number}] Se ha ingresado una nueva'),
                                    (14,'operador','Nueva respuesta en ticket','Se ingresÃ³ una nueva respuesta en la solicitud: #{$ticket_number}. {if isset($ticket_due_time) AND !empty($ticket_due_time)}Por favor, gestione esta solicitud antes del dÃ­aÂ <strong>{$ticket_due_time}</strong>.{/if}<br />\r\n<strong><span style=\"color: red\">Por favor no responda a este correo. Para brindar informaciÃ³n adicional, ingrese en SUR - MIS SOLICITUDES - VERÂ  -> AGREGAR MENSAJE.</span></strong><br />\r\nÂ \r\n<hr />\r\n<h3>Mensaje de la Solicitud</h3>\r\n{$message_text}<br />\r\nÂ \r\n<hr />\r\n<h3>Detalles de la Solicitud</h3>\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Solicitud NÂ°:</span></b> {$ticket_number}<br />\r\n{if isset($user_full_name)}<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Usuario:</span></b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\"> </span>{$user_full_name} ({$user_email})<br />\r\n{/if}<br />\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Asunto:</span></b> {$ticket_subject}<br />\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Departamento:</span></b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Â </span> {$ticket_department}<br />\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Estado:</span></b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Â </span> {$ticket_status}<br />\r\n<strong>Prioridad</strong><strong>:</strong> {$ticket_priority}<br />\r\nÂ \r\n<hr /><br />\r\n<span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Ud. puede ver el estado de esta solicitud haciendo click en</span><br />\r\n{$operator_url}','NO RESPONDER - [#{$ticket_number}] Ãsta solic'),
                                    (15,'operador','Cambio de Clave','Se recibiÃ³ una solicitud de blanqueo de clave de su cuenta de operador. Por favor, comunÃ­quese con sistemas para realizar la operaciÃ³n.<br />\r\n<br />\r\n{$operator_url}<br />\r\n<strong>Nombre de Usuario:</strong> {$username}<br />\r\n<strong>Clave:</strong> {$password}<br />\r\n<br />\r\nSugerimos que modifique la clave inmediatamente despuÃ©s de ingresar al sistema. Ud. puede realizar esta operaciÃ³n desde el menÃº de Opciones Personales.Â ','Su clave de operador ha sido blanqueada'),
                                    (16,'operador','Nuevo ticket abierto y asignado a operador','Se le asignÃ³ una nueva solicitud.<br />\r\n<br />\r\n{if isset($ticket_due_time) AND !empty($ticket_due_time)}Por favor, gestione esta solicitud antes del dÃ­aÂ <strong>{$ticket_due_time}</strong>.{/if} <span style=\"font-size:10pt;font-family:Arial, sans-serif;\">SerÃ¡ notificado de cualquier acciÃ³n relacionada a esta solicitud</span>.<br />\r\n<strong><span style=\"color: red\">Por favor no responda a este correo. Para brindar informaciÃ³n adicional, ingrese en SUR - MIS SOLICITUDES - VERÂ  -> AGREGAR MENSAJE.</span></strong><br />\r\nÂ \r\n<hr />\r\n<h3>Detalles de la Solicitud</h3>\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Solicitud NÂ°:</span></b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Â </span> {$ticket_number}<br />\r\n{if isset($user_full_name)}<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Usuario:</span></b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Â </span> {$user_full_name} ({$user_email})<br />\r\n{/if}<br />\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Asunto:</span></b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Â </span> {$ticket_subject}<br />\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Departamento:</span></b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Â </span> {$ticket_department}<br />\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Estado:</span></b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Â </span> {$ticket_status}<br />\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Prioridad</span><span lang=\"en-us\" style=\"font-size:10pt;font-family:Arial, sans-serif;\" xml:lang=\"en-us\">:</span></b><span lang=\"en-us\" style=\"font-size:10pt;font-family:Arial, sans-serif;\" xml:lang=\"en-us\">Â </span> {$ticket_priority}\r\n\r\n<h3>Mensaje de la SolicitudÂ </h3>\r\n{$message_text}{if isset($ticket_fields)}\r\n\r\n<h3>Campos Involucrados</h3>\r\n{section name=i loop=$ticket_fields}{$ticket_fields[i].field_name}: {$ticket_fields[i].field_value}<br />\r\n{/section}{else}<br />\r\n{/if}\r\n<hr /><br />\r\n<span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Ud. puede ver el estado de esta solicitud haciendo click en</span><br />\r\n{$operator_url}','NO RESPONDER - [#{$ticket_number}] Se le asig'),
                                    (17,'operador','Intento fallido de ingreso','Se intento ingresar <span style=\"line-height:20.7999992370605px;\">con credenciales invÃ¡lidas a</span>l panel de operador de ArticDesk, los detalles se encuentran a continuaciÃ³n. Tome las precauciones necesarias para evitar futuros intentos fallidos de ingreso. Los intentos fallidos de ingreso pueden significar que alguien intenta acceder sin autorizaciÃ³n al sistema.Â <br />\r\n<br />\r\n<strong>Nombre de Usuario</strong>: {$username}<br />\r\n<strong>DirecciÃ³n IP:Â </strong> {$ip_address}<br />\r\n<br />\r\nNote que tres intentos fallidos de ingreso desde la misma direcciÃ³n de IP en un periodo menor a 15 minutos resultarÃ¡n en un bloqueo temporal a esa direcciÃ³n de IP.','Intento fallido de ingreso de un operador'),
                                    (18,'operador','Nuevo ticket interno','<span style=\"line-height:20.7999992370605px;\">Una nueva solicitud fue abierta por {$operator_name}Â </span>del departamento <span style=\"line-height:20.7999992370605px;\">{$ticket_department}</span>.<br />\r\n<br />\r\n{if isset($ticket_due_time) AND !empty($ticket_due_time)}Por favor, gestione esta solicitud antes del dÃ­a <strong>{$ticket_due_time}</strong>.{/if}Â  <span style=\"font-size:10pt;font-family:Arial, sans-serif;\">SerÃ¡ notificado de cualquier acciÃ³n relacionada a esta solicitud</span>.\r\n<hr />\r\n<h3>Detalles de la Solicitud</h3>\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Solicitud NÂ°:</span></b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\"> </span>{$ticket_number}<br />\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Usuario:</span></b> {$operator_name}<br />\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Asunto:</span></b> {$ticket_subject}<br />\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Departamento:</span></b> {$ticket_department}<br />\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Estado:</span></b> {$ticket_status}<br />\r\n<strong>Prioridad</strong><strong>:</strong> {$ticket_priority}\r\n\r\n<h3>Mensaje de la SolicitudÂ </h3>\r\n{$message_text}{if isset($ticket_fields)}\r\n\r\n<h3>Campos Involucrados</h3>\r\n{section name=i loop=$ticket_fields}{$ticket_fields[i].field_name}: {$ticket_fields[i].field_value}<br />\r\n{/section}{else}<br />\r\n{/if}\r\n<hr /><br />\r\n<span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Ud. puede ver el estado de esta solicitud haciendo click en</span><br />\r\n{$operator_url}','[#{$ticket_number}] Se ingresÃ³ una nueva sol'),
                                    (19,'operador','Cambio de departamento en Ticket','EstimadoÂ {$operator_firstname}:Â <br />\r\n<br />\r\nEsta solicitud ha cambiado de departamento. {if isset($ticket_due_time) AND !empty($ticket_due_time)}Por favor, responda esta solicitud antes del dÃ­a:Â <strong>{$ticket_due_time}</strong>.{/if}<br />\r\n<br />\r\n<span style=\"font-size:10pt;font-family:Arial, sans-serif;\">SerÃ¡ notificado de cualquier acciÃ³n relacionada a esta solicitud</span>.<br />\r\n<strong><span style=\"color: red\">Por favor no responda a este correo. Para brindar informaciÃ³n adicional, ingrese en SUR - MIS SOLICITUDES - VERÂ  -> AGREGAR MENSAJE.</span></strong><br />\r\nÂ \r\n<hr />\r\n<h3>Detalles de la Solicitud</h3>\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Solicitud NÂ°:</span></b> {$ticket_number}<br />\r\n{if isset($user_full_name)}<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Usuario:</span></b> {$user_full_name} ({$user_email}){/if}<br />\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Asunto:</span></b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Â </span>{$ticket_subject}<br />\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Departamento:</span></b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Â </span> {$ticket_department}<br />\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Estado:</span></b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Â </span> {$ticket_status}<br />\r\n<strong>Prioridad</strong><strong>:</strong> {$ticket_priority}\r\n\r\n<h3>Mensaje de la SolicitudÂ </h3>\r\n{$message_text}<br />\r\n<br />\r\n{if isset($ticket_fields)}\r\n<h3>Campos Involucrados</h3>\r\n{section name=i loop=$ticket_fields}{$ticket_fields[i].field_name}: {$ticket_fields[i].field_value}{/section}<br />\r\n{/if}\r\n<hr /><br />\r\n<span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Ud. puede ver el estado de esta solicitud haciendo click en</span><br />\r\n{$operator_url}','NO RESPONDER - [#{$ticket_number}] Modificaci'),
                                    (20,'custom','Cambio de departamento por SLA','EstimadoÂ {$operator_firstname}:Â <br />\r\n<br />\r\nEsta solicitud ha cambiado de departamento. {if isset($ticket_due_time) AND !empty($ticket_due_time)}Por favor, responda esta solicitud antes del dÃ­a:Â <strong>{$ticket_due_time}</strong>.{/if}<br />\r\n<br />\r\n<span style=\"font-size:10pt;font-family:Arial, sans-serif;\">SerÃ¡ notificado de cualquier acciÃ³n relacionada a esta solicitud</span>.<br />\r\n<strong><span style=\"color: red\">Por favor no responda a este correo. Para brindar informaciÃ³n adicional, ingrese en SUR - MIS SOLICITUDES - VERÂ  -> AGREGAR MENSAJE.</span></strong><br />\r\nÂ \r\n<hr />\r\n<h3>Detalles de la Solicitud</h3>\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Solicitud NÂ°:</span></b> {$ticket_number}<br />\r\n{if isset($user_full_name)}<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Usuario:</span></b> {$user_full_name} ({$user_email}){/if}<br />\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Asunto:</span></b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Â </span>{$ticket_subject}<br />\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Departamento:</span></b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Â </span> {$ticket_department}<br />\r\n<b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Estado:</span></b><span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Â </span> {$ticket_status}<br />\r\n<strong>Prioridad</strong><strong>:</strong> {$ticket_priority}\r\n\r\n<h3>Mensaje de la SolicitudÂ </h3>\r\n{$message_text}<br />\r\n<br />\r\n{if isset($ticket_fields)}\r\n<h3>Campos Involucrados</h3>\r\n{section name=i loop=$ticket_fields}{$ticket_fields[i].field_name}: {$ticket_fields[i].field_value}{/section}<br />\r\n{/if}\r\n<hr /><br />\r\n<span style=\"font-size:10pt;font-family:Arial, sans-serif;\">Ud. puede ver el estado de esta solicitud haciendo click en</span><br />\r\n{$operator_url}','NO RESPONDER - [#{$ticket_number}] Modificaci');
/*!40000 ALTER TABLE `email_templates` ENABLE KEYS */;
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
                        (1,'anuncios_editar'),
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
                        (1,'empresas_ver'),
                        (1,'estados_crear'),
                        (1,'estados_editar'),
                        (1,'estados_ver'),
                        (1,'estados_eliminar'),
                        (1,'general_parametros'),
                        (1,'general_plantillas'),
                        (1,'departamentos_ver'),
                        (1,'departamentos_crear'),
                        (1,'departamentos_editar'),
                        (1,'departamentos_eliminar'),
                        (1,'informes_ampliados'),
                        (1,'informes_operadores'),
                        (1,'informes_usuarios'),
                        (1,'informes_widgets'),
                        (1,'operadores_crear'),
                        (1,'operadores_editar'),
                        (1,'operadores_eliminar'),
                        (1,'operadores_ver'),
                        (1,'perfiles_crear'),
                        (1,'perfiles_editar'),
                        (1,'perfiles_eliminar'),
                        (1,'perfiles_ver'),
                        (1,'prioridades_crear'),
                        (1,'prioridades_editar'),
                        (1,'prioridades_eliminar'),
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
insert into ticket_estado values (1,'Abierto','Para tickets nuevos o respondidos','#fd8f00','glyphicon-folder-open',0,null),
                                (2,'En Curso','Para cuando se está trabajando con el ticket','#f44f00','glyphicon-pushpin',0,null),
                                (3,'Cerrado','Cuando se finalizaron los trabajos relacionados.','#234f00','glyphicon-ok-sign',0,null);
/*!40000 ALTER TABLE `ticket_estado` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `categoria_anuncios` WRITE;
/*!40000 ALTER TABLE `categoria_anuncios` DISABLE KEYS */;
insert into categoria_anuncios values (1,'Pública','glyphicon-globe');
insert into categoria_anuncios values (2,'Privada','glyphicon-lock');
/*!40000 ALTER TABLE `categoria_anuncios` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
insert into empresa values (-1,'Comunicaciones Globales','Argentina','','','','','','2016-05-22 23:30');
insert into empresa values (1,'TMH Corporation','Argentina','','','','','http://tmh.com.ar','2016-05-22 23:30');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `prioridad` WRITE;
/*!40000 ALTER TABLE `prioridad` DISABLE KEYS */;
insert into prioridad values (1,'Urgente','Necesita atenderse ya','#fd0000',null),
                                (2,'Crítica','Prioridad crítica','#fd003d',null),
                                (3,'Alta','Prioridad alta','#fd5b00',null),
                                (4,'Media','Prioridad media','#fde400',null),
                                (5,'Baja','Prioridad baja','#234f00',null);
/*!40000 ALTER TABLE `prioridad` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `ticket_tipo` WRITE;
/*!40000 ALTER TABLE `ticket_tipo` DISABLE KEYS */;
insert into ticket_tipo values (1,'Tarea','Tarea a realizar','glyphicon-check'),
                                (2,'Consulta','Duda o consulta','glyphicon-bell'),
                                (3,'Problema','Tengo un problema','glyphicon-wrench');
/*!40000 ALTER TABLE `ticket_tipo` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
insert into usuario values (1,'mi nombre','mi apellido','$2y$12$6/1I/icTUyqYkRR3ICrv1OfsI.fBkXWnGEdtWPNNxqN/eQXcdhI8a','marianolopezsenes@gmail.com',null,'mi direccion','1875','Buenos Aires','5555-5555','adicional mail',1,'2016-05-23 12:30','2016-05-23 12:31',1,0);
insert into usuario values (2,'Brian','Ducca','$2y$12$6/1I/icTUyqYkRR3ICrv1OfsI.fBkXWnGEdtWPNNxqN/eQXcdhI8a','brian.ducca@gmail.com',null,'mi direccion','1875','Buenos Aires','5555-5555','adicional mail',1,'2016-05-23 12:30','2016-05-23 12:31',1,0);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `anuncio` WRITE;
/*!40000 ALTER TABLE `anuncio` DISABLE KEYS */;
insert into anuncio values (1,1,'Version Beta','<p>TMH en su version beta</p><p>Features Incluidos</p><ul><li>Manejo de Anuncios y Categoria de anuncios</li><li>Manejo de Usuarios</li><li>Manejo de Operadores</li><li>Creacion de Tickets</li></ul>','2016-05-22 22:30',1,null,1);
insert into anuncio values (2,2,'TMH CORP Avances','Funcionando Perfiles y Roles','2016-05-29 22:30',1,null,1);
insert into anuncio values (3,2,'TMH CORP Avances','Funcionando ABM Operadores','2016-04-27 22:30',1,null,1);
insert into anuncio values (4,2,'Lorem Ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','2016-05-30 10:30',1,null,1);
insert into anuncio values (5,1,'Arranque Proyecto TMH','TMH Nace','2016-03-17 18:30',1,null,1);
insert into anuncio values (6,1,'Novedades Proyecto','Finaliza la etapa de análisis y comienza el desarrollo','2016-04-12 18:30',1,null,1);
insert into anuncio values (7,1,'Novedades Proyecto','Primer MegaPack, ORM Funcionando','2016-05-19 18:30',1,null,1);
insert into anuncio values (8,1,'Novedades Proyecto','Segundo MegaPack','2016-05-29 18:30',1,null,1);
/*!40000 ALTER TABLE `anuncio` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `anuncios_empresa` WRITE;
/*!40000 ALTER TABLE `anuncios_empresa` DISABLE KEYS */;
insert into anuncios_empresa values (-1,1);
insert into anuncios_empresa values (1,2);
insert into anuncios_empresa values (1,3);
insert into anuncios_empresa values (1,4);
insert into anuncios_empresa values (-1,5);
insert into anuncios_empresa values (-1,6);
insert into anuncios_empresa values (-1,7);
insert into anuncios_empresa values (-1,8);
/*!40000 ALTER TABLE `anuncios_empresa` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `configuracion_global` WRITE;
/*!40000 ALTER TABLE `configuracion_global` DISABLE KEYS */;
insert into configuracion_global values ("mail_SMTPAuth","");
insert into configuracion_global values ("mail_SMTPSecure","");
insert into configuracion_global values ("mail_Host","");
insert into configuracion_global values ("mail_Port","");
insert into configuracion_global values ("mail_Username","");
insert into configuracion_global values ("mail_Password","");
insert into configuracion_global values ("mail_mail","");
insert into configuracion_global values ("mail_remitente","T.M.H.");
insert into configuracion_global values ("directorio_Uploads","");
insert into configuracion_global values ("extensiones_permitidas_imagenes",'["jpg","png","gif","TIF"]');
insert into configuracion_global values ("extensiones_permitidas_archivos",'["jpg","png","gif","TIF","doc","pdf","docx","csv","xls","XLSX","rar","ZIP","bz","gz"]');
insert into configuracion_global values ("ordenamiento_mensajes",'DESC'); /*o ASC*/
insert into configuracion_global values ("empresa_nombre","Three Monkey Heads");
insert into configuracion_global values ("empresa_titulo","T.M.H.");
insert into configuracion_global values ("empresa_ruta_base","/home/ubuntu/workspace");
insert into configuracion_global values ("empresa_url_ssl","https://ide.c9.io/lkdml/t-m-h");
insert into configuracion_global values ("empresa_url","http://ide.c9.io/lkdml/t-m-h");
insert into configuracion_global values ("empresa_SSL_front",0);
insert into configuracion_global values ("empresa_SSL_back",0);
insert into configuracion_global values ("empresa_logo","iconologo.png");
insert into configuracion_global values ("empresa_favicom","favicon.ico");
insert into configuracion_global values ("usuarios_permitirRegistro",0);
insert into configuracion_global values ("","");
insert into configuracion_global values ("","");
insert into configuracion_global values ("","");

/*insert into configuracion_global values ("","");*/
/*!40000 ALTER TABLE `configuracion_global` ENABLE KEYS */;
UNLOCK TABLES;
