<?php require_once "vistas/parte_superior.php"?>

              <div class="mb-3 align-items-center">
                <div class="card shadow mb-4">
                  <div class="card-header">
                    <strong class="card-title">Recuperar el QR Code de Camilla</strong>
                  </div>
                  <div class="card-body">
                    <div class="container">

                        <div class="row">
                            <div class="col-lg-6 form">
                                    <form action="recuperar_qr.php" method="POST">
                                        <h3>Ingresa el Identificador</h3>
                                        <input type="text" name="NIP" placeholder="Identificador unico" class="form-control"><br>
                                        <input class="btn btn-primary" type="submit" value="Buscar">
                                    </form>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5 result">
                                
                                <?php
                                error_reporting(0);
                                include ("app/inc/config.php");
                                $NIP = $_POST['NIP'];


                                $consulta = $con->query("SELECT * FROM registros WHERE NIP = '$NIP'");

                                while($row = $consulta->fetch_array()){ ?>
                                    <!--echo $row['NombreNino'].'<br>' ; -->
                                    <h3>Descarga el Código de:</h3>
                                    <p><?php echo $row['Nombre']; ?></p>
                                    <a href="temp/Código <?php echo $row['NIP'] ?>.png" download><img style="width: 200px;" src="temp/Código <?php echo $row['NIP'] ?>.png" alt=""></a>
                                    <p>Da Click en la Imagen para Descargar el Código.</p>
                                    <?php 
                                    }
                                    ?>
                            </div>
                        </div>

                    </div>
                  </div>
                </div>
              </div>
              
  <!-- código propio JS --> 

<?php require_once "vistas/parte_inferior.php"?>