<?php
use App\Controllers\ToDocontroller;
require "vendor/autoload.php";
require_once "./config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = [
        'Title' => $_POST["title"],
        'Description'=> $_POST["description"],
        'Deadline' => $_POST["deadline"],
    ];
    
}


$todo = new ToDoController;
$todo -> store("todo", $data);
