<?php

namespace SRC\Infrastructure\Database;

class Connection
{
    public function getConnection()
    {
        try {
            $conn = new \PDO('mysql:host=db;dbname=vehicle', 'root', 'root');
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (\PDOException $pdoException) {
            echo $pdoException->getMessage();
        }
    }
}