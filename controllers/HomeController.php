<?php

/**
 * Home Controller
 */
class HomeController extends BaseController
{
    public function index(): void
    {
        $data = [
            'title' => 'Electronics Development - Dimgent Technologies',
            'page' => 'home'
        ];

        $this->render('pages/home', $data);
    }
}

