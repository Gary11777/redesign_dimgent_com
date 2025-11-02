<?php

/**
 * Services Controller
 */
class ServicesController extends BaseController
{
    public function index(): void
    {
        $data = [
            'title' => 'Customized electronic devices development from Dimgent Technologies',
            'page' => 'services'
        ];

        $this->render('pages/services', $data);
    }
}

