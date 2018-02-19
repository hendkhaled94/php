<?php
require_once '../config.php';
$comment=Comments::find('all');
$post=Posts::find_by_post_id($comment[0]->post_id);
$user=Users::find_by_user_id($post->user_id);

$a_categories=Cats::find('all');
$a_users=Users::find_by_status('active');
$a_posts=Posts::find_by_post_status('approved');
$a_comments=Comments::find_by_status('approved');
echo render('admin_comments.html', array('com'=>$comment,'post'=>$post,'user'=>$user,'a_users'=>$a_users,'a_posts'=>$a_posts,'a_comments'=>$a_comments,'a_categories'=>$a_categories));
?>