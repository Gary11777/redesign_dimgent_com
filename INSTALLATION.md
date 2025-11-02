# Quick Installation Guide

## 1. Install PHPMailer

### Using Composer (Recommended)
```bash
cd includes
composer require phpmailer/phpmailer
```

### Manual Installation
1. Download from https://github.com/PHPMailer/PHPMailer/releases
2. Extract and copy the `src` folder to `includes/PHPMailer/`
3. Verify these files exist:
   - `includes/PHPMailer/PHPMailer.php`
   - `includes/PHPMailer/SMTP.php`
   - `includes/PHPMailer/Exception.php`

## 2. Configure SMTP

Edit `config/mail_config.php`:

```php
return [
    'smtp_host' => 'smtp.gmail.com',  // Your SMTP server
    'smtp_username' => 'your-email@gmail.com',
    'smtp_password' => 'your-app-password',
    'smtp_port' => 587,
    'smtp_secure' => 'tls',
    'recipient_email' => 'contact@dimgent.com',
    // ... rest of config
];
```

### Gmail Setup (Example)
1. Enable 2-factor authentication
2. Generate App Password: https://myaccount.google.com/apppasswords
3. Use the generated password in `smtp_password`

## 3. Configure reCAPTCHA

1. Get keys from https://www.google.com/recaptcha/admin
2. Choose reCAPTCHA v3
3. Update `config/app_config.php`:

```php
'recaptcha' => [
    'site_key' => 'YOUR_SITE_KEY_HERE',
    'secret_key' => 'YOUR_SECRET_KEY_HERE',
],
```

## 4. Start Development Server

```bash
cd public
php -S localhost:8000
```

Visit http://localhost:8000

## 5. Test Contact Form

1. Fill out the contact form
2. Check your recipient email
3. If not working, check:
   - SMTP credentials
   - PHP error logs
   - reCAPTCHA keys

## Common SMTP Providers

### Gmail
- Host: `smtp.gmail.com`
- Port: `587` (TLS) or `465` (SSL)
- Requires App Password

### Outlook/Office 365
- Host: `smtp.office365.com`
- Port: `587`

### Yahoo
- Host: `smtp.mail.yahoo.com`
- Port: `587`

### Custom Domain
Ask your hosting provider for SMTP details.

## Troubleshooting

### "Could not authenticate"
- Check username and password
- Verify 2FA is enabled (Gmail)
- Use App Password instead of regular password

### "Connection timeout"
- Check port number
- Verify firewall isn't blocking
- Try different SMTP secure setting (tls/ssl)

### reCAPTCHA failing
- Verify both site key and secret key
- Check domain is whitelisted in reCAPTCHA admin
- Ensure JavaScript is enabled

## Production Deployment

1. Upload files to web server
2. Point document root to `public/` folder
3. Set file permissions:
   ```bash
   find . -type f -exec chmod 644 {} \;
   find . -type d -exec chmod 755 {} \;
   chmod 600 config/mail_config.php
   ```
4. Test all functionality
5. Enable HTTPS
6. Update `.htaccess` to force HTTPS

Done! Your Dimgent Technologies website is ready.
