<?php
$host = 'localhost';
$db = 'mesi';
$user = 'root';
$pass = 'Servip.2021';

$conexion = mysqli_connect($host,$user,$pass,$db);

if ($conexion) {
	$consulta = mysqli_query($conexion,"SELECT * FROM registros");
	while ($row = $consulta->fetch_assoc()) {  
		$update = mysqli_query($conexion,"UPDATE registros SET revisado = 'noRevisada' ");
	} 

}else{
	echo "Error de Crom";
}

