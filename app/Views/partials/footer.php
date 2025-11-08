<!-- Footer -->
<footer class="bg-gray-900 text-white mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Company Info -->
            <div>
                <h3 class="text-xl font-bold mb-4"><?= $this->e($config['site']['name']) ?></h3>
                <p class="text-gray-400 mb-4"><?= $this->e($config['site']['tagline']) ?></p>
                <p class="text-gray-400 text-sm">
                    <?= $this->e($config['site']['description']) ?>
                </p>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <?php foreach ($config['navigation'] as $item): ?>
                        <li>
                            <a href="<?= $this->e($item['url']) ?>" class="text-gray-400 hover:text-white transition-colors">
                                <?= $this->e($item['name']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Contact</h4>
                <ul class="space-y-2 text-gray-400">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <?= $this->e($config['site']['location']) ?>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <a href="mailto:<?= $this->e($config['site']['email']) ?>" class="hover:text-white transition-colors">
                            <?= $this->e($config['site']['email']) ?>
                        </a>
                    </li>
                </ul>
            </div>
            
        </div>
        
        <!-- Copyright -->
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400 text-sm">
            <p>&copy; <?= date('Y') ?> <?= $this->e($config['site']['name']) ?>. All rights reserved.</p>
        </div>
    </div>
</footer>
