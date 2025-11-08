<?php $this->layout('layouts::base', ['title' => $title, 'metaDescription' => $metaDescription]) ?>

<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4"><?= $this->e($pageTitle) ?></h1>
        <p class="text-xl text-primary-100"><?= $this->e($pageSubtitle) ?></p>
    </div>
</div>

<!-- Intro -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="max-w-3xl mx-auto text-center mb-16">
        <p class="text-lg text-gray-700 leading-relaxed"><?= $this->e($intro) ?></p>
    </div>

    <!-- Services List -->
    <div class="bg-white rounded-xl shadow-lg p-8 mb-12">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">What We Offer</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <?php foreach ($services as $service): ?>
                <div class="flex items-start p-4 bg-gray-50 rounded-lg hover:bg-primary-50 transition-colors">
                    <svg class="w-6 h-6 text-primary-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-gray-700"><?= $this->e($service) ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Advantages -->
    <div class="mb-12">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Why Choose Us</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($advantages as $advantage): ?>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3"><?= $this->e($advantage['title']) ?></h3>
                    <p class="text-gray-600"><?= $this->e($advantage['description']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Our Aim -->
    <div class="bg-primary-50 border-l-4 border-primary-600 p-8 rounded-lg mb-12">
        <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Aim</h3>
        <ul class="space-y-3">
            <?php foreach ($aim as $item): ?>
                <li class="flex items-start">
                    <svg class="w-6 h-6 text-primary-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-gray-700"><?= $this->e($item) ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Distance Note -->
    <div class="bg-white rounded-xl shadow-lg p-8 text-center">
        <h3 class="text-2xl font-bold text-gray-900 mb-4">Is Distance a Problem? No!</h3>
        <p class="text-lg text-gray-700 mb-6"><?= $this->e($distanceNote) ?></p>
        <a href="/contacts" class="inline-block bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transition-colors">
            Get Started Today
        </a>
    </div>
</div>
