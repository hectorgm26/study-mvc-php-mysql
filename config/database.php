<?php

class Conectar {

    public static function conexion() {

      $conexion = new mysqli("localhost", "root", "", "mvc");

      mysqli_select_db($conexion, "mvc") or die("No se pudo conectar a la base de datos");

      return $conexion;
    }
}

?>