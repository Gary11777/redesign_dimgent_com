# Dimgent Technologies Website

Modern redesign of the Dimgent Technologies website using modular PHP architecture, Tailwind CSS, and Alpine.js.

## 🚀 Features

- **Modern UI**: Clean, responsive design using Tailwind CSS
- **Modular Architecture**: Laravel-like structure for easy maintenance and future migration
- **OOP Approach**: Object-oriented PHP 8.4+ with PSR-12 coding standards
- **Contact Form**: Secure form with PHPMailer, reCAPTCHA v3, and honeypot protection
- **Mobile-First**: Fully responsive design with Alpine.js for interactive components
- **SEO Optimized**: Meta tags, semantic HTML, and clean URLs
- **Performance**: Optimized assets, caching, and compression

## 📁 Project Structure

```
redesign_dimgent_com/
├── config/                 # Configuration files
│   ├── app.php            # Application settings
│   ├── mail.php           # SMTP/email configuration
│   └── recaptcha.php      # reCAPTCHA settings
├── controllers/           # Page logic controllers
│   ├── BaseController.php
│   ├── HomeController.php
│   ├── AboutController.php
│   ├── ProductsController.php
│   ├── ServicesController.php
│   ├── ProjectsController.php
│   └── ContactsController.php
├── includes/              # Helpers and shared components
│   ├── helpers.php        # Utility functions
│   ├── header.php         # Common header
│   ├── footer.php         # Common footer
│   └── Mailer.php         # PHPMailer wrapper
├── views/                 # HTML templates
│   ├── home.php
│   ├── about.php
│   ├── products.php
│   ├── services.php
│   ├── projects.php
│   └── contacts.php
├── public/                # Publicly accessible files
│   ├── index.php          # Home page entry point
│   ├── about.php
│   ├── products.php
│   ├── services.php
│   ├── projects.php
│   ├── contacts.php
│   ├── contact-submit.php # Form handler
│   ├── assets/            # Static assets (images, CSS, JS)
│   ├── .htaccess          # Apache configuration
│   └── favicon.ico
├── old_version_dimgent_com/ # Original website (reference)
├── composer.json          # PHP dependencies
├── .env.example           # Environment variables template
├── .gitignore
└── README.md
```

## 🛠️ Installation

### Prerequisites

- PHP 8.0 or higher
- Composer
- Apache/Nginx web server
- SMTP server access (for contact form)
- Google reCAPTCHA v3 keys

### Step 1: Clone the Repository

```bash
cd d:\Projects\redesign\redesign_dimgent_com
```

### Step 2: Install Dependencies

```bash
composer install
```

This will install PHPMailer and other required packages.

### Step 3: Configure Environment

Copy the example environment file and configure your settings:

```bash
copy .env.example .env
```

Edit `.env` with your actual configuration:

```env
# SMTP Configuration
SMTP_HOST=smtp.gmail.com
SMTP_PORT=587
SMTP_USERNAME=your-email@gmail.com
SMTP_PASSWORD=your-app-password
SMTP_ENCRYPTION=tls
SMTP_FROM_EMAIL=noreply@dimgent.com
SMTP_FROM_NAME=Dimgent Technologies

# Contact Form Recipient
CONTACT_EMAIL=info@dimgent.com

# Google reCAPTCHA v3 Keys
RECAPTCHA_SITE_KEY=your-site-key
RECAPTCHA_SECRET_KEY=your-secret-key
```

### Step 4: Load Environment Variables

Add this to the top of `public/index.php` (and other entry points) to load environment variables:

```php
// Load environment variables
if (file_exists(__DIR__ . '/../.env')) {
    $lines = file(__DIR__ . '/../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($key, $value) = explode('=', $line, 2);
        putenv(trim($key) . '=' . trim($value));
    }
}
```

### Step 5: Configure Web Server

#### Apache

Point your document root to the `public` folder:

