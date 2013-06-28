<?php
$conexion = mysql_connect('localhost','root','');
mysql_select_db('diputapp');
set_time_limit(0);
///// tomando el tiempo
$mtime = microtime(); 
$mtime = explode(" ",$mtime); 
$mtime = $mtime[1] + $mtime[0]; 
$starttime = $mtime;
///// tomando el tiempo
$query = "select * from comision where idcomision>=40;";
$res = mysql_query($query);$i=0;

while($row = mysql_fetch_array($res)){
    iniciativasComision($row["idcomision"]);
    echo '<br><br>------<br><br>';$i++;
//    if($i==40){
//	die();
//    }
}

///// tomando el tiempo
$mtime = microtime(); 
$mtime = explode(" ",$mtime); 
$mtime = $mtime[1] + $mtime[0]; 
$endtime = $mtime; 
$totaltime = ($endtime - $starttime); 
echo "This page was created in ".$totaltime." seconds"; 
///// tomando el tiempo


function get_string_between($string, $start, $end){
	$string = " ".$string;
	$ini = strpos($string,$start);
        if ($ini == 0) return "";
	$ini += strlen($start);
	$len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}

function iniciativasComision($comision){
    $idlink = $comision-4;
    $estados = array('A'=>'Aprobada','D'=>'Desechada','R'=>'Atendida','P'=>'Pendiente');
    $urlPagina = "http://sitl.diputados.gob.mx/LXI_leg/iniciativaslxi.php?comt=$idlink&edot=";
    foreach($estados as $c=>$v){
        $urlTipo = $urlPagina.$c;
        echo $urlTipo.'--<br><br>';
	$contenido = file_get_contents($urlTipo);
        $inicio = "</TD>
			      </tr>";
        $fin = "</table>
			</body>";
        $tabla = get_string_between($contenido, $inicio, $fin);
        $iniciativas = explode('</tr>',$tabla);$x=0;
	unset($iniciativas[(sizeof($iniciativas)-1)]);
        foreach($iniciativas as $iniciativa){
	    $c_iniciativa = new iniciativa();
	    $c_iniciativa->comision_idcomision = $comision;
	    $c_iniciativa->urlComision = $urlTipo;
	    $c_iniciativa->tramite = $v;
	    $c_iniciativa->tipo = 'iniciativa';
          //  echo '<tr>';
            $columna = explode('</td>',$iniciativa);
            foreach($columna as $col=>$cont){
               // echo '<td>';
                $registra=true;
                switch($col){
                    case 0:
                        $inicio = " href='";
                        $fin = "' target";
                        $url = get_string_between($cont,$inicio,$fin);
                        $inicio = '</b>';
                        $fin = 'Proponente: ';
                        $titulo = str_replace('&nbsp;','',trim(strip_tags(get_string_between($cont,$inicio,$fin))));
			$c_iniciativa->nombre = trim($titulo);
                        $inicio = 'ente: ';
                        $fin = '(';
                        $propone = strip_tags(get_string_between($cont,$inicio,$fin));
                        if(strlen($propone)<5){
                            $iddiputado=0;
                            $registra = false;
                        }else{
                            $iddiputado = getDiputadoByNombre($propone);
			    $c_iniciativa->diputado_iddiputado = $iddiputado;
                        }
                        $c_iniciativa->urlCuadro=$url;
		    break;
                    case 1:
                        $cont = str_replace('</span>','',$cont);
                        $inicio = "Fecha de presentación:<b>";
                        $fin = "</b><br>";
                        $fecha = get_string_between($cont, utf8_decode($inicio), utf8_decode($fin));
                       // echo $fecha.'<br>';
			$c_iniciativa->fechaPresentacion = trim($fecha);
                        $comisiones = explode('</b><br><br>',$cont);
                        $comisiones = $comisiones[1];
                        $comisiones = explode('<br>',$comisiones);
                        $comisiones = implode('',$comisiones);
                        $comisiones = strip_tags($comisiones);
                        if(stripos($comisiones,utf8_decode('Con Opinión de'))){
                            $comisionesSeparadas = explode(utf8_decode('Con Opinión de'),$comisiones);
                            $principal = $comisionesSeparadas[0];
                            $opinion = $comisionesSeparadas[1];
                            $opiniones = explode('-',$opinion);
                            foreach($opiniones as $opi){
                                if(strlen(trim(str_replace('&nbsp;','',utf8_decode($opi))))>0){
                         //           echo 'opinion de: '.getComisionByNombre(trim($opi)).' - '.trim($opi).'<br>';
				    $c_iniciativa->comisionOpinion[] = getComisionByNombre(trim($opi));
                                }
                            }
                        }else{
                            $principal = $comisiones;
                        }
                        if(stripos($principal,utf8_decode('Unidas'))){
                            $comisiones = str_replace('Unidas','',$principal);
                            $comisionesSeparadas = explode(utf8_decode('-'),$comisiones);
                            foreach($comisionesSeparadas as $opi){
                                if(strlen(trim(str_replace('&nbsp;','',utf8_decode($opi))))>0){
                      //              echo 'principal: '.getComisionByNombre(trim($opi)).' - '.trim($opi).'<br>';
				    $c_iniciativa->comisionPrincipal[] = getComisionByNombre(trim($opi));
                                }
                            }
                        }else{
                            $comisiones = str_replace('-','',$principal);
                            $comisiones = str_replace('&nbsp;','',$comisiones);
                            $comisiones = trim($comisiones);
                    //        echo 'principal: '.getComisionByNombre(trim($comisiones)).' - '.trim($comisiones).'<br>';
			    $c_iniciativa->comisionPrincipal[] = getComisionByNombre(trim($comisiones));
                        }
                    break;
                    case 2:
                        $descripcion = $cont;
                     //   echo substr($descripcion,0,100).'<br>';
			$c_iniciativa->sinopsis = trim(strip_tags($descripcion));
                    break;
                    case 3:
                        $col3 = str_replace($v,'',$cont);
                        $col3 = str_replace('con fecha','',$col3);
                        $col3 = explode(utf8_decode('Publicación en Gaceta:'),$col3);
                        $fechaGaceta = strip_tags($col3[1]);
                    //    echo 'Publicación gaceta: '.$fechaGaceta.'<br>';
			$c_iniciativa->fechaPublicacion = trim($fechaGaceta);
                        $inicio = 'href=';
                        $fin = ' target';
                        $linkGaceta = get_string_between($col3[1], utf8_decode($inicio), utf8_decode($fin));
                    //    echo 'Link Gaceta: '.str_replace("'","",$linkGaceta).'<br>';
			$c_iniciativa->urlPublicacion = str_replace("'","",$linkGaceta);
                        if(strlen(trim($col3[0]))>10){
                            if($c=='A'){
                                echo $v.'<br>';
                                $fechaVotada=strip_tags($col3[0]);
                                $inicio = 'href="';
                                $fin = '" target';
                                $linkVotada=get_string_between($col3[0], utf8_decode($inicio), utf8_decode($fin));
				$idsistema = explode("?",$linkVotada);
				$idsistema = $idsistema[1];
				$variables = explode("&", $idsistema);
				foreach($variables as $vars){
				    $vals = explode("=",$vars);
				    if($vals[0]=='init'){
					$c_iniciativa->idsistema = $vals[1];
				    }
				}
                            }elseif($c=='D'){
                    //            echo $v.'<br>';
                                $fechaVotada = trim($col3[0]);
                            }
			    
			    //echo strip_tags(str_replace('(art. 89)','',strip_tags($fechaVotada)));die();
			    
			    $c_iniciativa->fechaTramite = trim(strip_tags(str_replace('(art. 89)','',strip_tags($fechaVotada))));
			    $c_iniciativa->urlAprobada = $linkVotada;
                        }
                  //      echo 'Fecha Votación: '.str_replace('(art. 89)','',strip_tags($fechaVotada)).'<br>';
                //        echo 'Link Resultado: '.$linkVotada.'<br>';
                    break;
                }
              //  echo '</td>';
            }
            //echo '</tr>';
            $x++;
	    $c_iniciativa->guardar($iniciativa);
	    //echo '<pre>'.print_r($c_iniciativa,TRUE).'</pre>';//die();
        }
    }
}

