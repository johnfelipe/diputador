<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Acceso a empresas | Casamentoclick</title>
<meta name="title" content="" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="Miguel Delgado Fern�ndez, Enrique Torras de Ugarte, Gabriel Aylagas Rivas, Jorge Fosela �guila, Mario Cazorla Salda�a, Nicolas Ten�s Pita, Alvaro Prudencio" />
<meta name="robots" content="all" />
<meta http-equiv="Content-Language" content="" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="http://media.bodaclick.com/favicon.ico" />
<link rel="stylesheet" type="text/css" href="http://svillegas.bodaclick.com/css/stylesheet_screen.php?&moll=&accesoNovios=&accesoInvitados=&informacionLB=&album=&foros=&idForo=&idTema=&idMensaje=&reportaje=&listaInvitados=&colocadorMesas=&listaTareas=&areaPersonal=1&presupuestador=&escaparate=" media="screen"/>
<link rel="stylesheet" type="text/css" href="http://svillegas.bodaclick.com/css/stylesheet_print.php" media="print"/>
<link rel="stylesheet" type="text/css" href="http://svillegas.bodaclick.com/css/buscador.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="http://svillegas.bodaclick.com/css/forms.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="http://svillegas.bodaclick.com/css/estilo01.css" media="screen"/>

<link rel="stylesheet" type="text/css" href="http://svillegas.bodaclick.com/css/extjs/ext-all.css">

<!-- Estilos -->
<style type='text/css'>
@import url("http://svillegas.bodaclick.com/empresas/css/principal.css");
@import url("http://svillegas.bodaclick.com/empresas/css/jquery.richtext.css");
</style>

<!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://svillegas.bodaclick.com/css/commons-ie6.css"/>
  <script type="text/javascript" src="http://svillegas.bodaclick.com/js/supersleight.js"></script>
<![endif]-->
<!-- Estilos espec�ficos para IE6 -->
<!--[if lte IE 7]>
	<link rel="stylesheet" href="http://svillegas.bodaclick.com/css/ie65_general.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="http://svillegas.bodaclick.com/css/fecha/ie65_fecha.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="http://svillegas.bodaclick.com/css/jquery.tabs-ie.css" type="text/css" media="projection, screen">
<![endif]-->
<script type="text/javascript" src="http://svillegas.bodaclick.com/js/jquery/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="http://svillegas.bodaclick.com/js/jquery/colorpicker.js"></script>
<script type="text/javascript" src="http://svillegas.bodaclick.com/js/jquery/jquery.alerts.js"></script>
<script type="text/javascript" src="http://svillegas.bodaclick.com/js/jquery/elements.js"></script>
<script type="text/javascript" src="http://svillegas.bodaclick.com/js/jquery/jquery.richtext.js"></script>
         
<!--
<script src="http://svillegas.bodaclick.com/js/extjs/ext-base.js" type="text/javascript"></script>
<script src="http://svillegas.bodaclick.com/js/extjs/ext-all-debug.js" type="text/javascript"></script>
<script src="http://svillegas.bodaclick.com/js/dinamica.js" type="text/javascript"></script>
-->


</head>
	<body>
	<div id='cabecera'>
		<div class="cabtop"></div>
<div class="cabcon">
	<span id="logocasamentoclick"><a href='http://svillegas.bodaclick.com/' title='Casamentoclick'>Casamentoclick</a></span>
	<div class="tituloArea">�rea Empresas</div>
	<div class="clear"></div>
	<div id="menu_empresas">
		<div class="opcion_menu"><a href="index.html">Inicio</a></div>
		<div class="opcion_menu"><a href="index.html?id_escaparate=21467&preview=1">Mi contrato</a></div>
		<div class="opcion_menu"><a href="index.html?solicitudes_empresas=1&id_escaparate=21467">Solicitudes</a></div>
					<div class="opcion_menu"><a href="index.html?subastas=1&id_escaparate=21467">Oportunidades de negocio</a></div>
				<div class="opcion_menu"><a href="index.html?estadisticas=1&id_escaparate=21467">Estad�sticas</a></div>
			<!--<div class="opcion_menu"><a href="index.html?visitas=1&id_escaparate=21467">Visitas</a></div>-->
		<div class="clear"></div>
	</div>
