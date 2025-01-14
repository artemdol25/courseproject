<?php

class WorkerModel
{
    public int $id;
    public string $name;
    public string $position;
    public string $password;
    public string $email;

    /**
     * Устанавливает данные для работника.
     *
     * @param int $id - ID работника
     * @param string $name - Имя работника
     * @param string $position - Должность работника
     * @param string $password - Пароль работника
     * @param string $email - Электронная почта работника
     */
    public function setData(int $id, string $name, string $position, string $password, string $email) {
        $this->id = $id;
        $this->name = $name;
        $this->position = $position;
        $this->password = $password;
        $this->email = $email;        
    }
}