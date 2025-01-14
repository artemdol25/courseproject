<?php
class ShowWorkers
{
    public $db;

    // Показывает всех работников
    public function showAllWorkers()
    {
        $this->db = new DatabaseController();
        $this->db->connect();
        $result = $this->db->getAllWorkers();

        $htmlCode = '<div class="mx-10 pt-15">
                        <div class="grid gap-6 mb-8 md:grid-rows">';

        foreach ($result as $row) {
            $htmlCode .= $this->showWorker($row["name"], $row['position'], $row['id']);
        }

        $htmlCode .= ' </div> 
                    </div>';

        return $htmlCode;
    }

    // Показывает только работников без задач
    public function ShowOnlyWorkers()
    {
        $this->db = new DatabaseController();
        $this->db->connect();
        $result = $this->db->getAllWorkers();

        $htmlCode = '<div class="mx-10 pt-15">
                        <div class="grid gap-6 mb-8 md:grid-rows">';

        foreach ($result as $row) {
            $htmlCode .= $this->showOnlyWorker($row["name"], $row['position'], $row['id']);
        }

        $htmlCode .= ' </div> 
                    </div>';

        return $htmlCode;
    }

    // Отображает одного работника
    public function showOnlyWorker($name, $position, $id)
    {
        return '
            <form action="worker_tasks.php" method="GET">
                <button type="submit" name="id" id="id" value="' . $id . '" class="min-w-0 p-4 px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300">
                    <h4 class="mb-4 font-semibold">' . $name . ' (' . $position . ')</h4>
                </button>
            </form>';
    }

    // Отображает работника с его задачами
    public function showWorker($name, $position, $id)
    {
        $result = $this->db->getTasksByWorker($id);
        $htmlCode = '<div class="min-w-0 p-4 text-white bg-blue-600 rounded-lg shadow-xs">
                        <h4 class="mb-4 font-semibold">' . $name . ' (' . $position . ')</h4>';

        if (mysqli_num_rows($result) == 0) {
            $htmlCode .= '<p class="mb-4">Нет заданий</p>';
        } else {
            foreach ($result as $row) {
                $htmlCode .= $this->showTasks($row["text"], $row['deadline_date'], $row['is_completed']);
            }
        }

        $htmlCode .= $this->addTask($id);
        $htmlCode .= '</div>';

        return $htmlCode;
    }

    // Показывает список задач
    public function showTasks($text, $deadline, $is_completed)
    {
        $completed = ($is_completed == 1) ? '✔' : '❌';
        return '
            <p class="mb-4">
                ' . $text . ', Дедлайн: ' . $deadline . ', завершено: ' . $completed . '
            </p>';
    }

    // Показывает только задачи для работника
    public function showOnlyTasks($id)
    {
        $this->db = new DatabaseController();
        $this->db->connect();
        $result = $this->db->getTasksByWorker($id);

        $htmlCode = '';
        foreach ($result as $row) {
            $is_completed = $row['is_completed'];
            $completed = ($is_completed == 1) ? '✔' : '❌';
            $htmlCode .= '
                <form action="worker_tasks.php" method="get">
                    <div class="px-4 py-2 rounded-md text-sm font-medium border-0 bg-blue-500 text-white">
                        ' . $row['text'] . ', состояние - ' . $completed . '
                        <button name="done" id="done" value="' . $row['id'] . ':' . $id . '" type="submit" class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-green-500 hover:bg-green-600 active:bg-green-700 focus:ring-green-300">
                            Выполнил ✔
                        </button>
                    </div>
                </form>';
        }

        return $htmlCode;
    }

    // Форма добавления задания
    public function addTask($id)
    {
        return '
            <p class="mb-4">
                <form name="form" action="admin_page.php" method="GET">
                    <p><b>Задание: </b><br>
                        <input type="textarea" class="text-black" id="task" name="task" size="50">
                    </p>
                    <p><b>Дедлайн: </b><br>
                        <input type="date" class="text-black" name="deadline">
                    </p>
                    <p><b>ID: </b><br>
                        <input type="text" class="text-black" id="id" name="id" size="1" value="' . $id . '">
                    </p>
                    <button class="mt-4 px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-green-500 hover:bg-green-600 active:bg-green-700 focus:ring-green-300" type="submit">Добавить</button>
                </form>
            </p>
            <form name="form" action="admin_page.php" method="GET">
                <button class="mt-4 px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-red-500 hover:bg-red-600 active:bg-red-700 focus:ring-red-300" type="submit" name="hire" value="' . $id . '">Уволить сотрудника</button>
            </form>';
    }
}