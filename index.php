<?php include_once('views/layouts/head.html'); echo "<pre>"; print_r($_SESSION); echo "</pre>";?>
<div class="container">
  <br><br>
  <div class="card">
    <div class="card-body">
      <h3 class="card-title">Login</h3>

      <form action="router.php" method="post">

        <div class="form-group">
          <input type="text" class="form-control" name="user" placeholder="User" value="">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="pass" placeholder="Pass" value="">
        </div>
        <button class="btn btn-primary btn-block" type="submit" name="button">Aceptar</button>

      </form>

    </div>
  </div>
</div>
<?php include_once('views/layouts/foot.html'); ?>
