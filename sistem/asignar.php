<?php require_once "vistas/parte_superior.php" ?>
<?php
require '../php/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$id = $_GET['id_asignar'];
$consulta = "SELECT * FROM registros WHERE id = '$id' ";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
foreach ($data as $dat) {
?>

  <div class="mb-3 align-items-center">
    <div class="card shadow mb-4">
      <div class="card-header">
        <strong class="card-title">Asignar Paciente a Cama</strong>
      </div>
      <div class="card-body">
        <form method="post" action="php/enviar_asignar.php" class="formulario-update">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Numero Funcional</label>
              <input type="text" disabled class="form-control" value="<?php echo $dat['NIP']; ?>" id="inputEmail4" name="edtfuncional">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Tag ID</label>
              <input type="text" disabled class="form-control" value="<?php echo $dat['Nombre']; ?>" id="inputEmail4" name="edttag">
            </div>
          <?php
        }
        $consulta2 = "SELECT * FROM pacientes ";
        $resultado2 = $conexion->prepare($consulta2);
        $resultado2->execute();
        $data2 = $resultado2->fetchAll(PDO::FETCH_ASSOC);
          ?>
          <div class="form-group col-md-12">
            <label for="inputPassword4">Paciente</label>
            <select class="form-control" name="dto" id="exampleFormControlSelect1">
              <option class="d-none">Ducumento - Nombre - Apellido</option>
              <?php foreach ($data2 as $row) : ?>
                <option value="<?= $row["documento"] ?>"><?= $row["documento"] . "-" . $row["nombre"] . "-" . $row["apellido"] ?>
                </option>
              <?php endforeach ?>
            </select>
            <input type="hidden" name="id" value="<?php echo $_GET['id_asignar']; ?>">
          </div>
          </div>
          <button type="submit" class="btn btn-success text-white">Asignar</button>
          <a href="camillas.php" class="btn btn-danger">Cancelar</a>
        </form>
      </div>
    </div>
  </div>

  <?php require_once "vistas/parte_inferior.php" ?>