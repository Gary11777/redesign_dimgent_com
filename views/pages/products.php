<?php $this->layout('layout'); ?>

<?php $this->start('main'); ?>
<section class="max-w-5xl mx-auto px-4 space-y-8">
    <article class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="h-64 bg-gray-200">
            <?php if (!empty($images)): ?>
                <img src="<?= $this->image($images[0]) ?>" alt="Garand 101" class="w-full h-full object-cover">
            <?php else: ?>
                <div class="w-full h-full flex items-center justify-center text-gray-500">Garand 101</div>
            <?php endif; ?>
        </div>
        <div class="p-8 space-y-6">
            <?php
            $lines = preg_split('/\r?\n/', $content ?? '');
            $inList = false;
            foreach ($lines as $line) {
                $line = trim($line);
                if ($line === '') {
                    if ($inList) {
                        echo '</ul>';
                        $inList = false;
                    }
                    continue;
                }
                if (preg_match('/^##\s*(.+)$/', $line, $match)) {
                    if ($inList) {
                        echo '</ul>';
                        $inList = false;
                    }
                    echo '<h2 class="text-2xl font-semibold text-primary-600">' . $this->e($match[1]) . '</h2>';
                } elseif (preg_match('/^\*\*(.+)\*\*$/', $line, $match)) {
                    echo '<p class="text-xl font-semibold text-gray-800">' . $this->e($match[1]) . '</p>';
                } elseif (strpos($line, '*') === 0 || strpos($line, '-') === 0) {
                    if (!$inList) {
                        echo '<ul class="list-disc ml-6 space-y-2 text-gray-700">';
                        $inList = true;
                    }
                    echo '<li>' . $this->e(ltrim($line, '*- ')) . '</li>';
                } else {
                    echo '<p class="text-gray-700 leading-relaxed">' . $this->e($line) . '</p>';
                }
            }
            if ($inList) {
                echo '</ul>';
            }
            ?>
        </div>
    </article>

    <?php if (!empty($images)): ?>
        <section>
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Product gallery</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <?php foreach ($images as $image): ?>
                    <figure class="bg-white rounded-lg shadow overflow-hidden">
                        <img src="<?= $this->image($image) ?>" alt="Garand 101" class="w-full h-48 object-cover">
                    </figure>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
</section>
<?php $this->stop(); ?>
