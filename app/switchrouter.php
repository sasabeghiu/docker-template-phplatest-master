<?php

class SwitchRouter
{
    public function route($uri)
    {
        # switch statement to route URL's controller methods
        switch ($uri) {
            case '':
                require __DIR__ . '/Controllers/homecontroller.php';
                $controller = new HomeController();
                $controller->index();
                break;
            case 'about':
                require __DIR__ . '/Controllers/homecontroller.php';
                $controller = new HomeController();
                $controller->about();
                break;
            case 'article':
                require __DIR__ . '/Controllers/articlecontroller.php';
                $controller = new ArticleController();
                $controller->index();
                break;
            default:
                echo '404 not found';
                http_response_code(404);
                break;
        }
    }
}
