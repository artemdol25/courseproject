<?php

class LoginModel
{
    public string $email;
    public string $password;

    /**
     * Устанавливает данные для email и пароля.
     *
     * @param string $email - Адрес электронной почты
     * @param string $password - Пароль
     */
    public function setData(string $email, string $password): void
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Возвращает строковое представление объекта LoginModel.
     *
     * @return string - Сложенная строка из пароля и email
     */
    public function __toString(): string
    {
        return $this->password . $this->email;
    }
}