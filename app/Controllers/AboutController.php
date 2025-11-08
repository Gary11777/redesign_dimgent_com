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
            'metaDescription' => 'About Dimgent Technologies - Development center in Minsk, Belarus with 20+ years of experience',
            'experience' => [
                'More than 20 years of experience',
                'More than 50 successfully completed projects',
                'Experienced specialists',
                'Guaranteed quality',
                'Short turn-around times',
                'Cost effective'
            ],
            'expertise' => [
                'Devices and embedded systems using microcontrollers',
                'Analog and digital electronic devices',
                'Telemechanics (telemetry and remote controls)',
                'Systems to digitize analog and speech signals',
                'Software for various microcontrollers',
                'Printed circuit boards design',
                'Magnetic ferroprobe gauges (gradiometers)',
                'Robotics',
                'Automated systems for measurements'
            ]
        ];

        $this->view('about', $data);
    }
}
