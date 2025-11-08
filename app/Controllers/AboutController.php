<?php

declare(strict_types=1);

namespace Controllers;

use Core\Controller;

class AboutController extends Controller
{
    public function index(): void
    {
        $data = [
            'title' => 'About Us',
            'metaDescription' => 'Dimgent Technologies is a group of specialists working in the sector of electronic devices development in Minsk, Belarus.',
            'pageTitle' => 'About Us',
            'companyName' => $this->config['app']['site']['name'],
            'location' => $this->config['app']['site']['location'],
            'overview' => 'Dimgent Technologies is a group of specialists working in the sector of the development of electronic devices. Our company includes engineers, designers and programmers.',
            'experience' => [
                'years' => '20+',
                'projects' => '50+',
                'description' => 'Our specialists have been creating electronic devices for more than twenty years. We have developed and taken part in the development of more than 50 projects over this time.'
            ],
            'approach' => [
                'We offer a comprehensive approach to the projects we work on',
                'We can offer both full-cycle electronic devices development or carry out separate phases',
                'We develop customized electronic devices tailored to your needs'
            ],
            'aim' => [
                'We want our clients to be fully satisfied with the results of our work',
                'We work with our clients until the product is exactly the one they want it to be',
                'We offer ideas for changes and improvements of the product being developed'
            ],
            'expertise' => [
                'Devices and embedded systems using microcontrollers and microprocessors',
                'Analog electronic devices',
                'Digital electronic devices (logical systems, programmable logical matrices)',
                'Telemechanics using infra-red and radio channels (Wi-Fi, Bluetooth, GSM)',
                'Systems to digitize analog and speech signals',
                'Software for various microcontrollers',
                'Designs for printed circuit boards',
                'Signal monitors for three-phase power circuits',
                'Magnetic ferroprobe gauges (gradiometers) and electronic soil probes',
                'Robotics',
                'Automated systems to measure microchips and hardware devices'
            ],
            'values' => [
                ['title' => 'Cost-Effectiveness', 'description' => 'Lowest cost through careful selection of components'],
                ['title' => 'Quick Turnaround', 'description' => 'Fast delivery without compromising quality'],
                ['title' => 'High Quality', 'description' => 'Guaranteed quality in every project']
            ]
        ];
        
        $this->view('about', $data);
    }
}
