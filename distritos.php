<?php

$conexion = mysql_connect('localhost','root','');
mysql_select_db('diputapp');

function get_string_between($string, $start, $end){
$string = " ".$string;
$ini = strpos($string,$start);
if ($ini == 0) return "";
$ini += strlen($start);
$len = strpos($string,$end,$ini) - $ini;
return substr($string,$ini,$len);
}

function validaTipo($var,$tipo){
    //echo $var.' '.$tipo.'<br>';
    if($tipo=='int'){
        if(is_numeric($var)){
            return true;
        }else{
            return false;
        }
    }elseif($tipo=='text'){
        if(!is_numeric($var)){
            return true;
        }else{
            return false;
        }
    }
}

$tabla = file_get_contents('http://www.ife.org.mx/documentos/DISTRITOS/planos_distritales_seccionales.html');
$inicioTabla = '<tr height="11">
<td height="11"></td>
<td></td>
<td></td>
<td colspan="4"></td>
</tr>';
$finTabla = '</tbody>
</table>

          <h2 align="center">&nbsp;</h2>';

$tablaContenido = get_string_between($tabla, $inicioTabla, $finTabla);
//die($tablaContenido);
$filas = explode ('<tr height="22">',$tablaContenido);
$entidades = array();
//echo htmlspecialchars($tablaContenido);die();
foreach($filas as $c=>$fila){
    $contenido = str_replace('</tr>','',$fila);
    $contenido = str_replace('
',' ',$fila);
    $contenidoSinTags =  trim(strip_tags($contenido));
    $contenidoSinTags = explode(' ',$contenidoSinTags);
    $titulos = array('idEntidad', 'nombreEntidad', 'distrito', 'idMunicipio', 'nombreMunicipio', 'cveCabecera', 'nombreCabecera');
    $tipoTitulo = array('int','text','int','int','text','int','text');
    $titulosdf = array('idEntidad', 'nombreEntidad', 'distrito', 'nombreMunicipio');
    $tipoTitulodf = array('int','text','int','text');
    $entidad = array('idEntidad'=>'');
    if(sizeof($contenidoSinTags)>1){
        $puntero=0;
        foreach($contenidoSinTags as $registro){
            if($entidad['idEntidad']==9){
                if(@validaTipo($registro,$tipoTitulodf[$puntero])==TRUE){
                    $entidad[$titulosdf[$puntero]]=$registro;
                    $puntero++;
                }else{
                    $puntero--;
                    $entidad[$titulosdf[$puntero]].=' '.$registro;
                    $puntero++;
                }
            } else {
                if(@validaTipo($registro,$tipoTitulo[$puntero])==TRUE){
                    $entidad[$titulos[$puntero]]=$registro;
                    $puntero++;
                }else{
                    $puntero--;
                    $entidad[$titulos[$puntero]].=' '.$registro;
                    $puntero++;
                }
   
            }
            //echo $titulos[$puntero].' '.$entidad[$titulos[$puntero]];die();
        }
        if($entidad['idEntidad']==9){
            unset($entidad['cveCabecera']);
            unset($entidad['nombreCabecera']);
        }
        $entidades[]=$entidad;
    }
}
$idciudad=$iddistrito='';
foreach($entidades as $entidad){
    $idEstado='';
    $query = "select * from estado where idestado = ".$entidad['idEntidad'];
    $res = mysql_query($query);
    while($row = mysql_fetch_array($res)){
        $idEstado = ($row['idestado']!='')?$row['idestado']:0;
    }
    if($idEstado==0){
        $query = "insert into estado (idestado, nombre) values ('".$entidad['idEntidad']."','".ucwords(strtolower($entidad['nombreEntidad']))."');";
        echo $query.'<br />';
        mysql_query($query,$conexion);
    }else{
        echo '<br />Ya existe '.$entidad['idEntidad']." ".ucwords(strtolower($entidad['nombreEntidad']));
    }
    $entidad["nombreMunicipio"] = ucwords(strtolower($entidad["nombreMunicipio"]));
    if($idEstado==9){
        $entidad["nombreMunicipio"] = "Distrito Federal";
        $entidad["idMunicipio"] = 1;
    }
    $idCiudad=0;
    $query = "select * from ciudad where nombre = '".$entidad['nombreMunicipio']."' and referencia = '".$entidad['idMunicipio']."' and estado_idestado = '".$entidad['idEntidad']."'";
    $res = mysql_query($query);
    while($row = mysql_fetch_array($res)){
        $idCiudad = ($row['idciudad']!='') ? $row['idciudad']:0;
    }
    if($idCiudad == 0){
        $query = "insert into ciudad (nombre, estado_idestado, referencia) values ('".$entidad['nombreMunicipio']."',".$entidad['idEntidad'].",".$entidad['idMunicipio'].");";
        mysql_query($query, $conexion);
        $query = "select * from ciudad where nombre = '".$entidad['nombreMunicipio']."' and referencia = '".$entidad['idMunicipio']."' and estado_idestado = '".$entidad['idEntidad']."'";
        $res = mysql_query($query);
        while($row = mysql_fetch_array($res)){
            $idCiudad = ($row['idciudad']!='') ? $row['idciudad']:0;
        }
    }
    echo '<br />'.$query.'<br />';
    $query = "select * from distrito where nombre = '".$entidad['distrito']."' and tipo='distrito' and estado_idestado=".$entidad['idEntidad'].";";
    $res = mysql_query($query);
    while($row = mysql_fetch_array($res)){
        $idDistrito = ($row['iddistrito']!='') ? $row['iddistrito']:0;
    }
    if($idDistrito == 0){
        $query = "insert into distrito (nombre, tipo, estado_idestado) values ('".$entidad['distrito']."','distrito','".$entidad['idEntidad']."');";
        mysql_query($query, $conexion);
        echo $query.'<br />';
        $query = "select * from distrito where nombre = '".$entidad['distrito']."' and tipo='distrito' and estado_idestado=".$entidad['idEntidad'].";";
        $res = mysql_query($query);
        while($row = mysql_fetch_array($res)){
            $idDistrito = ($row['iddistrito']!='') ? $row['iddistrito']:0;
        }
    }
    $query = "insert into distrito_has_ciudad (distrito_iddistrito, ciudad_idciudad, cabecera) values 
            ($idDistrito, $idCiudad, TRUE);";
    mysql_query($query, $conexion);
    echo $query.'<br />';
}

echo '<pre>'.print_r($entidades,TRUE).'</pre>';die();//    print_r($entidades);



?>


