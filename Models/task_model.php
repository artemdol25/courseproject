<?php

class TaskModel
{
    public string $text;
    public string $deadLineDate;
    public int $ownerOfTask;
    public bool $isCompleted;

    /**
     * Устанавливает данные для задачи.
     *
     * @param string $text - Описание задачи
     * @param string $deadLineDate - Дата дедлайна
     * @param int $ownerOfTask - ID владельца задачи
     * @param bool $isCompleted - Статус выполнения задачи (true/false)
     */
    public function setData(string $text, string $deadLineDate, int $ownerOfTask, bool $isCompleted): void
    {
        $this->text = $text;
        $this->deadLineDate = $deadLineDate;
        $this->ownerOfTask = $ownerOfTask;
        $this->isCompleted = $isCompleted;
    }
}