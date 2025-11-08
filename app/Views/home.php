<?php $this->layout('layouts::base', ['title' => $title, 'metaDescription' => $metaDescription]) ?>

<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary-600 to-primary-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">
                <?= $this->e($heroTitle) ?>
            </h1>
            <p class="text-xl md:text-2xl text-primary-100 mb-6">
                <?= $this->e($heroSubtitle) ?>
            </p>
            <p class="text-lg text-primary-50 max-w-3xl mx-auto mb-8">
                <?= $this->e($heroDescription) ?>
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
        <p class="text-gray-600 max-w-2xl mx-auto">
            With over 20 years of experience, we deliver cost-effective, high-quality electronic device development.
        </p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <?php foreach ($features as $feature): ?>
            <?= $this->insert('components::feature-card', ['feature' => $feature]) ?>
        <?php endforeach; ?>
    </div>
</div>

<!-- Services Overview -->
<div class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Services</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Comprehensive electronic device development from concept to finished product
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($services as $service): ?>
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-primary-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-gray-700"><?= $this->e($service) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-8">
            <a href="/services" class="inline-block bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transition-colors">
                Learn More About Our Services
            </a>
        </div>
    </div>
</div>

<!-- Featured Product -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="bg-white rounded-xl shadow-xl overflow-hidden">
        <div class="md:flex">
            <div class="md:w-1/2 bg-gradient-to-br from-primary-500 to-primary-700 p-12 text-white flex items-center">
                <div>
                    <span class="inline-block bg-white bg-opacity-20 text-white px-3 py-1 rounded-full text-sm font-semibold mb-4">
                        Featured Product
                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold mb-4"><?= $this->e($featuredProduct['name']) ?></h2>
                    <p class="text-xl text-primary-100 mb-4"><?= $this->e($featuredProduct['tagline']) ?></p>
                    <p class="text-primary-50 mb-6"><?= $this->e($featuredProduct['description']) ?></p>
                    <a href="<?= $this->e($featuredProduct['url']) ?>" class="inline-block bg-white text-primary-600 px-6 py-3 rounded-lg font-semibold hover:bg-primary-50 transition-colors">
                        View Product Details
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 bg-gray-50 p-12 flex items-center justify-center">
                <div class="text-center">
                    <svg class="w-48 h-48 mx-auto text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="bg-primary-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Start Your Project?</h2>
        <p class="text-xl text-primary-100 mb-8 max-w-2xl mx-auto">
            Let's discuss how we can help bring your electronic device concept to life
        </p>
        <a href="/contacts" class="inline-block bg-white text-primary-600 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-primary-50 transition-colors">
            Get in Touch
        </a>
    </div>
</div>
