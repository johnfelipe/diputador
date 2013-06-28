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

$tabla = file_get_contents('http://localhost/extraordinarias.htm');
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
        $td["tipo"]="especiales";
    }
    $row[] = $td;
}
foreach($row as $comision){
    $query = "insert into comision (idcomision, nombre, ubicacion, extension, sitio, tipo) VALUES (".$comision["id"].",'".$comision["nombre"]."','".$comision["ubicacion"]."','".$comision["extension"]."','".$comision["sitio"]."','".$comision["tipo"]."');";
    mysql_query($query);
}

echo '<pre>'.print_r($row,TRUE).'</pre>';

?>
