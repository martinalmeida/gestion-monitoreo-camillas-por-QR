<?php require_once "vistas/parte_superior.php"?>
<?php
    require '../php/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    $consulta = "SELECT * FROM usuario";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

              <div class="col">
                <h4 class="h1">Tabla de Usuarios </h4>
              </div>
              
              <div class="mb-3 align-items-center">
                  <a href="insertar_usuarios.php" class="btn btn-success text-white text-nowrap">Agregar Usuario  <i class="fe fe-plus-circle"></i></a>
                  <div class="table-responsive">       
                    <table id="tabla" class="table table-striped table-bordered table-condensed" style="width:100%">
                      <thead class="text-center">
                          <tr>
                              <th style='white-space: nowrap; width: 1px;color: #000'>Id</th>
                              <th style='white-space: nowrap; width: 1px;color: #000'>Usuario</th>
                              <th style='white-space: nowrap; width: 1px;color: #000'>Contraseña(md5)</th>
                              <th style='white-space: nowrap; width: 1px;color: #000'>Rol</th>
                              <th style='white-space: nowrap; width: 1px;color: #000'>Acciones</th>
                          </tr>
                      </thead>
                      <tbody class="text-center">
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td style='white-space: nowrap; width: 1px;'><?php echo $dat['id_usuario'] ?></td>
                                <td style='white-space: nowrap; width: 1px;'><?php echo $dat['usuario'] ?></td>
                                <td style='white-space: nowrap; width: 1px;'><?php echo $dat['clave'] ?></td>
                                <td style='white-space: nowrap; width: 1px;'><?php 
                                if ($dat['rol'] === '1') {
                                  echo "Administrador";
                                }elseif ($dat['rol'] === '2') {
                                  echo "Supervisor";
                                }
                                 ?></td>
                                <td style='white-space: nowrap; width: 1px;'><?php echo "<a href='php/spr_usr.php?id_usuario=" . $dat['id_usuario'] . "' class='borrar'><button type='button' class='btn btn-danger'>Borrar</button></a>"; ?></td>
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