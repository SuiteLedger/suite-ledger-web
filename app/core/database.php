<?php

class Database
{

    private function connect()
    {
        $connectionString = DBDRIVER . ":hostname=" . DBHOST . ";dbname=" . DBNAME;
        return new PDO($connectionString, DBUSER, DBPASSWORD);
    }

    public function query($query, $data = [], $fetchType = 'object')
    {
        $connection = $this->connect();
        $statement = $connection->prepare($query);
        if ($statement) {
            $check = $statement->execute($data);

            if ($check) {
                $pdoFetchType = PDO::FETCH_OBJ;
                if ($fetchType != 'object') {
                    $pdoFetchType = PDO::FETCH_ASSOC;
                }
                $result = $statement->fetchAll($pdoFetchType);

                if($connection->lastInsertId() > 0) {
                    return $connection->lastInsertId();
                }

                if (is_array($result) && count($result) > 0) {
                    return $result;
                }

            }
        }
        return false;
    }

    public function createTables()
    {
        $query = "CREATE TABLE IF NOT EXISTS `user` (
            `id` bigint(20) NOT NULL AUTO_INCREMENT,
            `name` varchar(100) NOT NULL,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";

        $this->query($query);
    }


}
