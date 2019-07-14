<div class="container">
  <br><br>
  <div class="card">
    <div class="card-body">
      <h3 class="card-title"><center>Nueva publicacion</center></h3>

      <form action="?b=createPub" method="post" enctype="multipart/form-data">

      <div class="form-group">
        <input type="text" class="form-control" name="titulo" placeholder="Titulo" required>
      </div>
      <div class="form-group">
        <textarea class="form-control" name="texto" rows="3" placeholder="Texto" maxlength="999" required></textarea>
      </div>
      <div class="form-group">
        <label>Adjuntar imagen #1</label>
        <input type="file" class="form-control-file" name="img1" required>
        <small class="form-text text-muted">
          El tamaño de las imagenes no puede superar los 8Mb.
        </small>
      </div><hr>
      <div class="form-group">
        <label>Adjuntar imagen #2</label>
        <input type="file" class="form-control-file" name="img2">
      </div><hr>
      <div class="form-group">
        <label>Adjuntar imagen #3</label>
        <input type="file" class="form-control-file" name="img3">
      </div><hr>
      <div class="form-group">
        <label>Adjuntar imagen #4</label>
        <input type="file" class="form-control-file" name="img4">
      </div><hr>

      <button class="btn btn-primary btn-block" type="submit" name="button">Aceptar</button>
      <a class="btn btn-secondary btn-block" href="?b=listPub">Cancelar</a>
    </form>

    </div>
  </div>
</div>
