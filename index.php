<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Добро пожаловать!</title>
    <meta name="description" content="Web-cервис управления персоналом">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="mt-8 inline-flex flex-col space-y-6 items-center justify-start px-10 md:px-32">
        <p class="text-4xl font-semibold text-center text-gray-800">Добро пожаловать на Web-сервис управления персоналом!</p>
        <svg width="500" height="500" class="mb-6">
            <image xlink:href="tasks-list-svgrepo-com.svg" width="500" height="500">
        </svg>
        <p class="text-3xl font-semibold text-center text-gray-700">Что вы хотите сделать?</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6 w-full max-w-lg">
            <button class="px-6 py-3 rounded-md text-lg font-medium border-0 focus:outline-none focus:ring transition text-white bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300" type="button" onclick="window.location.href='View/admin_page.php'">
                Вход для администратора
            </button>
            <button class="px-6 py-3 rounded-md text-lg font-medium border-0 focus:outline-none focus:ring transition text-white bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300" type="button" onclick="window.location.href='View/all_workers.php'">
                Посмотреть задания сотрудников
            </button>
            <button class="px-6 py-3 rounded-md text-lg font-medium border-0 focus:outline-none focus:ring transition text-white bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300" type="button" onclick="window.location.href='View/register_admin.php'">
                Регистрация администратора
            </button>
        </div>
        <p class="text-center text-gray-500 text-xs">
            &copy;2024 Долгополов Артём. Все права сохранены.
        </p>
    </div>
</body>
</html>