<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Sobre Aplicação
Aplicação desenvolvida para a disciplina de Programação Web I na especialização em Desenvolvimento WEB do Instituto Federal da Bahia - IFBA utilizando o framework PHP Laravel.
O projeto é o Controle de Agendamento de Espaços (CAE) que visa atender a necessidade da instituição em relação a reservas de locais (salas, laboratórios, auditórios) pelos servidores do campus. Para isso um reserva deve ser cadastrada por um servidor comum direcionado-a a um coordenador que tem o poder de aprovar ou recusar tal reserva. 
Sobre o servidor são definidos nome, telefone, CPF, SIAPE, cargo e tipo, que pode ser docente ou técnico administrativo. Um servidor pode ser um coordenador tendo assim data de início e data de fim de sua promoção e cargo ocupado. A respeito dos locais de reserva será necessário saber o nome, capacidade, o número da chave, bloco pertencente que terá descrição e nome e equipamentos contidos que terá tombo, status, nome e descrição.

## Desenvolvedores
	Letícia Porto Soares
	Lucas Rodrigues Ferreira
	Romenito Pereira Damaceno

## Banco de dados
Importar a base de dados controledeespaco-v5.sql presente na pasta banco do projeto

## Arquivo .env
Executar o comando

cp .env.example .env

No arquivo .env o APP_KEY deve ser assim:

APP_KEY=base64:+qlwN8bCUQ3GsTSCSjM92BTiAYCE5d+8iLkpZQaeulw=

As configurações do banco de dados deve ser de acordo com as configurações do banco local

...
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306 
DB_DATABASE=controledeespaco
DB_USERNAME=seuusuario
DB_PASSWORD=seupassword (se for vazio deixe sem nada)
…

As configurações do e-mail deve ser de acordo com as configurações da sua conta
...
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com 
MAIL_PORT=465
MAIL_USERNAME=seuemail
MAIL_PASSWORD=suasenha
MAIL_ENCRYPTION=ssl
…

## Comandos para inicialização do projeto
composer install
composer update
npm i
composer dump-autoload
php artisan optimize
php artisan view:clear
php artisan serve pra executar o projeto

Obs.: O projeto requer PHP 7.2.5

## Funcionamento da aplicação
Dados iniciais de acesso:
    login: admin@mail.com / senha: admin123
Usuário admin cadastra usuários e define o seu grupo de permissão (servidor ou coordenador)
Usuário admin cadastra servidor vinculando um usuário cadastrado previamente
Usuário admin cadastra um coordenador vinculando um servidor. Esse servidor deve ser um que está atrelado a um usuário com grupo de permissão coordenador 
Usuário admin cadastra Bloco
Usuários admin e coordenador cadastram Local e Equipamento
Usuários servidor e coordenador cadastram Reserva e suas Datas
Usuário coordenador Aprova ou Recusa reserva

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
