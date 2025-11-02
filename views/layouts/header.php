<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= View::escape($title ?? 'Dimgent Technologies') ?></title>
    <meta name="description" content="<?= View::escape(View::config('site.description', '')) ?>">
    <meta name="keywords" content="<?= View::escape(View::config('site.keywords', '')) ?>">
    <link rel="icon" type="image/x-icon" href="<?= View::asset('old_version_dimgent_com/favicon.ico') ?>">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Google reCAPTCHA v3 -->
    <?php
    if (!isset($recaptchaSiteKey)) {
        require_once __DIR__ . '/../../core/Recaptcha.php';
        $recaptchaSiteKey = Recaptcha::getSiteKey();
    }
    if (!empty($recaptchaSiteKey)): ?>
    <script src="https://www.google.com/recaptcha/api.js?render=<?= View::escape($recaptchaSiteKey) ?>"></script>
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
                        <img src="<?= View::image('logo.png') ?>" alt="Dimgent Technologies" class="h-10 w-auto">
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

                    <!-- Language Selector -->
                    <div class="hidden md:block">
                        <select class="text-sm bg-blue-700 text-white px-2 py-1 rounded border-0" onchange="if(this.value) window.location.href=this.value">
                            <option>Languages</option>
                            <option value="<?= View::config('site.language_selector.en', '#') ?>">English</option>
                            <option value="<?= View::config('site.language_selector.pl', '#') ?>">Polska</option>
                            <option value="<?= View::config('site.language_selector.ru', '#') ?>">Русский (ru)</option>
                            <option value="<?= View::config('site.language_selector.by', '#') ?>">Русский (by)</option>
                        </select>
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
                    <select class="mt-2 ml-4 text-sm bg-blue-700 text-white px-2 py-1 rounded border-0" onchange="if(this.value) window.location.href=this.value">
                        <option>Languages</option>
                        <option value="<?= View::config('site.language_selector.en', '#') ?>">English</option>
                        <option value="<?= View::config('site.language_selector.pl', '#') ?>">Polska</option>
                        <option value="<?= View::config('site.language_selector.ru', '#') ?>">Русский (ru)</option>
                        <option value="<?= View::config('site.language_selector.by', '#') ?>">Русский (by)</option>
                    </select>
                </div>
            </nav>
        </header>

        <!-- Main Content -->
        <main class="pt-16 min-h-screen">
            <?php
            // Content will be inserted here
            ?>

