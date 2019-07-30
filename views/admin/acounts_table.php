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
<h3 class="text-center">Cuentas de usuario</h3>
<div class="table-responsive">
  <table class="table table-bordered text-center">
    <thead>
      <th>NOMBRE DE USUARIO</th><th>CORREO</th> <th>TIPO DE CUENTA</th><th>ESTADO</th> <th><i class="fas fa-cog"></i> </th>
    </thead>
    <tbody>
      <?php foreach ($res as $row): ?>

      <tr>
        <td><?php echo $row->nombre." ".$row->apellido; ?></td>
        <td><?php echo $row->correo; ?></td>
        <td><?php echo $row->rol_name; ?></td>
        <td><?php  if ($row->estado==1) {
          echo "Activo";
          $x="Deshabilitar";
          $y="warning";
        }else {
          echo "Inactivo";
          $x="Habilitar";
          $y="success";
        } ?></td>
        <td>

          <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bars"></i>
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="btn btn-block btn-<?php echo $y ;?>" href="?b=editarAcount&acc=<?php echo $row->id_persona; ?>&list=<?php echo $row->rol; ?>">
                <i class="fas fa-edit"></i> <?php echo $x; ?>
              </a>

            </div>
          </div>


        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div><br><br>
