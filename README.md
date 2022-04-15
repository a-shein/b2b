### Файлы к заданиям:

* ```задание 1```: 
  b2b/task1/console.sql, 
  b2b/src/database/migrations/2022_04_12_103325_test1_tables.php

  
* ```задание 2```:
  b2b/src/app/Console/Commands/Task2.php
  
  
* ```задание 3```: 
  b2b/src/app/Models/Customer.php,
  b2b/src/app/Models/Topic.php,
  b2b/src/app/Services/CustomerService.php,
  b2b/src/app/Services/TopicService.php,
  b2b/src/app/Http/Controllers/CustomerController.php,
  b2b/src/app/Http/Controllers/TopicController.php,
  b2b/src/database/migrations/2022_04_13_114305_create_customers_table.php,
  b2b/src/database/migrations/2022_04_13_121126_create_topics_table.php
  

* ```задание 4```:
  b2b/task4/task4.php


* ```ответы вопросы```: b2b/questions/questions.txt

### УСТАНОВКА

### Последовательно запустить команды в директории b2b/src

* ```make compose-build``` сборка приложения
* ```make compose-up``` запускаем приложение
* ```make init``` устанавливаем зависимости и копируем .env.example в .env.
* ```make migrate``` миграции и заполнение базы тестовыми данными

### для подключения к базе:
* host = localhost
* port = 3306
* user = root
* password = password
* database = laravel

* если возникнет ошибка драйвера при подключении, то выбрать Enable TLSv1.1 и нажать test Connection