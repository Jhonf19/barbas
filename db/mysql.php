<?php

class MySQL{
  private static $dsn='mysql:host=localhost;dbname=barbas';
  private static $user="root";
  private static $password="";
  private static $con = null;

  public function __construct() {
      die('Init function is not allowed');
  }

  public static function conectar(){
    if (null== self::$con) {
      try {
          self::$con = new PDO(self::$dsn, self::$user, self::$password);
          // code...
          //echo 'Conectado:';

      } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
      }
    }
    return self::$con;
  }

  public static function desconectar()
  {
      self::$cont = null;
      print_r( 'Desonectado:');
  }


}

?>
