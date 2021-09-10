<?php require_once "vistas/parte_superior.php"?>

              <div class="mb-3 align-items-center">
                <div class="card shadow mb-4">
                  <div class="card-header">
                    <strong class="card-title">Formulario Tamaño</strong>
                  </div>
                  <div class="card-body">
                    <form method="post" action="php/insr_data.php" id="form">
                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="inputEmail4">Tamaño</label>
                          <input type="text" class="form-control" name="tama" placeholder="Tamaño">
                        </div>
                        <div class="form-group col-md-6">
                          <input type="hidden" class="form-control" name="form" value="tama">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
  <!-- código propio JS --> 

<?php require_once "vistas/parte_inferior.php"?>