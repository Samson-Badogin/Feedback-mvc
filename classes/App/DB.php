<?php

namespace App;

use PDO;

class DB
{
    private $connect;

    public function __construct()
    {
        $this->connect = new PDO(
            "mysql:host=m.0.mysql.websm.io:3306;dbname=test_feedback.ru;charset=utf8",
            "test_feedback",
            "E5MZ4TAxuSSbL5EjmVJbUEpmH3WBEUL2xgfdUWNW"
        );
    }

    public function getAll($sql)
    {
        $result=$this->connect->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($sql)
    {
        $result=$this->connect->prepare($sql);
        $result->execute();
    }
}
