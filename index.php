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

$tabla = file_get_contents('http://localhost/diputados.htm');
$inicio = '<table align="center" width="760" border="0" cellspacing="2" cellpadding="2">';
$fin = '</table>
		</td>
	</tr>';
$contenidoTabla = get_string_between($tabla, $inicio, $fin);
$contenidoTabla = str_replace('</tr>','',$contenidoTabla);
$tr = explode ('<tr>',$contenidoTabla);
$partidos = array(1,3,2,5,4,12,6,9);//1=>pri 3=>pan 2=>prd 4=>pt 5=>pv 12=>na 6=>mc 9=>sp
$anterior=2;$partido=-1;$nombreEntidad='';
foreach($tr as $c => $linea){
    if(stripos($linea,'colspan')===false && stripos($linea,'<a href')==true){
        $sinTags = strip_tags(trim($linea));
        $iddip = explode(' ',$sinTags);
        if($iddip[1]<$anterior){
            $partido++;
            echo '<br />'.$partidos[$partido].'<br />';
        }
        $anterior = $iddip[1];
        $entidad = explode('</a>',$linea);
        $entidad = explode(' ',trim(strip_tags($entidad[1])));
        $circunscripcion='';
        if(sizeof($entidad)>3){//obtenemos entidad federativa
            for($x=0;$x<sizeof($entidad)-3;$x++){
                $nombreEntidad .= $entidad[$x]." ";
            }
            for($y = $x ; $y<=sizeof($entidad)-1 ; $y++){
                $circunscripcion .= $entidad[$y].' ';
            }
        }else{
            $nombreEntidad=$entidad[0];
            $circunscripcion = $entidad[1].' '.$entidad[2];
        }
        $nombreEntidad = trim($nombreEntidad);
        $query = "select * from estado where nombre = '$nombreEntidad'";
        $res = mysql_query($query);
        while($row = mysql_fetch_array($res)){
            $idEstado = $row["idestado"];
        }

        $circunscripcion = trim($circunscripcion);
        $idDiputado = get_string_between($linea, "dipt=", '" class');
        $nombre = get_string_between($linea, '"linkVerde">', '</a>');
        $nombre = explode(' ',trim($nombre));
        $nombreCompleto = '';
        for($x=1;$x<=sizeof($nombre)-1;$x++){
            $nombreCompleto .= " ".$nombre[$x];
        }
        $nombreCompleto = trim($nombreCompleto);
        $distrito = explode(" ",$circunscripcion);//print_r($distrito);die();
        $nombreCirc = trim($distrito[2]);
        echo print_r($distrito,true).$nombreCirc.'<br>';
        if($distrito[0]=='Circ.'){
            $query = "select * from distrito where tipo = 'circunscripcion' and nombre = '$nombreCirc'
                    and estado_idestado = '$idEstado'; ";
            $res = mysql_query($query,$conexion);
            echo $query;
            $idDistrito=0;
            while($row = mysql_fetch_array($res)){
                $idDistrito = ($row["iddistrito"]!='')?$row["iddistrito"]:0;
            }
            var_dump($idDistrito);
            if($idDistrito == 0){
                $query = "insert into distrito (nombre, tipo, estado_idestado) values ('$nombreCirc', 'circunscripcion', '$idEstado');";
                var_dump($query);//die();
                mysql_query($query,$conexion);
                $query = "select * from distrito where tipo = 'circunscripcion' and nombre = '$nombreCirc'
                        and estado_idestado = '$idEstado'; ";
                $res = mysql_query($query,$conexion);
                while($row = mysql_fetch_array($res)){
                    $idDistrito = ($row["iddistrito"]!='')?$row["iddistrito"]:0;
                }
            }

        }elseif($distrito[0]=='Dtto.'){
            $query = "select * from distrito where tipo = 'distrito' and nombre = '$nombreCirc'
                        and estado_idestado = '$idEstado'; ";
            $res = mysql_query($query,$conexion);
            while($row = mysql_fetch_array($res)){
                $idDistrito = ($row["iddistrito"]!='')?$row["iddistrito"]:0;
            }
        }
        $diputado["nombre"]             = $nombreCompleto;
        $diputado["partido_idpartido"]  = $partidos[$partido];
        $diputado["distrito_iddistrito"]= $idDistrito;
        $diputados[$idDiputado] = $diputado;
        //echo '</br><b>'.$c.'</b>-'.$nombreCompleto.' -- '.$nombreEntidad.' -- '.$circunscripcion.' -- '.$idDiputado;
        $nombreEntidad='';//$circunscripcion='';*/
    }
}

ksort($diputados);

foreach($diputados as $c=>$diputado){
    $query = "select * from diputado where iddiputado = $c ";
    $res = mysql_query($query,$conexion);$idDiputado=0;
    while($row = mysql_fetch_array($res)){
        $idDiputado = ($row["iddiputado"]!='')?$row["iddiputado"]:0;
    }
    if($idDiputado==0){    
        $query = "insert into diputado (iddiputado,nombre,partido_idpartido,distrito_iddistrito) values ($c,'".$diputado['nombre']."',".$diputado['partido_idpartido'].",".$diputado['distrito_iddistrito']."); ";
        echo $query.'<br><br>';//die();
        mysql_query($query,$conexion);
    }
}


//echo '<pre>'.print_r($diputados,TRUE).'</pre>'.count($diputados);
?>
