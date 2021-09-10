<?php require_once "vistas/parte_superior.php"?>
<?php
    require '../php/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    $consulta = "SELECT * FROM registros WHERE revisado = 'noRevisada' ";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="col">
  <h4 class="h1">Camillas No Revisadas</h4>
</div>          
              <div class="mb-3 align-items-center">

                  <div class="table-responsive">       
                    <table id="tabla" class="table table-striped table-bordered table-condensed" style="width:100%">
                      <thead class="text-center">
                          <tr>
                              <th style='white-space: nowrap; width: 1px;color: #000'>Camilla</th>
                              <th style='white-space: nowrap; width: 1px;color: #000'>Identificador</th>
                              <th style='white-space: nowrap; width: 1px;color: #000'>Fecha/Hora de Registro</th>
                          </tr>
                      </thead>
                      <tbody class="text-center">
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td style='white-space: nowrap; width: 1px;'><?php echo $dat['Nombre'] ?></td>
                                <td style='white-space: nowrap; width: 1px;'><?php echo $dat['NIP'] ?></td>
                                <td style='white-space: nowrap; width: 1px;'><?php echo $dat['FechaRegistro'] ?></td>
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