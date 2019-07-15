<div class="container">

    <div class="row ">
    <div class="col-md-6 offset-md-3 col-sm-12" id="card_pub">
      <?php foreach ($res as $key => $row): ?>
    <br>
  <div class="card shadow">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h5 class="card-title"><?php echo $row->titulo; ?></h5>
        <p><?php echo $row->fecha; ?></p>
      </div>

    <div id="carouselExampleControls<?php echo $key ?>" class="carousel slide" data-ride="carousel">
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
      <?php if ($row->img4) {?>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?php echo 'app/imgs_pub/'.$row->img4; ?>" alt="Third slide">
        </div>
          <?php } ?>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls<?php echo $key ?>" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls<?php echo $key ?>" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- <img class="card-img-top" src="<?php// echo 'app/imgs_pub/'.$row->img1; ?>" alt="<?php //echo $row->url_img; ?>"> -->
    <div class="">
      <p class="card-text text-capitalize text-justify mt-3"><?php echo $row->texto; ?></p>
    </div>
    </div>
  </div>
<?php endforeach; ?>
<br>


</div>
</div>
<div class="row ">
<div class="col-md-6 offset-md-3 col-sm-12">
<div class="card">

  <button id="btn_cargar_mas"  name="<?php echo $row->id_publicacion; ?>" type="button" class="btn btn-secondary btn-block" >cargar mas</button>
</div>
</div>
</div><br>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
