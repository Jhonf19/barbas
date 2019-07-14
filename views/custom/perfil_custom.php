<div class="container">
  <br><br>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Cambiar contraseña</h4>

      <form action="?b=newPass" method="post">

      <div class="form-group">
        <input type="text" class="form-control" name="actual" placeholder="Contraseña Actual" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="nueva" placeholder="Contraseña Nueva" required>
      </div>
      <button class="btn btn-primary" type="submit" name="button">Guardar cambios</button>
    </form>
  </div>
</div>
<br><br>
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Fotos A/D</h4>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <?php if ($row->img1) {?>
        <div class="carousel-item active">
          <img class="d-block w-100" src="<?php echo 'app/imgs_pub/'.$row->img1; ?>" alt="First slide">
        </div>
          <?php } ?>
        <?php if ($row->img2) {?>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?php echo 'app/imgs_pub/'.$row->img2; ?>" alt="Second slide">
        </div>
          <?php } ?>
        <?php if ($row->img3) {?>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo 'app/imgs_pub/'.$row->img3; ?>" alt="Third slide">
          </div>
      <?php } ?>

      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <form action="?b=createPub" method="post" enctype="multipart/form-data">


    <div class="form-group">
      <input type="file" class="form-control" name="nueva"  required>
    </div>
    <button class="btn btn-primary" type="submit" name="button">Guardar foto</button>
  </form>
</div>
</div>
</div>
