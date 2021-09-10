<!------------------------------------------------------------------
  		Seccion de PHP ( BORRAR modelos) 
-------------------------------------------------------------------->

<?php
	include_once '../../php/conexion.php';
	$objeto = new Conexion();
	$conexion = $objeto->Conectar();
	
	$id_tamaño = $_GET['id_tamaño'];
	$sentencia = $conexion->prepare("DELETE FROM tamaño where id_tamaño = '$id_tamaño' ");
	$sentencia->execute();
?>
