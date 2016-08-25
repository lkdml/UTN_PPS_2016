{include file="header.tpl"
css=''
js='' 
}
{include file="panelLateral.tpl"}

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <strong>Usuario {$Usuario->getNombre()|upper} {$Usuario->getApellido()|upper}</strong>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Usuarios > Ver Actividad</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-info">
            <div class="box-body pad">
                <table id="jqGrid"></table>
                <div id="jqGridPager"></div>
            </div>
            <div class="box-body pad">
                <table id="jqGridDetalle"></table>
                <div id="jqGridPagerDetalle"></div>
            </div>
        </div>
    </section>
</div>


<link rel="stylesheet" href="{$rutaCSS}jquery-ui.css">   
<link rel="stylesheet" href="./modulos/back-end/css/ui.jqgrid.css">   

<script src="{$rutaJS}jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{$rutaJS}bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{$rutaJS}fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{$rutaJS}app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{$rutaJS}demo.js"></script>
<!-- No enter for submitting v1.0 -->
<script src="{$rutaJS}noEnter.js"></script>
<!-- Grid -->
<script src="{$rutaJS}jquery-ui.js"></script>
<script src="{$rutaJS}/i18n/grid.locale-es.js"></script>
<script src="{$rutaJS}jquery.jqGrid.min.js"></script>

{literal} <script>

$(document).ready(function () {

			var id="{/literal}{$Usuario->getUsuarioId()}{literal}";
			var ruta="{/literal}{$rutaCSS}../controlador/logTicketAction.php{literal}";
            $("#jqGrid").jqGrid({
                url: ruta+'?accion=datosUsuario&usuarioId='+id,
                datatype: 'json',
                colModel: [
                    { name: 'Nº Ticket', width: 75, align: 'center'},
                    { name: 'Tipo de Ticket', width: 100 },
                    { name: 'Estado', width: 100 },
                    { name: 'Asunto', width: 150 },
                    { name: 'UltimaActividad', width: 150 }
                ],
                rowNum:10,
               	rowList:[10,20,30],
               	pager: '#jqGridPager',
               	sortname: 'id',
               	height:'auto',
               	autowidth: true,
               	shrinkToFit: true,
                viewrecords: true,
                sortorder: "desc",
                caption:"Detalle Actividad",
                multiselect: false,
            	onSelectRow: function(ids) {
                		if(ids == null) {
                			ids=0;
                			if(jQuery("#jqGridDetalle").jqGrid('getGridParam','records') >0 )
                			{
                				jQuery("#jqGridDetalle").jqGrid('setGridParam',{url:ruta+'?accion=datosticket&ticketId='+ids,page:1});
                				jQuery("#jqGridDetalle").jqGrid('setCaption',"Detalle Ticket: "+$('#jqGrid').jqGrid('getCell',ids,'Nº Ticket'))
                				.trigger('reloadGrid');
                			}
                		} else {
                			jQuery("#jqGridDetalle").jqGrid('setGridParam',{url:ruta+'?accion=datosticket&ticketId='+ids,page:1});
                			jQuery("#jqGridDetalle").jqGrid('setCaption',"Detalle Ticket: "+$('#jqGrid').jqGrid('getCell',ids,'Nº Ticket'))
                			.trigger('reloadGrid');			
                		}
                	}
                
            });
            jQuery("#jqGrid").jqGrid('navGrid','#jqGridPager',{edit:false,add:false,del:false,search:false});


            //Grilla detalle
            jQuery("#jqGridDetalle").jqGrid({
            	height: 100,
               	url:ruta+'?accion=datosticket&ticketId=0',
            	datatype: "json",
               	colModel:[
               		{name:'Fecha', width:55},
               		{name:'Responsable', width:100},
               		{name:'Accion', width:180},
               		
               	],
               	rowNum:5,
               	rowList:[5,10,20],
               	pager: '#jqGridPagerDetalle',
               	sortname: 'Fecha',
                viewrecords: true,
                autowidth: true,
               	shrinkToFit: true,
                sortorder: "asc",
            	multiselect: false,
            	caption:"Detalle Ticket"
            }).navGrid('#jqGridPagerDetalle',{add:false,edit:false,del:false,search:false});
            

    });


</script>
{/literal}

{include file='footer.tpl'}