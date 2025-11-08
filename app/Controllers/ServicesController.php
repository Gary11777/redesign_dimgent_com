<?php

declare(strict_types=1);

namespace Controllers;

use Core\Controller;

class ServicesController extends Controller
{
    public function index(): void
    {
        $data = [
            'title' => 'Services',
            'metaDescription' => 'Customized development of electronic devices - Full cycle or individual phases',
            'services' => [
                [
                    'title' => 'Technical Specifications',
                    'description' => 'Preparation and approval of technical specifications for electronic devices'
                ],
                [
                    'title' => 'Component Selection',
                    'description' => 'Selection of electronic components, mechanical parts and bundles'
                ],
                [
                    'title' => 'Electric Circuits',
                    'description' => 'Development of electric circuits for devices'
                ],
                [
                    'title' => 'Software Development',
                    'description' => 'Custom software development for embedded systems'
                ],
                [
                    'title' => 'PCB Design',
                    'description' => 'Development of printed circuit board drawings'
                ],
                [
                    'title' => 'Structural Design',
                    'description' => 'Structural plans and design of product casing'
                ],
                [
                    'title' => 'Prototyping',
                    'description' => 'Making mock-ups and test models with debugging'
                ],
                [
                    'title' => 'Technical Support',
                    'description' => 'On-going support from our team of developers'
                ]
            ],
            'advantages' => [
                [
                    'title' => 'Cost',
                    'description' => 'Cost-effective high-quality services'
                ],
                [
                    'title' => 'Speed',
                    'description' => 'We concentrate on each project for quick delivery'
                ],
                [
                    'title' => 'Efficiency',
                    'description' => 'Standard design elements help keep costs down'
                ],
                [
                    'title' => 'Support',
                    'description' => 'On-going support from our developers'
                ],
                [
                    'title' => 'Reliability',
                    'description' => 'All products are tested before delivery'
                ],
                [
                    'title' => 'Experience',
                    'description' => '20+ years of electronic device development'
                ]
            ]
        ];

        $this->view('services', $data);
    }
}
