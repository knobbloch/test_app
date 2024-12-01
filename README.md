# Установка и запуск веб-приложения

## Шаги для запуска

1. Скачайте все файлы.
2. В этой же директории выполните:
   - `docker compose --file .\docker-compose-test.yml up --build --watch`
   - `docker exec -it test-app bash`
   - `php artisan migrate`
   - `php artisan db:seed --class=AdminSeeder`

## Доступ к приложению

- Перейдите по пути `/api/form_guestbook` для добавления записи.
  - **Примечание:** Капча отображается, но не работает.
  
- Перейдите по пути `/admin/login` для входа в админскую панель.
  - **Логин:** admin
  - **Пароль:** 123
