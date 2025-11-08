# Dimgent Technologies Website

Modern, secure website for Dimgent Technologies - Electronics Development company based in Minsk, Belarus.

## 🚀 Features

### Backend (PHP 8.4)
- ✅ **MVC Architecture** - Clean separation of concerns
- ✅ **Object-Oriented Programming** - Modern PHP practices
- ✅ **Plates Template Engine** - Native PHP templating with layouts
- ✅ **JSON Configuration** - Flexible configuration system
- ✅ **Secure Contact Form** with 10 security features
- ✅ **Clean URLs** - SEO-friendly routing with `.htaccess`

### Frontend
- ✅ **Tailwind CSS v4** - Utility-first CSS (bundled, 15KB)
- ✅ **Alpine.js v3** - Lightweight reactive framework (bundled, 44KB)
- ✅ **Responsive Design** - Mobile-first approach
- ✅ **Modern UI/UX** - Clean, professional design

### Security Features (Contact Form)
1. **CSRF Protection** - Prevents cross-site request forgery attacks
2. **Rate Limiting** - Max 3 submissions per hour per IP
3. **Email Injection Prevention** - Sanitizes all email headers
4. **XSS Prevention** - Automatic output escaping
5. **Server-Side Validation** - Never trust client input
6. **Honeypot Field** - Silent bot detection
7. **Length Limits** - Prevents buffer overflows
8. **Character Validation** - Regex pattern matching
9. **PRG Pattern** - Post/Redirect/Get prevents resubmission
10. **reCAPTCHA v3** - Google bot protection

## 📁 Project Structure

```
redesign_dimgent_com/
├── app/
│   ├── Core/
│   │   ├── Controller.php      # Base controller with Plates
│   │   └── Router.php           # Request routing & dispatching
│   ├── Controllers/
│   │   ├── HomeController.php
│   │   ├── ProductsController.php
│   │   ├── ServicesController.php
│   │   ├── ProjectsController.php
│   │   ├── ContactsController.php
│   │   └── AboutController.php
│   ├── Services/
│   │   └── ContactFormHandler.php  # Secure form processing
│   └── Views/
│       ├── layouts/
│       │   └── base.php         # Main layout template
│       ├── partials/
│       │   ├── header.php       # Navigation header
│       │   └── footer.php       # Footer with links
│       ├── components/
│       │   └── feature-card.php # Reusable components
│       ├── home.php
│       ├── products.php
│       ├── services.php
│       ├── projects.php
│       ├── contacts.php
│       └── about.php
├── config/
│   ├── app.json            # Application configuration
│   ├── mail.json           # Email/SMTP settings
│   └── recaptcha.json      # reCAPTCHA keys
├── public/
│   ├── assets/
│   │   ├── css/
│   │   │   └── output.css  # Compiled Tailwind CSS
│   │   ├── js/
│   │   │   └── app.js      # Bundled Alpine.js
│   │   └── images/
│   ├── index.php           # Application entry point
│   └── .htaccess           # URL rewriting rules
├── src/
│   ├── input.css           # Tailwind CSS source
│   └── app.js              # Alpine.js source
├── cache/
│   ├── views/              # Plates template cache
│   └── sessions/           # PHP session data
├── vendor/                 # Composer dependencies
├── node_modules/           # NPM dependencies
├── composer.json
├── package.json
├── tailwind.config.js
└── postcss.config.js
```

## 🛠️ Technology Stack

### Backend
- **PHP**: 8.4
- **Composer** packages:
  - `league/plates`: ^3.5 (Template engine)
  - `phpmailer/phpmailer`: ^7.0 (Email sending)
  - `google/recaptcha`: ^1.3 (Bot protection)

### Frontend
- **Tailwind CSS**: v4.1.17 (via @tailwindcss/cli)
- **Alpine.js**: v3.15.1 (bundled with esbuild)
- **PostCSS & Autoprefixer**: For CSS processing

### Build Tools
- **Node.js**: v20.11.0
- **esbuild**: v0.25.12 (JS bundler)
- **@tailwindcss/cli**: v4.1.17 (CSS compiler)

## ⚙️ Quick Setup

### Prerequisites
- PHP 8.4+
- Composer
- Node.js 20+
- Web server (Apache/Nginx) or PHP built-in server

### Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd redesign_dimgent_com
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Build assets**
   ```bash
   npm run build
   ```

