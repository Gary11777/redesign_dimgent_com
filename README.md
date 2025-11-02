# Dimgent Technologies - Website Redesign

A modern, modular redesign of the Dimgent Technologies website using simple PHP, Tailwind CSS, and Alpine.js.

## 🚀 Features

- **Modern Design**: Clean, responsive UI built with Tailwind CSS
- **Modular Architecture**: Laravel-like structure for easy future migration
- **Secure Contact Form**: PHPMailer with SMTP + Google reCAPTCHA v3 + Honeypot protection
- **Mobile-First**: Fully responsive design with Alpine.js for mobile menu
- **SEO Optimized**: Proper meta tags and semantic HTML structure
- **Original Content**: All text and images preserved from the original Dimgent site

## 📁 Project Structure

```
redesign_dimgent_com/
├── config/                  # Configuration files
│   ├── app_config.php      # Application settings
│   └── mail_config.php     # Email/SMTP configuration
├── includes/               # Reusable PHP components
│   ├── functions.php       # Helper functions
│   ├── header.php          # Common header
│   ├── nav.php             # Navigation menu
│   ├── footer.php          # Common footer
│   └── PHPMailer/          # PHPMailer library (to be installed)
├── controllers/            # Page logic (optional for future use)
├── views/                  # View templates (optional for future use)
├── public/                 # Public web root
│   ├── index.php           # Home page
│   ├── products.php        # Products page
│   ├── services.php        # Services page
│   ├── projects.php        # Projects page
│   ├── about.php           # About page
│   ├── contacts.php        # Contact page
│   ├── sendmail.php        # Contact form handler
│   └── assets/             # Static assets
│       ├── css/            # Custom CSS (if needed)
│       ├── js/             # Custom JavaScript (if needed)
│       └── images/         # Images and media files
├── .env.example            # Environment variables template
└── README.md               # This file
```

## 🛠️ Installation & Setup

### Prerequisites

- PHP 7.4 or higher
- Web server (Apache/Nginx) or PHP built-in server for development
- Composer (optional, for PHPMailer installation)
- SMTP server credentials
- Google reCAPTCHA v3 keys

### Step 1: Clone or Download

Clone this repository or download and extract it to your web server directory.

### Step 2: Install PHPMailer

**Option A: Using Composer (Recommended)**

```bash
cd includes
composer require phpmailer/phpmailer
```

**Option B: Manual Installation**

1. Download PHPMailer from https://github.com/PHPMailer/PHPMailer/releases
2. Extract the contents
3. Copy the `src` folder to `includes/PHPMailer/`
4. Ensure the following files exist:
   - `includes/PHPMailer/PHPMailer.php`
   - `includes/PHPMailer/SMTP.php`
   - `includes/PHPMailer/Exception.php`

### Step 3: Configure Environment

1. Copy `.env.example` to `.env`:
   ```bash
   cp .env.example .env
   ```

2. Update `.env` with your actual credentials:
   ```
   SMTP_HOST=smtp.example.com
   SMTP_USERNAME=noreply@dimgent.com
   SMTP_PASSWORD=your_smtp_password
   SMTP_PORT=587
   SMTP_SECURE=tls
   
   RECIPIENT_EMAIL=contact@dimgent.com
   FROM_EMAIL=noreply@dimgent.com
   
   RECAPTCHA_SITE_KEY=your_recaptcha_site_key
   RECAPTCHA_SECRET_KEY=your_recaptcha_secret_key
   ```

### Step 4: Configure Mail Settings

Edit `config/mail_config.php` with your SMTP credentials:

```php
return [
    'smtp_host' => 'smtp.example.com',
    'smtp_username' => 'noreply@dimgent.com',
    'smtp_password' => 'yourpassword',
    'smtp_port' => 587,
    'smtp_secure' => 'tls',
    // ... other settings
];
```

### Step 5: Configure reCAPTCHA

1. Get your reCAPTCHA v3 keys from https://www.google.com/recaptcha/admin
2. Update `config/app_config.php` with your keys:

```php
'recaptcha' => [
    'site_key' => 'YOUR_RECAPTCHA_SITE_KEY',
    'secret_key' => 'YOUR_RECAPTCHA_SECRET_KEY',
],
```

### Step 6: Configure Web Server

**Apache (.htaccess)**

Create a `.htaccess` file in the `public` directory:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    
    # Remove .php extension (optional)
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME}\.php -f
    RewriteRule ^(.*)$ $1.php [L]
</IfModule>

# Security headers
<IfModule mod_headers.c>
    Header set X-Content-Type-Options "nosniff"
    Header set X-Frame-Options "SAMEORIGIN"
    Header set X-XSS-Protection "1; mode=block"
