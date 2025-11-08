<?php

declare(strict_types=1);

namespace Controllers;

use Core\Controller;

class ProjectsController extends Controller
{
    public function index(): void
    {
        $data = [
            'title' => 'Projects',
            'metaDescription' => '50+ successfully completed electronic devices development projects',
            'categories' => [
                [
                    'title' => 'Systems',
                    'projects' => [
                        'Control rooms with GSM connection and radio channels',
                        'Automated microelectronic circuits testers',
                        'Electronic boards testing systems'
                    ]
                ],
                [
                    'title' => 'Tools',
                    'projects' => [
                        'Testers for microelectronic circuits',
                        'Archaeological and geological tools (gradiometers, probes)',
                        'Remote-reading gauges for sensor data collection'
                    ]
                ],
                [
                    'title' => 'Everyday Technology',
                    'projects' => [
                        'Wireless headphones for hard of hearing',
                        'Dimmers with remote control for lighting',
                        'Radio extenders for sensors and remote controls'
                    ]
                ],
                [
                    'title' => 'Medical Devices',
                    'projects' => [
                        'Pressure and pulse meters'
                    ]
                ]
            ]
        ];

        $this->view('projects', $data);
    }
}