<!-- Fin de .cabcon -->
</div>
	</div>
	<!-- Fin de #cabecera -->
	<hr class="hide"/>
	<div id="tapiz">
	  <div id="tapizsombra">
	  	<div id="tapizinterior">
							<a name='rutaNavegacion'></a><!--Ancla cuando un formulario no se rellena correctamente-->
			<div id="ruta">
				<div style="float:left;">
					<b>
					<span class="estas">Est�s en:</span>&nbsp;
					<a href="index.html"><span class="final">Inicio</span></a> | Bienvenido					</b>
				</div>
				<div style="float:right;"><b><span class="logado" id="usuario_logado"><span class="gris">Hola, Micheel Fabre</span> <a href="index.html?id_escaparate=21467&preview=1">[Mi contrato]</a> <a href="logout.php">[Salir]</a></span></b></div>
				<div style="clear:both"></div>
			</div>
			<h1 class="titular2"><b>Bienvenido</b></h1>
			<div class="clear"></div>
	<br>(SELECT
                    'contacto' as tipoRegistro,
                    cfm.Id AS Id,
                    cfm.fecha, 
                    '' idreserva,
                    cfm.interesante, 
                    cfm.contactado, 
                    cfm.contratado, 
                    cfm.tipo, 
                    cfm.numSolicitud, 
                    cfm.uniId, 
                    cfm.observaciones,
                    cfm.escaparate_id id_escaparate, 
                    cfm.novio_id, 
                    '' estadoAE,
                    '' id_formulario,
                    '' id_subasta,
                    n.*
            FROM
                    bodamoll.b_clickformore cfm,
                    boda.NOVIO n
            WHERE
                    cfm.novio_id = n.novio_id
            AND cfm.novio_id NOT IN(
                    30690,29761,85575,87289,94738,187602,201222,203360,215205,282286,297621,328000,695016,840164
            )
            AND cfm.tipo != 'reserva'
            AND cfm.escaparate_id = '21467'
            ORDER BY
                    cfm.fecha DESC) UNION (SELECT
                    'reserva' as tipoRegistro,
                    r.ID Id,
                    r.FECHA fecha,
                    r.idreserva,
                    r.interesante,
                    r.contactado,
                    r.contratado,
                    '' as tipo,
                    '' as numSolicitud,
                    '' as uniId,
                    r.observaciones,
                    r.ID_ESCAPARATE id_escaparate,
                    r.ID_NOVIO novio_id,
                    r.estadoAE,
                    r.id_formulario,
                    r.id_subasta,
                    n.*
            FROM
                    bodamoll.b_reservas r,
                    boda.NOVIO n,
                    bodamoll.b_escaparates e
                    
            WHERE
                    r.ID_ESCAPARATE = '21467'
                    AND r.ID_ESCAPARATE = e.id
                    AND n.novio_id = r.ID_NOVIO
                    AND r.estado NOT IN(7, 8)
                    AND r.estadoAE <> "eliminado"
                    ORDER BY
                    r.FECHA DESC) order by fecha desc<br><br>
