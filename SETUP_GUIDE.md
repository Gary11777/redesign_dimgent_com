# Quick Setup Guide

## Step 1: Install Composer Dependencies

```bash
composer install
```

## Step 2: Configure SMTP (Email)

Open `config/app.php` and update:

```php
'mail' => [
    'smtp_host' => 'smtp.gmail.com',
    'smtp_port' => 587,
    'smtp_username' => 'your-email@gmail.com',
    'smtp_password' => 'your-app-password',  // Use Gmail App Password
    'smtp_encryption' => 'tls',
    'from_email' => 'noreply@dimgent.com',
    'to_email' => 'info@dimgent.com',
],
```

### Gmail App Password Setup:
1. Go to https://myaccount.google.com/apppasswords
2. Create a new App Password
3. Use it as your `smtp_password`

## Step 3: Configure reCAPTCHA (Optional but Recommended)

1. Visit: https://www.google.com/recaptcha/admin
2. Register your site with reCAPTCHA v3
3. Add keys to `config/app.php`:

```php
'recaptcha' => [
    'site_key' => 'your-public-site-key',
    'secret_key' => 'your-secret-key',
    'min_score' => 0.5,
],
```

## Step 4: Test Locally

```bash
cd public
php -S localhost:8000
```

Visit: http://localhost:8000

## Step 5: Production Deployment

1. Set environment to production in `config/app.php`:
```php
'env' => 'production',
'debug' => false,
```

2. Update site URL:
```php
'url' => 'https://yourdomain.com',
```

3. Point your web server document root to `public/` directory

4. Enable HTTPS redirect in `public/.htaccess` (uncomment lines)

## Testing Contact Form

1. Fill out the form at `/contacts`
2. Check the email inbox specified in config
3. Verify spam protection is working

## Troubleshooting

### Email not sending?
- Check SMTP credentials
- Verify firewall isn't blocking port 587
- Check PHP error logs

### 404 on all pages?
- Enable `mod_rewrite` on Apache
- Check `.htaccess` is in `public/`
- Verify document root points to `public/`

### Images not loading?
- Check `public/assets/images/` exists
- Verify file permissions (755 for directories, 644 for files)

## Need Help?

Read the full README.md for detailed instructions.
