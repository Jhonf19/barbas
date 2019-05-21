<?php
require_once('../models/modelo.php');
/**
 *
 */

class Controlador
{

  function __construct()
  {
    $this->o=new Modelo();
  }

  function index()
  {
    include_once('views/layouts/head.html');
    include_once('views/login.php');
    include_once('views/layouts/foot.html');
  }
  function bbb()
  {
    echo "bbb";
  }

  function listPub()
  {
    if (isset($_SESSION['admin'])&& $_SESSION['admin'][0]->rol==1) {
      include_once('views/layouts/head.html');
      include_once('views/layouts/header1.html');
      $res = $this->o->listPublications();
      include_once('views/admin/pub_table.php');
      include_once('views/layouts/foot.html');
    }else {
      $this->index();
    }
  }

  function userVerify()
  {
    $data=[
      'user'=>$_POST['user'],
      'pass'=>$_POST['pass']
    ];
  $res = $this->o->userVerify($data);
  if (!empty($res)) {
    // echo "<pre>"; print_r($res[0]->rol); echo "</pre>";
    if ($res[0]->rol == 1) {
      $_SESSION['admin']=$res;
      header("location:?b=listPub");
      // $this->listPub();

    }else if ($res[0]->rol == 2) {
      $_SESSION['admin']=$res;
      echo "bar";
    }else if ($res[0]->rol == 3) {
      $_SESSION['admin']=$res;
      echo "cli";
    }

  }else {
      header("location:?b=index");
  }
  // $this->o->userVerify($data);
  }

  function exit() {
    unset($_SESSION['admin']);
    header("location:?b=index");
  }

  function newPub(){
    if (isset($_SESSION['admin'])&& $_SESSION['admin'][0]->rol==1){

      include_once('views/layouts/head.html');
      include_once('views/layouts/header1.html');
      include_once('views/admin/new_pub.html');
      include_once('views/layouts/foot.html');

    }else {
      $this->index();
    }
  }
  function createPub(){
    $data = [
      'titulo'=>$_POST['titulo'],
      'texto'=>$_POST['texto'],
      'url'=>$_POST['url']
    ];
    $this->o->createPub($data);
    if ($res) {
      header("location:?b=listPub");
    }else {
      echo "Ocurrió un error  <a href='?b=listPub'>Volver</a>";
    }
    // echo "<pre>"; print_r($data); echo "</pre>";
  }

}

 ?>
