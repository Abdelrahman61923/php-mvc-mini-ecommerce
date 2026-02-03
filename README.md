# 🛒 PHP MVC Mini E-Commerce

A mini e-commerce system built using **Core PHP** with a **custom MVC architecture**, focusing on clean code, scalability, and real-world backend practices.

---

## 📌 Features

* Custom MVC architecture (No Framework)
* Routing system
* Autoloading (PSR-4 style)
* Authentication (Login / Register)
* Middleware (Auth protection)
* Flash Messages
* Validation Errors handling
* Dashboard panel
* Categories Management (CRUD)
* Products Management (CRUD)
* Image Upload & Delete
* Search & Filter
* Pagination
* Secure PDO Database Layer
* Clean Folder Structure

---

## 🧰 Tech Stack

* PHP 8+
* MySQL
* PDO
* HTML / Bootstrap
* Apache (XAMPP)

---

## 📂 Project Folder Structure

```
mini-ecommerce/
│
├── app/
│   ├── Controllers/
│   │   ├── AuthController.php
│   │   └── Dashboard/
│   │       ├── CategoriesController.php
│   │       └── ProductsController.php
│   │
│   ├── Core/
│   │   ├── Database.php
│   │   ├── Flash.php
│   │   ├── Middleware.php
│   │   └── Validator.php
│   │
│   ├── Models/
│   │   ├── Category.php
│   │   └── Product.php
│   │
│   ├── Views/
│   │   ├── auth/
│   │   │   ├── login.php
│   │   │   └── register.php
│   │   │
│   │   ├── dashboard/
│   │   │   ├── layout/
│   │   │   │   ├── header.php
│   │   │   │   ├── footer.php
│   │   │   │   └── sidebar.php
│   │   │   │
│   │   │   ├── categories/
│   │   │   └── products/
│   │   │
│   │   └── layouts/
│   │       ├── auth.php
│   │       └── dashboard.php
│   │
│   ├── bootstrap.php
│   └── config/
│       └── database.php
│
├── public/
│   ├── assets/
│   ├── uploads/
│   │   └── products/
│   └── index.php
│
├── routes/
│   └── web.php
│
├── .htaccess
└── README.md
```

---

## 🗄️ Database Structure

### Categories Table

```sql
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

### Products Table

```sql
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    name VARCHAR(150) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255),
    description TEXT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);
```

---

## ⚙️ Database Configuration

**File:** `app/config/database.php`

```php
return [
    'host'   => 'localhost',
    'dbname' => 'mini_ecommerce',
    'user'   => 'root',
    'pass'   => '',
    'charset' => 'utf8mb4',
];
```

---

## 🔌 Database Layer (PDO)

* Centralized PDO connection
* Prepared statements
* SQL Injection protection
* Reusable query methods

---

## 🚦 Routing System

* All routes are defined in `routes/web.php`
* URLs are mapped to Controllers & Methods
* 404 response for undefined routes

---

## 🧠 MVC Architecture

* **Model** → Handles database logic
* **View** → UI and templates
* **Controller** → Business logic & request handling

Strict separation of concerns for maintainability.

---

## 🔐 Authentication

* Login & Register system
* Password hashing
* Session-based authentication
* Protected dashboard routes

---

## 🛡️ Middleware

* Prevents unauthenticated access
* Redirects guests to login page
* Used mainly for dashboard routes

---

## 🔔 Flash Messages

* Session-based alerts
* Success & error messages
* Automatically removed after display

---

## ❗ Validation

* Custom validation system
* Handles required fields & formats
* Displays validation errors in views

---

## 🖼️ Image Upload

* Secure image upload handling
* Stored in `/public/uploads/products`
* Image deletion on product removal
* Prevents orphan files

---

## 🔍 Search & Filter

* Search products by name
* Filter by category
* Combined with pagination
* GET-based (shareable URLs)

---

## 📄 Pagination

* Custom pagination logic
* Works with filters & search
* Optimized COUNT queries

---

## 🚀 How to Run the Project

1. Clone the repository

```bash
git clone https://github.com/your-username/php-mvc-mini-ecommerce.git
```

2. Move project to:

```
xampp/htdocs/
```

3. Create database:

```
mini_ecommerce
```

4. Import SQL tables

5. Open in browser:

```
http://localhost/php/mini-ecommerce/public
```

---

## 🎯 Why This Project?

This project demonstrates:

* Strong understanding of PHP fundamentals
* MVC architecture without frameworks
* Real-world backend patterns
* Clean and maintainable code

---

## 📌 Author

**Abdelrahman Salah**
Backend / PHP Developer

---

## ⭐ Final Note

This project was built to strengthen backend fundamentals before using frameworks like Laravel.
