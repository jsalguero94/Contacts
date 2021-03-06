<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About this Contact Web App

This was a 24 hours challenge. The purpose of the application is to store CSV files, with a list of contacts information. I attach you the pic of the front end. The ER Diagram that was generated by reverse engineering using MySQL Workbench. All of the tables was generated using Laravel Migrations.

This app connects to S3 aws bucket. All the csv files are saved in aws.

You need to sing up. The app have the option with two factor Google authenticator.

You can also test it in live!!

http://contactsbyjulio-env.eba-capmgpmh.us-east-2.elasticbeanstalk.com/

You can create you own account or use the below account:
- email:
- test@test.com
- password:
- 12345678

![](https://github.com/jsalguero94/Contacts/blob/a0fa5a1bffaa15c411ed27f882a69f1a118c51ac/public/img/front%20page.PNG)
![](https://github.com/jsalguero94/Contacts/blob/95498274de7d11a9a13a28c89f5f37d486376c97/public/img/er-diagram.png)


### Instalation Requirements

- Composer 2.1.6
- MySQL 8
- Laravel 8.57
- ES3 AWS account
- PHP 7.4

## Installation

Clone the repo locally:

```sh
git clone https://github.com/jsalguero94/Contacts.git
cd Contacts
```

Install PHP dependencies:

```sh
composer install
```

Install NPM dependencies:

```sh
npm ci
```

Build assets:

```sh
npm run dev
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Use your Login MySQL credentials


Run database migrations:

```sh
php artisan migrate
```


```sh
php artisan serve
```