function getDiputadoByNombre($nombre){
    global $conexion;
    $nombre = trim(strip_tags($nombre));
    $query = "select * from diputado where nombre like '%$nombre%';";
    $res = mysql_query($query);$diputado='';
    while($row = mysql_fetch_array($res)){
        $diputado = $row["iddiputado"];
    }
    return $diputado;
}

function getIniciativaByNombre($nombre){
    global $conexion;
    $nombre = trim(strip_tags($nombre));
    $query = "select * from iniciativa where nombre like '%$nombre%';";
    $res = mysql_query($query);$iniciativa=0;
    while($row = mysql_fetch_array($res)){
        $iniciativa = $row["idiniciativa"];
    }
    return $iniciativa;
}

function getComisionByNombre($nombre){
    global $conexion;
    $nombre = trim(strip_tags($nombre));
    $query = "select * from comision where nombre like '%$nombre%';";
    $res = mysql_query($query);$iniciativa=0;
    while($row = mysql_fetch_array($res)){
        $comision = $row["idcomision"];
    }
    return $comision;
}

function formatFecha($fecha){
    $meses = array('Enero'=>1,'Febrero'=>2,'Marzo'=>3,'Abril'=>4,'Mayo'=>5,'Junio'=>6,'Julio'=>7,'Agosto'=>8,'Septiembre'=>9,'Octubre'=>10,'Noviembre'=>11,'Diciembre'=>12);
    $fecha = explode('-',$fecha);
    if(sizeof($fecha)==3){
	if(@checkdate($fecha[1], $fecha[2] , $fecha[0] )){
	    return implode('-',$fecha);
	} else {
	    $mes = $meses[$fecha[1]];
	    $cero='';
	    if($mes<10){
		$cero = 0;
	    }
	    $fecha = $fecha[2].'-'.$cero.$meses[$fecha[1]].'-'.$fecha[0];
	}
    } else {
	$fecha = '';
    }
    return $fecha;
}

