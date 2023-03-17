<?php

// connect to our MySQL database and execute a qwery.
class Database
{
    public $connection;
    public $opt;

    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        
        $this->opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $this->connection = new PDO($dsn, $username, $password, $this->opt);
    }

    public function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query, $this->opt);

        $statement->execute($params);

        return $statement;

    }
}