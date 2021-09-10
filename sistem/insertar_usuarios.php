<?php require_once "vistas/parte_superior.php"?>

              <div class="mb-3 align-items-center">
                <div class="card shadow mb-4">
                  <div class="card-header">
                    <strong class="card-title">Formulario Usuarios</strong>
                  </div>
                  <div class="card-body">
                    <form method="post" action="php/insr_usr.php" id="form">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Usuario</label>
                          <input type="text" class="form-control" id="inputEmail4" name="usuario" placeholder="Usuario">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Contraseña</label>
                          <input type="password" class="form-control" id="inputPassword4" name="contrase" placeholder="Contraseña">
                        </div>
                        <div class="form-group col-md-12">
                          <label for="inputPassword4">Rol</label>
                          <select class="form-control" name="rol" id="exampleFormControlSelect1">
                            <option value="1">Administrador</option>
                            <option value="2">Supervisor</option>
                          </select>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
  <!-- código propio JS --> 

<?php require_once "vistas/parte_inferior.php"?>