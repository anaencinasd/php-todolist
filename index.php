<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de tareas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />
</head>

<body>
   
    <header>


    </header>
    <div class="max-w-sm mx-auto m-4">
        <form action="tasks.php" method="POST" class="object-position: center max-w-sm m-4">
            <label for="ToDo" class="text-gray-700">Tarea</label>
            <input type="text" id="title" name="title" placeholder="Escribe la tarea" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            <label for="ToDo" class="mt-4 text-gray-700">Descripción</label>
            <input type="text" id="description" name="description" placeholder="Escribe una breve descripción de la tarea" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            <label for="ToDo" class="mt-4 text-gray-700">¿Para cuándo es?</label>
            <input type="date" id="deadline" name="deadline" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            <input type="submit" value="Agregar tarea" class="inline-block w-full px-4 py-2 mt-4 text-white bg-indigo-500 rounded-md shadow-sm hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        </form>
    </div>
    <div class="m-4">
        <table class="min-w-full divide-y divide-gray-200 mt-4">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <a href="index.php?sort=Title"><i class="fas fa-sort-alpha-down"></i></a>
                        Título
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Descripción                        
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <a href="index.php?sort=Date"><i class="fas fa-sort"></i></a>
                        Fecha límite
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php

                use App\Controllers\ToDoController;

                require "vendor/autoload.php";

                $sort = isset($_GET['sort']) ? $_GET['sort'] : null;

                

                $taskList = new ToDoController;
                $results = $taskList->index("todo", $sort);
                foreach ($results as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["Title"] . "</td>";
                    echo "<td class='px-6 py-4 whitespace-normal'>" . $row["Description"] . "</td>";
                    echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row["Deadline"] . "</td>";
                    echo "<td class='px-6 py-4 whitespace-nowrap'>
                    <div class='flex gap-2 items-center'>
                        <a href='update-task.php?id=" . $row["id"] . "'>
                        <i class='fas fa-edit text-indigo-500 hover:text-indigo-700'></i>
                        </a>
                        <a href='delete-task.php?id=" . $row["id"] . "'>
                        <i class='fas fa-trash text-indigo-500 hover:text-indigo-700'></i>
                        </a>
                    </div>
                    </td>";

                    echo "<td>";

                    echo "<form action='done-task.php' method='POST'>";
                    if ($row["Done"]) {
                                        echo "";
                                    } else {
                                        echo "<input type='checkbox' onChange='this.form.submit()'>";
                                    }
                
                    echo "</form>";

                    
                    echo "</td>";

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

