# Laravel Basic Starter Kit

## For developer using Docker

### 1. Clone the Repository

First, clone this repository to your local machine and navigate into the project directory.

```bash
git clone https://github.com/ucencode/laravel-basic-starter-kit.git
cd ./laravel-basic-starter-kit
```

### 2. Set Up Environment Variables

Create a new `.env` file by copying the example file.

```bash
cp .env.example .env
```

### 3. Set Up Permissions

If you are using Linux or MacOS. Set up the correct permissions for the project.

```bash
chmod -R 777 /var/www/storage /var/www/bootstrap/cache
```

### 4. Build the Docker Containers

Run the following command to install PHP dependencies.

```bash
docker-compose up -d
```

## For non-Docker user

### Requirement

- PHP 8.2 with composer
- Any database (recommended : PostgreSQL or MySQL)

### 1. Clone this Repository

First, clone this repository to your local machine and navigate into the project directory.

```bash
git clone https://github.com/ucencode/laravel-basic-starter-kit.git
cd ./laravel-basic-starter-kit
```

### 2. Copy the .env

```bash
cp .env.example .env
```

### 3. DB Configuration

Set up your database configuration in the `.env` file.

### 4. Install Composer Dependencies

```bash
composer install
```

### 5. Generate App Key

```bash
php artisan key:generate
```

### 6. Run Migrations

```bash
php artisan migrate
```

### 7. Run the Development Server

```bash
php artisan serve
```

You can now access the server at http://localhost:8000
