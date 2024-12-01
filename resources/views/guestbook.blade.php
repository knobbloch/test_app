<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гостевая книга</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('guestbook.css') }}" rel="stylesheet"> 
</head>
<body>
    <div class="container">
        <h1 class="text-center">Гостевая книга</h1>
        <form id="guestbook-form">
            <div class="form-group">
                <label for="user_name">Имя пользователя</label>
                <input type="text" class="form-control" id="user_name" name="user_name" required>
            </div>
            <div class="form-group">
                <label for="email">Электронная почта</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="text">Сообщение</label>
                <textarea class="form-control" id="text" name="text" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="captcha">Капча</label>
                <div><img src="{{ captcha_src() }}" alt="captcha"></div>
                <input type="text" class="form-control" id="captcha" name="captcha" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Отправить</button>
        </form>
        <div id="response" class="mt-3"></div>

        <h2 class="mt-5">Записи</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><a href="#" id="sort-name">Имя пользователя</a></th>
                    <th><a href="#" id="sort-email">Электронная почта</a></th>
                    <th><a href="#" id="sort-date">Дата добавления</a></th>
                </tr>
            </thead>
            <tbody id="guestbook-entries">
            </tbody>
        </table>
        <div id="pagination" class="mt-3"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('guestbook.js') }}"></script> 
</body>
</html>
