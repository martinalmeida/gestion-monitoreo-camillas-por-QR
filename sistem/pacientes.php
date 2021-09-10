<?php require_once "vistas/parte_superior.php"?>
<?php
    require '../php/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    $consulta = "SELECT * FROM pacientes";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

              <div class="col">
                <h4 class="h1">Tabla de Pacientes </h4>
              </div>

              <div class="mb-3 align-items-center">
                  <a href="insertar_paciente.php" class="btn btn-success text-white text-nowrap">Agregar Paciente <i class="fe fe-plus-circle"></i></a>
                  <div class="table-responsive">       
                    <table id="tabla" class="table table-striped table-bordered table-condensed" style="width:100%">
                      <thead class="text-center">
                          <tr>
                              <th style='white-space: nowrap; width: 1px;color: #000'>documento</th>
                              <th style='white-space: nowrap; width: 1px;color: #000'>nombre</th>
                              <th style='white-space: nowrap; width: 1px;color: #000'>apellido</th>
                              <th style='white-space: nowrap; width: 1px;color: #000'>Acciones</th>
                          </tr>
                      </thead>
                      <tbody class="text-center">
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td style='white-space: nowrap; width: 1px;'><?php echo $dat['documento'] ?></td>
                                <td style='white-space: nowrap; width: 1px;'><?php echo $dat['nombre'] ?></td>
                                <td style='white-space: nowrap; width: 1px;'><?php echo $dat['apellido'] ?></td>
                                <td style='white-space: nowrap; width: 1px;'><?php echo "<a href='php/spr_paciente.php?id_paciente=" . $dat['id_paciente'] . "' class='borrar_paciente btn btn-danger'>Borrar</a>"; ?></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>     
                    </table>                    
                  </div>
              </div>
  <!-- código propio JS --> 

<?php require_once "vistas/parte_inferior.php"?>