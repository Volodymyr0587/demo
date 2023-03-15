<?php

require 'functions.php';
// require 'router.php';

// connect to our MySQL database.

$host = '127.0.0.1';
$port = '3306';
$db   = 'demo';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];


// $dsn = "mysql:host=$host;port=$port;dbname=$db;user=$user;charset=$charset;";

$pdo = new PDO($dsn, $user, $pass, $opt);

$statement = $pdo->prepare("SELECT * FROM posts");
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}