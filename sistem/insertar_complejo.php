<?php require_once "vistas/parte_superior.php"?>

              <div class="mb-3 align-items-center">
                <div class="card shadow mb-4">
                  <div class="card-header">
                    <strong class="card-title">Formulario Complejidad</strong>
                  </div>
                  <div class="card-body">
                    <form method="post" action="php/insr_data.php" id="form">
                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="inputEmail4">Complejidad</label>
                          <input type="text" class="form-control" name="complejo" placeholder="Complejidad">
                        </div>
                        <div class="form-group col-md-6">
                          <input type="hidden" class="form-control" name="form" value="complejo">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
  <!-- código propio JS --> 

<?php require_once "vistas/parte_inferior.php"?>