<?php

declare(strict_types=1);

/**
 * Services Controller
 */
class ServicesController extends BaseController
{
    public function index(): void
    {
        $contentFile = Config::get('paths.content') . '/services_page_content.txt';
        $content = file_exists($contentFile) ? file_get_contents($contentFile) : '';

        $this->render('pages/services', [
            'title' => 'Services - ' . Config::get('site.name'),
            'page' => 'services',
            'content' => $content
        ]);
    }
}

