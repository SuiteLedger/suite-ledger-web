<?php

class Model extends Database
{

    protected $table = "";
    protected $allowedColumns = [];

    public function insert($data) {

        foreach ($data as $key => $value) {
            if(!in_array($key, $this->allowedColumns)) {
                unset($data[$key]);
            }
        }

        $keys = array_keys($data);

        $query = "insert into " . $this->table;
        $query .= " (" . implode(",", $keys) . ") values (:" . implode(",:", $keys) . ")";

        return $this->query($query, $data);

    }

    public function selectAll($data) {
        $keys = array_keys($data);

        $query = "select * from " . $this->table . " where ";
        foreach ($keys as $key) {
            $query .= $key . "=:" . $key . " && ";
        }
        $query = trim($query, "&& ");

        $result = $this->query($query, $data);

        if(is_array(($result))) {
            return $result;
        }
        return false;
    }

    public function selectOne($data) {
        $keys = array_keys($data);

        $query = "select * from " . $this->table . " where ";
        foreach ($keys as $key) {
            $query .= $key . "=:" . $key . " && ";
        }
        $query = trim($query, "&& ");
        $query .= " order by id desc limit 1";

        $result = $this->query($query, $data);

        if(is_array(($result))) {
            return $result[0];
        }
        return false;
    }

}
