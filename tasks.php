<?php
use App\Controllers\ToDocontroller;
require "vendor/autoload.php";

$message = "";
$icon = "";
$buttonClass = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = [
        'Title' => $_POST["title"],
        'Description'=> $_POST["description"],
        'Deadline' => $_POST["deadline"],
    ];
    
    $todo = new ToDoController;
    $todo->store("todo", $data);
    
    $message = "La tarea se ha añadido correctamente";
    $icon = "check";
    $buttonClass = "bg-green-500";
} else {
    $message = "Ha habido un problema al añadir la tarea. Por favor, inténtalo de nuevo";
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
      <i class="fas fa-<?php echo $icon; ?> text-6xl <?php echo ($icon === 'check') ? 'text-green-500' : 'text-red-500'; ?>"></i>
      <p class="text-lg font-semibold mb-2"><?php echo $message; ?></p>
      <a href="/Proyecto%206/php-todolist/index.php" class="inline-block px-4 py-2 text-white <?php echo $buttonClass; ?> rounded-md shadow-md hover:bg-indigo-600">Volver a la lista de tareas</a>
    </div>
  </div>
</body>

</html>
