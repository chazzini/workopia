## Job Listing Site Built with Vanilla PHP

This job listing site is built using vanilla PHP, incorporating various features such as PHP classes, sessions for user authentication, validation for input data, middleware for processing requests, a router for handling routes,MVC for architecture, PDO for database access and Composer for managing dependencies.

### Features:
- **PHP Class:** Organizes code into reusable classes for better structure and maintainability.
- **Session Management:** Uses sessions for user authentication and maintaining user data across pages.
- **Validation:** Implements validation mechanisms to ensure data integrity and security.
- **Middleware:** Middleware functions are used to intercept and process HTTP requests before they reach the router.
- **Router:** Handles routing and mapping URLs to appropriate controller actions.
- **Composer Integration:** Manages external dependencies and packages using Composer.

### Clone and Setup Instructions:
1. Clone the repository using the following command:
   ```
   git clone https://github.com/chazzini/workopia.git
   ```

2. Set up the database by importing the SQL file provided:
   - [SQL File](database/db.sql)
   - Use a tool like phpMyAdmin or MySQL command line to import the SQL file.

3. Configure the database credentials in the project's configuration file (`config.php` or similar).
   create a folder in the root called config> inside config create file(`db.php`).
   Add the content below to file.
   ```
   <?php

    return [
        'host' => 'localhost',
        'port' => '3306',
        'user' => 'root',
        'db' => 'workopia',
        'password' => '',
        'driver' => 'mysql',
    ];
   ```

5. Install dependencies using Composer:
   ```
   composer install
   ```

6. Start the PHP development server:
   ```
   php -S localhost:8000
   ```

7. Access the site in your browser at [http://localhost:8000](http://localhost:8000).

### Screenshot:
![Job Listing Site Screenshot](screen-shot)

