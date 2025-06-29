# Laravel Simple CRUD

A beginner-friendly Laravel application demonstrating basic CRUD (Create, Read, Update, Delete) operations. This project includes product image uploads, local file storage, pagination, and database seeding — all wrapped in a clean, framework-free UI.

---

## 🚀 Features

- ✅ Create, view, edit, and delete products
- 🖼 Upload and display product images (stored in local `storage/app/public`)
- 📄 Paginated product listing using an HTML table layout
- 🌱 Database seeder with fake product data and random images
- 🧼 Clean, simple UI built with plain HTML and CSS (no Bootstrap or Tailwind)
- 🗂 Organized structure using:
  - Form Request validation
  - Resourceful controllers
  - Laravel best practices

---

## ⚙️ Setup Instructions

Follow these steps to run the project locally:

```bash
# Clone the repository
git clone https://github.com/pradeeptiwari-nickelfox/laravel-simple-crud.git

# Go into the project directory
cd laravel-simple-crud

# Install dependencies
composer install

# Copy environment file and generate app key
cp .env.example .env
php artisan key:generate

# Create storage symlink (for images)
php artisan storage:link

# Run migrations and seed the database
php artisan migrate --seed

# Start the development server
php artisan serve
