<?php
/**
 * Products Controller
 * Handles the products page logic
 */

require_once __DIR__ . '/BaseController.php';

class ProductsController extends BaseController
{
    /**
     * Display products page
     * 
     * @return void
     */
    public function index(): void
    {
        $data = [
            'pageTitle' => 'Products of Dimgent Technologies',
            'pageDescription' => 'Products of Dimgent Technologies: magnetometer Garand 101',
            'pageKeywords' => 'magnetometer, gradiometer, Garand 101, high-resolution, fluxgate'
        ];
        
        $this->render('products', $data);
    }
}
