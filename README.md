# Dimgent Technologies Website

A modern website for Dimgent Technologies - Electronics Development company based in Minsk, Belarus.

## Technology Stack

### Backend
- **PHP 8.4** - Modern PHP with strict types and OOP
- **MVC Architecture** - Clean separation of concerns
- **JSON Configuration** - Easy-to-manage configuration system
- **Object-Oriented Design** - Maintainable and scalable code

### Frontend
- **Tailwind CSS** (via CDN) - Modern, utility-first CSS framework
- **Alpine.js** - Lightweight JavaScript framework for interactivity
- **Responsive Design** - Mobile-first approach
- **Modern UI/UX** - Clean and professional design

## Project Structure

```
redesign_dimgent_com/
├── app/
│   ├── Controllers/         # Page controllers
│   │   ├── HomeController.php
│   │   ├── ProductsController.php
│   │   ├── ServicesController.php
│   │   ├── ProjectsController.php
│   │   ├── ContactsController.php
│   │   └── AboutController.php
│   ├── Core/                # Core framework files
│   │   ├── Router.php
│   │   └── Controller.php
│   └── Views/               # View templates
│       ├── partials/
│       │   ├── header.php
│       │   └── footer.php
│       ├── home.php
│       ├── products.php
│       ├── services.php
│       ├── projects.php
│       ├── contacts.php
│       └── about.php
├── config/
│   └── app.json            # Application configuration
├── public/                 # Web root
│   ├── assets/
│   │   └── images/
│   │       ├── logo.png
│   │       └── products/
│   ├── .htaccess
│   └── index.php           # Entry point
└── drafts/                 # Original content and assets
```

## Features

### Pages
- **Home** - Company overview with hero section, features, and services overview
- **Products** - Garand 101 magnetometer-gradiometer with gallery
- **Services** - Comprehensive list of development services
- **Projects** - Portfolio of completed projects
- **Contacts** - Contact form and company information
- **About** - Company history, expertise, and team information

### Key Features
- Modern, responsive design
- Mobile-friendly navigation with Alpine.js
- Image lightbox gallery for products
- Contact form with validation
- SEO-friendly structure
- Fast loading with CDN-based resources

## Setup Instructions

### Requirements
- PHP 8.4 or higher
- Web server (Apache/Nginx)
- mod_rewrite enabled (for Apache)

### Installation

1. **Clone or download the project**
   ```bash
   git clone [repository-url]
   cd redesign_dimgent_com
   ```

2. **Configure web server**
   - Set document root to `public/` directory
   - Ensure `.htaccess` is enabled (Apache) or configure URL rewriting (Nginx)

3. **Apache Configuration**
   The `.htaccess` file is already included in the `public/` directory:
   ```apache
   RewriteEngine On
   RewriteCond %{REQUEST_FILENAME} !-f
   RewriteCond %{REQUEST_FILENAME} !-d
   RewriteRule ^(.*)$ index.php [QSA,L]
   ```

4. **Nginx Configuration**
   Add this to your server block:
   ```nginx
   location / {
       try_files $uri $uri/ /index.php?$query_string;
   }
   ```

5. **Verify PHP Version**
   ```bash
   php -v
   ```
   Ensure PHP 8.4 or higher is installed.

6. **Access the website**
   Navigate to your configured domain or localhost.

### Development Server

For quick testing, you can use PHP's built-in server:

```bash
cd public
php -S localhost:8000
```

Then open `http://localhost:8000` in your browser.

## Configuration

The main configuration is in `config/app.json`:

- **Site Information** - Company name, tagline, location, email
- **Navigation** - Menu items and URLs
- **Features** - Homepage feature cards
- **Services** - List of services offered

To modify site content, edit the JSON configuration or controller data arrays.

## Customization

### Adding New Pages

1. **Create a Controller** in `app/Controllers/`
   ```php
   <?php
   namespace Controllers;
   use Core\Controller;
   
   class NewPageController extends Controller {
       public function index(): void {
           $this->view('newpage', ['title' => 'New Page']);
       }
   }
   ```

2. **Create a View** in `app/Views/`
   ```php
   <?php require_once __DIR__ . '/partials/header.php'; ?>
   <!-- Your content here -->
   <?php require_once __DIR__ . '/partials/footer.php'; ?>
   ```

3. **Add Route** in `public/index.php`
   ```php
   $router->get('/newpage', 'Controllers\NewPageController@index');
   ```

### Styling

The website uses Tailwind CSS via CDN. To customize colors and theme:

Edit the Tailwind config in `app/Views/partials/header.php`:
```javascript
tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: { /* your colors */ }
            }
        }
    }
}
```

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## License

© 2024 Dimgent Technologies. All rights reserved.

## Contact

**Dimgent Technologies**
- Location: Minsk, Belarus
- Email: info@dimgent.com
- Website: [dimgent.com](http://dimgent.com)

## Credits

- **Development**: Modern PHP MVC architecture
- **Design**: Tailwind CSS & Alpine.js
- **Content**: Based on company materials
