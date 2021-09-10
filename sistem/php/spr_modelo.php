<!------------------------------------------------------------------
  		Seccion de PHP ( BORRAR modelos) 
-------------------------------------------------------------------->

<?php
	include_once '../../php/conexion.php';
	$objeto = new Conexion();
	$conexion = $objeto->Conectar();
	
	$id_modelo = $_GET['id_modelo'];
	$sentencia = $conexion->prepare("DELETE FROM modelos where id_modelo = '$id_modelo' ");
	$sentencia->execute();
?>
