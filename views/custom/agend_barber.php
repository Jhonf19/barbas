<br>
<div class="container col-md-6 offset-md-3 col-sm-12 offset-sm-0 col-xs-12">
  <h3 class="text-center">Turnos de <span class="text-capitalize"><?php echo $res2[0]->nombre." ".$res2[0]->apellido; ?></span> </h3>
  <br>
  <a class="btn btn-primary  d-block d-sm-block d-lg-inline-block" href="?b=createTurn&cita=<?php echo $_GET['cita'] ?>">
    <i class="fas fa-hand-paper"></i> Tomar turno
  </a>
  <br class="d-none d-lg-block d-xl-block">

<br>
  <small><i class="fas fa-info-circle"></i> Recarga la pagina para ver los cambios en la tabla.</small>
  <br>
  <div class="table-responsive">
    <table class="table table-bordered text-center">
      <thead>
        <th>#</th> <th>Detalles</th> <th><i class="fas fa-cog"></i> </th>
      </thead>
      <tbody>
        <?php foreach ($res as $key => $row): ?>

        <tr>
          <td><?php echo $key+1 ?></td>
          <td><?php if ($row->cliente==$_SESSION['custom'][0]->id_persona) {

            $time=$key*20;
            echo  "<p><b>Codigo:</b> ".$row->codigo_t."<br>  <b>Tiempo estimado:</b> ".$time." min</p>";
          }else {
            echo "Usuario en turno";
          }  ?></td>
          <td>
            <?php if ($row->cliente==$_SESSION['custom'][0]->id_persona && $key != 0) {
            echo "<a id='btnCancelTurn' class='btn btn-danger' href='?b=deleteTurn&cm=$row->id_turno'>
              <i class='fas fa-times'></i>
            </a>";
            } ?>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div><br><br>
