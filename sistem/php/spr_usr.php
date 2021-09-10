<!------------------------------------------------------------------
  		Seccion de PHP ( BORRAR REGISTROS) 
-------------------------------------------------------------------->

<?php
	include_once '../../php/conexion.php';
	$objeto = new Conexion();
	$conexion = $objeto->Conectar();
	
	$id_usuario = $_GET['id_usuario'];
	$sentencia = $conexion->prepare("DELETE FROM usuario where id_usuario = '$id_usuario' ");
	$sentencia->execute();

?>
