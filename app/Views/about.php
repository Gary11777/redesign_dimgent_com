<?php $this->layout('layouts::base', ['title' => $title, 'metaDescription' => $metaDescription]) ?>

<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4"><?= $this->e($pageTitle) ?></h1>
        <p class="text-xl text-primary-100"><?= $this->e($companyName) ?> - <?= $this->e($location) ?></p>
    </div>
</div>

<!-- Overview -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="max-w-3xl mx-auto text-center mb-16">
        <p class="text-xl text-gray-700 leading-relaxed"><?= $this->e($overview) ?></p>
    </div>

    <!-- Experience Stats -->
    <div class="bg-primary-50 rounded-xl p-12 mb-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Our Experience</h2>
                <p class="text-lg text-gray-700"><?= $this->e($experience['description']) ?></p>
            </div>
            <div class="grid grid-cols-2 gap-6 text-center">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-5xl font-bold text-primary-600 mb-2"><?= $this->e($experience['years']) ?></div>
                    <div class="text-gray-600">Years Experience</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-5xl font-bold text-primary-600 mb-2"><?= $this->e($experience['projects']) ?></div>
                    <div class="text-gray-600">Completed Projects</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Approach -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
        <div class="bg-white rounded-xl shadow-lg p-8">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Our Approach</h3>
            <ul class="space-y-4">
                <?php foreach ($approach as $item): ?>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-primary-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-gray-700"><?= $this->e($item) ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-8">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Our Aim</h3>
            <ul class="space-y-4">
                <?php foreach ($aim as $item): ?>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-primary-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-gray-700"><?= $this->e($item) ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <!-- Expertise -->
    <div class="bg-white rounded-xl shadow-lg p-8 mb-16">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Areas of Expertise</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <?php foreach ($expertise as $item): ?>
                <div class="flex items-start p-4 bg-gray-50 rounded-lg hover:bg-primary-50 transition-colors">
                    <svg class="w-5 h-5 text-primary-600 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                    <span class="text-gray-700"><?= $this->e($item) ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Values -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
        <?php foreach ($values as $value): ?>
            <div class="bg-gradient-to-br from-primary-500 to-primary-700 text-white p-8 rounded-xl shadow-lg">
                <h4 class="text-2xl font-bold mb-4"><?= $this->e($value['title']) ?></h4>
                <p class="text-primary-100"><?= $this->e($value['description']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- CTA -->
    <div class="bg-primary-50 border-l-4 border-primary-600 p-8 rounded-lg text-center">
        <h3 class="text-2xl font-bold text-gray-900 mb-4">Ready to Work With Us?</h3>
        <p class="text-lg text-gray-700 mb-6">
            We are happy to work on both large and small projects, for big or small enterprises.
        </p>
        <a href="/contacts" class="inline-block bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transition-colors">
            Get in Touch Today
        </a>
    </div>
</div>
