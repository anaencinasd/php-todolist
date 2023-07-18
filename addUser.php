<?php
use App\Controllers\ToDocontroller;
require_once __DIR__ .'/vendor/autoload.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = [
        'username' => $_POST["username"],
        'password'=> $_POST["password"],
        'name' => $_POST["name"],
        'email' => $_POST["email"],
        
    ];
    
}


$addUser = new ToDoController;
$addUser -> store("users", $data);
print_r("Te has registrado correctamente");
echo ("<a href='/Proyecto%206/php-todolist/index.php'>
<button>Continuar a la lista de tareas</button></a>");