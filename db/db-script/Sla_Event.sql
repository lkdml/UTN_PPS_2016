Use tmh;

DELIMITER $$
DROP PROCEDURE IF EXISTS Sla_Worker$$

CREATE PROCEDURE Sla_Worker()
BEGIN
        DECLARE cursor_SLA_ID INT;
        DECLARE cursor_Depto_ID_Origen INT;
        DECLARE cursor_Estado_ID_Origen INT;
        DECLARE cursor_Prioridad_ID_Origen INT;
        DECLARE cursor_Tipo_Ticket_ID_Origen INT;
        DECLARE cursor_Condicion_Hora INT;

        DECLARE cursor_Depto_ID_Accion INT;
        DECLARE cursor_Estado_ID_Accion INT;
        DECLARE cursor_Prioridad_ID_Accion INT;
        DECLARE cursor_Operador_ID_Accion INT;
        
        DECLARE done INT DEFAULT FALSE;
        DECLARE cursor_SLA CURSOR FOR SELECT sla_id
                                            ,departamento_origen
                                            ,estado_origen
                                            ,prioridad_origen
                                            ,tipo_ticket_origen 
                                            ,condicion_hora
                                            ,accion_departamento
                                            ,accion_prioridad
                                            ,accion_estado
                                            ,accion_operador_asignado
                                            FROM sla where estado=1;
        DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
        

        OPEN cursor_SLA;
        read_loop_SLA: LOOP
        FETCH cursor_SLA INTO cursor_SLA_ID
                            ,cursor_Depto_ID_Origen
                            ,cursor_Estado_ID_Origen
                            ,cursor_Prioridad_ID_Origen
                            ,cursor_Tipo_Ticket_ID_Origen
                            ,cursor_Condicion_Hora
                            ,cursor_Depto_ID_Accion
                            ,cursor_Estado_ID_Accion
                            ,cursor_Prioridad_ID_Accion
                            ,cursor_Operador_ID_Accion;
        IF done THEN
          LEAVE read_loop_SLA;
        END IF;
        
            BLOCK2: BEGIN
            
            DECLARE cursor_ticket_ID INT;
            DECLARE cursor_ticket_estado_ID INT;
            DECLARE cursor_ticket_Prioridad_ID INT;
            DECLARE cursor_ticket_Departamento_ID INT;
            DECLARE cursor_ticket_tipo_ticket_id INT;
            DECLARE cursor_ticket_operador_id INT;
            DECLARE cursor_ticket_fecha_creacion DATETIME;
            
            DECLARE done_ticket INT DEFAULT FALSE;
            DECLARE cursor_Ticket CURSOR FOR SELECT ticket_id
                                                ,estado_id
                                                ,prioridad_id
                                                ,departamento_id
                                                ,tipo_ticket_id 
                                                ,operador_id
                                                ,fecha_creacion
                                                FROM ticket;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done_ticket = TRUE;
            
            OPEN cursor_Ticket;
            read_loop_Ticket: LOOP
                FETCH cursor_SLA INTO cursor_ticket_ID
                            ,cursor_ticket_estado_ID
                            ,cursor_ticket_Prioridad_ID
                            ,cursor_ticket_Departamento_ID
                            ,cursor_ticket_tipo_ticket_id
                            ,cursor_ticket_fecha_creacion;
                IF done_ticket THEN
                  LEAVE read_loop_Ticket;
                END IF;
                
                IF((cursor_Depto_ID_Origen=cursor_ticket_Departamento_ID or cursor_Depto_ID_Origen is null)and
                    (cursor_Estado_ID_Origen=cursor_ticket_estado_ID or cursor_Estado_ID_Origen is null)and
                    (cursor_Prioridad_ID_Origen=cursor_ticket_Prioridad_ID or cursor_Prioridad_ID_Origen is null)and
                    (cursor_Tipo_Ticket_ID_Origen=cursor_ticket_tipo_ticket_id or cursor_Tipo_Ticket_ID_Origen is null)and
                    (select dateadd(HOUR,cursor_Condicion_Hora, cursor_ticket_fecha_creacion)>= GETDATE())
                ) THEN
                     Update ticket 
                        set 
                            operador_id=case when(cursor_Operador_ID_Accion is not null) then cursor_Operador_ID_Accion else cursor_ticket_operador_id end
                            ,estado_id=case when(cursor_Estado_ID_Accion is not null) then cursor_Estado_ID_Accion else cursor_ticket_estado_ID end
                            ,departamento_id=case when(cursor_Depto_ID_Accion is not null) then cursor_Depto_ID_Accion else cursor_ticket_Departamento_ID end
                            ,prioridad_id=case when(cursor_Prioridad_ID_Accion is not null) then cursor_Prioridad_ID_Accion else cursor_ticket_Prioridad_ID end
                        where ticket_id=cursor_ticket_ID;
                        
                    
                END IF;
                
            END LOOP;
            CLOSE cursor_Ticket;
            END BLOCK2;
        END LOOP;
        CLOSE cursor_SLA;
END$$
DELIMITER ;

CREATE EVENT IF NOT EXISTS SLA_Worker
    ON SCHEDULE EVERY 10 MINUTE
    DO
        CALL Sla_Worker();     