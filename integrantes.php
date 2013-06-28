<?php

$conexion = mysql_connect('localhost','root','');
mysql_select_db('diputapp');
set_time_limit(0);

function get_string_between($string, $start, $end){
	$string = " ".$string;
	$ini = strpos($string,$start);
        if ($ini == 0) return "";
	$ini += strlen($start);
	$len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}


$query = "select idcomision from comision";
$res = mysql_query($query);
$i=0;
while($row = mysql_fetch_array($res)){
    registraDiputadosComision($row["idcomision"]);
    $i++;
    
}
?>

<iframe name="ventana" id="ventana"></iframe>

<?

function registraDiputadosComision($idcomision){
    global $conexion;
    
    $tabla = file_get_contents('http://sitl.diputados.gob.mx/LXI_leg/integrantes_de_comisionlxi.php?comt='.$idcomision);
    echo '<a href="http://sitl.diputados.gob.mx/LXI_leg/integrantes_de_comisionlxi.php?comt='.$idcomision.'" target="ventana">http://sitl.diputados.gob.mx/LXI_leg/integrantes_de_comisionlxi.php?comt='.$idcomision.'</a><br>';
    $inicio = '<TR><TD bgcolor="#FFFFFF" colspan=5 valign="bottom" align="center" class="TitulosVerde">PRESIDENCIA</TD></TR>';
    $fin = '</table>
		</td>
	</tr>';
    $contenidoTabla = get_string_between($tabla, utf8_decode($inicio), utf8_decode($fin));
    //echo '<table>'.$contenidoTabla.'</table>';
    $tabla = explode('<TR>', $contenidoTabla);
    //print_r($tabla);
    $cargos = array(0=>'Presidente',1=>'Secretario',2=>'Integrante');
    $ind = 0;$insertados = 0;
    foreach($tabla as $grupo){
        $integrantes = explode('<tr>',$grupo);
        foreach($integrantes as $integrante){
            $int = $integrante;
            $dips = explode('<tr',$int);
            foreach($dips as $diputado){
                $columnas = explode('<td',$diputado);
                $i=0;
                echo sizeof($columnas).'<br>';
                if(sizeof($columnas)==1){
                    $cargo = $cargos[$ind++];
                }else{
                    foreach($columnas as $c=>$columna){
                        if($c==1){
                            $inicio = '?dipt=';
                            $fin = '" class=';
                            $idDiputado = get_string_between($columna, utf8_decode($inicio), utf8_decode($fin));
                            echo 'id:'.$idDiputado.' tipo:'.$cargo.'<br>';
                            $query = "select * from diputado_has_comision where diputado_iddiputado = $idDiputado AND 
                            comision_idcomision = $idcomision AND cargo = '$cargo'; ";
                            $res = mysql_query($query);$idAsignacion = 0;
                            while($row = mysql_fetch_array($res)){
                                $idAsignacion = $row["diputado_iddiputado"];
                            }
                            if($idAsignacion == 0){
                                $query = "INSERT into diputado_has_comision (diputado_iddiputado,comision_idcomision,cargo) VALUES ($idDiputado,$idcomision,'$cargo');";
                                mysql_query($query);
                                $insertados++;
                            }
                        }
                        $i++;
                    }            
                }
            }
        }
    }
}




?>
