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
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Configurar Pagina de Inicio</h4>

        <form action="?b=createPub" method="post" enctype="multipart/form-data">

          <div class="row">

            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Nombre de la Barberia</h5>
                  <div class="form-group">
                    <input type="text" class="form-control" name="nueva"  required>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Imagen Principal</h5>
                  <div class="form-group">
                    <input type="file" class="form-control" name="nueva"  required>
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
                    <textarea class="form-control" name="texto" rows="3" placeholder="Texto" maxlength="999" required></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Contactos</h5>
                  <div class="form-group">
                    <textarea class="form-control" name="texto" rows="3" placeholder="Texto" maxlength="999" required></textarea>
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