<div id="mod100">
	<div class="contmodulo ultimo">
    <div class="herramientas"> 
      <a href="#" class="bt-imprimir" onclick="window.print(); return false;">Imprimir</a>
      <a href="#" id="descargar1" class="bt-descargar" onclick="descargar('Aviso##Usted ha elegido descargar un informe que contiene todas las reservas de sus escaparates.<br>Al presionar descargar se almacenar� en su disco duro un fichero que podr� visualizar con la aplicaci�n Excel de Microsoft Office##Generando fichero, por favor, espere...##Generando...##Descarga completa##S�##No'); return false;">Descargar</a>
      <!--<a href="#" id="descargar1" class="bt-descargar" onclick="Ext.MessageBox.buttonText.yes = 'S�'; Ext.MessageBox.buttonText.no = 'No'; Ext.Msg.confirm('Aviso','Usted ha elegido descargar un informe que contiene todas las reservas de sus escaparates.<br>Al presionar descargar se almacenar� en su disco duro un fichero que podr� visualizar con la aplicaci�n Excel de Microsoft Office',descargar);  return false;">Descargar</a>-->
      <!--<input type="button" class="bt033" value="Descargar BBDD contactos" onclick="descargar('Aviso##Usted ha elegido descargar un informe que contiene todas las reservas de sus escaparates.<br>Al presionar descargar se almacenar� en su disco duro un fichero que podr� visualizar con la aplicaci�n Excel de Microsoft Office##Generando fichero, por favor, espere...##Generando...##Descarga completa##S�##No'); return false;">-->
			<!--<input type="button" class="bt033" value="Descargar BBDD contactos" onclick="Ext.MessageBox.buttonText.yes = 'S�'; Ext.MessageBox.buttonText.no = 'No'; Ext.Msg.confirm('Aviso','Usted ha elegido descargar un informe que contiene todas las reservas de sus escaparates.<br>Al presionar descargar se almacenar� en su disco duro un fichero que podr� visualizar con la aplicaci�n Excel de Microsoft Office',descargar);  return false;">-->
              <span id="descargar2"></span>
    </div>
  	<div class="clear"></div>
		<div class="solicitudesOnLine">
      <div class="botonesVerPor">
				
	<input type="button" class="ui-boton-bd ui-corner-all" value="Ver eliminadas" onclick="location.href='http://svillegas.bodaclick.com/empresas/?solicitudes_empresas=1&id_escaparate=21467&eliminadas=si'">
	      </div>
			<form name="filtrar_por_pm">
      <h3 class="titular3 pendientesBoda">
				Solicitudes totales <span id="total_principal">46</span> <span class="titular3 pendientesBoda">(0 pendientes)</span> &nbsp; 
				<select name="tipo_pm" class="miselect ui-corner-all" onChange="location.href='http://svillegas.bodaclick.com/empresas/?unificado=1&id_escaparate=21467&tipo_res='+document.filtrar_por_pm.tipo_res.options[document.filtrar_por_pm.tipo_res.selectedIndex].value+'&tipo_pm='+document.filtrar_por_pm.tipo_pm.options[document.filtrar_por_pm.tipo_pm.selectedIndex].value">
					<option value="">Todas</option>
					<option value="sup_pm"  >Superior PM</option>
					<option value="inf_pm"  >Inferior PM</option>
					<option value="sin_pm"  >Sin PM</option>
				</select>
                                <select name="tipo_res" class="miselect ui-corner-all" onChange="location.href='http://svillegas.bodaclick.com/empresas/?unificado=1&id_escaparate=21467&tipo_res='+document.filtrar_por_pm.tipo_res.options[document.filtrar_por_pm.tipo_res.selectedIndex].value+'&tipo_pm='+document.filtrar_por_pm.tipo_pm.options[document.filtrar_por_pm.tipo_pm.selectedIndex].value">
					<option value="">Todas</option>
					<option value="reservas"  >Resevas</option>
					<option value="contactos"  >Contactos</option>
				</select>
			</h3>
			</form>
		</div>
	  <br>
		
<!--
    <div style="padding: 4px 10px; background: rgb(215, 215, 215) none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; height: 100%; margin-bottom: 1px;">
    	<form id="form_buscar_empresa" name="form_buscar_empresa">
        Buscar por empresa	<input class="box long3" name="empresa_filtro" accept="true" alert_msg="Nombre empresa" type="text">
        <input style="cursor: pointer;" class="bt02Linea" value="buscar" type="submit">
      </form>
    </div>
-->
    <div style="padding: 4px 10px; background: rgb(215, 215, 215) none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; height: 100%;">
    	<form id="form_filtrar_unificado" name="form_filtrar_unificado">
      	<input name="id_escaparate" type="hidden" value="21467" >
        <input name="eliminadas" type="hidden" value="">
        <input name="resultados_por_pagina" value="25" type="hidden">
        Mostrar lista:&nbsp;&nbsp;&nbsp;<strong>Fecha</strong>
        <!--<input name="tipo_procedencia" value="" type="hidden">-->
        <select name="tipo_fecha" class="miselect ui-corner-all">
          <option value="fecha_reserva">de solicitud</option>
          <option value="fecha_boda">de boda</option>
        </select>
        desde&nbsp;
        <input class="box ui-corner-all" onclick='this.value=""' name="fecha_inicio" value="dd/mm/yyyy" id="fecha" type="text">
        <img onclick="GETFECHA('fecha',event)" class="linkfecha" src="http://www.eventoclick.com/img/img-calendario.gif">&nbsp;
        hasta&nbsp;
        <input class="box ui-corner-all" onclick='this.value=""' name="fecha_fin" value="dd/mm/yyyy" id="fecha02" type="text">
        <img onclick="GETFECHA('fecha02',event)" class="linkfecha" src="http://www.eventoclick.com/img/img-calendario.gif">&nbsp;&nbsp;
        marcadas como 
				<select name="marcada_como" class="miselect ui-corner-all">
	        <option value="todos">Todos</option>
          <option value="interesante">Interesante</option>
          <option value="contactado">Contactado</option>
          <option value="contratado">Contratado</option>
          <option value="no_leida"  >No le�da</option>
          <option value="leida">Le�da</option>
  	      
		 
		 <option value="normal">Solicitud normal</option><option value="subasta">Oportunidades de negocio</option>        </select>&nbsp;&nbsp;
         <br />
                                
        Nombre: <input type="text" name="nombre" id="nombre" />
        Apellidos: <input type="text" name="apellidos" id="apellidos" />
        <input style="cursor: pointer;" class="ui-boton-bd ui-corner-all" value="Filtrar" type="submit" />
