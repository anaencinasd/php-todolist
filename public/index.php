<?php
use App\Controllers\ToDocontroller;
require "vendor/autoload.php";
require_once __DIR__ . '/../config.php';

$todo = new ToDoController;
$todo -> store([
    "Title" => "Seguir aprendiendo php",
    "Description" => "Ya he conectado la variable de entorno, pero tendré que borrar todas las tareas que he almacenado antes",
],
);





?>