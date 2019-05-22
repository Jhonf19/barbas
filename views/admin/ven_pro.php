<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2 col-sm-12 offset-sm-0 col-xs-12">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title"></h3>
          <form  action="?b=serchPro" method="post">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <button class="btn btn-outline-secondary"  type="submit" id="button-addon1">Buscar</button>
              </div>
              <input type="text" name="id" class="form-control" placeholder="Nombre del producto" aria-label="Example text with button addon" aria-describedby="button-addon1" autofocus>
            </div>
            <button class="btn btn-success" type="button" name="button">Vender</button>
            <p>TOTAL:</p>
          </form>

          <div class="form-group">
            <input type="text" class="form-control" name="nombre" placeholder="Nombre">
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<div class="table-responsive">
  <table class="table table-bordered ">
    <thead>
      <th>NOMBRE</th><th>DESCRIPCION</th><th>PRECIO</th><th>STOCK</th><th> <i class="fas fa-cog"></i> </th>
    </thead>
    <tbody>
      <?php foreach ($res as $row): ?>

      <tr>
        <td><?php echo $row->nombre; ?></td>
        <td><?php echo $row->descripcion; ?></td>
        <td><?php echo $row->precio; ?></td>
        <td><?php echo $row->stock; ?></td>
        <td><a class="btn btn-success" href="?b=deletePro&prod=<?php echo $row; ?>"><i class="fas fa-shopping-cart"></i></a></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
