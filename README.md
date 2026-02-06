# Internal-Credit-Stationery-Store
Concevoir et développer une application web monolithique, en adoptant l’architecture MVC du framework Laravel.

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/mohammed-bn/Internal-Credit-Stationery-Store.git
   ```
2. Navigate to the project directory:
   ```bash
   cd Internal-Credit-Stationery-Store
   ```
3. Install PHP dependencies:
   ```bash
   composer install
   ```
4. Install NPM packages:
   ```bash
   npm install
   ```
5. Create a copy of the `.env` file from the example provided:
   ```bash
   cp .env.example .env
   ```
6. Generate an app encryption key:
   ```bash
   php artisan key:generate
   ```
7. Modify the `.env` file with your database details and set up your database.

8. Run the database migrations:
   ```bash
   php artisan migrate
   ```
9. Start the development server:
   ```bash
   php artisan serve
   ```
10. Access the application via `http://localhost:8000`.