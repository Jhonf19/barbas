<div class="table-responsive">
  <table class="table table-bordered ">
    <thead>
      <th>NOMBRE</th><th>DESCRIPCION</th><th>COSTO</th><th>PRECIO</th><th>STOCK</th><th> <i class="fas fa-cog"></i> </th>
    </thead>
    <tbody>
      <?php foreach ($res as $row): ?>

      <tr>
        <td><?php echo $row->nombre; ?></td>
        <td><?php echo $row->descripcion; ?></td>
        <td><?php echo $row->costo; ?></td>
        <td><?php echo $row->precio; ?></td>
        <td><?php echo $row->stock; ?></td>
        <td>
          <a class="btn btn-danger" href="?b=deletePro&prod=<?php echo $row->id_producto; ?>">
            <i class="fas fa-trash"></i>
          </a>
          <a class="btn btn-warning" href="?b=editarProducto&prod=<?php echo $row->id_producto; ?>">
            <i class="fas fa-edit"></i>
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
