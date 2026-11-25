<?php
//todas las acciones se hacen desde aqui
require_once __DIR__ . '/controllers/TareaController.php';

$controlador =new TareaController();
// Lee qué acción se pidio por la URL 
$accion=$_GET['accion']?? 'index';
match ($accion) {
    'crear'    => $controlador->crear(),
    'estado'   => $controlador->cambiarEstado(),
    'eliminar' => $controlador->eliminar(),
    default    => $controlador->index(),
};