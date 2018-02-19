<?php
require_once "../config.php";
if(isset($_POST)){
$user=Users::find_by_email($_SESSION["email"]);
$users=Users::find('all');
$post=Posts::find('all',array('conditions' => array('user_id=? AND post_status=?',$user->user_id,'approved')));
$comments=[];
for($i=0;$i<count($post);$i++){
    $comments[$i]=Comments::find('all',array('conditions'=>array('post_id=? AND status=?',$post[$i]->post_id,'approved'),'order'=>'comment_id desc','limit'=>3));
}
echo render('timeline.html',array('user'=>$user,'posts'=>$post,'comments'=>$comments,'users'=>$users));
}else{
    header("location:../index.php");
}