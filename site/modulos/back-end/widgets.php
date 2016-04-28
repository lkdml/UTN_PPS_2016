<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 

use \CORE\Controlador\Aplicacion;
Aplicacion::startSession(true);


//      \CORE\Controlador\Aplicacion::starSession();
    //require_once(CORE\Config::getPublic('CORE').'singleton.class.php');
    //require(\CORE\Config::getPublic('CORE').'aplicacion.class.php');
    //session_start();
 /**       if (!($_SESSION["autenticado"]==true)) {
            $ejecutandoAPP = false;
            session_destroy();
            header("location:login.php");
        }*/


    switch  (strtolower($_GET['datosAjax'])){
        case strtolower('W-TiempoEstimadoVs'):
            $result = '{
                          "labels": ["<1 Hora", "1-3 Horas", "3-6 Horas", "6-12 Horas", "12-24 Horas", "+24 Horas"],
                          "datasets": [
                            {
                              "label": "Respuesta Mes Actual",
                              "fillColor": "rgba(60,141,188,0.9)",
                              "strokeColor": "rgba(60,141,188,0.8)",
                              "pointColor": "#3b8bba",
                              "pointStrokeColor": "rgba(60,141,188,1)",
                              "pointHighlightFill": "#fff",
                              "pointHighlightStroke": "rgba(60,141,188,1)",
                              "data": [40, 20, 30, 20, 20, 20]
                            }
                          ]
                        }';
            die(($result));
            break;
        case strtolower('W-estdosTicket'):
                    $result = '[
                              {
                                "value": 700,
                                "color": "#f56954",
                                "highlight": "#f56954",
                                "label": "Abierto"
                              },
                              {
                                "value": 500,
                                "color": "#00c0ef",
                                "highlight": "#00c0ef",
                                "label": "En curso"
                              },
                              {
                                "value": 400,
                                "color": "#f39c12",
                                "highlight": "#f39c12",
                                "label": "Respondido"
                              },
                              {
                                "value": 600,
                                "color": "#00a65a",
                                "highlight": "#00a65a",
                                "label": "Cerrado"
                              }
                            ]';
            die(($result));
            break;
        case strtolower('w-tiempo-vs-tiempo'):
            $result = '{
                  "labels": ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
                  "datasets": [
                    {
                      "label": "Tiempo Estimado",
                      "fillColor": "rgba(210, 214, 222, 1)",
                      "strokeColor": "rgba(210, 214, 222, 1)",
                      "pointColor": "rgba(210, 214, 222, 1)",
                      "pointStrokeColor": "#c1c7d1",
                      "pointHighlightFill": "#fff",
                      "pointHighlightStroke": "rgba(220,220,220,1)",
                      "data": [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                      "label": "Tiempo Real",
                      "fillColor": "rgba(60,141,188,0.9)",
                      "strokeColor": "rgba(60,141,188,0.8)",
                      "pointColor": "#3b8bba",
                      "pointStrokeColor": "rgba(60,141,188,1)",
                      "pointHighlightFill": "#fff",
                      "pointHighlightStroke": "rgba(60,141,188,1)",
                      "data": [28, 48, 40, 19, 86, 27, 90]
                    }
                  ]
                }';
            die(($result));
            break;
        case strtolower('w-TicketXPrioridad'):
                $result = '{
                            "labels": ["Baja", "Media", "Alta", "Crítica", "Urgente"],
                            "datasets": [
                                {
                                    "label": "My First dataset",
                                    "fillColor": "rgba(220,220,220,0.2)",
                                    "strokeColor": "rgba(220,220,220,1)",
                                    "pointColor": "rgba(220,220,220,1)",
                                    "pointStrokeColor": "#fff",
                                    "pointHighlightFill": "#fff",
                                    "pointHighlightStroke": "rgba(220,220,220,1)",
                                    "data": [40,20,10,30,15]
                                }
                                    ]
                                    }';
            die(($result));
            break;

    }



?>