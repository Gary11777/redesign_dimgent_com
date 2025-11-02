# Dimgent Technologies Website Redesign

Modern, modular redesign of the Dimgent Technologies website using PHP 8.4, Tailwind CSS, and Alpine.js.

## 🌟 Features

- **Modern MVC Architecture**: Clean separation of concerns with modular design
- **PHP 8.4 OOP**: Object-oriented approach with PSR-12 coding standards
- **Tailwind CSS**: Modern, responsive UI design
- **Alpine.js**: Lightweight JavaScript for interactivity
- **Contact Form**: 
  - PHPMailer with SMTP support
  - Google reCAPTCHA v3 integration
  - Honeypot spam protection
  - AJAX submission with real-time feedback
- **SEO Optimized**: Proper meta tags, semantic HTML
- **Mobile-First**: Fully responsive design
- **Fast & Lightweight**: Minimal dependencies, CDN-based assets

## 📁 Project Structure

```
redesign_dimgent_com/
├── app/
│   ├── Controllers/          # Page controllers
│   │   ├── HomeController.php
│   │   ├── ProductsController.php
│   │   ├── ServicesController.php
│   │   ├── ProjectsController.php
│   │   ├── ContactsController.php
│   │   └── AboutController.php
│   ├── Core/                 # Core framework classes
│   │   ├── Application.php   # Main application class
│   │   ├── Controller.php    # Base controller
│   │   ├── Router.php        # Request routing
│   │   └── View.php          # View rendering
│   ├── Helpers/              # Helper classes
│   │   ├── Mailer.php        # Email handling with PHPMailer
│   │   └── ReCaptcha.php     # reCAPTCHA verification
│   └── Views/                # View templates
│       ├── layouts/          # Layout templates
│       ├── home/             # Home page views
│       ├── products/         # Products page views
│       ├── services/         # Services page views
│       ├── projects/         # Projects page views
│       ├── contacts/         # Contacts page views
│       ├── about/            # About page views
│       └── errors/           # Error pages (404, 500)
├── config/
│   └── app.php               # Application configuration
├── public/                   # Public web root
│   ├── assets/               # Static assets
│   │   ├── images/           # Images from original site
│   │   └── pdf/              # PDF files
│   ├── .htaccess             # Apache rewrite rules
│   └── index.php             # Front controller
├── vendor/
│   └── autoload.php          # PSR-4 autoloader
├── old_version_dimgent_com/  # Original website backup
├── composer.json             # Composer dependencies
└── README.md                 # This file
```

## 🚀 Installation

### Prerequisites

- **PHP 8.4 or higher**
- **Apache or Nginx** web server
- **Composer** (for dependency management)
- **mod_rewrite** enabled (for Apache)

### Step 1: Clone or Download

```bash
cd d:\Projects\redesign\redesign_dimgent_com
```

### Step 2: Install Dependencies

Install PHPMailer via Composer:

```bash
composer install
```

If Composer is not available, the project includes a basic autoloader, but PHPMailer must be installed manually or via Composer.

### Step 3: Configure Application

Edit `config/app.php` and update the following settings:

#### Email Configuration (SMTP)

```php
'mail' => [
    'smtp_host' => 'smtp.gmail.com',          // Your SMTP host
    'smtp_port' => 587,                        // SMTP port (587 for TLS)
    'smtp_username' => 'your-email@gmail.com', // SMTP username
    'smtp_password' => 'your-app-password',    // SMTP password or app password
    'smtp_encryption' => 'tls',                // tls or ssl
    'from_email' => 'noreply@dimgent.com',     // From email
    'from_name' => 'Dimgent Technologies',     // From name
    'to_email' => 'info@dimgent.com',          // Recipient email
    'to_name' => 'Dimgent Technologies',       // Recipient name
],
```

**Gmail Setup:**
1. Enable 2-Factor Authentication on your Google account
2. Generate an App Password: https://myaccount.google.com/apppasswords
3. Use the App Password as `smtp_password`

#### reCAPTCHA Configuration

1. Go to https://www.google.com/recaptcha/admin
2. Register your site for reCAPTCHA v3
3. Add your keys to `config/app.php`:

```php
'recaptcha' => [
    'site_key' => 'your-site-key-here',    // Public key
    'secret_key' => 'your-secret-key-here', // Secret key
    'min_score' => 0.5,                     // Minimum score (0.0 to 1.0)
],
```

#### Site Configuration

```php
'app' => [
    'name' => 'Dimgent Technologies',
    'url' => 'http://localhost',  // Change to your domain in production
    'env' => 'development',       // Change to 'production' for live site
    'debug' => true,              // Set to false in production
],
```

### Step 4: Web Server Configuration

#### Apache

The `.htaccess` file is already configured. Ensure `mod_rewrite` is enabled:

```bash
# On Ubuntu/Debian
sudo a2enmod rewrite
sudo systemctl restart apache2
```

Set your document root to the `public/` directory.

#### Nginx

Add this to your Nginx configuration:

