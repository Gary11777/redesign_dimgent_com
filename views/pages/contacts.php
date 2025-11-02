<?php
if (!isset($recaptchaSiteKey)) {
    require_once __DIR__ . '/../../core/Recaptcha.php';
    $recaptchaSiteKey = Recaptcha::getSiteKey();
}
require_once __DIR__ . '/../layouts/header.php';
?>

<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="md:col-span-2">
            <h1 class="text-3xl font-bold mb-6">Contacts</h1>
            
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <p class="text-center mb-4">
                    <span class="text-lg">For more information, please</span>
                </p>
                <p class="text-center mb-4">
                    <span class="text-lg">email us on:</span>
                    <img src="<?= View::image('mail_white.png') ?>" alt="E-mail" class="inline-block ml-2">
                </p>
            </div>

            <hr class="border-gray-300 my-6">

            <!-- Success/Error Messages -->
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

            <h3 class="text-xl font-semibold mb-4">You can contact us using the form below:</h3>

            <form action="/contacts" method="POST" class="bg-white rounded-lg shadow-md p-6" id="contactForm">
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
                            list="countries"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        >
                        <datalist id="countries">
                            <option value="United States">United States</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Poland">Poland</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Germany">Germany</option>
                            <option value="France">France</option>
                            <!-- Add more countries as needed -->
                        </datalist>
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                            Telephone number
                        </label>
                        <input 
                            type="tel" 
                            id="phone" 
                            name="phone"
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
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>

                    <div>
                        <label for="mess" class="block text-sm font-medium text-gray-700 mb-1">
                            Message <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            id="mess" 
                            name="mess" 
                            required
                            rows="6"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        ></textarea>
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

        <!-- Sidebar -->
        <div class="md:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6 border-l-4 border-blue-600">
                <h4 class="font-semibold mb-4">«Dimgent Technologies» is:</h4>
                <ul class="space-y-2 text-sm">
                    <li>• More than 20 years of experience.</li>
                    <li>• More than 50 successfully completed projects.</li>
                    <li>• Experienced specialists.</li>
                    <li>• Guaranteed quality.</li>
                    <li>• Short turn-around times.</li>
                    <li>• Cost effective.</li>
                    <li class="mt-4"><a href="/about" class="text-blue-600 hover:underline">And more…</a></li>
                </ul>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-600">
                <h4 class="font-semibold mb-4">We can provide:</h4>
                <ul class="space-y-2 text-sm">
                    <li>• The full cycle of electronic devices development (from concept to finished product).</li>
                    <li>• Provision of individual phases of development.</li>
                    <li>• Completion of uncompleted projects which have already been started.</li>
                    <li class="mt-4"><a href="/services" class="text-blue-600 hover:underline">And more…</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    // reCAPTCHA v3
    grecaptcha.ready(function() {
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            grecaptcha.execute('<?= View::escape($recaptchaSiteKey) ?>', {action: 'submit'}).then(function(token) {
                document.getElementById('g-recaptcha-response').value = token;
                document.getElementById('contactForm').submit();
            });
        });
    });
</script>

<?php
require_once __DIR__ . '/../layouts/footer.php';
?>

