# Pixature CRM & LMS

A comprehensive Customer Relationship Management and Learning Management System for design courses.

## Features

- **Landing Page**: Beautiful, responsive landing page with enrollment form
- **Student Enrollment**: Capture student details and send automatic email confirmations
- **Student Dashboard**: View classes, progress reports, and course materials
- **Admin Panel**: Manage students, programs, and classes

## Installation

1. Install PHP dependencies:
```bash
composer install
```

2. Install Node dependencies:
```bash
npm install
```

3. Copy environment file:
```bash
cp .env.example .env
```

4. Generate application key:
```bash
php artisan key:generate
```

5. Configure your database in `.env` file

6. Run migrations:
```bash
php artisan migrate
```

7. Build assets:
```bash
npm run dev
```

8. Start the development server:
```bash
php artisan serve
```

## Development

- Frontend: Run `npm run dev` for Vite development server
- Backend: Run `php artisan serve` for Laravel development server

## Tech Stack

- Laravel 10
- Tailwind CSS
- Vite
- MySQL/PostgreSQL