```nginx
server {
    listen 80;
    server_name dimgent.local;
    root /path/to/redesign_dimgent_com/public;
    
    index index.php;
    
    location / {
        try_files $uri $uri/ /index.php?url=$uri&$args;
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

### Step 5: File Permissions

Ensure proper permissions (Linux/Mac):

```bash
chmod -R 755 .
chmod -R 775 app/ config/
```

## 🧪 Testing

### Local Development

Use PHP's built-in server for quick testing:

```bash
cd public
php -S localhost:8000
```

Visit: http://localhost:8000

### Contact Form Testing

To test the contact form:

1. Configure SMTP settings in `config/app.php`
2. Add reCAPTCHA keys (or leave empty for testing without reCAPTCHA)
3. Submit the form at `/contacts`
4. Check your email inbox for the message

## 📄 Pages

- **Home** (`/`) - Landing page with company overview
- **Products** (`/products`) - Garand 101 magnetometer details
- **Services** (`/services`) - Development services offered
- **Projects** (`/projects`) - Portfolio of completed projects
- **Contacts** (`/contacts`) - Contact form with spam protection
- **About** (`/about`) - Company information and expertise

## 🔐 Security Features

1. **Input Sanitization**: All user inputs are sanitized
2. **Email Validation**: Server-side email format validation
3. **Honeypot Field**: Hidden field to catch spam bots
4. **reCAPTCHA v3**: Google's invisible reCAPTCHA
5. **CSRF Protection**: Can be implemented using session tokens
6. **XSS Prevention**: HTML escaping in views
7. **SQL Injection**: N/A (no database used)

## 🎨 Customization

### Styling

Tailwind CSS is loaded via CDN. Custom colors are configured in `app/Views/layouts/default.php`:

```javascript
tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: {
                    // Custom color palette
                }
            }
        }
    }
}
```

### Adding New Pages

1. Create a controller in `app/Controllers/`
2. Create view files in `app/Views/[page-name]/`
3. Add route in `config/app.php`:

```php
'routes' => [
    'new-page' => 'NewPageController@index',
],
```

4. Add to menu in `config/app.php`:

```php
'menu' => [
    [
        'title' => 'New Page',
        'url' => '/new-page',
        'active' => 'new-page',
    ],
],
```

## 🌐 Deployment

### Production Checklist

- [ ] Set `'env' => 'production'` in `config/app.php`
- [ ] Set `'debug' => false` in `config/app.php`
- [ ] Update `'url'` to your domain in `config/app.php`
- [ ] Configure SMTP settings with production credentials
- [ ] Add reCAPTCHA keys for your production domain
- [ ] Enable HTTPS (uncomment redirect in `.htaccess`)
- [ ] Set proper file permissions
- [ ] Test contact form thoroughly
- [ ] Set up proper error logging

### Environment Variables (Optional)

For better security, consider using environment variables for sensitive data:

```php
// Example: Using getenv() or $_ENV
'smtp_password' => getenv('SMTP_PASSWORD'),
'recaptcha_secret' key' => getenv('RECAPTCHA_SECRET'),
```

Create a `.env` file (not included in version control):

```
SMTP_PASSWORD=your-password
RECAPTCHA_SECRET=your-secret
```

## 📊 Original Content Preservation

All original content from the old site has been preserved:

- ✅ All text content (English)
- ✅ All images and photos
- ✅ Product information (Garand 101)
- ✅ Company information
- ✅ Services descriptions
- ✅ Projects portfolio
- ✅ Contact information
- ✅ SEO meta tags
- ✅ Google Analytics integration
- ✅ Language selector structure

## 🛠️ Technologies Used

- **Backend**: PHP 8.4 (OOP, MVC)
- **Frontend**: HTML5, Tailwind CSS v3
- **JavaScript**: Alpine.js v3
- **Email**: PHPMailer v6.9
- **Security**: Google reCAPTCHA v3
- **Package Manager**: Composer

## 📝 Code Standards

- PSR-12 coding style
- PHP 8.4 type declarations
- DocBlock comments
- Descriptive variable/function names
- Separation of concerns (MVC)
- DRY principles

## 🐛 Troubleshooting

### Contact Form Not Sending

1. Check SMTP credentials in `config/app.php`
2. Verify PHP `mail()` function or SMTP ports are not blocked
3. Check error logs in your server
4. Test SMTP connection separately

### 404 Errors on All Pages

1. Ensure `mod_rewrite` is enabled (Apache)
2. Check that `.htaccess` is in the `public/` directory
3. Verify document root points to `public/` directory

### Images Not Loading

1. Check that assets were copied: `public/assets/images/`
2. Verify file permissions
3. Check browser console for 404 errors

### reCAPTCHA Not Working

1. Verify site key and secret key in config
2. Check that domain is registered with Google reCAPTCHA
3. Ensure reCAPTCHA script loads (check browser console)

## 📞 Support

For issues or questions:
- Email: info@dimgent.com
- Website: https://dimgent.com

## 📜 License

© 2024 Dimgent Technologies. All rights reserved.

## 🙏 Acknowledgments

- Original website design by Sitestar.by
- Redesigned with modern technologies while preserving original content
- Built with focus on maintainability, security, and user experience
