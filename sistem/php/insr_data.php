<?php
include_once '../../php/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//recepción de datos enviados mediante POST
if ($_POST['form'] === 'modelo') {
	$modelo = $_POST['modelo'];
	$consulta = "INSERT INTO modelos VALUES('','$modelo') ";
	$resultado = $conexion->prepare($consulta);
	$resultado->execute();
}
elseif ($_POST['form'] === 'sector') {
	$sector = $_POST['sector'];
	$consulta = "INSERT INTO sectores VALUES('','$sector') ";
	$resultado = $conexion->prepare($consulta);
	$resultado->execute();
}
elseif ($_POST['form'] === 'complejo') {
	$complejo = $_POST['complejo'];
	$consulta = "INSERT INTO complejidad VALUES('','$complejo') ";
	$resultado = $conexion->prepare($consulta);
	$resultado->execute();
}
elseif ($_POST['form'] === 'tama') {
	$tama = $_POST['tama'];
	$consulta = "INSERT INTO tamaño VALUES('','$tama') ";
	$resultado = $conexion->prepare($consulta);
	$resultado->execute();
}
elseif ($_POST['form'] === 'paciente') {
	$documento = $_POST['documento'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$consulta = "INSERT INTO pacientes VALUES('','$documento','$nombre','$apellido') ";
	$resultado = $conexion->prepare($consulta);
	$resultado->execute();
}


