# Star Wars

**Star Wars** - это проект о всех персонажах из фильма **"Звёздные войны"**.
Основная его суть - показать информацию о всех персонажах (рост, вес, цвет волос, год рождения, пол и т.д) в виде таблицы. Можно создать, отредактировать и удалить персонажа, а также прикрепить к нему картинки.

### Как работает проект?
Работает наш проект очень просто, он берет данные с [swapi](https://swapi.dev/ "swapi") в формате JSON, которые в будущем можно изменять.

### Условия к проекту
1. Используйте PHP **7**
2. Используйте Laravel **8**
3. Комментируйте участки кода.
4. Форматируйте код.
5. Правильно называйте переменные, константы, функции, классы.

### Инструменты для запуска проекта
Для того, чтобы запустить проект, вам понадобиться:
1.  Текстовый редактор ([Notepad++](https://notepad-plus-plus.org/ "Notepad++"), [Brackets](http://brackets.io/ "Brackets"), [Sublime Text](https://www.sublimetext.com/ "Sublime Text"), [Atom](https://atom.io/ "Atom"), [VS Code](https://code.visualstudio.com/ "VS Code"), [PhpStorm](https://www.jetbrains.com/ru-ru/phpstorm/ "PhpStorm"))
2.  Браузер ([Microsoft Edge](https://www.microsoft.com/uk-ua/edge "Microsoft Edge"), [Mozilla Firefox](https://www.mozilla.org/uk/firefox/new/ "Mozilla Firefox"), [Google Chrome](https://www.google.com/intl/uk_ua/chrome/ "Google Chrome"), [Opera](https://www.opera.com/ru "Opera"))
3.  [Open Server](https://ospanel.io/ "Open Server")

### Как запустить проект?
Для того, чтобы запустить проект, вам нужно:
1. Скачать проект.
2. Распаковать архив.
3. Открыть папку starwars.local
4. Из файла .env.example сделать файл .env
5. Открыть phpMyAdmin (он встроенный в Open Server) , создать базу данных database.
6. В папке starwars.local/storage/app/public создать папку images.
7. Переместить папку starwars.local в папку domains.
8. Открыть настройки Open Server, выбрать опцию "Домены" , создать новый домен.
9. Открыть консоль Open Server, написать команды:

-- для перехода в папку starwars.local
`cd domains/starwars.local`

-- для composer
`composer install`

-- для key
`php artisan key:generate`

-- для миграций
`php artisan migrate`

-- для storage
`php artisan storage:link`

-- для сидеров
`php artisan db:seed`

10. Запустить Open Server.
11. Открыть браузер, перейти по адресу: [http://starwars.local/public/people](# "http://starwars.local/public/people")
