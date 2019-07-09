
<center><h2>Citas</h2></center>
<div class="table-responsive">
  <table class="table table-bordered ">
    <thead>
      <th>#</th> <th>INFO</th>
    </thead>
    <tbody>
      <?php foreach ($res as $key => $row): ?>

      <tr>
        <td><?php echo $key+1; ?></td>
        <td><?php echo "555".$row->id_turno ?></td>

      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
