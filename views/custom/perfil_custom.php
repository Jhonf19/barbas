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
    <p>Crea un Antes/Después de tus cortes de cabello favoritos!</p><small><i class="fas fa-info-circle"></i> Puedes crear 3 A/D</small><hr>
    <?php if (isset($res) && !empty($res)){ ?>
      <div class="row ">
      <div class="col-md-6 offset-md-3 col-sm-12" id="card_pub">
      <?php foreach ($res as $key => $row): ?>
        <div class="card">
          <div class="">

            <a id="btnDeleteAD<?php echo $key; ?>" class="btn btn-danger" href="?b=deleteImgsAD&cd=<?php echo $row->id_imgad; ?>&a=<?php echo $row->img_a; ?>&d=<?php echo $row->img_d; ?>"><i class="fas fa-trash"></i></a>
          </div>
          <div id="carouselExampleControls<?php echo $key ?>" class="carousel slide" data-ride="carousel">
            <div id="carouselView" class="carousel-inner">

              <div class="carousel-item active" style="height: auto">
                <img class="d-block w-100"   src="<?php echo 'app/imgs_ad/'.$row->img_a; ?>" alt="Antes">
                <h5 class="text-center">Antes</h5>
              </div>


              <div class="carousel-item">
                <img class="d-block w-100"   src="<?php echo 'app/imgs_ad/'.$row->img_d; ?>" alt="Despues">
                <h5 class="text-center">Después</h5>
              </div>



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
        </div>
        <br><br>
      <?php endforeach; ?>
    </div>
  </div>
    <?php } else {
      echo "<h2 class='text-center'>Ningún A/D creado</h2>";
    } ?>

</div>
</div>
</div>
<br><br>
