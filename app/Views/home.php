<?php require_once __DIR__ . '/partials/header.php'; ?>

<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary-600 to-primary-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">
                <?= htmlspecialchars($heroTitle) ?>
            </h1>
            <p class="text-xl md:text-2xl text-primary-100 mb-6">
                <?= htmlspecialchars($heroSubtitle) ?>
            </p>
            <p class="text-lg text-primary-50 max-w-3xl mx-auto mb-8">
                <?= htmlspecialchars($heroDescription) ?>
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/services" class="inline-block bg-white text-primary-600 px-8 py-3 rounded-lg font-semibold hover:bg-primary-50 transition-colors">
                    Our Services
                </a>
                <a href="/contacts" class="inline-block bg-primary-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-400 transition-colors border-2 border-white">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Choose Us</h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            We are a development center with extensive experience in creating custom electronic devices
        </p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <?php foreach ($config['features'] as $feature): ?>
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                <div class="bg-primary-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <?php if ($feature['icon'] === 'award'): ?>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        <?php elseif ($feature['icon'] === 'check-circle'): ?>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        <?php elseif ($feature['icon'] === 'dollar-sign'): ?>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        <?php elseif ($feature['icon'] === 'zap'): ?>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        <?php endif; ?>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2"><?= htmlspecialchars($feature['title']) ?></h3>
                <p class="text-gray-600"><?= htmlspecialchars($feature['description']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Services Overview -->
<div class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Services</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                We offer full-cycle development or individual phases
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($config['services_list'] as $service): ?>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-primary-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-gray-800 font-medium"><?= htmlspecialchars($service) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-10">
            <a href="/services" class="inline-block bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transition-colors">
                Learn More About Our Services
            </a>
        </div>
    </div>
</div>

<!-- Featured Product -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="bg-white rounded-lg shadow-xl overflow-hidden">
        <div class="md:flex">
            <div class="md:w-1/2">
                <img src="/assets/images/products/main_photo_of_garand101.jpg" 
                     alt="Garand 101" 
                     class="w-full h-full object-cover">
            </div>
            <div class="md:w-1/2 p-8 md:p-12">
                <div class="text-sm text-primary-600 font-semibold mb-2">FEATURED PRODUCT</div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Garand 101</h2>
                <p class="text-lg text-gray-600 mb-6">
                    High-resolution fluxgate magnetometer-gradiometer designed to measure disruptions in the Earth's magnetic field caused by ferromagnetic objects.
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-primary-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-gray-700">Innovative magnetic field measurement technology</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-primary-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-gray-700">User-friendly and lightweight design</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-primary-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-gray-700">Affordable and reliable</span>
                    </li>
                </ul>
                <a href="/products" class="inline-block bg-primary-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-700 transition-colors">
                    View Product Details
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Start Your Project?</h2>
        <p class="text-xl text-primary-100 mb-8 max-w-2xl mx-auto">
            Contact us today to discuss your electronic device development needs
        </p>
        <a href="/contacts" class="inline-block bg-white text-primary-600 px-8 py-3 rounded-lg font-semibold hover:bg-primary-50 transition-colors">
            Get in Touch
        </a>
    </div>
</div>

<?php require_once __DIR__ . '/partials/footer.php'; ?>
