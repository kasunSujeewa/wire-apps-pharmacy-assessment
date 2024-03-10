# README: Deploying Pharmacy Assessment

This README provides step-by-step instructions for deploying a Pharmacy Assessment project locally after cloning it from a Git repository.

## Prerequisites

Before starting, ensure that you have the following installed on your local machine:

- PHP (>= 8.1)
- Composer
- Git
- Laravel CLI

## Steps to Deploy Locally

1. **Clone the Repository:**

    ```bash
    git clone <repository-url>
    ```

2. **Install Dependencies:**

    Navigate to the project directory and install PHP dependencies using Composer:

    ```bash
    cd project-directory
    composer install
    ```

3. **Create Environment File:**

    Create a copy of the `.env.example` file and name it `.env`:

    ```bash
    cp .env.example .env
    ```

4. **Generate Application Key:**

    Generate an application key using the Laravel CLI:

    ```bash
    php artisan key:generate
    ```

5. **Configure Database:**

    Update the `.env` file with your database credentials.

    SQLite Database file also here you can use it 

6. **Run Migrations:**

    Run migrations to create the necessary tables in the database:

    ```bash
    php artisan migrate
    ```
7. **Install Laravel Passport:**

   publish its configuration files and run its migrations:

    ```bash
    php artisan passport:install
    ```

8. **Start the Development Server:**

    You can now start the development server using the following command:

    ```bash
    php artisan serve
    ```

    This will start the server on `http://localhost:8000` by default.

9. **Testing the Application:**

    Open your web browser and navigate to `http://localhost:8000` to access your Laravel project.

    Postman Collection Also included the Repository. Before Use that You have to make Environment then add variables {{URL}} = `http://localhost:8000` and empty value {{Token}}. Once you logged or register token will be assigned for particular user.  


