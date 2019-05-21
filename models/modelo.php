<?php
session_start();
  class Modelo
  {

    private $peticion;
    private $respuesta;

    function __construct(){
      $this->peticion=MySQL::conectar();
    }
  function userVerify($data)
  {
    try {
      // $this->peticion->query("SET NAMES 'utf8'");
      $h = $this->peticion->prepare("SELECT * FROM personas WHERE nombre=:user AND password=:pass");
      $h->bindParam(':user', $data['user'], PDO::PARAM_STR);
      $h->bindParam(':pass', $data['pass'], PDO::PARAM_STR);
      $h->execute();
      // $c=$h->rowCount();
      $resultado = $h->fetchALL(PDO::FETCH_OBJ);

     }catch (\Exception $e) {}

      return    $resultado;
      $this->peticion=MySQL::desconectar();
  }

  function listPublications()
  {
    try {
      $h = $this->peticion->prepare("SELECT * FROM publicaciones ORDER BY fecha DESC");
      $h->execute();
      $result = $h->fetchALL(PDO::FETCH_OBJ);
    } catch (\Exception $e) { }
    return $result;
  }

  function createPub($data)
  {
    try {
      // $this->peticion->query("SET NAMES 'utf8'");
      $h = $this->peticion->prepare("INSERT INTO publicaciones VALUES(NULL, NULL, :titulo, :texto, :url_img)");
      $h->bindParam(':titulo', $data['titulo'], PDO::PARAM_STR);
      $h->bindParam(':texto', $data['texto'], PDO::PARAM_STR);
      $h->bindParam(':url_img', $data['url'], PDO::PARAM_STR);
      $res = $h->execute();

     }catch (\Exception $e) {}
       return $res;

  }






}

 ?>
