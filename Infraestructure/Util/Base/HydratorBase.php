<?php

namespace Infraestructure\Util\Base;

abstract class HydratorBase
{
    protected $class = '';

    protected $homologate = '';

    /**
     * @param array $data
     * @return mixed
     */
    protected function convertArrayToObject(array $data)
    {
        $generateArray = $this->generateArray($data);
        $object = new $this->class($generateArray);
        return $object;
    }

    /**
     * @param $data
     * @return array
     */
    private function generateArray($data)
    {
        $array = [];
        foreach ($data as $key => $value) {
            if(is_null($value)) {
                continue;
            }
            if(isset($this->homologate[$key])) {
                $array[$this->homologate[$key]] = $value;
            }
        }
        return $array;
    }

}