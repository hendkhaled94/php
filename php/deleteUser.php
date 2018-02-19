<?php
require_once '../config.php';
error_reporting(0);
$id = $_GET['id'];
$user=Users::find_by_user_id($id);
if(isset($_POST)){
	$userToDelete=Users::find_by_user_id($id);
	$userToDelete->status = 'deleted';
	$userToDelete->save();
    header("Location:admin_users.php");
    
}else{
	echo "not post";
}
?>