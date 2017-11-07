<?php

namespace Core;

class AbstractQuery extends ConnectionDb
{
    protected $tableName = null;

    /**
     * @description Los parametros serán array asociativo [nombre campo => valor]
     * @param array $params
     * @return array
     */
    public function select(array $params = [])
    {
        try {
            $query = $this->connection->prepare('SELECT * FROM ' . $this->tableName);
            if ($params) {
                $where = $this->prepareWhere($params);
                $query = $this->connection->prepare('SELECT * FROM ' . $this->tableName . ' where ' . $where);
            }
            $query->setFetchMode(\PDO::FETCH_ASSOC);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
            exit;
        }
    }

    /**
     * @param array $params
     * @return string
     */
    public function insert(array $params = [])
    {
        try {
            $fields = '';
            $values = '';
            $i = 1;
            foreach ($params as $key => $value) {
                if (count($params) == $i) {
                    $fields .= $key;
                    $values .= "'".$value."'";
                } else {
                    $fields .= $key . ",";
                    $values .= "'" . $value . "',";
                }
                $i++;
            }
            $sql = "INSERT INTO " . $this->tableName . " (" . $fields . ") VALUES (" . $values . ")";
            $query = $this->connection->prepare($sql);
            $query->execute();
            $id = $this->connection->lastInsertId();
            return $id;
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
            exit;
        }
    }

    /**
     * @param array $values
     * @param array $params
     * @return bool
     */
    public function update(array $values = [], array $params = [])
    {
        try{
            $set = $this->prepareSet($values);
            $query = $this->connection->prepare('UPDATE '.$this->tableName.' SET '.$set);

            if ($params) {
                $where = $this->prepareWhere($params);
                $query = $this->connection->prepare('UPDATE ' . $this->tableName . ' SET ' . $set.' WHERE '.$where);
            }
            $result = $query->execute();
            return $result;

        }catch (\Exception $exception){
            var_dump($exception->getMessage());
            exit;
        }
    }

    /**
     * @param $values
     * @return string
     */
    private function prepareSet($values)
    {
        $set = '';
        $i = 1;
        foreach ($values as $key => $value) {
            if (count($values) == $i) {
                $set .= $key . " = '" . $value . "'";
            } else {
                $set .= $key . " = '" . $value . "' , ";
            }
            $i++;
        }
        return $set;
    }

    /**
     * @param $params
     * @return string
     */
    private function prepareWhere($params)
    {
        $where = '';
        $i = 1;
        foreach ($params as $key => $value) {
            if (count($params) == $i) {
                $where .= $key . " = '" . $value . "'";
            } else {
                $where .= $key . " = '" . $value . "' AND ";
            }
            $i++;
        }
        return $where;
    }

}