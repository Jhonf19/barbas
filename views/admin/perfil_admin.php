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
                <option value="light">Normal</option>
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
        <a href="?b=home">Ir a la pagina de inicio</a><hr>
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
          </div>
          <br>
          <div class="row">
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
                    <label>Apertura</label>
                    <select class="custom-select" name="h_apertura">
                      <option value="<?php echo $resT->h_apertura; ?>" selected><?php $ha1=substr($resT->h_apertura,0,-2); $ha2=substr($resT->h_apertura,-2); echo $ha1.":00".$ha2; ?></option>
                      <option value="12am">12:00am</option>
                      <option value="1am">1:00am</option>
                      <option value="2am">2:00am</option>
                      <option value="3am">3:00am</option>
                      <option value="4am">4:00am</option>
                      <option value="5am">5:00am</option>
                      <option value="6am">6:00am</option>
                      <option value="7am">7:00am</option>
                      <option value="8am">8:00am</option>
                      <option value="9am">9:00am</option>
                      <option value="10am">10:00am</option>
                      <option value="11am">11:00am</option>
                      <option value="12pm">12:00pm</option>
                      <option value="1pm">1:00pm</option>
                      <option value="2pm">2:00pm</option>
                      <option value="3pm">3:00pm</option>
                      <option value="4pm">4:00pm</option>
                      <option value="5pm">5:00pm</option>
                      <option value="6pm">6:00pm</option>
                      <option value="7pm">7:00pm</option>
                      <option value="8pm">8:00pm</option>
                      <option value="9pm">9:00pm</option>
                      <option value="10pm">10:00pm</option>
                      <option value="11pm">11:00pm</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Cierre</label>
                    <div class="form-group">
                      <select class="custom-select" name="h_cierre">
                        <option value="<?php echo $resT->h_cierre; ?>" selected><?php $hc1=substr($resT->h_cierre,0,-2); $hc2=substr($resT->h_cierre,-2); echo $hc1.":00".$hc2; ?></option>
                        <option value="12am">12:00am</option>
                        <option value="1am">1:00am</option>
                        <option value="2am">2:00am</option>
                        <option value="3am">3:00am</option>
                        <option value="4am">4:00am</option>
                        <option value="5am">5:00am</option>
                        <option value="6am">6:00am</option>
                        <option value="7am">7:00am</option>
                        <option value="8am">8:00am</option>
                        <option value="9am">9:00am</option>
                        <option value="10am">10:00am</option>
                        <option value="11am">11:00am</option>
                        <option value="12pm">12:00pm</option>
                        <option value="1pm">1:00pm</option>
                        <option value="2pm">2:00pm</option>
                        <option value="3pm">3:00pm</option>
                        <option value="4pm">4:00pm</option>
                        <option value="5pm">5:00pm</option>
                        <option value="6pm">6:00pm</option>
                        <option value="7pm">7:00pm</option>
                        <option value="8pm">8:00pm</option>
                        <option value="9pm">9:00pm</option>
                        <option value="10pm">10:00pm</option>
                        <option value="11pm">11:00pm</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <br>
          <button class="btn btn-primary" type="submit" name="button">Guardar Configuración</button>
      </form>
    </div>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Agregar Servicios</h5>
        <a href="?b=home#servicios">Ir a la pagina de inicio</a><hr>
        <form action="?b=addService" method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="servicio" placeholder="Nombre" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="precio" placeholder="Precio" required>
          </div>
          <br>
          <button class="btn btn-primary" type="submit" name="button">Guardar Servicio</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div><br><br>
