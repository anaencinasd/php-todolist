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
            <input type="submit" value="Agregar tarea">
        </form>
    </div>
    <div>
        <h2>Lista de tareas pendientes:</h2>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Fecha límite</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php

                use App\Controllers\ToDoController;

                require "vendor/autoload.php";

                $taskList = new ToDoController;
                $results = $taskList->index("todo");
                foreach ($results as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["Title"] . "</td>";
                    echo "<td>" . $row["Description"] . "</td>";
                    echo "<td>" . $row["Deadline"] . "</td>";
                    echo "<td><a href='update-task.php?id=" . $row["id"] . "'><button>EDITAR TAREA</button><a/></td>";
                    echo "<td><a><button>BORRAR TAREA</button><a/></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    </div>
    <footer>
    </footer>
</body>

</html>