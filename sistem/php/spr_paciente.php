<!------------------------------------------------------------------
  		Seccion de PHP ( BORRAR modelos) 
-------------------------------------------------------------------->

<?php
	include_once '../../php/conexion.php';
	$objeto = new Conexion();
	$conexion = $objeto->Conectar();
	
	$id_paciente = $_GET['id_paciente'];
	$sentencia = $conexion->prepare("DELETE FROM pacientes where id_paciente = '$id_paciente' ");
	$sentencia->execute();
?>
