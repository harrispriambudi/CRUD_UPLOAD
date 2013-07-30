<?php
if( isset($_GET['id']))
{
	try{
 $id=$_GET['id'];
 $db = new PDO('mysql:host=localhost;dbname=simple;charset=UTF-8', 'root', '');
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $db->beginTransaction();
 $query_get = "SELECT * FROM crud WHERE id=$id";
 $stmt = $db->prepare($query_get);
 $stmt->execute();
 $results = $stmt->fetchAll(PDO::FETCH_OBJ);
 $query_delete="delete from crud where id= $id";
 $stmt = $db->prepare($query_delete);
 $stmt->execute();
 $db->commit();
 }
 catch(PDOException $e){
 $db->rollBack();
 echo $e->getMessage();
 }
 }
?>

 <?php foreach($results as $row): ?>
 <tr>
 <td><?php echo $row->x ?></td>
 <td><?php echo $row->y ?></td>
 <td><?php echo $row->z ?></td>
 </tr>
 Telah dihapus
 <?php endforeach;
 $stmt->closeCursor();
 $dbh=null;
 ?>
	
	