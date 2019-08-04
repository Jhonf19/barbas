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
      $h = $this->peticion->prepare("SELECT id_persona, documento, nombre, apellido, correo, rol, estado FROM personas WHERE nombre=:user AND password=:pass AND estado=1");
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
      $h = $this->peticion->prepare("SELECT * FROM publicaciones ORDER BY fecha DESC LIMIT 2");
      $h->execute();
      $result = $h->fetchALL(PDO::FETCH_OBJ);
    } catch (\Exception $e) { }
    return $result;

    // echo "<pre>"; print_r($lim); echo "</pre>";

  }

  function listPubAjax($id)
  {

    try {
      $h = $this->peticion->prepare("SELECT * FROM publicaciones WHERE id_publicacion < :id ORDER BY fecha DESC LIMIT 2");
      $h->bindParam(':id', $id, PDO::PARAM_INT);
      $h->execute();
      $result = $h->fetchALL(PDO::FETCH_OBJ);
    } catch (\Exception $e) { }
    return $result;

    // echo "<pre>"; print_r($id); echo "</pre>";

  }

  function createPub($data)
  {
    // echo "<pre>"; print_r($data['url']['size']); echo "</pre>";
    try {
      // $this->peticion->query("SET NAMES 'utf8'");
      $h = $this->peticion->prepare("INSERT INTO publicaciones VALUES(NULL, NULL, :titulo, :texto, :img1, :img2, :img3, :img4)");
      $h->bindParam(':titulo', $data['titulo'], PDO::PARAM_STR);
      $h->bindParam(':texto', $data['texto'], PDO::PARAM_STR);
      $h->bindParam(':img1', $data['img1'], PDO::PARAM_STR);
      $h->bindParam(':img2', $data['img2'], PDO::PARAM_STR);
      $h->bindParam(':img3', $data['img3'], PDO::PARAM_STR);
      $h->bindParam(':img4', $data['img4'], PDO::PARAM_STR);
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

  function editProduct($data)
  {
    try {
      // $this->peticion->query("SET NAMES 'utf8'");
      $h = $this->peticion->prepare("UPDATE productos SET nombre=:nombre, descripcion=:descripcion, costo=:costo, precio=:precio WHERE id_producto=:id_producto");
      $h->bindParam(':id_producto', $data['id_producto'], PDO::PARAM_INT);
      $h->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
      $h->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
      $h->bindParam(':costo', $data['costo'], PDO::PARAM_INT);
      $h->bindParam(':precio', $data['precio'], PDO::PARAM_INT);
      $res = $h->execute();

    }catch (\Exception $e) {}
       // echo "<pre>"; print_r($res); echo "</pre>";
       return $res;

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

  function surtProduct($id_producto, $cantidad)
  {
    try {
      // $this->peticion->query("SET NAMES 'utf8'");
      $h = $this->peticion->prepare("UPDATE productos SET stock=:stock WHERE id_producto=:id_producto");
      $h->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
      $h->bindParam(':stock', $cantidad, PDO::PARAM_INT);
      $res = $h->execute();

    }catch (\Exception $e) {}
       // echo "<pre>"; print_r($cantidad); echo "</pre>";
       return $res;

  }

  function createPerf($data)
  {
    try {
      // $this->peticion->query("SET NAMES 'utf8'");
      $h = $this->peticion->prepare("INSERT INTO personas VALUES(NULL,:documento, :nombre, :apellido, :correo, :password, :rol, 1)");
      $h->bindParam(':documento', $data['documento'], PDO::PARAM_STR);
      $h->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
      $h->bindParam(':apellido', $data['apellido'], PDO::PARAM_STR);
      $h->bindParam(':correo', $data['correo'], PDO::PARAM_STR);
      $h->bindParam(':password', $data['documento'], PDO::PARAM_STR);
      $h->bindParam(':rol', $data['rol'], PDO::PARAM_INT);
      $res = $h->execute();

    }catch (\Exception $e) {}
       // echo "<pre>"; print_r($res.'kk'); echo "</pre>";
       return $res;

  }

  function editarAcount($id){
    try {
      $h = $this->peticion->prepare("SELECT id_persona, estado FROM personas WHERE id_persona=:id");
      $h->bindParam(':id', $id, PDO::PARAM_INT);
      $h->execute();
      $res = $h->fetch(PDO::FETCH_OBJ);
    } catch (\Exception $e) { }
    return $res;
    // echo "<pre>"; print_r($res-); echo "</pre>";
  }

  function listPersons($rol, $state)
  {
    if (!empty($rol) && !empty($state)){
      // echo "c1";
      // echo "rol ".$rol;
      // echo "est ".$state;
      try {
        $h = $this->peticion->prepare("SELECT personas.id_persona, personas.documento, personas.nombre, personas.apellido, personas.correo, personas.estado, personas.rol, roles.id_rol, roles.rol AS rol_name
                                          FROM personas, roles
                                          WHERE personas.rol = roles.id_rol AND personas.rol = :rol AND  personas.estado = :state");
        $h->bindParam(':rol', $rol, PDO::PARAM_INT);
        $h->bindParam(':state', $state, PDO::PARAM_INT);
        $h->execute();
        $res = $h->fetchALL(PDO::FETCH_OBJ);
      } catch (\Exception $e) { }
      return $res;
    }

    if (empty($rol) && empty($state)) {
      // echo "c2";
      // echo "rol ".$rol;
      // echo "est ".$state;
      try {
        $h = $this->peticion->prepare("SELECT personas.id_persona, personas.documento, personas.nombre, personas.apellido, personas.correo, personas.estado, personas.rol, roles.id_rol, roles.rol AS rol_name
                                          FROM personas, roles
                                          WHERE personas.rol = roles.id_rol");
        $h->execute();
        $res = $h->fetchALL(PDO::FETCH_OBJ);
      } catch (\Exception $e) { }
      return $res;
  }

  if (!empty($rol)) {
    // echo "c3";
    // echo "rol ".$rol;
    // echo "est ".$state;
    try {
      $h = $this->peticion->prepare("SELECT personas.id_persona, personas.documento, personas.nombre, personas.apellido, personas.correo, personas.estado, personas.rol, roles.id_rol, roles.rol AS rol_name
                                        FROM personas, roles
                                        WHERE personas.rol = roles.id_rol AND  personas.rol = :rol");
      $h->bindParam(':rol', $rol, PDO::PARAM_INT);
      $h->execute();
      $res = $h->fetchALL(PDO::FETCH_OBJ);
    } catch (\Exception $e) { }
    return $res;
  }

  }

  function listTur($idBar, $idCli){
    if ($idBar) {
        try {
              $h = $this->peticion->prepare("SELECT * FROM turnos WHERE barbero=:barbero");
              $h->bindParam(':barbero', $idBar, PDO::PARAM_INT);
              $h->execute();
              $res = $h->fetchALL(PDO::FETCH_OBJ);

            } catch (\Exception $e) {

            }
            return $res;

    }
    if ($idCli) {
      try {
            $h = $this->peticion->prepare("SELECT turnos.id_turno, turnos.barbero, turnos.cliente, personas.id_persona, personas.nombre, personas.apellido
              FROM turnos, personas WHERE turnos.barbero = personas.id_persona
              AND turnos.cliente = :cliente");
            $h->bindParam(':cliente', $idCli, PDO::PARAM_INT);
            $h->execute();
            $res = $h->fetchALL(PDO::FETCH_OBJ);

          } catch (\Exception $e) {

          }
          return $res;
    }
  }

  function createTurn($idBar, $idCli, $codTu){
    try {

      $h = $this->peticion->prepare("INSERT INTO turnos VALUES(NULL,:barbero, :cliente, :codigo_t)");
      $h->bindParam(':barbero', $idBar, PDO::PARAM_INT);
      $h->bindParam(':cliente', $idCli, PDO::PARAM_INT);
      $h->bindParam(':codigo_t', $codTu, PDO::PARAM_INT);
      $res = $h->execute();

    } catch (\Exception $e) {

    }
    return $res;
  }

  function listBarber($id){
    try {
          $h = $this->peticion->prepare("SELECT id_persona, nombre, apellido FROM personas WHERE rol=2 AND id_persona=:id");
          $h->bindParam(':id', $id, PDO::PARAM_INT);
          $h->execute();
          $res = $h->fetchALL(PDO::FETCH_OBJ);

        } catch (\Exception $e) {

        }
        return $res;
  }

  function deleteTurn($id){
    try {
      $h = $this->peticion->prepare("DELETE FROM turnos WHERE id_turno=:id");
      $h->bindParam(':id', $id, PDO::PARAM_INT);
      $res = $h->execute();
    } catch (\Exception $e) {

    }
    return $res;
  }

  function newPass($id, $actual, $nueva)
  {
    try {
      $h = $this->peticion->prepare("SELECT id_persona, password FROM personas WHERE  id_persona=:id AND password=:actual");
      $h->bindParam(':id', $id, PDO::PARAM_INT);
      $h->bindParam(':actual', $actual, PDO::PARAM_STR);
      $h->execute();
      $res = $h->fetch(PDO::FETCH_OBJ);

    } catch (\Exception $e) {

    }
    if ($res) {
      try {
        $h = $this->peticion->prepare("UPDATE personas SET password=:nueva WHERE id_persona=:id");
        $h->bindParam(':id', $id, PDO::PARAM_INT);
        $h->bindParam(':nueva', $nueva, PDO::PARAM_STR);
        $res2 = $h->execute();
      } catch (\Exception $e) {

      }
      return $res2;
    }else {
    //  echo "Contraseña actual incorrecta <a href='?b=perfil'>Volver</a>";
      echo "<script language='javascript'>";
      echo "alert('Contraseña actual incorrecta');";
      echo "window.location.replace('?b=perfil')";
      echo "</script>";
    }
    //echo "<pre>";print_r($res);echo "</pre>";
  }

  function estate_ch($id, $est){
    try {
      $h = $this->peticion->prepare("UPDATE personas SET estado=:est WHERE id_persona=:id");
      $h->bindParam(':id', $id, PDO::PARAM_INT);
      $h->bindParam(':est', $est, PDO::PARAM_STR);
      $res = $h->execute();
    } catch (\Exception $e) {

    }
    return $res;
  }

  function saveImgsAD($data){
    try {
      $h = $this->peticion->prepare("INSERT INTO imgs_ad VALUES (NULL,:id, :img_a, :img_d) ");
      $h->bindParam(':id', $data['id'], PDO::PARAM_INT);
      $h->bindParam(':img_a', $data['img_a'], PDO::PARAM_STR);
      $h->bindParam(':img_d', $data['img_d'], PDO::PARAM_STR);
      $res =  $h->execute();
    } catch (\Exception $e) {

    }
    return $res;
    // echo "<pre>";print_r($data['img_d']);echo "</pre>";
  }

  function getImgsAD($id){
    try {
      $h = $this->peticion->prepare("SELECT * FROM imgs_ad WHERE  id_user=:id");
      $h->bindParam(':id', $id, PDO::PARAM_INT);
      $h->execute();
      $res = $h->fetchALL(PDO::FETCH_OBJ);
    } catch (\Exception $e) {

    }
    return $res;
  }

  function deleteImgsAD($id){
    try {
      $h = $this->peticion->prepare("DELETE FROM imgs_ad WHERE id_imgad=:id");
      $h->bindParam(':id', $id, PDO::PARAM_INT);
      $res = $h->execute();
    } catch (\Exception $e) {

    }
    return $res;
  }

  function loadSetup(){
    try {
      $h = $this->peticion->prepare("SELECT * FROM setups");
      $h->execute();
      $res = $h->fetch(PDO::FETCH_OBJ);
    } catch (\Exception $e) {

    }
    return $res;
  }

  function changeTheme($tema){
    try {
      $h = $this->peticion->prepare("UPDATE setups SET tema=:tema WHERE id_setup=1");
      $h->bindParam(':tema', $tema, PDO::PARAM_STR);
      $res = $h->execute();
    } catch (\Exception $e) {

    }
    return $res;
  }

  function changeContentSPA($data){
    try {
      $h = $this->peticion->prepare("UPDATE setups SET nombre_barberia=:nombre_barberia, resena=:resena, telefono=:telefono, direccion=:direccion, horario=:horario  WHERE id_setup=1");
      $h->bindParam(':nombre_barberia', $data['nombar'], PDO::PARAM_STR);
      $h->bindParam(':resena', $data['resena'], PDO::PARAM_STR);
      $h->bindParam(':telefono', $data['telefono'], PDO::PARAM_STR);
      $h->bindParam(':direccion', $data['direccion'], PDO::PARAM_STR);
      $h->bindParam(':horario', $data['horario'], PDO::PARAM_STR);
      $res = $h->execute();
    } catch (\Exception $e) {

    }
    return $res;
  }

  function addService($servicio, $precio){
    try {
      $h = $this->peticion->prepare("INSERT INTO servicios VALUES (NULL, :servicio, :precio) ");
      $h->bindParam(':servicio', $servicio, PDO::PARAM_STR);
      $h->bindParam(':precio', $precio, PDO::PARAM_STR);
      $res =  $h->execute();
    } catch (\Exception $e) {

    }
    return $res;
    // echo "<pre>";print_r($data['img_d']);echo "</pre>";
  }

  function listServices(){
    try {
      $h = $this->peticion->prepare("SELECT * FROM servicios");
      $h->execute();
      $res = $h->fetchALL(PDO::FETCH_OBJ);
    } catch (\Exception $e) {

    }
    return $res;
  }

  function deleteService($id){
    try {
      $h = $this->peticion->prepare("DELETE FROM servicios WHERE id_servicio=:id");
      $h->bindParam(':id', $id, PDO::PARAM_INT);
      $res = $h->execute();
    } catch (\Exception $e) {

    }
    return $res;
  }







}

 ?>
