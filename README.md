# News-Aggregator
News-Aggregator is a Laravel-based web application designed to collect, manage, and display news articles in an organized manner. The application allows users to browse news by categories, view detailed articles, and manage content through a structured CRUD system. It also includes user authentication for secure access.

# Features
User authentication (Login, Register, Password Reset, Email Verification)  <br>
Article management (Create, Read, Update, Delete) <br>
Category management <br>
Organized and user-friendly interface using Blade templates <br>
MVC architecture following Laravel best practices <br>
Secure and scalable backend <br>

# Technologies Used
Laravel (PHP Framework) <br>
PHP <br>
Blade Templating Engine <br>
HTML5 <br>
CSS3 <br>
JavaScript <br>
MySQL <br>
Composer <br>

# How to Run the Project
1- Clone the repository

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
resources/ <br>
├── views/  <br>
│   ├── articles/  <br>
│   │   ├── create.blade.php  <br>
│   │   ├── edit.blade.php  <br>
│   │   ├── index.blade.php  <br>
│   │   └── show.blade.php  <br>
│   │ <br>
│   ├── categories/  <br>
│   │   ├── create.blade.php  <br>
│   │   ├── edit.blade.php  <br>
│   │   └── index.blade.php  <br>
│   │ <br>
│   ├── auth/  <br>
│   │   ├── login.blade.php  <br>
│   │   ├── register.blade.php  <br>
│   │   ├── forgot-password.blade.php  <br>
│   │   ├── reset-password.blade.php  <br>
│   │   ├── verify-email.blade.php <br>
│   │   └── confirm-password.blade.php  <br>
│   │ <br>
│   ├── layouts/  <br>
│   ├── components/  <br>
│   └── profile/  <br>
│ <br>
├── js/

# Purpose of the Project
The purpose of this project is to gain hands-on experience with Laravel, MVC architecture, authentication systems, and database-driven web applications by building a real-world news management platform.

# Author
Ifrah Saeed
BS Computer Science Student

# License
This project is open-source and created for educational purposes.
