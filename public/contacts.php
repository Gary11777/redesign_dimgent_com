<?php
/**
 * Contacts Page
 * Contact form and company contact information
 */

// Page metadata
$page_title = 'Contacts';
$page_description = 'Dimgent Technologies Development Center: Minsk, Belarus. Contact us for electronic device development services.';
$page_keywords = 'Dimgent Technologies contacts, electronics development, Minsk Belarus';

// Load app config for reCAPTCHA
require_once __DIR__ . '/../includes/functions.php';
$app_config = load_config('app_config');

// Additional head content for reCAPTCHA
$extra_head_content = '
<script src="https://www.google.com/recaptcha/api.js?render=' . $app_config['recaptcha']['site_key'] . '"></script>
';

// Include header and navigation
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<!-- Page Header -->
<section class="bg-gradient-to-r from-dimgent-blue to-blue-600 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold text-center">Contact Us</h1>
    </div>
</section>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <div class="grid md:grid-cols-3 gap-8">
        <!-- Sidebar -->
        <aside class="md:col-span-1 space-y-6">
            <!-- Company Benefits -->
            <div class="bg-white border border-dashed border-dimgent-steel rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4 text-dimgent-navy">«Dimgent Technologies» is:</h3>
                <ul class="space-y-2 text-gray-700 text-sm">
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">✓</span>
                        <span>More than 20 years of experience.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">✓</span>
                        <span>More than 50 successfully completed projects.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">✓</span>
                        <span>Experienced specialists.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">✓</span>
                        <span>Guaranteed quality.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">✓</span>
                        <span>Short turn-around times.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">✓</span>
                        <span>Cost effective.</span>
                    </li>
                </ul>
                <div class="mt-4">
                    <a href="about.php" class="text-dimgent-blue hover:text-dimgent-blue-dark font-medium text-sm">And more...</a>
                </div>
            </div>

            <!-- We can provide -->
            <div class="bg-white border border-dashed border-dimgent-steel rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4 text-dimgent-navy">We can provide:</h3>
                <ul class="space-y-2 text-gray-700 text-sm">
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">•</span>
                        <span>The full cycle of electronic devices development (from concept to finished product).</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">•</span>
                        <span>Provision of individual phases of development.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">•</span>
                        <span>Completion of uncompleted projects which have already been started.</span>
                    </li>
                </ul>
                <div class="mt-4">
                    <a href="services.php" class="text-dimgent-blue hover:text-dimgent-blue-dark font-medium text-sm">And more...</a>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="md:col-span-2">
            <h2 class="text-3xl font-bold mb-6 text-center text-dimgent-navy">Contacts</h2>
            
            <!-- Contact Info -->
            <div class="text-center mb-8">
                <p class="text-lg mb-2">
                    <span class="text-gray-600">For more information, please</span><br>
                    <span class="text-xl font-semibold text-dimgent-navy">email us on:</span>
                </p>
                <p class="text-xl text-dimgent-blue font-semibold">
                    <a href="mailto:<?php echo e($app_config['contact']['email']); ?>" class="hover:text-dimgent-blue-dark">
                        <?php echo e($app_config['contact']['email']); ?>
                    </a>
                </p>
            </div>

            <hr class="my-8">

            <!-- Contact Form -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-2xl font-semibold mb-6 text-dimgent-navy">You can contact us using the form below:</h3>
                
                <!-- Form Response Messages -->
                <div id="formResponse" class="hidden mb-6"></div>

                <form id="contactForm" action="sendmail.php" method="POST" class="space-y-6">
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Your name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               required 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dimgent-blue focus:border-dimgent-blue transition-colors">
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            E-mail <span class="text-red-500">*</span>
                        </label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               required 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dimgent-blue focus:border-dimgent-blue transition-colors">
                    </div>

                    <!-- Phone Field (Optional) -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Telephone number
                        </label>
                        <input type="tel" 
                               id="phone" 
                               name="phone" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dimgent-blue focus:border-dimgent-blue transition-colors">
                    </div>

                    <!-- Message Field -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                            Message <span class="text-red-500">*</span>
                        </label>
                        <textarea id="message" 
                                  name="message" 
                                  required 
                                  rows="6" 
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dimgent-blue focus:border-dimgent-blue transition-colors resize-none"></textarea>
                    </div>

                    <!-- Honeypot Field (Hidden from users) -->
                    <div class="hidden" aria-hidden="true">
                        <label for="company">Company (leave blank)</label>
                        <input type="text" id="company" name="company" tabindex="-1" autocomplete="off">
                    </div>

                    <!-- reCAPTCHA Token (Hidden) -->
                    <input type="hidden" id="recaptchaToken" name="recaptcha_token">

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" 
                                id="submitBtn"
                                class="w-full bg-dimgent-blue hover:bg-dimgent-blue-dark text-white font-semibold px-6 py-3 rounded-lg transition-colors shadow-md hover:shadow-lg">
                            <span id="submitText">Send Message</span>
                            <span id="submitLoader" class="hidden">Sending...</span>
                        </button>
                    </div>

                    <p class="text-sm text-gray-500 text-center">
                        This site is protected by reCAPTCHA and the Google
                        <a href="https://policies.google.com/privacy" target="_blank" class="text-dimgent-blue hover:underline">Privacy Policy</a> and
                        <a href="https://policies.google.com/terms" target="_blank" class="text-dimgent-blue hover:underline">Terms of Service</a> apply.
                    </p>
                </form>
            </div>

            <!-- Contact Details -->
            <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Location -->
                <div class="bg-gradient-to-br from-dimgent-blue to-blue-600 text-white rounded-lg p-6 text-center">
                    <div class="text-4xl mb-3">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Location</h3>
                    <p><?php echo e($app_config['contact']['location']); ?></p>
                    <p class="text-sm mt-1">Development Center</p>
                </div>

                <!-- Email -->
                <div class="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-lg p-6 text-center">
                    <div class="text-4xl mb-3">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Email</h3>
                    <p class="break-all">
                        <a href="mailto:<?php echo e($app_config['contact']['email']); ?>" class="hover:underline">
                            <?php echo e($app_config['contact']['email']); ?>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</main>

