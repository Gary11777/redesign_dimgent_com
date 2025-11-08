<?php $currentPage = $page ?? ''; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->e($title ?? ($site['name'] ?? 'Dimgent Technologies')) ?></title>
    <meta name="description" content="<?= $this->e($site['description'] ?? '') ?>">
    <meta name="keywords" content="<?= $this->e($site['keywords'] ?? '') ?>">

    <link rel="icon" type="image/png" href="<?= $this->logo() ?>">

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="<?= $this->asset('assets/css/output.css') ?>">

    <!-- Alpine.js -->
    <script defer src="<?= $this->asset('assets/js/app.js') ?>"></script>

    <?php if (!empty($recaptcha_site_key ?? '')): ?>
        <script src="https://www.google.com/recaptcha/api.js?render=<?= $this->e($recaptcha_site_key) ?>" defer></script>
    <?php endif; ?>
</head>
<body class="bg-gray-50 text-gray-900">
    <div x-data="{ mobileMenuOpen: false }" class="min-h-screen">
        <header class="bg-primary-600 text-white shadow-lg fixed top-0 inset-x-0 z-50">
            <div class="max-w-6xl mx-auto px-4">
                <div class="flex items-center justify-between h-16">
                    <a href="/" class="flex items-center space-x-3">
                        <img src="<?= $this->logo() ?>" alt="<?= $this->e($site['name'] ?? '') ?>" class="h-10 w-auto">
                        <span class="text-lg font-semibold hidden sm:block"><?= $this->e($site['name'] ?? '') ?></span>
                    </a>
                    <nav class="hidden md:flex items-center space-x-2 text-sm font-medium">
                        <?php
                        $links = [
                            '/' => 'Home',
                            '/products' => 'Products',
                            '/services' => 'Services',
                            '/projects' => 'Projects',
                            '/contacts' => 'Contacts',
                            '/about' => 'About',
                        ];
                        foreach ($links as $href => $label):
                            $active = $currentPage === trim($href, '/') || ($currentPage === 'home' && $href === '/');
                        ?>
                            <a href="<?= $href ?>" class="px-4 py-2 rounded transition <?= $active ? 'bg-primary-700 text-white' : 'text-white/80 hover:bg-primary-500 hover:text-white' ?>">
                                <?= $this->e($label) ?>
                            </a>
                        <?php endforeach; ?>
                    </nav>
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 rounded hover:bg-primary-500 focus:outline-none focus:ring">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                <div x-show="mobileMenuOpen" x-transition x-cloak class="md:hidden pb-4 space-y-1">
                    <?php foreach ($links as $href => $label): ?>
                        <?php $active = $currentPage === trim($href, '/') || ($currentPage === 'home' && $href === '/'); ?>
                        <a href="<?= $href ?>" class="block px-4 py-2 rounded <?= $active ? 'bg-primary-700 text-white' : 'text-white/80 hover:bg-primary-500 hover:text-white' ?>">
                            <?= $this->e($label) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </header>

        <main class="pt-20 md:pt-24 pb-16">
            <?= $this->section('main') ?>
        </main>

        <footer class="bg-gray-900 text-gray-300 py-10">
            <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8 text-sm">
                <div>
                    <h3 class="text-white font-semibold mb-3">// <?= $this->e($site['name'] ?? '') ?></h3>
                    <p class="mb-1"><?= $this->e($site['tagline'] ?? '') ?></p>
                    <p class="mb-1">E-mail: <a href="mailto:<?= $this->e($site['email'] ?? '') ?>" class="text-primary-300 hover:underline"><?= $this->e($site['email'] ?? '') ?></a></p>
                    <p><?= $this->e($site['location'] ?? '') ?></p>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-3">Site Map</h3>
                    <ul class="space-y-2">
                        <?php foreach ($links as $href => $label): ?>
                            <li><a href="<?= $href ?>" class="hover:text-primary-300 transition"><?= $this->e($label) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="flex md:justify-end">
                    <p class="text-xs text-gray-500 self-end">Website design by Sitestar.by</p>
                </div>
            </div>
        </footer>
    </div>

    <?php if (!empty($recaptcha_site_key ?? '')): ?>
    <script>
        document.addEventListener('alpine:init', () => {
            document.addEventListener('submit', function (event) {
                const form = event.target.closest('form[data-recaptcha="true"]');
                if (!form) return;
                event.preventDefault();
                grecaptcha.ready(function () {
                    grecaptcha.execute('<?= $this->e($recaptcha_site_key) ?>', { action: 'submit' }).then(function (token) {
                        form.querySelector('input[name="g-recaptcha-response"]').value = token;
                        form.submit();
                    });
                });
            }, { capture: true });
        });
    </script>
    <?php endif; ?>
</body>
</html>
