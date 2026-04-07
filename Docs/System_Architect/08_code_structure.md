# Pharmacy Management System - Code Structure

## 1. Introduction
This document describes the **code organization and file structure** for the Pharmacy Management System (PMS). It ensures maintainability, readability, and scalability for developers.

**Objectives:**
- Provide clear folder/file hierarchy
- Define responsibilities of each module
- Guide developers for implementation and future expansion

---


## 2. Project Root Structure


```
pharmacy-management-system/
├── app/
│   ├── Console/           // Artisan commands
│   ├── Exceptions/        // Error handling
│   ├── Http/
│   │   ├── Controllers/   // Controllers for modules
│   │   ├── Middleware/    // Auth and role-based access
│   │   └── Requests/      // Form validation classes
│   ├── Models/            // Eloquent models (User, Medicine, Sale, etc.)
│   └── Services/          // Business logic / helper services
├── bootstrap/
│   └── cache/             // Cache files
├── config/                // Configuration files (app, database, mail, etc.)
├── database/
│   ├── factories/         // Database factories for testing
│   ├── migrations/        // Database migration files
│   └── seeders/           // Database seeders
├── public/                // Public assets (CSS, JS, images)
├── resources/
│   ├── views/             // Blade templates / frontend views
│   └── js/                // Frontend JavaScript (Vue.js / React)
├── routes/
│   ├── api.php            // API routes
│   └── web.php            // Web routes
├── storage/               // Logs, cache, uploaded files
├── tests/                 // Unit and feature tests
├── vendor/                // Composer dependencies
├── .env                   // Environment variables
├── composer.json
└── package.json

```
---

## 3. Module-Wise Code Organization

### 3.1 User Management
- **Controller:** `UserController.php`
- **Model:** `User.php`
- **Routes:** `/api/users`, `/api/login`
- **Views:** `resources/views/users/`
- **Responsibilities:** Add/Edit/Delete users, role-based access, login/logout

### 3.2 Inventory Management
- **Controller:** `MedicineController.php`
- **Model:** `Medicine.php`
- **Routes:** `/api/medicines`
- **Views:** `resources/views/medicines/`
- **Responsibilities:** Add/update medicines, low stock alerts, expiry tracking

### 3.3 POS & Sales
- **Controller:** `SaleController.php`
- **Model:** `Sale.php`
- **Routes:** `/api/sales`
- **Views:** `resources/views/sales/`
- **Responsibilities:** Process sales, apply discounts, generate invoices, link prescriptions

### 3.4 Purchase & Supplier
- **Controller:** `PurchaseController.php`, `SupplierController.php`
- **Model:** `Purchase.php`, `Supplier.php`
- **Routes:** `/api/purchases`, `/api/suppliers`
- **Views:** `resources/views/purchases/`, `resources/views/suppliers/`
- **Responsibilities:** Manage suppliers, record purchases, update inventory

### 3.5 Prescription Management
- **Controller:** `PrescriptionController.php`
- **Model:** `Prescription.php`
- **Routes:** `/api/prescriptions`
- **Views:** `resources/views/prescriptions/`
- **Responsibilities:** Add, view, and link prescriptions to sales

### 3.6 Reporting & Analytics
- **Controller:** `ReportController.php`
- **Services:** `ReportService.php`
- **Routes:** `/api/reports`
- **Views:** `resources/views/reports/`
- **Responsibilities:** Generate sales, purchase, stock, and user activity reports

### 3.7 Alerts & Notifications
- **Services:** `NotificationService.php`
- **Responsibilities:** Send low stock and expired medicine notifications (Email/SMS)

---

## 4. Frontend Structure (Vue.js / React)

```
resources/js/
├── components/ # Reusable UI components
├── views/ # Module views (POS, Inventory, Users)
├── router/ # Frontend routes
├── store/ # State management (Vuex / Redux)
├── services/ # API calls to backend
└── app.js # Main entry point
```

---

## 5. Database Migrations
- `2026_01_01_000001_create_users_table.php`
- `2026_01_01_000002_create_medicines_table.php`
- `2026_01_01_000003_create_suppliers_table.php`
- `2026_01_01_000004_create_purchases_table.php`
- `2026_01_01_000005_create_sales_table.php`
- `2026_01_01_000006_create_prescriptions_table.php`
- `2026_01_01_000007_create_alerts_table.php`

---

## 6. Testing
- Unit tests: `tests/Unit/` (models, services)
- Feature tests: `tests/Feature/` (controllers, APIs)
- Test database migrations and seeders for consistent test data

---

## 7. Notes
- Follow **PSR-12 coding standards** for PHP
- Keep **separation of concerns**: Controllers for requests, Services for business logic
- Use **resource controllers** for REST APIs
- Use **environment variables** for database, mail, and API keys

---

## 8. References
- Requirement Analysis Document (PMS)  
- High-Level Design (HLD)  
- Low-Level Design (LLD)  
- Laravel / Vue.js / React best practices  