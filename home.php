<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1, shrink-to-fit=no">
  <title></title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Icons -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link id="homeTheme" rel="stylesheet" href="">
</head>
<body>
<br><br>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#"><?php echo $res->nombre_barberia; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#servicios">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contactos">Contactos</a>
          </li>
          <li class="nav-item">
            <?php
            if (isset($_SESSION['admin'])) {
              echo "<a class='nav-link' href='?b=perfil'>Perfil</a>";
            }else {
              echo "<a class='nav-link' href='?b=index'>Ingresar</a>";
            }
             ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Heading Row -->
    <div class="row align-items-center my-5">
      <div class="col-lg-7">
        <img class="img-fluid rounded mb-4 mb-lg-0" src="<?php echo $res->img_post; ?>" alt="">
      </div>
      <!-- /.col-lg-8 -->
      <div class="col-lg-5">
        <h1 class="font-weight-light"><?php echo $res->nombre_barberia; ?></h1>
        <p><?php echo $res->resena; ?></p>
        <hr>
      </div>
      <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->

    <!-- Call to Action Well -->
    <div class="card text-white bg-secondary my-5 py-4 text-center">
      <div class="card-body">
        <p class="text-white m-0">¿Quieres poder reservar nuestros servicios<b> online</b>?¡Solicita una cuenta gratis!</p>
      </div>
    </div>

    <!-- Content Row -->
    <div id="servicios" class="row">
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title text-center">Servicio 1</h2>
            <p class="card-text">Describe un servicio y proporciona detalles de interés acerca del mismo.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary btn-sm">Más</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-4 -->
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title text-center">Servicio 2</h2>
            <p class="card-text">Describe un servicio y proporciona detalles de interés acerca del mismo.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary btn-sm">Más</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-4 -->
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title text-center">Servicio 3</h2>
            <p class="card-text">Describe un servicio y proporciona detalles de interés acerca del mismo.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary btn-sm">Más</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-4 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer id="contactos" class="py-5 bg-dark">
    <div class="container text-white text-center  ">
      <div class="row">
        <div class="col-lg-4">
          <h5><span><i class="fab fa-whatsapp"></i></span> <?php echo $res->telefono; ?></h5>
        </div>
        <div class="col-lg-4">
          <h5><span><i class="fas fa-map-marker-alt"></i></span> <?php echo $res->direccion; ?></h5>
        </div>
        <div class="col-lg-4">
        <h5><span><i class="far fa-clock"></i></span> <?php echo $res->horario; ?></h5>
        </div>
      </div>
    </div><br>
    <p class="text-center text-white">Copyright &copy; 2019</p>
    <!-- /.container -->
  </footer>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous">
  </script>
  <!-- Optional JavaScript -->
  <script src="main.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>