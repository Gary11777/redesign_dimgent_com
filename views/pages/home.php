<?php $this->layout('layout'); ?>

<?php $this->start('main'); ?>
<section class="max-w-5xl mx-auto px-4">
    <div class="bg-white shadow-lg rounded-xl p-8">
        <h1 class="text-3xl md:text-4xl font-bold text-center text-primary-700 mb-4"><?= $this->e($site['name'] ?? 'Dimgent Technologies') ?></h1>
        <p class="text-center text-gray-600 text-lg mb-6"><?= $this->e($site['tagline'] ?? 'Electronics Development') ?></p>
        <p class="text-gray-700 leading-relaxed">
            <?= nl2br($this->e($content ?? '')) ?>
        </p>
    </div>

    <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        <?php
        $items = [
            'Technical specifications',
            'Electric circuits',
            'Software',
            'Printed circuit board design',
            'Housing structure & design',
            'Test models',
        ];
        foreach ($items as $item):
        ?>
            <div class="bg-white shadow rounded-lg p-4 border border-primary-100 text-center text-sm font-medium text-gray-700">
                <?= $this->e($item) ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php $this->stop(); ?>
