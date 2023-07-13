<?php
use App\Controllers\ToDoController;
require "vendor/autoload.php";
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taskId=$_POST["id"];

    if (isset($_POST["undo"])) {
        $update_done = new ToDoController;
        $update_done->done_update("todo", $taskId, 0);
        echo "La tarea ha sido desbloqueada";
    } else {
        $update_done = new ToDoController;
        $update_done->done_update("todo", $taskId, 1);
        echo "¡Felicidades! La tarea está completada";
    }
} else {
    echo "Ha habido un error";
}

echo "<a href='/Proyecto%206/php-todolist/index.php'>Volver a la lista de tareas</a>";