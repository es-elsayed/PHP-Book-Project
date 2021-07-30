<?php
class DB
{
    // private $host = "mysql-40876-0.cloudclusters.net";
    private $host = "localhost";

    // private $port = "18914";port=$this->port
    private $db_name = "Book";

    private $username = "root";
    // private $username = "admin";

    // private $password = "aID7mzLY";
    private $password = "";

    private $connection = null;

    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->db_name", "$this->username", "$this->password");
        } catch (Throwable $th) {
            echo "Can't Connect with DB ...!";
        }
    }
    public function getConnection()
    {
        return $this->connection;
    }
    public function getAllData($table_name, $condition = 1)
    {
        return $this->connection->query("
        select * from $table_name where $condition ;
        ");
    }
    public function deleteData($table_name, $condition)
    {
        return $this->connection->query("
        delete from $table_name where $condition ;
        ");
    }
    public function insertData($table_name, $var)
    {
        return $this->connection->query("insert into $table_name set $var");
    }
    public function updateData($table_name, $var, $condition)
    {
        return $this->connection->query("
        update $table_name set $var where $condition;
            ");
    }
}
