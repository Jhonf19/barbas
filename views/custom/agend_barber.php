<center><h2>Tabla de Turnos</h2></center>
<a class="btn btn-info" href="?b=createTurn&cita=<?php echo $_GET['cita'] ?>">
  <i class="fas fa-book"></i> Tomar turno
</a>
<div class="table-responsive">
  <table class="table table-bordered ">
    <thead>
      <th>#</th> <th>INFO</th> <th><i class="fas fa-cog"></i> </th>
    </thead>
    <tbody>
      <?php foreach ($res as $key => $row): ?>

      <tr>
        <td><?php echo $key+1 ?></td>
        <td><?php if ($row->cliente==$_SESSION['custom'][0]->id_persona) {
          echo  "YO";
        }else {
          echo "OTRO";
        }  ?></td>
        <td>
          <a class="btn btn-info" href="?b=new_agend&cita=<?php echo $row->id_persona; ; ?>">
            <i class="fas fa-times"></i>
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
