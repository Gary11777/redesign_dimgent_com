<?php require_once __DIR__ . '/partials/header.php'; ?>

<!-- Page Header -->
<div class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Services</h1>
        <p class="text-xl text-primary-100">Customized development of electronic devices</p>
    </div>
</div>

<!-- Introduction -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="max-w-4xl mx-auto text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
            Full Cycle Development or Individual Phases
        </h2>
        <p class="text-lg text-gray-700 leading-relaxed">
            We offer a full cycle development of electronic devices (from mock-up to finished product) or, 
            if required, can just complete individual phases to meet your specific needs.
        </p>
    </div>
    
    <!-- Services Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
        <?php foreach ($services as $service): ?>
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow border-t-4 border-primary-500">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <div class="bg-primary-100 w-12 h-12 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            <?= htmlspecialchars($service['title']) ?>
                        </h3>
                        <p class="text-gray-600">
                            <?= htmlspecialchars($service['description']) ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Advantages -->
<div class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Advantages</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Why choose Dimgent Technologies for your electronic equipment development projects
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($advantages as $advantage): ?>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <div class="bg-primary-600 text-white w-16 h-16 rounded-full flex items-center justify-center mb-4 text-2xl font-bold">
                        <?= strtoupper(substr($advantage['title'], 0, 1)) ?>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">
                        <?= htmlspecialchars($advantage['title']) ?>
                    </h3>
                    <p class="text-gray-600">
                        <?= htmlspecialchars($advantage['description']) ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Our Aim -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="bg-white rounded-lg shadow-xl p-8 md:p-12">
        <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">Our Aim</h2>
        <div class="max-w-3xl mx-auto space-y-4">
            <div class="flex items-start space-x-4">
                <svg class="w-6 h-6 text-primary-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <p class="text-lg text-gray-700">
                    We want our clients to be <strong>fully satisfied</strong> with the results of our work
                </p>
            </div>
            <div class="flex items-start space-x-4">
                <svg class="w-6 h-6 text-primary-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <p class="text-lg text-gray-700">
                    We work with our clients until the product is <strong>exactly the one they want it to be</strong>
                </p>
            </div>
            <div class="flex items-start space-x-4">
                <svg class="w-6 h-6 text-primary-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <p class="text-lg text-gray-700">
                    We offer ideas for <strong>changes and improvements</strong> to make the product even better
                </p>
            </div>
        </div>
    </div>
</div>

<!-- What We Can Provide -->
<div class="bg-primary-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center">We Can Provide</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <div class="text-center">
                <div class="bg-white bg-opacity-20 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                </div>
                <p class="text-lg">The <strong>full cycle</strong> of electronic devices development</p>
            </div>
            <div class="text-center">
                <div class="bg-white bg-opacity-20 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/>
                    </svg>
                </div>
                <p class="text-lg">Provision of <strong>individual phases</strong> of development</p>
            </div>
            <div class="text-center">
                <div class="bg-white bg-opacity-20 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                </div>
                <p class="text-lg">Completion of <strong>uncompleted projects</strong> already started</p>
            </div>
        </div>
    </div>
</div>

<!-- Distance is Not a Problem -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="max-w-4xl mx-auto">
        <div class="bg-gradient-to-br from-primary-50 to-primary-100 rounded-lg p-8 md:p-12 border-l-4 border-primary-600">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Is Distance a Problem?</h2>
            <p class="text-xl text-gray-700 mb-4"><strong>No, of course not!</strong></p>
            <p class="text-lg text-gray-700 mb-4">
                The majority of our clients from other countries wish to outsource device development to keep costs down.
            </p>
            <p class="text-lg text-gray-700 mb-4">
                Some were concerned that the work is carried out a long way from them, however once they have received 
                the finished product and evaluated its quality, they often make more orders for the development of other 
                electronic devices.
            </p>
            <p class="text-lg text-gray-700 mb-4">
                We can assure you that <strong>distance is not a problem</strong>, since the Internet brings us nearer than ever before.
            </p>
            <p class="text-lg text-gray-700">
                Furthermore, we will keep you <strong>updated on the progress</strong> of the work with photos and video if you wish.
            </p>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Ready to Start Your Project?</h2>
        <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
            Contact us today to discuss your electronic device development needs
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/contacts" class="inline-block bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transition-colors">
                Contact Us
            </a>
            <a href="/projects" class="inline-block bg-white text-primary-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors border-2 border-primary-600">
                View Our Projects
            </a>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/partials/footer.php'; ?>
