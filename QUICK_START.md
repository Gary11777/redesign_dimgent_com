# Quick Start Guide

## 🚀 Get Started in 5 Minutes

### 1. Install Dependencies

```bash
composer install
```

### 2. Configure Environment

```bash
# Copy example environment file
copy .env.example .env

# Edit .env with your settings
notepad .env
```

**Required Configuration:**
- SMTP credentials for sending emails
- Google reCAPTCHA v3 keys
- Contact email recipient

### 3. Start Local Server

#### Using PHP Built-in Server

```bash
cd public
php -S localhost:8000
```

Then open: `http://localhost:8000`

#### Using XAMPP/WAMP

1. Point document root to `public` folder
2. Access: `http://localhost/redesign_dimgent_com/public`

### 4. Test the Website

Visit these pages:
- **Home**: http://localhost:8000/
- **About**: http://localhost:8000/about.php
- **Products**: http://localhost:8000/products.php
- **Services**: http://localhost:8000/services.php
- **Projects**: http://localhost:8000/projects.php
- **Contacts**: http://localhost:8000/contacts.php

### 5. Configure SMTP (Gmail Example)

In your `.env` file:

```env
SMTP_HOST=smtp.gmail.com
SMTP_PORT=587
SMTP_USERNAME=your-email@gmail.com
SMTP_PASSWORD=your-16-digit-app-password
SMTP_ENCRYPTION=tls
```

**To get Gmail App Password:**
1. Go to Google Account Settings
2. Enable 2-Factor Authentication
3. Generate App Password: https://myaccount.google.com/security
4. Use the 16-digit password in `.env`

### 6. Setup reCAPTCHA v3

1. Visit: https://www.google.com/recaptcha/admin
2. Register a new site with reCAPTCHA v3
3. Add your domains (e.g., localhost, dimgent.com)
4. Copy Site Key and Secret Key to `.env`:

```env
RECAPTCHA_SITE_KEY=your-site-key
RECAPTCHA_SECRET_KEY=your-secret-key
```

## 📝 Testing Contact Form

1. Open: http://localhost:8000/contacts.php
2. Fill in all required fields (marked with *)
3. Submit the form
4. Check your configured email for the message

## 🎨 Customization

### Change Colors

Edit view files in `views/` and replace Tailwind color classes:
- `blue-600` → `green-600` (your color)
- `blue-800` → `green-800`

### Update Content

Edit configuration in `config/app.php`:
- Company name
- Email address
- Navigation menu
- Languages

### Add New Pages

1. Create controller in `controllers/`
2. Create view in `views/`
3. Create entry point in `public/`
4. Add to menu in `config/app.php`

## 🔍 Troubleshooting

### Images Not Showing
- Verify assets copied: `public/assets/images/`
- Check console for 404 errors

### Email Not Sending
- Verify SMTP credentials in `.env`
- Check firewall isn't blocking port 587
- Test with: `php test-email.php` (create this file per README)

### Pages Return 404
- Ensure you're in the `public` folder
- Check `.htaccess` is present
- Verify web server reads `.htaccess` files

### reCAPTCHA Not Working
- Verify keys in `.env` match Google Console
- Check domain is registered in reCAPTCHA settings
- Enable browser JavaScript

## 📚 Next Steps

1. Read full [README.md](README.md) for detailed documentation
2. Configure production deployment settings
3. Set up SSL certificate for HTTPS
4. Test all forms and functionality
5. Optimize images for production

## 💡 Tips

- Use browser DevTools to debug JavaScript issues
- Check PHP error logs: `tail -f /var/log/php-errors.log`
- Test responsive design on mobile devices
- Validate HTML: https://validator.w3.org/
- Test page speed: https://pagespeed.web.dev/

## 🆘 Need Help?

- Check [README.md](README.md) for detailed instructions
- Review configuration files in `config/`
- Contact: info@dimgent.com

---

**Happy Coding! 🎉**
