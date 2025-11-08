<?php $this->layout('layout') ?>

<?php $this->start('main') ?>
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Contacts</h1>
        
        <?php if (!empty($success) && $success): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            <p class="font-semibold">Your message has been successfully sent! Thank you!</p>
        </div>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <p class="font-semibold"><?= $error ?></p>
        </div>
        <?php endif; ?>

        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <p class="text-center mb-4">
                <span class="text-lg">For more information, please email us on:</span>
            </p>
            <p class="text-center">
                <a href="mailto:<?= $this->e($this->config('site.email', '')) ?>" class="text-blue-600 hover:underline">
                    <?= $this->e($this->config('site.email', '')) ?>
                </a>
            </p>
        </div>

        <h3 class="text-xl font-semibold mb-4">You can contact us using the form below:</h3>

        <form action="/contacts" method="POST" class="bg-white rounded-lg shadow-md p-6" id="contactForm">
            <!-- CSRF Token -->
            <input type="hidden" name="csrf_token" value="<?= $this->e($csrf_token) ?>">
            
            <!-- Honeypot field -->
            <input type="text" name="website" style="display: none;" tabindex="-1" autocomplete="off">

            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                        Your name <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        required
                        value="<?= $this->e($form_data['name'] ?? '') ?>"
                        maxlength="100"
                        pattern="[a-zA-Z\s\-\.']+"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    >
                </div>

                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700 mb-1">
                        Country
                    </label>
                    <input 
                        type="text" 
                        id="country" 
                        name="country"
                        value="<?= $this->e($form_data['country'] ?? '') ?>"
                        maxlength="100"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    >
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                        Telephone number
                    </label>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone"
                        value="<?= $this->e($form_data['phone'] ?? '') ?>"
                        maxlength="50"
                        pattern="[\d\s\-\+\(\)]+"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    >
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        E-mail <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        required
                        value="<?= $this->e($form_data['email'] ?? '') ?>"
                        maxlength="255"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    >
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-1">
                        Message <span class="text-red-500">*</span>
                    </label>
                    <textarea 
                        id="message" 
                        name="message" 
                        required
                        rows="6"
                        maxlength="5000"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    ><?= $this->e($form_data['message'] ?? '') ?></textarea>
                </div>

                <!-- reCAPTCHA -->
                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

                <div>
                    <button 
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md transition"
                    >
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php if (!empty($recaptcha_site_key)): ?>
<script>
    // reCAPTCHA v3
    grecaptcha.ready(function() {
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            grecaptcha.execute('<?= $this->e($recaptcha_site_key) ?>', {action: 'submit'}).then(function(token) {
                document.getElementById('g-recaptcha-response').value = token;
                document.getElementById('contactForm').submit();
            });
        });
    });
</script>
<?php endif; ?>
<?php $this->stop() ?>

