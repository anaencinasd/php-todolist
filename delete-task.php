<?php
use App\Controllers\ToDoController;
require "vendor/autoload.php";
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $taskId = $_GET["id"]; 
   
    
    $delete = new ToDoController;
    $delete -> destroy("todo", [$taskId]); 
    $message = "La tarea se ha eliminado correctamente";
    $icon = "trash";
    $buttonClass = "bg-red-500";
   
   
} else {
    $message = "Ha habido un error";
    $icon = "times";
    $buttonClass = "bg-red-500";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de tareas</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />
</head>

<body class="bg-gray-100">
  <div class="flex justify-center items-center h-screen">
    <div class="bg-white shadow-lg rounded-lg p-6 space-y-4 text-center">
      <i class="fas fa-<?php echo $icon; ?> text-6xl text-red-500"></i>
      <p class="text-lg font-semibold mb-2"><?php echo $message; ?></p>
      <a href="/Proyecto%206/php-todolist/index.php" class="inline-block px-4 py-2 text-white bg-red-500 rounded-md shadow-md hover:bg-red-600">Volver a la lista de tareas</a>
    </div>
  </div>
</body>

</html>
