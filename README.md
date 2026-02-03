# News-Aggregator
News-Aggregator is a Laravel-based web application designed to collect, manage, and display news articles in an organized manner. The application allows users to browse news by categories, view detailed articles, and manage content through a structured CRUD system. It also includes user authentication for secure access.

# Features
User authentication (Login, Register, Password Reset, Email Verification)
Article management (Create, Read, Update, Delete)
Category management
Organized and user-friendly interface using Blade templates
MVC architecture following Laravel best practices
Secure and scalable backend

# Technologies Used
Laravel (PHP Framework)
PHP
Blade Templating Engine
HTML5
CSS3
JavaScript
MySQL
Composer

# How to Run the Project
1- Clone the repository
git clone https://github.com/your-username/News-Aggregator.git

2- Navigate to the project directory
cd News-Aggregator

3- Install dependencies
composer install

4-Create environment file and generate application key
cp .env.example .env
php artisan key:generate

5- Configure database credentials in the .env file
6-Run migrations
php artisan migrate

7-Start the development server
php artisan serve

8-Open the application in your browser


# Project Structure
resources/
├── views/
│   ├── articles/
│   │   ├── create.blade.php
│   │   ├── edit.blade.php
│   │   ├── index.blade.php
│   │   └── show.blade.php
│   │
│   ├── categories/
│   │   ├── create.blade.php
│   │   ├── edit.blade.php
│   │   └── index.blade.php
│   │
│   ├── auth/
│   │   ├── login.blade.php
│   │   ├── register.blade.php
│   │   ├── forgot-password.blade.php
│   │   ├── reset-password.blade.php
│   │   ├── verify-email.blade.php
│   │   └── confirm-password.blade.php
│   │
│   ├── layouts/
│   ├── components/
│   └── profile/
│
├── js/

# Purpose of the Project
The purpose of this project is to gain hands-on experience with Laravel, MVC architecture, authentication systems, and database-driven web applications by building a real-world news management platform.

# Author
Ifrah Saeed
BS Computer Science Student

# License
This project is open-source and created for educational purposes.
