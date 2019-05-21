<?php
require_once('models/modelo.php');

$req = new Modelo;
  $data=[
    'user'=>$_POST['user'],
    'pass'=>$_POST['pass']
  ];
$res = $req->userVerify($data);
if (!empty($res)) {
  if ($res[0]->rol == 1) {
    // session_start();
    $_SESSION['admin']=$res;
    // echo "<pre>"; print_r($_SESSION); echo "</pre>";
    header("location:app/admin/");
    // $this->listPub();

  }else if ($res[0]->rol == 2) {
    $_SESSION['admin']=$res;
    echo "bar";
  }else if ($res[0]->rol == 3) {
    $_SESSION['admin']=$res;
    echo "cli";
  }

}else {
  header("location:index.php");
}

 ?>
