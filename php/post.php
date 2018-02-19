<?php
require_once '../config.php';
if(isset($_SESSION)){
    if(isset($_GET)){

       // echo $_GET['user_id'];
        //echo $_GET['post_id'];
        $user=Users::find_by_user_id($_GET['user_id']);
        $users=Users::find('all');
        $post=Posts::find_by_post_id($_GET['post_id']);
        $comments=Comments::find('all',array('conditions'=>array('post_id=? AND status=?',$post->post_id,'approved'),'order'=>'comment_id desc'));
        echo render('post.html',array('user'=>$user,'post'=>$post,'comments'=>$comments,'users'=>$users));
        // echo "<pre>";
        // print_r($post);
        // echo "</pre>";
    }
}else{
    header("location:../index.php");
}