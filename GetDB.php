<?php

namespace image;

use PDO;

class GetDB
{
    private $connect;
    public function __construct($dbname = "inst", $host = "localhost", $user = "root", $password = "root")
    {
        $this->connect = new PDO("mysql:dbname={$dbname}; host={$host}", $user, $password);
        return $this->connect;
    }

    public function executeAll($sql, $options = [])
    {
        $statement = $this->connect->prepare($sql);
        $statement->execute($options);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function execute($sql, $options = [])
    {
        $statement = $this->connect->prepare($sql);
        $statement->execute($options);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($sql, $values = [])
    {
        $statement = $this->connect->prepare($sql);
        $statement->execute($values);
    }

    public function select($sql)
    {
        $statement = $this->connect->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}