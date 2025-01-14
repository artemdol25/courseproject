<?php
include(__DIR__ . "/database_controller.php");
include(__DIR__ . "/../View/admin_widgets/show_workers_view.php");
include(__DIR__ . "/../View/admin_widgets/add_worker.php");

class AdminController 
{
    private $db;
    private $showWorkers;
    private $addWorker;

    public function __construct() 
    {
        $this->db = new DatabaseController();
        $this->showWorkers = new ShowWorkers();
        $this->addWorker = new AddWorker();
    }

    // Метод для соединения с базой данных
    public function connectDatabase() 
    {
        $this->db->connect();
    }

    // Метод для обработки выхода
    public function logout() 
    {
        session_destroy();
        $_SESSION['isLoginIn'] = false;
        $_SESSION['isAdmin'] = false;
    }

    // Метод для добавления работника
    public function addWorker() 
    {
        if (isset($_POST["newWorker"]) && $_SESSION['addedWorker'] != $_POST['name']) {
            $wm = new WorkerModel();
            $wm->SetData(0, $_POST['name'], $_POST['position'], '1234', $_POST['email']);
            $this->db->addWorker($wm);
            echo "<script> location.href='/View/workek_was_added.php'; </script>";
        }
    }

    // Метод для обработки увольнения сотрудника
    public function hireWorker() 
    {
        if (isset($_GET["hire"])) {
            $this->db->hireWorker($_GET["hire"]);
            echo "<script> location.href='/View/workek_was_hired.php'; </script>";
        }
    }

    // Метод для добавления задачи
    public function addTask() 
    {
        if (isset($_GET["task"])) {
            $tm = new TaskModel();
            $tm->SetData($_GET['task'], $_GET['deadline'], $_GET['id'], 0);
            $this->db->AddTask($tm);
        }
    }

    // Метод для проверки авторизации
    public function checkLogin() 
    {
        if (isset($_POST["password"]) || isset($_POST["email"])) {
            $admin = new LoginModel();
            $admin->SetData($_POST["email"], $_POST["password"]);
            $canLogin = $this->db->checkPassword($admin);

            if ($canLogin == 1) {
                $_SESSION['isLoginIn'] = false;
                return false; // Неправильный пароль
            } else {
                // Проверка роли (Admin)
                $role = $this->db->getRoleByEmail($admin->email);
                if ($role == 'Admin') {
                    $_SESSION['isAdmin'] = true;
                    $_SESSION['isLoginIn'] = true;
                    $_SESSION['addedWorker'] = "none";
                    header('Location: /View/admin_page.php');
                    return true;
                } else {
                    $_SESSION['isAdmin'] = false;
                    $_SESSION['isLoginIn'] = false;
                    return false;
                }
            }
        }
        return false;
    }

    // Метод для отображения всех работников
    public function displayWorkers() 
    {
        echo $this->showWorkers->showAllWorkers();
    }

    // Метод для отображения формы добавления работника
    public function displayAddWorkerForm() 
    {
        $this->addWorker->render();
    }

    // Метод для отображения панели администратора
    public function renderAdminPanel() 
    {
        echo '<p class="text-4xl text-center mt-8 mb-8">Панель администратора</p>';
        echo '<p class="text-3xl text-center mt-8 mb-8"> Все пользователи </p>';
        echo file_get_contents("admin_widgets/buttons_widget.php");
        $this->displayAddWorkerForm();
        $this->displayWorkers();
    }

    // Метод для отображения формы входа
    public function renderLoginForm() 
    {
        echo file_get_contents("admin_widgets/admin_login_form_view.php");
    }
}
?>