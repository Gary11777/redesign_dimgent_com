<?php
/**
 * Services Controller
 * Handles the services page logic
 */

require_once __DIR__ . '/BaseController.php';

class ServicesController extends BaseController
{
    /**
     * Display services page
     * 
     * @return void
     */
    public function index(): void
    {
        $data = [
            'pageTitle' => 'Customized electronic devices development from Dimgent Technologies',
            'pageDescription' => 'Customized electronic devices development from Dimgent Technologies. We offer our clients both full cycle electronic devices development and individual phases: development of electric circuits, software, printed circuit board design) and other phases in electronic devices development.',
            'pageKeywords' => 'developing electronic devices, designing circuit boards, developing hardware devices, software, developing customized electronic devices, electric circuits, developing circuit boards, programming microcontrollers'
        ];
        
        $this->render('services', $data);
    }
}
