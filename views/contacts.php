<?php require_once __DIR__ . '/../includes/helpers.php'; ?>
<?php require __DIR__ . '/../includes/header.php'; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Sidebar -->
        <aside class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">«Dimgent Technologies» is:</h3>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        More than 20 years of experience.
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        More than 50 successfully completed projects.
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Experienced specialists.
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Guaranteed quality.
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Short turn-around times.
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Cost effective.
                    </li>
                </ul>
                <a href="/about.php" class="inline-block mt-4 text-blue-600 hover:text-blue-800 font-medium text-sm">And more...</a>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">We can provide:</h3>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        The full cycle of electronic devices development (from concept to finished product).
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Provision of individual phases of development.
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Completion of uncompleted projects which have already been started.
                    </li>
                </ul>
                <a href="/services.php" class="inline-block mt-4 text-blue-600 hover:text-blue-800 font-medium text-sm">And more…</a>
            </div>
        </aside>
        
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Contacts</h1>
                
                <p class="text-center text-lg mb-6">
                    <span class="text-gray-600">For more information, please email us on:</span><br>
                    <a href="mailto:<?php echo e(config('app')['email']); ?>" 
                       class="text-blue-600 hover:text-blue-800 font-semibold text-xl">
                        <?php echo e(config('app')['email']); ?>
                    </a>
                </p>
                
                <hr class="my-8">
                
                <h2 class="text-xl font-semibold text-gray-800 mb-6">You can contact us using the form below:</h2>
                
                <form id="contactForm" method="POST" action="/contact-submit.php" class="space-y-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Your name <span class="text-red-600">*</span>
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                    </div>
                    
                    <!-- Country -->
                    <div>
                        <label for="country" class="block text-sm font-medium text-gray-700 mb-2">
                            Country
                        </label>
                        <select id="country" 
                                name="country" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                            <option value="">Select Country</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Canada">Canada</option>
                            <option value="China">China</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Egypt">Egypt</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="Germany">Germany</option>
                            <option value="Greece">Greece</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Japan">Japan</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Norway">Norway</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Romania">Romania</option>
                            <option value="Russian Federation">Russian Federation</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Spain">Spain</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                        </select>
                    </div>
                    
                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Telephone number
                        </label>
                        <input type="tel" 
                               id="phone" 
                               name="phone" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                    </div>
                    
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            E-mail <span class="text-red-600">*</span>
                        </label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                    </div>
                    
                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                            Message <span class="text-red-600">*</span>
                        </label>
                        <textarea id="message" 
                                  name="message" 
                                  required 
                                  rows="6" 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none"></textarea>
                    </div>
                    
                    <!-- Honeypot Field (hidden from users) -->
                    <div class="hidden">
                        <label for="company">Company (leave blank)</label>
                        <input type="text" id="company" name="company" tabindex="-1" autocomplete="off">
                    </div>
                    
                    <!-- reCAPTCHA Token (hidden) -->
                    <input type="hidden" id="recaptcha_token" name="recaptcha_token">
                    
                    <!-- Submit Button -->
                    <div>
                        <button type="submit" 
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition-colors shadow-md flex items-center justify-center">
                            <span id="submitText">Submit</span>
                            <svg id="submitSpinner" class="hidden animate-spin ml-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <p class="text-sm text-gray-500 text-center">
                        This site is protected by reCAPTCHA and the Google 
                        <a href="https://policies.google.com/privacy" class="text-blue-600 hover:text-blue-800">Privacy Policy</a> and 
                        <a href="https://policies.google.com/terms" class="text-blue-600 hover:text-blue-800">Terms of Service</a> apply.
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// reCAPTCHA v3 Integration
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const submitBtn = e.target.querySelector('button[type="submit"]');
    const submitText = document.getElementById('submitText');
    const submitSpinner = document.getElementById('submitSpinner');
    
    // Disable submit button
    submitBtn.disabled = true;
    submitText.textContent = 'Sending...';
    submitSpinner.classList.remove('hidden');
    
    grecaptcha.ready(function() {
        grecaptcha.execute('<?php echo config('recaptcha')['site_key']; ?>', {action: 'submit'})
            .then(function(token) {
                document.getElementById('recaptcha_token').value = token;
                document.getElementById('contactForm').submit();
            })
            .catch(function(error) {
                submitBtn.disabled = false;
                submitText.textContent = 'Submit';
                submitSpinner.classList.add('hidden');
                alert('reCAPTCHA verification failed. Please try again.');
            });
    });
});
</script>

<?php require __DIR__ . '/../includes/footer.php'; ?>
