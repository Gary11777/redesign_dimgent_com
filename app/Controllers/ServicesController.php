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
            'metaDescription' => 'Customized development of electronic devices. Full cycle development from concept to finished product or individual phases.',
            'pageTitle' => 'Services',
            'pageSubtitle' => 'Customized development of electronic devices',
            'intro' => 'We offer a full cycle development of electronic devices (from mock-up to finished product) or, if required, can just complete individual phases.',
            'services' => [
                'Preparation and approval of technical specifications',
                'Selection of electronic components, mechanical parts and bundles',
                'Development of electric circuits for a device',
                'Software development',
                'Development of printed circuit board drawings',
                'Structural plans and design of product casing',
                'Making mock-ups of individual assemblies',
                'Developing final versions of technical and user documentation',
                'Production of test models (assembly, fitting, programming and debugging)',
                'Preparation for certification',
                'Technical support'
            ],
            'advantages' => [
                [
                    'title' => 'Cost Effective',
                    'description' => 'One reason for choosing us is our cost-effective high-quality services.'
                ],
                [
                    'title' => 'Fast Turnaround',
                    'description' => 'We take projects only up to our handling capacity and hence we are able to concentrate on each project.'
                ],
                [
                    'title' => 'Efficiency',
                    'description' => 'We have a number of standard design elements which can be used in the development of products for different companies.'
                ],
                [
                    'title' => 'Support',
                    'description' => 'All of our projects are offered the on-going support from our team of developers.'
                ],
                [
                    'title' => 'Reliability',
                    'description' => 'All of the products we develop are assembled in our laboratory and tested before delivery.'
                ],
                [
                    'title' => '20+ Years Experience',
                    'description' => 'Our specialists have been creating electronic devices for more than twenty years.'
                ],
                [
                    'title' => 'Guaranteed Success',
                    'description' => 'Thanks to our extensive experience we have a 100% success rate in the design of our products.'
                ]
            ],
            'aim' => [
                'We want our clients to be fully satisfied with the results of our work.',
                'We work with our clients until the product is exactly the one they want it to be.',
                'We also offer ideas for changes and improvements of the product being developed.'
            ],
            'distanceNote' => 'The majority of our clients from other countries wish to outsource a device development to keep costs down. Distance is not a problem, since the Internet brings us nearer than ever before.'
        ];
        
        $this->view('services', $data);
    }
}
