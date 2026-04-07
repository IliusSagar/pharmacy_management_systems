# Pharmacy Management System - Requirements Gathering

## 1. Project Overview
The Pharmacy Management System (PMS) is designed to manage daily pharmacy operations efficiently. It will handle inventory management, sales, purchases, prescriptions, and reporting to ensure smooth operation and compliance.

**Goals:**
- Streamline pharmacy workflow
- Track inventory and reduce stock-outs
- Generate reports for sales, purchases, and expiry management
- Improve customer service

**Scope:**
- Point of Sale (POS) for selling medicines
- Inventory & stock management
- Supplier and purchase management
- Prescription management
- User management and access control
- Reports and analytics

---

## 2. Stakeholders
| Stakeholder | Role | Needs / Expectations |
|------------|------|--------------------|
| Pharmacist | System user | Easy medicine sale, prescription processing, inventory tracking |
| Pharmacy Owner | Admin | Reports, inventory insights, sales tracking, supplier management |
| Supplier | External user | Supply request and invoice management |
| Customers | End user | Prescription fulfillment, bill printing |
| IT Admin | System admin | System maintenance, user access control, backups |

---

## 3. User Stories
### Pharmacist
- **US01:** As a pharmacist, I want to search medicines by name or category so that I can quickly find them for sale.
- **US02:** As a pharmacist, I want to add new prescriptions to the system so that I can maintain accurate patient records.
- **US03:** As a pharmacist, I want to check stock levels in real-time so that I can manage inventory efficiently.

### Owner/Admin
- **US04:** As an owner, I want to generate daily/weekly/monthly sales reports to track revenue.
- **US05:** As an admin, I want to manage suppliers and orders so that stock is always sufficient.
- **US06:** As an admin, I want to set user roles and permissions to secure sensitive data.

### Customer
- **US07:** As a customer, I want to receive a printed or digital receipt to confirm my purchase.
- **US08:** As a customer, I want to know if a medicine is available before visiting the pharmacy.

---

## 4. Functional Requirements
1. **User Management**
   - Add, edit, and delete users
   - Role-based access (Pharmacist, Admin)
   - Login and logout

2. **Inventory Management**
   - Add new medicine with batch, expiry date, and quantity
   - Track stock in/out
   - Low stock alerts
   - Expiry notifications

3. **Sales & POS**
   - Add items to cart and process payment
   - Apply discounts
   - Print invoice
   - Prescription linking

4. **Purchase & Supplier Management**
   - Add supplier details
   - Record purchase orders
   - Track received goods
   - Update inventory automatically

5. **Reports**
   - Sales report (daily, weekly, monthly)
   - Purchase report
   - Stock report (current stock, low stock, expired medicines)
   - User activity report

---

## 5. Non-Functional Requirements
| Requirement | Description |
|-------------|------------|
| Performance | System must handle 100 concurrent users |
| Security | Role-based access control, data encryption, secure login |
| Backup | Daily automated backups |
| Usability | User-friendly interface, minimal training required |
| Scalability | Must support future expansion, multiple branches |
| Compliance | Adhere to local pharmacy regulations and GDPR-like rules |

---

## 6. Use Case Diagram

[Pharmacist] ---> (Manage Sales)
[Pharmacist] ---> (Manage Prescriptions)
[Admin] ---> (Manage Inventory)
[Admin] ---> (Generate Reports)
[Admin] ---> (Manage Users)
[Supplier] ---> (Supply Medicines)
[Customer] ---> (Receive Prescription / Invoice)


---

## 7. High-Level Features
- POS module for sales and billing
- Prescription management module
- Inventory and stock control
- Supplier and purchase management
- Role-based user management
- Reporting and analytics dashboard

---

## 8. Constraints
- Must run on Windows/Linux server
- Must support both desktop and tablet usage
- Internet required for updates and backup (optional offline mode for POS)

---

## 9. Assumptions
- Pharmacy staff is familiar with basic computer usage
- Data integrity and backups will be handled by IT admin
- Medicine codes and categories follow standard naming conventions

---

## 10. Glossary
- **POS:** Point of Sale
- **Stock Out:** When a medicine is unavailable
- **Prescription:** Doctor’s order for medicine
- **Batch:** Lot of medicine with same expiry
