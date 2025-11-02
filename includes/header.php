<?php
/**
 * Header Template
 * Common header for all pages
 */

$appConfig = config('app');
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    
    <title><?php echo e($pageTitle ?? $appConfig['name']); ?></title>
    
    <?php if (isset($pageDescription)): ?>
    <meta name="description" content="<?php echo e($pageDescription); ?>">
    <?php endif; ?>
    
    <?php if (isset($pageKeywords)): ?>
    <meta name="keywords" content="<?php echo e($pageKeywords); ?>">
    <?php endif; ?>
    
    <link rel="icon" type="image/x-icon" href="<?php echo asset('favicon.ico'); ?>">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <?php if (isset($includeRecaptcha) && $includeRecaptcha): ?>
    <!-- Google reCAPTCHA v3 -->
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo config('recaptcha')['site_key']; ?>"></script>
    <?php endif; ?>
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    
    <!-- Navigation -->
    <nav class="bg-white shadow-lg" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/" class="flex items-center">
                        <img src="<?php echo asset('assets/images/logo.png'); ?>" 
                             alt="<?php echo e($appConfig['name']); ?>" 
                             class="h-12 w-auto">
                    </a>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <?php foreach ($appConfig['menu'] as $item): ?>
                        <a href="<?php echo e($item['url']); ?>" 
                           class="<?php echo isActivePage($item['url']) ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700 hover:text-blue-600'; ?> px-3 py-2 text-sm font-medium transition-colors duration-200">
                            <?php echo e($item['name']); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
                
                <!-- Language Selector (Desktop) -->
                <div class="hidden md:flex items-center">
                    <select onchange="window.location.href=this.value" 
                            class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Languages</option>
                        <?php foreach ($appConfig['languages'] as $code => $lang): ?>
                            <option value="<?php echo e($lang['url']); ?>"><?php echo e($lang['name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" 
                            class="text-gray-700 hover:text-blue-600 focus:outline-none focus:text-blue-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95"
             class="md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t border-gray-200">
                <?php foreach ($appConfig['menu'] as $item): ?>
                    <a href="<?php echo e($item['url']); ?>" 
                       class="<?php echo isActivePage($item['url']) ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-50'; ?> block px-3 py-2 rounded-md text-base font-medium">
                        <?php echo e($item['name']); ?>
                    </a>
                <?php endforeach; ?>
                
                <!-- Language Selector (Mobile) -->
                <div class="px-3 py-2">
                    <select onchange="window.location.href=this.value" 
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Languages</option>
                        <?php foreach ($appConfig['languages'] as $code => $lang): ?>
                            <option value="<?php echo e($lang['url']); ?>"><?php echo e($lang['name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Flash Messages -->
    <?php if ($flash = getFlash()): ?>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="<?php echo $flash['type'] === 'success' ? 'bg-green-50 border-green-500 text-green-800' : 'bg-red-50 border-red-500 text-red-800'; ?> border-l-4 p-4 rounded-md">
            <p class="font-medium"><?php echo e($flash['message']); ?></p>
        </div>
    </div>
    <?php endif; ?>
    
    <!-- Main Content -->
    <main class="min-h-screen">
