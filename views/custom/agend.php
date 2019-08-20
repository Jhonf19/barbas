<br>
<div class="container col-md-6 offset-md-3 col-sm-12 offset-sm-0 col-xs-12">
  <h3 class="text-center">Barberos Disponibles</h3>
  <br>
  <div class="table-responsive">
    <table class="table table-bordered text-center">
      <thead>
        <th>Nombre</th><th><i class="fas fa-cog"></i></th>
      </thead>
      <tbody>
        <?php foreach ($res as $row): ?>

        <tr>
          <td class="text-capitalize"><?php echo $row->nombre." ".$row->apellido; ?></td>
          <td>
            <a class="btn btn-primary" href="?b=prevCita&cita=<?php echo $row->id_persona; ?>">
              <i class="fas fa-list-ol"></i> Ver Agenda
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div><br><br>
