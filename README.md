# Laravel Basic Starter Kit

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

Set up the correct permissions for the project.

```bash
chmod -R 777 /var/www/storage /var/www/bootstrap/cache
```

### 4. Build the Docker Containers

Run the following command to install PHP dependencies.

```bash
docker-compose up -d
```
