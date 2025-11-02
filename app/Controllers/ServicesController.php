<?php
/**
 * Services Controller
 * 
 * Handles the services page
 */

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

class ServicesController extends Controller
{
    /**
     * Display services page
     */
    public function index(): void
    {
        $data = [
            'page' => 'services',
            'title' => 'Customized electronic devices development from Dimgent Technologies',
            'meta_description' => 'Customized electronic devices development from Dimgent Technologies. We offer our clients both full cycle electronic devices development and individual phases: development of electric circuits, software, printed circuit board design) and other phases in electronic devices development.',
            'meta_keywords' => 'developing electronic devices, designing circuit boards, developing hardware devices, software, developing customized electronic devices, electric circuits, developing circuit boards, programming microcontrollers',
        ];

        $this->render('services/index', $data);
    }
}
