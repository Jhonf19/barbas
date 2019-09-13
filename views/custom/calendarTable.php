<hr class="bg-dark">
<div class="container col-md-4 offset-md-4 col-sm-12 offset-sm-0 col-xs-12">
  <h3 class="text-center">HORAS</h3>
  <small><i class="fas fa-info-circle"></i>
    Toca la hora que desees y ¡listo! tendras una reservación.
  </small>
  <br><hr>
        <?php if (isset($res2))
        {
                 $result = array_intersect($horas, $res2);
               for ($j=0; $j < count($result); $j++) {
                 $ind = key($result);
                unset($horas[$ind]);
                next($result);
               }?>
           <?php foreach ($horas as $key => $value): ?>

                  <a class="btn btn-outline-dark btn-block" href="?b=AddCita&hora=<?php echo $value; ?>">
                    <i class="fas fa-calendar-check"></i> <?php echo $value; ?>
                  </a>

           <?php endforeach;
       } ?>
       <br><br>
</div>
