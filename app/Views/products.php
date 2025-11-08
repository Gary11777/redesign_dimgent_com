<?php $this->layout('layouts::base', ['title' => $title, 'metaDescription' => $metaDescription]) ?>

<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <span class="inline-block bg-white bg-opacity-20 text-white px-3 py-1 rounded-full text-sm font-semibold mb-4">
                Product Showcase
            </span>
            <h1 class="text-4xl md:text-5xl font-bold mb-4"><?= $this->e($product['name']) ?></h1>
            <p class="text-2xl text-primary-100 mb-2"><?= $this->e($product['tagline']) ?></p>
            <p class="text-xl text-primary-50"><?= $this->e($product['slogan']) ?></p>
        </div>
    </div>
</div>

<!-- Overview -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="bg-white rounded-xl shadow-lg p-8 mb-12">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Overview</h2>
        <p class="text-lg text-gray-700 leading-relaxed"><?= $this->e($product['overview']) ?></p>
    </div>

    <!-- Target Areas -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
        <div class="bg-white rounded-xl shadow-lg p-8">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Target Areas</h3>
            <ul class="space-y-3">
                <?php foreach ($product['targetAreas'] as $area): ?>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-primary-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-gray-700"><?= $this->e($area) ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-8">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Key Technology</h3>
            <ul class="space-y-3">
                <?php foreach ($product['keyTechnology'] as $tech): ?>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-primary-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        <span class="text-gray-700"><?= $this->e($tech) ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <!-- Advantages -->
    <div class="bg-white rounded-xl shadow-lg p-8 mb-12">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Advantages Over Other Magnetometers</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <?php foreach ($product['advantages'] as $index => $advantage): ?>
                <div class="flex items-start p-4 bg-gray-50 rounded-lg">
                    <span class="flex-shrink-0 w-8 h-8 bg-primary-600 text-white rounded-full flex items-center justify-center font-bold mr-3">
                        <?= $index + 1 ?>
                    </span>
                    <span class="text-gray-700"><?= $this->e($advantage) ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Image Gallery -->
    <?php if (!empty($product['images'])): ?>
    <div class="bg-white rounded-xl shadow-lg p-8" x-data="{ lightbox: false, currentImage: '', currentAlt: '' }">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Product Gallery</h3>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php foreach ($product['images'] as $image): ?>
                <div class="relative group cursor-pointer" @click="lightbox = true; currentImage = '<?= $this->e($image['path']) ?>'; currentAlt = '<?= $this->e($image['alt']) ?>'">
                    <img src="<?= $this->e($image['path']) ?>" alt="<?= $this->e($image['alt']) ?>" class="w-full h-48 object-cover rounded-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all rounded-lg flex items-center justify-center">
                        <svg class="w-12 h-12 text-white opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                        </svg>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Lightbox -->
        <div x-show="lightbox" x-cloak @click.away="lightbox = false" @keydown.escape.window="lightbox = false" 
             class="fixed inset-0 z-50 bg-black bg-opacity-90 flex items-center justify-center p-4" x-transition>
            <button @click="lightbox = false" class="absolute top-4 right-4 text-white hover:text-gray-300">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <img :src="currentImage" :alt="currentAlt" class="max-w-full max-h-full object-contain">
        </div>
    </div>
    <?php endif; ?>

    <!-- More Information -->
    <div class="bg-primary-50 border-l-4 border-primary-600 p-6 rounded-lg mt-12">
        <h3 class="text-xl font-bold text-gray-900 mb-2">More Information</h3>
        <p class="text-gray-700 mb-4">Visit the official website for detailed specifications and documentation</p>
        <a href="http://<?= $this->e($product['website']) ?>" target="_blank" rel="noopener noreferrer" 
           class="inline-flex items-center text-primary-600 font-semibold hover:text-primary-700">
            <?= $this->e($product['website']) ?>
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
            </svg>
        </a>
    </div>
</div>
