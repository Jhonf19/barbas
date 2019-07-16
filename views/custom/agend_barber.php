<br><br>
<h2 class="text-center">Turnos de <?php echo $res2[0]->nombre." ".$res2[0]->apellido; ?></h2>
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
          $time=$key*20;
          echo  "<p><b>Codigo:</b> ".$row->codigo_t."<br>  <b>Tiempo estimado:</b> ".$time." min</p>";
        }else {
          echo "USUARIO EN TURNO";
        }  ?></td>
        <td>
          <?php if ($row->cliente==$_SESSION['custom'][0]->id_persona) {
          echo "<a class='btn btn-info' href='?b=deleteTurn&cm=$row->id_turno'>
            <i class='fas fa-times'></i>
          </a>";
          } ?>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
