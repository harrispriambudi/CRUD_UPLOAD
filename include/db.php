<?php
$dbinfo = 'mysql:dbname=simple;host=localhost';
$user = 'root';
$pass = '';
$db = new PDO($dbinfo, $user, $pass);
$db->exec('SET CHARACTER SET utf8');
?>