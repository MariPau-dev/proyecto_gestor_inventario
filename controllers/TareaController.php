<?php
//aqui se trae la clase modelo para pedir datos

require_once __DIR__ . '/../models/Tarea.php';

class TareaController
{
    //controlador pide datos al modelo sin hablar directamente con DB
    private Tarea $modelo;
    public function __construct()
{
    $this->modelo =new Tarea ();
}
//muestra la lista de tareas
public function index(): void
{
  $tareas = $this->modelo->obtenerTareas();
//pasamos la variable $tareas a la vista para muestre
require __DIR__ . '/../views/tareas/index.php';
}

//recibe el formulario de "nueva tarea" y guarda

public function crear():void
 {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['titulo'])) {
            $titulo = trim($_POST['titulo']);
            $descripcion = trim($_POST['descripcion'] ?? '');

            $this->modelo->crearTarea($titulo, $descripcion);
        }

        // Después de guardar lo devuelve a la pantalla principal
        header('Location: index.php');
        exit;
    }

    // Cambia el estado de una tarea entre pendiente  completada
    public function cambiarEstado(): void
    {
    if (isset($_GET['id'])) {
            $this->modelo->cambiarEstado((int) $_GET['id']);
        }

        header('Location: index.php');
        exit;
    }

    // Elimina una tarea
    public function eliminar(): void
    {
        if (isset($_GET['id'])) {
            $this->modelo->eliminarTarea((int) $_GET['id']);
        }

        header('Location: index.php');
        exit;
    }
}