<?php require_once "vistas/parte_superior.php"?>

              <div class="mb-3 align-items-center">
                <div class="card shadow mb-4">
                  <div class="card-header">
                    <strong class="card-title">Formulario Cama</strong>
                  </div>
                  <div class="card-body">

                      <div class="container">
                        <div class="row">

                            <?php
                        
                        $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
                        $PNG_WEB_DIR = 'temp/';

                        include 'app/inc/config.php';  
                        include "app/inc/phpqrcode/qrlib.php";

                        if (!file_exists($PNG_TEMP_DIR))
                            mkdir($PNG_TEMP_DIR);

                            $filename = $PNG_TEMP_DIR.'test.png';
                            $errorCorrectionLevel = 'M';

                            if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('M','Q','H')))
                                $errorCorrectionLevel = $_REQUEST['level'];    
                                $matrixPointSize = 5;

                                 if (isset($_REQUEST['size']))
                                    $matrixPointSize = min(max((int)$_REQUEST['size'], 5), 10);

                                    if (isset($_REQUEST['Nombre'])) { 

                                        if (trim($_REQUEST['Nombre']) == '')
                                        die('data cannot be empty! <a href="?">Regresar</a>');

                                        $filename = $PNG_TEMP_DIR.'Código '.$_POST['NIP'].'.png';

                                        //Prueba del Número Aleatorio

                                        function password_random($length = 6){
                                            $charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                        
                                            $password = "";
                                            for($i=0;$i<$length;$i++){
                        
                                                $rand = rand() % strlen($charset);
                                                $password .= substr($charset,$rand,1);
                        
                                            }
                                            return $password;
                                        }
                    

                                        //Prueba del Número Aleatorio

                                        $RCode = password_random(50); //echo password_random(50);
                                        $patrimonio = $_POST['patrimonio'];
                                        $Nombre = $_POST['Nombre'];
                                        $NIP = $_POST['NIP'];
                                        $last = $_POST['last'];
                                        $status = $_POST['status'];
                                        $revisado = $_POST['revisado'];
                                        $complejo = $_POST['complejo'];
                                        $modelo = $_POST['modelo'];
                                        $sector = $_POST['sector'];
                                        $tamaño = $_POST['tamaño'];
                                        $ImageQR = $RCode;
                                        $Fecha= date("Y-m-d H:i:s");

                                        $verificar = mysqli_query($con, "SELECT * FROM registros WHERE NIP='$NIP'");

                                        if(mysqli_num_rows($verificar) > 0){

                                            echo "
                                                <html>
                                                    <head>
                                                        <meta http-equiv='Refresh' content='3;url=insertar_camillas.php'>
                    
                                                        <style>
                                                            @import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');

                                                            *{
                                                                font-family: 'Varela Round', sans-serif;
                                                            }
                                                        </style>
                                                    </head>

                                                    <body>
                                                        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>

                                                        <script>
                            
                                                            Swal.fire({
                                                                icon: 'error',
                                                                allowOutsideClick:false,
                                                                title: 'El Nro Funcional ya Existe',
                                                                html: 'Por favor Ingrese otro Nro Funcional',
                                                                showConfirmButton: false
                                                            });
                            
                                                        </script>
                                                    </body>
                                                </html>";
                                                exit();
                                        }


                                            $Insertar = "INSERT INTO registros (patrimonio, RandomCode, Nombre, NIP, last, CodigoQR, status, FechaRegistro, revisado, complejo, modelo, sector, tamaño) VALUES ('$patrimonio', '$RCode', '$Nombre', '$NIP', '$last', '$ImageQR', '$status', '$Fecha', '$revisado', '$complejo', '$modelo', '$sector', '$tamaño')";
                                            $resultado = mysqli_query($con, $Insertar);

                                            if(!$resultado){
                                                echo 'error al registrar';
                        
                                            }else{
                    
                                                //echo "felicidades, registro guardado";
                                            }

                                            //QRcode::png($Nombre.",".$Telefono.", ".$DNI.", ".$Direccion, $filename, $errorCorrectionLevel, $matrixPointSize, 2); 
                                            QRcode::png($RCode, $filename, $errorCorrectionLevel, $matrixPointSize, 2); 

                                        } else {    

                                            QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    

                                        }  

                            $consulta1="SELECT * FROM complejidad ";
                            $ejecutar1=mysqli_query($con,$consulta1) OR die (mysqli_error($con)); 

                            $consulta2="SELECT * FROM modelos ";
                            $ejecutar2=mysqli_query($con,$consulta2) OR die (mysqli_error($con)); 

                            $consulta3="SELECT * FROM sectores ";
                            $ejecutar3=mysqli_query($con,$consulta3) OR die (mysqli_error($con)); 

                            $consulta4="SELECT * FROM tamaño ";
                            $ejecutar4=mysqli_query($con,$consulta4) OR die (mysqli_error($con)); 

                            echo '
                            <div class="col-lg-6 Generador">

                                <h5>Registrar Cama</h5>

                                <form id="form-register" action="insertar_camillas.php" method="post">
                                        
                                    <input type="text" name="patrimonio" placeholder="Numero Patrimonial" required class="form-control"><br>
                                    <input type="text" name="Nombre" placeholder="Tag ID" required class="form-control"><br>
                                    <input type="number" name="NIP" placeholder="Numero Funcional" required class="form-control"><br>
                                    <input type="text" name="last" placeholder="Last Name" required class="form-control"><br>

                                    <input type="hidden" name="status" value="Disponible" required class="form-control">
                                    <input type="hidden" name="revisado" value="noRevisada" required class="form-control">

                                    <select class="form-control" name="complejo" required>
                                      <option value="">Seleccione la Complejidad</option>';

                                      foreach ($ejecutar1 as $opciones1){
                                        echo '<option value="'.$opciones1["complejo"].'">'.$opciones1["complejo"].'</option>';
                                      }

                                    echo '
                                      
                                    </select><br>

                                    <select class="form-control" name="modelo" required>
                                      <option value="">Seleccione el Modelo</option>';

                                      foreach ($ejecutar2 as $opciones2){
                                        echo '<option value="'.$opciones2["modelo"].'">'.$opciones2["modelo"].'</option>';
                                      }

                                    echo '
                                      
                                    </select><br>

                                    <select class="form-control" name="sector" required>
                                      <option value="">Seleccione el Sector</option>';

                                      foreach ($ejecutar3 as $opciones3){
                                        echo '<option value="'.$opciones3["sector"].'">'.$opciones3["sector"].'</option>';
                                      }

                                    echo '
                                      
                                    </select><br>

                                    <select class="form-control" name="tamaño" required>
                                      <option value="">Seleccione el Tamaño</option>';

                                      foreach ($ejecutar4 as $opciones4){
                                        echo '<option value="'.$opciones4["tamaño"].'">'.$opciones4["tamaño"].'</option>';
                                      }

                                    echo '
                                      
                                    </select><br>

                                    <h5 id="CT">Seleccionar Calidad y Tamaño del QR</h5>

                                    <select name="level" class="form-control">
                        
                                        <option value="M"'.(($errorCorrectionLevel=='M')?' selected':'').'>Baja calidad</option>
                                        <option value="Q"'.(($errorCorrectionLevel=='Q')?' selected':'').'>Media calidad</option>
                                        <option value="H"'.(($errorCorrectionLevel=='H')?' selected':'').'>Excelente calidad</option>
                                    </select><br>

                                    <select name="size" class="form-control">';
                        
                                        for($i=7;$i<=10;$i++)
                                        echo '<option value="'.$i.'"'.(($matrixPointSize==$i)?' selected':'').'>'.$i.'</option> <br>';

                                    echo '</select><br><br>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <a class="btn btn-info text-white" href="recuperar_qr.php">Recuperación de Código</a>
                                        </div>
                                        <div class="col-lg-6">
                                            <input class="btn btn-success text-white" type="submit" value="Registrar y GenerarQR">
                                        </div>
                                    </div>
                                </form>
                            </div>';


                            echo '
                                <div class="col-lg-6 Resultado">
                                    <h3 class="TituloResultado">Descarga el Código</h3>

                                    <center><img class="qr" src="'.$PNG_WEB_DIR.basename($filename).' " /><br><!--<p>Código de Prueba</p>--><br></center>
                                    <center> <a class="btn btn-primary text-white" id="descarga" href="'.$PNG_WEB_DIR.basename($filename).'" download>Descargar QR</a>
                                    <br><br>
                                    <p>Nota: si descargas el QR y te marca algún <br>error ingresa a "Recuperación de Codigo".</p> 
                                    </center>
                                </div>
                            ';

                ?>

                        </div>
                    </div>
                  </div>
                </div>
              </div>
              
  <!-- código propio JS --> 

<?php require_once "vistas/parte_inferior.php"?>