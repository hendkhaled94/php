<?php
require_once '../config.php';
error_reporting(0);
$id = $_GET['id'];
$category=Cats::find_by_category_id($id);
if(isset($_POST)){
	$categoryToDelete=Cats::find_by_category_id($id);
	$categoryToDelete->delete();
    header("Location:categories.php");
    
}else{
	echo "not post";
}
?>