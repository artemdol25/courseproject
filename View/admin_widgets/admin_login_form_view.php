<div class="mt-16 flex items-center justify-center">
    <div class="w-full max-w-md">
        <!-- Форма для входа -->
        <form class="bg-white shadow-lg rounded px-12 pt-6 pb-8 mb-4" action="admin_page.php" method="POST">
            
            <div class="text-gray-800 text-2xl flex justify-center border-b-2 py-2 mb-4">
                Войти через администратора
            </div>
            
            <!-- Поле для ввода почты -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-normal mb-2" for="username">
                    Почта
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                       name="email" v-model="form.email" type="email" required autofocus placeholder="Email" />
            </div>

            <!-- Поле для ввода пароля -->
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-normal mb-2" for="password">
                    Пароль
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" 
                       v-model="form.password" type="password" placeholder="Password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Кнопка отправки и ссылка на восстановление пароля -->
            <div class="flex items-center justify-between">
                <button class="px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700" type="submit">
                    Войти
                </button>
                <a class="inline-block align-baseline font-normal text-sm text-blue-500 hover:text-blue-800" href="#">
                    Забыли пароль? Не забывайте
                </a>
            </div>
        </form>

        <!-- Кнопка на главную -->
        <form action="/">
            <button class="mb-8 ml-10 px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300" 
                type="submit" onclick="window.location.href=''">
                На главную
            </button>
        </form>
        
        <!-- Авторские права -->
        <p class="text-center text-gray-500 text-xs">
            &copy;2024 Долгополов Артём. Все права сохранены.
        </p>
    </div>
</div>