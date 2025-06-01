<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <strong>Dish Delight</strong> is a Laravel-powered recipe sharing platform for food lovers.  
    Easily browse, share, and discover delicious recipes from around the world.
</p>

<p align="center">
    <a href="#"><img src="https://img.shields.io/github/workflow/status/your-org/dish-delight/laravel-tests?label=build" alt="Build Status"></a>
    <a href="#"><img src="https://img.shields.io/badge/Laravel-10.x-red.svg" alt="Laravel Version"></a>
    <a href="#"><img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="License"></a>
</p>

---

## 🚀 About Dish Delight

**Dish Delight** is a full-stack Laravel application that allows users to:

- 📷 Upload and share recipes with images
- 📖 Browse recipes by ingredients or titles
- ❤️ Save or favorite recipes
- 🔍 Search for recipes using a responsive UI
- 🧑‍🍳 Learn step-by-step instructions for cooking

It's built using Laravel, Bootstrap, and Blade templating for a responsive and intuitive experience.

---

## 🧑‍🍳 Features

- User registration and login
- Recipe creation with image upload
- Responsive design for mobile & desktop
- Ingredient and instruction formatting
- Real-time search functionality

---

## 🛠️ Tech Stack

- **Backend:** Laravel 10
- **Frontend:** Blade, Bootstrap 5
- **Database:** MySQL / SQLite
- **Authentication:** Laravel Breeze / Sanctum *(optional)*

---

## 📦 Installation

Clone the repo and set up the app:

```bash
git clone https://github.com/simoGhilo/dish-delight.git
cd dish-delight
composer install
cp .env.example .env
php artisan key:generate
