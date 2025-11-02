<?php

/**
 * Products Controller
 */
class ProductsController extends BaseController
{
    public function index(): void
    {
        $data = [
            'title' => 'Products of Dimgent Technologies',
            'page' => 'products'
        ];

        $this->render('pages/products', $data);
    }
}

