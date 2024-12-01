# Установка и запуск веб-приложения

## Шаги для запуска

1. Скачайте все файлы.
2. В этой же директории выполните:
   - `docker compose --file .\docker-compose-test.yml up --build --watch`
   - `docker exec -it test-app bash`
   - `php artisan migrate`
   - `php artisan db:seed --class=AdminSeeder`

Перейдите по пути /api/form_guestbook - добавление записи
    примечание: капча отображается, но не работает
Перейдите по пути /admin/login - вход в админскую панель
    логин: admin
    пароль: 123

