<div class="container col-md-6 offset-md-3 col-sm-12 offset-sm-0 col-xs-12"><br>
   <p>Selecciona las fotos o toma una pulsando <b>Seleccionar archivo</b> y<br>luego pulsa <b>Guardar A/D.</b> </p>
<small>

     <p ><i class="fas fa-info-circle"></i> Posición movil recomendada <i class="fas fa-mobile-alt align-middle" style="transform: rotate(-90deg); font-size: 3em; padding-left:10px;"></i></p>
   </small>

  <form action="?b=saveAD" method="post" enctype="multipart/form-data">

  <div class="form-group card">
    <h5 for=""><b>Antes</b></h5>
    <input type="file" class="form-control-file" name="ant"  accept="image/x-png,image/jpg" required>
    <small class="form-text text-muted">
      <i class="fas fa-info-circle"></i>
      El tamaño de las imagenes no puede superar los 8Mb.
    </small>
  </div>
  <div class="form-group card">
    <h5 for=""><b>Después</b></h5>
    <input id="miFile1" type="file" class="form-control-file" name="des"  accept="image/x-png,image/jpg" required>
    <small class="form-text text-muted">
      <i class="fas fa-info-circle"></i>
      El tamaño de las imagenes no puede superar los 8Mb.
    </small>
  </div>

  <a class="btn btn-secondary" href="?b=perfil"  type="button" name="button">Volver</a>
  <button id="uy" class="btn btn-primary"  type="submit" name="button">Guardar A/D</button>
  </form>
</div><br><br>