<!--				
        <div style="padding: 4px 3px 4px 72px;">
          <strong>Nombre usuario</strong>&nbsp;&nbsp;<input class="box" style="width: 150px;" name="nombre_usuario" type="text">&nbsp;&nbsp;
          <strong>Empresa</strong>&nbsp;&nbsp;<input class="box" style="width: 150px;" name="empresa" type="text">&nbsp;&nbsp;
          <input style="cursor: pointer;" class="bt02Linea" value="filtrar" type="submit"> 
        </div>
-->				
      </form>          
    </div>
    <div style="padding: 4px 10px; margin: 1px 0 0 0; background: rgb(215, 215, 215) none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; height: 100%;">
	    <p>
				<b>Su tiempo medio de respuesta:</b> <span class='rosa'>67h. 20m. 59s.</span><br /><b>Tiempo medio de respuesta en <span class='rosa'>Ofertas Especiales</span> (M�xico DF y Alrededores):</b> <span class='rosa'>49h. 12m. 49s.</span><br /><b>Tiempo medio de respuesta en <span class='rosa'>Ofertas Especiales</span> (Nacional):</b> <span class='rosa'>55h. 13m. 43s.</span><br /><b>Tiempo medio de respuesta en <span class='rosa'>Peinados y Maquillaje para novias</span> (Nacional):</b> <span class='rosa'>56h. 00m. 14s.</span><br /><b>Tiempo medio de respuesta en <span class='rosa'>Peinados y Maquillaje para novias</span> (M�xico DF y Alrededores):</b> <span class='rosa'>62h. 07m. 36s.</span><br />				
				<br/>
				<input type="button" id="ver_mas" class="ui-boton-bd ui-corner-all" style="display:block;" onclick="$('div#mastiempos').slideDown('fast'); $(this).hide(); mostrar_estadisticas_servicio(21467)" value="Ver m�s">
				<input type="button" id="ver_mas2" class="ui-boton-bd ui-corner-all" style="display:none;" onclick="$('div#mastiempos').slideDown('fast'); $(this).hide();" value="Ver m�s">
      </p>
      <div id="mastiempos" style="display:none">
				<input type="button" class="ui-boton-bd ui-corner-all" onclick="$('div#mastiempos').slideUp('fast'); $('input#ver_mas2').show();" value="Ocultar">
			</div>
			<br />
  	</div>
  	<div class="clear"></div>
		<table width="100%">
			<tr>
				<td class="resultados" width="53%">Resultados del <span id="inicio_2">1</span> - <span id="total_2">
				25				</span> de <span id="total_1">46</span></td>
				<td id="tip_no_leida" align='right' onmouseover="new Ext.ToolTip({target: 'tip_no_leida', style:'width:100px', trackMouse:true, title:'No leida', html: 'Solicitud no leida'});" style="padding: 5px; font-size: 12px; cursor: pointer;"><span style="border: 1px solid rgb(170, 170, 170); background: rgb(255, 227, 223) none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;No le�da</td>
				<td id="tip_normal" align='right' onmouseover="new Ext.ToolTip({target: 'tip_normal', style:'width:100px', trackMouse:true, title:'Normal', html: 'Solicitud normal'});" style="padding: 5px; font-size: 12px; cursor: pointer;"><span style="font:bold 22px Arial; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none;">N</span>&nbsp;Normal</td>
				
				<td>&nbsp;</td>				<!--
				<td id="tip_normal" onmouseover="new Ext.ToolTip({target: 'tip_normal', style:'width:100px', trackMouse:true, title:'Normal', html: 'Solicitud normal'});" style="padding: 5px; font-size: 12px; cursor: pointer;"><span style="font-family: Arial; font-style: normal; font-variant: normal; font-weight: bold; font-size: 22px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none;">N</span>&nbsp;Normal</td>
				<td id="tip_pasada" onmouseover="new Ext.ToolTip({target: 'tip_pasada', style:'width:100px', trackMouse:true, title:'Pasada a subasta', html: 'Solicitud normal pasada a subasta'});" style="padding: 5px; font-size: 12px; cursor: pointer;"><span style="font-family: Arial; font-style: normal; font-variant: normal; font-weight: bold; font-size: 22px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none; color: rgb(255, 0, 0);"><strike>N</strike></span>&nbsp;Pasada a subasta</td>
				<td id="tip_subasta" onmouseover="new Ext.ToolTip({target: 'tip_subasta', style:'width:100px', trackMouse:true, title:'Procedente de subasta', html: 'Solicitud procedente de subasta'});" style="padding: 5px; font-size: 12px; cursor: pointer;"><span style="font-family: Arial; font-style: normal; font-variant: normal; font-weight: bold; font-size: 22px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none;">S</span>&nbsp;Procedente de subasta</td>
				-->
			</tr>
		</table>
