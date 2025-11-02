<?php
/**
 * Projects Controller
 * Handles the projects page logic
 */

require_once __DIR__ . '/BaseController.php';

class ProjectsController extends BaseController
{
    /**
     * Display projects page
     * 
     * @return void
     */
    public function index(): void
    {
        $data = [
            'pageTitle' => 'Electronic devices development projects from Dimgent Technologies',
            'pageDescription' => 'Our electronic devices development projects include: control panels; automated meters for integrated microsystems, testing circuit boards; gradiometers and electronic probes; devices for the remote collection of information from sensors, wireless headphones, dimmers and remote control for lighting systems; radio extenders.',
            'pageKeywords' => 'automated meters, developing hardware devices, integral microsystems, developing electronic devices, dimmers, radio extenders, wireless headphones, gradiometers, electroprobes, control panels'
        ];
        
        $this->render('projects', $data);
    }
}
