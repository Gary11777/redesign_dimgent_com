<?php
/**
 * About Controller
 * 
 * Handles the about page
 */

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

class AboutController extends Controller
{
    /**
     * Display about page
     */
    public function index(): void
    {
        $data = [
            'page' => 'about',
            'title' => 'About Dimgent Technologies',
            'meta_description' => 'Dimgent Technologies develops customized electronic devices. Reasonable prices. Short turn-around times for electronic devices. More than 20 years of experience. More than 50 successful projects. 100% guaranteed quality.',
            'meta_keywords' => 'Dimgent Technologies, developing electronic devices, designing printed circuit boards, developing hardware devices, microcontrollers, embedded systems, microprocessors, analog electronics, digital electronics, logical systems, developing telemechanical equipment, programmable logical matrices, infra-red channels, telemetry, radio channels, remote control, analog to digital converter, tools to monitor electrical circuit signals, ferroprobe to measure magnetic field, gradiometer, electronic soil probes, robotics',
        ];

        $this->render('about/index', $data);
    }
}
