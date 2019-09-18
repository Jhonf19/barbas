<?php
// echo "<pre>";print_r($res);echo "</pre>";

 ?>
 <br>
<div class="container">
  <h3 class="text-center">Agenda de Citas</h3><br>
  <div class="table-responsive">
    <table class="table table-bordered text-center">
      <thead>
         <th>CLIENTE</th><th>FECHA Y HORA</th><th><i class="fas fa-cog"></i> </th>
      </thead>
      <tbody>
        <?php foreach ($res as $key => $row): ?>
        <tr>
          <td>
            <?php echo $row->nombre." ".$row->apellido; ?>
          </td>
          <td>
            <?php echo $row->dia."/".$row->mes."/".$row->anio." a las ".$row->hora; ?>
          </td>
          <td>
            <a class="btn btn-success" href="#"><i class="fas fa-check"></i> </a>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
