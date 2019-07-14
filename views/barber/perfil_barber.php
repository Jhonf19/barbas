<div class="container">
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
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Disponibilidad(<?php if ($_SESSION['barber'][0]->estado==1) {
      echo "Laborando";
    }else{
      echo "Auscente";
    }  ; ?>)</h4>
    <form action="?b=estate_ch" method="post" id="ufg">
    <div class="form-group">
      <select class="form-control" form="ufg" name="estado">
        <option selected>Seleccione un Estado</option>
        <option value="1">Laborando</option>
        <option value="0">Auscente</option>
      </select>
    </div>

    <button class="btn btn-primary" type="submit" name="button">Guardar foto</button>
  </form>
</div>
</div>
</div>
