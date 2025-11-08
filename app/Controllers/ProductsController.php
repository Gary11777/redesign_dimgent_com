<?php

declare(strict_types=1);

namespace Controllers;

use Core\Controller;

class ProductsController extends Controller
{
    public function index(): void
    {
        $images = $this->getProductImages();
        
        $data = [
            'title' => 'Products - Garand 101',
            'metaDescription' => 'Garand 101 - A high-resolution fluxgate magnetometer-gradiometer for archaeological research, environmental monitoring, and forensic investigations.',
            'product' => [
                'name' => 'Garand 101',
                'tagline' => 'A high-resolution fluxgate magnetometer',
                'slogan' => 'Magnetic detection can be easy and convenient!',
                'overview' => 'Garand 101 is a high-resolution fluxgate magnetometer-gradiometer designed to measure disruptions in the Earth\'s magnetic field caused by ferromagnetic objects. It provides reliable detection of metals such as iron, steel, and nickel. The device is designed for one-person operation, being lightweight, user-friendly, reliable, and low-cost.',
                'targetAreas' => [
                    'Archaeological research',
                    'Environmental monitoring',
                    'Forensic investigations',
                    'Geological studies',
                    'Civil engineering',
                    'Peace-time military applications'
                ],
                'keyTechnology' => [
                    'Reduces energy consumption and device weight',
                    'Simplifies construction and maintenance',
                    'Increases operating time'
                ],
                'advantages' => [
                    'Innovative magnetic field measurement technology',
                    'Fully digital device — improved noise stability during operation',
                    'User-friendly visualization system and interface for easy object detection',
                    'Reliable and robust design',
                    'Expanded detection area due to optimized design solutions',
                    'Plug-and-play operation',
                    'Affordable price'
                ],
                'website' => 'www.gradiometr.com',
                'images' => $images
            ]
        ];
        
        $this->view('products', $data);
    }
    
    private function getProductImages(): array
    {
        $imageDir = ROOT_PATH . '/drafts/pics/products_page_pics';
        $images = [];
        
        if (is_dir($imageDir)) {
            $files = scandir($imageDir);
            foreach ($files as $file) {
                if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $file)) {
                    $images[] = [
                        'filename' => $file,
                        'path' => '/assets/images/products/' . $file,
                        'alt' => 'Garand 101 Magnetometer'
                    ];
                }
            }
        }
        
        return $images;
    }
}
