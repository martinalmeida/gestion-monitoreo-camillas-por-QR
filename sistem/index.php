<?php require_once "vistas/parte_superior.php"?>
<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 350px;
}
#chartdiv2 {
  width: 100%;
  height: 350px;
}
</style>

              <div class="mb-3 align-items-center">
                <div class="card-deck">
                  <div class="card text-dark bg-light mb-3" style="max-width: 18rem;" style="cursor: pointer;" onclick="window.location='camillas.php';">
                    <div class="card-header">CAMAS TOTALES</div>
                    <div class="card-body text-center">
                      <h1>
                        <?php         
                          require '../php/conexion.php';
                          $objeto = new Conexion();
                          $conexion = $objeto->Conectar();
                          $consulta = "SELECT COUNT(*) total FROM registros ";
                          $resultado = $conexion->prepare($consulta);
                          $resultado->execute();
                          $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
                          echo '<h1 class="h1 text-dark">'.$data[0]['total'].'</h1>';
                          ?> 
                      </h1>
                    </div>
                  </div>
                  <div class="card text-dark bg-light mb-3" style="max-width: 18rem;" style="cursor: pointer;" onclick="window.location='pacientes.php';">
                    <div class="card-header">PACIENTES</div>
                    <div class="card-body text-center">
                      <h1>
                        <?php         
                          $consulta = "SELECT COUNT(*) total FROM pacientes ";
                          $resultado = $conexion->prepare($consulta);
                          $resultado->execute();
                          $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
                          echo '<h1 class="h1 text-dark">'.$data[0]['total'].'</h1>';
                          ?> 
                      </h1>
                    </div>
                  </div>
                  <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Escaneos Hoy</div>
                    <div class="card-body text-center">
                      <h1>
                        <?php    
                          $fecha = date('Y-m-d 00:00:00 a');    
                          $consulta = "SELECT COUNT(*) total FROM historico WHERE fecha >= '" . $fecha . "' ";
                          $resultado = $conexion->prepare($consulta);
                          $resultado->execute();
                          $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
                          echo '<h1 class="h1 text-dark">'.$data[0]['total'].'</h1>';
                          ?> 
                      </h1>
                    </div>
                  </div>
                  <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
                    <a data-toggle="modal" href="#mi_modal4" class="text-dark" style="text-decoration-line: none;">
                    <div class="card-header">REPORTE EXCEL</div>
                    <div class="card-body text-center">
                      <h1 class="text-dark">
                        <i class="fe fe-clipboard fe-32"></i>
                      </h1>
                    </div>
                    </a>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-8">
                  <div class="card">
                    <div class="card-body">
                      <!-- HTML -->
                      <div id="chartdiv2"></div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="card">
                    <div class="card-body">
                      <div id="chartdiv"></div>
                    </div>
                  </div>
                </div>
              </div>



<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/material.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>


<!-- Chart Revisadas -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv2", am4charts.XYChart);

chart.data = [
<?php  
include_once "app/inc/config.php";
$consulta=mysqli_query($con, "SELECT * FROM historico ");
while ($row = $consulta->fetch_assoc()) { 

  $timeStamp = $row['fecha'];
  $timeStamp = date( "Y/m/d", strtotime($timeStamp));

  $consulta1=mysqli_query($con, "SELECT COUNT(*) total FROM historico WHERE status = 'Ocupada' AND fecha = '" . $row['fecha'] . "' ");
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
];

chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";
var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
dateAxis.renderer.minGridDistance = 60;
dateAxis.startLocation = 0.5;
dateAxis.endLocation = 0.5;
dateAxis.baseInterval = {
  timeUnit: "year",
  count: 1
}

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.tooltip.disabled = true;

var series = chart.series.push(new am4charts.LineSeries());
series.dataFields.dateX = "year";
series.name = "Disponibles";
series.dataFields.valueY = "cars";
series.tooltipHTML = "<i class='fe fe-check-circle text-dark'></i><span style='font-size:14px; color:#000000;'><b>{valueY.value}</b></span>";
series.tooltipText = "[#000]{valueY.value}[/]";
series.tooltip.background.fill = am4core.color("#FFF");
series.tooltip.getStrokeFromObject = true;
series.tooltip.background.strokeWidth = 3;
series.tooltip.getFillFromObject = false;
series.fillOpacity = 0.6;
series.strokeWidth = 2;
series.stacked = true;

var series2 = chart.series.push(new am4charts.LineSeries());
series2.name = "Ocupadas";
series2.dataFields.dateX = "year";
series2.dataFields.valueY = "motorcycles";
series2.tooltipHTML = "<i class='fe fe-minus-circle text-dark'></i><span style='font-size:14px; color:#000000;'><b>{valueY.value}</b></span>";
series2.tooltipText = "[#000]{valueY.value}[/]";
series2.tooltip.background.fill = am4core.color("#FFF");
series2.tooltip.getFillFromObject = false;
series2.tooltip.getStrokeFromObject = true;
series2.tooltip.background.strokeWidth = 3;
series2.sequencedInterpolation = true;
series2.fillOpacity = 0.6;
series2.stacked = true;
series2.strokeWidth = 2;

chart.cursor = new am4charts.XYCursor();
chart.cursor.xAxis = dateAxis;
chart.scrollbarX = new am4core.Scrollbar();

// Add a legend
chart.legend = new am4charts.Legend();
chart.legend.position = "top";

// axis ranges
var range = dateAxis.axisRanges.create();
range.date = new Date(2019, 0, 1);
range.endDate = new Date(2020, 0, 1);
range.axisFill.fill = chart.colors.getIndex(7);
range.axisFill.fillOpacity = 0.2;

range.label.text = "Camas Ocupadas ";
range.label.inside = true;
range.label.rotation = 90;
range.label.horizontalCenter = "right";
range.label.verticalCenter = "bottom";

var range2 = dateAxis.axisRanges.create();
range2.date = new Date(2022, 0, 1);
range2.grid.stroke = chart.colors.getIndex(7);
range2.grid.strokeOpacity = 0.6;
range2.grid.strokeDasharray = "5,2";


range2.label.text = "Camas Disponibles";
range2.label.inside = true;
range2.label.rotation = 90;
range2.label.horizontalCenter = "right";
range2.label.verticalCenter = "bottom";

}); // end am4core.ready()
</script>



