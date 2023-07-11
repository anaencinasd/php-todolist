<?php
use App\Controllers\ToDoController;
require "vendor/autoload.php";
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $taskId = $_POST["id"];
    $newTitle = $_POST["title"];
    $newDescription = $_POST["description"];
    $newDeadline = $_POST["deadline"];

    $update = new ToDoController;
    $update->update("todo", "Title", $newTitle, $taskId);
    $update->update("todo", "Description", $newDescription, $taskId);
    $update->update("todo", "Deadline", $newDeadline, $taskId);

    echo "La tarea se ha editado correctamente";
    echo "<a href='index.php'>Volver a la lista de tareas</a>";
} else {
    if (isset($_GET["id"])) {
        $taskId = $_GET["id"];

        $taskList = new ToDoController;
        $task = $taskList->edit("todo", $taskId);

        if ($task === "No hay ninguna tarea para editar") {
            echo $task;
        } else {
            // Mostrar formulario con los datos de la tarea
            echo "<form action='update-task.php' method='POST'>";
            echo "<input type='hidden' name='id' value='" . $task["id"] . "'>";
            echo "<label for='title'>Título:</label>";
            echo "<input type='text' id='title' name='title' value='" . $task["Title"] . "' required><br>";
            echo "<label for='description'>Descripción:</label>";
            echo "<input type='text' id='description' name='description' value='" . $task["Description"] . "' required><br>";
            echo "<label for='deadline'>Fecha límite:</label>";
            echo "<input type='date' id='deadline' name='deadline' value='" . $task["Deadline"] . "'><br>";
            echo "<input type='submit' value='Actualizar tarea'>";
            echo "</form>";
        }
    } else {
        echo "ID de tarea no proporcionado.";
    }
}
?>