function getIdPeriodo($fecha){
    global $conexion;
    $query = "select idperiodo from periodo where fechaInicio <= '$fecha' AND fechaFin>='$fecha' ";
    $res = mysql_query($query);
    while($row = mysql_fetch_array($res)){
        $periodo = $row["idperiodo"];
    }
    return $periodo;    
}

class iniciativa{
    // iniciativa
    var $idiniciativa;
    var $nombre;
    var $sinopsis;
    var $tipo;
    var $fechaPresentacion;
    var $fechaPublicacion;
    var $tramite;
    var $periodo_idperiodo;
    var $idsistema;
    var $fechaTramite;
    var $urlCuadro;
    var $urlAprobada;
    var $urlPublicacion;
    var $urlComision;
    // iniciativa_has_comision
    var $comisionPrincipal;//array para guardar iniciativas
    var $comisionOpinion;//array para guardar iniciativas
    var $iniciativa_idiniciativa;
    var $comision_idcomision;
    var $postura;
    // diputado_has_iniciativa
    var $diputado_iddiputado;
    //var $iniciativa_idiniciativa;
    //var $postura;
    
    public function guardar($iniciativa){
	global $conexion;
	$this->buscaIniciativa($this->nombre,$this->sinopsis);
	if(is_numeric($this->idiniciativa)){
	    $this->editaIniciativa();
	}else{
	    if($this->nombre!='' && $this->fechaPresentacion!=''){
		$this->guardaIniciativa();
	    }else{
		echo '<pre>'.print_r($this,TRUE).'</pre>';
		die('<br><strong><font color=red>No hay datos suficientes para guardar la iniciativa</font></strong><br>');		
	    }
	}
	$this->periodo_idperiodo = getIdPeriodo(formatFecha($this->fechaPresentacion));
	if(is_array($this->comisionOpinion)){
	    foreach($this->comisionOpinion as $opinion){
		$this->comision_idcomision = $opinion;
		$this->postura = 'opinion';
		$this->iniciativa_idiniciativa = $this->idiniciativa;
		$this->guardaIniciativaComision();
	    }
	}else{
	    echo '<font color=red>No tiene comisiones opinadoras</font><br>';
	}
	if(is_array($this->comisionPrincipal)){
	    foreach($this->comisionPrincipal as $principal){
		$this->comision_idcomision = $principal;
		$this->postura = 'principal';
		$this->iniciativa_idiniciativa = $this->idiniciativa;
		$this->guardaIniciativaComision();
	    }
	}else{
	    echo '<font color=red><strong>No tiene comisiones principales</strong></font>'.htmlspecialchars($iniciativa).'<br>';
	}
	
	$this->iniciativa_idiniciativa = $this->idiniciativa;
	$this->postura = 'propone';
	$this->diputado_iddiputado = (is_numeric($this->diputado_iddiputado))?$this->diputado_iddiputado:0;
	$this->guardaIniciativaDiputado();
	
    }
    
    public function getIniciativa(){
	global $conexion;
	$query = "select id from iniciativa where nombre = '$this->nombre'";
	$res = mysql_query($query,$conexion);
	$this->idiniciativa = mysql_fetch_row($res);
	return $this->idiniciativa;
    }
    
