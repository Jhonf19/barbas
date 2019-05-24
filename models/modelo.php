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
    // echo "<pre>"; print_r($data['url']['size']); echo "</pre>";
    try {
      // $this->peticion->query("SET NAMES 'utf8'");
      $h = $this->peticion->prepare("INSERT INTO publicaciones VALUES(NULL, NULL, :titulo, :texto, :url_img)");
      $h->bindParam(':titulo', $data['titulo'], PDO::PARAM_STR);
      $h->bindParam(':texto', $data['texto'], PDO::PARAM_STR);
      $h->bindParam(':url_img', $data['url']['name'], PDO::PARAM_STR);
      $res = $h->execute();

     }catch (\Exception $e) {}
       return $res;

  }

  function deletePub($id){
    try {
      $h = $this->peticion->prepare("DELETE FROM publicaciones WHERE id_publicacion=:id");
      $h->bindParam(':id', $id, PDO::PARAM_INT);
      $res = $h->execute();
    } catch (\Exception $e) {

    }
    return $res;
  }

  function createProd($data)
  {
    try {
      // $this->peticion->query("SET NAMES 'utf8'");
      $h = $this->peticion->prepare("INSERT INTO productos VALUES(NULL, :nombre, :descripcion, :costo, :precio, :stock)");
      $h->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
      $h->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
      $h->bindParam(':costo', $data['costo'], PDO::PARAM_STR);
      $h->bindParam(':precio', $data['precio'], PDO::PARAM_STR);
      $h->bindParam(':stock', $data['stock'], PDO::PARAM_STR);
      $res = $h->execute();

    }catch (\Exception $e) {}
       // echo "<pre>"; print_r($res.'kk'); echo "</pre>";
       return $res;

  }

  function listProducts()
  {
    try {
      $h = $this->peticion->prepare("SELECT * FROM productos");
      $h->execute();
      $result = $h->fetchALL(PDO::FETCH_OBJ);
    } catch (\Exception $e) { }
    return $result;
  }

  function deleteProd($id){
    try {
      $h = $this->peticion->prepare("DELETE FROM productos WHERE id_producto=:id");
      $h->bindParam(':id', $id, PDO::PARAM_INT);
      $res = $h->execute();
    } catch (\Exception $e) {

    }
    return $res;
  }

  function listOneProducts($id)
  {
    try {
      $h = $this->peticion->prepare("SELECT * FROM productos WHERE id_producto=:id");
      $h->bindParam(':id', $id, PDO::PARAM_INT);
      $h->execute();
      $res = $h->fetch(PDO::FETCH_OBJ);
    } catch (\Exception $e) { }
    return $res;
  }

  function serchProducts($id)
  {

    try {
      $h = $this->peticion->prepare("SELECT * FROM productos WHERE nombre LIKE '%$id%' AND stock > 0 ");
      // $h->bindParam(':id',$id, PDO::PARAM_STR);
      $h->execute();
      $res = $h->fetchALL(PDO::FETCH_OBJ);
    } catch (\Exception $e) { }
    return $res;
    // echo "<pre>";
    // print_r($res[0]->nombre);
    // echo "</pre>";
  }

  function sellProducts($data)
  {
    foreach ($data as $key => $row) {
      $dif = $data[$key]->stock - $data[$key]->cantidad;
      try {
        // $this->peticion->query("SET NAMES 'utf8'");
        $h = $this->peticion->prepare("UPDATE productos SET stock= :stock WHERE id_producto= :id_producto");
        $h->bindParam(':id_producto', $data[$key]->id_producto, PDO::PARAM_INT);
        $h->bindParam(':stock', $dif, PDO::PARAM_INT);
        $res = $h->execute();
        // echo "<pre>";
        //  print_r($dif);
        //  print_r($data[$key]->id_producto);
        //
        //  echo "</pre>";

      }catch (\Exception $e) {}
    }
        return $res;

  }




}

 ?>