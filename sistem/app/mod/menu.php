<?php
session_start();

if ($_SESSION["s_usuario"] === null) {
  header("Location: ../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Camas-Hospital</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="../css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../css/feather.css">
    <link rel="stylesheet" href="../css/select2.css">
    <link rel="stylesheet" href="../css/dropzone.css">
    <link rel="stylesheet" href="../css/uppy.min.css">
    <link rel="stylesheet" href="../css/jquery.steps.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">
    <link rel="stylesheet" href="../css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="../css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="../css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="../css/app-dark.css" id="darkTheme" disabled>
    <!--Bootstrap-->
    <link rel="stylesheet" href="css/style.css" />
    <title>Camas-Hospital</title>
    <script  src="js/jsQR.js"></script><!--Libreria escaner de código-->


    <script>
    
    function tiempoReal()
    {
      var tabla = $.ajax({
        url:'tabla_consultas.php',
        dataType:'text',
        async:false
      }).responseText;

      document.getElementById("miTabla").innerHTML = tabla;
    }

    setInterval(tiempoReal, 1000);

  </script>

</head>
<body class="vertical  light  ">
    <div class="wrapper">
      <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>

        <ul class="nav">
          <li class="nav-item dropdown">
            <a class="nav-link text-muted pr-0">
              <span class="avatar avatar-sm mt-2">
                <img src="../assets/avatars/icon.png" alt="..." class="avatar-img rounded-circle">
              </span>
            </a>
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
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="scanner.php">
              <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                <g>
                  <polygon class="st0" points="78,105 15,105 24,87 87,87  " />
                  <polygon class="st0" points="96,69 33,69 42,51 105,51   " />
                  <polygon class="st0" points="78,33 15,33 24,15 87,15  " />
                </g>
              </svg>
            </a>
          </div>

          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Supervición</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2"> 

            <li class="nav-item dropdown">
              <a href="scanner.php" class="nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Inicio</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="libre.php" class="nav-link">
                <i class="fe fe-check-circle fe-16"></i>
                <span class="ml-3 item-text">Marcar Disponible</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="ocupada.php" class="nav-link">
                <i class="fe fe-minus-circle fe-16"></i>
                <span class="ml-3 item-text">Marcar Ocupada</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <button type="button" class="btn btn-outline-danger text-gray-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">Salir</button>
            </li>

          </ul>
        </nav>
      </aside>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h3>Que desea hacer?</h3><br><a href="../../php/logout.php" class="btn btn-primary text-white text-nowrap">Salir</a> <button  class="btn btn-secondary text-white text-nowrap" data-bs-dismiss="modal">cancelar</button >
      </div>
    </div>
  </div>
</div>