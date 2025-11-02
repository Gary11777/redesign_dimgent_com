<?php

/**
 * Projects Controller
 */
class ProjectsController extends BaseController
{
    public function index(): void
    {
        $projectsFile = Config::get('paths.projects');
        $projects = [];

        if (file_exists($projectsFile)) {
            $projectsJson = file_get_contents($projectsFile);
            $projects = json_decode($projectsJson, true) ?? [];
        }

        $data = [
            'title' => 'Electronic devices development projects from Dimgent Technologies',
            'page' => 'projects',
            'projects' => $projects
        ];

        $this->render('pages/projects', $data);
    }
}

