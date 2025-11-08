<?php require_once __DIR__ . '/partials/header.php'; ?>

<!-- Page Header -->
<div class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Contact Us</h1>
        <p class="text-xl text-primary-100">Get in touch with our team</p>
    </div>
</div>

<!-- Contact Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Contact Information -->
        <div>
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Get In Touch</h2>
            <p class="text-lg text-gray-700 mb-8">
                For more information about our services or to discuss your project, 
                please don't hesitate to contact us. We're here to help bring your ideas to life.
            </p>
            
            <div class="space-y-6">
                <!-- Email -->
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <div class="bg-primary-100 w-12 h-12 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">Email</h3>
                        <a href="mailto:<?= htmlspecialchars($config['site']['email']) ?>" 
                           class="text-primary-600 hover:text-primary-700">
                            <?= htmlspecialchars($config['site']['email']) ?>
                        </a>
                    </div>
                </div>
                
                <!-- Location -->
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <div class="bg-primary-100 w-12 h-12 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">Location</h3>
                        <p class="text-gray-600"><?= htmlspecialchars($config['site']['location']) ?></p>
                        <p class="text-gray-600">Development Center</p>
                    </div>
                </div>
                
                <!-- Working Hours -->
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <div class="bg-primary-100 w-12 h-12 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">Business Hours</h3>
                        <p class="text-gray-600">Monday - Friday: 9:00 AM - 6:00 PM</p>
                        <p class="text-gray-600">Weekend: Closed</p>
                    </div>
                </div>
            </div>
            
            <!-- Why Contact Us -->
            <div class="mt-12 bg-gradient-to-br from-primary-50 to-primary-100 rounded-lg p-6 border-l-4 border-primary-600">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Why Contact Us?</h3>
                <ul class="space-y-2">
                    <li class="flex items-start space-x-2">
                        <svg class="w-5 h-5 text-primary-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-gray-700">Free consultation and project assessment</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <svg class="w-5 h-5 text-primary-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-gray-700">Quick response time</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <svg class="w-5 h-5 text-primary-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-gray-700">Professional advice from experienced engineers</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <svg class="w-5 h-5 text-primary-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-gray-700">No obligation quotes</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Contact Form -->
        <div>
            <div class="bg-white rounded-lg shadow-xl p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Send Us a Message</h2>
                
                <form action="#" method="POST" class="space-y-6" x-data="{ submitted: false }" @submit.prevent="submitted = true">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Your Name *
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors">
                    </div>
                    
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email Address *
                        </label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors">
                    </div>
                    
                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Phone Number
                        </label>
                        <input type="tel" 
                               id="phone" 
                               name="phone"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors">
                    </div>
                    
                    <!-- Subject -->
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                            Subject *
                        </label>
                        <input type="text" 
                               id="subject" 
                               name="subject" 
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors">
                    </div>
                    
                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                            Message *
                        </label>
                        <textarea id="message" 
                                  name="message" 
                                  rows="6" 
                                  required
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors"></textarea>
                    </div>
                    
                    <!-- Submit Button -->
                    <div>
                        <button type="submit" 
                                class="w-full bg-primary-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-700 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                            Send Message
                        </button>
                    </div>
                    
                    <!-- Success Message -->
                    <div x-show="submitted" 
                         x-cloak
                         x-transition
                         class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                        <p class="font-semibold">Thank you for your message!</p>
                        <p class="text-sm">We'll get back to you as soon as possible.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Additional Info -->
<div class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">International Clients Welcome</h2>
            <p class="text-lg text-gray-700 mb-6">
                Distance is not a problem! We work with clients worldwide and provide regular updates 
                via email, photos, and video throughout the development process.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <div class="bg-white px-6 py-3 rounded-lg shadow-md">
                    <span class="text-gray-600">🌍 International Projects</span>
                </div>
                <div class="bg-white px-6 py-3 rounded-lg shadow-md">
                    <span class="text-gray-600">💬 English Communication</span>
                </div>
                <div class="bg-white px-6 py-3 rounded-lg shadow-md">
                    <span class="text-gray-600">📧 Remote Collaboration</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/partials/footer.php'; ?>
