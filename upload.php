<?php
if(isset($_FILES['image'])){
	$x = 'harris';
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
        echo "Success";
    }else{
        print_r($errors);
    }
}
?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="image" />
    <input type="submit"/>
</form>