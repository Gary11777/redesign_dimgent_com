<?php
/**
 * Products Controller
 * 
 * Handles the products page
 */

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

class ProductsController extends Controller
{
    /**
     * Display products page
     */
    public function index(): void
    {
        $data = [
            'page' => 'products',
            'title' => 'Products of Dimgent Technologies',
            'meta_description' => 'Products of Dimgent Technologies: magnetometer Garand 101',
            'meta_keywords' => 'magnetometer, gradiometer, Garand 101, high-resolution, fluxgate',
        ];

        $this->render('products/index', $data);
    }
}
