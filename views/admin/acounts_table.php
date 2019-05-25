<div class="container">
  <div class="card">
    <div class="card-body">
      <div class="dropdown">
      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Filtrar
      </a>

      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="?b=listAcounts">Todas las cuentas</a>
        <a class="dropdown-item" href="?b=listAcounts&list=1">Cuentas Administrador</a>
        <a class="dropdown-item" href="?b=listAcounts&list=2">Cuentas Barberos</a>
        <a class="dropdown-item" href="?b=listAcounts&list=3">Cuentas Clientes</a>
      </div>
    </div>
    </div>
  </div>
</div>
<hr>
<center><h2>Cuentas de usuario</h2></center>
<div class="table-responsive">
  <table class="table table-bordered ">
    <thead>
      <th>NOMBRE DE USUARIO</th><th>CORREO</th> <th>TIPO DE CUENTA</th> <th><i class="fas fa-cog"></i> </th>
    </thead>
    <tbody>
      <?php foreach ($res as $row): ?>

      <tr>
        <td><?php echo $row->nombre." ".$row->apellido; ?></td>
        <td><?php echo $row->correo; ?></td>
        <td><?php echo $row->rol_name; ?></td>
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
                    <input type="hidden" name="id_producto" value="<?php echo $row->id_persona; ?>">
                    <input type="hidden" name="stock" value="<?php  ?>">

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
              <a class="btn btn-block btn-warning" href="?b=editar&prod=<?php echo $row->id_persona; ?>">
                <i class="fas fa-edit"></i> Editar
              </a>
              <a class="btn btn-block btn-danger" href="?b=delete&prod=<?php echo $row->id_persona; ?>">
                <i class="fas fa-trash"></i> Eliminar
              </a>


            </div>
          </div>


        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
