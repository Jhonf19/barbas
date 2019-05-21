<div class="container">

  <?php foreach ($res as $row): ?>
    <div class="row ">
    <div class="col-6 offset-3">
    <br>
  <div class="card">
    <img class="card-img-top" src="<?php echo $row->url_img; ?>" alt="<?php echo $row->url_img; ?>">
    <div class="card-body">
      <h5 class="card-title"><?php echo $row->titulo; ?></h5>
      <p class="card-text"><?php echo $row->texto; ?></p>
    </div>
  </div>
</div>
</div>
<?php endforeach; ?>
</div>
