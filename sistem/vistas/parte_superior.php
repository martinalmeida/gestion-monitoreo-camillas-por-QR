<?php
session_start();

if ($_SESSION["s_usuario"] === null) {
  header("Location: ../index.php");
}elseif ($_SESSION["s_rol"] === '2') {
  header("Location: app/scanner.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Camas-Hospital</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <link rel="stylesheet" href="css/select2.css">
    <link rel="stylesheet" href="css/dropzone.css">
    <link rel="stylesheet" href="css/uppy.min.css">
    <link rel="stylesheet" href="css/jquery.steps.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
  </head>
  <body class="vertical  light  ">
    <div class="wrapper">
      <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>

        <ul class="nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="avatar avatar-sm mt-2">
                <img src="./assets/avatars/icon.png" alt="..." class="avatar-img rounded-circle">
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-sm">Salir</a>
            </div>
          </li>
        </ul>
      </nav>
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.php">
              <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                <g>
                  <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                  <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                  <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                </g>
              </svg>
            </a>
          </div>

          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Administración</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">

            <li class="nav-item dropdown">
              <a href="index.php" class="nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Inicio</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="camillas.php" class="nav-link">
                <i class="fe fe-heart fe-16"></i>
                <span class="ml-3 item-text">Camas</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="pacientes.php" class="nav-link">
                <i class="fe fe-user fe-16"></i>
                <span class="ml-3 item-text">Pacientes</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="recuperar_qr.php" class="nav-link">
                <i class="fe fe-maximize fe-16"></i>
                <span class="ml-3 item-text">Recuperar QR</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="camillas_ocupadas.php" class="nav-link">
                <i class="fe fe-alert-triangle fe-16"></i>
                <span class="ml-3 item-text">Ocupadas</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="camillas_disponibles.php" class="nav-link">
                <i class="fe fe-check-circle fe-16"></i>
                <span class="ml-3 item-text">Disponibles</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="camillas_revisadas.php" class="nav-link">
                <i class="fe fe-eye fe-16"></i>
                <span class="ml-3 item-text">Revisadas</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="camillas_no.php" class="nav-link">
                <i class="fe fe-eye-off fe-16"></i>
                <span class="ml-3 item-text">No revisadas</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="usuarios.php" class="nav-link">
                <i class="fe fe-users fe-16"></i>
                <span class="ml-3 item-text">Usuarios</span>
              </a>
            </li>

          </ul>

          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Datos</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">

            <li class="nav-item dropdown">
              <a href="modelo.php" class="nav-link">
                <i class="fe fe-book-open fe-16"></i>
                <span class="ml-3 item-text">Modelo</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="sectores.php" class="nav-link">
                <i class="fe fe-compass fe-16"></i>
                <span class="ml-3 item-text">Sectores</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="complejidad.php" class="nav-link">
                <i class="fe fe-cpu fe-16"></i>
                <span class="ml-3 item-text">Complejidad</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="tamaño.php" class="nav-link">
                <i class="fe fe-maximize-2 fe-16"></i>
                <span class="ml-3 item-text">Tamaño</span>
              </a>
            </li>
           
          </ul>
        </nav>
      </aside>
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center mb-2">
                <div class="col">
                  <h2 class="h5 page-title">Bienvenido <?php echo $_SESSION["s_usuario"]?>!</h2>
                </div>
                <div class="col-auto">
                  <form class="form-inline">
                    <div class="form-group d-none d-lg-inline">
                      <label for="reportrange" class="sr-only">Date Ranges</label>
                      <div id="reportrange" class="px-2 py-2 text-muted">
                        <span class="small"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-sm" onclick="location.reload()"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                    </div>
                  </form>
                </div>
              </div>