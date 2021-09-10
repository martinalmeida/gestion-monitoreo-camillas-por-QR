<div class="table-responsive">  
<table id="example" class="table table-light table-striped table-bordered" style="width:100%">
<thead>
    <tr>
        <th>Tag ID</th>
        <th>Nro Funcional</th>
        <th>Complejo</th>
        <th>Sector</th>
        <th>Estado</th>
        <th>Revisado</th>
    </tr>
</thead>
<tbody>
<?php 
require_once('inc/config.php');
    $consulta = $con->query("SELECT * FROM registros");

    while($row = $consulta->fetch_array()){ ?>
    <tr id="prueba">
        <td><?php  echo $row['Nombre']; ?></td>
        <td><?php  echo $row['NIP']; ?></td>
        <td><?php  echo $row['complejo']; ?></td>
        <td><?php  echo $row['sector']; ?></td>
        <td><?php  echo $row['status']; ?></td>
        <td><?php  echo $row['revisado']; ?></td>
        <?php 
            }
            ?>
    </tr>
</tbody>        
</table>                  
</div>
