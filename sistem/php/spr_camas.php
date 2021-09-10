<!------------------------------------------------------------------
  		Seccion de PHP ( BORRAR REGISTROS) 
-------------------------------------------------------------------->

<?php
	include_once '../../php/conexion.php';
	$objeto = new Conexion();
	$conexion = $objeto->Conectar();
	
	$id = $_GET['id'];
	$sentencia = $conexion->prepare("DELETE FROM registros where id = '$id' ");
	$sentencia->execute();

?>
