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

### 3. Build the Docker Containers

Build the Docker containers defined in the `docker-compose.yml` file.

```bash
docker-compose build
```

### 4. Install PHP Dependencies

Run the following command to install PHP dependencies.

```bash
docker-compose up -d
```
