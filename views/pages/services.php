<?php $this->layout('layout'); ?>

<?php $this->start('main'); ?>
<section class="max-w-5xl mx-auto px-4 space-y-10">
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

        if (preg_match('/^([A-Z][^:]+):$/u', $line, $match)) {
            if ($inList) {
                echo '</ul>';
                $inList = false;
            }
            echo '<h2 class="text-2xl font-semibold text-primary-600">' . $this->e($match[1]) . '</h2>';
            continue;
        }

        if (preg_match('/^(\*|-)?\s*(.+)$/', $line, $match) && in_array($match[1], ['*', '-'], true)) {
            if (!$inList) {
                echo '<ul class="list-disc ml-6 space-y-2 text-gray-700">';
                $inList = true;
            }
            echo '<li>' . $this->e($match[2]) . '</li>';
            continue;
        }

        if ($inList) {
            echo '</ul>';
            $inList = false;
        }

        echo '<p class="text-gray-700 leading-relaxed">' . $this->e($line) . '</p>';
    }
    if ($inList) {
        echo '</ul>';
    }
    ?>
</section>
<?php $this->stop(); ?>