<!-- Contact Form JavaScript -->
<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    const submitLoader = document.getElementById('submitLoader');
    const formResponse = document.getElementById('formResponse');
    
    // Disable submit button
    submitBtn.disabled = true;
    submitText.classList.add('hidden');
    submitLoader.classList.remove('hidden');
    
    // Generate reCAPTCHA token
    grecaptcha.ready(function() {
        grecaptcha.execute('<?php echo $app_config['recaptcha']['site_key']; ?>', {action: 'contact_form'})
        .then(function(token) {
            // Set token in hidden field
            document.getElementById('recaptchaToken').value = token;
            
            // Submit form via AJAX
            const formData = new FormData(document.getElementById('contactForm'));
            
            fetch('sendmail.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Show response message
                formResponse.classList.remove('hidden');
                
                if (data.success) {
                    formResponse.innerHTML = '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">' + data.message + '</div>';
                    document.getElementById('contactForm').reset();
                } else {
                    formResponse.innerHTML = '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">' + data.message + '</div>';
                }
                
                // Re-enable submit button
                submitBtn.disabled = false;
                submitText.classList.remove('hidden');
                submitLoader.classList.add('hidden');
                
                // Scroll to response
                formResponse.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            })
            .catch(error => {
                formResponse.classList.remove('hidden');
                formResponse.innerHTML = '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">An error occurred. Please try again.</div>';
                
                // Re-enable submit button
                submitBtn.disabled = false;
                submitText.classList.remove('hidden');
                submitLoader.classList.add('hidden');
            });
        });
    });
});
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
