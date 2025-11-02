<?php
/**
 * Home Controller
 * 
 * Handles the home page
 */

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    /**
     * Display home page
     */
    public function index(): void
    {
        $data = [
            'page' => 'home',
            'title' => 'Electronics Development - Dimgent Technologies',
            'meta_description' => 'Development of customized electronic devices, electrical equipment and devices. Full cycle of development (from mock-up to finished product). Full product support. Cost effective. Short turn-around times.',
            'meta_keywords' => 'developing hardware devices, designing circuit boards, developing customized electronic devices, electric circuits, developing electronic equipment',
        ];

        $this->render('home/index', $data);
    }
}
