
        <div class="titulo_datos">
            <h2> Bienvenido</h2><br>
        </div>

        <div class="sda">

        <?php 
            while ($row_expo = mysqli_fetch_array($listado_clientes)) { 
              ?>
            <h2>Camilla:</h2>

            <h5 style="font-size: 20px;"><?php echo $row_expo['Nombre'];?></h5><br><br>

            <h2>Identificador:</h2>

            <h5 style="font-size: 20px;"><?php echo $row_expo['NIP'];?></h5>
                
            <?php } ?>
          
            </div>