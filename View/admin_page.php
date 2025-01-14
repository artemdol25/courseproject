<?php
session_start();
include(__DIR__ . "/../Controller/admin_controller.php");

$adminController = new AdminController();
$adminController->connectDatabase();

// Выход из системы
if (isset($_GET["exit"])) {
    $adminController->logout();
}

// Добавление нового работника
$adminController->addWorker();

// Увольнение сотрудника
$adminController->hireWorker();

// Добавление задачи
$adminController->addTask();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Панель администратора</title>
    <meta name="description" content="Административная панель">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<?php
// Проверка на авторизацию
if (isset($_SESSION['isLoginIn']) && $_SESSION['isLoginIn'] == true && $_SESSION['isAdmin'] == true) {
    $adminController->renderAdminPanel(); // Рендер панели администратора
} else {
    // Обработка формы входа
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($adminController->checkLogin() == false) {
            echo '<p class="text-4xl text-center mt-5">Неправильный пароль</p>';
        }
    }
    $adminController->renderLoginForm(); // Рендер формы входа
}
?>
</body>
</html>