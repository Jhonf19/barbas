<div class="container">
<div class="row">
  <div class="col-md-12">
    <br><br>
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Cambiar contraseña</h4>

        <form action="?b=newPass" method="post">

        <div class="form-group">
          <input type="text" class="form-control" name="actual" placeholder="Contraseña Actual" required>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="nueva" placeholder="Contraseña Nueva" required>
        </div>
        <button class="btn btn-primary" type="submit" name="button">Guardar cambios</button>
      </form>
    </div>
  </div>
  <br><br>
  </div>
</div>

<div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Cambiar Tema</h4>
          <form id="fnb2" action="?b=changeTheme"  method="post">
            <div class="form-group">
              <select class="form-control" form="fnb2" name="tema">
                <option selected>Seleccione un Tema</option>
                <option value="nomrmal">Normal</option>
                <option value="dark">Nocturno</option>
                <option value="3">otro</option>
              </select>
            </div>
            <button class="btn btn-primary" type="submit">Aplicar</button>
          </form>
        </div>
      </div>
    </div>
</div><br><br>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Configurar Pagina de Inicio</h4>
        <a href="?b=home">Ir a la pagina de inicio</a><br>
        <form action="?b=changeContentSPA" method="post" enctype="multipart/form-data">

          <div class="row">

            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Nombre de la Barberia</h5>
                  <div class="form-group">
                    <input type="text" class="form-control" name="nombar" value="<?php echo $resT->nombre_barberia; ?>" >
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Imagen Principal</h5>
                  <div class="card-img-top">
                    <img src="<?php echo $resT->img_post; ?>" width="100%" alt="Poster">
                  </div><br>
                  <h5 for="">Cambiar Imagen</h5>
                  <small class="form-text text-muted">
                    <i class="fas fa-info-circle"></i>
                    El tamaño de las imagenes no puede superar los 8Mb.
                  </small>
                  <div class="form-group">
                    <input type="file" class="form-control" name="img_post" accept="image/x-png,image/jpg"  >
                  </div>
                </div>
              </div>
            </div>

          </div>
          <br>
          <div class="row">

            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Reseña</h5>
                  <div class="form-group">
                    <textarea class="form-control" name="resena" rows="3"  maxlength="999" ><?php echo $resT->resena; ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Teléfono</h5>
                  <div class="form-group">
                    <input type="text" class="form-control" name="telefono" value="<?php echo $resT->telefono; ?>">
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Direción</h5>
                  <div class="form-group">
                    <input type="text" class="form-control" name="direccion" value="<?php echo $resT->direccion; ?>"  >
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Horario</h5>
                  <div class="form-group">
                    <input type="text" class="form-control" name="horario" value="<?php echo $resT->horario; ?>"  >
                  </div>
                </div>
              </div>
            </div>

          </div>


          <button class="btn btn-primary" type="submit" name="button">Guardar Cambios</button>
      </form>
    </div>
    </div>
  </div>
</div>
</div>
