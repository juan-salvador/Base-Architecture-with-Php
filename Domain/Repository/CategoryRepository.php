<?php
namespace Domain\Repository;

interface CategoryRepository{

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * @return mixed
     */
    public function getAll();

}