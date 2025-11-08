<?php

declare(strict_types=1);

namespace Controllers;

use Core\Controller;

class ProductsController extends Controller
{
    public function index(): void
    {
        $data = [
            'title' => 'Products',
            'metaDescription' => 'Garand 101 - High-resolution fluxgate magnetometer-gradiometer for magnetic detection',
            'product' => [
                'name' => 'Garand 101',
                'tagline' => 'Magnetic detection can be easy and convenient!',
                'subtitle' => 'A high-resolution fluxgate magnetometer',
                'description' => 'Garand 101 is a high-resolution fluxgate magnetometer-gradiometer designed to measure disruptions in the Earth\'s magnetic field caused by ferromagnetic objects. It provides reliable detection of metals such as iron, steel, and nickel.',
                'features' => [
                    'Lightweight and user-friendly design',
                    'One-person operation',
                    'Reliable and low-cost',
                    'Reduced energy consumption',
                    'Fully digital device',
                    'Plug-and-play operation',
                    'Affordable price'
                ],
                'applications' => [
                    'Archaeological research',
                    'Environmental monitoring',
                    'Forensic investigations',
                    'Geological studies',
                    'Civil engineering',
                    'Peace-time military applications'
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
                'website' => 'www.gradiometr.com'
            ]
        ];

        $this->view('products', $data);
    }
}
