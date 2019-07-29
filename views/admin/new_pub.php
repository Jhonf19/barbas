<div class="container">
  <br><br>
  <div class="row">
    <div class="col-md-6 offset-md-3 col-sm-12 offset-sm-0 col-xs-12">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title text-center">Nueva publicación</h3>
          <form action="?b=createPub" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <input type="text" class="form-control" name="titulo" placeholder="Título" required autofocus>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="texto" rows="3" placeholder="Texto" maxlength="999" required></textarea>
          </div>
          <div class="form-group">
            <h5>Adjuntar imagen #1</h5>
            <input type="file" class="form-control" accept="image/x-png,image/jpg" name="img1" required>
            <small class="form-text"><i class="fas fa-info-circle"></i>
              El tamaño de las imagenes no puede superar los 8Mb.<br>
              Posición movil recomendada <i class="fas fa-mobile-alt align-middle" style="transform: rotate(-90deg); font-size: 3em; padding-left:10px;"></i>
            </small>
          </div><hr>
          <div class="form-group">
            <h5>Adjuntar imagen #2</h5>
            <input type="file" class="form-control" accept="image/x-png,image/jpg" name="img2">
            <small class="form-text"><i class="fas fa-info-circle"></i>
              El tamaño de las imagenes no puede superar los 8Mb.<br>
              Posición movil recomendada <i class="fas fa-mobile-alt align-middle" style="transform: rotate(-90deg); font-size: 3em; padding-left:10px;"></i>
            </small>
          </div><hr>
          <div class="form-group">
            <h5>Adjuntar imagen #3</h5>
            <input type="file" class="form-control" accept="image/x-png,image/jpg" name="img3">
            <small class="form-text"><i class="fas fa-info-circle"></i>
              El tamaño de las imagenes no puede superar los 8Mb.<br>
              Posición movil recomendada <i class="fas fa-mobile-alt align-middle" style="transform: rotate(-90deg); font-size: 3em; padding-left:10px;"></i>
            </small>
          </div><hr>
          <div class="form-group">
            <h5>Adjuntar imagen #4</h5>
            <input type="file" class="form-control" accept="image/x-png,image/jpg" name="img4">
            <small class="form-text"><i class="fas fa-info-circle"></i>
              El tamaño de las imagenes no puede superar los 8Mb.<br>
              Posición movil recomendada <i class="fas fa-mobile-alt align-middle" style="transform: rotate(-90deg); font-size: 3em; padding-left:10px;"></i>
            </small>
          </div><hr>

          <button class="btn btn-primary btn-block" type="submit" name="button">Aceptar</button>
          <a class="btn btn-secondary btn-block" href="?b=listPub">Cancelar</a>
        </form>

        </div>
      </div>
    </div>
  </div>
</div>
<br><br>
