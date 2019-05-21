<table class="table bordered">
  <thead>
    <th>FECHA</th><th>TITULO</th><th>TEXTO</th><th>IMG</th>
  </thead>
  <tbody>
    <?php foreach ($res as $row): ?>

    <tr>
      <td><?php echo $row->fecha; ?></td>
      <td><?php echo $row->titulo; ?></td>
      <td><?php echo $row->texto; ?></td>
      <td><?php echo $row->url_img; ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
