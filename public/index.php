<?php
use App\Controllers\ToDocontroller;
require "vendor/autoload.php";

$todo = new ToDoController;
$todo -> store([
    "Title" => "Hacer proyecto de php",
    "Description" => "Aprender a conectarlo y tal",
],
[
    "Title" =>"Aprender php",
    "Description"=>"¿Cómo funciona esto",
])




?>