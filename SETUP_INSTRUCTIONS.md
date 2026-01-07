# Setup Instructions for Pixature CRM/LMS

## Step 1: Install Laravel Project

Since we've created the basic structure, you need to complete the Laravel installation:

```bash
composer create-project laravel/laravel temp_laravel
```

Then copy the essential Laravel files from `temp_laravel` to this directory:
- `bootstrap/` directory
- `config/` directory  
- `public/` directory
- `storage/` directory
- `tests/` directory
- `artisan` file
- `phpunit.xml` file

**OR** if you prefer, you can run:

```bash
composer install
```

This will install all Laravel dependencies.

## Step 2: Install Node Dependencies

```bash
npm install
```

## Step 3: Environment Setup

1. Copy `.env.example` to `.env`:
```bash
cp .env.example .env
```

2. Generate application key:
```bash
php artisan key:generate
```

3. Configure your database in `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pixature_crm
DB_USERNAME=root
DB_PASSWORD=your_password
```

4. Configure email settings in `.env`:
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email@gmail.com
MAIL_FROM_NAME="Pixature"
```

## Step 4: Run Migrations

```bash
php artisan migrate
```

## Step 5: Build Frontend Assets

```bash
npm run dev
```

Or for production:
```bash
npm run build
```

## Step 6: Start Development Servers

You need to run **both** servers:

**Terminal 1 - Laravel:**
```bash
php artisan serve
```

**Terminal 2 - Vite (Frontend):**
```bash
npm run dev
```

Then visit: `http://localhost:8000`

## What's Been Created

✅ Landing page with all sections matching your design
✅ Enrollment form with validation
✅ Database migrations (students, programs, enrollments, classes, progress_reports)
✅ Email notification system
✅ Models and Controllers
✅ Tailwind CSS configuration

## Next Steps (Future Development)

- Student authentication and login
- Student dashboard to view classes
- Progress reports
- Admin panel for managing students and programs
- Class scheduling system
- WhatsApp integration (optional)

