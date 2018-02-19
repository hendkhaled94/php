<?php
require_once '../config.php';
$post=Posts::find('all');
$category = Cats::find_by_category_id($post[0]->category_id);
$user = Users::find_by_user_id($post[0]->user_id);

$a_categories=Cats::find('all');
$a_users=Users::find_by_status('active');
$a_posts=Posts::find_by_post_status('approved');
$a_comments=Comments::find_by_status('approved');
echo render('admin_posts.html', array('post'=>$post,'category'=>$category,'user'=>$user,'a_users'=>$a_users,'a_posts'=>$a_posts,'a_comments'=>$a_comments,'a_categories'=>$a_categories));
?>