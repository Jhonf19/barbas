<div class="container col-md-6 offset-md-3 col-sm-12 offset-sm-0 col-xs-12">
  <br><br>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Contraseña</h4>

      <form action="?b=newPass" method="post">

      <div class="form-group">
        <input type="text" class="form-control" name="actual" placeholder="Contraseña Actual" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="nueva" placeholder="Contraseña Nueva" required>
      </div>
      <button class="btn btn-primary" type="submit" name="button">Cambiar contraseña</button>
    </form>
  </div>
</div>
<br><br>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Foto de presentación</h4>
      <img src="app/imgs_perf/<?php echo $_SESSION['barber'][0]->img_perfil ?>" width="100" alt="imagen">
      <form action="?b=changeImgPre" method="post" enctype="multipart/form-data">

      <div class="form-group">
        <input type="file" class="form-control" accept="image/x-png,image/jpg" name="img_perfil" required>
      </div>
      <button class="btn btn-primary" type="submit" name="button">Cambiar foto</button>
    </form>
  </div>
</div>
<br><br>
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Disponibilidad(<?php if ($_SESSION['barber'][0]->estado==1) {
      echo "<span class='text-muted'>Laborando</span>";
    }else{
      echo "<span class='text-muted'>Auscente</span>";
    }  ; ?>)</h4>
    <small><i class="fas fa-info-circle"></i> Permite que los usuarios separen turnos contigo.</small>
    <br><br><p></p>
    <form action="?b=estate_ch" method="post" id="ufg">
    <div class="form-group">
      <select class="form-control" form="ufg" name="estado" required>
        <option selected>Seleccione un Estado</option>
        <option value="1">Laborando</option>
        <option value="0">Auscente</option>
      </select>
    </div>

    <button class="btn btn-primary" type="submit" name="button">Cambiar disponibilidad</button>
  </form>
</div>
</div>
</div>
<br><br>
