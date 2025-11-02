<?php
/**
 * Header Template
 * Common header section for all pages
 */

// Load configuration and functions
require_once __DIR__ . '/functions.php';
$app_config = load_config('app_config');

// Get current page for active nav state
$current_page = get_current_page();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo isset($page_description) ? e($page_description) : e($app_config['site_description']); ?>">
    <meta name="keywords" content="<?php echo isset($page_keywords) ? e($page_keywords) : 'electronics development, circuit boards, hardware devices, microcontrollers, embedded systems'; ?>">
    <meta name="robots" content="index, follow">
    <title><?php echo isset($page_title) ? e($page_title) . ' - ' : ''; ?><?php echo e($app_config['site_name']); ?></title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo asset('images/favicon.ico'); ?>">
    
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Tailwind Custom Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dimgent-blue': '#0099ff',
                        'dimgent-blue-dark': '#0099cd',
                        'dimgent-maroon': '#800000',
                        'dimgent-steel': '#4682b4',
                        'dimgent-navy': '#191970',
                    }
                }
            }
        }
    </script>
    
    <!-- Alpine.js for interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Custom Styles -->
    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #0099ff;
            border-radius: 5px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #0099cd;
        }
    </style>
    
    <?php if (isset($extra_head_content)) echo $extra_head_content; ?>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">
