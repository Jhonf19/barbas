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
        <td><?php echo "$".$row->precio; ?></td>
        <td><?php echo $row->stock; ?></td>
        <td>
          <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-shopping-cart"></i> <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" >
              <form action="?b=addCart" method="post">
              <p class="dropdown-item">CANTIDAD</p>
              <div class="dropdown-divider"></div>
              <div class="input-group mb-3">
                  <input type="hidden" name="obj" value='<?php echo serialize($row); ?>'>
                  <input class="form-control" type="text" name="cantidad" value="1" placeholder="0" autofocus>
                  <div class="input-group-append">
                    <button class="btn btn-success" type="submit">ok</button>
                  </div>
              </div>
            </form>

            </div>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
