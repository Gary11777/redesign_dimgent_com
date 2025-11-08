<?php

declare(strict_types=1);

/**
 * Products Controller
 */
class ProductsController extends BaseController
{
    public function index(): void
    {
        $contentFile = Config::get('paths.content') . '/products_page_content.txt';
        $content = file_exists($contentFile) ? file_get_contents($contentFile) : '';

        // Get product images
        $imagesDir = Config::get('paths.images') . '/products_page_pics';
        $images = [];
        
        if (is_dir($imagesDir)) {
            $files = scandir($imagesDir);
            foreach ($files as $file) {
                if (in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif'])) {
                    $images[] = 'products_page_pics/' . $file;
                }
            }
        }

        $this->render('pages/products', [
            'title' => 'Products - ' . Config::get('site.name'),
            'page' => 'products',
            'content' => $content,
            'images' => $images
        ]);
    }
}

