<?php require_once "vistas/parte_superior.php"?>

              <div class="mb-3 align-items-center">
                <div class="card shadow mb-4">
                  <div class="card-header">
                    <strong class="card-title">Formulario Paciente</strong>
                  </div>
                  <div class="card-body">
                    <form method="post" action="php/insr_data.php" id="form">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Documento/DNI</label>
                          <input type="number" class="form-control" name="documento" placeholder="Numero de documento de identidad">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Nombre</label>
                          <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group col-md-12">
                          <label for="inputPassword4">Apellidos</label>
                          <input type="text" class="form-control" name="apellido" placeholder="Apellidos">
                        </div>
                        <div class="form-group col-md-6">
                          <input type="hidden" class="form-control" name="form" value="paciente">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
  <!-- código propio JS --> 

<?php require_once "vistas/parte_inferior.php"?>