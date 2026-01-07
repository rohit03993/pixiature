# Pixature Landing Page

A modern, animated landing page built with Laravel, Tailwind CSS, and Vite.

## Features

- ✅ Modern landing page with smooth scroll animations
- ✅ Parallax effects on hero section
- ✅ Responsive design
- ✅ Production-ready build system
- ✅ All images and assets included

## Quick Setup

### 1. Clone the Repository

```bash
git clone https://github.com/rohit03993/pixiature.git
cd pixiature
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install
```

### 3. Environment Setup

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Build Assets

```bash
# Build assets for production
npm run build
```

### 5. Run the Application

```bash
# Start Laravel server
php artisan serve
```

Visit `http://localhost:8000` to see the landing page.

## Server Deployment

### Steps for Server Deployment:

1. **Pull the code:**
   ```bash
   git pull origin main
   ```

2. **Install dependencies (if not already installed):**
   ```bash
   composer install --no-dev --optimize-autoloader
   npm install
   ```

3. **Build assets:**
   ```bash
   npm run build
   ```

4. **Set up environment:**
   - Copy `.env.example` to `.env`
   - Configure your database and other settings in `.env`
   - Run `php artisan key:generate`

5. **Set permissions:**
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

6. **Clear and cache:**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

7. **Ensure images are in place:**
   - All images should be in `public/images/` directory
   - They are already included in the repository

## Important Notes

- **Images Location:** All images are in `public/images/` directory
- **Build Required:** Always run `npm run build` after pulling changes
- **No Dev Server Needed:** After building, only `php artisan serve` is needed
- **PSD File:** The original PSD file is in `design/` directory (large file, optional)

## File Structure

```
├── public/
│   └── images/          # All website images
├── resources/
│   ├── views/
│   │   └── landing.blade.php  # Main landing page
│   ├── css/
│   │   └── landing.css  # Landing page styles
│   ├── js/
│   │   └── landing.js   # Landing page animations
│   └── static-import/   # Original HTML/CSS files
├── routes/
│   └── web.php          # Routes (landing page at /)
└── vite.config.js       # Vite configuration
```

## Technologies Used

- Laravel 10+
- Tailwind CSS
- Vite
- Vanilla JavaScript (for animations)

## License

Proprietary - All rights reserved
