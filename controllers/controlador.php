<?php
require_once('models/modelo.php');
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
    if (!isset($_SESSION['admin']) || isset($_SESSION['barber']) || isset($_SESSION['custom'])) {
      include_once('views/layouts/head.html');
      include_once('views/login.php');
      include_once('views/layouts/foot.html');
    }else {
      header("location:?b=listPub");
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
      if ($res[0]->rol == 1) {
        // $res[0]->auth='szi';
        $_SESSION['admin']=$res;
        header("location:?b=listPub");
        // $_SESSION['admin'][]->auth="si";
        // echo "<pre>"; print_r($_SESSION); echo "</pre>";

      }else if ($res[0]->rol == 2) {
        $_SESSION['barber']=$res;
        header("location:?b=listPub");
      }else if ($res[0]->rol == 3) {
        $_SESSION['custom']=$res;
        header("location:?b=listPub");
      }

    }else {
        header("location:?b=index");
    }

  }

  function listPub()
  {
    if (!isset($_SESSION['admin']) && !isset($_SESSION['barber']) && !isset($_SESSION['custom'])) {
      header("location:?b=index");
    }
    else if(isset($_SESSION['admin'])){
      include_once('views/layouts/head.html');
      include_once('views/layouts/header1.html');
      $res = $this->o->listPublications();
      include_once('views/admin/pub_table.php');
      include_once('views/layouts/foot.html');
    }
    else if(isset($_SESSION['barber'])){
      include_once('views/layouts/head.html');
      include_once('views/layouts/header2.html');
      $res = $this->o->listPublications();
      include_once('views/card_pub.php');
      include_once('views/layouts/foot.html');
    }
    else if(isset($_SESSION['custom'])){
      include_once('views/layouts/head.html');
      include_once('views/layouts/header3.html');
      $res = $this->o->listPublications();
      include_once('views/admin/pub_table.php');
      include_once('views/layouts/foot.html');
    }
  }

  function exit() {
    // unset($_SESSION['admin']);
    session_destroy();
    header("location:?b=index");
  }

  function newPub(){
    if (isset($_SESSION['admin'])){

      include_once('views/layouts/head.html');
      include_once('views/layouts/header1.html');
      include_once('views/admin/new_pub.html');
      include_once('views/layouts/foot.html');

    }else {
      header("location:?b=index");
    }
  }
  function createPub(){
    if (isset($_SESSION['admin'])){
        $data = [
          'titulo'=>$_POST['titulo'],
          'texto'=>$_POST['texto'],
          'url'=>$_POST['url']
        ];
      $res =  $this->o->createPub($data);
        if ($res) {
          header("location:?b=listPub");
        }else {
          echo "Ocurrió un error  <a href='?b=listPub'>Volver</a>";
        }
    }else {
      header("location:?b=index");
    }
    // echo "<pre>"; print_r($data); echo "</pre>";
  }

}

 ?>
