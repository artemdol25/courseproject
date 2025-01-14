<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Задания сотрудника</title>
    <meta name="description" content="Страница с заданиями для конкретного сотрудника">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="ml-10 mt-8 inline-flex flex-col space-y-2.5 items-center justify-center">
        <p class="text-4xl text-center">Задания сотрудника</p>

        <button class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300" type="button" onclick="window.location.href='all_workers.php'">Назад</button>

        <form action="worker_tasks.php" method="get">
            <?php
            require_once(__DIR__ . "/../Controller/worker_controller.php");

            $workerController = new WorkerController();
            $workerData = $workerController->displayTasks();

            // Вывод имени работника и его задач
            echo "<p class='text-xl text-center mt-4'>Сотрудник: " . $workerData['workerName'] . "</p>";
            echo $workerData['tasks']; // Вывод списка задач
            ?>
        </form>
    </div>
</body>
</html>