<div id="listado_solicitudes">
			<form name="form_listado_solicitudes">
				<table class="tabla" cellpadding="0" cellspacing="0">
					<tr>
						<th><b>Solicitud</b></th>
						<th><b>Nombre</b></th>
						<th><b>Tipo</b></th>
                        <th><b>D�a de la Semana</b></th>
						<th><b>Boda</b></th>
						<th><b>Comentarios</b></th>
						<th colspan="2" class="ultimo"><b>Opciones</b></th>
					</tr>
                        <tr id="registro_" class="non" align="left">
                                <td width="70" align="center">
                                        <a href="#" onclick='ver_solicitud(,0,"1",21467); return false;'><span class="rosa">24/12/2011, 02:39:57<!-- Hora GMT de la reserva: --></span></a><br><br>
                                        <p><b>Id:</b> <span class="rosa">38</span></p>
                                        <p></p>
                                        <!--<input onclick='ver_solicitud(504723,0); return false;' type='button' class='btn-redondo' value='ver solicitud'>-->
                                </td>
                                <td width="160">
                                        <a href="#" onclick='ver_solicitud(,0,"1",21467); return false;'>
                                        <span class="dest">
                                                Aaron  Rosenstein<br>
                                                Diana Sheinberg<br>
                                                Tel�fono: 5552808406<br>Movil:  <br>
                                        </span>
                                        </a>
                                </td>
                                <td width="20" align="center"><span style="font:bold 22px Arial; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none;">N</span></td>
                                <td width="100" align="center">
        S�bado        </td>

        <td width="100" align="center">
                                        <input style="text-align:center" name="fecha_boda_" class="box ui-corner-all" value="18/08/2012" type="text"><br><br>
                                        <input type="button" class="ui-boton-bd ui-corner-all" onclick="modificar_fecha_boda(,1182874); return false;" value="Modificar"><br><br>
                                        <span id="f_bd_" style="display: none;">Guardado OK<br></span>
                                </td>
                                <td width="190" align="center">
                                        <textarea class="ui-corner-all" name="observaciones_proveedor_"></textarea><br><br>
                                        <input type='button' class="ui-boton-bd ui-corner-all" onclick="guardar_obs_prov(); return false;" value='Guardar'><br>
                                        <span id="obs_prov_" style="display: none;">Guardado OK<br></span>
                                </td>
                                <td class="ultimo" align="left" style="padding:20px 4px;">
                                        <p class="iconos">
                                                        <a href="#" style="display:none" id="marcador1_on_" class="ico-favoritosactivo" title='interesante' style='cursor:pointer' onclick='marcar_solicitud(1,,"El icono <b>contratado</b> no puede estar marcado si el icono <b>contactado</b> no lo est�."); return false;'></a><span id="marcador12_on_" style="display:none">Interesante</span>
									<a href="#" style="display:block" id="marcador1_off_" class="ico-favoritos" title='interesante' style='cursor:pointer' onclick='marcar_solicitud(1,,"El icono <b>contratado</b> no puede estar marcado si el icono <b>contactado</b> no lo est�."); return false;'></a><span id="marcador12_off_" style="display:block">Interesante</span><br>
									<a href="#" style="display:none" id="marcador2_on_" class="ico-hablaractivo" title='contactado' style='cursor:pointer' onclick='marcar_solicitud(2,,"El icono <b>contratado</b> no puede estar marcado si el icono <b>contactado</b> no lo est�."); return false;'></a><span id="marcador22_on_" style="display:none">Contactado</span>
									<a href="#" style="display:block" id="marcador2_off_" class="ico-hablar" title='contactado' style='cursor:pointer' onclick='marcar_solicitud(2,,"El icono <b>contratado</b> no puede estar marcado si el icono <b>contactado</b> no lo est�."); return false;'></a><span id="marcador22_off_" style="display:block">Contactado</span><br>
									<a href="#" style="display:none" id="marcador3_on_" class="ico-tickactivo" title='contratado' style='cursor:pointer' onclick='marcar_solicitud(3,,"El icono <b>contratado</b> no puede estar marcado si el icono <b>contactado</b> no lo est�."); return false;'></a><span id="marcador32_on_" style="display:none">Contratado</span>
									<a href="#" style="display:block" id="marcador3_off_" class="ico-tick" title='contratado' style='cursor:pointer' onclick='marcar_solicitud(3,,"El icono <b>contratado</b> no puede estar marcado si el icono <b>contactado</b> no lo est�."); return false;'></a><span id="marcador32_off_" style="display:block">Contratado</span><br>
							</p>
						</td>
						<td class="ultimo" style="vertical-align:middle;" align="center">
							<input type='button' onclick='ver_solicitud(,0,"0",21467); return false;' class="ui-boton-bd ui-corner-all" value='ver solicitud'><br><br>
							<span id='eliminar_'>
								<input type='button' class='ui-boton-bd ui-corner-all' onclick='eliminar_solicitud(, "La solicitud pasar� a la bandeja de las eliminadas. �Desea continuar?"); return false;' value='eliminar'>							</span>
						</td>
					</tr>                        			
                                        <?php
                                        include 'iniciativasComision.php';
                                        $conexion = mysql_connect('localhost','root','');
                                        mysql_select_db('diputapp');
                                        set_time_limit(0); 

                                        $query = "select * from comision;";
                                        $res = mysql_query($query);$i=0;
                                        while($row = mysql_fetch_array($res)){
                                            iniciativasComision($row["idcomision"]);
                                            echo '<br><br>------<br><br>';$i++;
                                            if($i==1){
                                                die();
                                            }
                                        }
                                        
                                        ?>
				</table>
			</form>
		</div>
                  <div class="paginacion bot" style="vertical-align:middle;">
						<div style="float:left; width:220px;">
							<span id="unificado_por_pagina" class="left">
								Unificado / p�gina: 
								25 | 
								<a href="#" onclick="mostrar_por_num(50,21467,1,46,'unificado'); return false;">50</a>&nbsp;|&nbsp;
								<a href="#" onclick="mostrar_por_num(100,21467,1,46,'unificado'); return false;">100</a>&nbsp;|&nbsp;
								<a href="#" onclick="mostrar_por_num(200,21467,1,46,'unificado'); return false;">200</a>
							</span>
						</div>
            <div style='float:right;' id='num_pagina'> 
							<div class="numeros left"> 
