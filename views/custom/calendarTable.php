<table class="table table-bordered text-center">
  <thead>
    <th>HORA</th>
  </thead>
  <tbody>
    <tr>
      <?php if (isset($res)): ?>
        <?php foreach ($res as $key => $row): ?>
          <td>9:00am</td>
        <?php endforeach; ?>

      <?php else: ?>
        <td>9:10am</td>
      <?php endif; ?>
    </tr>
  </tbody>
</table>
