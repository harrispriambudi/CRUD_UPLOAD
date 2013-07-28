<?php
include 'include/fetchdata.php';
include 'include/db.php';
?>
<script type="text/javascript">
<!--
function confirmation() {
	var answer = confirm("Anda Yakin Akan menghapus?")
	if (answer){
		window.location = "master_admin/mta_manajemeninventori/mta_delete_jenisbarang/<?php echo $jenisbarang->id_jenisbarangkebutuhan;?>#bottom";
	}
	else{
		alert("Dibatalkan")
	}
}
//-->
</script>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<link href="styles/theme.css" rel="stylesheet"/>
<title>CRUD</title>
</head>
<body>

    <div id="wrapper">
    <table border="2">
    	<thead>
            <th>x</th>
            <th>y</th>
            <th>z</th>
			<th>setting</th>
        </thead>
        <tbody>
        	<?php foreach($results as $entry): ?>
            <tr>
            	<td><?php echo $entry->x; ?></td>
                <td><?php echo $entry->y; ?></td>
                <td><?php echo $entry->z; ?></td>
                <td>
				<INPUT TYPE="button" name="edit" value ='edit' onClick="parent.location='edit.php?id=<?php echo $entry->id; ?>'">
			
				
<script type="text/javascript">			
function confirmation() {
	var answer = confirm("Anda Yakin Akan menghapus ini?")
	if (answer){
		window.location = "delete.php?id=<?php echo $entry->id; ?>";
	}
	else{
		alert("Dibatalkan")
	}
}
</script>
				
				<form><input type="button" onclick="confirmation()" value="Delete"></form></td>
				
				</td>
            </tr>
            <?php endforeach; ?>
            <tr>
            	<td class="create"><a href="add.php">Add New</a></td>
            </tr>
        </tbody>
    </table>
    </div>

</body>
</html>