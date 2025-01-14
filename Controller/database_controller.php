<?php
include(__DIR__ . "/../Models/task_model.php");
include(__DIR__ . "/../Models/worker_model.php");
include(__DIR__ . "/../Models/login_model.php");

class DatabaseController
{
    private $mysqli;

    // Константы для подключения к базе данных
    const DB_HOST = "localhost";
    const DB_USER = "user";
    const DB_PASSWORD = "password";
    const DB_NAME = "appDB";

    // Метод для подключения к базе данных
    public function connect()
    {
        $this->mysqli = new mysqli(self::DB_HOST, self::DB_USER, self::DB_PASSWORD, self::DB_NAME);
        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    // Получить всех работников
    public function getAllWorkers()
    {
        $query = "SELECT * FROM Workers";
        return $this->mysqli->query($query);
    }

    // Уволить работника
    public function hireWorker($id)
    {
        $sql = "DELETE FROM tasks WHERE owner_of_task = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        $query = "DELETE FROM Workers WHERE id = ?";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    // Получить имя работника по ID
    public function getName($id)
    {
        $query = "SELECT name FROM Workers WHERE id = ?";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $name = '';
        
        if ($row = $result->fetch_assoc()) {
            $name = $row['name'];
        }

        $stmt->close();
        return $name;
    }

    // Добавить работника
    public function addWorker(WorkerModel $workerModel)
    {
        $query = "INSERT INTO Workers (name, position, password, email) 
                  VALUES (?, ?, ?, ?)";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("ssss", $workerModel->name, $workerModel->position, $workerModel->password, $workerModel->email);
        $stmt->execute();
        $stmt->close();
    }

    // Проверка пароля работника
    public function checkPassword(LoginModel $loginModel)
    {
        $query = "SELECT id FROM Workers WHERE email = ? AND password = ?";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("ss", $loginModel->email, $loginModel->password);
        $stmt->execute();
        $result = $stmt->get_result();

        $isValid = mysqli_num_rows($result) > 0;
        $stmt->close();
        
        return !$isValid;
    }

    // Поиск роли пользователя по его email
    public function getRoleByEmail($email) {
        $sql = "SELECT position FROM workers WHERE email = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $role = null;
        $stmt->bind_result($role);
        $stmt->fetch();
        return $role ? $role : null;
    }

    // Добавить задание
    public function addTask(TaskModel $taskModel)
    {
        $query = "INSERT INTO Tasks (text, deadline_date, owner_of_task, is_completed) 
                  VALUES (?, ?, ?, ?)";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("ssii", $taskModel->text, $taskModel->deadLineDate, $taskModel->ownerOfTask, $taskModel->isCompleted);
        $stmt->execute();
        $stmt->close();
    }

    // Получить задания по ID работника
    public function getTasksByWorker($id)
    {
        $query = "SELECT * FROM Tasks WHERE owner_of_task = ?";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Пометить задание как выполненное
    public function doneTask($id)
    {
        $query = "UPDATE Tasks SET is_completed = 1 WHERE id = ?";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}