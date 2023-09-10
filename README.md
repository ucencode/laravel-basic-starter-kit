# Laravel Basic Starter Kit using bootstrap 5

## Requirements

This uses Laravel 10.x, Please make sure your server meets the requirements before installing.
- PHP >= 8.1
- Composer

## Installation

### Clone the repo and cd into it

```bash
git clone https://github
cd laravel-basic-starter-kit
```

### Install composer dependencies

```bash
composer install
```

### Install NPM dependencies

```bash
npm install
```

### Create a copy of your .env file
    
```bash
cp .env.example .env
```
Then, set your database credentials in your .env file

### Generate an app encryption key

```bash
php artisan key:generate
```

### Migrate the database and seed

```bash
php artisan migrate
php artisan db:seed
```

### Link storage folder

```bash
php artisan storage:link
```

### Run the server
You must motivated first before you run the server
```bash
php artisan inspire
```
Then run the server
```bash
php artisan serve
```

## Login Credentials
Visit 127.0.0.1:8000 in your browser and login with the following credentials:
```
email: admin@example.com
password: admin
```





