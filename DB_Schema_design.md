# Pharmacy Management System - Database Schema Design

## 1. Introduction
This document outlines the **Database Schema Design** for the Pharmacy Management System (PMS). It defines tables, fields, relationships, and constraints necessary for storing and managing pharmacy data efficiently.

**Objectives:**
- Provide a clear structure of database tables
- Ensure data consistency and integrity
- Support core pharmacy operations: inventory, sales, prescriptions, reporting

---

## 2. Database Tables

### 2.1 Users
| Field | Type | Description |
|-------|------|-------------|
| id | int (PK) | Unique user identifier |
| name | varchar(255) | User's full name |
| email | varchar(255) | User email, unique |
| password | varchar(255) | Hashed password |
| role | enum('Admin','Pharmacist') | User role |
| created_at | timestamp | Record creation time |
| updated_at | timestamp | Last update time |

---

### 2.2 Medicines
| Field | Type | Description |
|-------|------|-------------|
| id | int (PK) | Unique medicine ID |
| name | varchar(255) | Medicine name |
| category | varchar(100) | Medicine category (e.g., Antibiotic, Painkiller) |
| batch_no | varchar(50) | Batch number |
| expiry_date | date | Expiry date of batch |
| quantity | int | Current stock quantity |
| price | decimal(10,2) | Selling price per unit |
| created_at | timestamp | Record creation time |
| updated_at | timestamp | Last update time |

---

### 2.3 Suppliers
| Field | Type | Description |
|-------|------|-------------|
| id | int (PK) | Unique supplier ID |
| name | varchar(255) | Supplier name |
| contact | varchar(50) | Contact number/email |
| address | varchar(255) | Supplier address |
| created_at | timestamp | Record creation time |
| updated_at | timestamp | Last update time |

---

### 2.4 Purchases
| Field | Type | Description |
|-------|------|-------------|
| id | int (PK) | Unique purchase ID |
| supplier_id | int (FK) | References Suppliers(id) |
| medicine_id | int (FK) | References Medicines(id) |
| quantity | int | Quantity purchased |
| price | decimal(10,2) | Purchase price per unit |
| purchase_date | date | Purchase date |
| created_at | timestamp | Record creation time |
| updated_at | timestamp | Last update time |

---

### 2.5 Sales
| Field | Type | Description |
|-------|------|-------------|
| id | int (PK) | Unique sale ID |
| medicine_id | int (FK) | References Medicines(id) |
| customer_name | varchar(255) | Customer name |
| quantity | int | Quantity sold |
| total_price | decimal(10,2) | Total price of sale |
| prescription_id | int (FK, nullable) | References Prescriptions(id) |
| created_at | timestamp | Record creation time |
| updated_at | timestamp | Last update time |

---

### 2.6 Prescriptions
| Field | Type | Description |
|-------|------|-------------|
| id | int (PK) | Unique prescription ID |
| patient_name | varchar(255) | Patient's name |
| doctor_name | varchar(255) | Doctor's name |
| medicine_list | text / JSON | List of medicines and dosage |
| created_at | timestamp | Record creation time |
| updated_at | timestamp | Last update time |

---

### 2.7 Alerts
| Field | Type | Description |
|-------|------|-------------|
| id | int (PK) | Unique alert ID |
| type | varchar(50) | Alert type (Low Stock, Expired Medicine) |
| message | text | Alert message |
| date | timestamp | Alert creation date |
| created_at | timestamp | Record creation time |
| updated_at | timestamp | Last update time |

---

## 3. Relationships
- **User Roles:** Users → Role defines access to modules
- **Inventory:** Medicines → Purchases (1:M), Medicines → Sales (1:M)
- **Prescriptions:** Prescription → Sales (1:M)
- **Suppliers:** Supplier → Purchases (1:M)

**ER Diagram (Conceptual):**
```
Users
|
|--< Sales (via Pharmacist)
Medicines --< Sales
Medicines --< Purchases >-- Suppliers
Prescriptions --< Sales
Alerts <--- Medicines (low stock / expired)
```

---

## 4. Indexing & Constraints
- **Primary Keys:** All tables have `id` as primary key
- **Foreign Keys:** Enforce referential integrity
- **Unique Constraints:** Users.email, Medicines.batch_no
- **Indexes:** Medicines.name, Medicines.category, Sales.created_at for faster search/reporting
- **Data Integrity:** Quantity cannot be negative, expiry_date must be future date on insert

---

## 5. Notes
- `medicine_list` in Prescriptions can be JSON for flexible storage
- Backup strategy: Daily database backup and replication for high availability
- Database should support multi-branch expansion in future

---

## 6. Glossary
- **PK:** Primary Key  
- **FK:** Foreign Key  
- **JSON:** JavaScript Object Notation  
- **ER Diagram:** Entity-Relationship Diagram  
- **POS:** Point of Sale  

---

## 7. References
- Requirement Analysis Document (PMS)  
- High-Level Design (HLD)  
- Stakeholder interviews  
- Pharmacy workflow standards  