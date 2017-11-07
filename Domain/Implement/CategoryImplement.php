<?php

namespace Domain\Implement;

use Domain\Repository\CategoryRepository;
use Domain\Service\CategoryService;

class CategoryImplement implements CategoryService
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * CategoryImplement constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCategoryById($id)
    {
        return $this->categoryRepository->getById($id);
    }

    public function getAll()
    {
        return $this->categoryRepository->getAll();
    }

}