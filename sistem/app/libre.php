<?php require_once('mod/menu.php'); ?>
<div class="row justify-content-center">
    <h5>Marcar como Disponible</h5>
</div>
        <div class="container">

            <div class="row">
                <div class="col-md-6 lector">
                        <div id="preMensaje"><h6>No se encuentra una cámara, asegúrate de tener habilitada una.</h6></div>
                        <canvas id="canvas" hidden></canvas>
                        <div id="datosSalida" hidden>
                            <div id="mensajeSalida"><h6>No se ha detectado ningún código QR...</h6></div>
                            <div hidden><h6>Código:</h6><span id="qrDetectado"></span></div>
                        </div>
                </div>

                <div class="col-sm-1"></div>

                <div class="col-md-5 result">
                        <div id="resultado">
                        </div>
                </div>
            </div>

            	<!--Sonido de Lectura-->
            <div class="sonido">
                <audio controls id="sonido_qr">
                    <source src="sonido/beep.mp3" type="audio/mpeg">
                </audio>
            </div><br><br>

            <h2>Camillas</h2>
            <section id="miTabla">
                <h2>Cargando Registros...</h2>
	        </section>


        </div>

        <div class="footer">
            <div class="row">
                <div class="col-12 cpy">
                    <h5 id="footer-title">Usuario: <?php echo $_SESSION["s_usuario"]?> <a href="scanner.php" class="btn btn-primary text-white text-nowrap">Inicio</a> <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Salir</button></h5>
                </div>

                <div class="col-12 cpy">
                    <h6>Camas-Hospital® 2021</h6>
                </div>
            </div>

        </div>


<!--Scripts-->

<!--Script de Lectura-->
<script src="js/Escaner_qr1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- plugins modal js -->

<!--Scripts-->

<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!--Bootstrap--> 
<script src="../js/apps.js"></script>
</body>
</html>