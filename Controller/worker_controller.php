<?php
include(__DIR__ . "/../Controller/database_controller.php");
include(__DIR__ . "/../View/admin_widgets/show_workers_view.php");

class WorkerController 
{
    private $db;
    private $showWorkers;

    public function __construct() 
    {
        // Подключение к базе данных
        $this->db = new DatabaseController();
        $this->showWorkers = new ShowWorkers();
        $this->db->connect();
    }

    // Метод для получения задач работника
    public function getWorkerTasks($workerId) 
    {
        $workerName = $this->db->getName($workerId);
        $tasks = $this->showWorkers->showOnlyTasks($workerId);
        return ['workerName' => $workerName, 'tasks' => $tasks];
    }

    // Метод для отметки задания как выполненного
    public function markTaskAsDone($taskId) 
    {
        $this->db->doneTask($taskId);
    }

    // Обработка параметра "done" из запроса
    public function handleDoneTaskRequest($doneParam) 
    {
        list($taskId, $workerId) = explode(':', $doneParam);
        $this->markTaskAsDone($taskId);
        return $this->getWorkerTasks($workerId);
    }

    // Основной метод для отображения задач
    public function displayTasks() 
    {
        // Есть ли параметр "done" в запросе
        if (isset($_GET["done"])) {
            return $this->handleDoneTaskRequest($_GET["done"]);
        } else {
            // Если "done" нет, то просто вывод задач для работника
            $workerId = $_GET['id'];
            return $this->getWorkerTasks($workerId);
        }
    }
}
?>