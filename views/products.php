<?php require_once __DIR__ . '/../includes/helpers.php'; ?>
<?php require __DIR__ . '/../includes/header.php'; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        
        <!-- Product Image -->
        <aside class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-4">
                <img src="<?php echo asset('assets/images/products/photo_garand101_32s_bgcolor2.jpg'); ?>" 
                     alt="Magnetometer Garand 101" 
                     class="w-full rounded-lg">
            </div>
        </aside>
        
        <!-- Main Content -->
        <div class="lg:col-span-3">
            <div class="bg-white rounded-lg shadow-md p-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-2">Garand 101</h1>
                <h2 class="text-xl text-blue-600 mb-6">a high-resolution fluxgate magnetometer</h2>
                
                <p class="text-2xl font-semibold text-blue-600 mb-6">
                    Magnetic detection can be easy and convenient!
                </p>
                
                <!-- Product Presentation Download -->
                <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8 flex items-center space-x-4">
                    <a href="<?php echo asset('assets/images/products/garand101_product_presentation.pdf'); ?>" 
                       target="_blank" 
                       class="flex-shrink-0">
                        <img src="<?php echo asset('assets/images/products/download_button3.png'); ?>" 
                             alt="Download product presentation PDF" 
                             class="w-32 hover:opacity-80 transition-opacity">
                    </a>
                    <div>
                        <a href="<?php echo asset('assets/images/products/garand101_product_presentation.pdf'); ?>" 
                           target="_blank"
                           class="text-blue-600 hover:text-blue-800 font-semibold text-lg">
                            Product presentation
                        </a>
                        <span class="text-gray-600"> of Garand 101</span>
                    </div>
                </div>
                
                <div class="prose max-w-none space-y-4 text-gray-700">
                    <p>
                        <span class="font-semibold text-gray-800">Garand 101</span> is the high-resolution fluxgate magnetometer-gradiometer. This unit measures disruptions in the earth's magnetic field caused by ferromagnetic objects. It provides reliable detection of ferromagnetic metals such as iron, steel, and nickel. The Garand 101 is designed as an one man rapid location and identification device. This device is user-friendly and lightweight. It has significant reliability and low-price.
                    </p>
                    
                    <p>
                        <span class="font-semibold text-gray-800">The target areas:</span> archaeological purposes, environmental, forensics, geological, civil engineering and peace-time military applications.
                    </p>
                    
                    <p>
                        <span class="font-semibold text-gray-800">A new magnetic field measurement technology</span> had been proposed and practically realized in Garand 101. It allows to significantly reduce the energy consumption and device weight. Moreover, this technology of measurement simplifies construction and maintenance and increases the working time of the product.
                    </p>
                    
                    <p>
                        In comparison with another magnetometers and gradiometers, <span class="font-semibold text-gray-800">Garand 101 has the following advantages:</span>
                    </p>
                    
                    <ol class="list-decimal list-inside space-y-2 ml-4">
                        <li>A new magnetic field measurement technology.</li>
                        <li>The device is digital. It significantly increases noise stability of the magnetometer during use.</li>
                        <li>This magnetometer has a convenient system of result visualization and user-friendly interface. Due to this, the detection of objects becomes much easier.</li>
                        <li>It has a reliable and good solid design.</li>
                        <li>Used design solutions expand the detection area.</li>
                        <li>User-friendly "plug and play" system.</li>
                        <li>The low price.</li>
                    </ol>
                    
                    <p class="bg-blue-50 p-4 rounded-lg">
                        <span class="font-semibold text-gray-800">For more information</span> about magnetometer Garand 101, please visit our website 
                        <a href="https://gradiometr.com/" target="_blank" class="text-blue-600 hover:text-blue-800 font-semibold">www.gradiometr.com</a>.
                    </p>
                </div>
            </div>
            
            <!-- Photos Section -->
            <div class="bg-white rounded-lg shadow-md p-8 mt-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 border-b-2 border-blue-600 pb-2">
                    Photos of Garand 101
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" x-data="productGallery()">
                    <?php
                    $photos = [
                        ['src' => 'photo_garand101_5.jpg', 'alt' => 'Side view of Garand 101 magnetometer front panel'],
                        ['src' => 'photo_garand101_6.jpg', 'alt' => 'Top, front and side view of Garand 101'],
                        ['src' => 'photo_garand101_7.jpg', 'alt' => 'Front panel of Garand 101 magnetometer'],
                        ['src' => 'photo_garand101_8.jpg', 'alt' => 'Close-up side view of Garand 101'],
                        ['src' => 'photo_garand101_10.jpg', 'alt' => 'Front panel of Garand 101 magnetometer'],
                        ['src' => 'photo_garand101_11.jpg', 'alt' => 'Rear and side view of Garand 101'],
                        ['src' => 'bag_2_forest.jpg', 'alt' => 'Carrying case for Garand 101']
                    ];
                    
                    foreach ($photos as $index => $photo):
                    ?>
                        <div class="cursor-pointer hover:opacity-75 transition-opacity" 
                             @click="openLightbox(<?php echo $index; ?>)">
                            <img src="<?php echo asset('assets/images/products/' . $photo['src']); ?>" 
                                 alt="<?php echo e($photo['alt']); ?>" 
                                 class="w-full h-64 object-cover rounded-lg shadow-md">
                        </div>
                    <?php endforeach; ?>
                    
                    <!-- Lightbox Modal -->
                    <div x-show="lightboxOpen" 
                         x-cloak
                         @keydown.escape.window="lightboxOpen = false"
                         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-90 p-4"
                         @click="lightboxOpen = false">
                        <div class="relative max-w-6xl w-full" @click.stop>
                            <button @click="lightboxOpen = false" 
                                    class="absolute top-4 right-4 text-white hover:text-gray-300 z-10">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                            
                            <button @click="previousPhoto()" 
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white hover:text-gray-300 bg-black/50 p-2 rounded-full">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            
                            <img :src="currentPhoto.src" 
                                 :alt="currentPhoto.alt" 
                                 class="w-full h-auto rounded-lg">
                            
                            <button @click="nextPhoto()" 
                                    class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white hover:text-gray-300 bg-black/50 p-2 rounded-full">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function productGallery() {
    return {
        lightboxOpen: false,
        currentIndex: 0,
        photos: <?php echo json_encode(array_map(function($p) { 
            return ['src' => asset('assets/images/products/' . $p['src']), 'alt' => $p['alt']]; 
        }, $photos)); ?>,
        get currentPhoto() {
            return this.photos[this.currentIndex];
        },
        openLightbox(index) {
            this.currentIndex = index;
            this.lightboxOpen = true;
        },
        nextPhoto() {
            this.currentIndex = (this.currentIndex + 1) % this.photos.length;
        },
        previousPhoto() {
            this.currentIndex = (this.currentIndex - 1 + this.photos.length) % this.photos.length;
        }
    }
}
</script>

<style>
[x-cloak] { display: none !important; }
</style>

<?php require __DIR__ . '/../includes/footer.php'; ?>
