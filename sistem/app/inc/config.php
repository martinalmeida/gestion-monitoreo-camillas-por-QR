<?php
$usuario  = "root";
$password = "Servip.2021";
$servidor = "localhost";
$basededatos = "mesi";
$con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
$con -> set_charset("utf8");
mysqli_query($con,"SET SESSION collation_connection =\'utf8_unicode_ci\'");
$db = mysqli_select_db($con, $basededatos) or die("Error al conectar con la Base de Datos");

?>