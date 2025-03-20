<?php

class Vehiculos_model {

  private $db;
  private $vehiculos;

  public function __construct()
  {
    $this->db = Conectar::conexion(); # Invocamos la clase estática Conectar y su método conexion, sin necesidad de instanciarla, ni de hacer un new. ni de hacer un require_once.
    $this->vehiculos = array();
  }

  public function get_vehiculos() {

    $sql = "SELECT * FROM vehiculos";

    $resultado = $this->db->query($sql); # Se ejecuta la consulta y se guarda en la variable $resultado. Se accede a la propiedad db de la clase actual, que es la conexión a la base de datos, y se llama al método query, que ejecuta la consulta.

    while($row = $resultado->fetch_assoc()) { # fetch_assoc() lo que hace es devolver una fila de resultados como un array asociativo. Si no hay más filas que devolver, devuelve NULL. Por eso se puede usar en un bucle while, que se ejecutará mientras haya filas que devolver.
      $this->vehiculos[] = $row; # agregara en cada indice e interacción del bucle, un nuevo elemento al array $vehiculos, que es una propiedad de la clase actual, HASTA QUE NO HAYAN MÁS FILAS QUE DEVOLVER.
    }

    return $this->vehiculos; # Se retorna el array $vehiculos, que contiene todos los registros de la tabla vehiculos.
    # SE HACE CONSULTA A VEHICULOS Y REGREMOS TODO LO QUE TRAE LA TABLA, PARA VISUALIZAR LOS DATOS EN LA VISTA. AHORA NECESITAMOS HACER LA CONEXION ENTRE EL MODELO Y LA VISTA.
  }

  public function insertar($placa, $marca, $modelo, $anio, $color) {

    # Insersión de datos en la tabla vehiculos.
    $resultado = $this->db->query("INSERT INTO vehiculos (placa, marca, modelo, anio, color) VALUES ('$placa', '$marca', '$modelo', '$anio', '$color')");

    return $resultado;
  }

  public function modificar($id, $placa, $marca, $modelo, $anio, $color) {

    # Insersión de datos en la tabla vehiculos.
    $resultado = $this->db->query("UPDATE vehiculos SET placa = '$placa', marca = '$marca', modelo = '$modelo', anio = '$anio', color = '$color' WHERE id = '$id'");

    return $resultado;

  }

  public function eliminar($id) {

    # Insersión de datos en la tabla vehiculos.
    $resultado = $this->db->query("DELETE FROM vehiculos WHERE id = '$id'");

    return $resultado;
  }

  public function get_vehiculo($id) {

    $sql = "SELECT * FROM vehiculos where id = '$id' LIMIT 1";

    $resultado = $this->db->query($sql); 

    $row = $resultado->fetch_assoc();

    return $row;
  }
}
?>