5. **Configure settings**
   
   Edit `config/mail.json` for email settings:
   ```json
   {
     "smtp_enabled": true,
     "smtp_host": "smtp.gmail.com",
     "smtp_port": 587,
     "smtp_username": "your-email@gmail.com",
     "smtp_password": "your-app-password",
     "from_email": "noreply@dimgent.com",
     "from_name": "Dimgent Technologies"
   }
   ```

   Edit `config/recaptcha.json` for reCAPTCHA:
   ```json
   {
     "site_key": "your-site-key",
     "secret_key": "your-secret-key",
     "enabled": true,
     "score_threshold": 0.5
   }
   ```

6. **Start development server**
   ```bash
   # Terminal 1: Start PHP server
   cd public
   php -S localhost:8000

   # Terminal 2: Watch for changes (optional)
   npm run dev
   ```

7. **Visit website**
   
   Open `http://localhost:8000` in your browser

## 📝 Available Commands

### Development
```bash
npm run dev          # Watch CSS & JS for changes
npm run watch:css    # Watch only CSS
npm run watch:js     # Watch only JS
```

### Production Build
```bash
npm run build        # Build both CSS & JS (minified)
npm run build:css    # Build only CSS
npm run build:js     # Build only JS
```

## 🔒 Security Configuration

### Email Configuration
For Gmail, you need an "App Password":
1. Enable 2FA on your Google account
2. Go to: https://myaccount.google.com/apppasswords
3. Generate app password for "Mail"
4. Use this password in `config/mail.json`

### reCAPTCHA Setup
1. Go to: https://www.google.com/recaptcha/admin
2. Register your site (use reCAPTCHA v3)
3. Copy Site Key and Secret Key
4. Update `config/recaptcha.json`

### Session Security
Sessions are stored in `cache/sessions/` with secure settings:
- HTTP-only cookies
- Same-site strict
- Secure session handling

## 🎨 Customization

### Colors
Edit `src/input.css` to change primary colors:
```css
@theme {
  --color-primary-500: #0ea5e9;  /* Change this */
  --color-primary-600: #0284c7;  /* And this */
  /* etc. */
}
```

Then rebuild:
```bash
npm run build:css
```

### Content
Edit `config/app.json` to update:
- Company information
- Navigation links
- Features list
- Services list

### Templates
Plates templates are in `app/Views/`:
- `layouts/base.php` - Main layout
- `partials/` - Reusable partials
- `components/` - Reusable components
- Individual page views

## 🚀 Deployment

### Production Checklist
- [ ] Run `npm run build` for minified assets
- [ ] Configure `config/mail.json` with production SMTP
- [ ] Set `config/recaptcha.json` with production keys
- [ ] Set appropriate file permissions
- [ ] Enable HTTPS (SSL certificate)
- [ ] Configure web server (Apache/Nginx)
- [ ] Set `session.cookie_secure` to `1` in PHP
- [ ] Disable error display: `display_errors = Off`
- [ ] Enable error logging: `log_errors = On`

### Apache Configuration
Ensure `.htaccess` is enabled and `mod_rewrite` is active.

### Nginx Configuration
```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}

location ~ \.php$ {
    fastcgi_pass unix:/var/run/php/php8.4-fpm.sock;
    fastcgi_index index.php;
    include fastcgi_params;
}
```

## 📧 Contact Form Testing

To test the contact form locally:
1. Use PHP's `sendmail` (works on most systems)
2. Or configure SMTP with a test account
3. Check form validation with invalid inputs
4. Test rate limiting by submitting multiple times

## 📖 Documentation Files

- **README.md** - This file
- **TAILWIND_SETUP.md** - Tailwind CSS v4 guide
- **ALPINEJS_SETUP.md** - Alpine.js setup guide
- **BUILD_SYSTEM_SUMMARY.md** - Build system overview
- **COMPLETE_INSTALLATION.md** - Complete installation guide

## 🐛 Troubleshooting

### CSS not loading?
```bash
npm run build:css
# Check that public/assets/css/output.css exists
```

### Alpine.js not working?
```bash
npm run build:js
# Check that public/assets/js/app.js exists
```

### Contact form not sending emails?
- Check `config/mail.json` settings
- Verify SMTP credentials
- Check PHP error logs
- Test with simple mail configuration first

### 404 errors on pages?
- Ensure `.htaccess` is present in `public/`
- Check Apache `mod_rewrite` is enabled
- Verify all routes in `public/index.php`

## 📄 License

Proprietary - Dimgent Technologies © 2025

## 👥 Credits

- **Development**: Modern PHP MVC with Plates
- **Design**: Tailwind CSS v4 + Alpine.js v3
- **Security**: PHPMailer + reCAPTCHA v3

---

**Built with ❤️ for Dimgent Technologies**
