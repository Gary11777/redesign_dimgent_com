# Alpine.js v3 Installation & Setup

## ✅ Installation Complete!

Alpine.js v3.15.1 has been successfully installed and configured with a bundler setup.

## 📦 What Was Installed

```json
{
  "alpinejs": "^3.15.1"
}
```

**Dev Dependencies:**
```json
{
  "esbuild": "^0.25.12"
}
```

## 🏗️ Build System

Alpine.js is now bundled using **esbuild** for optimal performance.

### Files Created

- ✅ `src/app.js` - Alpine.js entry point
- ✅ `public/assets/js/app.js` - Bundled Alpine.js (43.7 KB minified)

### Build Results

```
✓ esbuild bundled Alpine.js
✓ Done in 18ms
✓ Output: public/assets/js/app.js (43.7 KB)
```

## 🚀 Available Commands

| Command | Purpose |
|---------|---------|
| `npm run build` | Build both CSS and JS (production) |
| `npm run dev` | Watch mode for both CSS and JS |
| `npm run build:js` | Build only JavaScript |
| `npm run watch:js` | Watch mode for JavaScript only |

## 📝 How to Use

### 1. In Your HTML/PHP Files

Replace the Alpine.js CDN with the bundled version:

```html
<!-- Remove this: -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- Add this: -->
<script defer src="/assets/js/app.js"></script>
```

### 2. Build the JavaScript

```bash
# Build both CSS and JS for production
npm run build

# Or build only JavaScript
npm run build:js

# Watch mode for development (both CSS and JS)
npm run dev
```

### 3. Use Alpine.js Normally

Alpine.js is available globally as `window.Alpine`:

```html
<div x-data="{ open: false }">
    <button @click="open = !open">Toggle</button>
    <div x-show="open">Content here</div>
</div>
```

## 🎯 Usage Examples

### Mobile Menu with Alpine.js

```html
<nav x-data="{ mobileMenuOpen: false }">
    <!-- Toggle Button -->
    <button @click="mobileMenuOpen = !mobileMenuOpen">
        <span x-show="!mobileMenuOpen">☰</span>
        <span x-show="mobileMenuOpen">✕</span>
    </button>
    
    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" 
         x-cloak
         x-transition>
        <a href="/">Home</a>
        <a href="/products">Products</a>
        <a href="/services">Services</a>
    </div>
</nav>
```

### Image Lightbox

```html
<div x-data="{ lightbox: false, currentImage: '' }">
    <!-- Thumbnail -->
    <img src="thumb.jpg" 
         @click="lightbox = true; currentImage = 'full.jpg'"
         class="cursor-pointer">
    
    <!-- Lightbox -->
    <div x-show="lightbox" 
         x-cloak
         @click.away="lightbox = false"
         @keydown.escape.window="lightbox = false"
         class="fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center">
        <img :src="currentImage" class="max-w-full max-h-full">
    </div>
</div>
```

### Form with Validation

```html
<form x-data="{ submitted: false }" 
      @submit.prevent="submitted = true">
    <input type="email" required>
    <button type="submit">Submit</button>
    
    <div x-show="submitted" x-cloak x-transition>
        Thank you! Your message has been sent.
    </div>
</form>
```

## 🎨 Alpine.js Directives

| Directive | Purpose |
|-----------|---------|
| `x-data` | Declare component state |
| `x-show` | Toggle visibility |
| `x-if` | Conditional rendering (removes from DOM) |
| `x-for` | Loop through items |
| `x-on` or `@` | Event listeners |
| `x-bind` or `:` | Bind attributes |
| `x-model` | Two-way data binding |
| `x-text` | Set text content |
| `x-html` | Set HTML content |
| `x-cloak` | Hide until Alpine loads |
| `x-transition` | Add transitions |

## 🔧 Advanced Configuration

### Add Alpine.js Plugins

Edit `src/app.js`:

