<?php require_once __DIR__ . '/partials/header.php'; ?>

<!-- Page Header -->
<div class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Projects</h1>
        <p class="text-xl text-primary-100">50+ successfully completed electronic devices development projects</p>
    </div>
</div>

<!-- Introduction -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Portfolio</h2>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">
            Over the years, we have developed and taken part in the development of more than 50 projects 
            across various industries and applications.
        </p>
    </div>
    
    <!-- Project Categories -->
    <div class="space-y-12">
        <?php foreach ($categories as $index => $category): ?>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-primary-600 to-primary-700 text-white px-6 py-4">
                    <h3 class="text-2xl font-bold"><?= htmlspecialchars($category['title']) ?></h3>
                </div>
                <div class="p-6">
                    <ul class="space-y-4">
                        <?php foreach ($category['projects'] as $project): ?>
                            <li class="flex items-start space-x-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <div class="flex-shrink-0">
                                    <div class="bg-primary-100 w-10 h-10 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                </div>
                                <p class="text-gray-700 text-lg flex-1"><?= htmlspecialchars($project) ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Our Experience -->
<div class="bg-primary-600 text-white py-16 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center">Dimgent Technologies</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">
            <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-lg p-6 text-center">
                <div class="text-5xl font-bold mb-2">20+</div>
                <p class="text-lg">Years of Experience</p>
            </div>
            <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-lg p-6 text-center">
                <div class="text-5xl font-bold mb-2">50+</div>
                <p class="text-lg">Completed Projects</p>
            </div>
            <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-lg p-6 text-center">
                <div class="text-5xl font-bold mb-2">100%</div>
                <p class="text-lg">Success Rate</p>
            </div>
        </div>
    </div>
</div>

<!-- What We Offer -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- We Offer -->
        <div class="bg-gradient-to-br from-primary-50 to-primary-100 rounded-lg p-8 border-t-4 border-primary-600">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">We Can Provide</h3>
            <ul class="space-y-4">
                <li class="flex items-start space-x-3">
                    <svg class="w-6 h-6 text-primary-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-gray-700">The full cycle of electronic devices development (from concept to finished product)</span>
                </li>
                <li class="flex items-start space-x-3">
                    <svg class="w-6 h-6 text-primary-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-gray-700">Provision of individual phases of development</span>
                </li>
                <li class="flex items-start space-x-3">
                    <svg class="w-6 h-6 text-primary-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-gray-700">Completion of uncompleted projects which have already been started</span>
                </li>
            </ul>
        </div>
        
        <!-- Why Choose Us -->
        <div class="bg-gradient-to-br from-gray-100 to-gray-200 rounded-lg p-8 border-t-4 border-gray-600">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Why Choose Us</h3>
            <ul class="space-y-4">
                <li class="flex items-start space-x-3">
                    <svg class="w-6 h-6 text-gray-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-gray-700">Experienced specialists</span>
                </li>
                <li class="flex items-start space-x-3">
                    <svg class="w-6 h-6 text-gray-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-gray-700">Guaranteed quality</span>
                </li>
                <li class="flex items-start space-x-3">
                    <svg class="w-6 h-6 text-gray-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-gray-700">Short turn-around times</span>
                </li>
                <li class="flex items-start space-x-3">
                    <svg class="w-6 h-6 text-gray-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-gray-700">Cost effective solutions</span>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
            Have a Project in Mind?
        </h2>
        <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
            Let's discuss how we can help bring your electronic device idea to life
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/contacts" class="inline-block bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transition-colors">
                Contact Us
            </a>
            <a href="/services" class="inline-block bg-white text-primary-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors border-2 border-primary-600">
                View Our Services
            </a>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/partials/footer.php'; ?>
