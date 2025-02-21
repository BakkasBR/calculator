<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Calculator Project

This project is a Laravel and Vue by using inertia 2.0 (ShadCN Vue) application that includes a calculator with session-based error handling and toasts for UI feedback.

## 📌 Prerequisites

Ensure you have the following installed:

- PHP 8.2+
- Composer
- Node.js (Latest LTS)
- NPM or Yarn
- Laravel Herd (optional but recommended for local development)

---

## 🚀 Setup Guide

### 1️⃣ Clone the Repository
```sh
git clone https://github.com/your-username/your-repo.git
cd your-repo
```

### 2️⃣ Install Backend Dependencies
```sh
composer install
```

### 3️⃣ Set Up Environment
```sh
cp .env.example .env
php artisan key:generate
```
- Configure your database in `.env`:
  ```
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=calculator_db
  DB_USERNAME=root
  DB_PASSWORD=
  ```

### 4️⃣ Run Migrations & Seed Data (if applicable)
```sh
php artisan migrate --seed
```

### 5️⃣ Install Frontend Dependencies
```sh
npm install
```

### 6️⃣ Build Frontend & Run Dev Server
```sh
npm run dev
```
### 6️⃣ Run Tests I am using pest because it is cool I guess
```sh
./vendor/bin/pest
```

### Start Laravel Server
If using Laravel Herd:
```sh
herd link
```
If using Artisan:
```sh
php artisan serve
```


---

## 🔥 Usage

- Open `http://localhost` (or `http://your-project.test` if using Herd).
- Perform calculations.
- Errors like division by zero trigger a toast notification.

---

## 🛠 Useful Commands

| Command | Description |
|---------|-------------|
| `php artisan migrate:fresh` | Reset database with seed data |
| `php artisan optimize:clear` | Clear cache |
| `php artisan route:list` | Show all routes |
| `npm run build` | Build for production |
| `./vendor/bin/sail up -d` | Start Docker services |

---

Happy Coding! 🚀

