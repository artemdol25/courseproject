<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Все сотрудники</title>
    <meta name="description" content="Список всех сотрудников">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="mt-8 mb-10 ml-10 inline-flex flex-col space-y-2.5 items-center justify-center">
        <p class="text-4xl text-center">Все сотрудники</p>
        <button class="mb-10 px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300"
            type="submit" onclick="window.location.href='/'">На главную</button>
        <button class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300"
            type="button" onclick="window.location.href='admin_page.php'">Панель администратора</button>
    </div>
    <?php
    include(__DIR__ . "/../Controller/database_controller.php");
    include(__DIR__ . "/../View/admin_widgets/show_workers_view.php");

    // Инициализация объекта ShowWorkers и вывод данных о сотрудниках
    $sw = new ShowWorkers();
    echo $sw->ShowOnlyWorkers();
    ?>
</body>
</html>