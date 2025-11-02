<?php
/**
 * Home Controller
 * Handles the home page logic
 */

require_once __DIR__ . '/BaseController.php';

class HomeController extends BaseController
{
    /**
     * Display home page
     * 
     * @return void
     */
    public function index(): void
    {
        $data = [
            'pageTitle' => 'Electronics Development - Dimgent Technologies',
            'pageDescription' => 'Development of customized electronic devices, electrical equipment and devices. Full cycle of development (from mock-up to finished product). Full product support. Cost effective. Short turn-around times.',
            'pageKeywords' => 'developing hardware devices, designing circuit boards, developing customized electronic devices, electric circuits, developing electronic equipment'
        ];
        
        $this->render('home', $data);
    }
}
