<div class="container col-md-6 offset-md-3 col-sm-12 offset-sm-0 col-xs-12"><br>
    <p ><i class="fas fa-info-circle"></i> Toma las fotos y luego adjunta las 3 que mas te gusten para el <b>Antes</b> y/o <b>Despúes</b> desde galería.</p>

    <div class="form-group card">
      <div class="card-body">
        <form action="?b=saveBefore" method="post" enctype="multipart/form-data">
        <h5 class="card-title"><b>Crear un Antes</b></h5>
        <div class="from-group">
          <input type="text" name="docA" required class="form-control" placeholder="Documento del Usuario">
        </div>
        <br>
        <div class="form-group">
          <input type="file" class="form-control-file" multiple name="ant[]"  accept="image/x-png,image/jpg" required>
        </div>
        <button id="uy" class="btn btn-primary"  type="submit" name="button">Guardar</button>
        <small class="form-text text-muted">
          <i class="fas fa-info-circle"></i>
          El tamaño de las imagenes no puede superar los 8Mb.
        </small>
      </form>
      </div>
    </div>

    <div class="form-group card">
      <div class="card-body">
        <form action="?b=saveAfter" method="post" enctype="multipart/form-data">
        <h5 class="card-title"><b>Crear un Después</b></h5>
        <div class="form-group">
          <input type="text" name="docD" required class="form-control" placeholder="Documento del Usuario">
        </div>
        <br>
        <div class="form-group">
          <input id="miFile1" type="file" class="form-control-file" multiple name="des[]" maxlength="3"  accept="image/x-png,image/jpg" required>
        </div>
        <a class="btn btn-secondary" href="?b=perfil"  type="button" name="button">Volver</a>
        <button id="uy1" class="btn btn-primary"  type="submit" name="button">Guardar</button>
        <small class="form-text text-muted">
          <i class="fas fa-info-circle"></i>
          El tamaño de las imagenes no puede superar los 8Mb.
        </small>
        </form>
      </div>
    </div>

</div><br><br>
