<div class="container">
  <table class="table table-bordered text-center">
    <thead>
      <th>HORAS LIBRES</th>
    </thead>
    <tbody>

        <?php if (isset($res2))
        {
                 $result = array_intersect($horas, $res2);
               for ($j=0; $j < count($result); $j++) {
                 $ind = key($result);
                unset($horas[$ind]);
                next($result);
               }?>
           <?php foreach ($horas as $key => $value): ?>
             <tr>
               <td><?php echo $value; ?> <a  href="?b=AddCita&hora=<?php echo $value; ?>">
                 <i class="far fa-calendar-check"></i></a>
               </td>
             </tr>
           <?php endforeach;
       } ?>
    </tbody>
  </table>
</div>
