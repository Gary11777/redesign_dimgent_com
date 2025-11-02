<?php
require_once __DIR__ . '/../layouts/header.php';
?>

<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="md:col-span-2">
            <h1 class="text-3xl font-bold text-center mb-6"><?= View::escape(View::config('site.name', '')) ?></h1>
            <p class="text-center text-gray-600 mb-4">Electronics Development</p>
            
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <p class="mb-4"><strong>«Dimgent Technologies»</strong> – is a group of specialists working in the sector of the development of electronic devices.</p>
                <p class="mb-4">We can offer our clients both full-cycle electronic devices development (from concept to finished product) or carry out separate phases (developing the electric circuits of a device, software, drawings of printed circuit boards and so on).</p>
                
                <div class="bg-gray-100 rounded p-4 mb-4">
                    <div class="flex items-start gap-4">
                        <img src="<?= View::image('new.jpg') ?>" alt="New magnetometer Garand 101" class="w-24 h-24 object-cover rounded">
                        <div>
                            <p>We have developed <a href="/products" class="text-blue-600 hover:underline">a new magnetometer Garand 101</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="text-xl font-semibold text-center mb-4">Development trends:</h3>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
                <div class="bg-gray-100 p-4 text-center rounded border-b-2 border-blue-600">
                    technical specifications
                </div>
                <div class="bg-gray-100 p-4 text-center rounded border-b-2 border-blue-600">
                    electric circuits
                </div>
                <div class="bg-gray-100 p-4 text-center rounded border-b-2 border-blue-600">
                    software
                </div>
                <div class="bg-gray-100 p-4 text-center rounded border-b-2 border-blue-600">
                    drafts of printed circuit boards
                </div>
                <div class="bg-gray-100 p-4 text-center rounded border-b-2 border-blue-600">
                    structure and design of housings
                </div>
                <div class="bg-gray-100 p-4 text-center rounded border-b-2 border-blue-600">
                    test models
                </div>
            </div>

            <!-- Image Slider -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div x-data="{ currentSlide: 0, slides: [] }" x-init="slides = Array.from({length: 13}, (_, i) => i + 1)" class="relative">
                    <div class="relative h-96 overflow-hidden rounded">
                        <template x-for="(slide, index) in slides" :key="index">
                            <img 
                                x-show="currentSlide === index"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                :src="`<?= View::asset('old_version_dimgent_com/data1/images/') ?>${slide}.jpg`"
                                :alt="`Slide ${slide}`"
                                class="absolute inset-0 w-full h-full object-cover"
                            >
                        </template>
                    </div>
                    
                    <!-- Navigation -->
                    <div class="flex justify-center mt-4 space-x-2">
                        <template x-for="(slide, index) in slides" :key="index">
                            <button 
                                @click="currentSlide = index"
                                :class="currentSlide === index ? 'bg-blue-600' : 'bg-gray-300'"
                                class="w-3 h-3 rounded-full transition"
                            ></button>
                        </template>
                    </div>
                    
                    <!-- Auto-play -->
                    <script>
                        setInterval(() => {
                            if (document.querySelector('[x-data*="currentSlide"]')) {
                                const component = Alpine.$data(document.querySelector('[x-data*="currentSlide"]'));
                                component.currentSlide = (component.currentSlide + 1) % component.slides.length;
                            }
                        }, 5000);
                    </script>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="md:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6 border-l-4 border-blue-600">
                <h4 class="font-semibold mb-4">«Dimgent Technologies» is:</h4>
                <ul class="space-y-2 text-sm">
                    <li>• More than 20 years of experience.</li>
                    <li>• More than 50 successfully completed projects.</li>
                    <li>• Experienced specialists.</li>
                    <li>• Guaranteed quality.</li>
                    <li>• Short turn-around times.</li>
                    <li>• Cost effective.</li>
                    <li class="mt-4"><a href="/about" class="text-blue-600 hover:underline">And more…</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/../layouts/footer.php';
?>

