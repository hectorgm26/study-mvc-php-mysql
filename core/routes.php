<?php

# Archivo para cofigurar el rutado de la url, y asi poder llamar a los controladores de forma dinamica
# Esto se hace con el fin de evitar que por la url se pase de forma incorrecta los controladores y funciones

function cargarControlador($controlador) {

    #Nombre de la clase
    # ucwords convierte la primera letra de cada palabra en mayuscula y el resto en minuscula para respetar la nomenclatura de las clases
    $nombreControlador = ucwords($controlador)."Controller"; # Se concatena el nombre del controlador con la palabra Controller, porque el controlador tiene de nombre de clase VehiculosController, para que asi lo detecte correctamente

    # Nombre del archivo
    $archivoControlador = 'controllers/'.ucwords($controlador).'.php'; # Se concatena el nombre del archivo con la carpeta de controladores y la extension php
    # De esta forma generamos de forma dinamica el controlador que se va a cargar y el archivo que se va a cargar

    # Si el archivo no existe, carga el controlador principal por default
    if (!is_file($archivoControlador)) {

        $archivoControlador = 'controllers/'.CONTROLADOR_PRINCIPAL.'.php'; # Se carga el controlador principal
    }

    # Esto es necesario, porque si el archivo no existe, se debe cargar el controlador principal, y si no se hace esto, se cae el sistema
    # Y se hace por fuera del if, ya que si no se cumple la condicion, se debe cargar el controlador principal
    require_once $archivoControlador;

    # Se crea una instancia del controlador, pero tomando en cuenta el nombre de la clase,
    # Esta es una variable, pero al momento de invocarla la convierte en texto
    $control = new $nombreControlador();
    return $control;
}

function cargarAccion($controller, $accion, $id = null) {

    #method_exists verifica si existe un metodo en una clase, y se le pasa la clase y el metodo
    if(isset($accion) && method_exists($controller, $accion)) {
    if ($id == null) {
          $controller->$accion();
          } else {
          $controller->$accion($id);
    }
    } else {
      $controller->ACCION_PRINCIPAL();
    }
}
?>