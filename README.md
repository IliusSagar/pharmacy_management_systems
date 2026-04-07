# Pharmacy Management System (PMS)

A **Laravel-based Pharmacy Management System** API to manage medicines, suppliers, purchases, sales, prescriptions, and alerts.
Supports **CRUD operations** via RESTful API and ensures **data integrity** for pharmacy workflows.

---

## Table of Contents

* [Features](#features)
* [Technology Stack](#technology-stack)
* [Installation](#installation)
* [Environment Setup](#environment-setup)
* [Database & Migrations](#database--migrations)
* [API Endpoints](#api-endpoints)
* [Usage](#usage)
* [License](#license)

---

## Features

* User management: Admin & Pharmacist roles
* Medicine inventory management
* Supplier management
* Purchases & Sales tracking
* Prescription management
* Alerts for low stock and expired medicines
* Fully RESTful API

---

## Technology Stack

* **Backend:** Laravel 12.0
* **Database:** MySQL / MariaDB
* **API:** REST API
* **Authentication:** (Optional) Laravel Sanctum / JWT
* **Environment:** PHP 8.2.12, Composer

---

## Installation

1. Clone the repository:

```bash
git clone https://github.com/IliusSagar/pharmacy_management_system.git
cd pharmacy_management_system
```

2. Install dependencies:

```bash
composer install
```

3. Copy `.env.example` to `.env`:

```bash
cp .env.example .env
```

4. Generate application key:

```bash
php artisan key:generate
```

---

## Environment Setup

Update `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pharmacy_db
DB_USERNAME=root
DB_PASSWORD=
```

> Create the database in MySQL if it doesn’t exist:

```sql
CREATE DATABASE pharmacy_db;
```

---

## Database & Migrations

Run migrations to create all tables:

```bash
php artisan migrate
```

(Optional) Seed the database with sample data:

```bash
php artisan db:seed
```

---

## API Endpoints

| Resource      | Method    | Endpoint              | Description                |
| ------------- | --------- | --------------------- | -------------------------- |
| Users         | GET       | `/api/users`          | List all users             |
| Users         | POST      | `/api/users`          | Create new user            |
| Users         | GET       | `/api/users/{id}`     | Show user                  |
| Users         | PUT/PATCH | `/api/users/{id}`     | Update user                |
| Users         | DELETE    | `/api/users/{id}`     | Delete user                |
| Medicines     | GET       | `/api/medicines`      | List medicines             |
| Medicines     | POST      | `/api/medicines`      | Add medicine               |
| Medicines     | GET       | `/api/medicines/{id}` | Show medicine              |
| Medicines     | PUT/PATCH | `/api/medicines/{id}` | Update medicine            |
| Medicines     | DELETE    | `/api/medicines/{id}` | Delete medicine            |
| Suppliers     | CRUD      | `/api/suppliers`      | Supplier management        |
| Purchases     | CRUD      | `/api/purchases`      | Purchase management        |
| Sales         | CRUD      | `/api/sales`          | Sale management            |
| Prescriptions | CRUD      | `/api/prescriptions`  | Prescription management    |
| Alerts        | CRUD      | `/api/alerts`         | Low stock / expired alerts |

> ⚡ All endpoints return **JSON responses**.

---

## Usage

1. Use **Postman** or **Insomnia** to test the API.
2. Optional: Add **Laravel Sanctum or JWT Auth** to secure API.
3. Example: Create a new medicine:

```json
POST /api/medicines
{
    "name": "Paracetamol",
    "category": "Painkiller",
    "batch_no": "BATCH-001",
    "expiry_date": "2026-12-31",
    "quantity": 100,
    "price": 12.50
}
```

---

## License

MIT License © Ilius Sagar
