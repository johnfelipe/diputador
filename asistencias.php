<?
$pagina = file_get_contents("http://sitl.diputados.gob.mx/LXII_leg/asistencias_por_pernplxii.php?iddipt=15&pert=3");


$inicio=' <TABLE VALIGN=top WIDTH="671" BORDER="1"';
$fin = '</TABLE></td>    </tr><tr><td> <p align="right" >              <br>';
$tabla = get_string_between($pagina,$inicio, $fin);

//echo htmlentities($tabla);
$tablaCalendario = $inicio.$tabla.$fin;
//echo $tablaCalendario;die();
$calendario = array();

//echo strtolower(htmlentities($tablaCalendario));

$rows = explode('<table valign=top border="1" cellspacing="1" width="220" bordercolor="#ffffff" bordercolorlight="#f2f2f2" bordercolordark="#ffffff" bgcolor="#f2f2f2" height="182">',strtolower($tablaCalendario));


//echo "<pre>".print_r(htmlentities($rows),true)."</pre>";
unset($rows[0]);
foreach($rows as $mes){
	//echo strip_tags($mes)."<br><br>";
	$dias = strip_tags(str_replace("  "," ",$mes));
	$dias = str_replace("	"," ",$dias);
	$dias = str_replace("  "," ",$dias);
	$dias = str_replace("\n","",$dias);
	//echo htmlentities($dias);
	$datos = explode("l      m      m      j      v      s      d",$dias);
	//echo "<br>mes: ".trim($datos[0]);
	$asistencias = trim(str_replace("&nbsp;","",$datos[1]));
	//echo "<br>asistencias: ".$asistencias."<br>";
	$dias = explode(" ",$asistencias);
	foreach($dias as $dia){
		if($dia != ""){
			$num_dia = (int)$dia;
			$asis_dia = str_replace(range(0,9),'',$dia);
			if($num_dia > 0){
				$dias_asistidos[$num_dia] = $asis_dia;
			}
			

		}
	}
	$asistencias_dia[trim($datos[0])] = $dias_asistidos;
	unset($dias_asistidos);
	//echo htmlspecialchars($asistencias);
	//var_dump($dias);die();
	
//	$meses[trim($datos[0])] = aquí se guardarán las asistencias por mes
}
	echo json_encode($asistencias_dia);

//var_dump($calendario);


function get_string_between($string, $start, $end){
	$string = " ".$string;
	$ini = strpos($string,$start);
        if ($ini == 0) return "";
	$ini += strlen($start);
	$len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}


?>