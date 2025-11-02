<!-- Page Header -->
<section class="bg-gradient-to-br from-primary-800 to-primary-900 text-white py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Contacts</h1>
            <p class="text-xl text-primary-100">Get in touch with us</p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Sidebar -->
                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-primary-800 mb-4">«Dimgent Technologies» is:</h3>
                        <ul class="space-y-2 text-gray-700 text-sm">
                            <li>• More than 20 years of experience</li>
                            <li>• More than 50 successfully completed projects</li>
                            <li>• Experienced specialists</li>
                            <li>• Guaranteed quality</li>
                            <li>• Short turn-around times</li>
                            <li>• Cost effective</li>
                        </ul>
                        <a href="/about" class="inline-block mt-4 text-primary-600 hover:text-primary-700 font-semibold text-sm">
                            And more... →
                        </a>
                    </div>

                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-primary-800 mb-4">We can provide:</h3>
                        <ul class="space-y-2 text-gray-700 text-sm">
                            <li>• The full cycle of electronic devices development</li>
                            <li>• Provision of individual phases of development</li>
                            <li>• Completion of uncompleted projects</li>
                        </ul>
                        <a href="/services" class="inline-block mt-4 text-primary-600 hover:text-primary-700 font-semibold text-sm">
                            And more... →
                        </a>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-3">
                    <!-- Contact Information -->
                    <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                        <div class="text-center mb-8">
                            <p class="text-lg text-gray-700 mb-4">
                                <span class="text-primary-700 font-semibold">For more information, please email us on:</span>
                            </p>
                            <a href="mailto:<?= $config['site']['email'] ?>" class="inline-flex items-center space-x-2 text-2xl font-bold text-primary-600 hover:text-primary-700">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span><?= $config['site']['email'] ?></span>
                            </a>
                        </div>

                        <div class="border-t pt-6">
                            <div class="flex items-center justify-center space-x-2 text-gray-700">
                                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span class="text-lg font-semibold"><?= $config['site']['location'] ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="bg-white rounded-2xl shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Send Us a Message</h2>
                        
                        <form id="contactForm" class="space-y-6" x-data="contactForm()">
                            <!-- Success Message -->
                            <div x-show="success" 
                                 x-cloak
                                 x-transition
                                 class="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg">
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <p class="text-green-700 font-semibold" x-text="message"></p>
                                </div>
                            </div>

                            <!-- Error Message -->
                            <div x-show="error" 
                                 x-cloak
                                 x-transition
                                 class="bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                    <p class="text-red-700 font-semibold" x-text="message"></p>
                                </div>
                            </div>

                            <!-- Name Field -->
                            <div>
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Your Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       id="name" 
                                       name="name" 
                                       required 
                                       x-model="formData.name"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors">
                            </div>

                            <!-- Email Field -->
                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       required 
                                       x-model="formData.email"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors">
                            </div>

                            <!-- Phone Field -->
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Telephone Number
                                </label>
                                <input type="tel" 
                                       id="phone" 
                                       name="phone" 
                                       x-model="formData.phone"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors">
                            </div>

                            <!-- Country Field -->
                            <div>
                                <label for="country" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Country
                                </label>
                                <select id="country" 
                                        name="country" 
                                        x-model="formData.country"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors">
                                    <option value="">Select Country</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United States">United States</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Germany">Germany</option>
                                    <option value="France">France</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <!-- Message Field -->
                            <div>
                                <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Message <span class="text-red-500">*</span>
                                </label>
                                <textarea id="message" 
                                          name="message" 
                                          required 
                                          rows="6" 
                                          x-model="formData.message"
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors resize-none"></textarea>
                            </div>

                            <!-- Honeypot Field (hidden) -->
                            <input type="text" 
                                   name="company" 
                                   x-model="formData.company"
                                   class="hidden" 
                                   tabindex="-1" 
                                   autocomplete="off">

                            <!-- Submit Button -->
                            <div>
                                <button type="submit" 
                                        :disabled="loading"
                                        class="w-full bg-primary-600 hover:bg-primary-700 disabled:bg-gray-400 text-white font-semibold py-3 px-6 rounded-lg transition-colors shadow-lg flex items-center justify-center space-x-2">
                                    <span x-show="!loading">Send Message</span>
                                    <span x-show="loading" class="flex items-center space-x-2">
                                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        <span>Sending...</span>
                                    </span>
                                </button>
                            </div>

                            <p class="text-sm text-gray-600 text-center">
                                This site is protected by reCAPTCHA and the Google 
                                <a href="https://policies.google.com/privacy" target="_blank" class="text-primary-600 hover:underline">Privacy Policy</a> and 
                                <a href="https://policies.google.com/terms" target="_blank" class="text-primary-600 hover:underline">Terms of Service</a> apply.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- reCAPTCHA v3 -->
