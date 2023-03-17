<?php

require 'functions.php';
// require 'router.php';
require 'Database.php';


$db = new Database();
$posts = $db->query("SELECT * FROM posts")->fetchAll(PDO::FETCH_ASSOC);

dd($posts);

foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}