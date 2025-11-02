<?php

/**
 * About Controller
 */
class AboutController extends BaseController
{
    public function index(): void
    {
        $data = [
            'title' => 'About Dimgent Technologies',
            'page' => 'about'
        ];

        $this->render('pages/about', $data);
    }
}

