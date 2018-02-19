<?php
require_once '../config.php';
if(isset($_SESSION)){
    if(isset($_SESSION['email'])){
        $user=Users::find_by_email($_SESSION["email"]);
        $users=Users::find('all');
        $posts=Posts::find('all',array('conditions' => array('post_status=?','approved'),'order'=>'publish_time desc','limit'=>10));
        $comments=[];
        for($i=0;$i<count($posts);$i++){
            $comments[$i]=Comments::find('all',array('conditions'=>array('post_id=? AND status=?',$posts[$i]->post_id,'approved'),'order'=>'comment_id desc','limit'=>3));
        }
        echo render('newsfeed.html',array('user'=>$user,'posts'=>$posts,'comments'=>$comments,'users'=>$users));
        // echo $posts[0]->post_id;
        // echo "<br/>";
        // echo "<pre>";
        // print_r($posts);
        // echo "</pre>";
    }
}else{
    header("location:../index.php");
}