<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../Services/articleservice.php';

class ArticleController extends Controller
{
    private $articleService;

    //initialize services
    function __construct()
    {
        $this->articleService = new ArticleService();
    }

    //router maps this to /article and /article/index auto
    public function index()
    {
        //retrieves data
        $articles = $this->articleService->getAll();
        //show view, param = accesible as model in the view
        //displayview maps this to /views/article/index.php auto
        $this->displayView($articles);
    }
}
