<div class="grid grid-cols-3 gap-3 place-items-start">
    <!-- Кнопка на главную -->
    <form action="/">
        <button class="mb-8 ml-10 px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300" 
                type="submit" onclick="window.location.href=''">
            На главную
        </button>
    </form>

    <!-- Кнопка "Посмотреть задачи сотрудника" -->
    <form action="/View/all_workers.php">
        <button class="mb-8 ml-10 px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300" 
                type="submit">
            Посмотреть задачи сотрудника
        </button>
    </form>

    <!-- Кнопка "Выйти" -->
    <form action="/View/admin_page.php?exit=true" method="GET">
        <button class="mb-8 ml-10 px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300" 
                type="submit" id="exit" name="exit" value="Выйти">
            Выйти
        </button>
    </form>
</div>