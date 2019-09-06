<?php
//echo "<pre>";print_r($res);echo "</pre>";

 ?>
<div class="container">
  <div class="table-responsive">
    <table class="table table-bordered text-center">
      <thead>
        <th>FECHA Y HORA</th> <th>CLIENTE</th><th><i class="fas fa-cog"></i> </th>
      </thead>
      <tbody>
        <?php foreach ($res as $key => $row): ?>
        <tr>
          <td>
            <?php echo $row->dia."/".$row->mes."/".$row->anio." a las ".$row->hora; ?>
          </td>
          <td>
            <?php echo $row->nombre." ".$row->apellido; ?>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
