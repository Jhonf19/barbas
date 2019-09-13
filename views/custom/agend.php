<div class="container">
  <br>
  <h3 class="text-center">Barberos Disponibles</h3>
  <br>
  <div class="row">
    <div class="col-md-4 offset-md-4 col-sm-8 offset-sm-2 col-xs-2 offset-xs-1">

      <?php foreach ($res as $row): ?>
        <div class="card shadow ">
          <img class="card-img-top " src="app/imgs_perf/<?php echo $row->img_perfil; ?>"  alt="foto barbero">
          <div class="card-body">
            <h5 class="card-title text-capitalize"><?php echo $row->nombre." ".$row->apellido; ?></h5>
            <a class="btn btn-secondary btn-block" href="?b=prevCita&cita=<?php echo $row->id_persona; ?>">
              <i class="far fa-calendar-alt"></i> Ver Agenda
            </a>
          </div>
        </div><br>
      <?php endforeach; ?>

    </div>
  </div>
  </div>

</div><br>
