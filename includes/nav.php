<?php
/**
 * Navigation Template
 * Main navigation menu for all pages
 */
?>
<!-- Navigation -->
<nav class="bg-dimgent-blue fixed w-full top-0 z-50 shadow-lg" x-data="{ mobileMenuOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="index.php" class="flex items-center">
                    <img src="<?php echo asset('images/logo.png'); ?>" alt="<?php echo e($app_config['site_name']); ?>" class="h-10 w-auto">
                </a>
            </div>
            
            <!-- Desktop Navigation -->
            <div class="hidden md:flex md:items-center md:space-x-1">
                <a href="index.php" class="px-4 py-2 rounded-md text-sm font-medium transition-colors <?php echo is_active_page('home') ? 'bg-dimgent-blue-dark text-white' : 'text-gray-900 hover:bg-dimgent-blue-dark hover:text-white'; ?>">
                    Home
                </a>
                <a href="products.php" class="px-4 py-2 rounded-md text-sm font-medium transition-colors <?php echo is_active_page('products') ? 'bg-dimgent-blue-dark text-white' : 'text-gray-900 hover:bg-dimgent-blue-dark hover:text-white'; ?>">
                    Products
                </a>
                <a href="services.php" class="px-4 py-2 rounded-md text-sm font-medium transition-colors <?php echo is_active_page('services') ? 'bg-dimgent-blue-dark text-white' : 'text-gray-900 hover:bg-dimgent-blue-dark hover:text-white'; ?>">
                    Services
                </a>
                <a href="projects.php" class="px-4 py-2 rounded-md text-sm font-medium transition-colors <?php echo is_active_page('projects') ? 'bg-dimgent-blue-dark text-white' : 'text-gray-900 hover:bg-dimgent-blue-dark hover:text-white'; ?>">
                    Projects
                </a>
                <a href="contacts.php" class="px-4 py-2 rounded-md text-sm font-medium transition-colors <?php echo is_active_page('contacts') ? 'bg-dimgent-blue-dark text-white' : 'text-gray-900 hover:bg-dimgent-blue-dark hover:text-white'; ?>">
                    Contacts
                </a>
                <a href="about.php" class="px-4 py-2 rounded-md text-sm font-medium transition-colors <?php echo is_active_page('about') ? 'bg-dimgent-blue-dark text-white' : 'text-gray-900 hover:bg-dimgent-blue-dark hover:text-white'; ?>">
                    About Us
                </a>
            </div>
            
            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-900 hover:text-white hover:bg-dimgent-blue-dark focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white transition-colors">
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon when menu is closed -->
                    <svg x-show="!mobileMenuOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon when menu is open -->
                    <svg x-show="mobileMenuOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile menu -->
    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95" class="md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-dimgent-blue">
            <a href="index.php" class="block px-3 py-2 rounded-md text-base font-medium <?php echo is_active_page('home') ? 'bg-dimgent-blue-dark text-white' : 'text-gray-900 hover:bg-dimgent-blue-dark hover:text-white'; ?>">
                Home
            </a>
            <a href="products.php" class="block px-3 py-2 rounded-md text-base font-medium <?php echo is_active_page('products') ? 'bg-dimgent-blue-dark text-white' : 'text-gray-900 hover:bg-dimgent-blue-dark hover:text-white'; ?>">
                Products
            </a>
            <a href="services.php" class="block px-3 py-2 rounded-md text-base font-medium <?php echo is_active_page('services') ? 'bg-dimgent-blue-dark text-white' : 'text-gray-900 hover:bg-dimgent-blue-dark hover:text-white'; ?>">
                Services
            </a>
            <a href="projects.php" class="block px-3 py-2 rounded-md text-base font-medium <?php echo is_active_page('projects') ? 'bg-dimgent-blue-dark text-white' : 'text-gray-900 hover:bg-dimgent-blue-dark hover:text-white'; ?>">
                Projects
            </a>
            <a href="contacts.php" class="block px-3 py-2 rounded-md text-base font-medium <?php echo is_active_page('contacts') ? 'bg-dimgent-blue-dark text-white' : 'text-gray-900 hover:bg-dimgent-blue-dark hover:text-white'; ?>">
                Contacts
            </a>
            <a href="about.php" class="block px-3 py-2 rounded-md text-base font-medium <?php echo is_active_page('about') ? 'bg-dimgent-blue-dark text-white' : 'text-gray-900 hover:bg-dimgent-blue-dark hover:text-white'; ?>">
                About Us
            </a>
        </div>
    </div>
</nav>

<!-- Spacer for fixed nav -->
<div class="h-16"></div>
