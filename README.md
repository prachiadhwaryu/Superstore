# 🛒 Superstore - Grocery Management System  

## 📌 Project Overview  
Superstore is a **web-based application** designed to streamline **grocery store operations**. It provides a platform for managing **customers, suppliers, and products**, while also enabling the creation of **sales and purchase invoices**.  

## 🚀 Features  
### **Customer & Supplier Management**  
- Add new customers and suppliers.  
- View and edit existing customer/supplier details.  

### **Product Management**  
- Add new products and mark them as "out of stock" when unavailable.  
- View and edit product details.  

### **Invoice Management**  
- Generate **sales invoices** for customers.  
- Generate **purchase invoices** for suppliers.  
- View and manage invoices (read-only).  
- Display invoice amounts **with and without tax/discounts**.  
- Ensures invoices are only created for registered **customers, suppliers, and products**.  

## 🏗️ Technologies Used  
### **Frontend**  
- HTML5, CSS, JavaScript, Bootstrap, jQuery, AJAX  

### **Backend**  
- PHP  
- MySQL  

### **Development Tools**  
- Visual Studio Code  
- Apache Server (XAMPP)  

## 📂 Folder Structure  
superstore/ 
- │-- config/ # Contains database configuration and constants
- │ │-- dbConnection.php
- │
- │-- controllers/ # Handles business logic
- │
- │-- models/ # Database interaction logic
- │
- │-- views/ # Contains UI templates
- │ │-- login.php
- │
- │-- public/ # Contains assets and static files
- │ │-- images/
- │ │-- js/
- │ │-- styles.css
- │-- index.php

## 🛠️ Installation & Setup  
**1. Clone the repository:**  
   ```sh
   git clone https://github.com/prachiadhwaryu/superstore.git
   cd superstore
```
   
**2. Setup the database:**  
- Import the provided superstore.sql file into MySQL.
- Update config/dbConnection.php with your database credentials.
- Run the project locally:

**3. Run the project locally:**  
- Ensure XAMPP (or another Apache server) is running.
- Place the project inside the htdocs/ folder.
- Access the app in your browser at:
- http://localhost/superstore/

## 🔒 **Authentication**
- Admins must log in to access the system.
- User credentials are stored securely in an encrypted format.

## 📜 Business Rules
- Customers and suppliers must exist before creating invoices.
- Products must exist before adding them to an invoice.
- Invoices cannot be modified or deleted once created.
- Input validations ensure data consistency.

## 📷 Screenshots
- ERD (Entity Relationship Diagram)
![image](https://github.com/user-attachments/assets/bd1bfd80-e23d-4591-92eb-b308387ec66a)

- Login Screen
![image](https://github.com/user-attachments/assets/8bba9180-ea85-44f7-bc22-f9e7defa02c8)

- Home Page
![image](https://github.com/user-attachments/assets/7fd22358-1c9e-48e8-87a1-c385251a55ab)

- Add Customer
![image](https://github.com/user-attachments/assets/91c4e734-6ff9-46c3-afae-8a866c8a0d06)

- Add Product
![image](https://github.com/user-attachments/assets/d3756048-384b-4f42-914a-495619065700)

- Add Supplier
![image](https://github.com/user-attachments/assets/6f548c5f-397a-4ccf-ac9c-5d4a516fff20)

- Create Sales Invoice
![image](https://github.com/user-attachments/assets/8e75188c-9fb5-4ae1-b343-6f1a68a009ce)

- Create Purchase Invoice
![image](https://github.com/user-attachments/assets/0ed668a3-3f30-4bb9-aca6-83c39d71ee26)

## Contributing
If you would like to contribute to this project, please follow these steps:

1. Fork the repository.
2. Create a new branch for your feature or bugfix.
3. Commit your changes and push the branch to your fork.
4. Create a pull request with a description of your changes.

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.