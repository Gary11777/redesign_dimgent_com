# Dimgent Technologies Website Redesign

Modern redesign of Dimgent Technologies website using PHP 8.4, Tailwind CSS, and Alpine.js.

## Features

- **Modern MVC Architecture**: Clean separation of concerns with PHP OOP
- **JSON Configuration**: Centralized configuration management
- **Tailwind CSS**: Modern, responsive design
- **Alpine.js**: Light interactivity (mobile menu, lightbox)
- **Contact Form**: PHPMailer + SMTP + Honeypot + reCAPTCHA v3
- **Portfolio System**: JSON-based project management with lightbox

## Requirements

- PHP 8.4 or higher
- Web server (Apache with mod_rewrite or Nginx)
- Composer (for PHPMailer dependency)
- SMTP account for email sending
- Google reCAPTCHA v3 credentials

## Installation

1. **Clone or download the project**

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Configure the application**
   
   Edit `config/config.json`:
   
   ```json
   {
     "site": {
       "name": "Dimgent Technologies",
       "email": "your-email@example.com",
       ...
     },
     "smtp": {
       "host": "smtp.example.com",
       "port": 587,
       "username": "your-smtp-username",
       "password": "your-smtp-password",
       "encryption": "tls",
       "from_email": "info@dimgent.com",
       "from_name": "Dimgent Technologies"
     },
     "recaptcha": {
       "site_key": "YOUR_RECAPTCHA_SITE_KEY",
       "secret_key": "YOUR_RECAPTCHA_SECRET_KEY"
     }
   }
   ```

4. **Set up reCAPTCHA v3**
   
   - Go to https://www.google.com/recaptcha/admin
   - Create a new site with reCAPTCHA v3
   - Copy the Site Key and Secret Key
   - Add them to `config/config.json`

5. **Configure SMTP**
   
   Update SMTP settings in `config/config.json` with your email provider's settings:
   - Gmail: smtp.gmail.com, port 587, TLS
   - Outlook: smtp-mail.outlook.com, port 587, TLS
   - Custom SMTP: Use your provider's settings

6. **Set up web server**
   
   **Apache:**
   - Ensure mod_rewrite is enabled
   - The `.htaccess` file is included
   
   **Nginx:**
   ```nginx
   location / {
       try_files $uri $uri/ /index.php?$query_string;
   }
   ```

7. **Set permissions**
   ```bash
   chmod 755 data/
   chmod 644 config/config.json
   ```

## Project Structure

```
/
├── config/
│   └── config.json          # Configuration file
├── core/
│   ├── BaseController.php   # Base controller class
│   ├── Config.php           # Configuration manager
│   ├── Input.php            # Input sanitization
│   ├── Mailer.php           # Email handler
│   ├── Recaptcha.php        # reCAPTCHA validator
│   ├── Router.php           # URL router
│   └── View.php             # View helper
├── controllers/
│   ├── AboutController.php
│   ├── ContactsController.php
│   ├── HomeController.php
│   ├── ProductsController.php
│   ├── ProjectsController.php
│   └── ServicesController.php
├── views/
│   ├── errors/
│   │   └── 404.php
│   ├── layouts/
│   │   ├── header.php
│   │   └── footer.php
│   └── pages/
│       ├── about.php
│       ├── contacts.php
│       ├── home.php
│       ├── products.php
│       ├── projects.php
│       └── services.php
├── data/
│   └── projects.json       # Portfolio projects (JSON)
├── old_version_dimgent_com/ # Original site assets
├── vendor/                  # Composer dependencies
├── .htaccess               # Apache rewrite rules
├── composer.json           # PHP dependencies
├── index.php              # Entry point
└── README.md              # This file
```

## Adding Projects

Edit `data/projects.json`:

```json
[
  {
    "title": "Project Name",
    "description": "Project description",
    "image": "old_version_dimgent_com/pic/project-image.jpg",
    "category": "optional-category"
  }
]
```

## Development

### Local Development Server

```bash
php -S localhost:8000
```

### Testing Contact Form

1. Ensure SMTP and reCAPTCHA are configured
2. Test with valid data
3. Check honeypot field (should be empty)
4. Verify reCAPTCHA token is sent

## Security Features

- **Input Sanitization**: All user input is sanitized
- **Honeypot Field**: Spam protection
- **reCAPTCHA v3**: Bot protection
- **CSRF Protection**: Token-based form protection (can be added)
- **Security Headers**: X-Content-Type-Options, X-Frame-Options, etc.

## Browser Support

- Modern browsers (Chrome, Firefox, Safari, Edge)
- Mobile responsive design
- Progressive enhancement

## License

This project is proprietary software for Dimgent Technologies.

## Support

For issues or questions, contact the development team.

## Credits

- Original design: Sitestar.by
- Redesign: Dimgent Technologies Development Team

