<table class="table bordered">
  <thead>
    <th>FECHA</th><th>TITULO</th><th>TEXTO</th><th>IMG</th><th> <i class="fas fa-cog"></i> </th>
  </thead>
  <tbody>
    <?php foreach ($res as $row): ?>

    <tr>
      <td><?php echo $row->fecha; ?></td>
      <td><?php echo $row->titulo; ?></td>
      <td><?php echo $row->texto; ?></td>
      <td><?php echo $row->url_img; ?></td>
      <td>
        <i class="fas fa-edit"></i>
        <i class="fas fa-trash"></i>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
