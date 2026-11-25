# Gestor de Tareas — Patrón MVC

Aplicación en PHP y MySQL para gestionar tareas (crear, listar, cambiar estado y eliminar), construida siguiendo el patrón MVC

## Estructura del proyecto

gestor-tareas/
├── config/database.php # Conexión PDO(PHP DATA OBJECTS)
├── models/Tarea.php # Modelo
├── controllers/TareaController.php # Controlador
├── views/tareas/index.php # Vista
├── public/style.css # Estilos
├── schema.sql # Script de la base de datos
└── index.php # Front controller

### Modelo — `models/Tarea.php`

Es la única parte del proyecto que habla con la base de datos.

### Vista — `views/tareas/index.php`

Se encarga únicamente de mostrar lo que el Controlador le entrega. No contiene consultas SQL ni decide qué hacer con los datos, solo los presenta.

### Controlador — `controllers/TareaController.php`

Es el intermediario. Recibe la petición del usuario, le pide los datos al Modelo, y decide qué Vista mostrar. Nunca contiene SQL directo ni HTML — todo pasa por `$this->modelo`.

### Front Controller — `index.php`

Es la puerta de entrada única de la aplicación. Lee el parámetro de la URL

## Flujo de una petición (ejemplo: crear una tarea)

- El usuario llena el formulario en la Vista y da clic en "Agregar".
- El formulario envía los datos a index.php?accion=crear.
- El front controller (index.php) recibe la petición y llama a TareaController->crear.
- El Controlador valida que llegaron datos y se los pasa al Modelo: $this->modelo->crearTarea($titulo, $descripcion).
- El Modelo ejecuta el INSERT en la base de datos.
- El Controlador redirige de vuelta a la lista (index()), que vuelve a pedirle al Modelo todas las tareas y se las pasa a la Vista para mostrarlas actualizadas.