<?php if (!empty($recaptcha_site_key)): ?>
<script src="https://www.google.com/recaptcha/api.js?render=<?= $recaptcha_site_key ?>"></script>
<script>
    function contactForm() {
        return {
            formData: {
                name: '',
                email: '',
                phone: '',
                country: '',
                message: '',
                company: '' // honeypot
            },
            loading: false,
            success: false,
            error: false,
            message: '',

            async submitForm(event) {
                event.preventDefault();
                
                this.loading = true;
                this.success = false;
                this.error = false;
                this.message = '';

                try {
                    // Get reCAPTCHA token
                    const token = await grecaptcha.execute('<?= $recaptcha_site_key ?>', {action: 'contact'});
                    
                    // Prepare form data
                    const data = new FormData();
                    data.append('name', this.formData.name);
                    data.append('email', this.formData.email);
                    data.append('phone', this.formData.phone);
                    data.append('country', this.formData.country);
                    data.append('message', this.formData.message);
                    data.append('company', this.formData.company);
                    data.append('recaptcha_token', token);

                    // Send request
                    const response = await fetch('/contact/send', {
                        method: 'POST',
                        body: data
                    });

                    const result = await response.json();

                    if (result.success) {
                        this.success = true;
                        this.message = result.message;
                        // Reset form
                        this.formData = {
                            name: '',
                            email: '',
                            phone: '',
                            country: '',
                            message: '',
                            company: ''
                        };
                        document.getElementById('contactForm').reset();
                    } else {
                        this.error = true;
                        this.message = result.message;
                    }
                } catch (error) {
                    this.error = true;
                    this.message = 'An error occurred. Please try again later.';
                } finally {
                    this.loading = false;
                }
            }
        }
    }

    // Bind form submit
    document.addEventListener('alpine:init', () => {
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            Alpine.raw(this.__x.$data).submitForm(e);
        });
    });
</script>
<?php else: ?>
<script>
    function contactForm() {
        return {
            formData: {
                name: '',
                email: '',
                phone: '',
                country: '',
                message: '',
                company: ''
            },
            loading: false,
            success: false,
            error: false,
            message: '',

            async submitForm(event) {
                event.preventDefault();
                
                this.loading = true;
                this.success = false;
                this.error = false;
                this.message = '';

                try {
                    const data = new FormData();
                    data.append('name', this.formData.name);
                    data.append('email', this.formData.email);
                    data.append('phone', this.formData.phone);
                    data.append('country', this.formData.country);
                    data.append('message', this.formData.message);
                    data.append('company', this.formData.company);

                    const response = await fetch('/contact/send', {
                        method: 'POST',
                        body: data
                    });

                    const result = await response.json();

                    if (result.success) {
                        this.success = true;
                        this.message = result.message;
                        this.formData = {
                            name: '',
                            email: '',
                            phone: '',
                            country: '',
                            message: '',
                            company: ''
                        };
                        document.getElementById('contactForm').reset();
                    } else {
                        this.error = true;
                        this.message = result.message;
                    }
                } catch (error) {
                    this.error = true;
                    this.message = 'An error occurred. Please try again later.';
                } finally {
                    this.loading = false;
                }
            }
        }
    }

    document.addEventListener('alpine:init', () => {
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            Alpine.raw(this.__x.$data).submitForm(e);
        });
    });
</script>
<?php endif; ?>
