<?php
  class Routes{
    function index()
    {
      include_once('views/layouts/head.html');
      include_once('views/login.php');
      include_once('views/layouts/foot.html');
    }
    function userVerify(){
      echo "yes";
    }

  }
 ?>
