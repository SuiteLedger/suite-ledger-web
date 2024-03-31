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

    public function update($id, $data) {

        foreach ($data as $key => $value) {
            if(!in_array($key, $this->allowedColumns)) {
                unset($data[$key]);
            }
        }

        $keys = array_keys($data);

        $query = "UPDATE " . $this->table . " set ";

        foreach ($keys as $key) {
            $query .= $key . "=:" . $key . ",";
        }
        $query = trim($query,',');
        $query .= " WHERE id=:id";

        $data['id'] = $id;
        return $this->query($query, $data);

    }

    public function delete($id) {

    }

    public function selectAll($data = []) {
        $keys = array_keys($data);

        $query = "select * from " . $this->table;

        if(count($keys) > 0) {
            $query .= " where ";
            foreach ($keys as $key) {
                $query .= $key . "=:" . $key . " && ";
            }
            $query = trim($query, "&& ");
        }

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