# Bakuna Tracker

Bakuna Tracker is a Laravel application for reviewing patient vaccination records. Signed-in users can view a dashboard with record totals and upcoming vaccinations, and browse the full schedule.

## Features

- Email and password sign-in and sign-out
- Dashboard counts for total, scheduled, completed, and overdue records
- Vaccination schedule with patient, area, vaccine, dose, date, and status
- SQLite database and sample vaccination records

## Requirements

- PHP 8.3 or later
- Composer
- Node.js and npm

## Setup

From the project directory, run:

```bash
composer run setup
php artisan db:seed
```

The setup script installs dependencies, creates the local environment file if needed, generates an application key, runs migrations, and builds the frontend assets. The seeder adds the sample user and vaccination records.

Start the application:

```bash
php artisan serve
```

Open the URL shown by Artisan (typically `http://127.0.0.1:8000`) and sign in with the account configured by `DatabaseSeeder`.

For frontend development with Vite's hot module replacement, run this in a separate terminal:

```bash
npm run dev
```

## Tests

Run the test suite with:

```bash
composer test
```

## Tech stack

- Laravel 13
- PHP 8.3+
- SQLite
- Blade, Tailwind CSS, and Vite
