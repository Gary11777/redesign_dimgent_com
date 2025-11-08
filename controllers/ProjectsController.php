<?php

declare(strict_types=1);

class ProjectsController extends BaseController
{
    public function index(): void
    {
        $contentFile = Config::get('paths.content', 'drafts/content') . '/projects_page_content.txt';
        $content = file_exists($contentFile) ? file_get_contents($contentFile) : '';

        $this->render('pages/projects', [
            'title' => 'Projects - ' . Config::get('site.name'),
            'page' => 'projects',
            'content' => $content,
        ]);
    }
}
