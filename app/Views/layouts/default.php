<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? $config['site']['title'] ?></title>
    <meta name="description" content="<?= $meta_description ?? $config['site']['description'] ?>">
    <meta name="keywords" content="<?= $meta_keywords ?? $config['site']['keywords'] ?>">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Google Analytics -->
    <?php if (!empty($config['site']['ga_tracking_id'])): ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= $config['site']['ga_tracking_id'] ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?= $config['site']['ga_tracking_id'] ?>');
    </script>
    <?php endif; ?>
    
    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e3a8a',
                            900: '#1e293b',
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">
    
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <a href="/" class="flex items-center space-x-3">
                        <img src="/assets/images/logo.png" alt="Dimgent Technologies Logo" class="h-12 w-auto">
                        <div class="hidden md:block">
                            <div class="text-xl font-bold text-primary-800">Dimgent Technologies</div>
                            <div class="text-sm text-gray-600">Electronics Development</div>
                        </div>
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-1">
                    <?php foreach ($config['menu'] as $item): ?>
                        <a href="<?= $item['url'] ?>" 
                           class="px-4 py-2 rounded-lg transition-colors <?= ($page ?? '') === $item['active'] ? 'bg-primary-600 text-white' : 'text-gray-700 hover:bg-primary-50 hover:text-primary-700' ?>">
                            <?= $item['title'] ?>
                        </a>
                    <?php endforeach; ?>
                </div>
                
                <!-- Language Selector -->
                <div class="hidden md:block">
                    <select onchange="window.location.href=this.value" 
                            class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <option value="">Languages</option>
                        <?php foreach ($config['languages'] as $code => $lang): ?>
                            <option value="<?= $lang['url'] ?>"><?= $lang['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="lg:hidden p-2 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Mobile Navigation -->
            <div x-show="mobileMenuOpen" 
                 x-cloak
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95"
                 class="lg:hidden mt-4 pb-4 space-y-2">
                <?php foreach ($config['menu'] as $item): ?>
                    <a href="<?= $item['url'] ?>" 
                       class="block px-4 py-3 rounded-lg transition-colors <?= ($page ?? '') === $item['active'] ? 'bg-primary-600 text-white' : 'text-gray-700 hover:bg-primary-50' ?>">
                        <?= $item['title'] ?>
                    </a>
                <?php endforeach; ?>
                
                <!-- Mobile Language Selector -->
                <div class="px-4 pt-2">
                    <select onchange="window.location.href=this.value" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <option value="">Languages</option>
                        <?php foreach ($config['languages'] as $code => $lang): ?>
                            <option value="<?= $lang['url'] ?>"><?= $lang['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="min-h-screen">
        <?= $content ?>
    </main>

    <!-- Footer -->
    <footer class="bg-primary-900 text-white mt-20">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Company Info -->
                <div>
                    <h3 class="text-xl font-bold mb-4">// Dimgent Technologies</h3>
                    <p class="text-primary-100 mb-4">Electronics Development</p>
                    <div class="space-y-2 text-primary-200">
                        <p><strong>E-mail:</strong></p>
                        <p><?= $config['site']['email'] ?></p>
                        <p class="mt-4"><strong>Location:</strong></p>
                        <p><?= $config['site']['location'] ?></p>
                    </div>
                </div>
                
                <!-- Site Map -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Site Map</h3>
                    <ul class="space-y-2">
                        <?php foreach ($config['menu'] as $item): ?>
                            <li>
                                <a href="<?= $item['url'] ?>" class="text-primary-200 hover:text-white transition-colors">
                                    <?= $item['title'] ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                
                <!-- Additional Info -->
                <div>
                    <h3 class="text-xl font-bold mb-4">About Us</h3>
                    <ul class="space-y-2 text-primary-200">
                        <li>More than 20 years of experience</li>
                        <li>More than 50 successfully completed projects</li>
                        <li>Experienced specialists</li>
                        <li>Guaranteed quality</li>
                        <li>Short turn-around times</li>
                        <li>Cost effective</li>
                    </ul>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="border-t border-primary-800 mt-8 pt-8 text-center text-primary-300 text-sm">
                <p>&copy; <?= date('Y') ?> Dimgent Technologies. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
