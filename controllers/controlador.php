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


  function home(){

      $res = $this->o->loadSetup();
      $res2 = $this->o->listServices();
      include_once('home.php');
      if ($res) {
        $tema = $res->tema;
      }else {
        $tema = "no";
    }

  }

  function changeTheme(){
  if (isset($_SESSION['admin'])) {
    // echo "<pre>";print_r($_POST['tema']);echo "</pre>";
    $tema = $_POST['tema'];
    $res = $this->o->changeTheme($tema);
    header("location:?b=perfil");
  }else {
    header("location:?b=index");
  }

  }

  function addService(){
  if (isset($_SESSION['admin'])) {
    // echo "<pre>";print_r($_POST['tema']);echo "</pre>";
    $servicio = $_POST['servicio'];
    $precio = $_POST['precio'];
    $res = $this->o->addService($servicio, $precio);
    if ($res) {
      echo "<script language='javascript'>";
      echo "alert('Servicio agregado');";
      echo "window.location.replace('?b=home#servicios')";
      echo "</script>";
    }else {
      echo "<script language='javascript'>";
      echo "alert('Error, no se pudo agregar el servicio');";
      echo "window.location.replace('?b=perfil')";
      echo "</script>";
    }

  }else {
    header("location:?b=index");
  }

  }

  function deleteService(){
  if (isset($_SESSION['admin'])) {
    // echo "<pre>";print_r($_POST['tema']);echo "</pre>";
    $id = $_GET['x'];
    $res = $this->o->deleteService($id);
    if ($res) {
      echo "<script language='javascript'>";
      echo "alert('Servicio eliminado');";
      echo "window.location.replace('?b=home#servicios')";
      echo "</script>";
    }else {
      echo "<script language='javascript'>";
      echo "alert('Error, no se pudo eliminar el servicio');";
      echo "window.location.replace('?b=perfil')";
      echo "</script>";
    }

  }else {
    header("location:?b=index");
  }

  }


  function changeContentSPA(){
  if (isset($_SESSION['admin'])) {

    $data=[
      'nombar'=>$_POST['nombar'],
      'resena'=>$_POST['resena'],
      'telefono'=>$_POST['telefono'],
      'direccion'=>$_POST['direccion'],
      'h_apertura'=>$_POST['h_apertura'],
      'h_cierre'=>$_POST['h_cierre']
    ];
    if (!empty($_FILES['img_post']['name'])) {
      if ($_FILES["img_post"]['error']==1) {
        echo "<script language='javascript'>";
        echo "alert('Error de imagen demasiado pesada');";
        echo "window.location.replace('?b=perfil')";
        echo "</script>";
      }
        if (!move_uploaded_file($_FILES["img_post"]['tmp_name'],'setup/'.'900x400.png')) {
          echo "<script language='javascript'>";
          echo "alert('No se pudo cambiar la imagen');";
          echo "window.location.replace('?b=perfil')";
          echo "</script>";
        }

    }

      $res = $this->o->changeContentSPA($data);

      if ($res) {
        echo "<script language='javascript'>";
        echo "alert('Contenido Modificado');";
        echo "window.location.replace('?b=perfil')";
        echo "</script>";
      }else {
        echo "<script language='javascript'>";
        echo "alert('No se pudo modificar el contenido');";
        echo "window.location.replace('?b=perfil')";
        echo "</script>";
      }


  }else {
    header("location:?b=index");
  }

  }




  function index()
  {
    if (!isset($_SESSION['admin']) && !isset($_SESSION['barber']) && !isset($_SESSION['custom'])) {
      $resT = $this->o->loadSetup();
      if ($resT) {
        $tema = $resT->tema;
      }else {
        $tema = "no";
      }
      include_once('views/layouts/head.php');
      include_once('views/login.php');
      include_once('views/layouts/foot.html');
    }else {
      $res = $this->o->loadSetup();
      if ($res) {
        $tema = $res->tema;
      }else {
        $tema = "no";
      }
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
      //header("location:?b=index");
      echo "<script language='javascript'>";
      echo "alert('Usuario y/o Contraseña incorrectos');";
      echo "window.location.replace('?b=index')";
      echo "</script>";
      // $this->index();
      // header("location:?b=index");
    }

  }

  function listPub()
  {
    if (!isset($_SESSION['admin']) && !isset($_SESSION['barber']) && !isset($_SESSION['custom'])) {
      header("location:?b=index");
    }
    else if(isset($_SESSION['admin'])){
      $resT = $this->o->loadSetup();
      if ($resT) {
        $tema = $resT->tema;
      }else {
        $tema = "no";
      }
      include_once('views/layouts/head.php');
      include_once('views/layouts/header1.html');
      $res = $this->o->listPublications();

      if (isset($_GET['view'])) {
        if ($_GET['view']=='muro') {
          echo "      <div class='dropdown'>
                <a class='btn btn-secondary dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                  Mostrar
                </a>

                <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                  <a class='dropdown-item' href='?b=listPub&view=muro'>Muro</a>
                  <a class='dropdown-item' href='?b=listPub&view=tabla'>Tabla</a>
                </div>
              </div>";
          include_once('views/card_pub.php');
        }else if ($_GET['view']=='tabla'){
          include_once('views/admin/pub_table.php');
        }
      }else {
        include_once('views/admin/pub_table.php');
      }
      include_once('views/layouts/foot.html');
    }
    else if(isset($_SESSION['barber'])){
      $resT = $this->o->loadSetup();
      if ($resT) {
        $tema = $resT->tema;
      }else {
        $tema = "no";
      }
      include_once('views/layouts/head.php');
      include_once('views/layouts/header2.html');
      $res = $this->o->listPublications();
      include_once('views/card_pub.php');
      include_once('views/layouts/foot.html');
    }
    else if(isset($_SESSION['custom'])){
      $resT = $this->o->loadSetup();
      if ($resT) {
        $tema = $resT->tema;
      }else {
        $tema = "no";
      }
      include_once('views/layouts/head.php');
      include_once('views/layouts/header3.html');
      $res = $this->o->listPublications();

      include_once('views/card_pub.php');
      include_once('views/layouts/foot.html');
    }
  }
  function ajax(){
    if (isset($_SESSION['admin']) || isset($_SESSION['barber']) || isset($_SESSION['custom'])){
      // echo "<pre>"; print_r($_POST); echo "</pre>";
      $id=$_POST['id'];
      $res = $this->o->listPubAjax($id);
       echo json_encode($res);
    }else {
      header("location:?b=index");
    }
  }

  function exit() {
    // unset($_SESSION['admin']);
    session_destroy();
    header("location:?b=home");
  }

  function newPub(){
    if (isset($_SESSION['admin'])){
      $resT = $this->o->loadSetup();
      if ($resT) {
        $tema = $resT->tema;
      }else {
        $tema = "no";
      }
      include_once('views/layouts/head.php');
      include_once('views/layouts/header1.html');
      include_once('views/admin/new_pub.php');
      include_once('views/layouts/foot.html');

    }else {
      header("location:?b=index");
    }
  }
  function createPub(){
    if (isset($_SESSION['admin'])){
      //echo "<pre>"; print_r(count($_FILES)); echo "</pre>";

      // if ($_FILES["img1"]['error'] > 0 && $_FILES["img2"]['error'] > 0 && $_FILES["img3"]['error'] > 0 && $_FILES["img4"]['error'] > 0) {
      if ($_FILES["img1"]['error'] > 0 && $_FILES["img2"]['error'] > 0 && $_FILES["img3"]['error'] > 0 && $_FILES["img4"]['error'] > 0) {
        // echo "Ocurrió un error  <a href='?b=newPub'>Volver</a>";
        // echo "<pre>"; print_r($_FILES); echo "</pre>";
        echo "<script language='javascript'>";
        echo "alert('Ocurrió un error al cargar los archivos');";
        echo "window.location.replace('?b=newPub')";
        echo "</script>";
      }
     else {

        $data = [
          'titulo'=>$_POST['titulo'],
          'texto'=>$_POST['texto'],
          'img1'=>$_FILES["img1"]['name'],
          'img2'=>$_FILES["img2"]['name'],
          'img3'=>$_FILES["img3"]['name'],
          'img4'=>$_FILES["img4"]['name']
        ];
        for ($i=1; $i < 5; $i++) {
          $err=0;
          if (!move_uploaded_file($_FILES["img$i"]['tmp_name'],'app/imgs_pub/'.$_FILES["img$i"]['name'])) {
            $err=$err+$err;
        }

        }

        if ($err>0) {
          echo "<script language='javascript'>";
          echo "alert('Ocurrió un error al cargar los archivos');";
          echo "window.location.replace('?b=newPub')";
          echo "</script>";
      }else {
        $res =  $this->o->createPub($data);
          if ($res) {
            header("location:?b=listPub");
          }else {
            echo "<script language='javascript'>";
            echo "alert('Ocurrió un error');";
            echo "window.location.replace('?b=newPub')";
            echo "</script>";
          }
      }




      }
    }else {
      header("location:?b=index");
    }
    // echo "<pre>"; print_r($data); echo "</pre>";
  }

  function deletePub(){
    if (isset($_SESSION['admin'])) {
      //just for the host
       error_reporting(E_ALL ^ E_WARNING );
      $id=$_GET['pub'];
      //$img=$_GET['img1'];
      for ($i=1; $i < 5; $i++) {
        unlink('app/imgs_pub/'.$_GET["img$i"]);
      }
      $res = $this->o->deletePub($id);
      if ($res) {
        echo "<script language='javascript'>";
        echo "alert('Publicación eliminada');";
        echo "window.location.replace('?b=listPub')";
        echo "</script>";
      }else {
        echo "<script language='javascript'>";
        echo "alert('Ocurrió un error');";
        echo "window.location.replace('?b=listPub')";
        echo "</script>";
      }
    }else {
      header("location:?b=index");
    }
  }
    function newPro(){
      if (isset($_SESSION['admin'])){
        $resT = $this->o->loadSetup();
        if ($resT) {
          $tema = $resT->tema;
        }else {
          $tema = "no";
        }
        include_once('views/layouts/head.php');
        include_once('views/layouts/header1.html');
        include_once('views/admin/new_pro.html');
        include_once('views/layouts/foot.html');

      }else {
        header("location:?b=index");
      }
    }

    function createPro(){
      if (isset($_SESSION['admin'])){
        $data=[
          'nombre'=>$_POST['nombre'],
          'descripcion'=>$_POST['descripcion'],
          'costo'=>$_POST['costo'],
          'precio'=>$_POST['precio'],
          'stock'=>$_POST['stock']
        ];
        $res = $this->o->createProd($data);
        // echo "<pre>"; print_r("res"); echo "</pre>";
        if ($res) {
          header("location:?b=listPro");
        }else {
          echo "<script language='javascript'>";
          echo "alert('Ocurrió un error al cargar los archivos');";
          echo "window.location.replace('?b=newPro')";
          echo "</script>";
        }

      }else {
        header("location:?b=index");
      }
    }

    function listPro(){
      if (isset($_SESSION['admin'])){
        $resT = $this->o->loadSetup();
        if ($resT) {
          $tema = $resT->tema;
        }else {
          $tema = "no";
        }
        include_once('views/layouts/head.php');
        include_once('views/layouts/header1.html');
        $res = $this->o->listProducts();
        include_once('views/admin/pro_table.php');
        include_once('views/layouts/foot.html');

      }else {
        header("location:?b=index");
      }

    }



    function venPro(){
      if (isset($_SESSION['admin'])) {
        $resT = $this->o->loadSetup();
        if ($resT) {
          $tema = $resT->tema;
        }else {
          $tema = "no";
        }
      include_once('views/layouts/head.php');
      include_once('views/layouts/header1.html');
      include_once('views/admin/ven_pro1.php');
      include_once('views/layouts/foot.html');

      }else {
        header("location:?b=index");
      }
    }

    function serchPro(){
      if (isset($_SESSION['admin'])) {
        $id = $_POST['id'];
        $resT = $this->o->loadSetup();
        if ($resT) {
          $tema = $resT->tema;
        }else {
          $tema = "no";
        }
        include_once('views/layouts/head.php');
        include_once('views/layouts/header1.html');
        $res = $this->o->serchProducts($id);
        if (isset($_SESSION['mi_venta'])) {
          $equ=0;
          foreach ($res as $key => $row) {
            foreach ($_SESSION['mi_venta'] as $key2 => $row2) {
              if ($row->id_producto == $_SESSION['mi_venta'][$key2]->id_producto) {

                $row->stock = $row->stock - $_SESSION['mi_venta'][$key2]->cantidad;
                $equ=$equ+1;

              }
              // code...
            }

          }
          // echo "<pre>";
          // print_r($equ);
          // echo "</pre>";
          include_once('views/admin/ven_pro1.php');
          include_once('views/admin/ven_pro2.php');
          include_once('views/layouts/foot.html');
          //
          //     if ($equ>0) {
          //       header("location:?b=venPro");
          //     }else {
          //
          //     }

        }
        include_once('views/admin/ven_pro1.php');
        include_once('views/admin/ven_pro2.php');
        include_once('views/layouts/foot.html');
        // header("location:?b=serchPro");
        // echo "<pre>";
        // print_r($res);
        // echo "</pre>";
      }else {
        header("location:?b=index");
      }

    }

    function addCart(){

      if (isset($_SESSION['admin'])) {
        $obj =  unserialize($_POST['obj']);
        $cantidad = $_POST['cantidad'];
        if ($cantidad > $obj->stock || $cantidad <= 0) {
          echo "<script language='javascript'>";
          echo "alert('Por favor ingrese una cantidad valida');";
          echo "window.location.replace('?b=venPro')";
          echo "</script>";
        }else {
          if (isset($_SESSION['mi_venta'])) {
            $equ=0;
            foreach ($_SESSION['mi_venta'] as  $row) {
              if ($row->id_producto == $obj->id_producto) {
                $row->cantidad = $row->cantidad + $cantidad;
                $equ=$equ+1;

              }

            }
                if ($equ>0) {
                  header("location:?b=venPro");
                }else {
                  $data = new stdClass();
                  $data->id_producto=$obj->id_producto;
                  $data->nombre=$obj->nombre;
                  $data->descripcion=$obj->descripcion;
                  $data->precio=$obj->precio;
                  $data->stock=$obj->stock;
                  $data->cantidad=$cantidad;
                  $_SESSION['mi_venta'][]=$data;
                  header("location:?b=venPro");
                }

          }else {
            $data = new stdClass();
            $data->id_producto=$obj->id_producto;
            $data->nombre=$obj->nombre;
            $data->descripcion=$obj->descripcion;
            $data->precio=$obj->precio;
            $data->stock=$obj->stock;
            $data->cantidad=$cantidad;
            $_SESSION['mi_venta'][]=$data;
            header("location:?b=venPro");
          }
        }





      }else {
        header("location:?b=index");
      }
    }

    function cancelVenta(){
      if (isset($_SESSION['admin'])) {
        unset($_SESSION['mi_venta']);
        header("location:?b=venPro");
      }else {
        header("location:?b=index");
      }
    }

    function removeCart(){
      if (isset($_SESSION['admin'])) {
        $id = $_GET['id'];
        unset($_SESSION['mi_venta'][$id]);
        if (count($_SESSION['mi_venta'])==0) {
          unset($_SESSION['mi_venta']);
          header("location:?b=venPro");
        }else {
          header("location:?b=venPro");
        }

      }else {
        header("location:?b=index");
      }
    }

    function sell(){
      if (isset($_SESSION['admin'])) {
        if (isset($_SESSION['mi_venta'])) {
          foreach ($_SESSION['mi_venta'] as $key => $row) {
            $data[]=$row;
          }
          // echo "<pre>";
          // print_r($data);
          // echo "</pre>";

          $res = $this->o->sellProducts($data);
          if ($res) {
            unset($_SESSION['mi_venta']);
            echo "<script language='javascript'>";
            echo "alert('¡Venta realizada!');";
            echo "window.location.replace('?b=venPro')";
            echo "</script>";
          }else {
            echo "<script language='javascript'>";
            echo "alert('Ocurrió un error');";
            echo "window.location.replace('?b=venPro')";
            echo "</script>";
          }
        }else {
        header("location:?b=venPro");
        }


      }else {
        header("location:?b=index");
      }
    }

    function deletePro(){
      if (isset($_SESSION['admin'])) {
        $id=$_GET['prod'];
        $res = $this->o->deleteProd($id);
        if ($res) {
          header("location:?b=listPro");
        }else {
          echo "<script language='javascript'>";
          echo "alert('Ocurrió un error');";
          echo "window.location.replace('?b=listPro')";
          echo "</script>";
        }
      }else {
        header("location:?b=index");
      }
    }

    function editarProducto(){
      if (isset($_SESSION['admin'])) {
        $id=$_GET['prod'];
        $res = $this->o->listOneProducts($id);
        if ($res) {
          $resT = $this->o->loadSetup();
          if ($resT) {
            $tema = $resT->tema;
          }else {
            $tema = "no";
          }
          include_once('views/layouts/head.php');
          include_once('views/layouts/header1.html');
          include_once('views/admin/edit_pro.php');
          include_once('views/layouts/foot.html');

        }else {
          echo "<script language='javascript'>";
          echo "alert('Ocurrió un error');";
          echo "window.location.replace('?b=listPro')";
          echo "</script>";
        }
      }else {
        header("location:?b=index");
      }
    }

    function editPro(){
      if (isset($_SESSION['admin'])) {
        $data=[
          'id_producto'=>$_POST['id_producto'],
          'nombre'=>$_POST['nombre'],
          'descripcion'=>$_POST['descripcion'],
          'costo'=>$_POST['costo'],
          'precio'=>$_POST['precio']
        ];
        $res = $this->o->editProduct($data);
        if ($res) {
            header("location:?b=listPro");
        }else {
          echo "<script language='javascript'>";
          echo "alert('Ocurrió un error');";
          echo "window.location.replace('?b=listPro')";
          echo "</script>";
        }
      }else {
        header("location:?b=index");
      }
    }


    function surtPro(){
      if (isset($_SESSION['admin'])) {
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        $id_producto=$_POST['id_producto'];
        $cantidad=$_POST['cantidad']+$_POST['stock'];

        $res = $this->o->surtProduct($id_producto, $cantidad);
        if ($res) {
          header("location:?b=listPro");

        }else {
          echo "<script language='javascript'>";
          echo "alert('Ocurrió un error');";
          echo "window.location.replace('?b=listPro')";
          echo "</script>";
        }
      }else {
        header("location:?b=index");
      }
    }


    /*///Barbers///*/

    function newPerf(){
      if (isset($_SESSION['admin'])) {
        $resT = $this->o->loadSetup();
        if ($resT) {
          $tema = $resT->tema;
        }else {
          $tema = "no";
        }
        include_once('views/layouts/head.php');
        include_once('views/layouts/header1.html');
        include_once('views/admin/new_barb.html');
        include_once('views/layouts/foot.html');

      }else {
        header("location:?b=index");
      }
    }



    function createPerf(){
      if (isset($_SESSION['admin'])){
        $data=[
          'documento'=>$_POST['documento'],
          'nombre'=>$_POST['nombre'],
          'apellido'=>$_POST['apellido'],
          'correo'=>$_POST['correo'],
          'rol'=>$_POST['rol']
        ];
        $res = $this->o->createPerf($data);
        // echo "<pre>"; print_r($_POST); echo "</pre>";
        if ($res) {
          header("location:?b=listAcounts");
        }else {
          echo "<script language='javascript'>";
          echo "alert('Ocurrió un error');";
          echo "window.location.replace('?b=listAcounts')";
          echo "</script>";
        }

      }else {
        header("location:?b=index");
      }
    }

    function listAcounts(){
      if (isset($_SESSION['admin'])) {
        $rol='';
        if (isset($_GET['list']) && !empty($_GET['list']) && $_GET['list'] >=1 && $_GET['list'] <=3) {
          $rol=$_GET['list'];
        }
        $resT = $this->o->loadSetup();
        if ($resT) {
          $tema = $resT->tema;
        }else {
          $tema = "no";
        }
        include_once('views/layouts/head.php');
        include_once('views/layouts/header1.html');
        $res = $this->o->listPersons($rol,'');
        include_once('views/admin/acounts_table.php');
        include_once('views/layouts/foot.html');

      }else {
        header("location:?b=index");
      }
    }

    function editarAcount(){
      if (isset($_SESSION['admin'])) {
        $id=$_GET['acc'];
        $list=$_GET['list'];
        $res = $this->o->editarAcount($id);

        if ($res->estado==1) {
          $res2 = $this->o->estate_ch($res->id_persona,0);
          if (!empty($list)) {
            // code...
            header("location:?b=listAcounts&list=".$list);
          }else {
            // code...
            header("location:?b=listAcounts");
          }
        }else if($res->estado==0){
          $res2 = $this->o->estate_ch($res->id_persona,1);
          if (!empty($list)) {
            // code...
            header("location:?b=listAcounts&list=".$list);
          }else {
            // code...
            header("location:?b=listAcounts");
          }

        }

      }else {
        header("location:?b=index");
      }
    }


    function listcitas(){
      if (isset($_SESSION['barber'])) {
        $resT = $this->o->loadSetup();
        if ($resT) {
          $tema = $resT->tema;
        }else {
          $tema = "no";
        }
        include_once('views/layouts/head.php');
        include_once('views/layouts/header2.html');
        $res = $this->o->listTur($_SESSION['barber'][0]->id_persona,'');
        include_once('views/barber/list_citas.php');
        include_once('views/layouts/foot.html');

      }else {
        header("location:?b=index");
      }
    }

    function verifyTurn(){
      if (isset($_SESSION['barber'])) {
        // echo "<pre>";
        // print_r($_GET['cm']);
        // echo "</pre>";
        $resT = $this->o->loadSetup();
        if ($resT) {
          $tema = $resT->tema;
        }else {
          $tema = "no";
        }
        include_once('views/layouts/head.php');
        include_once('views/layouts/header2.html');
        $res = $this->o->listTur('',$_GET['cm']);
        include_once('views/barber/cita_table.php');
        include_once('views/layouts/foot.html');

        if ($res) {
          // code...
        }
      }else {
        header("location:?b=index");
      }
    }

    function estate_ch(){
      if (isset($_SESSION['barber'])) {
        // echo "<pre>";
        // print_r($_POST['estado']);
        // echo "</pre>";
        $est=$_POST['estado'];
        $id=$_SESSION['barber'][0]->id_persona;
        $res = $this->o->estate_ch($id, $est);
        if ($res) {
          $_SESSION['barber'][0]->estado = $est;
          header("location:?b=perfil");
        }else {
          echo "<script language='javascript'>";
          echo "alert('No se pudo cambiar tu Disponibilidad');";
          echo "window.location.replace('?b=perfil')";
          echo "</script>";
        }

      }else {
        header("location:?b=index");
      }
    }
    function prevCita(){
      if (isset($_SESSION['custom'])) {
        $_SESSION['cita']['barbero']=$_GET['cita'];
        header("location:?b=cita");
      }else {
        header("location:?b=index");
      }
    }

    function cita(){
      date_default_timezone_set('America/Bogota');
      if (isset($_SESSION['custom'])) {
          $res = $this->o->loadSetup();
          $a=substr((int)$res->h_apertura,0,2);
          $b=substr((int)$res->h_cierre,0,2);
          $x = (12 - $a) + $b;
          $horas = array();
          $m="am";
          for ($i=0; $i < $x; $i++) {
            array_push($horas,$a.$m);
            $a=$a+1;
            if ($a>11) {

              $m="pm";
              if ($a>12) {
                  $a=1;
              }
            }
          }
           // echo "<pre>";print_r($horas);echo "</pre>";



        include_once('views/layouts/head.php');
        include_once('views/layouts/header3.html');
        if (isset($_POST['fecha']) && !empty($_POST['fecha'])) {

          $data=[
            'dia'=>substr($_POST['fecha'],8,2),
            'mes'=>substr($_POST['fecha'],5,2),
            'anio'=>substr($_POST['fecha'],0,4),
            'barbero'=>$_SESSION['cita']['barbero']
          ];
          $_SESSION['cita']['dia']=$data['dia'];
          $_SESSION['cita']['mes']=$data['mes'];
          $_SESSION['cita']['anio']=$data['anio'];

          $datetime10 = date('d-m-Y');
          $datetime20 = $data['dia']."-".$data['mes']."-".$data['anio'];
          $datetime1 = date_create($datetime10);
          $datetime2 = date_create($datetime20);



          $interval = date_diff($datetime1, $datetime2);
          $difer= $interval->format('%R%a días');
          if ((int)$difer < 0) {
            echo "<script language='javascript'>";
            echo "alert('La fecha ingresada ya pasó');";
            echo "window.location.replace('?b=cita')";
            echo "</script>";
          }else {
            $res2 = $this->o->listCitas($data);
          }

          echo "<pre>";print_r($_SESSION['cita']);echo "</pre>";
          }

        include_once('views/custom/calendar.php');
        include_once('views/custom/calendarTable.php');
        include_once('views/layouts/foot.html');
      }else {
        header("location:?b=index");
      }
    }

    function AddCita(){
      if (isset($_SESSION['custom'])) {
       // echo "<pre>";print_r($_SESSION['cita']);echo "</pre>";
        $data=[
          'dia'=>$_SESSION['cita']['dia'],
          'mes'=>$_SESSION['cita']['mes'],
          'anio'=>$_SESSION['cita']['anio'],
          'hora'=>$_GET['hora'],
          'barbero'=>$_SESSION['cita']['barbero'],
          'cliente'=>$_SESSION['custom'][0]->id_persona
        ];

        echo "<pre>";print_r($data);echo "</pre>";

         $res = $this->o->saveCita($data);
         if ($res) {
           echo "<script language='javascript'>";
           echo "alert('Exito');";
           echo "window.location.replace('?b=agend')";
           echo "</script>";
         }else {
           echo "<script language='javascript'>";
           echo "alert('Ocurrió un error');";
           echo "window.location.replace('?b=agend')";
           echo "</script>";
         }
         unset($_SESSION['cita']);
      }else {
        header("location:?b=index");
      }
    }



    function agend(){
      if (isset($_SESSION['custom'])) {
        // echo "<pre>";print_r($_SESSION['cita']);echo "</pre>";
        $resT = $this->o->loadSetup();
        if ($resT) {
          $tema = $resT->tema;
        }else {
          $tema = "no";
        }
        include_once('views/layouts/head.php');
        include_once('views/layouts/header3.html');
        $res = $this->o->listPersons($rol=2, $state=1);
        include_once('views/custom/agend.php');
        include_once('views/layouts/foot.html');

      }else {
        header("location:?b=index");
      }
    }


    function new_agend(){
      if (isset($_SESSION['custom'])) {
        $resT = $this->o->loadSetup();
        if ($resT) {
          $tema = $resT->tema;
        }else {
          $tema = "no";
        }
        include_once('views/layouts/head.php');
        include_once('views/layouts/header3.html');
        $res = $this->o->listTur($_GET['cita'], '');
        $res2 = $this->o->listBarber($_GET['cita']);
        include_once('views/custom/agend_barber.php');
        include_once('views/layouts/foot.html');

      }else {
        header("location:?b=index");
      }
    }

    function createTurn(){
      if (isset($_SESSION['custom'])) {
        $valid = $this->o->listTur('',$_SESSION['custom'][0]->id_persona);
        if ($valid) {
         //echo "ya tienes un turno con ".$valid[0]->nombre ." ".$valid[0]->apellido."  <a href='?b=agend'>Volver</a>";
         echo "<script language='javascript'>";
         echo "alert('Ya tienes un turno con ".$valid[0]->nombre." ".$valid[0]->apellido." ');";
         echo "window.location.replace('?b=new_agend&cita=".$valid[0]->id_persona."')";
         echo "</script>";
        }else {

          $res = $this->o->createTurn($_GET['cita'],$_SESSION['custom'][0]->id_persona,$ram=random_int(0, 999).$_SESSION['custom'][0]->id_persona);
          if ($res) {
            header("location:?b=new_agend&cita=".$_GET['cita']);
          }else {
            echo "<script language='javascript'>";
            echo "alert('Ocurrió un error');";
            echo "window.location.replace('?b=agend')";
            echo "</script>";
          }
        }
        // echo "<pre>";
        // print_r($valid);
        // echo "</pre>";

      }else {
        header("location:?b=index");
      }

    }

    function deleteTurn(){
      if (isset($_SESSION['custom']) || $_SESSION['barber']) {
        $id = $_GET['cm'];
        $res = $this->o->deleteTurn($id);

        if ($res) {
            if (isset($_SESSION['custom'])) {
              echo "<script language='javascript'>";
              echo "alert('Turno eliminado');";
              echo "window.location.replace('?b=agend')";
              echo "</script>";
            }else {
              header("location:?b=listcitas");
            }
        }else {
          echo "<script language='javascript'>";
          echo "alert('Ocurrió un error');";
          echo "window.location.replace('?b=agend')";
          echo "</script>";
        }
      }else {
        header("location:?b=index");
      }
    }

    function perfil(){
      if (isset($_SESSION['custom']) || isset($_SESSION['barber']) || isset($_SESSION['admin'])) {
        if (isset($_SESSION['custom'])) {
          $resT = $this->o->loadSetup();
          if ($resT) {
            $tema = $resT->tema;
          }else {
            $tema = "no";
          }
          include_once('views/layouts/head.php');
          include_once('views/layouts/header3.html');
          $id = $_SESSION['custom'][0]->id_persona;
          $res = $this->o->getImgsAD($id);
          include_once('views/custom/perfil_custom.php');
          include_once('views/layouts/foot.html');
        }
        if (isset($_SESSION['barber'])) {
          $resT = $this->o->loadSetup();
          if ($resT) {
            $tema = $resT->tema;
          }else {
            $tema = "no";
          }
          include_once('views/layouts/head.php');
          include_once('views/layouts/header2.html');
          include_once('views/barber/perfil_barber.php');
          include_once('views/layouts/foot.html');
        }
        if (isset($_SESSION['admin'])) {
          $resT = $this->o->loadSetup();
          if ($resT) {
            $tema = $resT->tema;
          }else {
            $tema = "no";
          }
          include_once('views/layouts/head.php');
          include_once('views/layouts/header1.html');
          include_once('views/admin/perfil_admin.php');
          include_once('views/layouts/foot.html');
        }
      }else {
        header("location:?b=index");
      }
    }
    function deleteImgsAD(){
      if (isset($_SESSION['custom'])) {
        $id = $_GET['cd'];
        unlink('app/imgs_ad/'.$_GET["a"]);
        unlink('app/imgs_ad/'.$_GET["d"]);
        $res = $this->o->deleteImgsAD($id);

        if ($res) {
          echo "<script language='javascript'>";
          echo "alert('A/D eliminado');";
          echo "window.location.replace('?b=perfil')";
          echo "</script>";
        }else {
          echo "<script language='javascript'>";
          echo "alert('Ocurrió un Error');";
          echo "window.location.replace('?b=perfil')";
          echo "</script>";

        }
      }else {
        header("location:?b=index");
      }
    }

    function saveBefore(){
      if (isset($_SESSION['barber'])) {
        //validar cedula en la BD
        $doc = $_POST['docA'];
        $res = $this->o->userDocValid($doc);
        $files_length=count($_FILES['ant']['name']);
        if ($res) {
          $id=$res->id_persona;

        ///////////////////////

          $names=[];
          $tmp_names=[];
          $errors=[];
        for ($i=0; $i < count($_FILES['ant']['name']) ; $i++) {
            array_push($names, $_FILES['ant']['name'][$i]);
        }
        for ($i=0; $i < count($_FILES['ant']['tmp_name']) ; $i++) {
            array_push($tmp_names, $_FILES['ant']['tmp_name'][$i]);
        }
        for ($i=0; $i < count($_FILES['ant']['error']) ; $i++) {
            array_push($errors, $_FILES['ant']['error'][$i]);
        }



        //validar errores
        $r = array_search(0, $errors);
        if (!empty($r)) {

          //notiifcar error de tipo o tamaño en el archivo y volver a  la vista anterior
          echo "<script language='javascript'>";
          echo "alert('Ocurrió un Error');";
          echo "window.location.replace('?b=addAD')";
          echo "</script>";
        }
        else {
          //validar cantidad de fotos
          if ($files_length > 3) {
            echo "<script language='javascript'>";
            echo "alert('Solo puedes adjuntar 3 fotos');";
            echo "window.location.replace('?b=addAD')";
            echo "</script>";
            // echo "<pre>"; print_r($_FILES['ant']); echo "</pre>";
          }
          else {
            $namesA=[];

            for ($z=0; $z < 3; $z++) {
              if (isset($names[$z])) {
                $namesA[$z] = $names[$z];
              }else {
                $namesA[$z]='';
              }
            }
            $data=[
              'id'=>$id,
              'img_a1'=>$namesA[0],
              'img_a2'=>$namesA[1],
              'img_a3'=>$namesA[2],
              'img_d1'=>'',
              'img_d2'=>'',
              'img_d3'=>''
            ];
            //save en SERVER y DB

            include_once('models/OrientationImg.php');

            $subidos=[];
            $array_lengt_tm = count($names);
            for ($h=0; $h < $array_lengt_tm ; $h++) {

            $subidos[$h] = move_uploaded_file($_FILES['ant']['tmp_name'][$h],"app/imgs_ad/".$_FILES['ant']['name'][$h]);

            $img_url='app/imgs_ad/';
            chmod($img_url.$names[$h], 0755);//Orientacion
            ExifCleaning::adjustImageOrientation($img_url.$names[$h]);//Orientacion
            }

            $comp = array_search(0, $subidos);
            if (!empty($comp)) {
                echo "<script language='javascript'>";
                echo "alert('Ocurrió un error al subir los archivos');";
                echo "window.location.replace('?b=addAD')";
                echo "</script>";
            }else {
              // echo "<pre>"; print_r($subidos); echo "</pre>";
              $resSave = $this->o->saveImgsBefore($data);
              ///////////////**********************
              // verificar si la consulta tuvo exito
              if ($resSave) {
                echo "<script language='javascript'>";
                echo "alert('Se creo un Antes con exito');";
                echo "window.location.replace('?b=addAD')";
                echo "</script>";
              }
              else {
                echo "<script language='javascript'>";
                echo "alert('Ocurrió un Error');";
                echo "window.location.replace('?b=addAD')";
                echo "</script>";
              }
              ////////////*******************
            }



          }
        }


        }
        else {
          //notificar que el documento igresado no coincide en la BD
          echo "<script language='javascript'>";
          echo "alert('El documento igresado no es correcto');";
          echo "window.location.replace('?b=addAD')";
          echo "</script>";
        }


        // echo $_FILES['ant']['name'][$i]."<br>";
        // foreach ($_FILES['ant'] as $key => $file) {
        //   echo $file['name'];
        // }

      }
      else {
        header("location:?b=index");
      }
    }

    function saveAfter(){
      if (isset($_SESSION['barber'])) {
        //validar cedula en la BD
        $doc = $_POST['docD'];
        $res = $this->o->userDocValid($doc);
        $files_length=count($_FILES['des']['name']);
        if ($res) {
          $id=$res->id_persona;

        ///////////////////////

          $names=[];
          $tmp_names=[];
          $errors=[];
        for ($i=0; $i < count($_FILES['des']['name']) ; $i++) {
            array_push($names, $_FILES['des']['name'][$i]);
        }
        for ($i=0; $i < count($_FILES['des']['tmp_name']) ; $i++) {
            array_push($tmp_names, $_FILES['des']['tmp_name'][$i]);
        }
        for ($i=0; $i <count($_FILES['des']['error']) ; $i++) {
            array_push($errors, $_FILES['des']['error'][$i]);
        }



        //validar errores
        $r = array_search(0, $errors);
        if (!empty($r)) {

          //notiifcar error de tipo o tamaño en el archivo y volver a  la vista anterior
          echo "<script language='javascript'>";
          echo "alert('Ocurrió un Error');";
          echo "window.location.replace('?b=addAD')";
          echo "</script>";
        }
        else {
          //validar cantidad de fotos
          if ($files_length > 3) {
            echo "<script language='javascript'>";
            echo "alert('Solo puedes adjuntar 3 fotos');";
            echo "window.location.replace('?b=addAD')";
            echo "</script>";
          }
          else {

              $namesD=[];

              for ($z=0; $z < 3; $z++) {
                if (isset($names[$z])) {
                  $namesD[$z] = $names[$z];
                }else {
                  $namesD[$z]='';
                }
              }
              $data=[
                'id'=>$id,
                'img_a1'=>$namesD[0],
                'img_a2'=>$namesD[1],
                'img_a3'=>$namesD[2],
                'img_d1'=>'',
                'img_d2'=>'',
                'img_d3'=>''
              ];
              //save DB y en SERVER

              include_once('models/OrientationImg.php');

              $subidos=[];
              $array_lengt_tm = count($names);
              for ($h=0; $h < $array_lengt_tm ; $h++) {

              $subidos[$h] = move_uploaded_file($_FILES['des']['tmp_name'][$h],"app/imgs_ad/".$_FILES['des']['name'][$h]);

              $img_url='app/imgs_ad/';
              chmod($img_url.$names[$h], 0755);//Orientacion
              ExifCleaning::adjustImageOrientation($img_url.$names[$h]);//Orientacion
              }

              $comp = array_search(0, $subidos);
              if (!empty($comp)) {
                echo "<script language='javascript'>";
                echo "alert('Ocurrió un error al subir los archivos');";
                echo "window.location.replace('?b=addAD')";
                echo "</script>";
              }else {
                // code...
                $resSave = $this->o->saveImgsAfter($data);
                // verificar si la consulta tuvo exito
                if ($resSave) {
                  echo "<script language='javascript'>";
                  echo "alert('Se creo un Despúes con exito');";
                  echo "window.location.replace('?b=addAD')";
                  echo "</script>";
                }
                else {
                  echo "<script language='javascript'>";
                  echo "alert('Ocurrió un Error');";
                  echo "window.location.replace('?b=addAD')";
                  echo "</script>";
                }
              }
          }
        }


        }
        else {
          //notificar que el documento igresado no coincide en la BD
          echo "<script language='javascript'>";
          echo "alert('El documento igresado no es correcto');";
          echo "window.location.replace('?b=addAD')";
          echo "</script>";
        }


        // echo $_FILES['ant']['name'][$i]."<br>";
        // foreach ($_FILES['ant'] as $key => $file) {
        //   echo $file['name'];
        // }

      }
      else {
        header("location:?b=index");
      }
    }

    function saveAD(){
      if (isset($_SESSION['barber'])) {
        echo "<pre>";
        print_r($_FILES['ant']['name'][0]);
        echo "</pre>";


        // $ext_a = substr($_FILES['ant']['name'], -3);
        // $ext_d = substr($_FILES['des']['name'], -3);
//         if (($_FILES['ant']['type'] != "image/jpeg" && $_FILES['ant']['type'] !="image/png" ) || ($_FILES['des']['type'] != "image/jpeg" && $_FILES['des']['type'] !="image/png" )) {
//           echo "<script language='javascript'>";
//           echo "alert('Solo puedes subir imagenes');";
//           echo "window.location.replace('?b=addAD')";
//           echo "</script>";
//         }else {
//           if (($_FILES['ant']['error']>0 || $_FILES['des']['error']>0) ) {
//             if ($_FILES['ant']['error']==1 || $_FILES['des']['error']==1) {
//               echo "<script language='javascript'>";
//               echo "alert('El tamaño del archivo supera los 8Mb');";
//               echo "window.location.replace('?b=addAD')";
//               echo "</script>";
//             }
//         }else {
//     //->
//           if (move_uploaded_file($_FILES['ant']['tmp_name'],"app/imgs_ad/".$_FILES['ant']['name']) && move_uploaded_file($_FILES['des']['tmp_name'],"app/imgs_ad/".$_FILES['des']['name'])) {
//             // code...
//           $id = $_SESSION['custom'][0]->id_persona;
//           $data = [
//             'id'=>$_SESSION['custom'][0]->id_persona,
//             'img_a'=>$_FILES['ant']['name'],
//             'img_d'=>$_FILES['des']['name']
//           ];
//         $res = $this->o->saveImgsAD($data);
//         if ($res) {
//           echo "<script language='javascript'>";
//           echo "alert('A/D guardado');";
//           echo "window.location.replace('?b=perfil')";
//           echo "</script>";
//         }else {
//             echo "<script language='javascript'>";
//             echo "alert('Error al guardar los archivos');";
//             echo "window.location.replace('?b=addAD')";
//             echo "</script>";
//           }
//
//       }else {
//           echo "<script language='javascript'>";
//           echo "alert('Error al subir los archivos');";
//           echo "window.location.replace('?b=addAD')";
//           echo "</script>";
//         }
//         }
// //->
//         }
//
//
//         // $r = ini_get("upload_max_filesize");
//         // echo $r;
//
      }
      else {
        header("location:?b=index");
      }
    }

    function addAD(){
      if (isset($_SESSION['barber'])) {
        // $res = $this->o->getImgsAD($_SESSION['custom'][0]->id_persona);
        // if (count($res)>=3) {
        //   echo "<script language='javascript'>";
        //   echo "alert('Solo puedes guardar 3 A/D');";
        //   echo "window.location.replace('?b=perfil')";
        //   echo "</script>";
        // }else {
          $resT = $this->o->loadSetup();
          if ($resT) {
            $tema = $resT->tema;
          }else {
            $tema = "no";
          }
          include_once('views/layouts/head.php');
          include_once('views/layouts/header2.html');
          include_once('views/barber/newAD.php');
          include_once('views/layouts/foot.html');
        // }

      }else {
        header("location:?b=index");
      }
    }

    function newPass(){
      if (isset($_SESSION['custom']) || isset($_SESSION['barber']) || isset($_SESSION['admin'])) {
        //echo "<pre>";print_r($_POST);echo "</pre>";
        if (isset($_SESSION['custom'])) {
          $id=$_SESSION['custom'][0]->id_persona;
        }
        if (isset($_SESSION['barber'])) {
          $id=$_SESSION['barber'][0]->id_persona;
        }
        if (isset($_SESSION['admin'])) {
          $id=$_SESSION['admin'][0]->id_persona;
        }
        $actual=$_POST['actual'];
        $nueva=$_POST['nueva'];
        $res = $this->o->newPass($id, $actual, $nueva);
        if ($res) {
          echo "<script language='javascript'>";
          echo "alert('Contraseña modificada, Ingresa con tus nuevos datos');";
          echo "window.location.replace('?b=perfil')";
          echo "</script>";
          // $this->exit();
        }

      }else {
        header("location:?b=index");
      }
    }

    function changeImgPre(){
      if (isset($_SESSION['barber'])) {
        //Orientacion de las imgs
        include_once('models/OrientationImg.php');
        if ($_FILES['img_perfil']['type'] != "image/jpeg" &&  $_FILES['img_perfil']['type'] != "image/png" && $_FILES['img_perfil']['type'] != "image/jpg") {
          echo "<script language='javascript'>";
          echo "alert('Archivo no permitido');";
          echo "window.location.replace('?b=perfil')";
          echo "</script>";
        }
        elseif ($_FILES['img_perfil']['error']>0) {
          echo "<script language='javascript'>";
          echo "alert('El archivo supera el tamaño permitido');";
          echo "window.location.replace('?b=perfil')";
          echo "</script>";
        }
        else {
          if(move_uploaded_file($_FILES['img_perfil']['tmp_name'],"app/imgs_perf/".$_FILES['img_perfil']['name'])){
            $img_perfil=$_FILES['img_perfil']['name'];
            $img_url='app/imgs_perf/';
            chmod($img_url.$img_perfil, 0755);//Orientacion
            ExifCleaning::adjustImageOrientation($img_url.$img_perfil);//Orientacion
            $id=$_SESSION['barber'][0]->id_persona;
            $res = $this->o->changeImgPre($id, $img_perfil);

            if ($res) {
              echo "<script language='javascript'>";
              echo "alert('Foto cambiada');";
              echo "window.location.replace('?b=perfil')";
              echo "</script>";
            }else {
              echo "<script language='javascript'>";
              echo "alert('Error al guardar el archivo');";
              echo "window.location.replace('?b=perfil')";
              echo "</script>";
            }

          }else {
            echo "<script language='javascript'>";
            echo "alert('Error al subir el archivo');";
            echo "window.location.replace('?b=perfil')";
            echo "</script>";
          }
        }

      }else {
        header("location:?b=index");
      }
    }














} ?>