<!-- GRAFICA DE TORTA PARA ESTADO DE CAMAS -->
<script>
am4core.ready(function() {
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end
var chart = am4core.create("chartdiv", am4charts.PieChart);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in
chart.data = [
<?php  
$consulta=mysqli_query($con, "SELECT COUNT(*) total FROM registros WHERE status = 'Disponible' ");
while ($row = $consulta->fetch_assoc()) { 
   echo " { 'camillas':'Disponibles', 'total': ".$row['total']." }, ";  
} 
?> 
<?php  
$consulta=mysqli_query($con, "SELECT COUNT(*) total FROM registros WHERE status = 'Ocupada' ");
while ($row = $consulta->fetch_assoc()) { 
   echo " { 'camillas':'Ocupadas', 'total': ".$row['total']." }, ";  
} 
?>  
];
chart.radius = am4core.percent(70);
chart.innerRadius = am4core.percent(40);
chart.startAngle = 180;
chart.endAngle = 360;  
var series = chart.series.push(new am4charts.PieSeries());
series.dataFields.value = "total";
series.dataFields.category = "camillas";
series.slices.template.cornerRadius = 10;
series.slices.template.innerCornerRadius = 7;
series.slices.template.draggable = true;
series.slices.template.inert = true;
series.alignLabels = false;
series.hiddenState.properties.startAngle = 90;
series.hiddenState.properties.endAngle = 90;
chart.legend = new am4charts.Legend();
}); // end am4core.ready()
</script>




<div class="container">

  <!-- Modales de reportes finales-->

  <div class="modal fade  bd-example-modal-lg" id="mi_modal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <div class="col text-center">
            <h4 class="h3">Reporte de Camillas (Disponibilidad - Revisiones) </h4>
          </div>
        </div>
        <div class="modal-body ">
          <form action="php/reporte.php" method="POST" enctype="multipart/form-data">
            <div class="form-row p-3 m-3">
              <?php
              $consulta2 = "SELECT * FROM registros ";
              $resultado2 = $conexion->prepare($consulta2);
              $resultado2->execute();
              $data2 = $resultado2->fetchAll(PDO::FETCH_ASSOC);
              ?>
              <div class="col-sm-12 col-md-4">
                <label class="text-dark h5">Cama</label>
                <select class="form-control" name="cama" required>
                  <option class="d-none">Nro Funcional - Last Name</option>
                  <?php foreach ($data2 as $row) : ?>
                    <option value="<?= $row["NIP"] ?>"><?= $row["NIP"] . "-" . $row["last"] ?>
                    </option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="col-sm-12 col-md-4">
                <label class="text-dark h5">Revisión</label>
                <select class="form-control" name="revista" required>
                  <option class="d-none">Seleccione la revisión</option>
                  <option value="Revisada">Revisada</option>
                  <option value="noRevisada">No Revisado</option>
                </select>
              </div>

              <div class="col-sm-12 col-md-4">
                <label class="text-dark h5">Disponibilidad</label>
                <select class="form-control" name="disponible" required>
                  <option class="d-none">Seleccione la disponibilidad</option>
                  <option value="Disponible">Disponible</option>
                  <option value="Ocupada">Ocupada</option>
                </select>
              </div>
            </div>
            <br>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success text-white">Generar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once "vistas/parte_inferior.php"?>