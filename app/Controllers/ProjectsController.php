<?php
/**
 * Projects Controller
 * 
 * Handles the projects page
 */

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

class ProjectsController extends Controller
{
    /**
     * Display projects page
     */
    public function index(): void
    {
        $data = [
            'page' => 'projects',
            'title' => 'Electronic devices development projects from Dimgent Technologies',
            'meta_description' => 'Our electronic devices development projects include: control panels; automated meters for integrated microsystems, testing circuit boards; gradiometers and electronic probes; devices for the remote collection of information from sensors, wireless headphones, dimmers and remote control for lighting systems; radio extenders.',
            'meta_keywords' => 'automated meters, developing hardware devices, integral microsystems, developing electronic devices, dimmers, radio extenders, wireless headphones, gradiometers, electroprobes, control panels',
        ];

        $this->render('projects/index', $data);
    }
}
