<?php
use App\Controllers\ToDoController;
require "vendor/autoload.php";
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $taskId=$_GET["id"];

    $update_done = new ToDoController;
    $update_done -> done_update("todo", $taskId);

}

?>
