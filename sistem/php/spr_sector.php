<!------------------------------------------------------------------
  		Seccion de PHP ( BORRAR modelos) 
-------------------------------------------------------------------->

<?php
	include_once '../../php/conexion.php';
	$objeto = new Conexion();
	$conexion = $objeto->Conectar();
	
	$id_sector = $_GET['id_sector'];
	$sentencia = $conexion->prepare("DELETE FROM sectores where id_sector = '$id_sector' ");
	$sentencia->execute();
?>
