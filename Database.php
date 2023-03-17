<?php

// connect to our MySQL database and execute a qwery.
class Database
{
    public $connection;
    public $opt;

    public function __construct()
    {
        $host = '127.0.0.1';
        $port = '3306';
        $db = 'demo';
        $user = 'root';
        // $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;port=$port;dbname=$db;user=$user;charset=$charset";
        
        $this->opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $this->connection = new PDO($dsn);
    }
    public function query($query)
    {
        

        $statement = $this->connection->prepare($query, $this->opt);
        $statement->execute();

        return $statement;

    }
}