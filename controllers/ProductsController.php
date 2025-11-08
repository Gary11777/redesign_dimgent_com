<?php

declare(strict_types=1);

class ProductsController extends BaseController
{
    public function index(): void
    {
        $contentFile = Config::get('paths.content', 'drafts/content') . '/products_page_content.txt';
        $content = file_exists($contentFile) ? file_get_contents($contentFile) : '';

        $imagesDir = Config::get('paths.images', 'drafts/pics') . '/products_page_pics';
        $images = [];
        if (is_dir($imagesDir)) {
            $files = scandir($imagesDir);
            foreach ($files as $file) {
                $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'], true)) {
                    $images[] = 'products_page_pics/' . $file;
                }
            }
        }

        $this->render('pages/products', [
            'title' => 'Products - ' . Config::get('site.name'),
            'page' => 'products',
            'content' => $content,
            'images' => $images,
        ]);
    }
}
