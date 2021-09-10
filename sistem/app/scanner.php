<?php require_once('mod/menu.php'); ?>

<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 100%;
}
</style>

<div class="row justify-content-center">
    <h5>Usuario: <?php echo $_SESSION["s_usuario"]?></h5>
</div>

<div class="row justify-content-center">
    <div class="card">
        <div class="card-body">
          <!-- HTML -->
          <div id="chartdiv"></div>
        </div>
    </div>   
</div>

<div class="container">
    <h2>Camillas</h2>
    <section id="miTabla">
        <h2>Cargando Registros...</h2>
  </section>
</div>

<div class="row">
    <div class="col-12 cpy">
        <h6>Camas-Hospital® 2021</h6>
    </div>
</div>

<!--Scripts-->

<!--Script de Lectura-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- plugins modal js -->

<!--Scripts-->

<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!--Bootstrap--> 
<script src="../js/apps.js"></script>
<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/material.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

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
include_once "inc/config.php";
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
</body>
</html>