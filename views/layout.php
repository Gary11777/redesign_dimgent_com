<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->e($title ?? 'Dimgent Technologies') ?></title>
    <meta name="description" content="<?= $this->e($this->config('site.description', '')) ?>">
    <meta name="keywords" content="<?= $this->e($this->config('site.keywords', '')) ?>">
    
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="<?= $this->asset('assets/css/output.css') ?>">
    
    <!-- Alpine.js -->
    <script defer src="<?= $this->asset('assets/js/app.js') ?>"></script>
    
    <?php if (!empty($recaptcha_site_key ?? '')): ?>
    <!-- Google reCAPTCHA v3 -->
    <script src="https://www.google.com/recaptcha/api.js?render=<?= $this->e($recaptcha_site_key) ?>"></script>
    <?php endif; ?>
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-50">
    <div x-data="{ mobileMenuOpen: false }">
        <!-- Header -->
        <header class="bg-blue-600 shadow-lg fixed top-0 left-0 right-0 z-50">
            <nav class="container mx-auto px-4">
                <div class="flex items-center justify-between h-16">
                    <!-- Logo -->
                    <a href="/" class="flex items-center">
                        <img src="<?= $this->image('logo.png') ?>" alt="<?= $this->e($this->config('site.name', '')) ?>" class="h-10 w-auto">
                    </a>

                    <!-- Desktop Menu -->
                    <div class="hidden md:flex items-center space-x-1">
                        <a href="/" class="px-4 py-2 text-white <?= ($page ?? '') === 'home' ? 'bg-blue-700 rounded' : 'hover:bg-blue-700 rounded' ?>">
                            Home
                        </a>
                        <a href="/products" class="px-4 py-2 text-white <?= ($page ?? '') === 'products' ? 'bg-blue-700 rounded' : 'hover:bg-blue-700 rounded' ?>">
                            Products
                        </a>
                        <a href="/services" class="px-4 py-2 text-white <?= ($page ?? '') === 'services' ? 'bg-blue-700 rounded' : 'hover:bg-blue-700 rounded' ?>">
                            Services
                        </a>
                        <a href="/projects" class="px-4 py-2 text-white <?= ($page ?? '') === 'projects' ? 'bg-blue-700 rounded' : 'hover:bg-blue-700 rounded' ?>">
                            Projects
                        </a>
                        <a href="/contacts" class="px-4 py-2 text-white <?= ($page ?? '') === 'contacts' ? 'bg-blue-700 rounded' : 'hover:bg-blue-700 rounded' ?>">
                            Contacts
                        </a>
                        <a href="/about" class="px-4 py-2 text-white <?= ($page ?? '') === 'about' ? 'bg-blue-700 rounded' : 'hover:bg-blue-700 rounded' ?>">
                            About Us
                        </a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-white p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                <!-- Mobile Menu -->
                <div x-show="mobileMenuOpen" x-cloak class="md:hidden pb-4">
                    <a href="/" class="block px-4 py-2 text-white <?= ($page ?? '') === 'home' ? 'bg-blue-700' : 'hover:bg-blue-700' ?> rounded">
                        Home
                    </a>
                    <a href="/products" class="block px-4 py-2 text-white <?= ($page ?? '') === 'products' ? 'bg-blue-700' : 'hover:bg-blue-700' ?> rounded">
                        Products
                    </a>
                    <a href="/services" class="block px-4 py-2 text-white <?= ($page ?? '') === 'services' ? 'bg-blue-700' : 'hover:bg-blue-700' ?> rounded">
                        Services
                    </a>
                    <a href="/projects" class="block px-4 py-2 text-white <?= ($page ?? '') === 'projects' ? 'bg-blue-700' : 'hover:bg-blue-700' ?> rounded">
                        Projects
                    </a>
                    <a href="/contacts" class="block px-4 py-2 text-white <?= ($page ?? '') === 'contacts' ? 'bg-blue-700' : 'hover:bg-blue-700' ?> rounded">
                        Contacts
                    </a>
                    <a href="/about" class="block px-4 py-2 text-white <?= ($page ?? '') === 'about' ? 'bg-blue-700' : 'hover:bg-blue-700' ?> rounded">
                        About Us
                    </a>
                </div>
            </nav>
        </header>

        <!-- Main Content -->
        <main class="pt-16 min-h-screen">
            <?= $this->section('main') ?>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-gray-300 mt-12">
            <div class="container mx-auto px-4 py-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Company Info -->
                    <div>
                        <p class="font-semibold text-white mb-2">// <?= $this->e($this->config('site.name', '')) ?></p>
                        <p class="mb-2"><?= $this->e($this->config('site.tagline', '')) ?></p>
                        <p class="mb-2">E-mail: <?= $this->e($this->config('site.email', '')) ?></p>
                        <p><?= $this->e($this->config('site.location', '')) ?></p>
                    </div>

                    <!-- Site Map -->
                    <div>
                        <p class="font-semibold mb-2">Site Map</p>
                        <ul class="space-y-1">
                            <li><a href="/" class="hover:text-white">Home</a></li>
                            <li><a href="/products" class="hover:text-white">Products</a></li>
                            <li><a href="/services" class="hover:text-white">Services</a></li>
                            <li><a href="/projects" class="hover:text-white">Projects</a></li>
                            <li><a href="/contacts" class="hover:text-white">Contacts</a></li>
                            <li><a href="/about" class="hover:text-white">About Us</a></li>
                        </ul>
                    </div>

                    <!-- Credits -->
                    <div class="flex items-end">
                        <p class="text-sm">
                            <a href="http://www.sitestar.by" class="hover:text-white">Website design by Sitestar.by</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>

