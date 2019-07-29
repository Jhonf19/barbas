<br>
<div class="container col-md-6 offset-md-3 col-sm-12 offset-sm-0 col-xs-12">
  <h3 class="text-center">Mis Turnos</h3>
  <small><i class="fas fa-info-circle"></i> Recarga la pagina para ver los cambios en la tabla.</small>
  <div class="table-responsive">
    <table class="table table-bordered text-center">
      <thead>
        <th>#</th> <th>INFO</th><th><i class="fas fa-cog"></i> </th>
      </thead>
      <tbody>
        <?php foreach ($res as $key => $row): ?>

          <tr>
            <td><?php echo $key+1; ?></td>
            <td><?php if ($key==0) {
              echo "<p><b>Codigo:</b> ".$row->codigo_t;
            }else {
              echo "Usuario en turno";
            } ?></td>
            <td><?php if ($key==0) {
              echo "<a id='btnFinishTurn' type='button' class='btn btn-success' href='?b=deleteTurn&cm=$row->id_turno'>
              <i class='fas fa-check'></i>
              </a>" ;
            } ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>
<br><br>
