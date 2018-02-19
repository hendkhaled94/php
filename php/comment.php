<?php
require_once '../config.php';
if(isset($_SESSION)){
$user=Users::find_by_email($_SESSION['email']);
$comment=new Comments();
$comment->content=$_POST['comment_text'];
$comment->post_id=$_GET['post'];
$comment->user_id=$user->user_id;
$comment->status='pinding'; 
$comment->save();
if($_GET['location']=='newsfeed'){
    header("location:../php/newsfeed.php");
}elseif($_GET['location']=='timeline'){
    header("location:timeline.php");
}elseif($_GET['location']=='post'){
    header("location:post.php?post_id=".$comment->post_id."&user_id=".$_GET['user']);
}
}else{
    header("location:../index.php");
}