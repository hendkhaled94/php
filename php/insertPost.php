<?php
require_once '../config.php';
print_r($_POST);
if(isset($_SESSION)){
$post=new Posts();
$post->title=$_POST['title'];
$post->content=$_POST['content'];
$cat=Cats::find_by_name($_POST['category']);
$post->category_id=$cat->category_id;
$user=Users::find_by_email($_SESSION['email']);
$post->user_id=$user->user_id;
$post->post_status="pinding";
$post->status_reason="waiting to approve";
$post->coverimage="1.jpg";
if($post->save())
{
    header("location:../php/timeline.php");
}else{
    header("location:../php/createPost.php");
}
}