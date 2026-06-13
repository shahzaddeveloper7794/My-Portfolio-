# My Portfolio Website

## Overview

A dynamic and fully responsive portfolio website built using PHP, MySQL, HTML, CSS, JavaScript, and Tailwind CSS. The website includes a complete admin dashboard that allows easy management of projects, skills, qualifications, contact messages, and website settings without modifying the source code.

This project was developed to showcase professional work, technical skills, qualifications, and client projects in a modern and user-friendly interface.

---

## Features

### Frontend

* Responsive design for desktop, tablet, and mobile devices
* Modern user interface
* Dynamic project showcase
* Project details pages
* Skills section
* Qualifications section
* Contact form
* Privacy policy page
* Dark and light mode support

### Admin Panel

* Secure admin login
* Dashboard overview
* Project management (Add, Edit, Delete)
* Skills management
* Qualifications management
* Categories management
* Contact message management
* Website settings management
* Hero section management
* Image upload functionality

---

## Technologies Used

### Frontend

* HTML5
* CSS3
* JavaScript
* Tailwind CSS

### Backend

* PHP 8.2
* MySQL

### Development Environment

* XAMPP
* VS Code
* Git
* GitHub

---

## Installation Guide

### 1. Clone the Repository

```bash
git clone https://github.com/shahzaddeveloper7794/My-Portfolio-.git
```

### 2. Move Project

Copy the project folder into:

```text
C:\xampp\htdocs\
```

### 3. Create Database

Open phpMyAdmin and create a database:

```sql
portfolio_db
```

### 4. Import Database

Import:

```text
database/schema.sql
```

### 5. Configure Database

Update:

```text
config/db.php
```

with your database credentials.

### 6. Start XAMPP

Start:

* Apache
* MySQL

### 7. Run the Project

Open:

```text
http://localhost/portfolio
```

---

## Project Structure

```text
portfolio/
│
├── admin/
│   ├── actions/
│   ├── includes/
│   ├── login.php
│   ├── index.php
│
├── assets/
│   ├── css/
│   ├── uploads/
│
├── config/
│   └── db.php
│
├── database/
│   ├── install.php
│   └── schema.sql
│
├── includes/
│
├── index.php
├── about.php
├── projects.php
├── contact.php
├── project-details.php
└── privacy-policy.php
```

---

## Screenshots

### Home Page

(homepage.png)

### Admin Dashboard

(admin.png)

### Projects Section

(projects.png)

### About Section

(about.png)
---

## Future Improvements

* Blog management system
* Multi-language support
* Email notifications
* Advanced analytics dashboard
* User authentication enhancements
* SEO optimization

---

## Author

Muhammad Shahzad

Full Stack Developer

GitHub:
https://github.com/shahzaddeveloper7794

---

## License

This project is created for educational and portfolio purposes.
