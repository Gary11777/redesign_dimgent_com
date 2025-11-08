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
            'metaDescription' => 'Over 50 successfully completed electronic device development projects across various industries.',
            'pageTitle' => 'Projects',
            'pageSubtitle' => 'More than 50 successfully completed projects',
            'projectCategories' => [
                [
                    'name' => 'Systems',
                    'icon' => 'cpu',
                    'projects' => [
                        'Control rooms with public telephone networks, GSM connection and radio channels',
                        'Automated microelectronic circuits testers',
                        'Electronic boards testing systems'
                    ]
                ],
                [
                    'name' => 'Tools',
                    'icon' => 'tool',
                    'projects' => [
                        'Testers for microelectronic circuits',
                        'Tools for archaeological and geological use (gradiometers, electronic probes)',
                        'Remote-reading gauges to collect information from sensors'
                    ]
                ],
                [
                    'name' => 'Everyday Technology',
                    'icon' => 'home',
                    'projects' => [
                        'Wireless headphones (for the hard of hearing and older persons)',
                        'Dimmers (remote control for lighting)',
                        'Radio extenders for electronic sensors, remote controls'
                    ]
                ],
                [
                    'name' => 'Medical Devices',
                    'icon' => 'heart',
                    'projects' => [
                        'Pressure and pulse meters',
                        'Health monitoring devices'
                    ]
                ]
            ],
            'stats' => [
                ['label' => 'Years of Experience', 'value' => '20+'],
                ['label' => 'Completed Projects', 'value' => '50+'],
                ['label' => 'Success Rate', 'value' => '100%']
            ],
            'capabilities' => [
                'The full cycle of electronic devices development (from concept to finished product)',
                'Provision of individual phases of development',
                'Completion of uncompleted projects which have already been started'
            ]
        ];
        
        $this->view('projects', $data);
    }
}
