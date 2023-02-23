# Тестовое задание
## Инструкция по развёртыванию приложения

1. Делаем клонирование из репозитория
```sh
git clone https://github.com/jekanito/test_task_onlytraffics
```

2. Устанавлием все пакеты и зависимости из файла composer.json
```sh
composer install
```

3. Копируем .env.example
```sh
cp .env.example .env
```

4. Заполняем данные в файле .env из телеграмма для в будущем создания админа юзера
```sh
LOGIN_TELEGRAM_ADMIN=
NAME_TELEGRAM_ADMIN=
ID_TELEGRAM_ADMIN=
```

5. Создаём канал и узнаём ID канала и заплолнем в файле .eve такое поле
```sh
CHANNEL_ADMIN_ID=
```

6. Создаём бота, узнаём нужные данные для бота, после для бота прикрепляем в инстаграме домен для даного бота, также после этих операции приглашаем бота в только что созданный канал, и данные для бота заполнем файл .env
```sh
BOT_ADMIN_ID=
BOT_ADMIN_NAME=
```

7. Заходим на сайт амазона, и заходим на страницу https://s3.console.aws.amazon.com/s3/buckets и создаём bucket, после создания заполнем поля в .env и заменяем FILESYSTEM_DISK на s3
```sh
AWS_DEFAULT_REGION=
AWS_BUCKET=
```

8. После заходим на https://AWS_DEFAULT_REGION.console.aws.amazon.com/iamv2/home?region=AWS_DEFAULT_REGION#/users создаем user, чтобы мы могли загружать файлы на амазон сервер и заполняем в .env такие поля
```sh
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
```

9. После всез вышеуказанных операции прописываем в фале .env настройки подключение к БД и выполняем следующую комманду
```sh
php artisan migrate
```

10. Добавляем данные в БД для заполнение данных такой коммандой
```sh
php artisan db:seed
```
