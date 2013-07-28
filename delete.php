<?php
require_once 'include/db.php';

if( isset($_GET['id']))
{
	$sql = $db->prepare('SELECT * FROM crud WHERE id = :id');
	$sql->bindValue(':id', $id, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetch(PDO::FETCH_OBJ);
	$x = $results->x;

	//unlink("assets/foto_akun/$item->foto_karyawan");

	$sql = $db->prepare('DELETE FROM crud WHERE id = :id');
	$sql->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
	$sql->execute();
	
	
}

	header('Location: home.php');
	exit;