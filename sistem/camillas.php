<?php require_once "vistas/parte_superior.php" ?>
<?php
require '../php/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$consulta = "SELECT * FROM registros";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="col">
  <h4 class="h1">Tabla de Camas </h4>
</div>
<div class="mb-3 align-items-center">
  <a href="insertar_camillas.php" class="btn btn-success text-white text-nowrap">Agregar Cama <i class="fe fe-plus-circle"></i></a> <button class="btn btn-success text-white" type="button" onClick="location.href='php/excel_registros.php'">Excel <i class="fe fe-arrow-down-circle"></i></button>
  <div class="table-responsive">
    <table id="tabla" class="table table-striped table-bordered table-condensed" style="width:100%">
      <thead class="text-center">
        <tr>
          <th style='white-space: nowrap; width: 1px;color: #000'>Nro Patrimonio</th>
          <th style='white-space: nowrap; width: 1px;color: #000'>Tag ID</th>
          <th style='white-space: nowrap; width: 1px;color: #000'>Nro Funcional</th>
          <th style='white-space: nowrap; width: 1px;color: #000'>Last Name</th>
          <th style='white-space: nowrap; width: 1px;color: #000'>Fecha/Hora de Registro</th>
          <th style='white-space: nowrap; width: 1px;color: #000'>Complejidad</th>
          <th style='white-space: nowrap; width: 1px;color: #000'>Modelo</th>
          <th style='white-space: nowrap; width: 1px;color: #000'>Sector</th>
          <th style='white-space: nowrap; width: 1px;color: #000'>Tamaño</th>
          <th style='white-space: nowrap; width: 1px;color: #000'>Estado</th>
          <th style='white-space: nowrap; width: 1px;color: #000'>Revisión</th>
          <th style='white-space: nowrap; width: 1px;color: #000'>Paciente</th>
          <th style='white-space: nowrap; width: 1px;color: #000'>Acciones</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php
        foreach ($data as $dat) {
        ?>
          <tr>
            <td style='white-space: nowrap; width: 1px;'><?php echo $dat['patrimonio'] ?></td>
            <td style='white-space: nowrap; width: 1px;'><?php echo $dat['Nombre'] ?></td>
            <td style='white-space: nowrap; width: 1px;'><?php echo $dat['NIP'] ?></td>
            <td style='white-space: nowrap; width: 1px;'><?php echo $dat['last'] ?></td>
            <td style='white-space: nowrap; width: 1px;'><?php echo $dat['FechaRegistro'] ?></td>
            <td style='white-space: nowrap; width: 1px;'><?php echo $dat['complejo'] ?></td>
            <td style='white-space: nowrap; width: 1px;'><?php echo $dat['modelo'] ?></td>
            <td style='white-space: nowrap; width: 1px;'><?php echo $dat['sector'] ?></td>
            <td style='white-space: nowrap; width: 1px;'><?php echo $dat['tamaño'] ?></td>
            <td style='white-space: nowrap; width: 1px;'><?php echo $dat['status'] ?></td>
            <td style='white-space: nowrap; width: 1px;'><?php echo $dat['revisado'] ?></td>
            <td style='white-space: nowrap; width: 1px;'><?php
                                                          if ($dat['doc_paciente'] === '0') {
                                                            echo 'No Asignado';
                                                          } else {
                                                            echo $dat['doc_paciente'];
                                                          } ?> </td>
            <td style='white-space: nowrap; width: 1px;'><?php echo "<a href='asignar.php?id_asignar=" . $dat['id'] . "' class='btn btn-success text-white'>Asignar</a> 
                                <a href='php/spr_camas.php?id=" . $dat['id'] . "' class='borrar_camillas'><button type='button' class='btn btn-danger'>Borrar</button></a>"; ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
<!-- código propio JS -->

<?php require_once "vistas/parte_inferior.php" ?>