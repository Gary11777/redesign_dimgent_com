# Dimgent Technologies Website

Modern redesign of Dimgent Technologies website using PHP 8.4, Plates template engine, Tailwind CSS, and Alpine.js.

## Features

- **Modern MVC Architecture**: Clean separation of concerns with PHP OOP
- **Plates Template Engine**: Native PHP templates with inheritance
- **JSON Configuration**: Centralized configuration management
- **Tailwind CSS**: Modern, responsive design (module-based)
- **Alpine.js**: Light interactivity (module-based)
- **Secure Contact Form**: Comprehensive security features

## Security Features (Contact Form)

✅ **CSRF Protection** - Prevents cross-site request forgery  
✅ **Rate Limiting** - Max 3 submissions per hour per IP  
✅ **Email Injection Prevention** - Sanitizes headers  
✅ **XSS Prevention** - Escapes all output  
✅ **Input Validation** - Server-side validation  
✅ **Honeypot Field** - Catches bots  
✅ **Length Limits** - Prevents buffer overflows  
✅ **Character Validation** - Regex patterns  
✅ **PRG Pattern** - Post/Redirect/Get  
✅ **PHPMailer** - Safe email sending  
✅ **reCAPTCHA v3** - Bot protection

## Requirements

- PHP 8.4 or higher
- Web server (Apache with mod_rewrite or Nginx)
- Composer
- Node.js and npm (for building assets)
- SMTP account for email sending
- Google reCAPTCHA v3 credentials

## Installation

1. **Install PHP dependencies**
   ```bash
   composer install
   ```

2. **Install Node.js dependencies**
   ```bash
   npm install
   ```

3. **Build frontend assets**
   ```bash
   npm run build
   ```

   For development with watch mode:
   ```bash
   npm run dev
   ```

4. **Configure the application**

   Edit `config/config.json`:
   ```json
   {
     "site": {
       "name": "Dimgent Technologies",
       "email": "your-email@example.com",
       ...
     }
   }
   ```

   Create `config/mail.json`:
   ```json
   {
     "host": "smtp.example.com",
     "port": 587,
     "username": "your-smtp-username",
     "password": "your-smtp-password",
     "encryption": "tls",
     "from_email": "info@dimgent.com",
     "from_name": "Dimgent Technologies"
   }
   ```

   Create `config/recaptcha.json`:
   ```json
   {
     "site_key": "YOUR_RECAPTCHA_SITE_KEY",
     "secret_key": "YOUR_RECAPTCHA_SECRET_KEY"
   }
   ```

5. **Set up reCAPTCHA v3**
   - Go to https://www.google.com/recaptcha/admin
   - Create a new site with reCAPTCHA v3
   - Copy the Site Key and Secret Key
   - Add them to `config/recaptcha.json`

6. **Set permissions**
   ```bash
   chmod 755 cache/
   chmod 755 cache/sessions/
   chmod 755 cache/rate_limit/
   chmod 644 config/*.json
   ```

7. **Set up web server**

   **Apache:**
   - Ensure mod_rewrite is enabled
   - The `.htaccess` file is included

   **Nginx:**
   ```nginx
   location / {
       try_files $uri $uri/ /index.php?$query_string;
   }
   ```

## Project Structure

```
/
├── config/
│   ├── config.json          # Main configuration
│   ├── mail.json            # SMTP settings
│   └── recaptcha.json       # reCAPTCHA keys
├── core/
│   ├── BaseController.php   # Base controller class
│   ├── Config.php           # Configuration manager
│   ├── Security.php         # Security helpers
│   ├── RateLimiter.php      # Rate limiting
│   ├── Router.php           # URL router
│   ├── Mailer.php           # Email handler
│   └── Recaptcha.php        # reCAPTCHA validator
├── controllers/
│   ├── HomeController.php
│   ├── ProductsController.php
│   ├── ServicesController.php
│   ├── ProjectsController.php
│   ├── ContactsController.php
│   ├── AboutController.php
│   └── ErrorController.php
├── views/
│   ├── layout.php           # Main layout template
│   ├── pages/
│   │   ├── home.php
│   │   ├── products.php
│   │   ├── services.php
│   │   ├── projects.php
│   │   ├── contacts.php
│   │   └── about.php
│   └── errors/
│       └── 404.php
├── drafts/
│   ├── content/             # Page content files
│   └── pics/                # Images
├── cache/
│   ├── sessions/            # Session files
│   └── rate_limit/          # Rate limit cache
├── public/
│   └── assets/
│       ├── css/
│       │   └── output.css   # Compiled Tailwind CSS
│       └── js/
│           └── app.js       # Compiled Alpine.js
├── src/
│   ├── input.css            # Tailwind source
│   └── app.js               # Alpine.js source
├── vendor/                  # Composer dependencies
├── node_modules/            # npm dependencies
├── .htaccess               # Apache rewrite rules
├── composer.json           # PHP dependencies
├── package.json            # Node.js dependencies
├── tailwind.config.js      # Tailwind configuration
├── index.php              # Entry point
└── README.md              # This file
```

## Development

### Building Assets

```bash
# Build CSS and JS
npm run build

# Watch mode for development
npm run dev
```

### Local Development Server

```bash
php -S localhost:8000
```

## Security Notes

- All user input is sanitized and validated
- CSRF tokens are required for form submissions
- Rate limiting prevents abuse (3 attempts per hour per IP)
- Email headers are sanitized to prevent injection
- All output is escaped to prevent XSS
- reCAPTCHA v3 provides bot protection
- Honeypot field catches automated bots
- PRG pattern prevents duplicate form submissions

## Browser Support

- Modern browsers (Chrome, Firefox, Safari, Edge)
- Mobile responsive design
- Progressive enhancement

## License

This project is proprietary software for Dimgent Technologies.

## Support

For issues or questions, contact the development team.

