<?php
/**
 * About Controller
 * Handles the about page logic
 */

require_once __DIR__ . '/BaseController.php';

class AboutController extends BaseController
{
    /**
     * Display about page
     * 
     * @return void
     */
    public function index(): void
    {
        $data = [
            'pageTitle' => 'About Dimgent Technologies',
            'pageDescription' => 'Dimgent Technologies develops customized electronic devices. Reasonable prices. Short turn-around times for electronic devices. More than 20 years of experience. More than 50 successful projects. 100% guaranteed quality.',
            'pageKeywords' => 'Dimgent Technologies, developing electronic devices, designing printed circuit boards, developing hardware devices, microcontrollers, embedded systems, microprocessors, analog electronics, digital electronics'
        ];
        
        $this->render('about', $data);
    }
}
