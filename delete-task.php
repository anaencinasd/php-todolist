<?php
use App\Controllers\ToDoController;
require "vendor/autoload.php";
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $taskId = $_GET["id"]; 
   
    
    $delete = new ToDoController;
    $delete -> destroy("todo", [$taskId]); 
    echo("La tarea se ha eliminado correctamente");
   
   
}else { echo "Ha habido un error";
    
};





echo ("<a href='/Proyecto%206/php-todolist/index.php'>
<button>Volver a la lista de tareas</button></a>");

?>
