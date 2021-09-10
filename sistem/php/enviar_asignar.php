<?php
include_once '../app/inc/config.php';


    echo  $id = $_POST['id'];
    echo $datos = $_POST['dto'];
/*
    $consulta = "UPDATE registros SET doc_paciente = '$datos' WHERE  id = '$id' ";
	$resultado = $conexion->prepare($consulta);
	$resultado->execute();
    */
    $update =  mysqli_query($con,"UPDATE  registros SET status = 'Ocupada',  doc_paciente = '$datos' WHERE id = '$id'");
    ?>
