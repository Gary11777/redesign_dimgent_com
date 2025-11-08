<?php $this->layout('layout') ?>

<?php $this->start('main') ?>
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto prose max-w-none">
        <?php
        // Parse content
        $lines = explode("\n", $content ?? '');
        $inList = false;
        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line)) {
                if ($inList) {
                    echo '</ul>';
                    $inList = false;
                }
                continue;
            }
            
            if (preg_match('/^([A-Z][^:]+):$/', $line, $matches)) {
                if ($inList) {
                    echo '</ul>';
                    $inList = false;
                }
                echo '<h2 class="text-2xl font-bold mt-8 mb-4">' . $this->e($matches[1]) . '</h2>';
            } elseif (strpos($line, '- ') === 0) {
                if (!$inList) {
                    echo '<ul class="list-disc ml-6 mb-4">';
                    $inList = true;
                }
                echo '<li class="mb-2">' . $this->e(substr($line, 2)) . '</li>';
            } else {
                if ($inList) {
                    echo '</ul>';
                    $inList = false;
                }
                echo '<p class="mb-4">' . $this->e($line) . '</p>';
            }
        }
        if ($inList) {
            echo '</ul>';
        }
        ?>
    </div>
</div>
<?php $this->stop() ?>

