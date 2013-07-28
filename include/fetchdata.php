<?php
require_once 'include/db.php';
$sql = $db->query('SELECT * FROM crud ORDER BY id ASC');
$results = $sql->fetchAll(PDO::FETCH_OBJ);
?>