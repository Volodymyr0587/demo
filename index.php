<?php

require 'functions.php';
// require 'router.php';

// connect to our MySQL database.
$dsn = 'mysql:host=127.0.0.1;port=3306;dbname=demo;user=root;password=220587;charset=utf8mb4';

$pdo = new PDO($dsn);

$statement = $pdo->prepare("SELECT * FROM posts");
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}