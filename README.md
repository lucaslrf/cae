<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Sobre Aplicação

Aplicação desenvolvida para a disciplina de Programação Web I na especialização em Desenvolvimento WEB do Instituto Federal da Bahia - IFBA.

## Comandos para inicialização do projeto

composer install
composer update
npm i
php artisan migrate

cp .env.example .env

composer dump-autoload
php artisan optimize
php artisan view:clear

php artisan serve --host 0.0.0.0 pra rodar o servidor

## Observação

No arquivo .env o APP_KEY deve ser assim:

APP_KEY=base64:+qlwN8bCUQ3GsTSCSjM92BTiAYCE5d+8iLkpZQaeulw=

As configurações do banco de dados deve ser de acordo com as configurações do serve do seu localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306 
DB_DATABASE=suadatabase
DB_USERNAME=seuusuario
DB_PASSWORD=seupassword (se for vazio deixe sem nada)


## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.
