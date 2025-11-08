<?php $this->layout('layout') ?>

<?php $this->start('main') ?>
<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="md:col-span-2">
            <h1 class="text-3xl font-bold mb-2">Garand 101</h1>
            <h2 class="text-xl text-gray-600 mb-6">a high-resolution fluxgate magnetometer</h2>
            
            <p class="mb-4"><span class="text-lg font-bold text-blue-900">Magnetic detection can be easy and convenient!</span></p>

            <?php if (!empty($images)): ?>
            <div class="bg-gray-100 rounded p-4 mb-6">
                <img src="<?= $this->image($images[0] ?? 'products_page_pics/main_photo_of_garand101.jpg') ?>" alt="Garand 101" class="w-full rounded-lg mb-4">
            </div>
            <?php endif; ?>

            <div class="prose max-w-none mb-6">
                <?php
                // Parse markdown-like content
                $lines = explode("\n", $content ?? '');
                foreach ($lines as $line) {
                    $line = trim($line);
                    if (empty($line)) continue;
                    
                    if (strpos($line, '##') === 0) {
                        echo '<h2 class="text-2xl font-bold mt-6 mb-4">' . $this->e(substr($line, 3)) . '</h2>';
                    } elseif (strpos($line, '**') !== false) {
                        $line = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $line);
                        echo '<p class="mb-4">' . $this->e($line) . '</p>';
                    } elseif (strpos($line, '- ') === 0) {
                        echo '<li class="ml-6 mb-2">' . $this->e(substr($line, 2)) . '</li>';
                    } else {
                        echo '<p class="mb-4">' . $this->e($line) . '</p>';
                    }
                }
                ?>
            </div>

            <?php if (!empty($images) && count($images) > 1): ?>
            <hr class="border-gray-300 my-8">
            <h2 class="text-2xl font-bold mb-6">Photos of Garand 101</h2>
            <div class="grid grid-cols-1 gap-4">
                <?php foreach (array_slice($images, 1) as $image): ?>
                <img src="<?= $this->image($image) ?>" alt="Garand 101" class="w-full rounded-lg shadow-md">
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>

        <!-- Sidebar -->
        <div class="md:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6 border-l-4 border-blue-600">
                <h4 class="font-semibold mb-4">«<?= $this->e($this->config('site.name', '')) ?>» is:</h4>
                <ul class="space-y-2 text-sm">
                    <li>• More than 20 years of experience.</li>
                    <li>• More than 50 successfully completed projects.</li>
                    <li>• Experienced specialists.</li>
                    <li>• Guaranteed quality.</li>
                    <li>• Short turn-around times.</li>
                    <li>• Cost effective.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php $this->stop() ?>

