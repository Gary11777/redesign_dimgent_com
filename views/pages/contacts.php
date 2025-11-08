<?php $this->layout('layout'); ?>

<?php $this->start('main'); ?>
<section class="max-w-4xl mx-auto px-4 space-y-8">
    <article class="bg-white rounded-xl shadow-lg p-8">
        <div class="prose max-w-none text-gray-700">
            <?= nl2br($this->e($content ?? '')) ?>
        </div>
    </article>

    <?php if (!empty($success)): ?>
        <div class="bg-green-100 border-l-4 border-green-500 text-green-800 p-4 rounded">
            <p class="font-semibold">Your message has been successfully sent. Thank you!</p>
        </div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <div class="bg-red-100 border-l-4 border-red-500 text-red-800 p-4 rounded">
            <p class="font-semibold">There were issues with your submission:</p>
            <div class="mt-2 text-sm space-y-1"><?= $error ?></div>
        </div>
    <?php endif; ?>

    <form action="/contacts" method="POST" class="bg-white rounded-xl shadow-lg p-8 space-y-6" data-recaptcha="true">
        <input type="hidden" name="<?= $this->e(Config::get('security.csrf_token_name', 'csrf_token')) ?>" value="<?= $this->e($csrf_token) ?>">
        <input type="hidden" name="g-recaptcha-response" value="">
        <div class="hidden">
            <label>Leave this field empty<input type="text" name="website" tabindex="-1" autocomplete="off"></label>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1" for="name">Your name *</label>
                <input type="text" id="name" name="name" required maxlength="100" pattern="[a-zA-Z\s\-\.' ]+" value="<?= $this->e($form_data['name'] ?? '') ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1" for="email">E-mail *</label>
                <input type="email" id="email" name="email" required maxlength="255" value="<?= $this->e($form_data['email'] ?? '') ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1" for="country">Country</label>
                <input type="text" id="country" name="country" maxlength="100" value="<?= $this->e($form_data['country'] ?? '') ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1" for="phone">Telephone number</label>
                <input type="tel" id="phone" name="phone" maxlength="50" pattern="[0-9\s\-\+\(\)]+" value="<?= $this->e($form_data['phone'] ?? '') ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-400">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="message">Message *</label>
            <textarea id="message" name="message" required rows="6" maxlength="5000" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-400"><?= $this->e($form_data['message'] ?? '') ?></textarea>
        </div>

        <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-primary-600 text-white font-semibold rounded-lg shadow hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-400">
            Submit
        </button>
        <p class="text-xs text-gray-500">Protected by reCAPTCHA v3.</p>
    </form>
</section>
<?php $this->stop(); ?>
