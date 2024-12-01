<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard.css') }}">
</head>
<body>
    <h1>Добро пожаловать в панель администратора!</h1>
    <a href="{{ url('/admin/logout') }}">Выйти</a>

    <h2 class="mt-5">Записи</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><a href="#" id="sort-name">Имя пользователя</a></th>
                <th><a href="#" id="sort-email">Электронная почта</a></th>
                <th><a href="#" id="sort-date">Дата добавления</a></th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody id="guestbook-entries">
        </tbody>
    </table>
    <div id="pagination" class="mt-3"></div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('dashboard.js') }}"></script> 
</body>
</html>
