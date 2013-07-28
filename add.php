<?php
include 'include/db.php';
$errors = array();

$x = filter_input(INPUT_POST, 'x', FILTER_SANITIZE_STRING);
$y = filter_input(INPUT_POST, 'y', FILTER_SANITIZE_STRING);
$z = filter_input(INPUT_POST, 'z', FILTER_SANITIZE_NUMBER_INT);

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(empty($x))
		$errors['x']=true;

	if(empty($y))
		$errors['y']=true;

	if(empty($z))
		$errors['z']=true;	
	
	if(empty($errors))
	{
	
	if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
	
	$filename = basename($_FILES['image']['name']);
	$filetype = pathinfo($filename, PATHINFO_EXTENSION);
	$name = $x.'.'.$filetype;
    $extensions = array("jpeg","jpg","png");

    if(in_array($filetype,$extensions )=== false){
     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    if($file_size > 2097152){
    $errors[]='File size must be excately 2 MB';
    }				
    if(empty($errors)==true){
	
        move_uploaded_file($file_tmp,"asset/".$name);
		$sql = $db->prepare('INSERT crud SET x = :x, y = :y, z = :z');
		$sql->bindValue(':x', $x, PDO::PARAM_STR);
		$sql->bindValue(':y', $y, PDO::PARAM_STR);
		$sql->bindValue(':z', $z, PDO::PARAM_INT);

		$sql->execute();
		header('location: home.php');
		exit;
    }else{
        print_r($errors);
    }
	}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link href="styles/theme.css" rel="stylesheet"/>
<title>Add</title>
</head>
<body>

	<div id="wrapper">

    <form action="add.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">

        <div>
        	<label for="x">X</label>
            <?php if(isset($errors['x'])): ?>
            <label for "x"><p class="error">Isi x dengan benar</p></label>
            <?php endif; ?>
            <input id="x" name="x" value="<?php echo $x; ?>"/>
        </div>

        <div>
        	<label for="y">Y</label>
            <?php if(isset($errors['y'])): ?>
            <label for "y"><p class="error">Isi y dengan benar</p></label>
            <?php endif; ?>
            <input id="y" name="y" value="<?php echo $y; ?>"/>
        </div>

        <div>
        	<label for="z">Z</label>
            <?php if(isset($errors['z'])): ?>
            <label for "z"><p class="error">Isi z dengan benar</p></label>
            <?php endif; ?>
            <input id="z" name="z" value="<?php echo $z; ?>"/>
        </div>
		
		<div>
		<input type="file" name="image" />
		</div>
		
        <div>
            <button type="submit">Save</button>
        </div>

    </form>
  </div>

</body>
</html>