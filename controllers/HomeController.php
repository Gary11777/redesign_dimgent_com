<?php

declare(strict_types=1);

class HomeController extends BaseController
{
    public function index(): void
    {
        $contentFile = Config::get('paths.content', 'drafts/content') . '/home_page_content.txt';
        $content = file_exists($contentFile) ? file_get_contents($contentFile) : '';

        $this->render('pages/home', [
            'title' => Config::get('site.name') . ' - ' . Config::get('site.tagline'),
            'page' => 'home',
            'content' => $content,
        ]);
    }
}
