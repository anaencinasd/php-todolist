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
    <nav class="relative flex w-full flex-wrap items-center justify-between bg-[#FBFBFB] py-2 text-neutral-500 shadow-lg hover:text-neutral-700 focus:text-neutral-700 dark:bg-neutral-600 lg:py-4">
      <div class="flex w-full items-center justify-between px-3">
        <div class="flex items-center">
          <a class="mx-2 my-1 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 lg:mb-0 lg:mt-0" href="#">
            <i class="fas fa-clipboard-list text-indigo-500 hover:text-indigo-700 m-4"></i>
          </a>
          <div class="relative ml-2">
            <button class="flex items-center px-6 pb-2 pt-2.5 text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 dark:text-neutral-200 dark:hover:text-neutral-400 lg:px-2" 
            type="button" id="dropdownMenuButton2" 
            aria-expanded="false" 
            onclick="toggleDropdownMenu()">
              Filtrar tareas
              <span class="ml-2 w-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
              </span>
            </button>
            <ul id="dropdownMenu" class="absolute z-[1000] left-0 mt-2 w-48 py-2 bg-white rounded-lg shadow-lg dark:bg-neutral-700 hidden" 
            aria-labelledby="dropdownMenuButton2">
              <li>
                <a class="block px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline dark:text-neutral-200 dark:hover:bg-neutral-600" 
                href="index.php?sort=pending" data-filter="pending">Mostrar tareas pendientes</a>
              </li>
              <li>
                <a class="block px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline dark:text-neutral-200 dark:hover:bg-neutral-600" href="index.php?sort=complete" data-filter="completed">Mostrar tareas completadas</a>
              </li>
              <li>
                <a class="block px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline dark:text-neutral-200 dark:hover:bg-neutral-600" href="index.php?sort=next" data-sort="deadline">Mostrar tareas más próximas</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="relative">
          <a href="index.php?sort=AllTasks" id="showAllTasksButton"><button>Ver todas las tareas</button></a>
        </div>
        <div class="relative">
          <input type="search" class="block w-full px-4 py-2 pl-10 pr-3 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Buscar tarea" />
          <div class="absolute top-0 left-0 mt-3 ml-3 text-gray-600">
            <i class="fas fa-search"></i>
          </div>
          
        </div>
        
        <div class="relative">
        <a href="login.php">
          <button class="inline-block px-4 py-2 text-indigo-500 bg-white border border-indigo-500 rounded-full shadow-sm hover:bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-500">Login</button>
        </a>
        <a href="signin.php">
          <button class="inline-block ml-4 px-4 py-2 text-white bg-indigo-500 border border-indigo-500 rounded-full shadow-sm hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Registrarse</button>
        </a>
      </div>
      </div>
    </nav>
  </header>

  <main>
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
            echo "<tr";
            if ($row["Done"]) {
              echo " class='line-through text-gray-500 bg-indigo-50'";
            }
            echo ">";
            echo "<td class='px-6 py-4 whitespace-normal'>" . $row["Title"] . "</td>";
            echo "<td class='px-6 py-4 whitespace-normal'>" . $row["Description"] . "</td>";
            echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row["Deadline"] . "</td>";
            echo "<td class='px-6 py-4 whitespace-nowrap'>
                    <div class='flex gap-2 items-center'>
                        <a href='update-task.php?id=" . $row["id"] . "'>
                        <i class='fas fa-edit text-indigo-500 hover:text-indigo-700'></i>
                        </a>
                        <a href='delete-task.php?id=" . $row["id"] . "'>
                        <i class='fas fa-trash text-indigo-500 hover:text-indigo-700 m-4'></i>
                        </a>
                    </div>
                    </td>";

            echo "<td>";

            echo "<form action='done-task.php' method='POST'>";
            if ($row["Done"]) {
              echo "<input type='checkbox' checked disabled '>";
              echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
              echo "<button type='submit' name ='undo'><i class='fas fa-lock text-indigo-500 hover:text-indigo-700 m-4'></i></button>";
            } else {
              echo "<input type='checkbox' name='id' value='" . $row["id"] . "'onChange='this.form.submit()'>";
            }

            echo "</form>";


            echo "</td>";

            echo "</tr>";
          }
          ?>
        </tbody>
      </table>

    </div>
  </main>

  <script src="index.js"></script>
</body>

</html>