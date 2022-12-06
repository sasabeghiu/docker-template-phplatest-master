<?php
require __DIR__ . '/controller.php';

class HomeController extends Controller
{
    public function index()
    {
        require __DIR__ . '/../Views/home/index.php';
    }

    public function about()
    {
        require __DIR__ . '/../Views/home/index.php';
        echo "you've reached the about method of the home controller";
    }
}

?>