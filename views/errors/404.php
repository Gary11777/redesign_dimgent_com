<?php $this->layout('layout'); ?>

<?php $this->start('main'); ?>
<section class="flex items-center justify-center">
    <div class="text-center space-y-4">
        <h1 class="text-6xl font-extrabold text-primary-600">404</h1>
        <p class="text-gray-600 text-lg">The page you are looking for could not be found.</p>
        <a href="/" class="inline-flex items-center px-6 py-3 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition">Return to homepage</a>
    </div>
</section>
<?php $this->stop(); ?>
