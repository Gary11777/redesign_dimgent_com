<?php require_once __DIR__ . '/partials/header.php'; ?>

<!-- Page Header -->
<div class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Products</h1>
        <p class="text-xl text-primary-100">Innovative electronic devices developed by our team</p>
    </div>
</div>

<!-- Product Details -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <!-- Product Header -->
    <div class="text-center mb-12">
        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
            <?= htmlspecialchars($product['name']) ?>
        </h2>
        <p class="text-xl text-gray-600 mb-2">
            <?= htmlspecialchars($product['subtitle']) ?>
        </p>
        <p class="text-2xl text-primary-600 font-semibold italic">
            "<?= htmlspecialchars($product['tagline']) ?>"
        </p>
    </div>
    
    <!-- Main Product Image -->
    <div class="mb-16">
        <img src="/assets/images/products/main_photo_of_garand101.jpg" 
             alt="<?= htmlspecialchars($product['name']) ?>" 
             class="w-full max-w-4xl mx-auto rounded-lg shadow-2xl">
    </div>
    
    <!-- Product Description -->
    <div class="max-w-4xl mx-auto mb-16">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Overview</h3>
            <p class="text-lg text-gray-700 leading-relaxed">
                <?= htmlspecialchars($product['description']) ?>
            </p>
        </div>
    </div>
    
    <!-- Applications -->
    <div class="mb-16">
        <h3 class="text-3xl font-bold text-gray-900 text-center mb-8">Target Applications</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">
            <?php foreach ($product['applications'] as $application): ?>
                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-primary-500 hover:shadow-lg transition-shadow">
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-primary-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-gray-800 font-medium"><?= htmlspecialchars($application) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <!-- Key Advantages -->
    <div class="bg-gray-100 -mx-4 sm:-mx-6 lg:-mx-8 px-4 sm:px-6 lg:px-8 py-16 mb-16">
        <div class="max-w-7xl mx-auto">
            <h3 class="text-3xl font-bold text-gray-900 text-center mb-12">Key Advantages</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
                <?php foreach ($product['advantages'] as $index => $advantage): ?>
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="bg-primary-600 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold">
                                    <?= $index + 1 ?>
                                </div>
                            </div>
                            <p class="text-gray-800 flex-1"><?= htmlspecialchars($advantage) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
    <!-- Product Gallery -->
    <div class="mb-16">
        <h3 class="text-3xl font-bold text-gray-900 text-center mb-8">Product Gallery</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" x-data="{ lightbox: false, currentImage: '' }">
            <?php 
            $images = [
                'photo_garand101_5.jpg',
                'photo_garand101_6.jpg',
                'photo_garand101_7.jpg',
                'photo_garand101_8.jpg',
                'photo_garand101_10.jpg',
                'photo_garand101_11.jpg',
                'photo_garand101_12_2.jpg',
                'bag_2_forest.jpg'
            ];
            foreach ($images as $image): 
            ?>
                <div class="relative group cursor-pointer" 
                     @click="lightbox = true; currentImage = '/assets/images/products/<?= $image ?>'">
                    <img src="/assets/images/products/<?= $image ?>" 
                         alt="<?= htmlspecialchars($product['name']) ?>" 
                         class="w-full h-64 object-cover rounded-lg shadow-md group-hover:shadow-xl transition-shadow">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all rounded-lg flex items-center justify-center">
                        <svg class="w-12 h-12 text-white opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                        </svg>
                    </div>
                </div>
            <?php endforeach; ?>
            
            <!-- Lightbox -->
            <div x-show="lightbox" 
                 x-cloak
                 @click.away="lightbox = false"
                 @keydown.escape.window="lightbox = false"
                 class="fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center p-4">
                <button @click="lightbox = false" 
                        class="absolute top-4 right-4 text-white hover:text-gray-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                <img :src="currentImage" 
                     alt="Product image" 
                     class="max-w-full max-h-full object-contain rounded-lg">
            </div>
        </div>
    </div>
    
    <!-- More Information -->
    <div class="bg-primary-600 text-white rounded-lg p-8 md:p-12 text-center">
        <h3 class="text-3xl font-bold mb-4">More Information</h3>
        <p class="text-xl mb-6">Visit the official Garand 101 website for detailed specifications and ordering information</p>
        <a href="http://<?= htmlspecialchars($product['website']) ?>" 
           target="_blank"
           rel="noopener noreferrer"
           class="inline-block bg-white text-primary-600 px-8 py-3 rounded-lg font-semibold hover:bg-primary-50 transition-colors">
            Visit <?= htmlspecialchars($product['website']) ?>
        </a>
    </div>
</div>

<!-- Call to Action -->
<div class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
            Interested in Custom Electronic Device Development?
        </h2>
        <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
            Contact us to discuss your project requirements
        </p>
        <a href="/contacts" class="inline-block bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transition-colors">
            Get in Touch
        </a>
    </div>
</div>

<?php require_once __DIR__ . '/partials/footer.php'; ?>
