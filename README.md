# Dimgent Technologies Website

Modern redesign of Dimgent Technologies website built with PHP 8.4, the Plates template engine, Tailwind CSS, and Alpine.js.

## Features

- **MVC architecture** with clean separation of concerns
- **JSON configuration** system for easy environment changes
- **Plates templates** for reusable layouts and components
- **Tailwind CSS** (module build) for modern, responsive styling
- **Alpine.js** (module build) for lightweight interactivity
- **Secure contact form** with CSRF, rate limiting, honeypot, validation, PHPMailer, and reCAPTCHA v3

## Requirements

- PHP 8.4 or higher with `mbstring` and `json`
- Composer
- Node.js (for Tailwind CSS & Alpine.js builds)
- SMTP credentials (PHPMailer)
- Google reCAPTCHA v3 keys

## Installation

1. **Install PHP dependencies**
   ```bash
   composer install
   ```

2. **Install Node dependencies**
   ```bash
   npm install
   ```

3. **Build assets**
   ```bash
   npm run build
   ```

   For development with file watching:
   ```bash
   npm run dev
   ```

4. **Configuration**

   Update `config/config.json` as needed. Create supporting configuration files:

   `config/mail.json`
   ```json
   {
     "host": "smtp.example.com",
     "port": 587,
     "username": "your-username",
     "password": "your-password",
     "encryption": "tls",
     "from_email": "info@dimgent.com",
     "from_name": "Dimgent Technologies"
   }
   ```

   `config/recaptcha.json`
   ```json
   {
     "site_key": "YOUR_RECAPTCHA_SITE_KEY",
     "secret_key": "YOUR_RECAPTCHA_SECRET_KEY"
   }
   ```

5. **Run locally**

   Start the PHP built-in server with the bundled router:
   ```bash
   php -S localhost:8000 router.php
   ```

   Open http://localhost:8000 in your browser.

## Project Structure

```
.
├── config/
│   ├── config.json
│   ├── mail.json
│   └── recaptcha.json
├── core/
│   ├── BaseController.php
│   ├── Config.php
│   ├── Mailer.php
│   ├── RateLimiter.php
│   ├── Recaptcha.php
│   ├── Router.php
│   └── Security.php
├── controllers/
│   ├── AboutController.php
│   ├── ContactsController.php
│   ├── ErrorController.php
│   ├── HomeController.php
│   ├── ProductsController.php
│   ├── ProjectsController.php
│   └── ServicesController.php
├── drafts/
│   ├── content/
│   └── pics/
├── public/
│   └── assets/
│       ├── css/output.css
│       └── js/app.js
├── views/
│   ├── layout.php
│   ├── errors/404.php
│   └── pages/
│       ├── about.php
│       ├── contacts.php
│       ├── home.php
│       ├── products.php
│       ├── projects.php
│       └── services.php
├── router.php
├── index.php
└── README.md
```

## Security Checklist (Contact Form)

- CSRF protection
- Rate limiting (3 submissions/hour/IP)
- Honeypot field
- Server-side input validation & length limits
- Regex-based character validation
- Email header injection prevention
- XSS prevention via escaping
- Post/Redirect/Get pattern
- PHPMailer SMTP email delivery
- Google reCAPTCHA v3 verification

## Development Workflow

- Use `npm run dev` to watch Tailwind & Alpine sources (`src/input.css`, `src/app.js`)
- Rebuild assets with `npm run build`
- Start PHP server: `php -S localhost:8000 router.php`

## Deployment Notes

- Configure the web server to serve `/public/assets` and `/drafts/pics`
- Ensure writable permissions for `cache/`
- Update configuration files for production credentials
- Disable display of PHP errors in production (`display_errors=0`)

## License

This project is proprietary software for Dimgent Technologies.
