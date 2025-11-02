<?php require_once __DIR__ . '/../includes/helpers.php'; ?>
<?php require __DIR__ . '/../includes/header.php'; ?>

<!-- Hero Section -->
<section class="bg-gradient-to-br from-blue-600 to-blue-800 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                Dimgent Technologies
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-blue-100">
                Electronics Development
            </p>
            <p class="text-lg max-w-3xl mx-auto mb-8">
                <strong>«Dimgent Technologies»</strong> – is a group of specialists working in the sector of the development of electronic devices.
            </p>
            <p class="text-lg max-w-3xl mx-auto">
                We can offer our clients both full-cycle electronic devices development (from concept to finished product) or carry out separate phases (developing the electric circuits of a device, software, drawings of printed circuit boards and so on).
            </p>
        </div>
    </div>
</section>

<!-- New Product Announcement -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-blue-50 border-l-4 border-blue-500 rounded-lg p-6 flex items-center space-x-4">
            <img src="<?php echo asset('assets/images/new.jpg'); ?>" 
                 alt="New magnetometer Garand 101" 
                 class="w-24 h-24 object-cover rounded-lg">
            <div>
                <p class="text-lg">
                    We have developed <a href="/products.php" class="text-blue-600 hover:text-blue-800 font-semibold">a new magnetometer Garand 101</a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Development Trends -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Development Trends</h2>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow">
                <div class="text-blue-600 mb-3">
                    <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <p class="text-sm font-medium text-gray-700">Technical Specifications</p>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow">
                <div class="text-blue-600 mb-3">
                    <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                    </svg>
                </div>
                <p class="text-sm font-medium text-gray-700">Electric Circuits</p>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow">
                <div class="text-blue-600 mb-3">
                    <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                    </svg>
                </div>
                <p class="text-sm font-medium text-gray-700">Software</p>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow">
                <div class="text-blue-600 mb-3">
                    <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                    </svg>
                </div>
                <p class="text-sm font-medium text-gray-700">Printed Circuit Boards</p>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow">
                <div class="text-blue-600 mb-3">
                    <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <p class="text-sm font-medium text-gray-700">Structure & Design of Housings</p>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow">
                <div class="text-blue-600 mb-3">
                    <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                    </svg>
                </div>
                <p class="text-sm font-medium text-gray-700">Test Models</p>
            </div>
        </div>
    </div>
</section>

<!-- Image Gallery Slider -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Our Work</h2>
        
        <div class="relative" x-data="imageSlider()">
            <!-- Main Image -->
            <div class="relative h-96 md:h-[500px] overflow-hidden rounded-lg">
                <template x-for="(image, index) in images" :key="index">
                    <div x-show="currentSlide === index" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         class="absolute inset-0">
                        <img :src="image.src" 
                             :alt="image.alt" 
                             class="w-full h-full object-cover">
                    </div>
                </template>
            </div>
            
            <!-- Navigation Arrows -->
            <button @click="previousSlide()" 
                    class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white p-3 rounded-full shadow-lg transition-all">
                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            
            <button @click="nextSlide()" 
                    class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white p-3 rounded-full shadow-lg transition-all">
                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
            
            <!-- Thumbnails -->
            <div class="mt-6 grid grid-cols-6 md:grid-cols-13 gap-2 overflow-x-auto">
                <template x-for="(image, index) in images" :key="index">
                    <button @click="currentSlide = index" 
                            :class="{'ring-2 ring-blue-600': currentSlide === index}"
                            class="relative aspect-square rounded-md overflow-hidden hover:opacity-75 transition-opacity">
                        <img :src="image.thumb" 
                             :alt="image.alt" 
                             class="w-full h-full object-cover">
                    </button>
                </template>
            </div>
        </div>
    </div>
</section>

<script>
function imageSlider() {
    return {
        currentSlide: 0,
        images: [
            { src: '<?php echo asset("assets/images/slider/1.jpg"); ?>', thumb: '<?php echo asset("assets/images/slider/thumbs/1.jpg"); ?>', alt: 'Electronics Development' },
            { src: '<?php echo asset("assets/images/slider/2.jpg"); ?>', thumb: '<?php echo asset("assets/images/slider/thumbs/2.jpg"); ?>', alt: 'Dimgent Technologies' },
            { src: '<?php echo asset("assets/images/slider/3.jpg"); ?>', thumb: '<?php echo asset("assets/images/slider/thumbs/3.jpg"); ?>', alt: 'Electronics Development' },
            { src: '<?php echo asset("assets/images/slider/4.jpg"); ?>', thumb: '<?php echo asset("assets/images/slider/thumbs/4.jpg"); ?>', alt: 'Electronics Development' },
            { src: '<?php echo asset("assets/images/slider/5.jpg"); ?>', thumb: '<?php echo asset("assets/images/slider/thumbs/5.jpg"); ?>', alt: 'Electronics Development' },
            { src: '<?php echo asset("assets/images/slider/6.jpg"); ?>', thumb: '<?php echo asset("assets/images/slider/thumbs/6.jpg"); ?>', alt: 'Electronics Development' },
            { src: '<?php echo asset("assets/images/slider/7.jpg"); ?>', thumb: '<?php echo asset("assets/images/slider/thumbs/7.jpg"); ?>', alt: 'Electronics Development' },
            { src: '<?php echo asset("assets/images/slider/8.jpg"); ?>', thumb: '<?php echo asset("assets/images/slider/thumbs/8.jpg"); ?>', alt: 'Electronics Development' },
            { src: '<?php echo asset("assets/images/slider/9.jpg"); ?>', thumb: '<?php echo asset("assets/images/slider/thumbs/9.jpg"); ?>', alt: 'Electronics Development' },
            { src: '<?php echo asset("assets/images/slider/10.jpg"); ?>', thumb: '<?php echo asset("assets/images/slider/thumbs/10.jpg"); ?>', alt: 'Electronics Development' },
            { src: '<?php echo asset("assets/images/slider/11.jpg"); ?>', thumb: '<?php echo asset("assets/images/slider/thumbs/11.jpg"); ?>', alt: 'Electronics Development' },
            { src: '<?php echo asset("assets/images/slider/12.jpg"); ?>', thumb: '<?php echo asset("assets/images/slider/thumbs/12.jpg"); ?>', alt: 'Electronics Development' },
            { src: '<?php echo asset("assets/images/slider/13.jpg"); ?>', thumb: '<?php echo asset("assets/images/slider/thumbs/13.jpg"); ?>', alt: 'Contact Dimgent Technologies' }
        ],
        nextSlide() {
            this.currentSlide = (this.currentSlide + 1) % this.images.length;
        },
        previousSlide() {
            this.currentSlide = (this.currentSlide - 1 + this.images.length) % this.images.length;
        }
    }
}
</script>

<?php require __DIR__ . '/../includes/footer.php'; ?>
