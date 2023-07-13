<?php
use App\Controllers\ToDocontroller;
require "vendor/autoload.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = [
        'Title' => $_POST["title"],
        'Description'=> $_POST["description"],
        'Deadline' => $_POST["deadline"],
    ];
    
}


$todo = new ToDoController;
$todo -> store("todo", $data);
print_r("La tarea se ha añadido correctamente");
echo ("<a href='/Proyecto%206/php-todolist/index.php'>
<button>Volver a la lista de tareas</button></a>");
