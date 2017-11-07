<?php

namespace Infraestructure\Util\Hydrators;

use Infraestructure\Util\Base\HydratorBase;

class CategoryHydrator extends HydratorBase
{
    protected $class = 'Domain\Entities\Category';

    /**
     * key = nombre en base de datos
     * value = nombre en entidad
     */
    protected $homologate = [
        'id' => 'id',
        'name' => 'name'
    ];

    /**
     * @param array $data
     * @return mixed
     */
    public function hydrate(array $data)
    {
        return $this->convertArrayToObject($data);
    }

}