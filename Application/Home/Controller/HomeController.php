<?php

namespace Application\Home\Controller;

use Core\AbstractQuery;
use Core\ConnectionDb;
use Core\Response;
use Domain\Implement\CategoryImplement;
use Infraestructure\Persistence\Database\CategoryDatabase;

class HomeController
{
    CONST MODULE = "Home";

    /**
     * @var string
     */
    protected $tableName = 'ys_category';

    /**
     * @var Array
     */
    private $dataView;

    public function index()
    {
        try {
            $categoryDatabase = new CategoryDatabase();
            $categoryImplement = new CategoryImplement($categoryDatabase);
            $categories = $categoryImplement->getAll();
            $this->dataView = [
                'categories' => $categories
            ];
            Response::renderView(self::MODULE, 'home', $this->dataView);
        }catch (\Exception $exception){
            var_dump($exception->getMessage());
        }
    }

    public function about()
    {
        var_dump("sobre mi");exit;
    }

}