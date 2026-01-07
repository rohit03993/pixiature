# Setup Steps - Run These Commands in Order

## Step 1: Install Composer Dependencies
```bash
composer install
```

## Step 2: Install Node Dependencies
```bash
npm install
```

## Step 3: Create Environment File
```bash
copy .env.example .env
```
(Or manually copy `.env.example` to `.env`)

## Step 4: Generate Application Key
```bash
php artisan key:generate
```

## Step 5: Configure Database in .env
Edit `.env` file and set:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pixature_crm
DB_USERNAME=root
DB_PASSWORD=your_password
```

## Step 6: Configure Email in .env (Optional for now)
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

## Step 7: Create Storage Directories
```bash
mkdir storage\framework\cache
mkdir storage\framework\sessions
mkdir storage\framework\views
mkdir storage\logs
```

## Step 8: Run Migrations
```bash
php artisan migrate
```

## Step 9: Start Development Servers

**Terminal 1 - Laravel Server:**
```bash
php artisan serve
```

**Terminal 2 - Vite (Frontend Assets):**
```bash
npm run dev
```

## Step 10: Visit Your Site
Open browser: `http://localhost:8000`

