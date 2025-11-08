<!-- Navigation -->
<nav class="bg-white shadow-md sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="flex items-center space-x-3">
                    <img src="/assets/images/logo.png" alt="<?= $this->e($config['site']['name']) ?>" class="h-10 w-auto">
                    <div class="hidden sm:block">
                        <div class="text-xl font-bold text-gray-900"><?= $this->e($config['site']['name']) ?></div>
                        <div class="text-xs text-gray-600"><?= $this->e($config['site']['tagline']) ?></div>
                    </div>
                </a>
            </div>
            
            <!-- Desktop Navigation -->
            <div class="hidden md:flex md:space-x-8">
                <?php foreach ($config['navigation'] as $item): ?>
                    <a href="<?= $this->e($item['url']) ?>" 
                       class="<?= $currentPath === $item['url'] ? 'border-primary-500 text-primary-600' : 'border-transparent text-gray-700 hover:border-gray-300 hover:text-gray-900' ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors">
                        <?= $this->e($item['name']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
            
            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        type="button" 
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-gray-900 hover:bg-gray-100">
                    <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileMenuOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile menu -->
    <div x-show="mobileMenuOpen" x-cloak x-transition class="md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <?php foreach ($config['navigation'] as $item): ?>
                <a href="<?= $this->e($item['url']) ?>" 
                   class="<?= $currentPath === $item['url'] ? 'bg-primary-50 border-primary-500 text-primary-700' : 'border-transparent text-gray-700 hover:bg-gray-50' ?> block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                    <?= $this->e($item['name']) ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</nav>
