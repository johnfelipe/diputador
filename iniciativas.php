<?php


set_time_limit ( 0 );
for($x=3;$x<4;$x++){
    $html = file_get_contents('http://sitl.diputados.gob.mx/LXI_leg/iniciativas_por_pernplxi.php?iddipt='.$x.'&pert=9');
    $inicioTabla=stripos($html,'INICIATIVA</span></TD>');
    $finTabla=stripos($html,'</body>');
    $longitudTabla = $finTabla - ($inicioTabla-76);
    $contenidoTabla = substr($html,$inicioTabla-76,$longitudTabla);
    $tabla = explode('</tr>',$contenidoTabla);
    unset($tabla[0]);
    $tamanio=sizeof($tabla);
    unset($tabla[$tamanio]);
}
foreach($tabla as $c=>$v){
    $tabla[$c]=explode('
',str_replace('  ','',str_replace('	','',strip_tags($v))));
    foreach($tabla[$c] as $k=>$filas){
        if($filas=='' || $filas==' '){
            unset($tabla[$c][$k]);
        }
    }
}
echo '<pre>'.print_r($tabla,true).'</pre>';

?>
