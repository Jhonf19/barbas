
<center><h2>Barberos</h2></center>
<div class="table-responsive">
  <table class="table table-bordered ">
    <thead>
      <th>BARBERO</th><th><i class="fas fa-cog"></i></th>
    </thead>
    <tbody>
      <?php foreach ($res as $row): ?>

      <tr>
        <td><?php echo $row->nombre." ".$row->apellido; ?></td>
        <td>
          <a class="btn btn-info" href="?b=new_agend&cita=<?php echo $row->id_persona; ?>">
            <i class="fas fa-book"></i> Ver Turnos
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
