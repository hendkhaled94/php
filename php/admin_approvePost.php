<?php
require_once '../config.php';
error_reporting(0);
$id = $_GET['id'];
$post=Posts::find_by_post_id($id);
if(isset($_POST)){
	$postToApprove=Posts::find_by_post_id($id);
	$postToApprove->post_status = 'approved';
	$postToApprove->save();
    header("Location:admin_posts.php");
    
}else{
	echo "not post";
}
?>