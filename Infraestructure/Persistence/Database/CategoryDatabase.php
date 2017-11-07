<?php

namespace Infraestructure\Persistence\Database;

use Core\AbstractQuery;
use Domain\Repository\CategoryRepository;
use Infraestructure\Util\Hydrators\CategoryHydrator;

class CategoryDatabase extends AbstractQuery implements CategoryRepository
{
    protected $tableName = 'ys_category';

    /**
     * @param $id
     * @return \ArrayObject|null
     */
    public function getById($id)
    {
        $response = $this->select(['id' => $id]);
        if(!$response){
            return null;
        }
        $categoryObject = $this->hydrate($response);
        return $categoryObject;
    }

    public function getAll()
    {
        $response = $this->select();
        if (!$response){
            return null;
        }
        $categoryObject = $this->hydrate($response);
        return $categoryObject;
    }

    /**
     * @param $response
     * @return \ArrayObject
     */
    private function hydrate($response)
    {
        $hydrator = new CategoryHydrator();
        $categoryObject = new \ArrayObject();
        foreach ($response as $value){
            $data = $hydrator->hydrate($value);
            $categoryObject->append($data);
        }
        return $categoryObject;
    }

}