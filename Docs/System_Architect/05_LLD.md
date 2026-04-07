# Pharmacy Management System - Low-Level Design (LLD)

## 1. Introduction
The Low-Level Design (LLD) document provides detailed specifications for developers. It translates the High-Level Design (HLD) into **classes, methods, database tables, and API contracts** for implementation.

**Objectives:**
- Provide detailed class/module specifications
- Define database schema and relationships
- Specify APIs and endpoints
- Guide developers in implementation

---

## 2. Module: User Management
**Responsibilities:** Add, edit, delete users; role-based access

**Class Diagram (Simplified):**

User
```
id: int
name: string
email: string
password: string (hashed)
role: enum {Admin, Pharmacist}
created_at: datetime
updated_at: datetime
```
Methods:
```
login(email, password)
logout()
addUser(userData)
editUser(userId, userData)
deleteUser(userId)
```

**API Endpoints:**
- `POST /api/login` → Authenticate user
- `POST /api/users` → Create user
- `PUT /api/users/{id}` → Update user
- `DELETE /api/users/{id}` → Delete user
- `GET /api/users` → List users

---

## 3. Module: Inventory Management
**Responsibilities:** Manage medicines, stock levels, expiry, batch numbers

**Class Diagram (Simplified):**

Medicine
```
id: int
name: string
category: string
batch_no: string
expiry_date: date
quantity: int
price: decimal
created_at: datetime
updated_at: datetime
```
Methods:
```
addMedicine(data)
updateStock(medicineId, quantity)
removeMedicine(medicineId)
getLowStock()
getExpired()
```

**API Endpoints:**
- `POST /api/medicines` → Add new medicine
- `PUT /api/medicines/{id}` → Update medicine
- `GET /api/medicines` → List all medicines
- `GET /api/medicines/low-stock` → List low-stock medicines
- `GET /api/medicines/expired` → List expired medicines

---

## 4. Module: POS & Sales
**Responsibilities:** Process sales, apply discounts, print invoices, link prescriptions

**Class Diagram (Simplified):**

Sale
```
id: int
medicine_id: int
customer_name: string
quantity: int
total_price: decimal
prescription_id: int (nullable)
created_at: datetime
```
Methods:
```
addSale(saleData)
calculateTotal(medicineList, discounts)
generateInvoice(saleId)
```

**API Endpoints:**
- `POST /api/sales` → Record a sale
- `GET /api/sales/{id}` → View sale details
- `GET /api/sales` → List sales
- `GET /api/sales/report` → Generate sales report

---

## 5. Module: Purchase & Supplier
**Responsibilities:** Manage suppliers and purchase orders

**Class Diagram (Simplified):**

Supplier
```
id: int
name: string
contact: string
address: string
created_at: datetime
```
Purchase
```
id: int
supplier_id: int
medicine_id: int
quantity: int
price: decimal
purchase_date: date
```
Methods:
```
addSupplier(data)
updateSupplier(id, data)
recordPurchase(purchaseData)
getPurchaseReport()
```

**API Endpoints:**
- `POST /api/suppliers` → Add supplier
- `PUT /api/suppliers/{id}` → Update supplier
- `GET /api/suppliers` → List suppliers
- `POST /api/purchases` → Record purchase
- `GET /api/purchases` → List purchases

---

## 6. Module: Prescription Management
**Responsibilities:** Store and manage prescriptions

**Class Diagram (Simplified):**

Prescription
```
id: int
patient_name: string
doctor_name: string
medicine_list: JSON
created_at: datetime
```
Methods:
```
addPrescription(data)
getPrescription(id)
linkToSale(saleId, prescriptionId)
```

**API Endpoints:**
- `POST /api/prescriptions` → Add prescription
- `GET /api/prescriptions/{id}` → View prescription
- `GET /api/prescriptions` → List prescriptions

---

## 7. Module: Reporting & Analytics
**Responsibilities:** Generate reports for sales, purchases, stock, and users

**Class Diagram (Simplified):**

ReportGenerator
Methods:
```
generateSalesReport(dateRange)
generatePurchaseReport(dateRange)
generateStockReport()
```

**API Endpoints:**
- `GET /api/reports/sales?from=&to=` → Sales report
- `GET /api/reports/purchases?from=&to=` → Purchase report
- `GET /api/reports/stock` → Stock report
- `GET /api/reports/users?from=&to=` → User activity report

---

## 8. Database Schema (LLD)
**Tables Overview:**
- **users** (id, name, email, password, role, timestamps)
- **medicines** (id, name, category, batch_no, expiry_date, quantity, price, timestamps)
- **suppliers** (id, name, contact, address, timestamps)
- **purchases** (id, supplier_id, medicine_id, quantity, price, date)
- **sales** (id, medicine_id, customer_name, quantity, total_price, prescription_id, timestamps)
- **prescriptions** (id, patient_name, doctor_name, medicine_list, timestamps)
- **alerts** (id, type, message, date, timestamps)

**Relationships:**
- users → role controls access
- medicines → purchases (1:M)
- medicines → sales (1:M)
- prescriptions → sales (1:M)
- suppliers → purchases (1:M)

---

## 9. Security Design
- Role-based access control (Admin, Pharmacist)
- Password encryption (bcrypt)
- HTTPS for all communication
- Data validation for API requests
- Backup and restore functionality

---

## 10. Glossary
- **POS:** Point of Sale  
- **MVP:** Minimum Viable Product  
- **JWT:** JSON Web Token for authentication  
- **LLD:** Low-Level Design  

---

## 11. References
- High-Level Design Document (HLD)  
- Requirement Analysis Document  
- Stakeholder interviews  
- Pharmacy workflow standards  
