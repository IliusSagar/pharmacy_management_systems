# Pharmacy Management System - System Design

## 1. Introduction
The system design document outlines the architecture, modules, data flow, and key design decisions for the Pharmacy Management System (PMS). This ensures a structured approach for developers and stakeholders.

**Objectives:**
- Define system architecture
- Specify modules and components
- Show data flow between modules
- Provide guidelines for implementation

---

## 2. System Architecture
The PMS is designed as a **modular web application** with a **client-server architecture**.

**Components:**
- **Frontend:** Web-based UI for Pharmacists, Admins, and Customers
- **Backend:** RESTful API server handling business logic
- **Database:** Centralized relational database (MySQL/PostgreSQL)
- **Notification Service:** Email/SMS alerts for low stock, expired medicines
- **Authentication:** Role-based login system

**High-Level Architecture Diagram:**

[Browser / Client] ---> [Frontend UI] ---> [Backend API] ---> [Database]
|
---> [Notification Service]


---

## 3. Modules and Components
| Module | Description | Sub-Modules / Features |
|--------|------------|----------------------|
| User Management | Manage system users and roles | Add/Edit/Delete Users, Role-based Access |
| Inventory Management | Track medicines and stock | Add Medicine, Update Stock, Expiry Notifications, Low Stock Alerts |
| POS & Sales | Process sales and billing | Cart Management, Apply Discounts, Invoice Generation, Prescription Linking |
| Purchase & Supplier | Manage suppliers and purchases | Supplier Details, Purchase Orders, Goods Receipt, Inventory Update |
| Prescription Management | Store and manage prescriptions | Add/Update Prescription, Link to Sale |
| Reporting & Analytics | Generate business reports | Sales Reports, Stock Reports, Purchase Reports, User Activity Reports |
| Alerts & Notifications | Notify stakeholders | Low Stock Alerts, Expiry Notifications via Email/SMS |
| Backup & Security | Ensure data safety and security | Role-based Access, Daily Backup, Encryption |

---

## 4. Data Flow
**1. Sale Process:**

Customer -> Pharmacist -> POS Module -> Inventory Update -> Database -> Print Invoice

**2. Purchase Process:**

Admin -> Supplier -> Purchase Module -> Inventory Update -> Database -> Notification

**3. Prescription Management:**

Doctor -> Prescription Module -> Pharmacist -> Sale -> Database

**4. Reporting:**

Database -> Reporting Module -> Admin / Owner


---

## 5. Database Design (High-Level)
**Tables:**
- Users (id, name, role, email, password, created_at)
- Medicines (id, name, category, batch_no, expiry_date, quantity, price)
- Suppliers (id, name, contact, address)
- Purchases (id, medicine_id, supplier_id, quantity, price, date)
- Sales (id, medicine_id, customer_name, quantity, total_price, date)
- Prescriptions (id, patient_name, doctor_name, medicines_list, date)
- Alerts (id, type, message, date)

**Relationships:**
- One-to-Many: Supplier → Purchases
- One-to-Many: Medicine → Sales
- One-to-Many: Prescription → Sales
- User roles determine module access

---

## 6. Technology Stack
| Layer | Technology |
|-------|------------|
| Frontend | HTML5, CSS3, JavaScript, Vue.js / React |
| Backend | PHP Laravel / Node.js Express |
| Database | MySQL / PostgreSQL |
| Notification | SMTP Email / Twilio SMS |
| Hosting | VPS / Cloud (AWS, DigitalOcean) |
| Security | HTTPS, JWT / Session, Role-based Access Control |

---

## 7. Security Design
- Role-based access control (Admin, Pharmacist, Customer)
- Password hashing (bcrypt)
- Secure communication via HTTPS
- Daily automated database backup
- Data encryption for sensitive fields (prescription, user info)

---

## 8. Performance & Scalability
- Caching for frequently accessed data (Redis / Memcached)
- Load balancing for multiple users
- Modular architecture for easy future expansion
- Support for multiple branches via centralized database

---

## 9. Constraints
- Must support Windows/Linux server environment
- Desktop and tablet compatibility
- Internet required for updates and notifications (offline POS optional)
- Compliance with local pharmacy regulations

---

## 10. Glossary
- **POS:** Point of Sale  
- **Inventory:** Medicines and stock levels  
- **MVP:** Minimum Viable Product  
- **REST API:** Communication between frontend and backend  
- **JWT:** JSON Web Token for authentication  

---

## 11. References
- Requirement Analysis Document (PMS)
- Stakeholder interviews
- Pharmacy workflow standards
- Regulatory guidelines for pharmacy software