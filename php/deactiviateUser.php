<?php
require_once '../config.php';
error_reporting(0);
$id = $_GET['id'];
$user=Users::find_by_user_id($id);
if(isset($_POST)){
	$userToActiviate=Users::find_by_user_id($id);
	$userToActiviate->status = 'not active';
	$userToActiviate->save();
    header("Location:admin_users.php");
    
}else{
	echo "not post";
}
?>