```javascript
import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';

// Register plugins
Alpine.plugin(intersect);

// Make Alpine available globally
window.Alpine = Alpine;

// Start Alpine
Alpine.start();
```

Then install the plugin:
```bash
npm install @alpinejs/intersect
```

### Custom Alpine Components

```javascript
// src/app.js
import Alpine from 'alpinejs';

// Register a magic helper
Alpine.magic('clipboard', () => {
    return subject => navigator.clipboard.writeText(subject);
});

// Register a directive
Alpine.directive('uppercase', (el) => {
    el.textContent = el.textContent.toUpperCase();
});

window.Alpine = Alpine;
Alpine.start();
```

## 📊 Comparison: CDN vs Bundled

| Feature | CDN | Bundled |
|---------|-----|---------|
| File Size | ~15KB (gzip) | 43.7KB (minified) |
| Cache Control | External | Full control |
| Offline | ❌ | ✅ |
| Custom Plugins | Limited | Full support |
| Version Control | External | Locked |

## 🚀 Development Workflow

### Daily Development

```bash
# Start watch mode (both CSS and JS)
npm run dev
```

This will:
- Watch `src/input.css` for Tailwind changes
- Watch `src/app.js` for Alpine.js changes
- Automatically rebuild on save

### Production Build

```bash
# Build everything for production
npm run build
```

This will:
- Build and minify Tailwind CSS → `public/assets/css/output.css`
- Bundle and minify Alpine.js → `public/assets/js/app.js`

## 📁 Project Structure

```
redesign_dimgent_com/
├── src/
│   ├── input.css       # Tailwind CSS source
│   └── app.js          # Alpine.js entry point
├── public/
│   └── assets/
│       ├── css/
│       │   └── output.css   # Built CSS
│       └── js/
│           └── app.js       # Built JavaScript
├── package.json
└── .gitignore
```

## 🎯 Complete HTML Template

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dimgent Technologies</title>
    
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="/assets/css/output.css">
    
    <!-- Alpine.js -->
    <script defer src="/assets/js/app.js"></script>
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body>
    <div x-data="{ message: 'Hello from Alpine.js!' }">
        <h1 x-text="message" class="text-2xl font-bold text-primary-600"></h1>
    </div>
</body>
</html>
```

## ⚙️ Build Configuration

### esbuild Options (package.json)

```json
{
  "build:js": "esbuild src/app.js --bundle --minify --outfile=public/assets/js/app.js"
}
```

Options explained:
- `--bundle`: Bundle all dependencies
- `--minify`: Minify output
- `--outfile`: Specify output location

### Watch Mode

```json
{
  "watch:js": "esbuild src/app.js --bundle --outfile=public/assets/js/app.js --watch"
}
```

Note: Watch mode skips minification for faster rebuilds.

## 🐛 Troubleshooting

**Alpine.js not working?**
- Check script tag: `<script defer src="/assets/js/app.js"></script>`
- Run: `npm run build:js`
- Clear browser cache
- Check browser console for errors

**Build fails?**
- Run: `npm install`
- Check Node version: `node --version` (14+)
- Delete `node_modules` and reinstall

**Changes not appearing?**
- Restart watch mode: Ctrl+C, then `npm run dev`
- Rebuild: `npm run build`
- Hard refresh browser: Ctrl+F5

## 📚 Resources

- [Alpine.js Documentation](https://alpinejs.dev/)
- [Alpine.js Examples](https://alpinejs.dev/examples)
- [esbuild Documentation](https://esbuild.github.io/)

## ✅ Next Steps

1. ✅ Alpine.js installed
2. ✅ Build system configured
3. 📝 Update views to use bundled JavaScript
4. 🎨 Add Alpine.js components
5. 🚀 Run `npm run build` before deployment

---

**Status**: ✅ Ready to Use  
**Version**: Alpine.js v3.15.1  
**Bundler**: esbuild  
**Build Time**: 18ms  
**Output Size**: 43.7 KB (minified)
