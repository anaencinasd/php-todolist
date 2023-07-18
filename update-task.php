<?php
use App\Controllers\ToDoController;
require "vendor/autoload.php";
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar tarea</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />
</head>

<body>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $taskId = $_POST["id"];
      $newTitle = $_POST["title"];
      $newDescription = $_POST["description"];
      $newDeadline = $_POST["deadline"];

      $data = [
          'Title' => $newTitle,
          'Description' => $newDescription,
          'Deadline' => $newDeadline,
      ];

      $update = new ToDoController;
      $update->update("todo", $taskId, $data);

      ?>
    <div class="max-w-sm mx-auto m-4">
      <form action="update-task.php" method="POST" class="object-position: center max-w-sm m-4">
        <input type="hidden" name="id" value="<?= $taskId ?>">
        <label for="title" class="text-gray-700">Tarea</label>
        <input type="text" id="title" name="title" value="<?= $newTitle ?>" required
          class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        <label for="description" class="mt-4 text-gray-700">Descripción</label>
        <input type="text" id="description" name="description" value="<?= $newDescription ?>" required
          class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        <label for="deadline" class="mt-4 text-gray-700">¿Para cuándo es?</label>
        <input type="date" id="deadline" name="deadline" value="<?= $newDeadline ?>"
          class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        <input type="submit" value="Actualizar tarea"
          class="inline-block w-full px-4 py-2 mt-4 text-white bg-indigo-500 rounded-md shadow-sm hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      </form>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
      <p class="text-lg font-semibold mb-2">La tarea se ha editado correctamente</p>
      <a href="index.php" class="inline-block px-4 py-2 text-white bg-indigo-500 rounded-md shadow-md hover:bg-indigo-600">Volver a la lista de tareas</a>
    </div>

    <?php
  } else {
      if (isset($_GET["id"])) {
          $taskId = $_GET["id"];

          $taskList = new ToDoController;
          $task = $taskList->edit("todo", $taskId);

          if ($task === "No hay ninguna tarea para editar") {
              ?>
    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
      <?= $task ?>
    </div>
    <?php
          } else {
              ?>
    <div class="max-w-sm mx-auto m-4">
      <form action="update-task.php" method="POST" class="object-position: center max-w-sm m-4">
        <input type="hidden" name="id" value="<?= $task["id"] ?>">
        <label for="title" class="text-gray-700">Tarea</label>
        <input type="text" id="title" name="title" value="<?= $task["Title"] ?>" required
          class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        <label for="description" class="mt-4 text-gray-700">Descripción</label>
        <input type="text" id="description" name="description" value="<?= $task["Description"] ?>" required
          class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        <label for="deadline" class="mt-4 text-gray-700">¿Para cuándo es?</label>
        <input type="date" id="deadline" name="deadline" value="<?= $task["Deadline"] ?>"
          class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        <input type="submit" value="Actualizar tarea"
          class="inline-block w-full px-4 py-2 mt-4 text-white bg-indigo-500 rounded-md shadow-sm hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      </form>
    </div>
    <?php
          }
      } else {
          ?>
    <div class="bg-white shadow-lg rounded-lg p-6 text-center">No has seleccionado ninguna tarea</div>
    <?php
      }
  }
  ?>

</body>

</html>
