# Downloader Application

Url downloader. Accept tasks for download resources by url.
Accept tasks via Rest, Web and Console.
Test project. Build with Laravel 5.7, Mysql.
Tested on Mac OS High Sierra.

Here is [Specification](docs/specification.md)

## Install from archive

1 . Unzip archive

```
unzip downloader_app.zip
```

2 . Create database

```
CREATE DATABASE downloader_app CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE DATABASE downloader_app_testing CHARACTER SET utf8 COLLATE utf8_general_ci;
```

3 . Configure db connection - edit ```.env``` file

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=downloader_app
DB_USERNAME=root
DB_PASSWORD=password
```

4 . Apply migrations

```
php artisan migrate
```

5 . Run server

```
php artisan serve
```
 
6 . Try it

```
php artisan task:create http://demo.antonshell.me/files/sardegna.gpx
php artisan queue:work
```

## Usage - REST

1 . Create task

```
curl -X POST \
  http://127.0.0.1:8000/api/tasks \
  -H 'Content-Type: application/json' \
  -H 'Postman-Token: 40fc89b4-09c9-4f5d-8b67-2dd6527fc3e7' \
  -H 'cache-control: no-cache' \
  -d '{
    "url": "http://demo.antonshell.me/files/sardegna.gpx"
}'
```

2 . List tasks

```
curl -X GET \
  http://127.0.0.1:8000/api/tasks \
  -H 'Postman-Token: 347653db-4547-4384-99dd-b65384529344' \
  -H 'cache-control: no-cache'
```
 

## Usage - Console

1 . Create task

```
php artisan task:create http://demo.antonshell.me/files/sardegna.gpx
```

2 . Show tasks  

```
php artisan task:list
```

## Usage - Web

1 . Run build in server

```
php artisan serve
```

2 . Open url in browser:

```
http://127.0.0.1:8000
```

3 . Add task with existing url. For example:

```
http://demo.antonshell.me/files/sardegna.gpx
```

## Queue

1 . Start jobs from queue 

```
php artisan queue:work
```

## Testing:

Run all tests:

```
vendor/bin/phpunit
```