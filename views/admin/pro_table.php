<div class="table-responsive">
  <table class="table table-bordered ">
    <thead>
      <th>NOMBRE</th><th>DESCRIPCION</th><th>COSTO</th><th>PRECIO</th><th>STOCK</th><th><i class="fas fa-cog"></i> </th>
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
          <!-- Modal -->
          <div class="modal fade" id="ModalSurtir<?php echo $row->id_producto;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Agregar <?php echo $row->nombre; ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="?b=surtPro" method="post">
                <div class="modal-body">
                    <input type="number" name="cantidad" value="0" placeholder="Cantidad" autofocus>
                    <input type="hidden" name="id_producto" value="<?php echo $row->id_producto; ?>">
                    <input type="hidden" name="stock" value="<?php echo $row->stock; ?>">

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-success">Aceptar</button>
                </div>
              </form>
              </div>
            </div>
          </div>
          <!-- Modal -->
          <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bars"></i>
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="btn btn-block btn-warning" href="?b=editarProducto&prod=<?php echo $row->id_producto; ?>">
                <i class="fas fa-edit"></i> Editar
              </a>
              <a class="btn btn-block btn-danger" href="?b=deletePro&prod=<?php echo $row->id_producto; ?>">
                <i class="fas fa-trash"></i> Eliminar
              </a>
              <a class="btn btn-block btn-success" href="?b=listPro&prod=<?php echo $row->id_producto; ?>"  data-toggle="modal" data-target="#ModalSurtir<?php echo $row->id_producto;  ?>">
                <i class="fas fa-truck"></i> Surtir
              </a>

            </div>
          </div>


        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
