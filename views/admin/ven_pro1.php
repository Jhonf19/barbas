<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2 col-sm-12 offset-sm-0 col-xs-12">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title"></h3>
          <form  action="?b=serchPro" method="post">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <button class="btn btn-primary"  type="submit" id="button-addon1">Buscar</button>
              </div>
              <input type="text" name="id" class="form-control" placeholder="Nombre del producto" aria-label="Example text with button addon" aria-describedby="button-addon1" autofocus>
            </div>
            <a class="btn btn-secondary" href="?b=cancelVenta">Cancelar</a>
            <p><b>TOTAL:</b> <?php
             if (isset($_SESSION['mi_venta'])){

               $cant_final =0;
               $pre_final =0;
               $total =0;
                foreach ($_SESSION['mi_venta'] as $key => $row){
                  $total = $total+($row->cantidad * $row->precio);
                  $cant_final = $cant_final + $row->cantidad;
                }
                echo "$".$total;

             }else {
               echo "$0";
             }
             ?></p>
          </form>
          <form action="?b=sell" method="post">
            <button class="btn btn-success" type="submit">Vender</button>

          </form>

          <div class="table-responsive">
            <table class="table table-bordered ">
              <thead>
                <th>NOMBRE</th><th>DESCRIPCION</th><th>PRECIO</th><th>CANTIDAD</th><th> <i class="fas fa-cog"></i> </th>
              </thead>
              <tbody>
                <?php if (isset($_SESSION['mi_venta'])): ?>

                <?php foreach ($_SESSION['mi_venta'] as $i => $valor): ?>

                <tr>
                  <td><?php echo $valor->nombre; ?></td>
                  <td><?php echo $valor->descripcion; ?></td>
                  <td><?php echo $valor->precio; ?></td>
                  <td><?php echo $valor->cantidad; ?></td>
                  <td><a class="btn btn-danger" href="?b=removeCart&id=<?php echo $i; ?>"><i class="fas fa-times"></i></a></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
              </tbody>
            </table>
          </div>
          <!-- <div class="form-group">
            <input type="text" class="form-control" name="nombre" placeholder="Nombre">
          </div> -->

        </div>
      </div>
    </div>
  </div>
</div>
