<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('login.css') }}">
</head>
<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <form action="{{ url('/admin/login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Логин:</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Войти</button>
        </form>
    </div>

    <!-- Подключение JavaScript-файла -->
    <script src="{{ asset('login.js') }}"></script>
</body>
</html>
