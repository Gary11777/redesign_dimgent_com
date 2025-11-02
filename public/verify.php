<?php
/**
 * Installation Verification Script
 * 
 * This script checks if your installation is configured correctly.
 * Delete this file after verifying your installation for security.
 */

// Security: Only run in development
define('ALLOW_VERIFY', true); // Set to false or delete this file in production

if (!ALLOW_VERIFY) {
    die('Verification script disabled for security.');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installation Verification - Dimgent Technologies</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 py-12 px-4">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Installation Verification</h1>
            <p class="text-gray-600 mb-8">Checking your Dimgent Technologies website setup...</p>
            
            <div class="space-y-4">
                <?php
                $checks = [];
                
                // Check PHP Version
                $phpVersion = PHP_VERSION;
                $phpOk = version_compare($phpVersion, '8.0.0', '>=');
                $checks[] = [
                    'name' => 'PHP Version',
                    'status' => $phpOk,
                    'message' => "PHP $phpVersion " . ($phpOk ? '(OK)' : '(Requires PHP 8.0+)'),
                ];
                
                // Check required extensions
                $extensions = ['json', 'mbstring', 'curl', 'openssl'];
                foreach ($extensions as $ext) {
                    $loaded = extension_loaded($ext);
                    $checks[] = [
                        'name' => "Extension: $ext",
                        'status' => $loaded,
                        'message' => $loaded ? 'Loaded' : 'Missing',
                    ];
                }
                
                // Check directories
                $dirs = [
                    'Config Directory' => '../config',
                    'App Directory' => '../app',
                    'Assets Directory' => 'assets',
                ];
                
                foreach ($dirs as $name => $dir) {
                    $exists = is_dir($dir);
                    $checks[] = [
                        'name' => $name,
                        'status' => $exists,
                        'message' => $exists ? 'Found' : 'Missing',
                    ];
                }
                
                // Check important files
                $files = [
                    'Config File' => '../config/app.php',
                    'Autoloader' => '../vendor/autoload.php',
                    'Logo Image' => 'assets/images/logo.png',
                ];
                
                foreach ($files as $name => $file) {
                    $exists = file_exists($file);
                    $checks[] = [
                        'name' => $name,
                        'status' => $exists,
                        'message' => $exists ? 'Found' : 'Missing',
                    ];
                }
                
                // Check .htaccess
                $htaccess = file_exists('.htaccess');
                $checks[] = [
                    'name' => '.htaccess File',
                    'status' => $htaccess,
                    'message' => $htaccess ? 'Found' : 'Missing (required for Apache)',
                ];
                
                // Check configuration
                if (file_exists('../config/app.php')) {
                    $config = require '../config/app.php';
                    
                    // Check SMTP config
                    $smtpConfigured = !empty($config['mail']['smtp_username']) && 
                                     !empty($config['mail']['smtp_password']);
                    $checks[] = [
                        'name' => 'SMTP Configuration',
                        'status' => $smtpConfigured,
                        'message' => $smtpConfigured ? 'Configured' : 'Not configured',
                    ];
                    
                    // Check reCAPTCHA config
                    $recaptchaConfigured = !empty($config['recaptcha']['site_key']) && 
                                          !empty($config['recaptcha']['secret_key']);
                    $checks[] = [
                        'name' => 'reCAPTCHA Configuration',
                        'status' => $recaptchaConfigured,
                        'message' => $recaptchaConfigured ? 'Configured' : 'Not configured (optional)',
                    ];
                }
                
                // Check write permissions
                $writable = is_writable('../app');
                $checks[] = [
                    'name' => 'Write Permissions',
                    'status' => $writable,
                    'message' => $writable ? 'OK' : 'Check file permissions',
                ];
                
                // Display results
                $allOk = true;
                foreach ($checks as $check) {
                    $allOk = $allOk && $check['status'];
                    $color = $check['status'] ? 'green' : 'red';
                    $icon = $check['status'] ? '✓' : '✗';
                    ?>
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div>
                            <span class="font-semibold text-gray-800"><?= htmlspecialchars($check['name']) ?></span>
                            <span class="text-gray-600 ml-2"><?= htmlspecialchars($check['message']) ?></span>
                        </div>
                        <span class="text-2xl text-<?= $color ?>-600"><?= $icon ?></span>
                    </div>
                    <?php
                }
                ?>
            </div>
            
            <div class="mt-8 p-6 rounded-lg <?= $allOk ? 'bg-green-50 border border-green-200' : 'bg-yellow-50 border border-yellow-200' ?>">
                <?php if ($allOk): ?>
                    <h3 class="text-xl font-bold text-green-800 mb-2">✓ All Checks Passed!</h3>
                    <p class="text-green-700 mb-4">Your installation appears to be configured correctly.</p>
                    <div class="space-y-2">
                        <a href="/" class="inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg font-semibold transition-colors">
                            Visit Homepage
                        </a>
                        <p class="text-sm text-green-700 mt-4">
                            <strong>Important:</strong> Delete this verify.php file for security after verification!
                        </p>
                    </div>
                <?php else: ?>
                    <h3 class="text-xl font-bold text-yellow-800 mb-2">⚠ Some Issues Found</h3>
                    <p class="text-yellow-700 mb-4">Please fix the issues marked with ✗ above.</p>
                    <div class="text-sm text-yellow-700">
                        <p><strong>Need help?</strong></p>
                        <ul class="list-disc ml-5 mt-2 space-y-1">
                            <li>Read README.md for detailed setup instructions</li>
                            <li>Check SETUP_GUIDE.md for quick configuration steps</li>
                            <li>Ensure Composer dependencies are installed: <code class="bg-yellow-100 px-2 py-1 rounded">composer install</code></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                <h4 class="font-semibold text-blue-800 mb-2">Next Steps:</h4>
                <ol class="list-decimal ml-5 text-blue-700 space-y-1 text-sm">
                    <li>Configure SMTP settings in config/app.php</li>
                    <li>Add reCAPTCHA keys in config/app.php (optional)</li>
                    <li>Test the contact form at <a href="/contacts" class="underline">/contacts</a></li>
                    <li>Delete this verify.php file for security</li>
                    <li>Set environment to 'production' when deploying</li>
                </ol>
            </div>
        </div>
        
        <div class="text-center mt-6 text-gray-600 text-sm">
            <p>Dimgent Technologies Website Redesign</p>
            <p>PHP <?= PHP_VERSION ?> | <?= php_uname('s') ?></p>
        </div>
    </div>
</body>
</html>
