<?php
/**
 * Footer Template
 * Common footer section for all pages
 */
?>
<!-- Footer -->
<footer class="bg-dimgent-maroon text-gray-200 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Company Info -->
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">// <?php echo e($app_config['site_name']); ?></h3>
                <p class="mb-2"><?php echo e($app_config['site_tagline']); ?></p>
                <p class="text-sm mt-4">
                    <strong>E-mail:</strong><br>
                    <a href="mailto:<?php echo e($app_config['contact']['email']); ?>" class="hover:text-white transition-colors">
                        <?php echo e($app_config['contact']['email']); ?>
                    </a>
                </p>
                <p class="text-sm mt-2">
                    <strong>Location:</strong><br>
                    <?php echo e($app_config['contact']['location']); ?>
                </p>
            </div>
            
            <!-- Site Map -->
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Site Map</h3>
                <ul class="space-y-2">
                    <li><a href="index.php" class="hover:text-white transition-colors">Home</a></li>
                    <li><a href="products.php" class="hover:text-white transition-colors">Products</a></li>
                    <li><a href="services.php" class="hover:text-white transition-colors">Services</a></li>
                    <li><a href="projects.php" class="hover:text-white transition-colors">Projects</a></li>
                    <li><a href="contacts.php" class="hover:text-white transition-colors">Contacts</a></li>
                    <li><a href="about.php" class="hover:text-white transition-colors">About Us</a></li>
                </ul>
            </div>
            
            <!-- Additional Info -->
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Quick Facts</h3>
                <ul class="space-y-2 text-sm">
                    <li>✓ <?php echo e($app_config['stats']['years_experience']); ?> years of experience</li>
                    <li>✓ <?php echo e($app_config['stats']['projects_completed']); ?> successfully completed projects</li>
                    <li>✓ Experienced specialists</li>
                    <li>✓ Guaranteed quality</li>
                    <li>✓ Short turn-around times</li>
                    <li>✓ Cost effective</li>
                </ul>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="border-t border-gray-600 mt-8 pt-8 text-sm text-center">
            <p>&copy; <?php echo date('Y'); ?> <?php echo e($app_config['site_name']); ?>. All rights reserved.</p>
        </div>
    </div>
</footer>

</body>
</html>
