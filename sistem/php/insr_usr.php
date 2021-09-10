<?php
include_once '../../php/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//recepción de datos enviados mediante POST desde ajax
$usuario = $_POST['usuario'];
$password = $_POST['contrase'];
$rol = $_POST['rol'];

$pass = md5($password); //encripto la clave enviada por el usuario para compararla con la clava encriptada y almacenada en la BD

$consulta = "INSERT INTO usuario VALUES('','$usuario','$pass','$rol') ";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

