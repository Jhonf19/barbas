<div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Mostrar
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="?b=listPub&view=muro">Muro</a>
    <a class="dropdown-item" href="?b=listPub&view=tabla">Tabla</a>
  </div>
</div>
<br><br>
<div class="container">


    <div class="table-responsive">
      <h3 class="text-center">Tabla de Publicaciones</h3>
      <br>
      <table class="table table-bordered text-center">
        <thead>
          <th>FECHA</th><th>TITULO</th><th>TEXTO</th><th> <i class="fas fa-cog"></i> </th>
        </thead>
        <tbody id="miTr">
          <?php foreach ($res as $row): ?>

          <tr>
            <td><?php echo $row->fecha; ?></td>
            <td><?php echo $row->titulo; ?></td>
            <td><?php echo $row->texto; ?></td>
            <td><a  class="btn btn-danger" href="?b=deletePub&pub=<?php echo $row->id_publicacion; ?>&img1=<?php echo $row->img1; ?>&img2=<?php echo $row->img2; ?>&img3=<?php echo $row->img3; ?>&img4=<?php echo $row->img4; ?>"><i class="fas fa-trash"></i></a></td>
          </tr>
        <?php endforeach; ?>

        </tbody>
      </table>
    </div>
    <button id="btn_cargar_mas_table"  name="<?php echo $row->id_publicacion; ?>" type="button" class="btn btn-secondary" >Cargar más</button>

</div>
<br><br>
