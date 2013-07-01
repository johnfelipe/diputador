<?

$conexion = mysql_connect('localhost','root','');
mysql_select_db('diputapp');
set_time_limit(0);
$query = "select * from diputado";
$res = mysql_query($query);

while($row = mysql_fetch_array($res)){
	$query = "insert into diputado_has_legislatura (diputado_iddiputado, legislatura_idlegislatura) values (".$row["iddiputado"].",2)";
	echo $query."<br>";
	mysql_query($query);
}

?>