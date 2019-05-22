<div class="container">

  <?php foreach ($res as $row): ?>
    <div class="row ">
    <div class="col-md-6 offset-md-3 col-sm-12">
    <br>
  <div class="card">
    <img class="card-img-top" src="<?php echo 'app/imgs_pub/'.$row->url_img; ?>" alt="<?php echo $row->url_img; ?>">
    <div class="card-body">
      <h5 class="card-title"><?php echo $row->titulo; ?></h5>
      <p class="card-text"><?php echo $row->texto; ?></p>
      <p>publicado: <?php echo $row->fecha; ?></p>
    </div>
  </div>
</div>
</div>
<?php endforeach; ?>
</div>
