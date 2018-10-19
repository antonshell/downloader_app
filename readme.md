# Downloader Application

Url downloader. Accept tasks for download resources by url.
Accept tasks via Rest, Web and Console.
Test project. Build with Laravel 5.7.

Here is [Specification](docs/specification.md)

## Install

1 . Clone repository

```
git clone ...
```

2 . Install dependencies.

```
composer install
npm install
```

3 . Configure database settings

```
cp .env.example .env
nano .env
```

4 . Apply migrations

```
php artisan migrate
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
    "url": "http://velocrunch.ru/gpx/sardegna-2017/full.gpx"
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
php artisan task:create http://velocrunch.ru/gpx/sardegna-2017/full.gpx
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
http://velocrunch.ru/gpx/sardegna-2017/full.gpx
```

## Queue

1 . Start jobs from queue 

```
php artisan queue:work
```