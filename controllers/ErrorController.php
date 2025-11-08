<?php

declare(strict_types=1);

/**
 * Error Controller
 */
class ErrorController extends BaseController
{
    public function notFound(): void
    {
        http_response_code(404);
        $this->render('errors/404', [
            'title' => '404 - Page Not Found',
            'page' => '404'
        ]);
    }
}

