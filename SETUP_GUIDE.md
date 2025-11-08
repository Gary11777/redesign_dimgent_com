# Complete Setup Guide - Dimgent Technologies Website

This guide will walk you through setting up the website from scratch.

## Prerequisites

### Required Software
- **PHP** 8.4 or higher
- **Composer** (https://getcomposer.org/)
- **Node.js** 20.11.0 or higher
- **NPM** (comes with Node.js)
- **Git** (for version control)

### Check Versions
```bash
php --version        # Should be 8.4+
composer --version   # Any recent version
node --version       # Should be v20+
npm --version        # Should be 10+
```

## Step-by-Step Installation

### Step 1: Clone Repository
```bash
git clone https://github.com/Gary11777/redesign_dimgent_com.git
cd redesign_dimgent_com
```

### Step 2: Install Backend Dependencies
```bash
composer install
```

This installs:
- `league/plates` - Template engine
- `phpmailer/phpmailer` - Email sending
- `google/recaptcha` - Bot protection

### Step 3: Install Frontend Dependencies
```bash
npm install
```

This installs:
- Tailwind CSS v4
- Alpine.js v3
- esbuild (JS bundler)
- PostCSS & Autoprefixer

### Step 4: Build Assets
```bash
npm run build
```

This compiles:
- `src/input.css` → `public/assets/css/output.css` (15KB)
- `src/app.js` → `public/assets/js/app.js` (44KB)

### Step 5: Configure Application

#### A. Main Configuration (`config/app.json`)
Already configured, but you can customize:
```json
{
  "site": {
    "name": "Dimgent Technologies",
    "email": "info@dimgent.com",
    "location": "Minsk, Belarus"
  }
}
```

#### B. Email Configuration (`config/mail.json`)

**For Gmail:**
1. Enable 2-Factor Authentication on your Google account
2. Go to: https://myaccount.google.com/apppasswords
3. Create app password for "Mail"
4. Update config:

```json
{
  "smtp_enabled": true,
  "smtp_host": "smtp.gmail.com",
  "smtp_port": 587,
  "smtp_username": "your-email@gmail.com",
  "smtp_password": "your-16-char-app-password",
  "from_email": "noreply@dimgent.com",
  "from_name": "Dimgent Technologies Contact Form"
}
```

**For Other SMTP Providers:**
```json
{
  "smtp_enabled": true,
  "smtp_host": "mail.your-domain.com",
  "smtp_port": 587,
  "smtp_username": "noreply@your-domain.com",
  "smtp_password": "your-password",
  "from_email": "noreply@dimgent.com",
  "from_name": "Dimgent Technologies"
}
```

**For Local Testing (no SMTP):**
```json
{
  "smtp_enabled": false
}
```

#### C. reCAPTCHA Configuration (`config/recaptcha.json`)

1. Go to: https://www.google.com/recaptcha/admin/create
2. Choose **reCAPTCHA v3**
3. Add your domains:
   - `localhost` (for development)
   - `your-production-domain.com`
4. Copy the keys:

```json
{
  "site_key": "6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI",
  "secret_key": "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe",
  "enabled": true,
  "score_threshold": 0.5
}
```

**Testing Keys** (for development):
- Site key: `6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI`
- Secret key: `6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe`

These always return success. Replace with real keys for production!

### Step 6: Set Permissions

**Linux/Mac:**
```bash
chmod -R 755 cache/
chmod -R 755 public/assets/
```

**Windows:**
- Ensure IIS/Apache user has write access to `cache/` folder

### Step 7: Start Development Server

**Option A: PHP Built-in Server (Recommended for Development)**
```bash
cd public
php -S localhost:8000
```

**Option B: Watch Mode (Auto-rebuild CSS/JS)**

Open two terminals:

Terminal 1:
```bash
cd public
php -S localhost:8000
```

Terminal 2:
```bash
npm run dev
```

### Step 8: Test the Website

Open your browser and visit:
- **Home**: http://localhost:8000/
- **Products**: http://localhost:8000/products
- **Services**: http://localhost:8000/services
- **Projects**: http://localhost:8000/projects
- **Contacts**: http://localhost:8000/contacts
- **About**: http://localhost:8000/about

## Testing Contact Form

### Test Validation
1. Go to http://localhost:8000/contacts
2. Try submitting empty form → Should show errors
3. Enter invalid email → Should show error
4. Enter message < 10 chars → Should show error

### Test Rate Limiting
1. Submit form 3 times in quick succession
2. 4th attempt should be blocked
3. Wait 1 hour or clear session to reset

### Test Honeypot (Bot Detection)
The form has a hidden `website` field. Bots that fill it will be silently rejected.

### Test Email Sending
1. Configure `config/mail.json` with valid SMTP
2. Submit form with valid data
3. Check recipient email inbox
4. Check PHP error logs if issues: `tail -f /var/log/php_errors.log`

## Production Deployment

### Step 1: Build for Production
```bash
npm run build
```

This creates minified, production-ready assets.

### Step 2: Upload Files

Upload to your web server:
```
/var/www/html/dimgent.com/
├── app/
├── config/
├── public/
├── vendor/
├── cache/
├── composer.json
└── composer.lock
```

**Don't upload:**
- `node_modules/`
- `src/` (CSS/JS source files)
- `.git/`
- `drafts/`

### Step 3: Apache Configuration

**Enable `.htaccess`:**
```apache
<Directory /var/www/html/dimgent.com/public>
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>
```

**Virtual Host:**
```apache
<VirtualHost *:80>
    ServerName dimgent.com
    ServerAlias www.dimgent.com
    DocumentRoot /var/www/html/dimgent.com/public

    <Directory /var/www/html/dimgent.com/public>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/dimgent_error.log
    CustomLog ${APACHE_LOG_DIR}/dimgent_access.log combined
</VirtualHost>
```

### Step 4: Nginx Configuration

```nginx
server {
    listen 80;
    server_name dimgent.com www.dimgent.com;
    root /var/www/html/dimgent.com/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.4-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

### Step 5: SSL Certificate (HTTPS)

**Using Let's Encrypt:**
```bash
sudo apt install certbot python3-certbot-apache
sudo certbot --apache -d dimgent.com -d www.dimgent.com
```

**Using Certbot for Nginx:**
```bash
sudo apt install certbot python3-certbot-nginx
sudo certbot --nginx -d dimgent.com -d www.dimgent.com
```

### Step 6: PHP Production Settings

Edit `/etc/php/8.4/apache2/php.ini` or `/etc/php/8.4/fpm/php.ini`:

```ini
# Security
display_errors = Off
display_startup_errors = Off
log_errors = On
error_reporting = E_ALL & ~E_DEPRECATED & ~E_STRICT

# Session Security
session.cookie_httponly = 1
session.cookie_secure = 1
session.cookie_samesite = Strict
session.use_strict_mode = 1

# Performance
opcache.enable = 1
opcache.memory_consumption = 128
opcache.interned_strings_buffer = 8
opcache.max_accelerated_files = 10000
```

Restart PHP:
```bash
sudo systemctl restart php8.4-fpm
# or
sudo systemctl restart apache2
```

### Step 7: File Permissions

```bash
# Set ownership
sudo chown -R www-data:www-data /var/www/html/dimgent.com

# Set permissions
sudo find /var/www/html/dimgent.com -type d -exec chmod 755 {} \;
sudo find /var/www/html/dimgent.com -type f -exec chmod 644 {} \;

# Writable cache
sudo chmod -R 775 /var/www/html/dimgent.com/cache
```

### Step 8: Test Production

1. Visit https://your-domain.com
2. Test all pages
3. Test contact form
4. Check SSL certificate
5. Monitor error logs

## Troubleshooting

### "Page Not Found" on all pages
**Cause**: `.htaccess` not working or `mod_rewrite` disabled

**Fix for Apache:**
```bash
sudo a2enmod rewrite
sudo systemctl restart apache2
```

### Contact form not sending emails
**Cause**: SMTP misconfiguration

**Debug:**
```bash
# Check PHP error log
tail -f /var/log/apache2/error.log

# Or check PHP-FPM log
tail -f /var/log/php8.4-fpm.log
```

**Solutions:**
1. Verify SMTP credentials
2. Check firewall allows port 587/465
3. Test with `smtp_enabled: false` first
4. Enable error logging in `config/mail.json`

### CSS/JS not loading
**Cause**: Assets not built or wrong paths

**Fix:**
```bash
# Rebuild assets
npm run build

# Check files exist
ls -la public/assets/css/output.css
ls -la public/assets/js/app.js

# Check permissions
chmod 644 public/assets/css/output.css
chmod 644 public/assets/js/app.js
```

### reCAPTCHA not working
**Causes:**
1. Wrong keys
2. Domain not registered
3. reCAPTCHA disabled

**Fix:**
1. Verify keys in Google Admin Console
2. Add domain to reCAPTCHA settings
3. Set `"enabled": true` in `config/recaptcha.json`

### Session errors
**Cause**: Cache directory not writable

**Fix:**
```bash
mkdir -p cache/sessions
chmod 775 cache/sessions
```

## Development Workflow

### Making Changes

**Edit PHP:**
1. Modify files in `app/`
2. Refresh browser
3. No rebuild needed

**Edit Views (Plates):**
1. Modify templates in `app/Views/`
2. Refresh browser
3. No rebuild needed

**Edit CSS (Tailwind):**
1. Modify `src/input.css` or use Tailwind classes in views
2. Run `npm run build:css` or use watch mode (`npm run dev`)
3. Refresh browser

**Edit JS (Alpine.js):**
1. Modify `src/app.js`
2. Run `npm run build:js` or use watch mode (`npm run dev`)
3. Refresh browser

### Git Workflow

```bash
# Pull latest changes
git pull origin main

# Install dependencies if updated
composer install
npm install

# Rebuild assets
npm run build

# Make your changes
# ...

# Commit
git add .
git commit -m "Your commit message"
git push origin main
```

## Maintenance

### Update Dependencies

**PHP packages:**
```bash
composer update
```

**Node packages:**
```bash
npm update
npm run build
```

### Backup

**Important files to backup:**
- `config/` - Configuration
- `public/assets/images/` - Uploaded images
- `cache/sessions/` - Active sessions (optional)
- Database (if you add one later)

### Monitoring

**Check logs regularly:**
```bash
# Apache
tail -f /var/log/apache2/error.log

# Nginx
tail -f /var/log/nginx/error.log

# PHP-FPM
tail -f /var/log/php8.4-fpm.log
```

## Next Steps

1. ✅ Website is running
2. 📧 Configure email properly
3. 🔒 Set up SSL certificate
4. 📊 Add analytics (Google Analytics, etc.)
5. 🔍 Submit to search engines
6. 📱 Test on mobile devices
7. 🚀 Deploy to production

---

**Need Help?** Check the main README.md or contact support.
