<?php
require_once '../config.php';
error_reporting(0);
$id = $_GET['id'];
$comment=Comments::find_by_comment_id($id);
if(isset($_POST)){
	$commentToDelete=Comments::find_by_comment_id($id);
	$commentToDelete->status = 'deleted';
	$commentToDelete->save();
    header("Location:admin_comments.php");
    
}else{
	echo "not post";
}
?>