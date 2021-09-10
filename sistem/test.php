<?php  
include_once "app/inc/config.php";
$consulta=mysqli_query($con, "SELECT * FROM historico ");
while ($row = $consulta->fetch_assoc()) { 

  $timeStamp = $row['fecha'];
  $timeStamp = date( "Y/m/d", strtotime($timeStamp));

  $consulta1=mysqli_query($con, "SELECT COUNT(*) total FROM historico WHERE status = 'Ocupado' AND fecha = '" . $row['fecha'] . "' ");
  while ($row1 = $consulta1->fetch_assoc()) { 

    $consulta2=mysqli_query($con, "SELECT COUNT(*) total FROM historico WHERE status = 'Disponible' AND fecha = '" . $row['fecha'] . "' ");
    while ($row2 = $consulta2->fetch_assoc()) { 

      echo " { 'year':".$timeStamp.",
               'cars': ".$row1['total'].", 
               'motorcycles': ".$row2['total'].", 
             }, ";  

    }
  }
} 
?>