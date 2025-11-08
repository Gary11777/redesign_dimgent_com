<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $this->e($metaDescription ?? $config['site']['description']) ?>">
    <title><?= $this->e($title ?? 'Home') ?> - <?= $this->e($config['site']['name']) ?></title>
    
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="/assets/css/output.css">
    
    <!-- Alpine.js -->
    <script defer src="/assets/js/app.js"></script>
    
    <!-- reCAPTCHA v3 -->
    <?php if (!empty($recaptcha_enabled)): ?>
    <script src="https://www.google.com/recaptcha/api.js?render=<?= $this->e($recaptcha_site_key) ?>"></script>
    <?php endif; ?>
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">
    
    <?= $this->insert('partials::header') ?>
    
    <main>
        <?= $this->section('content') ?>
    </main>
    
    <?= $this->insert('partials::footer') ?>
    
</body>
</html>