<span class="on">1</span><a href="#" onclick="mostrar_por_num(25,21467,2,46,'unificado'); return false;">2</a>							</div>

           	</div>
          </div>
          <div style="clear:both;"></div>
        </div>
    </div>				<br>
				<div style='clear:both;height:10px;'></div>
				seccionreferencia1 =seccion				<div class="clear marbot40"></div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<!-- Fin de #tapiz -->

	<hr class="hide"/>
	<script type='text/javascript'>
		function popupGenerico(fuente, ancho, alto, scroll){
			window.open(fuente, '_blank', 'width='+ancho+', height='+alto+', top=1px, left=1px, status=yes, scrollbars='+scroll);
		}
	</script>
	<div id="pie">
		  <div class="contacto">
    <p><span>�Te ayudamos?</span>&nbsp;&nbsp;&nbsp;
    	Tel�fono: 213 301 424&nbsp;&nbsp;&nbsp;
    	E-mail: <a href="mailto:clientesportugal@casamentoclick.com">clientesportugal@casamentoclick.com</a></p>
  </div>
  <div>
      <p>
			Informaci�n sobre Casamentoclick:&nbsp;&nbsp; 
			<a href="mailto:clientesportugal@casamentoclick.com">Contacto</a> | 
			<!--<a href="#">Mapa Web</a> | -->
			<a href="mailto:prensa@bodaclick.com">Redacci�n</a> |
			<a href="http://svillegas.bodaclick.com/empresas">Acceso a empresas</a> | 
			<a href="mailto:info@casamentoclick.com">Sugerencias</a> | 
			<a href="mailto:candidatos@casamentoclick.com">�Quieres trabajar con nosotros?</a> | 
			<a href="/casamentos/?formContacto=1">�Quieres anunciarte con nosotros?</a>
		</p>
  </div>
  <div>
    <p>
			� 2000-2012, Casamentoclick Todos los derechos reservados | 
			<a href="#" onclick='popupGenerico("http://svillegas.bodaclick.com/templates/politica.htm", 500, 400, scrollbars="yes"); return false;'>Pol�tica de Privacidad</a> | 
			<a href="#" onclick="javascript:window.sidebar.addPanel('Bodas | Bodaclick','http://svillegas.bodaclick.com/','')">Agregar esta p�gina a favoritos</a>
	 	</p>
  </div>
