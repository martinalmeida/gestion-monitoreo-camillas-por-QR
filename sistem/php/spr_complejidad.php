<!------------------------------------------------------------------
  		Seccion de PHP ( BORRAR modelos) 
-------------------------------------------------------------------->

<?php
	include_once '../../php/conexion.php';
	$objeto = new Conexion();
	$conexion = $objeto->Conectar();
	
	$id_complegidad = $_GET['id_complegidad'];
	$sentencia = $conexion->prepare("DELETE FROM complejidad where id_complegidad = '$id_complegidad' ");
	$sentencia->execute();
?>
