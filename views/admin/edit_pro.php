<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2 col-sm-12 offset-sm-0 col-xs-12">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Editar Producto</h3>
          <form action="?b=editPro" method="post">

          <div class="form-group">
            <label for="">Nombre</label>
            <input type="hidden" name="id_producto" value="<?php echo $res->id_producto; ?>">
            <input type="text" class="form-control" name="nombre" value="<?php echo $res->nombre; ?>"placeholder="Nombre" autofocus>
          </div>
          <div class="form-group">
            <label for="">Descripcion</label>
            <input type="text" class="form-control" name="descripcion" value="<?php echo $res->descripcion; ?>"placeholder="Descripcion">
          </div>
          <div class="form-group">
            <label for="">Costo</label>
            <input type="text" class="form-control" name="costo" value="<?php echo $res->costo; ?>"placeholder="Costo">
          </div>
          <div class="form-group">
            <label for="">Precio</label>
            <input type="text" class="form-control" name="precio" value="<?php echo $res->precio; ?>"placeholder="Precio">
          </div>


          <button class="btn btn-warning btn-block" type="submit" name="button">Aceptar</button>
          <a class="btn btn-secondary btn-block" href="?b=listPro">Cancelar</a>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
