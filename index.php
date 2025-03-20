<?php

# El index es la pagina principal, y este llama al controlador de vehiculos, que es el que se encarga de traer los datos de la base de datos y enviarlos a la vista

require_once "config/config.php"; # Se incluye controlador principañ
require_once "core/routes.php";

require_once "config/database.php";
require_once "controllers/Vehiculos.php";

# Debemos indicarle como se va a cargar el controlador, y para eso, debemos indicarle que controlador se va a cargar
# Y llamaremos al controlador por la url y sus parametros, y asi se sabra que controlador especifico se debe llamar
/*
$control = new VehiculosController();
$control->index();
*/

# Isset es una funcion que verifica si una variable existe, y si existe, se ejecuta el codigo que esta dentro del if
# Debemos definir un controlador principal con una accion principal en la carpeta config a traves de constantes que pueda utilizar en todo el sistema

# El get sale de la url, y funciona de la siguiente forma: index.php?c=vehiculos&a=nuevo, donde c es el controlador que se va a cargar, y vehiculos es el controlador que se va a cargar, y la a es la accion que se va a realizar, y nuevo es la accion que se va a realizar
if (isset($_GET["c"])) {

    $controlador = cargarControlador($_GET["c"]);

    # Validar que existe la accion que se le pasa por la url
    if (isset($_GET["a"])) {
        if(isset($_GET["id"])) {
            cargarAccion($controlador, $_GET["a"], $_GET["id"]);
            } else {
            cargarAccion($controlador, $_GET["a"]);
    }
    } else {
      cargarAccion($controlador, ACCION_PRINCIPAL);
    }

} else {

    $controlador = cargarControlador(CONTROLADOR_PRINCIPAL);

    $accionTmp = ACCION_PRINCIPAL; # Se crea una variable temporal para almacenar la accion principal, CON EL FIN DE EVITAR QUE TOME COMO TEXTO LA CONSTANTE
    $controlador->$accionTmp();
}

# El intex en su estructura trae la base de datos y el controlador llamado vehiculos,y realoza una instancia del controlador de vehoculos
# una vez tiene ese objeto, se llama a su metodo index, y este metodo trae el modelo de vehiculos realizando una consulta a mysql de los vehiculos que tiene la tabla
# y tambien hace una invocacion a la vista para enviarle los datos que ya trajo del modelo, como el titulo y los vehiculos que trajo de la base de datos
# y ya teniendo la vista, esta toma los datos y los visualiza en la tabla

# Ya con eso, falta agregar funcionalidades adicionales como nuevo, modificar, eliminar, etc.
# Lo que puede complicarse en cuanto a como llamarlos, ya que el index llama automaticamente un contolador estatico. ¿Pero como el sistema sabe que se tratara de crear. modificar o eliminar? POR ESO HAY QUE MODIFICAR EL SISTEMA PARA INDICAR A QUE CONTROLADOR SE DEBE LLAMAR

# Objetivo= Tenemos que llamar a los controladores y funciones de forma dinamica, y que en caso de errores, nos envie a un controlador en especifico
?>