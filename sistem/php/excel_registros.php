<!-------------------------------------------------------------------------
    Seccion de PHP ( ACTUALIZAR DATOS - BASE DE DATOS EMPRESAS - GERENCIA ) 
--------------------------------------------------------------------------->

<?php
    require '../../php/conexion.php';
	$objeto = new Conexion();
	$conexion = $objeto->Conectar();

	$consulta = "SELECT * FROM registros";
	$resultado = $conexion->prepare($consulta);
	$resultado->execute();
	$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

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

	foreach($data as $dat) {  

		if ($dat['doc_paciente'] === '0') {
			$txt =  $txt.utf8_decode($dat['patrimonio'].";").
		        utf8_decode($dat['Nombre'].";").
		        utf8_decode($dat['NIP'].";").
		        utf8_decode($dat['last'].";").
		        utf8_decode($dat['FechaRegistro'].";").
		        utf8_decode($dat['complejo'].";").
		        utf8_decode($dat['modelo'].";").
		        utf8_decode($dat['sector'].";").
		        utf8_decode($dat['tamaño'].";").
		        utf8_decode($dat['status'].";").
		        utf8_decode($dat['revisado'].";").
   			    'No Asignado'."\n";
		} else {
			$txt =  $txt.utf8_decode($dat['patrimonio'].";").
		        utf8_decode($dat['Nombre'].";").
		        utf8_decode($dat['NIP'].";").
		        utf8_decode($dat['last'].";").
		        utf8_decode($dat['FechaRegistro'].";").
		        utf8_decode($dat['complejo'].";").
		        utf8_decode($dat['modelo'].";").
		        utf8_decode($dat['sector'].";").
		        utf8_decode($dat['tamaño'].";").
		        utf8_decode($dat['status'].";").
		        utf8_decode($dat['revisado'].";").
   			    utf8_decode($dat['doc_paciente']."\n");
		}
	                                                    
				              }
	// Generar archivo
	$fp = fopen("../temp.csv", "w");
	fwrite($fp, $txt);
	fclose($fp);
	
	header("Location: ../temp.csv");
?>

