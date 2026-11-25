<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Tareas</title>
    <link rel="stylesheet" href="/public/style.css">
</head>
<body>
    <h1>Gestor de Tareas</h1>
    <p class="subtitulo"><?= count($tareas ?? []) ?> tarea(s) registrada(s)</p>

    <!-- Formulario que envía los datos al Controlador -->
    <form action="index.php?accion=crear" method="POST">
        <input type="text" name="titulo" placeholder="Título" required>
        <input type="text" name="descripcion" placeholder="Descripción">
        <button type="submit">Agregar</button>
    </form>

    <!-- Recorremos $tareas, la variable que nos entregó el Controlador -->
    <?php if (empty($tareas)): ?>
        <div class="vacio">Todavía no tienes tareas. Agrega la primera arriba.</div>
    <?php else: ?>
        <ul>
            <?php foreach ($tareas as $tarea): ?>
                <li class="<?= $tarea['estado'] ?>">
                    <div class="tarea-info">
                        <!-- htmlspecialchars evita que un título con HTML/JS rompa la página -->
                        <span class="tarea-titulo"><?= htmlspecialchars($tarea['titulo']) ?></span>
                        <span class="tarea-descripcion"><?= htmlspecialchars($tarea['descripcion']) ?></span>
                        <span class="badge <?= $tarea['estado'] ?>"><?= $tarea['estado'] ?></span>
                    </div>

                    <!-- Estos enlaces solo mandan el id; toda la lógica vive en el Controlador -->
                    <div class="tarea-acciones">
                        <a href="index.php?accion=estado&id=<?= $tarea['id'] ?>">Cambiar estado</a>
                        <a href="index.php?accion=eliminar&id=<?= $tarea['id'] ?>">Eliminar</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>