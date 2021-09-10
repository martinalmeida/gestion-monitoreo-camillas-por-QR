<?php
    include '../app/inc/config.php';
    
	$cama = $_POST['cama'];
	$revista = $_POST['revista'];
	$disponible = $_POST['disponible'];

	$sql = "SELECT * FROM registros WHERE NIP = ? AND revisado = ? AND status = ? ";
	$consulta = mysqli_prepare($con,$sql);
	$params = array($cama,$revista);
	mysqli_stmt_bind_param($consulta,"sss",$cama,$revista,$disponible);
	mysqli_stmt_execute($consulta);
	$result = mysqli_stmt_get_result($consulta);

	$txt = "";
	
	$txt =  $txt.'NRO PATRIMONIO'.";".
	            'TAG ID'.";".
	            'NRO FUNCIONAL'.";".
	            'LAST NAME'.";".
	            'FECHA/HORA'.";".
	            'COMPLEJIDAD'.";".
	            'MODELO'.";".
	            'SECTOR'.";".
	            'TAMAÑO'.";".
	            'ESTADO'.";".
	            'REVISION'.";".
   			    'PACIENTE'."\n";

	while ($registro = mysqli_fetch_assoc($result)) {

		$txt =  $txt.utf8_decode($registro['patrimonio'].";").
	        utf8_decode($registro['Nombre'].";").
	        utf8_decode($registro['NIP'].";").
	        utf8_decode($registro['last'].";").
	        utf8_decode($registro['FechaRegistro'].";").
	        utf8_decode($registro['complejo'].";").
	        utf8_decode($registro['modelo'].";").
	        utf8_decode($registro['sector'].";").
	        utf8_decode($registro['tamaño'].";").
	        utf8_decode($registro['status'].";").
	        utf8_decode($registro['revisado'].";").
			    utf8_decode($registro['doc_paciente']."\n");                    
				              }
	// Generar archivo
	$fp = fopen("../temp.csv", "w");
	fwrite($fp, $txt);
	fclose($fp);
	
	header("Location: ../temp.csv");
?>