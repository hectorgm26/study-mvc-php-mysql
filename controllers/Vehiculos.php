<?php

# El controller permite la interacción entre el modelo y la vista.
# En este caso, el controller se encarga de manejar las peticiones del usuario y de enviar la información al modelo para que este la procese y muestre la información en la vista.
class VehiculosController {

    public function __construct()
    {
    require_once "models/VehiculosModel.php";
    }

    public function index() {

      # Para agregar el modelo de vehículo, se debe requerir el archivo VehiculosModel.php
      require_once "models/VehiculosModel.php";
      $vehiculos = new Vehiculos_model(); # Se crea un objeto de la clase Vehiculos_model, que se importó en la línea anterior.

      $data["titulo"] = "Vehiculos"; # Esta linea lo que haca es mostrar el título de la página en la vista por medio de la variable $data que se le pasa a la vista.
      $data["vehiculos"] = $vehiculos->get_vehiculos(); # Se llama al método get_vehiculos() para mostrar el catalogo de vehículos. PERO HAY QUE MOSTRARLO EN LA VISTA.

      # Cargar la vista
      require_once "views/vehiculos/vehiculos.php";
      # Una vez cargada, podremos enviarle data a traves de la función index(), por medio de la variable $data.
    }



    # Tenemos que trabajar el controlador para mostrar la parte de la vista y trabajar con el modelo de vehiculo_nuevo.
    # Este metodo es para mostrar la vista de vehiculos_nuevo.php
    public function nuevo() {

        $data["titulo"] = "Vehiculos";

        # Cargar la vista
        require_once "views/vehiculos/vehiculos_nuevo.php";
    }

    public function guarda() {

      $placa = $_POST["placa"];
      $marca = $_POST["marca"];
      $modelo = $_POST["modelo"];
      $anio = $_POST["anio"];
      $color = $_POST["color"];

      #Instancia al modelo vehiculo y validaciones respectivas
      $vehiculos = new Vehiculos_model();

      $vehiculos->insertar($placa, $marca, $modelo, $anio, $color);

      $data["titulo"] = "Vehiculos";

      # Cargar la vista principal
      $this->index();
  }

  public function modificar($id) {

    $vehiculos = new Vehiculos_model();

    $data["id"] = $id;
    $data["vehiculos"] = $vehiculos->get_vehiculo($id);
    $data["titulo"] = "Vehiculos";

    require_once "views/vehiculos/vehiculos_modifica.php";
  }

  public function actualizar() {

    $id = $_POST["id"];
    $placa = $_POST["placa"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $anio = $_POST["anio"];
    $color = $_POST["color"];

    $vehiculos = new Vehiculos_model();

    $vehiculos->modificar($id, $placa, $marca, $modelo, $anio, $color);

    $data["titulo"] = "Vehiculos";

    $this->index();
}

public function eliminar($id) {

  $vehiculos = new Vehiculos_model();

  $vehiculos->eliminar($id);

  $data["titulo"] = "Vehiculos";

  $this->index();
}


}
?>