<!--
  <div class="ultimo">
    <p>Bodaclick.com en el Mundo: <a href="http://www.bodaclick.com" title="Bodas en Espa�a">Bodas en Espa&ntilde;a</a> | <a href="http://www.weddingclick.com" title="Miami Weddings">Miami Weddings</a> | <a href="http://www.bodaclickpr.com" title="Bodas en Puerto Rico">Bodas en Puerto Rico</a> | <a href="http://www.casamentoclick.com" title="Casamento o Portugal">Casamentos em Portugal</a> | <a href="http://www.nozzeclick.com" title="Matrimonio">Matrimonio</a> | <a href="http://www.bodaclick.com.mx" title="Bodas en Mexico">Bodas en Mexico</a> | <a href="http://www.bodaclick.com.do" title="Bodas en Rep�blica Dominicana">Bodas en Rep�blica Dominicana</a></p>
  </div>
-->  
	</div>
	<!-- Fin de #pie -->
	<script type='text/javascript' src='http://svillegas.bodaclick.com/js/jquery/jquery.formvalidation.1.1.5_sin_wpJ.js'></script>
<script type="text/javascript" src="http://svillegas.bodaclick.com/js/extjs/ext-base.js" ></script>
<script type="text/javascript" src="http://svillegas.bodaclick.com/js/extjs/ext-all-debug.js"></script>
<script type="text/javascript" src="http://svillegas.bodaclick.com/js/styles.js"></script>
<script type="text/javascript" src="http://svillegas.bodaclick.com/js/swfobject.js"></script>
<script type="text/javascript" src="http://svillegas.bodaclick.com/js/funciones.js"></script>
<script type="text/javascript" src="http://svillegas.bodaclick.com/css/fecha/fechapt_PT.js"></script>	
<script type="text/javascript" src="http://svillegas.bodaclick.com/empresas/js/general.js" ></script>
<script type="text/javascript" src="http://svillegas.bodaclick.com/empresas/js/funciones_solicitudes.js" ></script><script type="text/javascript">
			cargar_visitas_escaparate(21467, 1);
			cargar_total_solicitudes_y_PM(21467);
			</script>	<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-3781340-1']);
  _gaq.push(['_setDomainName', '.casamentoclick.com']);
  //Aqui va la variable personalizada
  _gaq.push(['_setCustomVar',1,'Usuario','NoLogado',2]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>                <input type ="hidden" value ="Usuario/contrase�a incorrecto" id="msg_incorrecto"></input>
        <input type ="hidden" value ="Por favor rellene todos los campos obligatorios." id="msg_incorrecto_vacio"></input>

        </body>
	</html>
