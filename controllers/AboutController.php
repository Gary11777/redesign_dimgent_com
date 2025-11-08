<?php

declare(strict_types=1);

class AboutController extends BaseController
{
    public function index(): void
    {
        $contentFile = Config::get('paths.content', 'drafts/content') . '/about_us_page_content.txt';
        $content = file_exists($contentFile) ? file_get_contents($contentFile) : '';

        $this->render('pages/about', [
            'title' => 'About Us - ' . Config::get('site.name'),
            'page' => 'about',
            'content' => $content,
        ]);
    }
}