</IfModule>
```

**Nginx**

```nginx
server {
    listen 80;
    server_name dimgent.com;
    root /path/to/redesign_dimgent_com/public;
    index index.php;

    location / {
        try_files $uri $uri/ $uri.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

**PHP Built-in Server (Development Only)**

```bash
cd public
php -S localhost:8000
```

Then visit http://localhost:8000 in your browser.

## 🔧 Configuration

### Application Settings

Edit `config/app_config.php` to customize:

- Site name and tagline
- Contact information
- Company statistics
- Base URL and asset paths

### Email Templates

The email template in `sendmail.php` can be customized to match your branding.

## 📧 Contact Form Features

- **Required Fields**: Name, Email, Message
- **Optional Field**: Phone number
- **Honeypot Protection**: Catches spam bots
- **reCAPTCHA v3**: Invisible CAPTCHA protection
- **Server-side Validation**: Sanitizes and validates all inputs
- **AJAX Submission**: No page reload needed
- **HTML Email**: Professional-looking email template
- **Error Handling**: User-friendly error messages

## 🎨 Customization

### Colors

The color scheme is defined in Tailwind configuration in `includes/header.php`:

```javascript
colors: {
    'dimgent-blue': '#0099ff',
    'dimgent-blue-dark': '#0099cd',
    'dimgent-maroon': '#800000',
    'dimgent-steel': '#4682b4',
    'dimgent-navy': '#191970',
}
```

### Adding New Pages

1. Create a new PHP file in `public/` (e.g., `newpage.php`)
2. Include header and navigation:
   ```php
   <?php
   $page_title = 'New Page';
   require_once __DIR__ . '/../includes/header.php';
   require_once __DIR__ . '/../includes/nav.php';
   ?>
   ```
3. Add your content
4. Include footer:
   ```php
   <?php require_once __DIR__ . '/../includes/footer.php'; ?>
   ```
5. Update navigation in `includes/nav.php`

## 🔒 Security Considerations

- ✅ All user inputs are sanitized
- ✅ Email validation
- ✅ Honeypot spam protection
- ✅ Google reCAPTCHA v3
- ✅ CSRF protection (consider adding tokens for forms)
- ✅ Prepared statements ready for database implementation
- ⚠️ **Important**: Never commit `mail_config.php` or `.env` to version control
- ⚠️ Keep PHPMailer updated to latest version

## 🚀 Deployment

### Pre-deployment Checklist

- [ ] Update `config/app_config.php` with production values
- [ ] Configure SMTP credentials in `config/mail_config.php`
- [ ] Set up reCAPTCHA keys
- [ ] Test contact form functionality
- [ ] Verify all images load correctly
- [ ] Test on multiple devices and browsers
- [ ] Set proper file permissions (644 for files, 755 for directories)
- [ ] Ensure `config/` and `includes/` are not publicly accessible

### Recommended Permissions

```bash
find . -type f -exec chmod 644 {} \;
find . -type d -exec chmod 755 {} \;
chmod 600 config/mail_config.php
```

## 📱 Browser Support

- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## 🔄 Future Migration to Laravel

This structure is designed for easy migration to Laravel:

1. `config/` → Laravel config files
2. `includes/functions.php` → Laravel helpers
3. `public/` → Laravel routes and controllers
4. `includes/header.php`, `footer.php` → Blade layouts
5. Page files → Blade views

## 📝 Maintenance

### Updating Content

- **Homepage**: Edit `public/index.php`
- **Products**: Edit `public/products.php`
- **Services**: Edit `public/services.php`
- **Projects**: Edit `public/projects.php`
- **About**: Edit `public/about.php`
- **Footer**: Edit `includes/footer.php`

### Adding Images

Place images in `public/assets/images/` and reference them using:

```php
<?php echo asset('images/yourimage.jpg'); ?>
```

## 🐛 Troubleshooting

### Contact Form Not Sending

1. Check SMTP credentials in `config/mail_config.php`
2. Verify reCAPTCHA keys
3. Check server error logs
4. Ensure PHPMailer is installed correctly
5. Test SMTP connection separately

### Images Not Loading

1. Verify images exist in `public/assets/images/`
2. Check file permissions
3. Verify asset paths in code

### Tailwind Styles Not Working

1. Ensure CDN is accessible
2. Check browser console for errors
3. Verify internet connection

## 📞 Support

For issues or questions about the original Dimgent Technologies:
- Email: info@dimgent.com
- Location: Minsk, Belarus

## 📄 License

This is a redesign of the Dimgent Technologies website. All content and branding belong to Dimgent Technologies.

## 🙏 Credits

- **Original Website**: Dimgent Technologies
- **Framework**: Tailwind CSS
- **JavaScript**: Alpine.js
- **Email**: PHPMailer
- **Spam Protection**: Google reCAPTCHA v3

---

**Note**: This is a development version. Always test thoroughly before deploying to production.
