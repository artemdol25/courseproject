<?php

class AddWorker
{
    /**
     * Генерирует HTML форму для добавления нового сотрудника.
     *
     * @return void
     */
    public function render(): void
    {
        $htmlCode = '
        <div class="mx-10 pt-15">
            <div class="grid gap-6 mb-8 md:grid-rows">
                <div class="min-w-0 p-4 text-white bg-green-600 rounded-lg shadow-xs">
                    <h4 class="mb-4 font-semibold">
                        Новый сотрудник?
                    </h4>
                    <form action="admin_page.php" method="POST">
                        <p>Имя:</p>
                        <input type="text" class="text-black" name="name" id="name" size="40">
                        
                        <p>Почта:</p>
                        <input type="text" class="text-black" name="email" id="email" size="40">
                        
                        <p>Должность:</p>
                        <select class="text-black" name="position">
                            <option class="text-black" value="Worker">Worker</option>
                            <option class="text-black" value="Manager">Manager</option>
                            <option class="text-black" value="Admin">Admin</option>
                        </select>
                        
                        <br>
                        <button class="bt-4 px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300"
                            type="submit" id="newWorker" name="newWorker" value="newWorker">
                            Добавить
                        </button>
                    </form>
                </div>
            </div>
        </div>';

        echo $htmlCode;
    }
}