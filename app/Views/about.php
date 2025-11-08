<?php require_once __DIR__ . '/partials/header.php'; ?>

<!-- Page Header -->
<div class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">About Us</h1>
        <p class="text-xl text-primary-100">Electronics Development Center in Minsk, Belarus</p>
    </div>
</div>

<!-- Company Overview -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Dimgent Technologies</h2>
            <p class="text-xl text-primary-600 font-semibold mb-6">Development Center: Minsk, Belarus</p>
        </div>
        
        <div class="prose prose-lg max-w-none">
            <p class="text-lg text-gray-700 leading-relaxed mb-6">
                <strong>Dimgent Technologies</strong> is a group of specialists working in the sector of the 
                development of electronic devices.
            </p>
            
            <p class="text-lg text-gray-700 leading-relaxed mb-6">
                We develop customized electronic devices. Our company includes engineers, designers, and programmers 
                who have been creating electronic devices for more than twenty years.
            </p>
            
            <p class="text-lg text-gray-700 leading-relaxed mb-6">
                We have developed and taken part in the development of more than 50 projects over this time.
            </p>
            
            <p class="text-lg text-gray-700 leading-relaxed">
                <strong>Dimgent Technologies</strong> offers a comprehensive approach to the projects we work on. 
                We can offer our clients both full-cycle electronic devices development (from concept to finished product) 
                or carry out separate phases (developing the electric circuits of a device, software, drawings of printed 
                circuit boards and so on).
            </p>
        </div>
    </div>
</div>

<!-- Our Aim -->
<div class="bg-primary-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-8 text-center">Our Aim</h2>
            <div class="space-y-6 text-lg">
                <div class="flex items-start space-x-4">
                    <svg class="w-8 h-8 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p>We want our clients to be <strong>fully satisfied</strong> with the results of our work.</p>
                </div>
                <div class="flex items-start space-x-4">
                    <svg class="w-8 h-8 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p>We work with our clients until the product is <strong>exactly the one they want it to be</strong>.</p>
                </div>
                <div class="flex items-start space-x-4">
                    <svg class="w-8 h-8 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p>We can also offer ideas for <strong>changes and improvements</strong> of the product being developed in order to make it even better.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Our Experience -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Choose Dimgent Technologies</h2>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
        <?php foreach ($experience as $item): ?>
            <div class="bg-white p-6 rounded-lg shadow-lg border-t-4 border-primary-500 text-center hover:shadow-xl transition-shadow">
                <div class="bg-primary-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <p class="text-lg font-semibold text-gray-800"><?= htmlspecialchars($item) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Our Expertise -->
<div class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Expertise</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                We have experience in various areas of electronic devices development, software development, 
                and circuitry design
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
            <?php foreach ($expertise as $area): ?>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-primary-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        <span class="text-gray-800"><?= htmlspecialchars($area) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- What We Can Do -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Left Column -->
        <div>
            <h2 class="text-3xl font-bold text-gray-900 mb-6">We Can Provide</h2>
            <div class="space-y-4">
                <div class="flex items-start space-x-4 p-4 bg-white rounded-lg shadow-md">
                    <div class="flex-shrink-0">
                        <div class="bg-primary-100 w-10 h-10 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-700 flex-1">
                        The full cycle of electronic devices development (from concept to finished product)
                    </p>
                </div>
                
                <div class="flex items-start space-x-4 p-4 bg-white rounded-lg shadow-md">
                    <div class="flex-shrink-0">
                        <div class="bg-primary-100 w-10 h-10 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-700 flex-1">
                        Provision of individual phases of development
                    </p>
                </div>
                
                <div class="flex items-start space-x-4 p-4 bg-white rounded-lg shadow-md">
                    <div class="flex-shrink-0">
                        <div class="bg-primary-100 w-10 h-10 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-700 flex-1">
                        Completion of uncompleted projects which have already been started
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Right Column -->
        <div>
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Our Approach</h2>
            <div class="bg-gradient-to-br from-primary-50 to-primary-100 rounded-lg p-8 border-l-4 border-primary-600">
                <p class="text-gray-700 mb-4">
                    We are happy to work on both <strong>large and small projects</strong>, for big or small enterprises.
                </p>
                <p class="text-gray-700 mb-4">
                    We strive to ensure the <strong>lowest cost</strong> of the products we develop by careful selection 
                    of components, maintaining the balance between cost and quality.
                </p>
                <p class="text-gray-700 font-semibold text-lg">
                    The main reasons to choose us are <strong class="text-primary-700">cost-effectiveness</strong>, 
                    <strong class="text-primary-700">quick turn-around times</strong>, and 
                    <strong class="text-primary-700">high quality</strong>!
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Work With Us?</h2>
        <p class="text-xl text-primary-100 mb-8 max-w-2xl mx-auto">
            Let's discuss your electronic device development project today
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/contacts" class="inline-block bg-white text-primary-600 px-8 py-3 rounded-lg font-semibold hover:bg-primary-50 transition-colors">
                Contact Us
            </a>
            <a href="/services" class="inline-block bg-primary-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-400 transition-colors border-2 border-white">
                View Services
            </a>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/partials/footer.php'; ?>
