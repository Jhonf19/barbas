
<center><h2>Citas</h2></center>
<div class="table-responsive">
  <table class="table table-bordered ">
    <thead>
      <th>#</th> <th>INFO</th><th><i class="fas fa-cog"></i> </th>
    </thead>
    <tbody>
      <?php foreach ($res as $key => $row): ?>

      <tr>
        <td><?php echo $key+1; ?></td>
        <td><?php if ($key==0) {
          echo "CODIGO DE TURNO ".$row->codigo_t;
        }else {
          echo "USUARIO EN TURNO ";
        } ?></td>
        <td><?php if ($key==0) {
          echo "<a class='btn btn-success' href='?b=deleteTurn&cm=$row->id_turno'>
            <i class='fas fa-check'></i>
          </a>" ;
        } ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