    public function guardaIniciativa(){
	global $conexion;
	$query = "INSERT INTO iniciativa (nombre,sinopsis,tipo,fechaPresentacion,fechaPublicacion,tramite,periodo_idperiodo,idsistema,fechaTramite,urlCuadro,urlAprobada,urlPublicacion,urlComision) VALUES ('$this->nombre','$this->sinopsis',
	'$this->tipo',
	'".formatFecha($this->fechaPresentacion)."',
	'".formatFecha($this->fechaPublicacion)."',
	'$this->tramite','$this->periodo_idperiodo','$this->idsistema','".formatFecha($this->fechaTramite)."',
	'$this->urlCuadro','$this->urlAprobada',
	'$this->urlPublicacion',
	'$this->urlComision'
		)";
	$res = mysql_query($query,$conexion);
	if (!$res) {
	    die('Invalid query: ' . mysql_error());
	}
	$this->idiniciativa = mysql_insert_id();
	echo 'guarda iniciativa - '.$this->idiniciativa.' <br>';
	return $this->idiniciativa;		  
    }
    
    public function buscaIniciativa(){
	global $conexion;
	$query = "SELECT * FROM iniciativa WHERE nombre LIKE '%$this->nombre%' ";
	if($this->sinopsis != ''){
	    $query .= " AND sinopsis = '$this->sinopsis' ";
	}
	if($this->fechaPresentacion != ''){
	    $query .= " AND fechaPresentacion = '".formatFecha($this->fechaPresentacion)."' ";
	}
	$res = mysql_query($query,$conexion);
	$arra=mysql_fetch_array($res);
	if(is_array($arra)){
	    foreach($arra as $c=>$v){
		$this->$c=$v;
	    }
	    return $arra;
	} else {
	    return false;
	}
    }
    
    public function editaIniciativa(){
	global $conexion;
	$query = "UPDATE iniciativa SET 
	    nombre = '$this->nombre'
	    ,sinopsis = '$this->sinopsis',tipo = '$this->tipo'
	    ,fechaPresentacion = '".formatFecha($this->fechaPresentacion)."'
	    ,fechaPublicacion = '".formatFecha($this->fechaPublicacion)."'
	    ,tramite = '$this->tramite',periodo_idperiodo = '$this->periodo_idperiodo'
	    ,idsistema = '$this->idsistema'
	    ,fechaTramite = '".formatFecha($this->fechaTramite)."'
	    ,urlCuadro = '$this->urlCuadro',urlAprobada = '$this->urlAprobada'
	    ,urlPublicacion = '$this->urlPublicacion',urlComision = '$this->urlComision'
	WHERE idiniciativa = $this->idiniciativa";
	$res = mysql_query($query,$conexion);
	echo 'edita iniciativa  - '.$this->idiniciativa.' <br>';
	return $res;
    }
    
    public function guardaIniciativaComision(){
	global $conexion;
	$iniciativa = $this->buscaIniciativaComision($this->iniciativa_idiniciativa,$this->comision_idcomision,$this->postura);
	if($iniciativa == FALSE){
	    $query = "INSERT INTO iniciativa_has_comision (iniciativa_idiniciativa,comision_idcomision,postura) VALUES ($this->iniciativa_idiniciativa,$this->comision_idcomision,'$this->postura')";
	    $res = mysql_query($query,$conexion);
	    echo 'guarda iniciativaComision <br>';
	    return mysql_insert_id();
	} else {
	    echo 'existe iniciativaComision <br>';
	    return FALSE;
	}
    }
    
    public function buscaIniciativaComision($idiniciativa,$idcomision,$postura){
	global $conexion;
	$query = "SELECT * FROM iniciativa_has_comision WHERE iniciativa_idiniciativa = $idiniciativa AND comision_idcomision = $idcomision AND postura='$postura';";
	$res = mysql_query($query,$conexion);
	while($row = mysql_fetch_array($res)){
	    return TRUE;
	}
	return FALSE;
    }
    
    
    public function guardaIniciativaDiputado(){
	global $conexion;
	$iniciativa = $this->buscaIniciativaDiputado($this->iniciativa_idiniciativa,$this->diputado_iddiputado,$this->postura);
	if($iniciativa == FALSE){
	    $query = "INSERT INTO diputado_has_iniciativa (diputado_iddiputado,iniciativa_idiniciativa,postura)
		VALUES ($this->diputado_iddiputado,$this->iniciativa_idiniciativa,'$this->postura')";
	    $res = mysql_query($query,$conexion);
	    echo 'guarda iniciativaDiputado <br>';
	    return mysql_insert_id();
	} else {
	    echo 'existe iniciativaDiputado <br>';
	    return FALSE;
	}
    }
    
    public function buscaIniciativaDiputado($iniciativa, $diputado, $postura){
	global $conexion;
	$query = "SELECT * FROM diputado_has_iniciativa WHERE iniciativa_idiniciativa = $iniciativa AND diputado_iddiputado = $diputado AND postura='$postura'";
	$res = mysql_query($query,$conexion);
	while($row = mysql_fetch_array($res)){
	    return TRUE;
	}
	return FALSE;
    }
}
?>