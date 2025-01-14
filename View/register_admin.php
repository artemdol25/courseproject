<?php
session_start();
require_once(__DIR__ . "/../Controller/database_controller.php");
require_once(__DIR__ . "/../Models/worker_model.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $position = 'Admin';
    $email = $_POST['email'];
    $password = $_POST['password'];

    $workerModel = new WorkerModel();
    $workerModel->setData(0, $name, $position, $password, $email);
    $workerModel->password = $password;

    $db = new DatabaseController();
    $db->connect();
    $db->addWorker($workerModel);

    header("Location: admin_page.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Регистрация администратора</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="mt-16 flex items-center justify-center">
        <div class="w-full max-w-md">
            <!-- Форма регистрации администратора -->
            <form class="bg-white shadow-lg rounded px-12 pt-6 pb-8 mb-4" action="register_admin.php" method="POST">
                
                <div class="text-gray-800 text-2xl flex justify-center border-b-2 py-2 mb-4">
                    Регистрация администратора
                </div>

                <!-- Поле для ввода имени -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-normal mb-2" for="name">
                        Имя
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="name" id="name" type="text" required placeholder="Имя" />
                </div>

                <!-- Поле для ввода email -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-normal mb-2" for="email">
                        Почта
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="email" id="email" type="email" required placeholder="Email" />
                </div>

                <!-- Поле для ввода пароля -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-normal mb-2" for="password">
                        Пароль
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        name="password" id="password" type="password" required placeholder="Пароль" />
                </div>

                <!-- Кнопка отправки -->
                <div class="flex items-center justify-between">
                    <button class="px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700" type="submit">
                        Зарегистрировать
                    </button>
                </div>
            </form>

            <!-- Кнопка на главную -->
            <form action="/">
                <button class="mb-8 ml-10 px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300"
                    type="submit">
                    На главную
                </button>
            </form>
            
            <!-- Авторские права -->
            <p class="text-center text-gray-500 text-xs">
                &copy;2024 Долгополов Артём. Все права сохранены.
            </p>
        </div>
    </div>
</body>
</html>