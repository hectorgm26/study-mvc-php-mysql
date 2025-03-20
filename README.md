# Implementación de un CRUD con PHP y MySQL utilizando el Patrón de Diseño MVC

Este repositorio está dedicado al estudio y aplicación del patrón de diseño Modelo-Vista-Controlador (MVC) en PHP, implementando un sistema CRUD (Crear, Leer, Actualizar, Eliminar) con MySQL. El objetivo es proporcionar una guía práctica para entender cómo estructurar una aplicación web siguiendo este patrón arquitectónico.

## Contenido del repositorio

- **config/**: Contiene archivos de configuración, como la conexión a la base de datos.
- **controllers/**: Incluye los controladores que gestionan la lógica de negocio y la interacción entre el modelo y la vista.
- **core/**: Contiene clases esenciales para el funcionamiento del framework MVC, como el enrutador y el controlador base.
- **models/**: Alberga los modelos que representan las entidades de la base de datos y contienen la lógica de acceso a datos.
- **views/**: Contiene las vistas que presentan la interfaz de usuario.
  - **vehiculos/**: Subdirectorio específico para las vistas relacionadas con la entidad "vehículos".
- **index.php**: Punto de entrada principal de la aplicación que inicia el enrutamiento y la carga de controladores.

## Instrucciones de uso

1. **Configuración de la base de datos**:
   - Crea una base de datos en MySQL.
   - Ejecuta el script SQL proporcionado (`database.sql`) para crear las tablas necesarias para el funcionamiento del CRUD.

2. **Configuración de la conexión**:
   - Abre el archivo de configuración de la base de datos ubicado en `config/database.php`.
   - Modifica las variables `$host`, `$dbname`, `$username` y `$password` con los datos correspondientes a tu entorno de desarrollo.

3. **Implementación en servidor local**:
   - Coloca todos los archivos del repositorio en el directorio raíz de tu servidor web local (por ejemplo, `htdocs` en XAMPP).
   - Asegúrate de que el servidor web y el servicio de MySQL estén en funcionamiento.

4. **Acceso a la aplicación**:
   - Navega a `http://localhost/index.php` en tu navegador web para interactuar con la aplicación CRUD.

## Funcionalidades

- **Crear**: Añadir nuevos registros de vehículos a la base de datos mediante un formulario.
- **Leer**: Visualizar la lista completa de vehículos registrados.
- **Actualizar**: Modificar la información de vehículos existentes.
- **Eliminar**: Borrar registros de vehículos de la base de datos.

## Notas adicionales

- Este proyecto está orientado a quienes deseen comprender la implementación del patrón de diseño MVC en PHP y su aplicación en sistemas CRUD con MySQL.
- Se recomienda asegurar la aplicación antes de utilizarla en un entorno de producción, implementando medidas como la validación y sanitización de datos, así como la gestión adecuada de errores.

¡Espero que este material te sea de utilidad en tu aprendizaje y desarrollo con PHP y el patrón MVC!
