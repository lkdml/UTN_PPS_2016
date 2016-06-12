cargarRadarChart();
  function cargarRadarChart(){
   $.ajax({
        url:'operador.php?modulo=widgets',
        type:'GET',
        datatype:'JSON',
        data:{datosAjax:'w-TicketXPrioridad'},
        success: function (response){
                     //----------------
                    //RADAR CHART
                    //----------------
                    var radarChartCanvas = $("#radarChart").get(0).getContext("2d");
                    var radarChart = new Chart(radarChartCanvas);
                    var radardata = $.parseJSON(response);
                   
                    var radarChartOptions = 
                            //Options
                            {
                            //Boolean - Whether to show lines for each scale point
                            scaleShowLine : true,
                            //Boolean - Whether we show the angle lines out of the radar
                            angleShowLineOut : true,
                            //Boolean - Whether to show labels on the scale
                            scaleShowLabels : false,
                            // Boolean - Whether the scale should begin at zero
                            scaleBeginAtZero : true,
                            //String - Colour of the angle line
                            angleLineColor : "rgba(0,0,0,.1)",
                            //Number - Pixel width of the angle line
                            angleLineWidth : 1,
                            //String - Point label font declaration
                            pointLabelFontFamily : "'Arial'",
                            //String - Point label font weight
                            pointLabelFontStyle : "normal",
                            //Number - Point label font size in pixels
                            pointLabelFontSize : 10,
                            //String - Point label font colour
                            pointLabelFontColor : "#666",
                            //Boolean - Whether to show a dot for each point
                            pointDot : true,
                            //Number - Radius of each point dot in pixels
                            pointDotRadius : 3,
                            //Number - Pixel width of point dot stroke
                            pointDotStrokeWidth : 1,
                            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                            pointHitDetectionRadius : 20,
                            //Boolean - Whether to show a stroke for datasets
                            datasetStroke : true,
                            //Number - Pixel width of dataset stroke
                            datasetStrokeWidth : 2,
                            //Boolean - Whether to fill the dataset with a colour
                            datasetFill : true,
                            responsive: true,
                            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                            //String - A legend template
                            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
                              
                            };
                            
                    radarChartOptions.datasetFill = false;
                    radarChart.Radar(radardata, radarChartOptions);

                
                        }
                    })
  }
setInterval(function() {
  cargarRadarChart();  
},120000);