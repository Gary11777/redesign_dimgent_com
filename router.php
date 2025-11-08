<?php

declare(strict_types=1);

$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$path = parse_url($requestUri, PHP_URL_PATH) ?: '/';

// Serve static assets from /public directory
if (preg_match('/^(\/public)?\/assets\//', $path)) {
    $localPath = __DIR__ . '/public' . preg_replace('/^\/public/', '', $path);
    if (file_exists($localPath)) {
        $extension = strtolower(pathinfo($localPath, PATHINFO_EXTENSION));
        $mimeTypes = [
            'css' => 'text/css',
            'js' => 'application/javascript',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'ico' => 'image/x-icon',
            'woff' => 'font/woff',
            'woff2' => 'font/woff2',
            'ttf' => 'font/ttf',
            'eot' => 'application/vnd.ms-fontobject',
        ];
        $mime = $mimeTypes[$extension] ?? 'application/octet-stream';
        header('Content-Type: ' . $mime);
        readfile($localPath);
        return;
    }
}

// Serve images from drafts/pics
if (preg_match('/^\/drafts\//', $path)) {
    $localPath = __DIR__ . $path;
    if (file_exists($localPath)) {
        $extension = strtolower(pathinfo($localPath, PATHINFO_EXTENSION));
        $mimeTypes = [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
        ];
        $mime = $mimeTypes[$extension] ?? 'application/octet-stream';
        header('Content-Type: ' . $mime);
        readfile($localPath);
        return;
    }
}

require __DIR__ . '/index.php';
