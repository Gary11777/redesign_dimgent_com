# Quick Setup Guide - Dimgent Technologies Website

## ✅ Installation Complete!

Your modern PHP MVC website is ready to use. The development server is already running at:
**http://localhost:8000**

## 🎯 What's Been Created

### Backend (PHP 8.4 + MVC)
- ✅ MVC Architecture with Router, Controller base class
- ✅ JSON-based configuration system
- ✅ 6 controllers (Home, Products, Services, Projects, Contacts, About)
- ✅ Clean URL routing with .htaccess

### Frontend (Tailwind CSS + Alpine.js)
- ✅ Modern responsive design
- ✅ Mobile-friendly navigation
- ✅ Interactive elements with Alpine.js
- ✅ Image lightbox gallery
- ✅ Contact form

### Content & Assets
- ✅ All page content integrated from drafts/content
- ✅ Logo (drafts/pics/logo.png) → public/assets/images/logo.png
- ✅ Product images (Garand 101) → public/assets/images/products/

## 🚀 Quick Start

### Option 1: PHP Built-in Server (Already Running!)
```bash
cd public
php -S localhost:8000
```
Visit: http://localhost:8000

### Option 2: Apache/Nginx
1. Set document root to `public/` directory
2. Ensure mod_rewrite is enabled
3. Access via your configured domain

## 📁 Project Structure

```
redesign_dimgent_com/
├── app/
│   ├── Controllers/      # All page controllers
│   ├── Core/            # Router & base Controller
│   └── Views/           # All templates
├── config/
│   └── app.json        # Site configuration
├── public/             # Web root (document root here)
│   ├── assets/
│   │   └── images/
│   ├── .htaccess
│   └── index.php       # Entry point
└── README.md           # Full documentation
```

## 🌐 Pages Available

| Page | URL | Description |
|------|-----|-------------|
| Home | `/` or `/home` | Hero, features, services overview |
| Products | `/products` | Garand 101 magnetometer with gallery |
| Services | `/services` | Development services & advantages |
| Projects | `/projects` | Portfolio of 50+ completed projects |
| Contacts | `/contacts` | Contact form & company info |
| About | `/about` | Company history & expertise |

## ⚙️ Configuration

Edit `config/app.json` to modify:
- Site name, tagline, location, email
- Navigation menu items
- Feature cards on homepage
- Services list

## 🎨 Customization

### Change Colors
Edit Tailwind config in `app/Views/partials/header.php`:
```javascript
tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: {
                    // Your custom colors
                }
            }
        }
    }
}
```

### Add New Page
1. Create controller in `app/Controllers/NewController.php`
2. Create view in `app/Views/newpage.php`
3. Add route in `public/index.php`

## 🔧 Technical Stack

- **PHP**: 8.4 with strict types & OOP
- **Architecture**: MVC pattern
- **Config**: JSON-based
- **CSS**: Tailwind CSS (CDN)
- **JS**: Alpine.js (CDN)
- **Routing**: Clean URLs via .htaccess

## 📋 Features Implemented

✅ Responsive mobile-first design
✅ Alpine.js mobile menu with smooth transitions
✅ Product image gallery with lightbox
✅ Contact form with validation
✅ SEO-friendly meta tags
✅ Modern gradient hero sections
✅ Card-based layouts
✅ Hover effects and transitions
✅ Professional typography
✅ Optimized images from drafts folder

## 🎯 Next Steps

1. **Test all pages** - Navigate through all 6 pages
2. **Customize content** - Edit controllers or config/app.json
3. **Add email backend** - Implement contact form submission
4. **Deploy to production** - Configure Apache/Nginx
5. **Add analytics** - Google Analytics or similar

## 📝 Production Deployment

### Apache
1. Point document root to `public/`
2. Ensure `.htaccess` is enabled
3. Verify PHP 8.4+ is installed

### Nginx
Add to server block:
```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

## 🐛 Troubleshooting

**404 Errors?**
- Ensure document root is `public/` folder
- Check .htaccess or Nginx config
- Verify mod_rewrite is enabled

**Blank Page?**
- Check PHP error logs
- Verify PHP 8.4+ is installed
- Check file permissions

**Images not loading?**
- Verify images are in `public/assets/images/`
- Check file paths in views

## 📞 Support

For questions about the code structure:
- Check `README.md` for full documentation
- Review controller files in `app/Controllers/`
- Examine view templates in `app/Views/`

---

**Status**: ✅ Ready for Development/Production
**Version**: 1.0.0
**Built**: November 2024
