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

$tabla = file_get_contents('http://sitl.diputados.gob.mx/LXII_leg/listado_de_comisioneslxii.php?tct=1');//esta tabla se obtiene de los urls a continuación
//http://sitl.diputados.gob.mx/LXII_leg/listado_de_comisioneslxii.php?tct=1
//http://sitl.diputados.gob.mx/LXII_leg/listado_de_comisioneslxii.php?tct=2
$inicio = '<td width="775" colspan="4"><span class="textoNegro">En la columna de MICROSITIO, encontrará la página Web con información adicional e importante de cada  una de las comisiones.</span></td>
			  </tr>';
$fin = '<tr>	<td colspan="4" width="361" height="10" valign="top"><img src="images/h_line.gif" width="749" height="1" vspace="10"></td></tr>			</table>';

$contenidoTabla = get_string_between($tabla, utf8_decode($inicio), utf8_decode($fin));
echo '<table>'.$contenidoTabla.'</table>';
//$contenidoTabla = str_replace('</tr>','',$contenidoTabla);
$tr = explode ('</tr>',$contenidoTabla);

foreach($tr as $comision){
    $td = explode('</td>',$comision);
    foreach ($td as $c=>$v){
        if($c==0){
            //echo '---'.$v.'---';die();
            $inicio = "comt=";
            $fin = '" class';
            $id = get_string_between($v, $inicio, $fin);
            $td["id"]=$id;
            $td["nombre"] = trim(strip_tags($v));
        } elseif($c==1){
            $td["ubicacion"] = trim(strip_tags($v));
        } elseif($c==2){
            $td["extension"] = trim(strip_tags($v));
        } elseif($c==3){
            $inicio='<a href="';
            $fin='"><img';
            $td["sitio"] = get_string_between($v, $inicio, $fin);
            //echo htmlentities($v).'<br>';
        }
        $td["tipo"]="ordinarias";
    }
    $row[] = $td;
}
foreach($row as $comision){
	if(!existe($comision)){
		$query = "insert into comision (idcomision, nombre, ubicacion, extension, sitio, tipo) VALUES (".$comision["id"].",'".$comision["nombre"]."','".$comision["ubicacion"]."','".$comision["extension"]."','".$comision["sitio"]."','".$comision["tipo"]."');";
		echo $query."<br><br>";//die();
		mysql_query($query);
	}else{
		$query = "update comision set nombre = '".$comision["nombre"]."', ubicacion = '".$comision["ubicacion"]."', extension = '".$comision["extension"]."', sitio = '".$comision["sitio"]."', tipo = '".$comision["tipo"]."' where idcomision = ".$comision["id"]."";
		echo "ya existe ".$comision["id"].",'".$comision["nombre"]."' <br>";
		echo $query."<br><br>";
		mysql_query($query);
	}
}

echo '<pre>'.print_r($row,TRUE).'</pre>';

function existe($comision){
	$query = "select * from comision where idcomision = '".$comision["id"]."'";
	$res = mysql_query($query);$existe = false;
	while($row = mysql_fetch_array($res)){
		$existe = true;
	}
	return $existe;
}

?>
