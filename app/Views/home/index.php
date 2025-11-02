<!-- Hero Section -->
<section class="bg-gradient-to-br from-primary-800 via-primary-700 to-primary-900 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                Dimgent Technologies
            </h1>
            <p class="text-xl md:text-2xl text-primary-100 mb-8">
                Electronics Development
            </p>
            <p class="text-lg md:text-xl text-primary-50 max-w-3xl mx-auto leading-relaxed">
                <strong>«Dimgent Technologies»</strong> – is a group of specialists working in the sector of the development of electronic devices.
            </p>
        </div>
    </div>
</section>

<!-- Main Content Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <!-- Introduction -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-12">
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    We can offer our clients both full-cycle electronic devices development (from concept to finished product) or carry out separate phases (developing the electric circuits of a device, software, drawings of printed circuit boards and so on).
                </p>
                
                <!-- New Product Announcement -->
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border-l-4 border-primary-600 rounded-lg p-6 flex items-center space-x-4">
                    <img src="/assets/images/new.jpg" alt="New magnetometer Garand 101" class="w-24 h-24 object-cover rounded-lg shadow-md">
                    <div>
                        <p class="text-lg font-semibold text-gray-800">
                            We have developed <a href="/products" class="text-primary-600 hover:text-primary-700 underline">a new magnetometer Garand 101</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Development Trends -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Development Trends</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php
                    $trends = [
                        ['title' => 'Technical Specifications', 'icon' => '📋', 'color' => 'blue'],
                        ['title' => 'Electric Circuits', 'icon' => '⚡', 'color' => 'yellow'],
                        ['title' => 'Software', 'icon' => '💻', 'color' => 'green'],
                        ['title' => 'Printed Circuit Boards', 'icon' => '🔌', 'color' => 'purple'],
                        ['title' => 'Structure and Design of Housings', 'icon' => '🏗️', 'color' => 'red'],
                        ['title' => 'Test Models', 'icon' => '🔬', 'color' => 'indigo'],
                    ];
                    
                    $colorMap = [
                        'blue' => 'from-blue-500 to-blue-600',
                        'yellow' => 'from-yellow-500 to-yellow-600',
                        'green' => 'from-green-500 to-green-600',
                        'purple' => 'from-purple-500 to-purple-600',
                        'red' => 'from-red-500 to-red-600',
                        'indigo' => 'from-indigo-500 to-indigo-600',
                    ];
                    
                    foreach ($trends as $trend):
                    ?>
                    <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow p-6 text-center group cursor-pointer">
                        <div class="bg-gradient-to-br <?= $colorMap[$trend['color']] ?> w-16 h-16 rounded-full flex items-center justify-center text-3xl mx-auto mb-4 group-hover:scale-110 transition-transform">
                            <?= $trend['icon'] ?>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800"><?= $trend['title'] ?></h3>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Key Features -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <!-- Left Column -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h3 class="text-2xl font-bold text-primary-800 mb-6">«Dimgent Technologies» is:</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">More than 20 years of experience</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">More than 50 successfully completed projects</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Experienced specialists</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Guaranteed quality</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Short turn-around times</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Cost effective</span>
                        </li>
                    </ul>
                    <a href="/about" class="inline-block mt-6 text-primary-600 hover:text-primary-700 font-semibold">
                        Learn more about us →
                    </a>
                </div>

                <!-- Right Column -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h3 class="text-2xl font-bold text-primary-800 mb-6">We can provide:</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-primary-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">The full cycle of electronic devices development (from concept to finished product)</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-primary-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Provision of individual phases of development</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-primary-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Completion of uncompleted projects which have already been started</span>
                        </li>
                    </ul>
                    <a href="/services" class="inline-block mt-6 text-primary-600 hover:text-primary-700 font-semibold">
                        Explore our services →
                    </a>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="bg-gradient-to-r from-primary-600 to-primary-800 rounded-2xl shadow-xl p-10 text-center text-white">
                <h2 class="text-3xl font-bold mb-4">Ready to Start Your Project?</h2>
                <p class="text-xl text-primary-100 mb-8">
                    Let's discuss how we can help bring your electronic device ideas to life
                </p>
                <a href="/contacts" class="inline-block bg-white text-primary-700 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-primary-50 transition-colors shadow-lg">
                    Contact Us Today
                </a>
            </div>
        </div>
    </div>
</section>
