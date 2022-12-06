<?php
require __DIR__ . '/../Repositories/articlerepository.php';

class ArticleService
{
    public function getAll()
    {
        //retrieve data
        $repository = new ArticleRepository();
        $articles = $repository->getAll();
        return $articles;
    }
}
