<?php
$config = require basePath('config/db.php');
$db = new Database($config);
$params = ['id' => $_GET['id'] ?? ''];

$listing = $db->query('SELECT * FROM listings where id = :id', $params)->fetch();

loadView('listings/show', compact('listing'));