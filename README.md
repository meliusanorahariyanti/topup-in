# Game Management Website

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/username/repository/actions"><img src="https://img.shields.io/github/workflow/status/username/repository/Build" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Overview

The **Game Management Website** is an application designed to manage and display a list of games. This platform allows users to add, edit, and delete games, as well as manage essential information such as genres, game types, descriptions, and images.

### Screenshots

<p align="center">
  <img src="assets/screenshots/screenshot1.png" alt="Homepage Screenshot" width="600">
  <img src="assets/screenshots/screenshot2.png" alt="Game Details Screenshot" width="600">
</p>

## Technologies Used

This website is built using the following technologies and tools:

- **Laravel**: A PHP framework that facilitates development with its expressive and elegant syntax.
- **PHP**: A server-side scripting language used for application logic and database interactions.
- **MySQL**: A relational database management system for storing application data.
- **HTML/CSS**: Basic technologies for web page structure and styling.
- **Bootstrap**: A CSS framework for responsive design and pre-built components.
- **JavaScript**: A client-side scripting language that enhances user interactivity on web pages.

## Installation

To set up the application locally, follow these steps:

1. **Clone the repository**:

    ```bash
    git clone https://github.com/username/repository.git
    ```

2. **Navigate to the project directory**:

    ```bash
    cd repository
    ```

3. **Install dependencies**:

    ```bash
    composer install
    ```

4. **Copy the `.env.example` file to `.env`**:

    ```bash
    cp .env.example .env
    ```

5. **Generate an application key**:

    ```bash
    php artisan key:generate
    ```

6. **Run database migrations**:

    ```bash
    php artisan migrate
    ```

7. **Start the local development server**:

    ```bash
    php artisan serve
    ```

8. **Access the application**:

    Open your browser and navigate to [http://localhost:8000](http://localhost:8000) to view the application.

## Project Structure

- **`app/Http/Controllers`**: Contains controllers responsible for application logic.
- **`resources/views`**: Contains Blade templates for the application's views.
- **`public`**: Folder for publicly accessible files, including images and CSS.
- **`routes/web.php`**: Contains routes that link URLs to controllers.

## Contributing

We appreciate your interest in contributing to this project! Please refer to the [contribution guidelines](https://laravel.com/docs/contributions) in the Laravel documentation for more information.

## Code of Conduct

To ensure a welcoming community, please review and adhere to the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover any security vulnerabilities, please contact Taylor Otwell at [taylor@laravel.com](mailto:taylor@laravel.com). All security issues will be addressed promptly.

## License

The Laravel framework is open-source software licensed under the [MIT License](https://opensource.org/licenses/MIT).

## Contact

For any questions or feedback, please reach out to [email@example.com](mailto:email@example.com).

---

Thank you for using the **Game Management Website**! We hope you find this application useful.
