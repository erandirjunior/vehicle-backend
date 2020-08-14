<?php

namespace SRC\Infrastructure\Database;

/**
 * Class Connection
 * @package SRC\Infrastructure\Database
 */
class Connection
{
    /**
     * @return \PDO
     */
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