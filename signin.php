<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />
</head>
<body class="bg-gray-100">
    <div class="flex justify-center items-center h-screen">
        <main>
            <div class="max-w-sm mx-auto bg-white rounded-md shadow-md p-6">
                <form action="addUser.php" method="POST">
                    <label for="username" class="block mb-2 text-gray-700">Nombre de usuario</label>
                    <input type="text" id="username" name="username" placeholder="Escoge un nombre de usuario" class="w-full px-4 py-2 mb-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>

                    <label for="password" class="block mb-2 text-gray-700">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Asígnale una contraseña" class="w-full px-4 py-2 mb-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>

                    <label for="name" class="block mb-2 text-gray-700">Nombre</label>
                    <input type="text" id="name" name="name" placeholder="Introduce tu nombre completo" class="w-full px-4 py-2 mb-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>

                    <label for="email" class="block mb-2 text-gray-700">Email</label>
                    <input type="email" id="email" name="email" placeholder="Introduce tu email" class="w-full px-4 py-2 mb-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>

                    <input type="submit" value="Darme de alta" class="inline-block w-full px-4 py-2 mt-4 text-white bg-indigo-500 rounded-md shadow-sm hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                </form>
            </div>
        </main>
    </div>
</body>
</html>
