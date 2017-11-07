<?php

namespace Domain\Service;

interface CategoryService{

    /**
     * @param $id
     * @return mixed
     */
    public function getCategoryById($id);

    /**
     * @return mixed
     */
    public function getAll();

}