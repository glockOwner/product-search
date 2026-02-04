Перед запуском проекта необходимо установить: 
* php8.1
* Composer
* docker

**Для развертывания проекта необходимо скачать проект в папку с названием "***product-search***" запустить bash-скрипт ```bash deploy-project.sh```**

API метод получения отфильтрованного списка продуктов доступен по пути **localhost:87/api/products**.
Тип метода - GET. Метод принимает на вход следующие query-параметры:
 - q (string | null) example: 'qwer'
 - price_from (decimal c 2-мя зн. после запятой, разделитель - точка | null) example: '38.22'
 - price_to (decimal c 2-мя зн. после запятой, разделитель - точка | null) example: '38.22'
 - category_id (integer c мин. знач. = 0 | null) example: '2'
 - in_stock (boolean (0|1) | null) example: '1'
 - rating_from (float c мин. знач. = 0 | null) example: '2.11'
 - per_page (integer c мин. знач. = 0 | null) example: '2'  **Кол-во сущностей на страницу**
 - page (integer c мин. знач. = 0 | null) example: '2'  **Номер страницы. Если указан параметр per_page!**
 - sort (string (price_asc|price_desc|rating_desc|newest) ) example: 'price_asc'  **По какому признаку сортировать**

Скрипт деплоя создаст в БД тестового пользователя admin.

  **Для отправления запроса используется аутентификация с bearer токеном. Поэтому необходимо создать токен для пользователя - админа, созданного автоматически миграцией, от лица которого будете выполнять запрос. Это делается с помощью команды ```php artisan app:create-token```**

