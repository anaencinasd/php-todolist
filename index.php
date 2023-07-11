

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <div>
        <form action="tasks.php" method="POST">
            <label for="ToDo">Introduce una tarea</label>
            <input type="text" id="title" name="title" required>
            <label for="ToDo">Introduce una descripción</label>
            <input type="text" id="description" name="description" required>
            <label for="ToDo">¿Para cuándo es?</label>
            <input type="date" id="deadline" name="deadline">
            <input type="submit" value ="Agregar tarea">
        </form>
    </div>
    <div>
        <h2>Lista de tareas pendientes:</h2>
    <?php
        use App\Controllers\ToDocontroller;
        require "vendor/autoload.php"; 
        $taskList = new ToDoController;
        $taskList ->index("todo");
        foreach($taskList as $row){
            echo $row["Title"];
        }
        ?> 
    </div>
    <footer>
    </footer>
</body>
</html>  



