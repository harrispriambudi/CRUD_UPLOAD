<?php
try{
$db = new PDO('mysql:host=localhost;dbname=jobsheet;charset=UTF-8', 'root', 'root'); /** sesuaikan dengan database yang anda gunakan **/
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $db->beginTransaction();
 $query_insert = "INSERT INTO mahasiswa (nim,nama,jenis_kelamin,prodi,alamat)  /** sesuaikan dengan tabel Anda **/
 VALUES (:nim,:nama,:jenis_kelamin,:prodi,:alamat)";/** sesuaikan dengan tabel Anda **/
 $stmt = $db->prepare($query_insert);
 $stmt->execute(array(
 ':nim'=>'1234555',
 ':nama'=>'Dwi W',
 ':jenis_kelamin'=>'L',
 ':prodi'=>'TI',
 ':alamat'=>'Malang',
 ));
 $lastId = $db->lastInsertId();
 $query = "SELECT * FROM mahasiswa WHERE id=?";
 $stmt = $db->prepare($query);
 $stmt->execute(array($lastId));
 $stmt->setFetchMode(PDO::FETCH_BOTH);
 $db->commit();
 }catch(PDOException $e){
 $db->rollBack();
 echo $e->getMessage();
 }
 
?>

table border="1">
 <tr>
 <th>No</th><th>NIM</th><th>Nama</th><th>Jenis Kelamin</th><th>Program Studi</th><th>Alamat</th>
 </tr>
 <?php while($row = $stmt->fetch() ){ ?>
 <tr>
 <td><?php echo $row['id'] ?></td>
 <td><?php echo $row['nim'] ?></td>
 <td><?php echo $row['nama'] ?></td>
 <td><?php ($row['jenis_kelamin']=='L') ? print('Laki-Laki'):print('Perempuan'); ?></td>
 <td><?php if ($row['prodi']=='TI') echo 'Teknik Informatika'; elseif ($row['prodi']=='TT') echo 'Teknik Telekomunikasi'; else echo 'Teknik Mekatronika' ;?></td>
 <td><?php echo $row['alamat'] ?></td>
 </tr>
 <?php
 }
 $stmt->closeCursor();
 $dbh=null;
 ?>
 </table>