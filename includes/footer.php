    </main>
    
    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Company Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">// <?php echo e(config('app')['name']); ?></h3>
                    <p class="text-gray-400 mb-2"><?php echo e(config('app')['tagline']); ?></p>
                    <div class="mt-4">
                        <p class="text-gray-400 mb-2">E-mail:</p>
                        <a href="mailto:<?php echo e(config('app')['email']); ?>" 
                           class="text-blue-400 hover:text-blue-300 transition-colors">
                            <?php echo e(config('app')['email']); ?>
                        </a>
                    </div>
                    <p class="text-gray-400 mt-4"><?php echo e(config('app')['location']); ?></p>
                </div>
                
                <!-- Site Map -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Site Map</h3>
                    <ul class="space-y-2">
                        <?php foreach (config('app')['menu'] as $item): ?>
                            <li>
                                <a href="<?php echo e($item['url']); ?>" 
                                   class="text-gray-400 hover:text-white transition-colors">
                                    <?php echo e($item['name']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                
                <!-- Additional Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">About Us</h3>
                    <ul class="space-y-2 text-gray-400 text-sm">
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
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400 text-sm">
                <p>&copy; <?php echo date('Y'); ?> <?php echo e(config('app')['name']); ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
</body>
</html>
