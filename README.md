# MKSmart eCommerce system

## About Repository

MKSmart is an ecommerce system based on Laravel 8.
Frontend system provide a simple online interface to order products from online.
Backend system provide a complete management of products by category CRUD.

## Tech Specification

- Laravel 8
- jQuery 3
- Bootstrap 4
- Font Awesome 5
- Intervention Image

## Features

- Basic ecommerce system
- Login, Register, as default auth
- Show, update, edit, and delete products as admin
- Show, update, edit, and delete category as admin
- Show, update, edit, and delete brands as admin
- Search Products
- product checkout
- local payment system
- user dashboard
- Authorization

## Installation

- `git clone https://github.com/SBTHDR/mksmart.git`
- `cd mksmart/`
- `cp .env.example .env`
- `composer install`
- Run `php artisan key:generate`
- Update `.env` and set your database credentials
- `php artisan migrate`
- `npm install`
- `npm run dev`
- `php artisan serve`

## License

[MIT license](https://opensource.org/licenses/MIT).
