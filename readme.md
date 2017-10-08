Дипломная работа по курсу PHP/SQL: back-end разработка и базы данных
«Типовой web-сервис вопросов и ответов «Сервис F.A.Q.»
=====================
###### выполнила: студент Степчева Зоя Валерьевна 

### ***Ссылки***
 * [Рабочий вариант]( http://stzv78.ru/)
 * [Описание системы]( https://docs.google.com/document/d/1QOjNfG8jihqoGCqJuJQ1-ltka-AgcRYpf_htl1Y71s8/edit)

### Установка
1. Установить менеджер зависимостей composer на виртуальном хостинге.
2. Скачать проект с GitHub и распаковать (. git clone https://github.com/stzv78/laravel-faq.git)
3. Перейти в папку проекта и выполнить команду composer install.
4. Скопировать информацию файла  .env.example  в  .env:
  (cp .env.example .env)
5. Установить ключ в файл среды: php artisan key:generate 
6. Создать базу данных на удаленном хостинге и указать настройки в .env  
DB_DATABASE – имя базы данных, 
DB_USERNAME – пользователь, 
DB_PASSWORD – пароль.
7. Восстановить дамп из файла laravel-faq.sql.
8. Выполнить симлинк на папку проекта – public:
$ ln -s  /path/to/site/public  /path/to/site/public_html

Доступ к панели администратора проекта: 
логин – admin@gmail.com, пароль – admin.
