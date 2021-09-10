<?php
include("inc/config.php");
$CodigoIngreso = $_REQUEST['codigo'];
$BuscarCodigo   = ("SELECT * FROM registros WHERE RandomCode='".$CodigoIngreso."' LIMIT 1");
$resultado  = mysqli_query($con, $BuscarCodigo);
$cantidadExistente    = mysqli_num_rows($resultado);
$InfoCodigo 	  = mysqli_fetch_array($resultado);
echo "<br><br>";

$status ='Ocupada';
if (!empty($cantidadExistente)) { 
if($InfoCodigo['status'] != $status){
$cambiarStatus = ("UPDATE registros SET revisado = 'Revisada', status ='" . $status . "'  WHERE RandomCode='".$CodigoIngreso."'");
$resStatu =    mysqli_query($con,$cambiarStatus);

$fecha = date('Y-m-d h:i:s a', time());
$historico = ("INSERT INTO historico (fecha, status, revisado, RandomCode) VALUES ('$fecha', '$status', 'Revisada', '$CodigoIngreso')");
$resHis =    mysqli_query($con,$historico);

$sql = ("SELECT * FROM registros WHERE RandomCode='".$CodigoIngreso."' ");
$listado_clientes = mysqli_query($con, $sql);
include('salida_datos.php');
}else{ ?>
	<div class="mensaje_registro_existente">
        <h1>El Código de</h1>
        <h3 style="color: red;"><?php echo $InfoCodigo['Nombre']; ?></h3>
       <h4 style="color: red;">Ya ha sido Escaneado</h4>
    </div>
	<?php }
}else{ ?>
	 	<div class="mensaje_registro_no_existente">
           <h1 style="color: red;">No hay Registro de</h1>
			<h3 style="color: red;">(<?php echo $CodigoIngreso; ?>)</h3>
        </div>
<?php } ?>