```apache
<VirtualHost *:80>
    ServerName dimgent.local
    DocumentRoot "d:/Projects/redesign/redesign_dimgent_com/public"
    
    <Directory "d:/Projects/redesign/redesign_dimgent_com/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

#### Nginx

```nginx
server {
    listen 80;
    server_name dimgent.local;
    root /path/to/redesign_dimgent_com/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

### Step 6: Copy Assets

Copy images from the old version to the new assets folder:

```bash
# Logo
copy old_version_dimgent_com\pic\logo.png public\assets\images\

# Slider images
mkdir public\assets\images\slider
mkdir public\assets\images\slider\thumbs
copy old_version_dimgent_com\data1\images\*.jpg public\assets\images\slider\
copy old_version_dimgent_com\data1\tooltips\*.jpg public\assets\images\slider\thumbs\

# Product images
mkdir public\assets\images\products
copy old_version_dimgent_com\pic\*.jpg public\assets\images\products\
copy old_version_dimgent_com\pic\*.png public\assets\images\products\
copy old_version_dimgent_com\pic\*.pdf public\assets\images\products\

# Favicon
copy old_version_dimgent_com\favicon.ico public\
```

### Step 7: Set Permissions

Ensure the web server can read all files:

```bash
# Linux/Mac
chmod -R 755 public
chmod -R 644 public/assets

# Windows - no action needed usually
```

## 🔐 Security Setup

### 1. Google reCAPTCHA v3

1. Go to [Google reCAPTCHA Admin](https://www.google.com/recaptcha/admin)
2. Register your site with reCAPTCHA v3
3. Copy your Site Key and Secret Key to `.env`

### 2. SMTP Configuration

#### Gmail Example

1. Enable 2-factor authentication
2. Generate an App Password: [Google Account Security](https://myaccount.google.com/security)
3. Use the app password in `.env`

```env
SMTP_HOST=smtp.gmail.com
SMTP_PORT=587
SMTP_USERNAME=your-email@gmail.com
SMTP_PASSWORD=your-16-digit-app-password
```

#### Other SMTP Providers

- **SendGrid**: smtp.sendgrid.net, Port: 587
- **Mailgun**: smtp.mailgun.org, Port: 587
- **Amazon SES**: email-smtp.region.amazonaws.com, Port: 587

### 3. File Permissions

Protect sensitive files by ensuring proper permissions:

```bash
chmod 600 .env
chmod 644 composer.json composer.lock
```

## 📝 Configuration

### Application Settings

Edit `config/app.php` to customize:

- Site name and tagline
- Contact information
- Navigation menu items
- Language options

### Mail Settings

Edit `config/mail.php` for email configuration (or use `.env` variables).

### reCAPTCHA Settings

Edit `config/recaptcha.php` to adjust:

- Score threshold (default: 0.5)
- Verification URL

## 🧪 Testing

### Test Contact Form

1. Open the contacts page
2. Fill in the form with valid data
3. Submit and verify:
   - reCAPTCHA token is generated
   - Form data is validated
   - Email is sent via SMTP
   - Success message is displayed

### Test Email Delivery

Create a test script `test-email.php` in the root:

```php
<?php
require_once 'includes/helpers.php';
require_once 'vendor/autoload.php';
require_once 'includes/Mailer.php';

$mailer = new Mailer();
$result = $mailer->sendContactForm([
    'name' => 'Test User',
    'email' => 'test@example.com',
    'country' => 'Test Country',
    'phone' => '+1234567890',
    'message' => 'This is a test message.'
]);

echo $result ? 'Email sent successfully!' : 'Email failed to send.';
```

Run: `php test-email.php`

## 🎨 Customization

### Styling

The website uses Tailwind CSS via CDN. To customize:

1. Update colors in templates (replace `blue-600` with your color)
2. Modify spacing, fonts, and components in view files
3. For advanced customization, set up a local Tailwind build

### Adding New Pages

1. Create a controller in `controllers/` extending `BaseController`
2. Create a view in `views/`
3. Create an entry point in `public/`
4. Add to navigation in `config/app.php`

Example:

```php
// controllers/NewPageController.php
class NewPageController extends BaseController {
    public function index(): void {
        $this->render('newpage', [
            'pageTitle' => 'New Page Title'
        ]);
    }
}

// views/newpage.php
<?php require __DIR__ . '/../includes/header.php'; ?>
<div class="container mx-auto">
    <h1>New Page Content</h1>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>

// public/newpage.php
<?php
session_start();
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../controllers/NewPageController.php';
$controller = new NewPageController();
$controller->index();
```

## 🚀 Deployment

### Production Checklist

- [ ] Set environment to production in `.env`
- [ ] Enable HTTPS redirect in `.htaccess`
- [ ] Update base URL in `config/app.php`
- [ ] Test all forms and email delivery
- [ ] Verify reCAPTCHA works
- [ ] Check all images load correctly
- [ ] Test responsive design on mobile devices
- [ ] Set up error logging
- [ ] Configure backup system
- [ ] Monitor SMTP quota

### Deploy to Production

1. Upload files to server (exclude `.env`, `.git`, `old_version_dimgent_com`)
2. Run `composer install --no-dev --optimize-autoloader`
3. Copy `.env.example` to `.env` and configure
4. Set proper file permissions
5. Point domain to `public` folder
6. Test all functionality

## 🐛 Troubleshooting

### Email Not Sending

- Check SMTP credentials in `.env`
- Verify SMTP port is not blocked by firewall
- Check PHP error logs: `tail -f /var/log/php-errors.log`
- Test SMTP connection: `telnet smtp.example.com 587`

### reCAPTCHA Failing

- Verify site key and secret key in `.env`
- Check domain is registered in reCAPTCHA console
- Ensure JavaScript is enabled in browser
- Check browser console for errors

### Pages Not Loading

- Verify `.htaccess` is working: `apache2ctl -M | grep rewrite`
- Check document root points to `public` folder
- Verify file permissions allow web server to read files
- Check Apache/Nginx error logs

### CSS/Images Not Loading

- Verify assets are in `public/assets/` folder
- Check file paths in templates
- Ensure web server can read files
- Check browser console for 404 errors

## 📚 Additional Resources

- [PHP Documentation](https://www.php.net/docs.php)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Alpine.js Documentation](https://alpinejs.dev/)
- [PHPMailer Documentation](https://github.com/PHPMailer/PHPMailer)
- [Google reCAPTCHA Documentation](https://developers.google.com/recaptcha/docs/v3)

## 📄 License

This project is proprietary to Dimgent Technologies.

## 👥 Support

For technical support or questions:
- Email: info@dimgent.com
- Website: https://www.dimgent.com

---

**Developed with ❤️ for Dimgent Technologies**
