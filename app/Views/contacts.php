<?php $this->layout('layouts::base', [
    'title' => $title, 
    'metaDescription' => $metaDescription,
    'recaptcha_enabled' => $recaptcha_enabled,
    'recaptcha_site_key' => $recaptcha_site_key
]) ?>

<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Contact Us</h1>
        <p class="text-xl text-primary-100">Get in touch and let's discuss your project</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        
        <!-- Contact Information -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-lg p-8 sticky top-24">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Contact Information</h2>
                
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="bg-primary-100 p-3 rounded-lg mr-4">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Location</h3>
                            <p class="text-gray-600"><?= $this->e($config['site']['location']) ?></p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="bg-primary-100 p-3 rounded-lg mr-4">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Email</h3>
                            <a href="mailto:<?= $this->e($config['site']['email']) ?>" class="text-primary-600 hover:text-primary-700">
                                <?= $this->e($config['site']['email']) ?>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <h3 class="font-semibold text-gray-900 mb-3">Response Time</h3>
                    <p class="text-gray-600 text-sm">We typically respond within 24-48 hours during business days.</p>
                </div>
            </div>
        </div>
        
        <!-- Contact Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg p-8">
                
                <!-- Success Message -->
                <?php if ($success && $success_message): ?>
                    <div class="bg-green-50 border-l-4 border-green-500 p-6 mb-8" x-data="{ show: true }" x-show="show" x-transition>
                        <div class="flex justify-between items-start">
                            <div class="flex">
                                <svg class="w-6 h-6 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <p class="text-green-800"><?= $this->e($success_message) ?></p>
                            </div>
                            <button @click="show = false" class="text-green-800 hover:text-green-900">&times;</button>
                        </div>
                    </div>
                <?php endif; ?>
                
                <!-- Error Message -->
                <?php if (!empty($error_message)): ?>
                    <div class="bg-red-50 border-l-4 border-red-500 p-6 mb-8">
                        <div class="flex">
                            <svg class="w-6 h-6 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-red-800"><?= $this->e($error_message) ?></p>
                        </div>
                    </div>
                <?php endif; ?>
                
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Send Us a Message</h2>
                
                <form method="POST" action="/contacts" class="space-y-6" 
                      x-data="{ submitting: false }"
                      @submit="submitting = true"
                      <?php if ($recaptcha_enabled): ?>
                      @submit.prevent="handleSubmit($event)"
                      <?php endif; ?>>
                    
                    <!-- CSRF Token -->
                    <input type="hidden" name="csrf_token" value="<?= $this->e($csrf_token) ?>">
                    
                    <!-- Honeypot (hidden from users, catches bots) -->
                    <div style="position: absolute; left: -9999px;" aria-hidden="true">
                        <label for="website">Website (Leave blank)</label>
                        <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
                    </div>
                    
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Name <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name"
                            required
                            maxlength="100"
                            value="<?= $this->e($old['name'] ?? '') ?>"
                            class="w-full px-4 py-2 border <?= isset($errors['name']) ? 'border-red-500' : 'border-gray-300' ?> rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                        <?php if (isset($errors['name'])): ?>
                            <p class="mt-1 text-sm text-red-600"><?= $this->e($errors['name']) ?></p>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email"
                            required
                            maxlength="255"
                            value="<?= $this->e($old['email'] ?? '') ?>"
                            class="w-full px-4 py-2 border <?= isset($errors['email']) ? 'border-red-500' : 'border-gray-300' ?> rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                        <?php if (isset($errors['email'])): ?>
                            <p class="mt-1 text-sm text-red-600"><?= $this->e($errors['email']) ?></p>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Phone (optional) -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Phone (optional)
                        </label>
                        <input 
                            type="tel" 
                            name="phone" 
                            id="phone"
                            value="<?= $this->e($old['phone'] ?? '') ?>"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    </div>
                    
                    <!-- Subject -->
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                            Subject
                        </label>
                        <input 
                            type="text" 
                            name="subject" 
                            id="subject"
                            maxlength="200"
                            value="<?= $this->e($old['subject'] ?? 'General Inquiry') ?>"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    </div>
                    
                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                            Message <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            name="message" 
                            id="message"
                            required
                            rows="6"
                            minlength="10"
                            maxlength="5000"
                            class="w-full px-4 py-2 border <?= isset($errors['message']) ? 'border-red-500' : 'border-gray-300' ?> rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent"><?= $this->e($old['message'] ?? '') ?></textarea>
                        <?php if (isset($errors['message'])): ?>
                            <p class="mt-1 text-sm text-red-600"><?= $this->e($errors['message']) ?></p>
                        <?php endif; ?>
                        <p class="mt-1 text-sm text-gray-500">Minimum 10 characters, maximum 5000 characters</p>
                    </div>
                    
                    <!-- reCAPTCHA Info -->
                    <?php if ($recaptcha_enabled): ?>
                    <div class="text-xs text-gray-500">
                        This site is protected by reCAPTCHA and the Google
                        <a href="https://policies.google.com/privacy" class="text-primary-600 hover:underline" target="_blank">Privacy Policy</a> and
                        <a href="https://policies.google.com/terms" class="text-primary-600 hover:underline" target="_blank">Terms of Service</a> apply.
                    </div>
                    <?php endif; ?>
                    
                    <!-- Submit Button -->
                    <div>
                        <button 
                            type="submit"
                            :disabled="submitting"
                            class="w-full bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 disabled:bg-gray-400 disabled:cursor-not-allowed transition-colors">
                            <span x-show="!submitting">Send Message</span>
                            <span x-show="submitting" x-cloak>Sending...</span>
                        </button>
                    </div>
                </form>
                
                <?php if ($recaptcha_enabled): ?>
                <script>
                function handleSubmit(event) {
                    event.preventDefault();
                    const form = event.target;
                    
                    grecaptcha.ready(function() {
                        grecaptcha.execute('<?= $this->e($recaptcha_site_key) ?>', {action: 'contact'}).then(function(token) {
                            // Add reCAPTCHA token to form
                            const input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = 'g-recaptcha-response';
                            input.value = token;
                            form.appendChild(input);
                            
                            // Submit form
                            form.submit();
                        });
                    });
                }
                </script>
                <?php endif; ?>
            </div>
        </div>
        
    </div>
</div>
